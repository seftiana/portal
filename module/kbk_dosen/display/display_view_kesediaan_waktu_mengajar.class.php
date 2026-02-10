<?php
class DisplayViewKesediaanWaktuMengajar extends DisplayBaseFull {
   
   /**
     * var $mErrorMessage string Error Messages
     */
   var $mErrorMessage;
   
   /**
     * var $mViewedFrom string indicate from where module would be loaded
     */
   var $mViewedFrom;
   
   /**
     * var $mDosenNip string NIP Dosen
     */
   var $mDosenNip;
   
   /**
     * var $mDosenProdiId string Prodi Id Dosen
     */
   var $mDosenProdiId;
   
   /**
     * var $mSemesterId string Semester Id Matakuliah Diampu
     */
   var $mSemesterId;
   
   /**
     * var $mNamaSemester string Nama Semester Matakuliah Diampu
     */
   var $mNamaSemester;
   
   /**
     * var $mServiceServer string Service Server Address
     */
   var $mServiceServer;
   
   /**
     * DisplayViewKesediaanWaktuMengajar::DisplayViewKesediaanWaktuMengajar
     * Constructor for DisplayViewKesediaanWaktuMengajar
     *
     * @param $configObject object configuration
     * @param $security object security
     * @param $errMsg Error Messages
     * @return void
     */
   function DisplayViewKesediaanWaktuMengajar(&$configObject, &$security, $dsnNip, $prodiId, $viewFrom, $semesterId, $sia, $errMsg) {
      DisplayBaseFull::DisplayBaseFull($configObject, $security);
      
      $this->mErrorMessage = $errMsg;
      $this->mViewedFrom = $viewFrom;
      $this->mDosenNip = $dsnNip;
      $this->mDosenProdiId = $prodiId;
      $this->mSemesterId = $semesterId;
      $this->mServiceServer = $sia;
         
      $this->SetErrorAndEmptyBox();
      $this->SetTemplateBasedir($configObject->GetValue('app_module') . 'dosen/templates/');
      $this->SetTemplateFile('view_kesediaan_waktu_mengajar.html');
   }
   
   /**
     * DisplayViewKesediaanWaktuMengajar::GetDataDosen
     * Mengambil data dosen
     *
     * @param
     * @return void
     */
   function GetDataDosen() {
      $objUserService = new UserClientService($this->mrUserSession->GetProperty("ServerServiceAddress"),
         false, $this->mDosenNip);
      if ($objUserService->IsError()) {
         $this->mErrorMessage .= $this->mUserService->GetProperty("ErrorMessages");
      }else{
         $objUserService->SetProperty("UserRole", 2 );
         $dataUser = $objUserService->GetUserInfo();
			if (false === $dataUser){    
            $this->mErrorMessage .= $objUserService->GetProperty("ErrorMessages");
            $this->mrUserSession->SetProperty("ServerServiceAvailable", $arrService);
            $this->mrSecurity->RefreshSessionInfo();
            return false;
         } else {
            return $dataUser;
         }
      }
   }
   
   /**
     * DisplayViewKesediaanWaktuMengajar::GetDataSemesterAktif
     * Mengambil data semester yang sedang aktif
     *
     * @param &$objService Object Dosen Service
     * @return object
     */
   function GetDataSemesterAktif(&$objService) {
      $objService->SetProperty("UserProdiId", $this->mDosenProdiId);
      $objService->SetProperty("UserRole", $this->mrUserSession->GetProperty("Role"));
      $dataSemesterAktif = $objService->DoSiaSetting();
      return $dataSemesterAktif;
   }
   
   /**
     * DisplayViewKesediaanWaktuMengajar::ShowErrorBox
     * Menampilkan pesan Kesalahan
     *
     * @param
     * @return void
     */
   function ShowErrorBox($strError="") {
      if ($strError == ""){
            $strError  = "Pengambilan data kesediaan waktu mengajar tidak berhasil. ";
      }
      
      $this->AddVar("error_box", "ERROR_MESSAGE",
            $this->ComposeErrorMessage($strError , $this->mErrorMessage));
      $this->mTemplate->SetAttribute('error_box', 'visibility', 'visible');
   }
   
