<?php
/*
Author : Nikolius
Email : n1colius.lau@gmail.com
Date : 6/17/2014 9:15:13 PM
*/
class DisplayPrintTranscript3 extends DisplayBasePrint {

   var $mMahasiswaNiu;
   var $mMahasiswaProdiId;

   var $objAcademicReport;

   function DisplayPrintTranscript3(&$configObject, &$security, $mhsniu, $prodiId) {
      DisplayBasePrint::DisplayBasePrint ($configObject, $security, true);
      $this->mMahasiswaProdiId = $prodiId;
      $this->mMahasiswaNiu = $mhsniu;
      $this->lokasi = $configObject->GetValue('app_client_location');

      $this->objAcademicReport = new AcademicReportClientService($this->mrUserSession->GetProperty("ServerServiceAddress"), false, $this->mMahasiswaNiu, $this->mMahasiswaProdiId);

      $this->SetTemplateBasedir($configObject->GetValue('app_module') . 'academic_report/templates/');
      $this->SetTemplateFile('print_transcript3.html');
   }

   function Display() {
      DisplayBasePrint::Display("Cetak Transkrip Sementara");

      $namaPT = $_SESSION['identitas']['pt_nama'];
      $prodiNama = $_SESSION['user_identity_portal']->mUserProdiName;

      $dataUser = $this->GetProfilMahasiswa();
      $angkatan1 = $dataUser[0]['angkatan'];
      $angkatan2 = $angkatan1+1;
      $angkatanNama = $angkatan1."-".$angkatan2;

      $dataTranscript = $this->objAcademicReport->GetAllTranscriptItemFullNilaiForMahasiswa();

      $namaDokumen = 'Transkrip';
      $tipeSah = 'Mengetahui';
      $dataPejabatTtd = $this->objAcademicReport->getDataPejabatTtd($namaDokumen,$tipeSah);

      $namaDokumen = 'Transkrip Kiri';
      $tipeSah = 'Mengetahui';
      $dataPejabatTtdKiri = $this->objAcademicReport->getDataPejabatTtdWithProdi($namaDokumen,$tipeSah,$dataUser[0]['prodiKode']);

      //data header
      $this->AddVar('page','NAMA_PT',$namaPT);
      $this->AddVar('page','MHS_NAMA',$dataUser[0]['fullname']);
      $this->AddVar('page','MHS_NIM',$dataUser[0]['mhsNiu']);
      $this->AddVar('page','PRODI_NAMA',$dataUser[0]['info']);
      $this->AddVar('page','PRODI_JENJANG',$dataUser[0]['jenjang_prodi']);
	  $this->AddVar('page','TEMPAT_LAHIR',$dataUser[0]['tempat_lahir']);
	  $this->AddVar('page','TGL_LAHIR',$this->IndonesianDate($dataUser[0]['tanggal_lahir']));

      //full satu halaman = 34 baris data
      //satu halaman tanpa pengesahan = 45 baris data

      $totSks = 0;
      $totBobotNilai = 0;
      if($dataTranscript[0]['MK_KODE'] != ""){

         $increBarisPerHal = 0;
         for ($i=0; $i < count($dataTranscript); $i++) {
            $this->AddVar('data_list','IS_EMPTY','NO');

            $this->AddVar('data_list_item','NO',$i+1);
            $this->AddVar('data_list_item','MK_KODE',$dataTranscript[$i]['MK_KODE']);
            $this->AddVar('data_list_item','MK_NAMA',$dataTranscript[$i]['MK_NAMA']);
			$this->AddVar('data_list_item','SEMESTER',$dataTranscript[$i]['SEMESTER']);
			$this->AddVar('data_list_item','SKS',$dataTranscript[$i]['SKS']);
			$this->AddVar('data_list_item','WAJIB',$dataTranscript[$i]['WAJIB']);
			$this->AddVar('data_list_item','NILAI_UTS',$dataTranscript[$i]['NILAI_UTS']);
            $this->AddVar('data_list_item','NILAI_MANDIRI',$dataTranscript[$i]['NILAI_MANDIRI']);
            $this->AddVar('data_list_item','NILAI_UAS',$dataTranscript[$i]['NILAI_UAS']);
            $this->AddVar('data_list_item','NILAI_REMEDIAL',$dataTranscript[$i]['NILAI_REMEDIAL']);
			$this->AddVar('data_list_item','NILAI_ABOSOLUT',$dataTranscript[$i]['NILAI_ABOSOLUT']);
			$this->AddVar('data_list_item','NILAI_RELATIF',$dataTranscript[$i]['NILAI_RELATIF']);
            $this->mTemplate->parseTemplate('data_list_item','a');
            $increBarisPerHal++;

            //cek batas pengesahan
            if($increBarisPerHal == 100){
               $sisaBarisData = $this->hitungSisaBarisData($i,$dataTranscript);
               if(($sisaBarisData <= 11) AND ($sisaBarisData != 0)){
                  $this->AddVar('page','BREAK','page-break');
                  $this->mTemplate->parseTemplate('page','a');
                  $this->mTemplate->clearTemplate('data_list_item');
                  $this->mTemplate->clearTemplate('data_list');
                  $increBarisPerHal = 0;
               }
            }

            if($increBarisPerHal == 45){
               $this->AddVar('page','BREAK','page-break');
               $this->mTemplate->parseTemplate('page','a');
               $this->mTemplate->clearTemplate('data_list_item');
               $this->mTemplate->clearTemplate('data_list');
               $increBarisPerHal = 0;
            }

            $totSks += $dataTranscript[$i]['SKS'];
            $totBobotNilai += $dataTranscript[$i]['BOBOT_KELOMPOK'];
         }
		 $this->AddVar('page','TOT_SKS',$totSks);
		 $this->AddVar('page','TOT_BOBOT',$totBobotNilai);
		 $this->AddVar('page','IPK',$dataUser[0]['ipk_transkrip']);
		 
		 $this->AddVar('document','IPK_TERBILANG',terbilang($dataUser[0]['ipk_transkrip']));

         $this->AddVar('page','BREAK','nobreak');
         $this->mTemplate->parseTemplate('page','a');
      }else{
         $this->AddVar('data_list','IS_EMPTY','YES');
      }

      //footer
      $this->AddVar("document","TANGGAL_CETAK", $this->displayTanggal());

      $this->AddVar("document","JABATAN_KIRI", $dataPejabatTtdKiri[0]['JABATAN']);
      $this->AddVar("document","NAMA_KIRI", $dataPejabatTtdKiri[0]['NAMA']);
      $this->AddVar("document","NIP_KIRI", $dataPejabatTtdKiri[0]['NIP']);

      $this->AddVar("document","PENGESAH", $dataPejabatTtd[0]['PENGESAH']);
      $this->AddVar("document","JABATAN", $dataPejabatTtd[0]['JABATAN']);
      $this->AddVar("document","NAMA", $dataPejabatTtd[0]['NAMA']);
      $this->AddVar("document","NIP", $dataPejabatTtd[0]['NIP']);

      $this->DisplayTemplate();
   }

