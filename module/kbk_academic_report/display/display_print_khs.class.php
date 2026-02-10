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
      $this->SetTemplateFile('print_khs.html');
      
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
         $this->AddVar('document','UNIVERSITY_NAME',$_SESSION['identitas']['pt_nama']);
         $this->AddVar('document','UNIVERSITY_LOGO',$fileFoto);

         $refObj = new Reference($this->mrConfig);
         $fak = $refObj->GetFakultasByProdi($this->mrUserSession->GetProperty('UserProdiId'));
         //$this->AddVar('document','FACULTY_NAME', 'FAKULTAS '. $fak[0]['Nama']);
         $this->AddVar('fakultas','TIPE', $this->cfg->GetValue('university_type'));
         $this->AddVar('fakultas','FACULTY_NAME', 'FAKULTAS '. $fak[0]['Nama']);
      
         $objAcademicReport = new AcademicReportClientService($this->mrUserSession->GetProperty("ServerServiceAddress"),
               false, $this->mMahasiswaNiu, $this->mMahasiswaProdiId);
         $objAcademicReport->SetProperty('SemesterProdiId', $this->mKHSSempId);
         $arrData[0]["nama"] = $dataUser[0]["fullname"];
         $arrData[0]["nim"] = $dataUser[0]["no_id"];
         $arrData[0]["prodi"] = $dataUser[0]["info"];
         $arrData[0]["dosen_pa"] = $dataUser[0]["dosen_pa"];
         $arrData[0]["angkatan"] = $dataUser[0]["angkatan"];
         $arrData[0]["prodi_info"] = $dataUser[0]["prodi_info"];
         $dataKhs = $objAcademicReport->GetAllKHSItemForSemester();
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
            $semInfo = $objAcademicReport->GetNamaSemesterForSemesterProdiId($this->mKHSSempId);
            $sem = $semInfo[0]['nama'] . " " . $semInfo[0]['tahun'] . 
                         " / " . ($semInfo[0]['tahun']+1);
            $arrData[0]["sem"] = $sem;
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