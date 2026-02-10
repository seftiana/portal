<?php
/**
 * DisplayViewKHS
 * DisplayViewKHS class
 * 
 * @package communication 
 * @author Maya Alipin 
 * @copyright Copyright (c) 2006 GamaTechno
 * @version 1.0 
 * @date 2006-02-27
 * @revision Gitra Perdana 2006-09-02
 *
 */

class DisplayViewKHS extends DisplayBaseFull {
   var $mMahasiswaNiu;
   var $mMahasiswaProdiId;
   var $mKHSSempId;
   var $mNamaSemester;
   var $mErrorMessage;
   var $mViewBy;
	var $mSiaServer;
   
   function DisplayViewKHS(&$configObject, &$security, $mhsniu, $prodiId, $sempId, $errMsg, $viewby, $siaServer) {
      DisplayBaseFull::DisplayBaseFull($configObject, $security);
      $this->mMahasiswaProdiId = $prodiId;
      $this->mKHSSempId = $sempId  ;
      $this->mMahasiswaNiu = $mhsniu;
      $this->mErrorMessage = $errMsg;
      $this->mViewBy = $viewby;
      $this->SetErrorAndEmptyBox();  
		if ($siaServer == "") {
			$this->mSiaServer = $this->mrUserSession->GetProperty("ServerServiceAddress");
		} else {
			$this->mSiaServer = $siaServer;
		}
      $this->SetTemplateBasedir($configObject->GetValue('app_module') . 'kbk_academic_report/templates/');
      $this->SetTemplateFile('view_khs.html');
   }
   
