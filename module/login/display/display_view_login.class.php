<?php

   class DisplayViewLogin extends DisplayBaseNoLinks
   {      

      function DisplayViewLogin(&$configObject)
      {
         DisplayBaseNoLinks::DisplayBaseNoLinks($configObject, $secObject);
         
         $this->SetDocumentCommonEmpty();
         $this->SetTemplateFile('layout-common.html');
         $this->SetTemplateBasedir($this->mrConfig->GetValue('app_module') . 'login/templates/');
         $this->SetTemplateFile('view_login.html');
      }    

      function Display()
      {
         DisplayBaseNoLinks::Display();
		 $this->AddVar("content", "APPLICATION_CUSTOMER_NAME", $this->mrConfig->GetValue('app_client'));
		 $this->AddVar("document", "LOAD_FUNCTION", "clearUserNameField();clearPasswordField();");
         $this->AddVar("content", "URL_GOTO", $this->mrConfig->GetURL('login', 'login', 'proses'));
		 if($this->mrConfig->GetValue('enable_kuisioner') == true){
			$this->SetAttribute("link_kuis","visibility", "visible");
	         $this->AddVar("link_kuis", "VIEW_HASIL_KUISIONER", $this->mrConfig->GetURL('kuisioner', 'hasil_kuisioner', 'view'));
		 }else{
			$this->SetAttribute("link_kuis","visibility", "hidden");
		 }
         $this->DisplayTemplate();    
      }
   }
?>