<?php

   class DisplayBasePopup extends DisplayBase
   {
      var $mrUserSession;
      
      function DisplayBasePopup(&$configObject, &$security) 
      {         
         DisplayBase::DisplayBase($configObject);  
         $this->SetDocumentCommon();
         $this->mrUserSession = &$security->mUserIdentity;         
         $this->SetTemplateFile('layout-common-popup.html');
      }
      
      function Display()
      {
         DisplayBase::Display();                  
      }   
   }
?>
