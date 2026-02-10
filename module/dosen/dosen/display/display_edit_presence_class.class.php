<?php

class DisplayEditPresenceClass extends DisplayBaseFull {
   
	function DisplayEditPresenceClass(&$configObject, &$security, $semesterId, $kelasId, $pertemuanId, $errMsg) {
		DisplayBaseFull::DisplayBaseFull($configObject, $security);
		$this->mErrorMessage = $errMsg;
		$this->mSemesterId = $semesterId;
		$this->mKelasId = $kelasId;	  
		$this->mPertemuanId = $pertemuanId;
		$this->mUserId = $this->mrUserSession->GetProperty("UserReferenceId");
		$this->mProdiId = $this->mrUserSession->GetProperty("UserProdiId");
		$this->mDosenNip = $this->mrUserSession->GetProperty("User");
		$this->mServiceServer = $this->mrUserSession->GetProperty("ServerServiceAddress");
		$this->SetErrorAndEmptyBox();
		$this->SetTemplateBasedir($configObject->GetValue('app_module') . 'dosen/templates/');
		$this->SetTemplateFile('edit_presence_class.html');
	}
	
	function ShowErrorBox($strError="") {
		if ($strError == ""){
			 $strError  = "Pengambilan data pertemuan tidak berhasil. ";
		}	
		$this->AddVar("error_box", "ERROR_MESSAGE", $this->ComposeErrorMessage($strError , $this->mErrorMessage));
		$this->mTemplate->SetAttribute('error_box', 'visibility', 'visible');
	}
	
	function showDate($tpl, $res) {
		$tgl = substr($res, 8, 2);
		for ($i=1;$i<=31;$i++){
			$i = str_pad($i, 2, "0", STR_PAD_LEFT);
			if ($i == $tgl) {
				$this->AddVar($tpl, "IS_SELECT", "selected=\"true\"");
			} else {
				$this->AddVar($tpl, "IS_SELECT", "");
			}
			$this->mTemplate->AddVar($tpl, "TGL", $i);
			$this->mTemplate->parseTemplate($tpl, "a");
		}
	}
	
	function showMonth($tpl, $res) {
		$bln = substr($res, 5, 2); 
		for ($i=1;$i<=12;$i++){
			$i = str_pad($i, 2, "0", STR_PAD_LEFT);		  
			if ($i == $bln) {
				$this->AddVar($tpl, "IS_SELECT", "selected=\"true\"");
			} else {
				$this->AddVar($tpl, "IS_SELECT", "");
			}
			$this->mTemplate->AddVar($tpl, "BLN", $i);
			$this->mTemplate->parseTemplate($tpl, "a");
		}
	}
	
	function showYear($tpl, $res) {
	   $thn = substr($res, 0, 4);	   
	   $awal = date("Y") - 5;
	   $akhir = date("Y") + 5;	   
	   for ($i=$awal;$i<=$akhir;$i++){
			if ($i == $thn) {
				$this->AddVar($tpl, "IS_SELECT", "selected=\"true\"");
			} else {
				$this->AddVar($tpl, "IS_SELECT", "");
			}
			$this->mTemplate->AddVar($tpl, "THN", $i);
			$this->mTemplate->parseTemplate($tpl, "a");
	   }
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
		
		$this->AddVar("content", "URL_PROCESS", $this->mrConfig->GetURL('dosen','dosen','process'));
		$this->AddVar("content", "SEM_ID", $this->mSemesterId);
		$this->AddVar("content", "KLS_ID", $this->mKelasId);
		$this->AddVar("content", "PERTEMUAN_ID", $this->mPertemuanId);
		$this->AddVar("content", "NIP_DOSEN", $this->mDosenNip);
		$this->AddVar("content", "SIA", $this->mrConfig->Enc($this->mServiceServer));
		
		// parse data pertemuan kelas
		$data = $objDosenService->GetDataPertemuanKelas($this->mKelasId,$this->mPertemuanId,$this->mSemesterId);
		
		$dataPertemuan = $data['pertemuan'];
		$dataKelas = $data['kelas'];
		$dataPeserta = $data['peserta'];
		
		$dataKelas[0]['THN_AJAR']=$dataKelas[0]['SMT_TAHUN']."/".($dataKelas[0]['SMT_TAHUN']+1);
		$this->SetAttribute('data_kelas', 'visibility', 'visible');
		$this->ParseData('data_kelas', $dataKelas, "KELAS_");
		
		$this->AddVar("content", "TEMA", $dataPertemuan[0]['TEMA']);
		$this->AddVar("content", "POKOK_BAHASAN", $dataPertemuan[0]['POKOK_BAHASAN']);		
		$this->AddVar("content", "PRESKLS_DOSENID", $dataPertemuan[0]['PRESKLS_DOSENID']);			
		
		// tanggal-bulan-tahun
		$this->showDate("tglRencana", $dataPertemuan[0]['TANGGAL_RENCANA']);
		$this->showMonth("blnRencana", $dataPertemuan[0]['TANGGAL_RENCANA']);
		$this->showYear("thnRencana", $dataPertemuan[0]['TANGGAL_RENCANA']);
		$this->showDate("tglTerlaksana", $dataPertemuan[0]['TANGGAL_TERLAKSANA']);
		$this->showMonth("blnTerlaksana", $dataPertemuan[0]['TANGGAL_TERLAKSANA']);
		$this->showYear("thnTerlaksana", $dataPertemuan[0]['TANGGAL_TERLAKSANA']);
		
		if($dataPertemuan === false){
			$this->mErrorMessage .= $this->mObjProposedClasses->GetProperty("ErrorMessages");
			$this->ShowErrorBox();
			$this->AddVar('data_peserta_list','IS_EMPTY','YES');
		}else{
			$this->AddVar('data_peserta_list','IS_EMPTY','NO');
			$no=1;
			$statusHadir = $data['status_hadir'];
			foreach($dataPeserta as $i => $peserta){
				$option = "";
				$peserta["NO"] = $no++;
				foreach($statusHadir as $x => $dataStatus) {
					if($peserta['STATUS_ID'] == $dataStatus['ID']) {
						$selected = "selected";
					} else {
						$selected = "";
					}
					$option.= "<option value=\"".$dataStatus['ID']."\" ".$selected.">".$dataStatus['NAMA']."</option>\n";
				}
				$peserta['OPTION_STATUS'] = $option;
				$peserta['STATUS_KEHADIRAN_LOKAL'] = "STATUS_KEHADIRAN_LOKAL_".$i;
				$this->mTemplate->addVars('data_peserta_list_item',$peserta);
				$this->mTemplate->parseTemplate('data_peserta_list_item','a');
			}
		}
		
		$this->DisplayTemplate();
	}
	
}
?>