   /**
     * DisplayViewKesediaanWaktuMengajar::ShowEmptyBox
     * Menampilkan pesan Kesalahan data tidak ditemukan
     *
     * @param
     * @return void
     */
   function ShowEmptyBox() {
         $strError  = "Data tidak ditemukan. ";
      $this->AddVar("empty_type", "TYPE", "INFO");
      $this->AddVar("empty_box", "WARNING_MESSAGE",
            $this->ComposeErrorMessage($strError,$this->mErrorMessage));
   }
   
   /**
     * DisplayViewKesediaanWaktuMengajar::Display
     * Parsing data ke Template
     *
     * @param
     * @return void
     */
   function Display() {
      // cek apakah service sia is available
      $dataDosen = $this->GetDataDosen();
      DisplayBaseFull::Display("[ Logout ]");
      
   
      if(empty($this->mServiceServer)) {
         $serverUsed = $this->mrUserSession->GetProperty("ServerServiceAddress");
         $this->mServiceServer = $serverUsed;
		 }
      else {
         $serverUsed = $this->mServiceServer;
	  }      
      
      if (false !== $dataDosen) {
         
         
         $objDosenService = new DosenClientService($serverUsed, false, $this->mDosenNip, $this->mDosenProdiId);
         
         if(empty($this->mSemesterId)) {
            // module ditampilkan dari matakuliah diampu, ambil semester aktif
            if($procSemAktif = $this->GetDataSemesterAktif($objDosenService)) {
               $semesterAktif = $objDosenService->GetProperty("SemesterProdiSemesterId");
            } else
               $semesterAktif = false;
         } else {
            $semesterAktif = $this->mSemesterId;
         }
         
			$this->AddVar('content', 'JUDUL', 'Kesediaan Waktu Mengajar');
       
		   if(false != $semesterAktif) {
				 // parse data dosen
					$nextThSemester = $objDosenService->GetProperty("TahunSemester") + 1;
					$nmSemester = $objDosenService->GetProperty("NamaSemester") . ' ' .
								  $objDosenService->GetProperty("TahunSemester") . '/' .
								  $nextThSemester;
				$dataDosen[0]['SEM'] = $nmSemester;
				$this->SetAttribute('data_dosen', 'visibility', 'visible');
				$this->ParseData("data_dosen", $dataDosen, "DOSEN_");
				 
				 $dataKesediaan = $objDosenService->executeMethod('getDataKesediaanWaktuMengajar', array($this->mDosenNip));
				 $this->AddVar("content", "FORM_TAMBAH", $this->mrConfig->GetURL('dosen','form_kesediaan_waktu_mengajar','view'));
				 $this->AddVar("content", "FORM_AKSI", $this->mrConfig->GetURL('dosen','dosen','process'));
				 if(false === $dataKesediaan) {
					$this->AddVar("data_waktu", "AVAILABLE", "NO");
					$this->mErrorMessage = $this->mErrorMessage. $objDosenService->GetProperty("FaultMessages");
					$this->ShowEmptyBox();
				 } else {
					$this->AddVar("data_waktu", "AVAILABLE", "YES");
					for($i = 0; $i < count($dataKesediaan); $i++) {
					   $dataKesediaan[$i]['id'] = $this->mrConfig->Enc($dataKesediaan[$i]['id']);
						  // arahkan detail ke detail kelas
						  $module = 'dosen|kesediaan_waktu_mengajar|view';
						  $dataKesediaan[$i]['urlubah'] = $this->mrConfig->GetURL('dosen', 'form_kesediaan_waktu_mengajar', 'view') .
								'&w=' . $dataKesediaan[$i]['id'] . '&sia=' . $this->mrConfig->Enc($serverUsed) .
								'&modul=' . $this->mrConfig->Enc($module) . '&addparam=' . $this->mrConfig->Enc('sia') .
								'&addval=' . $this->mrConfig->Enc($serverUsed);
					}
					$this->ParseData("data_waktu_item", $dataKesediaan, "", 1);
				 }
		   } else {
			  $this->mErrorMessage = $this->mErrorMessage . $objDosenService->GetProperty("ErrorMessages");
			  $this->ShowErrorBox("Data semester aktif tidak ditemukan. ");
		   }
      } else {
         $this->ShowErrorBox();
      }
      
      $this->DisplayTemplate();
   }
}
?>