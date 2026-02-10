<?php
/**
 * DisplayViewTranscript
 * DisplayViewTranscript class
 *
 * @package communication
 * @author Yudhi Aksara, S.Kom
 * @copyright Copyright (c) 2006 GamaTechno
 * @version 1.0
 * @date 2006-03-03
 * @revision Maya Alipin 2006.03.28
 * @revision Gitra Perdana 2006.09.02
 */

class DisplayViewTranscript extends DisplayBaseFull {
   /**
     * var $mMahasiswaNiu string Niu Mahasiswa
     */
   var $mMahasiswaNiu;

   /**
     * var $mMahasiswaProdiId string Id Prodi
     */
   var $mMahasiswaProdiId;

   /**
     * var $mErrorMessage string Error Messages
     */
   var $mErrorMessage;

   /**
    * var $mViewBy string user who viewing transcript;
    */
   var $mViewBy;

	var $mSiaServer;

   /**
     * DisplayViewTranscript::DisplayViewTranscript
     * Constructor for DisplayViewTranscript
     *
     * @param $configObject object configuration
     * @param $security object security
     * @param $mhsniu Niu Mahasiswa
     * @param $prodiId Id Program Studi
     * @param $errMsg Error Messages
     * @return void
     */
   var $mEnableBlock; //add ccp 12-3-2019
   function DisplayViewTranscript(&$configObject, &$security, $mhsniu, $prodiId, $errMsg, $viewBy, $siaServer, $getBlock) {
      DisplayBaseFull::DisplayBaseFull($configObject, $security);
      $this->mMahasiswaProdiId = $prodiId;
      $this->mMahasiswaNiu = $mhsniu;
      $this->mErrorMessage = $errMsg;
      $this->mViewBy = $viewBy;
		$this->mFinansiServiceAddress = $this->mrUserSession->GetProperty("FinansiServiceAddress"); #add ccp 12-3-2019
		$this->mEnableBlock = $getBlock  ; //add ccp 12-3-2019
		if ($siaServer == "") {
			$this->mSiaServer = $this->mrUserSession->GetProperty("ServerServiceAddress");
		} else {
			$this->mSiaServer = $siaServer;
		}
      $this->SetErrorAndEmptyBox();
      $this->SetTemplateBasedir($configObject->GetValue('app_module') . 'academic_report/templates/');
      $this->SetTemplateFile('view_transcript.html');
   }

   /**
     * DisplayViewTranscript::GetDataMahasiswa
     * Method untuk Mengambil Data Mahasiswa untuk header Transkrip
     *
     * @param
     * @return array data mahasiswa
     */
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

