<?php
/*
Author : Nikolius
Email : n1colius.lau@gmail.com
Date : 6/6/2014 10:08:59 PM
*/
class DisplayDetailPengajuanCuti extends DisplayBaseFull{

   var $mUserId;
   var $mUserRole;
   var $mSiaServer;
   var $idProses;

   var $mPengajuanCutiService;

   function DisplayDetailPengajuanCuti(&$configObject, $securityObj, $userId, $userRole,$idProses=''){
      DisplayBaseFull::DisplayBaseFull($configObject, $securityObj);
      $this->mSiaServer = $this->mrUserSession->GetProperty("ServerServiceAddress");
      $this->idProses = $idProses;

      $this->mPengajuanCutiService = new PengajuanCutiService($this->mSiaServer, false, $userId);

      $this->SetTemplateBasedir($configObject->GetValue('app_module') . 'pengajuan_cuti/templates/');
      $this->SetTemplateFile('detail_pengajuan_cuti.html');
   }

   function Display(){
      DisplayBaseFull::Display("[ Logout ]");

      $urlBack = $this->mrConfig->GetURL('pengajuan_cuti','pengajuan_cuti','view');
      $this->mTemplate->addVar('content','URL_BACK',$urlBack);

      $dataDetail = $this->mPengajuanCutiService->getDataDetailPengajuanCuti($this->idProses);

      $this->mTemplate->addVar('content','SEMESTER_LABEL',$dataDetail['SEMESTER_LABEL']);
      $this->mTemplate->addVar('content','MHSAJUCTTGLCUTI',$dataDetail['mhsajuctTglCuti']);
      $this->mTemplate->addVar('content','SBCTRNAMA',$dataDetail['sbctrNama']);
      $this->mTemplate->addVar('content','MHSAJUCTCATATAN',$dataDetail['mhsajuctCatatan']);
      $this->mTemplate->addVar('content','STATUSCUTI',$dataDetail['statusCuti']);
      $this->mTemplate->addVar('content','MHSAJUCTNOSURATIJINCUTI',$dataDetail['mhsajuctNoSuratIjinCuti']);


      $this->DisplayTemplate();
   }
}
?>