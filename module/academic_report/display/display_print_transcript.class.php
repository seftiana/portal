<?php
/**
 * DisplayPrintTranscript
 * DisplayPrintTranscript class
 * 
 * @package communication 
 * @author Maya Alipin 
 * @copyright Copyright (c) 2006 GamaTechno
 * @version 1.0 
 * @date 2006-04-21
 * @revision 
 *
 */

class DisplayPrintTranscript extends DisplayBasePrint {
   var $mMahasiswaNiu;
   var $mMahasiswaProdiId;
   
   function DisplayPrintTranscript(&$configObject, &$security, $mhsniu, $prodiId) {
      DisplayBasePrint::DisplayBasePrint ($configObject, $security, true);
      $this->mMahasiswaProdiId = $prodiId;
      $this->mMahasiswaNiu = $mhsniu;
      $this->SetTemplateBasedir($configObject->GetValue('app_module') . 'academic_report/templates/');
      $this->SetTemplateFile('print_transcript.html');
	  $this->lokasi = $configObject->GetValue('app_client_location');
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
   
   function CalculateNilaiMutu ($transkripNilai, $daftarNilai) {
      if (!empty($daftarNilai))
      foreach($daftarNilai as $key=>$value) {
         if ($value['nilai'] == $transkripNilai['nilai']) {
            $nilaiMutu = $transkripNilai['sks_jumlah'] * $value['bobot'];
            return $nilaiMutu;
         }
      }
   }
   
   function GetInfoTotal($dataTranscript, $daftarNilai, &$total_nilai_mutu, &$total_sks) {
      $total_nilai_mutu = 0;
      foreach($dataTranscript as $transkrip) {
         if (!empty($daftarNilai))
         foreach($daftarNilai as $key=>$value) {
            if ($value['nilai'] == $transkrip['nilai']) {
               $total_nilai_mutu += $transkrip['sks_jumlah'] * $value['bobot'];
               $total_sks += $transkrip['sks_jumlah'];
            }
         }
      }   
   }
   
   function ParseTranscriptData($dataTranscript, &$nilai_d, &$objAcademicReport, $ipk, $predikat) {
      $lenData = sizeof($dataTranscript);
      $half = ceil(($lenData + 8) / 2);

      $daftarNilai = $objAcademicReport->GetAllPilihanNilai();
	 

	  
      $transkrip = array();
      $total_nilai_mutu  = 0;
      $total_sks  = 0;
      $this->GetInfoTotal($dataTranscript, $daftarNilai, $total_nilai_mutu, $total_sks);
      $loop = 1;
      for ($i=0; $i<$half; $i++) {
         $transkrip[$i]["number"] = $i+1;
         $transkrip[$i]["matakuliah"] = $dataTranscript[$i]['matakuliah'];
         $transkrip[$i]["sks"] = $dataTranscript[$i]['sks_jumlah'];
         $transkrip[$i]["nilai_huruf"] = $dataTranscript[$i]['nilai'];
         $transkrip[$i]["nilai_mutu"] = $this->CalculateNilaiMutu($dataTranscript[$i], $daftarNilai);
         
         if ($dataTranscript[$i]['nilai'] == 'D') {
            $nilai_d+= $dataTranscript[$i]['sks_jumlah'];
         }
         
         if (($i+1) == $half ) {
            $transkrip[$i]["style"] = 'LASTDATA';
         } else if (($i+$half) >= $lenData) {
            if ($loop == 1) {
               $transkrip[$i]["style"] = 'DATA';
               $transkrip[$i]["number2"] = "&nbsp;";
               $transkrip[$i]["matakuliah2"] = "&nbsp;";
               $transkrip[$i]["sks2"] = "&nbsp;";
               $transkrip[$i]["nilai_huruf2"] ="&nbsp;";
               $transkrip[$i]["nilai_mutu2"] = "&nbsp;";
            } else if ($loop == 2 ){
               $transkrip[$i]["style"] = 'KOLOMJUMLAHATAS';
            } else if ($loop == 3 ){
               $transkrip[$i]["style"] = 'KOLOMJUMLAHISI';
               $transkrip[$i]['jml_sks'] = $total_sks;
               $transkrip[$i]['jml_nilai'] =$total_nilai_mutu;
            } else if ($loop == 4 ){
               $transkrip[$i]["style"] = 'KOLOMJUMLAHBAWAH';
            } else if ($loop == 5 ){
               $transkrip[$i]["style"] = 'INDEXPRESTASIATAS';
            } else if ($loop == 6 || $loop == 7 ){
               $transkrip[$i]["style"] = 'INDEXPRESTASI';
               if ($loop == 6){
                  $transkrip[$i]['keterangan_index'] = 'Indeks Prestasi';
                  $transkrip[$i]['nilai_index'] =$ipk;
               } else if ($loop == 7) {
                  $transkrip[$i]['keterangan_index'] = 'Predikat Lulus';
                  $transkrip[$i]['nilai_index'] =$predikat;
               }
            }else {
               $transkrip[$i]["style"] = 'INDEXPRESTASIBLANK';
            }
            $loop++;
         } else {
            $transkrip[$i]["style"] = 'DATA';
            $transkrip[$i]["number2"] = $half+$i+1;
            $transkrip[$i]["matakuliah2"] = $dataTranscript[($half+$i)]['matakuliah'];
            $transkrip[$i]["sks2"] = $dataTranscript[($half+$i)]['sks_jumlah'];
            $transkrip[$i]["nilai_huruf2"] = $dataTranscript[($half+$i)]['nilai'];
            $transkrip[$i]["nilai_mutu2"] = $this->CalculateNilaiMutu($dataTranscript[($half+$i)], $daftarNilai);
            if ($dataTranscript[($half+$i)]['nilai'] == 'D') {
               $nilai_d+= $dataTranscript[($half+$i)]['sks_jumlah'];
            }
            
         }
      }
      $this->ParseData('transcript_item', $transkrip, 'TR_');
   }
   
   function displayTanggal($tgl="now" , $showLocation="true", $location="default"){	
	  global $config_obj;
	  global $page;

	  if ($tgl == "now"){
	     $tgl = date("Y-m-d");
	  }
	  $arrayBulan = array("01" => "Januari", "02" => "Februari", "03" => "Maret", "04" => "April", "05" => "Mei",
						"06" => "Juni", "07" => "Juli", "08" => "Agustus", "09" => "September", "10" => "Oktober",
						"11" => "Nopember", "12" => "Desember");
	  $arrayTgl = explode("-", $tgl);
	  $setTanggal = $arrayTgl[2] + 0;
	  
	  /*
	  if ($showLocation=="true"){
		if ($location == "default"){
		   $tanggal = $config_obj->GetValue('location') . ', ' . $setTanggal . ' '  . $arrayBulan[$arrayTgl[1]] . ' ' . $arrayTgl[0];
		}else 
		   $tanggal = $location.', '.$setTanggal . ' '  . $arrayBulan[$arrayTgl[1]] . ' ' . $arrayTgl[0];
	}else{
		$tanggal = $setTanggal . ' '  . $arrayBulan[$arrayTgl[1]] . ' ' . $arrayTgl[0];	
	}	
	*/
   $tanggal = $setTanggal . ' '  . $arrayBulan[$arrayTgl[1]] . ' ' . $arrayTgl[0];	
	//echo $tanggal;
	return $tanggal;
}  
   
   function Display() {
   //print("check Point 1");
      DisplayBasePrint::Display("Cetak Transkrip");
	  
	   $rootServer = dirname($this->mrUserSession->GetProperty('ServerServiceAddress'));
	   $rootServer = str_replace("/index.service.php","",$rootServer);
	   $rootServer = str_replace("portal_services","",$rootServer);
	   $fileFoto = $rootServer.'images/'.$_SESSION['identitas']['pt_logo'];
	   	  
      // cek apakah service sia is available
	$this->mTemplate->addVar("document","UNIV_NAMA", strtoupper($_SESSION['identitas']['pt_nama']));
	$this->mTemplate->addVar("document","UNIV_LOGO", $fileFoto);
	$this->mTemplate->addVar("document","UNIV_ALAMAT", $_SESSION['identitas']['pt_alamat']);
	$this->mTemplate->addVar("document","JUDULKOP", "TRANSKRIP AKADEMIK SEMENTARA ANGKATAN");

   //print("check Point 2 ");
    $dataUser = $this->GetProfilMahasiswa();
	$this->mTemplate->addVar("document","UNIV_FAKULTAS", "FAKULTAS ".$dataUser[0]['fakultas']);
	$angkatan1 = $dataUser[0]['angkatan'];
	$angkatan2 = $angkatan1+1;
	$angkatanNama = $angkatan1."-".$angkatan2;
	$this->mTemplate->addVar("document","MHS_ANGKATAN", $angkatanNama);
	
      if (false !== $dataUser) {
         $cnt = array();
         $dataUser[0]['tanggal_lahir'] = $this->IndonesianDate($dataUser[0]['tanggal_lahir']);
         $dataUser[0]['tanggal_terdaftar'] = $this->IndonesianDate($dataUser[0]['tanggal_terdaftar']);
         $dataUser[0]['lulus_sarjana'] = $this->IndonesianDate($dataUser[0]['lulus_sarjana']);
         		  
         $cnt[0]['nama_fakultas'] = '';
		 $cnt[0]['alamat_fakultas'] = '';
         $cnt[0]['lamastudi_tahun'] = floor($dataUser[0]['lama_studi_bulan'] / 12); 
         $cnt[0]['lamastudi_bulan'] = $dataUser[0]['lama_studi_bulan'] % 12; 
         //$this->ParseData('mahasiswa', $dataUser, "MHS_");
         
         //print_r($dataUser);
               
         $objAcademicReport = new AcademicReportClientService($this->mrUserSession->GetProperty("ServerServiceAddress"), false, $this->mMahasiswaNiu, $this->mMahasiswaProdiId);
         $dataTranscript = $objAcademicReport->GetAllTranscriptItemForMahasiswa();
		 	#print_r($dataTranscript);
         
   //print("check Point 3");
         $nilai_d = 0;
         
         if  (!empty($dataTranscript)) {
            $this->ParseTranscriptData($dataTranscript, $nilai_d, $objAcademicReport, 
                     round($dataUser[0]['ipk_transkrip'],2), $dataUser[0]['predikat_nama']);
         } 
         
         
         $dataTa = $objAcademicReport->GetDataTaMahasiswa();
         #print_r($dataTa);
         $judul_skripsi = "";
         $dosenTa = '';
         if (!empty($dataTa)) {
            $judul_skripsi = $dataTa[0]['ta_judul'];
            $dosenTa = explode("|", $dataTa[0]['nama_dosen']);
            $dosenTa = $dosenTa[0];
         }  // print("check Point 4");
         /*
         $cnt[0]['nilai_d'] = $nilai_d;
         $cnt[0]['judul_skripsi'] = $judul_skripsi;
         $cnt[0]['pembimbing_akademis'] = $dataUser[0]['dosen_pa'];
         $cnt[0]['pembimbing_ta1'] = $dosenTa;
         $cnt[0]['kota_pengesahan'] = 'Yogyakarta';
         $cnt[0]['tanggal_pengesahan'] = $this->IndonesianDate(date('Y m d'));
         $cnt[0]['jabatan_pengesah'] = '';
         $cnt[0]['nama_pengesah'] = '........................................';
         $cnt[0]['nip_pengesah'] = '.................................';
         $this->ParseData('content', $cnt, 'CNT_');
         
         */
         // masukkan informasi mahasiswa
		$statusMhs = $dataUser[0]['status_mhs'];
		if($statusMhs == 'N'){
			$tgl_lulus = "Tidak Aktif";
		}else{
			$tgl_lulus = $dataUser[0]['lulus_sarjana'];
			if (!empty($tgl_lulus) && $tgl_lulus != 0){
				$tgl_lulus = $dataUser[0]['lulus_sarjana'];
			}else{
				$tgl_lulus = "Belum Lulus";
			}
		}
         $param['mhs'] = array (
                           'NAMA' => ucwords(strtolower($dataUser[0]['fullname'])),
                           'TEMPAT_LAHIR' => ucwords(strtolower($dataUser[0]['tempat_lahir'])),
                           'TGL_LAHIR' => $dataUser[0]['tanggal_lahir'],
                           'NIM' => $dataUser[0]['mhsNiu'],
                           'TANGGAL_LULUS' => $tgl_lulus,
                           'FAKULTAS' => ucwords(strtolower($dataUser[0]['fakultas'])),
						   'JURUSAN' => ucwords(strtolower($dataUser[0]['jurusan'])),
						   'JENJANG_KODE' => ucwords(strtolower($dataUser[0]['jenjang_kode'])),
						   'JENJANG' => ucwords(strtolower($dataUser[0]['jenjang'])),
                           'PRODI' => ucwords(strtolower($dataUser[0]['info'])),
                           'AKREDITASI_NOMOR' => $dataUser[0]['no_akr'],
                           'AKREDITASI_TANGGAL' => $dataUser[0]['tgl_akr'],
						   'IJASAH' => $dataUser[0]['ijasah']
         );
         
         $this->mTemplate->addVars('data_mahasiswa',$param['mhs']);
         $this->mTemplate->parseTemplate('data_mahasiswa','a');
		 
		 //new transkrip
			$ip = $dataUser[0]['ipk_transkrip'];
			$predikat = $dataUser[0]['predikat_nama'];
			$tanggal_cetak = $this->displayTanggal();
			
			$this->mTemplate->addGlobalVar("TANGGAL_CETAK", $this->lokasi.", ".$tanggal_cetak);
			
			if (isset($_POST['kertas']) && $_POST['kertas'] == 'a4')
				$batasPotong = 68;
			else
				$batasPotong = 80;
				
			$tmp = array();
			$jml_sks = 0;
			$jml_bobot = 0;
			$nilai_d = 0;

			if (!empty($dataTranscript)) {
				$row = 1;
				$no = 1;
				
				foreach ($dataTranscript as $item) {
					$tmp[$row]['NO'] = $no;
					$tmp[$row]['SKS'] = $item['sks_jumlah'];
					$tmp[$row]['NILAI'] = $item['nilai'];
					$tmp[$row]['BOBOT'] = round($item['bobot'], 2);
					$tmp[$row]['KODE'] = $item['kode_matakuliah'];
					$tmp[$row]['WAJIB'] = $item['WAJIB'];

					$jml_sks += $item['sks_jumlah'];
					$jml_nilai += $item['bobot'];

					// hitung nilai D
					if ('D' == strtoupper($item['nilai']))
						$nilai_d += $item['sks_jumlah'];

					$mk = $item['matakuliah'];
					$mk_wrap = wordwrap(ucwords(strtolower($mk)), 28, '|', 1);
					$mk_arr = explode('|', $mk_wrap);

					if (2 > sizeof($mk_arr)) {
						$tmp[$row]['MATKUL'] = $mk_arr[0];
						$row++;
					} else {
						for ($i = 0; $i < sizeof($mk_arr); $i++) {
							$tmp[$row]['MATKUL'] = $mk_arr[$i];
							$row++;
						}
					}
					$no++;
				}
			}
			
			//print_r($tmp);
			$jml_baris = sizeof($tmp);
			//echo "\n<br>jml_baris: ".$jml_baris;
			if (0 < $jml_baris) {
				$total_baris = $jml_baris; 
				$tmp_baris = ceil(($total_baris) / 2);
				
				// cek jika ada wrapping di perpindahan kolom
				$no_baris = $tmp[($tmp_baris + 1)]['NO'];
				//echo "\n<br>no baris: ".$no_baris;
				if (!isset($no_baris)) {
					while (!isset($no_baris) && $tmp_baris < $jml_baris) {
						$tmp_baris++;
						$total_baris++;
						$no_baris = $tmp[($tmp_baris)]['NO'];
					}
				}

				// bagi 3 kolom
				$baris = ceil($total_baris / 2);			
				
				//echo "\n<br>baris : ".$baris;
				for($i=0,$lastRow=$baris-1; $i<$baris; $i++) {
					$data['SHOW'] = 'default';
					$data['LEFT_SPAN'] = '';
					$data['RIGHT_SPAN'] = '';
					// $data['PALINGKANAN_SPAN'] = '';

					$left_no = $i + 1;
					$data['LEFT_NO'] = $tmp[$left_no]['NO'];
					$data['LEFT_KODE'] = $tmp[$left_no]['KODE'];
					$data['LEFT_MK'] = strtoupper($tmp[$left_no]['MATKUL']);
					$data['LEFT_SKS'] = $tmp[$left_no]['SKS'];
					$data['LEFT_NILAI'] = $tmp[$left_no]['NILAI'];
					$data['LEFT_BOBOT'] = $tmp[$left_no]['BOBOT'];
					$data['LEFT_WAJIB'] = $tmp[$left_no]['WAJIB'];
					$data['LEFT_SPAN'] = 'no-border';
					$data['LEFT_SPAN2'] = 'no-border';
					
					if (!empty($data['LEFT_NO'])) {
						$data['LEFT_SPAN'] = 'no-border';
						$data['LEFT_SPAN2'] = 'no-border';
					}

					$mid_no = $left_no+$baris;
					  if(isset($tmp[$mid_no])){
						  $data['MID_NO'] = $tmp[$mid_no]['NO'];
						  $data['MID_KODE'] = $tmp[$mid_no]['KODE'];
						  $data['MID_MK'] = strtoupper($tmp[$mid_no]['MATKUL']);
						  $data['MID_SKS'] = $tmp[$mid_no]['SKS'];
						  $data['MID_NILAI'] = $tmp[$mid_no]['NILAI'];
						  $data['MID_BOBOT'] = $tmp[$mid_no]['BOBOT'];
						  $data['MID_WAJIB'] = $tmp[$mid_no]['WAJIB'];
						  $data['MID_SPAN'] = 'no-border';
						  $data['MID_SPAN2'] = 'no-border';
						  if (!empty($data['MID_NO'])) {
							 $data['MID_SPAN'] = 'no-border';
							 $data['MID_SPAN2'] = 'no-border';
						  }
					   }else{
						  $data['MID_NO'] = $data['MID_KODE'] = $data['MID_MK'] = $data['MID_SKS'] = $data['MID_NILAI'] = $data['MID_BOBOT'] = $data['MID_WAJIB'] = $data['MID_SPAN'] = '';
						  $data['MID_SPAN'] = $data['LEFT_SPAN'];
					  }
					  /*
					  $right_no = $mid_no+$baris;
					  if(isset($tmp[$right_no])){
						  $data['RIGHT_NO'] = $tmp[$right_no]['NO'];
						  $data['RIGHT_KODE'] = $tmp[$right_no]['KODE'];
						  $data['RIGHT_MK'] = $tmp[$right_no]['MATKUL'];
						  $data['RIGHT_SKS'] = $tmp[$right_no]['SKS'];
						  $data['RIGHT_NILAI'] = $tmp[$right_no]['NILAI'];
						  $data['RIGHT_BOBOT'] = $tmp[$right_no]['BOBOT'];
						  $data['RIGHT_SPAN'] = 'no-top no-bottom';
						  if (!empty($data['RIGHT_NO'])) {
							 $data['RIGHT_SPAN'] = 'no-top no-bottom';
						  }
					  }else{
						  $data['RIGHT_NO'] = $data['RIGHT_KODE'] = $data['RIGHT_MK'] = $data['RIGHT_SKS'] = $data['RIGHT_NILAI'] = $data['RIGHT_BOBOT'] = $data['RIGHT_SPAN'] = '';
						  $data['RIGHT_SPAN'] = $data['LEFT_SPAN'];
					  }*/
					  if($i == $lastRow){
						$data['RIGHT_SPAN'] = $data['MID_SPAN'] = $data['LEFT_SPAN'] = str_replace('no-bottom', 'bottom', $data['LEFT_SPAN']);
						$data['LEFT_SPAN2'] = str_replace('no-bottom', 'bottom', $data['LEFT_SPAN2']);
						$data['MID_SPAN2'] = str_replace('no-bottom', 'bottom', $data['MID_SPAN2']);
					  }
					$this->mTemplate->addVars('transkrip', $data);
					$this->mTemplate->parseTemplate('transkrip', 'a');
				}		

				$this->mTemplate->addVar("judul_skripsi","JUDUL",$judul_skripsi);
				$this->mTemplate->addVar("prestasi_akademik","PREDIKAT_LULUS",$predikat);		
				$this->mTemplate->addVar("prestasi_akademik","SKS_KUMULATIF",$jml_sks);
			}
			
			$arrPjbNip = explode('|',$dataUser[0]['pjbNip']);
			$arrPjbNama = explode('|',$dataUser[0]['pjbNama']);
			$arrPjbJabatan = explode('|',$dataUser[0]['pjbJabatan']);
			if(!empty($arrPjbJabatan)){
				foreach($arrPjbJabatan as $key=>$value){
				   $this->addVar('pengesah_dekan','JABATAN_SAH', $value);
				   $this->addVar('pengesah_dekan','NAMA_SAH', $arrPjbNama[$key]);
				   $this->addVar('pengesah_dekan','NIP_SAH', $arrPjbNip[$key]);                       
				}
			}
		 
		 
		
           // print("check Point 5");
         // masukkan data transkrop
         // add number
         $no=1;
         
         $jumlah_transkrip = 0;
         //print_r($dataTranscript);
         for($x=0;$x<count($dataTranscript);$x++) {
             $dataTranscript[$x]['no']=$no;
             if (settype($dataTranscript[$x]['bobot'],'integer')) {
                 $dataTranscript[$x]['bobot'] = number_format($dataTranscript[$x]['bobot'],0); 
             }
             
             $dataTranscript[$x]['mutu'] = $dataTranscript[$x]['bobot']*$dataTranscript[$x]['sks_jumlah'];
              $jumlah_transkrip = $jumlah_transkrip + $dataTranscript[$x]['mutu'];
             $no++;
         }
          //  print("check Point 6");
         // hitung data untuk setiap halamannya
         $jumlahData = count($dataTranscript);
         $dataPerPage = array (
            'first' => 27,
            'middle' => 40,
            'last' => 27	
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
		 
         //$this->ParseData('data', $dataTranscript, 'DATA_');
         //   print("check Point 7");
                  
            
         // pisah data transkrip menjadi bagian-bagian per halamannya
         if ($jumlahHalaman == 1) {
             // langsung parsing aja

			$this->ParseData('data', $dataTranscript, ''); 
             //  print("check Point a");
            // masukkan data TA

//            $this->mTemplate->addVar("data","JUDUL",$judul_skripsi);
//            $this->mTemplate->parseTemplate("data",'a');
            
            // tampilkan prestasi akademik
            if (!empty($dataTranscript)) {
                $this->mTemplate->setAttribute("prestasi_akademik","visibility","visible");
                $this->mTemplate->addVar("prestasi_akademik","IPK",$dataUser[0]['ipk_transkrip']);
				$this->mTemplate->addVar("prestasi_akademik","IPK_TERBILANG",terbilang($dataUser[0]['ipk_transkrip']));
                $this->mTemplate->addVar("prestasi_akademik","JUMLAH_SKS",$dataUser[0]['sks_transkrip']);
                $this->mTemplate->addVar("prestasi_akademik","BOBOT",$jumlah_transkrip);
                $this->mTemplate->addVar("prestasi_akademik","PREDIKAT",$dataUser[0]['predikat_nama']);				
				$this->mTemplate->addVar("prestasi_akademik","IJASAH",$dataUser[0]['mhsNoIjasah']);
                $this->mTemplate->parseTemplate("prestasi_akademik1",'a');

             }
             
                  $arrPjbNip = explode('|',$dataUser[0]['pjbNip']);
                  $arrPjbNama = explode('|',$dataUser[0]['pjbNama']);
                  $arrPjbJabatan = explode('|',$dataUser[0]['pjbJabatan']);
                  if(!empty($arrPjbJabatan)){
                     foreach($arrPjbJabatan as $key=>$value){
                        //echo strtolower($value);
//                        if(strpos(strtolower($value),'rektor') !== false){//echo 'here';
//                           $this->addVar('pengesah_rektor','JABATAN_SAH', $value);
//                           $this->addVar('pengesah_rektor','NAMA_SAH', $arrPjbNama[$key]);
//                           $this->addVar('pengesah_rektor','NIP_SAH', $arrPjbNip[$key]);
                           //$this->mTemplate->parseTemplate('pengesah_rektor','a');
//                        }//else
//                        if(strpos(strtolower($value),'dekan') !== false){
                           $this->addVar('pengesah_dekan','JABATAN_SAH', $value);
                           $this->addVar('pengesah_dekan','NAMA_SAH', $arrPjbNama[$key]);
                           $this->addVar('pengesah_dekan','NIP_SAH', $arrPjbNip[$key]);
                           //$this->mTemplate->parseTemplate('pengesah_dekan','a');
//                        }
                        
                     }
                  }
                  // data pengesah
                  $tanggal = $this->displayTanggal();
                  $tanggal = $_SESSION['identitas']['pt_alamat'].', '.$tanggal;
				  $tanggal_print = $_SESSION['identitas']."".$tanggal;
                  
                
                  //$this->mTemplate->addGlobalVar("JABATAN_SAH",'Dekan');
                  //$this->mTemplate->addGlobalVar("NAMA_SAH",$dataUser[0]['pejabat']);
                  //$this->mTemplate->addGlobalVar("NIP_SAH",$dataUser[0]['nip']);
                      
            	  $this->mTemplate->parseTemplate('page');   
			
			      
         } elseif ($jumlahHalaman == 2) {
         
            //print("check Point b");
            $dataBuffer = null;
            $nox =0; 
            /*
            $this->mTemplate->addVar("data","KODE_MATAKULIAH","default");
            for($ix=0;$ix<$jumlahData;$ix++) {
                $dataBuffer[$nox] = $dataTranscript[$ix];
                $nox++;
                if ($ix == $dataPerPage['first']+2) {
                  $this->mTemplate->clearTemplate('data');
                  $this->ParseData('data', $dataBuffer,'');     
                  $this->mTemplate->parseTemplate('page');
                  $dataBuffer = null;                  
                }  
            }
            */     
				foreach($dataTranscript as $key=>$data) {
               //print_r($data);
               if ($key == $dataPerPage['first']) {
                  $this->mTemplate->parseTemplate('page','a'); 
                  $this->mTemplate->clearTemplate('data');
               }  

               $this->mTemplate->addVar("data","KODE_MATAKULIAH",$data['kode_matakuliah']);
               $this->mTemplate->addVar("data","NO",$data['no']);
               $this->mTemplate->addVar("data","TIPE",$data['TIPE']);
               $this->mTemplate->addVar("data","MATAKULIAH",$data['matakuliah']);
               $this->mTemplate->addVar("data","SKS_JUMLAH",$data['sks_jumlah']);
               $this->mTemplate->addVar("data","NILAI",$data['nilai']);
               $this->mTemplate->addVar("data","BOBOT",$data['bobot']);
               $this->mTemplate->addVar("data","MUTU",$data['mutu']);
               $this->mTemplate->parseTemplate('data','a'); 
            }
				
                  $this->mTemplate->addVar("info_table","IS_SHOW",true);
                  $this->mTemplate->addVar("info_table","MHS_NAMA",$dataUser[0]['fullname']);
                  $this->mTemplate->addVar("info_table","MHS_NIM",$dataUser[0]['mhsNiu']); 
                    // print("check Point d");              
                    /// print_r($dataBuffer);   
 
                  
                  // masukkan data TA
//                  $this->mTemplate->addVar("data","DATA_KODE_MATAKULIAH","judul_ta");
//                  $this->mTemplate->addVar("data","JUDUL",$judul_skripsi);
//                  $this->mTemplate->parseTemplate("data",'a');
                  
                  // tampilkan prestasi akademik
                  if (!empty($dataTranscript)) {
                     $this->mTemplate->setAttribute("prestasi_akademik","visibility","visible");
					 $this->mTemplate->setAttribute("prestasi_akademik1","visibility","visible");
                 $this->mTemplate->addVar("prestasi_akademik","IPK",$dataUser[0]['ipk_transkrip']);   
		     $this->mTemplate->addVar("prestasi_akademik","IPK_TERBILANG",terbilang($dataUser[0]['ipk_transkrip']));
                     $this->mTemplate->addVar("prestasi_akademik","JUMLAH_SKS",$dataUser[0]['sks_transkrip']);
                     $this->mTemplate->addVar("prestasi_akademik","BOBOT",$jumlah_transkrip);
                     $this->mTemplate->addVar("prestasi_akademik","PREDIKAT",$dataUser[0]['prredikat_nama']);
                     $this->mTemplate->parseTemplate("prestasi_akademik");
                  }
                  //print_r($dataUser[0]);
                  $arrPjbNip = explode('|',$dataUser[0]['pjbNip']);
                  $arrPjbNama = explode('|',$dataUser[0]['pjbNama']);
                  $arrPjbJabatan = explode('|',$dataUser[0]['pjbJabatan']);
                  if(!empty($arrPjbJabatan)){
                     foreach($arrPjbJabatan as $key=>$value){
                        //echo strtolower($value);
//                        if(strpos(strtolower($value),'rektor') !== false){//echo 'here';
//                           $this->addVar('pengesah_rektor','JABATAN_SAH', $value);
//                           $this->addVar('pengesah_rektor','NAMA_SAH', $arrPjbNama[$key]);
//                           $this->addVar('pengesah_rektor','NIP_SAH', $arrPjbNip[$key]);
                           //$this->mTemplate->parseTemplate('pengesah_rektor','a');
//                        }//else
//                        if(strpos(strtolower($value),'dekan') !== false){
                           $this->addVar('pengesah_dekan','JABATAN_SAH', $value);
                           $this->addVar('pengesah_dekan','NAMA_SAH', $arrPjbNama[$key]);
                           $this->addVar('pengesah_dekan','NIP_SAH', $arrPjbNip[$key]);
                           //$this->mTemplate->parseTemplate('pengesah_dekan','a');
//                        }
                        
                     }
                  }
                  // data pengesah
                  $tanggal1 = $this->displayTanggal();
                  $tanggal = $_SESSION['identitas']['pt_alamat'].', '.$tanggal1;
                   $this->mTemplate->addGlobalVar("TANGGAL_PRINT",$tanggal1);
                  $this->mTemplate->addGlobalVar("TANGGAL_CETAK",$tanggal);
                  //$this->mTemplate->addGlobalVar("JABATAN_SAH",'Dekan');
                  //$this->mTemplate->addGlobalVar("NAMA_SAH",$dataUser[0]['pejabat']);
                  //$this->mTemplate->addGlobalVar("NIP_SAH",$dataUser[0]['nip']);
         
                  $this->mTemplate->parseTemplate('page'); 
         } else {
               // ambil data untuk halaman pertama               
               for($ix=0;$ix<$dataPerPage['first'];$ix++) {
                   
                   $this->mTemplate->addVars('data',$dataTranscript[$ix]);
                   $this->mTemplate->parseTemplate("data",'a');
               }
               
               $this->mTemplate->parseTemplate('page');
               
               $start = $dataPerPage['first'];
               $jumlah_halaman_up = $jumlahHalaman - 2;
               // ambil data untuk halaman selainnya
               for($ix=0;$ix<jumlah_halaman_up;$ix++) {
                   for($iy=0;$iy<$dataPerPage['middle'];$iy++) {
                     $this->mTemplate->addVars('data',$dataTranscript[$start]);
                     $this->mTemplate->parseTemplate("data",'a');           
                     $start++;              
                   }
                  $this->mTemplate->parseTemplate('page','a');                    
               }
               
               // ambil data untuk halaman terakhir
               for ($ix=$start;$ix<$jumlahData;$ix++) {
                     $this->mTemplate->addVars('data',$dataTranscript[$ix]);
                     $this->mTemplate->parseTemplate("data",'a');                   
               }
               
                 //s masukkan data TA
              //$this->mTemplate->addVar("data","DATA_KODE_MATAKULIAH","judul_ta");
                ///  $this->mTemplate->addVar("data","JUDUL",$judul_skripsi);
                /// $this->mTemplate->parseTemplate("data",'a');
                  
                  // tampilkan prestasi akademik
                  if (!empty($dataTranscript)) {
                     $this->mTemplate->setAttribute("prestasi_akademik","visibility","visible");
                     $this->mTemplate->addVar("prestasi_akademik","IPK",$dataUser[0]['ipk_transkrip']);
		     $this->mTemplate->addVar("prestasi_akademik","IPK_TERBILANG",terbilang($dataUser[0]['ipk_transkrip']));
                     $this->mTemplate->addVar("prestasi_akademik","JUMLAH_SKS",$dataUser[0]['sks_transkrip']);
                     $this->mTemplate->addVar("prestasi_akademik","BOBOT",$jumlah_transkrip);
                     $this->mTemplate->addVar("prestasi_akademik","PREDIKAT",$dataUser[0]['prredikat_nama']);
                     $this->mTemplate->parseTemplate("prestasi_akademik",'a');
					 
				
                  }
                  $arrPjbNip = explode('|',$dataUser[0]['pjbNip']);
                  $arrPjbNama = explode('|',$dataUser[0]['pjbNama']);
                  $arrPjbJabatan = explode('|',$dataUser[0]['pjbJabatan']);
                  if(!empty($arrPjbJabatan)){
                     foreach($arrPjbJabatan as $key=>$value){
                        //echo strtolower($value);
//                        if(strpos(strtolower($value),'rektor') !== false){//echo 'here';
//                           $this->addVar('pengesah_rektor','JABATAN_SAH', $value);
//                           $this->addVar('pengesah_rektor','NAMA_SAH', $arrPjbNama[$key]);
//                           $this->addVar('pengesah_rektor','NIP_SAH', $arrPjbNip[$key]);
                           //$this->mTemplate->parseTemplate('pengesah_rektor','a');
//                        }//else
//                        if(strpos(strtolower($value),'dekan') !== false){
                           $this->addVar('pengesah_dekan','JABATAN_SAH', $value);
                           $this->addVar('pengesah_dekan','NAMA_SAH', $arrPjbNama[$key]);
                           $this->addVar('pengesah_dekan','NIP_SAH', $arrPjbNip[$key]);
                           //$this->mTemplate->parseTemplate('pengesah_dekan','a');
//                        }
                        
                     }
                  }
                  
                  // data pengesah
                  $tanggal = $this->displayTanggal();
                  $tanggal_tempat = $_SESSION['identitas']['pt_alamat'].', '.$tanggal;
                  
                  $this->mTemplate->addGlobalVar("TANGGAL_CETAK",$tanggal_tempat);
				  $this->mTemplate->addGlobalVar("TANGGAL_PRINT",$tanggal);
				  
                  //$this->mTemplate->addGlobalVar("JABATAN_SAH",'Dekan');
                  //$this->mTemplate->addGlobalVar("NAMA_SAH",$dataUser[0]['pejabat']);
                  //$this->mTemplate->addGlobalVar("NIP_SAH",$dataUser[0]['nip']);
         
                  $this->mTemplate->parseTemplate('page','a');                
               
         }
         
         $this->DisplayTemplate();       
      }
      
   } 
   // $tahun = floor($lama_studi / 12); $bulan = $lama_studi % 12; nilai D : hitung dari data nilai transkrip
   
}
?>