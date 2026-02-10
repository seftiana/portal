<?php
/**
* DisplayViewProposedClassesDetail
* DisplayViewProposedClassesDetail class
* 
* @package proposed_classes 
* @author Maya Alipin
* @copyright Copyright (c) 2006 GamaTechno
* @version 1.0 
* @date 2006-03-23
* @revision 
*
*/
   
class DisplayViewProposedClassesDetail extends DisplayBaseFull {
   var $mClassId;
   var $mErrorMessage;
   var $mObjProposedClasses;
   var $mServiceServer;
   var $mModule;
   var $mParamAdditonal;
   var $mValueAdditional;
   
   function DisplayViewProposedClassesDetail(&$configObject, &$security, $kelasId, $errMsg, $serviceServer="", $module="", $param="", $value="") {
      DisplayBaseFull::DisplayBaseFull($configObject, $security);
      $this->mClassId = $kelasId;
      $this->mErrorMessage = $errMsg;
      if ($serviceServer != ""){
         $this->mServiceServer = $serviceServer;
      } else {
         $this->mServiceServer = $this->mrUserSession->GetProperty("ServerServiceAddress");
      }
      
      if ($module != ""){
         $this->mModule = $module;
      } else {
         $this->mModule = $this->mrConfig->Enc('proposed_classes|proposed_classes_semester|view');
      }
      
      if ($param != ""){
         $this->mParamAdditonal = $param;
      } else {
         $this->mParamAdditonal = $this->mrConfig->Enc('sia');
      }
      
      if ($value != ""){
         $this->mValueAdditional = $value;
      } else {
         $this->mValueAdditional = $this->mrConfig->Enc($this->mServiceServer);
      }
      
      $this->SetErrorAndEmptyBox();  
      $this->SetTemplateBasedir($configObject->GetValue('app_module') . 'proposed_classes/templates');
      $this->SetTemplateFile('view_proposed_classes_detail.html');
   }
   
   function DoInitializeService() {
      
      $this->mObjProposedClasses =  New ProposedClassesClientService($this->mServiceServer, false, 
                                                         $this->mrUserSession->GetProperty("UserReferenceId"), $this->mrUserSession->GetProperty("UserProdiId"));
      if ($this->mObjProposedClasses->IsError()) {
         $this->mErrorMessage .= $this->mObjProposedClasses->GetProperty("ErrorMessages");
         return false;
      }else{
         $this->mObjProposedClasses->SetProperty("UserRole", $this->mrUserSession->GetProperty("Role"));
			$result = $this->mObjProposedClasses->DoSiaSetting();
			$this->DoUpdateServiceStatus($this->mObjProposedClasses, $result, 'SIA');
         if (false === $result) {
            $this->mErrorMessage .= $this->mObjProposedClasses->GetProperty("ErrorMessages");
         }
			return $result;
      }
   }
       
