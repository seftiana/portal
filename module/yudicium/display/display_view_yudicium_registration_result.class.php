<?php

   class DisplayViewYudiciumRegistrationResult extends DisplayBaseFull{

     var $mErrorMessage;

      /**
      * DisplayViewYudiciumRegistrationResult::DisplayViewYudiciumRegistrationResult
      * Constructor for DisplayYudiciumRegistration class
      *
      * @param $configObject object Configuration
      * @param $securityObj  object Security
      * @return void
      */
      function DisplayViewYudiciumRegistrationResult (&$configObject, &$security, $errMsg){
         DisplayBaseFull::DisplayBaseFull($configObject, $security);
         $this->SetErrorAndEmptyBox();
         $this->mErrorMessage = $errMsg;
         $this->SetTemplateBasedir($this->mrConfig->GetValue('app_module') . 'yudicium/templates/');
         $this->SetTemplateFile('view_yudicium_registration_result.html');
      }

      function Display(){
         DisplayBaseFull::Display('[ Logout ]');
         $this->ShowErrorBox();
         $this->AddVar("content", "URL_PROCESS", $this->mrConfig->GetURL("yudicium", "yudicium_registration", "view"));
         $this->DisplayTemplate();
      }

      function ShowErrorBox($err = "") {
			$this->AddVar("empty_type", "TYPE","INFO");
         $this->AddVar("empty_box", "WARNING_MESSAGE",$this->ComposeErrorMessage($this->mErrorMessage, $this->mErrorMessage));
         $this->SetAttribute("empty_box","visibility",'visible');
      }

}

?>