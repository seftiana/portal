<?php
/*
Author : Nikolius
Email : n1colius.lau@gmail.com
Date : 6/11/2014 4:47:37 PM
*/
class DisplayPrintAcademicPlanRemedial extends DisplayBasePrint {

   var $mObjKrsService;
   var $mUserRole;
   var $mMahasiswaProdiId;
   var $mMahasiswaNiu;
   var $cfgObj;

   function DisplayPrintAcademicPlanRemedial(&$configObject, &$security, $userRole, $mhsniu, $prodiId) {
      DisplayBasePrint::DisplayBasePrint($configObject, $security, TRUE);
      $this->mUserRole = $userRole;
      $this->mMahasiswaProdiId = $prodiId;
      $this->mMahasiswaNiu = $mhsniu;

      $this->mObjKrsService = new AcademicPlanClientService($this->mrUserSession->GetProperty("ServerServiceAddress"),false, $this->mMahasiswaNiu, $this->mMahasiswaProdiId);
      $this->mObjKrsService->SetProperty("UserRole", $this->mUserRole);
      $this->mObjKrsService->DoSiaSetting();

      $this->cfgObj = $configObject;

      $this->SetTemplateBasedir($configObject->GetValue('app_module') . 'academic_plan/templates/');
      $this->SetTemplateFile('print_academic_plan_remedial.html');
   }

