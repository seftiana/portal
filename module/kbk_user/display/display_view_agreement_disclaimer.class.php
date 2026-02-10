<?php
/**
 * DisplayViewAgreementDisclaimer
 * Display for View AgreementDisclaimer class
 * 
 * @package user 
 * @author Maya Alipin
 * @copyright Copyright (c) 2006 GamaTechno
 * @version 1.0 
 * @date 2006-01-26
 * @revision 
 *
 */

   class DisplayViewAgreementDisclaimer extends DisplayBaseNoLinks
   {
      var $mIsIntro;
      var $mSecurity;
      
      function DisplayViewAgreementDisclaimer(&$configObject, &$security, $isIntro = 0)
      {
         
         DisplayBaseNoLinks::DisplayBaseNoLinks($configObject, $security);   
         $this->mIsIntro=$isIntro;
         $this->mSecurity = $security;
         $this->SetTemplateBasedir($configObject->GetValue('app_module') . 'kbk_user/templates');
         $this->SetTemplateFile('agreement_disclaimer.html');
      }
      
      function Display()
      {
         DisplayBaseNoLinks::Display();
         if ($this->mIsIntro == 1) {
            $this->AddVar("content", "URL_NEXT", $this->mrConfig->GetURL('kbk_user', 'user', 'process'));
            $this->DisplayTemplate();
         } else {
            $this->mSecurity->DenyPageAccess();
            exit;
         }
      }
   }
?>