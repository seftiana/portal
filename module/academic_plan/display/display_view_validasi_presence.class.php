<?php

class DisplayViewValidasiPresenceClass extends DisplayBaseFull {
   
	function DisplayViewValidasiPresenceClass(&$configObject, &$security, $semesterId, $kelasId, $serviceServer, $errMsg) {
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
		$this->SetTemplateBasedir($configObject->GetValue('app_module') . 'academic_plan/templates/');
		$this->SetTemplateFile('view_validasi_presence.html');
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
		$data = $objDosenService->GetDataPertemuanKelasValidasi($this->mKelasId,'',$this->mSemesterId,$this->mUserId);
		$dataPertemuan = $data['pertemuan'];
		$dataKelas = $data['kelas'];
		$sekarang = date("Y-m-d");
		// parse data kelas
		$dataKelas[0]['THN_AJAR']=$dataKelas[0]['SMT_TAHUN']."/".($dataKelas[0]['SMT_TAHUN']+1);
		$this->SetAttribute('data_kelas', 'visibility', 'visible');
		$this->ParseData('data_kelas', $dataKelas, "KELAS_");
		if($dataPertemuan === false){
            $this->ShowErrorBox();
		}else{
			// parse data pertemuan
			$this->SetAttribute('data_pertemuan', 'visibility', 'visible');
			if(empty($dataPertemuan)){
				$this->AddVar('data_pertemuan_list','IS_EMPTY','YES');
			}else{
				$this->AddVar('data_pertemuan_list','IS_EMPTY','NO');
				foreach($dataPertemuan as $pertemuan){
					$tgl_mulai = date ("Y-m-d", strtotime($pertemuan['TANGGAL_TERLAKSANA']));
					$besok = date("Y-m-d", strtotime($tgl_mulai."+6 days"));
					if($pertemuan['HADIR']=='2'){
						if( ($pertemuan['presklsValidasi']=='' || is_null($pertemuan['presklsValidasi'])) and
							($sekarang >= $tgl_mulai && $sekarang<=$besok)
						){
							$pertemuan['KETERANGAN'] = '
								<button class="btn btn-info" type="button" name="btnEdit" onclick="showValidasiAbsenSesuai('.$pertemuan['PRESKLS_ID'].')">Sesuai</button> &nbsp;
								<button class="btn btn-warning" type="button" name="btnEdit" onclick="showValidasiAbsen('.$pertemuan['PRESKLS_ID'].')">Tidak Sesuai</button>
							';
						}else if( ($pertemuan['presklsValidasi']=='' || is_null($pertemuan['presklsValidasi'])) and
							($sekarang > $besok)
						){
							$pertemuan['KETERANGAN'] = 'Lebih dari 6 hari';
						}else{
							$pertemuan['KETERANGAN'] = 'Sudah tervalidasi<br>'.$pertemuan['presklsValidasi'];
						}
						
					}else{
						$pertemuan['KETERANGAN'] = 'Anda tidak hadir';
					}
					
					$pertemuan['TANGGAL_RENCANA_INDO'] = $this->tanggalIndo($pertemuan['TANGGAL_RENCANA']);
					$pertemuan['TANGGAL_TERLAKSANA_INDO'] = $this->tanggalIndo($pertemuan['TANGGAL_TERLAKSANA']);
					
					$this->mTemplate->addVars('data_pertemuan_list_item',$pertemuan);
					$this->mTemplate->parseTemplate('data_pertemuan_list_item','a');
				}
			}
		}
		  
		$this->AddVar("content", "URL_SIMPAN", $this->mrConfig->GetURL('academic_plan','absen_validasi','process'));    
		$this->AddVar("content", "URL_BACK", $this->mrConfig->GetURL('academic_plan','academic_jadwal','view'));    
		$this->DisplayTemplate();
	}
	
}
?>