<?php
/**
 * DisplayViewGradeKuisioner
 * DisplayViewGradeKuisioner class
 * 
 * @package dosen 
 * @author Cecep SP
 * @copyright Copyright (c) 2020 GamaTechno
 * @version 1.0 
 * @date 2020-06-23
 * @create
 *
 */
   
class DisplayViewGradeKuisioner extends DisplayBaseFull {
   /**
    * var mErrorMessage string error message
    */
   var $mErrorMessage;
   
   /**
    * var mDosenServiceObj object DosenClientService
    */
   var $mDosenServiceObj;
   
   /**
    * var mServiceServerAddress string alamat server service
    */
   var $mServiceServerAddress;
   
   /**
    * var mKelasId integer kelas id
    */
   var $mKelasId;
   
   /**
    * var mSemesterIdToView integer kelas id
    */
   var $mSemesterIdToView;
   var $mPerNif;
   var $mHalaman;
   var $mAfterProc;
   var $dsnNip;
   var $ketUjian;
    /**
    * DisplayViewGradeKuisioner::DisplayViewGradeKuisioner
    * Constructor
    *
    * @param configObject object Configuration
    * @param security object Security
    * @param errMsg string error message
    */
   function DisplayViewGradeKuisioner(&$configObject, &$security, $errMsg,$semester, $kelas, $serverAddress, $halaman, $perNif, $afterProc, $prodi_kode_kelas, $dsnNip, $ketUjian) {
      DisplayBaseFull::DisplayBaseFull($configObject, $security);
      $this->mErrorMessage = $errMsg;
      $this->mKelasId = $kelas;
      $this->mServiceServerAddress = $serverAddress;
      $this->mHalaman = $halaman;
	  $this->mPerNif=$perNif;
	  $this->mFinansiServiceAddress = $this->mrUserSession->GetProperty("FinansiServiceAddress");      

      $this->mDosenServiceObj = new DosenClientService($this->mServiceServerAddress, false, 
                         $this->mrUserSession->GetProperty("UserReferenceId"), $this->mrUserSession->GetProperty("UserProdiId"));
      $this->mSemesterIdToView = $semester;
      $this->mKodeProdiKelas = $prodi_kode_kelas;  // add ccp 10 maret 2017
      $this->mDsnNip = $dsnNip;  
      $this->mKetUjian = $ketUjian;  
      $this->SetErrorAndEmptyBox();  
      $this->SetTemplateBasedir($configObject->GetValue('app_module') . 'kuisioner_dosen/templates');
	  $this->SetTemplateFile('view_grade_kuisioner.html');
	  $this->mAfterProc=$afterProc;
	  
      
   }
   
   function GetKuisionerGrade()
   {
      $dataNilai = $this->mDosenServiceObj->GetKuisionerDosenForKelas($this->mKelasId,$this->mDsnNip,$this->mKetUjian);
      if (false === $dataNilai) {
         return false;
      } else {
         return $dataNilai;
      }
   }
   
   function GetKuisionerKomentar()
   {
      $dataNilai = $this->mDosenServiceObj->GetKuisionerDosenForKelasKomentar($this->mKelasId,$this->mDsnNip,$this->mKetUjian);
      if (false === $dataNilai) {
         return false;
      } else {
         return $dataNilai;
      }
   }
  
   function DoInitializeService() {
  
      if ($this->mDosenServiceObj->IsError()) {
         $this->mErrorMessage .= $this->mDosenServiceObj->GetProperty("ErrorMessages");
         return false;
      }else{
         $this->mDosenServiceObj->SetProperty("UserRole", $this->mrUserSession->GetProperty("Role"));
         if (false === $this->mDosenServiceObj->DoSiaSetting()) {
            $arrService = $this->mrUserSession->GetProperty("ServerServiceAvailable");
            if ($this->mDosenServiceObj->IsError() && $this->mDosenServiceObj->GetProperty("FaultMessages")==""){
               $arrService["SIA"] = false;
            } else {
               $arrService["SIA"] = true;
            }
            $this->mErrorMessage .= $this->mDosenServiceObj->GetProperty("ErrorMessages");
            $this->mrUserSession->SetProperty("ServerServiceAvailable", $arrService);
            $this->mrSecurity->RefreshSessionInfo();   
            return false;
         } else {
            return true;
         }
      }
   }   
   
   function GetInfoKelas() {
      
      $proposedClassObj = new ProposedClassesClientService($this->mServiceServerAddress, false, 
                         $this->mrUserSession->GetProperty("UserReferenceId"), $this->mrUserSession->GetProperty("UserProdiId"));
      $proposedClassObj->SetProperty("ClassId", $this->mKelasId);
      $dataKelas = $proposedClassObj->GetAllInfoDetailForClass();
      return $dataKelas;
   }
   
