<?php
/**
 * SIASettingClient
 * SIASettingClient class
 * 
 * @package DosenClientService
 * @author Ageng Prianto 
 * @copyright Copyright (c) 2006 GamaTechno
 * @version 1.0 
 * @date 2006-03-23
 * @revision Maya Alipin 2006-04-07
 *
 */
 
class DosenClientService extends SIASettingClientService {
   
   function DosenClientService($soap_server,$wsdl_status, $userId, $prodiId) {
      SIASettingClientService::SIASettingClientService ($soap_server,$wsdl_status, $userId, $prodiId);
      $this->SetReqServiceParams('kbk_dosen', 'dosen');
   }
   
   /**
    * DosenClientService::GetAllCoursesSupportedDosenForSemester
    * get all matakuliah yang diampu dosen pada semester aktif
    *
    * @return array data matakuliah diampu
    */   
   function GetAllCoursesSupportedDosenForSemester() {      
      $this->mReqServiceParams["pAct"] = "GetAllCoursesSupportedDosenForSemester";      
      $dataParams = array($this->mUserId, $this->mSemesterProdiSemesterId);
      $serviceParams = array($this->mReqServiceParams,$dataParams);
	  //print_r($serviceParams);exit();
      $result = $this->Call ("Dispatch", $serviceParams);
	  /*$this->Request();
	  $this->Response();
	  $this->Debug();
	   print_r($result);
		exit();*/
      return $result;      
   }
   
