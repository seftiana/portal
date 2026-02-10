<?php
   
class DisplayPrintInputNilaiObe extends DisplayBasePrint {
   var $mErrorMessage;
   var $mDosenServiceObj;
   var $mServiceServerAddress;
   var $mKelasId;
   var $mSemesterIdToView;
   var $mPerNif;
   var $mHalaman;
   var $mAfterProc;
    /**
    * DisplayPrintInputNilaiObe::DisplayPrintInputNilaiObe
    * Constructor
    *
    * @param configObject object Configuration
    * @param security object Security
    * @param errMsg string error message
    */
   function DisplayPrintInputNilaiObe(&$configObject, &$security, $errMsg,$semester, $kelas, $serverAddress, $halaman, $perNif, $afterProc, $prodi_kode_kelas) {
      DisplayBasePrint::DisplayBasePrint($configObject, $security);
      $this->mErrorMessage = $errMsg;
      $this->mKelasId = $kelas;
      $this->mServiceServerAddress = $serverAddress;
      $this->mHalaman = $halaman;
	  $this->mPerNif=$perNif;
	  $this->mFinansiServiceAddress = $this->mrUserSession->GetProperty("FinansiServiceAddress");      
      $this->mDosenServiceObj = new DosenClientService($this->mServiceServerAddress, false, 
                         $this->mrUserSession->GetProperty("UserReferenceId"), $this->mrUserSession->GetProperty("UserProdiId"));
      $this->mSemesterIdToView = $semester;
      $this->mKodeProdiKelas = $prodi_kode_kelas;
      $this->SetErrorAndEmptyBox();  
      $this->SetTemplateBasedir($configObject->GetValue('app_module') . 'dosen/templates');
	  
	    // $this->SetTemplateFile('view_grade_management.html');
	    $this->SetTemplateFile('print_input_nilai_obe.html');
		$this->mAfterProc=$afterProc;
	}
   
   
   /**
    * DisplayPrintInputNilaiObe::GetStudentsGrade
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
   
   function GetNilaiBobotObe(){
   
      $bobot=$this->mDosenServiceObj->GetNilaiBobotPerKelasObe($this->mKelasId);//echo'<pre>';print_r($bobot);echo'</pre>';
	  if (false === $bobot) {
         return false;
      } else {
         return $bobot;
      }
   }
   
   function DetailNilai(){
      
      $semesterInfo = $this->mDosenServiceObj->GetNamaSemesterForSemesterId($this->mSemesterIdToView);
	  $dataKelas = $this->GetInfoKelas();
	  foreach($dataKelas['detil'] as $value){
	     $value['semester_info']=$semesterInfo[0]['nama'].' '.$semesterInfo[0]['tahun'];
	     $this->mTemplate->addVars('content', $value, "");
	  }
	  $dataNilai = $this->GetStudentsGrade();
	  for($i=0;$i<count($dataNilai);$i++){
	     if($dataNilai[$i]['nif']==$this->mPerNif){
		    $this->mTemplate->addVars('data_diri', $dataNilai[$i], "");
		 }
	  }
	  $nilaiDpna=$this->GetNilaiDpnaObe($this->mPerNif);
	  if(!empty($nilaiDpna)){
		  foreach($nilaiDpna as $data){
		     if($dataNilai[0]['nilai']==$data['krsdpnaRelatif']){
			     $data['nilai_kode']=$data['krsdpnaRelatif'];
			  }else{
			     $data['nilai_kode']=$dataNilai[0]['nilai'];
			  }
		     $this->mTemplate->addVars('dpna', $data, "");
			 $this->mTemplate->parseTemplate('dpna', 'a');
		  }
	  }else{
	    $this->AddVar("dpna", "KRSDPNSHARIANASAL",0);
		$this->AddVar("dpna", "KRSDPNAMANDIRIASAL", 0);
		$this->AddVar("dpna", "KRSDPNAKELOMPOKASAL", 0);
		$this->AddVar("dpna", "KRSDPNAPRESENTASIASAL", 0);
		$this->AddVar("dpna", "KRSDPNATERSTRUKTURASAL", 0);
		$this->AddVar("dpna", "KRSDPNSUTSASAL", 0);
		$this->AddVar("dpna", "KRSDPNAUASASAL", 0);
		$this->AddVar("dpna", "KRSDPNAREMEDIALASAL", 0); #add ccp 30-08-2018
		$this->AddVar("dpna", "KRSDPNAHARIANBOBOT", 0);
		$this->AddVar("dpna", "KRSDPNAMANDIRIBOBOT", 0);
		$this->AddVar("dpna", "KRSDPNAKELOMPOKBOBOT", 0);
		$this->AddVar("dpna", "KRSDPNAPRESENTASIBOBOT", 0);
		$this->AddVar("dpna", "KRSDPNATERSTRUKTURBOBOT", 0);
		$this->AddVar("dpna", "KRSDPNAUTSBOBOT", 0);
		$this->AddVar("dpna", "KRSDPNAUASBOBOT", 0);
		$this->AddVar("dpna", "KRSDPNSABSOLUT", 0);
		$this->AddVar("dpna", "NILAI_KODE", $dataNilai[0]['nilai']);
		$this->mTemplate->parseTemplate('nilai_dpna','a');
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

   	function GetTagihanPrasyaratMahasiswa($arrNim,$smt='') {
         if($this->mFinansiServiceAddress == ''){
         	$this->ShowErrorBox("Pengambilan data tagihan tidak berhasil.");            
         } else{
            $restClient = new RestClient();
            $restClient->SetPath($this->mFinansiServiceAddress.'?mod=lap_histori_pembayaran&sub=HistoriPembayaranMahasiswa&typ=rest&act=rest');
            // $restClient->SetGet('&prasyarat=yes&nim='.$arrNim);
            $restClient->SetGet('&prasyarat=yes&smt='.$smt.'&nim='.$arrNim); //add ccp 15-8-2018
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
      DisplayBasePrint::Display("[ Logout ]");
	  
		  if($this->mHalaman=='detail'){
		    
			 $det=$this->DetailNilai();
		  }
      if ($init === false){
         $this->ShowErrorBox();
      } else {
         $dataKelas = $this->GetInfoKelas(); //print_r($dataKelas['detil']);
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
         $this->AddVar("content", "USER", $this->mrUserSession->GetProperty("User").' / '. $this->mrUserSession->GetProperty("UserFullName"));
         
         $dataNilaiBobot=$this->GetNilaiBobotObe();
         
		//  $resKodeNilai = $this->mDosenServiceObj->GetKodeNilai($this->mrUserSession->GetProperty("UserProdiId")); //hidden by ccp 16 mar 2017 prodinya harusnya sesuai kelasnya
		 $resKodeNilai = $this->mDosenServiceObj->GetKodeNilai($kodeProdi);  // add ccp
		 $json = array();
		 foreach($resKodeNilai as $kodeNilai) {
			$json[] = "{min:".$kodeNilai['SKOR_MIN'].",max:".$kodeNilai['SKOR_MAX'].",score:\"".$kodeNilai['KODE_NILAI']."\"}";
		 }
		 $json = implode(',',$json);
		 $this->AddVar("content", "SCORE_JSON", $json );
		 
         $dataNilai = $this->GetStudentsGrade();//print_r($dataNilai);exit;
			// echo'<pre>';print_r($dataNilai);die;
         if (false !== $dataNilai) {
            //tampilkan data matakuliah ditawarkan
            $this->AddVar("nilai", "NILAI_AVAILABLE", "YES");
            $hakAkses = $this->mDosenServiceObj->GetHakAksesDosenForInputNilai($this->mKelasId);
			/*
			foreach($dataNilai as $data){
			if (!empty($data['nilai'])) {
				if($this->mAfterProc=='1'){
					$this->ShowInfoBox("Penyimpanan nilai berhasil.");
				}
	
				break;			   
			}}*/
			
