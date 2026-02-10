<?php
/*
Author : Nikolius
Email : n1colius.lau@gmail.com
Date : 10/23/2012 10:02:28 AM
*/
// Load application class
require_once $cfg->GetValue("app_proc") . "display_base.class.php" ;
require_once $cfg->GetValue("app_proc") . "display_base_print.class.php" ;
require_once $cfg->GetValue("app_service") . "client/base_client.service.class.php";

require_once $cfg->GetValue("app_data") . "database_connected.class.php";
require_once $cfg->GetValue("app_service") . "client/sia/sia_setting_client.service.class.php";

// Load module class
require_once $cfg->GetValue("app_module") . "kbk_user/communication/user_client.service.class.php" ;
require_once $cfg->GetValue("app_module") . "kbk_proposed_classes/communication/proposed_classes_client.service.class.php" ;
require_once $cfg->GetValue("app_module") . "kbk_academic_plan/communication/academic_plan_client.service.class.php" ;

require_once $cfg->GetValue("app_module") . "kbk_academic_plan/display/display_print_krs_mhs.class.php" ;  
require_once $cfg->GetValue("app_module") . "kbk_reference/business/reference.class.php" ;  

$ThisPageAccessRight = "MAHASISWA_KBK | DOSEN_KBK";
$security = new Security($cfg);

if(false !== $security->CheckAccessRight($ThisPageAccessRight)){
   $ThisPageLinks = $security->mUserIdentity->GetProperty("Role");
   $lnk = new Links($cfg, $ThisPageLinks);
   $userRole = $ThisPageLinks;

   $mhsNiu = NULL;
   if (isset($_GET["niu"])){
      $mhsNiu = $cfg->Dec($_GET["niu"]);
      //$userRole = "1";
      $userRole = "8";
   } else {
      $mhsNiu = $security->mUserIdentity->GetProperty("UserReferenceId");
   }
   
   $prodiId = NULL;
   if (isset($_GET["prodi"])){
      $prodiId = $cfg->Dec($_GET["prodi"]);
   }else {
      $prodiId = $security->mUserIdentity->GetProperty("UserProdiId");
   }

   $opsi = $cfg->Dec($_GET["opsi"]);
   
   $ThisPage = new DisplayPrintKrsMhs($cfg, $security, $userRole, $mhsNiu, $prodiId, $opsi);
   $ThisPage->SetLinks($lnk);
   $ThisPage->Display();
}else{
   $security->DenyPageAccess();
}
?>