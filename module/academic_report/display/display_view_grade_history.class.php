<?php
/**
 * DisplayViewGradeHistory
 * DisplayViewGradeHistory class
 * 
 * @package communication 
 * @author Maya Alipin 
 * @copyright Copyright (c) 2006 GamaTechno
 * @version 1.0 
 * @date 2006-03-28
 * @revision Gitra Perdana 2006-09-02
 *
 */

class DisplayViewGradeHistory extends DisplayBaseFull {
   var $mMahasiswaNiu;
   var $mMahasiswaProdi;
   var $mErrorMessage;
	var $mSiaServer;
   
   function DisplayViewGradeHistory(&$configObject, &$security, $mhsniu, $mhsprodi, $siaServer) {
      DisplayBaseFull::DisplayBaseFull($configObject, $security);
      $this->mMahasiswaNiu = $mhsniu;
      $this->mMahasiswaProdi = $mhsprodi;
		if ($siaServer == "") {
			$this->mSiaServer = $this->mrUserSession->GetProperty("ServerServiceAddress");
		} else {
			$this->mSiaServer = $siaServer;
		}
      $this->SetErrorAndEmptyBox();  
      $this->SetTemplateBasedir($configObject->GetValue('app_module') . 'academic_report/templates/');
      $this->SetTemplateFile('view_grade_history.html');
   }
   
   function GetDataMahasiswa() {
      $objUserService = new UserClientService($this->mSiaServer, false, $this->mMahasiswaNiu);
      if ($objUserService->IsError()) {
         $this->mErrorMessage .= $this->mUserService->GetProperty("ErrorMessages");
      }else{
         $objUserService->SetProperty("UserRole", 1 );
         $dataUser = $objUserService->GetUserInfo();
			$this->DoUpdateServiceStatus($objUserService, $dataUser, 'SIA');
         if (false === $dataUser){    
            $this->mErrorMessage .= $objUserService->GetProperty("ErrorMessages");
            return false;
         } else {
            return $dataUser;
         }   
      }
   }
   
   function Display() {
       // cek apakah service sia is available
      $dataUser = $this->GetDataMahasiswa();
      DisplayBaseFull::Display("[ Logout ]");
      if (false !== $dataUser) {
         $objAcademicReport = new AcademicReportClientService($this->mSiaServer,
               false, $this->mMahasiswaNiu, $this->mMahasiswaProdi);
         $this->AddVar("content", "MHS_NAMA",$dataUser[0]["fullname"]);   
         $this->AddVar("content", "MHS_NIM", $dataUser[0]["no_id"]);   
         $this->AddVar("content", "MHS_PRODI", $dataUser[0]["info"]);     
         $dataNilai = $objAcademicReport->GetAllGradeHIstory();
         //echo "<pre>";print_r($dataNilai);echo "</pre>";
        
         if  (!empty($dataNilai)) {
            $this->AddVar("data_nilai", "NILAI_AVAILABLE", "YES");   
            foreach ($dataNilai as $key=>$value) {
               $arrNilaiTemp = explode ("|", $value["nilai"]);
               $arrKeTemp = explode("|", $value["ke"]);
               $urutanNilai = "";
               $dataNilai[$key]["satu"] = "";
               $dataNilai[$key]["dua"] = "";
               $dataNilai[$key]["tiga"] = "";
               $dataNilai[$key]["empat"] = "";
               $dataNilai[$key]["lima"] = "";
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
                     $dataNilai[$key][$urutanNilai] = $arrNilaiTemp[$keyKe];
                  } else {
                     $dataNilai[$key][$urutanNilai] = "";
                  }
               }
            }
            $this->ParseData("data_nilai_item", $dataNilai, "NILAI_",1);
            $this->AddVar("btn_cetak", "URL_CETAK", $this->mrConfig->GetURL('academic_report','grade_history','print') .
                  "&niu=". $this->mrConfig->Enc($this->mMahasiswaNiu) ."&prodi=". $this->mrConfig->Enc($this->mMahasiswaProdi));
         } else {
            $this->mErrorMessage = $objAcademicReport->GetProperty("FaultMessages");
            $this->AddVar("empty_box", "WARNING_MESSAGE",  
               $this->ComposeErrorMessage("Data tidak ditemukan. " , $this->mErrorMessage));   
            $this->AddVar("data_nilai", "NILAI_AVAILABLE", "NO");
            $this->AddVar('empty_type', 'TYPE', "INFO");   
            $this->SetAttribute('empty_box', 'visibility', 'visible');
         }
      } else {
         $this->ShowErrorBox();
      }
      $this->AddVar("content", "URL_BACK", $this->mrConfig->GetURL('dosen','mentored_students','view').
			"&sia=".$this->mrConfig->Enc($this->mSiaServer));
      $this->AddVar("content", "VIEW_BY", "dosen");
      $this->DisplayTemplate();
   }
   
   function ShowErrorBox() {
      $this->AddVar("error_box", "ERROR_MESSAGE",  
            $this->ComposeErrorMessage("Pengambilan data hasil studi tidak berhasil. " , $this->mErrorMessage));   
      $this->SetAttribute('error_box', 'visibility', 'visible');
   }
}
?>