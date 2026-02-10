<?php
/*
Author : Nikolius
Email : n1colius.lau@gmail.com
Date : 6/6/2014 4:21:49 PM
*/
class DisplayInputPengajuanCuti extends DisplayBaseFull{

   var $mUserId;
   var $mUserRole;
   var $mSiaServer;
   var $opsiForm;
   var $formValid;
   var $pesanFormValid;
   var $idProses;

   var $mPengajuanCutiService;

   function DisplayInputPengajuanCuti(&$configObject, $securityObj, $userId, $userRole, $opsiForm, $formValid,$pesanFormValid,$idProses=''){
      DisplayBaseFull::DisplayBaseFull($configObject, $securityObj);
      $this->mSiaServer = $this->mrUserSession->GetProperty("ServerServiceAddress");
      $this->opsiForm = $opsiForm;
      $this->formValid = $formValid;
      $this->pesanFormValid = $pesanFormValid;
      $this->idProses = $idProses;

      $this->mPengajuanCutiService = new PengajuanCutiService($this->mSiaServer, false, $userId);

      $this->SetErrorAndEmptyBox();
      $this->SetTemplateBasedir($configObject->GetValue('app_module') . 'pengajuan_cuti/templates/');
      $this->SetTemplateFile('input_pengajuan_cuti.html');
   }

   function Display(){
      DisplayBaseFull::Display("[ Logout ]");

      if($this->formValid === FALSE){
         $this->SetAttribute('error_box', 'visibility', 'visible');
         //$this->AddVar('error_type', 'TYPE', '1');
         $this->AddVar('error_box', 'ERROR_MESSAGE', $this->pesanFormValid);
      }

      $urlBack = $this->mrConfig->GetURL('pengajuan_cuti','pengajuan_cuti','view');
      $this->mTemplate->addVar('content','URL_BACK',$urlBack);

      //url form
      $urlFormProses = $this->mrConfig->GetURL('pengajuan_cuti','pengajuan_cuti','proses');
      $this->mTemplate->addVar('content','URL_PROCESS',$urlFormProses);
      $this->mTemplate->addVar('content','OPSI_FORM',$this->opsiForm);

      $this->mTemplate->addVar('content','ID_PROSES',$this->idProses);
      $dataEdit = $this->mPengajuanCutiService->getDataFormEditPengajuanCuti($this->idProses);

      //combo semester
      $dataCmbSemester = $this->mPengajuanCutiService->getComboSemester();
      for ($i=0; $i < count($dataCmbSemester); $i++) {
         if($dataCmbSemester[$i]['id'] == $dataEdit['mhsajuctSemId']){
            $dataCmbSemester[$i]['selected'] = 'selected=""';
         }else{
            $dataCmbSemester[$i]['selected'] = '';
         }
         $this->mTemplate->addVars("semester_list_combo",$dataCmbSemester[$i]);
         $this->mTemplate->parseTemplate("semester_list_combo", "a");
      }

      //combo sebab cuti
      $dataCmbSebabCuti = $this->mPengajuanCutiService->getComboSebabCuti();
      for ($i=0; $i < count($dataCmbSebabCuti); $i++) {
         if($dataCmbSebabCuti[$i]['id'] == $dataEdit['mhsajuctSbctrId']){
            $dataCmbSebabCuti[$i]['selected'] = 'selected=""';
         }else{
            $dataCmbSebabCuti[$i]['selected'] = '';
         }
         $this->mTemplate->addVars("sebab_cuti_combo",$dataCmbSebabCuti[$i]);
         $this->mTemplate->parseTemplate("sebab_cuti_combo", "a");
      }

      //combo tanggal
      $tgl = $this->generateTanggal();
      foreach ($tgl as $rowTgl => $valTgl){
         if($valTgl['TGL'] == $dataEdit['tglCuti']){
            $valTgl['selected'] = 'selected=""';
         }else{
            $valTgl['selected'] = '';
         }
         $this->mTemplate->addVars("tglCuti",$valTgl,"");
         $this->mTemplate->parseTemplate("tglCuti", "a");
      }

      $bln = $this->generateBulan();
      foreach ($bln as $rowBln => $valBln){
         if($valBln['BULAN_ID'] == $dataEdit['blnCuti']){
            $valBln['selected'] = 'selected=""';
         }else{
            $valBln['selected'] = '';
         }
         $this->mTemplate->addVars("blnCuti",$valBln);
         $this->mTemplate->parseTemplate("blnCuti", "a");
      }

      $thn = $this->generateTahun();
      foreach ($thn as $rowThn => $valThn){
         if($valThn['THN'] == $dataEdit['thnCuti']){
            $valThn['selected'] = 'selected=""';
         }else{
            $valThn['selected'] = '';
         }
         $this->mTemplate->addVars("thnCuti",$valThn,"");
         $this->mTemplate->parseTemplate("thnCuti", "a");
      }

      $this->mTemplate->addVar('content','KETCUTI',$dataEdit['mhsajuctCatatan']);

      $this->DisplayTemplate();
   }

   function generateTanggal(){
      $arrTanggal = array();
      $arrTmp = array("TGL"=> "");
      for ($tgl=1;$tgl<=31;$tgl++){
         if ($tgl<10) $tgl = '0'.$tgl;
         $arrTmp = array("TGL"=> $tgl);
         array_push($arrTanggal,$arrTmp);
      }
      return $arrTanggal;
   }

   function generateBulan(){
      $arrBulan = array();
      $arrBulan = array(
         0 => array(
            "BULAN_ID" => "01",
            "BULAN_LABEL" => "Januari"
         ),
         1 => array(
            "BULAN_ID" => "02",
            "BULAN_LABEL" => "Februari"
         ),
         2 => array(
            "BULAN_ID" => "03",
            "BULAN_LABEL" => "Maret"
         ),
         3 => array(
            "BULAN_ID" => "04",
            "BULAN_LABEL" => "April"
         ),
         4 => array(
            "BULAN_ID" => "05",
            "BULAN_LABEL" => "Mei"
         ),
         5 => array(
            "BULAN_ID" => "06",
            "BULAN_LABEL" => "Juni"
         ),
         6 => array(
            "BULAN_ID" => "07",
            "BULAN_LABEL" => "July"
         ),
         7 => array(
            "BULAN_ID" => "08",
            "BULAN_LABEL" => "Agustus"
         ),
         8 => array(
            "BULAN_ID" => "09",
            "BULAN_LABEL" => "September"
         ),
         9 => array(
            "BULAN_ID" => "10",
            "BULAN_LABEL" => "Oktober"
         ),
         10 => array(
            "BULAN_ID" => "11",
            "BULAN_LABEL" => "November"
         ),
         11 => array(
            "BULAN_ID" => "12",
            "BULAN_LABEL" => "Desember"
         )
      );
      return $arrBulan;
   }

   function generateTahun(){
      $arrTahun = array();
      $arrTmp = array("THN"=> "");
      $thnSkrg = date("Y");
      for ($thn=$thnSkrg; $thn <= $thnSkrg+6; $thn++){
         $arrTmp = array("THN"=> $thn);
         array_push($arrTahun,$arrTmp) ;
      }
      return $arrTahun;
   }
}
?>