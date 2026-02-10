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
         $this->SetTemplateBasedir($configObject->GetValue('app_module') . 'proposed_classes/templates/');
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
         $semesterPaket = $this->mObjKrsService->GetSemesterPaket($mhsNiu);                 
         $krsItem = $this->mObjKrsService->GetAllProposedClassesKrsForSemester($mhsNiu);
         if (false === $krsItem) {
            return false;
         }
         else {            
            if(empty($semesterPaket)){
               $reKrsItem = $krsItem;
            } else {
               $reKrsItem = array();
               foreach ($krsItem as $valKrs) {
                  if($valKrs['SEMESTER_KURIKULUM'] == $semesterPaket){
                     $reKrsItem[] = $valKrs;
                  }                  
               }
            }            

            return $reKrsItem;
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
      	 $mhsNiu = $this->mUserId;
      	 
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
            //echo "<pre>";print_r($dataMkul); echo "</pre>";
	    //exit;
			   
            if (false !== $dataMkul) {
               $semester_sebelum = $dataMkul[0]['SEMESTER_KURIKULUM'];
               $is_odd = "ODD";
               
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
					//add cecep 3 agustus 2018 kelas penuh
					if($dataMkul[$i]['IS_KELAS_PENUH']==1){
						$dataMkul[$i]['DISABLED'] = "Penuh";
						$this->mTemplate->addVars('matakuliah_item',$dataMkul[$i],"TAWAR_");
					}else{
						$dataMkul[$i]['DISABLED'] = "<input type='checkbox' name='kodeMkul[]' value='".$dataMkul[$i]['id']."' class='mkkurid-".$dataMkul[$i]['mk_kur_id']."' onclick='exclusiveCheck('mkkurid-".$dataMkul[$i]['mk_kur_id']."', this)'>";
						if(substr(strtoupper($dataMkul[$i]['nama_kelas']),-1)=='H'){
							$dataMkul[$i]['WJK'] = "<select name='jenisKul[]' class='jenisKul-".$dataMkul[$i]['mk_kur_id']."'>
								<option value='".$dataMkul[$i]['kelas_id']."|".$dataMkul[$i]['id']."|".$dataMkul[$i]['wp']."|".$dataMkul[$i]['jumlah_sks']."|".$dataMkul[$i]['kode_mata_kuliah']."-hybrid'>Hybrid</option>
								<option value='".$dataMkul[$i]['kelas_id']."|".$dataMkul[$i]['id']."|".$dataMkul[$i]['wp']."|".$dataMkul[$i]['jumlah_sks']."|".$dataMkul[$i]['kode_mata_kuliah']."-online'>Online</option>
							</select>";
						}else{
							$dataMkul[$i]['WJK'] = "<select name='jenisKul[]' class='jenisKul-".$dataMkul[$i]['mk_kur_id']."'>
								<option value='".$dataMkul[$i]['kelas_id']."|".$dataMkul[$i]['id']."|".$dataMkul[$i]['wp']."|".$dataMkul[$i]['jumlah_sks']."|".$dataMkul[$i]['kode_mata_kuliah']."-x'>x</option>
							</select>";
						}
						$this->mTemplate->addVars('matakuliah_item',$dataMkul[$i],"TAWAR_");
					}
					// end
				  if(!empty($dataMkul[$i]['NILAI'])){
					$dataMkul[$i]['keterangan'] = "Sudah diambil <br/> Nilai: ".$dataMkul[$i]['NILAI'];
				  }else{
					$dataMkul[$i]['keterangan'] = "";
				  }
               if ($is_odd == "ODD" ) {
                   $is_odd = "EVEN";
               } else {
                   $is_odd="ODD";
               }

               $this->addVar('matakuliah_item','ODDEVEN',$is_odd);
                //if($this->mrUserSession->GetProperty("UserProdiId")=='6220104' OR $this->mrUserSession->GetProperty("UserProdiId")=='6120104'){
			//$dataMkul[$i]['nama_mata_kuliah']=$dataMkul[$i]['nama_mata_kuliah_ing']; 
		//}
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
         $this->AddVar('content','form_aksi', $this->mrConfig->GetURL('academic_plan','academic_plan','process') . 
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