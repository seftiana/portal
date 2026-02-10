<?php
/*
Author : Nikolius
Email : n1colius.lau@gmail.com
Date : 6/16/2014 10:06:13 PM
*/
class DisplayPrintKartuUjian extends DisplayBasePrint {

   var $mObjKrsService;
   var $mUserRole;
   var $mMahasiswaProdiId;
   var $mMahasiswaNiu;
   var $mOpsiSesi;
   var $cfgObj;

   function DisplayPrintKartuUjian(&$configObject, &$security, $userRole, $mhsniu, $prodiId, $opsiSesi) {
      DisplayBasePrint::DisplayBasePrint($configObject, $security, TRUE);
      $this->mUserRole = $userRole;
      $this->mMahasiswaProdiId = $prodiId;
      $this->mMahasiswaNiu = $mhsniu;
      $this->mOpsiSesi = $opsiSesi;

      $this->mObjKrsService = new AcademicPlanClientService($this->mrUserSession->GetProperty("ServerServiceAddress"),false, $this->mMahasiswaNiu, $this->mMahasiswaProdiId);
      $this->mObjKrsService->SetProperty("UserRole", $this->mUserRole);
      $this->mObjKrsService->DoSiaSetting();

      $this->cfgObj = $configObject;

      $this->SetTemplateBasedir($configObject->GetValue('app_module') . 'academic_plan/templates/');
      $this->SetTemplateFile('print_kartu_ujian.html');
   }

   function Display(){
      if($this->mOpsiSesi == 'tengah'){
         DisplayBasePrint::Display("CETAK KARTU UJIAN TENGAH SEMESTER");
         $this->AddVar('document','TITLE_CETAK','CETAK KARTU UJIAN TENGAH SEMESTER');
         $singkatanSesi = 'KARTU UJIAN TENGAH SEMESTER';
         $sesiTest = 'T';
      }else{
         DisplayBasePrint::Display("CETAK KARTU UJIAN AKHIR SEMESTER");
         $this->AddVar('document','TITLE_CETAK','CETAK KARTU UJIAN AKHIR SEMESTER');
         $singkatanSesi = 'KARTU UJIAN AKHIR SEMESTER';
         $sesiTest = 'A';
      }

      $namaPT = $_SESSION['identitas']['pt_nama'];
      $prodiNama = $_SESSION['user_identity_portal']->mUserProdiName;
      $sempId = $this->mObjKrsService->mSemesterProdiId;
      $tahunAjaranPlus = $this->mObjKrsService->mTahunSemester + 1;
      $semesterLabel = $this->mObjKrsService->mNamaSemester." ".$this->mObjKrsService->mTahunSemester." / ".$tahunAjaranPlus;
      $dataMhs = $this->mObjKrsService->getDataMhs($this->mMahasiswaNiu);

      //get data ujian
      $krsId = $this->mObjKrsService->getKrsId($this->mMahasiswaNiu,$sempId);
      $resDataMhsTest = $this->mObjKrsService->getDataMhsTest($krsId,$sesiTest);

      $namaDokumen ='Kartu Ujian';
      $tipeSah = 'Mengetahui';
      $dataPejabatTtd = $this->mObjKrsService->getDataPejabatTtdNoProdi($namaDokumen,$tipeSah);

      //data header
      $this->AddVar('document','URL_IMG',$this->mrConfig->GetValue('baseaddress')); // add ccp 7 juli 2018
      $this->AddVar('document','URL_FOTO',$this->mrConfig->GetValue('base_image').$dataMhs['mhsFoto']); // add ccp 7 juli 2018
      $this->AddVar('document','NAMA_PT',$namaPT);
      $this->AddVar('document','PRODI_NAMA',$prodiNama);
      $this->AddVar('document','SEMESTER_LABEL',$semesterLabel);
      $this->AddVar('document','MHS_NIM',$dataMhs['mhsNiu']);
      $this->AddVar('document','MHS_NAMA',$dataMhs['mhsNama']);
      $this->AddVar('document','DOSEN_WALI',$dataMhs['dosenWali']);
      $this->AddVar('document','SINGK_SESI',$singkatanSesi);

      if($resDataMhsTest[0]['KELAS'] != ""){
         $this->AddVar('data_list','IS_EMPTY','NO');
         for ($i=0; $i < count($resDataMhsTest); $i++) {
            $this->AddVar('data_list_item','NO',$i+1);
            $this->AddVar('data_list_item','KODE_MK',$resDataMhsTest[$i]['KODE_MK']);
            $this->AddVar('data_list_item','NAMA_MK',$resDataMhsTest[$i]['NAMA_MK']);
            $this->AddVar('data_list_item','SKS',$resDataMhsTest[$i]['SKS_TOTAL']);
            $this->AddVar('data_list_item','KELAS_NAMA',$resDataMhsTest[$i]['KELAS']);
            $this->AddVar('data_list_item','WAKTU_RUANG',$resDataMhsTest[$i]['HARI'].', '.$resDataMhsTest[$i]['TGL_UJI'].' ('.$resDataMhsTest[$i]['JAM_UJI'].') '.$resDataMhsTest[$i]['ruangUjian']);

            $this->mTemplate->parseTemplate('data_list_item','a');
         }
      }else{
         $this->AddVar('data_list','IS_EMPTY','YES');
      }

      $this->AddVar("document","TANGGAL_CETAK", $this->displayTanggal());
      $this->AddVar("document","PENGESAH", $dataPejabatTtd[0]['PENGESAH']);
      $this->AddVar("document","JABATAN", $dataPejabatTtd[0]['JABATAN']);
      $this->AddVar("document","NAMA", $dataPejabatTtd[0]['NAMA']);
      $this->AddVar("document","NIP", $dataPejabatTtd[0]['NIP']);

      $this->DisplayTemplate();
   }

   function displayTanggal(){
      $tgl = date("Y-m-d");

      $arrayBulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei',
                     'Juni', 'Juli', 'Agustus', 'September', 'Oktober',
                     'November', 'Desember');

      $arrayTgl = explode('-', $tgl);
      if(!isset($arrayTgl[0]))$arrayTgl[0] = 0;
      if(!isset($arrayTgl[1]))$arrayTgl[1] = 0;
      if(!isset($arrayTgl[2]))$arrayTgl[2] = 0;
      $setTanggal = isset($arrayTgl[2])?$arrayTgl[2]:0;

      $tanggal = $this->cfgObj->GetValue('app_client_location').', '.$setTanggal . ' '  . $arrayBulan[(int)$arrayTgl[1]] . ' ' . $arrayTgl[0];
      return $tanggal;
   }
}
?>
