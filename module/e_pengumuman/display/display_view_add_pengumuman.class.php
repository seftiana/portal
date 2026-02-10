<?php
/**
 * DisplayViewAddPengumuman
 * Display class for view and search user
 * 
 * @package 
 * @author Refit Gustaroska
 * @copyright Copyright (c) 2006 GamaTechno
 * @version 1.0 
 * @date 2006-02-22
 * @revision 
 *
 */

class DisplayViewAddPengumuman extends DisplayBaseFull
{

   var $mErrorMessage;
	
	var $mKelasId;
	
	var $mSubmitSmstr;
	
	var $mRole;
	
	var $mProgramStudi;
	
	var $mAddress;
	
	var $mId;
	
	var $mMateri;
	
   /**
    * DisplayViewAddPengumuman::DisplayViewAddPengumuman
    * Constructor for DisplayViewAddPengumuman class
    *
    * @param $configObject object Configuration
    * @param $securityObj  object Security
    * @return void
    */
   function DisplayViewAddPengumuman(&$configObject, $securityObj, $klsId, $submitSmstr) 
   {
    DisplayBaseFull::DisplayBaseFull($configObject, $securityObj); 
    $this->SetErrorAndEmptyBox(); 
	$this->mKelasId = $klsId;
	$this->mSubmitSmstr = $submitSmstr;
	
	$this->mRole = $this->mrUserSession->GetProperty("Role");
	if($this->mRole == 7)
	{
		$this->mAddress = isset($_SESSION['pengumumanUnit'])? $_SESSION['pengumumanUnit'] : "";
		$this->mProgramStudi =  isset($_SESSION['pengumumanProdi'])? $_SESSION['pengumumanProdi'] : "";
	}
	else
	{
		$this->mAddress = $this->mrUserSession->GetProperty("ServerServiceAddress");
		$this->mProgramStudi =  $this->mrUserSession->GetProperty("UserProdiId");
	}
    $this->SetTemplateBasedir($configObject->GetValue('app_module') . 'e_pengumuman/templates/');
    $this->SetTemplateFile('view_add_pengumuman.html');
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
		$this->mTemplate->AddVar("content", "APPLICATION_MODULE", "Upload Pengumuman");
		$objPengumuman = new PengumumanClientService($this->mAddress,false,$this->mId, $this->mProgramStudi); 
		//print_r($objPengumuman);
      
		if($this->mrUserSession->GetProperty('Role') == 7){
			$dataKelas = $objPengumuman->GetListKelasBySemesterAdmin($this->mSubmitSmstr);
		}else if($this->mrUserSession->GetProperty('Role') == 2){
			$dataKelas = $objPengumuman->GetListKelasBySem($this->mrUserSession->GetProperty('User'), $this->mSubmitSmstr);
		}
		//print_r($_GET);exit;
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
		
		if(!empty($dataKelas)) 
		{
                                       //print_r($dataKelas);
			foreach($dataKelas as $row => $val) 
			{ 
					$this->mTemplate->AddVars('list_kelas', $val,'KLS');
					$this->mTemplate->parseTemplate("list_kelas", "a"); 
					$this->mTemplate->addVar("list_kelas","SELECT_".$this->mKelasId,"selected");					
			}
		}

      $this->mTemplate->AddVar("content", "PENGUMUMAN_JUDUL", $_SESSION['pengumumanJudul']);
      $this->mTemplate->AddVar("content", "PENGUMUMAN_ISI", $_SESSION['pengumumanIsi']);
      $tglBatas = $_SESSION['pengumumanBatas'];
      if(empty($tglBatas)){
         $tglBatas = date('Y-m-d');
      }
      $arrDate = explode("-",$tglBatas);
      
      for($i=1;$i<=31;$i++){
         $tgl = $i;
         if ($i>=1 && $i<=9) {
            $tgl = "0".$i;
         }

         $tglx = $arrDate[2];
         if($tgl==$tglx){
            $this->mTemplate->AddVar('list_tgl', 'IS_SELECT', "selected=\"selected\"");
         }else{
            $this->mTemplate->AddVar('list_tgl', 'IS_SELECT', "");
         }
         $this->mTemplate->AddVar('list_tgl', 'TGL', $tgl);
         $this->mTemplate->parseTemplate("list_tgl", "a");
      }
      
      for($i=1;$i<=12;$i++){
         $bln = $i;
         if ($i>=1 && $i<=9) {
            $bln = "0".$i;
         }

         $blnx = $arrDate[1];
         if($bln==$blnx){
            $this->mTemplate->AddVar('list_bln', 'IS_SELECT', "selected=\"selected\"");
         }else{
            $this->mTemplate->AddVar('list_bln', 'IS_SELECT', "");
         }
         $this->mTemplate->AddVar('list_bln', 'BLN', $bln);
         $this->mTemplate->parseTemplate("list_bln", "a");
      }
      
      for($i=(date('Y')-3);$i<=(date('Y')+3);$i++){

         $thnx = $arrDate[0];
         if($i==$thnx){
            $this->mTemplate->AddVar('list_thn', 'IS_SELECT', "selected=\"selected\"");
         }else{
            $this->mTemplate->AddVar('list_thn', 'IS_SELECT', "");
         }
         $this->mTemplate->AddVar('list_thn', 'THN', $i);
         $this->mTemplate->parseTemplate("list_thn", "a");
      }
      
      
      $this->AddVar('content', 'URL_INSERT', $this->mrConfig->GetURL('e_pengumuman','pengumuman','process')."&act=".$this->mrConfig->Enc('insert'));
		$this->AddVar('content', 'URL_RIWAYAT', $this->mrConfig->GetURL('e_pengumuman','pengumuman','view'));
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