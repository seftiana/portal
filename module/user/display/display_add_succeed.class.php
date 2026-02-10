<?php
/**
 * DisplayAddSucceed 
 * Display class for view form add user
 * 
 * @package 
 * @author Maya Alipin
 * @copyright Copyright (c) 2006 GamaTechno
 * @version 1.0 
 * @date 2006-02-01
 * @revision 
 *
 */

class DisplayAddSucceed extends DisplayBaseFull 
{

   var $mUserData ;
   
   
   /**
    * DisplayAddSucceed::DisplayAddSucceed
    * Constructor for DisplayAddSucceed class
    *
    * @param $configObject object Configuration
    * @return void
    */
   function DisplayAddSucceed(&$configObject, &$security, $userId, $password, $msg) 
   {
      DisplayBaseFull::DisplayBaseFull($configObject, $security) ;
      
      //set template untuk error dan empty box DisplayBase::SetErrorAndEmptyBox
      $this->SetErrorAndEmptyBox();
      
      $this->mUserData = new User($configObject, $userId);
      $this->mUserData->SetProperty("UserNewPassword", $password);
      $this->mUserData->SetProperty("UserErrorMessage", $msg);
      $this->mUserId = $userId;
      $this->SetTemplateBasedir($configObject->GetValue('app_module') . 'user/templates/');
      $this->SetTemplateFile('add_succeed.html');
   }
   
   /**
    * DisplayAddSucceed::Display
    * Parsing data to template
    *
    * @param 
    * @return void
    */
   function Display() 
   {
      DisplayBaseFull::Display("[ Logout ]");
      
      
      $dataUser = $this->mUserData->LoadUserById();
      
      if (!empty($dataUser)){
         $referensi = new Reference($this->mrConfig) ;
         $this->AddVar("content", "USER_NAMA", $dataUser[0]["nama"]);
         $this->AddVar("content", "USER_PASSWORD", $this->mUserData->GetProperty("UserNewPassword"));
         
         $hakAkses = $referensi->LoadHakAksesById($dataUser[0]["hak_id"]);
         $this->AddVar("content", "USER_HAKAKSES", $hakAkses[0]["name"]);
         $this->AddVar("content", "USER_NAMALENGKAP", $dataUser[0]["profil"]);
         
         $unit = $referensi->LoadUnitById($dataUser[0]["unit_id"]);
         $this->AddVar("content", "USER_UNIT", $unit[0]["name"]);
         
         $prodi = $referensi->LoadProdiById($dataUser[0]["prodi_kode"]);
         $this->AddVar("content", "USER_NAMAPRODI", $prodi[0]["name"]);
         $this->AddVar("content", "USER_REFERENSI", $dataUser[0]["referensi"]);
      }
      $this->SetAttribute('error_box', 'visibility', 'visible');
      if ($this->mUserData->GetProperty("UserErrorMessage")==""){
         $this->AddVar('error_type', 'TYPE', "INFO");
         $this->AddVar("error_box", "ERROR_MESSAGE", $this->ComposeErrorMessage("Berhasil menambah data user"));
      } else {
         $this->AddVar('error_type', 'TYPE', "WARNING");
         $this->AddVar("error_box", "ERROR_MESSAGE", $this->ComposeErrorMessage($this->mDataUser->GetProperty('UserErrorMessage')));
      }
      $this->AddVar("content", "URL_VIEW", $this->mrConfig->GetURL('user', 'user', 'view'));
      $this->DisplayTemplate();
   }
}

?>