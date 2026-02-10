<?php
class Agenda extends SIASettingClientService {
	var $mArrInput;
	
	


	function Agenda($soap_server,$wsdl_status, $userId, $prodiId) {
		SIASettingClientService::SIASettingClientService ($soap_server,$wsdl_status, $userId, $prodiId);		
		$this->SetReqServiceParams('e_agenda', 'agenda');
	}

	function GetAgenda($owner, $jenis, $frekuensi, $isDone, $limit, $offset) {
		$this->mReqServiceParams["pAct"] = "GetAgenda";
		$dataParams = array($owner, $jenis, $frekuensi,$isDone, $limit, $offset);
		$serviceParams = array($this->mReqServiceParams,$dataParams);
		//print_r($serviceParams);
		$result = $this->Call("Dispatch", $serviceParams);
		return $result;
	}
	
	function GetFrekuensi($id='') {
		$this->mReqServiceParams["pAct"] = "GetFrekuensi";
		$dataParams = array($id);
		$serviceParams = array($this->mReqServiceParams,$dataParams);
		
		$result = $this->Call("Dispatch", $serviceParams);//print_r($result);
		return $result;
	}
	
	function CountAgenda($owner, $jenis, $frekuensi,$isDone) {
		$this->mReqServiceParams["pAct"] = "CountAgenda";
		$dataParams = array($owner, $jenis, $frekuensi,$isDone);
		$serviceParams = array($this->mReqServiceParams,$dataParams);
		//print_r($serviceParams);
		$result = $this->Call("Dispatch", $serviceParams);
		return $result;
	}
	 
	function DoInsert()
	{
		$this->mReqServiceParams["pAct"] = "DoInsert";		
		$serviceParams = array($this->mReqServiceParams,$this->mArrInput);
      //print_r($serviceParams);exit();
		$result = $this->Call("Dispatch", $serviceParams);
		//print_r($this);
		return $result;
	}
	
	function DoSetDone()
	{
		$this->mReqServiceParams["pAct"] = "DoSetDone";		
		$serviceParams = array($this->mReqServiceParams,$this->mArrInput);
		//print_r($serviceParams);
		$result = $this->Call("Dispatch", $serviceParams);
		//print_r($result);
		return $result;
	}
	
	function DoDelete()
	{
		$this->mReqServiceParams["pAct"] = "DoDelete";		
		$serviceParams = array($this->mReqServiceParams,$this->mArrInput);
		//print_r($serviceParams);
		$result = $this->Call("Dispatch", $serviceParams);
		//print_r($result);
		return $result;
	}
	
	function SetArrayParam($param)
	{
		$this->mArrInput = $param;
	}
}
?>
