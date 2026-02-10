<?php
/*
Author : Nikolius
Email : n1colius.lau@gmail.com
Date : 10/23/2012 10:08:51 AM
*/
class DisplayPrintKrsMhs extends DisplayBasePrint {
   var $mUserRole;
   var $mMahasiswaNiu;
   var $mMahasiswaProdiId;
   var $mObjKrsService;
   var $mOpsi;

   var $cfg;
   
   function DisplayPrintKrsMhs(&$configObject, &$security, $userRole, $mhsniu, $prodiId, $opsi) {
      DisplayBasePrint::DisplayBasePrint($configObject, $security);
      $this->mUserRole = $userRole;
      $this->mMahasiswaProdiId = $prodiId;
      $this->mMahasiswaNiu = $mhsniu;
      $this->mOpsi = $opsi;
      
      $this->mObjKrsService = new AcademicPlanClientService($this->mrUserSession->GetProperty("ServerServiceAddress"),false, $this->mMahasiswaNiu, $this->mMahasiswaProdiId);
      $this->mObjKrsService->SetProperty("UserRole", $this->mUserRole);
      $this->mObjKrsService->DoSiaSetting(); 
      $this->SetTemplateBasedir($configObject->GetValue('app_module') . 'kbk_academic_plan/templates/');
      $this->SetTemplateFile('print_krs_mhs.html');
      
      $this->cfg = $configObject;
   }

   function Display(){
      DisplayBasePrint::Display("Cetak Rencana Studi");
      $this->AddVar('content','BREAK',"nobreak");

      $dataUser = $this->GetDataMahasiswa();      
      if ($dataUser !== false) {
         //data
         $sempId = $this->mObjKrsService->GetProperty("SemesterProdiId");         
         $refObj = new Reference($this->mrConfig);
         $fak = $refObj->GetFakultasByProdi($this->mrUserSession->GetProperty('UserProdiId'));
         $semesterNama = $this->mObjKrsService->GetProperty("NamaSemester");
         $semesterTahun = $this->mObjKrsService->GetProperty("TahunSemester");
         $semester = $semesterNama.' '.$semesterTahun.'/'.($semesterTahun+1);         
         $dataKrs = $this->mObjKrsService->GetAllKrsItemForSemester();
         $TglCetak = $this->tanggalBulanTahunIndo(date("Y-m-d"));
         $lokasi = strtoupper($this->mrConfig->GetValue('app_client_location'));

         if($this->mOpsi == 'pasca')
            $labelOpsi = 'BKU';
         elseif($this->mOpsi == 'mm')
            $labelOpsi = 'KONSENTRASI';

         //kop
         $this->AddVar('kop','UNIVERSITY_NAME',$_SESSION['identitas']['pt_nama']);         
         $this->AddVar('kop','UNIVERSITY_LOGO','images/logo.jpg');         
         $this->AddVar('kop','FACULTY_NAME', $fak[0]['Nama']);

         //data judul
         $this->AddVar('data_judul','MHS_NAMA', $dataUser[0]['NAMA']);
         $this->AddVar('data_judul','MHS_NIM', $dataUser[0]['NIM']);
         $this->AddVar("data_judul","MHS_PA",$dataUser[0]['PA']);
         $this->AddVar("data_judul","MHS_PRODI",$dataUser[0]['PRODI']);
         $this->AddVar("data_judul","MHS_KONSENTRASI",$dataUser[0]['KONSENTRASI']);
         $this->AddVar("data_judul","LABELNYA_KONSENTRASI",$labelOpsi);
         $this->AddVar("data_judul","MHS_PRODI_JENJANG",$dataUser[0]['PRODI_JENJANG']);
         $this->AddVar("data_judul","SEM_NAMA",$semester);
         $this->AddVar("data_judul","SEM_TAHUN",$semesterTahun);

         //data tabel list
         $totSks = 0;
         for($i=0;$i<10;$i++) {
            $totSks = $totSks + $dataKrs[$i]['SKS'];
            
            $this->AddVar("tbody_data","NO",$i+1);
            $this->AddVar("tbody_data","MK_NAMA",$dataKrs[$i]['NAMA_MK']);
            $this->AddVar("tbody_data","MK_KODE",$dataKrs[$i]['KODE_MK']);
            $this->AddVar("tbody_data","MK_SKS",$dataKrs[$i]['SKS']);   
            
            $this->ParseTemplate("tbody_data","a");
         }
         $this->AddGlobalVar("SKS_TOT",$totSks);

         //data footer
         $this->AddVar('data_footer','MHS_NAMA', $dataUser[0]['NAMA']);
         $this->AddVar('data_footer','TANGGAL_CETAK', $TglCetak);
         $this->AddVar('data_footer','LOKASI', $lokasi);
      }

      $this->DisplayTemplate();
   }

   function GetDataMahasiswa() {
      $objUserService = new UserClientService($this->mrUserSession->GetProperty("ServerServiceAddress"), 
         false, $this->mMahasiswaNiu);

      if (!$objUserService->IsError()) {
         //$objUserService->SetProperty("UserRole", 1 );
         $objUserService->SetProperty("UserRole", 8 );
         $dataUser = $objUserService->GetUserInfo(3);
         $this->DoUpdateServiceStatus($objUserService, $dataUser, 'SIA');
         if (false === $dataUser){    
            return false;
         } else {
            return $dataUser;
         }   
      }
   }

   function tanggalBulanTahunIndo($_waktu){  //format input : date("Y-m-d")
      $_tahun = substr($_waktu,0,4);
      $_bulan = substr($_waktu,5,2);
      $_tanggal = substr($_waktu,8,2);       
      $bulan_en = array("01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12");
      $bulan_id = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");   
      $_bulan_id = str_replace($bulan_en, $bulan_id, $_bulan);
      $_tgl = $_tanggal." ".$_bulan_id." ".$_tahun;
      return $_tgl;
   }
}
?>