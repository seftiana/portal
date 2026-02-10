<?php
/**
 * DisplayViewCourseSupported
 * DisplayViewCourseSupported class
 *
 * @package display
 * @author Ageng Prianto
 * @copyright Copyright (c) 2006 GamaTechno
 * @version 1.0
 * @date 2006-03-23
 * @revision Maya Alipin 2006-08-02
 *
 */

class DisplayViewCourseSupported extends DisplayBaseFull {
   
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
     * DisplayViewCourseSupported::DisplayViewCourseSupported
     * Constructor for DisplayViewCourseSupported
     *
     * @param $configObject object configuration
     * @param $security object security
     * @param $errMsg Error Messages
     * @return void
     */
   function DisplayViewCourseSupported(&$configObject, &$security, $dsnNip, $prodiId, $viewFrom, $semesterId, $sia, $errMsg) {
      DisplayBaseFull::DisplayBaseFull($configObject, $security);
      
      $this->mErrorMessage = $errMsg;
      $this->mViewedFrom = $viewFrom;
      $this->mDosenNip = $dsnNip;
      $this->mDosenProdiId = $prodiId;
      $this->mSemesterId = $semesterId;
      $this->mServiceServer = $sia;
         
      $this->SetErrorAndEmptyBox();
      $this->SetTemplateBasedir($configObject->GetValue('app_module') . 'dosen/templates/');
      $this->SetTemplateFile('view_course_supported.html');
   }
   
   /**
     * DisplayViewCourseSupported::GetDataDosen
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
     * DisplayViewCourseSupported::GetDataSemesterAktif
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
     * DisplayViewCourseSupported::GetDaftarSemester
     * Mengambil data semester yang pernah diampu dosen
     *
     * @param &$objService Object Dosen Service
     * @return object
     */
   function GetDaftarSemester(&$objService) {
      $objService->SetProperty("UserId", $this->mDosenNip);
      $dataSemesterDosen = $objService->GetAllSupportedSemesterDosen();
      return $dataSemesterDosen;
   }
   
   /**
     * DisplayViewCourseSupported::ShowErrorBox
     * Menampilkan pesan Kesalahan
     *
     * @param
     * @return void
     */
   function ShowErrorBox($strError="") {
      if ($strError == ""){
         if ($this->mViewedFrom == "nilai") {
            $strError  = "Pengambilan data pengelolaan nilai tidak berhasil. ";
         } else {
            $strError  = "Pengambilan data matakuliah diampu tidak berhasil. ";
         }
      }
      
      $this->AddVar("error_box", "ERROR_MESSAGE",
            $this->ComposeErrorMessage($strError , $this->mErrorMessage));
      $this->mTemplate->SetAttribute('error_box', 'visibility', 'visible');
   }
   
   /**
     * DisplayViewCourseSupported::ShowEmptyBox
     * Menampilkan pesan Kesalahan data tidak ditemukan
     *
     * @param
     * @return void
     */
   function ShowEmptyBox() {
      if ($this->mViewedFrom == "nilai") {
         $strError  = "Data untuk pengelolaan nilai tidak ditemukan. ";
      } else {
         $strError  = "Data tidak ditemukan. ";
      }
      $this->AddVar("empty_type", "TYPE", "INFO");
      $this->AddVar("empty_box", "WARNING_MESSAGE",
            $this->ComposeErrorMessage($strError,$this->mErrorMessage));
   }
   
