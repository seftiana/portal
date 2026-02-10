<?php
/**
 * User
 * User class
 * 
 * @package user 
 * @author Maya Alipin
 * @copyright Copyright (c) 2006 GamaTechno
 * @version 1.0 
 * @date 2006-01-17
 * @revision Maya Alipin 260106
 *
 * commented statement (/*)  is not defined yet please do not erase 
 */

   class User extends DatabaseConnected
   {
      //---- start property ----//   
      /**
       * var mUserId String nama user
       */
      var $mUserId;
      
      /**
       * var mOldUserId String nama user lama
       */
      var $mOldUserId;
      
      /**
       * var mUserCurrPassword String password user saat ini
       */
      var $mUserCurrPassword;
      
      /**
      * var mUserNewPassword String password user baru
      */
      var $mUserNewPassword;
      
      /**
            * var mUserRole integer idhak akses 
            */
      var $mUserRole;
      
      /**
            * var mNamaLengkap String nama lengkap
            */
      var $mNamaLengkap;
      
      /**
            * var mPertanyaan String pertanyaan 
            */
      /*var $mPertanyaan;*/
      
      /**
            * var mJawaban String jawaban
            */
      /*var $mJawaban;*/
      
      /**
            * var mSignature String signature user
            */
      /*var $mSignature;*/
      
      /**
            * var mAvatar String path avatar image
            */
      /*var $mAvatar;*/
      
      /**
            * var mEmail String user's email address
            */
      /*var $mEmail;*/
      
      /**
            * var mIsTampilBio integer is user allowed him/her biodata displayed
            */
      /*var $mIsTampilBio;*/
      
      /**
            * var mNoTelp String user's phone number
            */
      /*var $mNoTelp;*/
      
      /**
            * var mReferensi integer id referensi 
            * mahasiswa=NIM, dosen=NIP, <!--WARNING -sisanya ga tau-->
            */
      var $mReferensi;
      
      /**
            * var mUnit integer id unit 
            */
      var $mUnit;
      
      /**
            * var mUserAgreementStatus integer user's agreement
            */
      var $mUserAgreementStatus;
      
      /**
            * var mUserAgreementDate datetime agreement date
            */
      var $mUserAgreementDate;
      
      /**
            * var mLastAccess datetime last date and time user access portal
            */
      var $mLastAccess;
      
      /**
            * var mIsOnline integer to indicate if user is online or not
            */
      var $mIsOnline;
      
      /**
            * var mProgramStudi integer kode program studi
            */
      var $mProgramStudi;
      
      /**
            * var mUserErrorMessage string pesan kesalahan kelas
            */
      var $mUserErrorMessage;
      
       /**
        * var $mCondition string Where Condition for Search Query with many Option
        */
      var $mCondition;
      //---- end property ----//   
   
   
      /**
      * User::User
      * Constructor for User class
      *
      * @param $configObject object Configuration
      * @return void
      */
      function User($configObject, $userId, $userRole="") 
      {
         DatabaseConnected::DatabaseConnected($configObject, "module/user/business/user.sql.php") ;
         $this->mUserId = $userId;
         $this->mUserRole = $userRole;
      }
      
      /**
      * User::LoadUserById
      * Constructor for User class
      *
      * @param 
      * @return user id data
      */
      function LoadUserById() {
         $params = array($this->mUserId);
         if(!$this->Connect()) {            
            $dbErrorMsg = $this->GetProperty("DbErrorMessage");
            $this->SetProperty("UserErrorMessage", $dbErrorMsg);
            return false;
         }
         $dataUser = $this->GetAllDataAsArray($this->mSqlQueries['load_user_by_id'], $params);
         if (false === $dataUser) {
            $this->SetProperty("UserErrorMessage", "Data tidak ditemukan .... <br> ".$this->GetProperty("DbErrorMessage"));
            $this->Disconnect();
            return false;            
         }
         else {
            $this->SetProperty("UserErrorMessage", '');
            $this->Disconnect();
            return $dataUser;
         }         
      }
      
      /**
      * User::DoAddUserItem
      * Add user
      *
      * @param 
      * @return boolean result
      */
      function DoAddUserItem() 
      {
         if(!$this->Connect()) {            
            $dbErrorMsg = $this->GetProperty("DbErrorMessage");
            $this->SetProperty("UserErrorMessage", $dbErrorMsg);
            return false;
         }
         $result = false;
		 if(empty($this->mProgramStudi)){
			 $param = array($this->mUserId, $this->mUserNewPassword, $this->mUserRole, mysql_real_escape_string($this->mNamaLengkap), 
							 $this->mUnit, $this->mReferensi);
			 if ($this->ExecuteInsertQuery($this->mSqlQueries['do_add_user_item_no_prodi'], $param)){
				$result = true;
			 }
		 }else{
			 $param = array($this->mUserId, $this->mUserNewPassword, $this->mUserRole, mysql_real_escape_string($this->mNamaLengkap), 
							 $this->mUnit, $this->mProgramStudi, $this->mReferensi);
			 if ($this->ExecuteInsertQuery($this->mSqlQueries['do_add_user_item'], $param)){
				$result = true;
			 }
		 }
         $this->Disconnect();
         
         if (false === $result){         
            $this->SetProperty("UserErrorMessage", "Tidak dapat melakukan penambahan <i>user</i> '".$this->mUserId."'. <br />".$this->GetProperty("DbErrorMessage"));
            //die('Tidak dapat melakukan penambahan <i>user</i>. <br />'.$this->GetProperty("DbErrorMessage"));
         }else{
            $this->SetProperty("UserErrorMessage", "");
         }
         return $result;
      }
      
      /**
       * User::UpdateUser
       * Update user's data
       *
       * @param 
       * @return void
       */
      function DoUpdateUserItem() 
      {
         if(!$this->Connect()) {            
            $dbErrorMsg = $this->GetProperty("DbErrorMessage");
            $this->SetProperty("UserErrorMessage", $dbErrorMsg);
            return false;
         }
         $param = array($this->mUserId, $this->mUserRole, mysql_real_escape_string($this->mNamaLengkap), 
                         $this->mUnit, $this->mProgramStudi, $this->mReferensi, $this->mOldUserId);
         $result = false;
         if ($this->ExecuteUpdateQuery($this->mSqlQueries['do_update_user_item'], $param)){
            $result = true;
         }
         $this->Disconnect();
         
         if (false === $result){         
            $this->SetProperty("UserErrorMessage", "Tidak dapat melakukan update <i>user</i> '".$this->mUserId."'. <br />".$this->GetProperty("DbErrorMessage"));
            //die('Tidak dapat melakukan penambahan <i>user</i>. <br />'.$this->GetProperty("DbErrorMessage"));
         }else{
            $this->SetProperty("UserErrorMessage", "");
         }
         return $result;
      }
      
      /**
       * User::DoDeleteUserItem
       * Delete user
       *
       * @param 
       * @return void
       */
      function DoDeleteUserItem() 
      {
         if(!$this->Connect()) {            
            $dbErrorMsg = $this->GetProperty("DbErrorMessage");
            $this->SetProperty("UserErrorMessage", $dbErrorMsg);
            return false;
         }
         $param = array($this->mUserId);
         $result = false;
         if ($this->ExecuteDeleteQuery($this->mSqlQueries['do_delete_user_item'], $param)){
            $result = true;
         }
         $this->Disconnect();
         
         if (false === $result){         
            $this->SetProperty("UserErrorMessage", "Tidak dapat melakukan penghapusan <i>user</i> '".$this->mUserId."'. <br />".$this->GetProperty("DbErrorMessage"));
            //die('Tidak dapat melakukan penambahan <i>user</i>. <br />'.$this->GetProperty("DbErrorMessage"));
         }else{
            $this->SetProperty("UserErrorMessage", "");
         }
         return $result;
      }
      
      /**
            * User::DoUpdateUserPassword
            * change user's password
            *
            * @param 
            * @return void booelan value indicating process result
            */
      function DoUpdateUserPassword() {
         $params = array($this->mUserNewPassword, $this->mUserId);
         if(!$this->Connect()) {            
            $dbErrorMsg = $this->GetProperty("DbErrorMessage");
            $this->SetProperty("UserErrorMessage", $dbErrorMsg);
            return false;
         }
         if (false === $this->ExecuteUpdateQuery($this->mSqlQueries['do_update_user_password'], $params)) {
            $this->SetProperty("UserErrorMessage", "Update password gagal .... <br> ".$this->GetProperty("DbErrorMessage"));
            $this->Disconnect();
            return false;
         }
         else {
            $this->SetProperty("UserErrorMessage", '');
            $this->Disconnect();
            return true;
         }         
      }
      
      /**
       * User::DoUpdateUserAgreement
       * change user's agreement
       *
       * @param 
       * @return void booelan value indicating process result
       */
      function DoUpdateUserAgreement() {
         $params = array($this->mUserAgreementStatus, $this->mUserId);
         if(!$this->Connect()) {            
            $dbErrorMsg = $this->GetProperty("DbErrorMessage");
            $this->SetProperty("UserErrorMessage", $dbErrorMsg);
            return false;
         }
         if (false === $this->ExecuteUpdateQuery($this->mSqlQueries['do_update_user_agreement'], $params)) {
            $this->SetProperty("UserErrorMessage", "Update agreement status gagal .... <br> ".$this->GetProperty("DbErrorMessage"));
            $this->Disconnect();
            return false;
         }
         else {
            $this->SetProperty("UserErrorMessage", '');
            $this->Disconnect();
            return true;
         }         
      }
      
      /**
       * ProcessUser::SetAllAttributes
       * Set all attributes user's class
       *
       * @param user_name String user id
       * @param passwd String new password 
       * @param hak_akses integer hak akses id
       * @param nama_lengkap String nama lengkap user
       * @param unit integer unit id
       * @param prog_studi integer program studi id
       * @param referensi  integer referensi user 
       * @return void
       */
      function SetManageUserAttributes($user_name, $passwd, $hak_akses, $nama_lengkap, $unit, $prog_studi, $referensi) 
      {
         $this->mUserId = $user_name;
         $this->mUserNewPassword = $passwd;
         $this->mUserRole = $hak_akses;
         $this->mNamaLengkap = $nama_lengkap;
         $this->mUnit = $unit;
         $this->mProgramStudi = $prog_studi;
         $this->mReferensi = $referensi;
      }
      
      /**
       * ProcessUser::GetSearchUserItem
       * Set all attributes user's class
       *
       * @return array data user
       */
      function GetSearchUserItem($start=0, $limit=10) {
         $params = array($this->mUserId, $start, $limit);
         if(!$this->Connect()) {            
            $dbErrorMsg = $this->GetProperty("DbErrorMessage");
            $this->SetProperty("UserErrorMessage", $dbErrorMsg);
            return false;
         }
         $dataUser = $this->GetAllDataAsArray($this->mSqlQueries['get_search_user_item'], $params);
         if (false === $dataUser) {
            $this->SetProperty("UserErrorMessage", $this->GetProperty("DbErrorMessage"));
            $this->Disconnect();
            return false;            
         }
         else {
            $this->SetProperty("UserErrorMessage", '');
            $this->Disconnect();
            return $dataUser;
         }         
      }
      
      /**
       * ProcessUser::GetSearchUserItem
       * Set all attributes user's class
       *
       * @return array data user
       */
      function CountSearchUserItem() {
         $params = array($this->mUserId);
         if(!$this->Connect()) {            
            $dbErrorMsg = $this->GetProperty("DbErrorMessage");
            $this->SetProperty("UserErrorMessage", $dbErrorMsg);
            return false;
         }
         $dataUser = $this->GetDataAsOne($this->mSqlQueries['count_search_user_item'], $params);
         if (false === $dataUser) {
            $this->SetProperty("UserErrorMessage", "Data tidak ditemukan .... <br> ".$this->GetProperty("DbErrorMessage"));
            $this->Disconnect();
            return false;            
         }
         else {
            $this->SetProperty("UserErrorMessage", '');
            $this->Disconnect();
            return $dataUser;
         }         
      }
      
      /**
        * User::GetAllUserByNiuForAddrBook
        * Get All User for Address Book 
        *
        * @param $start integer nilai awal record
        * @param $limit integer nilai batasan jumlah record yang ditampilkan
        *
        * @return boolean $data
        */
      function GetAllUserByNiuForAddrBook($start, $limit)
      {
         if (!$this->Connect()) {
            $dbErrorMsg = $this->GetProperty("DbErrorMessage");
            $this->SetProperty("UserErrorMessage", $dbErrorMsg);
            return false;
         }
         
         $data = $this->GetAllDataAsArray($this->mSqlQueries['get_search_user_by_new'], array_merge($this->mCondition, array($start, $limit)));
         if (false === $data) {
            $this->SetProperty("UserErrorMessage", "Data Pencarian Mahasiswa Belum Tersedia .... <br> ".$this->GetProperty("DbErrorMessage"));
            $this->Disconnect();
            return false;
         }
         else {
            $this->SetProperty("UserErrorMessage", '');
            $this->Disconnect();
            return $data;
         }
      }
      
      /**
        * User::CountUserByNiu
        * Count User by NIU
        *
        * @param
        * @return integer Jumlah User ID
        *
        */
      function CountUserByNiu()
      {
         if (!$this->Connect()) {
            $dbErrorMsg = $this->GetProperty("DbErrorMessage");
            $this->SetProperty("UserErrorMessage", $dbErrorMsg);
            return false;
         }
         $data = $this->GetAllDataAsArray($this->mSqlQueries['get_count_user_by_niu_new'],$this->mCondition);
         if (false === $data) {
            $this->SetProperty("UserErrorMessage", "Data Pencarian User belum Tersedia .... <br> ".$this->GetProperty("DbErrorMessage"));
            $this->Disconnect();
            return false;
         }
         else {
            $this->SetProperty("UserErrorMessage", '');
            $this->Disconnect();
            return $data;
         }
      }
      
      function GetUserByArrayNiu($arrNiu) {
         if (!$this->Connect()) {
            $dbErrorMsg = $this->GetProperty("DbErrorMessage");
            $this->SetProperty("UserErrorMessage", $dbErrorMsg);
            return false;
         }

         $strNiu = implode("', '", $arrNiu);
         $data = $this->GetAllDataAsArray($this->mSqlQueries['get_user_by_array_niu'], array($strNiu));

         if (false === $data) {
            $this->SetProperty("UserErrorMessage", "Data Pencarian User belum Tersedia .... <br> ".$this->GetProperty("DbErrorMessage"));
            $this->Disconnect();
            return false;
         }
         else {
            $this->SetProperty("UserErrorMessage", '');
            $this->Disconnect();
            return $data;
         }
      } 
		
function GetProdi() {
          if (!$this->Connect()) {
            $dbErrorMsg = $this->GetProperty("DbErrorMessage");
            $this->SetProperty("UserErrorMessage", $dbErrorMsg);
            return false;
         }
         
         $data = $this->GetAllDataAsArray($this->mSqlQueries['select_prodi'], array());
         if (false === $data) {
            $this->SetProperty("UserErrorMessage", $this->GetProperty("DbErrorMessage"));
            $this->Disconnect();
            return false;
         }
         else {
            $this->SetProperty("UserErrorMessage", '');
            $this->Disconnect();
            return $data;
         }
      }
      
      function GetGroupProdi() {
          if (!$this->Connect()) {
            $dbErrorMsg = $this->GetProperty("DbErrorMessage");
            $this->SetProperty("UserErrorMessage", $dbErrorMsg);
            return false;
         }
         
         $data = $this->GetAllDataAsArray($this->mSqlQueries['select_group_prodi'], array());
         if (false === $data) {
            $this->SetProperty("UserErrorMessage", $this->GetProperty("DbErrorMessage"));
            $this->Disconnect();
            return false;
         }
         else {
            $this->SetProperty("UserErrorMessage", '');
            $this->Disconnect();
            return $data;
         }          
      }
		
		function GetServiceSireg(){
			if (!$this->Connect()) {
				$dbErrorMsg = $this->GetProperty("DbErrorMessage");
				$this->SetProperty("UserErrorMessage", $dbErrorMsg);
				return false;
			}

			$data = $this->GetAllDataAsArray($this->mSqlQueries['select_service_sireg'], array());
			if (false === $data) {
				$this->SetProperty("UserErrorMessage", $this->GetProperty("DbErrorMessage"));
				$this->Disconnect();
				return false;
			}
			else {
				$this->SetProperty("UserErrorMessage", '');
				$this->Disconnect();
				return $data[0]['URL'];
			}
		}
   }

?>