<?php
/**
 * DisplayUpdateUser 
 * Display class for view form update user
 * 
 * @package 
 * @author Maya Alipin
 * @copyright Copyright (c) 2006 GamaTechno
 * @version 1.0 
 * @date 2006-03-01
 * @revision 
 *
 */

class DisplayUpdateUser extends DisplayBaseFull 
{

   var $mUserData;
   
   /**
    * DisplayUpdateUser::DisplayUpdateUser
    * Constructor for DisplayUpdateUser class
    *
    * @param $configObject object Configuration
    * @return void
    */
   function DisplayUpdateUser(&$configObject, &$security, $userId, $key, $err) 
   {
      DisplayBaseFull::DisplayBaseFull($configObject, $security) ;
      
      //set template untuk error dan empty box DisplayBase::SetErrorAndEmptyBox
      $this->SetErrorAndEmptyBox();
      
      $this->mDataUser = new User($configObject, $userId);
      $this->mErrorMessage = $err;
      $this->SetTemplateBasedir($configObject->GetValue('app_module') . 'user/templates/');
      $this->SetTemplateFile('update_user.html');
      $this->AddVar("content", "KEY", $key);
      $this->AddVar("content", "USERID", $userId);
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
      
      if ($this->mErrorMessage !=""){
         $this->SetAttribute('error_box', 'visibility', 'visible');
         $this->AddVar('empty_type', 'TYPE', "WARNING");
         $this->AddVar("error_box", "ERROR_MESSAGE", $this->ComposeErrorMessage($this->mErrorMessage));
      }
      //disini ambil data user
      $ref = new Reference($this->mrConfig) ;
      $formData = $this->mrUserSession->GetProperty("LastFormData");
      if (!empty($formData)) {
         //print_r($formData); exit;
         $userNama = $formData["txtNamaUser"];
         $userNamaLengkap = $formData["txtNamaLengkap"];
         $userReferensi = $formData["txtReferensi"];
         $userProdiKode = $formData["prodiKode"];
         $userProdiId = $formData["prodiId"];
         $hakAksesSelected = $formData["lstHakAkses"];
         $unitSelected = $formData["lstUnitId"];
      } else{
         $dataUser = $this->mDataUser->LoadUserById();
         
         if (!empty($dataUser)){
            $userNama = $dataUser[0]["nama"];
            $userNamaLengkap = $dataUser[0]["profil"];
            $userReferensi = $dataUser[0]["referensi"];
            $userProdiId = $dataUser[0]["prodi_kode"];
            
            $hakAksesSelected = $dataUser[0]["hak_id"];
            $unitSelected = $dataUser[0]["unit_id"];
            
            $prodi = $ref->LoadProdiById($dataUser[0]["prodi_kode"]);
            //print_r($prodi);
            $userProdiKode = $prodi[0]["name"];
         }
      }
         
      $this->AddVar("content", "USER_NAMA", $userNama);
      $this->AddVar("content", "USER_NAMALENGKAP", $userNamaLengkap);
      $this->AddVar("content", "USER_REFERENSI", $userReferensi);
      $this->AddVar("content", "USER_PRODINAME", $userProdiKode);
      $this->AddVar("content", "USER_PRODIID", $userProdiId);
      
      //disini ambil data HakAkses
      $hakAkses = $ref->LoadHakAkses();     
      $len = sizeof($hakAkses);
      for ($i=0; $i<$len; $i++){
         if ($hakAkses[$i]["id"]==$hakAksesSelected){
            $hakAkses[$i]["selected"] = "selected";
         } else {
            $hakAkses[$i]["selected"] = "";
         }
      }
      $this->ParseData("hak_akses_list", $hakAkses, "HAKAKSES_");
      
      //disini ambil data Unit
      $unit = $ref->GetAllUnitData('101');      
      $len = sizeof($unit);
      for ($i=0; $i<$len; $i++){
         if ($unit[$i]["unit_id"]==$unitSelected){
            $unit[$i]["selected"] = "selected";
         } else {
            $unit[$i]["selected"] = "";
         }
      }
      $this->ParseData("unit_list", $unit, "UNIT_");
      
      $this->AddVar("content", "URL_SHOWPRODI", $this->mrConfig->GetURL('reference', 'program_studi', 'popup'));
      $this->AddVar("content", "URL_PROCESS", $this->mrConfig->GetURL('user', 'user', 'process'));
      $this->DisplayTemplate();
   }
}

?>