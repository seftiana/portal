<?php
/*
Author : Nikolius
Email : n1colius.lau@gmail.com
Web : www.lius-webdev.com
Blog : blog.lius-webdev.com
Date : 10/30/2012 11:06:53 AM
*/
// Load application class
require_once $cfg->GetValue("app_proc") . "display_base.class.php" ;
require_once $cfg->GetValue("app_proc") . "display_base_print.class.php" ;
require_once $cfg->GetValue("app_service") . "client/base_client.service.class.php";
require_once $cfg->GetValue("app_service") . "client/sia/sia_setting_client.service.class.php";
require_once $cfg->GetValue("app_data") . "database_connected.class.php" ;

// Load module class
require_once $cfg->GetValue("app_module") . "user/communication/user_client.service.class.php" ;
require_once $cfg->GetValue("app_module") . "reference/business/reference.class.php" ;
require_once $cfg->GetValue("app_module") . "academic_report/communication/academic_report_client.service.class.php" ;
require_once $cfg->GetValue("app_module") . "academic_report/display/display_print_khs_mhs_mm.class.php" ;  

$ThisPageAccessRight = "MAHASISWA | DOSEN";
$security = new Security($cfg);

if (false !== $security->CheckAccessRight($ThisPageAccessRight)){
   $ThisPageLinks = $security->mUserIdentity->GetProperty("Role");
   $lnk = new Links($cfg, $ThisPageLinks);
   
   $mhsNiu = "";
   if (isset($_GET["niu"])){
      $mhsNiu = $cfg->Dec($_GET["niu"]);
   } 
   
   $prodiId = "";
   if (isset($_GET["prodi"])){
      $prodiId = $cfg->Dec($_GET["prodi"]);
   }
   
   $sempId = "";
   if (isset($_GET["sem"])){
      $sempId = $cfg->Dec($_GET["sem"]);
   }
   
   $ThisPage = new DisplayPrintKhsMhsMm($cfg, $security, $mhsNiu, $prodiId, $sempId);
   $ThisPage->SetLinks($lnk);
   $ThisPage->Display();
}else{
   $security->DenyPageAccess();
}
?>