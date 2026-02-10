<?php
class ShareClientService extends SIASettingClientService {
	var $mArrParam;

	function ShareClientService($soap_server,$wsdl_status, $userId, $prodiId) {
		SIASettingClientService::SIASettingClientService ($soap_server,$wsdl_status, $userId, $prodiId);		
		$this->SetReqServiceParams('e_sharing', 'share');
	}

	
	function GetAllFile($limit,$offset)
	{		
		$this->mReqServiceParams["pAct"] = "GetAllFile";
		$serviceParams = array($this->mReqServiceParams,array($limit, $offset));
		$result = $this->Call("Dispatch", $serviceParams);
		//print_r($result);exit;
		return $result;
	}
	
	function CountAllFile()
	{
		$this->mReqServiceParams["pAct"] = "CountAllFile";		
		$serviceParams = array($this->mReqServiceParams,array());
		//print_r($dataParams);
		$result = $this->Call("Dispatch", $serviceParams);
		//print_r($result);
		return $result;
	}
	
	function DoInsert()
	{
		$this->mReqServiceParams["pAct"] = "DoInsert";		
		$serviceParams = array($this->mReqServiceParams,$this->mArrParam);
      /**
      print_r($serviceParams);
      $this->Request();
      $this->Response();
      $this->Debug();
      print_r($result);
      exit();
      **/
		$result = $this->Call("Dispatch", $serviceParams);
		return $result;
	}
	
	function GetAllFileAdmin($limit,$offset)
	{		
		$this->mReqServiceParams["pAct"] = "GetAllFileAdmin";
		$serviceParams = array($this->mReqServiceParams,array($limit, $offset));
		$result = $this->Call("Dispatch", $serviceParams);
		//print_r($result);exit;
		return $result;
	}
	
	function CountAllFileAdmin()
	{
		$this->mReqServiceParams["pAct"] = "CountAllFileAdmin";		
		$serviceParams = array($this->mReqServiceParams,array());
		//print_r($dataParams);
		$result = $this->Call("Dispatch", $serviceParams);
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

   function DoUpdateStatus()
	{
		$this->mReqServiceParams["pAct"] = "DoUpdateStatus";		
		$serviceParams = array($this->mReqServiceParams,$this->mArrParam);
      /**
      print_r($serviceParams);
      exit();
      /**/
		$result = $this->Call("Dispatch", $serviceParams);
		return $result;
	}

   function DoDelete()
	{
		$this->mReqServiceParams["pAct"] = "DoDelete";		
		$serviceParams = array($this->mReqServiceParams,$this->mArrParam);
      /**
      print_r($serviceParams);
      exit();
      /**/
		$result = $this->Call("Dispatch", $serviceParams);
            /**
      print_r($serviceParams);
      $this->Request();
      $this->Response();
      $this->Debug();
      print_r($result);
      exit();
      /**/
		return $result;
	}   

	//SET FUNCTIONS
	function SetArrayParam($param)
	{
		$this->mArrParam = $param;
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
