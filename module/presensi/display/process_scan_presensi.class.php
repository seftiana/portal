<?php

class ProcessScanPresensi extends ProcessBase
{

	var $mDataAcademicPlan;

	var $mProcessAcademicPlanError;

	var $mMahasiswaNiu;
	var $mMahasiswaProdiId;
	var $mUserIdentity;

	function ProcessScanPresensi(&$configObject,$security, $mhsNiu, $prodiId, $sia){
		ProcessBase::ProcessBase($configObject);
		$this->mMahasiswaNiu = $mhsNiu;
		$this->mMahasiswaProdiId = $prodiId;
		$this->mUserIdentity = $security->mUserIdentity;
		if ($sia == "") {
			$sia = $this->mUserIdentity->GetProperty("ServerServiceAddress");
		}
		$this->mDataAcademicPlan = New AcademicPlanClientService($sia, false, $this->mMahasiswaNiu, $this->mMahasiswaProdiId);
	}

	function InsertPresensi($uuid){
		$cekKrs = $this->mDataAcademicPlan->DoGetPresensiQr($this->mMahasiswaNiu,$uuid);
		// echo'<pre>';print_r($cekKrs);die;
		
		if (!empty($cekKrs)) {
			// echo "ADA DATA";
			if($cekKrs[0]['IS_UPDATE']==1){
				$result = $this->mDataAcademicPlan->DoUpdatePresensiQr($this->mMahasiswaNiu,$uuid);
			}else{
				$result = $this->mDataAcademicPlan->DoInsertPresensiQr($this->mMahasiswaNiu,$uuid);
			}
			
			if (false === $result) {
				$this->SetProperty("ProcessAcademicPlanError", "Ada error presensi qrcode. <br>" . $this->mDataAcademicPlan->GetProperty("ErrorMessages"));
				return false;
			}else {
				return $result;
			}
			
		} else {
			// echo "TIDAK ADA DATA";
			$this->SetProperty("ProcessAcademicPlanError", "Anda tidak terdaftar dikelas. <br>" . $this->mDataAcademicPlan->GetProperty("ErrorMessages"));
			return false;
		}
		
	}

}
?>