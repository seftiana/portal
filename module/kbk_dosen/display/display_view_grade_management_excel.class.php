<?php
/*
Author : Nikolius
Email : n1colius.lau@gmail.com
Date : 10/15/2012 2:53:51 PM
*/
class DisplayViewGradeManagementExcel extends DisplayBaseFull{
   
   var $mServiceServerAddress;
   var $mDosenServiceObj;   
   var $mKelasId;
   var $mSemester;   
   
   function DisplayViewGradeManagementExcel(&$configObject,&$security,$serverAddress,$kelas,$semester){      
      DisplayBaseFull::DisplayBaseFull($configObject, $security);
      $this->mServiceServerAddress = $serverAddress;
      $this->mKelasId = $kelas;
      $this->mSemester = $semester;      
      
      $this->mDosenServiceObj = new DosenClientService($this->mServiceServerAddress, false,$this->mrUserSession->GetProperty("UserReferenceId"), $this->mrUserSession->GetProperty("UserProdiId"));
      
      $this->SetErrorAndEmptyBox();
      $this->SetTemplateBasedir($configObject->GetValue('app_module').'dosen/templates');
      $this->SetTemplateFile('view_grade_management_excel.html');
   }

   function getInfoKelasMk(){
      $result = $this->mDosenServiceObj->getInfoKelasMk($this->mKelasId);
      return $result;
   }

   function Display(){
      DisplayBaseFull::Display("[ Logout ]");

      //informasi matakuliah dan kelas
      $resInfoKelasMk = $this->getInfoKelasMk();
      $this->AddVar("info_mk_kelas","MK_KODE",$resInfoKelasMk[0]['MK_KODE']);
      $this->AddVar("info_mk_kelas","MK_NAMA",$resInfoKelasMk[0]['MK_NAMA']);
      $this->AddVar("info_mk_kelas","KELAS_NAMA",$resInfoKelasMk[0]['MK_KELAS']);

      //url template excel
      $encSemId = $this->mrConfig->Enc($this->mSemester);
      $encKlsId = $this->mrConfig->Enc($this->mKelasId);
      $encSia = $this->mrConfig->Enc($this->mServiceServerAddress);
      $urlTempExcel = $this->mrConfig->GetURL("dosen", "gen_temp_excel","proses")."&semId=".$encSemId."&klsId=".$encKlsId."&sia=".$encSia;
      $this->AddVar("temp_excel","URL_TEMP_EXCEL",$urlTempExcel);

      //url proses
      $encSemId = $this->mrConfig->Enc($this->mSemester);
      $this->AddVar("temp_excel","KLS_ID",$encKlsId);
      $this->AddVar("temp_excel","SIA",$encSia);
      $this->AddVar("temp_excel","SEM_ID",$encSemId);
      $urlProses = $this->mrConfig->GetURL("dosen", "import_temp_excel","proses");
      $this->AddVar("temp_excel","URL_PROSES",$urlProses);      

      $this->DisplayTemplate();
   }
}
?>