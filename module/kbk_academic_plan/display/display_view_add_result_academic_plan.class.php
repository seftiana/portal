<?php
/**
 * DisplayViewKHS
 * DisplayViewKHS class
 * 
 * @package communication 
 * @author Maya Alipin 
 * @copyright Copyright (c) 2006 GamaTechno
 * @version 1.0 
 * @date 2006-03-20
 * @revision 
 *
 */

class DisplayViewAddResultAcademicPlan extends DisplayBaseFull {
   var $mResult;
   var $mShowError;
   var $mAdditionalUrl;
   
   function DisplayViewAddResultAcademicPlan(&$configObject, &$security, $addResult, $additionalUrl) {
      DisplayBaseFull::DisplayBaseFull($configObject, $security);
      $this->mResult = $addResult;
      $this->SetErrorAndEmptyBox();  
      $this->SetTemplateBasedir($configObject->GetValue('app_module') . 'academic_plan/templates/');
      $this->SetTemplateFile('view_add_result_academic_plan.html');
      $this->mAdditionalUrl = $additionalUrl;
   }
   
   function Display() {
      DisplayBaseFull::Display("[ Logout ]");
      $this->AddVar("content", "URL_VIEW", $this->mrConfig->GetURL('kbk_academic_plan', 'academic_plan', 'view') . $this->mAdditionalUrl);
      if (isset($this->mResult["error"])) {
         $arrError = $this->mResult["error"];
         $dataError = array();
         if (isset($arrError["tidakadamk"])){
            $this->AddVar("mkgagal_tidakada_matkul", "MKGAGAL_TIDAKADA_MATKUL", $arrError["tidakadamk"]);
            $this->SetAttribute('mkgagal_tidakada_matkul', 'visibility', 'visible');
         } else if (isset($arrError["matakul_wajib"])){
            $this->AddVar("matakul_wajib", "MATAKUL_WAJIB_MSG", $arrError["matakul_wajib"]);
            $this->SetAttribute('matakul_wajib', 'visibility', 'visible');
         } else if (isset($arrError["jatah_sks"])){
            $this->AddVar("mkgagal_lebih", "MKGAGAL_LEBIH_MSG", $arrError["jatah_sks"][0]);
            $this->SetAttribute('mkgagal_lebih', 'visibility', 'visible');
         } else {
            if (isset($arrError["prasyarat_matkul"])){
               if (!empty($arrError["prasyarat_matkul"])) {
                  foreach ($arrError["prasyarat_matkul"] as $error) {
                     $dataError[]["msg"] = $error;
                  }
               }
            }
            if (isset($arrError["kuliah_bentrok"])){
               if (!empty($arrError["kuliah_bentrok"])) {
                  foreach ($arrError["kuliah_bentrok"] as $error) {
                     $dataError[]["msg"] = $error;
                  }
               }
            }
            if (isset($arrError["ujian_bentrok"])){
               if (!empty($arrError["ujian_bentrok"])) {
                  foreach ($arrError["ujian_bentrok"] as $error) {
                     $dataError[]["msg"] = $error;
                  }
               }
            }
            if (isset($arrError["kelas_penuh"])){
               if (!empty($arrError["kelas_penuh"])) {
                  foreach ($arrError["kelas_penuh"] as $error) {
                     $dataError[]["msg"] = $error;
                  }
               }
            }
            if (isset($arrError["sks_ip"])){
               if (!empty($arrError["sks_ip"])) {
                  foreach ($arrError["sks_ip"] as $error) {
                     $dataError[]["msg"] = $error;
                  }
               }
            }
            if (!empty ($dataError) ) {
               $this->ParseData("mkgagal_item", $dataError, "MKGAGAL_");
               $this->SetAttribute('mkgagal', 'visibility', 'visible');
            }
         }
         
      }
      
      if (isset($this->mResult["success"])) {
         $this->SetAttribute('mkberhasil', 'visibility', 'visible');
         if (isset ($this->mResult["success"][0]["nama_mk"])){
            $this->ParseData("mkberhasil_item", $this->mResult["success"], "MKBERHASIL_");
         } else if (isset ($this->mResult["success"][0][0])){
            $dataSuccess = array();
            foreach ($this->mResult["success"] as $key=>$success) {
               $dataSuccess[$key]["kode_mk"] = $success;
            }
            $this->ParseData("mkberhasil_item", $dataSuccess, "MKBERHASIL_");
         }
      }
      
      $this->mShowError = $this->mrConfig->GetValue('enable_developer_warning');;
      if ($this->mShowError === true &&  isset($this->mResult["errorsystem"])) {
         if ($this->mResult["errorsystem"] != ""){
            $this->AddVar("error_box", "ERROR_MESSAGE", $this->mResult["errorsystem"]);   
            $this->SetAttribute('error_box', 'visibility', 'visible');
         }
      }
      $this->DisplayTemplate();
   }

}
?>
