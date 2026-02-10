<?php
/**
 * @author Nikolius
 * @email n1colius.lau@gmail.com
 * @date 11 - 9 - 2012 10:2
 */
class DisplayViewFormTgsTmbhan extends DisplayBaseFull{
   
   var $mServiceServerAddress;
   var $mDosenServiceObj;   
   var $mKelasId;
   var $mSemester;
   var $mMhsNiu;
   var $mKrsdtId;
   var $mOpsi;
   var $mId;
   
   function DisplayViewFormTgsTmbhan(&$configObject,&$security,$serverAddress,$kelas,$semester,$mhsNiu,$krsdtId,$opsi,$id){      
      DisplayBaseFull::DisplayBaseFull($configObject, $security);
      $this->mServiceServerAddress = $serverAddress;
      $this->mKelasId = $kelas;
      $this->mSemester = $semester;
      $this->mMhsNiu = $mhsNiu;
      $this->mKrsdtId = $krsdtId;
      $this->mOpsi = $opsi;
      $this->mId = $id;
      
      $this->mDosenServiceObj = new DosenClientService($this->mServiceServerAddress, false,$this->mrUserSession->GetProperty("UserReferenceId"), $this->mrUserSession->GetProperty("UserProdiId"));
      
      $this->SetErrorAndEmptyBox();
      $this->SetTemplateBasedir($configObject->GetValue('app_module').'dosen/templates');
      $this->SetTemplateFile('view_form_tgs_tmbhan.html');
   }
   
   function getDataTgsTmbhanById($id){
      $result = $this->mDosenServiceObj->getDataTgsTmbhanById($id);
      return $result;   
   }
   
   function Display(){
      DisplayBaseFull::Display("[ Logout ]");
      $this->AddVar("content","URL_PROSES",$this->mrConfig->GetURL("dosen", "tgs_tmbhan","proses"));
      
      $this->AddVar("content","KLS_ID",$this->mKelasId);
      $this->AddVar("content","SEMESTER",$this->mSemester);
      $this->AddVar("content","MHS_NIU",$this->mMhsNiu);
      $this->AddVar("content","KRSDT_ID",$this->mKrsdtId);
      $this->AddVar("content","SIA",$this->mServiceServerAddress);
      $this->AddVar("content","OPSI",$this->mOpsi);
      
      //cek apakah tambah or edit
      if($this->mOpsi == 'tambah'){         
         $this->AddVar("content","OPSI_TEXT","Tambah");                  
      }else{
         $this->AddVar("content","OPSI_TEXT","Edit");
         $this->AddVar("content","ID",$this->mId);
         
         //ambil data tugas
         $dataTugasTmbhan = $this->getDataTgsTmbhanById($this->mId);
         $this->AddVar("content","KRSDPNATGSJUDULTGS",$dataTugasTmbhan['krsdpnatgsJudulTgs']);   
      }
      
      $this->DisplayTemplate();
   }          
}
?>