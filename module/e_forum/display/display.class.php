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

class DisplayForum extends DisplayBaseFull
{

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
   function DisplayForum(&$configObject, $securityObj) 
   {
      DisplayBaseFull::DisplayBaseFull($configObject, $securityObj); 
      $this->SetErrorAndEmptyBox();  
      $this->SetTemplateBasedir($configObject->GetValue('app_module') . 'e_forum/templates/');
      //$this->SetTemplateFile('view_matkul.html');
   }
   
   function DisplayPesertaKelas()
   {
   		DisplayBaseFull::Display("[ Logout ]");
		$this->AddVar('content', 'URL',$this->mrConfig->GetURL('e_forum','chat','view'));
		$this->AddVar('content', 'URL_ACTION',$this->mrConfig->GetURL('e_forum','conf','view'));
		$this->AddVar('content', 'URL_CONF',$this->mrConfig->GetURL('e_forum','conf','view'));
		$this->DisplayTemplate();
   }
   
   function DisplayChat()
   {
   		DisplayBaseFull::Display("[ Logout ]");
		$this->SetTemplateFile('view_chat.html');
		$this->DisplayTemplate();
   }
    
  
}

?>