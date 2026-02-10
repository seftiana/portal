<?php
// DisplayBaseFull => DisplayBaseNoLinks
class DisplayViewGradeManagement extends DisplayBaseNoLinks {
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
   var $mCpmk;
   
   /**
    * var mSemesterIdToView integer kelas id
    */
   var $mSemesterIdToView;
   var $mPerNif;
   var $mAfterProc;
    /**
    * DisplayViewGradeManagement::DisplayViewGradeManagement
    * Constructor
    *
    * @param configObject object Configuration
    * @param security object Security
    * @param errMsg string error message
    */
   function DisplayViewGradeManagement(&$configObject, &$security, $errMsg,$semester, $kelas, $serverAddress, $afterProc, $prodi_kode_kelas,$subCpmk) {
      DisplayBaseNoLinks::DisplayBaseNoLinks($configObject, $security);
      $this->mErrorMessage = $errMsg;
      $this->mKelasId = $kelas;
      $this->mCpmk = $subCpmk;
      $this->mServiceServerAddress = $serverAddress;
	  $this->mFinansiServiceAddress = $this->mrUserSession->GetProperty("FinansiServiceAddress");      

      $this->mDosenServiceObj = new DosenClientService($this->mServiceServerAddress, false, 
                         $this->mrUserSession->GetProperty("UserReferenceId"), $this->mrUserSession->GetProperty("UserProdiId"));
      $this->mSemesterIdToView = $semester;
      $this->mKodeProdiKelas = $prodi_kode_kelas;  // add ccp 10 maret 2017
      $this->SetErrorAndEmptyBox();  
      $this->SetTemplateBasedir($configObject->GetValue('app_module') . 'history_nilai_obe/templates');
	
	  $this->SetTemplateFile('view_grade_management.html');
	  $this->mAfterProc=$afterProc;
   }
   
   
   /**
    * DisplayViewGradeManagement::GetStudentsGrade
    * Method ini digunakan untuk mengambil data nilai mahasiswa berdasarkan kelas tertentu
    *
    * @param
    * @return array Data nilai mahasiswa
    */
   function GetStudentsGrade()
   {
     
      $dataNilai = $this->mDosenServiceObj->GetNilaiMahasiswaForKelas($this->mKelasId);
      if (false === $dataNilai) {
         return false;
      } else {
         return $dataNilai;
      }
   }
   
   function GetStudentsGradePerPage($start,$perPage)
   { 
      $dataNilai = $this->mDosenServiceObj->GetNilaiMahasiswaForKelasPerPage($this->mKelasId,$start,$perPage);
      if (false === $dataNilai) {
         return false;
      } else {
         return $dataNilai;
      }
   }
   
   function GetStudentsGradeCount()
   {
     
      $dataNilai = $this->mDosenServiceObj->GetCountMahasiswaForKelasObe($this->mKelasId);
      if (false === $dataNilai) {
         return false;
      } else {
         return $dataNilai;
      }
   }
   
   function GetNilaiBobotObe(){
   
      $bobot=$this->mDosenServiceObj->GetNilaiBobotPerKelasObe($this->mKelasId);//print_r($bobot);
	  if (false === $bobot) {
         return false;
      } else {
         return $bobot;
      }
   }
   
   function GetNilaiDpnaObe($nif){
      $dpna=$this->mDosenServiceObj->GetKrsDpnaNiuObe($this->mKelasId,$nif);
	  if (false === $dpna) {
         return false;
      } else {
         return $dpna;
      }
   }
   
