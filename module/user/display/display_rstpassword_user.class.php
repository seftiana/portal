<?php
/**
 * DisplayResetPasswordUser 
 * Display class for view form update user
 * 
 * @package 
 * @author Yudhi Aksara
 * @copyright Copyright (c) 2006 GamaTechno
 * @version 1.0 
 * @date 2006-03-01
 * @revision 
 *
 */

class DisplayResetPasswordUser extends DisplayBaseFull 
{

   var $mUserData;
   var $mNewPassword;
   var $mErrorMessage;
   var $mErrorType;
   var $mUserId;
   var $mKey;
   
   /**
    * DisplayUpdateUser::DisplayResetPasswordUser
    * Constructor for DisplayResetPasswordUser class
    *
    * @param $configObject object Configuration
    * @return void
    */
   function DisplayResetPasswordUser(&$configObject, &$security, $userId, $key, $errMsg, $errType, $newPwd) 
   {
      DisplayBaseFull::DisplayBaseFull($configObject, $security) ;
      
      //set template untuk error dan empty box DisplayBase::SetErrorAndEmptyBox
      $this->SetErrorAndEmptyBox();
      //print_r($userId);
      $this->mDataUser = new User($configObject, $userId);
      $this->mErrorMessage = $errMsg;
      $this->mErrorType = $errType;
      $this->mNewPassword = $newPwd;
      $this->mUserId = $userId;
      $this->mKey =  $key;
      $this->SetTemplateBasedir($configObject->GetValue('app_module') . 'user/templates/');
      $this->SetTemplateFile('rstpassword_user.html');
      $this->AddVar("password", "KEY", $this->mrConfig->Enc($this->mKey));
      $this->AddVar("password", "USERID", $this->mrConfig->Enc($this->mUserId));
   }
   
   /**
    * DisplayUpdateUser::Display
    * Parsing data to template
    *
    * @param 
    * @return void
    */
   function Display() 
   {
      DisplayBaseFull::Display("[ Logout ]");
      
      $this->AddVar("content", "APPLICATION_MODULE", 'Manajemen User');      
      $this->AddVar("content", "URL_KEMBALI", $this->mrConfig->GetURL('user','user','view') . '&cari='. $this->mrConfig->Enc($this->mKey));
      $this->AddVar("password", "URL_PROCESS", $this->mrConfig->GetURL('user', 'user', 'process'));
      
      if (!empty($this->mNewPassword)) {
         $this->SetAttribute('new_pwd','visibility','visible');
         $this->AddVar("new_pwd","PASSWORD", $this->mNewPassword);
      }
 
      if (!empty($this->mErrorMessage)){
         $this->SetAttribute('error_box', 'visibility', 'visible');
         $this->AddVar('error_type', 'TYPE', strtoupper($this->mErrorType));
         $this->AddVar('error_box', 'ERROR_MESSAGE', $this->mErrorMessage);
         $this->AddVar('error_box', 'NEW_PASS',$this->mNewPassword);
         $this->AddVar('error_box', 'FIRST_TEXT',', password baru anda: ');
      }
           
      //print_r($this->mUserId);
      //print_r($this->mrConfig->Dec("e51dbsfaf98quqrl0dea8"));
      //disini ambil data user
      $ref = new Reference($this->mrConfig) ;
         $this->mDataUser->SetProperty("UserId", $this->mUserId);
         $dataUser = $this->mDataUser->LoadUserById();
         //echo("<pre>");print_r($dataUser);echo("</pre>");
         if (!empty($dataUser)){
            $this->AddVar("password", "IS_EMPTY", "NO");
            $dataUser[0]['form_name'] = 'Reset Password';
            $unit = $ref->LoadUnitById($dataUser[0]['unit_id']);
            $dataUser[0]['unit_nama'] = $unit[0]['name'];
            $this->ParseData("password", $dataUser ,"USER_");
         }
         else {
            $this->AddVar("password", "IS_EMPTY", "YES");
            $this->AddVar("empty_box", "WARNING_MESSAGE", $this->mDataUser->GetProperty("UserErrorMessage"));
         }
      $this->DisplayTemplate();
   }
}

?>