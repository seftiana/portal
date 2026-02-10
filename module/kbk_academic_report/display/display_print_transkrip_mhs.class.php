<?php
/*
Author : Nikolius
Email : n1colius.lau@gmail.com
Date : 10/24/2012 9:03:52 AM
*/
class DisplayPrintTranskripMhs extends DisplayBasePrint {
   var $mMahasiswaNiu;
   var $mMahasiswaProdiId;
   var $mOpsi;
   var $objUserService;
   var $objAcademicReport;
   
   function DisplayPrintTranskripMhs(&$configObject, &$security, $mhsniu, $prodiId, $opsi) {
      DisplayBasePrint::DisplayBasePrint ($configObject, $security, true);
      $this->mMahasiswaProdiId = $prodiId;
      $this->mMahasiswaNiu = $mhsniu;
      $this->mOpsi = $opsi;

      $this->objUserService = new UserClientService($this->mrUserSession->GetProperty("ServerServiceAddress"), false, $mhsniu);
      $this->objAcademicReport = new AcademicReportClientService($this->mrUserSession->GetProperty("ServerServiceAddress"),false, $mhsniu, $prodiId);


      $this->SetTemplateBasedir($configObject->GetValue('app_module') . 'academic_report/templates/');
      $this->SetTemplateFile('print_transkrip_mhs.html');
   }