   function GetCaraPenilaian(){
      $cp=$this->mDosenServiceObj->GetCaraPenilaian();
	  if (false === $cp) {
         return false;
      } else {
         return $cp;
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
   
   function GetInfoKelasObe() {
      
      $proposedClassObj = new ProposedClassesClientService($this->mServiceServerAddress, false, 
                         $this->mrUserSession->GetProperty("UserReferenceId"), $this->mrUserSession->GetProperty("UserProdiId"));
      $proposedClassObj->SetProperty("ClassId", $this->mKelasId);
      $dataKelas = $proposedClassObj->GetAllInfoDetailForClassObe();
      return $dataKelas;
   }

   	function GetTagihanPrasyaratMahasiswa($arrNim,$smt='') {
         if($this->mFinansiServiceAddress == ''){
         	$this->ShowErrorBox("Pengambilan data tagihan tidak berhasil.");            
         } else{
            $restClient = new RestClient();
            $restClient->SetPath($this->mFinansiServiceAddress.'?mod=lap_histori_pembayaran&sub=HistoriPembayaranMahasiswa&typ=rest&act=rest');
            // $restClient->SetGet('&prasyarat=yes&nim='.$arrNim);
            $restClient->SetGet('&prasyarat=yes&dsn=yes&smt='.$smt.'&nim='.$arrNim); //add ccp 15-8-2018
            $restClient->SetDebugOn();
            $this->dataRest = $restClient->Send();
            return $this->dataRest['gtfwResult'];
         }
      }

     # mencari mahasiswa yang tidak memenuhi prasyarat pembayaran
    function CekStatusTagihanPrasyaratMhs($nimMhs){
    	 $status = false;
         $arrNimForPrasyarat = array();
         $dataMhs = $this->GetStudentsGrade();
         foreach ($dataMhs as $rows) {
         	$arrNimForPrasyarat[] = $rows['nif'];
         }
         $arrNimForPrasyarat = json_encode($arrNimForPrasyarat);
         // $dataTagihanPrasyaratMhs = $this->GetTagihanPrasyaratMahasiswa($arrNimForPrasyarat);
         //$dataTagihanPrasyaratMhs = $this->GetTagihanPrasyaratMahasiswa($arrNimForPrasyarat,$this->mDosenServiceObj->mSemesterProdiSemesterId); // add ccp 15-8-2018
         $dataTagihanPrasyaratMhs = $this->GetTagihanPrasyaratMahasiswa($arrNimForPrasyarat,$this->mSemesterIdToView); // add ccp 10-10-2018
         if(!empty($dataTagihanPrasyaratMhs['data'])){
         	foreach ($dataTagihanPrasyaratMhs['data'] as $rowsTagihan) {
         		if($nimMhs == $rowsTagihan['nim']){
         			$status = true;
         		}
         	}
         }

         return $status;
    }
   
   function Display() {   	
      // cek apakah service sia is available
      $init = $this->DoInitializeService();
      // DisplayBaseNoLinks::Display("[ Logout ]");
      DisplayBaseNoLinks::Display();
	  
      if ($init === false){
         $this->ShowErrorBox();
      } else {
         $dataKelas = $this->GetInfoKelasObe(); 
         // $kodeProdi = $dataKelas['detil'][0]['kode_prodi']; 
         $kodeProdi = $this->mKodeProdiKelas;
         
		 $this->AddVar("content", "MATAKULIAH", $dataKelas["detil"][0]["nama"]);
		 $this->AddVar("content", "KELAS", $dataKelas["detil"][0]["nama_mata_kuliah"]);
         
         $semesterInfo = $this->mDosenServiceObj->GetNamaSemesterForSemesterId($this->mSemesterIdToView);
         $semesterInfo  = $semesterInfo[0]["nama"] ." ". $semesterInfo[0]["tahun"] ."/". ($semesterInfo[0]["tahun"] + 1);
         $this->AddVar("content", "SEMESTER", $semesterInfo );
		 $url_print= $this->mrConfig->GetURL('dosen', 'input_nilai_obe', 'print') .
						'&kelas=' . $this->mrConfig->Enc($dataKelas['detil'][0]['klas_id']) .
						'&smt=' . $this->mrConfig->Enc($this->mSemesterIdToView) . 
                        '&sia=' . $this->mrConfig->Enc($this->mServiceServerAddress) .
						'&pkk='.$this->mrConfig->Enc($this->mKodeProdiKelas) ;
		 $this->AddVar("content", "URL_PRINT", $url_print ); 
         $dataNilaiBobot=$this->GetNilaiBobotObe();
		 $dataNilaiBobot[0]['BOBOT_HARIAN'] = $dataKelas["detil"][0]["TTLBOBOT_PRESENSI"];
		 $dataNilaiBobot[0]['BOBOT_MANDIRI'] = $dataKelas["detil"][0]["TTLBOBOT_TUGAS_MANDIRI"];
		 $dataNilaiBobot[0]['BOBOT_KELOMPOK'] = $dataKelas["detil"][0]["TTLBOBOT_TUGAS_KELOMPOK"];
		 $dataNilaiBobot[0]['BOBOT_PRESENTASI'] = $dataKelas["detil"][0]["TTLBOBOT_PRESENTASI"];
		 $dataNilaiBobot[0]['BOBOT_TERSTRUKTUR'] = $dataKelas["detil"][0]["TTLBOBOT_QUIS"];
		 $dataNilaiBobot[0]['BOBOT_TAMBAHAN'] = $dataKelas["detil"][0]["TTLBOBOT_PRATIKUM"];
		 $dataNilaiBobot[0]['BOBOT_UTS'] = $dataKelas["detil"][0]["TTLBOBOT_UTS"];
		 $dataNilaiBobot[0]['BOBOT_UAS'] = $dataKelas["detil"][0]["TTLBOBOT_UAS"];
		 
		 $dataNilaiBobot[0]['BOBOTCPMK1'] = $dataKelas["detil"][0]["BOBOTCPMK1"];
		 $dataNilaiBobot[0]['BOBOTCPMK2'] = $dataKelas["detil"][0]["BOBOTCPMK2"];
		 $dataNilaiBobot[0]['BOBOTCPMK3'] = $dataKelas["detil"][0]["BOBOTCPMK3"];
		 $dataNilaiBobot[0]['BOBOTCPMK4'] = $dataKelas["detil"][0]["BOBOTCPMK4"];
		 $dataNilaiBobot[0]['BOBOTCPMK5'] = $dataKelas["detil"][0]["BOBOTCPMK5"];
		 $dataNilaiBobot[0]['BOBOTCPMK6'] = $dataKelas["detil"][0]["BOBOTCPMK6"];
		 $dataNilaiBobot[0]['BOBOT_HARIAN1'] = $dataKelas["detil"][0]["klsdpnaBobotHarian1"];
		 $dataNilaiBobot[0]['BOBOT_HARIAN2'] = $dataKelas["detil"][0]["klsdpnaBobotHarian2"];
		 $dataNilaiBobot[0]['BOBOT_HARIAN3'] = $dataKelas["detil"][0]["klsdpnaBobotHarian3"];
		 $dataNilaiBobot[0]['BOBOT_HARIAN4'] = $dataKelas["detil"][0]["klsdpnaBobotHarian4"];
		 $dataNilaiBobot[0]['BOBOT_HARIAN5'] = $dataKelas["detil"][0]["klsdpnaBobotHarian5"];
		 $dataNilaiBobot[0]['BOBOT_HARIAN6'] = $dataKelas["detil"][0]["klsdpnaBobotHarian6"];
		 $dataNilaiBobot[0]['BOBOT_MANDIRI1'] = $dataKelas["detil"][0]["klsdpnaBobotMandiri1"];
		 $dataNilaiBobot[0]['BOBOT_MANDIRI2'] = $dataKelas["detil"][0]["klsdpnaBobotMandiri2"];
		 $dataNilaiBobot[0]['BOBOT_MANDIRI3'] = $dataKelas["detil"][0]["klsdpnaBobotMandiri3"];
		 $dataNilaiBobot[0]['BOBOT_MANDIRI4'] = $dataKelas["detil"][0]["klsdpnaBobotMandiri4"];
		 $dataNilaiBobot[0]['BOBOT_MANDIRI5'] = $dataKelas["detil"][0]["klsdpnaBobotMandiri5"];
		 $dataNilaiBobot[0]['BOBOT_MANDIRI6'] = $dataKelas["detil"][0]["klsdpnaBobotMandiri6"];
		 $dataNilaiBobot[0]['BOBOT_KELOMPOK1'] = $dataKelas["detil"][0]["klsdpnaBobotKelompok1"];
		 $dataNilaiBobot[0]['BOBOT_KELOMPOK2'] = $dataKelas["detil"][0]["klsdpnaBobotKelompok2"];
		 $dataNilaiBobot[0]['BOBOT_KELOMPOK3'] = $dataKelas["detil"][0]["klsdpnaBobotKelompok3"];
		 $dataNilaiBobot[0]['BOBOT_KELOMPOK4'] = $dataKelas["detil"][0]["klsdpnaBobotKelompok4"];
		 $dataNilaiBobot[0]['BOBOT_KELOMPOK5'] = $dataKelas["detil"][0]["klsdpnaBobotKelompok5"];
		 $dataNilaiBobot[0]['BOBOT_KELOMPOK6'] = $dataKelas["detil"][0]["klsdpnaBobotKelompok6"];
		 $dataNilaiBobot[0]['BOBOT_PRESENTASI1'] = $dataKelas["detil"][0]["klsdpnaBobotPresentasi1"];
		 $dataNilaiBobot[0]['BOBOT_PRESENTASI2'] = $dataKelas["detil"][0]["klsdpnaBobotPresentasi2"];
		 $dataNilaiBobot[0]['BOBOT_PRESENTASI3'] = $dataKelas["detil"][0]["klsdpnaBobotPresentasi3"];
		 $dataNilaiBobot[0]['BOBOT_PRESENTASI4'] = $dataKelas["detil"][0]["klsdpnaBobotPresentasi4"];
		 $dataNilaiBobot[0]['BOBOT_PRESENTASI5'] = $dataKelas["detil"][0]["klsdpnaBobotPresentasi5"];
		 $dataNilaiBobot[0]['BOBOT_PRESENTASI6'] = $dataKelas["detil"][0]["klsdpnaBobotPresentasi6"];	 
		 $dataNilaiBobot[0]['BOBOT_TERSTRUKTUR1'] = $dataKelas["detil"][0]["klsdpnaBobotTerstruktur1"];
		 $dataNilaiBobot[0]['BOBOT_TERSTRUKTUR2'] = $dataKelas["detil"][0]["klsdpnaBobotTerstruktur2"];
		 $dataNilaiBobot[0]['BOBOT_TERSTRUKTUR3'] = $dataKelas["detil"][0]["klsdpnaBobotTerstruktur3"];
		 $dataNilaiBobot[0]['BOBOT_TERSTRUKTUR4'] = $dataKelas["detil"][0]["klsdpnaBobotTerstruktur4"];
		 $dataNilaiBobot[0]['BOBOT_TERSTRUKTUR5'] = $dataKelas["detil"][0]["klsdpnaBobotTerstruktur5"];
		 $dataNilaiBobot[0]['BOBOT_TERSTRUKTUR6'] = $dataKelas["detil"][0]["klsdpnaBobotTerstruktur6"];
		 $dataNilaiBobot[0]['BOBOT_TAMBAHAN1'] = $dataKelas["detil"][0]["klsdpnaBobotTambahan1"];
		 $dataNilaiBobot[0]['BOBOT_TAMBAHAN2'] = $dataKelas["detil"][0]["klsdpnaBobotTambahan2"];
		 $dataNilaiBobot[0]['BOBOT_TAMBAHAN3'] = $dataKelas["detil"][0]["klsdpnaBobotTambahan3"];
		 $dataNilaiBobot[0]['BOBOT_TAMBAHAN4'] = $dataKelas["detil"][0]["klsdpnaBobotTambahan4"];
		 $dataNilaiBobot[0]['BOBOT_TAMBAHAN5'] = $dataKelas["detil"][0]["klsdpnaBobotTambahan5"];
		 $dataNilaiBobot[0]['BOBOT_TAMBAHAN6'] = $dataKelas["detil"][0]["klsdpnaBobotTambahan6"];
		 $dataNilaiBobot[0]['BOBOT_UTS1'] = $dataKelas["detil"][0]["klsdpnaBobotUts1"];
		 $dataNilaiBobot[0]['BOBOT_UTS2'] = $dataKelas["detil"][0]["klsdpnaBobotUts2"];
		 $dataNilaiBobot[0]['BOBOT_UTS3'] = $dataKelas["detil"][0]["klsdpnaBobotUts3"];
		 $dataNilaiBobot[0]['BOBOT_UTS4'] = $dataKelas["detil"][0]["klsdpnaBobotUts4"];
		 $dataNilaiBobot[0]['BOBOT_UTS5'] = $dataKelas["detil"][0]["klsdpnaBobotUts5"];
		 $dataNilaiBobot[0]['BOBOT_UTS6'] = $dataKelas["detil"][0]["klsdpnaBobotUts6"];
		 $dataNilaiBobot[0]['BOBOT_UAS1'] = $dataKelas["detil"][0]["klsdpnaBobotUas1"];
		 $dataNilaiBobot[0]['BOBOT_UAS2'] = $dataKelas["detil"][0]["klsdpnaBobotUas2"];
		 $dataNilaiBobot[0]['BOBOT_UAS3'] = $dataKelas["detil"][0]["klsdpnaBobotUas3"];
		 $dataNilaiBobot[0]['BOBOT_UAS4'] = $dataKelas["detil"][0]["klsdpnaBobotUas4"];
		 $dataNilaiBobot[0]['BOBOT_UAS5'] = $dataKelas["detil"][0]["klsdpnaBobotUas5"];
		 $dataNilaiBobot[0]['BOBOT_UAS6'] = $dataKelas["detil"][0]["klsdpnaBobotUas6"];
		 	
		 $resKodeNilai = $this->mDosenServiceObj->GetKodeNilai($kodeProdi);
		 $json = array();
		 foreach($resKodeNilai as $kodeNilai) {
			$json[] = "{min:".$kodeNilai['SKOR_MIN'].",max:".$kodeNilai['SKOR_MAX'].",score:\"".$kodeNilai['KODE_NILAI']."\"}";
		 }
		 $json = implode(',',$json);
		 $this->AddVar("content", "SCORE_JSON", $json );
		 
		 ##star pagging
         $dataNilaiCount = $this->GetStudentsGradeCount();
		 $totalData = $dataNilaiCount[0]['jml'];
		 $perPage = 10;
		 $totalPage = ceil($totalData / $perPage);
		 $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
		 if ($page < 1) $page = 1;
		 if ($page > $totalPage) $page = $totalPage;
		 
		 $start = ($page - 1) * $perPage;
		 
		 $semesterProdiId = $this->mDosenServiceObj->GetSemesterProdiIdForSemesterId($this->mSemesterIdToView,$this->mKodeProdiKelas); //add ccp 10 maret 2017
		 $cekPeriode = $this->mDosenServiceObj->GetSemesterInformation($semesterProdiId);
         if (($cekPeriode[0]["current_periode_input_nilai"] == "BUKANPERIODEINPUTNILAI") ) {
			$dataNilai = $this->GetStudentsGrade();  
			$this->mTemplate->addVars("link_halaman", "");
			$this->mTemplate->parseTemplate("link_halaman", "a");
			$this->AddVar("content", "NEXT", "");
			$this->AddVar("content", "TOTAL", $totalData);
			$this->AddVar("content", "HALAMAN", "1");
			$this->AddVar("content", "PAGE", "1");
         }else{
			$dataNilai = $this->GetStudentsGradePerPage($start,$perPage);
			// pagination setup
			for ($i=1; $i <= $totalPage; $i++) {
				//$data[$i] = "Data ke-" . $i;
				if($i==$page){
					$aktif = 'style="color:white; background:orange; padding:4px; border-radius:4px;"';
				}else{
					$aktif = '';
				}
				$arr['nomor_halaman'] = '<input class="input-disclaimer btn btn-info" type="submit" name="btnNext" value="'.$i.'" onClick="return checkNilai();" '.$aktif.' >';
				$this->mTemplate->addVars("link_halaman", $arr);
				$this->mTemplate->parseTemplate("link_halaman", "a");
			}
			$selanjutnya = ($page+1);
			if($selanjutnya > $totalPage){
				$btnNextSave = '<input class="input-disclaimer btn btn-info" type="submit" name="btnNextSave" value="Simpan (selesai kembali ke halaman 1)" onClick="return checkNilai();">';  
			}else{
				$btnNextSave = '<input class="input-disclaimer btn btn-info" type="submit" name="btnNextSave" value="Simpan (lanjut halaman '.$selanjutnya.')" onClick="return checkNilai();">';  
			}
			  
			$this->AddVar("content", "NEXT", $btnNextSave);
			$this->AddVar("content", "TOTAL", $totalData);
			$this->AddVar("content", "HALAMAN", $totalPage);
			$this->AddVar("content", "PAGE", $page);
		 }
		 ##end pagging
		 
         // $dataNilai = $this->GetStudentsGrade();

         if (false !== $dataNilai) {
            $url_detail=$this->mrConfig->GetURL('history_nilai_obe','grade_management','view')."&pBl=".$this->mrConfig->enc("detail")."&pGo=".$this->mrConfig->enc("detail")
			."&kelas=".$this->mKelasId."&smt=".$this->mSemesterIdToView;//print_r($this->mSemesterIdToView);
            //tampilkan data matakuliah ditawarkan
            $this->AddVar("nilai", "NILAI_AVAILABLE", "YES");
            $hakAkses = $this->mDosenServiceObj->GetHakAksesDosenForInputNilai($this->mKelasId);
            $readOnly = "NO";
			
			foreach($dataNilai as $data){
			if (!empty($data['nilai'])) {
				if($this->mAfterProc=='1'){
					$this->ShowInfoBox("Penyimpanan nilai berhasil.");
				}
				$readOnly = "NO";		
				break;			   
			}}
			
            if (false === $hakAkses || $hakAkses[0]["BOLEHINPUT"] != 1) {
               $this->ShowErrorBox("Tidak dapat memasukkan nilai, anda tidak mempunyai hak input nilai");
               $readOnly = "YES";
			  
            }

			//$semesterProdiId = $this->mDosenServiceObj->GetSemesterProdiIdForSemesterId($this->mSemesterIdToView,$this->mKodeProdiKelas); //add ccp 10 maret 2017
			//$cekPeriode = $this->mDosenServiceObj->GetSemesterInformation($semesterProdiId);
			//echo'<pre>';echo $this->mSemesterIdToView.'<br>';echo $this->mKodeProdiKelas.'<br>';print_r($cekPeriode);echo"</pre>";
         if (($cekPeriode[0]["current_periode_input_nilai"] == "BUKANPERIODEINPUTNILAI") && $readOnly == "NO") {
            $this->ShowErrorBox("Tidak dapat memasukkan nilai, bukan periode input nilai");
            $readOnly = "YES";
		
         } 
			
			//kondisional tampil komponen nilai
			$display_bHarian1 = ($dataKelas["detil"][0]["klsdpnaBobotHarian1"]==0)?'hidden':'';
			$display_bHarian2 = ($dataKelas["detil"][0]["klsdpnaBobotHarian2"]==0)?'hidden':'';
			$display_bHarian3 = ($dataKelas["detil"][0]["klsdpnaBobotHarian3"]==0)?'hidden':'';
			$display_bHarian4 = ($dataKelas["detil"][0]["klsdpnaBobotHarian4"]==0)?'hidden':'';
			$display_bHarian5 = ($dataKelas["detil"][0]["klsdpnaBobotHarian5"]==0)?'hidden':'';
			$display_bHarian6 = ($dataKelas["detil"][0]["klsdpnaBobotHarian6"]==0)?'hidden':'';
			$this->mTemplate->addGlobalVar("DISPLAY_HARIAN1",$display_bHarian1);
			$this->mTemplate->addGlobalVar("DISPLAY_HARIAN2",$display_bHarian2);
			$this->mTemplate->addGlobalVar("DISPLAY_HARIAN3",$display_bHarian3);
			$this->mTemplate->addGlobalVar("DISPLAY_HARIAN4",$display_bHarian4);
			$this->mTemplate->addGlobalVar("DISPLAY_HARIAN5",$display_bHarian5);
			$this->mTemplate->addGlobalVar("DISPLAY_HARIAN6",$display_bHarian6);
			$display_bMandiri1 = ($dataKelas["detil"][0]["klsdpnaBobotMandiri1"]==0)?'hidden':'';
			$display_bMandiri2 = ($dataKelas["detil"][0]["klsdpnaBobotMandiri2"]==0)?'hidden':'';
			$display_bMandiri3 = ($dataKelas["detil"][0]["klsdpnaBobotMandiri3"]==0)?'hidden':'';
			$display_bMandiri4 = ($dataKelas["detil"][0]["klsdpnaBobotMandiri4"]==0)?'hidden':'';
			$display_bMandiri5 = ($dataKelas["detil"][0]["klsdpnaBobotMandiri5"]==0)?'hidden':'';
			$display_bMandiri6 = ($dataKelas["detil"][0]["klsdpnaBobotMandiri6"]==0)?'hidden':'';
			$this->mTemplate->addGlobalVar("DISPLAY_MANDIRI1",$display_bMandiri1);
			$this->mTemplate->addGlobalVar("DISPLAY_MANDIRI2",$display_bMandiri2);
			$this->mTemplate->addGlobalVar("DISPLAY_MANDIRI3",$display_bMandiri3);
			$this->mTemplate->addGlobalVar("DISPLAY_MANDIRI4",$display_bMandiri4);
			$this->mTemplate->addGlobalVar("DISPLAY_MANDIRI5",$display_bMandiri5);
			$this->mTemplate->addGlobalVar("DISPLAY_MANDIRI6",$display_bMandiri6);
			$display_bKelompok1 = ($dataKelas["detil"][0]["klsdpnaBobotKelompok1"]==0)?'hidden':'';
			$display_bKelompok2 = ($dataKelas["detil"][0]["klsdpnaBobotKelompok2"]==0)?'hidden':'';
			$display_bKelompok3 = ($dataKelas["detil"][0]["klsdpnaBobotKelompok3"]==0)?'hidden':'';
			$display_bKelompok4 = ($dataKelas["detil"][0]["klsdpnaBobotKelompok4"]==0)?'hidden':'';
			$display_bKelompok5 = ($dataKelas["detil"][0]["klsdpnaBobotKelompok5"]==0)?'hidden':'';
			$display_bKelompok6 = ($dataKelas["detil"][0]["klsdpnaBobotKelompok6"]==0)?'hidden':'';
			$this->mTemplate->addGlobalVar("DISPLAY_KELOMPOK1",$display_bKelompok1);
			$this->mTemplate->addGlobalVar("DISPLAY_KELOMPOK2",$display_bKelompok2);
			$this->mTemplate->addGlobalVar("DISPLAY_KELOMPOK3",$display_bKelompok3);
			$this->mTemplate->addGlobalVar("DISPLAY_KELOMPOK4",$display_bKelompok4);
			$this->mTemplate->addGlobalVar("DISPLAY_KELOMPOK5",$display_bKelompok5);
			$this->mTemplate->addGlobalVar("DISPLAY_KELOMPOK6",$display_bKelompok6);
			$display_bPresentasi1 = ($dataKelas["detil"][0]["klsdpnaBobotPresentasi1"]==0)?'hidden':'';
			$display_bPresentasi2 = ($dataKelas["detil"][0]["klsdpnaBobotPresentasi2"]==0)?'hidden':'';
			$display_bPresentasi3 = ($dataKelas["detil"][0]["klsdpnaBobotPresentasi3"]==0)?'hidden':'';
			$display_bPresentasi4 = ($dataKelas["detil"][0]["klsdpnaBobotPresentasi4"]==0)?'hidden':'';
			$display_bPresentasi5 = ($dataKelas["detil"][0]["klsdpnaBobotPresentasi5"]==0)?'hidden':'';
			$display_bPresentasi6 = ($dataKelas["detil"][0]["klsdpnaBobotPresentasi6"]==0)?'hidden':'';
			$this->mTemplate->addGlobalVar("DISPLAY_PRESENTASI1",$display_bPresentasi1);
			$this->mTemplate->addGlobalVar("DISPLAY_PRESENTASI2",$display_bPresentasi2);
			$this->mTemplate->addGlobalVar("DISPLAY_PRESENTASI3",$display_bPresentasi3);
			$this->mTemplate->addGlobalVar("DISPLAY_PRESENTASI4",$display_bPresentasi4);
			$this->mTemplate->addGlobalVar("DISPLAY_PRESENTASI5",$display_bPresentasi5);
			$this->mTemplate->addGlobalVar("DISPLAY_PRESENTASI6",$display_bPresentasi6);
			$display_bTerstruktur1 = ($dataKelas["detil"][0]["klsdpnaBobotTerstruktur1"]==0)?'hidden':'';
			$display_bTerstruktur2 = ($dataKelas["detil"][0]["klsdpnaBobotTerstruktur2"]==0)?'hidden':'';
			$display_bTerstruktur3 = ($dataKelas["detil"][0]["klsdpnaBobotTerstruktur3"]==0)?'hidden':'';
			$display_bTerstruktur4 = ($dataKelas["detil"][0]["klsdpnaBobotTerstruktur4"]==0)?'hidden':'';
			$display_bTerstruktur5 = ($dataKelas["detil"][0]["klsdpnaBobotTerstruktur5"]==0)?'hidden':'';
			$display_bTerstruktur6 = ($dataKelas["detil"][0]["klsdpnaBobotTerstruktur6"]==0)?'hidden':'';
			$this->mTemplate->addGlobalVar("DISPLAY_TERSTRUKTUR1",$display_bTerstruktur1);
			$this->mTemplate->addGlobalVar("DISPLAY_TERSTRUKTUR2",$display_bTerstruktur2);
			$this->mTemplate->addGlobalVar("DISPLAY_TERSTRUKTUR3",$display_bTerstruktur3);
			$this->mTemplate->addGlobalVar("DISPLAY_TERSTRUKTUR4",$display_bTerstruktur4);
			$this->mTemplate->addGlobalVar("DISPLAY_TERSTRUKTUR5",$display_bTerstruktur5);
			$this->mTemplate->addGlobalVar("DISPLAY_TERSTRUKTUR6",$display_bTerstruktur6);
			$display_bTambahan1 = ($dataKelas["detil"][0]["klsdpnaBobotTambahan1"]==0)?'hidden':'';
			$display_bTambahan2 = ($dataKelas["detil"][0]["klsdpnaBobotTambahan2"]==0)?'hidden':'';
			$display_bTambahan3 = ($dataKelas["detil"][0]["klsdpnaBobotTambahan3"]==0)?'hidden':'';
			$display_bTambahan4 = ($dataKelas["detil"][0]["klsdpnaBobotTambahan4"]==0)?'hidden':'';
			$display_bTambahan5 = ($dataKelas["detil"][0]["klsdpnaBobotTambahan5"]==0)?'hidden':'';
			$display_bTambahan6 = ($dataKelas["detil"][0]["klsdpnaBobotTambahan6"]==0)?'hidden':'';
			$this->mTemplate->addGlobalVar("DISPLAY_TAMBAHAN1",$display_bTambahan1);
			$this->mTemplate->addGlobalVar("DISPLAY_TAMBAHAN2",$display_bTambahan2);
			$this->mTemplate->addGlobalVar("DISPLAY_TAMBAHAN3",$display_bTambahan3);
			$this->mTemplate->addGlobalVar("DISPLAY_TAMBAHAN4",$display_bTambahan4);
			$this->mTemplate->addGlobalVar("DISPLAY_TAMBAHAN5",$display_bTambahan5);
			$this->mTemplate->addGlobalVar("DISPLAY_TAMBAHAN6",$display_bTambahan6);
			$display_bUts1 = ($dataKelas["detil"][0]["klsdpnaBobotUts1"]==0)?'hidden':'';
			$display_bUts2 = ($dataKelas["detil"][0]["klsdpnaBobotUts2"]==0)?'hidden':'';
			$display_bUts3 = ($dataKelas["detil"][0]["klsdpnaBobotUts3"]==0)?'hidden':'';
			$display_bUts4 = ($dataKelas["detil"][0]["klsdpnaBobotUts4"]==0)?'hidden':'';
			$display_bUts5 = ($dataKelas["detil"][0]["klsdpnaBobotUts5"]==0)?'hidden':'';
			$display_bUts6 = ($dataKelas["detil"][0]["klsdpnaBobotUts6"]==0)?'hidden':'';
			$this->mTemplate->addGlobalVar("DISPLAY_UTS1",$display_bUts1);
			$this->mTemplate->addGlobalVar("DISPLAY_UTS2",$display_bUts2);
			$this->mTemplate->addGlobalVar("DISPLAY_UTS3",$display_bUts3);
			$this->mTemplate->addGlobalVar("DISPLAY_UTS4",$display_bUts4);
			$this->mTemplate->addGlobalVar("DISPLAY_UTS5",$display_bUts5);
			$this->mTemplate->addGlobalVar("DISPLAY_UTS6",$display_bUts6);
			$display_bUas1 = ($dataKelas["detil"][0]["klsdpnaBobotUas1"]==0)?'hidden':'';
			$display_bUas2 = ($dataKelas["detil"][0]["klsdpnaBobotUas2"]==0)?'hidden':'';
			$display_bUas3 = ($dataKelas["detil"][0]["klsdpnaBobotUas3"]==0)?'hidden':'';
			$display_bUas4 = ($dataKelas["detil"][0]["klsdpnaBobotUas4"]==0)?'hidden':'';
			$display_bUas5 = ($dataKelas["detil"][0]["klsdpnaBobotUas5"]==0)?'hidden':'';
			$display_bUas6 = ($dataKelas["detil"][0]["klsdpnaBobotUas6"]==0)?'hidden':'';
			$this->mTemplate->addGlobalVar("DISPLAY_UAS1",$display_bUas1);
			$this->mTemplate->addGlobalVar("DISPLAY_UAS2",$display_bUas2);
			$this->mTemplate->addGlobalVar("DISPLAY_UAS3",$display_bUas3);
			$this->mTemplate->addGlobalVar("DISPLAY_UAS4",$display_bUas4);
			$this->mTemplate->addGlobalVar("DISPLAY_UAS5",$display_bUas5);
			$this->mTemplate->addGlobalVar("DISPLAY_UAS6",$display_bUas6);
			
			$display_bHarian = (empty($dataKelas["detil"][0]["TTLBOBOT_PRESENSI"]))?'hidden':'';
			$display_bMandiri = (empty($dataKelas["detil"][0]["TTLBOBOT_TUGAS_MANDIRI"]))?'hidden':'';
			$display_bKelompok = (empty($dataKelas["detil"][0]["TTLBOBOT_TUGAS_KELOMPOK"]))?'hidden':'';
			$display_bPresentasi = ($dataKelas["detil"][0]["TTLBOBOT_PRESENTASI"]==0)?'hidden':'';
			$display_bTerstruktur = (empty($dataKelas["detil"][0]["TTLBOBOT_QUIS"]))?'hidden':'';
			$display_bTambahan = (empty($dataKelas["detil"][0]["TTLBOBOT_PRATIKUM"]))?'hidden':'';
			$display_bUts = (empty($dataKelas["detil"][0]["TTLBOBOT_UTS"]))?'hidden':'';
			$display_bUas = (empty($dataKelas["detil"][0]["TTLBOBOT_UAS"]))?'hidden':'';
		 
			$jmlTampil=8;
			if($display_bHarian == 'hidden'){
				$this->mTemplate->addGlobalVar("DISPLAY_HARIAN",$display_bHarian);
				$jmlTampil -=1;
			}
			if($display_bMandiri== 'hidden'){
				$this->mTemplate->addGlobalVar("DISPLAY_MANDIRI",$display_bMandiri);
				$jmlTampil -=1;
			}
			if($display_bKelompok== 'hidden'){
				$this->mTemplate->addGlobalVar("DISPLAY_KELOMPOK",$display_bKelompok);
				$jmlTampil -=1;
			}
			if($display_bPresentasi== 'hidden'){
				$this->mTemplate->addGlobalVar("DISPLAY_PRESENTASI",$display_bPresentasi);
				$jmlTampil -=1;
			}
			if($display_bTerstruktur== 'hidden'){
				$this->mTemplate->addGlobalVar("DISPLAY_TERSTRUKTUR",$display_bTerstruktur);
				$jmlTampil -=1;
			}
			if($display_bTambahan== 'hidden'){
				$this->mTemplate->addGlobalVar("DISPLAY_TAMBAHAN",$display_bTambahan);
				$jmlTampil -=1;
			}
			if($display_bUts== 'hidden'){
				$this->mTemplate->addGlobalVar("DISPLAY_UTS",$display_bUts);
				$jmlTampil -=1;
			}
			if($display_bUas== 'hidden'){
				$this->mTemplate->addGlobalVar("DISPLAY_UAS",$display_bUas);
				$jmlTampil -=1;
			}
			$this->mTemplate->addGlobalVar("JUMLAH_DITAMPILKAN",$jmlTampil);
			
			$jmlTampilCpmk=6;
			$display_bCpmk1 = ($dataKelas["detil"][0]["BOBOTCPMK1"]==0)?'hidden':'';
			$display_bCpmk2 = ($dataKelas["detil"][0]["BOBOTCPMK2"]==0)?'hidden':'';
			$display_bCpmk3 = ($dataKelas["detil"][0]["BOBOTCPMK3"]==0)?'hidden':'';
			$display_bCpmk4 = ($dataKelas["detil"][0]["BOBOTCPMK4"]==0)?'hidden':'';
			$display_bCpmk5 = ($dataKelas["detil"][0]["BOBOTCPMK5"]==0)?'hidden':'';
			$display_bCpmk6 = ($dataKelas["detil"][0]["BOBOTCPMK6"]==0)?'hidden':'';
			if($display_bCpmk1== 'hidden'){
				$this->mTemplate->addGlobalVar("DISPLAY_CPMK1",$display_bCpmk1);
				$jmlTampilCpmk -=1;
			}
			if($display_bCpmk2== 'hidden'){
				$this->mTemplate->addGlobalVar("DISPLAY_CPMK2",$display_bCpmk2);
				$jmlTampilCpmk -=1;
			}
			if($display_bCpmk3== 'hidden'){
				$this->mTemplate->addGlobalVar("DISPLAY_CPMK3",$display_bCpmk3);
				$jmlTampilCpmk -=1;
			}
			if($display_bCpmk4== 'hidden'){
				$this->mTemplate->addGlobalVar("DISPLAY_CPMK4",$display_bCpmk4);
				$jmlTampilCpmk -=1;
			}
			if($display_bCpmk5== 'hidden'){
				$this->mTemplate->addGlobalVar("DISPLAY_CPMK5",$display_bCpmk5);
				$jmlTampilCpmk -=1;
			}
			if($display_bCpmk6== 'hidden'){
				$this->mTemplate->addGlobalVar("DISPLAY_CPMK6",$display_bCpmk6);
				$jmlTampilCpmk -=1;
			}
			$this->mTemplate->addGlobalVar("JUMLAH_DITAMPILKAN_CPMK",$jmlTampilCpmk);
			
			
            if ($readOnly == "NO") {
                // lakukan load pilihan nilai               
                // $pilihanNilai = $this->mDosenServiceObj->GetAllPilihanNilai(1,$kodeProdi); // hidden ccp 
				$pilihanNilai = $this->mDosenServiceObj->GetAllPilihanNilai(0,$kodeProdi);  // add ccp untuk select 'T'
                $jumlahPilihanNilai = count($pilihanNilai);
				
				// echo "line 224<pre>";
				// print_r($dataNilai); 
				// print_r($dataNilaiBobot);
				// echo "</pre>";
			  $this->AddVar("nilai_bobot_visible", "READONLY", "NO");
			   if ($dataNilaiBobot[0]['BOBOT_HARIAN'] !='') {
					$dataNilaiBobot[0]['BOBOT_TOTAL'] =
                            $dataNilaiBobot[0]['BOBOT_HARIAN'] +
                            $dataNilaiBobot[0]['BOBOT_MANDIRI'] +
							$dataNilaiBobot[0]['BOBOT_KELOMPOK'] +
							$dataNilaiBobot[0]['BOBOT_PRESENTASI'] +
                            $dataNilaiBobot[0]['BOBOT_TERSTRUKTUR'] +
                            $dataNilaiBobot[0]['BOBOT_TAMBAHAN'] +
                            $dataNilaiBobot[0]['BOBOT_UTS'] +
                            $dataNilaiBobot[0]['BOBOT_UAS'];
					$this->ParseData("nilai_bobot",$dataNilaiBobot,"");
				 }else{
					$this->AddVar("nilai_bobot", "BOBOT_HARIAN",0);
					$this->AddVar("nilai_bobot", "BOBOT_MANDIRI",0);
					$this->AddVar("nilai_bobot", "BOBOT_KELOMPOK",0);
					$this->AddVar("nilai_bobot", "BOBOT_PRESENTASI",0);
					$this->AddVar("nilai_bobot", "BOBOT_TERSTRUKTUR",0);
                    $this->AddVar("nilai_bobot", "BOBOT_TAMBAHAN",0);
					$this->AddVar("nilai_bobot", "BOBOT_UTS",0);
					$this->AddVar("nilai_bobot", "BOBOT_UAS",0);
					$this->AddVar("nilai_bobot", "KELAS_ID",0);
                    $this->AddVar("nilai_bobot", "BOBOT_TOTAL",0);
					$this->mTemplate->parseTemplate("nilai_bobot","a");
				 }
               if ($pilihanNilai === false) {
                   $this->ShowErrorBox("Tidak dapat mengambil data pilihan nilai. \n");
                   $this->AddVar("nilai_access", "READONLY", "YES");
               } else {
                  $this->AddVar("nilai_access", "READONLY", "NO");
				  $i=0;
                  foreach ($dataNilai as $key=>$value) {
                     $nilaiExist = false;
					 $value["URUT"]=$key;
                     $value["number"] = $key++;
					 
                     $value["idkrsdetil"] = $this->mrConfig->Enc($value["idkrsdetil"]);
					 $nilaiDpna=$this->GetNilaiDpnaObe($value["nif"]);
					 // echo "line 401<pre>";print_r($nilaiDpna);echo "</pre>";
					 $this->mTemplate->clearTemplate('nilai_dpna');
					 $this->AddVar("nilai_access_item_no", "KRSDT_ID", $value['idkrsdetil']);
					

					# cek status tagihan pembayaran prasyarat	
					$value['HIDDEN'] = '';
					$value['MINIMAL_HIDDEN'] = 'style="display:none;"';
					$value['minimal'] = '';
					$value['STYLE_LIGHT'] = '';
                    $statusTagihanPrasyaratMhs =  $this->CekStatusTagihanPrasyaratMhs($value["nif"]);
				  	if($statusTagihanPrasyaratMhs == true){
                     	$this->AddVar("nilai_dpna", "READ_ONLY", 'readonly');

                     	# nilai diambil dari kelompok yang tertinggi                     	
                     	$nilaiArr = array();
					  	foreach ($pilihanNilai as $rowsNilai) {
					  		$nilaiArr[] = $rowsNilai['nilai'];

					  	}
					  	rsort($nilaiArr);
					  	$value['nilai'] = $nilaiArr[0];
					  	$value['minimal'] = $nilaiArr[0];

					  	# perubahan tampilan dari combo ke field
					  	$value['HIDDEN'] = 'style="display:none;"';
					  	$value['MINIMAL_HIDDEN'] = '';

					  	# light warna merah
					  	$warnaLight = 'style="background:#C00; color:#FFF;"';
					  	$value['STYLE_LIGHT'] = $warnaLight;
					  	$this->AddVar("nilai_dpna", "NILAI_STYLE_LIGHT", $warnaLight);
                     }

				 if(!empty($nilaiDpna)){
					 foreach($nilaiDpna as $data){
					    $this->mTemplate->addVars("nilai_dpna", $data, "");
						$this->mTemplate->parseTemplate('nilai_dpna','a');
					 }
				  }else{
				     //$this->AddVar("nilai_dpna", "KRSDT_ID",0);				  				 				 

				     $this->AddVar("nilai_dpna", "KRSDPNSHARIANASAL",0);
					 $this->AddVar("nilai_dpna", "KRSDPNAMANDIRIASAL", 0);
					 $this->AddVar("nilai_dpna", "KRSDPNAKELOMPOKASAL", 0);
					 $this->AddVar("nilai_dpna", "KRSDPNAPRESENTASIASAL", 0);
					 $this->AddVar("nilai_dpna", "KRSDPNATERSTRUKTURASAL", 0);
					 $this->AddVar("nilai_dpna", "KRSDPNATAMBAHANASAL", 0);
					 $this->AddVar("nilai_dpna", "KRSDPNSUTSASAL", 0);
					 $this->AddVar("nilai_dpna", "KRSDPNAUASASAL", 0);
					 $this->AddVar("nilai_dpna", "KRSDPNAHARIANBOBOT", 0);
					 $this->AddVar("nilai_dpna", "KRSDPNAMANDIRIBOBOT", 0);
					 $this->AddVar("nilai_dpna", "KRSDPNAKELOMPOKBOBOT", 0);
					 $this->AddVar("nilai_dpna", "KRSDPNAPRESENTASIBOBOT", 0);
					 $this->AddVar("nilai_dpna", "KRSDPNATERSTRUKTURBOBOT", 0);
                     $this->AddVar("nilai_dpna", "BOBOT_TAMBAHAN",0);
					 $this->AddVar("nilai_dpna", "KRSDPNAUTSBOBOT", 0);
					 $this->AddVar("nilai_dpna", "KRSDPNAUASBOBOT", 0);
					 $this->AddVar("nilai_dpna", "KRSDPNSABSOLUT", 0);
					 
					 $this->AddVar("nilai_dpna", "KRSDPNACPMKASAL1", 0);
					 $this->AddVar("nilai_dpna", "KRSDPNACPMKASAL2", 0);
					 $this->AddVar("nilai_dpna", "KRSDPNACPMKASAL3", 0);
					 $this->AddVar("nilai_dpna", "KRSDPNACPMKASAL4", 0);
					 $this->AddVar("nilai_dpna", "KRSDPNACPMKASAL5", 0);
					 $this->AddVar("nilai_dpna", "KRSDPNACPMKASAL6", 0);
					 $this->AddVar("nilai_dpna", "KRSDPNARECPMKASAL1", 0);
					 $this->AddVar("nilai_dpna", "KRSDPNARECPMKASAL2", 0);
					 $this->AddVar("nilai_dpna", "KRSDPNARECPMKASAL3", 0);
					 $this->AddVar("nilai_dpna", "KRSDPNARECPMKASAL4", 0);
					 $this->AddVar("nilai_dpna", "KRSDPNARECPMKASAL5", 0);
					 $this->AddVar("nilai_dpna", "KRSDPNARECPMKASAL6", 0);
					 $this->AddVar("nilai_dpna", "KRSDPNACPMKBOBOT1", 0);
					 $this->AddVar("nilai_dpna", "KRSDPNACPMKBOBOT2", 0);
					 $this->AddVar("nilai_dpna", "KRSDPNACPMKBOBOT3", 0);
					 $this->AddVar("nilai_dpna", "KRSDPNACPMKBOBOT4", 0);
					 $this->AddVar("nilai_dpna", "KRSDPNACPMKBOBOT5", 0);
					 $this->AddVar("nilai_dpna", "KRSDPNACPMKBOBOT6", 0);
					 
					  $this->mTemplate->parseTemplate('nilai_dpna','a');
				  }
                     foreach ($pilihanNilai as $keyNilai=>$valueNilai) {
                        if ($valueNilai["nilai"] == $value["nilai"]) {
                           $pilihanNilai[$keyNilai]["selected"] = "selected";
                           $nilaiExist = true;
                        } else {
                           $pilihanNilai[$keyNilai]["selected"] = "";
                        }
                     }
                     
                     if ($nilaiExist === false) {
                        //$pilihanNilai[6]["selected"] = "selected";
                        $pilihanNilai[$jumlahPilihanNilai-1]['selected']="selected";
                     }
                     $value['URL_DETAIL']=$url_detail.'&nif='.$value["nif"];

                     $this->AppendVarWithInnerTemplate('nilai_access_item_no', $value, 'NILAI_', 'pilihan_nilai', $pilihanNilai, 'PNL_', false, $value['number']) ;
                    
                  }
                  $this->SetAttribute("btn_ubah", "visibility", "visible");
               }
               $cpId=$nilaiDpna[0]['krsdpnsCpId'];
			   $cp=$this->GetCaraPenilaian();
				 foreach ($cp as $j => $caraNilai) {
		          if ($cpId == $caraNilai["ID"])
		            $caraNilai["IS_SELECT"] = "selected=\"true\"";
		          else
		            $caraNilai["IS_SELECT"] = "";

		          $this->mTemplate->addVars("cara_penilaian", $caraNilai);
		          $this->mTemplate->parseTemplate("cara_penilaian", "a");
		        }
               if ($this->mErrorMessage != "") {
                  $this->ShowErrorBox($this->mErrorMessage);
               }
			 
            }else {
			    
			    $this->AddVar("nilai_bobot_visible", "READONLY", "YES");
				foreach ($dataNilai as $key=>$value) {
				  $number=$key+1;
				  if ($number % 2 == 0 ) {
	                  $this->mTemplate->addVar('nilai_access_item_yes', "ODDEVEN", "EVEN");
	               } else {
	                  $this->mTemplate->addVar('nilai_access_item_yes', "ODDEVEN", "ODD");
	               }
				  $nilaiDpna=$this->GetNilaiDpnaObe($value["nif"]);
				  $this->mTemplate->clearTemplate('nilai_dpna_noedit');
				  if(!empty($nilaiDpna)){
				     
					 foreach($nilaiDpna as $data){
					    $this->mTemplate->addVars("nilai_dpna_noedit", $data, "");
						$this->mTemplate->parseTemplate('nilai_dpna_noedit','a');
					 }
				  }else{
				   
				     $this->AddVar("nilai_dpna_noedit", "KRSDPNSHARIANASAL",0);
					 $this->AddVar("nilai_dpna_noedit", "KRSDPNAMANDIRIASAL", 0);
					 $this->AddVar("nilai_dpna_noedit", "KRSDPNAKELOMPOKASAL", 0);
					 $this->AddVar("nilai_dpna_noedit", "KRSDPNAPRESENTASIBOBOT", 0);
					 $this->AddVar("nilai_dpna_noedit", "KRSDPNATERSTRUKTURASAL", 0);
					 $this->AddVar("nilai_dpna_noedit", "KRSDPNATAMBAHANASAL", 0);
					 $this->AddVar("nilai_dpna_noedit", "KRSDPNSUTSASAL", 0);
					 $this->AddVar("nilai_dpna_noedit", "KRSDPNAUASASAL", 0);
					 $this->AddVar("nilai_dpna_noedit", "KRSDPNAHARIANBOBOT", 0);
					 $this->AddVar("nilai_dpna_noedit", "KRSDPNAMANDIRIBOBOT", 0);
					 $this->AddVar("nilai_dpna_noedit", "KRSDPNAKELOMPOKBOBOT", 0);
					 $this->AddVar("nilai_dpna_noedit", "KRSDPNAPRESENTASIBOBOT", 0);
					 $this->AddVar("nilai_dpna_noedit", "KRSDPNATERSTRUKTURBOBOT", 0);
					 $this->AddVar("nilai_dpna_noedit", "KRSDPNATAMBAHANBOBOT", 0);
					 $this->AddVar("nilai_dpna_noedit", "KRSDPNAUTSBOBOT", 0);
					 $this->AddVar("nilai_dpna_noedit", "KRSDPNAUASBOBOT", 0);
					 $this->AddVar("nilai_dpna_noedit", "KRSDPNSABSOLUT", 0);
					 
					 $this->AddVar("nilai_dpna_noedit", "KRSDPNACPMKASAL1", 0);
					 $this->AddVar("nilai_dpna_noedit", "KRSDPNACPMKASAL2", 0);
					 $this->AddVar("nilai_dpna_noedit", "KRSDPNACPMKASAL3", 0);
					 $this->AddVar("nilai_dpna_noedit", "KRSDPNACPMKASAL4", 0);
					 $this->AddVar("nilai_dpna_noedit", "KRSDPNACPMKASAL5", 0);
					 $this->AddVar("nilai_dpna_noedit", "KRSDPNACPMKASAL6", 0);
					 $this->AddVar("nilai_dpna_noedit", "KRSDPNARECPMKASAL1", 0);
					 $this->AddVar("nilai_dpna_noedit", "KRSDPNARECPMKASAL2", 0);
					 $this->AddVar("nilai_dpna_noedit", "KRSDPNARECPMKASAL3", 0);
					 $this->AddVar("nilai_dpna_noedit", "KRSDPNARECPMKASAL4", 0);
					 $this->AddVar("nilai_dpna_noedit", "KRSDPNARECPMKASAL5", 0);
					 $this->AddVar("nilai_dpna_noedit", "KRSDPNARECPMKASAL6", 0);
					 $this->AddVar("nilai_dpna_noedit", "KRSDPNACPMKBOBOT1", 0);
					 $this->AddVar("nilai_dpna_noedit", "KRSDPNACPMKBOBOT2", 0);
					 $this->AddVar("nilai_dpna_noedit", "KRSDPNACPMKBOBOT3", 0);
					 $this->AddVar("nilai_dpna_noedit", "KRSDPNACPMKBOBOT4", 0);
					 $this->AddVar("nilai_dpna_noedit", "KRSDPNACPMKBOBOT5", 0);
					 $this->AddVar("nilai_dpna_noedit", "KRSDPNACPMKBOBOT6", 0);
					 
					 $this->mTemplate->parseTemplate('nilai_dpna_noedit','a');
				  }
				  $value['URL_DETAIL']=$url_detail.'&nif='.$value["nif"];
				  $this->mTemplate->addVars('nilai_access_item_yes_ok', $value, "NILAI_");
				  $this->mTemplate->parseTemplate('nilai_access_item_yes_ok','a');
				}
				$cpId=$nilaiDpna[0]['krsdpnsCpId'];
				   $cp=$this->GetCaraPenilaian();
					 foreach ($cp as $j => $caraNilai) {
			          if ($cpId == $caraNilai["ID"])
			            $caraNilai["IS_SELECT"] = "selected=\"true\"";
			          else
			            $caraNilai["IS_SELECT"] = "";

			          $this->mTemplate->addVars("cara_penilaian", $caraNilai);
			          $this->mTemplate->parseTemplate("cara_penilaian", "a");
			        }
               $this->AddVar("nilai_access", "READONLY", "YES");
			   
               //$this->ParseData('nilai_access_item_yes', $dataNilai, "NILAI_",1);
            }
			
			
         } else { 
            $this->mErrorMessage .= $this->mDosenServiceObj->GetProperty("ErrorMessages");
            $this->AddVar("nilai", "NILAI_AVAILABLE", "NO");
            $this->AddVar("empty_type", "TYPE", "INFO");
            $this->AddVar("empty_box", "WARNING_MESSAGE",$this->ComposeErrorMessage(
               "Pengambilan data nilai tidak berhasil. \nTidak ada mahasiswa yang mengambil kelas ini. \n" , $this->mErrorMessage));   
         }
      }  
      $this->AddVar("content", "URL_PROCESS", $this->mrConfig->GetURL("history_nilai_obe", "dosen", "process"));

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