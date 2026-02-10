<?php
class DisplayInputTugasAkhir extends DisplayBaseFull{

   var $mUserId;
   var $mUserRole;
   var $mSiaServer;
   var $opsiForm;
   var $formValid;
   var $pesanFormValid;
   var $idProses;

   var $mData;

   function DisplayInputTugasAkhir(&$configObject, $securityObj, $userId, $userRole, $opsiForm, $formValid,$pesanFormValid,$idProses=''){
      DisplayBaseFull::DisplayBaseFull($configObject, $securityObj);
      $this->mSiaServer = $this->mrUserSession->GetProperty("ServerServiceAddress");
      $this->opsiForm = $opsiForm;
      $this->formValid = $formValid;
      $this->pesanFormValid = $pesanFormValid;
      $this->idProses = $idProses;

      $this->mData = new TugasAkhirService($this->mSiaServer, false, $userId);

      $this->SetErrorAndEmptyBox();
      $this->SetTemplateBasedir($configObject->GetValue('app_module') . 'tugas_akhir/templates/');
      $this->SetTemplateFile('input_tugas_akhir.html');
   }

   function Display(){
      DisplayBaseFull::Display("[ Logout ]");

      if($this->formValid === FALSE){
         $this->SetAttribute('error_box', 'visibility', 'visible');
         //$this->AddVar('error_type', 'TYPE', '1');
         $this->AddVar('error_box', 'ERROR_MESSAGE', $this->pesanFormValid);
      }

      $urlBack = $this->mrConfig->GetURL('tugas_akhir','tugas_akhir','view');
      $this->mTemplate->addVar('content','URL_BACK',$urlBack);

      //url form
      $urlFormProses = $this->mrConfig->GetURL('tugas_akhir','tugas_akhir','proses');
      $this->mTemplate->addVar('content','URL_PROCESS',$urlFormProses);
      

      $this->mTemplate->addVar('content','ID_PROSES',$this->idProses);

      //syarat ujian
      $data = $this->mData->getSyaratPendaftaranTugasAkhir();
	  if(!isset($data[0]))$this->mTemplate->SetAttribute("data_syarat", 'visibility', 'hidden');
      else for ($i=0, $m=count($data); $i < $m; ++$i) {
         $this->mTemplate->addVars("data_syarat",$data[$i]);
         $this->mTemplate->parseTemplate("data_syarat", "a");
      }
	  
      $data = $this->mData->getDetailTugasAkhir();
	  $m=count($data);if(empty($data)){$m=0;}
	  if($m > 0)$this->mTemplate->addVar('content','OPSI_FORM', 'ubah');
	  else{
		  $this->mTemplate->addVar('content','OPSI_FORM', 'tambah');
		  $m = 2;
	  }
	  
	  $romawi = array('', 'I', 'II');
	  for ($i=0; $i < $m; ++$i) {
         $this->mTemplate->addVar("data_form", 'NUM', $romawi[$i+1]);
		 if(empty($data[$i]['PATH']))$data[$i]['FILE_HIDDEN'] = 'hidden';
		 $this->mTemplate->addVars("data_form", $data[$i]);
         $this->mTemplate->parseTemplate("data_form", "a");
      }
	  
      //combo ta
      // $data = $this->mData->getDataTugasAkhir();
      // for ($i=0, $m=count($data); $i < $m; ++$i) {
         // $this->mTemplate->addVars("data_tugas_akhir",$data[$i]);
         // $this->mTemplate->parseTemplate("data_tugas_akhir", "a");
      // }

      // //combo dosen
      // $data = $this->mData->getComboDosen();
      // for ($i=0, $m=count($data); $i < $m; ++$i) {
         // $this->mTemplate->addVars("data_dosen",$data[$i]);
         // $this->mTemplate->parseTemplate("data_dosen", "a");
      // }

      $this->DisplayTemplate();
   }

}
?>