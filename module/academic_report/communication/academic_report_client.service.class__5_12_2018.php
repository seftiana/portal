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
      $this->SetReqServiceParams('academic_report', 'academic_report');
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

   function GetSemesterInfo() {
      $this->mReqServiceParams["pAct"] = "GetSemesterInfo";
      $dataParams = array($this->GetProperty("UserId"),$this->GetProperty("SemesterProdiId"));
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
   
   function GetAllTranscriptItemFullNilaiForMahasiswa() {
      $this->mReqServiceParams["pAct"] = "GetAllTranscriptItemFullNilaiForMahasiswa";
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

   function GetAllGradeHIstory() {
      $this->mReqServiceParams["pAct"] = "GetAllGradeHIstory";
      $dataParams = array($this->GetProperty("UserId"));
      $serviceParams = array($this->mReqServiceParams, $dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
      return $result;
   }
   
   function GetAllGradeHistoryMhs() {
      $this->mReqServiceParams["pAct"] = "GetAllGradeHistoryMhs";
      $dataParams = array($this->GetProperty("UserId"));
      $serviceParams = array($this->mReqServiceParams, $dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
	  //$this->Request();
      //$this->Response();
      //$this->Debug();
      //print_r($result);
      //exit();
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

   function getSemesterNama($sempId){
      $this->mReqServiceParams["pAct"] = "getSemesterNama";
      $dataParams = array($sempId);
      $serviceParams = array($this->mReqServiceParams, $dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
      /*
      $this->Request();
      $this->Response();
      $this->Debug();
      print_r($result);
      exit();
      */
      return $result;
   }

   function getDataMhs($mhsNiu){
      $this->mReqServiceParams["pAct"] = "getDataMhs";
      $dataParams = array($mhsNiu);
      $serviceParams = array($this->mReqServiceParams, $dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
      /*
      $this->Request();
      $this->Response();
      $this->Debug();
      print_r($result);
      exit();
      */
      return $result;
   }

   function getDataHasilStudiSemester($mhsNiu,$sempId){
      $this->mReqServiceParams["pAct"] = "getDataHasilStudiSemester";
      $dataParams = array($mhsNiu,$sempId);
      $serviceParams = array($this->mReqServiceParams, $dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
      /*
      $this->Request();
      $this->Response();
      $this->Debug();
      print_r($result);
      exit();
      */
      return $result;
   }

   function getDataHasilStudiIpDetail($mhsNiu,$sempId){
      $this->mReqServiceParams["pAct"] = "getDataHasilStudiIpDetail";
      $dataParams = array($mhsNiu,$sempId);
      $serviceParams = array($this->mReqServiceParams, $dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
      /*
      $this->Request();
      $this->Response();
      $this->Debug();
      print_r($result);
      exit();
      */
      return $result;
   }

   function getDataPejabatTtd($namaDokumen,$tipeSah){
      $this->mReqServiceParams["pAct"] = "getDataPejabatTtd";
      $dataParams = array($namaDokumen,$tipeSah);
      $serviceParams = array($this->mReqServiceParams, $dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
      /*
      $this->Request();
      $this->Response();
      $this->Debug();
      print_r($result);
      exit();
      */
      return $result;
   }

   function getDataPejabatTtdWithProdi($namaDokumen,$tipeSah,$prodiKode){
      $this->mReqServiceParams["pAct"] = "getDataPejabatTtdWithProdi";
      $dataParams = array($namaDokumen,$tipeSah,$prodiKode);
      $serviceParams = array($this->mReqServiceParams, $dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
      /*
      $this->Request();
      $this->Response();
      $this->Debug();
      print_r($result);
      exit();
      */
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