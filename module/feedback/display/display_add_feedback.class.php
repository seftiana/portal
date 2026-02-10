<?php


class DisplayAddFeedback extends DisplayBaseFull{
   var $mErrorMessage;

   function DisplayAddFeedback(&$configObject, &$security, $err) {
      DisplayBaseFull::DisplayBaseFull($configObject, $security);
      $this->mErrorMessage = $err;
      $this->SetErrorAndEmptyBox();
      $this->SetTemplateBasedir($configObject->GetValue('app_module') . 'feedback/templates/');
      $this->SetTemplateFile('add_feedback.html');
   } 
   
   function Display(){
      DisplayBaseFull::Display("[ Logout ]");
      if ($this->mErrorMessage == 'empty') {
         $this->AddVar("error_box", "ERROR_MESSAGE",  'Feedback tidak boleh kosong.');   
         $this->SetAttribute('error_box', 'visibility', 'visible');
      }
      $this->AddVar('content', 'USER_NAME', $this->mrUserSession->GetProperty('UserFullName'));
      $this->AddVar('content', 'URL_PROCESS', $this->mrConfig->GetURL('feedback','feedback','process'));
      $this->DisplayTemplate();
   }
}

?>