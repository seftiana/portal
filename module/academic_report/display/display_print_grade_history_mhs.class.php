<?php
/**
 */

class DisplayPrintGradeHistoryMhs extends DisplayBasePrint {
   var $mMahasiswaNiu;
   var $mMahasiswaProdi;

   
   function DisplayPrintGradeHistoryMhs(&$configObject, &$security, $mhsniu) {
      DisplayBasePrint::DisplayBasePrint($configObject, $security);
      $this->mMahasiswaNiu = $mhsniu;
      $this->SetTemplateBasedir($configObject->GetValue('app_module') . 'academic_report/templates/');
      $this->SetTemplateFile('print_grade_history_mhs.html');
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
   
   function ShowKop() {
 	   $rootServer = dirname($this->mrUserSession->GetProperty('ServerServiceAddress'));
	   $rootServer = str_replace("/index.service.php","",$rootServer);
	   $rootServer = str_replace("portal_services","",$rootServer);
	   $fileFoto = $rootServer.'images/'.$_SESSION['identitas']['pt_logo'];  
   
      $this->SetAttribute('kop_print','visibility','visible');
      $this->AddVar('kop_data','ALIGN','center');
      $this->AddVar('kop_data','KOP_UNIVERSITY_NAME',$_SESSION['identitas']['pt_nama']);
	  $this->AddVar('kop_data','KOP_UNIVERSITY_LOGO', $fileFoto);
		 
      $this->AddVar('kop_data','KOP_FACULTY_NAME',"");
   }
   
   function Display() {
       // cek apakah service sia is available
      $dataUser = $this->GetDataMahasiswa();
      DisplayBasePrint::Display("Cetak Riwayat Nilai");
      if (false !== $dataUser) {
         $objAcademicReport = new AcademicReportClientService($this->mrUserSession->GetProperty("ServerServiceAddress"),
               false, $this->mMahasiswaNiu, $this->mMahasiswaProdi);
         $this->ShowKop();
         
         $dataMhs['nama'] = $dataUser[0]["fullname"];   
         $dataMhs['nim'] = $dataUser[0]["no_id"];   
         $dataMhs['prodi'] = $dataUser[0]["info"];
         $dataNilai = $objAcademicReport->GetAllGradeHistoryMhs();
         if  (!empty($dataNilai)) {
            $this->AddVar("data_nilai", "NILAI_AVAILABLE", "YES"); 
            $loop = 0;
            $number = 1;
            foreach ($dataNilai as $key=>$value) {
               $arrNilaiTemp = explode ("|", $value["nilai"]);
               $arrKeTemp = explode("|", $value["ke"]);
			   $arrSemester = explode("|", $value["semester"]);
               $urutanNilai = "";
               $NilaiTemp[$loop] = $value;
               $NilaiTemp[$loop]["satu"] = "";
               $NilaiTemp[$loop]["dua"] = "";
               $NilaiTemp[$loop]["tiga"] = "";
               $NilaiTemp[$loop]["empat"] = "";
               $NilaiTemp[$loop]["lima"] = "";
               foreach ($arrKeTemp as $keyKe=>$keValue) {
                  switch ($keValue) {
                     case 1:
                        $urutanNilai = "satu";
                        break;
                     case 2:
                        $urutanNilai = "dua";
                        break;
                     case 3:
                        $urutanNilai = "tiga";
                        break;
                     case 4:
                        $urutanNilai = "empat";
                        break;
                     case 5:
                        $urutanNilai = "lima";
                        break;
                  }
                  if (isset($arrNilaiTemp[$keyKe])){
                     if(empty($arrNilaiTemp[$keyKe])){$arrNilaiTemp[$keyKe]='-';}
                     $NilaiTemp[$loop][$urutanNilai] = '<b>( '.$arrNilaiTemp[$keyKe].' )</b><br/>'.$arrSemester[$keyKe];
                  } else {
                     $NilaiTemp[$loop][$urutanNilai] = "";
                  }
               }
              $loop++;
               if (($key % 39) == 0 && $key != 0) {
                  $this->AppendVarWithInnerTemplate('data_to_print', $dataMhs, 'MHS_', 'data_nilai_item', $NilaiTemp, 'NILAI_', $number);
                  $this->ClearTemplate('data_nilai');
                  $this->AddVar("data_nilai", "NILAI_AVAILABLE", "YES"); 
                  $this->ShowKop();
                  $NilaiTemp = null;  
                  $number += 40;
                  $loop = 0;
               }
            }
            //$this->ParseData("data_nilai_item", $dataNilai, "NILAI_",1);
         }
         //echo $number ."<pre>"; print_r($NilaiTemp);echo "</pre><br />";
         //echo $number;
         $this->AppendVarWithInnerTemplate('data_to_print', $dataMhs, 'MHS_', 'data_nilai_item', $NilaiTemp, 'NILAI_', $number);
         $this->DisplayTemplate();
      } 
   }
   
}
?>