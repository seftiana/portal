<?php
/**
 * Reference
 * Class for load all the reference
 * 
 * @package 
 * @author Maya Alipin
 * @copyright Copyright (c) 2006 GamaTechno
 * @version 1.0 
 * @date 2006-02-02
 * @revision 
 *
 */

class Reference extends DatabaseConnected{
   var $mReferenceErrorMsg;
   
   function Reference ($configObject) {
      DatabaseConnected::DatabaseConnected($configObject, "module/reference/business/reference.sql.php") ;
   }
   
   function LoadHakAkses() {
      $params = array();
      if(!$this->Connect()) {            
         $dbErrorMsg = $this->GetProperty("DbErrorMessage");
         $this->SetProperty("ReferenceErrorMsg", $dbErrorMsg);
         return false;
      }
      $data = $this->GetAllDataAsArray($this->mSqlQueries['get_all_hak_akses'], $params);
      if (false === $data) {
         $this->SetProperty("ReferenceErrorMsg", "Data tidak ditemukan .... <br> ".$this->GetProperty("DbErrorMessage"));
      } else {
         $this->SetProperty("ReferenceErrorMsg", '');
      }
      $this->Disconnect();
      return $data;         
   }
   
   function LoadHakAksesById($hakAksesId) {
      $params = array($hakAksesId);
      if(!$this->Connect()) {            
         $dbErrorMsg = $this->GetProperty("DbErrorMessage");
         $this->SetProperty("ReferenceErrorMsg", $dbErrorMsg);
         return false;
      }
      $data = $this->GetAllDataAsArray($this->mSqlQueries['get_hak_akses_by_id'], $params);
      if (false === $data) {
         $this->SetProperty("ReferenceErrorMsg", "Data tidak ditemukan .... <br> ".$this->GetProperty("DbErrorMessage"));
      } else {
         $this->SetProperty("ReferenceErrorMsg", '');
      }         
      $this->Disconnect();
      return $data;
   }
	
	function LoadHakAksesByArrayId($hakAksesId) {
      $params = array(implode($hakAksesId, ","));
      if(!$this->Connect()) {            
         $dbErrorMsg = $this->GetProperty("DbErrorMessage");
         $this->SetProperty("ReferenceErrorMsg", $dbErrorMsg);
         return false;
      }
      $data = $this->GetAllDataAsArray($this->mSqlQueries['get_hak_akses_by_array_id'], $params);
      if (false === $data) {
         $this->SetProperty("ReferenceErrorMsg", "Data tidak ditemukan .... <br> ".$this->GetProperty("DbErrorMessage"));
      } else {
         $this->SetProperty("ReferenceErrorMsg", '');
      }         
      $this->Disconnect();
      return $data;
   }
	
   function LoadUnit() {
      $params = array();
      if(!$this->Connect()) {            
         $dbErrorMsg = $this->GetProperty("DbErrorMessage");
         $this->SetProperty("ReferenceErrorMsg", $dbErrorMsg);
         return false;
      }
      $data = $this->GetAllDataAsArray($this->mSqlQueries['get_all_unit'], $params);
      if (false === $data) {
         $this->SetProperty("ReferenceErrorMsg", "Data tidak ditemukan .... <br> ".$this->GetProperty("DbErrorMessage"));
      } else {
         $this->SetProperty("ReferenceErrorMsg", '');
      } 
      $this->Disconnect();
      return $data;        
   }
   
   function LoadUnitById($unitId) {
      $params = array($unitId);
      if(!$this->Connect()) {            
         $dbErrorMsg = $this->GetProperty("DbErrorMessage");
         $this->SetProperty("ReferenceErrorMsg", $dbErrorMsg);
         return false;
      }
      $data = $this->GetAllDataAsArray($this->mSqlQueries['get_unit_by_id'], $params);
      if (false === $data) {
         $this->SetProperty("ReferenceErrorMsg", "Data tidak ditemukan .... <br> ".$this->GetProperty("DbErrorMessage"));
      } else {
         $this->SetProperty("ReferenceErrorMsg", '');
      }         
      $this->Disconnect();
      return $data;

   }
   
