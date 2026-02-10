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
      $this->SetTemplateBasedir($configObject->GetValue('app_module') . 'academic_report/templates/');
      $this->SetTemplateFile('print_khs.html');
      
      $this->cfg = $configObject;
   }
   
   function GetDataMahasiswa() {
      $objUserService = new UserClientService($this->mrUserSession->GetProperty("ServerServiceAddress"), 
         false, $this->mMahasiswaNiu);
      if (!$objUserService->IsError()) {
         $objUserService->SetProperty("UserRole", 1 );
         $dataUser = $objUserService->GetUserInfo();
			$this->DoUpdateServiceStatus($objUserService, $dataUser, 'SIA');
         if (false === $dataUser){    
            return false;
         } else {
            return $dataUser;
         }   
      }
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
		
		if ($showLocation=="true"){
			if ($location == "default"){
			   $tanggal = $this->mrConfig->GetValue('app_client_location') . ', ' . $setTanggal . ' '  . $arrayBulan[$arrayTgl[1]] . ' ' . $arrayTgl[0];
			}else 
			   $tanggal = $location.', '.$setTanggal . ' '  . $arrayBulan[$arrayTgl[1]] . ' ' . $arrayTgl[0];
		}else{
			$tanggal = $setTanggal . ' '  . $arrayBulan[$arrayTgl[1]] . ' ' . $arrayTgl[0];	
		}	
	
	    //$tanggal = $setTanggal . ' '  . $arrayBulan[$arrayTgl[1]] . ' ' . $arrayTgl[0];	
		//echo $tanggal;
		return $tanggal;
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
         $this->AddVar('document','UNIVERSITY_NAME',$_SESSION['identitas']['pt_nama']);
         $this->AddVar('document','UNIVERSITY_LOGO',$fileFoto);
		 $this->AddVar('document','ALAMATPT',$_SESSION['identitas']['pt_alamat']);
		 $this->AddVar('document','TELP',$_SESSION['identitas']['pt_telp']);

         $refObj = new Reference($this->mrConfig);
         $fak = $refObj->GetFakultasByProdi($this->mrUserSession->GetProperty('UserProdiId'));
         //$this->AddVar('document','FACULTY_NAME', 'FAKULTAS '. $fak[0]['Nama']);
         $this->AddVar('fakultas','TIPE', $this->cfg->GetValue('university_type'));
         $this->AddVar('fakultas','FACULTY_NAME', 'FAKULTAS '. $fak[0]['Nama']);
		 $this->AddVar('fakultas','JENJANG', 'JENJANG '. strtoupper($dataUser[0]['jenjang']));
		 
      
         $objAcademicReport = new AcademicReportClientService($this->mrUserSession->GetProperty("ServerServiceAddress"),
               false, $this->mMahasiswaNiu, $this->mMahasiswaProdiId);
         $objAcademicReport->SetProperty('SemesterProdiId', $this->mKHSSempId);
         $arrData[0]["nama"] = $dataUser[0]["fullname"];
         $arrData[0]["nim"] = $dataUser[0]["no_id"];
         $arrData[0]["prodi"] = $dataUser[0]["info"];
         $arrData[0]["dosen_pa"] = $dataUser[0]["dosen_pa"];
         $arrData[0]["angkatan"] = $dataUser[0]["angkatan"];
         $arrData[0]["prodi_info"] = $dataUser[0]["prodi_info"];
		 $arrData[0]["kelas"] = $dataUser[0]["kelas"];
         $dataKhs = $objAcademicReport->GetAllKHSItemForSemester();
		 
         if  (!empty($dataKhs)) {
            $ip = $objAcademicReport->GetIpInfoForSemester();
            $totalSks = 0;
            $totalNilaiSks = 0;
            foreach ($dataKhs as $key=>$khsItem) {
               $totalSks += $khsItem['sks_jumlah'];
               $dataKhs[$key]['nilaisks'] = $khsItem['bobot_nilai'] * $khsItem['sks_jumlah'];
               $totalNilaiSks += $dataKhs[$key]["nilaisks"];
			   $dataKhs[$key]['bobot_nilai'] = number_format($khsItem['bobot_nilai'],0);
            }
            $this->AddVar('khs', 'IS_EMPTY', 'NO');
            $this->ParseData('data_khs_item', $dataKhs, "KHS_",1);
			//get semesteer
			$resSemester = $objAcademicReport->GetSemesterInfo();
			foreach($resSemester as $sems){
				$SMT = $data['SMT'] = (($sems['TAHUN_SEKARANG'] - $sems['TAHUN_MASUK'])*2 + $sems['SEMESTER_SEKARANG']) - ($sems['SEMESTER_MASUK'] - 1) ; 

				$arrData[0]["smt"] = $SMT;
			}
            $this->AddVar('khs', 'SKS_DIAMBIL', $totalSks);
            $this->AddVar('khs', 'TOTAL_NILAISKS', $totalNilaiSks);
            /*$this->AddVar('khs', 'IP_SEMESTER', $ip[0]['ips']);
            $this->AddVar('khs', 'IP_KUMULATIF', $ip[0]['ipk']);
            $this->AddVar('khs', 'MAX_SKS', $ip[0]['max_sks']);*/
            $arrData[0]['ip_semester'] = round($ip[0]['ips'], 2);
            $arrData[0]['ip_kumulatif'] = round($ip[0]['ipk'], 2);
            $arrData[0]['max_sks'] = $ip[0]['max_sks'];
         } else {
               $this->AddVar('khs', 'IS_EMPTY', 'YES');   
         }
         $dataPengesah = $objAcademicReport->GetPejabatPengesahKHS();
		 $tanggal = $this->displayTanggal();
		 $this->AddVar('page', 'TANGGAL_CETAK', $tanggal);
         $this->AddVar('page', 'TIPE_PENGESAH', $dataPengesah[0]['TIPE_PENGESAH']);
         $this->AddVar('page', 'NAMA_PENGESAH', $dataPengesah[0]['NAMA_PENGESAH']);
         $this->AddVar('page', 'JABATAN_PENGESAH', $dataPengesah[0]['JABATAN_PENGESAH']);
         $this->AddVar('page', 'NIP_PENGESAH', $dataPengesah[0]['NIP_PENGESAH']);
         $this->ParseData('data_khs', $arrData, 'MHS_');
         $this->DisplayTemplate();       
      }
      
   } 
   
}
?>