   /**
     * DisplayViewCourseSupported::ShowSemesterList
     * Menampilkan combo list semester jika module ini ditampilkan dari pengelolaan nilai
     *
     * @param
     * @return void
     */
   function ShowSemesterList(&$objService, $semAktif) {
      // ambil daftar semesternya, then parse
      $daftarSemester = $this->GetDaftarSemester($objService);
      if(false === $daftarSemester) {
         return false;
      } else {
         $this->mTemplate->SetAttribute('view_semester_list', 'visibility', 'visible');
         for($i = 0; $i < count($daftarSemester); $i++) {
            if(false !== $semAktif) {
               if($daftarSemester[$i]['id'] == $semAktif) {
                  $daftarSemester[$i]['selected'] = 'selected';
                  $this->mNamaSemester = $daftarSemester[$i]["name"];
               } else {
                  $daftarSemester[$i]['selected'] = '';
               }
            }
            $daftarSemester[$i]['id'] = $this->mrConfig->Enc($daftarSemester[$i]['id']);
         }
         $this->ParseData("semester_list", $daftarSemester, "SMT_");
         return true;
      }
   }
   
   /**
     * DisplayViewCourseSupported::ShowUnitList
     * Menampilkan combo list unit sia yang ingin ditampilkan
     *
     * @param
     * @return void
     */
   function ShowUnitList($currServer) {
      $referenceObj = new Reference($this->mrConfig) ;
      $unit = $referenceObj->GetAllUnitData('101');
  
      if ($unit !== false) {
         foreach($unit as $key=>$value) {
            $unit[$key]["addr"] = $this->mrConfig->Enc($value["service_address"]);
            if ($value["service_address"] == $currServer){
               $unit[$key]["selected"] = "selected";
            }else {
               $unit[$key]["selected"] = "";
            }
         }
         $this->AddVar("option_form", "URL_VIEW", $this->mrConfig->GetURL('dosen', 'dosen', 'process'));
         if($this->mViewedFrom == 'nilai')
            $this->AddVar("option_form", "ONCHANGE_SIA_ACTION", 'onChange=\'form.submit()\'');
         else
            $this->AddVar("option_form", "ONCHANGE_SIA_ACTION", '');
         $this->ParseData("unit_list", $unit, "SIA_");
         return true;
      } else {
         $this->mErrorMessage .= $referenceObj->GetProperty("ReferenceErrorMsg");
         $this->mTemplate->SetAttribute("option_form", "visibility", "hidden");
         return false;
      }
   }
   
