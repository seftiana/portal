<?php

   // Load application class
   require_once $cfg->GetValue("app_proc") . "display_base.class.php" ;
   require_once $cfg->GetValue("app_proc") . "display_base_print.class.php" ;
   require_once $cfg->GetValue("app_service") . "client/base_client.service.class.php";
   
   require_once $cfg->GetValue("app_service") . "client/sia/sia_setting_client.service.class.php";
   // Load module class
   require_once $cfg->GetValue("app_module") . "kbk_user/communication/user_client.service.class.php" ;
   require_once $cfg->GetValue("app_module") . "kbk_academic_report/communication/academic_report_client.service.class.php" ;
   require_once $cfg->GetValue("app_module") . "kbk_academic_report/display/display_print_grade_history.class.php" ;  
   
   $ThisPageAccessRight = "MAHASISWA_KBK | DOSEN_KBK";
   $security = new Security($cfg);
   
   if (false !== $security->CheckAccessRight($ThisPageAccessRight)){
      $ThisPageLinks = $security->mUserIdentity->GetProperty("Role");
      $lnk = new Links($cfg, $ThisPageLinks);
      
      $mhsNiu = "";
      if (isset($_GET["niu"])){
         $mhsNiu = $cfg->Dec($_GET["niu"]);
      } 
      
      $mhsProdi = "";
      if (isset($_GET["prodi"])){
         $mhsProdi = $cfg->Dec($_GET["prodi"]);
      }
      
      $ThisPage = new DisplayPrintGradeHistory($cfg, $security, $mhsNiu, $mhsProdi);
      $ThisPage->SetLinks($lnk);
      $ThisPage->Display();
   }else{
      $security->DenyPageAccess();
   }
?>