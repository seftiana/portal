<?php
/**
* DisplayViewScan
* DisplayViewScan class
* 
* @package presensi 
* @author cecep seftiana putra
* @copyright Copyright (c) 2006 GamaTechno
* @date 2025-11-27
*/
   
class DisplayViewScan extends DisplayBaseFull {

	var $mUserId;

	var $mUserProdiId;

	var $mErrorMessage;

	var $mObjProposedClasses;

	var $mServiceServer;

	var $mDisplay;
   
	function DisplayViewScan(&$configObject, &$security, $errMsg, $serverAddress) {
		DisplayBaseFull::DisplayBaseFull($configObject, $security);

		$this->mProdiId = $security->mUserIdentity->GetProperty("UserProdiId");

		$this->mUserId = $security->mUserIdentity->GetProperty("UserReferenceId");
		$this->mErrorMessage = $errMsg;
		$this->mDisplay = true;

		if ($serverAddress != ""){
			$this->mServiceServer = $serverAddress;
		} else {
			if ($this->mrUserSession->GetProperty("Role")==2 ) {
				$this->mDisplay = true;
			}
			$this->mServiceServer = $this->mrUserSession->GetProperty("ServerServiceAddress");
		}

		$this->SetErrorAndEmptyBox();  
		$this->SetTemplateBasedir($configObject->GetValue('app_module') . 'presensi/templates/');
		$this->SetTemplateFile('view_scan.html');
	}

	   
	function DoInitializeService() {
		$this->mObjProposedClasses =  New ProposedClassesClientService($this->mServiceServer,false, $this->mUserId, $this->mProdiId);      
		if ($this->mObjProposedClasses->IsError()) {
			$this->mErrorMessage .= $this->mUserService->GetProperty("ErrorMessages");
			return false;
		}else{
			$this->mObjProposedClasses->SetProperty("UserRole", $this->mrUserSession->GetProperty("Role"));
			$arrService = $this->mrUserSession->GetProperty("ServerServiceAvailable");
			$result = $this->mObjProposedClasses->DoSiaSetting();
			$this->DoUpdateServiceStatus($this->mObjProposedClasses, $result, 'SIA');
			if (false === $result) {
				$this->mErrorMessage .= $this->mObjProposedClasses->GetProperty("ErrorMessages");
			}
			return $result;
		}      
	}
	   
	   
	function Display() {
		$mhsNiu = $this->mUserId;   		   	

		$init = $this->DoInitializeService();
		DisplayBaseFull::Display("[ Logout ]");
		$urlAdditional = "";

		if (false === $init){
			$this->ShowErrorBox();
		} else {
			if ($this->mDisplay !== false){
				$this->SetAttribute("keterangan", "visibility", "visible");
				$this->AddVar("keterangan", "PRODI", $this->mrUserSession->GetProperty("UserProdiName"));
				
				// $url_proses = $this->mrConfig->GetURL('presensi', 'scan', 'proses').'&qr=';
				// $this->AddVar("keterangan", "URL_PROSES", $url_proses);
				
				if (empty($_POST['semester'])) {
					$semester_aktif = $this->mObjProposedClasses->GetProperty("SemesterProdiSemesterId");
				} else {
					$semester_aktif = $_POST['semester'];
				}
				$this->AddVar("keterangan", "MHSNIU",$mhsNiu);
				
				$url_scan = $this->mrConfig->GetURL('presensi', 'scan_presensi', 'proses').'&niu='.$this->mrConfig->Enc($mhsNiu);
				$this->AddVar("keterangan", "LINK_SCAN",$url_scan);
				
				$url_back = $this->mrConfig->GetURL('presensi', 'jadwal_presensi', 'view').'&nim='.$this->mrConfig->Enc($mhsNiu);
				$this->AddVar("keterangan", "LINK_BACK",$url_back);

			}
		}
		$this->DisplayTemplate();
	}
	   
	function ShowErrorBox() {
		$this->AddVar("error_box", "ERROR_MESSAGE",  
		$this->ComposeErrorMessage("Pengambilan data matakuliah ditawarkan tidak berhasil. ",$this->mErrorMessage));   
		$this->SetAttribute('error_box', 'visibility', 'visible');
	}
   
}
?>