   function Display() {   	
      // cek apakah service sia is available
      $init = $this->DoInitializeService();
      DisplayBaseFull::Display("[ Logout ]");
      if ($init === false){
         $this->ShowErrorBox();
      } else {
         $dataKelas = $this->GetInfoKelas(); 
         $kodeProdi = $dataKelas['detil'][0]['kode_prodi']; 

         if ($dataKelas != false){
            if (isset($dataKelas["detil"][0]["nama"]))
               $this->AddVar("content", "MATAKULIAH", $dataKelas["detil"][0]["nama"]);
            if (isset($dataKelas["detil"][0]["nama_mata_kuliah"]))
               $this->AddVar("content", "KELAS", $dataKelas["detil"][0]["nama_mata_kuliah"]);
         }
         
         $semesterInfo = $this->mDosenServiceObj->GetNamaSemesterForSemesterId($this->mSemesterIdToView);
         $semesterInfo  = $semesterInfo[0]["nama"] ." ". $semesterInfo[0]["tahun"] ."/". ($semesterInfo[0]["tahun"] + 1);
         $this->AddVar("content", "SEMESTER", $semesterInfo );
		 $url_print= $this->mrConfig->GetURL('kuisioner_dosen', 'dosen', 'print') .
						'&kelas=' . $this->mrConfig->Enc($dataKelas['detil'][0]['klas_id']) .
						'&smt=' . $this->mrConfig->Enc($this->mSemesterIdToView) . 
                        '&sia=' . $this->mrConfig->Enc($this->mServiceServerAddress) .
						'&pkk='.$this->mrConfig->Enc($this->mKodeProdiKelas) ;
		 $this->AddVar("content", "URL_PRINT", $url_print ); //add ccp 18-12-2018
         // $dataNilaiBobot=$this->GetNilaiBobot();
         $dataMatakuliahDiampu = $this->GetKuisionerGrade();
		 $this->SetAttribute('data_matakuliah_diampu', 'visibility', 'hidden');
         if (false !== $dataMatakuliahDiampu and count($dataMatakuliahDiampu)>0) {
			$this->SetAttribute('data_matakuliah_diampu', 'visibility', 'visible');
			$this->AddVar("data_matakuliah_diampu", "MATAKULIAH_DIAMPU_AVAILABLE", "YES");
			// for($i = 0; $i < count($dataMatakuliahDiampu); $i++) {
				// $dataMatakuliahDiampu[$i]['id'] = $this->mrConfig->Enc($dataMatakuliahDiampu[$i]['id']);
				// $dataMatakuliahDiampu[$i]['urldetail'] = $this->mrConfig->GetURL('kuisioner_dosen', 'grade_kuisioner', 'view') . '&kelas=' . $dataMatakuliahDiampu[$i]['id'] .'&smt=' . $this->mrConfig->Enc($this->mSemesterId) .'&sia=' . $this->mrConfig->Enc($serverUsed) ;
			// }
            $this->ParseData("data_matakuliah_diampu_item", $dataMatakuliahDiampu, "MK_DIAMPU_", 1);
         } else { 
			$this->SetAttribute('data_matakuliah_diampu', 'visibility', 'visible');
			$this->AddVar("data_matakuliah_diampu", "MATAKULIAH_DIAMPU_AVAILABLE", "NO");
            $this->mErrorMessage .= $this->mDosenServiceObj->GetProperty("ErrorMessages");
            // $this->AddVar("nilai", "NILAI_AVAILABLE", "NO");
            // $this->AddVar("empty_type", "TYPE", "INFO");
            $this->AddVar("empty_box", "WARNING_MESSAGE",$this->ComposeErrorMessage("Pengambilan data kuisioner tidak ada. \nBelum ada mahasiswa yang mengisi kuisioner di kelas ini. \n" , $this->mErrorMessage));   
         }
		 
		 $dataKomentar = $this->GetKuisionerKomentar();
		 $this->SetAttribute('data_matakuliah_diampu_k', 'visibility', 'hidden');
		 if (false !== $dataKomentar and count($dataKomentar)>0) {
			$this->SetAttribute('data_matakuliah_diampu_k', 'visibility', 'visible');
			$this->AddVar("data_matakuliah_diampu_k", "MATAKULIAH_DIAMPU_AVAILABLE_K", "YES");
            $this->ParseData("data_matakuliah_diampu_item_k", $dataKomentar, "MK_KOMEN_", 1);
         } else { 
			$this->SetAttribute('data_matakuliah_diampu_k', 'visibility', 'visible');
			$this->AddVar("data_matakuliah_diampu_k", "MATAKULIAH_DIAMPU_AVAILABLE_K", "NO");
            $this->mErrorMessage .= $this->mDosenServiceObj->GetProperty("ErrorMessages");
            $this->AddVar("empty_box", "WARNING_MESSAGE",$this->ComposeErrorMessage("Pengambilan data komentar tidak ada. \nBelum ada mahasiswa yang mengisi komentar di kelas ini. \n" , $this->mErrorMessage));   
         }
      }  
      $this->AddVar("content", "URL_PROCESS", $this->mrConfig->GetURL("kuisioner_dosen", "kuisioner_dosen", "view")."&from=nilai&sem=".$this->mSemesterIdToView);

      $this->AddVar("content", "KLS", $this->mrConfig->Enc($this->mKelasId));
      $this->AddVar("content", "KODE_PRODI", $this->mrConfig->Enc($kodeProdi));
      $this->AddVar("content", "SIA", $this->mrConfig->Enc($this->mServiceServerAddress));
      $this->AddVar("content", "SMT", $this->mrConfig->Enc($this->mSemesterIdToView));
      $this->DisplayTemplate();
   }
   
   function ShowErrorBox($strError = "Pengambilan data MatakuliahDitawarkan tidak berhasil. \n") {
      $this->AddVar("error_box", "ERROR_MESSAGE",  
            $this->ComposeErrorMessage($strError , $this->mErrorMessage));   
      $this->SetAttribute('error_box', 'visibility', 'visible');
   }

    function ShowInfoBox($strError = "Pengambilan data MatakuliahDitawarkan berhasil. \n") {
      $this->AddVar("error_box", "ERROR_MESSAGE",  
            $this->ComposeErrorMessage($strError , $this->mErrorMessage));
            $this->AddVar("error_type", "TYPE", "INFO");   
      $this->SetAttribute('error_box', 'visibility', 'visible');
   }
   
   
}
?>