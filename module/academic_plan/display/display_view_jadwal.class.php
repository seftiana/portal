<?php
   /**
   * DisplayViewJadwal
   * DisplayViewJadwal class
   *
   * @package communication
   * @author Yudhi Aksara, S.Kom
   * @copyright Copyright (c) 2006 GamaTechno
   * @version 1.0
   * @date 2006-03-07
   * @revision Maya Alipin 2006.09.07
   */

   class DisplayViewJadwal extends DisplayBaseFull {
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

      #function DisplayViewJadwal(&$configObject, &$security, $userRole, $mhsniu, $prodiId, $errMsg, $viewBy, $siaServer) {
      function DisplayViewJadwal(&$configObject, &$security, $userRole, $mhsniu, $prodiId, $errMsg, $viewBy, $siaServer,$getBlock) { #update ccp 9-juli-2019
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
         $this->SetTemplateFile('view_jadwal.html');
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

	 // $statusTagihanPrasyaratMhs =  $this->CekStatusTagihanPrasyaratMhs($this->mMahasiswaNiu,$this->mObjKrsService->GetProperty("SemesterProdiSemesterId"));#add ccp 10-juli-2019
	 // echo"<pre>";print_r($dataUser);die;
    if (false === $dataUser) {
		$mhsAngkatan = $dataUser[0]['angkatan'].$dataUser[0]['mhsSemesterMasuk_']; #add ccp 10-9-2019
		$this->ShowErrorBox("Pengambilan data KRS tidak berhasil. ");		
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

			$url_qrcode = $this->mrConfig->GetURL('presensi', 'scan', 'view').'&nim='.$this->mrConfig->Enc($this->mMahasiswaNiu);
            $this->AddVar("content", "LINK_QRCODE",$url_qrcode);

            //ambil data krs mahasiswa
            $dataKrs = $this->GetKrsMahasiswa();
            $dataKrsLokal = array();

			// $sempId = $this->mObjKrsService->GetProperty("SemesterProdiSemesterId");
			$sempId = $this->mObjKrsService->mSemesterProdiId;
			$krsId = $this->mObjKrsService->getKrsId($this->mMahasiswaNiu,$sempId);
			$resKrs = $this->mObjKrsService->getDataKrsCetak($krsId);
			// echo"<pre>";print_r($resKrs);die;

			if($resKrs[0]['KODE_MK'] != ""){
				$this->AddVar('data_list','IS_EMPTY','NO');
				for ($i=0; $i < count($resKrs); $i++) {
					$url_presensi = $this->mrConfig->GetURL('academic_plan', 'validasi_presence', 'view').'&kls='.$this->mrConfig->Enc($resKrs[$i]['KELAS_ID'].'&smt='.$this->mrConfig->Enc($resKrs[$i]['SEMESTER_ID']));
					$this->AddVar('data_list_item','URL_VALIDASI',$url_presensi);
					
					$this->AddVar('data_list_item','NO',$i+1);
					$this->AddVar('data_list_item','KODE_MK',$resKrs[$i]['KODE_MK']);
					$this->AddVar('data_list_item','NAMA_MK',$resKrs[$i]['NAMA_MK']);
					$this->AddVar('data_list_item','SKS',$resKrs[$i]['SKS_TOTAL']);
					$this->AddVar('data_list_item','KELAS',$resKrs[$i]['KELAS']);
					$this->AddVar('data_list_item','WAKTU',$resKrs[$i]['jadwalKuliah']);
					$this->AddVar('data_list_item','RUANG',$resKrs[$i]['ruangKuliah']);
					$jml_total += $resKrs[$i]['SKS_TOTAL'];
					$this->mTemplate->parseTemplate('data_list_item','a');
				}
			}else{
				$this->AddVar('data_list','IS_EMPTY','YES');
				$this->AddVar('data_list','MSG',$dataUser[0]['sem']);
			}
            $this->AddVar("total","JML_TOTAL_SKS", $jml_total);
			
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