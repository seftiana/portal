<?php
/**
 * DisplayPrintKrs
 * DisplayPrintKrs class
 * 
 * @package communication 
 * @author Maya Alipin 
 * @copyright Copyright (c) 2006 GamaTechno
 * @version 1.0 
 * @date 2006-04-17
 * @revision Gitra Perdana 
 *@date 2006-08-10
 */
 
class DisplayPrintKrs extends DisplayBasePrint {
   var $mUserRole;
   var $mMahasiswaNiu;
   var $mMahasiswaProdiId;
   var $mObjKrsService;
   
   var $cfg;
   
   function DisplayPrintKRS(&$configObject, &$security, $userRole, $mhsniu, $prodiId) {
      DisplayBasePrint::DisplayBasePrint($configObject, $security);
      $this->mUserRole = $userRole;
      $this->mMahasiswaProdiId = $prodiId;
      $this->mMahasiswaNiu = $mhsniu;
      
      $this->mObjKrsService = new AcademicPlanClientService($this->mrUserSession->GetProperty("ServerServiceAddress"),false, $this->mMahasiswaNiu, $this->mMahasiswaProdiId);
      $this->mObjKrsService->SetProperty("UserRole", $this->mUserRole);
      $this->mObjKrsService->DoSiaSetting(); 
      $this->SetTemplateBasedir($configObject->GetValue('app_module') . 'kbk_academic_plan/templates/');
      $this->SetTemplateFile('print_krs_01.html');
      
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
      
   /**
    * DisplayPrintKrs :: GetKrsMahasiswa
    * Method ini digunakan untuk mengambil data KRS mahasiswa pada semester aktif
    *
    * @param
    * @return array Data KRS
    */
   function GetKrsMahasiswa()
   {
      $this->mObjKrsService->SetProperty("UserRole", $this->mUserRole); // userRole dapet dari UserIDentity
      $krsItem = $this->mObjKrsService->GetAllKrsItemForSemesterKbk();
      if (false === $krsItem) {
         return false;
      } else {
         return $krsItem;
      }
   }
   
   function SetScheduleDay($hari) {
      switch ($hari) {
         case 'Senin':
            return 'Sn';
            break;
         case 'Selasa':
            return 'Sl';
            break;
         case 'Rabu':
            return 'Rb';
            break;
         case 'Kamis':
            return 'Km';
            break;
         case 'Jumat':
            return 'Jm';
            break;
         case 'Sabtu':
            return 'Sb';
            break;
        case 'Minggu':
            return 'Mg';
            break;
      }
   }
   
   function Display () {
      DisplayBasePrint::Display("Cetak Rencana Studi");
      $dataUser = $this->GetDataMahasiswa();
      //print_r($dataUser);
      if ($dataUser !== false) {
      

         $this->AddVar('content','BREAK',"nobreak");
         //kop
         //$this->SetAttribute('kop_print','visibility','visible');
         //$this->AddVar('kop_data','ALIGN','left');
         //$this->AddVar('kop_data','KOP_UNIVERSITY_NAME',$this->mrConfig->mValue["app_client"]);
         $refObj = new Reference($this->mrConfig);
         $fak = $refObj->GetFakultasByProdi($this->mrUserSession->GetProperty('UserProdiId'));
         //$this->AddVar('kop_data','KOP_FACULTY_NAME', 'FAKULTAS '. $fak[0]['Nama']);
         $this->AddVar('content','FAKULTAS', $fak[0]['Nama']);
         
         
         $rootServer = dirname($this->mrUserSession->GetProperty('ServerServiceAddress'));
   	   $rootServer = str_replace("/index.service.php","",$rootServer);
   	   $rootServer = str_replace("portal_services","",$rootServer);
   	   $fileFoto = $rootServer.'images/'.$_SESSION['identitas']['pt_logo'];
   	   
         $this->AddVar('content','UNIVERSITY_NAME',strtoupper($_SESSION['identitas']['pt_nama']));
         //$this->AddVar('content','UNIVERSITY_LOGO',$fileFoto);
         // logo ngabil dari file di portal sendiri
         $this->AddVar('content','UNIVERSITY_LOGO','images/logo.jpg');
         $this->AddVar('fakultas','TIPE', $this->cfg->GetValue('university_type'));
         $this->AddVar('fakultas','FACULTY_NAME', 'FAKULTAS '. $fak[0]['Nama']);

         $semester = $this->mObjKrsService->GetProperty("NamaSemester") ." ". $this->mObjKrsService->GetProperty("TahunSemester") . 
                               " / " . ($this->mObjKrsService->GetProperty("TahunSemester") + 1);
         $this->AddVar('content','SEMESTER',$semester);
         //print_r($dataUser);
         $this->AddVar('content','MHS_FULLNAME', $dataUser[0]["fullname"]);
         $this->AddVar('content','MHS_NIU',$dataUser[0]["niu"]);
         $this->AddVar('content','PRODI_INFO',$dataUser[0]["prodi_info"]);
         $this->AddVar('content','MHS_JURUSAN',$dataUser[0]["jurusan"]);
         $this->AddVar('content','MHS_KURTAHUN',$dataUser[0]["kurikulum"]);
         $this->AddVar('tanda_tangan','NAMAPEMBIMBING',$dataUser[0]["dosen_pa"]);
         $this->AddVar('tanda_tangan','NIPPEMBIMBING',$dataUser[0]["nip_pa"]);
         //$this->AddVar('content','DISPLAY_DOSEN_PA',$dataUser[0]["dosen_pa"]);
         //var_dump($this->mObjKrsService);
   		$tanggalLokasi = $this->displayTanggal();
   		$arrTgglCetak = split(' ',$tanggalLokasi);
   		//print_r($arrTgglCetak);
   		$tgglTandaTangan = $this->mrConfig->GetValue('app_client_location'). ',   '. '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $arrTgglCetak[1] . ' ' . $arrTgglCetak[2];
   		$this->addVar("tanda_tangan","TANGGALTANDATANGAN",$tgglTandaTangan);

         //if ($dataUser[0]["dosen_pa"]) $this->AddVar('content', 'NAMA', 'default');
         //$this->AddVar('content','KET_CETAK',$this->mrConfig->GetValue('app_client_location'). ', ' . $this->displayTanggal());
         
         # menghitung semester mahasiswa
         $semId = $this->mObjKrsService->mSemesterProdiSemesterId;
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
         			break;
         		case 2:
         			$huruf = 'Dua';
         			break;
         		case 3:
         			$huruf = 'Tiga';
         			break;
         		case 4:
         			$huruf = 'Empat';
         			break;
         		case 5:
         			$huruf = 'Lima';
         			break;
         		case 6:
         			$huruf = 'Enam';
         			break;
         		case 7:
         			$huruf = 'Tujuh';
         			break;
         		case 8:
         			$huruf = 'Delapan';
         			break;
         		case 9:
         			$huruf = 'Sembilan';
         			break;
         		case 10:
         			$huruf = 'Sepuluh';
         			break;
         		case 11:
         			$huruf = 'Sebelas';
         			break;
         		case 12:
         			$huruf = 'Dua belas';
         			break;
         		case 13:
         			$huruf = 'Tiga belas';
         			break;
         		case 14:
         			$huruf = 'Empat Belas';
         			break;
         		case 15:
         			$huruf = 'Lima Belas';
         			break;
         	}
         
         $this->addVar("content","SEMESTER_MHS",$resSemKur.' ('.$huruf.')');
         # ---------------------------------------------------------------------


         if (!empty($dataUser[0]["dsn_ta"])){
            $dsn_pta = explode("|", $dataUser[0]["dsn_ta"]);
            $temp = '';
				$len = count($dsn_pta);
            for ($i=0;$i<$len;$i++){
               if ($i == 0) {
                  $temp = $dsn_pta[$i];
               } else {
                  $temp = $temp . '<br />' . $dsn_pta[$i];
               }
            }
            $this->SetAttribute('dosen_pta','visibility','visible');
            $this->AddVar('dosen_pta','MHS_DOSEN_PTA',$temp);
         }
         else {
            $this->SetAttribute('dosen_pta','visibility','hidden');
         }

         $jatahSks = $this->mObjKrsService->GetJatahMaksimumSksForKrsId(1);
         /*if (false === $jatahSks){
            $jatahSks[0]['MAXSKS'] = 0;
            $jatahSks[0]['IPS'] = '0.00';
         }
         if (empty($jatahSks[0]['IPS'])) {
            $jatahSks[0]['IPS'] = '0.00';
         } 
         if (empty($jatahSks[0]['MAXSKS'])) {
            $jatahSks[0]['MAXSKS'] = '0';
         } */
         $this->AddVar('content','MAX_SKS',$jatahSks[0]['MAXSKS']);
         $this->AddVar('content','IP_SEMESTER_LALU',$jatahSks[0]['IPS']);
         $this->AddVar('content','TANGGALCETAK',$this->displayTanggal());
         
         $dataKrs = $this->GetKrsMahasiswa();
         //print_r($dataUser);
        //print_r($_SESSION);
         if (!empty($dataKrs) ){
            $dataKrsLokal = array();
            $dataKrsLintas = array();
            $totalSks = 0;
            $class = array();   
            

            /*foreach ($dataKrs as $key=>$krsItem) {
               if ($krsItem['IS_BATAL'] == 0) {
                   if ($krsItem['KRS_KODE'] == 1){
                      $dataKrsLokal[] = $krsItem;
                      $class[] = $krsItem['KELAS_ID'];
                   }else{
                      $dataKrsLintas[] = $krsItem;
                   }
                   $totalSks += $krsItem["SKS"];
               }
            }*/
            
            $dataKrsLokal = $dataKrs;
            
            foreach ($dataKrsLokal as $value) {
               $totalSks += $value['JUMLAHSKS'];
            }
            
            $ctr = 0;
            if (!empty($dataKrsLokal)) {
               /*$proposedClassObj = new ProposedClassesClientService($this->mrUserSession->GetProperty("ServerServiceAddress"),false, $this->mMahasiswaNiu, $this->mMahasiswaProdiId);
               $jadwal = $proposedClassObj->GetJadwalKuliahForArrayClass($class);
               //print_r($jadwal);

               //$no = 0;

               foreach ($dataKrsLokal as $key=>$itemKrs) {
                  //$dataKrsLokal[$key]['NO'] = ++$no;
                  $dataKrsLokal[$key]['Sn'] = "";
                  $dataKrsLokal[$key]['Sl'] = "";
                  $dataKrsLokal[$key]['Rb'] = "";
                  $dataKrsLokal[$key]['Km'] = "";
                  $dataKrsLokal[$key]['Jm'] = "";
                  $dataKrsLokal[$key]['Sb'] = "";
                  $dataKrsLokal[$key]['Mg'] = "";
               }
			   
               foreach ($dataKrsLokal as $key=>$itemKrs) {
                  $temp = explode("|",$dataKrsLokal[$key]['JAM']);
				  $temp = array_unique($temp);
			   $dataKrsLokal[$key]['JAM'] = implode("<br>",$temp);
			   
                  $tempDosen = explode("|",$dataKrsLokal[$key]['DOSEN']);
				  $tempDosen = array_unique($tempDosen);
			   $dataKrsLokal[$key]['DOSEN'] = implode("<br>",$tempDosen);
			   
			       $temp1 = explode("|",$dataKrsLokal[$key]['HARI']);
				   
				  $temp1 = array_unique($temp1);
				  
			   $dataKrsLokal[$key]['HARI'] = implode("<br>",$temp1);
			 
			   
                  if ($jadwal[$key] !== false) {
                     if (!empty ($jadwal[$key])){
                        foreach ($jadwal[$key] as $jadwalValue){
                           $arrTemp = explode (":", $jadwalValue["sesi_mulai"]);
                           $sesi = $arrTemp[0] . ":" . $arrTemp[1];
                           $arrTemp = explode (":", $jadwalValue["sesi_selesai"]);
                           $sesi .= "-" . $arrTemp[0] . ":" . $arrTemp[1];
                           $dataKrsLokal[$key][$this->SetScheduleDay($jadwalValue["hari"])] = $sesi;
                        }
                     }
                  }
               }*/
              // echo "<pre>";print_r($jadwal);echo "</pre>";
               /*if ($jadwal !== false) {
                  $krsItem[$this->SetScheduleDay($jadwal[$key]["hari"])] = $jadwal[$key]["sesi_mulai"] . "-" . $jadwal[$key]["sesi_selesai"];
               }*/
               
               $this->SetAttribute('krs_local','visibility','visible');
               $data_cek = '';
               foreach ($dataKrsLokal as $value) {
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
               
                  $this->AddVars('krs_local', $value, 'LOCAL_');
                  $this->ParseTemplate('krs_local', 'a');
                  //$this->ParseData('krs_local', $dataKrsLokal, "LOCAL_", 1);
               }
            }
            if (!empty($dataKrsLintas)) {
               $this->SetAttribute('krs_lintas_info','visibility','visible');
               $this->SetAttribute('krs_lintas','visibility','visible');
               $this->ParseData('krs_lintas', $dataKrsLintas, "LINTAS_", 1);
            }
            $this->AddVar('krs','IS_EMPTY', "NO");
            $this->AddVar('total','TOTAL_SKS',$totalSks);
         } else {
            $this->AddVar('krs','IS_EMPTY', "YES");
         }
         
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
        $tanggal = $setTanggal . ' ' . $arrayBulan[$arrayTgl[1]] . ' ' . $arrayTgl[0];
        //echo $tanggal;
        return $tanggal;
    }
}
?>