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

class DisplayViewAddThread extends DisplayBaseFull
{

   var $mErrorMessage;
   var $forumId;
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
   function DisplayViewAddThread(&$configObject, $securityObj, $forumId) 
   {
      DisplayBaseFull::DisplayBaseFull($configObject, $securityObj); 
      $this->SetErrorAndEmptyBox(); 
      $this->forumId = $forumId; 
      $this->SetTemplateBasedir($configObject->GetValue('app_module') . 'e_forum/templates/');
      $this->SetTemplateFile('view_add_thread.html');
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
      $this->mTemplate->AddVar("content", "APPLICATION_MODULE", "Tambah Topik");
      $this->mTemplate->AddVar("content", "FORUM_ID", $this->forumId);
      //var_dump($this->mrUserSession);
      
      
      $this->AddVar('content', 'URL_INSERT', $this->mrConfig->GetURL('e_forum','thread','process')."&act=".$this->mrConfig->Enc('insert'));
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