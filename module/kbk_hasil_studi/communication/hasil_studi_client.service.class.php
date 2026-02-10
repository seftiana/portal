<?php
class HasilStudiClientService extends SIASettingClientService {
        
      function HasilStudiClientService($soap_server,$wsdl_status,$userId, $prodiId) {
         SIASettingClientService::SIASettingClientService ($soap_server,$wsdl_status,$userId, $prodiId);
         $this->SetReqServiceParams('kbk_hasil_studi', 'hasil_studi');
      }
      
      function GetSemesterMahasiswaMatakuliahBlok() {
         $this->mReqServiceParams["pAct"] = "GetSemesterMahasiswaMatakuliahBlok";
         $dataParams = array($this->mUserId);
         $serviceParams = array($this->mReqServiceParams,$dataParams);
         $result = $this->Call ("Dispatch", $serviceParams);
         return $result;
      }
      
      function GetHasilStudiBlokMahasiswaPerSemester($khsSemId){
      	$this->mReqServiceParams["pAct"] = "GetHasilStudiBlokMahasiswaPerSemester";
         $dataParams = array($this->mUserId,$khsSemId);
         $serviceParams = array($this->mReqServiceParams,$dataParams);
         $result = $this->Call ("Dispatch", $serviceParams);
         return $result;
      }
      
      function GetIpForSemester($khsSemId){
      	$this->mReqServiceParams["pAct"] = "GetIpForSemester";
         $dataParams = array($this->mUserId,$khsSemId);
         $serviceParams = array($this->mReqServiceParams,$dataParams);
         $result = $this->Call ("Dispatch", $serviceParams);
         return $result;
      }
      
      function GetDataMahasiswa($khsSemId){
      	$this->mReqServiceParams["pAct"] = "GetDataMahasiswa";
         $dataParams = array($this->mUserId,$khsSemId);
         $serviceParams = array($this->mReqServiceParams,$dataParams);
         $result = $this->Call ("Dispatch", $serviceParams);
         return $result;
      }
      
      function GetHasilStudiBlok($sempId){
      	$this->mReqServiceParams["pAct"] = "GetHasilStudiBlok";
         $dataParams = array($this->mUserId,$sempId);
         $serviceParams = array($this->mReqServiceParams,$dataParams);
         $result = $this->Call ("Dispatch", $serviceParams);
         return $result;
      }
      
      function GetIpSemBlok($sempId){
      	$this->mReqServiceParams["pAct"] = "GetIpSemBlok";
         $dataParams = array($this->mUserId,$sempId);
         $serviceParams = array($this->mReqServiceParams,$dataParams);
         $result = $this->Call ("Dispatch", $serviceParams);
         return $result;
      }
      
      function GetKrsHasilStudi($sempId){
      	$this->mReqServiceParams["pAct"] = "GetKrsHasilStudi";
         $dataParams = array($this->mUserId,$sempId);
         $serviceParams = array($this->mReqServiceParams,$dataParams);
         $result = $this->Call ("Dispatch", $serviceParams);
         return $result;
      }
      
      function GetPejabat($jabatan){
      	$this->mReqServiceParams["pAct"] = "GetPejabat";
         $dataParams = array($jabatan,$this->mUserProdiId);
         $serviceParams = array($this->mReqServiceParams,$dataParams);
         $result = $this->Call ("Dispatch", $serviceParams);
         return $result;
      }
}
?>