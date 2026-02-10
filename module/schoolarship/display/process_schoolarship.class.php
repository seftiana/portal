<?php

class ProcessSchoolarship extends ProcessBase{
	var $mBeasiswaServiceServer;
	var $mSiaServiceServer;
	var $mUserId;
	var $mUserProdiId;
	var $mBeasiswaId;
   var $mDataBeasiswa;

	function ProcessSchoolarship(&$configObject,$security, $userId, $prodiId, $beasiswaId, $siaServer) {
		ProcessBase::ProcessBase($configObject);
		$this->mSiaServiceServer = $siaServer;
		$this->mUserId = $userId;
		$this->mUserProdiId = $prodiId;
		$this->mBeasiswaId = $beasiswaId;
		$this->mBeasiswaServiceServer = $this->GetServiceServer();
	}
	
	function GetServiceServer() {
		$ref = new Reference($this->mrConfig) ;
		$server = $ref->GetAllUnitData($this->mrConfig->GetValue('si_beasiswa'));
		return $server[0]['service_address'];
	}

	function DoBeasiswaRegistration() {
		
	}
   
   function GetDataBeasiswa() {
      $beasiswaServObj= new SchoolarshipClientService($this->mBeasiswaServiceServer, false);
		$detailBeasiswa = $beasiswaServObj->GetDetailBeasiswaMahasiswa($this->mBeasiswaId);
      return $detailBeasiswa[0];
   }
	
	function DoValidateIpkMahasiswa() {
		$arObj = new AcademicReportClientService($this->mSiaServiceServer, false, $this->mUserId, $this->mUserProdiId);
		$arObj->DoSiaSetting();
		$infoIpk = $arObj->GetIpInfoForSemester();
		
      if (empty($this->mDataBeasiswa)){
         $this->mDataBeasiswa = $this->GetDataBeasiswa();
		}
		
		if (floatval($infoIpk[0]['ipk']) < floatval($this->mDataBeasiswa['ipk'])) {
			return false;
		}
		return true;
	}
	
	function DoValidateSemesterMahasiswa() {
		$arObj = new AcademicReportClientService($this->mSiaServiceServer, false, $this->mUserId, $this->mUserProdiId);
		$semester = $arObj->GetTotalSemesterAktif();
		
		if ($semester < 3) {
			return false;
		}
	
		if (empty($this->mDataBeasiswa)){
         $this->mDataBeasiswa = $this->GetDataBeasiswa();
		}
		
		if ($semester < $this->mDataBeasiswa['semester']) {
			return false;
		}
		
		return true;
		
	}
	
   function DoValidateTanggunganOrtu() {
      $beasiswaServObj= new SchoolarshipClientService($this->mBeasiswaServiceServer, false);
      $jumlahSaudara = sizeof($beasiswaServObj->GetRelativeList($this->mUserId));
      
      if (empty($this->mDataBeasiswa)){
         $this->mDataBeasiswa = $this->GetDataBeasiswa();
		}
      
      if ($jumlahSaudara < $this->mDataBeasiswa['tanggungan']) {
         return false;
      }
      return true;
   }
   
   function DoValidatePendapatanOrtu() {
      $beasiswaServObj= new SchoolarshipClientService($this->mBeasiswaServiceServer, false);
      $dataOrangTua = $beasiswaServObj->GetParentList($this->mUserId);
      
      $pendapatan = 0;
      $len = sizeof($dataOrangTua);
      for ($i=0; $i<$len; $i++) {
         $pendapatan += $dataOrangTua[$i]['penghasilan'];
      }
      if (empty($this->mDataBeasiswa)){
         $this->mDataBeasiswa = $this->GetDataBeasiswa();
		}
      
      if ($pendapatan > $this->mDataBeasiswa['penghasilan']) {
         return false;
      }
      return true;
   }
	
	function DoCheckDataMahasiswaIsExist($niu) {
		$beasiswaServiceObj = new SchoolarshipClientService($this->mBeasiswaServiceServer, false);
		$result = $beasiswaServiceObj->IsDataMahasiswaExist($niu);
		return $result;
	}
   