   function GetAllJadwalTatapMukaDosenResume($klsId){
   	$this->mReqServiceParams["pAct"] = "GetAllJadwalTatapMukaDosenResume";     ;
      $dataParams = array($this->mUserId, $klsId);
      $serviceParams = array($this->mReqServiceParams,$dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
      return $result;
   }
   
   function GetAllJadwalTatapMukaDosen(){
   	$this->mReqServiceParams["pAct"] = "GetAllJadwalTatapMukaDosen";      
      $dataParams = array($this->mUserId, $this->mSemesterProdiSemesterId);
      $serviceParams = array($this->mReqServiceParams,$dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
      return $result;
   }
   
   /**
    * DosenClientService::GetTotalMentoredStudents
    * get total students mentored by a dosen
    *
    * @return integer total students
    */   
   function GetTotalMentoredStudents() {
      $this->mReqServiceParams["pAct"] = "GetTotalMentoredStudents";      
      $dataParams = array($this->mUserId);
      $serviceParams = array($this->mReqServiceParams,$dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
      return $result;      
   }
   
   /**
    * DosenClientService::GetAllMentoredStudents
    * get all students mentored by a dosen
    *
    * @param limit integer limit data, optional
    * @param offset integer offser data, optional
    * @return array data matakuliah diampu
    */   
   function GetAllMentoredStudents($limit="", $offset="") {
      $this->mReqServiceParams["pAct"] = "GetAllMentoredStudents";      
      $dataParams[0] = $this->mUserId;
      $dataParams[1] = $this->GetProperty("SemesterProdiSemesterId");
      if ($limit != "") {
         $dataParams[2] = $limit;
         if ($offset != ""){
            $dataParams[3] = $offset;
         }
      }
      $serviceParams = array($this->mReqServiceParams,$dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
      return $result;      
   }
   
    /**
    * DosenClientService::GetNilaiMahasiswaForKelas
    * get all nilai mahasiswa for a class based on kelasId
    *
    * @param kelasId integer kelas id
    * @return array data nilai mahasiswa
    */   
   function GetNilaiMahasiswaForKelas($kelasId) {
      $this->mReqServiceParams["pAct"] = "GetNilaiMahasiswaForKelas";      
      $dataParams = array($kelasId);
      $serviceParams = array($this->mReqServiceParams,$dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
      /*
      print_r($serviceParams);
      $this->Request();
      $this->Response();
      $this->Debug();
      print_r($result);
      exit();
      */
      return $result;      
   }
   
   function GetNilaiBobotPerKelas($kelasId) {
      $this->mReqServiceParams["pAct"] = "GetNilaiBobotPerKelas";      
      $dataParams = array($kelasId);
      $serviceParams = array($this->mReqServiceParams,$dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
      return $result;      
   }
   
   function GetKrsDpnaNiu($kelasId, $nif) {
      $this->mReqServiceParams["pAct"] = "GetKrsDpnaNiu";      
      $dataParams = array($kelasId, $nif);
      $serviceParams = array($this->mReqServiceParams,$dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
      return $result;      
   }
   
   function GetCaraPenilaian() {
      $this->mReqServiceParams["pAct"] = "GetCaraPenilaian";      
      $dataParams = array();
      $serviceParams = array($this->mReqServiceParams,$dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
      return $result;      
   }

    /**
    * DosenClientService::GetHakAksesDosenForInputNilai
    * get hak akses dosen for inputting nilai
    *
    * @param kelasId integer kelas id
    * @return array data hak akses dosen
    */   
   function GetHakAksesDosenForInputNilai($kelasId) {
      $this->mReqServiceParams["pAct"] = "GetHakAksesDosenForInputNilai";      
      $dataParams = array($this->mUserId, $kelasId);
      $serviceParams = array($this->mReqServiceParams,$dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
      return $result;      
   }
   
   /**
    * SIASettingClientService::GetAllPilihanNilaiPerProdi
    * get pilihan nilai given by dosen
    *
    * @param integer 0|1 with empty value, nilai value with empty string
    * @return array data pilihan nilai
    */   
   function GetAllPilihanNilaiPerProdi($withEmptyValue=0,$kodeProdi='') {
      $this->mReqServiceParams["pAct"] = "GetAllPilihanNilaiPerProdi";
      $dataParams = array($withEmptyValue,$kodeProdi);
      $serviceParams = array($this->mReqServiceParams,$dataParams);
      //print_r($serviceParams);      
      $result = $this->Call ("Dispatch", $serviceParams);
      /*$this->Request();
	  $this->Response();
	  $this->Debug();
	  print_r($result);
	  exit();*/
      return $result;      
   }
   
   function UpdateKrsDpna($params){
      $this->mReqServiceParams["pAct"] = "UpdateKrsDpna";   
	  $dataParams = array(
                $params['cp'],
                $params['inHarian'],
                $params['inMandiri'],
                $params['inTerstruktur'],
                $params['inTambahan'],
                $params['inUts'],
                $params['inUas'],
                $params['nilHarian'],
                $params['nilMandiri'],
                $params['nilTerstruktur'],
                $params['nilTambahan'],
                $params['nilUts'],
                $params['nilUas'],
                $params['nilAbsolut'],
                $params['nilai'],
                $params['krsdtId']
        );	  
	  //print_r($params);exit();
      $serviceParams = array($this->mReqServiceParams,$dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
	  //$this->Request();
	  //$this->Response();
	  //$this->Debug();
	  //print_r($result);exit();
      return $result;      
   }
   
    /**
    * DosenClientService::DoUpdateAllNilaiForKelas
    * get hak akses dosen for inputting nilai
    *
    * @param arrKrsItemId integer kelas id
    * @param arrNilai integer kelas id
    * @param arrIsMhsTambahan array flag 0|1 is mahasiswa tambahan
    * @param arrPengubahInfo array info pengubah (aplikasi pengubah, user id pengubah, user nama pengubah)
    * @return boolean hasil update
    */   
   function DoUpdateAllNilaiForKelas($arrKrsItemId, $arrNilai, $arrIsMhsTambahan, $semId, $arrNiu, $kodeProdi, $arrPengubahInfo) {
      $this->mReqServiceParams["pAct"] = "DoUpdateAllNilaiForKelas";      
      $dataParams = array($arrKrsItemId, $arrNilai, $arrIsMhsTambahan, $semId, $arrNiu, $kodeProdi);
      $dataParams = array_merge($dataParams, $arrPengubahInfo);
      //echo "<pre>";print_r($dataParams ); echo "</pre>";exit;
      $serviceParams = array($this->mReqServiceParams,$dataParams);      
      $result = $this->Call ("Dispatch", $serviceParams);
      return $result;      
   }
   
   function updateKomponen($dataPost,$paramUser){
      $this->mReqServiceParams["pAct"] = "updateKomponen";
      $dataParams = array_merge($dataPost,$paramUser);
      $serviceParams = array($this->mReqServiceParams,$dataParams);      
      $result = $this->Call ("Dispatch", $serviceParams);
      /*$this->Debug();
      var_dump($result); exit;
      echo '<pre>'; print_r($result); exit;*/
      return $result;            
   }
   
   function getTugasTmbhan($mhsNiu,$krsdtId,$klsId){
      $this->mReqServiceParams["pAct"] = "getTugasTmbhan";
      $dataParams = array($mhsNiu,$krsdtId,$klsId);
      $serviceParams = array($this->mReqServiceParams,$dataParams);            
      $result = $this->Call ("Dispatch", $serviceParams);      
      return $result;
   }
   
   function getDataTugasTmbhan($klsId,$krsdtId,$mhsNiu){
      $this->mReqServiceParams["pAct"] = "getDataTugasTmbhan";
      $dataParams = array($mhsNiu,$krsdtId,$klsId);
      $serviceParams = array($this->mReqServiceParams,$dataParams);            
      $result = $this->Call ("Dispatch", $serviceParams);      
      return $result;
   }
   
   function getDataTgsTmbhanById($id){
      $this->mReqServiceParams["pAct"] = "getDataTgsTmbhanById";
      $dataParams = array($id);
      $serviceParams = array($this->mReqServiceParams,$dataParams);            
      $result = $this->Call ("Dispatch", $serviceParams);      
      return $result;      
   }
   
	function executeMethod($method, $param=array()){
		$this->mReqServiceParams["pAct"] = 'executeMethod';
		$dataParam = array('__method__'=>$method, $param);
		$serviceParams = array($this->mReqServiceParams,$dataParam);            
		$result = $this->Call ("Dispatch", $serviceParams);      
		return $result;      
	}
   
   function tambahTgsTmbhan($krsdtId,$krsdpnatgsJudulTgs){
      $this->mReqServiceParams["pAct"] = "tambahTgsTmbhan";
      $dataParams = array($krsdtId,$krsdpnatgsJudulTgs);
      $serviceParams = array($this->mReqServiceParams,$dataParams);            
      $result = $this->Call ("Dispatch", $serviceParams);      
      return $result;
   }
   
   function editTgsTmbhan($id,$krsdpnatgsJudulTgs){
      $this->mReqServiceParams["pAct"] = "editTgsTmbhan";
      $dataParams = array($id,$krsdpnatgsJudulTgs);
      $serviceParams = array($this->mReqServiceParams,$dataParams);            
      $result = $this->Call ("Dispatch", $serviceParams);      
      return $result;      
   }
   
   function hapusTgsTmbhan($id){
      $this->mReqServiceParams["pAct"] = "hapusTgsTmbhan";
      $dataParams = array($id);
      $serviceParams = array($this->mReqServiceParams,$dataParams);            
      $result = $this->Call ("Dispatch", $serviceParams);      
      return $result;      
   }

   function getInfoKelasMk($klsId){
      $this->mReqServiceParams["pAct"] = "getInfoKelasMk";
      $dataParams = array($klsId);
      $serviceParams = array($this->mReqServiceParams,$dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);            
      return $result;
   }

   function getProdiSemester($klsId){
      $this->mReqServiceParams["pAct"] = "getProdiSemester";
      $dataParams = array($klsId);
      $serviceParams = array($this->mReqServiceParams,$dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);      
      return $result;      
   }

   function getDataMhsKelasNilai($klsId){
      $this->mReqServiceParams["pAct"] = "getDataMhsKelasNilai";
      $dataParams = array($klsId);
      $serviceParams = array($this->mReqServiceParams,$dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);      
      return $result;
   }

   function getKodeNilai($prodiKode){
      $this->mReqServiceParams["pAct"] = "getKodeNilai";
      $dataParams = array($prodiKode);
      $serviceParams = array($this->mReqServiceParams,$dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);      
      return $result;  
   }   

   function doImportInputNilai($dataReadXls,$klsId,$komponenNilai,$unitId,$nip,$namaUser){
      $this->mReqServiceParams["pAct"] = "doImportInputNilai";
      $dataParams = array($dataReadXls,$klsId,$komponenNilai,$unitId,$nip,$namaUser);
      $serviceParams = array($this->mReqServiceParams,$dataParams);            
      $result = $this->Call ("Dispatch", $serviceParams);
      //echo '<pre>'; print_r($result); exit;
      //var_dump($result); exit;
      return $result;        
   }

   function getKomponenNilai($klsId){
      $this->mReqServiceParams["pAct"] = "getKomponenNilai";
      $dataParams = array($klsId);
      $serviceParams = array($this->mReqServiceParams,$dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);      
      return $result;  
   }
   
       function Request()
	   {
	      echo '<h2>Request</h2><pre>' . htmlspecialchars($this->mSoapClient->request, ENT_QUOTES) . '</pre>';
	   }

	   function Response()
	   {
	      echo '<h2>Response</h2><pre>' . htmlspecialchars($this->mSoapClient->response, ENT_QUOTES) . '</pre>';
	   }

	   function Debug()
	   {
	      echo '<h2>Debug</h2><pre>' . htmlspecialchars($this->mSoapClient->debug_str, ENT_QUOTES) . '</pre>';
	   }

}
?>