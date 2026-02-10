<?php
/**
 * DisplayViewDisclaimer
 * Display for View Disclaimer 
 * 
 * @package user 
 * @author Maya Alipin
 * @copyright Copyright (c) 2006 GamaTechno
 * @version 1.0 
 * @date 2006-01-26
 * @revision 
 *
 */

   class DisplayViewDisclaimer extends DisplayBaseFull
   {
      var $mSecurity;
      
      function DisplayViewDisclaimer(&$configObject, &$security)
      {
         
         DisplayBaseFull::DisplayBaseFull($configObject, $security);   
         $this->mSecurity = $security;
         $this->SetTemplateBasedir($configObject->GetValue('app_module') . 'user/templates');
         $this->SetTemplateFile('view_disclaimer.html');
      }
      
      function Display()
      {
         DisplayBaseFull::Display('[ Logout ]');
         $this->DisplayTemplate();
      }
   }
?>