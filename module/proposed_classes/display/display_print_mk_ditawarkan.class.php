<?php
/*
Author : Nikolius
Email : n1colius.lau@gmail.com
Date : 6/9/2014 10:02:13 PM
*/
class DisplayPrintMkDitawarkan extends DisplayBasePrint {

   var $mObjProposedClasses;
   var $mUserId;
   var $mProdiId;
   var $cfgObj;

   function DisplayPrintMkDitawarkan(&$configObject, &$security) {
      DisplayBasePrint::DisplayBasePrint($configObject, $security, TRUE);
      $this->cfgObj = $configObject;

      $this->mUserId = $security->mUserIdentity->GetProperty("UserReferenceId");
      $this->mProdiId = $security->mUserIdentity->GetProperty("UserProdiId");

      $this->mObjProposedClasses = new ProposedClassesClientService($this->mrUserSession->GetProperty("ServerServiceAddress"),false, $this->mUserId, $this->mProdiId);
      $this->mObjProposedClasses->DoSiaSetting();

      $this->SetTemplateBasedir($configObject->GetValue('app_module') . 'proposed_classes/templates/');
      $this->SetTemplateFile('print_mk_ditawarkan.html');
   }

   function Display () {
      DisplayBasePrint::Display("Cetak Daftar Matakuliah Ditawarkan");

      $namaPT = $_SESSION['identitas']['pt_nama'];
      $prodiNama = $_SESSION['user_identity_portal']->mUserProdiName;
      $semesterNama = $this->mObjProposedClasses->getSemesterNama();

      //get datalist semua kelas yg tersedia
      $listSemuaMk = $this->mObjProposedClasses->getListMkDitawarkan();

      //susun ulang variabel arraynya (begin)
      $dataList = array();
      $incre = 0;
      foreach ($listSemuaMk as $key => $value) {

         //pengecekan
         if($semesterKeProses != $value['SEMESTER_KE']){
            $incre = 0;
         }

         $dataList[$value['SEMESTER_KE']][$incre]['KODE_MATAKULIAH'] = $value['KODE_MATAKULIAH'];
         $dataList[$value['SEMESTER_KE']][$incre]['NAMA_MATAKULIAH'] = $value['NAMA_MATAKULIAH'];
         $dataList[$value['SEMESTER_KE']][$incre]['SKS_TEORI'] = $value['SKS_TEORI'];
         $dataList[$value['SEMESTER_KE']][$incre]['SKS_PRAKTIKUM'] = $value['SKS_PRAKTIKUM'];
         $dataList[$value['SEMESTER_KE']][$incre]['SKS_PRAKTIKUM_LAPANGAN'] = $value['SKS_PRAKTIKUM_LAPANGAN'];

         $semesterKeProses = $value['SEMESTER_KE'];
         $incre++;
      }
      //susun ulang variabel arraynya (end)

      //data header
      $this->AddVar('page','NAMA_PT',$namaPT);
      $this->AddVar('page','SEMESTER_LABEL',$semesterNama);
      $this->AddVar('page','PRODI_NAMA',$prodiNama);

      //variabel buat cek halaman print
      $batasBarisData = 35;
      $barisDataPrintCnt = 0;

      foreach ($dataList as $key => $value) {

         $i = 0;
         do {

            //cek apakah perlu ganti halaman
            if($barisDataPrintCnt > $batasBarisData){
               //ganti halaman
               $barisDataPrintCnt = 0;
               $this->AddVar('page','BREAK','page-break');
               $this->mTemplate->parseTemplate('page','a');
               $this->mTemplate->clearTemplate('data_list_semester');
            }

            $totalSksKiri = (int) $value[$i]['SKS_TEORI'] + $value[$i]['SKS_PRAKTIKUM'] + $value[$i]['SKS_PRAKTIKUM_LAPANGAN'];
            $this->AddVar('data_list_semester_item','KODE_MK_KIRI',$value[$i]['KODE_MATAKULIAH']);
            $this->AddVar('data_list_semester_item','NAMA_MK_KIRI',$value[$i]['NAMA_MATAKULIAH']);
            $this->AddVar('data_list_semester_item','SKS_MK_KIRI',$totalSksKiri);

            if($value[$i+1]['KODE_MATAKULIAH'] != ""){
               $totalSksKanan = (int) $value[$i+1]['SKS_TEORI'] + $value[$i+1]['SKS_PRAKTIKUM'] + $value[$i+1]['SKS_PRAKTIKUM_LAPANGAN'];
               $this->AddVar('data_list_semester_item','KODE_MK_KANAN',$value[$i+1]['KODE_MATAKULIAH']);
               $this->AddVar('data_list_semester_item','NAMA_MK_KANAN',$value[$i+1]['NAMA_MATAKULIAH']);
               $this->AddVar('data_list_semester_item','SKS_MK_KANAN',$totalSksKanan);
            }else{
               $this->AddVar('data_list_semester_item','KODE_MK_KANAN',' ');
               $this->AddVar('data_list_semester_item','NAMA_MK_KANAN',' ');
               $this->AddVar('data_list_semester_item','SKS_MK_KANAN',' ');
            }

            $this->mTemplate->parseTemplate('data_list_semester_item','a');
            $barisDataPrintCnt++;
            $i+=2;
         } while ($i < count($value));

         $this->AddVar('data_list_semester','SEMESTER_KE',$key);
         $this->mTemplate->parseTemplate('data_list_semester','a');
         $this->mTemplate->clearTemplate('data_list_semester_item');
         $barisDataPrintCnt+=2;
      }
      //tampilkan halaman terakhir
      $this->AddVar('page','BREAK','nobreak');
      $this->mTemplate->parseTemplate('page','a');

      $this->AddVar("document","TANGGAL_CETAK", $this->displayTanggal());

      $namaDokumen ='Daftar Matakuliah Ditawarkan';
      $tipeSah = 'Mengetahui';
      $dataPejabatTtd = $this->mObjProposedClasses->getDataPejabatTtd($namaDokumen,$tipeSah);

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
                     'Nopember', 'Desember');

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