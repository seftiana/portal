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
		var $mEnableBlock; //add ccp 9-juli-2019

      #function DisplayViewKRS(&$configObject, &$security, $userRole, $mhsniu, $prodiId, $errMsg, $viewBy, $siaServer) {
      function DisplayViewKRS(&$configObject, &$security, $userRole, $mhsniu, $prodiId, $errMsg, $viewBy, $siaServer,$getBlock) { #update ccp 9-juli-2019
         DisplayBaseFull::DisplayBaseFull($configObject, $security);
         $this->mUserRole = $userRole;
         $this->mMahasiswaProdiId = $prodiId;
         $this->mMahasiswaNiu = $mhsniu;
         $this->mErrorMessage = $errMsg;
         $this->mViewBy = $viewBy;
	 $this->mFinansiServiceAddress = $this->mrUserSession->GetProperty("FinansiServiceAddress"); #add ccp 9-juli-2019
	 $this->mEnableBlock = $getBlock  ; #add ccp 9-juli-2019
			if ($siaServer == "") {
				$this->mSiaServer = $this->mrUserSession->GetProperty("ServerServiceAddress");
			} else {
				$this->mSiaServer = $siaServer;
			}
         $this->mObjKrsService = new AcademicPlanClientService($this->mSiaServer,false, $this->mMahasiswaNiu, $this->mMahasiswaProdiId);
         $this->mObjKrsService->SetProperty("UserRole", $this->mUserRole);
         $this->mObjKrsService->DoSiaSetting();
         $this->SetErrorAndEmptyBox();
         $this->SetTemplateBasedir($configObject->GetValue('app_module') . 'academic_plan/templates/');
         $this->SetTemplateFile('view_krs.html');
      }

      function GetDataMahasiswa() {
         $objUserService = new UserClientService($this->mrUserSession->GetProperty("ServerServiceAddress"),
            false, $this->mMahasiswaNiu);
         if ($objUserService->IsError()) {
            $this->mErrorMessage .= $this->mUserService->GetProperty("ErrorMessages");
         }else{
            $objUserService->SetProperty("UserRole", 1 );
            $dataUser = $objUserService->GetUserInfo(1);
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

      function Display() {
         // cek apakah service sia is available
         $dataUser = $this->GetDataMahasiswa();
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

	 $statusTagihanPrasyaratMhs =  $this->CekStatusTagihanPrasyaratMhs($this->mMahasiswaNiu,$this->mObjKrsService->GetProperty("SemesterProdiSemesterId"));#add ccp 10-juli-2019
         #if (false === $dataUser) {
	 #if (false === $dataUser or (!empty($statusTagihanPrasyaratMhs['data']) && $this->mEnableBlock)) {
	 $mhsAngkatan = $dataUser[0]['angkatan'].$dataUser[0]['mhsSemesterMasuk_']; #add ccp 10-9-2019
	 if (false === $dataUser or (!empty($statusTagihanPrasyaratMhs['data']) && $this->mEnableBlock && $this->mObjKrsService->GetProperty("SemesterProdiSemesterId")!=$mhsAngkatan )) {
            // service tidak available
		#add ccp 10-juli-2019
	    	if(!empty($statusTagihanPrasyaratMhs['data'])){ 
			$this->ShowErrorBox("Masih ada tagihan sebelumnya yang belum lunas, silahkan cek menu informasi tagihans");
		}else{
			$this->ShowErrorBox("Pengambilan data KRS tidak berhasil. ");
		}
		#end
            #$this->ShowErrorBox("Pengambilan data KRS tidak berhasil. ");
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
               $this->AddVar("empty_box", "WARNING_MESSAGE", $this->ComposeErrorMessage($strMhs." belum mengisi KRS. ", $this->GetProperty("ErrorMessage")));

            } else {

               $this->AddVar('krs','IS_EMPTY','NO');
               //$this->AddVar("krs", "MATAKULIAH_TOTAL", count($dataKrs));
               $totSks = 0;
               $totSksBatal = 0;
               $kode = NULL;
               $len = count($dataKrs);
			   $approved = true;
               for ($i=0; $i<$len; $i++) {
                  if ($dataKrs[$i]["APPROVAL"] != 0) {
                     $approved &= true;
                  }else{
                     $approved &= false;
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
            if ($cekPeriode == 'BUKANPERIODE') {
               $err = 'Bukan Periode Krs';
               $showErrorBox = true;
            } else {
               if ($this->mViewBy == "mahasiswa"){
                  if ($approved) {
                     //$err = 'KRS tidak dapat diubah, telah disetujui oleh dosen pembimbing. Untuk perubahan harap hubungi dosen pembimbing.';
                     if ($cekPeriode == 'REVISIKRS') {
                        $err = 'KRS telah disetujui oleh dosen pembimbing. Anda masih dapat melakukan perubahan KRS dengan konsekuensi harus menghubungi kembali dosen pembimbing Anda untuk meminta persetujuan. Silakan pilih tombol <b>"Revisi KRS"</b> untuk melakukan perubahan KRS.';
                     } else {
                        $err = 'KRS tidak dapat diubah, telah disetujui oleh dosen pembimbing. Untuk perubahan harap hubungi dosen pembimbing atau lakukan perubahan pada masa revisi KRS';
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
                              $modified = true;
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
                     $err = 'KRS telah disetujui.';
                     $showErrorBox = true;
                  } else {
                     if ($cekStatus == 'A') {
                        $modified = true;
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


            $templateKrs = "";
            $templateKrsTambah = "";
            if ($modified == true) {
               $templateKrs = 'krs_item';
               $templateKrsTambah = 'krs_tambah';
               $this->SetAttribute("buttonAdd","visibility", "visible");
		//add ccp 2 agustus 2018
		$checkBox = "";
		if($dataKrs[$i]['IS_REVISI']==0){
			$checkBox = "disabled='disabled'";
		}else{
			$checkBox = "";
		}
		// end ccp
            }else{
               $templateKrs = 'krs_item_no_check_box';
               $templateKrsTambah = 'krs_tambah_no_check_box';
            }
            if (!$empty){
               if($approved)$this->SetAttribute("buttonCetak","visibility", "visible");
               $this->AddVar("buttonCetak", "URL_CETAK", $this->mrConfig->GetURL('academic_plan','academic_plan2','print') .
                  "&niu=".$this->mrConfig->Enc($this->mMahasiswaNiu). "&prodi=".$this->mrConfig->Enc($this->mMahasiswaProdiId));
               if ($modified == true) {
                  $this->SetAttribute("buttonDel","visibility", "visible");
               }
               if ($this->mViewBy == "dosen") {
					if($cekPeriode == 'PERIODEKRS'){
						$this->SetAttribute("buttonApprove","visibility", "visible");
						if (!$approved) {
							$this->AddVar("buttonApprove", "APPROVE_VALUE", "Setujui KRS");
						} else {
							$this->AddVar("buttonApprove", "APPROVE_VALUE", "Batalkan Persetujuan KRS");
						}
					}elseif($cekPeriode == 'REVISIKRS') {
						$this->SetAttribute("buttonCancelApprove","visibility", "visible");
						if ($approved) {
							$this->AddVar("buttonCancelApprove", "APPROVE_VALUE", "Revisi KRS");
						} else {
							$this->SetAttribute("buttonApprove","visibility", "visible");
							$this->AddVar("buttonApprove", "APPROVE_VALUE", "Setujui KRS");
							$this->SetAttribute("buttonCancelApprove","visibility", "hidden");
#							$this->AddVar("buttonCancelApprove", "APPROVE_VALUE", "Batalkan Perubahan KRS");
						}
						$this->AddVar($templateKrs,'VCHECKBOX',$checkBox); // add ccp 2 agustus 2018
					}else{
						// $this->SetAttribute("buttonApprove","visibility", "hidden");
						#add ccp 04-02-2022
						$this->SetAttribute("buttonApprove","visibility", "visible");
						if (!$approved) {
							$this->AddVar("buttonApprove", "APPROVE_VALUE", "Setujui KRS");
						} else {
							$this->AddVar("buttonApprove", "APPROVE_VALUE", "Batalkan Persetujuan KRS");
						}
						#end add ccp 04-02-2022
					}

               }else{
                  if ($cekPeriode == 'REVISIKRS') {
                     $this->SetAttribute("buttonCancelApprove","visibility", "visible");
                     if ($approved) {
                        $this->AddVar("buttonCancelApprove", "APPROVE_VALUE", "Revisi KRS");
                     } else {
                        $this->SetAttribute("buttonCancelApprove","visibility", "hidden");
                        #$this->AddVar("buttonCancelApprove", "APPROVE_VALUE", "Batalkan Perubahan KRS");
                     }
			$this->AddVar($templateKrs,'VCHECKBOX',$checkBox); // add ccp 2 agustus 2018
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
               $this->AddVar("content", "FORM_AKSI", $this->mrConfig->GetURL('academic_plan','academic_plan','process') .
						"&sia=".$this->mrConfig->Enc($this->mSiaServer) . "&view=" .$this->mrConfig->Enc("dosen") .
                  "&prodi=" . $this->mrConfig->Enc($this->mMahasiswaProdiId) . "&niu=" .$this->mrConfig->Enc($this->mMahasiswaNiu));
				} else {
					$this->AddVar("content", "FORM_AKSI", $this->mrConfig->GetURL('academic_plan','academic_plan','process'));

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

	#add ccp 10-juli-2019
	function CekStatusTagihanPrasyaratMhs($nimMhs,$semesterAktif){
		$status = false;
		$dataTagihanPrasyaratMhs = $this->GetTagihanPrasyaratMahasiswa($nimMhs,$semesterAktif);
		return $dataTagihanPrasyaratMhs;
	}
		
	function GetTagihanPrasyaratMahasiswa($arrNim,$smt) {
		if($this->mFinansiServiceAddress == ''){
			$this->ShowErrorBox("Pengambilan data tagihan tidak berhasil.");            
		} else{
			$restClient = new RestClient();
			$restClient->SetPath($this->mFinansiServiceAddress.'?mod=lap_histori_pembayaran&sub=HistoriPembayaranMahasiswaSingle&typ=rest&act=rest');
			// $restClient->SetGet('&prasyarat=yes&nim='.$arrNim);
			$restClient->SetGet('&smt='.$smt.'&nim='.$arrNim); //add ccp 10-7-2019
			$restClient->SetDebugOn();
			$this->dataRest = $restClient->Send();
			return $this->dataRest['gtfwResult'];
		}
	}
	#end
   }
?>