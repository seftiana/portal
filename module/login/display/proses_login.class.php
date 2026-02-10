<?php

   class ProsesLogin extends ProcessBase
   {  
      var $mGateKeeper;
      var $mProsesLoginErrorMessage;

      function ProsesLogin(&$configObject)   
      {              
         ProcessBase::ProcessBase($configObject);
      } 

      function LoginCheck($user, $password)
      {
         $this->mGateKeeper = new GateKeeper($this->mrConfig);
         
         if (false !== $this->mGateKeeper->Authenticate($user, $password))
         {   
            $userSes = $this->mGateKeeper->IsUserSessionRegistered(session_id());
            if ($userSes !== false){
               $this->DoLogout($userSes);
            }
            if (true === $this->mGateKeeper->DoRegisterUserSessionId(session_id(), $user)) {
               $this->SetProperty("ProsesLoginErrorMessage", "");
               return true;
            } else {
               $this->SetProperty("ProsesLoginErrorMessage", "Proses login tidak berhasil.<br>". $this->mGateKeeper->GetProperty("GateKeeperErrorMessage"));
               return false;
            }
         }
         else
         {
            $this->SetProperty("ProsesLoginErrorMessage", "Login tidak berhasil.<br>".$this->mGateKeeper->GetProperty("GateKeeperErrorMessage"));            
            return false;
         }
      }

      /**
            * ProsesLogin::DoLogout
            * @param userName string username
            */
      function DoLogout($userName)
      {
         $this->mGateKeeper = new GateKeeper($this->mrConfig);
         if ($this->mGateKeeper->DoLogoutUser($userName) === true) {
            if (true === $this->mGateKeeper->DoUnregisterUserSessionId(session_id())) {
               return true;
            } else {
               return false;
            }
         } else {
            return false;
         }
      }
   } 
?>