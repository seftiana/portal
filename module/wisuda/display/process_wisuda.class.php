<?php
/**
 * ProcessWisuda
 * Process class user
 * 
 * @package 
 * @author Maya Alipin
 * @copyright Copyright (c) 2006 GamaTechno
 * @version 1.0 
 * @date 2006-01-16
 * @revision Maya Alipin 260106
 *
 * commented statement (/*)  is not defined yet please do not erase 
 */

   class ProcessWisuda extends ProcessBase 
   {
      /**
      * var mDataUser object kelas User 
      */
      var $mDataUser;
      
      /**
      * var mNewPassword string User's new password
      */
      var $mNewPassword;
      
      /**
      * var mProcessErrorMsg string pesan kesalahan proses 
      */
      var $mProcessErrorMsg;
            
      /**
      * var mProcessErrorType string tipe kesalahan proses 
      */
      var $mProcessErrorType;
      
      /**
      * ProcessWisuda::ProcessWisuda
      * Constructor for ProcessWisuda class
      *
      * @param $configObject object Configuration
      * @return void
      */
      function ProcessWisuda($configObject,$siaService) 
      {
         ProcessBase::ProcessBase($configObject) ;
         $this->SiaService = $siaService;
      }
      
      /**
       * ProcessWisuda::AddUser
       * Add user
       *
       * @param user_name String user id
       * @param hak_akses integer hak akses id
       * @param nama_lengkap String nama lengkap user
       * @param unit integer unit id
       * @param prog_studi integer program studi id
       * @param referensi  integer referensi user 
       * @return boolean add result 
       */
      function AddUserItem($user_name, $hak_akses, $nama_lengkap, $unit, $prog_studi, $referensi) 
      {
         $newPassword = $this->GenerateNewPassword();
         $this->mDataUser = new User($this->mrConfig, $user_name);
         $this->mDataUser->SetManageUserAttributes($user_name, $newPassword, $hak_akses, 
                                                   $nama_lengkap, $unit, $prog_studi, $referensi);
         $result = $this->mDataUser->DoAddUserItem();
         if(false === $result) {
            $this->SetProperty("ProcessErrorType", "fatal");
            $this->SetProperty("ProcessErrorMsg", "Tambah user gagal.<br>".$this->mDataUser->GetProperty("UserErrorMessage"));
            return false;
         }
         else {
            $this->SetProperty("ProcessErrorType", "");
            $this->SetProperty("ProcessErrorMsg", "");
            $this->mNewPassword = $newPassword;
            return true;
         }
      }
      
      /**
       * ProcessWisuda::GenerateNewPassword
       * Generate new random password
       * 
       * @param 
       * @return string new password
       */
      function GenerateNewPassword() {
         $newPassword = "";
         $i = 0;
         for ($i=0; $i<6; $i++) {
            $number = rand(0, 9);
            settype($number, "string");
            $newPassword .= $number;
         }
         
         return $newPassword;
      }
      
      /**
        * ProcessWisuda::ResetPasswordUser
        * Reset User Password by Admin
        *
        * @param $user_id id user
        */
      function ResetPasswordUser($user_id) {
         $this->mDataUser = new User($this->mrConfig, $user_id);
         $this->mDataUser->SetProperty("UserId", $user_id);
         $dataUser = $this->mDataUser->LoadUserById();
         if(false === $dataUser) {
            $this->SetProperty("ProcessErrorType", "fatal");
            $this->SetProperty("ProcessErrorMsg", "Pengambilan data user gagal.<br>".$this->mDataUser->GetProperty("UserErrorMessage"));
            return false;
         }
         else {
            $new_password = $this->GenerateNewPassword();
            $this->mDataUser->SetProperty('UserNewPassword', $new_password);
            $result = $this->mDataUser->DoUpdateUserPassword();
            if(false === $result) {
               $this->SetProperty("ProcessErrorType", "nonfatal");
               $this->SetProperty("ProcessErrorMsg", "Pembaharuan password gagal.<br>".$this->mDataUser->GetProperty("UserErrorMessage"));
               return false;
            }
            else {
               $this->SetProperty("ProcessErrorType", "");
               $this->SetProperty("ProcessErrorMsg", "");
               return $new_password;
            }
         }
      }
      
      
      /**
       * ProcessWisuda::UpdateUser
       * Update user's data
       *
       * @param $old_id integer id user yang lama
       * @return void
       */
      function UpdateUserItem($user_name, $hak_akses, $nama_lengkap, $unit, $prog_studi, $referensi, $old_id) 
      {
         $this->mDataUser = new User($this->mrConfig, $user_name);
         $this->mDataUser->SetManageUserAttributes($user_name, "", $hak_akses, $nama_lengkap, 
                                                   $unit, $prog_studi, $referensi);
         
         $this->mDataUser->SetProperty("OldUserId", $old_id);
         $result = $this->mDataUser->DoUpdateUserItem();
         if(false === $result) {
            $this->SetProperty("ProcessErrorType", "fatal");
            $this->SetProperty("ProcessErrorMsg", "Update user gagal.<br>".$this->mDataUser->GetProperty("UserErrorMessage"));
            return false;
         }
         else {
            $this->SetProperty("ProcessErrorType", "");
            $this->SetProperty("ProcessErrorMsg", "");
            return true;
         }
      }
      
      /**
       * ProcessWisuda::DeleteUser
       * Delete user
       *
       * @param $userId array user id
       * @return void
       */
      function DeleteUserItem($userId) 
      {
         
         $this->mDataUser = new User($this->mrConfig, $userId);
         $result = $this->mDataUser->DoDeleteUserItem();
         if(false === $result) {
            $this->SetProperty("ProcessErrorType", "fatal");
            $this->SetProperty("ProcessErrorMsg", "Hapus user gagal.<br>".$this->mDataUser->GetProperty("UserErrorMessage"));
            return false;
         }
         else {
            $this->SetProperty("ProcessErrorType", "");
            $this->SetProperty("ProcessErrorMsg", "");
            return true;
         }
      }
      
      /**
       * ProcessWisuda::UpdateUserPassword
       * Update User password
       *
       * @param $user_id      string user id
       * @param $old_password string old password
       * @param $new_password string new password
       * @return boolean update result value
       */
      function UpdateUserPassword($user_id, $new_password, $old_password) {
      
         //set attributes
         $this->mDataUser = new User($this->mrConfig, $user_id);
         $dataUser = $this->mDataUser->LoadUserById();
         if(false === $dataUser) {
            $this->SetProperty("ProcessErrorType", "fatal");
            $this->SetProperty("ProcessErrorMsg", "Pengambilan data user gagal.<br>".$this->mDataUser->GetProperty("UserErrorMessage"));
            return false;
         }
         else {
            list($row, $value) = each($dataUser);
            if($value['passwd'] !== md5($old_password)) {                
               $this->SetProperty("ProcessErrorType", "nonfatal");
               $this->SetProperty("ProcessErrorMsg", "Pembaharuan password gagal. <br>Password lama Anda salah");
               return false;
            }
            else {
               $this->mDataUser->SetProperty('UserNewPassword', $new_password);
               $result = $this->mDataUser->DoUpdateUserPassword();
               if(false === $result) {
                  $this->SetProperty("ProcessErrorType", "nonfatal");
                  $this->SetProperty("ProcessErrorMsg", "Pembaharuan password gagal.<br>".$this->mDataUser->GetProperty("UserErrorMessage"));
                  return false;
               } else {
				  $this->mDataUserClient = new UserClientService($this->SiaService, false, $user_id);
				  $this->mDataUserClient->SetProperty('UserRole',$dataUser[0]['hak_id']);
				  $userInfo = $this->mDataUserClient->GetUserInfo(1);
				  
				  //send mail
 				  $email = $userInfo[0]['email'];
				  $subject = GetSubject();
				  $content = GetContent($user_id,$new_password,'perubahan');
			  	  $send = SendMail($email,$subject,$content);
				  
				  if($send != true){
					$this->SetProperty("ProcessErrorType", "nonfatal");
					$this->SetProperty("ProcessErrorMsg", "Proses Kirim Email gagal karena ".$send);
					return false;
				  }
				  
                  $this->SetProperty("ProcessErrorType", "");
                  $this->SetProperty("ProcessErrorMsg", "");
                  return true;
               }
            }            
         }         
      }
      
      /**
       * ProcessWisuda::UpdateUserAgreement
       * Update User's agreement
       *
       * @param $user_id      string user id
       * @param $agreement    boolean agree value
       * @return boolean update result value
       */
      function UpdateUserAgreement($user_id, $agreement) {
         //set attributes
         $this->mDataUser->SetProperty('UserId', $user_id);
         $this->mDataUser->SetProperty('UserAgreementStatus', $agreement);
         $result = $this->mDataUser->DoUpdateUserAgreement();
         if(false === $result) {
            $this->SetProperty("ProcessErrorType", "fatal");
            $this->SetProperty("ProcessErrorMsg", "Pembaharuan status agreement gagal.<br>".$this->mDataUser->GetProperty("UserErrorMessage"));
            return false;
         }
         else {
            $this->SetProperty("ProcessErrorType", "");
            $this->SetProperty("ProcessErrorMsg", "");
            return true;
         }
      }
      
	  function EditBiodataMahasiswa($niu, $url){
		set_time_limit(0);
		$this->gtfwCrypt = new gtfwCrypt();
		$sireg = new UserSiregService($url);
		$ret = $sireg->DoUpdateBiodataMahasiswa($niu);
		return $ret['status'];
	  }
	  
	  function EditBiodataOrangTua($niu, $url){
		set_time_limit(0);
		$this->gtfwCrypt = new gtfwCrypt();
		$sireg = new UserSiregService($url);
		$ret = $sireg->DoUpdateBiodataOrangTua($niu);
		return $ret['status'];
	  }
	  
	  function EditBiodataSmta($niu, $url){
		set_time_limit(0);
		$this->gtfwCrypt = new gtfwCrypt();
		$sireg = new UserSiregService($url);
		$ret = $sireg->DoUpdateBiodataSmta($niu);
		return $ret['status'];
	  }
	  
      function ValidateFormValue($arrPost){
         $arrData[0] = $arrPost["txtNamaUser"];
         $arrNama[0] = "Nama User";
         
         $arrData[1] = $arrPost["lstHakAkses"];
         $arrNama[1] = "Hak Akses";
         
         $arrData[2] = $arrPost["txtNamaLengkap"];
         $arrNama[2] = "Nama Lengkap";
         
         $arrData[3] = $arrPost["lstUnitId"];
         $arrNama[3] = "Unit";
         
         $arrData[4] = $arrPost["txtReferensi"];
         $arrNama[4] = "Referensi";
         if ($arrPost["lstHakAkses"]==3){
            $arrFunction = array("","","","","");
         }else{
            $arrData[5] = empty($arrPost["prodiId"])?'NULL':$arrPost["prodiId"];
            $arrNama[5] = "Program Studi";
            $arrFunction = array("","","","","","");
         }
         
         $arrFunction = array("","","","","","");
         if (false ===$this->ValidateForm($arrData, $arrFunction, $arrNama)){
            $this->SetProperty("ProcessErrorType", "");
            
            $this->SetProperty("ProcessErrorMsg", $this->GetProperty("ProcessBaseErrorMessage"));
            return false;
         }else{
            return true;
         }
      }
	  
	  function parseInput($arr){
		foreach($arr as $k=>$data){
			$arr[$k] . '=' . $this->gtfwCrypt->Encrypt(strip_tags($data));
		}
		return $arr;
	  }
	  
		#add ccp 1-9-2020
		function EditBiodataMahasiswaHP($niu, $url){
			set_time_limit(0);
			$this->gtfwCrypt = new gtfwCrypt();
			$sireg = new UserSiregService($url);
			$ret = $sireg->DoUpdateBiodataMahasiswaHP($niu); #add ccp 1-9-2020
			return $ret['status'];
		}
		
		#add ccp 6-9-2020
		function EditBiodataDosen($siaServer, $userId,$noreg,$pegNoHP,$pegNomorKtp,$pegNamaIbu,$pegAlamatRumah,$dsnNidn,$KotaKodeLahir,$tglLahir,$pegEmail){
			$split = $dsnNidn.'|'.$KotaKodeLahir.'|'.$tglLahir.'|'.$pegEmail;
			set_time_limit(0);
			$sireg = new UserClientService($siaServer, false, $userId);
			$ret = $sireg->DoUpdateBiodataDosen($noreg,$pegNoHP,$pegNomorKtp,$pegNamaIbu,$pegAlamatRumah,$split);
			return $ret;
		}
   }

?>