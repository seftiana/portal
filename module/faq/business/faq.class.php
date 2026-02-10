<?php
/**
 * Faq
 * Faq class
 * 
 * @package faq
 * @author Gitra Perdana
 * @copyright Copyright (c) 2006 GamaTechno
 * @version 1.0 
 * @date 2006-09-12
 * @revision 
 *
 */

class Faq extends DatabaseConnected{
   var $mFaqId;
   var $mFaqQuestion;
   var $mFaqAnswer;
   var $mFaqKategoriId;
   var $mFaqIsPublic;
   var $mFaqKategoriNama;
   var $mFaqKategoriKeterangan;
   var $mFaqTujuan;
   var $mFaqErrorMessage;
   var $mUserRoleId;

   function faq($configObject){
      DatabaseConnected::DatabaseConnected($configObject, "module/faq/business/faq.sql.php") ;
   }

   function GetTotalData($kategoriId = ""){
      if (!$this->Connect()) {
         $this->SetProperty("FaqErrorMessage", $this->GetProperty("DbErrorMessage"));
         return false;
      }
      $params = array();
      $sql = "get_total_data";
      if (!empty($kategoriId)){
         $params = array($kategoriId);
         $sql = "get_total_data_by_kategori";        
      }

      $data = $this->GetDataAsOne($this->mSqlQueries[$sql], $params);
      
      if (!empty($data)) {
         $this->SetProperty("FaqErrorMessage", "Total Data FAQ belum tersedia .... <br> ".$this->GetProperty("DbErrorMessage"));
      } else {
         $this->SetProperty("FaqErrorMessage", '');
      }
      $this->Disconnect();
      return $data;
   }

   function GetTotalDataKategori(){
      if (!$this->Connect()) {
         $this->SetProperty("FaqErrorMessage", $this->GetProperty("DbErrorMessage"));
         return false;
      }

      $data = $this->GetDataAsOne($this->mSqlQueries['get_total_data_kategori'], array());
      
      if (!empty($data)) {
         $this->SetProperty("FaqErrorMessage", "Total Data Kategori FAQ belum tersedia .... <br> ".$this->GetProperty("DbErrorMessage"));
      } else {
         $this->SetProperty("FaqErrorMessage", '');
      }
      $this->Disconnect();
      return $data;
   }

   function GetFaqData($limit = "", $offset = ""){
      if (!$this->Connect()) {
         $this->SetProperty("FaqErrorMessage", $this->GetProperty("DbErrorMessage"));
         return false;
      }

      $params = array();
      $sql = "get_faq_data";
      if (!empty($limit) && !empty($offset)) {
         $params = array($offset, $limit);
         $sql = "get_faq_data_offset_limit";
      }
      $data = $this->GetAllDataAsArray($this->mSqlQueries[$sql], $params);

      if (false === $data) {
         $this->SetProperty("FaqErrorMessage", "Data FAQ belum tersedia .... <br> ".$this->GetProperty("DbErrorMessage"));
      } else {
         $this->SetProperty("FaqErrorMessage", '');
      }
      $this->Disconnect();
      return $data;
   }

   function GetFaqDataByKategori($limit = "", $offset = ""){
      if (!$this->Connect()) {
         $this->SetProperty("FaqErrorMessage", $this->GetProperty("DbErrorMessage"));
         return false;
      }

      $params = array($this->mFaqKategoriId);
      $sql = 'get_faq_data_by_kategori';
      if (!empty($limit) && !empty($offset)) {
         $params = array($this->mFaqKategoriId, $offset, $limit);
         $sql = "get_faq_data_by_kategori_offset_limit";
      }
      $data = $this->GetAllDataAsArray($this->mSqlQueries[$sql], $params);
      if (false === $data) {
         $this->SetProperty("FaqErrorMessage", "Data FAQ belum tersedia .... <br> ".$this->GetProperty("DbErrorMessage"));
      } else {
         $this->SetProperty("FaqErrorMessage", '');
      }
      $this->Disconnect();
      return $data;
   }

