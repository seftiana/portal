<?php
/**
 * DisplayPrintKHS
 * DisplayPrintKHS class
 * 
 * @package communication 
 * @author Maya Alipin 
 * @copyright Copyright (c) 2006 GamaTechno
 * @version 1.0 
 * @date 2006-04-19
 * @revision 
 *
 */

class DisplayPrintKHS extends DisplayBasePrint {
   var $mMahasiswaNiu;
   var $mMahasiswaProdiId;
   var $mKHSSempId;

   var $cfg;
   
   function DisplayPrintKHS(&$configObject, &$security, $mhsniu, $prodiId, $sempId) {
      DisplayBasePrint::DisplayBasePrint ($configObject, $security);
      $this->mMahasiswaProdiId = $prodiId;
      $this->mKHSSempId = $sempId  ;

      $this->mMahasiswaNiu = $mhsniu;
      $this->SetTemplateBasedir($configObject->GetValue('app_module') . 'kbk_academic_report/templates/');
      $this->SetTemplateFile('print_khs_01.html');
      
      $this->cfg = $configObject;
   }
   
   function GetDataMahasiswa() {
      $objUserService = new UserClientService($this->mrUserSession->GetProperty("ServerServiceAddress"), 
         false, $this->mMahasiswaNiu);
      if (!$objUserService->IsError()) {
         //$objUserService->SetProperty("UserRole", 1 );
         $objUserService->SetProperty("UserRole", 8 );
         $dataUser = $objUserService->GetUserInfo();
         $this->DoUpdateServiceStatus($objUserService, $dataUser, 'SIA');
         if (false === $dataUser){    
            return false;
         } else {
            return $dataUser;
         }   
      }
   }
   
