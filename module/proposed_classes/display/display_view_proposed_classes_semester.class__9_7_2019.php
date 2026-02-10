<?php
/**
* DisplayViewProposedClassesSemester
* DisplayViewProposedClassesSemester class
* 
* @package proposed_classes 
* @author Maya Alipin
* @copyright Copyright (c) 2006 GamaTechno
* @version 1.0 
* @date 2006-03-23
* @revision 
*
*/
   
class DisplayViewProposedClassesSemester extends DisplayBaseFull {
   /**
     * var mUserId integer user id
     */
   var $mUserId;
   
   /**
     * var mUserProdiId integer program studi id
     */
   var $mUserProdiId;
   
   /**
     * var mErrorMessage string Error Messages
     */
   var $mErrorMessage;
   
   /**
     * var mObjProposedClasses objcet ProposedClassesClientService
     */
   var $mObjProposedClasses;
   
   /**
     * var mServiceServer string service server address
     */
   var $mServiceServer;
   
   /**
     * var mDisplay boolean is the data must displayed or not
     */
   var $mDisplay;
   
   
   function DisplayViewProposedClassesSemester(&$configObject, &$security, $errMsg, $serverAddress,$vProdi) {
      DisplayBaseFull::DisplayBaseFull($configObject, $security);
      if (empty($vProdi)) {
	  $this->mProdiId = $security->mUserIdentity->GetProperty("UserProdiId");
	  } else {
      $this->mProdiId = $vProdi;
      }
	  $this->mUserId = $security->mUserIdentity->GetProperty("UserReferenceId");
      $this->mErrorMessage = $errMsg;
      $this->mDisplay = true;
      
       if ($serverAddress != ""){
         $this->mServiceServer = $serverAddress;
      } else {
         if ($this->mrUserSession->GetProperty("Role")==2 ) {
            $this->mDisplay = true;
         }
         $this->mServiceServer = $this->mrUserSession->GetProperty("ServerServiceAddress");
      }

      $this->SetErrorAndEmptyBox();  
      $this->SetTemplateBasedir($configObject->GetValue('app_module') . 'proposed_classes/templates/');
      $this->SetTemplateFile('view_proposed_classes_semester.html');
   }
   
   function ShowUnitOption () {
      $referenceObj = new Reference($this->mrConfig) ;
      $unit = $referenceObj->GetAllUnitData('101');
      if ($unit !== false) {
         if (!empty($unit)) {
            $this->SetAttribute('unit', 'visibility','visible');
            $this->AddVar('unit', 'URL_VIEW', $this->mrConfig->GetURL('proposed_classes','proposed_classes_semester','view'));
            foreach($unit as $key=>$value) {
               $unit[$key]["addr"] = $this->mrConfig->Enc($value["service_address"]);
               if ($value["service_address"] == $this->mServiceServer){
                  $unit[$key]["selected"] = "selected";
               }else {
                  $unit[$key]["selected"] = "";
               }
            }
            $this->ParseData("unit_list", $unit, "SIA_");
         }
         
      } else {
         $this->mErrorMessage .= "Pengambilan data unit tidak berhasil\n".$this->mObjProposedClasses->GetProperty("ErrorMessages");
         $this->ShowErrorBox();
      }
   }
   
   /**
   * DisplayViewProposedClassesSemester::GetAllDataMatakuliahForSemester
   * Method ini digunakan untuk mengambil data mata kuliah yang ditawarkan pada semester aktif
   *
   * @param
   * @return array Data matakuliah
   */
   function GetAllDataMatakuliahForSemester($mhsNiu)
   {
      $krsItem = $this->mObjProposedClasses->GetAllProposedClassesSemesterForSemester($mhsNiu);
      if (false === $krsItem) {      	 
         return false;
      }
      else {      	 
         return $krsItem;
      }
   }
   
   /**
   	*	Tambahan untuk list program studi
   **/
   function GetAllProdiForAdministrasi()
   {
      $listProdi = $this->mObjProposedClasses->GetAllProdiForAdministrasi($this->mrUserSession->GetProperty("UserUnitId"));
      if (false === $listProdi) {
         return false;
      }
      else {
         return $listProdi;
      }
   }
   /* ------------------------------------------------------------ */
   
