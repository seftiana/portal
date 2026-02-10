<?php
/*
Author : cecep
Email : n1colius.lau@gmail.com
Date : 7/12/2018 4:44:21 PM
*/
require_once $cfg->GetValue("app_proc") . "display_base.class.php" ;
require_once $cfg->GetValue("app_proc") . "display_base_print.class.php" ;
require_once $cfg->GetValue("app_data") . "database_connected.class.php" ;
require_once $cfg->GetValue("app_service") . "client/base_client.service.class.php";

require_once $cfg->GetValue("app_service") . "client/sia/sia_setting_client.service.class.php";
require_once $cfg->GetValue("app_module") . "academic_plan/communication/academic_plan_client.service.class.php" ;
require_once $cfg->GetValue("app_module") . "academic_plan/display/display_print_academic_plan_remedial.class.php" ;

$ThisPageAccessRight = "MAHASISWA | DOSEN";
$security = new Security($cfg);

if (false !== $security->CheckAccessRight($ThisPageAccessRight)){
   $ThisPageLinks = $security->mUserIdentity->GetProperty("Role");
   $lnk = new Links($cfg, $ThisPageLinks);

   //get parameter
   $mhsNiu = NULL;
   if (isset($_GET["niu"])){
      $mhsNiu = $cfg->Dec($_GET["niu"]);
      $userRole = "1";
   } else {
      $mhsNiu = $security->mUserIdentity->GetProperty("UserReferenceId");
   }

   $prodiId = NULL;
   if (isset($_GET["prodi"])){
      $prodiId = $cfg->Dec($_GET["prodi"]);
   }else {
      $prodiId = $security->mUserIdentity->GetProperty("UserProdiId");
   }

   $ThisPage = new DisplayPrintAcademicPlanRemedial($cfg, $security,$userRole, $mhsNiu, $prodiId);
   $ThisPage->SetLinks($lnk);
   $ThisPage->Display();
}else{
   $security->DenyPageAccess();
}
?>