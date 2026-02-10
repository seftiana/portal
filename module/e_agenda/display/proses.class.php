<?php

   /**
     * ProsesAgenda
     * ProsesAgenda class
     * 
     * @package ProsesAgenda
     * @author Fitria Maulina
     * @copyright Copyright (c) 2006 GamaTechno
     * @version 1.0 
     * @date 2006-07-18
     */
class ProsesAgenda extends ProcessBase{
	var $mAgenda;
	var $mUserId;
	var $mMahasiswaProdiId;
	var $mUserIdentity;
	
	function ProsesAgenda(&$configObject,$security, $mId, $prodiId)
	{
		 ProcessBase::ProcessBase($configObject);
         $this->mUserId = $mId;
         $this->mMahasiswaProdiId = $prodiId;
         $this->mUserIdentity =  $security->mUserIdentity;
         $this->mAgenda = new Agenda($this->mUserIdentity->GetProperty("ServerServiceAddress"), false, $this->mUserId, $this->mMahasiswaProdiId);
         $this->mAgenda->SetProperty("UserRole", $this->mUserIdentity->GetProperty("Role"));
         $this->mAgenda->DoSiaSetting();
		
		
	}
	/*
     agJudul, 
		agDesc, 
		agJenisId, 
		agFrekuensiId, 
		agWaktu, 
		agOwner
     */
	
	function Insert($param)
	{	
		$waktu = $param['tglAwal'].'-'.$param['blnAwal'].'-'.$param['thnAwal'].' '.$param['jamAwal'].':'.$param['menitAwal'];
		if($param['jenis'] == 1)//kelas
		{
			$owner = $param['klsId'];
		}
		else //pribadi
		{
			$owner = $this->mUserId;
		}
		
		$arrInput  = array(
			'judul' 		=> $param['nama'],
			'keterangan'	=> $param['keterangan'],
			'jenis'			=> $param['jenis'],
			'frekuensi'		=> $param['frekuensi'],
			'waktu'			=> $waktu,		
			'owner'			=> $owner,		
		);
		
		$arrInput2  = array(
			$param['nama'],
			$param['keterangan'],
			$param['jenis'],
			$param['frekuensi'],
			$waktu,		
			$owner,		
		);
		//print_r($arrInput);
		
		$this->mAgenda->SetArrayParam($arrInput2);
   
		$result = $this->mAgenda->DoInsert();
		if ($result === false) {
			return false;
		} else {
			return $result;
		}		
	}
	
	function DoSetDone($param)
	{
		$this->mAgenda->SetArrayParam($param);
   
		$result = $this->mAgenda->DoSetDone();
		if ($result === false) {
			return false;
		} else {
			return $result;
		}	
	}
	
	function DoDelete($param)
	{
		$this->mAgenda->SetArrayParam($param);
   
		$result = $this->mAgenda->DoDelete();
		if ($result === false) {
			return false;
		} else {
			return $result;
		}
	}
	
	

}
?>