<?php
include_once $cfg->GetValue('app_service') . "client/sireg/sireg_setting_client.service.class.php";

class UserSiregService extends SiregSettingClientService{
	var $mModule = 'mahasiswa';
	function UserSiregService($url){
		SiregSettingClientService::SiregSettingClientService($url) ;
	}
	
	function GetBiodataMahasiswa($niu){
		$post['niu'] = $niu;
		$post['func'] =  'GetBiodataMahasiswa';
		$ret = $this->Post($post);
		return $ret;
	}
	
	function GetDataOrangTua($niu){
		$post['niu'] = $niu;
		$post['func'] =  'GetDataOrangTua';
		$ret = $this->Post($post);
		#$this->Debug();
		return $ret;
	}
	
	function GetDataSma($niu){
		$post['niu'] = $niu;
		$post['func'] =  'GetDataSma';
		$ret = $this->Post($post);
		#$this->Debug();
		return $ret;
	}
	
	function GetListReferensiMahasiswa(){
		$post['func'] =  'GetListReferensiMahasiswa';
		$ret = $this->Post($post);
		return $ret;
	}
	
	function GetListReferensiOrangTua(){
		$post['func'] =  'GetListReferensiOrangTua';
		$ret = $this->Post($post);
		return $ret;
	}
	
	function GetListReferensiSma(){
		$post['func'] =  'GetListReferensiSma';
		$ret = $this->Post($post);
		return $ret;
	}
	
	function GetReference($arg){
		$post['func'] =  'GetReference';
		$post['arg'] = json_encode($arg);
		$ret = $this->Post($post);
		return $ret;
	}
	
	function DoUpdateBiodataMahasiswa($niu){
		$post['func'] =  'DoUpdateBiodataMahasiswa';
		$post['arg'] = json_encode($_POST);
		$post['niu'] = $niu;
		$ret = $this->Post($post);
		// $this->Debug();die;
		return $ret;
	}
	
	function DoUpdateBiodataOrangTua($niu){
		$post['func'] =  'DoUpdateBiodataOrangTua';
		$post['arg'] = json_encode($_POST);
		$post['niu'] = $niu;
		$ret = $this->Post($post);
		// $this->Debug();die;
		return $ret;
	}
	
	function DoUpdateBiodataSmta($niu){
		$post['func'] =  'DoUpdateBiodataSmta';
		$post['arg'] = json_encode($_POST);
		$post['niu'] = $niu;
		$ret = $this->Post($post);
		// $this->Debug();die;
		return $ret;
	}
}
?>