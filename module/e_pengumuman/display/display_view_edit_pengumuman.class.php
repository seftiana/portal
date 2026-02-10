<?php
/**
 * DisplayViewEditPengumuman
 * Display class for edit pengumuman
 * 
 * @package e_pengumuman
 * @author Refit Gustaroska
 * @copyright Copyright (c) 2006 GamaTechno
 * @version 1.0 
 * @date 2006-02-22
 * @revision 
 *
 */

class DisplayViewEditPengumuman extends DisplayBaseFull
{

   var $mErrorMessage;
	
	var $mPgmnId;
	
	var $mRole;
	
	var $mProgramStudi;
	
	var $mAddress;
	
	var $mId;
	
	var $mMateri;
	
   /**
    * DisplayViewEditPengumuman::DisplayViewEditPengumuman
    * Constructor for DisplayViewAddPengumuman class
    *
    * @param $configObject object Configuration
    * @param $securityObj  object Security
    * @return void
    */
   function DisplayViewEditPengumuman(&$configObject, $securityObj, $pgmnId) 
   {
		DisplayBaseFull::DisplayBaseFull($configObject, $securityObj); 
		$this->SetErrorAndEmptyBox(); 
		$this->mPgmnId = $pgmnId;
		$this->mId = $this->mrUserSession->GetProperty("UserReferenceId");
		$this->mRole = $this->mrUserSession->GetProperty("Role");
		$this->mSemId = $_SESSION['pengumumanSemester'];
		if($this->mRole == 7)
		{
			$this->mAddress = isset($_SESSION['pengumumanUnit'])? $_SESSION['pengumumanUnit'] : "";
			$this->mProgramStudi =  "";
		}
		else
		{
			$this->mAddress = $this->mrUserSession->GetProperty("ServerServiceAddress");
			$this->mProgramStudi =  $this->mrUserSession->GetProperty("UserProdiId");
		}
		$this->mMateri = new MateriClientService($this->mAddress,false, $this->mId, $this->mProgramStudi);
		$this->SetTemplateBasedir($configObject->GetValue('app_module') . 'e_pengumuman/templates/');
		$this->SetTemplateFile('view_edit_pengumuman.html');
   }
   
      
   /**
    * DisplayViewUser::Display
    * Parsing data to template
    *
    * @param 
    * @return void
    */
   function Display() 
   {
      
		DisplayBaseFull::Display("[ Logout ]"); 
		$this->mTemplate->AddVar("content", "APPLICATION_MODULE", "Edit Pengumuman");
      	//print_r($_SESSION);
		$objPengumuman = new PengumumanClientService($this->mrUserSession->GetProperty("ServerServiceAddress"),false,$this->mId, $this->mProgramStudi);             
		$dataPgmn = $objPengumuman->GetDetailPengumuman($this->mPgmnId);
		//print_r($dataPgmn);
		$this->mTemplate->AddVars('content', $dataPgmn[0]);
		
	    $dataKelas = $this->mMateri->GetKuliahWhereSemester($this->mSemId, $this->mRole);
	    
      if (isset($_GET['err']))
        {
        	$this->mTemplate->SetAttribute("display_error", "visibility", "show");
        	switch ($this->mrConfig->Dec($_GET['err'])){
        		case '1':	$strErr = "Ukuran file melebihi setting server ".ini_get('upload_max_filesize').". Silakan hubungi admin";
        					break;
        		case '2' : 	$strErr = "Ukuran file melebihi batas maksimal 2MB";
        					break;
				case '3' :  $strErr = "File hanya terupload sebagian";
         	         break;
        		case '4' :  $strErr = "Tidak ada file";
        		         break;
        		case '6' :  $strErr = "'Temporary Folder' tidak ditemukan. Silakan hubungi admin";
        		         break;
        		case '7' :  $strErr = "Gagal menyimpan file";
        		         break;
        		case '9' :  $strErr = "Bukan file zip";
        		         break;
        		case '10' :  $strErr = "Judul dan isi pengumuman wajib diisi!";
        		         break;
        	}
        	$this->mTemplate->AddVar("display_error","ERROR", $strErr);
      }
      
		foreach($dataKelas as $kls => $val) {
			$this->mTemplate->AddVars('list_kelas', $val, "KLS_");				
			$this->mTemplate->parseTemplate("list_kelas", "a"); 
			$this->mTemplate->addVar("list_kelas","SELECT_".$dataPgmn[0]['pgmnKlsId'],"selected");
		}
		
		$tmpTglBts = preg_split("/ /", $dataPgmn[0]['pgmnTglBatas']);
		$tmpTgl = substr($tmpTglBts[0],8,2);
		$tmpBln = substr($tmpTglBts[0],5,2);
		$tmpThn = substr($tmpTglBts[0],0,4);
		for($i=1;$i<=31;$i++){
			$tgl = $i;
			if ($i>=1 && $i<=9) {
				$tgl = "0".$i;
			}
			if ($tmpTgl == $tgl) {
				$this->mTemplate->AddVar('list_tgl', 'SELECTED', ' selected');
			}else{
				$this->mTemplate->AddVar('list_tgl', 'SELECTED', '');
			}
			$this->mTemplate->AddVar('list_tgl', 'TGL', $tgl);
			$this->mTemplate->parseTemplate("list_tgl", "a");
		}
      
		for($i=1;$i<=12;$i++){
			$bln = $i;
			if ($i>=1 && $i<=9) {
				$bln = "0".$i;
			}
			if ($tmpBln == $bln) {
				$this->mTemplate->AddVar('list_bln', 'SELECTED', ' selected');
			}else{
				$this->mTemplate->AddVar('list_bln', 'SELECTED', '');
			}
			$this->mTemplate->AddVar('list_bln', 'BLN', $bln);
			$this->mTemplate->parseTemplate("list_bln", "a");
		}
      
		for($i=date('Y')-5;$i<=date('Y')+3;$i++){
			if ($tmpThn == $i) {
				$this->mTemplate->AddVar('list_thn', 'SELECTED', ' selected');
			}else{
				$this->mTemplate->AddVar('list_thn', 'SELECTED', '');
			}
			$this->mTemplate->AddVar('list_thn', 'THN', $i);
			$this->mTemplate->parseTemplate("list_thn", "a");
		}
      
		$this->AddVar('content', 'URL_UPDATE', $this->mrConfig->GetURL('e_pengumuman','pengumuman','process'));
		$this->DisplayTemplate();
	}
   
   function ShowErrorBox($infoavailable = "NO") {
      $this->AddVar("error_box", "ERROR_MESSAGE",  
            $this->ComposeErrorMessage("Pengambilan data pengumuman tidak berhasil." , $this->mErrorMessage));   
      $this->AddVar("data_profile", "INFO_AVAILABLE", $infoavailable);   
      $this->SetAttribute('error_box', 'visibility', 'visible');
   }
}

?>