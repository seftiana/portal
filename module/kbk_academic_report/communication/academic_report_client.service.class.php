<?php
/**
 * AcademicReportClientService
 * AcademicReportClientService class
 * 
 * @package academic_report 
 * @author Maya Alipin 
 * @copyright Copyright (c) 2006 GamaTechno
 * @version 1.0 
 * @date 2006-02-27
 * @revision Maya Alipin 2006.03.28
 * @revision Gitra Perdana 2006.08.31
 */
 
class AcademicReportClientService extends SIASettingClientService {
   
   function AcademicReportClientService($soap_server,$wsdl_status, $userId, $prodiId) {
      SIASettingClientService::SIASettingClientService ($soap_server,$wsdl_status, $userId, $prodiId);
      $this->SetReqServiceParams('kbk_academic_report', 'academic_report');
   }
   
   function GetAllKhsItemForMahasiswa() {
      $this->mReqServiceParams["pAct"] = "GetAllKhsItemForMahasiswa";
      $dataParams = array($this->GetProperty("UserId"));
      $serviceParams = array($this->mReqServiceParams,$dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
      return $result;
   }
   
   function GetAllKHSItemForSemester() {
      $this->mReqServiceParams["pAct"] = "GetAllKHSItemForSemester";
      $dataParams = array($this->GetProperty("SemesterProdiId"), $this->GetProperty("UserProdiId"), $this->mUserId);
      $serviceParams = array($this->mReqServiceParams,$dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
      return $result;
   }
   
   function GetAllKHSItemForSemesterBefore() {
      $this->mReqServiceParams["pAct"] = "GetAllKHSItemForSemesterBefore";
      $dataParams = array($this->GetProperty("SemesterProdiId"), $this->GetProperty("UserProdiId"), $this->mUserId);
      $serviceParams = array($this->mReqServiceParams,$dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
      return $result;
   }
   
   function GetIpForSemester() {
      $this->mReqServiceParams["pAct"] = "GetIpForSemester";
      $dataParams = array($this->GetProperty("UserId"),$this->GetProperty("SemesterProdiId"));
      $serviceParams = array($this->mReqServiceParams,$dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
      return $result;
   }
   
   
   function GetJumlahSksForSemester() {
      $this->mReqServiceParams["pAct"] = "GetJumlahSksForSemester";
      $dataParams = array($this->GetProperty("UserId"),$this->GetProperty("SemesterProdiId"));
      $serviceParams = array($this->mReqServiceParams,$dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
      return $result;
   }
   
   function GetAllTranscriptItemForMahasiswa() {
      $this->mReqServiceParams["pAct"] = "GetAllTranscriptItemForMahasiswa";
      $dataParams = array($this->GetProperty("UserId"));
      $serviceParams = array($this->mReqServiceParams, $dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
      return $result;
   }
   
   function GetAllKkmItemForMahasiswa() {
      $this->mReqServiceParams["pAct"] = "GetAllKkmItemForMahasiswa";
      $dataParams = array($this->GetProperty("UserId"));
      $serviceParams = array($this->mReqServiceParams, $dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
      return $result;
   }
   
   function GetAcademicSummaryReportForMahasiswa() {
      $this->mReqServiceParams["pAct"] = "GetAcademicSummaryReportForMahasiswa";
      $dataParams = array($this->GetProperty("UserId"));
      $serviceParams = array($this->mReqServiceParams, $dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
      return $result;
   }
   
   function GetIpInfoForSemester() {
      $this->mReqServiceParams["pAct"] = "GetIpInfoForSemester";
      $dataParams = array($this->GetProperty("UserId"),$this->GetProperty("SemesterProdiId"));
      $serviceParams = array($this->mReqServiceParams,$dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
      return $result;
   }
   
   function GetIpInfoForSemesterBefore() {
      $this->mReqServiceParams["pAct"] = "GetIpInfoForSemesterBefore";
      $dataParams = array($this->GetProperty("UserId"),$this->GetProperty("SemesterProdiId"));
      $serviceParams = array($this->mReqServiceParams,$dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
      return $result;
   }
   
   function GetAllGradeHIstory() {
      $this->mReqServiceParams["pAct"] = "GetAllGradeHIstory";
      $dataParams = array($this->GetProperty("UserId"));
      $serviceParams = array($this->mReqServiceParams, $dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
      return $result;
   }   
   
   function GetDataTaMahasiswa() {
      $this->mReqServiceParams["pAct"] = "GetDataTaMahasiswa";
      $dataParams = array($this->GetProperty("UserId"));
      $serviceParams = array($this->mReqServiceParams, $dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
      return $result;
   }
   
   function GetInfoAllKhsForMahasiswa($arrSempId) {
      $this->mReqServiceParams["pAct"] = "GetInfoAllKhsForMahasiswa";
      $dataParams = array($this->GetProperty("UserId"), $this->GetProperty("UserProdiId"), $arrSempId);
      $serviceParams = array($this->mReqServiceParams, $dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
      return $result;
   }

   function GetIpkInfoLengkap(){
      $this->mReqServiceParams["pAct"] = "GetInfoIpkForSms";
      $dataParams = array($this->GetProperty("UserId"));
      $serviceParams = array($this->mReqServiceParams, $dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
      return $result;
   }
	
	function GetTotalSemesterAktif() {
		$this->mReqServiceParams["pAct"] = "GetTotalSemesterAktif";
      $dataParams = array($this->GetProperty("UserId"));
      $serviceParams = array($this->mReqServiceParams, $dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
      return $result;
	}
	
	function GetInfoSksTelahDiambil() {
		$this->mReqServiceParams["pAct"] = "GetInfoSksTelahDiambil";
      $dataParams = array($this->GetProperty("UserId"));
      $serviceParams = array($this->mReqServiceParams, $dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
      return $result;
	}

    function GetPejabatPengesahKHS() {
      $this->mReqServiceParams["pAct"] = "GetPejabatPengesahKHS";
      $dataParams = array($this->GetProperty("UserProdiId"));
      $serviceParams = array($this->mReqServiceParams, $dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
      return $result;
    }
   
   function IsMahasiswaCuti() {
		$this->mReqServiceParams["pAct"] = "IsMahasiswaCuti";
      $dataParams = array($this->GetProperty("UserId"),$this->GetProperty("SemesterProdiSemesterId"));
      $serviceParams = array($this->mReqServiceParams, $dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
      return $result;
	}

   function IsMahasiswaLulusSkripsi() {
		$this->mReqServiceParams["pAct"] = "IsMahasiswaLulusSkripsi";
      $dataParams = array($this->GetProperty("UserId"));
      $serviceParams = array($this->mReqServiceParams, $dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
      return $result;
	}

   function getDataSemesterNama($sempId){
      $this->mReqServiceParams["pAct"] = "getDataSemesterNama";
      $dataParams = array($sempId);
      $serviceParams = array($this->mReqServiceParams, $dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
      return $result;  
   }

   function getSemesterStudiMhs($mhsNiu,$sempId){
      $this->mReqServiceParams["pAct"] = "getSemesterStudiMhs";
      $dataParams = array($mhsNiu,$sempId);
      $serviceParams = array($this->mReqServiceParams, $dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
      return $result;
   }

   function getMhsNilai($mhsNiu,$sempId){
      $this->mReqServiceParams["pAct"] = "getMhsNilai";
      $dataParams = array($mhsNiu,$sempId);
      $serviceParams = array($this->mReqServiceParams, $dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
      return $result;      
   }

   function getSemIdBySempId($sempId){
      $this->mReqServiceParams["pAct"] = "getSemIdBySempId";
      $dataParams = array($sempId);
      $serviceParams = array($this->mReqServiceParams, $dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
      return $result;        
   }

   function getKeteranganKhs($mhsNiu,$semId){
      $this->mReqServiceParams["pAct"] = "getKeteranganKhs";
      $dataParams = array($mhsNiu,$semId);
      $serviceParams = array($this->mReqServiceParams, $dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
      return $result;   
   }

   function getJumlahNilaiKum($mhsNiu){
      $this->mReqServiceParams["pAct"] = "getJumlahNilaiKum";
      $dataParams = array($mhsNiu);
      $serviceParams = array($this->mReqServiceParams, $dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
      return $result;
   }

   function getJumlahNilaiPrevSem($mhsNiu,$semId,$prodiKode){
      $this->mReqServiceParams["pAct"] = "getJumlahNilaiPrevSem";
      $dataParams = array($mhsNiu,$semId,$prodiKode);
      $serviceParams = array($this->mReqServiceParams, $dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
      return $result;      
   }

   function getTandaTangan($dokumen,$dokumenTipe,$urutan,$prodiKode){
      $this->mReqServiceParams["pAct"] = "getTandaTangan";
      $dataParams = array($dokumen,$dokumenTipe,$urutan,$prodiKode);
      $serviceParams = array($this->mReqServiceParams, $dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
      return $result;  
   }

   function getDataNilaiTranskripMhs($mhsNiu){
      $this->mReqServiceParams["pAct"] = "getDataNilaiTranskripMhs";
      $dataParams = array($mhsNiu);
      $serviceParams = array($this->mReqServiceParams, $dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
      return $result;   
   }

   function getPredikatLulus($mhsNiu){
      $this->mReqServiceParams["pAct"] = "getPredikatLulus";
      $dataParams = array($mhsNiu);
      $serviceParams = array($this->mReqServiceParams, $dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
      return $result;   
   }

   function getDataTA($mhsNiu,$prodiJenjang){
      $this->mReqServiceParams["pAct"] = "getDataTA";
      $dataParams = array($mhsNiu,$prodiJenjang);
      $serviceParams = array($this->mReqServiceParams, $dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
      return $result;   
   }

   function getDataKopMM($prodiKode){
      $this->mReqServiceParams["pAct"] = "getDataKopMM";
      $dataParams = array($prodiKode);
      $serviceParams = array($this->mReqServiceParams, $dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
      return $result;   
   }

   function getDataSemesterKeMhs($mhsNiu,$sempId){
      $this->mReqServiceParams["pAct"] = "getDataSemesterKeMhs";
      $dataParams = array($mhsNiu,$sempId);
      $serviceParams = array($this->mReqServiceParams, $dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
      return $result;  
   }

   function getKetNilai($prodiJenjang){
      $this->mReqServiceParams["pAct"] = "getKetNilai";
      $dataParams = array($prodiJenjang);
      $serviceParams = array($this->mReqServiceParams, $dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);      
      return $result;   
   }
   
   function GetDataMahasiswaTranskip(){
   	$this->mReqServiceParams["pAct"] = "GetDataMahasiswaTranskip";
      $dataParams = array($this->mUserId);
      $serviceParams = array($this->mReqServiceParams, $dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
      return $result;
   }
   
   function GetDataTranskip(){
   	$this->mReqServiceParams["pAct"] = "GetDataTranskip";
      $dataParams = array($this->mUserId);
      $serviceParams = array($this->mReqServiceParams, $dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
      return $result;
   }
   
   function GetPejabatDekan($jabatan){
   	$this->mReqServiceParams["pAct"] = "GetPejabatDekan";
      $dataParams = array($jabatan,$this->mUserProdiId);
      $serviceParams = array($this->mReqServiceParams, $dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
      return $result;
   }
   
   function GetPejabatRektor($jabatan){
   	$this->mReqServiceParams["pAct"] = "GetPejabatRektor";
      $dataParams = array($jabatan,$this->mUserProdiId);
      $serviceParams = array($this->mReqServiceParams, $dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
      return $result;
   }
}
?>