   function GetFaqDataByKategoriUserrole($limit = "", $offset = ""){
      if (!$this->Connect()) {
         $this->SetProperty("FaqErrorMessage", $this->GetProperty("DbErrorMessage"));
         return false;
      }

      $params = array($this->mFaqKategoriId,$this->mFaqTujuan);
      $sql = "get_faq_data_by_kategori_userrole";
      if (!empty($limit) && !empty($offset)) {
         $params = array($this->mFaqKategoriId,$this->mFaqTujuan, $limit, $offset);
         $sql = "get_faq_data_by_kategori_userrole_offset_limit";
      }
      $data = $this->GetAllDataAsArray($this->mSqlQueries[$sql], $params);
      
      if (false === $data) {
         $this->SetProperty("FaqErrorMessage", "Data FAQ belum tersedia .... <br> ".$this->GetProperty("DbErrorMessage"));
      } else {
         $this->SetProperty("FaqErrorMessage", '');
      }
      $this->Disconnect();
      return $data;
   }

   function GetFaqDataByUserrole($limit = "", $offset = ""){
      if (!$this->Connect()) {
         $this->SetProperty("FaqErrorMessage", $this->GetProperty("DbErrorMessage"));
         return false;
      }
		$tujuan = implode(",", $this->mFaqTujuan);
      $params = array($tujuan);
      $sql = "get_faq_data_by_userrole";
		
      if (!empty($limit) && !empty($offset)) {
			$params = array($tujuan, $limit, $offset);
         $sql = "get_faq_data_by_userrole_offset_limit";
      }
      $data = $this->GetAllDataAsArray($this->mSqlQueries[$sql], $params);
      if (false === $data) {
         $this->SetProperty("FaqErrorMessage", "Data FAQ belum tersedia .... <br> ".$this->GetProperty("DbErrorMessage"));
      } else {
         $this->SetProperty("FaqErrorMessage", '');
      }
      $this->Disconnect();
      return $data;
   }

   function GetKategoriFaq($limit = "", $offset = "",$lengkap = ""){
      if (!$this->Connect()) {
         $this->SetProperty("FaqErrorMessage", $this->GetProperty("DbErrorMessage"));
         return false;
      }
		$params = array();
		if ($lengkap == "") {
			if ($limit=="" || $offset=="" ) {
				$sql = "get_kategori_faq";
			} else {
				$params = array($limit, $offset);
				$sql = "get_kategori_faq_offset_limit";
			}
		} else {
			$sql = "get_kategori_faq_lengkap";
		}
      $data = $this->GetAllDataAsArray($this->mSqlQueries[$sql], $params);

      if (false === $data) {
         $this->SetProperty("FaqErrorMessage", "Data Kategori FAQ belum tersedia .... <br> ".$this->GetProperty("DbErrorMessage"));
      } else {
         $this->SetProperty("FaqErrorMessage", '');
      }
      $this->Disconnect();
      return $data;
   }

   function GetKategoriFaqById(){
      if (!$this->Connect()) {
         $this->SetProperty("FaqErrorMessage", $this->GetProperty("DbErrorMessage"));
         return false;
      }
      $data = $this->GetAllDataAsArray($this->mSqlQueries['get_kategori_faq_by_id'], array($this->mFaqKategoriId));
      if (false === $data) {
         $this->SetProperty("FaqErrorMessage", "Data FAQ belum tersedia .... <br> ".$this->GetProperty("DbErrorMessage"));
      } else {
         $this->SetProperty("FaqErrorMessage", '');
      }
      $this->Disconnect();
      return $data;
   }

