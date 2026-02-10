<?php

   class DisplayViewErrorModuleDenied extends DisplayBaseNoLinks
   {      
   
      function DisplayViewErrorModuleDenied(&$configObject)
      {
         DisplayBaseNoLinks::DisplayBaseNoLinks($configObject, $secObject);
         
         $this->SetTemplateFile('layout-common.html');
         $this->SetTemplateBasedir($this->mrConfig->GetValue('app_module') . 'error/templates/');
         $this->SetTemplateFile('view_module_denied.html');
      }    

      function Display()
      {
         DisplayBaseNoLinks::Display();
         if (isset($this->mrUserSession->mUser)) {
            $this->AddVar('head_addition', 'REDIRECTURL', $this->mrConfig->GetURL('login', 'logout', 'proses'));
         } else {
               $this->AddVar('head_addition', 'REDIRECTURL', $this->mrConfig->GetURL('login', 'login', 'view'));
         }
         $this->AddVar('content', 'TEXTMSG', 'Maaf !! <br>Anda tidak diijinkan mengakses module ini');         
         
         $this->DisplayTemplate();    
      }
   }
?>