   function Display(){
      DisplayBasePrint::Display("CETAK KARTU RENCANA STUDI");

      $namaPT = $_SESSION['identitas']['pt_nama'];
      $prodiNama = $_SESSION['user_identity_portal']->mUserProdiName;
      $sempId = $this->mObjKrsService->mSemesterProdiId;
      $tahunAjaranPlus = $this->mObjKrsService->mTahunSemester + 1;
      $semesterLabel = $this->mObjKrsService->mNamaSemester." ".$this->mObjKrsService->mTahunSemester."/".$tahunAjaranPlus;
      $tglKrsSelesai = $this->ubahFormatTanggal($this->mObjKrsService->mSemesterProdiTanggalKrsSelesai);

      $krsId = $this->mObjKrsService->getKrsId($this->mMahasiswaNiu,$sempId);
      $dataMhs = $this->mObjKrsService->getDataMhs($this->mMahasiswaNiu);
	  $dataIp = $this->mObjKrsService->getDataIpMhs($this->mMahasiswaNiu,$sempId);
	  $dataTglBerlaku = $this->mObjKrsService->getDataTglBerlaku($krsId,$this->mMahasiswaNiu);
      $resKrs = $this->mObjKrsService->getDataKrsCetakRemedial($krsId);

      $namaDokumen ='Rencana Studi';
      $tipeSah = 'Mengetahui';
      $dataPejabatTtd = $this->mObjKrsService->getDataPejabatTtd($namaDokumen,$tipeSah,$this->mMahasiswaProdiId);
	  foreach ($dataIp as $ip) {
	  
		  $ip['IPS'] = number_format($ip['IPS'], 2);
		  $ip['IPK'] = number_format($ip['IPK'], 2);	
	  }
      //data header
      $this->AddVar('document','NAMA_PT',$namaPT);
      $this->AddVar('document','SEMESTER_LABEL',$semesterLabel);
      $this->AddVar('document','PRODI_NAMA',$prodiNama);
      $this->AddVar('document','TGL_PERIODE_KRS',$tglKrsSelesai);
      $this->AddVar('document','MHS_NIM',$dataMhs['mhsNiu']);
      $this->AddVar('document','MHS_NAMA',$dataMhs['mhsNama']);
      $this->AddVar('document','DOSEN_WALI',$dataMhs['dosenWali']);
	  $this->AddVar('document','IPK',$ip['IPK']);
	  $this->AddVar('document','TGL_BERLAKU',$this->displayTanggal($dataTglBerlaku['TGL_AWAL_BERLAKU'],false)." s.d. ".$this->displayTanggal($dataTglBerlaku['TGL_AKHIR_BERLAKU'],false));
	  $this->AddVar('document','TGL_SELESAI_REVISI',$this->displayTanggal($dataTglBerlaku['TGL_SELESAI_REVISI'],false));
	  if(!empty($dataMhs['mhsFoto'])){
		$this->AddVar("document", "PHOTO", $this->mrConfig->GetURL('home', 'foto', 'view'));
	  }else{               
		$this->AddVar("document", "PHOTO", $this->mrConfig->GetValue('baseaddress')."/images/user_foto/photo-unavailable.gif");
	  }

      if($resKrs[0]['KODE_MK'] != ""){
         $this->AddVar('data_list','IS_EMPTY','NO');
         for ($i=0; $i < count($resKrs); $i++) {
            $this->AddVar('data_list_item','NO',$i+1);
            $this->AddVar('data_list_item','KODE_MK',$resKrs[$i]['KODE_MK']);
            $this->AddVar('data_list_item','NAMA_MK',$resKrs[$i]['NAMA_MK']);
            $this->AddVar('data_list_item','SKS',$resKrs[$i]['SKS_TOTAL']);
			$this->AddVar('data_list_item','KELAS',$resKrs[$i]['KELAS']);
            $this->AddVar('data_list_item','WAKTU',$resKrs[$i]['jadwalKuliah']);
            $this->AddVar('data_list_item','RUANG',$resKrs[$i]['ruangKuliah']);
			$jml_total += $resKrs[$i]['SKS_TOTAL'];
            $this->mTemplate->parseTemplate('data_list_item','a');
         }
      }else{
         $this->AddVar('data_list','IS_EMPTY','YES');
      }

	  $this->AddVar("total","JML_TOTAL_SKS", $jml_total);
      $this->AddVar("document","TANGGAL_CETAK", $this->displayTanggal());
	  if(!empty($dataMhs['dosenWali'])){
		$this->AddVar("pejabat_pengesah","PENANDATANGAN", "Pembimbing Akademik");
		$this->AddVar("document","NAMA", $dataMhs['dosenWali']);
	  }else{
      $this->AddVar("document","PENGESAH", $dataPejabatTtd[0]['PENGESAH']);
      $this->AddVar("document","JABATAN", $dataPejabatTtd[0]['JABATAN']);
      $this->AddVar("document","NAMA", $dataPejabatTtd[0]['NAMA']);
      $this->AddVar("document","NIP", $dataPejabatTtd[0]['NIP']);
	  }

      $this->DisplayTemplate();
   }

   function ubahFormatTanggal($tglDefault){
      $arrTemp = explode("-",$tglDefault);
      return $arrTemp[2]."/".$arrTemp[1]."/".$arrTemp[0];
   }

   function displayTanggal($date, $showLokasi=true){
	  if(!empty($date)){
		$tgl = $date;
	  }else{
		$tgl = date("Y-m-d");
	  }

      $arrayBulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei',
                     'Juni', 'Juli', 'Agustus', 'September', 'Oktober',
                     'Nopember', 'Desember');

      $arrayTgl = explode('-', $tgl);
      if(!isset($arrayTgl[0]))$arrayTgl[0] = 0;
      if(!isset($arrayTgl[1]))$arrayTgl[1] = 0;
      if(!isset($arrayTgl[2]))$arrayTgl[2] = 0;
      $setTanggal = isset($arrayTgl[2])?$arrayTgl[2]:0;
	  
	  if($showLokasi){
		$lokasi = $this->cfgObj->GetValue('app_client_location').', ';
	  }else{
		$lokasi = "";
	  }

      $tanggal = $lokasi.$setTanggal . ' '  . $arrayBulan[(int)$arrayTgl[1]] . ' ' . $arrayTgl[0];
      return $tanggal;
   }
}
?>