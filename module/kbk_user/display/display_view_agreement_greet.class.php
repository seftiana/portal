<?php
/**
 * DisplayViewAgreementGreet
 * Display for View AgreementGreet class
 * 
 * @package user 
 * @author Maya Alipin
 * @copyright Copyright (c) 2006 GamaTechno
 * @version 1.0 
 * @date 2006-01-26
 * @revision 
 *
 */


class DisplayViewAgreementGreet extends DisplayBaseNoLinks
{
   var $mIsChgPasswd;
   var $mSecurity;
   
   function DisplayViewAgreementGreet(&$configObject, &$security, $isChgPasswd=0)
   {
      
      DisplayBaseNoLinks::DisplayBaseNoLinks($configObject, $security);   
      $this->mIsChgPasswd=$isChgPasswd;
      $this->mSecurity=$security;
      $this->SetTemplateBasedir($configObject->GetValue('app_module') . 'kbk_user/templates');
      
   }
   
   function Display()
   {
      DisplayBaseNoLinks::Display("Agreement");
      if ($this->mIsChgPasswd==1){
         $userIdentity = $_SESSION["user_identity_portal"];
         if ($userIdentity->GetProperty("Role") == 8 || $userIdentity->GetProperty("Role") == 9 || $userIdentity->GetProperty("Role") == 10)
            $url = $this->mrConfig->GetURL('kbk_home', 'home', 'view');
         else
            $url = $this->mrConfig->GetURL('home', 'home', 'view');
         $this->AddVar("content", "URL_NEXT", $url);
         $this->DisplayTemplate();
      } else {
         $this->mSecurity->DenyPageAccess();
         exit;
      }
   }
}
?>