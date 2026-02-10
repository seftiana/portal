<?php

   // Load application class
   require_once $cfg->GetValue("app_proc") . "display_base.class.php" ;
   require_once $cfg->GetValue("app_proc") . "display_base_full.class.php" ;
   require_once $cfg->GetValue("app_service") . "client/base_client.service.class.php";
   
   require_once $cfg->GetValue("app_service") . "client/sia/sia_setting_client.service.class.php";
   // Load module class
   require_once $cfg->GetValue("app_module") . "user/communication/user_client.service.class.php" ;
   require_once $cfg->GetValue("app_module") . "kbk_academic_plan/display/display_view_add_result_academic_plan.class.php" ;  
   
   $ThisPageAccessRight = "MAHASISWA_KBK | DOSEN_KBK";
   $security = new Security($cfg);
   
   if (false !== $security->CheckAccessRight($ThisPageAccessRight)){
      $ThisPageLinks = $security->mUserIdentity->GetProperty("Role");
      $lnk = new Links($cfg, $ThisPageLinks);
      //echo "<pre>";print_r($_SESSION);echo "</pre>";
      $additionalUrl = "";
      if ($cfg->Dec($_GET["view"]) == "dosen"){
         $additionalUrl = "&sia=".$_GET["sia"] . "&view=" .$_GET["view"] . "&prodi=" . $_GET["prodi"] . "&niu=" .$_GET["niu"];
      } 
      $addResult = array();
      if (isset($_SESSION["addresult"])){
         $addResult = $_SESSION["addresult"];
         session_unregister ("add_result");
      } 
      
      $ThisPage = new DisplayViewAddResultAcademicPlan($cfg, $security, $addResult, $additionalUrl);
      $ThisPage->SetLinks($lnk);
      $ThisPage->Display();
   }else{
      $security->DenyPageAccess();
   }
?>