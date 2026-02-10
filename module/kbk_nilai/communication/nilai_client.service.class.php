<?php
class NilaiClientService extends SIASettingClientService {
        
      function NilaiClientService($soap_server,$wsdl_status,$userId,$prodiId) {
         SIASettingClientService::SIASettingClientService ($soap_server,$wsdl_status,$userId, $prodiId);
         $this->SetReqServiceParams('kbk_nilai', 'nilai');
      }
      
	function GetAllKHSItemForSemester($sempId) {
      $this->mReqServiceParams["pAct"] = "GetAllKHSItemForSemester";
      $dataParams = array($sempId, $this->GetProperty("UserProdiId"), $this->mUserId);
      $serviceParams = array($this->mReqServiceParams,$dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
      return $result;
   }
   
   function GetPesertaKelas($klsId){
   	$this->mReqServiceParams["pAct"] = "GetPesertaKelas";
      $dataParams = array($klsId);
      $serviceParams = array($this->mReqServiceParams,$dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
      return $result;
   }
   
   function GetKomponenNilaiKelas($klsId,$prodiId){
   	$this->mReqServiceParams["pAct"] = "GetKomponenNilaiKelas";
      $dataParams = array($klsId,$prodiId);
      $serviceParams = array($this->mReqServiceParams,$dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
      return $result;
   }
   
   function GetKrsDetilDpna2($krsDtId,$klsId,$mhsNiu){
   	$this->mReqServiceParams["pAct"] = "GetKrsDetilDpna2";
      $dataParams = array($krsDtId,$klsId,$mhsNiu);
      $serviceParams = array($this->mReqServiceParams,$dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
      return $result;
   }
   
   function GetKrsNilai($klsId){
   	$this->mReqServiceParams["pAct"] = "GetKrsNilai";
      $dataParams = array($klsId);
      $serviceParams = array($this->mReqServiceParams,$dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
      return $result;
   }
   
   function GetRmdNilai($klsId){
   	$this->mReqServiceParams["pAct"] = "GetRmdNilai";
      $dataParams = array($klsId);
      $serviceParams = array($this->mReqServiceParams,$dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
      return $result;
   }
   
   function GetKomponenNilaiRemidial($klsId){
   	$this->mReqServiceParams["pAct"] = "GetKomponenNilaiRemidial";
      $dataParams = array($klsId);
      $serviceParams = array($this->mReqServiceParams,$dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
      return $result;
   }
   
   function GetDataMatakuliah($klsId){
   	$this->mReqServiceParams["pAct"] = "GetDataMatakuliah";
      $dataParams = array($klsId);
      $serviceParams = array($this->mReqServiceParams,$dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
      return $result;
   }
      
      /*function GetFakultas() {
         $this->mReqServiceParams["pAct"] = "nama_function_sia";
         $dataParams = array();
         $serviceParams = array($this->mReqServiceParams,$dataParams);
         $result = $this->Call ("Dispatch", $serviceParams);
         return $result;
      }*/
}
?>