   function InsertOrangtua($namaOrtu, $pekerjaan, $penghasilan, $isMeninggal, $tglMeninggal, $ket) {
      $beasiswaServiceObj = new SchoolarshipClientService($this->mBeasiswaServiceServer, false);
		$dataOrtu = array($namaOrtu, $pekerjaan, $penghasilan, $isMeninggal, $tglMeninggal, $ket);
      $result = $beasiswaServiceObj->DoAddParent($this->mUserId, $dataOrtu);
		return $result;
   }
   
   function UpdateOrangtua($idOrtu, $namaOrtu, $pekerjaan, $penghasilan, $isMeninggal, $tglMeninggal, $ket) {
      $beasiswaServiceObj = new SchoolarshipClientService($this->mBeasiswaServiceServer, false);
      $dataOrtu = array($namaOrtu, $pekerjaan, $penghasilan, $isMeninggal, $tglMeninggal, $ket);
		$result = $beasiswaServiceObj->DoUpdateParent($idOrtu, $dataOrtu);
		return $result;
   }
   
   function InsertSaudara($nama, $pekerjaan, $isMenikah, $status) {
      $beasiswaServiceObj = new SchoolarshipClientService($this->mBeasiswaServiceServer, false);
      $dataSaudara = array($nama, $pekerjaan, $isMenikah, $status);
		$result = $beasiswaServiceObj->DoAddRelative($this->mUserId, $dataSaudara);
		return $result;
   }
   
   function UpdateSaudara($idSaudara, $nama, $pekerjaan, $isMenikah, $status) {
      $beasiswaServiceObj = new SchoolarshipClientService($this->mBeasiswaServiceServer, false);
      $dataSaudara = array($nama, $pekerjaan, $isMenikah, $status);
		$result = $beasiswaServiceObj->DoUpdateRelative($idSaudara, $dataSaudara);
		return $result;
   }
   
   function InsertPribadi($fakultas, $jurusan, $jenjangPendidikan, $isLulus, $nama, $tmpLahir, $tgllahir, $NoTelp, $alamatAsal, $alamatJogja) {
      $beasiswaServiceObj = new SchoolarshipClientService($this->mBeasiswaServiceServer, false);
      $dataPribadi = array($fakultas, $jurusan, $jenjangPendidikan, $isLulus, $nama, $tmpLahir, $tgllahir, $NoTelp, $alamatAsal, $alamatJogja);
		$result = $beasiswaServiceObj->DoAddInfoPribadi($this->mUserId, $dataPribadi);
      return $result;
   }
   
   function InsertStudyHistory() {
      $arObj = new AcademicReportClientService($this->mSiaServiceServer, false, $this->mUserId,$this->mUserProdiId);
      $arObj->SetProperty("UserRole", 1);
      $result = $arObj->DoSiaSetting();
      $infoIp = $arObj->GetIpInfoForSemester();
      $infoSks = $arObj->GetInfoSksTelahDiambil();
      $semester = $arObj->GetTotalSemesterAktif();
      $isCuti = $arObj->IsMahasiswaCuti();
      
      $beasiswaServiceObj = new SchoolarshipClientService($this->mBeasiswaServiceServer, false);
      $dataStudi = array($semester, $arObj->GetProperty('TahunSemester'), $infoSks[0]['total_sks_mhs'], 
            ($infoSks[0]['total_sks_seharusnya'] - $infoSks[0]['total_sks_mhs']), $infoIp[0]['ips'], $infoIp[0]['ipk'], $isCuti);
		$result = $beasiswaServiceObj->DoAddStudyHistory($semester, $this->mUserId, $dataStudi);
      return $result;
   }
   
   function DoApplyBeasiswa() {
      $arObj = new AcademicReportClientService($this->mSiaServiceServer, false, $this->mUserId,$this->mUserProdiId);
      $isSudahSkripsi = "Y";
      if ($arObj->IsMahasiswaCuti() === false) {
         $isSudahSkripsi = "N";
      }
      
      $beasiswaServiceObj = new SchoolarshipClientService($this->mBeasiswaServiceServer, false);
      $data = array($this->mBeasiswaId, date("Y-m-d"), $this->mUserId, 1, 1, $isSudahSkripsi,'');
		$result = $beasiswaServiceObj->DoApplyBeasiswa($data);
      return $result;
   }
}
?>