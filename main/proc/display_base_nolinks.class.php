<?php

   class DisplayBaseNoLinks extends DisplayBase
   {
      var $mrUserSession;
      
      function DisplayBaseNoLinks(&$configObject, &$security) 
      {         
         DisplayBase::DisplayBase($configObject); 
         $this->SetDocumentCommon();
         $this->mrUserSession = &$security->mUserIdentity;         
         $this->SetTemplateFile('layout-common-nolinks.html');
      }
      
      function Display()
      {
         DisplayBase::Display();
         $this->mTemplate->AddVar("body", "APPLICATION_NAME", $this->mrConfig->GetValue('app_name'));
         $this->mTemplate->AddVar("body", "APPLICATION_CUSTOMER_NAME",  $_SESSION['identitas']['pt_nama']);
         $this->mTemplate->AddVar("body", "APPLICATION_CUSTOMER_LOGO",  $_SESSION['identitas']['pt_logo']);
		 
         $this->mTemplate->AddVar("body", "APPLICATION_VERSION", $this->mrConfig->GetValue('app_version'));
      }   
   }
?>