   function Display() {
      // cek apakah service sia is available
      $dataUser = $this->GetDataMahasiswa();

      $rootServer = dirname($this->mrUserSession->GetProperty('ServerServiceAddress'));
      $rootServer = str_replace("/index.service.php","",$rootServer);
      $rootServer = str_replace("portal_services","",$rootServer);
      $fileFoto = $rootServer.'images/'.$_SESSION['identitas']['pt_logo'];
   

      DisplayBasePrint::Display("Cetak Kartu Hasil Studi");
      if (false !== $dataUser) {
         //kop
         /*$this->AddVar('document','UNIVERSITY_NAME',$_SESSION['identitas']['pt_nama']);
         $this->AddVar('document','UNIVERSITY_LOGO',$fileFoto);*/

         $refObj = new Reference($this->mrConfig);
         $fak = $refObj->GetFakultasByProdi($this->mrUserSession->GetProperty('UserProdiId'));
         //$this->AddVar('document','FACULTY_NAME', 'FAKULTAS '. $fak[0]['Nama']);
         /*$this->AddVar('fakultas','TIPE', $this->cfg->GetValue('university_type'));
         $this->AddVar('fakultas','FACULTY_NAME', 'FAKULTAS '. $fak[0]['Nama']);*/
      
         $objAcademicReport = new AcademicReportClientService($this->mrUserSession->GetProperty("ServerServiceAddress"),
               false, $this->mMahasiswaNiu, $this->mMahasiswaProdiId);
         $objAcademicReport->SetProperty('SemesterProdiId', $this->mKHSSempId);
         /*$arrData[0]["nama"] = $dataUser[0]["fullname"];
         $arrData[0]["nim"] = $dataUser[0]["no_id"];
         $arrData[0]["prodi"] = $dataUser[0]["info"];
         $arrData[0]["dosen_pa"] = $dataUser[0]["dosen_pa"];
         $arrData[0]["angkatan"] = $dataUser[0]["angkatan"];
         $arrData[0]["prodi_info"] = $dataUser[0]["prodi_info"];
         
         $semester = $this->mObjKrsService->GetProperty("NamaSemester") ." ". $this->mObjKrsService->GetProperty("TahunSemester") . 
                               " / " . ($this->mObjKrsService->GetProperty("TahunSemester") + 1);*/
                               

         $this->AddVar('content','UNIVERSITY_NAME',strtoupper($_SESSION['identitas']['pt_nama']));
         //$this->AddVar('content','UNIVERSITY_LOGO',$fileFoto);
         // logo ngabil dari file di portal sendiri
         $this->AddVar('content','UNIVERSITY_LOGO','images/logo.jpg');
         $this->AddVar('fakultas','TIPE', $this->cfg->GetValue('university_type'));
         $this->AddVar('fakultas','FACULTY_NAME', 'FAKULTAS '. $fak[0]['Nama']);

         $this->AddVar('content','SEMESTER',$semester);
         //print_r($dataUser);
         $this->AddVar('content','MHS_FULLNAME', $dataUser[0]["fullname"]);
         $this->AddVar('content','MHS_NIU',$dataUser[0]["niu"]);
         $this->AddVar('content','PRODI_INFO',$dataUser[0]["prodi_info"]);
         $this->AddVar('content','MHS_JURUSAN',$dataUser[0]["jurusan"]);
         $this->AddVar('content','MHS_KURTAHUN',$dataUser[0]["kurikulum"]);
         //$this->AddVar('tanda_tangan','NAMAPEMBIMBING',$dataUser[0]["dosen_pa"]);
         //$this->AddVar('tanda_tangan','NIPPEMBIMBING',$dataUser[0]["nip_pa"]);
         
         $semInfo = $objAcademicReport->GetNamaSemesterForSemesterProdiId($this->mKHSSempId);
         $sem = $semInfo[0]['nama'] . " " . $semInfo[0]['tahun'] . " / " . ($semInfo[0]['tahun']+1);
         $this->AddVar('content','SEMESTER', $sem);
         
         $tanggalLokasi = $this->displayTanggal();
         $arrTgglCetak = preg_split('/ /',$tanggalLokasi);
         $tgglTandaTangan = $this->mrConfig->GetValue('app_client_location'). ',   '. '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $arrTgglCetak[1] . ' ' . $arrTgglCetak[2];
         $this->addVar("tanda_tangan","TANGGALTANDATANGAN",$tgglTandaTangan);
         
         //$this->AddVar('content','MAX_SKS',$jatahSks[0]['MAXSKS']);
         //$this->AddVar('content','IP_SEMESTER_LALU',$jatahSks[0]['IPS']);
         $this->AddVar('content','TANGGALCETAK',$this->displayTanggal());
         
         # menghitung semester mahasiswa
         //$semId = $this->mObjKrsService->mSemesterProdiSemesterId;
         $tmp_thn = $semInfo[0]['tahun'];
         if ($semInfo[0]['nama'] == 'genap') {
            $tmp_sem = 2;
         } else {
            $tmp_sem = 1;
         }
         $semId = $tmp_thn.$tmp_sem;
         
         $periodeMasukAwal = $dataUser[0]["angkatan"].'1';
         $cekTahunSemester = substr($semId,0,4);
            $cekPeriodeSemester = substr($semId,4,1);
            if($cekPeriodeSemester == 3){
               $cekPeriodeSemester = 1;
            }elseif($cekPeriodeSemester == 4){
               $cekPeriodeSemester = 2;
            }
            $cekSemesterMasuk = substr($periodeMasukAwal,0,4);
            $cekPeriodeSemesterMasuk = substr($periodeMasukAwal,4,1);
            
            if($cekPeriodeSemester == 1){
                     //before semester
               $thnSemester = $cekTahunSemester-1;
               $thnSemesterNama = $thnSemester.'2';
            }else{
               $periodeSemester = $cekPeriodeSemester-1;
               $thnSemesterNama = $cekTahunSemester.$periodeSemester;
            }
            
            if($cekPeriodeSemesterMasuk == 1){
               //rumus untuk semester kurikulum gasal
               $resSemKur = (($cekTahunSemester-$cekSemesterMasuk)*2) + 1 + ($cekPeriodeSemester-$cekPeriodeSemesterMasuk);   
            }else{
               //rumus untuk semester kurikulum genap
               $resSemKur = (($cekTahunSemester-$cekSemesterMasuk)*2) + 1 - ($cekPeriodeSemesterMasuk-$cekPeriodeSemester);
            }
            $huruf = '';
            switch($resSemKur){
               case 1:
                  $huruf = 'Satu';
                  $romawi = 'I';
                  break;
               case 2:
                  $huruf = 'Dua';
                  $romawi = 'II';
                  break;
               case 3:
                  $huruf = 'Tiga';
                  $romawi = 'III';
                  break;
               case 4:
                  $huruf = 'Empat';
                  $romawi = 'IV';
                  break;
               case 5:
                  $huruf = 'Lima';
                  $romawi = 'V';
                  break;
               case 6:
                  $huruf = 'Enam';
                  $romawi = 'VI';
                  break;
               case 7:
                  $huruf = 'Tujuh';
                  $romawi = 'VII';
                  break;
               case 8:
                  $huruf = 'Delapan';
                  $romawi = 'VIII';
                  break;
               case 9:
                  $huruf = 'Sembilan';
                  $romawi = 'IX';
                  break;
               case 10:
                  $huruf = 'Sepuluh';
                  $romawi = 'X';
                  break;
               case 11:
                  $huruf = 'Sebelas';
                  $romawi = 'XI';
                  break;
               case 12:
                  $huruf = 'Dua belas';
                  $romawi = 'XII';
                  break;
               case 13:
                  $huruf = 'Tiga belas';
                  $romawi = 'XIII';
                  break;
               case 14:
                  $huruf = 'Empat Belas';
                  $romawi = 'XIV';
                  break;
               case 15:
                  $huruf = 'Lima Belas';
                  $romawi = 'XV';
                  break;
            }
         
         $this->addVar("content","SEMESTER_MHS",$resSemKur.' ('.$huruf.')');
         # ---------------------------------------------------------------------
         
         $dataKhs = $objAcademicReport->GetAllKHSItemForSemester();
         
         # untuk mendapatkan bobot kumulatif
         $dataKhsBefore = $objAcademicReport->GetAllKHSItemForSemesterBefore();
         if($dataKhsBefore){
            foreach($dataKhsBefore as $p){
               $p['bobot_nilai'] = $p['bobot_nilai'] * $p['sks_jumlah'];
               if($p['nilai'] != ''){
                  $jumlahSksBefore += $p['sks_jumlah'];
                  $jumlahBobotBefore += $p['bobot_nilai'];
               }
            }
         }
         # ---------------------------------------------------------------------
         
         if (!empty($dataKhs)) {
            $this->AddVar('khs','IS_EMPTY', 'NO');
            $data_cek = '';
            $no = 0;
            $total_bobot = 0;
            $total_sks = 0;
            foreach ($dataKhs as $value) {
               $no++;
               if(!empty($value['mkblokId'])){
                  if ($data_cek !=  $value['mkblokId']) {
                     $this->clearTemplate("show_judul_blok");
                     $this->SetAttribute('show_judul_blok', 'visibility', 'show');
                     $this->addVar("show_judul_blok","MKBLOKKODE",$value['mkblokKode']);
                     $this->addVar("show_judul_blok","MKBLOKNAMA",$value['mkblokNama']);
                  } else {
                     $this->SetAttribute('show_judul_blok', 'visibility', 'hidden');
                  }
               } else {
                  $this->SetAttribute('show_judul_blok', 'visibility', 'hidden');
               }
               
               $data_cek = $value['mkblokId'];
               $value['no'] = $no;
               $value['bobot'] = $value['bobot_nilai'] * $value['sks_jumlah'];
               $total_bobot = $total_bobot + $value['bobot'];
               if (!empty($value['bobot_nilai']))
                  $total_sks = $total_sks + $value['sks_jumlah'];
               
               $this->AddVars('khs_item', $value, 'KHS_');
               $this->ParseTemplate('khs_item', 'a');
            }
            
            $ipBefore = $objAcademicReport->GetIpInfoForSemesterBefore();
            $this->AddVar('content','IP_SEMESTER_LALU',$ipBefore[0]['svip_ipk']);
            
            $ip = $objAcademicReport->GetIpInfoForSemester();
            
            $total['SEMESTERROMAWI'] = $romawi;
            $total['TOTALBOBOT'] = $total_bobot;
            $total['TOTALSEMUASKS'] = $total_sks;
            if ($total['TOTALSEMUASKS'] != 0);
               $hasilIp = $total['TOTALBOBOT'] / $total['TOTALSEMUASKS'];
            $total['TOTALIP'] = number_format($hasilIp,"2",",","");
            
            $total['TOTALIPKUMULATIF'] = $ip[0]['svip_ipk'];
            $total['TOTALBOBOTKUMULATIF'] = $jumlahBobotBefore + $total_bobot;
            $total['TOTALSEMUASKSKUMULATIF'] = $jumlahSksBefore + $total_sks;
            
            $this->AddVars('total', $total, '');
         } else {
            $this->AddVar('khs','IS_EMPTY', 'YES');
         }
         
         /*
         if  (!empty($dataKhs)) {
            $ip = $objAcademicReport->GetIpInfoForSemester();
            $totalSks = 0;
            $totalNilaiSks = 0;
            foreach ($dataKhs as $key=>$khsItem) {
               $totalSks += $khsItem['sks_jumlah'];
               $dataKhs[$key]['nilaisks'] = $khsItem['bobot_nilai'] * $khsItem['sks_jumlah'];
               $totalNilaiSks += $dataKhs[$key]["nilaisks"];
            }
            $this->AddVar('khs', 'IS_EMPTY', 'NO');
            $this->ParseData('data_khs_item', $dataKhs, "KHS_",1);

            $this->AddVar('khs', 'SKS_DIAMBIL', $totalSks);
            $this->AddVar('khs', 'TOTAL_NILAISKS', $totalNilaiSks);
            #$this->AddVar('khs', 'IP_SEMESTER', $ip[0]['ips']);
            #$this->AddVar('khs', 'IP_KUMULATIF', $ip[0]['ipk']);
            #$this->AddVar('khs', 'MAX_SKS', $ip[0]['max_sks']);
            $arrData[0]['ip_semester'] = round($ip[0]['ips'], 2);
            $arrData[0]['ip_kumulatif'] = round($ip[0]['ipk'], 2);
            $arrData[0]['max_sks'] = $ip[0]['max_sks'];
         } else {
               $this->AddVar('khs', 'IS_EMPTY', 'YES');   
         }
         */
         $dataPengesah = $objAcademicReport->GetPejabatPengesahKHS();
         //print_r($dataPengesah);
         /*$this->AddVar('page', 'TIPE_PENGESAH', $dataPengesah[0]['TIPE_PENGESAH']);
         $this->AddVar('page', 'NAMA_PENGESAH', $dataPengesah[0]['NAMA_PENGESAH']);
         $this->AddVar('page', 'JABATAN_PENGESAH', $dataPengesah[0]['JABATAN_PENGESAH']);
         $this->AddVar('page', 'NIP_PENGESAH', $dataPengesah[0]['NIP_PENGESAH']);*/
         if (!empty($dataPengesah))
            $this->ParseData('tanda_tangan', $dataPengesah, '');
         
         $this->DisplayTemplate();       
      }
      
   }
   
   function displayTanggal($tgl="now", $showLocation="true", $location="default") {
        global $config_obj;
        global $page;

        if ($tgl == "now") {
            $tgl = date("Y-m-d");
        }
        $arrayBulan = array("01" => "Januari", "02" => "Februari", "03" => "Maret", "04" => "April", "05" => "Mei",
            "06" => "Juni", "07" => "Juli", "08" => "Agustus", "09" => "September", "10" => "Oktober",
            "11" => "November", "12" => "Desember");
        $arrayTgl = explode("-", $tgl);
        $setTanggal = $arrayTgl[2] + 0;

        $tanggal = $setTanggal . ' ' . $arrayBulan[$arrayTgl[1]] . ' ' . $arrayTgl[0];
        return $tanggal;
    } 
   
}
?>