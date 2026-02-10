<?php
/**
 * DisplayChgpasswordUser
 * Display for View Chgpassword User class
 * 
 * @package user 
 * @author Yudhi Aksara, S.Kom
 * @copyright Copyright (c) 2006 GamaTechno
 * @version 1.0 
 * @date 2006-02-14
 * @revision 
 *
 */

   class DisplayChgpasswordUser extends DisplayBaseFull
   {
      var $mErrorMessage;
      var $mErrorType;
            
      function DisplayChgpasswordUser(&$configObject, &$security, $errMsg, $errType)
      {      
         DisplayBaseFull::DisplayBaseFull($configObject, $security);
         $this->mErrorMessage = $errMsg;
         $this->mErrorType = $errType;
         
         //set template untuk error dan empty box DisplayBase::SetErrorAndEmptyBox
         $this->SetErrorAndEmptyBox();
         
         $this->SetTemplateBasedir($configObject->GetValue('app_module') . 'user/templates');
         $this->SetTemplateFile('chgpassword_user.html');
      }
      
      function Display()
      {
         DisplayBaseFull::Display('[ Logout ]');
         $this->AddVar("content", "APPLICATION_MODULE", 'Password');
         if (!empty($this->mErrorMessage)) {
            $this->SetAttribute('error_box', 'visibility', 'visible');
            $this->AddVar('error_type', 'TYPE', strtoupper($this->mErrorType));
            $this->AddVar('error_box', 'ERROR_MESSAGE', $this->mErrorMessage);
         }
         $this->AddVar("content","URL_PROCESS",$this->mrConfig->GetURL('user','user','process'));
         $this->DisplayTemplate();
      }
   }
?>