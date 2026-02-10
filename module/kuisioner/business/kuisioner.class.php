<?php
class Kuisioner extends DatabaseConnected
{
	var $mrConfig;
	var $mUrlSia;
	var $mDateTimeAcces;
	var $mKuisionerErrorMessage;

	function Kuisioner(&$configObject)
	{
		$this->mrConfig = &$configObject;
		$this->mDateTimeAcces = date('Y-m-d H:i:s');
		DatabaseConnected::DatabaseConnected($this->mrConfig, "module/kuisioner/business/kuisioner.sql.php"); 
		$this->Connect();
		$this->mUrlSia = $this->GetDataAsOne($this->mSqlQueries['get_service_address'], array());      
	}

	function getServiceAddress(){
		return $this->mUrlSia;    
	}
}
?>