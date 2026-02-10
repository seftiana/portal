<?php
/**
 * DisplayViewGradeManagement
 * DisplayViewGradeManagement class
 * 
 * @package dosen 
 * @author Maya Alipin
 * @copyright Copyright (c) 2006 GamaTechno
 * @version 1.0 
 * @date 2006-04-7
 * @revision 
 *
 */
   
class DisplayViewGradeManagement extends DisplayBaseFull {
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
    /**
    * DisplayViewGradeManagement::DisplayViewGradeManagement
    * Constructor
    *
    * @param configObject object Configuration
    * @param security object Security
    * @param errMsg string error message
    */
   function DisplayViewGradeManagement(&$configObject, &$security, $errMsg,$semester, $kelas, $serverAddress, $halaman, $perNif, $afterProc, $prodi_kode_kelas) {
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
      $this->SetErrorAndEmptyBox();  
      $this->SetTemplateBasedir($configObject->GetValue('app_module') . 'dosen/templates');
	  if($halaman=='detail'){
	     $this->SetTemplateFile('view_detail_students.html');
		 
	  }else{
	     $this->SetTemplateFile('view_grade_management.html');
		 $this->mAfterProc=$afterProc;
	  }
      
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
   
   function GetNilaiBobot(){
   
      $bobot=$this->mDosenServiceObj->GetNilaiBobotPerKelas($this->mKelasId);//print_r($bobot);
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
	  $nilaiDpna=$this->GetNilaiDpna($this->mPerNif);
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
   
   function GetNilaiDpna($nif){
      $dpna=$this->mDosenServiceObj->GetKrsDpnaNiu($this->mKelasId,$nif);
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
            // $restClient->SetGet('&prasyarat=yes&smt='.$smt.'&nim='.$arrNim); //add ccp 15-8-2018
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
      DisplayBaseFull::Display("[ Logout ]");
	  
		  if($this->mHalaman=='detail'){
		    
			 $det=$this->DetailNilai();
		  }
      if ($init === false){
         $this->ShowErrorBox();
      } else {
		  
         $dataKelas = $this->GetInfoKelas(); //echo'<pre>';print_r($dataKelas['detil']);die;
         //$kodeProdi = $dataKelas['detil'][0]['kode_prodi']; //ganti diambil dari kelas yg diklik
	 $kodeProdi = $this->mKodeProdiKelas; #update ccp 20-12-2020 

         if ($dataKelas != false){
            if (isset($dataKelas["detil"][0]["nama"]))
               $this->AddVar("content", "MATAKULIAH", $dataKelas["detil"][0]["nama"]);
            if (isset($dataKelas["detil"][0]["nama_mata_kuliah"]))
               $this->AddVar("content", "KELAS", $dataKelas["detil"][0]["nama_mata_kuliah"]);
         }
         
         $semesterInfo = $this->mDosenServiceObj->GetNamaSemesterForSemesterId($this->mSemesterIdToView);
         $semesterInfo  = $semesterInfo[0]["nama"] ." ". $semesterInfo[0]["tahun"] ."/". ($semesterInfo[0]["tahun"] + 1);
         $this->AddVar("content", "SEMESTER", $semesterInfo );
		 $url_print= $this->mrConfig->GetURL('dosen', 'input_nilai', 'print') .
						'&kelas=' . $this->mrConfig->Enc($dataKelas['detil'][0]['klas_id']) .
						'&smt=' . $this->mrConfig->Enc($this->mSemesterIdToView) . 
                        '&sia=' . $this->mrConfig->Enc($this->mServiceServerAddress) .
						'&pkk='.$this->mrConfig->Enc($this->mKodeProdiKelas) ;
		 $this->AddVar("content", "URL_PRINT", $url_print ); //add ccp 18-12-2018
         $dataNilaiBobot=$this->GetNilaiBobot();
         
		//  $resKodeNilai = $this->mDosenServiceObj->GetKodeNilai($this->mrUserSession->GetProperty("UserProdiId")); //hidden by ccp 16 mar 2017 prodinya harusnya sesuai kelasnya
		 $resKodeNilai = $this->mDosenServiceObj->GetKodeNilai($kodeProdi);  // add ccp
		 $json = array();
		 foreach($resKodeNilai as $kodeNilai) {
			$json[] = "{min:".$kodeNilai['SKOR_MIN'].",max:".$kodeNilai['SKOR_MAX'].",score:\"".$kodeNilai['KODE_NILAI']."\"}";
		 }
		 $json = implode(',',$json);
		 $this->AddVar("content", "SCORE_JSON", $json );
		 
		 /*if (!empty($dataNilaiBobot[0]['BOBOT_HARIAN'])) {
			/*foreach($dataNilaiBobot as $value){
			   $this->AddVars("nilai_bobot", $value, "");
			   $this->parseTemplate("nilai_bobot");
			}
			$this->ParseData("nilai_bobot",$dataNilaiBobot,"");
		 }else{
		 
			$this->AddVar("nilai_bobot", "BOBOT_HARIAN",0);
			$this->AddVar("nilai_bobot", "BOBOT_MANDIRI",0);
			$this->AddVar("nilai_bobot", "BOBOT_TERSTRUKTUR",0);
			$this->AddVar("nilai_bobot", "BOBOT_UTS",0);
			$this->AddVar("nilai_bobot", "BOBOT_UAS",0);
			$this->AddVar("nilai_bobot", "KELAS_ID",0);
			$this->mTemplate->parseTemplate("nilai_bobot","a");
		 }*/
         $dataNilai = $this->GetStudentsGrade();//print_r($dataNilai);exit;

         if (false !== $dataNilai) {
            $url_detail=$this->mrConfig->GetURL('dosen','grade_management','view')."&pBl=".$this->mrConfig->enc("detail")."&pGo=".$this->mrConfig->enc("detail")
			."&kelas=".$this->mKelasId."&smt=".$this->mSemesterIdToView;//print_r($this->mSemesterIdToView);
            //tampilkan data matakuliah ditawarkan
            $this->AddVar("nilai", "NILAI_AVAILABLE", "YES");
            $hakAkses = $this->mDosenServiceObj->GetHakAksesDosenForInputNilai($this->mKelasId);
            $readOnly = "NO";
            $readOnlyRemed = "YES";
			
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
//print_r($this->mDosenServiceObj);
			//$semesterProdiId = $this->mDosenServiceObj->GetSemesterProdiIdForSemesterId($this->mSemesterIdToView,$this->mrUserSession->GetProperty("UserProdiId"));  // hide ccp 10 maret 2017
			$semesterProdiId = $this->mDosenServiceObj->GetSemesterProdiIdForSemesterId($this->mSemesterIdToView,$this->mKodeProdiKelas); //add ccp 10 maret 2017
			$cekPeriode = $this->mDosenServiceObj->GetSemesterInformation($semesterProdiId);
         if (($cekPeriode[0]["current_periode_input_nilai"] == "BUKANPERIODEINPUTNILAI") && $readOnly == "NO") {
            $this->ShowErrorBox("Tidak dapat memasukkan nilai, bukan periode input nilai");
            $readOnly = "YES";
			
			$cekPeriodeRemed = $this->mDosenServiceObj->GetSemesterInformationRemedial($semesterProdiId);
			if($cekPeriodeRemed[0]['current_periode_input_nilai']=="PERIODEINPUTNILAI" && $cekPeriodeRemed[0]['sempIsAktif']=='1'){
				$readOnlyRemed="NO";
				$this->ShowErrorBox("Input Nilai Remedial");
			}
         
         } 
            /*
            if (($this->mDosenServiceObj->GetProperty("CurrentPeriodeInputNilai") == "BUKANPERIODEINPUTNILAI") && $readOnly == "NO") {
               $this->ShowErrorBox("Tidak dapat memasukkan nilai, bukan periode input nilai");
               $readOnly = "YES";
			   
            } 
			*/
			
			//kondisional tampil komponen nilai
			$jmlTampil=8;
			if($dataNilaiBobot[0]['DISPLAY_HARIAN'] == 'hidden'){
				$this->mTemplate->addGlobalVar("DISPLAY_HARIAN",$dataNilaiBobot[0]['DISPLAY_HARIAN']);
				$jmlTampil -=1;
			}
			if($dataNilaiBobot[0]['DISPLAY_MANDIRI'] == 'hidden'){
				$this->mTemplate->addGlobalVar("DISPLAY_MANDIRI",$dataNilaiBobot[0]['DISPLAY_MANDIRI']);
				$jmlTampil -=1;
			}
			if($dataNilaiBobot[0]['DISPLAY_KELOMPOK'] == 'hidden'){
				$this->mTemplate->addGlobalVar("DISPLAY_KELOMPOK",$dataNilaiBobot[0]['DISPLAY_KELOMPOK']);
				$jmlTampil -=1;
			}
			if($dataNilaiBobot[0]['DISPLAY_PRESENTASI'] == 'hidden'){
				$this->mTemplate->addGlobalVar("DISPLAY_PRESENTASI",$dataNilaiBobot[0]['DISPLAY_PRESENTASI']);
				$jmlTampil -=1;
			}
			if($dataNilaiBobot[0]['DISPLAY_TERSTRUKTUR'] == 'hidden'){
				$this->mTemplate->addGlobalVar("DISPLAY_TERSTRUKTUR",$dataNilaiBobot[0]['DISPLAY_TERSTRUKTUR']);
				$jmlTampil -=1;
			}
			if($dataNilaiBobot[0]['DISPLAY_TAMBAHAN'] == 'hidden'){
				$this->mTemplate->addGlobalVar("DISPLAY_TAMBAHAN",$dataNilaiBobot[0]['DISPLAY_TAMBAHAN']);
				$jmlTampil -=1;
			}
			if($dataNilaiBobot[0]['DISPLAY_UTS'] == 'hidden'){
				$this->mTemplate->addGlobalVar("DISPLAY_UTS",$dataNilaiBobot[0]['DISPLAY_UTS']);
				$jmlTampil -=1;
			}
			if($dataNilaiBobot[0]['DISPLAY_UAS'] == 'hidden'){
				$this->mTemplate->addGlobalVar("DISPLAY_UAS",$dataNilaiBobot[0]['DISPLAY_UAS']);
				$jmlTampil -=1;
			}
			$this->mTemplate->addGlobalVar("JUMLAH_DITAMPILKAN",$jmlTampil);
 
            if ($readOnly == "NO") {
				
               // lakukan load pilihan nilai               
                // $pilihanNilai = $this->mDosenServiceObj->GetAllPilihanNilai(1,$kodeProdi); // hidden ccp 
				$pilihanNilai = $this->mDosenServiceObj->GetAllPilihanNilai(0,$kodeProdi);  // add ccp untuk select 'T'
               $jumlahPilihanNilai = count($pilihanNilai);
              // echo "<pre>"; print_r($pilihanNilai); echo "</pre>";
			  $this->AddVar("nilai_bobot_visible", "READONLY", "NO");
			   if (!empty($dataNilaiBobot[0]['BOBOT_HARIAN'])) {
					
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
					 $nilaiDpna=$this->GetNilaiDpna($value["nif"]);
					 
					 
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
				     $this->AddVar("nilai_dpna", "REMED","hidden"); # add ccp 5-11-2018
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
					 $this->AddVar("nilai_dpna", "KRSDPNAREMEDIALASAL", 0); #add ccp 30-08-2018
					 $this->AddVar("nilai_dpna", "KRSDPNAHARIANBOBOT", 0);
					 $this->AddVar("nilai_dpna", "KRSDPNAMANDIRIBOBOT", 0);
					 $this->AddVar("nilai_dpna", "KRSDPNAKELOMPOKBOBOT", 0);
					 $this->AddVar("nilai_dpna", "KRSDPNAPRESENTASIBOBOT", 0);
					 $this->AddVar("nilai_dpna", "KRSDPNATERSTRUKTURBOBOT", 0);
                     $this->AddVar("nilai_dpna", "BOBOT_TAMBAHAN",0);
					 $this->AddVar("nilai_dpna", "KRSDPNAUTSBOBOT", 0);
					 $this->AddVar("nilai_dpna", "KRSDPNAUASBOBOT", 0);
					 $this->AddVar("nilai_dpna", "KRSDPNSABSOLUT", 0);
					 $this->AddVar("nilai_dpna", "REMED","hidden"); # add ccp 7-9-2018
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
				  // echo'<pre>';echo'</pre>'.$value["nif"].'-'.$this->mKelasId; echo "-uhuyssssf";die;
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
			   
			   
            }else if($readOnly == "YES" && $readOnlyRemed=="NO") {
				
				$pilihanNilai = $this->mDosenServiceObj->GetAllPilihanNilai(0,$kodeProdi);  // add ccp untuk select 'T'
               $jumlahPilihanNilai = count($pilihanNilai);
			  $this->AddVar("nilai_bobot_visible", "READONLY", "NO");
			   if (!empty($dataNilaiBobot[0]['BOBOT_HARIAN'])) {
					
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
					 $nilaiDpna=$this->GetNilaiDpna($value["nif"]);
					 $this->mTemplate->clearTemplate('nilai_dpna');
					 $this->AddVar("nilai_access_item_no", "KRSDT_ID", $value['idkrsdetil']);
					

					# cek status tagihan pembayaran prasyarat	
					$value['HIDDEN'] = '';
					$value['MINIMAL_HIDDEN'] = 'style="display:none;"';
					$value['minimal'] = '';
					$value['STYLE_LIGHT'] = '';
                    $statusTagihanPrasyaratMhs =  $this->CekStatusTagihanPrasyaratMhs($value["nif"]);
					// if($nilaiDpna[0]['krsdtIsRemedial']==1){
						// $this->AddVar("nilai_dpna", "REMED","text");
					 // }else{
						// $this->AddVar("nilai_dpna", "REMED","hidden"); 
					 // }
				  	if($statusTagihanPrasyaratMhs == true){
                     	$this->AddVar("nilai_dpna", "READ_ONLY", 'readonly');
						$this->AddVar("nilai_dpna", "REMED","hidden");
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
                    			 }else{
						 $this->AddVar("nilai_dpna", "READ_ONLY", 'readonly');
						 $this->AddVar("nilai_dpna", "REMED","text");
					 }
					 if($nilaiDpna[0]['krsdtIsRemedial']!=1){
						$this->AddVar("nilai_dpna", "READ_ONLY", 'readonly');
						$this->AddVar("nilai_dpna", "REMED","hidden");
						# perubahan tampilan dari combo ke field
					  	$value['HIDDEN'] = 'style="display:none;"';
					  	$value['MINIMAL_HIDDEN'] = '';

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
					 $this->AddVar("nilai_dpna", "KRSDPNAREMEDIALASAL", 0); #add ccp 30-08-2018
					 $this->AddVar("nilai_dpna", "KRSDPNAHARIANBOBOT", 0);
					 $this->AddVar("nilai_dpna", "KRSDPNAMANDIRIBOBOT", 0);
					 $this->AddVar("nilai_dpna", "KRSDPNAKELOMPOKBOBOT", 0);
					 $this->AddVar("nilai_dpna", "KRSDPNAPRESENTASIBOBOT", 0);
					 $this->AddVar("nilai_dpna", "KRSDPNATERSTRUKTURBOBOT", 0);
                     $this->AddVar("nilai_dpna", "BOBOT_TAMBAHAN",0);
					 $this->AddVar("nilai_dpna", "KRSDPNAUTSBOBOT", 0);
					 $this->AddVar("nilai_dpna", "KRSDPNAUASBOBOT", 0);
					 $this->AddVar("nilai_dpna", "KRSDPNSABSOLUT", 0);
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
				  $nilaiDpna=$this->GetNilaiDpna($value["nif"]);
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
					 $this->AddVar("nilai_dpna_noedit", "KRSDPNAREMEDIALASAL", 0); #add ccp 30-08-2018
					 $this->AddVar("nilai_dpna_noedit", "KRSDPNAHARIANBOBOT", 0);
					 $this->AddVar("nilai_dpna_noedit", "KRSDPNAMANDIRIBOBOT", 0);
					 $this->AddVar("nilai_dpna_noedit", "KRSDPNAKELOMPOKBOBOT", 0);
					 $this->AddVar("nilai_dpna_noedit", "KRSDPNAPRESENTASIBOBOT", 0);
					 $this->AddVar("nilai_dpna_noedit", "KRSDPNATERSTRUKTURBOBOT", 0);
					 $this->AddVar("nilai_dpna_noedit", "KRSDPNATAMBAHANBOBOT", 0);
					 $this->AddVar("nilai_dpna_noedit", "KRSDPNAUTSBOBOT", 0);
					 $this->AddVar("nilai_dpna_noedit", "KRSDPNAUASBOBOT", 0);
					 $this->AddVar("nilai_dpna_noedit", "KRSDPNSABSOLUT", 0);
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
      $this->AddVar("content", "URL_PROCESS", $this->mrConfig->GetURL("dosen", "dosen", "process"));

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