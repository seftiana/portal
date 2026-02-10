<?php
/**
 * ProcessPengumuman
 * ProcessPengumuman class
 * 
 * @package e_pengumuman
 * @author Refit Gustaroska
	@updated by Fitria Maulina
 * @copyright Copyright (c) 2006 GamaTechno
 * @version 1.0 
 * @date 2006-05-02
 * @revision 
 *
  */

class ProcessPengumuman extends ProcessBase {
   var $mProcessPengumumanError;
   var $objPengumuman;
   var $mId;
	
	var $mUploadDir;

   /**
    * ProcessPengumuman::ProcessPengumuman
    * Constructor for ProcessPengumuman class
    *
    * @param $configObject object Configuration
    * @return void
    */
	function ProcessPengumuman(&$configObject, $security, $address, $prodi) 
	{
      ProcessBase::ProcessBase($configObject) ;
		$this->mId = $security->mUserIdentity->GetProperty("UserReferenceId");
		$this->objPengumuman = new PengumumanClientService($address, false, $this->mId, $prodi);
		$this->mUploadDir = $configObject->GetValue('file_upload_root').'module/e_pengumuman/file_upload/';
	}
   

	function DoInsertPengumuman($judul, $isi, $file, $kelasId, $tanggalBatas) 
	{    
      
      $result = $this->objPengumuman->InsertPengumuman($judul, $isi, $file, $kelasId, $tanggalBatas);
      if ($result === false) {
         $this->mProcessPengumumanError = $this->objPengumuman->GetProperty("ErrorMessages");
         return false;
      } else {
         return $result;
      }

	}
   
   function DoSendPengumuman($judul, $isi, $file, $kelasId, $tanggalBatas) {
      $mail = new attach_mailer($name = "Dosen", $from = "me@dosen.com", $to = 'gustaroska@gmail.com', $judul, $isi);
		var_dump($mail);
		$mail->create_attachment_part($file['tmp_name']); 
		$mail->process_mail();
		
   }   
      
	function DoUpdatePengumuman($pgmnId, $judul, $isi, $file, $kelasId, $tanggalBatas, $fileName) 
	{    

      $result = $this->objPengumuman->DoUpdatePengumuman($pgmnId, $judul, $isi, $file, $kelasId, $tanggalBatas);
      if ($result === false) {
         $this->mProcessPengumumanError = $this->objPengumuman->GetProperty("ErrorMessages");
         return false;
      } else {
         return $result;
      }

	}
   
   function DoAktifPengumuman($pgmnId) 
   {                  
      //$pengumumanServiceObj = new PengumumanClientService($_SESSION['user_identity_portal']->GetProperty('ServerServiceAddress'), false);      
      $result = $this->objPengumuman->DoAktifasiPengumuman($pgmnId, '1');
      if ($result === false) {
         $this->mProcessPengumumanError = $pengumumanServiceObj->GetProperty("ErrorMessages");
         return false;
      } else {
         return $result;
      }
   }
	
	function DoNonAktifPengumuman($pgmnId) 
   {                  
    //  $pengumumanServiceObj = new PengumumanClientService($_SESSION['user_identity_portal']->GetProperty('ServerServiceAddress'), false);      
      $result = $this->objPengumuman->DoAktifasiPengumuman($pgmnId, '0');
      if ($result === false) {
         $this->mProcessPengumumanError = $pengumumanServiceObj->GetProperty("ErrorMessages");
         return false;
      } else {
         return $result;
      }
   }
	
	function DoDeletePengumuman($pgmnId) 
   {                  
      //$pengumumanServiceObj = new PengumumanClientService($_SESSION['user_identity_portal']->GetProperty('ServerServiceAddress'), false);            
      $result = $this->objPengumuman->DoDeletePengumuman($pgmnId);
      if ($result === false) {
         $this->mProcessPengumumanError = $pengumumanServiceObj->GetProperty("ErrorMessages");
         return false;
      } else {
         return $result;
      }
   }
}