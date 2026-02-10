<?php
/**
 * PengumumanClientService
 * PengumumanClientService class
 * 
 * @package e_pengumuman 
 * @author Refit Gustaroska
 * @copyright Copyright (c) 2006 GamaTechno
 * @version 1.0 
 * @date 2006-07-7
 * @revision 
 *
 */
class PengumumanClientService extends SIASettingClientService
{  
   
   function PengumumanClientService($soap_server,$wsdl_status, $userId, $prodiId) {
		SIASettingClientService::SIASettingClientService ($soap_server,$wsdl_status, $userId, $prodiId);		
		//ServiceClient::ServiceClient ($soap_server,$wsdl_status);
		$this->SetReqServiceParams('e_pengumuman', 'pengumuman');
		//$this->mReqServiceParams = array('pModule' => 'e_pengumuman','pSub' => 'pengumuman');    
   }

   function InsertPengumuman($judul, $isi, $file, $klsId, $tglBatas){      
      $tmp = array('pAct' => 'InsertPengumuman');
      $param = array($judul, $isi, $file, $klsId, $tglBatas);   
      //print_r($param); 
      $this->mReqServiceParams = array_merge($this->mReqServiceParams, $tmp);              
      $serviceParams = array($this->mReqServiceParams,$param); 
     //print_r($serviceParams);     
      $result = $this->Call('Dispatch', $serviceParams);      
      //print_r($result);
      return $result;  
   }
   
   function GetListKelas($userId, $role) {
		if ($role == 2) {
	      $tmp = array('pAct' => 'GetListKelasDosen');  
		}else{
			$tmp = array('pAct' => 'GetListKelasMhs');  
		}
      $this->mReqServiceParams = array_merge($this->mReqServiceParams, $tmp);
      $param = array($userId);         
      $serviceParams = array($this->mReqServiceParams,$param);      
      $result = $this->Call('Dispatch', $serviceParams);      
      //print_r($this);
      return $result;            
   }
	
	function GetListKelasBySem($userId, $semId) {
	   $tmp = array('pAct' => 'GetListKelasBySem');  
      $this->mReqServiceParams = array_merge($this->mReqServiceParams, $tmp);
      $param = array($userId, $semId);         
      $serviceParams = array($this->mReqServiceParams,$param);      
      $result = $this->Call('Dispatch', $serviceParams);      
      //print_r($this);
      return $result;            
   }
	
	function GetListSemester($userId) {
		$tmp = array('pAct' => 'GetListSemester');  
      $this->mReqServiceParams = array_merge($this->mReqServiceParams, $tmp);
      $param = array($userId);         
      $serviceParams = array($this->mReqServiceParams,$param);      
      $result = $this->Call('Dispatch', $serviceParams);      
      //print_r($this);
      return $result;            
   }
   
   function GetListKelasBySemesterAdmin($semId) {
		$tmp = array('pAct' => 'GetListKelasBySemesterAdmin');  
      $this->mReqServiceParams = array_merge($this->mReqServiceParams, $tmp);
      $param = array($semId);         
      $serviceParams = array($this->mReqServiceParams,$param);      
      $result = $this->Call('Dispatch', $serviceParams);      
      //print_r($this);
      return $result;            
   }
   
   function GetListSemesterAdmin() {
	  $tmp = array('pAct' => 'GetListSemesterAdmin');  
      $this->mReqServiceParams = array_merge($this->mReqServiceParams, $tmp);
      $param = array();  
		
      $serviceParams = array($this->mReqServiceParams,$param);      
      $result = $this->Call('Dispatch', $serviceParams);      
      //print_r($this);
      return $result;            
   }
   
   function GetAllKelasAdmin() {
		$tmp = array('pAct' => 'GetAllKelasAdmin');  
      $this->mReqServiceParams = array_merge($this->mReqServiceParams, $tmp);
      $param = array();         
      $serviceParams = array($this->mReqServiceParams,$param);      
      $result = $this->Call('Dispatch', $serviceParams);      
      //print_r($this);
      return $result;            
   }
	
	function GetListPengumuman($kelasId, $judul, $tglMulai, $tglAkhir) {
      $tmp = array('pAct' => 'GetListPengumuman');  
      $this->mReqServiceParams = array_merge($this->mReqServiceParams, $tmp);
      $param = array($kelasId, $judul, $tglMulai, $tglAkhir);         
      $serviceParams = array($this->mReqServiceParams,$param);      
      $result = $this->Call('Dispatch', $serviceParams);      
      //print_r($this);
      return $result;            
   }
	
