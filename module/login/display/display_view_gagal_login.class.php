<?php

   class DisplayViewGagalLogin extends DisplayBaseNoLinks
   {      
      var $mErrorMessage;

      function DisplayViewGagalLogin(&$configObject, $errMsg = NULL)
      {
         DisplayBaseNoLinks::DisplayBaseNoLinks($configObject, $secObject);
         $this->SetDocumentCommonEmpty();
         
         $this->SetTemplateFile('layout-common.html');
         $this->SetTemplateBasedir($this->mrConfig->GetValue('app_module') . 'login/templates/');
         $this->SetTemplateFile('view_gagal_login.html');
         $this->SetProperty("ErrorMessage", $errMsg);
      }

      function Display()
      {
         DisplayBaseNoLinks::Display();
         
		 $this->AddVar("content", "APPLICATION_CUSTOMER_NAME", $this->mrConfig->GetValue('app_client'));
         $msg = $this->GetProperty("ErrorMessage");
         if(!empty($msg))            
            $this->AddVar("content", "LOGIN_FAILED_MSG", $msg);
         $this->DisplayTemplate();
      }
   }
?>