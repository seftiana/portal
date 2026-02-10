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

class DisplayViewEditForum extends DisplayBaseFull
{
   var $forumId;
   var $mErrorMessage;
   
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
   function DisplayViewEditForum(&$configObject, $securityObj, $forumId) 
   {
      DisplayBaseFull::DisplayBaseFull($configObject, $securityObj); 
      $this->SetErrorAndEmptyBox();  
      $this->forumId = $forumId;
      $this->SetTemplateBasedir($configObject->GetValue('app_module') . 'e_forum/templates/');
      $this->SetTemplateFile('view_edit_forum.html');
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
      $this->mTemplate->AddVar("content", "APPLICATION_MODULE", "Edit Forum");
      $objForum = new ForumClientService($this->mrUserSession->GetProperty("ServerServiceAddress"),false);             
      $dataForum = $objForum->GetDetailForum($this->forumId);

      $this->mTemplate->addVars('content', $dataForum[0]); 
      $this->AddVar('content', 'URL_UPDATE', $this->mrConfig->GetURL('e_forum','forum','process').'&act='.$this->mrConfig->Enc('update'));
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