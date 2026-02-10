<?php

class DisplayViewPresenceClass extends DisplayBaseFull {
   
	function DisplayViewPresenceClass(&$configObject, &$security, $semesterId, $kelasId, $serviceServer, $errMsg) {
		DisplayBaseFull::DisplayBaseFull($configObject, $security);

		$this->mErrorMessage = $errMsg;
		$this->mSemesterId = $semesterId;
		$this->mKelasId = $kelasId;	  
		$this->mUserId = $this->mrUserSession->GetProperty("UserReferenceId");
		$this->mProdiId = $this->mrUserSession->GetProperty("UserProdiId");
		if ($serviceServer != ""){
			$this->mServiceServer = $serviceServer;
		} else {
			$this->mServiceServer = $this->mrUserSession->GetProperty("ServerServiceAddress");
		}         
		$this->SetErrorAndEmptyBox();
		$this->SetTemplateBasedir($configObject->GetValue('app_module') . 'dosen/templates/');
		$this->SetTemplateFile('view_presence_class.html');
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
	
	function tanggalIndo($_waktu){	//format input : date("Y-m-d h:i:s")
		$_tahun = substr($_waktu,0,4);
		$_bulan = substr($_waktu,5,2);
		$_tanggal = substr($_waktu,8,2);
		$_jam= substr($_waktu,11,2);
		$_mnt= substr($_waktu,14,2);
		$_dtk= substr($_waktu,17,2);
		$_hari_en =date("D", mktime(0,0,0,$_bulan, $_tanggal, $_tahun));
		$hari_en = array("Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat");
		$hari_id=array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat", "Sabtu");
		$bulan_en = array("01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12");
		$bulan_id = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
		$_hari_id = str_replace($hari_en, $hari_id, $_hari_en);
		$_bulan_id = str_replace($bulan_en, $bulan_id, $_bulan);
		$_tgl = $_hari_id.",<br>".$_tanggal." ".$_bulan_id." ".$_tahun;
		return $_tgl;
	}
	
	function ShowErrorBox($strError="") {
		if ($strError == ""){
			 $strError  = "Pengambilan data pertemuan tidak berhasil. ";
		}	
		$this->AddVar("error_box", "ERROR_MESSAGE",
            $this->ComposeErrorMessage($strError , $this->mErrorMessage));
		$this->mTemplate->SetAttribute('error_box', 'visibility', 'visible');
	}
  
	function Display() {
		// cek apakah service sia is available
		if(empty($this->mServiceServer)) {
			$serverUsed = $this->mrUserSession->GetProperty("ServerServiceAddress");
			$this->mServiceServer = $serverUsed;
		} else {
			$serverUsed = $this->mServiceServer;
		} 
		$objDosenService = new DosenClientService($serverUsed, false, $this->mUserId, $this->mProdiId);
		
		DisplayBaseFull::Display("[ Logout ]");
		//get data pertemuan kelas
		$data = $objDosenService->GetDataPertemuanKelas($this->mKelasId,'',$this->mSemesterId);
		$dataPertemuan = $data['pertemuan'];
		$dataKelas = $data['kelas'];

		if($dataPertemuan === false){
			//$this->mErrorMessage = $this->mObjProposedClasses->GetProperty("ErrorMessages");
            $this->ShowErrorBox();
		}else{
			// parse data kelas
			$dataKelas[0]['THN_AJAR']=$dataKelas[0]['SMT_TAHUN']."/".($dataKelas[0]['SMT_TAHUN']+1);
			$this->SetAttribute('data_kelas', 'visibility', 'visible');
			$this->ParseData('data_kelas', $dataKelas, "KELAS_");
			// parse data pertemuan
			$this->SetAttribute('data_pertemuan', 'visibility', 'visible');
			if(empty($dataPertemuan)){
				$this->AddVar('data_pertemuan_list','IS_EMPTY','YES');
			}else{
				$this->AddVar('data_pertemuan_list','IS_EMPTY','NO');
				foreach($dataPertemuan as $pertemuan){
					if($pertemuan['TERISI'] == 1) {
						$pertemuan['STATUS'] = "";
						$pertemuan['NAMA_LINK'] = "Edit";
						//$pertemuan['LINK_PRESENSI_DETIL_INSERT_EDIT'] = "#";
						$pertemuan['LINK_PRESENSI_DETIL_INSERT_EDIT'] = $this->mrConfig->GetURL('dosen', 'presence_class', 'edit').'&sem='.$this->mrConfig->Enc($this->mSemesterId).'&kls='.$this->mrConfig->Enc($this->mKelasId).'&ptm='.$this->mrConfig->Enc($pertemuan['PRESKLS_ID']);
					} else {
						$pertemuan['STATUS'] = "";
						$pertemuan['NAMA_LINK'] = "Input Presensi";
						$pertemuan['LINK_PRESENSI_DETIL_INSERT_EDIT'] = $this->mrConfig->GetURL('dosen', 'presence_class', 'input').'&sem='.$this->mrConfig->Enc($this->mSemesterId).'&kls='.$this->mrConfig->Enc($this->mKelasId).'&ptm='.$this->mrConfig->Enc($pertemuan['PRESKLS_ID']);
					}
					
					$pertemuan['LINK_QRCODE'] = $this->mrConfig->GetURL('dosen', 'presence_class', 'qrcode').'&sem='.$this->mrConfig->Enc($this->mSemesterId).'&kls='.$this->mrConfig->Enc($this->mKelasId).'&ptm='.$this->mrConfig->Enc($pertemuan['PRESKLS_ID']);
					
					$pertemuan['TANGGAL_RENCANA_INDO'] = $this->tanggalIndo($pertemuan['TANGGAL_RENCANA']);
					if($pertemuan['TANGGAL_TERLAKSANA'] == '0000-00-00 00:00:00') {
						$tgl_terlaksana = $pertemuan['TANGGAL_RENCANA'];
					} else {
						$tgl_terlaksana = $pertemuan['TANGGAL_TERLAKSANA'];
					}
					#add ccp 15-02-2019
					if($pertemuan['TANGGAL_RENCANA']>date("Y-m-d d:i:s")){
						$pertemuan['HIDE_TGL']='style="visibility: hidden"';
					}else{
						$pertemuan['HIDE_TGL']='';
					}
					#end
					$pertemuan['TANGGAL_TERLAKSANA_INDO'] = $tgl_terlaksana?$this->tanggalIndo($tgl_terlaksana):'';
					$this->mTemplate->addVars('data_pertemuan_list_item',$pertemuan);
					$this->mTemplate->parseTemplate('data_pertemuan_list_item','a');
				}
			}
		}
		
		$this->AddVar("content", "URL_BACK", $this->mrConfig->GetURL('dosen','course_supported','view'));
      
		$this->DisplayTemplate();
	}
	
}
?>