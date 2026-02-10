<?php
/*
Author : Nikolius
Email : n1colius.lau@gmail.com
Date : 6/10/2014 7:31:49 PM
*/
// Load application class
require_once $cfg->GetValue("app_proc") . "display_base.class.php" ;
require_once $cfg->GetValue("app_proc") . "display_base_print.class.php" ;
require_once $cfg->GetValue("app_data") . "database_connected.class.php" ;
require_once $cfg->GetValue("app_service") . "client/base_client.service.class.php";

require_once $cfg->GetValue("app_service") . "client/sia/sia_setting_client.service.class.php";
require_once $cfg->GetValue("app_module") . "proposed_classes/communication/proposed_classes_client.service.class.php" ;
require_once $cfg->GetValue("app_module") . "proposed_classes/display/display_print_mk_ditawarkan_mhs.class.php" ;

$ThisPageAccessRight = "MAHASISWA";
$security = new Security($cfg);

if (false !== $security->CheckAccessRight($ThisPageAccessRight)){
   $ThisPageLinks = $security->mUserIdentity->GetProperty("Role");
   $lnk = new Links($cfg, $ThisPageLinks);

   $ThisPage = new DisplayPrintMkDitawarkanMhs($cfg, $security);
   $ThisPage->SetLinks($lnk);
   $ThisPage->Display();
}else{
   $security->DenyPageAccess();
}
?>