   function DoInitializeService() {
      $this->mObjProposedClasses =  New ProposedClassesClientService($this->mServiceServer,false, $this->mUserId, $this->mProdiId);      
      if ($this->mObjProposedClasses->IsError()) {
         $this->mErrorMessage .= $this->mUserService->GetProperty("ErrorMessages");
         return false;
      }else{
         $this->mObjProposedClasses->SetProperty("UserRole", $this->mrUserSession->GetProperty("Role"));
         $arrService = $this->mrUserSession->GetProperty("ServerServiceAvailable");
			$result = $this->mObjProposedClasses->DoSiaSetting();
			$this->DoUpdateServiceStatus($this->mObjProposedClasses, $result, 'SIA');
         if (false === $result) {
            $this->mErrorMessage .= $this->mObjProposedClasses->GetProperty("ErrorMessages");
         }
			return $result;
      }      
   }
   
   
   function Display() {
   	  $mhsNiu = $this->mUserId;   		   	
      // cek apakah service sia is available
      $init = $this->DoInitializeService();
      DisplayBaseFull::Display("[ Logout ]");
      $urlAdditional = "";
      if ($this->mrUserSession->GetProperty("Role")==2) {
         $this->AddVar('teksketerangan', 'KET_USER', 'DOSEN');
         $this->ShowUnitOption();
         $urlAdditional = "&sia=".$this->mrConfig->Enc ($this->mServiceServer);   
      } else {
         $this->AddVar('teksketerangan', 'KET_USER', 'MAHASISWA');
         $this->setAttribute('mprodi','visibility','visible');
      }
      
      if (false === $init){
         $this->ShowErrorBox();
      } else {
         if ($this->mDisplay !== false){
            $this->SetAttribute("keterangan", "visibility", "visible");
            $this->AddVar("keterangan", "PRODI", $this->mrUserSession->GetProperty("UserProdiName"));
            $strSemester = $this->mObjProposedClasses->GetProperty("NamaSemester")." ".
                           $this->mObjProposedClasses->GetProperty("TahunSemester") . "/".
                           ($this->mObjProposedClasses->GetProperty("TahunSemester") + 1);
            $this->AddVar("keterangan", "SEMESTER",$strSemester);
            
            //echo $mhsNiu; exit;
            $dataMkul = $this->GetAllDataMatakuliahForSemester($mhsNiu);
            $prodiData = $this->GetAllProdiForAdministrasi();
            
            //echo "<pre>";print_r($dataMkul);echo "</pre>";
            // tampilkan data prodi
            
            if (false !== $dataMkul) {
               $semester_sebelum = $dataMkul[0]['semester'];
               $is_odd = "ODD";
               
               for($i=0;$i<count($dataMkul);$i++) {               
                  // masukkan data matakuliah
                  $dataMkul[$i]['NUMBER'] = $i+1;  
                  $dataMkul[$i]["url_kelasdetil"] = $this->mrConfig->GetURL('proposed_classes','proposed_classes_detail','view')."&kelas=" . $this->mrConfig->Enc($dataMkul[$i]["kelas_id"]) . $urlAdditional;
                  $this->addVar('matakuliah','MK_AVAILABLE','YES');                
                  
                  if ($is_odd == "ODD" ) {
                     $is_odd = "EVEN";
                  } else {
                     $is_odd="ODD";
                  }

                  $this->addVar('matakuliah_item','ODDEVEN',$is_odd);
                  $this->mTemplate->addVars('matakuliah_item',$dataMkul[$i],"TAWAR_");
                  $this->mTemplate->parseTemplate('matakuliah_item','a');
                  
                  // cek semesternya
                  // insert data untuk semester yang mungkin 
                  if (($semester_sebelum != $dataMkul[$i+1]['semester']) && ($dataMkul[$i+1]['semester'] <> '') ) {
                      $this->addVar('paket_semester','NUM',$semester_sebelum);
                      $this->mTemplate->parseTemplate('matakuliah','a');
                      $this->mTemplate->parseTemplate('paket_semester','a');
                      $semester_sebelum = $dataMkul[$i+1]['semester'];
                      $this->mTemplate->clearTemplate('matakuliah_item');
                      $this->mTemplate->clearTemplate('matakuliah',true);
                  }
               }
               
               $this->mTemplate->parseTemplate('matakuliah','a');           
               $this->addVar('paket_semester','NUM',$semester_sebelum);               
               $this->mTemplate->parseTemplate('paket_semester','a');   
            }
          	
      
          	
            if (empty($this->mProdiId)) {
				  $this->mProdiId = $prodiData[0]['PRODI_KODE'];
			   }
			
			   //$this->mUserProdiId = $vProdi;
			
			   for ($l=0;$l<count($prodiData);$l++) {
				  if ($this->mProdiId == $prodiData[$l]['PRODI_KODE']) {
					 $prodiData[$l]['IS_SELECTED']="selected";
				  } else {
					 $prodiData[$l]['IS_SELECTED']="";
				  }
			   }
            
            if ( !false == $prodiData ) {
             		if ($this->mrUserSession->GetProperty("Role")==2) {
						$this->parseData('fmprodi',$prodiData,"",1);	
					} else {
						$this->parseData('fprodi',$prodiData,"",1);
					}
			}
			
            if($this->mrUserSession->GetProperty("Role") == "1"){
               //mahasiswa
               $linkCetakMkDitawarkan = $this->mrConfig->GetURL('proposed_classes','mk_ditawarkan_mhs','print');
            }elseif($this->mrUserSession->GetProperty("Role") == "2"){
               //dosen
               $linkCetakMkDitawarkan = $this->mrConfig->GetURL('proposed_classes','mk_ditawarkan','print');
            }
            $this->addVar('keterangan','LINK_CETAK',$linkCetakMkDitawarkan);
			
			   /*
            if (false !== $dataMkul) {
               //tampilkan data matakuliah ditawarkan
               if (!empty ($dataMkul)) {
                  foreach($dataMkul as $key=>$value){
                     $dataMkul[$key]["url_kelasdetil"] = $this->mrConfig->GetURL('proposed_classes','proposed_classes_detail','view') . 
                                                                              "&kelas=" . $this->mrConfig->Enc($value["kelas_id"]) . $urlAdditional;
                  }
                  $this->ParseData('matakuliah_item', $dataMkul, "TAWAR_", 1);
               }
               $this->AddVar("matakuliah", "MK_AVAILABLE", "YES");   
               
            }
            else {
               $this->mErrorMessage = $this->mObjProposedClasses->GetProperty("FaultMessages");
               $this->AddVar("empty_box", "WARNING_MESSAGE",  
                  $this->ComposeErrorMessage("Data tidak ditemukan. " , $this->mErrorMessage));   
               $this->AddVar('empty_type', 'TYPE', "INFO");
               $this->AddVar("matakuliah", "MK_AVAILABLE", "NO");   
            }
            */
         }
      }
      $this->DisplayTemplate();
   }
   
   function ShowErrorBox() {
      $this->AddVar("error_box", "ERROR_MESSAGE",  
            $this->ComposeErrorMessage("Pengambilan data matakuliah ditawarkan tidak berhasil. ",$this->mErrorMessage));   
      $this->SetAttribute('error_box', 'visibility', 'visible');
   }
}
?>