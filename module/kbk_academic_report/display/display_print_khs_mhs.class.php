<?php
/*
Author : Nikolius
Email : n1colius.lau@gmail.com
Date : 10/23/2012 2:10:26 PM
*/
class DisplayPrintKhsMhs extends DisplayBasePrint {
   var $mMahasiswaNiu;
   var $mMahasiswaProdiId;
   var $mKHSSempId;

   var $cfg;
   var $objAcademicReport;

   function DisplayPrintKhsMhs(&$configObject, &$security, $mhsniu, $prodiId, $sempId) {
      DisplayBasePrint::DisplayBasePrint ($configObject, $security);
      $this->mMahasiswaProdiId = $prodiId;
      $this->mKHSSempId = $sempId;

      $this->objAcademicReport = new AcademicReportClientService($this->mrUserSession->GetProperty("ServerServiceAddress"),
               false, $mhsniu, $prodiId);

      $this->mMahasiswaNiu = $mhsniu;
      $this->SetTemplateBasedir($configObject->GetValue('app_module') . 'kbk_academic_report/templates/');
      $this->SetTemplateFile('print_khs_mhs.html');
      
      $this->cfg = $configObject;
   }

   function Display() {
      DisplayBasePrint::Display("Cetak Kartu Hasil Studi");
      $this->AddVar("content","BREAK","nobreak");

      // cek apakah service sia is available
      $dataUser = $this->GetDataMahasiswa();         
      if ($dataUser !== false) {
         //data
         $refObj = new Reference($this->mrConfig);
         $fak = $refObj->GetFakultasByProdi($this->mrUserSession->GetProperty('UserProdiId'));
         $sempId = $this->mKHSSempId;
         $semId = $this->objAcademicReport->getSemIdBySempId($sempId);         
         $semesterNama = $this->objAcademicReport->getDataSemesterNama($sempId);         
         $semesterStudi = $this->objAcademicReport->getSemesterStudiMhs($this->mMahasiswaNiu,$sempId);
         $resMhsNilai = $this->objAcademicReport->getMhsNilai($this->mMahasiswaNiu,$sempId);         

         $resKeterangan = $this->objAcademicReport->getKeteranganKhs($this->mMahasiswaNiu,$semId);         
         $jumlahNilaiKum = $this->objAcademicReport->getJumlahNilaiKum($this->mMahasiswaNiu);         
         $jumlahNilaiPrevSem = $this->objAcademicReport->getJumlahNilaiPrevSem($this->mMahasiswaNiu,$resKeterangan[1]['SEM_ID'],$this->mMahasiswaProdiId);

         //kop
         $this->AddVar('kop','UNIVERSITY_NAME',$_SESSION['identitas']['pt_nama']);         
         $this->AddVar('kop','UNIVERSITY_LOGO','images/logo.jpg');         
         $this->AddVar('kop','FACULTY_NAME', $fak[0]['Nama']);

         //data judul
         $this->AddVar('data_judul','SEMESTER_NAMA', $semesterNama[0]['NAMA_SEMESTER']);
         $this->AddVar('data_judul','MHS_NIM', $dataUser[0]['NIM']);
         $this->AddVar('data_judul','MHS_NAMA', $dataUser[0]['NAMA']);
         $this->AddVar('data_judul','MHS_PRODI', $dataUser[0]['PRODI']);
         $this->AddVar('data_judul','MHS_KONSENTRASI', $dataUser[0]['KONSENTRASI']);         
         $this->AddVar('data_judul','MHS_DOSEN', $dataUser[0]['PA']);
         $this->AddVar('data_judul','MHS_SEMESTER', $semesterStudi);

         //data list
         $totSks = 0;
         $totSksBobot = 0;
         if($resMhsNilai[0]['KODE'] != ''){
            for($i=0; $i < count($resMhsNilai); $i++) { 

               $totSks += $resMhsNilai[$i]['SKS'];
               $totSksBobot += $resMhsNilai[$i]['SKS_BOBOT'];
               $this->AddVar("data_list","NO",($i+1));
               $this->AddVar("data_list","MK_KODE",$resMhsNilai[$i]['KODE']);
               $this->AddVar("data_list","MK_NAMA",$resMhsNilai[$i]['NAMA']);
               $this->AddVar("data_list","MK_SKS",$resMhsNilai[$i]['SKS']);
               $this->AddVar("data_list","MK_NILAI",$resMhsNilai[$i]['NILAI']);
               $this->AddVar("data_list","MK_BOBOT",$resMhsNilai[$i]['BOBOT']);
               $this->AddVar("data_list","MK_SKS_BOBOT",$resMhsNilai[$i]['SKS_BOBOT']);
               $this->ParseTemplate("data_list", 'a');
            }
         }

         //data list footer
         $this->AddVar("data_list_footer","TOT_SKS",$totSks);
         $this->AddVar("data_list_footer","TOT_SKS_BOBOT",$totSksBobot);

         $this->AddVar("data_keterangan","TOT_SKS_BOBOT",$totSksBobot);
         $this->AddVar("data_keterangan","TOT_SKS_BOBOT_KUM",$jumlahNilaiKum);
         $this->AddVar("data_keterangan","TOT_SKS_BOBOT_PREV",$jumlahNilaiPrevSem);
         $this->AddVar("data_keterangan","TOT_SKS",$totSks);
         $this->AddVar("data_keterangan","TOT_SKS_KUM",$resKeterangan[0]['SKS_KUMULATIF']);
         $this->AddVar("data_keterangan","TOT_SKS_PREV",$resKeterangan[1]['SKS_SEMESTER']);
         $this->AddVar("data_keterangan","IPS",$resKeterangan[0]['IPS']);
         $this->AddVar("data_keterangan","IPK",$resKeterangan[0]['IPK']);
         $this->AddVar("data_keterangan","IPS_PREV",$resKeterangan[1]['IPS']);

         //data tanda tangan         
         $dokumen = "Kartu Hasil Studi";         
         $dokumenTipe = "Mengetahui";         
         $TglCetak = $this->tanggalBulanTahunIndo(date("Y-m-d"));
         $lokasi = strtoupper($this->mrConfig->GetValue('app_client_location'));
         $urutan = 1;
         $getTtd1 = $this->objAcademicReport->getTandaTangan($dokumen,$dokumenTipe,$urutan,$this->mMahasiswaProdiId);         
         $urutan = 2;
         $getTtd2 = $this->objAcademicReport->getTandaTangan($dokumen,$dokumenTipe,$urutan,$this->mMahasiswaProdiId);

         $this->AddVar("tanda_tangan","PENGESAH",$getTtd1[0]['PENGESAH']);
         $this->AddVar("tanda_tangan","JABATAN",strtoupper($getTtd1[0]['JABATAN']));
         $this->AddVar("tanda_tangan","NAMA",$getTtd1[0]['NAMA']);
         $this->AddVar("tanda_tangan","NIP",$getTtd1[0]['NIP']);
         $this->AddVar("tanda_tangan","LOKASI",strtoupper($lokasi));
         $this->AddVar("tanda_tangan","TANGGAL_CETAK",strtoupper($TglCetak));
         $this->AddVar("tanda_tangan","JABATAN_2",strtoupper($getTtd2[0]['JABATAN']));
         $this->AddVar("tanda_tangan","NAMA_2",$getTtd2[0]['NAMA']);
         $this->AddVar("tanda_tangan","NIP_2",$getTtd2[0]['NIP']);
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