   function GetFaqDataById($lengkap =false){
      if (!$this->Connect()) {
         $this->SetProperty("FaqErrorMessage", $this->GetProperty("DbErrorMessage"));
         return false;
      }
		$query = 'get_faq_data_by_id';
		if ($lengkap === true) {
			$query = 'get_faq_data_lengkap_by_id';
		}
      $data = $this->GetAllDataAsArray($this->mSqlQueries[$query], array($this->mFaqId));
      if (false === $data) {
         $this->SetProperty("FaqErrorMessage", "Data FAQ belum tersedia .... <br> ".$this->GetProperty("DbErrorMessage"));
      } else {
         $this->SetProperty("FaqErrorMessage", '');
      }
      $this->Disconnect();
      return $data;
   }

   function DoAddFaqKategori(){
      if (!$this->Connect()) {
         $this->SetProperty("FaqErrorMessage", $this->GetProperty("DbErrorMessage"));
         return false;
      }
      $param= array($this->mFaqKategoriNama, $this->mFaqKategoriKeterangan);
      $addFaqKategori = $this->ExecuteInsertQuery($this->mSqlQueries['do_add_faq_kategori'], $param);
      if (false === $addFaqKategori){
         $this->SetProperty("FaqErrorMessage", "Tambah Kategori FAQ Tidak Berhasil .... <br> ".$this->GetProperty("DbErrorMessage"));
         $this->Disconnect();
         return false;
      } else {
         $this->SetProperty("FaqErrorMessage", '');
         $this->Disconnect();
         return true;
      }
   }

   function DoUpdateFaqKategori(){
      if (!$this->Connect()) {
         $this->SetProperty("FaqErrorMessage", $this->GetProperty("DbErrorMessage"));
         return false;
      }
      $param= array($this->mFaqKategoriNama, $this->mFaqKategoriKeterangan, $this->mFaqKategoriId);
		$updateFaqKategori = $this->ExecuteUpdateQuery($this->mSqlQueries['do_update_faq_kategori'], $param);
		$this->mDbConnection->debug = true;
      if (false === $updateFaqKategori){
         $this->SetProperty("FaqErrorMessage", "Proses ubah kategori FAQ tidak berhasil .... <br> ".$this->GetProperty("DbErrorMessage"));
         $this->Disconnect();
         return false;
      } else {
         $this->SetProperty("FaqErrorMessage", '');
         $this->Disconnect();
         return true;
      }
   }

   function DoDeleteFaqKategori(){
      if(!$this->Connect()) {
         $this->SetProperty("FaqErrorMessage", $this->GetProperty("DbErrorMessage"));
         return false;
      }
      $delFaqKategori = $this->ExecuteDeleteQuery($this->mSqlQueries['do_delete_faq_kategori'], array($this->mFaqKategoriId));
      if (false === $delFaqKategori){
         $this->SetProperty("FaqErrorMessage", "Proses hapus data kategori FAQ tidak berhasil .... <br> ".$this->GetProperty("DbErrorMessage"));
         $this->Disconnect();
         return false;
      } else {
         $this->SetProperty("FaqErrorMessage", '');
         $this->Disconnect();
         return true;
      }
   }

   function DoAddFaq(){
      if (!$this->Connect()) {
         $this->SetProperty("FaqErrorMessage", $this->GetProperty("DbErrorMessage"));
         return false;
      }
		//$this->mDbConnection->debug = true;
		$this->StartTransaction();
		$param= array($this->mFaqQuestion, $this->mFaqAnswer, $this->mFaqKategoriId, $this->mFaqIsPublic);
		$addFaq = $this->ExecuteInsertQuery($this->mSqlQueries['do_add_faq'], $param);
      if($this->mFaqIsPublic !== true){
			foreach($this->mFaqTujuan as $key=>$value){
				$addFaq = $this->DoAddFaqTujuan($value);
			}
      }
		$this->CompleteTransaction($addFaq);
		if (false === $addFaq){
         $this->SetProperty("FaqErrorMessage", "Tambah FAQ Tidak Berhasil .... <br> ".$this->GetProperty("DbErrorMessage"));
         $this->Disconnect();
         return false;
      } else {
         $this->SetProperty("FaqErrorMessage", '');
         $this->Disconnect();
         return true;
      }
   }

