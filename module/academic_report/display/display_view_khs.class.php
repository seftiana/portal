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
   var $mEnableBlock; //add ccp 6-3-2019
   var $mEnableSurvei; //add ccp 20-01-2023

   function DisplayViewKHS(&$configObject, &$security, $mhsniu, $prodiId, $sempId, $errMsg, $viewby, $siaServer, $getBlock, $getSurvei) {
      DisplayBaseFull::DisplayBaseFull($configObject, $security);
      $this->mMahasiswaProdiId = $prodiId;
      $this->mKHSSempId = $sempId  ;
      $this->mMahasiswaNiu = $mhsniu;
      $this->mErrorMessage = $errMsg;
      $this->mViewBy = $viewby;
      $this->SetErrorAndEmptyBox();
		$this->mFinansiServiceAddress = $this->mrUserSession->GetProperty("FinansiServiceAddress"); #add ccp 5-3-2019
		$this->mEnableBlock = $getBlock  ; //add ccp 6-3-2019
		$this->mEnableSurvei = $getSurvei  ; //add ccp 20-01-2023
		if ($siaServer == "") {
			$this->mSiaServer = $this->mrUserSession->GetProperty("ServerServiceAddress");
		} else {
			$this->mSiaServer = $siaServer;
		}
      $this->SetTemplateBasedir($configObject->GetValue('app_module') . 'academic_report/templates/');
		#update ccp 01-2023
		$objAcademicReport = new AcademicReportClientService($this->mSiaServer,false, $this->mMahasiswaNiu, $this->mMahasiswaProdiId);
		$cek_survei = $objAcademicReport->GetCekJawabanSurvei(); 
		
		if($this->mEnableSurvei==true && empty($cek_survei)){	
			$this->SetTemplateFile('view_link_survei.html');
		}else{
			$this->SetTemplateFile('view_khs.html');
		}
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
   
   function GetSemesterAktif() {
      $objUserService = new UserClientService($this->mSiaServer, false, $this->mMahasiswaNiu);
      if ($objUserService->IsError()) {
         $this->mErrorMessage .= $this->mUserService->GetProperty("ErrorMessages");
      }else{
         $objUserService->SetProperty("UserRole", 1 );
         //$dataUser = $objUserService->GetSemesterAktifInfo();
	 $dataUser = $objUserService->GetSemesterAktifInfoPerProdiMhs($this->mMahasiswaProdiId); //add ccp 01-11-2018
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
            $semesterList[$len]['name'] = 'semua';
         }
         if ($this->mKHSSempId != ""){
            $len = sizeof($semesterList);
            for ($i=0; $i<$len; $i++){
               $arrSempId[$i] = $semesterList[$i]["id"];
               if ($semesterList[$i]["id"] == $this->mKHSSempId){
                  $semesterList[$i]["selected"] = "selected";
                  $this->mNamaSemester = $semesterList[$i]["name"];
				  $this->mSemId = $semesterList[$i]["SEM_ID"];
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
		##add ccp 2025-11-18
		$dataKhsObe = [];
		$this->AddVar("data_khs_obe", "OBE_AVAILABLE", "TIDAK");
		foreach ($dataKhs as $row) {
			if ($row['TOTAL_CPMK'] == 100) {
				$this->AddVar("data_khs_obe", "OBE_AVAILABLE", "ADA");
				$dataKhsObe[] = $row;
			}
		}
		// echo'<pre>';print_r($dataKhs);die;
		$dataKhs = array_filter($dataKhs, function($item){
			return $item['TOTAL_CPMK'] != 100;
		});

		$dataKhs = array_values($dataKhs); // reset index
		##end ccp
	  
      if  (!empty($dataKhs) or !empty($dataKhsObe)) {
		   
		 $this->ParseData("data_khs_item_obe", $dataKhsObe, "KHS_OBE_",1);
		  	  
         $ip = $objAcademicReport->GetIpForSemester();
         $totalSks = $objAcademicReport->GetJumlahSksForSemester();
         $this->AddVar("data_khs", "KHS_AVAILABLE", "YES");
         $this->ParseData("data_khs_item", $dataKhs, "KHS_",1);
         $arrData[0]["nama"] = $dataUser[0]["fullname"];
         $arrData[0]["nim"] = $dataUser[0]["no_id"];
         $arrData[0]["prodi"] = $dataUser[0]["info"];
         $arrData[0]["sem"] = $this->mNamaSemester;
         $arrData[0]["sks_diambil"] = $totalSks;
         $arrData[0]["matakuliah_diambil"] = sizeof($dataKhs) + sizeof($dataKhsObe);
         $arrData[0]["ip_semester"] = $ip;
         $this->ParseData("data_khs", $arrData, "MHS_");
         return true;
      } else {
         $this->mErrorMessage = $objAcademicReport->GetProperty("FaultMessages");
         $this->AddVar("empty_box", "WARNING_MESSAGE",
            $this->ComposeErrorMessage("Data tidak ditemukan..<br />" , $this->mErrorMessage));
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
	  $dataSemAktif = $this->GetSemesterAktif();
      $empty = true;
      DisplayBaseFull::Display("[ Logout ]");
      if (false !== $dataUser) {

         $objAcademicReport = new AcademicReportClientService($this->mSiaServer,
               false, $this->mMahasiswaNiu, $this->mMahasiswaProdiId);
         $objAcademicReport->SetProperty("SemesterProdiId", $this->mKHSSempId);
         //ambil data semesteryang pernah dilalui
         $arrSempId = array();
         $semesterList = $this->CreateSemesterList($objAcademicReport, $arrSempId);
	 	#add ccp 6-3-2019
		$statusTagihanPrasyaratMhs =  $this->CekStatusTagihanPrasyaratMhs($this->mMahasiswaNiu,$dataSemAktif[0]['sempSemId']);
		// if(!empty($statusTagihanPrasyaratMhs['data']) && $this->mEnableBlock){
		$now = date('Y-m-d'); # add ccp 8-juli-2019
		if(!empty($statusTagihanPrasyaratMhs['data']) && $this->mEnableBlock && $this->mViewBy != 'dosen'){
		$mhsAngkatan = $dataUser[0]['angkatan'].$dataUser[0]['mhsSemesterMasuk_']; #add ccp 10-9-2019
		#if(!empty($statusTagihanPrasyaratMhs['data']) && $this->mEnableBlock && $dataSemAktif[0]['sempSemId']!=$mhsAngkatan){
			$this->AddVar("data_hutang", "BLOCK", "YES");
			for($i=0,$m=count($statusTagihanPrasyaratMhs['data']);$i<$m;++$i){
				if($i%2==0) $this->AddVar('data_item', '_CLASS', '');
				else $this->AddVar('data_item', '_CLASS', 'table-common-even');
				$this->AddVar('data_item', 'NUMBER', $i+1);
				$this->AddVar('data_item', 'PERIODE', $statusTagihanPrasyaratMhs['data'][$i]['periode']);
				$this->AddVar('data_item', 'TAGIHAN', $statusTagihanPrasyaratMhs['data'][$i]['tagihan']);
				$this->mTemplate->parseTemplate('data_item', 'a');
			}
		
			for($i=0,$m=count($statusTagihanPrasyaratMhs['tagihan']);$i<$m;++$i){
				if($i%2==0) $this->AddVar('data_item_tagihan', '_CLASS', '');
				else $this->AddVar('data_item_tagihan', '_CLASS', 'table-common-even');
				$this->AddVar('data_item_tagihan', 'NUMBER', $i+1);
				$this->AddVar('data_item_tagihan', 'PERIODE', $statusTagihanPrasyaratMhs['tagihan'][$i]['periode']);
				$this->AddVar('data_item_tagihan', 'TAGIHAN', $statusTagihanPrasyaratMhs['tagihan'][$i]['tagihan']);
				$this->AddVar('data_item_tagihan', 'BATAS_AKHIR', $statusTagihanPrasyaratMhs['tagihan'][$i]['batas_akhir']);
				$this->AddVar('data_item_tagihan', 'TOTAL_TAGIHAN', $statusTagihanPrasyaratMhs['tagihan'][$i]['total_tagihan']);
				$this->AddVar('data_item_tagihan', 'TOTAL_KWITANSI', $statusTagihanPrasyaratMhs['tagihan'][$i]['total_kwitansi']);
				$this->AddVar('data_item_tagihan', 'TOTAL_POTONGAN', $statusTagihanPrasyaratMhs['tagihan'][$i]['total_potongan']);
				$this->AddVar('data_item_tagihan', 'STATUS', $statusTagihanPrasyaratMhs['tagihan'][$i]['status_bayar']);   
				/*if($statusTagihanPrasyaratMhs['tagihan'][$i]['total_tagihan']==$statusTagihanPrasyaratMhs['tagihan'][$i]['total_potongan']){
					$sisa = $statusTagihanPrasyaratMhs['tagihan'][$i]['total_tagihan']-$statusTagihanPrasyaratMhs['tagihan'][$i]['total_potongan'];
				}else{
					$sisa = $statusTagihanPrasyaratMhs['tagihan'][$i]['total_tagihan']-$statusTagihanPrasyaratMhs['tagihan'][$i]['total_kwitansi'];
				}*/
				$sisa = $statusTagihanPrasyaratMhs['tagihan'][$i]['saldo_hutang'];#update ccp 20-05-2019
				$this->AddVar('data_item_tagihan', 'TOTAL_SISA', number_format($sisa,0,',','.'));
				$this->mTemplate->parseTemplate('data_item_tagihan', 'a');
			}
		##add ccp 8-juli-2019
		/*}else if((($now >= $dataSemAktif[0]['INPUT_NILAI_MULAI'] && $now <= $dataSemAktif[0]['INPUT_NILAI_SELESAI']) OR ($now >= $dataSemAktif[0]['INPUT_NILAI2_MULAI'] && $now <= $dataSemAktif[0]['INPUT_NILAI2_SELESAI'])) AND $this->mViewBy!="dosen" ){			
			$this->AddVar("data_hutang", "BLOCK", "PROSES_ENTRI");
		*/
		}else{
			$this->AddVar("data_hutang", "BLOCK", "NO");
		}
		#end ccp
		 //show komponen nilai
		 // if($dataSemAktif[0]['sempSemId'] == $this->mSemId){ #hidden by ccp 22-02-2019
			$this->mTemplate->addGlobalVar("DISPLAY_HARIAN","");
			$this->mTemplate->addGlobalVar("DISPLAY_MANDIRI","");
			$this->mTemplate->addGlobalVar("DISPLAY_KELOMPOK","");
			$this->mTemplate->addGlobalVar("DISPLAY_PRESENTASI","");
			$this->mTemplate->addGlobalVar("DISPLAY_TERSTRUKTUR","");
			$this->mTemplate->addGlobalVar("DISPLAY_TAMBAHAN","");
			$this->mTemplate->addGlobalVar("DISPLAY_UTS","");
			$this->mTemplate->addGlobalVar("DISPLAY_UAS","");
		 // }else{
			// $this->mTemplate->addGlobalVar("DISPLAY_HARIAN","hidden"); #hidden by ccp 22-02-2019
			// $this->mTemplate->addGlobalVar("DISPLAY_MANDIRI","hidden"); #hidden by ccp 22-02-2019
			// $this->mTemplate->addGlobalVar("DISPLAY_KELOMPOK","hidden"); #hidden by ccp 22-02-2019
			// $this->mTemplate->addGlobalVar("DISPLAY_PRESENTASI","hidden"); #hidden by ccp 22-02-2019
			// $this->mTemplate->addGlobalVar("DISPLAY_TERSTRUKTUR","hidden"); #hidden by ccp 22-02-2019
			// $this->mTemplate->addGlobalVar("DISPLAY_TAMBAHAN","hidden"); #hidden by ccp 22-02-2019
			// $this->mTemplate->addGlobalVar("DISPLAY_UTS","hidden"); #hidden by ccp 22-02-2019
			// $this->mTemplate->addGlobalVar("DISPLAY_UAS","hidden"); #hidden by ccp 22-02-2019
		 // } #hidden by ccp 22-02-2019
		 
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
         $this->AddVar("buttonCetak", "URL_CETAK", $this->mrConfig->GetURL('academic_report','academic_report2','print') .
                                 "&niu=" . $this->mrConfig->Enc($this->mMahasiswaNiu) . "&prodi=" . $this->mrConfig->Enc($this->mMahasiswaProdiId) .
                                 "&sem=" . $this->mrConfig->Enc($this->mKHSSempId));
      }
      if ($this->mViewBy == "dosen"){
         $this->AddVar("content", "URL_BACK", $this->mrConfig->GetURL('dosen','mentored_students','view').
				"&sia=".$this->mrConfig->Enc($this->mSiaServer));
       $this->AddVar("buttonBack", "VIEW_BY", $this->mViewBy);
         $this->SetAttribute("buttonBack","visibility", "visible");
      }
	  
	  ##add ccp 20-01-2023
	  $this->AddVar("buttonSurvei", "URL_SURVEY", $this->mrConfig->GetURL('kuisioner','survei','view') .
                                 "&niu=" . $this->mrConfig->Enc($this->mMahasiswaNiu) . "&prodi=" . $this->mrConfig->Enc($this->mMahasiswaProdiId));
	  ### end
      $this->DisplayTemplate();
      //disini ngambil Semesternya
   }

   function ShowErrorBox() {
      $this->mTemplate->AddVar("error_box", "ERROR_MESSAGE",
            $this->ComposeErrorMessage("Pengambilan data hasil studi tidak berhasil. ", $this->mErrorMessage));
      $this->mTemplate->SetAttribute('error_box', 'visibility', 'visible');
   }

   #add ccp 5-3-2019
	function GetTagihanPrasyaratMahasiswa($arrNim,$smt) {
        if($this->mFinansiServiceAddress == ''){
         	$this->ShowErrorBox("Pengambilan data tagihan tidak berhasil.");            
        } else{
            $restClient = new RestClient();
            $restClient->SetPath($this->mFinansiServiceAddress.'?mod=lap_histori_pembayaran&sub=HistoriPembayaranMahasiswaSingle&typ=rest&act=rest');
            // $restClient->SetGet('&prasyarat=yes&nim='.$arrNim);
            $restClient->SetGet('&smt='.$smt.'&nim='.$arrNim); //add ccp 15-8-2018
            $restClient->SetDebugOn();
            $this->dataRest = $restClient->Send();
            return $this->dataRest['gtfwResult'];
        }
    }

    # mencari mahasiswa yang tidak memenuhi prasyarat pembayaran
    # cara pakai $x =  $this->CekStatusTagihanPrasyaratMhs($value["nif"]);
    function CekStatusTagihanPrasyaratMhs($nimMhs,$semesterAktif){
    	$status = false;
        $dataTagihanPrasyaratMhs = $this->GetTagihanPrasyaratMahasiswa($nimMhs,$semesterAktif);
		// print_r($dataTagihanPrasyaratMhs);
        // if(!empty($dataTagihanPrasyaratMhs['data'])){
         	// $status = true;	
        // }
        // return $status;
        return $dataTagihanPrasyaratMhs;
    }

}
?>