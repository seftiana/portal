<?php

   class DisplayUpdateKomentarMbkm extends DisplayBaseFull{
      /**
        * var $mErrorMessage string Error Message
        */
      var $mErrorMessage;
      
     
      var $mDataMbkm;
      
      /**
        * var $mAnnouncementId integer announcement id
        */
      var $mAnnouncementId;
      
      /**
        * var $mDataReference object Bisnis Referensi
        */
      var $mDataReference;
      var $mSecurity;
      var $mCari;
      
      
		function DisplayUpdateKomentarMbkm(&$configObject, &$security, $errMsg, $announcementId, $cari){
			DisplayBaseFull::DisplayBaseFull($configObject, $security);
			$this->mDataReference = New Reference($this->mrConfig);
         
			$this->mErrorMessage = $errMsg;
			$this->mAnnouncementId = $announcementId;
			$this->mSecurity = $security;
			$this->mCari = $cari;
         
			//set template untuk error dan empty box DisplayBase::SetErrorAndEmptyBox
			$this->SetErrorAndEmptyBox();
         
			$this->SetTemplateBasedir($this->mrConfig->GetValue('app_module') . 'mbkm/templates/');
			$this->SetTemplateFile('update_komentar_mbkm.html');
		}
      
      
		function ShowErrorMessage() {         
			if (!empty($this->mErrorMessage)) {
				$this->SetAttribute('error_box', 'visibility', 'visible');
				$this->AddVar('error_type', 'TYPE', strtoupper($this->mErrorType));
				$this->AddVar('error_box', 'ERROR_MESSAGE', $this->mErrorMessage);
			}
		}
      
		function Display(){
			DisplayBaseFull::Display('[ Logout ]');
			$this->AddVar("content", "APPLICATION_MODULE", 'MBKM');
			$this->AddVar("form_update_announcement", "URL_PROCESS", $this->mrConfig->GetURL('mbkm','mbkm','process'));       
			$this->AddVar("form_update_announcement", "CARI", $this->mCari);
			
			#seting services
			$userId =  $this->mSecurity->mUserIdentity->GetProperty("UserReferenceId");
			$prodiId =  $this->mSecurity->mUserIdentity->GetProperty("UserProdiId");
			$serverUsed =  $this->mSecurity->mUserIdentity->GetProperty("ServerServiceAddress");	
			$objDosenService = new DosenClientService($serverUsed, false, $userId, $prodiId);	
			#end
			$dataDetail = $objDosenService->GetMbkmDataDetail($this->mAnnouncementId);
			if(false === $dataDetail) {
				$this->AddVar("form_update_announcement", "IS_EMPTY", "YES");
				$sysEmptyMessage = 'data empty';
				$emptyMessage = $this->ComposeErrorMessage("Data tidak ditemukan", $sysEmptyMessage);
				$this->AddVar("empty_box", "WARNING_MESSAGE", $emptyMessage);
			} else {
				$this->AddVar("form_update_announcement", "IS_EMPTY", "NO");
				$dataDetail[0]['id'] = $this->mrConfig->Enc($dataDetail[0]['id']);
				$dataDetail[0]['tanggal'] = $this->IndonesianDate($dataDetail[0]['tanggal']);
				$this->ParseData("form_update_announcement", $dataDetail, "ANNOUNCEMENT_");
			}
			$this->ShowErrorMessage();
			$this->DisplayTemplate();
		}
	}
?>