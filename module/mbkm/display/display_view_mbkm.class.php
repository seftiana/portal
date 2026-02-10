<?php
   /**
   * DisplayViewMBKM
   * DisplayViewMBKM class
   *
   * @package communication
   * @author cecep sp, S.Kom
   * @copyright Copyright (c) 2006 GamaTechno
   * @version 1.0
   * @date 2023-10-10
   */

	class DisplayViewMbkm extends DisplayBaseFull{
		var $mDataMbkm;
		var $mDataUser;
		var $mPage;
		var $mNumRecordPerPage;
		var $mErrorMessage;
		var $mErrorType;
		var $mCari;
      
		function DisplayViewMbkm(&$configObject, &$security, $page, $errMsg, $tErrMsg, $cari){
			DisplayBaseFull::DisplayBaseFull($configObject, $security);         
         
			$this->mDataUser = new User($this->mrConfig, $this->mrUserSession->GetProperty("User"),$this->mrUserSession->GetProperty("Role"));
         
			$this->mErrorMessage = $errMsg;
			$this->mErrorType = $tErrMsg;
			$this->mPage = $page;
			$this->mNumRecordPerPage = 15;
			$this->mCari = $cari;
         
			$this->SetErrorAndEmptyBox();

			$this->SetNavigationTemplate();
			
			$this->SetTemplateBasedir($this->mrConfig->GetValue('app_module') . 'mbkm/templates/');
			$userRoleId = $this->mrUserSession->GetProperty("Role");
			if($userRoleId=='1' || $userRoleId=='10'){
				$this->SetTemplateFile('view_mbkm.html');
			}else{
				$this->SetTemplateFile('view_mbkm_all.html');
			}
		}
      
     
		function ShowErrorBox() {
			if (!empty($this->mErrorMessage)) {
				$this->SetAttribute('error_box', 'visibility', 'visible');
				$this->AddVar('error_type', 'TYPE', strtoupper($this->mErrorType));
				$this->AddVar('error_box', 'ERROR_MESSAGE', $this->mErrorMessage);
			}
		}
      
		function GetDataAnnouncement($start, $limit) {
			$cari = $this->mCari;
			$userRoleId = $this->mrUserSession->GetProperty("Role");
			$IDUser = $this->mrUserSession->GetProperty("UserReferenceId");	
			$userId = $this->mrUserSession->GetProperty("UserReferenceId");
			$prodiId = $this->mrUserSession->GetProperty("UserProdiId");
			if(empty($this->mServiceServer)) {
				$serverUsed = $this->mrUserSession->GetProperty("ServerServiceAddress");
				$this->mServiceServer = $serverUsed;
			} else {
				$serverUsed = $this->mServiceServer;
			} 
			$objDosenService = new DosenClientService($serverUsed, false, $userId, $prodiId);			
			if($userRoleId == '1' || $userRoleId == '10') {
				$data = $objDosenService->GetMbkmMhs($userId,$start, $limit);
				return $data;
			}else{
				$data = $objDosenService->GetMbkmMhsByDosen($userId,$cari,$start, $limit);
				return $data;
			}         
			
		}
      
		function GetCountDataInformation() {
			$cari = $this->mCari;
			$userRoleId = $this->mrUserSession->GetProperty("Role");
			$IDUser = $this->mrUserSession->GetProperty("UserReferenceId");
			$userId = $this->mrUserSession->GetProperty("UserReferenceId");
			$prodiId = $this->mrUserSession->GetProperty("UserProdiId");
			if(empty($this->mServiceServer)) {
				$serverUsed = $this->mrUserSession->GetProperty("ServerServiceAddress");	
				$this->mServiceServer = $serverUsed;
			} else {
				$serverUsed = $this->mServiceServer;
			} 
			$objDosenService = new DosenClientService($serverUsed, false, $userId, $prodiId);
			if($userRoleId == '1' || $userRoleId == '10') {
				$data = $objDosenService->GetCountMbkmMhs($userId);
				return $data[0]['count'];
			} else {
				$data = $objDosenService->GetCountMbkmDosen($userId,$cari);
				return $data[0]['count'];
			}         
			
		}
      
		function Display(){
			DisplayBaseFull::Display('[ Logout ]');
         
			$this->AddVar("content", "APPLICATION_MODULE", 'Logbook MBKM');         
			$this->AddVar("content", "URL_ADD", $this->mrConfig->GetURL('mbkm', 'mbkm', 'process'));
			$this->AddVar("content", "URL_CARI", $this->mrConfig->GetURL('mbkm', 'mbkm', 'view'));
			$this->AddVar("content", "CARI", $this->mCari);
         
			$recordCount = $this->GetCountDataInformation();
			// echo '<pre>'.$recordCount.'</pre>';
			$this->AddVar("content", "TOTAL", $recordCount);     
			if(false === $recordCount or $recordCount<=0) {
				$this->AddVar("list_announcement", "IS_EMPTY", "YES");
				$sysEmptyMessage = $this->mDataUser->GetProperty("UserErrorMessage") . 'Error no data';
				$emptyMessage = $this->ComposeErrorMessage("Data tidak ditemukan", $sysEmptyMessage);
				$this->AddVar("empty_box", "WARNING_MESSAGE", $emptyMessage);
			}else {
				
				$this->AddVar("list_announcement", "IS_EMPTY", "NO");
				$start_record = ($this->mPage*$this->mNumRecordPerPage)-($this->mNumRecordPerPage);
				$data = $this->GetDataAnnouncement($start_record, $this->mNumRecordPerPage);
				
				for($i = 0; $i < count($data); $i++) {
					$data[$i]['nomer'] = ($i+1)+$start_record;
					$data[$i]['date'] = $this->IndonesianDate($data[$i]['date']);
					$data[$i]['url_delete'] = $this->mrConfig->GetURL('mbkm', 'mbkm', 'process') . '&id=' . $this->mrConfig->Enc($data[$i]['id']) . '&act=' . $this->mrConfig->Enc('DoDeleteMbkm');
					$data[$i]['url_edit'] = $this->mrConfig->GetURL('mbkm', 'mbkm', 'update') . '&id=' . $this->mrConfig->Enc($data[$i]['id']);
					$data[$i]['url_komentar'] = $this->mrConfig->GetURL('mbkm', 'mbkm', 'update_komentar') . '&id=' . $this->mrConfig->Enc($data[$i]['id']) .'&cari='. $this->mrConfig->Enc($this->mCari);
				}
				$this->ParseData("informasi_item", $data, "INFO_", 1);
				$urlPageNav = $this->mrConfig->GetURL('mbkm', 'mbkm', 'view').'&cari='.$this->mrConfig->Enc($this->mCari);
				$this->ShowPageNavigation($urlPageNav, $this->mPage, $recordCount, $this->mNumRecordPerPage);
			}
			$this->ShowErrorBox();
			$this->DisplayTemplate();
		}
	}
?>