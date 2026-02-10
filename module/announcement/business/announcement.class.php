<?php

class Announcement extends DatabaseConnected {
      
   var $mAnnouncementFakultasId;
   var $mAnnouncementId;
   var $mAnnouncementRoleId;
   var $mAnnouncementTypeId;
   var $mAnnouncementDate;
   var $mAnnouncementTitle;
   var $mAnnouncementImageFile;
   var $mAnnouncementImageAlt;
   var $mAnnouncementContent;
   var $mAnnouncementDestination;
   var $mArrAnnouncementFakultasId = array();
   var $mArrAnnouncementDestination = array();
   
   var $mAnnouncementErrorMessage;
   

   function Announcement($configObject) {
      DatabaseConnected::DatabaseConnected($configObject, "module/announcement/business/announcement.sql.php") ;
   }
   
   /**
    * Announcement::GetInformationByType()
    * 
    * Mengambil data pengumuman dengan tipe tertentu
    * 
    * @access Public
    * @param typeId Integer kode tipe pengumuman (Informasi Akademik/Beasiswa/Workshop)
    * @param limit Integer Banyaknya data pengumuman yang diinginkan   
    * @param offset integer Posisi awal data pengumuman yang diinginkan
    * @return Array Array data pengumuman jika ada data atau False jika tidak ada data
    */
   function GetInformationByType($typeId, $limit = false, $offset = false) {
       
       if(!$this->Connect()) {            
         $dbErrorMsg = $this->GetProperty("DbErrorMessage");
         $this->SetProperty("AnnouncementErrorMessage", $dbErrorMsg);
         return false;
      }
      if (false !== $limit && false !== $offset){
         $queryName = 'select_announcement_where_type_limit_offset';
         $params = array($typeId, $offset, $limit);
      } else {
         $queryName = 'select_announcement_where_type';
         $params = array($typeId);
      } 
      $rs = $this->GetAllDataAsArray($this->mSqlQueries[$queryName], $params);
      if (false === $rs) {
         $this->SetProperty("AnnouncementErrorMessage", "Data tidak ditemukan .... <br> ".$this->GetProperty("DbErrorMessage"));
         $this->Disconnect();
         return false;            
      }
      else {
         $this->SetProperty("AnnouncementErrorMessage", '');
         $this->Disconnect();
         return $rs;
      }         
   }

   function GetCountInformationByType() {
      if(!$this->Connect()) {
         $dbErrorMsg = $this->GetProperty("DbErrorMessage");
         $this->SetProperty("AnnouncementErrorMessage", $dbErrorMsg);
         return false;
      }
      
     $queryName = 'get_count_announcement_where_type';
     $params = array($this->mAnnouncementTypeId);

      $data = $this->GetDataAsOne($this->mSqlQueries[$queryName], $params);
      if (false === $data) {
         $this->SetProperty("AnnouncementErrorMessage", "Data Pengumuman Belum Tersedia .... <br> ".$this->GetProperty("DbErrorMessage"));
         $this->Disconnect();
         return false;
      }
      else {
         $this->SetProperty("AnnouncementErrorMessage", '');
         $this->Disconnect();
         return $data;
      }
   }

   /**
    * Announcement::GetDataAnnouncementBasedOnTypeForUserAndFaculty()
    * 
    * Mengambil data pengumuman berdasarkan type pengumuman, hak akses dan fakultas
    * 
    * @access Public        
    * @return Array Array data fakultas jika ada data atau False jika tidak ada data
    */
   function GetDataAnnouncementBasedOnTypeForUserAndFaculty($start, $limit) {
      if(!$this->Connect()) {            
         $dbErrorMsg = $this->GetProperty("DbErrorMessage");
         $this->SetProperty("AnnouncementErrorMessage", $dbErrorMsg);
         return false;
      }
      $params = array($this->mAnnouncementTypeId, $this->mAnnouncementRoleId, $this->mAnnouncementFakultasId, $start, $limit);
      $data = $this->GetAllDataAsArray($this->mSqlQueries['get_data_announcementbased_on_type_for_user_and_faculty'], $params);
      if (false === $data) {
         $this->SetProperty("AnnouncementErrorMessage", "Data Pengumuman Tidak Ditemukan .... <br> ".$this->GetProperty("DbErrorMessage"));
         $this->Disconnect();
         return false;
      }
      else {
         $this->SetProperty("AnnouncementErrorMessage", '');
         $this->Disconnect();
         return $data;
      }
   }
   
