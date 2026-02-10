<?php

   // Load Application Display Class	   
   require_once $cfg->GetValue('app_proc') . 'process_base.class.php';   
   
   require_once $cfg->GetValue("app_service") . "client/base_client.service.class.php";
   require_once $cfg->GetValue("app_service") . "client/sia/sia_setting_client.service.class.php";
   // Load Module display Class
   require_once $cfg->GetValue("app_module") . "kbk_user/communication/user_client.service.class.php" ;
   require_once $cfg->GetValue('app_module') . 'kbk_academic_plan/display/process_academic_plan.class.php';
   require_once $cfg->GetValue("app_module") . "kbk_academic_plan/communication/academic_plan_client.service.class.php";
   

   $ThisPageAccessRight = "MAHASISWA_KBK | DOSEN_KBK";

   $security = new Security($cfg);

   if (false !== $security->CheckAccessRight($ThisPageAccessRight)) {
      $mhsNiu = NULL;
      if (isset($_GET["niu"])){
         $mhsNiu = $cfg->Dec($_GET["niu"]);
      } else {
         $mhsNiu = $security->mUserIdentity->GetProperty("UserReferenceId");
      }
      
      $prodiId = NULL;
      if (isset($_GET["prodi"])){
         $prodiId = $cfg->Dec($_GET["prodi"]);
      }else {
         $prodiId = $security->mUserIdentity->GetProperty("UserProdiId");
      }
      
      $sia = "";
      if (isset($_GET["sia"])){
         $sia = $cfg->Dec($_GET["sia"]);
      }
      $app = new ProcessAcademicPlan($cfg, $security, $mhsNiu, $prodiId, $sia);
      $additionalUrl = "";
      if ($app->mrConfig->Dec($_GET['view']) == "dosen") {
         $additionalUrl = "&sia=".$_GET['sia'] . "&view=" .$_GET['view']. "&prodi=" . $_GET['prodi'] . "&niu=" .$_GET['niu'];
      } 
      
      
      if ($_POST['act'] == 'krs') {
         if (isset($_POST['btnApproval'])) {
            $approval = $_POST['app'];
            $result = $app->SetKrsApprove($approval);
            if ($approval == "") {
               $errMsg  = "approval|";
            } else {
               $errMsg  = "approvalcancelled|";
            }
            if ($result == false) {
               $errMsg .= $app->GetProperty("ProcessAcademicPlanError");
            } 
            $errMsg = $cfg->Enc($errMsg);
            header("Location: " . $cfg->GetURL('kbk_academic_plan','academic_plan','view'). '&err='. $errMsg . 
                  $additionalUrl);
         } else if (isset($_POST['btnCancelApproval'])) {
            $approval = $_POST['app'];
            $result = $app->SetKrsApprove($approval);
            // ini digunakan untuk membatalkan perubahan krs di masa revisi (mengembalikan item krs seperti pada masa krs),
            // tetapi sepertinya tidak bisa diterapkan karena pembatalan tidak bisa dilakukan setelah approval yang kedua
            //$result = $app->CancelKrsRevision($approval);
            header("Location: " . $cfg->GetURL('kbk_academic_plan','academic_plan','view'));
         } else if (isset($_POST['btnBack'])){ 
            header("Location: " . $cfg->GetURL('kbk_dosen','mentored_students','view'). $additionalUrl);
         } else {
            if ($_POST['btnProses'] == 'Tambah Matakuliah') {
               // proses tambah krs => hanya redirect ke halaman view matakuliah ditawarkan
               header("Location: " . $cfg->GetURL('kbk_proposed_classes','proposed_classes_krs','view'). 
                   $additionalUrl . '&id='. $_POST['id']);
               exit;
            } else if ($_POST['act'] == 'back') {
               if ($_POST["viewby"] == "dosen"){
                  header("Location: " . $cfg->GetURL('kbk_dosen','mentored_students','view'). $additionalUrl);
                  exit;
               }
            } else if ($_POST['btnProses'] == 'Hapus Matakuliah') {
               // proses hapus krs
               if (!empty($_POST['kodeMkul'])) {
                  $result = $app->DeleteKrsItem($_POST['kodeMkul']);
               }
               $errMsg = $cfg->Enc($app->GetProperty("ProcessAcademicPlanError"));
               header("Location: " . $cfg->GetURL('kbk_academic_plan','academic_plan','view'). '&err='. $errMsg . 
                  $additionalUrl);
               exit;
            } 
         }
      } else if ($_POST['act'] == 'addKrs') {
         if (isset($_POST["btnAdd"])) {
            if (isset($_POST["kodeMkul"])){
               $mkKul = $_POST["kodeMkul"];
               $mkKul = $_POST["kodeMkul"];
               $krsItem = array();
               foreach ($mkKul as $key=>$value) {
                  $value = $app->mrConfig->Dec($value);
                  $krsItem[$key] = explode("|", $value);
               }
               
               $result = $app->AddKrsItem($krsItem);
               //$result  = false;
               if ($result !== false) {
                  $_SESSION["addresult"] = $result;
                  header("Location: " . $cfg->GetURL('kbk_academic_plan','academic_plan','view_add_result') . $additionalUrl);
                  exit;
               } else {
                  $errMsg = $cfg->Enc($app->GetProperty("ProcessAcademicPlanError"));
                  header("Location: " . $cfg->GetURL('kbk_academic_plan','academic_plan','view'). '&err='. $errMsg . $additionalUrl);
                  exit;
               }
            } else {
               $result['error']['tidakadamk'] = "Tidak ada matakuliah untuk ditambahkan ke KRS";
               $_SESSION["addresult"] = $result;
               header("Location: " . $cfg->GetURL('kbk_academic_plan','academic_plan','view_add_result'). $additionalUrl);
               exit;
            }
         } else {
            header("Location: " . $cfg->GetURL('kbk_academic_plan','academic_plan','view'). $additionalUrl);
            exit;
         }
      } 
   }
   else {
      $security->DenyPageAccess();
   }
?>