   function LoadProdiById($prodiId) {
       $params = array($prodiId);
      if(!$this->Connect()) {            
         $dbErrorMsg = $this->GetProperty("DbErrorMessage");
         $this->SetProperty("ReferenceErrorMsg", $dbErrorMsg);
         return false;
      }
      $data = $this->GetAllDataAsArray($this->mSqlQueries['get_prodi_by_id'], $params);
      if (false === $data) {
         $this->SetProperty("ReferenceErrorMsg", "Data tidak ditemukan .... <br> ".$this->GetProperty("DbErrorMessage"));
      } else {
         $this->SetProperty("ReferenceErrorMsg", '');
      } 
      $this->Disconnect();
      return $data;        
   }
   
   function LoadProdi($start, $limit, $prodiName="") {
      if ($prodiName != ""){
         $params = array($prodiName,$start, $limit);
         $queryName = "get_prodi_by_nama_with_limit";
      }else{
         $params = array($start, $limit);
         $queryName = "get_prodi_with_limit";
      }
      
      if(!$this->Connect()) {            
         $dbErrorMsg = $this->GetProperty("DbErrorMessage");
         $this->SetProperty("ReferenceErrorMsg", $dbErrorMsg);
         return false;
      }
      $data = $this->GetAllDataAsArray($this->mSqlQueries[$queryName], $params);
      if (false === $data) {
         $this->SetProperty("ReferenceErrorMsg", $this->GetProperty("DbErrorMessage"));
      } else {
         $this->SetProperty("ReferenceErrorMsg", '');
      }         
      $this->Disconnect();
      return $data;
   }
   
   function CountProdi($prodiName="") {
      $queryNameAdd = "";
      if ($prodiName != ""){
         $params = array($prodiName);
         $queryNameAdd = "_by_nama";
      }else{
         $params = array();
      }
      if(!$this->Connect()) {            
         $dbErrorMsg = $this->GetProperty("DbErrorMessage");
         $this->SetProperty("ReferenceErrorMsg", $dbErrorMsg);
         return false;
      }
      $data = $this->GetAllDataAsArray($this->mSqlQueries['get_count_prodi'.$queryNameAdd], $params);
      if (false === $data) {
         $this->SetProperty("ReferenceErrorMsg", "Data tidak ditemukan .... <br> ".$this->GetProperty("DbErrorMessage"));
      } else {
         $this->SetProperty("ReferenceErrorMsg", '');
      }
      $this->Disconnect();
      return $data;         
   }
   
   function CountNiu($niu="") {
      if (!$this->Connect()) {
         $dbErrorMsg = $this->GetProperty("DbErrorMessage");
         $this->SetProperty("ReferenceErrorMsg", $dbErrorMsg);
         return false;
      }
      $data = $this->GetAllDataAsArray($this->mSqlQueries['get_count_niu'], array($niu));
      if (false === $data) {
         $this->SetProperty("ReferenceErrorMsg", "Data tidak ditemukan .... <br> ".$this->GetProperty("DbErrorMessage"));
      } else {
         $this->SetProperty("ReferenceErrorMsg", '');
      }
      $this->Disconnect();
      return $data;
   }
   
   function LoadMahasiswa($start, $limit, $niu="") {
      if (!$this->Connect()) {
         $dbErrorMsg = $this->GetProperty("DbErrorMessage");
         $this->SetProperty("ReferenceErrorMsg", $dbErrorMsg);
         return false;
      }
      $data = $this->GetAllDataAsArray($this->mSqlQueries['get_all_mahasiswa_by_niu'], array($start, $limit, $niu));
      if (false === $data) {
         $this->SetProperty("ReferenceErrorMsg", "Data tidak ditemukan .... <br> ".$this->GetProperty("DbErrorMessage"));
      } else {
         $this->SetProperty("ReferenceErrorMsg", '');
      }
      $this->Disconnect();
      return $data;
   }
   