	function GetListPengumumanBaru() {
      $tmp = array('pAct' => 'GetListPengumumanBaru');  
      $this->mReqServiceParams = array_merge($this->mReqServiceParams, $tmp);
      $param = array();         
      $serviceParams = array($this->mReqServiceParams,$param);      
      //print();
      $result = $this->Call('Dispatch', $serviceParams);      
      //print_r($result);
      return $result;            
   }
	
	function GetAllListPengumuman($userId) {
      $tmp = array('pAct' => 'GetAllListPengumuman');  
      $this->mReqServiceParams = array_merge($this->mReqServiceParams, $tmp);
      $param = array($userId);         
      $serviceParams = array($this->mReqServiceParams,$param);      
      $result = $this->Call('Dispatch', $serviceParams);      
      //print_r($this);
      return $result;            
   }
   
   function DoUpdatePengumuman($pgmnId, $judul, $isi, $file, $kelasId, $tanggalBatas) {
      $tmp = array('pAct' => 'UpdatePengumuman');
      $this->mReqServiceParams = array_merge($this->mReqServiceParams, $tmp);
      $param = array($pgmnId, $judul, $isi, $file, $kelasId, $tanggalBatas);            
      $serviceParams = array($this->mReqServiceParams,$param);      
      $result = $this->Call('Dispatch', $serviceParams);      
      //print_r($this);
      return $result;     
   }
   
   function DoDeletePengumuman($pgmnId) {
      $tmp = array('pAct' => 'DeletePengumuman');
      $this->mReqServiceParams = array_merge($this->mReqServiceParams, $tmp);
      $param = array($pgmnId);  
      //print_r($param);
      $serviceParams = array($this->mReqServiceParams,$param);      
      $result = $this->Call('Dispatch', $serviceParams);      
      //print_r($this);
      return $result;     
   }
	
	function DoAktifasiPengumuman($pgmnId, $aktif) {
      $tmp = array('pAct' => 'AktifasiPengumuman');
      $this->mReqServiceParams = array_merge($this->mReqServiceParams, $tmp);
      $param = array($pgmnId, $aktif);            
      $serviceParams = array($this->mReqServiceParams,$param);      
      $result = $this->Call('Dispatch', $serviceParams);      
      //print_r($this);
      return $result;     
   }		
   
   function GetDetailPengumuman($pgmnId) {
      $tmp = array('pAct' => 'GetDetailPengumuman');
      $this->mReqServiceParams = array_merge($this->mReqServiceParams, $tmp);
      $param = array($pgmnId);            
      $serviceParams = array($this->mReqServiceParams,$param);      
      $result = $this->Call('Dispatch', $serviceParams);      
      //print_r($this);
      return $result;
   }
	
	function UpdatePengumumanInbox($pgmnId, $mhsNiu) {
		$pgmni = $this->GetPengumumanInbox($pgmnId);
		if ($pgmni) {
			if (!strpos($pgmni[0]['pgmniMhsNiu'], $mhsNiu)) {
				$mhsNiu = $pgmni[0]['pgmniMhsNiu']." ".$mhsNiu;
				$tmp = array('pAct' => 'UpdatePengumumanInbox');
			}else{
				return;
			}
		}else{
			$tmp = array('pAct' => 'InsertPengumumanInbox');
		}      
      $this->mReqServiceParams = array_merge($this->mReqServiceParams, $tmp);
		$param = array($pgmnId, $mhsNiu);                  
      $serviceParams = array($this->mReqServiceParams,$param);      
      $result = $this->Call('Dispatch', $serviceParams);      
      //print_r($this);
      return $result;     
   }	
	
	function GetPengumumanInbox($pgmnId) {
      $tmp = array('pAct' => 'GetPengumumanInbox');
      $this->mReqServiceParams = array_merge($this->mReqServiceParams, $tmp);
      $param = array($pgmnId);            
      $serviceParams = array($this->mReqServiceParams,$param);      
      $result = $this->Call('Dispatch', $serviceParams);      
      //print_r($this);
      return $result;
   }
	
	function GetDaftarPengumuman($klsId) {
      $tmp = array('pAct' => 'GetDaftarPengumuman');
      $this->mReqServiceParams = array_merge($this->mReqServiceParams, $tmp);
      $param = array($klsId);            
      $serviceParams = array($this->mReqServiceParams,$param);      
      $result = $this->Call('Dispatch', $serviceParams);      
      //print_r($this);
      return $result;
   }
   
   
   /***********************/
   
