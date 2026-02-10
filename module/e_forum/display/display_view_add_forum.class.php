<?php
/**
 * DisplayViewProfile
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

class DisplayViewAddForum extends DisplayBaseFull
{

   var $mErrorMessage;
   var $matkulId;
	var $mAddress;
	var $mProdi;
   /**
    * DisplayViewForum::DisplayViewForum
    * Constructor for DisplayViewForum class
    *
    * @param $configObject object Configuration
    * @param $securityObj  object Security
    * @param $userId       integer user id
    * @param $userRole     integer user role
    * @return void
    */
   function DisplayViewAddForum(&$configObject, $securityObj, $matkulId) 
   {
      DisplayBaseFull::DisplayBaseFull($configObject, $securityObj); 
      $this->SetErrorAndEmptyBox(); 
      $this->matkulId = $matkulId; 
		
		if($this->mrUserSession->GetProperty("Role") == 7)
		{
			$this->mAddress = $_SESSION['forum']['unit'];
			$this->mProdi = $_SESSION['forum']['prodi'];
		}
		else
		{
			$this->mAddress = $this->mrUserSession->GetProperty("ServerServiceAddress");
			$this->mProdi = "";
		}
		
      $this->SetTemplateBasedir($configObject->GetValue('app_module') . 'e_forum/templates/');
      $this->SetTemplateFile('view_add_forum.html');
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
      $this->mTemplate->AddVar("content", "APPLICATION_MODULE", "Tambah Forum");
      $this->mTemplate->AddVar("content", "MATKUL", $this->matkulId);
      //var_dump($this->mrUserSession);
      
      
      $this->AddVar('content', 'URL_INSERT', $this->mrConfig->GetURL('e_forum','forum','process')."&act=".$this->mrConfig->Enc('insert'));
      $this->DisplayTemplate();
   }
   
   function ShowErrorBox($infoavailable = "NO") {
      $this->AddVar("error_box", "ERROR_MESSAGE",  
            $this->ComposeErrorMessage("Pengambilan data forum tidak berhasil." , $this->mErrorMessage));   
      $this->AddVar("data_profile", "INFO_AVAILABLE", $infoavailable);   
      $this->SetAttribute('error_box', 'visibility', 'visible');
   }
}

?>