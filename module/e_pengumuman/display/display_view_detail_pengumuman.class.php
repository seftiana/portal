<?php
/**
 * DisplayViewDetailPengumuman
 * Display class for view detail pengumuman
 * 
 * @package e_pengumuman
 * @author Refit Gustaroska
 * @copyright Copyright (c) 2006 GamaTechno
 * @version 1.0 
 * @date 2006-02-22
 * @revision 
 *
 */

class DisplayViewDetailPengumuman extends DisplayBaseFull
{

   var $mErrorMessage;
	
	var $mPgmnId;
	
	var $mRole;
	
	var $mProgramStudi;
	
	var $mAddress;
	
	var $mId;
   /**
    * DisplayViewDetailPengumuman::DisplayViewDetailPengumuman
    * Constructor for DisplayViewDetailPengumuman class
    *
    * @param $configObject object Configuration
    * @param $securityObj  object Security
    * @return void
    */
	function DisplayViewDetailPengumuman(&$configObject, $securityObj, $pgmnId) 
	{
		DisplayBaseFull::DisplayBaseFull($configObject, $securityObj); 
		$this->SetErrorAndEmptyBox(); 
		$this->mPgmnId = $pgmnId;
		$this->SetTemplateBasedir($configObject->GetValue('app_module') . 'e_pengumuman/templates/');
		$this->SetTemplateFile('view_detail_pengumuman.html');
		$this->mId = $this->mrUserSession->GetProperty("UserReferenceId");
		$this->mRole = $this->mrUserSession->GetProperty("Role");
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
      $this->mTemplate->AddVar("content", "APPLICATION_MODULE", "Detail Pengumuman");
		$objPengumuman = new PengumumanClientService($this->mrUserSession->GetProperty("ServerServiceAddress"),false,$this->mId, $this->mProgramStudi);             
		  
		if ($this->mrUserSession->GetProperty('Role') == 1) {
			$objPengumuman->UpdatePengumumanInbox($this->mPgmnId, $this->mrUserSession->GetProperty('User'));
		}		
		
		$dataPgmn = $objPengumuman->GetDetailPengumuman($this->mPgmnId); //print_r($dataPgmn);
		$this->mTemplate->AddVars('content', $dataPgmn[0]);
		$dataPgmn[0]['pgmnIsi'] = str_replace("\n", "<br>", $dataPgmn[0]['pgmnIsi']);
		$dataPgmn[0]['pgmnIsi'] = str_replace('[i]', "<i>", $dataPgmn[0]['pgmnIsi']);
		$dataPgmn[0]['pgmnIsi'] = str_replace('[/i]', "</i>", $dataPgmn[0]['pgmnIsi']);
		$dataPgmn[0]['pgmnIsi'] = str_replace('[b]', "<b>", $dataPgmn[0]['pgmnIsi']);
		$dataPgmn[0]['pgmnIsi'] = str_replace('[/b]', "</b>", $dataPgmn[0]['pgmnIsi']);
		$this->mTemplate->AddVar('content', 'PGMNISI', $dataPgmn[0]['pgmnIsi']);
		$filename = $this->mrConfig->Enc($dataPgmn[0]['pgmnNamaFile']);
		$dtFile = $this->mrConfig->GetUrl("e_pengumuman","download","proses")."&file=".$filename;
		$this->mTemplate->AddVar('content', 'URL_FILE', $dtFile);
		$this->mTemplate->AddVar('content', 'URL_BACk', $this->mrConfig->GetURL('e_pengumuman','pengumuman','view')."&kelas_id=".$this->mrConfig->Enc($dataPgmn[0]['pgmnKlsId']));
		$tmpTglBts = preg_split("/ /", $dataPgmn[0]['pgmnTglBatas']);
		$this->mTemplate->AddVar('content', 'PGMNTGLBTS', $this->IndonesianDate($tmpTglBts[0]));
		$this->mTemplate->AddVar('content', 'PGMNTANGGAL', $this->IndonesianDate($dataPgmn[0]['pgmnTanggal']));
            
      $this->AddVar('content', 'URL_UPDATE', $this->mrConfig->GetURL('e_pengumuman','pengumuman','process')."&act=".$this->mrConfig->Enc('update'));
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