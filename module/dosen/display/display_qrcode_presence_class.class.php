<?php

class DisplayQrcodePresenceClass extends DisplayBaseFull {
   
	function DisplayQrcodePresenceClass(&$configObject, &$security, $semesterId, $kelasId, $pertemuanId, $errMsg) {
		DisplayBaseFull::DisplayBaseFull($configObject, $security);
		$this->mErrorMessage = $errMsg;
		$this->mSemesterId = $semesterId;
		$this->mKelasId = $kelasId;	  
		$this->mPertemuanId = $pertemuanId;
		$this->mUserId = $this->mrUserSession->GetProperty("UserReferenceId");
		$this->mProdiId = $this->mrUserSession->GetProperty("UserProdiId");
		$this->mDosenNip = $this->mrUserSession->GetProperty("User");
		$this->mServiceServer = $this->mrUserSession->GetProperty("ServerServiceAddress");
		$this->mFinansiServiceAddress = $this->mrUserSession->GetProperty("FinansiServiceAddress"); #add ccp 24-8-2019
		$this->SetErrorAndEmptyBox();
		$this->SetTemplateBasedir($configObject->GetValue('app_module') . 'dosen/templates/');
		$this->SetTemplateFile('qrcode_presence_class.html');
	}
	
	function ShowErrorBox($strError="") {
		if ($strError == ""){
			 $strError  = "Pengambilan data pertemuan tidak berhasil. ";
		}	
		$this->AddVar("error_box", "ERROR_MESSAGE",
            $this->ComposeErrorMessage($strError , $this->mErrorMessage));
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
		
		// tanggal-bulan-tahun
		$this->showDate("tglRencana", $dataPertemuan[0]['TANGGAL_RENCANA']);
		$this->showMonth("blnRencana", $dataPertemuan[0]['TANGGAL_RENCANA']);
		$this->showYear("thnRencana", $dataPertemuan[0]['TANGGAL_RENCANA']);
		$this->showDate("tglTerlaksana", "");
		$this->showMonth("blnTerlaksana", "");
		$this->showYear("thnTerlaksana", "");
		
		if($dataPertemuan === false){
			$this->mErrorMessage .= $this->mObjProposedClasses->GetProperty("ErrorMessages");
			$this->ShowErrorBox();
			$this->AddVar('data_peserta_list','IS_EMPTY','YES');
		}else{
			$ch = curl_init();

			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_URL, "http://api-perbanas.iyakaya.com/generate-qr-code");
			// curl_setopt($ch, CURLOPT_URL, "https://apiportal.perbanas.id/generate-qr-code");

			curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
			curl_setopt($ch, CURLOPT_POSTFIELDS,"PRESKLS_ID=".$this->mPertemuanId);
			$output = curl_exec($ch);
			$var = json_decode($output);
			curl_close($ch); 	
			$this->AddVar("curl", "BARCODE", $var->data);
			
			$balik = $this->mrConfig->GetURL('dosen', 'presence_class', 'view').'&sem='.$this->mrConfig->Enc($this->mSemesterId).'&kls=' . $this->mrConfig->Enc($this->mKelasId);
			$this->AddVar("content", "URL_BACK", $balik);
			

			$this->AddVar('data_peserta_list','IS_EMPTY','NO');
			$no=1;
			$statusHadir = $data['status_hadir'];
			foreach($dataPeserta as $i => $peserta){
				$option = "";
				$peserta["NO"] = $no++;
				#add ccp 24-8-2019
				
				$peserta['BLOCK_ABSEN']= 'class=""';
				$peserta['BLOCK_TITLE']= 'ada piutang';
			
				foreach($statusHadir as $x => $dataStatus) {
					if($peserta['STATUS_ID'] == $dataStatus['ID']) {
						$selected = "selected";
					} else {
						$selected = "";
					}
					$option.= "<option value=\"".$dataStatus['ID']."\" ".$selected.">".$dataStatus['NAMA']."</option>\n";
				}
				
				
				$peserta['OPTION_STATUS'] = $option;
				$peserta['STATUS_KEHADIRAN_LOKAL'] = "statusHadirPeserta[".$i."]";
				$this->mTemplate->addVars('data_peserta_list_item',$peserta);
				$this->mTemplate->parseTemplate('data_peserta_list_item','a');
			}
		}
		
		$this->DisplayTemplate();
	}
	
}
?>