   function DoUpdateFaq(){
		if (!$this->Connect()) {
         $this->SetProperty("FaqErrorMessage", $this->GetProperty("DbErrorMessage"));
         return false;
      }
		$this->StartTransaction();
		$isPublic = 0;
		if ($this->mFaqIsPublic === true) {
			$isPublic = 1;
		}
      $param= array($this->mFaqQuestion, $this->mFaqAnswer, $this->mFaqKategoriId, $isPublic, $this->mFaqId);
      $updateFaq = $this->ExecuteUpdateQuery($this->mSqlQueries['do_update_faq'], $param);
		$updateFaq = $this->DoDeleteFaqTujuan();
		if($this->mFaqIsPublic !== true){
         foreach($this->mFaqTujuan as $key=>$value){
				$updateFaq = $this->DoUpdateFaqTujuan($value);
			}
      }
		$this->CompleteTransaction($updateFaq);
		$this->Disconnect();
      if (false === $updateFaq){
         $this->SetProperty("FaqErrorMessage", "Proses ubah FAQ tidak berhasil .... <br> ".$this->GetProperty("DbErrorMessage"));
      } else {
         $this->SetProperty("FaqErrorMessage", '');
      }
		return $updateFaq;
   }

   function DoDeleteFaq(){
      if(!$this->Connect()) {
         $this->SetProperty("FaqErrorMessage", $this->GetProperty("DbErrorMessage"));
         return false;
      }
		$this->StartTransaction();
      $delFaq = $this->DoDeleteFaqTujuan();
      $delFaq = $this->ExecuteDeleteQuery($this->mSqlQueries['do_delete_faq'], array($this->mFaqId));
		$this->CompleteTransaction($delFaq);
		$this->Disconnect();
      if (false === $delFaq){
         $this->SetProperty("FaqErrorMessage", "Proses hapus data FAQ tidak berhasil .... <br> ".$this->GetProperty("DbErrorMessage"));
      } else {
         $this->SetProperty("FaqErrorMessage", '');
      }
		return $delFaq;
   }

   function DoAddFaqTujuan($userRoleId){
      $addFaqTujuan = $this->ExecuteInsertQuery($this->mSqlQueries['do_add_faq_tujuan'], array($userRoleId));
      if (false === $addFaqTujuan){
         $this->SetProperty("FaqErrorMessage", "Tambah FAQ Tidak Berhasil .... <br> ".$this->GetProperty("DbErrorMessage"));
      } else {
         $this->SetProperty("FaqErrorMessage", '');
      }
		return $addFaqTujuan;
   }

   function DoUpdateFaqTujuan($userRoleId){
      $param= array($this->mFaqId, $userRoleId);
      $updateFaqTujuan = $this->ExecuteUpdateQuery($this->mSqlQueries['do_update_faq_tujuan'], $param);
      if (false === $updateFaqKategori){
         $this->SetProperty("FaqErrorMessage", "Proses ubah kategori FAQ tidak berhasil .... <br> ".$this->GetProperty("DbErrorMessage"));
      } else {
         $this->SetProperty("FaqErrorMessage", '');
      }
		return $updateFaqTujuan ;
   }

   function DoDeleteFaqTujuan(){
      $delFaqTujuan = $this->ExecuteDeleteQuery($this->mSqlQueries['do_delete_faq_tujuan'], array($this->mFaqId));
      if (false === $delFaqTujuan){
         $this->SetProperty("FaqErrorMessage", "Proses hapus data kategori FAQ tidak berhasil .... <br> ".$this->GetProperty("DbErrorMessage"));
      } else {
         $this->SetProperty("FaqErrorMessage", '');
      }
		return $delFaqTujuan;
   }

}
?>