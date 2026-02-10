<?php
/*
Author : Nikolius
Email : n1colius.lau@gmail.com
Date : 6/16/2014 9:58:00 PM
*/
require_once $cfg->GetValue("app_proc") . "display_base.class.php" ;
require_once $cfg->GetValue("app_proc") . "display_base_print.class.php" ;
require_once $cfg->GetValue("app_data") . "database_connected.class.php" ;
require_once $cfg->GetValue("app_service") . "client/base_client.service.class.php";

require_once $cfg->GetValue("app_service") . "client/sia/sia_setting_client.service.class.php";
require_once $cfg->GetValue("app_module") . "academic_plan/communication/academic_plan_client.service.class.php" ;
require_once $cfg->GetValue("app_module") . "academic_plan/display/display_print_kartu_ujian.class.php" ;

$ThisPageAccessRight = "MAHASISWA";
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

   //opsi sesi
   $opsiSesi = $cfg->Dec($_GET["opsiSesi"]);

   $ThisPage = new DisplayPrintKartuUjian($cfg, $security,$userRole, $mhsNiu, $prodiId, $opsiSesi);
   $ThisPage->SetLinks($lnk);
   $ThisPage->Display();
}else{
   $security->DenyPageAccess();
}
?>