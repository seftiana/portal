<?php
class KuisionerClientService extends SIASettingClientService {
   
   function KuisionerClientService($soap_server,$wsdl_status, $userId, $prodiId=null) {
      SIASettingClientService::SIASettingClientService ($soap_server,$wsdl_status, $userId, $prodiId);
      $this->SetReqServiceParams('kuisioner', 'kuisioner');
   }
   
   function GetKuisionerBySequence($seq=0,$waktu) {  //update ccp 23-10-2018      
      $this->mReqServiceParams["pAct"] = "GetKuisionerBySequence";      
      $dataParams = array($this->mUserId,$this->mUserRole,$seq,$waktu); //update ccp 23-10-2018
      $serviceParams = array($this->mReqServiceParams,$dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
	  /*$this->Request();
	  $this->Response();
	  $this->Debug();
	   print_r($result);
		exit();*/
      return $result;      
   }
   
   function GetListDosen() {      
      $this->mReqServiceParams["pAct"] = "GetListDosen";    
      $dataParams = array();
      $serviceParams = array($this->mReqServiceParams,$dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
      return $result;      
   }
   
   function GetHasilKuisioner($mode='',$detail='') {      
      $this->mReqServiceParams["pAct"] = "GetHasilKuisioner";    
      $dataParams = array($mode,$detail);
      $serviceParams = array($this->mReqServiceParams,$dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
      return $result;      
   }
   
   function InsertJawaban($params,$waktu){ #update ccp 23-10-2018
      $this->mReqServiceParams["pAct"] = "InsertJawaban";
	  $dataParams = array($this->mUserId,$params,$this->mUserProdiId,$waktu); #update ccp 23-10-2018
      $serviceParams = array($this->mReqServiceParams,$dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
      return $result;      
   }
   
   function GetSebaranResponden() {
      $this->mReqServiceParams["pAct"] = "GetSebaranResponden";    
      $dataParams = array();
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

    #add ccp 20-9-2018
   function GetListSemester() {      
      $this->mReqServiceParams["pAct"] = "GetListSemester";    
      $dataParams = array();
      $serviceParams = array($this->mReqServiceParams,$dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
      return $result;      
   }
   
   #add ccp 2-10-2018
   function GetKuisionerTtl() {      
      $this->mReqServiceParams["pAct"] = "GetKuisionerTtl";      
      $dataParams = array($this->mUserId,$this->mUserRole);
      $serviceParams = array($this->mReqServiceParams,$dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
      return $result;      
   }
}
?>