   /**
    * Announcement::GetCountDataAnnouncementBasedOnTypeForUserAndFaculty()
    * 
    * Mengambil count data pengumuman berdasarkan type pengumuman, hak akses dan fakultas
    * 
    * @access Public        
    * @return Array Array data fakultas jika ada data atau False jika tidak ada data
    */
   function GetCountDataAnnouncementBasedOnTypeForUserAndFaculty() {
      if(!$this->Connect()) {            
         $dbErrorMsg = $this->GetProperty("DbErrorMessage");
         $this->SetProperty("AnnouncementErrorMessage", $dbErrorMsg);
         return false;
      }
      $params = array($this->mAnnouncementTypeId, $this->mAnnouncementRoleId, $this->mAnnouncementFakultasId);
      $data = $this->GetDataAsOne($this->mSqlQueries['get_count_data_announcementbased_on_type_for_user_and_faculty'], $params);
      if (false === $data) {
         $this->SetProperty("AnnouncementErrorMessage", "Data Count Pengumuman Tidak Ditemukan .... <br> ".$this->GetProperty("DbErrorMessage"));
         $this->Disconnect();
         return false;
      }
      else {
         $this->SetProperty("AnnouncementErrorMessage", '');
         $this->Disconnect();
         return $data;
      }
   }
   
   /**
    * Announcement::GetAllAnnouncementForFaculty()
    * 
    * Mengambil data fakultas dimana pengumuman ybs diperuntukkan
    * 
    * @access Public        
    * @return Array Array data fakultas jika ada data atau False jika tidak ada data
    */
   function GetAllAnnouncementForFaculty() {
      if(!$this->Connect()) {            
         $dbErrorMsg = $this->GetProperty("DbErrorMessage");
         $this->SetProperty("AnnouncementErrorMessage", $dbErrorMsg);
         return false;
      }
      $params = array($this->mAnnouncementId);
      $data = $this->GetAllDataAsArray($this->mSqlQueries['get_all_announcement_for_faculty'], $params);
      if (false === $data) {
         $this->SetProperty("AnnouncementErrorMessage", "Data Fakultas Pengumuman Tidak Ditemukan .... <br> ".$this->GetProperty("DbErrorMessage"));
         $this->Disconnect();
         return false;
      }
      else {
         $this->SetProperty("AnnouncementErrorMessage", '');
         $this->Disconnect();
         return $data;
      }
   }
   
   /**
    * Announcement::GetAllAnnouncementForAccessRight()
    * 
    * Mengambil data hak akses dimana pengumuman ybs diperuntukkan
    * 
    * @access Public        
    * @return Array Array data hak akses jika ada data atau False jika tidak ada data
    */
   function GetAllAnnouncementForAccessRight() {
      if(!$this->Connect()) {            
         $dbErrorMsg = $this->GetProperty("DbErrorMessage");
         $this->SetProperty("AnnouncementErrorMessage", $dbErrorMsg);
         return false;
      }
      $params = array($this->mAnnouncementId);
      $data = $this->GetAllDataAsArray($this->mSqlQueries['get_all_announcement_for_accessright'], $params);
      if (false === $data) {
         $this->SetProperty("AnnouncementErrorMessage", "Data Hakakses Pengumuman Tidak Ditemukan .... <br> ".$this->GetProperty("DbErrorMessage"));
         $this->Disconnect();
         return false;
      }
      else {
         $this->SetProperty("AnnouncementErrorMessage", '');
         $this->Disconnect();
         return $data;
      }
   }
   
   /**
    * Announcement::GetAnnouncementDataDetail()
    * 
    * Mengambil detail data pengumuman 
    * 
    * @access Public        
    * @return Array Array data pengumuman jika ada data atau False jika tidak ada data
    */
   function GetAnnouncementDataDetail() {
      if(!$this->Connect()) {            
         $dbErrorMsg = $this->GetProperty("DbErrorMessage");
         $this->SetProperty("AnnouncementErrorMessage", $dbErrorMsg);
         return false;
      }
      $params = array($this->mAnnouncementId);
      $data = $this->GetAllDataAsArray($this->mSqlQueries['get_announcement_data_detail'], $params);
      if (false === $data) {
         $this->SetProperty("AnnouncementErrorMessage", "Data Pengumuman Tidak Ditemukan .... <br> ".$this->GetProperty("DbErrorMessage"));
         $this->Disconnect();
         return false;
      }
      else {
         $this->SetProperty("AnnouncementErrorMessage", '');
         $this->Disconnect();
         return $data;
      }
   }
   