   function Display(){      
      DisplayBasePrint::Display("Cetak Transkrip Nilai");
      $this->AddVar("document","BREAK","nobreak");

      $dataUser = $this->GetDataMahasiswa();
      if ($dataUser !== false) {
         //data
         $refObj = new Reference($this->mrConfig);
         $fak = $refObj->GetFakultasByProdi($this->mrUserSession->GetProperty('UserProdiId'));

         $tglLahir = $dataUser[0]['mhsTanggalLahirTranskrip'];
         if(empty($tglLahir)){
            $tglLahir = $dataUser[0]['mhsTanggalLahir'];
         }
         if($tglLahir == '0000-00-00') $tglLahir = '';
         $tglLahir = $this->displayTanggal($tglLahir);

         $tgl_lulus = $dataUser[0]['mhsTanggalLulus'];
         if (!empty($tgl_lulus) && '0000-00-00' != $tgl_lulus)
            $tgl_lulus = $this->displayTanggal($dataUser[0]['mhsTanggalLulus']);

         $tglWisuda = $this->displayTanggal($dataUser[0]['mhsWsdTanggal']);

         $lama_studi = $dataUser[0]['mhsLamaStudiBulan'];
         $tahun = floor($lama_studi / 12);
         $bulan = $lama_studi % 12;
         if($tahun == "") $tahun = 0;
         if($bulan == "") $bulan = 0;

         $dataNilai = $this->objAcademicReport->getDataNilaiTranskripMhs($this->mMahasiswaNiu);         

         //kop
         $this->AddVar('kop','UNIVERSITY_NAME',$_SESSION['identitas']['pt_nama']);         
         $this->AddVar('kop','UNIVERSITY_LOGO','images/logo.jpg');         
         $this->AddVar('kop','FACULTY_NAME', $fak[0]['Nama']);
         if($this->mOpsi == 'mm'){            
            $this->AddVar("kop_mm","IS_MM","1");
            $this->AddVar("kop_mm","PRODI_NAMA",strtoupper($dataUser[0]['mhsProdiNama']));

            $labelOpsi = 'BIDANG KONSENTRASI';
         }else{
            $labelOpsi = 'BIDANG KAJIAN UTAMA';
         }

         //data_judul
         $this->AddVar('data_judul','TRANSKRIP_NO',$dataUser[0]['mhsNomorTranskrip']);
         $this->AddVar('data_judul','MHS_NAMA',$dataUser[0]['mhsNama']);
         $this->AddVar('data_judul','MHS_TEMPAT_LAHIR',strtoupper($dataUser[0]['mhsTempatLahirTranskrip']));
         $this->AddVar('data_judul','MHS_TANGGAL_LAHIR',strtoupper($tglLahir));
         $this->AddVar('data_judul','MHS_NIU',$dataUser[0]['mhsNiu']);
         $this->AddVar('data_judul','MHS_FAK_NAMA',strtoupper($fak[0]['Nama']));
         $this->AddVar('data_judul','MHS_PRODI_JENJANG',strtoupper($dataUser[0]['mhsProdiJenjang']));
         $this->AddVar('data_judul','MHS_PRODI_NAMA',strtoupper($dataUser[0]['mhsProdiNama']));
         $this->AddVar('data_judul','LABELNYA_KONSENTRASI',strtoupper($labelOpsi));
         $this->AddVar('data_judul','MHS_KONSENTRASI',strtoupper($dataUser[0]['mhsKonsentrasi']));
         $this->AddVar('data_judul','MHS_TANGGAL_LULUS',strtoupper($tgl_lulus));
         $this->AddVar('data_judul','MHS_TANGGAL_WISUDA',strtoupper($tglWisuda));
         $this->AddVar('data_judul','MHS_TAHUN_STUDI',$tahun);
         $this->AddVar('data_judul','MHS_BULAN_STUDI',$bulan);

         //data list
         $totBobot = 0;
         $totSks = 0;
         $jumlahData = count($dataNilai);
         if($dataNilai[0]['KODE'] != ''){

            //cek apakah data list kiri ditampilkan
            if(count($dataNilai) > 14){
               $this->AddVar("is_data_list_kanan","SHOW","1");
            }

            for ($i=0; $i < count($dataNilai); $i++) { 
               $no = $i+1;

               //hitung total
               $totBobot += $dataNilai[$i]['BOBOT'];
               $totSks += $dataNilai[$i]['SKS'];

               if($no > 14){
                  $this->AddVar("data_list_kanan","NO",$no);
                  $this->AddVar("data_list_kanan","MK_KODE",$dataNilai[$i]['KODE']);
                  $this->AddVar("data_list_kanan","MK_NAMA",$dataNilai[$i]['NAMA']);              
                  $this->AddVar("data_list_kanan","MK_SKS",$dataNilai[$i]['SKS']);              
                  $this->AddVar("data_list_kanan","MK_NILAI",$dataNilai[$i]['NILAI']);              
                  $this->AddVar("data_list_kanan","MK_BOBOT",$dataNilai[$i]['BOBOT_KELOMPOK']);
                  $this->AddVar("data_list_kanan","MK_SKS_BOBOT",$dataNilai[$i]['BOBOT']);
                  $this->ParseTemplate("data_list_kanan", 'a');    
               }else{
                  $this->AddVar("data_list","NO",$no);
                  $this->AddVar("data_list","MK_KODE",$dataNilai[$i]['KODE']);
                  $this->AddVar("data_list","MK_NAMA",$dataNilai[$i]['NAMA']);              
                  $this->AddVar("data_list","MK_SKS",$dataNilai[$i]['SKS']);              
                  $this->AddVar("data_list","MK_NILAI",$dataNilai[$i]['NILAI']);              
                  $this->AddVar("data_list","MK_BOBOT",$dataNilai[$i]['BOBOT_KELOMPOK']);
                  $this->AddVar("data_list","MK_SKS_BOBOT",$dataNilai[$i]['BOBOT']);
                  $this->ParseTemplate("data_list", 'a');
               }  
            }
         }

         //data_total
         $this->AddVar("data_total","TOT_SKS",$totSks);
         $this->AddVar("data_total","TOT_SKS_BOBOT",$totBobot);

         //data keterangan
         $angkaBagi = $totBobot."/".$totSks;         
         $ip = $dataUser[0]['mhsIpkTranskrip'];
         $ipKalimat = $this->formatIpkKalimat($ip);
         $resPredikatLulus = $this->objAcademicReport->getPredikatLulus($this->mMahasiswaNiu);
         $predikat = ucwords(strtolower($resPredikatLulus[0]['PREDIKAT_NAMA']));

         //menentukan apakah tesis, disertasi, atau ta
         switch ($dataUser[0]['mhsProdiJenjang']) {
           case 'S3':
             //$resDisertasi = $qw->sqlExecute($sql['get_data_disertasi'],array($mhsNiu));
             $resTA = $this->objAcademicReport->getDataTA($this->mMahasiswaNiu,$dataUser[0]['mhsProdiJenjang']);
             $taTipe = 'Disertasi';             
           break;

           case 'S2':
             $resTA = $this->objAcademicReport->getDataTA($this->mMahasiswaNiu,$dataUser[0]['mhsProdiJenjang']);
             $taTipe = 'Tesis';             
           break;

           default:
             //S1 dll
             $resTA = $this->objAcademicReport->getDataTA($this->mMahasiswaNiu,$dataUser[0]['mhsProdiJenjang']);
             $taTipe = 'Skripsi';             
           break;
         }
         
         $this->AddVar("data_keterangan","ANGKA_BAGI",$angkaBagi);
         $this->AddVar("data_keterangan","IP_ANGKA",$ip);                  
         $this->AddVar("data_keterangan","IP_KALIMAT",$ipKalimat);                  
         $this->AddVar("data_keterangan","PREDIKAT_LULUS",$predikat);                  
         $this->AddVar("data_keterangan","TA_TIPE",strtoupper($taTipe));
         $this->AddVar("data_keterangan","TA_JUDUL",$resTA[0]['JUDUL']);
         $this->AddVar("data_keterangan","TA_DOSEN",$resTA[0]['DOSEN']);

         //data tanda tangan
         $dokumen = "Transkrip";         
         $dokumenTipe = "Mengetahui";
         $tglCetak = $this->tanggalBulanTahunIndo(date("Y-m-d"));         
         $lokasiTgl = strtoupper($this->mrConfig->GetValue('app_client_location')).", ".$tglCetak;

         $urutan = 1;
         $getTtd1 = $this->objAcademicReport->getTandaTangan($dokumen,$dokumenTipe,$urutan,$this->mMahasiswaProdiId);         
         $urutan = 2;
         $getTtd2 = $this->objAcademicReport->getTandaTangan($dokumen,$dokumenTipe,$urutan);

         $this->AddVar("tanda_tangan","JABATAN",strtoupper($getTtd1[0]['JABATAN']));
         $this->AddVar("tanda_tangan","PRODI_NAMA",strtoupper($dataUser[0]['mhsProdiNama']));
         $this->AddVar("tanda_tangan","NAMA",$getTtd1[0]['NAMA']);
         $this->AddVar("tanda_tangan","NIP",$getTtd1[0]['NIP']);
         $this->AddVar("tanda_tangan","TANGGAL_CETAK",strtoupper($lokasiTgl));
         $this->AddVar("tanda_tangan","JABATAN_2",strtoupper($getTtd2[0]['JABATAN']));
         $this->AddVar("tanda_tangan","NAMA_2",$getTtd2[0]['NAMA']);
         $this->AddVar("tanda_tangan","NIP_2",$getTtd2[0]['NIP']);
      }



      $this->DisplayTemplate();
   }

