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
      $this->SetReqServiceParams('dosen', 'dosen');
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
      /**
      print_r($serviceParams);
      $this->Request();
      $this->Response();
      $this->Debug();
      print_r($result);
      exit();
      **/
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
   
   function GetKodeNilai($prodiId) {
      $this->mReqServiceParams["pAct"] = "GetKodeNilai";      
      $dataParams = array($prodiId);
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
   
   function UpdateKrsDpna($params){
      $this->mReqServiceParams["pAct"] = "UpdateKrsDpna";   
	  $dataParams = array(
                $params['cp'],
                $params['inHarian'],
                $params['inMandiri'],
				$params['inKelompok'],
				$params['inPresentasi'],
                $params['inTerstruktur'],
                $params['inTambahan'],
                $params['inUts'],
                $params['inUas'],
                $params['nilHarian'],
                $params['nilMandiri'],
				$params['nilKelompok'],
				$params['nilPresentasi'],
                $params['nilTerstruktur'],
                $params['nilTambahan'],
                $params['nilUts'],
                $params['nilUas'],
                $params['nilAbsolut'],
                $params['nilai'],
                $params['krsdtId']
                ,$params['inRemedial'] #add ccp 30-08-2018
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
   
   function GetDataPertemuanKelas($klsId,$pertemuanId,$semId){
      $this->mReqServiceParams["pAct"] = "GetDataPertemuanKelas";
	  $dataParams = array($klsId,$pertemuanId,$semId);
      $serviceParams = array($this->mReqServiceParams,$dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
	  //$this->Request();
	  //$this->Response();
	  //$this->Debug();
	  //print_r($result);exit();
      return $result;      
   }
   
   function DoInsertPresensiKelas($dataParams){
      $this->mReqServiceParams["pAct"] = "DoInsertPresensiKelas";
      $serviceParams = array($this->mReqServiceParams,$dataParams);	  
      $result = $this->Call ("Dispatch", $serviceParams);
	  //$this->Request();
	  //$this->Response();
	  //$this->Debug();
	  //print_r($result);exit();
      return $result;      
   }
   
   function DoUpdatePresensiKelas($dataParams){
      $this->mReqServiceParams["pAct"] = "DoUpdatePresensiKelas";
      $serviceParams = array($this->mReqServiceParams,$dataParams);	  
      $result = $this->Call ("Dispatch", $serviceParams);
	  //$this->Request();
	  //$this->Response();
	  //$this->Debug();
	  //print_r($result);exit();
      return $result;      
   }
   
   function DoUpdateMasterPresensiKelas($dataParams){
      $this->mReqServiceParams["pAct"] = "DoUpdateMasterPresensiKelas";
      $serviceParams = array($this->mReqServiceParams,$dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
	  //$this->Request();
	  //$this->Response();
	  //$this->Debug();
	  //print_r($result);exit();
      return $result;      
   }

   function DoUpdateBobot($dataParams){
      $this->mReqServiceParams["pAct"] = "DoUpdateBobot";
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