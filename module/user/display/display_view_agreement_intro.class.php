<?php

   class DisplayViewAgreementIntro extends DisplayBaseNoLinks
   {
      function DisplayViewAgreementIntro(&$configObject, &$security)
      {
         DisplayBaseNoLinks::DisplayBaseNoLinks($configObject, $security);   
         $this->SetTemplateBasedir($configObject->GetValue('app_module') . 'user/templates');
         $this->SetTemplateFile('agreement_intro.html');         
      }
      
      function Display()
      {
         DisplayBaseNoLinks::Display();
         $url = $this->mrConfig->GetURL('user', 'user', 'process');
         $this->AddVar("content", "URL_NEXT", $url);
         $this->DisplayTemplate();
      }
   }
?>