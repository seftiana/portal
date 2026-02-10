<?php

   class DisplayBasePrint extends DisplayBase
   {
      var $mrUserSession;
      var $mrSecurity;

      function DisplayBasePrint(&$configObject, &$security, $isTranscript = false)
      {
         DisplayBase::DisplayBase($configObject);
         $this->mrSecurity = &$security;
         $this->mrUserSession = &$security->mUserIdentity;
         if ($isTranscript === false){
            $this->SetTemplateFile('layout-common-print.html');
            $this->SetTemplateFile('kop_print.html');
         }
      }

      function Display($judul ='')
      {
         DisplayBase::Display();
         $this->mTemplate->AddVar('document', 'PRINT_TITLE', $judul);
      }
   }
?>
