<?php
class JadwalClientService extends SIASettingClientService {
        
      function JadwalClientService($soap_server,$wsdl_status,$userId,$prodiId) {
         SIASettingClientService::SIASettingClientService ($soap_server,$wsdl_status,$userId, $prodiId);
         $this->SetReqServiceParams('kbk_jadwal', 'jadwal');
      }
      
      function GetDataViewJadwal(){
      	$this->mReqServiceParams["pAct"] = "GetDataViewJadwal";
         $dataParams = array($this->mUserId,$this->GetProperty("SemesterProdiSemesterId"));
         $serviceParams = array($this->mReqServiceParams,$dataParams);
         $result = $this->Call ("Dispatch", $serviceParams);
         return $result;
      }
      
      function GetDataViewJadwalDetil($kelasId){
      	$this->mReqServiceParams["pAct"] = "GetDataViewJadwalDetil";
         $dataParams = array($kelasId);
         $serviceParams = array($this->mReqServiceParams,$dataParams);
         $result = $this->Call ("Dispatch", $serviceParams);
         return $result;
      }
      
      function GetDosenPengajar($val){
      	$this->mReqServiceParams["pAct"] = "GetDosenPengajar";
         $dataParams = array($val);
         $serviceParams = array($this->mReqServiceParams,$dataParams);
         $result = $this->Call ("Dispatch", $serviceParams);
         return $result;
      }
}
?>