   function hitungSisaBarisData($dataKe,$arrDataList){
      $dataKe++;
      $sisaData = count($arrDataList) - $dataKe;
      return $sisaData;
   }

   function displayTanggal(){
      $tgl = date("Y-m-d");

      $arrayBulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei','Juni', 'Juli', 'Agustus', 'September', 'Oktober','Nopember', 'Desember');

      $arrayTgl = explode('-', $tgl);
      if(!isset($arrayTgl[0]))$arrayTgl[0] = 0;
      if(!isset($arrayTgl[1]))$arrayTgl[1] = 0;
      if(!isset($arrayTgl[2]))$arrayTgl[2] = 0;
      $setTanggal = isset($arrayTgl[2])?$arrayTgl[2]:0;

      $tanggal = $this->lokasi.', '.$setTanggal . ' '  . $arrayBulan[(int)$arrayTgl[1]] . ' ' . $arrayTgl[0];
      return $tanggal;
   }

   function GetProfilMahasiswa() {
      $objUserService = new UserClientService($this->mrUserSession->GetProperty("ServerServiceAddress"),
         false, $this->mMahasiswaNiu);
      if (!$objUserService->IsError()) {
         $objUserService->SetProperty("UserRole", 1 );
         $dataUser = $objUserService->GetUserInfo(1);
         $this->DoUpdateServiceStatus($objUserService, $dataUser, 'SIA');
         if (false === $dataUser){
            return false;
         } else {
            return $dataUser;
         }
      }
   }
}
?>