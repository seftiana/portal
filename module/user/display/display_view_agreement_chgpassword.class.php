<?php
/**
 * DisplayViewAgreementChgpassword
 * Display for View AgreementChgpassword class
 * 
 * @package user 
 * @author Maya Alipin
 * @copyright Copyright (c) 2006 GamaTechno
 * @version 1.0 
 * @date 2006-01-26
 * @revision 
 *
 */

   class DisplayViewAgreementChgpassword extends DisplayBaseNoLinks
   {
      var $mIsDisc;
      var $mSecurity;
      var $mErr;
      
      function DisplayViewAgreementChgpassword(&$configObject, &$security, $isDisc=0, $err=0)
      {      
         DisplayBaseNoLinks::DisplayBaseNoLinks($configObject, $security);   
         $this->mIsDisc = $isDisc;
         $this->mErr = $err;
         $this->mSecurity = $security;
         $this->SetTemplateBasedir($configObject->GetValue('app_module') . 'user/templates');
         $this->SetTemplateFile('agreement_chgpassword.html');
      }
      
      function Display()
      {
         DisplayBaseNoLinks::Display();         
         if ($this->mIsDisc == 1) {
            if (!empty($this->mErr)) {
               $error = $this->mErr;
               $this->AddVar("content", "ERR_MSG", $error);
            }
            $url = $this->mrConfig->GetURL('user', 'user', 'process');
            $this->AddVar("content", "URL_NEXT", $url);
            $this->DisplayTemplate();
         } else {            
            $this->mSecurity->DenyPageAccess();
            exit;
         }
      }
   }
?>