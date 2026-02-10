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

class DisplayViewProgress extends DisplayBaseFull {
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
   function DisplayViewProgress(&$configObject, &$security, $mhsniu, $prodiId, $errMsg, $viewBy, $siaServer) {
      DisplayBaseFull::DisplayBaseFull($configObject, $security);
      $this->mMahasiswaProdiId = $prodiId;
      $this->mMahasiswaNiu = $mhsniu;
      $this->mErrorMessage = $errMsg;
      $this->mViewBy = $viewBy;
		if ($siaServer == "") {
			$this->mSiaServer = $this->mrUserSession->GetProperty("ServerServiceAddress");
		} else {
			$this->mSiaServer = $siaServer;
		}
      $this->SetErrorAndEmptyBox();  
      $this->SetTemplateBasedir($configObject->GetValue('app_module') . 'academic_report/templates/');
      $this->SetTemplateFile('view_progress.html');
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
         $this->ParseData("user", $dataUser, "MHS_");
         $objAcademicReport = new AcademicReportClientService($this->mSiaServer, false, $this->mMahasiswaNiu, $this->mMahasiswaProdiId);
         $dataKkm = $objAcademicReport->GetAllKkmItemForMahasiswa();
         if (false !== $dataKkm) {
               $this->ParseData("transkrip_item", $dataKkm, "TRANS_", 1);
               $this->AddVar('buttonCetak', 'URL_CETAK', $this->mrConfig->GetURL('academic_report','academic_progress','print') .
                                       "&niu=" . $this->mrConfig->Enc($this->mMahasiswaNiu) . "&prodi=" . $this->mrConfig->Enc($this->mMahasiswaProdiId));
         } else {
            $this->mErrorMessage = $objAcademicReport->GetProperty("ErrorMessages") . "<br>"  .$objAcademicReport->GetProperty("ErrorMessages"). "<br>". $this->mErrorMessage;
            $this->ShowErrorBox();
         }
         
         $dataPrestasi = $objAcademicReport->GetAcademicSummaryReportForMahasiswa();
         if (false !== $dataPrestasi) {
            $prestasi[0]['sks_diambil'] = $dataPrestasi[0]['mhsSksTranskrip'];
            $prestasi[0]['matakuliah_diambil'] = $dataKkm[0]['matakuliah_diambil'];
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
			$this->AddVar("content", "URL_BACK", $this->mrConfig->GetURL('dosen','mentored_students','view').
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
         $this->ComposeErrorMessage("Pengambilan data kartu kemajuan mahasiswa tidak berhasil. " , $this->mErrorMessage));
      $this->SetAttribute('error_box', 'visibility', 'visible');
   }
}
?>