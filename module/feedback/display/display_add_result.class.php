<?php


class DisplayAddResult extends DisplayBaseFull{
   var $mErrorMessage;

   function DisplayAddResult(&$configObject, &$security, $errorMsg) {
      DisplayBaseFull::DisplayBaseFull($configObject, $security);
      $this->mErrorMessage = $errorMsg;
      $this->SetErrorAndEmptyBox();
      $this->SetTemplateBasedir($configObject->GetValue('app_module') . 'feedback/templates/');
      $this->SetTemplateFile('add_result.html');
   } 
   
   function Display(){
      DisplayBaseFull::Display("[ Logout ]");
      if ($this->mErrorMessage == "") {
         $this->AddVar("error_box", "ERROR_MESSAGE", "Terimakasih atas masukan yang Anda berikan kepada kami.\nMasukkan Anda akan segera kami sampaikan kepada pihak terkait.");
         $this->AddVar("error_type", 'TYPE', 'INFO');
      } else {
         $this->AddVar("error_box", "ERROR_MESSAGE",  
            $this->ComposeErrorMessage("Maaf, pengiriman feedback tidak berhasil, harap ulangi kembali. " , $this->mErrorMessage));   
      }
      $this->SetAttribute('error_box', 'visibility', 'visible');
      $this->DisplayTemplate();
   }
}

?>