   /**
    * Announcement::GetAllDataInformation()
    * 
    * Mengambil data pengumuman dengan fakultas dan hak akses tertentu
    * 
    * @access Public    
    * @param Integer $limit Banyaknya data pengumuman yang diinginkan   
    * @param Integer $offset Posisi awal data pengumuman yang diinginkan
    * @return Array Array data pengumuman jika ada data atau False jika tidak ada data
    */
   function GetAllDataInformation($offset, $limit) {
      if(!$this->Connect()) {            
         $dbErrorMsg = $this->GetProperty("DbErrorMessage");
         $this->SetProperty("AnnouncementErrorMessage", $dbErrorMsg);
         return false;
      }
      
      if ($this->mAnnouncementFakultasId == '') {
         $queryName = 'get_all_data_information';
         $params = array($offset, $limit);
      } else {         
         $queryName = 'get_all_information_where_faculty';
         $params = array($this->mAnnouncementFakultasId, $offset, $limit);
      }   
      
      $data = $this->GetAllDataAsArray($this->mSqlQueries[$queryName], $params);
      if (false === $data) {
         $this->SetProperty("AnnouncementErrorMessage", "Data Pengumuman Belum Tersedia .... <br> ".$this->GetProperty("DbErrorMessage"));
         $this->Disconnect();
         return false;
      }
      else {
         $this->SetProperty("AnnouncementErrorMessage", '');
         $this->Disconnect();
         return $data;
      }
   }
   
   /**
    * Announcement::GetAllCountDataInformation()
    * 
    * Mengambil jumlah data pengumuman dengan fakultas dan hak akses tertentu
    * 
    * @access Public        
    * @return integer jumlah data pengumuman jika ada data atau False jika tidak ada data
    */
   function GetCountAllDataInformation() {
      if(!$this->Connect()) {            
         $dbErrorMsg = $this->GetProperty("DbErrorMessage");
         $this->SetProperty("AnnouncementErrorMessage", $dbErrorMsg);
         return false;
      }
      
      if ($this->mAnnouncementFakultasId == '') {
         $queryName = 'get_count_all_data_information';
         $params = array();
      } else {         
         $queryName = 'get_count_all_information_where_faculty';
         $params = array($this->mAnnouncementFakultasId);
      }   
      
      $data = $this->GetDataAsOne($this->mSqlQueries[$queryName], $params);
      if (false === $data) {
         $this->SetProperty("AnnouncementErrorMessage", "Data Pengumuman Belum Tersedia .... <br> ".$this->GetProperty("DbErrorMessage"));
         $this->Disconnect();
         return false;
      }
      else {
         $this->SetProperty("AnnouncementErrorMessage", '');
         $this->Disconnect();
         return $data;
      }
   }
   
   /**
    * Announcement::GetAllTypeInformation()
    * 
    * Mengambil data jenis pengumuman 
    * 
    * @access Public        
    * @return array data jenis pengumuman jika ada data atau False jika tidak ada data
    */
   function GetAllTypeInformation() {
      if(!$this->Connect()) {            
         $dbErrorMsg = $this->GetProperty("DbErrorMessage");
         $this->SetProperty("AnnouncementErrorMessage", $dbErrorMsg);
         return false;
      }
      $data = $this->GetAllDataAsArray($this->mSqlQueries['get_all_type_information'], array());
      if (false === $data) {
         $this->SetProperty("AnnouncementErrorMessage", "Data Jenis Pengumuman Belum Tersedia .... <br> ".$this->GetProperty("DbErrorMessage"));
         $this->Disconnect();
         return false;
      }
      else {
         $this->SetProperty("AnnouncementErrorMessage", '');
         $this->Disconnect();
         return $data;
      }
   }
   
