<?php
   class Security
   {
      var $mrConfig;
      var $mUserIdentity;
      var $mRoleBase;

      function Security(&$configObject, $isLogout=false)
      {
         $this->mrConfig = &$configObject;
         if (empty($_SESSION['user_identity_portal']) || empty($_SESSION['role_base_portal']))
         {
            if ($isLogout === false)
               $this->SessionEmptyHandler();
         }
         else
         {
            $this->mUserIdentity = $_SESSION['user_identity_portal'];
            $this->mRoleBase = $_SESSION['role_base_portal'];
         }
      }
      
      function SessionEmptyHandler() {
         require_once $this->mrConfig->GetValue('app_data') . 'database_connected.class.php';
         require_once $this->mrConfig->GetValue('app_module') . 'login/business/gatekeeper.class.php';
         $gateKeeperObject = new GateKeeper($this->mrConfig);
         $user = $gateKeeperObject->IsUserSessionRegistered(session_id());
         if ($user === false) {
            $this->DenyPageAccess();
         } else {
            $this->SessionExpiredAccess($user);
         }
      }
      

      /**
       * Security::CheckAccessRight()
       *
       * @param integer $requiredAccess;
       * @return
       */
      function CheckAccessRight($strAccess)
      {         
         $requiredAccess = explode("|", $strAccess);
         $allowAccess = false;
         for ($i = 0; $i < count($requiredAccess); $i++) {
            for ($j = 0; $j < count($this->mRoleBase); $j++) {
               if (trim($requiredAccess[$i]) == trim($this->mRoleBase[$j]['role_kode'])) {
                  //echo "MAsuk -> ".$this->mRoleBase[$j]['role_kode'];
                  if ($this->mUserIdentity->GetProperty("Role") == trim($this->mRoleBase[$j]['role_id'])) {
                     //echo "Allow -> ".$this->mRoleBase[$j]['role_id'];
                     $allowAccess = true;
                     //continue 2;
                  }
               }
            } //End for
         } //End for

         return $allowAccess;
      }

      /**
       * Security::DenyPageAccess()
       * Throwing unexpected intruder
       *  
       * @return
       */
      function DenyPageAccess()
      {
         //header("Location: " .  $this->mrConfig->GetValue('baseaddress'));
         //exit();
         header("Location: " .  $this->mrConfig->GetURL('error', 'module_denied', 'view'));
         exit();
      }
      
      /**
      * Security::IsSessionExpired()
      * To check whether session is expired or not
      * 
      * @param  
      * @return boolean value session expired
      */
      function IsSessionExpired()
      {
         if (time() < $_SESSION["time"]){
            $_SESSION["time"] = time() + 1800;
            return false;
         }else{
            return true;
         }
      }
      
      /**
            * Security::SessionExpiredAccess()
            * Forward to Login Page if session is expired
            *  
            * @param userName string nama user yang sedang login
            * @return
            */
      function SessionExpiredAccess($userName="")
      {
         // redirect ke error dan error nya yang nanti meredirect ke proses logout         
         $urlAdditional = '';
         if ($userName != '') {
            $urlAdditional = '&uname='. $this->mrConfig->Enc($userName);
         }
         header("Location: " .  $this->mrConfig->GetURL('error', 'expired_session', 'view') . $urlAdditional);
         exit();
      }
      
      
      /**
       * Security::IsAgree
       * Check whether user already agree in agreement or not.
       *
       * @param 
       * @return 
       */
       function IsAgree() 
       {
         if ($this->mUserIdentity->GetProperty("UserIsAgree") == 1)
            return true;
         else
            return false;
       }
       
      function RefreshSessionInfo() {
         $_SESSION['user_identity_portal'] = $this->mUserIdentity;
      }
       
   }
?>