   function GetDataMahasiswa() {      
      if (!$this->objUserService->IsError()) {
         $this->objUserService->SetProperty("UserRole", 1 );
         $dataUser = $this->objUserService->GetUserInfo(4);         
         $this->DoUpdateServiceStatus($this->objUserService, $dataUser, 'SIA');
         if (false === $dataUser){
            return false;
         } else {
            return $dataUser;
         }
      }
   }

   function displayTanggal($tgl="now"){       
      if ($tgl == "now"){
         $tgl = date("Y-m-d");
      }
      $arrayBulan = array("01" => "Januari", "02" => "Februari", "03" => "Maret", "04" => "April", "05" => "Mei",
                     "06" => "Juni", "07" => "Juli", "08" => "Agustus", "09" => "September", "10" => "Oktober",
                     "11" => "Nopember", "12" => "Desember");
      $arrayTgl = explode("-", $tgl);
      $setTanggal = $arrayTgl[2] + 0;      
      $tanggal = $setTanggal . ' '  . $arrayBulan[$arrayTgl[1]] . ' ' . $arrayTgl[0];  
              
      return $tanggal;
   }

   function formatIpkKalimat($ipk){      
      $arrLibAngka = array(
         0 => "nol",
         1 => "satu",      
         2 => "dua",      
         3 => "tiga",      
         4 => "empat",      
         5 => "lima",      
         6 => "enam",      
         7 => "tujuh",      
         8 => "delapan",      
         9 => "sembilan",      
      );
      
      //pisahkan tiap karakter huruf
      $kar1 = $ipk[0];
      $kar2 = $ipk[1];
      $kar3 = $ipk[2];
      $kar4 = $ipk[3];
      
      //kata 1
      $kata1 = $arrLibAngka[$kar1]." koma ";
      
      //kata 3
      $kata3 = $arrLibAngka[$kar3];
      if($kata3 != "nol"){
         $kata3 = $kata3." puluh";
      }
      
      //kata 4
      $kata4 = $arrLibAngka[$kar4]; 
      
      return $kata1.$kata3." ".$kata4;
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