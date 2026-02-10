<?php
/**
* DisplayViewJadwalPresensi
* DisplayViewJadwalPresensi class
* 
* @package presensi 
* @author cecep seftiana putra
* @copyright Copyright (c) 2006 GamaTechno
* @date 2025-11-27
*/
   
class DisplayViewJadwalPresensi extends DisplayBaseFull {
   /**
     * var mUserId integer user id
     */
   var $mUserId;
   
   /**
     * var mUserProdiId integer program studi id
     */
   var $mUserProdiId;
   
   /**
     * var mErrorMessage string Error Messages
     */
   var $mErrorMessage;
   
   /**
     * var mObjProposedClasses objcet ProposedClassesClientService
     */
   var $mObjProposedClasses;
   
   /**
     * var mServiceServer string service server address
     */
   var $mServiceServer;
   
   /**
     * var mDisplay boolean is the data must displayed or not
     */
   var $mDisplay;
   var $mEnableBlock;
   
   function DisplayViewJadwalPresensi(&$configObject, &$security, $errMsg, $serverAddress, $getBlock) {
      DisplayBaseFull::DisplayBaseFull($configObject, $security);
   
	  $this->mProdiId = $security->mUserIdentity->GetProperty("UserProdiId");
	
	  $this->mUserId = $security->mUserIdentity->GetProperty("UserReferenceId");
      $this->mErrorMessage = $errMsg;
      $this->mDisplay = true;
	  $this->mEnableBlock = $getBlock;
	  
      
       if ($serverAddress != ""){
         $this->mServiceServer = $serverAddress;
      } else {
         if ($this->mrUserSession->GetProperty("Role")==2 ) {
            $this->mDisplay = true;
         }
         $this->mServiceServer = $this->mrUserSession->GetProperty("ServerServiceAddress");
      }

	  $this->mFinansiServiceAddress = $this->mrUserSession->GetProperty("FinansiServiceAddress");
	  
      $this->SetErrorAndEmptyBox();  
      $this->SetTemplateBasedir($configObject->GetValue('app_module') . 'presensi/templates/');
      $this->SetTemplateFile('view_jadwal_presensi.html');
   }
   
   
   function GetAllDataMatakuliahForSemester($mhsNiu,$semester_aktif)
   {
      $krsItem = $this->mObjProposedClasses->GetAllProposedClassesSemesterBySelectSemester($mhsNiu,$semester_aktif);
      if (false === $krsItem) {      	 
         return false;
      }
      else {      	 
         return $krsItem;
      }
   }
   
