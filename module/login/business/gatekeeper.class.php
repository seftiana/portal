<?php

   class GateKeeper extends DatabaseConnected
   {
      var $mrConfig;
      
      var $mDateTimeAcces;
      var $mGateKeeperErrorMessage;

      function GateKeeper(&$configObject)
      {
         $this->mrConfig = &$configObject;
         $this->mDateTimeAcces = date('Y-m-d H:i:s');
         DatabaseConnected::DatabaseConnected($this->mrConfig, "module/login/business/gatekeeper.sql.php");         
         
      } 

      function Authenticate($username, $password)
      {
         if(!$this->Connect()) {    
            $dbErrorMsg = $this->GetProperty("DbErrorMessage");
            $this->SetProperty("GateKeeperErrorMessage", $dbErrorMsg);
            return false;
         }
         
         $dataUser = $this->GetAllDataAsArray($this->mSqlQueries['authenticate'], array($username));         
         $insertedPassword = md5($password);
         if (false !== $dataUser)
         {  
            list($row, $value) = each($dataUser);
            if($value['password'] != $insertedPassword) {
               $this->SetProperty("GateKeeperErrorMessage", "Password Anda salah");
               return false;
            }
            else {
               
               // update last access               
               $sqlUpdLastAcces = $this->ExecuteUpdateQuery($this->mSqlQueries['update_last_access_where_user'], array($this->mDateTimeAcces,$username));      
               if(false == $sqlUpdLastAcces)
                  die('Tidak dapat melakukan update last akses. <br />'.$this->GetProperty("DbErrorMessage"));
            
               // update online status this user on DB
               $sqlUpdOnline = $this->ExecuteUpdateQuery($this->mSqlQueries['update_online_status_where_user'], array('1', $username));    
               if(false == $sqlUpdOnline)
                  die('Tidak dapat melakukan update status online'.$this->GetProperty("DbErrorMessage"));
                  
				 $serviceSireg = $this->GetAllDataAsArray($this->mSqlQueries['select_service_sireg'], array());    
               //Set User Identity            
               $userIdentity = new UserIdentity($value['user'], $value['role']);               
               $userIdentity->SetProperty("UserFullName", $value['nama_lengkap']);
               $userIdentity->SetProperty("UserUnitId", $value['unit_id']);
               $userIdentity->SetProperty("UserProdiId", $value['kode_prodi']);
			   $userIdentity->SetProperty("UserProdiName", $value["nama_prodi"]);
               $userIdentity->SetProperty("UserReferenceId", $value['referensi_id']);
               $userIdentity->SetProperty("UserFotoFile", $value['foto']);
               $userIdentity->SetProperty("UserIsAgree", $value['is_agree']);
               $userIdentity->SetProperty("ServerServiceAddress", $value['alamat_server']);
               $userIdentity->SetProperty("ApplicationId", $this->mrConfig->GetValue('app_id'));
               $userIdentity->SetProperty("SiregServiceAddress", $serviceSireg[0]['URL']);
               $serviceFinansi = $this->GetAllDataAsArray($this->mSqlQueries['select_service_finansi'], array());
               $userIdentity->SetProperty("FinansiServiceAddress", $serviceFinansi[0]['URL']);
               
			   
			  //Get user profil through web services
			  $soap_server = $userIdentity->GetProperty("ServerServiceAddress");
			  $userClientService = new UserClientService($soap_server, false, $userIdentity->GetProperty("UserReferenceId"));
			  
			  if($userClientService->IsError()) {
				 $tmpArray = array('SIA' => false);
				 $userIdentity->SetProperty("ServerServiceAvailable", $tmpArray);
			  }else { 
			  		 $servicePt = $userClientService->GetUserPt();
					 if(false !== $servicePt) {                        
						$tmpArray = array('SIA' => true);
						$userIdentity->SetProperty("ServerServiceAvailable", $tmpArray);
						list($row, $value) = each($servicePt);
						
						 $_SESSION['identitas']['pt_nama'] = DecryptLink($value["pt_nama"]);
						 $arrLogo = explode(".", $value["pt_logo"]);
                   $namaLogo = DecryptLink($arrLogo[0]);
                   $extLogo  = DecryptLink($arrLogo[1]);      
                   
                   $_SESSION['identitas']['pt_logo'] = $namaLogo.".".$extLogo;                   
						 $_SESSION['identitas']['pt_alamat'] = DecryptLink($value["pt_alamat"]);
						 $_SESSION['identitas']['pt_telp'] = DecryptLink($value["pt_telp"]);
						 $_SESSION['identitas']['pt_fax'] = DecryptLink($value["pt_fax"]);

					 }
					 else {                        
						$tmpArray = array('SIA' => false);
						$userIdentity->SetProperty("ServerServiceAvailable", $tmpArray);
					 }

				   // if admin no need to get user profile from service
				   if($userIdentity->GetProperty("Role") != 3 && $userIdentity->GetProperty("Role") != 6)
				   {                                   
						 $userClientService->SetProperty("UserRole", $userIdentity->GetProperty("Role"));
						 $serviceData = $userClientService->GetUserInfo(2);

						 if(false !== $serviceData) {                        
							$tmpArray = array('SIA' => true);
							$userIdentity->SetProperty("ServerServiceAvailable", $tmpArray);
							list($row, $value) = each($serviceData);
							$userIdentity->SetProperty("UserIdNumber", $value["no_id"]);
							$userIdentity->SetProperty("UserFullName", $value["fullname"]);
							$userIdentity->SetProperty("UserProdiId", $value["prodiKode"]);
							$userIdentity->SetProperty("UserProdiName", $value["info"]);
							$userIdentity->SetProperty("UserFotoFile", $value["foto"]);
							$userIdentity->SetProperty("IsEditBiodata", $value["is_edit_biodata"]);
						 }
						 else {                        
							$tmpArray = array('SIA' => false);
							$userIdentity->SetProperty("ServerServiceAvailable", $tmpArray);
						 }
				   }
				   else {
					  if ($userIdentity->GetProperty("Role") == 3){
						 $userIdentity->SetProperty("UserProdiId", "PORTAL");                                    
					  }
					  $tmpArray = array('SIA' => false);
					  $userIdentity->SetProperty("ServerServiceAvailable", $tmpArray);
				   }
			   }
			   
			   
               $_SESSION['user_identity_portal'] = $userIdentity;
			   
			   //print_r($_SESSION['user_identity_portal']);exit;
               //Get Role Base
               $userRole = new Role($this->mDbConnection, $this->mrConfig);
               $_SESSION['role_base_portal'] = $userRole->FetchRole();
               $this->SetProperty("GateKeeperErrorMessage", "");
               $this->Disconnect();      
            }
         }
         else
         {
            $this->Disconnect();      
            $dbErrorMsg = $this->GetProperty("DbErrorMessage");
            $this->SetProperty("GateKeeperErrorMessage", "Username $username belum terdaftar<br>".$dbErrorMsg);
            return false;
         }
         
      }

      /**
       * GateKeeper::DoLogoutUser
       * Logouting user by set online status = 0
       *
       * @param userName string username
       * @return boolean logout result
       */
      function DoLogoutUser($userName)
      {
         $sql = sprintf($this->mSqlQueries['update_online_status_where_user'], '0', $userName);    
         $this->Connect();     
         $rs = $this->mDbConnection->Execute($sql);
         $this->Disconnect();
         if ($rs){
            return true;
         }else{
            return false;
         }   
      }
      
      //kayaknya ga perlu dipake
      /**
       * GateKeeper::UserNameAuthenticate
       * Check the existing of username 
       *
       * @param userName string username
       * @return flag 0 and 1 indicating not exist and exist
       */
      function UserNameAuthenticate($userName){
         $sql = sprintf($this->mSqlQueries['select_user_where_user_name'], '0', $userName);    
         $this->Connect();     
         $rs = $this->mDbConnection->Execute($sql);
         $this->Disconnect();
         if ($rs){
            return $rs[0]["JUMLAH"];
         }else{
            return 0;
         }
      }
      
      function DoRegisterUserSessionId($sessionId, $username) {
         
         $this->Connect();     
         $rs = $this->ExecuteInsertQuery($this->mSqlQueries['do_register_user_session_id'], array($sessionId, $username));
         $this->Disconnect();
         if ($rs === false) {
            $this->SetProperty("GateKeeperErrorMessage", $this->GetProperty("DbErrorMessage"));
         } else {
            $this->SetProperty("GateKeeperErrorMessage", '');
         }
         return $rs;
      }
      
      function DoUnregisterUserSessionId($sessionId)
      {
         $this->Connect();     
         $rs = $this->ExecuteDeleteQuery($this->mSqlQueries['do_unregister_user_session_id'], array($sessionId));
         $this->Disconnect();
         if ($rs === false) {
            $this->SetProperty("GateKeeperErrorMessage", $this->GetProperty("DbErrorMessage"));
         } else {
            $this->SetProperty("GateKeeperErrorMessage", '');
         }
         return $rs;
      }
      
      function IsUserSessionRegistered($sessionId) {
         $this->Connect();     
         $rs = $this->GetDataAsOne($this->mSqlQueries['is_user_session_registered'], array($sessionId));
         $this->Disconnect();
         if ($rs === false) {
            $this->SetProperty("GateKeeperErrorMessage", $this->GetProperty("DbErrorMessage"));
            return false;
         } else {
            $this->SetProperty("GateKeeperErrorMessage", '');
            return $rs;
         }
      }
   }
?>