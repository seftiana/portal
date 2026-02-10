<?php
   /**
   * DisplayViewProposedClassesKrs
   * DisplayViewProposedClassesKrs class
   * 
   * @package communication 
   * @author Yudhi Aksara, S.Kom
   * @copyright Copyright (c) 2006 GamaTechno
   * @version 1.0 
   * @date 2006-03-07
   * @revision Maya Alipin 2006.03.24
   *
   */
   
   class DisplayViewProposedClassesKrs extends DisplayBaseFull {
   	/**
     * var mUserId integer user id
     */
   var $mUserId;
   
      var $mUserRole;
      var $mMahasiswaNiu;
      var $mMahasiswaProdiId;
      var $mNamaSemester;
      var $mErrorMessage;
      var $mCurrentPeriode;
      var $mIsCekAdministrasi;
      var $mObjKrsService;
      var $mAdditionalUrl;
      
      function DisplayViewProposedClassesKrs(&$configObject, &$security, $userRole, $mhsniu, $prodiId, $errMsg, $sia, $view) {
         DisplayBaseFull::DisplayBaseFull($configObject, $security);
         $this->mUserId = $security->mUserIdentity->GetProperty("UserReferenceId");
         $this->mUserRole = $userRole;
         $this->mMahasiswaProdiId = $prodiId;
         $this->mMahasiswaNiu = $mhsniu;
         $this->mErrorMessage = $errMsg;
         $this->SetErrorAndEmptyBox();  
         $this->SetTemplateBasedir($configObject->GetValue('app_module') . 'kbk_proposed_classes/templates/');
         $this->SetTemplateFile('view_proposed_classes_krs.html');
         if ($view != ""){
            $this->mAdditionalUrl = "&sia=" . $sia . "&view=" . $view ;
         }
      }
      
      
      /**
      * DisplayViewProposedClassesKrs :: GetProposedClassesKrsMahasiswa
      * Method ini digunakan untuk mengambil data ProposedClassesKrs mahasiswa pada semester aktif
      *
      * @param
      * @return array Data ProposedClassesKrs
      */
      function GetDataMatakuliahKrsDitawarkan($mhsNiu)
      {
         $krsItem = $this->mObjKrsService->GetAllProposedClassesKrsForSemester($mhsNiu);
         if (false === $krsItem) {
            return false;
         }
         else {
            return $krsItem;
         }
      }
   
      function DoInitializeService() {
         $this->mObjKrsService =  New ProposedClassesClientService($this->mrUserSession->GetProperty("ServerServiceAddress"),false, $this->mMahasiswaNiu, $this->mMahasiswaProdiId);
         if ($this->mObjKrsService->IsError()) {
            $this->mErrorMessage .= $this->mUserService->GetProperty("ErrorMessages");
         }else{
            $arrService = $this->mrUserSession->GetProperty("ServerServiceAvailable");
            $this->mObjKrsService->SetProperty("UserRole", $this->mrUserSession->GetProperty("Role"));
				$result = $this->mObjKrsService->DoSiaSetting();
				$this->DoUpdateServiceStatus($this->mObjKrsService, $result, 'SIA');
            if (false === result) {
               $this->mErrorMessage .= $objUserService->GetProperty("ErrorMessages");
            }
				return $result;
         }
      }
      
      function Display() {
      	 $mhsNiu = $this->mMahasiswaNiu;
      	 
         // cek apakah service sia is available
         $init = $this->DoInitializeService();
         DisplayBaseFull::Display("[ Logout ]");
         if (false === $init){
            $this->ShowErrorBox();
         } else {
            $this->AddVar("keterangan", "PRODI", $this->mrUserSession->GetProperty("UserProdiName"));
            $thSemester = $this->mObjKrsService->GetProperty("TahunSemester") + 1;
            $this->AddVar("keterangan", "SEMESTER",$this->mObjKrsService->GetProperty("NamaSemester")." ".$this->mObjKrsService->GetProperty("TahunSemester") ." / ".$thSemester);
            
            $dataMkul = $this->GetDataMatakuliahKrsDitawarkan($mhsNiu);            
            //echo "<pre>";print_r($dataMkul); echo "</pre>";exit;
			   
            if (false !== $dataMkul) {
               $semester_sebelum = $dataMkul[0]['SEMESTER_KURIKULUM'];
               $is_odd = "ODD";


				/*	BEGIN: tambahan untuk checking "SKS Paket"	*/
				$semesterInfo = $this->mObjKrsService->GetSemesterInformation($this->mObjKrsService->GetProperty("SemesterProdiId"));
				if ($semesterInfo[0]['is_paket_semester'] == 1) {
					$semesterList = $this->mObjKrsService->GetAllPassedSemesterMahasiswa();
					$semesterPassed = count($semesterList);
					
					/* get angkatan */
					$this->mObjUserService = New UserClientService($this->mrUserSession->GetProperty("ServerServiceAddress"),false, $this->mMahasiswaNiu);
					$this->mObjUserService->SetProperty("UserRole", $this->mrUserSession->GetProperty("Role"));
					$dataMhs = $this->mObjUserService->GetUserInfo();
					$mhsAngkatan = $dataMhs[0]['angkatan'];
					$semesterId = $this->mObjKrsService->GetProperty("SemesterProdiSemesterId");
					
					$semesterKe = ((substr($semesterId, 0, 4) - $mhsAngkatan) * 2) + (substr($semesterId, -1)); // (semTahun-angkatan)*2 + semGanjilGenap
					if ($semesterKe <= 0) {
						$semesterKe = $semesterPassed;
					}
					
					/* Overide, semester berapa yang bersangkutan sekarang */ $semesterPassed = $semesterKe - 1;
					
					$dataMkulBackup = $dataMkul;
					$dataMkulTemp = array();
					
					$temp = 0;
					$semester_temp = NULL;
					for($i=0;$i<count($dataMkul);$i++){
						if ($semester_temp != $dataMkul[$i]['SEMESTER_KURIKULUM']) {
							$temp++;
						}
						$semester_temp = $dataMkul[$i]['SEMESTER_KURIKULUM'];
						
						/* Overide, langsung menggunakan semester_kurikulum */	$temp = $dataMkul[$i]['SEMESTER_KURIKULUM'];
						
						if ($temp > ($semesterPassed + 1)) {	// jumlah semester sebelumnya + semester sekarang
							break;
						} else {
							$dataMkulTemp[$i] = $dataMkul[$i];
						}
					}
					
					$dataMkul = $dataMkulTemp;
					
					/* 
					print_r($semesterList);
					print_r($semesterPassed);
					echo "<pre>";print_r($dataMkulBackup); echo "</pre>";
					echo "<pre>";print_r($dataMkul); echo "</pre>";
					 */
				}
				/*	END: tambahan untuk checking "SKS Paket"	*/


               
               for($i=0;$i<count($dataMkul);$i++) {
               $this->addVar('matakuliah','MK_AVAILABLE','YES');
               
               // masukkan data matakuliah
               $dataMkul[$i]['NUMBER'] = $i+1;
               
               //proses tanggal jadwal ujian
                  if(!empty($dataMkul[$i]['jadwalUjian'])) {
                     //$dataMkul[$i]['jadwalUjian'] = '<center>--</center>';
//                  }
  //                else {
                     $listTglUjian = explode("|", $dataMkul[$i]['jadwalUjian']);
                     for($j=0; $j<count($listTglUjian); $j++) {
                        $tmp = explode(",", $listTglUjian[$j]);
                        if ($tmp[0] != '') 
                           $tmp[0] = "<b>".$this->IndonesianDate($tmp[0]) ."</b> ";
                        //else 
                           //$tmp[0] = '<center>--</center>';
                        $tmpTime = str_replace("-",":", $tmp[1]);
                        $tmpTime = explode(":", $tmpTime);
                        //echo $tmpTime; exit; 
                        $tmp[1] = $tmpTime[0] . ':' . $tmpTime[1] . '-' . $tmpTime[3] . ':' . $tmpTime[4];
                        $tglUjian = implode(" ", $tmp);
                        $listTglUjian[$j] = $tglUjian;
                     }
                     $dataMkul[$i]['jadwalUjian'] = implode("<br>", $listTglUjian);
                  }
                  
                                    //proses jadwal kuliah
                  if(!empty($dataMkul[$i]['jadwalKuliah'])) {
//                     $dataMkul[$i]['jadwalKuliah'] = '<center>--</center>';
 //                 }
  //                else {
                     $listHariKuliah = explode("|", $dataMkul[$i]['jadwalKuliah']);
                     for ($j=0;$j<count($listHariKuliah);$j++) {
                        $tmp = explode(",", $listHariKuliah[$j]);
                        //echo("<pre>");print_r($tmp);echo("</pre>");
                        if ($tmp[0] != '')
                           $tmp[0] = "<b>".$tmp[0]."</b>";
                        //else
                           //$tmp[0] = '<center>--</center>';
                     $tmpTime = str_replace("-",":", $tmp[1]);
                     $tmpTime = explode(":", $tmpTime);
                     $tmp[1] = $tmpTime[0] . ':' . $tmpTime[1] . '-' . $tmpTime[3] . ':' . $tmpTime[4];
                     $hariKuliah = implode(" ", $tmp);
                     $listHariKuliah[$j] = $hariKuliah;
                  }
                     $dataMkul[$i]["jadwalKuliah"] = implode("<br>", $listHariKuliah);
                  }
                  
                  $hint = $dataMkul[$i]['kode_mata_kuliah']." ";
                  $hint .= $dataMkul[$i]['wp_nama']." ";
                  $hint .= $dataMkul[$i]['nama_prodi'];
                  $dataMkul[$i]['hint'] = $hint;
                  $idCheckbox = $this->mrConfig->Enc($dataMkul[$i]['kelas_id']."|".$dataMkul[$i]['id']."|".$dataMkul[$i]['wp']."|".$dataMkul[$i]['jumlah_sks']."|".$dataMkul[$i]['kode_mata_kuliah']);
                  $dataMkul[$i]['id'] = $idCheckbox;
                
               if ($is_odd == "ODD" ) {
                   $is_odd = "EVEN";
               } else {
                   $is_odd="ODD";
               }

               $this->addVar('matakuliah_item','ODDEVEN',$is_odd);
                     
               $this->mTemplate->addVars('matakuliah_item',$dataMkul[$i],"TAWAR_");
               $this->mTemplate->parseTemplate('matakuliah_item','a');
                                 
                  // insert data untuk semester yang mungkin 
                  if (($semester_sebelum != $dataMkul[$i+1]['SEMESTER_KURIKULUM']) && ($dataMkul[$i+1]['SEMESTER_KURIKULUM'] <> '') ) {
                      $this->addVar('paket_semester','NUM',$semester_sebelum);
                      $this->mTemplate->parseTemplate('matakuliah','a');
                      $this->mTemplate->parseTemplate('paket_semester','a');
                      $semester_sebelum = $dataMkul[$i+1]['SEMESTER_KURIKULUM'];
                      $this->mTemplate->clearTemplate('matakuliah_item');
                      $this->mTemplate->clearTemplate('matakuliah',true);
                  }
               }   
               $this->mTemplate->parseTemplate('matakuliah','a');           
               $this->addVar('paket_semester','NUM',$semester_sebelum);               
               $this->mTemplate->parseTemplate('paket_semester','a');
            }
            else {
               $this->mErrorMessage = $this->mObjKrsService->GetProperty("FaultMessages");
               $this->AddVar("empty_box", "WARNING_MESSAGE",  
               $this->ComposeErrorMessage("Data tidak ditemukan. " , $this->mErrorMessage));   
               $this->AddVar("matakuliah", "MK_AVAILABLE", "NO");   
               $this->SetAttribute("btn_tambah", "visibility", "hidden");   
               $this->AddVar('empty_type', 'TYPE', "INFO");
            }
         }
         $this->AddVar('content','form_aksi', $this->mrConfig->GetURL('kbk_academic_plan','academic_plan','process') . 
            "&niu=" . $this->mrConfig->Enc($this->mMahasiswaNiu) ."&prodi=" .$this->mrConfig->Enc($this->mMahasiswaProdiId).
            $this->mAdditionalUrl);
         $this->DisplayTemplate();
      }
      
      function ShowErrorBox() {
         $this->AddVar("error_box", "ERROR_MESSAGE",  
               $this->ComposeErrorMessage("Pengambilan data MatakuliahDitawarkan tidak berhasil. " , $this->mErrorMessage));   
         $this->SetAttribute('error_box', 'visibility', 'visible');
      }
   }
?>