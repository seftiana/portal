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

class DisplayForum extends DisplayBasePopup
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
      DisplayBasePopup::DisplayBasePopup($configObject, $securityObj); 
      $this->SetErrorAndEmptyBox();  
      $this->SetTemplateBasedir($configObject->GetValue('app_module') . 'e_forum/templates/');
      //$this->SetTemplateFile('view_matkul.html');
   }
   
  
   function DisplayChat()
   {
   		DisplayBasePopup::Display("[ Logout ]");
		$this->SetTemplateFile('view_chat.html');
		$this->DisplayTemplate();
   }
   
   function DisplayConference()
   {
   		DisplayBasePopup::Display("[ Logout ]");
		$this->SetTemplateFile('view_conf.html');
		$this->DisplayTemplate();
   }
    
  
}

?>