            if (false === $hakAkses || $hakAkses[0]["BOLEHINPUT"] != 1) {
               $this->ShowErrorBox("Tidak dapat memasukkan nilai, anda tidak mempunyai hak input nilai");
			  
            }

			// $semesterProdiId = $this->mDosenServiceObj->GetSemesterProdiIdForSemesterId($this->mSemesterIdToView,$this->mKodeProdiKelas); //add ccp 10 maret 2017
			
			//kondisional tampil komponen nilai
			$jmlTampil=6;
			$this->mTemplate->addGlobalVar("DISPLAY_CPMK1",'');
			$this->mTemplate->addGlobalVar("DISPLAY_CPMK2",'');
			$this->mTemplate->addGlobalVar("DISPLAY_CPMK3",'');
			$this->mTemplate->addGlobalVar("DISPLAY_CPMK4",'');
			$this->mTemplate->addGlobalVar("DISPLAY_CPMK5",'');
			$this->mTemplate->addGlobalVar("DISPLAY_CPMK6",'');
			if($dataNilaiBobot[0]['BOBOT_CPMK1'] == '' || $dataNilaiBobot[0]['BOBOT_CPMK1']==0){
				$this->mTemplate->addGlobalVar("DISPLAY_CPMK1",'hidden');
				$jmlTampil -=1;
			}
			if($dataNilaiBobot[0]['BOBOT_CPMK2'] == '' || $dataNilaiBobot[0]['BOBOT_CPMK2']==0){
				$this->mTemplate->addGlobalVar("DISPLAY_CPMK2",'hidden');
				$jmlTampil -=1;
			}
			if($dataNilaiBobot[0]['BOBOT_CPMK3'] == '' || $dataNilaiBobot[0]['BOBOT_CPMK3']==0){
				$this->mTemplate->addGlobalVar("DISPLAY_CPMK3",'hidden');
				$jmlTampil -=1;
			}
			if($dataNilaiBobot[0]['BOBOT_CPMK4'] == '' || $dataNilaiBobot[0]['BOBOT_CPMK4']==0){
				$this->mTemplate->addGlobalVar("DISPLAY_CPMK4",'hidden');
				$jmlTampil -=1;
			}
			if($dataNilaiBobot[0]['BOBOT_CPMK5'] == '' || $dataNilaiBobot[0]['BOBOT_CPMK5']==0){
				$this->mTemplate->addGlobalVar("DISPLAY_CPMK5",'hidden');
				$jmlTampil -=1;
			}
			if($dataNilaiBobot[0]['BOBOT_CPMK6'] == '' || $dataNilaiBobot[0]['BOBOT_CPMK6']==0){
				$this->mTemplate->addGlobalVar("DISPLAY_CPMK6",'hidden');
				$jmlTampil -=1;
			}
			
