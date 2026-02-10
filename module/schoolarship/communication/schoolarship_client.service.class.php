<?php
/**
 * SchoolarshipClientService
 * SchoolarshipClientService class
 * 
 * @package schoolarship
 * @author Maya Alipin 
 * @copyright Copyright (c) 2006 GamaTechno
 * @version 1.0 
 * @date 2006-10-06
 * @revision 
 *
 */
 
 class SchoolarshipClientService extends ServiceClient {
	var $mFakultasId;
	//var $mSchoolarshipErrorMessage;
 
	function SchoolarshipClientService($soap_server, $wsdl_status, $fakultasId="") {
		 ServiceClient::ServiceClient($soap_server, $wsdl_status);
		 $this->mFakultasId = $fakultasId;
	}
 
	function GetBeasiswaMahasiswa($offset='', $limit='', $klp='', $jenis='%', $sumber='%') {
      $param = array($offset, $limit, $klp,$this->mFakultasId,$jenis,$sumber);
      $result = $this->Call('GetAllBeasiswa', $param);
		return $result;
   }
	
	function GetTotalBeasiswaMahasiswa($klp='', $jenis='%', $sumber='%') {
      $param = array($klp,$this->mFakultasId,$jenis,$sumber);
      $result = $this->Call('GetAllBeasiswaCountAsInteger', $param);
      return $result;
   }
	
	function GetDetailBeasiswaMahasiswa($id) {
      $param = array($id);
      $result = $this->Call('GetDetailBeasiswa', $param);
		return $result;
   }
	
	function GetNominalBeasiswaMahasiswa($id) {
      $param = array($id);
      $result = $this->Call('GetNominalBeasiswa', $param);
		return $result;
   }
	
	function GetRegisteredBeasiswaForMahasiswa($niu) {
      $param = array($niu);
      $result = $this->Call('GetRegisteredBeasiswaForMahasiswa', $param);
		return $result;
   }
	
	function GetAcceptedActiveBeasiswaForMahasiswa($niu) {
      $param = array($niu);
      $result = $this->Call('GetAcceptedActiveBeasiswaForMahasiswa', $param);
		return $result;
   }
	
	function IsDataMahasiswaExist($niu) {
		$param = array($niu);
      $result = $this->Call('GetDataPribadi', $param);
		if (!empty($result)) {
			return true;
		} else {
			return false;
		}
	}
	
	function GetParentList($niu, $ortuId="") {
      $param = array($niu, $ortu);
      $result = $this->Call('GetDataOrangTua', $param);
		return $result;
   }
	
	function GetRelativeList($niu, $saudaraId="") {
      $param = array($niu, $saudaraId);
      $result = $this->Call('GetDataSaudara', $param);
		return $result;
   }
	
   function DoAddRelative($niu, $arrDataRelative) {
      $param = array_merge(array($niu), $arrDataRelative);
      $param = array($param);
      $result = $this->Call('InsertDataSaudara', $param);
		return $result;
   }

   function DoUpdateRelative($idSaudara, $arrDataRelative) {
      $param = array_merge($arrDataRelative, array($idSaudara));
      $param = array($param);
      $result = $this->Call('UpdateDataSaudara', $param);
		return $result;
   }   
   
   function DoAddParent($niu, $arrDataOrtu) {
      $param = array_merge(array($niu), $arrDataOrtu);
      $param = array($param);
      $result = $this->Call('InsertDataOrangtua', $param);
		return $result;
   }

   function DoUpdateParent($idOrtu, $arrDataOrtu) {
      $param = array_merge($arrDataOrtu, array($idOrtu));
      $param = array($param);
      $result = $this->Call('UpdateDataOrangtua', $param);
		return $result;
   }   
   
   function DoAddInfoPribadi($niu, $arrDataPribadi) {
      $param = array($niu, $arrDataPribadi);
      $result = $this->Call('InsertDataPribadi', $param);
		return $result;
   }
   
   function DoAddStudyHistory($semester, $niu, $arrDataStudi) {
      $param = array($semester, $niu, $arrDataStudi);
      $result = $this->Call('InsertDataHistoryStudi', $param);
		return $result;
   }
   
   function DoApplyBeasiswa($data) {
      $param = array($data);
      $result = $this->Call('ApplyBeasiswa', $param);
		return $result;
   }
 }

?>