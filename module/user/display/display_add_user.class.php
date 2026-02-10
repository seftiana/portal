<?php
/**
 * DisplayAddUser 
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

class DisplayAddUser extends DisplayBaseFull 
{
   var $mErrorMessage;
   
   
   /**
    * DisplayAddUser::DisplayAddUser
    * Constructor for DisplayAddUser class
    *
    * @param $configObject object Configuration
    * @return void
    */
   function DisplayAddUser(&$configObject, &$security, $err) 
   {
      DisplayBaseFull::DisplayBaseFull($configObject, $security) ;
      
      //set template untuk error dan empty box DisplayBase::SetErrorAndEmptyBox
      $this->SetErrorAndEmptyBox();
      
      $this->mErrorMessage = $err;
      $this->SetTemplateBasedir($configObject->GetValue('app_module') . 'user/templates/');
      $this->SetTemplateFile('add_user.html');
   }
   
   /**
    * DisplayAddUser::Display
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
         $this->AddVar('error_type', 'TYPE', "WARNING");
         $this->AddVar("error_box", "ERROR_MESSAGE", $this->mErrorMessage);
      }
      
      //disini ambil data HakAkses
      $ref = new Reference ($this->mrConfig);
      $hakAkses = $ref->LoadHakAkses();      

      //disini ambil data Unit
      $unit = $ref->GetAllUnitData('101');      
      $formData = $this->mrUserSession->GetProperty("LastFormData");
      if (!empty($formData)) {
         $this->AddVar("content", "USER_NAMA", $formData["txtNamaUser"]);
         $this->AddVar("content", "USER_NAMALENGKAP", $formData["txtNamaLengkap"]);
         $this->AddVar("content", "USER_REFERENSI", $formData["txtReferensi"]);
         $this->AddVar("content", "USER_PRODINAME", $formData["prodiKode"]);
         $this->AddVar("content", "USER_PRODIID", $formData["prodiId"]);
         $hakAksesSelected = $formData["lstHakAkses"];
         $unitSelected = $formData["lstUnitId"];
         $len = sizeof($hakAkses);
         for ($i=0; $i<$len; $i++){
            if ($hakAkses[$i]["id"]==$hakAksesSelected){
               $hakAkses[$i]["selected"] = "selected";
            } else {
               $hakAkses[$i]["selected"] = "";
            }
         }
         
         $len = sizeof($unit);
         for ($i=0; $i<$len; $i++){
            if ($unit[$i]["unit_id"]==$unitSelected){
               $unit[$i]["selected"] = "selected";
            } else {
               $unit[$i]["selected"] = "";
            }
         }
      }
      
      $this->ParseData("hak_akses_list", $hakAkses, "HAKAKSES_");
      $this->ParseData("unit_list", $unit, "UNIT_");
      
      $this->AddVar("content", "URL_SHOWPRODI", $this->mrConfig->GetURL('reference', 'program_studi', 'popup'));
      $this->AddVar("content", "URL_PROCESS", $this->mrConfig->GetURL('user', 'user', 'process'));
      $this->DisplayTemplate();
   }
}

?>