			$this->mTemplate->addGlobalVar("JUMLAH_DITAMPILKAN",$jmlTampil);
 
            
			    
			$this->AddVar("nilai_bobot_visible", "READONLY", "YES");
			foreach ($dataNilai as $key=>$value) {
			  $number=$key+1;
			  $this->mTemplate->addVar('nilai_access_item_yes', "ODDEVEN", "EVEN");
			  $nilaiDpna=$this->GetNilaiDpnaObe($value["nif"]);
			  // echo'<pre>';print_r($nilaiDpna);die;
			  $this->mTemplate->clearTemplate('nilai_dpna_noedit');
			  if(!empty($nilaiDpna)){
				 
				 foreach($nilaiDpna as $data){
					$this->mTemplate->addVars("nilai_dpna_noedit", $data, "");
					$this->mTemplate->parseTemplate('nilai_dpna_noedit','a');
				 }
			  }else{
			   
				 $this->AddVar("nilai_dpna_noedit", "KRSDPNACPMKASAL1",0);
				 $this->AddVar("nilai_dpna_noedit", "KRSDPNACPMKASAL2", 0);
				 $this->AddVar("nilai_dpna_noedit", "KRSDPNACPMKASAL3", 0);
				 $this->AddVar("nilai_dpna_noedit", "KRSDPNACPMKASAL4", 0);
				 $this->AddVar("nilai_dpna_noedit", "KRSDPNACPMKASAL5", 0);
				 $this->AddVar("nilai_dpna_noedit", "KRSDPNACPMKASAL6", 0);
				 $this->AddVar("nilai_dpna_noedit", "KRSDPNSABSOLUT", 0);
				  $this->mTemplate->parseTemplate('nilai_dpna_noedit','a');
			  }
			  $nomor =$nomor+1; 
			  $value['NOMOR']=$nomor;
			  $this->mTemplate->addVars('nilai_access_item_yes_ok', $value, "NILAI_");
			  $this->mTemplate->parseTemplate('nilai_access_item_yes_ok','a');
			}
			
		   $this->AddVar("nilai_access", "READONLY", "YES");
		   

				
			$dataNilaiBobot[0]['BOBOT_TOTAL'] =
					$dataNilaiBobot[0]['BOBOT_CPMK1'] +
					$dataNilaiBobot[0]['BOBOT_CPMK2'] +
					$dataNilaiBobot[0]['BOBOT_CPMK3'] +
					$dataNilaiBobot[0]['BOBOT_CPMK4'] +
					$dataNilaiBobot[0]['BOBOT_CPMK5'] +
					$dataNilaiBobot[0]['BOBOT_CPMK6'];
			$this->ParseData("nilai_bobot",$dataNilaiBobot,"");
			
			
			
         } else { 
            $this->mErrorMessage .= $this->mDosenServiceObj->GetProperty("ErrorMessages");
            $this->AddVar("nilai", "NILAI_AVAILABLE", "NO");
            $this->AddVar("empty_type", "TYPE", "INFO");
            $this->AddVar("empty_box", "WARNING_MESSAGE",$this->ComposeErrorMessage(
               "Pengambilan data nilai tidak berhasil. \nTidak ada mahasiswa yang mengambil kelas ini. \n" , $this->mErrorMessage));   
         }
      }  
      $this->AddVar("content", "URL_PROCESS", $this->mrConfig->GetURL("dosen", "dosen", "process"));

      $this->AddVar("content", "KLS", $this->mrConfig->Enc($this->mKelasId));
      $this->AddVar("content", "KODE_PRODI", $this->mrConfig->Enc($kodeProdi));
      $this->AddVar("content", "SIA", $this->mrConfig->Enc($this->mServiceServerAddress));
      $this->AddVar("content", "SMT", $this->mrConfig->Enc($this->mSemesterIdToView));
      $this->AddVar("content", "NOW", date("d-m-Y H:i:s"));
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