<?php
   // here u must include business class
   require_once $cfg->GetValue('app_module') . 'user/business/user.class.php';
   
   class UserServerService
   {
      var $mrConfig;
      var $mrDataProceed;
            
      var $mIsError;
      var $mErrorMessage;

      function UserServerService(&$configObject, $dataProceed)
      {         
         $this->mrConfig = &$configObject;
         $this->mrDataProceed = $dataProceed;
         $this->InitError();
      } 
         
      function InitError() {
         $this->mIsError = false;
         $this->mErrorMessage = '';
      }
      
      function SetError($strMsg) {
         $this->mIsError = true;
         $this->mErrorMessage = $strMsg;
      }
      
      function SetProperty($propName, $value) {
         $method_name = "Set" . $propName;
         $property_name = "m" . $propName;
         if (method_exists($this, $method_name)) {
            $this->$method_name($value);
         } else {
            $object_vars = get_object_vars($this);
            if (array_key_exists($property_name, $object_vars)) {
               $this->$property_name = $value;
            } else {
               exit($propName . " has not been declared yet!");
            }
         }
      }

      function GetProperty($propName) {
         $method_name = "Get" . $propName;
         $property_name = "m" . $propName;
         if (method_exists($this, $method_name)) {
            $value = $this->$method_name();
         } else {
            $object_vars = get_object_vars($this);
            if (array_key_exists($property_name, $object_vars)) {
               $value = $this->$property_name;
            } else {
               exit($propName . " has not been declared yet!");
            }
         }   
         return $value;
      }
      
      
      /**
       * UserServerService::PortalClientUpdateUserPassword
       * digunakan untuk mengupdate password user
       * use: Set mrDataProceed[0] = integer user name
       *              mrDataProceed[1] = integer user role id
       *              mrDataProceed[2] = string user password
       * @return boolean update result           
       */
      function PortalClientUpdateUserPassword() {         
         $objUserData = new User($this->mrConfig, $this->mrDataProceed[0], $this->mrDataProceed[1]);
         $objUserData->SetProperty("UserNewPassword", $this->mrDataProceed[2]);         
         $proc = $objUserData->DoUpdateUserPassword();
         if(false === $proc) {
            $this->SetError('Proses update password user gagal. ' . $objUserData->GetProperty("UserErrorMessage"));
            return false;
         } else {
            return true;
         }         
      }
      
       /**
       * UserServerService::PortalClientUpdateArrayUserPassword
       * digunakan untuk mengupdate password user
       * use: Set array of(
       *              mrDataProceed[0] = integer user name
       *              mrDataProceed[1] = integer user role id
       *              mrDataProceed[2] = string user password)
       * @return boolean update result           
       */
       function PortalClientUpdateArrayUserPassword() {         
         $arrResult= array();
         if (!empty($this->mrDataProceed)){
            $objUserData = new User($this->mrConfig, '', '');      
            foreach ($this->mrDataProceed as $key=>$value) {
               $objUserData->SetProperty('UserId', $value[0]);
               $objUserData->SetProperty('UserRole', $value[1]);
               $objUserData->SetProperty("UserNewPassword", $value[2]);         
               $proc = $objUserData->DoUpdateUserPassword();
               $arrResult[] = array($value[0],$proc);
            }
         }
         return $arrResult;
      }
      
      /**
       * UserServerService::PortalClientUpdateAddUser
       * digunakan untuk menambah user portal
       * use: Set mrDataProceed[0] = integer user name
       *              mrDataProceed[1] = integer user role id
       *              mrDataProceed[2] = string user password
       *              mrDataProceed[3] = string nama lengkap
       *              mrDataProceed[4] = integer unit id
       *              mrDataProceed[5] = integer program studi id
       *              mrDataProceed[6] = integer referensi user id (nim / nip)
       * @return boolean insert result           
       */
      function PortalClientAddUser() {         
         $objUserData = new User($this->mrConfig, $this->mrDataProceed[0], $this->mrDataProceed[1]);
         $objUserData->SetProperty("UserNewPassword", $this->mrDataProceed[2]);         
         $objUserData->SetProperty("NamaLengkap", $this->mrDataProceed[3]);
         $objUserData->SetProperty("Unit", $this->mrDataProceed[4]);
         $objUserData->SetProperty("ProgramStudi", $this->mrDataProceed[5]);
         $objUserData->SetProperty("Referensi", $this->mrDataProceed[6]);
         $proc = $objUserData->DoAddUserItem();
         if(false === $proc) {
            $this->SetError('Proses tambah user gagal. ' . $objUserData->GetProperty("UserErrorMessage"));
            return false;
         } else {
            return true;
         }         
      }
      
      /**
       * UserServerService::PortalClientAddArrayUser
       * digunakan untuk menambah user portal
       * use: Set array of (
       *              mrDataProceed[0] = integer user name
       *              mrDataProceed[1] = integer user role id
       *              mrDataProceed[2] = string user password
       *              mrDataProceed[3] = string nama lengkap
       *              mrDataProceed[4] = integer unit id
       *              mrDataProceed[5] = integer program studi id
       *              mrDataProceed[6] = integer referensi user id (nim / nip))
       * @return boolean insert result           
       */
      function PortalClientAddArrayUser() {         
         $arrResult= array();
         if (!empty($this->mrDataProceed)){
            $objUserData = new User($this->mrConfig, '', '');      
            foreach ($this->mrDataProceed as $key=>$value) {
               $objUserData->SetProperty('UserId', $value[0]);
               $objUserData->SetProperty('UserRole', $value[1]);
               $objUserData->SetProperty("UserNewPassword", $value[2]);         
               $objUserData->SetProperty("NamaLengkap", $value[3]);
               $objUserData->SetProperty("Unit", $value[4]);
               $objUserData->SetProperty("ProgramStudi", $value[5]);
               $objUserData->SetProperty("Referensi", $value[6]);      
               $proc = $objUserData->DoAddUserItem();
               $arrResult[] = array($value[0],$proc);
            }  
         }
         return $arrResult;          
      }
      
      /**
       * UserServerService::PortalClientUpdateUser
       * digunakan untuk merubah data user portal
       * use: Set mrDataProceed[0] = integer user name
       *              mrDataProceed[1] = integer user role id
       *              mrDataProceed[2] = string nama lengkap
       *              mrDataProceed[3] = integer unit id
       *              mrDataProceed[4] = integer program studi id
       *              mrDataProceed[5] = integer referensi user id (nim / nip)
       *              mrDataProceed[6] = integer old user id
       * @return boolean update result           
       */
      function PortalClientUpdateUser() {         
         $objUserData = new User($this->mrConfig, $this->mrDataProceed[0], $this->mrDataProceed[1]);         
         $objUserData->SetProperty("NamaLengkap", $this->mrDataProceed[2]);
         $objUserData->SetProperty("Unit", $this->mrDataProceed[3]);
         $objUserData->SetProperty("ProgramStudi", $this->mrDataProceed[4]);
         $objUserData->SetProperty("Referensi", $this->mrDataProceed[5]);
         $objUserData->SetProperty("OldUserId", $this->mrDataProceed[6]);
         $proc = $objUserData->DoUpdateUserItem();
         if(false === $proc) {
            $this->SetError('Proses ubah user gagal. ' . $objUserData->GetProperty("UserErrorMessage"));
            return false;
         } else {
            return true;
         }         
      }
      
      /**
       * UserServerService::PortalClientUpdateUserPassword
       * digunakan untuk mengahapus user portal
       * use: Set mrDataProceed[0] = integer user name
       *              mrDataProceed[1] = integer user role id
       * @return boolean delete result           
       */
      function PortalClientDeleteUser() {         
         $objUserData = new User($this->mrConfig, $this->mrDataProceed[0], $this->mrDataProceed[1]);         
         $proc = $objUserData->DoDeleteUserItem();
         if(false === $proc) {
            $this->SetError('Proses hapus user gagal. ' . $objUserData->GetProperty("UserErrorMessage"));
            return false;
         } else {
            return true;
         }         
      }
      
      /**
       * UserServerService::PortalClientUpdateUserPassword
       * digunakan untuk menambah user portal
       * use: Set mrDataProceed[0] = integer user name
       *              mrDataProceed[1] = integer user role id
       * @return boolean array of array (integer nama user `nama`, string user password `passwd`,
       *                                                  integer hak akses id `hak_id`, string nama hak akses `hak_nama`,
       *                                                  string kode hak akses `hak_kode`, string nama lengkap user `profil`,
       *                                                  integer unit id `unit_id`, integer prodi kode `prodi_kode`, 
       *                                                  string nama program studi `prodi_nama`, integer kode fakultas `fak_kode`, 
       *                                                  integer referensi user id `referensi`)
       */
      function PortalClientGetUserData() {         
         $objUserData = new User($this->mrConfig, $this->mrDataProceed[0], isset($this->mrDataProceed[1])?$this->mrDataProceed[1]:'');         
         $proc = $objUserData->LoadUserById();
         if(false === $proc) {
            $this->SetError('Proses pengambilan data user gagal. ' . $objUserData->GetProperty("UserErrorMessage"));
            return false;
         } else {
            return $proc;
         }         
      }
      
      /**
       * UserServerService::PortalClientUpdateUserPassword
       * digunakan untuk menambah user portal
       * use: Set mrDataProceed[0] = integer user name
       * @return array of array (string nama user `user_name`)      
       */
      function PortalClientGetArrayUserName() {         
         $objUserData = new User($this->mrConfig, "","");         
         $proc = $objUserData->GetUserByArrayNiu($this->mrDataProceed[0]);
         if(false === $proc) {
            $this->SetError('Proses pengambilan data user gagal. ' . $objUserData->GetProperty("UserErrorMessage"));
            return false;
         } else {
            return $proc;
         }         
      }
      
   }
?>	