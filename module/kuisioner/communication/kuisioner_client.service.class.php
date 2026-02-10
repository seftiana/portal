<?php
class KuisionerClientService extends SIASettingClientService {
   
   function KuisionerClientService($soap_server,$wsdl_status, $userId, $prodiId=null) {
      SIASettingClientService::SIASettingClientService ($soap_server,$wsdl_status, $userId, $prodiId);
      $this->SetReqServiceParams('kuisioner', 'kuisioner');
   }
   
   function GetKuisionerBySequence($seq=0,$waktu,$semIdKuis) {  //update ccp 12-02-2019      
      $this->mReqServiceParams["pAct"] = "GetKuisionerBySequence";      
      $dataParams = array($this->mUserId,$this->mUserRole,$seq,$waktu,$semIdKuis); //update ccp 12-02-2019
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
   
   function GetHasilKuisioner($mode='',$detail='', $semester='') { #add variable $semester by ccp 20-9-2018      
      $this->mReqServiceParams["pAct"] = "GetHasilKuisioner";    
      $dataParams = array($mode,$detail,$semester); #add variable $semester by ccp 20-9-2018
      $serviceParams = array($this->mReqServiceParams,$dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
      return $result;      
   }
   
   function InsertJawaban($params,$waktu,$semIdKuis){ #update ccp 12-02-2019
      $this->mReqServiceParams["pAct"] = "InsertJawaban";
	  $dataParams = array($this->mUserId,$params,$this->mUserProdiId,$waktu,$semIdKuis); #update ccp 12-02-2019
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
	
	//add ccp 20-01-2023
	function GetKuisionerSurvei() {      
		$this->mReqServiceParams["pAct"] = "GetKuisionerSurvei";      
		$dataParams = array($this->mUserId,$this->mUserRole);
		$serviceParams = array($this->mReqServiceParams,$dataParams);
		$result = $this->Call ("Dispatch", $serviceParams);
		/*$this->Request();
		$this->Response();
		$this->Debug();
		print_r($result);
		exit();*/
		return $result;      
	}
	
	//add ccp 20-01-2023
	function GetKuisionerTtlSurvei() {      
		$this->mReqServiceParams["pAct"] = "GetKuisionerTtlSurvei";      
		$dataParams = array($this->mUserId,$this->mUserRole);
		$serviceParams = array($this->mReqServiceParams,$dataParams);
		$result = $this->Call ("Dispatch", $serviceParams);
		return $result;      
	}
	
	function InsertJawabanSurvei($params){ 
		$this->mReqServiceParams["pAct"] = "InsertJawabanSurvei";
		$dataParams = array($this->mUserId,$params,$this->mUserProdiId); 
		$serviceParams = array($this->mReqServiceParams,$dataParams);
		$result = $this->Call ("Dispatch", $serviceParams);
		return $result;      
	}
}
?>