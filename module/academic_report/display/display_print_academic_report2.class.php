<?php
/*
Author : Nikolius
Email : n1colius.lau@gmail.com
Date : 6/12/2014 11:23:14 PM
*/
class DisplayPrintAcademicReport2 extends DisplayBasePrint {
   var $mMahasiswaNiu;
   var $mMahasiswaProdiId;
   var $mKHSSempId;

   var $cfg;
   var $objAcademicReport;

   function DisplayPrintAcademicReport2(&$configObject, &$security, $mhsniu, $prodiId, $sempId) {
      DisplayBasePrint::DisplayBasePrint ($configObject, $security, TRUE);
      $this->mMahasiswaProdiId = $prodiId;
      $this->mKHSSempId = $sempId  ;

      $this->mMahasiswaNiu = $mhsniu;
      $this->SetTemplateBasedir($configObject->GetValue('app_module') . 'academic_report/templates/');
      $this->SetTemplateFile('print_academic_report2.html');

      $this->cfg = $configObject;

      $this->objAcademicReport = new AcademicReportClientService($this->mrUserSession->GetProperty("ServerServiceAddress"),false, $this->mMahasiswaNiu, $this->mMahasiswaProdiId);
      $this->objAcademicReport->SetProperty('SemesterProdiId', $this->mKHSSempId);
   }

   function Display(){
      DisplayBasePrint::Display("CETAK KARTU HASIL STUDI");

      $namaPT = $_SESSION['identitas']['pt_nama'];
      $prodiNama = $_SESSION['user_identity_portal']->mUserProdiName;

      $resSemester = $this->objAcademicReport->getSemesterNama($this->mKHSSempId);
      $semesterLabel = $resSemester['NAMA'];
      $dataMhs = $this->objAcademicReport->getDataMhs($this->mMahasiswaNiu);
      $resNilaiMahasiswa = $this->objAcademicReport->getDataHasilStudiSemester($this->mMahasiswaNiu,$this->mKHSSempId);
      $resIpk = $this->objAcademicReport->getDataHasilStudiIpDetail($this->mMahasiswaNiu,$this->mKHSSempId);
      $namaDokumen = 'Kartu Hasil Studi';
      $tipeSah = 'Mengetahui';
      $dataPejabatTtd = $this->objAcademicReport->getDataPejabatTtd($namaDokumen,$tipeSah);

      //data header
      $this->AddVar('document','NAMA_PT',$namaPT);
      $this->AddVar('document','SEMESTER_LABEL',$semesterLabel);
      $this->AddVar('document','PRODI_NAMA',$prodiNama);
      $this->AddVar('document','MHS_NIM',$dataMhs['mhsNiu']);
      $this->AddVar('document','MHS_NAMA',$dataMhs['mhsNama']);
      $this->AddVar('document','DOSEN_WALI',$dataMhs['dosenWali']);

      $totSks = 0;
      $totBobotNilai = 0;
      if($resNilaiMahasiswa[0]['KRSDT_ID'] != ""){
         $this->AddVar('data_list','IS_EMPTY','NO');
         for ($i=0; $i < count($resNilaiMahasiswa); $i++) {
            $this->AddVar('data_list_item','NO',$i+1);
            $this->AddVar('data_list_item','KODE_MK',$resNilaiMahasiswa[$i]['KODE']);
            $this->AddVar('data_list_item','NAMA_MK',$resNilaiMahasiswa[$i]['NAMA']);
            $this->AddVar('data_list_item','NILAI',$resNilaiMahasiswa[$i]['NILAI']);
            $this->AddVar('data_list_item','SKS',$resNilaiMahasiswa[$i]['SKS']);

            $nilaiBobot = $resNilaiMahasiswa[$i]['SKS'] * $resNilaiMahasiswa[$i]['BOBOT'];
            $this->AddVar('data_list_item','NILAIXBOBOT',$nilaiBobot);
            $this->mTemplate->parseTemplate('data_list_item','a');

            $totSks += $resNilaiMahasiswa[$i]['SKS'];
            $totBobotNilai += $nilaiBobot;
         }
      }else{
         $this->AddVar('data_list','IS_EMPTY','YES');
      }
      $this->AddVar('document','JUMLAH_SKS',$totSks);
      $this->AddVar('document','JUMLAH_BOBOTXNILAI',$totBobotNilai);

      $this->AddVar('document','TOT_SKS',$totSks);
      $this->AddVar('document','IPS',$resIpk[0]['IPS']);
      $this->AddVar('document','IPK',$resIpk[0]['IPK']);
      $this->AddVar('document','MAX_SKS',$resIpk[0]['MAX_SKS']);

      $this->AddVar("document","TANGGAL_CETAK", $this->displayTanggal());
      $this->AddVar("document","PENGESAH", $dataPejabatTtd[0]['PENGESAH']);
      $this->AddVar("document","JABATAN", $dataPejabatTtd[0]['JABATAN']);
      $this->AddVar("document","NAMA", $dataPejabatTtd[0]['NAMA']);
      $this->AddVar("document","NIP", $dataPejabatTtd[0]['NIP']);

      $this->DisplayTemplate();
   }

   function displayTanggal(){
      $tgl = date("Y-m-d");

      $arrayBulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei','Juni', 'Juli', 'Agustus', 'September', 'Oktober','Nopember', 'Desember');

      $arrayTgl = explode('-', $tgl);
      if(!isset($arrayTgl[0]))$arrayTgl[0] = 0;
      if(!isset($arrayTgl[1]))$arrayTgl[1] = 0;
      if(!isset($arrayTgl[2]))$arrayTgl[2] = 0;
      $setTanggal = isset($arrayTgl[2])?$arrayTgl[2]:0;

      $tanggal = $this->cfg->GetValue('app_client_location').', '.$setTanggal . ' '  . $arrayBulan[(int)$arrayTgl[1]] . ' ' . $arrayTgl[0];
      return $tanggal;
   }
}
?>