   function GetAllSemesterData($mhsNiu)
   {
      $listProdi = $this->mObjProposedClasses->GetAllSemesterDataKrs($mhsNiu);
      if (false === $listProdi) {
         return false;
      }
      else {
         return $listProdi;
      }
   }

   
   function DoInitializeService() {
      $this->mObjProposedClasses =  New ProposedClassesClientService($this->mServiceServer,false, $this->mUserId, $this->mProdiId);      
      if ($this->mObjProposedClasses->IsError()) {
         $this->mErrorMessage .= $this->mUserService->GetProperty("ErrorMessages");
         return false;
      }else{
         $this->mObjProposedClasses->SetProperty("UserRole", $this->mrUserSession->GetProperty("Role"));
         $arrService = $this->mrUserSession->GetProperty("ServerServiceAvailable");
			$result = $this->mObjProposedClasses->DoSiaSetting();
			$this->DoUpdateServiceStatus($this->mObjProposedClasses, $result, 'SIA');
         if (false === $result) {
            $this->mErrorMessage .= $this->mObjProposedClasses->GetProperty("ErrorMessages");
         }
			return $result;
      }      
   }
   
   
   function Display() {
   	  $mhsNiu = $this->mUserId;	   	
      // cek apakah service sia is available
      $init = $this->DoInitializeService();
      DisplayBaseFull::Display("[ Logout ]");

      $this->setAttribute('mprodi','visibility','visible');
	  
	  if (empty($_POST['semester'])) {
			$semester_aktif = $this->mObjProposedClasses->GetProperty("SemesterProdiSemesterId");
	  } else {
			$semester_aktif = $_POST['semester'];
	  }
	  
      if (false === $init){
         $this->ShowErrorBox();
      } else {
		  
		  // $statusTagihanPrasyaratMhs =  $this->CekStatusTagihanPrasyaratMhs($mhsNiu,$semester_aktif);
		  
			if (!isset($_SESSION['tagihan_prasyarat'])) {
				$_SESSION['tagihan_prasyarat'] =  $this->CekStatusTagihanPrasyaratMhs($mhsNiu,$semester_aktif);
			}
			$statusTagihanPrasyaratMhs = $_SESSION['tagihan_prasyarat'];
		  
		  if(!empty($statusTagihanPrasyaratMhs['data']) && $this->mEnableBlock ){
			  // echo 'ada';
			  $kroscek = 1;
			  $this->AddVar("data_hutang", "BLOCK", "YES");
			  for($i=0,$m=count($statusTagihanPrasyaratMhs['tagihan']);$i<$m;++$i){
					if ($statusTagihanPrasyaratMhs['tagihan'][$i]['status_bayar'] == 'Lunas') continue;
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
					
					$sisa = $statusTagihanPrasyaratMhs['tagihan'][$i]['saldo_hutang'];
					$this->AddVar('data_item_tagihan', 'TOTAL_SISA', number_format($sisa,0,',','.'));
					$this->mTemplate->parseTemplate('data_item_tagihan', 'a');
					
			  }
		  }else{
			  // echo 'tidak ada';
			  $this->AddVar("data_hutang", "BLOCK", "NO");
		  }
		  
		 if(!empty($this->mErrorMessage))$this->ShowErrorBox();
		  
         if ($this->mDisplay !== false){
            $this->SetAttribute("keterangan", "visibility", "visible");
            $this->AddVar("keterangan", "PRODI", $this->mrUserSession->GetProperty("UserProdiName"));
            
           
            $this->AddVar("keterangan", "SEMESTER",$semester_aktif);
            $dataMkul = $this->GetAllDataMatakuliahForSemester($mhsNiu,$semester_aktif);
            $semesterData = $this->GetAllSemesterData($mhsNiu);
			$url_qrcode = $this->mrConfig->GetURL('presensi', 'scan', 'view').'&nim='.$this->mrConfig->Enc($mhsNiu);
            $this->AddVar("mprodi", "LINK_QRCODE",$url_qrcode);
			
			$jml_total=0;
			if($dataMkul[0]['KRSDT_ID'] != ""){
				$this->AddVar('data_list','IS_EMPTY','NO');
				for ($i=0; $i < count($dataMkul); $i++) {
					// $url_presensi = $this->mrConfig->GetURL('presensi', 'scan', 'view').'&kls='.$this->mrConfig->Enc($dataMkul[$i]['KELAS_ID'].'&nim='.$this->mrConfig->Enc($mhsNiu));
					// $this->AddVar('data_list_item','URL_VALIDASI',$url_presensi);
					
					$this->AddVar('data_list_item','NO',$i+1);
					$this->AddVar('data_list_item','KODE_MK',$dataMkul[$i]['KODE_MK']);
					$this->AddVar('data_list_item','NAMA_MK',$dataMkul[$i]['NAMA_MK']);
					$this->AddVar('data_list_item','SKS',$dataMkul[$i]['SKS']);
					$this->AddVar('data_list_item','KELAS',$dataMkul[$i]['KELAS']);
					$this->AddVar('data_list_item','WAKTU',$dataMkul[$i]['JADWAL']);
					$jml_total += $dataMkul[$i]['SKS'];
					$this->mTemplate->parseTemplate('data_list_item','a');
				}
			}else{
				$this->AddVar('data_list','IS_EMPTY','YES');
				$this->AddVar('data_list','MSG',$semester_aktif);
			}
			$this->AddVar("total","JML_TOTAL_SKS", $jml_total);
            
			for ($l=0;$l<count($semesterData);$l++) {
			  if ($semester_aktif == $semesterData[$l]['KODE']) {
				 $semesterData[$l]['IS_SELECTED']="selected";
			  } else {
				 $semesterData[$l]['IS_SELECTED']="";
			  }
		   }
			$this->parseData('fsemester',$semesterData,"",1);
			
         }
      }
      $this->DisplayTemplate();
   }
   
   function ShowErrorBox() {
      $this->AddVar("error_box", "ERROR_MESSAGE",  
            $this->ComposeErrorMessage("Presensi QR Code gagal, " . $this->mErrorMessage));   
      $this->SetAttribute('error_box', 'visibility', 'visible');
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