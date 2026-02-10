<?php
/*
Author : Nikolius
Email : n1colius.lau@gmail.com
Date : 10/24/2012 9:00:08 AM
*/
// Load application class
require_once $cfg->GetValue("app_proc") . "display_base.class.php";
require_once $cfg->GetValue("app_proc") . "display_base_print.class.php";
require_once $cfg->GetValue("app_service") . "client/base_client.service.class.php";
require_once $cfg->GetValue("app_service") . "client/sia/sia_setting_client.service.class.php";
require_once $cfg->GetValue("app_data") . "database_connected.class.php" ;

// Load module class
require_once $cfg->GetValue("app_module") . "reference/business/reference.class.php" ;
require_once $cfg->GetValue("app_module") . "user/communication/user_client.service.class.php" ;
require_once $cfg->GetValue("app_module") . "academic_report/communication/academic_report_client.service.class.php" ;
require_once $cfg->GetValue("app_module") . "academic_report/display/display_print_transkrip_mhs.class.php" ;  

$ThisPageAccessRight = "MAHASISWA | DOSEN";
$security = new Security($cfg);
   
if (false !== $security->CheckAccessRight($ThisPageAccessRight)){
   $ThisPageLinks = $security->mUserIdentity->GetProperty("Role");
   $lnk = new Links($cfg, $ThisPageLinks);
   
   $mhsNiu = NULL;
   if (isset($_GET["niu"])){
      $mhsNiu = $cfg->Dec($_GET["niu"]);
   } 
   
   $prodiId = NULL;
   if (isset($_GET["prodi"])){
      $prodiId = $cfg->Dec($_GET["prodi"]);
   }

   $opsi = $cfg->Dec($_GET["opsi"]);
   
   $ThisPage = new DisplayPrintTranskripMhs($cfg, $security, $mhsNiu, $prodiId,$opsi);
   $ThisPage->SetLinks($lnk);
   $ThisPage->Display();
}else{
   $security->DenyPageAccess();
}
?>