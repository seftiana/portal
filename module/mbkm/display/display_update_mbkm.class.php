<?php

   class DisplayUpdateMbkm extends DisplayBaseFull{
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
      
      
		function DisplayUpdateMbkm(&$configObject, &$security, $errMsg, $announcementId){
			DisplayBaseFull::DisplayBaseFull($configObject, $security);
			$this->mDataReference = New Reference($this->mrConfig);
         
			$this->mErrorMessage = $errMsg;
			$this->mAnnouncementId = $announcementId;
			$this->mSecurity = $security;
         
			//set template untuk error dan empty box DisplayBase::SetErrorAndEmptyBox
			$this->SetErrorAndEmptyBox();
         
			$this->SetTemplateBasedir($this->mrConfig->GetValue('app_module') . 'mbkm/templates/');
			$this->SetTemplateFile('update_mbkm.html');
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

			
			#seting services
			$userId =  $this->mSecurity->mUserIdentity->GetProperty("UserReferenceId");
			$prodiId =  $this->mSecurity->mUserIdentity->GetProperty("UserProdiId");
			$serverUsed =  $this->mSecurity->mUserIdentity->GetProperty("ServerServiceAddress");	
			$objDosenService = new DosenClientService($serverUsed, false, $userId, $prodiId);	
			#end
			$dataDetail = $objDosenService->GetMbkmDataDetail($this->mAnnouncementId);
			
			$arrdate = explode("-",$dataDetail[0]['tanggal']);
			$d = $arrdate[2];
			$m = $arrdate[1];
			$y = $arrdate[0];
			##day
			for($i=1; $i<=31; $i++){
				$len = strlen($i);
				if($len<=1){
					$id = '0'.$i;
					$nama = '0'.$i;
				}else{
					$id = $i;
					$nama = $i;
				}
				if($id == $d){
					$selected = 'selected';
				}else{
					$selected = '';
				}
				$data_day[] = array('id'=>$id,'nama'=>$nama, 'selected'=>$selected);
			}
			##bulan
			for($ii=1; $ii<=12; $ii++){
				$len = strlen($ii);
				if($len<=1){
					$id = '0'.$ii;
					$nama = '0'.$ii;
				}else{
					$id = $ii;
					$nama = $ii;
				}
				if($id == $m){
					$selected = 'selected';
				}else{
					$selected = '';
				}
				$data_bulan[] = array('id'=>$id,'nama'=>$nama, 'selected'=>$selected);
			}
			##tahun
			for($i=($y-1); $i<=($y+1); $i++){
				$len = strlen($i);
				if($i == $y){
					$selected = 'selected';
				}else{
					$selected = '';
				}
				$data_tahun[] = array('id'=>$i,'nama'=>$i, 'selected'=>$selected);
			}
			$this->AddVar("day_type","IS_EMPTY", "NO");
			$this->ParseData("day_type", $data_day, "DAY_");
			$this->AddVar("bulan_type","IS_EMPTY", "NO");
			$this->ParseData("bulan_type", $data_bulan, "BULAN_");
			$this->AddVar("tahun_type","IS_EMPTY", "NO");
			$this->ParseData("tahun_type", $data_tahun, "TAHUN_");
			
			if(false === $dataDetail) {
				$this->AddVar("form_update_announcement", "IS_EMPTY", "YES");
				$sysEmptyMessage = 'data empty';
				$emptyMessage = $this->ComposeErrorMessage("Data tidak ditemukan", $sysEmptyMessage);
				$this->AddVar("empty_box", "WARNING_MESSAGE", $emptyMessage);
			} else {
				$this->AddVar("form_update_announcement", "IS_EMPTY", "NO");
				$dataDetail[0]['id'] = $this->mrConfig->Enc($dataDetail[0]['id']);
				$this->ParseData("form_update_announcement", $dataDetail, "ANNOUNCEMENT_");
			}			
			
			$this->ShowErrorMessage();
			$this->DisplayTemplate();
		}
	}
?>