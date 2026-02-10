<?php
/**
* DisplayViewFormKesediaanWaktuMengajar
* DisplayViewFormKesediaanWaktuMengajar class
* 
* @package dosen 
* @author Maya Alipin
* @copyright Copyright (c) 2006 GamaTechno
* @version 1.0 
* @date 2006-03-23
* @revision 
*
*/
   
class DisplayViewFormKesediaanWaktuMengajar extends DisplayBaseFull {
   var $mWaktuId;
   var $mErrorMessage;
   var $objDosenService;
   var $mServiceServer;
   var $mModule;
   var $mParamAdditonal;
   var $mValueAdditional;
   
   function DisplayViewFormKesediaanWaktuMengajar(&$configObject, &$security, $dsnNip, $prodiId, $id, $errMsg, $serviceServer="", $module="", $param="", $value="") {
      DisplayBaseFull::DisplayBaseFull($configObject, $security);
      $this->mWaktuId = $id;
      $this->mDosenNip = $dsnNip;
      $this->mDosenProdiId = $prodiId;
      $this->mErrorMessage = $errMsg;
      if ($serviceServer != ""){
         $this->mServiceServer = $serviceServer;
      } else {
         $this->mServiceServer = $this->mrUserSession->GetProperty("ServerServiceAddress");
      }
      
      if ($module != ""){
         $this->mModule = $module;
      } else {
         $this->mModule = $this->mrConfig->Enc('dosen|kesediaan_waktu_mengajar|view');
      }
      
      if ($param != ""){
         $this->mParamAdditonal = $param;
      } else {
         $this->mParamAdditonal = $this->mrConfig->Enc('sia');
      }
      
      if ($value != ""){
         $this->mValueAdditional = $value;
      } else {
         $this->mValueAdditional = $this->mrConfig->Enc($this->mServiceServer);
      }
      
      $this->SetErrorAndEmptyBox();  
      $this->SetTemplateBasedir($configObject->GetValue('app_module') . 'dosen/templates');
      $this->SetTemplateFile('view_form_kesediaan_waktu_mengajar.html');
   }
   
   function GetDataDosen() {
      $objUserService = new UserClientService($this->mrUserSession->GetProperty("ServerServiceAddress"),
         false, $this->mDosenNip);
      if ($objUserService->IsError()) {
         $this->mErrorMessage .= $this->mUserService->GetProperty("ErrorMessages");
      }else{
         $objUserService->SetProperty("UserRole", 2 );
         $dataUser = $objUserService->GetUserInfo();
			if (false === $dataUser){    
            $this->mErrorMessage .= $objUserService->GetProperty("ErrorMessages");
            $this->mrUserSession->SetProperty("ServerServiceAvailable", $arrService);
            $this->mrSecurity->RefreshSessionInfo();
            return false;
         } else {
            return $dataUser;
         }
      }
   }
   
   function FillSelect($tpl, $val, $selected=''){
		$this->mTemplate->addVar($tpl, 'VALUE', $val);
		$this->mTemplate->addVar($tpl, 'LABEL', $val);
		$this->mTemplate->addVar($tpl, 'IS_SELECTED', $selected);
		$this->mTemplate->parseTemplate($tpl, 'a');
   }
   
   function Display() {
      DisplayBaseFull::Display("[ Logout ]");
      $dataDosen = $this->GetDataDosen();
      if (false === $dataDosen){
         $this->ShowErrorBox();
      } else {
			$objDosenService =  New DosenClientService($this->mServiceServer, false, $this->mDosenNip, $this->mDosenProdiId);
			$objDosenService->SetProperty("UserProdiId", $this->mDosenProdiId);
			$objDosenService->SetProperty("UserRole", $this->mrUserSession->GetProperty("Role"));
			$objDosenService->DoSiaSetting();
			$nextThSemester = $objDosenService->GetProperty("TahunSemester") + 1;
			$nmSemester = $objDosenService->GetProperty("NamaSemester") . ' ' .
						  $objDosenService->GetProperty("TahunSemester") . '/' .
						  $nextThSemester;
			$dataDosen[0]['SEM'] = $nmSemester;
			$this->SetAttribute('data_dosen', 'visibility', 'visible');
			$this->ParseData("data_dosen", $dataDosen, "DOSEN_");
			 
			 $dataKesediaan = $objDosenService->executeMethod('getDataKesediaanWaktuMengajarById', array($this->mWaktuId));
			$this->AddVar("data_waktu", "AVAILABLE", "YES");
			$dataKesediaan = $dataKesediaan[0];
			$dataKesediaan['id'] = $this->mrConfig->Enc($dataKesediaan['id']);
			$arrHari = array('Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu');
			for($i=0,$m=count($arrHari);$i<$m;++$i){
				$this->FillSelect('data_hari', $arrHari[$i], ($arrHari[$i] == $dataKesediaan['hari'])?'selected':'');
			}
			
			$jam = explode('-', $dataKesediaan['jam']);
			$jmMulai = explode(':', $jam[0]);
			$jmSelesai = explode(':', $jam[1]);
			for($i=0;$i<24;++$i){
				$i = str_pad($i, 2, '0', STR_PAD_LEFT);
				$this->FillSelect('jam_mulai', $i, ($i == $jmMulai[0])?'selected':'');
				$this->FillSelect('menit_mulai', $i, ($i == $jmMulai[1])?'selected':'');
				$this->FillSelect('jam_selesai', $i, ($i == $jmSelesai[0])?'selected':'');
				$this->FillSelect('menit_selesai', $i, ($i == $jmSelesai[1])?'selected':'');
			}
			for($i=24;$i<60;++$i){
				$this->FillSelect('menit_mulai', $i, ($i == $jmMulai[1])?'selected':'');
				$this->FillSelect('menit_selesai', $i, ($i == $jmSelesai[1])?'selected':'');
			}
      }
      $this->AddVar("content", "FORM_AKSI", $this->mrConfig->GetURL('dosen','dosen','process'));
      $this->AddVar("data_waktu", "DATAID",$this->mrConfig->Enc($this->mWaktuId));
      $this->AddVar("data_waktu", "MODULE",$this->mModule);
      $this->AddVar("data_waktu", "PARAM", $this->mParamAdditonal);
      $this->AddVar("data_waktu", "VALUE", $this->mValueAdditional);
      $this->DisplayTemplate();
   }
   
   function ShowEmptyBox() {
         $strError  = "Data tidak ditemukan. ";
      $this->AddVar("empty_type", "TYPE", "INFO");
      $this->AddVar("empty_box", "WARNING_MESSAGE",
            $this->ComposeErrorMessage($strError,$this->mErrorMessage));
   }
   
   function ShowErrorBox() {
      $this->AddVar("error_box", "ERROR_MESSAGE",  
            $this->ComposeErrorMessage("Pengambilan data kesediaan waktu mengajar tidak berhasil. " , $this->mErrorMessage));   
      $this->SetAttribute('error_box', 'visibility', 'visible');
   }
}
?>