   /**
    * Announcement::GetMaximumAnnouncementId()
    * 
    * Mengambil data maximum id pengumuman
    * 
    * @access Public        
    * @return integer jika ada data atau False jika tidak ada data
    */
   function GetMaximumAnnouncementId() {      
      $data = $this->GetDataAsOne($this->mSqlQueries['get_maximum_announcement_id'], array());
      if (false === $data) {
         $this->SetProperty("AnnouncementErrorMessage", "Data Maksimum Id Pengumuman tidak ditemukan .... <br> ".$this->GetProperty("DbErrorMessage"));
         return false;
      }
      else {
         $this->SetProperty("AnnouncementErrorMessage", '');
         return $data;
      }
   }
   
   /**
    * Announcement::DoAddAnnouncementDataItem()
    * 
    * Menambahkan data pengumuman kedalam tabel pengumuman
    * 
    * @access Public        
    * @return boolean
    */
   function DoAddAnnouncementDataItem() {
      $params = array($this->mAnnouncementTypeId, $this->mAnnouncementTitle, $this->mAnnouncementContent, 
                      $this->mAnnouncementImageFile, $this->mAnnouncementImageAlt);    
	  //echo "<pre>";print_r($params);echo "</pre>";  
      $result = $this->ExecuteInsertQuery($this->mSqlQueries['do_add_announcement_data_item'], $params);
      if (false === $result) {
         $this->SetProperty("AnnouncementErrorMessage", 'Proses tambah pengumuman gagal <br />'. $this->GetProperty("DbErrorMessage"));
         return false;
      }
      else {
         $this->SetProperty("AnnouncementErrorMessage", 'Proses tambah berhasil');
         return $result;
      }
   }
   
   /**
    * Announcement::DoUpdateAnnouncementDataItem()
    * 
    * Mengubah data pengumuman kedalam tabel pengumuman
    * 
    * @access Public        
    * @return boolean
    */
   function DoUpdateAnnouncementDataItem() {
      $params = array($this->mAnnouncementTypeId, $this->mAnnouncementDate, $this->mAnnouncementTitle, 
                      $this->mAnnouncementContent, $this->mAnnouncementImageFile, $this->mAnnouncementImageAlt,
                      $this->mAnnouncementId);      
      $result = $this->ExecuteUpdateQuery($this->mSqlQueries['do_update_announcement_data_item'], $params);
      if (false === $result) {
         $this->SetProperty("AnnouncementErrorMessage", 'Proses ubah pengumuman gagal <br />'. $this->GetProperty("DbErrorMessage"));
         return false;
      }
      else {
         $this->SetProperty("AnnouncementErrorMessage", 'Proses ubah berhasil');
         return $result;
      }
   }
   
   /**
    * Announcement::DoAddAnnouncementFacultyItem()
    * 
    * Menambahkan data fakultas pengumuman link kedalam tabel 
    * 
    * @access Public        
    * @return boolean
    */
   function DoAddAnnouncementFacultyItem() {
      $params = array($this->mAnnouncementId, $this->mAnnouncementFakultasId);      
      $result = $this->ExecuteInsertQuery($this->mSqlQueries['do_add_announcement_faculty_item'], $params);
      if (false === $result) {
         $this->SetProperty("AnnouncementErrorMessage", 'Proses tambah pengumuman fakultas gagal <br />'. $this->GetProperty("DbErrorMessage"));
         return false;
      }
      else {
         $this->SetProperty("AnnouncementErrorMessage", 'Proses tambah berhasil');
         return $result;
      }
   }
   
   /**
    * Announcement::DoDeleteAnnouncementFacultyItem()
    * 
    * Menghapus data fakultas pengumuman link dalam tabel 
    * 
    * @access Public        
    * @return boolean
    */
   function DoDeleteAnnouncementFacultyItem() {
      $params = array($this->mAnnouncementId);      
      $result = $this->ExecuteDeleteQuery($this->mSqlQueries['do_delete_announcement_faculty_item'], $params);
      if (false === $result) {
         $this->SetProperty("AnnouncementErrorMessage", 'Proses hapus pengumuman fakultas gagal <br />'. $this->GetProperty("DbErrorMessage"));
         return false;
      }
      else {
         $this->SetProperty("AnnouncementErrorMessage", 'Proses hapus berhasil');
         return $result;
      }
   }
   