   /**
     * DisplayViewCourseSupported::Display
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
      // parse data unit sia yang tersedia
      $isUnitAvailable = $this->ShowUnitList($serverUsed);
      
      if (false !== $dataDosen && false !== $isUnitAvailable) {
         
         
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
         
         // cek apakah module ini ditampilkan dari module pengelolaan nilai
         if($this->mViewedFrom != 'self') {
            // tampilkan combo list semester
				$this->AddVar('content', 'JUDUL', 'Pengelolaan Nilai');
            $this->AddVar('keterangan_halaman', 'TYPE', 'NILAI');
            if($this->ShowSemesterList($objDosenService, $semesterAktif)) {
               $isDosenMengajar = true;
            } else {
               $isDosenMengajar = false;
            }
         } else {
				$this->AddVar('content', 'JUDUL', 'Matakuliah Diampu');
            $this->AddVar('keterangan_halaman', 'TYPE', 'MATAKULIAH');
            $this->SetAttribute('data_matakuliah_diampu', 'visibility', 'visible');
	//add ccp 7 maret 2017  untuk menampilkan pilihan semester di menu matakuliah diampu
	    if($this->ShowSemesterList($objDosenService, $semesterAktif)) {
               $isDosenMengajar = true;
            } else {
               $isDosenMengajar = false;
            }
	// end
          //  $isDosenMengajar = true;  //hidden by ccp 7 maret 2017
         }
       
         // parse data matakuliah diampu
         //if(empty($this->mSemesterId) AND $this->mViewedFrom == 'nilai') {  // hidden cecep 17 mei 2017
         if(empty($this->mSemesterId) AND $this->mViewedFrom == 'nilaixxx') { // add cecep 17 mei 2017
            if(!$isDosenMengajar) {
               $this->SetAttribute('button_lihat', 'visibility', 'hidden');
               $this->mErrorMessage = $objDosenService->GetProperty("ErrorMessages");
               $this->ShowErrorBox("Anda tidak mengampu matakuliah di unit ini. ");
            }
            $this->SetAttribute('data_matakuliah_diampu', 'visibility', 'hidden');
            $this->SetAttribute('data_dosen', 'visibility', 'hidden');
         } else {
            if(empty($this->mServiceServer)) {
               $this->SetAttribute('data_matakuliah_diampu', 'visibility', 'hidden');
               $this->SetAttribute('data_dosen', 'visibility', 'hidden');
            } else {
               if(false != $semesterAktif) {
				  if($isDosenMengajar) {
                     // parse data dosen
                     if($this->mViewedFrom == 'nilai' AND !empty($this->mNamaSemester)) {
                        $namaSemester = explode (" ",$this->mNamaSemester);
                        $dataDosen[0]['SEM'] = $this->mNamaSemester . "/" . ++$namaSemester[1];
                     } else {
                        $nextThSemester = $objDosenService->GetProperty("TahunSemester") + 1;
                        $nmSemester = $objDosenService->GetProperty("NamaSemester") . ' ' .
                                      $objDosenService->GetProperty("TahunSemester") . '/' .
                                      $nextThSemester;
                        $dataDosen[0]['SEM'] = $nmSemester;
                     }
                     $this->SetAttribute('view_semester_list', 'visibility', 'hidden'); // add cecep 17 mei 2017
					 $this->SetAttribute('button_lihat', 'visibility', 'hidden'); // add cecep 17 mei 2017
                     $this->SetAttribute('data_dosen', 'visibility', 'visible');
					 $this->ParseData("data_dosen", $dataDosen, "DOSEN_");
                     
                     // ambil data matakuliah yang diampu dosen yang bersangkutan pada semester yang dikehendaki
                     $this->SetAttribute('data_matakuliah_diampu', 'visibility', 'visible');
                     $objDosenService->SetProperty("SemesterProdiSemesterId", $semesterAktif);
                     $dataMatakuliahDiampu = $objDosenService->GetAllCoursesSupportedDosenForSemester();
                     if(false === $dataMatakuliahDiampu) {
                        $this->AddVar("data_matakuliah_diampu", "MATAKULIAH_DIAMPU_AVAILABLE", "NO");
                        $this->mErrorMessage = $this->mErrorMessage. $objDosenService->GetProperty("FaultMessages");
                        $this->ShowEmptyBox();
                     } else {
                        $this->AddVar("data_matakuliah_diampu", "MATAKULIAH_DIAMPU_AVAILABLE", "YES");
                        // tentukan URLDETAIL untuk kelas
                        for($i = 0; $i < count($dataMatakuliahDiampu); $i++) {
                           $dataMatakuliahDiampu[$i]['id'] = $this->mrConfig->Enc($dataMatakuliahDiampu[$i]['id']);
						   $dataMatakuliahDiampu[$i]['OBE_AKSI'] = '';
                           if($this->mViewedFrom == 'nilai'){
                              // arahkan detail ke daftar mahasiswa yang ingin dikelola nilainya
                              $dataMatakuliahDiampu[$i]['urldetail'] = $this->mrConfig->GetURL('dosen', 'grade_management', 'view') .
                                                                       // '&kelas=' . $dataMatakuliahDiampu[$i]['id'] .'&smt=' . $this->mrConfig->Enc($this->mSemesterId) .
									'&kelas=' . $dataMatakuliahDiampu[$i]['id'] .'&smt=' . $this->mrConfig->Enc($dataMatakuliahDiampu[$i]['sem_kelas']) . // add ccp 17 mei 2017
                                                                        '&sia=' . $this->mrConfig->Enc($serverUsed) .'&pkk='.$this->mrConfig->Enc($dataMatakuliahDiampu[$i]['prodi_kode_kelas']) ;
                           	 $dataMatakuliahDiampu[$i]['url_presensi'] = $this->mrConfig->GetURL('dosen', 'grade_management', 'view') .
                                                                       // '&kelas=' . $dataMatakuliahDiampu[$i]['id'] .'&smt=' . $this->mrConfig->Enc($this->mSemesterId) .
									'&kelas=' . $dataMatakuliahDiampu[$i]['id'] .'&smt=' . $this->mrConfig->Enc($dataMatakuliahDiampu[$i]['sem_kelas']) . // add ccp 17 mei 2017
                                                                        '&sia=' . $this->mrConfig->Enc($serverUsed) .'&pkk='.$this->mrConfig->Enc($dataMatakuliahDiampu[$i]['prodi_kode_kelas']) ;
								$dataMatakuliahDiampu[$i]['CAPT_AKSI'] = "Input";
								$dataMatakuliahDiampu[$i]['OBE_AKSI'] = ($dataMatakuliahDiampu[$i]['total_cpmk']==0)?'':'onclick="alert(\'Kelas OBE, silahkan ke menu input nilai OBE !!\'); return false;"';
								$dataMatakuliahDiampu[$i]['OBE_NOTIF'] = ($dataMatakuliahDiampu[$i]['total_cpmk']==0)?'':' <sup><font color="red">obe</font><sup>';
							}else {
                              // arahkan detail ke detail kelas
                              $module = 'dosen|course_supported|view';
                              $dataMatakuliahDiampu[$i]['urldetail'] = $this->mrConfig->GetURL('proposed_classes', 'proposed_classes_detail', 'view') .
                                                                        '&kelas=' . $dataMatakuliahDiampu[$i]['id'] . '&sia=' . $this->mrConfig->Enc($serverUsed) .
                                                                        '&modul=' . $this->mrConfig->Enc($module) . '&addparam=' . $this->mrConfig->Enc('sia') .
                                                                        '&addval=' . $this->mrConfig->Enc($serverUsed);
							$dataMatakuliahDiampu[$i]['url_presensi'] = $this->mrConfig->GetURL('dosen', 'presence_class', 'view').'&sem='.$this->mrConfig->Enc($dataMatakuliahDiampu[$i]['sem_kelas']).'&kls=' . $dataMatakuliahDiampu[$i]['id']; // add ccp 17 mei 2017
							$dataMatakuliahDiampu[$i]['CAPT_AKSI'] = "Presensi";
                           }
			//$dataMatakuliahDiampu[$i]['url_presensi'] = $this->mrConfig->GetURL('dosen', 'presence_class', 'view').'&sem='.$this->mrConfig->Enc($semesterAktif).'&kls=' . $dataMatakuliahDiampu[$i]['id'];
			
			$dataMatakuliahDiampu[$i]['kelas'] = str_replace('-','',substr($dataMatakuliahDiampu[$i]['kelas'],-2,2)); // add ccp 17 mei 2017
                        }
                        $this->ParseData("data_matakuliah_diampu_item", $dataMatakuliahDiampu, "MK_DIAMPU_", 1);
                     }
                  } else {
                     $this->SetAttribute('button_lihat', 'visibility', 'hidden');
                     $this->mErrorMessage = $objDosenService->GetProperty("ErrorMessages");
                     $this->ShowErrorBox("Anda tidak mengampu matakuliah di unit ini. ");
                  }
               } else {
                  $this->SetAttribute('option_form', 'visibility', 'hidden');
                  $this->mErrorMessage = $this->mErrorMessage . $objDosenService->GetProperty("ErrorMessages");
                  $this->ShowErrorBox("Data semester aktif tidak ditemukan. ");
               }
            }
         }
      } else {
         $this->mTemplate->SetAttribute("option_form", "visibility", "hidden");
         $this->ShowErrorBox();
      }
      
      $this->DisplayTemplate();
   }
}
?>