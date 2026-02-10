<?php
   class DisplayAddMbkm extends DisplayBaseFull{
		/**
        * var $mErrorMessage string Error Message
        */
		var $mErrorMessage;
		var $mTanggal;
      
		/**
        * var $mDataMbkm object Bisnis Announcement
        */
		var $mDataMbkm;
      
		/**
        * var $mDataReference object Bisnis Referensi
        */
		var $mDataReference;
      
		function DisplayAddMbkm(&$configObject, &$security, $errMsg, $tanggal){
			DisplayBaseFull::DisplayBaseFull($configObject, $security);
			$this->mDataReference = New Reference($this->mrConfig);
         
			$this->mErrorMessage = $errMsg;
			$this->mTanggal = $tanggal;
         
			//set template untuk error dan empty box DisplayBase::SetErrorAndEmptyBox
			$this->SetErrorAndEmptyBox();
         
			$this->SetTemplateBasedir($this->mrConfig->GetValue('app_module') . 'mbkm/templates/');
			$this->SetTemplateFile('add_mbkm.html');
		}
      
      
		function ShowErrorMessage(){
			if (!empty($this->mErrorMessage)){
				$this->SetAttribute('error_box', 'visibility', 'visible');
				$this->AddVar('error_type', 'TYPE', strtoupper($this->mErrorType));
				$this->AddVar('error_box', 'ERROR_MESSAGE', $this->mErrorMessage);
			}
		}
      
		function Display(){
			$IDUser = $this->mrUserSession->GetProperty("UserReferenceId");
			DisplayBaseFull::Display('[ Logout ]');
			$this->AddVar("content", "APPLICATION_MODULE", 'MBKM');
            
			$this->AddVar("form_add_announcement", "URL_PROCESS", $this->mrConfig->GetURL('mbkm','mbkm','process'));
			$this->AddVar("form_add_announcement", "TANGGAL", $this->mTanggal);
			$this->AddVar("form_add_announcement", "IDUSER", $IDUser);
			
			$d = date('d');
			$m = date('m');
			$y = date('Y');
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
			$this->ParseData('day_type', $data_day, "DAY_");
			$this->AddVar("bulan_type","IS_EMPTY", "NO");
			$this->ParseData('bulan_type', $data_bulan, "BULAN_");
			$this->AddVar("tahun_type","IS_EMPTY", "NO");
			$this->ParseData('tahun_type', $data_tahun, "TAHUN_");
			
			$this->ShowErrorMessage();
			$this->DisplayTemplate();
		}
		
		
	}
?>