   function Display() {
      // cek apakah service sia is available
      $init = $this->DoInitializeService();
      //echo $this->mClassId;
      DisplayBaseFull::Display("[ Logout ]");
      if (false === $init){
         $this->ShowErrorBox();
      } else {
         $this->mObjProposedClasses->SetProperty("ClassId", $this->mClassId);
         $dataDetil = $this->mObjProposedClasses->GetAllInfoDetailForClass();
         if ($dataDetil === false) {
            $this->mErrorMessage .= $this->mObjProposedClasses->GetProperty("ErrorMessages");
            $this->ShowErrorBox();
         } else {
            $this->SetAttribute('data_kelas_detil', 'visibility', 'visible');
            //echo "<pre>";print_r($dataDetil);echo "</pre>";
            $namaKelas = "";
            if (isset ($dataDetil["detil"][0]["nama"])){
               $namaKelas = $dataDetil["detil"][0]["nama"];
            }
            $this->AddVar("keterangan", "KET_KELAS",$namaKelas);
            
            if (isset($dataDetil["jadwalKuliah"]) && !empty($dataDetil["jadwalKuliah"])){
                  $this->SetAttribute('jadwal_kuliah', 'visibility', 'visible');
                  $jadwalKuliah = array();
                  foreach($dataDetil["jadwalKuliah"] as $key=>$value) {
                     $jadwalKuliah[$key]["hari"] = $value["hari"];
                     $jamDetikMulai = explode(":",$value["sesi_mulai"]);
                     $jamDetikSelesai = explode(":",$value["sesi_selesai"]);
                     $jadwalKuliah[$key]["jam"] =  $jamDetikMulai[0] . ":" . $jamDetikMulai[1]. " - " . $jamDetikSelesai[0] . ":" . $jamDetikSelesai[1] ;
                     $jadwalKuliah[$key]["ruang"] = $value["ruang"];
                  }
                  $this->ParseData('jadwal_kuliah_item', $jadwalKuliah, "JK_");
            }
            
            
            if (isset($dataDetil["jadwalMid"]) && !empty($dataDetil["jadwalMid"])) {
               $this->SetAttribute('mid_test', 'visibility', 'visible');
                  $this->AddVar('mid_test', 'TANGGAL_MID', $this->IndonesianDate($dataDetil["jadwalMid"][0]["tanggal"]));
                  $jadwalMid = array();
                  foreach($dataDetil["jadwalMid"] as $key=>$value) {
                     $jamDetikMulai = explode(":",$value["jam_mulai"]);
                     $jamDetikSelesai = explode(":",$value["jam_selesai"]);
                     $jadwalFinal[$key]["jam"] =  $jamDetikMulai[0] . ":" . $jamDetikMulai[1]. " - " . $jamDetikSelesai[0] . ":" . $jamDetikSelesai[1] ;
                     $jadwalFinal[$key]["ruang"] = $value["ruang"];
                     $jadwalFinal[$key]["tanggal"] = $this->IndonesianDate($dataDetil["jadwalMid"][0]["tanggal"]);
                  }
                  $this->ParseData('mid_test_item', $jadwalFinal, "MID_DETIL_");
            }
            
            
            if (isset($dataDetil["jadwalFinal"]) && !empty($dataDetil["jadwalFinal"])){
                  $this->SetAttribute('final_test', 'visibility', 'visible');
                  $this->AddVar('final_test', 'TANGGAL_FINAL', $this->IndonesianDate($dataDetil["jadwalFinal"][0]["tanggal"]));
                  $jadwalFinal = array();
                  foreach($dataDetil["jadwalFinal"] as $key=>$value) {
                     $jamDetikMulai = explode(":",$value["jam_mulai"]);
                     $jamDetikSelesai = explode(":",$value["jam_selesai"]);
                     $jadwalFinal[$key]["jam"] =  $jamDetikMulai[0] . ":" . $jamDetikMulai[1]. " - " . $jamDetikSelesai[0] . ":" . $jamDetikSelesai[1] ;
                     $jadwalFinal[$key]["ruang"] = $value["ruang"];
                     $jadwalFinal[$key]["tanggal"] = $this->IndonesianDate($dataDetil["jadwalFinal"][0]["tanggal"]);
                  }
                  
                  //echo "<pre>"; print_r($jadwalFinal);echo "</pre>";
                  $this->ParseData('final_test_item', $jadwalFinal, "FINAL_DETIL_");
            }
           
            if (isset($dataDetil["detil"])  && !empty($dataDetil["detil"])) {
               $this->SetAttribute('kelas_detil', 'visibility', 'visible');
               $detilKelas = $dataDetil["detil"];
               foreach($detilKelas as $key=>$value) {
                  if ($value["sks_teori"] != 0) {
                     $detilKelas[$key]["sks_kuliah"] = "Kuliah: " . $value["sks_teori"] . " SKS";
                  }
                  
                  if ($value["sks_praktikum"] != 0) {
                     $sks_praktek = "Praktek: " . $value["sks_praktikum"] . " SKS";                       
                     $this->AddVar('sks_praktek', 'DETIL_SKS_PRAKTEK', $sks_praktek);
                  }
                   
                  $this->ClearTemplate("prasyarat_item");
                  if (isset($value["prasyarat"]) && !empty ($value["prasyarat"])) {
                     $this->SetAttribute('prasyarat', 'visibility', 'visible');
                     $dataPrasyarat = $value["prasyarat"];
                     foreach ($dataPrasyarat as $keyPrasyarat=>$valuePrasyarat) {
                        switch ($valuePrasyarat["syarat"]){
                           case "A":
                              $dataPrasyarat[$keyPrasyarat]["syarat"] = "ambil";   
                              break;
                              
                           case "S":
                              $dataPrasyarat[$keyPrasyarat]["syarat"] = "sejajar";   
                              break;
                              
                           case "L":
                              $dataPrasyarat[$keyPrasyarat]["syarat"] = "lulus";   
                              break;
                        }
                     }
                     $this->ParseData('prasyarat_item', $dataPrasyarat, "PRASYARAT_");
                  }
                  $detilKelas[$key]["prasyarat"] = "";
                  
                  if ($detilKelas[$key]["angkatan"] != "@") {
                     $detilKelas[$key]["keterangan_angkatan"] =  $detilKelas[$key]["angkatan"];
                  } else {
                     $detilKelas[$key]["keterangan_angkatan"] = "semua angkatan";
                  }
                  
                  if ($detilKelas[$key]["akhiran_niu"] != "@") {
                     if ($detilKelas[$key]["akhiran_niu"] == "1,3,5,7,9"){
                        $detilKelas[$key]["keterangan_akhiran_nif"] = "ganjil " ;
                     } else if ($detilKelas[$key]["akhiran_niu"] == "0,2,4,6,8"){
                        $detilKelas[$key]["keterangan_akhiran_nif"] = "genap" ;
                     } else {
                        $detilKelas[$key]["keterangan_akhiran_nif"] = $detilKelas[$key]["akhiran_niu"];
                     }
                  } else {
                     $detilKelas[$key]["keterangan_akhiran_nif"] = "semua akhiran";
                  }
                  
                  if ($detilKelas[$key]["niu_min"] != "@" && $detilKelas[$key]["niu_max"] != "@") {
                     $detilKelas[$key]["keterangan_rentang_nif"] = $detilKelas[$key]["niu_min"] . "-" . $detilKelas[$key]["niu_max"] ;
                  } else if ($detilKelas[$key]["niu_max"] == "@" && $detilKelas[$key]["niu_min"] != "@" ) {
                     $detilKelas[$key]["keterangan_rentang_nif"] = "<" . $detilKelas[$key]["niu_max"];
                  } else if ($detilKelas[$key]["niu_max"] == "@" && $detilKelas[$key]["niu_min"] != "@" ) {
                     $detilKelas[$key]["keterangan_rentang_nif"] = "<" . $detilKelas[$key]["niu_max"];
                  } else {
                     $detilKelas[$key]["keterangan_rentang_nif"] = "tidak ada nim minimal dan maksimal"; 
                  }
                  
                  
                  
                  
               }
               //echo "<pre>";print_r($detilKelas);echo "</pre>";
               $this->ParseData('kelas_detil', $detilKelas, "DETIL_");
               
            }
         }
      }
      $this->AddVar("content", "URL_BACK", $this->mrConfig->GetURL('proposed_classes','proposed_classes','process'));
      $this->AddVar("content", "MODULE",$this->mModule);
      $this->AddVar("content", "PARAM", $this->mParamAdditonal);
      $this->AddVar("content", "VALUE", $this->mValueAdditional);
      $this->DisplayTemplate();
   }
   
   function ShowErrorBox() {
      $this->AddVar("error_box", "ERROR_MESSAGE",  
            $this->ComposeErrorMessage("Pengambilan data matakuliah ditawarkan tidak berhasil. " , $this->mErrorMessage));   
      $this->SetAttribute('error_box', 'visibility', 'visible');
   }
}
?>