   function GetDataMahasiswa() {
      $objUserService = new UserClientService($this->mSiaServer, false, $this->mMahasiswaNiu);
      if ($objUserService->IsError()) {
         $this->mErrorMessage .= $this->mUserService->GetProperty("ErrorMessages");
      }else{
         //$objUserService->SetProperty("UserRole", 1 );
         $objUserService->SetProperty("UserRole", 8 );
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
   
   function CreateSemesterList(&$objService, &$arrSempId) {
      
      $semesterList = $objService->GetAllPassedSemesterMahasiswa();
      if ($semesterList!==false){
         if ($this->mViewBy == 'dosen') {
            $len = sizeof($semesterList);
            $semesterList[$len]['id'] = 'semua';
            $semesterList[$len]['name'] = '--SEMUA--';
         }
         if ($this->mKHSSempId != ""){
            $len = sizeof($semesterList);
            for ($i=0; $i<$len; $i++){
               $arrSempId[$i] = $semesterList[$i]["id"];
               if ($semesterList[$i]["id"] == $this->mKHSSempId){  
                  $semesterList[$i]["selected"] = "selected";
                  $this->mNamaSemester = $semesterList[$i]["name"];
               }else{
                  $semesterList[$i]["selected"] = "";
               }
            }
         }
      }
      return $semesterList;
   }
   
   function DisplayKhsForOneSemester(&$objAcademicReport, $dataUser) {
      $dataKhs = $objAcademicReport->GetAllKHSItemForSemester();
      if  (!empty($dataKhs)) {
         $ip = $objAcademicReport->GetIpForSemester();
         $totalSks = $objAcademicReport->GetJumlahSksForSemester();
         $this->AddVar("data_khs", "KHS_AVAILABLE", "YES");   
         $this->ParseData("data_khs_item", $dataKhs, "KHS_",1);
         $arrData[0]["nama"] = $dataUser[0]["fullname"];
         $arrData[0]["nim"] = $dataUser[0]["no_id"];
         $arrData[0]["prodi"] = $dataUser[0]["info"];
         $arrData[0]["sem"] = $this->mNamaSemester ;
         $arrData[0]["sks_diambil"] = $totalSks;
         $arrData[0]["matakuliah_diambil"] = sizeof($dataKhs);
         $arrData[0]["ip_semester"] = $ip;
         $this->ParseData("data_khs", $arrData, "MHS_");
         return true;
      } else {
         $this->mErrorMessage = $objAcademicReport->GetProperty("FaultMessages");
         $this->AddVar("empty_box", "WARNING_MESSAGE",  
            $this->ComposeErrorMessage("Data tidak ditemukan.<br />" , $this->mErrorMessage));   
            $this->AddVar('empty_type', 'TYPE', "INFO");
         $this->AddVar("data_khs", "KHS_AVAILABLE", "NO");   
         $this->SetAttribute('empty_box', 'visibility', 'visible');
         return false;
      }
      
   }
   
   function DisplayKhsForAllSemester(&$objAcademicReport, $dataUser, $arrSempId) {
      $dataKhs = $objAcademicReport->GetAllKhsItemForMahasiswa();
      if (!empty($dataKhs)){
         $this->AddVar("data_khs", "KHS_AVAILABLE", "YES");   
         array_pop($arrSempId);
         $infoKhs = $objAcademicReport->GetInfoAllKhsForMahasiswa($arrSempId);
         $arrData["nama"] = $dataUser[0]["fullname"];
         $arrData["nim"] = $dataUser[0]["no_id"];
         $arrData["prodi"] = $dataUser[0]["info"];
         $i = 0;
         $len = sizeof($dataKhs);

         foreach ($arrSempId as $key=>$value) {
            $totalSks = 0;
            $totalMk = 0;
            $arrDataKhs = array();
            for ($j = 0; $j<$len; $j++){
               if ($value == $dataKhs[$j]['sempId']){
                  $arrDataKhs[] = $dataKhs[$j];
                  $totalSks += $dataKhs[$j]['sks_jumlah'];
                  $totalMk++;;
                  $i++;   
               }
            }
            $arrData["sem"] = $infoKhs[$key]["nama"] . " " . $infoKhs[$key]["tahun"] . " / " . ($infoKhs[$key]["tahun"]+1);
            $arrData["ip_semester"] = $infoKhs[$key]["ip"];
            $arrData["matakuliah_diambil"] = $totalMk;
            $arrData["sks_diambil"] = $totalSks;
            $this->AppendVarWithInnerTemplate("data_khs", $arrData, "MHS_", "data_khs_item", $arrDataKhs, "KHS_", 1, true);
         }
      } else {
         $this->mErrorMessage = $objAcademicReport->GetProperty("FaultMessages");
         $this->AddVar("empty_box", "WARNING_MESSAGE",  
            $this->ComposeErrorMessage("Data tidak ditemukan.<br />" , $this->mErrorMessage));   
            $this->AddVar('empty_type', 'TYPE', "INFO");
         $this->AddVar("data_khs", "KHS_AVAILABLE", "NO");   
         $this->SetAttribute('empty_box', 'visibility', 'visible');
         return false;
      }
      //$sem = explode (" ",$this->mNamaSemester);
      //$arrData[0]["sem"] = $this->mNamaSemester . "/" . ++$sem[1];
      //$arrData[0]["sks_diambil"] = $totalSks;
      //$arrData[0]["matakuliah_diambil"] = sizeof($dataKhs);
      //$arrData[0]["ip_semester"] = $ip;
      /*if  (!empty($dataKhs)) {
         $ip = $objAcademicReport->GetIpForSemester();
         $totalSks = $objAcademicReport->GetJumlahSksForSemester();
         $this->AddVar("data_khs", "KHS_AVAILABLE", "YES");   
         $this->ParseData("data_khs_item", $dataKhs, "KHS_",1);
         $arrData[0]["nama"] = $dataUser[0]["fullname"];
         $arrData[0]["nim"] = $dataUser[0]["no_id"];
         $arrData[0]["prodi"] = $dataUser[0]["info"];
         $sem = explode (" ",$this->mNamaSemester);
         $arrData[0]["sem"] = $this->mNamaSemester . "/" . ++$sem[1];
         $arrData[0]["sks_diambil"] = $totalSks;
         $arrData[0]["matakuliah_diambil"] = sizeof($dataKhs);
         $arrData[0]["ip_semester"] = $ip;
         $this->ParseData("data_khs", $arrData, "MHS_");
         return true;
      } else {
         $this->mErrorMessage = $objAcademicReport->GetProperty("FaultMessages");
         $this->AddVar("empty_box", "WARNING_MESSAGE",  
            "Data tidak ditemukan.<br />" . $this->mErrorMessage);   
            $this->AddVar('empty_type', 'TYPE', "INFO");
         $this->AddVar("data_khs", "KHS_AVAILABLE", "NO");   
         $this->SetAttribute('empty_box', 'visibility', 'visible');
         return false;
      }*/
   }
   
   function Display() {
      
      // cek apakah service sia is available
      $dataUser = $this->GetDataMahasiswa();
      $empty = true;
      DisplayBaseFull::Display("[ Logout ]");
      if (false !== $dataUser) {
         
         $objAcademicReport = new AcademicReportClientService($this->mSiaServer,
               false, $this->mMahasiswaNiu, $this->mMahasiswaProdiId);
         $objAcademicReport->SetProperty("SemesterProdiId", $this->mKHSSempId);      
         //ambil data semesteryang pernah dilalui      
         $arrSempId = array();
         $semesterList = $this->CreateSemesterList($objAcademicReport, $arrSempId);
         $notEmpty = false;
         if ($semesterList !== false){
            $this->ParseData("semester_list", $semesterList, "SMT_");
            if ($this->mKHSSempId != ""){
               if ($this->mKHSSempId == 'semua'){
                  $notEmpty = $this->DisplayKhsForAllSemester($objAcademicReport, $dataUser, $arrSempId);
               } else {
                  $notEmpty = $this->DisplayKhsForOneSemester($objAcademicReport, $dataUser);
               }
            }
         }else{
            $this->mErrorMessage = "Daftar semester tidak ditemukan. <br />".$this->mErrorMessage. 
               $objAcademicReport->GetProperty("FaultMessages");
            $this->ShowErrorBox();
            $this->SetAttribute('view_semester_list', 'visibility', 'hidden');
            
         }
      } else {
         $this->ShowErrorBox();
         $this->SetAttribute('view_semester_list', 'visibility', 'hidden');
      }
      if ($notEmpty === true) {         
         //$this->AddVar("buttonCetak", "URL_CETAK", $this->mrConfig->GetURL('kbk_academic_report','khs_mhs','print') .
         $this->AddVar("buttonCetak", "URL_CETAK", $this->mrConfig->GetURL('kbk_academic_report','khs_01','print') .
                                 "&niu=" . $this->mrConfig->Enc($this->mMahasiswaNiu) . "&prodi=" . $this->mrConfig->Enc($this->mMahasiswaProdiId) . 
                                 "&sem=" . $this->mrConfig->Enc($this->mKHSSempId));
         $this->AddVar("buttonCetak", "URL_CETAK_MM", $this->mrConfig->GetURL('kbk_academic_report','khs_mhs_mm','print') .
                                 "&niu=" . $this->mrConfig->Enc($this->mMahasiswaNiu) . "&prodi=" . $this->mrConfig->Enc($this->mMahasiswaProdiId) . 
                                 "&sem=" . $this->mrConfig->Enc($this->mKHSSempId));
      }
      if ($this->mViewBy == "dosen"){
         $this->AddVar("content", "URL_BACK", $this->mrConfig->GetURL('kbk_dosen','mentored_students','view').
				"&sia=".$this->mrConfig->Enc($this->mSiaServer));
       $this->AddVar("buttonBack", "VIEW_BY", $this->mViewBy);
         $this->SetAttribute("buttonBack","visibility", "visible");
      }
      $this->DisplayTemplate();
      //disini ngambil Semesternya
   }
   
   function ShowErrorBox() {
      $this->mTemplate->AddVar("error_box", "ERROR_MESSAGE",  
            $this->ComposeErrorMessage("Pengambilan data hasil studi tidak berhasil. ", $this->mErrorMessage));   
      $this->mTemplate->SetAttribute('error_box', 'visibility', 'visible');
   }
}
?>