   /**
     * DisplayViewTranscript::Display
     * Parsing data ke Template
     *
     * @param
     * @return void
     */
   function Display() {

      // cek apakah service sia is available
      $dataUser = $this->GetDataMahasiswa();
      DisplayBaseFull::Display("[ Logout ]");
      if (false !== $dataUser) {
		#add ccp 6-3-2019
		$dataSemAktif = $this->GetSemesterAktif();
		$statusTagihanPrasyaratMhs =  $this->CekStatusTagihanPrasyaratMhs($this->mMahasiswaNiu,$dataSemAktif[0]['sempSemId']);
		// echo"<pre>";print_r($statusTagihanPrasyaratMhs);
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

         $this->ParseData("user", $dataUser, "MHS_");
         $objAcademicReport = new AcademicReportClientService($this->mSiaServer, false, $this->mMahasiswaNiu, $this->mMahasiswaProdiId);
         $dataTranskrip = $objAcademicReport->GetAllTranscriptItemForMahasiswa();
         if (false !== $dataTranskrip) {
            $ada = false;
            $newDataTranskrip = array();
            foreach ($dataTranskrip as $key=>$value) {

               //if ($value['semester'] != '' && $value['kode_matakuliah'] != '' && $value['matakuliah'] != '' && $value['sks_jumlah'] != '' && $value['nilai'] != ''){
                  $ada = true;
                  $newDataTranskrip[] = $value;
                  $newDataTranskrip[]['semester'] = str_replace ('Semester', '' , $dataTranskrip[$key]['semester']);
               //}
            }
            if ($ada === true) {
               $this->ParseData("transkrip_item", $dataTranskrip, "TRANS_", 1);
               $this->AddVar('buttonCetak', 'URL_CETAK_SEMENTARA_TERBAIK', $this->mrConfig->GetURL('academic_report','academic_transcript','print') .
                                       "&niu=" . $this->mrConfig->Enc($this->mMahasiswaNiu) . "&prodi=" . $this->mrConfig->Enc($this->mMahasiswaProdiId));
			   $this->AddVar('buttonCetak', 'URL_CETAK_SEMENTARA_LENGKAP', $this->mrConfig->GetURL('academic_report','academic_transcript3','print') .
                                       "&niu=" . $this->mrConfig->Enc($this->mMahasiswaNiu) . "&prodi=" . $this->mrConfig->Enc($this->mMahasiswaProdiId));
            } else {
               $this->mErrorMessage = $objAcademicReport->GetProperty("ErrorMessages") . "<br>"  .$objAcademicReport->GetProperty("ErrorMessages"). "<br>". $this->mErrorMessage;
               $this->ShowErrorBox();
            }
         }
         else {
            $this->mErrorMessage = $objAcademicReport->GetProperty("ErrorMessages") . "<br>"  .$objAcademicReport->GetProperty("ErrorMessages"). "<br>". $this->mErrorMessage;
            $this->ShowErrorBox();
         }

         $dataPrestasi = $objAcademicReport->GetAcademicSummaryReportForMahasiswa();
         if (false !== $dataPrestasi) {
            $prestasi[0]['sks_diambil'] = $dataPrestasi[0]['mhsSksTranskrip'];
            $prestasi[0]['matakuliah_diambil'] = count($dataTranskrip);
            $prestasi[0]['ip_kumulatif'] = $dataPrestasi[0]['TRANSKRIP_IP'];

            $this->ParseData("prestasi", $prestasi, "PRES_");
         }
         else {
            $this->mErrorMessage = 'Data Prestasi Akademik Tidak Tersedia..<br>' .$objAcademicReport->GetProperty("ErrorMessages"). "<br>". $this->mErrorMessage;
            $this->ShowErrorBox();
         }

         $keteranganNilai = $objAcademicReport->GetBobotKeteranganNilai();
         if (false !== $keteranganNilai) {
            $this->ParseData("list_nilai", $keteranganNilai, "NILAI_");
         }
         else {
            $this->mErrorMessage = 'Data Keterangan Nilai Tidak Tersedia..<br>' .$objAcademicReport->GetProperty("ErrorMessages"). "<br>" . $this->mErrorMessage;
            $this->ShowErrorBox();
         }
      } else
         $this->ShowErrorBox();

      if (empty($this->mErrorMessage)) {
         $this->AddVar('empty_type', 'TYPE', "INFO");
         $this->SetAttribute('user','visibility','visible');
         $this->SetAttribute('transkrip','visibility','visible');
         $this->SetAttribute('prestasi','visibility','visible');
         $this->SetAttribute('keterangan','visibility','visible');
      }

		if ($this->mViewBy == "dosen"){
			$this->AddVar("form_aksi", "URL_BACK", $this->mrConfig->GetURL('dosen','mentored_students','view').
				"&sia=".$this->mrConfig->Enc($this->mSiaServer));
			$this->AddVar("buttonBack", "VIEW_BY", $this->mViewBy);
			$this->SetAttribute("buttonBack","visibility", "visible");
		}
      $this->DisplayTemplate();
   }

   /**
     * DisplayViewTranscript::ShowErrorBox
     * untuk menampilkan Error Box jika ada Error Messages
     * @param
     * @return void
     */
   function ShowErrorBox() {
      $this->AddVar("error_box", "ERROR_MESSAGE",
         $this->ComposeErrorMessage("Pengambilan data transkrip nilai tidak berhasil. " , $this->mErrorMessage));
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