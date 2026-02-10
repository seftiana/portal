<?php
   /**
   * DisplayViewKRS
   * DisplayViewKRS class
   * 
   * @package communication 
   * @author Yudhi Aksara, S.Kom
   * @copyright Copyright (c) 2006 GamaTechno
   * @version 1.0 
   * @date 2006-03-07
   * @revision Maya Alipin 2006.09.07
   */
   
   class DisplayViewKRS extends DisplayBaseFull {
      var $mUserRole;
      var $mMahasiswaNiu;
      var $mMahasiswaProdiId;
      var $mErrorMessage;
      var $mCurrentPeriode;
      var $mObjKrsService;
      var $mPeriode;
      var $mViewBy;
		var $mSiaServer;
      
      function DisplayViewKRS(&$configObject, &$security, $userRole, $mhsniu, $prodiId, $errMsg, $viewBy, $siaServer) {
         DisplayBaseFull::DisplayBaseFull($configObject, $security);
         $this->mUserRole = $userRole;
         $this->mMahasiswaProdiId = $prodiId;
         $this->mMahasiswaNiu = $mhsniu;
         $this->mErrorMessage = $errMsg;
         $this->mViewBy = $viewBy;
			if ($siaServer == "") {
				$this->mSiaServer = $this->mrUserSession->GetProperty("ServerServiceAddress");
			} else {
				$this->mSiaServer = $siaServer;
			}
         $this->mObjKrsService = new AcademicPlanClientService($this->mSiaServer,false, $this->mMahasiswaNiu, $this->mMahasiswaProdiId);
         $this->mObjKrsService->SetProperty("UserRole", $this->mUserRole);
         $this->mObjKrsService->DoSiaSetting(); 
         $this->SetErrorAndEmptyBox();  
         $this->SetTemplateBasedir($configObject->GetValue('app_module') . 'kbk_academic_plan/templates/');
         $this->SetTemplateFile('view_krs.html');
      }
      
      function GetDataMahasiswa() {
         $objUserService = new UserClientService($this->mrUserSession->GetProperty("ServerServiceAddress"), 
            false, $this->mMahasiswaNiu);
         if ($objUserService->IsError()) {
            $this->mErrorMessage .= $this->mUserService->GetProperty("ErrorMessages");
         }else{
            //$objUserService->SetProperty("UserRole", 1 );
            $objUserService->SetProperty("UserRole", 8 );
            $dataUser = $objUserService->GetUserInfo(1); // nilai 1 untuk lengkap atau tidaknya informasi saat query
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
      * DisplayViewKrs :: GetKrsMahasiswa
      * Method ini digunakan untuk mengambil data KRS mahasiswa pada semester aktif
      *
      * @param
      * @return array Data KRS
      */
      function GetKrsMahasiswa()
      {
         $this->mObjKrsService->SetProperty("UserRole", $this->mUserRole); // userRole dapet dari UserIDentity
         $krsItem = $this->mObjKrsService->GetAllKrsItemForSemester();
         //echo("<pre>");print_r($krsItem);echo("</pre>");exit;
         if (false === $krsItem) {
            $this->mErrorMessage .= $this->mObjKrsService->GetProperty("ErrorMessages");
            return false;
         }
         else {
            return $krsItem;
         }
      }
      
      function CekAdministrasi()
      {
         $this->mObjKrsService->SetProperty("UserRole", $this->mUserRole); 
         $isCekAdministrasi = $this->mObjKrsService->GetProperty("IsCekAdministrasi");
         if ($isCekAdministrasi == '1') {
            //echo 'administrasi ada satu';
            $cekRegistrasi = $this->mObjKrsService->DoCekIsMahasiswaHasRegistrationForSemester();
            if (empty($cekRegistrasi)) {
               //belum registrasi => hanya liat list krs
               $registered = false;
            }
            else {
               // sudah registrasi => bisa add update delete krs
               $registered = true;
            }
         }
         else {
            //echo 'tidak diwajibkan administrasi';
            $registered = true;
         }
         return $registered;
      }
      
      //fungsi untuk mengecek apakah prodi is krs online dan hanya untuk unsri
      function cekProdiIsKrsOnline(){
      	$sempId = $this->mObjKrsService->GetProperty("SemesterProdiId");
      	$prodiIsKrsOnline = $this->mObjKrsService->CekKrsOnline($sempId);
      	//$kbkConfig = $this->mObjKrsService->GetCfgKbk();
      	if(($prodiIsKrsOnline[0]['sempIsKrsOnline'] == '1') /*&& ($kbkConfig[0]['cfgmValue'] == '1')*/){
      		return true;
      	}else{
      		return false;
      	}
      }
      
      function Display() {
         // cek apakah service sia is available
         $dataUser = $this->GetDataMahasiswa();
         $statusKrsOnline = $this->cekProdiIsKrsOnline();
         DisplayBaseFull::Display("[ Logout ]");
         //print_r($this->mrConfig->mValue["app_client"]);
         $modified = false;
         if (!empty($this->mErrorMessage)) {
            $temp = explode("|", $this->mErrorMessage);
            if (isset($temp[1])) {
               if ($temp[0]=="approval") {
                  if ($temp[1]==""){
                     $this->ShowErrorBox("Proses persetujuan KRS berhasil. ");
                     $this->AddVar('error_type','TYPE','INFO');
                  } else {
                     $this->ShowErrorBox("Proses persetujuan KRS tidak berhasil. ");
                  }
               } else if ($temp[0]=="approvalcancelled") {
                  if ($temp[1]==""){
                     $this->ShowErrorBox("Proses persetujuan KRS berhasil. ");
                     $this->AddVar('error_type','TYPE','INFO');
                  } else {
                     $this->ShowErrorBox("Proses persetujuan KRS tidak berhasil. ");
                  }
               }
			} else {
				$err = trim(str_replace('Function Call Error: Server:','',$this->mErrorMessage));
				$showErrorBox = true;
            }
         }
         
         if (false === $dataUser) {
            // service tidak available
            $this->ShowErrorBox("Pengambilan data KRS tidak berhasil. ");
            $this->SetAttribute('mahasiswa','visibility','hidden');
            $this->SetAttribute('krs','visibility','hidden');
         } else {
         
             //parse data user
            $semester = $this->mObjKrsService->GetProperty("NamaSemester") ." ". $this->mObjKrsService->GetProperty("TahunSemester");
            $jatahSks = $this->mObjKrsService->GetJatahMaksimumSksForKrsId();
            if (false === $jatahSks)
               $jatahSks = 0;
            $dataUser[0]['max_sks_diambil'] = $jatahSks;
            $arrTempSem = explode(" ",$semester);
            $dataUser[0]['sem'] = $semester . " / " . (++$arrTempSem[1]);
            
            $this->AddVar('content','id',$this->mrConfig->Enc('krs'));
            $this->ParseData('mahasiswa', $dataUser, "MHS_");
            
            //ambil data krs mahasiswa
            $dataKrs = $this->GetKrsMahasiswa();            
            $dataKrsLokal = array();
            $dataKrsLintas = array();
            
            $dataKrsTambah = array();
            $dataKrsBatal = array();
			
            $dataKrsBatalnonRevisi = array();
            
            $showErrorBox = false || $showErrorBox;
            $empty = false;
            $approved = false;
            
             if (false === $dataKrs) {
               // data krs tidak dapat
               $empty = true;
               $this->AddVar('krs','IS_EMPTY','YES');
               $this->AddVar('empty_type', 'TYPE', "INFO");
               $strMhs = "Anda";
               if ($this->mViewBy == "dosen") {
                  $strMhs = "Mahasiswa";  
               }
               if($statusKrsOnline){
               	$this->AddVar("empty_box", "WARNING_MESSAGE", $this->ComposeErrorMessage($strMhs." belum mengisi KRS. ", $this->GetProperty("ErrorMessage")));
               }else{
               	$this->AddVar("empty_box", "WARNING_MESSAGE", $this->ComposeErrorMessage($strMhs." belum kontrak KRS. ", $this->GetProperty("ErrorMessage")));
               }
               
            } else {
               
               $this->AddVar('krs','IS_EMPTY','NO');
               //$this->AddVar("krs", "MATAKULIAH_TOTAL", count($dataKrs));
               $totSks = 0;
               $totSksBatal = 0;
               $kode = NULL;
               $len = count($dataKrs);
               for ($i=0; $i<$len; $i++) {
                  if ($dataKrs[$i]["APPROVAL"] != 0) {
                     $approved = true;
                  }
                  if(!empty($dataKrs[$i]["KRSDT_ID"]))
                     $dataKrs[$i]["KRSDT_ID"] = $this->mrConfig->Enc($dataKrs[$i]['KRSDT_ID']);
                  if ($dataKrs[$i]['KRS_KODE'] == '1') {
                     // krs lokal
                     if (($dataKrs[$i]['IS_BATAL'] == '0') && ($dataKrs[$i]['IS_REVISI'] == '0'))
                        $dataKrsLokal[$i] = $dataKrs[$i];
                     // krs ditambah
                     if (($dataKrs[$i]['IS_BATAL'] == '0') && ($dataKrs[$i]['IS_REVISI'] == '1'))
                        $dataKrsTambah[$i] = $dataKrs[$i];
                     // krs dibatalkan
                     if (($dataKrs[$i]['IS_BATAL'] == '1') && ($dataKrs[$i]['IS_REVISI'] == '1'))
                        $dataKrsBatal[$i] = $dataKrs[$i];
				     // krs dibatalkan bukan masa revisi
					 if (($dataKrs[$i]['IS_BATAL'] == '1') && ($dataKrs[$i]['IS_REVISI'] == '0'))
                        $dataKrsBatalnonRevisi[$i] = $dataKrs[$i];
                  }
                  else {
                     // krs lintas
                     $dataKrsLintas[$i] = $dataKrs[$i];
                  }
                  
                  $totSks = ($totSks + $dataKrs[$i]['SKS']) - $dataKrsBatal[$i]['SKS'] - $dataKrsBatalnonRevisi[$i]['SKS'];
                  $totSksBatal = $totSksBatal + $dataKrsBatal[$i]['SKS'];
               }
               $this->AddVar("krs", "SKS_TOTAL", $totSks);
               $this->AddVar("krs_batal", "SKS_BATAL_TOTAL", $totSksBatal);
               $this->AddVar("krs", "MATAKULIAH_TOTAL", count($dataKrs) - count($dataKrsBatal));
            }
            $cekRegistrasi = $this->CekAdministrasi();
            $cekPeriode = $this->mObjKrsService->GetProperty("CurrentPeriode");
            $this->AddVar('content','APPROVAL',$approved);
            $cekStatus = $dataUser[0]['status_mhs'];
            $err = "";
            
            /* kode dikomen dibawah ini tidak boleh dihapus */
            /* KBK */
            //$approved = true; // KBK saat ini default sudah disetujui, tidak ada aktivitas persetujuan
            /* -------------------------------------------------------------- */
            
            if ($cekPeriode == 'BUKANPERIODE') {
               /* kode dikomen dibawah ini tidak boleh dihapus */
               // KBK abaikan periode krs
            	if($statusKrsOnline){
            		$err = 'Bukan Periode Krs';
               	$showErrorBox = true;	
            	}
               
            } else {
               if ($this->mViewBy == "mahasiswa"){
                  if ($approved) {
                     //$err = 'KRS tidak dapat diubah, telah disetujui oleh dosen pembimbing. Untuk perubahan harap hubungi dosen pembimbing.';
                     /* kode dikomen dibawah ini tidak boleh dihapus */
                     // KBK tidak ada persetujuan
                     if($statusKrsOnline){
	                     if ($cekPeriode == 'REVISIKRS') {
	                        $err = 'KRS telah disetujui oleh dosen pembimbing. Anda masih dapat melakukan perubahan KRS dengan konsekuensi harus menghubungi kembali dosen pembimbing Anda untuk meminta persetujuan. Silakan pilih tombol <b>"Revisi KRS"</b> untuk melakukan perubahan KRS.';
	                     } else {
	                        $err = 'KRS tidak dapat diubah, telah disetujui oleh dosen pembimbing. Untuk perubahan harap hubungi dosen pembimbing atau lakukan perubahan pada masa revisi KRS';
	                     }	
                     }
                     $modified = false;
                     $showErrorBox = true;
                  } else {
                     /*if ($cekPeriode == 'REVISIKRS') {
                        $err = 'Bukan Periode Krs';
                        $showErrorBox = true;
                     } else {*/
                        if (false == $cekRegistrasi) {
                           $err = 'Anda belum melakukan registrasi';
                           $showErrorBox = true;
                        } else {
                           if ($cekStatus == 'A') {
	                           if($statusKrsOnline){
						            	$modified = true;
						            }else{
						            	$modified = false;
						            }
                              if ($cekPeriode == 'PERIODEKRS') {
                                 $this->mPeriode = 'periode krs';
                              }
                           }
                           else {
                              $err = 'Status anda tidak aktif';
                              $showErrorBox = true;
                           }
                        }
                     //}
                  }
               }  else {
                  if ($approved) {
                     /* kode dikomen dibawah ini tidak boleh dihapus */
                     // KBK tidak ada pesetujuan
                     $err = 'KRS telah disetujui.';
                     $showErrorBox = true;
                  } else { 
                     if ($cekStatus == 'A') {
                     	if($statusKrsOnline){
						        $modified = true;
						      }else{
						      	$modified = false;
						      }
                        if ($cekPeriode == 'PERIODEKRS') {
                           $this->mPeriode = 'periode krs';
                        }
                     } else {
                        $err = 'Status mahasiswa tidak aktif.';
                        $showErrorBox = true;
                     }
                  }
               }
            }
            
            /* kode dikomen dibawah ini tidak boleh dihapus */
            /* KBK */
            // KBK hanya bisa melihat krs
            
            /* -------------------------------------------------------------- */
            
            $templateKrs = "";
            $templateKrsTambah = "";
            if ($modified == true) {
               $templateKrs = 'krs_item';
               $templateKrsTambah = 'krs_tambah';
               $this->SetAttribute("buttonAdd","visibility", "visible");
            }else{
               $templateKrs = 'krs_item_no_check_box';
               $templateKrsTambah = 'krs_tambah_no_check_box';
            }
            if (!$empty){
               $this->SetAttribute("buttonCetak","visibility", "visible");
               
               //$this->AddVar("buttonCetak", "URL_CETAK", $this->mrConfig->GetURL('kbk_academic_plan','krs_mhs','print') .
               //$this->AddVar("buttonCetak", "URL_CETAK", $this->mrConfig->GetURL('kbk_academic_plan','academic_plan','print') .
                 // "&niu=".$this->mrConfig->Enc($this->mMahasiswaNiu)."&prodi=".$this->mrConfig->Enc($this->mMahasiswaProdiId)."&opsi=".$this->mrConfig->Enc("pasca"));
               $this->AddVar("buttonCetak", "URL_CETAK", $this->mrConfig->GetURL('kbk_academic_plan','krs_01','print') .
                  "&niu=".$this->mrConfig->Enc($this->mMahasiswaNiu)."&prodi=".$this->mrConfig->Enc($this->mMahasiswaProdiId)."&opsi=".$this->mrConfig->Enc("pasca"));
               $this->AddVar("buttonCetak", "URL_CETAK_MM", $this->mrConfig->GetURL('kbk_academic_plan','krs_mhs','print') . 
                  "&niu=".$this->mrConfig->Enc($this->mMahasiswaNiu). "&prodi=".$this->mrConfig->Enc($this->mMahasiswaProdiId)."&opsi=".$this->mrConfig->Enc("mm"));

               if ($modified == true) {
                  $this->SetAttribute("buttonDel","visibility", "visible");
               }
               if ($this->mViewBy == "dosen") {
                  /* kode dikomen dibawah ini tidak boleh dihapus */
                  /* KBK tidak ada pesetujuan
                  */
               	if($statusKrsOnline){
               		$this->SetAttribute("buttonApprove","visibility", "visible");
               	}
                  if ($approved === false) {
                     $this->AddVar("buttonApprove", "APPROVE_VALUE", "Setujui KRS");
                  } else {
                     $this->AddVar("buttonApprove", "APPROVE_VALUE", "Batalkan Persetujuan KRS");
                  }
               } else {
                  /* kode dikomen dibawah ini tidak boleh dihapus */
                  // KBK tidak ada pesetujuan
                  if ($cekPeriode == 'REVISIKRS') {
                  	if($statusKrsOnline){
                  		$this->SetAttribute("buttonCancelApprove","visibility", "visible");	
                  	}
                     if ($approved === true) {
                        $this->AddVar("buttonCancelApprove", "APPROVE_VALUE", "Revisi KRS");
                     } else {
                        $this->SetAttribute("buttonCancelApprove","visibility", "hidden");
                        #$this->AddVar("buttonCancelApprove", "APPROVE_VALUE", "Batalkan Perubahan KRS");
                     }
                  }
               }
            }
            
             if (count($dataKrsLokal) != 0){
               $this->SetAttribute($templateKrs,'visibility','visible');
               $this->ParseData($templateKrs, $dataKrsLokal, "LOCAL_", 1);
            }
            if (count($dataKrsLintas) != 0){
               $this->SetAttribute('krs_lintas','visibility','visible');
               $this->ParseData('lintas_item', $dataKrsLintas, "LINTAS_", 1);
            }
            if (count($dataKrsTambah) != 0){
               $this->SetAttribute('krs_tambah_label','visibility','visible');
               $this->SetAttribute($templateKrsTambah,'visibility','visible');
               $this->ParseData($templateKrsTambah, $dataKrsTambah, "TAMBAH_", 1);
            }
            if (count($dataKrsBatal) != 0){
               $this->SetAttribute('krs_batal','visibility','visible');
               $this->SetAttribute('krs_batal_item','visibility','visible');
               $this->ParseData('krs_batal_item', $dataKrsBatal, "BATAL_", 1);
            }
            $this->AddVar("content", "ACT", "krs");
            if ($this->mViewBy == "dosen") {
               $this->AddVar("content","VIEW_BY", $this->mViewBy);
               $this->SetAttribute("buttonBack","visibility", "visible");
					//$this->AddVar("content", "FORM_AKSI", $this->mrConfig->GetURL('dosen','mentored_students','view').
               $this->AddVar("content", "FORM_AKSI", $this->mrConfig->GetURL('kbk_academic_plan','academic_plan','process') .
						"&sia=".$this->mrConfig->Enc($this->mSiaServer) . "&view=" .$this->mrConfig->Enc("dosen") .
                  "&prodi=" . $this->mrConfig->Enc($this->mMahasiswaProdiId) . "&niu=" .$this->mrConfig->Enc($this->mMahasiswaNiu));
				} else {
					$this->AddVar("content", "FORM_AKSI", $this->mrConfig->GetURL('kbk_academic_plan','academic_plan','process'));
               
            }
            if ($showErrorBox === true)
                  $this->ShowErrorBox($err);
         }

         $this->DisplayTemplate();
      }
      
      function ShowErrorBox($stringError="") {
         if ($stringError != "" || $this->mErrorMessage != ""){
            $this->AddVar("error_box", "ERROR_MESSAGE",  
                  strip_tags($this->ComposeErrorMessage($stringError , $this->mErrorMessage)));   
            $this->SetAttribute('error_box', 'visibility', 'visible');
         }
      }
   }
?>