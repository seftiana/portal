<?php

   /**
     * ProsesMateri
     * ProsesMateri class
     * 
     * @package ProsesMateri
     * @author Fitria Maulina
     * @copyright Copyright (c) 2006 GamaTechno
     * @version 1.0 
     * @date 2006-07-18
     */
class ProsesMateri extends ProcessBase{
	var $mMateri;
	var $mMahasiswaNiu;
	var $mMahasiswaProdiId;
	var $mUserIdentity;
	
	function ProsesMateri(&$configObject,$security, $mhsNiu, $prodiId)
	{
		 ProcessBase::ProcessBase($configObject);
         $this->mMahasiswaNiu = $mhsNiu;
         $this->mMahasiswaProdiId = $prodiId;
         $this->mUserIdentity =  $security->mUserIdentity;
         $this->mMateri = New MateriClientService($this->mUserIdentity->GetProperty("ServerServiceAddress"), false, $this->mMahasiswaNiu, $this->mMahasiswaProdiId);
         $this->mMateri->SetProperty("UserRole", $this->mUserIdentity->GetProperty("Role"));
         $this->mMateri->DoSiaSetting();
		
		
	}
	
	
	function Insert($param,$file="")
	{					
		$this->mMateri->SetJudul(htmlspecialchars($param['judul']));
		$this->mMateri->SetDeskripsi(htmlspecialchars($param['abstraksi']));
		$this->mMateri->SetFile($file);
		$this->mMateri->SetStatus($param['status']);
		$this->mMateri->SetKelasId($param['klsId']);
		$this->mMateri->SetDosenId($this->mUserIdentity->GetProperty("UserReferenceId"));
   
		$result = $this->mMateri->DoInsertMateri();
		if ($result === false) {
			return false;
		} else {
			return $result;
		}		
	}
	
	function Activation($param,$value)
	{
		$this->mMateri->SetId($param);
		$this->mMateri->SetStatus($value);
		
		$result = $this->mMateri->DoActivationMateri();
		if ($result === false) {
			return false;
		} else {
			return $result;
		}		
		
	}
	
	function Delete($param)
	{
		$this->mMateri->SetId($param);
		$result = $this->mMateri->DoDeleteMateri();
		if ($result === false) {
			return false;
		} else {
			return $result;
		}		
	}
	
	function Update($param,$file="")
	{
		$this->mMateri->SetJudul(htmlspecialchars($param['judul']));
		$this->mMateri->SetDeskripsi(htmlspecialchars($param['abstraksi']));
		$this->mMateri->SetFile($file);
		$this->mMateri->SetStatus($param['status']);
		$this->mMateri->SetKelasId($param['klsId']);
		$this->mMateri->SetDosenId($this->mUserIdentity->GetProperty("UserReferenceId"));
		$this->mMateri->SetId($param['id']);
   
		$result = $this->mMateri->DoUpdateMateri();
		if ($result === false) {
			return false;
		} else {
			return $result;
		}		
	}
	

}
?>