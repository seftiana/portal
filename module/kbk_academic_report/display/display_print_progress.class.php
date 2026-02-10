<?php
class DisplayPrintProgress extends DisplayBasePrint {
   var $mMahasiswaNiu;
   var $mMahasiswaProdiId;
   
   function DisplayPrintProgress(&$configObject, &$security, $mhsniu, $prodiId) {
      DisplayBasePrint::DisplayBasePrint ($configObject, $security, true);
      $this->mMahasiswaProdiId = $prodiId;
      $this->mMahasiswaNiu = $mhsniu;
      $this->SetTemplateBasedir($configObject->GetValue('app_module') . 'academic_report/templates/');
      $this->SetTemplateFile('print_progress.html');
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
   
   function GetInfoTotal($dataKkm, $daftarNilai, &$total_nilai_mutu, &$total_sks) {
      $total_nilai_mutu = 0;
      foreach($dataKkm as $kkm) {
         foreach($daftarNilai as $key=>$value) {
            if ($value['NILAI_H'] == $kkm['NILAI_H']) {
               $total_nilai_mutu += $kkm['KREDIT'] * $value['NILAI_A'];
               $total_sks += $kkm['KREDIT'];
            }
         }
      }   
   }
   
   function displayTanggal($tgl="now" , $showLocation="true", $location="default"){	
	  global $config_obj;
	  global $page;
	  if ($tgl == "now") $tgl = date("Y-m-d");
	  $arrayBulan = array("01" => "Januari", "02" => "Februari", "03" => "Maret", "04" => "April", "05" => "Mei",
						"06" => "Juni", "07" => "Juli", "08" => "Agustus", "09" => "September", "10" => "Oktober",
						"11" => "Nopember", "12" => "Desember");
	  $arrayTgl = explode("-", $tgl);
	  $setTanggal = $arrayTgl[2] + 0;
   $tanggal = $setTanggal . ' '  . $arrayBulan[$arrayTgl[1]] . ' ' . $arrayTgl[0];	
	return $tanggal;
}  
   
   function Display() {
      DisplayBasePrint::Display("Cetak kkm");
	   $rootServer = dirname($this->mrUserSession->GetProperty('ServerServiceAddress'));
	   $rootServer = str_replace("/index.service.php","",$rootServer);
	   $rootServer = str_replace("portal_services","",$rootServer);
	   $fileFoto = $rootServer.'images/'.$_SESSION['identitas']['pt_logo'];	   	  
	$this->mTemplate->addVar("document","UNIV_NAMA", $_SESSION['identitas']['pt_nama']);
	$this->mTemplate->addVar("document","UNIV_LOGO", $fileFoto);
	$this->mTemplate->addVar("document","UNIV_ALAMAT", $_SESSION['identitas']['pt_alamat']);
      $dataUser = $this->GetProfilMahasiswa();
      if (false !== $dataUser) {
         $cnt = array();
         $dataUser[0]['tanggal_lahir'] = $this->IndonesianDate($dataUser[0]['tanggal_lahir']);
         $dataUser[0]['tanggal_terdaftar'] = $this->IndonesianDate($dataUser[0]['tanggal_terdaftar']);
         $cnt[0]['nama_fakultas'] = '';
		 $cnt[0]['alamat_fakultas'] = '';
         $cnt[0]['lamastudi_tahun'] = floor($dataUser[0]['lama_studi_bulan'] / 12); 
         $cnt[0]['lamastudi_bulan'] = $dataUser[0]['lama_studi_bulan'] % 12; 
         $objAcademicReport = new AcademicReportClientService($this->mrUserSession->GetProperty("ServerServiceAddress"), false, $this->mMahasiswaNiu, $this->mMahasiswaProdiId);
         $dataKkm = $objAcademicReport->GetAllKkmItemForMahasiswa();
         // masukkan informasi mahasiswa
         $param['mhs'] = array (
                           'NAMA' => $dataUser[0]['fullname'],
                           'TEMPAT_LAHIR' => $dataUser[0]['tempat_lahir'],
                           'TGL_LAHIR' => $dataUser[0]['tanggal_lahir'],
                           'NIM' => $dataUser[0]['mhsNiu'],
                           'MHS_ANGKATAN' => $dataUser[0]['angkatan'],
                           'FAKULTAS' => $dataUser[0]['fakultas'],
                           'PRODI' => $dataUser[0]['info']
         );
         $this->mTemplate->addVars('data_mahasiswa',$param['mhs']);
         $this->mTemplate->parseTemplate('data_mahasiswa','a');
         $no=1;
         $jumlah_kkm = 0;
         for($x=0;$x<count($dataKkm);$x++) {
             $dataKkm[$x]['no']=$no;
             if($dataKkm[$x]['NILAI_A'] != ''){
             $dataKkm[$x]['mutu'] = $dataKkm[$x]['NILAI_A']*$dataKkm[$x]['KREDIT'];
             $jumlah_kkm += $dataKkm[$x]['mutu'];
			 $sks_kkm += $dataKkm[$x]['KREDIT'];
			 } else {
			 $dataKkm[$x]['mutu'] = '';
			 }
             $no++;
         }
         // hitung data untuk setiap halamannya
         $jumlahData = count($dataKkm);
         $dataPerPage = array (
            'first' => 24,
            'middle' => 40,
            'last' => 24	
         );
         if ($jumlahData <= $dataPerPage['first']) {
             $jumlahHalaman = 1;
         } else {
             // hitung berdasarkan first sama middle
             if ($jumlahData <= ($dataPerPage['first']+$dataPerPage['last'])) {
                  // cuma dua halaman
                  $jumlahHalaman = 2;   
             } else {
                  // kurangi dengan dua halaman terakhir
                  $dataSisa = $jumlahData  - ($dataPerPage['first']+$dataPerPage['last']);
                  $jumlahHalaman = 2 + ceil($dataSisa/$dataPerPage['middle']);
             }
         }                 
         // pisah data kkm menjadi bagian-bagian per halamannya
         if ($jumlahHalaman == 1) {  
            $nox =0;               
            $this->mTemplate->addVar("data","KODE_MATAKULIAH","default");
            for($ix=0;$ix<$jumlahData;$ix++) {
                $nox++;
                  $this->mTemplate->clearTemplate('data');
                  $this->ParseData('data', $dataKkm[$ix],'');     
                  $this->mTemplate->parseTemplate('page');
            }
            // tampilkan prestasi akademik
            if (!empty($dataKkm)) {
                $this->mTemplate->setAttribute("prestasi_akademik","visibility","visible");
                $this->mTemplate->addVar("prestasi_akademik","IPK",$dataUser[0]['ipk_transkrip']);
                $this->mTemplate->addVar("prestasi_akademik","JUMLAH_SKS",$sks_kkm);
                $this->mTemplate->addVar("prestasi_akademik","BOBOT",$jumlah_kkm);
                $this->mTemplate->parseTemplate("prestasi_akademik",'a');
             }
                  // data pengesah
                  $tanggal = $this->displayTanggal();
                  $tanggal = $_SESSION['identitas']['pt_alamat'].', '.$tanggal;
				  $tanggal_print = $_SESSION['identitas']."".$tanggal;
                  $this->mTemplate->addGlobalVar("JABATAN_SAH",'Dekan');
                  $this->mTemplate->addGlobalVar("NAMA_SAH",$dataUser[0]['pejabat']);
                  $this->mTemplate->addGlobalVar("NIP_SAH",$dataUser[0]['nip']);
            	  $this->mTemplate->parseTemplate('page');   
         } elseif ($jumlahHalaman == 2) { 
            $dataBuffer = null;
            $nox =0;               
            $this->mTemplate->addVar("data","KODE_MATAKULIAH","default");
            for($ix=0;$ix<$jumlahData;$ix++) {
                $dataBuffer[$nox] = $dataKkm[$ix];
                $nox++;
                  $this->ParseData('data', $dataBuffer,'');  
                if ($ix == ($dataPerPage['first']-1)) {
                  //$this->mTemplate->clearTemplate('data');
                  //$this->ParseData('data', $dataBuffer,'');     
                  $this->mTemplate->parseTemplate('page');
                  $dataBuffer = null;                  
                }  
                  $dataBuffer = null;   
            }
                  $this->mTemplate->addVar("info_table","IS_SHOW",true);
                  $this->mTemplate->addVar("info_table","MHS_NAMA",$dataUser[0]['fullname']);
                  $this->mTemplate->addVar("info_table","MHS_NIM",$dataUser[0]['mhsNiu']); 
                  // tampilkan prestasi akademik
                  if (!empty($dataKkm)) {
                     $this->mTemplate->setAttribute("prestasi_akademik","visibility","visible");
                 $this->mTemplate->addVar("prestasi_akademik","IPK",$dataUser[0]['ipk_transkrip']);   
                     $this->mTemplate->addVar("prestasi_akademik","JUMLAH_SKS",$sks_kkm);
                     $this->mTemplate->addVar("prestasi_akademik","BOBOT",$jumlah_kkm);
                     $this->mTemplate->parseTemplate("prestasi_akademik");
                  }                  
                  // data pengesah
                  $tanggal1 = $this->displayTanggal();
                  $tanggal = $_SESSION['identitas']['pt_alamat'].', '.$tanggal1;
                   $this->mTemplate->addGlobalVar("TANGGAL_PRINT",$tanggal1);
                  $this->mTemplate->addGlobalVar("TANGGAL_CETAK",$tanggal);
                  $this->mTemplate->addGlobalVar("JABATAN_SAH",'Dekan');
                  $this->mTemplate->addGlobalVar("NAMA_SAH",$dataUser[0]['pejabat']);
                  $this->mTemplate->addGlobalVar("NIP_SAH",$dataUser[0]['nip']);         
                  $this->mTemplate->parseTemplate('page','a'); 
         } else {
               // ambil data untuk halaman pertama               
               for($ix=0;$ix<$dataPerPage['first'];$ix++) {
                   $this->mTemplate->addVars('data',$dataKkm[$ix]);
                   $this->mTemplate->parseTemplate("data",'a');
               }
               $this->mTemplate->parseTemplate('page');
               $start = $dataPerPage['first'];
               $jumlah_halaman_up = $jumlahHalaman - 2;
               // ambil data untuk halaman selainnya
               for($ix=0;$ix<$jumlah_halaman_up;$ix++) {
                   for($iy=0;$iy<$dataPerPage['middle'];$iy++) {
                     $this->mTemplate->addVars('data',$dataKkm[$start]);
                     $this->mTemplate->parseTemplate("data",'a');           
                     $start++;              
                   }
                  $this->mTemplate->parseTemplate('page','a');        
				  if($start<$jumlahData)$this->mTemplate->clearTemplate('data');       
               }  
               
               // ambil data untuk halaman terakhir
			   if($start<$jumlahData){
               for ($ix=$start;$ix<$jumlahData;$ix++) {
                     $this->mTemplate->addVars('data',$dataKkm[$ix]);
                     $this->mTemplate->parseTemplate("data",'a');                   
               }}
                  // tampilkan prestasi akademik
                  if (!empty($dataKkm)) {
                     $this->mTemplate->setAttribute("prestasi_akademik","visibility","visible");
                     $this->mTemplate->addVar("prestasi_akademik","IPK",$dataUser[0]['ipk_transkrip']);
                     $this->mTemplate->addVar("prestasi_akademik","JUMLAH_SKS",$sks_kkm);
                     $this->mTemplate->addVar("prestasi_akademik","BOBOT",$jumlah_kkm);
                     $this->mTemplate->parseTemplate("prestasi_akademik",'a');
                  }
                  // data pengesah
                  $tanggal = $this->displayTanggal();
                  $tanggal_tempat = $_SESSION['identitas']['pt_alamat'].', '.$tanggal;
                  
                  $this->mTemplate->addGlobalVar("TANGGAL_CETAK",$tanggal_tempat);
				  $this->mTemplate->addGlobalVar("TANGGAL_PRINT",$tanggal);
				  
                  $this->mTemplate->addGlobalVar("JABATAN_SAH",'Dekan');
                  $this->mTemplate->addGlobalVar("NAMA_SAH",$dataUser[0]['pejabat']);
                  $this->mTemplate->addGlobalVar("NIP_SAH",$dataUser[0]['nip']);
         
                  $this->mTemplate->parseTemplate('page','a');    
         }         
         $this->DisplayTemplate();       
      }
   } 
}
?>