   function GetListPengumumanWithLimit($klsId, $judul, $tglAwal, $tglAkhir, $start_rec, $num_rec) {
      $tmp = array('pAct' => 'GetListPengumumanWithLimit');
       $this->mReqServiceParams = array_merge($this->mReqServiceParams, $tmp);
	   $param = array($klsId, $judul, $tglAwal, $tglAkhir, $start_rec, $num_rec);
	   //print_r($param);//exit;
      $serviceParams = array($this->mReqServiceParams,$param);      
      $result = $this->Call('Dispatch', $serviceParams);      
      //print_r($this);
      return $result;       
   }
	
	function GetDaftarPengumumanWithLimit($klsId, $start_rec, $num_rec) {
	   $tmp = array('pAct' => 'GetDaftarPengumumanWithLimit');
	    $this->mReqServiceParams = array_merge($this->mReqServiceParams, $tmp);
	   $param = array($klsId, $start_rec, $num_rec);
      $serviceParams = array($this->mReqServiceParams,$param);      
      $result = $this->Call('Dispatch', $serviceParams);      
      //print_r($param);
      return $result;   
   }
	
	function GetListPengumumanBaruWithLimit($start_rec, $num_rec) {  
	//print();
	   $tmp = array('pAct' => 'GetListPengumumanBaruWithLimit');
	    $this->mReqServiceParams = array_merge($this->mReqServiceParams, $tmp);
	   $param = array(0, $num_rec);
	  //print_r($param);
      $serviceParams = array($this->mReqServiceParams,$param);      
      $result = $this->Call('Dispatch', $serviceParams);      
      //print_r($serviceParams);
      return $result;   
      //var_dump($result);
   }
	
	function GetAllListPengumumanWithLimit($userId,$start_rec, $num_rec) {
	   $tmp = array('pAct' => 'GetAllListPengumumanWithLimit');
	    $this->mReqServiceParams = array_merge($this->mReqServiceParams, $tmp);
	   $param = array($userId, $start_rec, $num_rec);
      $serviceParams = array($this->mReqServiceParams,$param);      
      $result = $this->Call('Dispatch', $serviceParams);      
      //print_r($this);
      return $result;     
   }
   
   /********************/
   
   function GetCountListPengumuman($klsId, $judul, $tglAwal, $tglAkhir) {
      $tmp = array('pAct' => 'GetCountListPengumuman');
       $this->mReqServiceParams = array_merge($this->mReqServiceParams, $tmp);
	   $param = array($klsId, $judul, $tglAwal, $tglAkhir);
      $serviceParams = array($this->mReqServiceParams,$param);      
      $result = $this->Call('Dispatch', $serviceParams);      
      //print_r($this);
      return $result;       
   }
	
	function GetCountDaftarPengumuman($klsId) {
	   $tmp = array('pAct' => 'GetCountDaftarPengumuman');
	    $this->mReqServiceParams = array_merge($this->mReqServiceParams, $tmp);
	   $param = array($klsId);
      $serviceParams = array($this->mReqServiceParams,$param);      
      $result = $this->Call('Dispatch', $serviceParams);      
      //print_r($this);
      return $result;   
   }
	
	function GetCountListPengumumanBaru() {  
	   $tmp = array('pAct' => 'GetCountListPengumumanBaru');
	    $this->mReqServiceParams = array_merge($this->mReqServiceParams, $tmp);
	   $param = array();
      $serviceParams = array($this->mReqServiceParams,$param);      
      $result = $this->Call('Dispatch', $serviceParams);      
      //print_r($this);
      return $result;   
   }
	
	function GetCountAllListPengumuman($userId) {
	   $tmp = array('pAct' => 'GetCountAllListPengumuman');
	    $this->mReqServiceParams = array_merge($this->mReqServiceParams, $tmp);
	   $param = array($userId);
      $serviceParams = array($this->mReqServiceParams,$param);      
      $result = $this->Call('Dispatch', $serviceParams);      
      //print_r($this);
      //print_r($this);     
      return $result;     
   }
   
   function GetAllListPengumumanAdminWithLimit($start_rec, $num_rec) {
      $tmp = array('pAct' => 'GetAllListPengumumanAdminWithLimit');
      $this->mReqServiceParams = array_merge($this->mReqServiceParams, $tmp);
      $param = array($start_rec, $num_rec);            
      $serviceParams = array($this->mReqServiceParams,$param);      
      $result = $this->Call('Dispatch', $serviceParams);      
      //print_r($this);
      return $result;
   }
   
   function GetCountAllListPengumumanAdmin() {
      $tmp = array('pAct' => 'GetCountAllListPengumumanAdmin');
      $this->mReqServiceParams = array_merge($this->mReqServiceParams, $tmp);
      $param = array();            
      $serviceParams = array($this->mReqServiceParams,$param);      
      $result = $this->Call('Dispatch', $serviceParams);      
      //print_r($this);
      return $result;
   }
}
?>