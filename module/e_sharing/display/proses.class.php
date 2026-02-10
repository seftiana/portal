<?php

   /**
     * ProsesSharing
     * ProsesSharing class
     * 
     * @package ProsesSharing
     * @author Fitria Maulina
     * @copyright Copyright (c) 2006 GamaTechno
     * @version 1.0 
     * @date 2006-07-18
     */
class ProsesSharing extends ProcessBase{
	var $mSharing;
	var $mUserId;
	var $mMahasiswaProdiId;
	var $mUserIdentity;
	
	function ProsesSharing(&$configObject,$security, $mId, $prodiId)
	{
		 ProcessBase::ProcessBase($configObject);
         $this->mUserId = $mId;
         $this->mMahasiswaProdiId = $prodiId;
         $this->mUserIdentity =  $security->mUserIdentity;
         $this->mSharing = new ShareClientService($this->mUserIdentity->GetProperty("ServerServiceAddress"), false, $this->mUserId, $this->mMahasiswaProdiId);
         $this->mSharing->SetProperty("UserRole", $this->mUserIdentity->GetProperty("Role"));
         $this->mSharing->DoSiaSetting();
		
		
	}
	
	
	function Insert($param,$file="")
	{	
		$arrInput  = array(
			'judul' => $param['judul'],
			'file'	=> $file,
			'keterangan'	=> $param['keterangan'],
			'sender'	=> $this->mUserId .' - '.$this->mUserIdentity->GetProperty("UserFullName")			
		);
		
		$this->mSharing->SetArrayParam($arrInput);
   
		$result = $this->mSharing->DoInsert();
		if ($result === false) {
			return false;
		} else {
			return $result;
		}		
	}
	
	function Update_status($param)
	{	//print_r($param);
		$arrInput  = array(
			'status' => $param['isAktifkan'],
			'id'	=> implode(',',array_keys($param['chk']))
		);
		
		$this->mSharing->SetArrayParam($arrInput);
   
		$result = $this->mSharing->DoUpdateStatus();
		if ($result === false) {
			return false;
		} else {
			return $result;
		}		
	}	

	function Delete_file($param)
	{	//print_r($param);
		$arrInput  = array(
			'id'	=> implode(',',array_keys($param['chk']))
		);

      $this->mSharing->SetArrayParam($arrInput);
   
		$result = $this->mSharing->DoDelete();
		if ($result === false) {
			return false;
		} else {
		   $uploadDir = $this->mrConfig->GetValue('file_upload_root')."module/e_sharing/file_upload/";

         foreach($param['chk'] AS $file){
            unlink($uploadDir.$file);   
         }
			return $result;
		}		
	}	
}
?>