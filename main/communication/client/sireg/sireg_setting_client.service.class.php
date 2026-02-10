<?php
include_once $cfg->GetValue("app_data") . "gtfwCrypt.class.php";
//include_once $cfg->GetValue("app_data") . "services_json.class.php";

class SiregSettingClientService{
	var $link;
	var $log;
	var $mModule='';

	function SiregSettingClientService($url){
		$this->SetServiceAddress($url);
		$this->_GetStream();
		$this->_GetKey();
		$this->gtfwCrypt = new gtfwCrypt();
		$this->gtfwCrypt->SetKey($this->mKey);
	}

	function GetKey(){
		return $this->mKey;
	}
	
	function SetServiceAddress($address){
		$this->url = $address;
	}
	
	/*	@param: array() */
	function Get($param){
		$param['t'] =  $this->mKey;
		$param['func'] =  $this->gtfwCrypt->Encrypt($this->mModule . '->' . $param['func']);
		$param = implode('&', $param);
		$url = $this->url . '?' . $param;
		curl_setopt($this->link, CURLOPT_URL, $url);
		$value = curl_exec($this->link);
		$this->log .= "Get : $url \nResult : $value \n";

		if(empty($value))return false;
		else return json_decode($value,true);
	}
	
	/*	@param: array() */
	function Post($param){
		$param['t'] =  $this->mKey;
		$param['func'] =  $this->gtfwCrypt->Encrypt($this->mModule . '->' . $param['func']);
		
		curl_setopt($this->link, CURLOPT_POST, true);
		curl_setopt($this->link, CURLOPT_POSTFIELDS, $param);
		$value = curl_exec($this->link);
		$this->log .= 'Post : '.var_export($param, true)." \nResult : $value \n";

		if(empty($value))return false;
		else return json_decode($value,true);
	}
	
	function _GetKey(){
		$token = curl_exec($this->link);
		$this->mKey = $token;
		$this->log .= "Key: $token \n";
	}
	
	function _GetStream(){
		$this->link = curl_init();
		curl_setopt($this->link, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($this->link, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($this->link, CURLOPT_FAILONERROR, true);
		curl_setopt($this->link, CURLOPT_HEADER, false);
		curl_setopt($this->link, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
		curl_setopt($this->link, CURLOPT_HTTPHEADER, Array("User-Agent: Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.15) Gecko/20080623 Firefox/2.0.0.15") );
		curl_setopt($this->link, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($this->link, CURLOPT_URL, $this->url);
		curl_setopt($this->link,CURLOPT_ENCODING,true);
	}
	
	function Debug(){
		echo '<h2>Debug Result</h2><pre>' . htmlspecialchars($this->log) . '</pre>';
	}

}

?>