   /**
    * Announcement::DoAddAnnouncementDestinationItem()
    * 
    * Menambahkan data tujuan pengumuman link kedalam tabel 
    * 
    * @access Public        
    * @return boolean
    */
   function DoAddAnnouncementDestinationItem() {
      $params = array($this->mAnnouncementId, $this->mAnnouncementDestination);      
      $result = $this->ExecuteInsertQuery($this->mSqlQueries['do_add_announcement_destination_item'], $params);
      if (false === $result) {
         $this->SetProperty("AnnouncementErrorMessage", 'Proses tambah hak akses pengumuman gagal <br />'. $this->GetProperty("DbErrorMessage"));
         return false;
      }
      else {
         $this->SetProperty("AnnouncementErrorMessage", 'Proses tambah berhasil');
         return $result;
      }
   }
   
   /**
    * Announcement::DoDeleteAnnouncementDestinationItem()
    * 
    * Menghapus data tujuan pengumuman link dalam tabel 
    * 
    * @access Public        
    * @return boolean
    */
   function DoDeleteAnnouncementDestinationItem() {
      $params = array($this->mAnnouncementId);      
      $result = $this->ExecuteDeleteQuery($this->mSqlQueries['do_delete_announcement_destination_item'], $params);
      if (false === $result) {
         $this->SetProperty("AnnouncementErrorMessage", 'Proses hapus hak akses pengumuman gagal <br />'. $this->GetProperty("DbErrorMessage"));
         return false;
      }
      else {
         $this->SetProperty("AnnouncementErrorMessage", 'Proses hapus berhasil');
         return $result;
      }
   }
   
   /**
    * Announcement::DoDeleteAnnouncementDataItem()
    * 
    * Menghapus data pengumuman
    * 
    * @access Public 
    * @return boolean
    */
   function DoDeleteAnnouncementDataItem() {
      if(!$this->Connect()) {            
         $dbErrorMsg = $this->GetProperty("DbErrorMessage");
         $this->SetProperty("AnnouncementErrorMessage", $dbErrorMsg);
         return false;
      }      
      $params = array($this->mAnnouncementId);
      $result = $this->ExecuteDeleteQuery($this->mSqlQueries['do_delete_announcement_data_item'], $params);
      if (false === $result) {
         $this->SetProperty("AnnouncementErrorMessage", "Proses hapus gagal .... <br> ".$this->GetProperty("DbErrorMessage"));
         $this->Disconnect();
         return false;
      }
      else {
         $this->SetProperty("AnnouncementErrorMessage", '');
         $this->Disconnect();
         return $result;
      }
   }
   
   function GetTypeName($id) {
      if(!$this->Connect()) {            
         $dbErrorMsg = $this->GetProperty("DbErrorMessage");
         $this->SetProperty("AnnouncementErrorMessage", $dbErrorMsg);
         return false;
      }
      
      $rs = $this->GetAllDataAsArray($this->mSqlQueries['select_nama_tipe'], array($id));
      if (false === $rs) {
         $this->SetProperty("AnnouncementErrorMessage", "Data tidak ditemukan .... <br> ".$this->GetProperty("DbErrorMessage"));
         $this->Disconnect();
         return false;            
      }
      else {
         $this->SetProperty("AnnouncementErrorMessage", '');
         $this->Disconnect();
         return $rs;
      }     
   }

    #add ccp 3-12-2019
   function GetInformationByTypeAll($typeId) {
       
       if(!$this->Connect()) {            
         $dbErrorMsg = $this->GetProperty("DbErrorMessage");
         $this->SetProperty("AnnouncementErrorMessage", $dbErrorMsg);
         return false;
      }
     
         $queryName = 'select_announcement_where_type';
         $params = array($typeId);
      
      $rs = $this->GetAllDataAsArray($this->mSqlQueries[$queryName], $params);
      if (false === $rs) {
         $this->SetProperty("AnnouncementErrorMessage", "Data tidak ditemukan .... <br> ".$this->GetProperty("DbErrorMessage"));
         $this->Disconnect();
         return false;            
      }
      else {
         $this->SetProperty("AnnouncementErrorMessage", '');
         $this->Disconnect();
         return $rs;
      }         
   }
}
?>