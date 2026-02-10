<?php
/**
 * DisplayViewGradeHistoryMhs
 * DisplayViewGradeHistoryMhs class
 */

class DisplayViewGradeHistoryMhs extends DisplayBaseFull {
   var $mMahasiswaNiu;
   var $mMahasiswaProdi;
   var $mErrorMessage;
	var $mSiaServer;
   	var $mEnableBlock; //add ccp 12-3-2019
	var $mMahasiswaProdiId; //add ccp 12-3-2019
   
   function DisplayViewGradeHistoryMhs(&$configObject, &$security, $mhsniu, $prodiId, $getBlock) {
      DisplayBaseFull::DisplayBaseFull($configObject, $security);
      $this->mMahasiswaNiu = $mhsniu;
	  $this->mMahasiswaProdiId = $prodiId; //add ccp 12-3-2019
	  $this->mFinansiServiceAddress = $this->mrUserSession->GetProperty("FinansiServiceAddress"); #add ccp 12-3-2019
	  $this->mEnableBlock = $getBlock  ; //add ccp 12-3-2019
	  $this->mSiaServer = $this->mrUserSession->GetProperty("ServerServiceAddress");
      $this->SetErrorAndEmptyBox();  
      $this->SetTemplateBasedir($configObject->GetValue('app_module') . 'academic_report/templates/');
      $this->SetTemplateFile('view_grade_history_mhs.html');
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
		#add ccp 6-3-2019
			$dataSemAktif = $this->GetSemesterAktif();
			$statusTagihanPrasyaratMhs =  $this->CekStatusTagihanPrasyaratMhs($this->mMahasiswaNiu,$dataSemAktif[0]['sempSemId']);
			if(!empty($statusTagihanPrasyaratMhs['data']) && $this->mEnableBlock){
				$this->AddVar("data_hutang", "BLOCK", "YES");
				
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
			}else{
				$this->AddVar("data_hutang", "BLOCK", "NO");
			}
			#end ccp
         $objAcademicReport = new AcademicReportClientService($this->mSiaServer,
               false, $this->mMahasiswaNiu, $this->mMahasiswaProdi);
         $this->AddVar("content", "MHS_NAMA",$dataUser[0]["fullname"]);   
         $this->AddVar("content", "MHS_NIM", $dataUser[0]["no_id"]);   
         $this->AddVar("content", "MHS_PRODI", $dataUser[0]["info"]);     
         $dataNilai = $objAcademicReport->GetAllGradeHistoryMhs();
         //echo "<pre>";print_r($dataNilai);echo "</pre>";
        
         if  (!empty($dataNilai)) {
            $this->AddVar("data_nilai", "NILAI_AVAILABLE", "YES");   
            foreach ($dataNilai as $key=>$value) {
               $arrNilaiTemp = explode ("|", $value["nilai"]);
               $arrKeTemp = explode("|", $value["ke"]);
			   $arrSemester = explode("|", $value["semester"]);
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
					if(empty($arrNilaiTemp[$keyKe])){$arrNilaiTemp[$keyKe]='-';}
                     $dataNilai[$key][$urutanNilai] = '<b>( '.$arrNilaiTemp[$keyKe].' )</b><br/>'.$arrSemester[$keyKe];
                  } else {
                     $dataNilai[$key][$urutanNilai] = "";
                  }
               }
            }
            $this->ParseData("data_nilai_item", $dataNilai, "NILAI_",1);
            $this->AddVar("btn_cetak", "URL_CETAK", $this->mrConfig->GetURL('academic_report','grade_history_mhs','print') .
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
      $this->AddVar("content", "URL_BACK", $this->mrConfig->GetURL('home','home','view'));
      //$this->AddVar("content", "URL_BACK", $this->mrConfig->GetURL('dosen','mentored_students','view')."&sia=".$this->mrConfig->Enc($this->mSiaServer));
      $this->AddVar("content", "VIEW_BY", "dosen");

      $this->DisplayTemplate();
   }
   
   function ShowErrorBox() {
      $this->AddVar("error_box", "ERROR_MESSAGE",  
            $this->ComposeErrorMessage("Pengambilan data hasil studi tidak berhasil. " , $this->mErrorMessage));   
      $this->SetAttribute('error_box', 'visibility', 'visible');
   }

   #add ccp 5-3-2019
   function GetSemesterAktif() {
      $objUserService = new UserClientService($this->mSiaServer, false, $this->mMahasiswaNiu);
      if ($objUserService->IsError()) {
         $this->mErrorMessage .= $this->mUserService->GetProperty("ErrorMessages");
      }else{
         $objUserService->SetProperty("UserRole", 1 );
         // $dataUser = $objUserService->GetSemesterAktifInfo();
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