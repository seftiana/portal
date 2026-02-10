<?php
/*
Author : Nikolius
Email : n1colius.lau@gmail.com
Web : www.lius-webdev.com
Blog : blog.lius-webdev.com
Date : 10/30/2012 11:09:59 AM
*/
class DisplayPrintKhsMhsMm extends DisplayBasePrint {
   var $mMahasiswaNiu;
   var $mMahasiswaProdiId;
   var $mKHSSempId;

   var $cfg;
   var $objAcademicReport;

   function DisplayPrintKhsMhsMm(&$configObject, &$security, $mhsniu, $prodiId, $sempId) {
      DisplayBasePrint::DisplayBasePrint ($configObject, $security);
      $this->mMahasiswaProdiId = $prodiId;
      $this->mKHSSempId = $sempId;

      $this->objAcademicReport = new AcademicReportClientService($this->mrUserSession->GetProperty("ServerServiceAddress"),
               false, $mhsniu, $prodiId);

      $this->mMahasiswaNiu = $mhsniu;
      $this->SetTemplateBasedir($configObject->GetValue('app_module') . 'academic_report/templates/');
      $this->SetTemplateFile('print_khs_mhs_mm.html');
      
      $this->cfg = $configObject;
   }

   function Display() {
      DisplayBasePrint::Display("Cetak Kartu Hasil Studi MM");
      $this->AddVar("page","BREAK","nobreak");

      // cek apakah service sia is available
      $dataUser = $this->GetDataMahasiswa();      
      if ($dataUser !== false) {
         //data
         $dataKop = $this->objAcademicReport->getDataKopMM($this->mMahasiswaProdiId);
         $dataSemKe = $this->objAcademicReport->getDataSemesterKeMhs($this->mMahasiswaNiu,$this->mKHSSempId);
         $dataTahunSem = $this->objAcademicReport->getDataSemesterNama($this->mKHSSempId);
         $resMhsNilai = $this->objAcademicReport->getMhsNilai($this->mMahasiswaNiu,$this->mKHSSempId);
         $detNilai = $this->objAcademicReport->getKetNilai($dataUser[0]['PRODI_JENJANG']);         

         $semId = $this->objAcademicReport->getSemIdBySempId($this->mKHSSempId);
         $resKeterangan = $this->objAcademicReport->getKeteranganKhs($this->mMahasiswaNiu,$semId);         
         $jumlahNilaiKum = $this->objAcademicReport->getJumlahNilaiKum($this->mMahasiswaNiu);

         //kop
         $this->AddVar('kop','UNIVERSITY_NAME',strtoupper($_SESSION['identitas']['pt_nama']));
         $this->AddVar('kop','UNIVERSITY_LOGO','images/logo.jpg');
         $this->AddVar('kop','FAK_NAMA',strtoupper($dataKop['NAMA']));
         $this->AddVar('kop','PRODI_NAMA',strtoupper($dataKop['prodiNamaResmi']));
         $this->AddVar('kop','PRODI_ALAMAT',$dataKop['prodiAlamat']);
         $this->AddVar('kop','PRODI_TELP',$dataKop['prodiTelp']);
         $this->AddVar('kop','PRODI_FAX',$dataKop['prodiFax']);
         $this->AddVar('kop','PRODI_WEBSITE',$dataKop['prodiWebsite']);
         $this->AddVar('kop','PRODI_EMAIL',$dataKop['prodiEmail']);

         //data judul
         $this->AddVar('data_judul','SEM_KE',$dataSemKe['SEM_KE']);
         $this->AddVar('data_judul','SEMESTER_TAHUN',$dataTahunSem[0]['TAHUN_SEMESTER']);
         $this->AddVar('data_judul','MHS_NAMA',$dataUser[0]['NAMA']);
         $this->AddVar('data_judul','MHS_NIM',$dataUser[0]['NIM']);
         $this->AddVar('data_judul','MHS_PRODI',$dataUser[0]['PRODI']);
         $this->AddVar('data_judul','MHS_KONSENTRASI',$dataUser[0]['KONSENTRASI']);

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
         $this->AddVar("data_list_footer","KET_NILAI",$detNilai['KET_NILAI']);

         //data ipk
         $this->AddVar("data_ipk","SEM_KE",$dataSemKe['SEM_KE']);
         $this->AddVar("data_ipk","TOT_SKS_BOBOT",$totSksBobot);
         $this->AddVar("data_ipk","TOT_SKS",$totSks);
         $this->AddVar("data_ipk","IPS",$resKeterangan[0]['IPS']);
         $this->AddVar("data_ipk","TOT_SKS_BOBOT_KUM",$jumlahNilaiKum);
         $this->AddVar("data_ipk","TOT_SKS_KUM",$resKeterangan[0]['SKS_KUMULATIF']);
         $this->AddVar("data_ipk","IPK",$resKeterangan[0]['IPK']);

         //tanda tangan
         $dokumen = "Kartu Hasil Studi";         
         $dokumenTipe = "Mengetahui";         
         $TglCetak = $this->tanggalBulanTahunIndo(date("Y-m-d"));
         $lokasi = strtoupper($this->mrConfig->GetValue('app_client_location'));         
         $urutan = 2;
         $getTtd2 = $this->objAcademicReport->getTandaTangan($dokumen,$dokumenTipe,$urutan,$this->mMahasiswaProdiId);
         
         $this->AddVar("tanda_tangan","JABATAN",strtoupper($getTtd2[0]['JABATAN']));
         $this->AddVar("tanda_tangan","NAMA",$getTtd2[0]['NAMA']);
         $this->AddVar("tanda_tangan","NIP",$getTtd2[0]['NIP']);
         $this->AddVar("tanda_tangan","LOKASI",strtoupper($lokasi));
         $this->AddVar("tanda_tangan","TANGGAL_CETAK",strtoupper($TglCetak));         
      }

      $this->DisplayTemplate();
   }

   function GetDataMahasiswa() {
      $objUserService = new UserClientService($this->mrUserSession->GetProperty("ServerServiceAddress"), 
         false, $this->mMahasiswaNiu);

      if (!$objUserService->IsError()) {
         $objUserService->SetProperty("UserRole", 1 );
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