   function GetFakultasByProdi($prodi) {
      if (!$this->Connect()) {
         $dbErrorMsg = $this->GetProperty("DbErrorMessage");
         $this->SetProperty("ReferenceErrorMsg", $dbErrorMsg);
         return false;
      }
      
      $data = $this->GetAllDataAsArray($this->mSqlQueries['get_fakultas_by_prodi'], array($prodi));
      if (false === $data) {
         $this->SetProperty("ReferenceErrorMsg", "Data Fakultas Tidak Ditemukan .... \n ".$this->GetProperty("DbErrorMessage"));
      } else {
         $this->SetProperty("ReferenceErrorMsg", '');
      }
      $this->Disconnect();
      return $data;
   }
   
   function LoadFakultas($by = false)
   {
      if (!$this->Connect()) {
         $dbErrorMsg = $this->GetProperty("DbErrorMessage");
         $this->SetProperty("ReferenceErrorMsg", $dbErrorMsg);
         return false;
      }

      if($by == false)
         $data = $this->GetAllDataAsArray($this->mSqlQueries['get_all_fakultas'], array());
      else
         $data = $this->GetAllDataAsArray($this->mSqlQueries['get_fakultas_by_user'], array($by));
         
      if (false === $data) {
         $this->SetProperty("ReferenceErrorMsg", "Data Fakultas Tidak Ditemukan .... \n ".$this->GetProperty("DbErrorMessage"));
      } else {
         $this->SetProperty("ReferenceErrorMsg", '');
      }
      $this->Disconnect();
      return $data;
   }
   
   function GetAllUnitData($flagCode='') {
      if (!$this->Connect()) {
         $dbErrorMsg = $this->GetProperty("DbErrorMessage");
         $this->SetProperty("ReferenceErrorMsg", $dbErrorMsg);
         return false;
      }

      if ($flagCode != '') {
         $data = $this->GetAllDataAsArray($this->mSqlQueries['get_all_unit_data_with_code'], array($flagCode));
      } else {
         $data = $this->GetAllDataAsArray($this->mSqlQueries['get_all_unit_data'], array());
      }
      
      if (false === $data) {
         $this->SetProperty("ReferenceErrorMsg", "Data Unit Tidak Ditemukan .... <br> ".$this->GetProperty("DbErrorMessage"));
      } else {
         $this->SetProperty("ReferenceErrorMsg", '');
      }
      $this->Disconnect();
      return $data;
   }
   
   function GetListFeedbackPriority() {
      if (!$this->Connect()) {
         $dbErrorMsg = $this->GetProperty("DbErrorMessage");
         $this->SetProperty("ReferenceErrorMsg", $dbErrorMsg);
         return false;
      }
      $data = $this->GetAllDataAsArray($this->mSqlQueries['get_list_feedback_priority'], array());
      if (false === $data) {
         $this->SetProperty("ReferenceErrorMsg", "Data Unit Tidak Ditemukan .... \n ".$this->GetProperty("DbErrorMessage"));
      } else {
         $this->SetProperty("ReferenceErrorMsg", '');
      }
      $this->Disconnect();
      return $data;
   }
   
   function GetServiceAddressByUserId($userId) {
      if (!$this->Connect()) {
         $dbErrorMsg = $this->GetProperty("DbErrorMessage");
         $this->SetProperty("ReferenceErrorMsg", $dbErrorMsg);
         return false;
      }
      $data = $this->GetDataAsOne($this->mSqlQueries['get_service_address_by_user_id'], array($userId));
      if (false === $data) {
         $this->SetProperty("ReferenceErrorMsg", "Data tidak ditemukan .... \n ".$this->GetProperty("DbErrorMessage"));
      } else {
         $this->SetProperty("ReferenceErrorMsg", '');
      }
      $this->Disconnect();
      return $data;
   }
}
?>