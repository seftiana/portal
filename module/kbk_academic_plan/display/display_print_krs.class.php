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
      $this->SetTemplateFile('print_krs.html');
      
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
      $krsItem = $this->mObjKrsService->GetAllKrsItemForSemester();
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
   	   
         $this->AddVar('content','UNIVERSITY_NAME',$_SESSION['identitas']['pt_nama']);
         //$this->AddVar('content','UNIVERSITY_LOGO',$fileFoto);
         // logo ngabil dari file di portal sendiri
         $this->AddVar('content','UNIVERSITY_LOGO','images/logo.jpg');
         $this->AddVar('fakultas','TIPE', $this->cfg->GetValue('university_type'));
         $this->AddVar('fakultas','FACULTY_NAME', 'FAKULTAS '. $fak[0]['Nama']);

         $semester = $this->mObjKrsService->GetProperty("NamaSemester") ." ". $this->mObjKrsService->GetProperty("TahunSemester") . 
                               " / " . ($this->mObjKrsService->GetProperty("TahunSemester") + 1);
         $this->AddVar('content','SEMESTER',$semester);
         
         $this->AddVar('content','MHS_FULLNAME', $dataUser[0]["fullname"]);
         $this->AddVar('content','MHS_NIU',$dataUser[0]["niu"]);
         $this->AddVar('content','PRODI_INFO',$dataUser[0]["prodi_info"]);
         $this->AddVar('content','MHS_DOSEN_PA',$dataUser[0]["dosen_pa"]);
         //$this->AddVar('content','DISPLAY_DOSEN_PA',$dataUser[0]["dosen_pa"]);

         if ($dataUser[0]["dosen_pa"]) $this->AddVar('content', 'NAMA', 'default');
         $this->AddVar('content','KET_CETAK',$this->mrConfig->GetValue('app_client_location'). ', ' . $this->displayTanggal());


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
         if (false === $jatahSks){
            $jatahSks[0]['MAXSKS'] = 0;
            $jatahSks[0]['IPS'] = '0.00';
         }
         if (empty($jatahSks[0]['IPS'])) {
            $jatahSks[0]['IPS'] = '0.00';
         } 
         if (empty($jatahSks[0]['MAXSKS'])) {
            $jatahSks[0]['MAXSKS'] = '0';
         } 
         $this->AddVar('content','MAX_SKS',$jatahSks[0]['MAXSKS']);
         $this->AddVar('content','IP_SEMESTER_LALU',$jatahSks[0]['IPS']);
         
         $dataKrs = $this->GetKrsMahasiswa();
         
        //print_r($_SESSION);
         if (!empty($dataKrs) ){
            $dataKrsLokal = array();
            $dataKrsLintas = array();
            $totalSks = 0;
            $class = array();   
            

            foreach ($dataKrs as $key=>$krsItem) {
               if ($krsItem['IS_BATAL'] == 0) {
                   if ($krsItem['KRS_KODE'] == 1){
                      $dataKrsLokal[] = $krsItem;
                      $class[] = $krsItem['KELAS_ID'];
                   }else{
                      $dataKrsLintas[] = $krsItem;
                   }
                   $totalSks += $krsItem["SKS"];
               }
            }
            
            if (!empty($dataKrsLokal)) {
               $proposedClassObj = new ProposedClassesClientService($this->mrUserSession->GetProperty("ServerServiceAddress"),false, $this->mMahasiswaNiu, $this->mMahasiswaProdiId);
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
               }
              // echo "<pre>";print_r($jadwal);echo "</pre>";
               /*if ($jadwal !== false) {
                  $krsItem[$this->SetScheduleDay($jadwal[$key]["hari"])] = $jadwal[$key]["sesi_mulai"] . "-" . $jadwal[$key]["sesi_selesai"];
               }*/
               $this->SetAttribute('krs_local','visibility','visible');
               $this->ParseData('krs_local', $dataKrsLokal, "LOCAL_", 1);
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