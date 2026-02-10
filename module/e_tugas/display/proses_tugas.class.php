<?php
class ProsesTugas extends ProcessBase{
	var $mTugas;
	var $mMahasiswaNiu;
	var $mMahasiswaProdiId;
	var $mUserIdentity;
	
	function ProsesTugas(&$configObject,$security, $mhsNiu, $prodiId)
	{		
		ProcessBase::ProcessBase($configObject);		
		$this->mMahasiswaNiu = $mhsNiu;
		$this->mMahasiswaProdiId = $prodiId;
		$this->mUserIdentity =  $security->mUserIdentity;
		$this->mTugas = New TugasClientService($this->mUserIdentity->GetProperty("ServerServiceAddress"), false, $this->mMahasiswaNiu, $this->mMahasiswaProdiId);
		$this->mTugas->SetProperty("UserRole", $this->mUserIdentity->GetProperty("Role"));
		$this->mTugas->DoSiaSetting();
	}
	
	
	function Insert($param,$file="")
	{		 	
		$wktAwal = $param['thnAwal']."-".$param['blnAwal']."-".$param['tglAwal']." ".$param['jamAwal'].":".$param['menitAwal'].":00";
		$wktAkhir = $param['thnAkhir']."-".$param['blnAkhir']."-".$param['tglAkhir']." ".$param['jamAkhir'].":".$param['menitAkhir'].":59";
		
		$this->mTugas->SetMatkul($param['klsId']);
		$this->mTugas->SetJudul(htmlspecialchars($param['judul']));
		$this->mTugas->SetWaktuAwal($wktAwal);
		$this->mTugas->SetWaktuAkhir($wktAkhir);
		$this->mTugas->SetDesc(htmlspecialchars($param['abstraksi']));
		$this->mTugas->SetFile($file);
		$this->mTugas->SetJenisTugas($param['jenisTugas']);
		$this->mTugas->SetDosen($this->mMahasiswaNiu);
	   	$this->mTugas->SetSemester($_SESSION['tugas']['semester']);
	   	
	   $result = $this->mTugas->DoInsertTugas();
		if ($result === false) {
			return false;
		} else {
			return $result;
		}		
	}
	
	function Update($param,$file="")
	{		 	
		$wktAwal = $param['thnAwal']."-".$param['blnAwal']."-".$param['tglAwal']." ".$param['jamAwal'].":".$param['menitAwal'].":00";
		$wktAkhir = $param['thnAkhir']."-".$param['blnAkhir']."-".$param['tglAkhir']." ".$param['jamAkhir'].":".$param['menitAkhir'].":59";
		
		$this->mTugas->SetMatkul($param['klsId']);
		$this->mTugas->SetJudul(htmlspecialchars($param['judul']));
		$this->mTugas->SetWaktuAwal($wktAwal);
		$this->mTugas->SetWaktuAkhir($wktAkhir);
		$this->mTugas->SetDesc(htmlspecialchars($param['abstraksi']));
		$this->mTugas->SetFile($file);
		$this->mTugas->SetId($param['id']);
		$this->mTugas->SetJenisTugas($param['jenisTugas']);
		$this->mTugas->SetSemester($_SESSION['tugas']['semester']);
	   	
	   $result = $this->mTugas->DoUpdateTugas();
		if ($result === false) {
			return false;
		} else {
			return $result;
		}		
	}
	
	function Delete($param)
	{
		$this->mTugas->SetId($param);
		$result = $this->mTugas->DoDeleteTugas();
		
		if ($result === false) {
			return false;
		} else {
			return $result;
		}		
	}
	
	function UpdateNilai($id,$nim,$nilai)
	{
		$this->mTugas->SetId($id);
		$this->mTugas->SetNim($nim);
		$this->mTugas->SetNilai($nilai);
		
		$result = $this->mTugas->DoUpdateNilai();
		
		if ($result === false) {
			return false;
		} else {
			return $result;
		}		
	}
	
	function DeleteJenisTugas($param)
	{
		$this->mTugas->SetId($param);
		$result = $this->mTugas->DoDeleteJenisTugas();
		
		if ($result === false) {
			return false;
		} else {
			return $result;
		}		
	}
	
	function UpdateJenisTugas($param)
	{
		$this->mTugas->SetId($param['id']);
		$this->mTugas->SetBobotNilai($param['persen']);
		$this->mTugas->SetJudul($param['nama']);
		
		$result = $this->mTugas->DoUpdateJenisTugas();
		
		if ($result === false) {
			return false;
		} else {
			return $result;
		}		
	}
	
	function InsertJenisTugas($param)
	{
		$this->mTugas->SetBobotNilai($param['persen']);
		$this->mTugas->SetJudul($param['nama']);
		$this->mTugas->SetDosen($param['dosenId']);
		
		
		$result = $this->mTugas->DoInsertJenisTugas();
		
		if ($result === false) {
			return false;
		} else {
			return $result;
		}		
	}
	
	function UploadJawabanTugas($param,$file)
	{
		$this->mTugas->SetId($param['id']);
		$this->mTugas->SetNim($param['niu']);
		$this->mTugas->SetFile($file);
		$this->mTugas->SetDesc($param['jawabanDesk']);
		
		$result = $this->mTugas->UploadJawabanTugas();		
		if ($result === false) {
			return false;
		} else {
			return $result;
		}		
	}
	
	
	

}
?>