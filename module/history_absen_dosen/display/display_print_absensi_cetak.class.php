<?php
/**
 * DisplayPrintAbsenCetak
 * DisplayPrintAbsenCetak class
 * 
 * @package dosen 
 * @author CecepSP
 * @copyright Copyright (c) 2020 GamaTechno
 * @version 1.0 
 * @date 2020-08-15
 * @revision 
 *
 */
   
class DisplayPrintAbsenCetak extends DisplayBasePrint {
   var $mErrorMessage;
   var $mDosenServiceObj;
   var $mServiceServerAddress;
   var $mKelasId;
   var $mSemesterIdToView;
   var $mPerNif;
   var $mHalaman;
   var $mAfterProc;

   function DisplayPrintAbsenCetak(&$configObject, &$security, $errMsg,$semester, $kelas, $serverAddress, $halaman, $perNif, $afterProc) {
		DisplayBasePrint::DisplayBasePrint($configObject, $security);
		$this->mErrorMessage = $errMsg;
		$this->mKelasId = $kelas;
		$this->mServiceServerAddress = $serverAddress;
		$this->mHalaman = $halaman;
		$this->mPerNif=$perNif;
		$this->mFinansiServiceAddress = $this->mrUserSession->GetProperty("FinansiServiceAddress");      
		$this->mDosenServiceObj = new DosenClientService($this->mServiceServerAddress, false,$this->mrUserSession->GetProperty("UserReferenceId"), $this->mrUserSession->GetProperty("UserProdiId"));
		$this->mSemesterIdToView = $semester;
		$this->SetErrorAndEmptyBox();  
		$this->SetTemplateBasedir($configObject->GetValue('app_module') . 'history_absen_dosen/templates');
	    $this->SetTemplateFile('print_absensi_cetak.html');
		$this->mAfterProc=$afterProc;
	}
  
	function DoInitializeService() {
		if ($this->mDosenServiceObj->IsError()) {
			$this->mErrorMessage .= $this->mDosenServiceObj->GetProperty("ErrorMessages");
			return false;
		}else{
			$this->mDosenServiceObj->SetProperty("UserRole", $this->mrUserSession->GetProperty("Role"));
			if (false === $this->mDosenServiceObj->DoSiaSetting()) {
				$arrService = $this->mrUserSession->GetProperty("ServerServiceAvailable");
				if ($this->mDosenServiceObj->IsError() && $this->mDosenServiceObj->GetProperty("FaultMessages")==""){
					$arrService["SIA"] = false;
				} else {
					$arrService["SIA"] = true;
				}
				$this->mErrorMessage .= $this->mDosenServiceObj->GetProperty("ErrorMessages");
				$this->mrUserSession->SetProperty("ServerServiceAvailable", $arrService);
				$this->mrSecurity->RefreshSessionInfo();   
				return false;
			} else {
				return true;
			}
		}
	}   
   
	function Display() {   	
		// cek apakah service sia is available
		$init = $this->DoInitializeService();
		DisplayBasePrint::Display("[ Logout ]");
	  
		if ($init === false){
			$this->ShowErrorBox();
		} else {
			$objDosenService = $this->mDosenServiceObj;
			$data = $objDosenService->GetDataPertemuanKelasCetak($this->mKelasId,$this->mSemesterIdToView);
			$dataPertemuan = $data['pertemuan'];
			$dataKelas = $data['kelas'];
			
			if (false !== $dataPertemuan) {
				
				$dataKelas[0]['THN_AJAR']=$dataKelas[0]['SMT_TAHUN']."/".($dataKelas[0]['SMT_TAHUN']+1);
				$dataKelas[0]['NOREG']=$this->mrUserSession->GetProperty("UserReferenceId").' '.$this->mrUserSession->GetProperty("UserFullName");
				$this->SetAttribute('data_kelas', 'visibility', 'visible');
				$this->ParseData('data_kelas', $dataKelas, "KELAS_");
				
				$this->SetAttribute('data_pertemuan', 'visibility', 'visible');
				$nama_pertemuan = explode('|', $dataPertemuan[0]['PERTEMUAN']);

				foreach($nama_pertemuan as $data_nama_pertemuan) {
				   $this->addVar('semester', 'PERTEMUAN', $data_nama_pertemuan);
				   $this->mTemplate->parseTemplate('semester', 'a');
				}
				
				$no = 1;
				foreach($dataPertemuan as $data_ip) {
					$data_ip['NO'] = $no++;
					$daftar_ip = explode('|', $data_ip['KEHADIRAN']);
					foreach($daftar_ip as $list_ip) {
					 if($list_ip != 'kosong')
					   $this->addVar('ip_semester', 'IPSEM', $list_ip);
					   $this->mTemplate->parseTemplate('ip_semester', 'a');
					}
					$this->mTemplate->addVars('report', $data_ip);
					$this->mTemplate->parseTemplate('report', 'a');
					$this->mTemplate->clearTemplate('ip_semester');
				}
				
			}

		}
		$this->DisplayTemplate();
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
		$_tgl = $_hari_id.", ".$_tanggal." ".$_bulan_id." ".$_tahun;
		return $_tgl;
	}
	
	function ShowErrorBox($strError = "Pengambilan data MatakuliahDitawarkan tidak berhasil. \n") {
		$this->AddVar("error_box", "ERROR_MESSAGE",  
        $this->ComposeErrorMessage($strError , $this->mErrorMessage));   
		$this->SetAttribute('error_box', 'visibility', 'visible');
	}
}
?>