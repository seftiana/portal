<?php
/*
Author : Nikolius
Email : n1colius.lau@gmail.com
Date : 6/4/2014 1:24:01 AM
*/

class DisplayPengajuanCuti extends DisplayBaseFull{

   var $mUserId;
   var $mUserRole;
   var $mSiaServer;

   var $mPengajuanCutiService;

   function DisplayPengajuanCuti(&$configObject, $securityObj, $userId, $userRole){
      DisplayBaseFull::DisplayBaseFull($configObject, $securityObj);
      $this->mSiaServer = $this->mrUserSession->GetProperty("ServerServiceAddress");

      $this->mPengajuanCutiService = new PengajuanCutiService($this->mSiaServer, false, $userId);

      $this->SetTemplateBasedir($configObject->GetValue('app_module') . 'pengajuan_cuti/templates/');
      $this->SetTemplateFile('view_pengajuan_cuti.html');
   }

   function Display(){
      DisplayBaseFull::Display("[ Logout ]");

      $urlAddPengajuan = $this->mrConfig->GetURL('pengajuan_cuti','add_pengajuan','view').'&opsiForm='.$this->mrConfig->Enc('tambah');
      $this->mTemplate->addVar("content","URL_ADD_PENGAJUAN",$urlAddPengajuan);

      $dataPengajuanCuti = $this->mPengajuanCutiService->getDataPengajuanCuti();
      if($dataPengajuanCuti[0]['mhsajuctId'] != ""){
         $this->mTemplate->AddVar("data_list","IS_EMPTY","NO");
         for ($i=0; $i < count($dataPengajuanCuti); $i++) {
            $dataPengajuanCuti[$i]['NO'] = $i+1;

            //url hps
            $urlAddHapus = '&caseHapus='.$this->mrConfig->Enc('ya').'&id='.$this->mrConfig->Enc($dataPengajuanCuti[$i]['mhsajuctId']);
            $dataPengajuanCuti[$i]['URL_HAPUS'] = $this->mrConfig->GetURL('pengajuan_cuti','pengajuan_cuti','proses').$urlAddHapus;

            //url edit
            $urlAddEdit = '&id='.$this->mrConfig->Enc($dataPengajuanCuti[$i]['mhsajuctId']);
            $dataPengajuanCuti[$i]['URL_EDIT'] = $this->mrConfig->GetURL('pengajuan_cuti','edit_pengajuan','view').$urlAddEdit;

            //url detail
            $urlAddDetail = '&id='.$this->mrConfig->Enc($dataPengajuanCuti[$i]['mhsajuctId']);
            $dataPengajuanCuti[$i]['URL_DETAIL'] = $this->mrConfig->GetURL('pengajuan_cuti','detail_pengajuan','view').$urlAddDetail;

			$this->mTemplate->SetAttribute("data_tombol","visibility","hidden");
			if ($dataPengajuanCuti[$i]['STATUS_PENGAJUAN'] == 'Belum di Approve') {
				$this->mTemplate->SetAttribute("data_tombol","visibility","visible");
			}
			$this->mTemplate->AddVar("data_tombol","URL_HAPUS", $dataPengajuanCuti[$i]['URL_HAPUS']);
			$this->mTemplate->AddVar("data_tombol","URL_EDIT", $dataPengajuanCuti[$i]['URL_EDIT']);

            $this->mTemplate->addVars("data_list_item",$dataPengajuanCuti[$i]);
            $this->mTemplate->parseTemplate("data_list_item", "a");
         }
      }else{
         $this->mTemplate->AddVar("data_list","IS_EMPTY","YES");
      }

      $this->DisplayTemplate();
   }
}
?>