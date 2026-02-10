<?php
/*
Author : Nikolius
Email : n1colius.lau@gmail.com
Date : 10/15/2012 2:48:37 PM
*/
require_once $cfg->GetValue("app_proc") . "display_base.class.php" ;
require_once $cfg->GetValue("app_proc") . "display_base_full.class.php" ;
require_once $cfg->GetValue("app_service") . "client/base_client.service.class.php";
require_once $cfg->GetValue("app_service") . "client/sia/sia_setting_client.service.class.php";

require_once $cfg->GetValue("app_module") . "dosen/communication/dosen_client.service.class.php" ;
require_once $cfg->GetValue("app_module") . "dosen/display/display_view_grade_management_excel.class.php" ;

$ThisPageAccessRight = "DOSEN";
$security = new Security($cfg);

if (false !== $security->CheckAccessRight($ThisPageAccessRight)){
   $ThisPageLinks = $security->mUserIdentity->GetProperty("Role");
   $lnk = new Links($cfg, $ThisPageLinks);
   
   //get parameter   
   $kelas = $cfg->dec($_GET['kls']);
   $sem = $cfg->dec($_GET['sem']);
   $sia = $cfg->dec($_GET['sia']);
   
   $thisPage = new DisplayViewGradeManagementExcel($cfg,$security,$sia,$kelas,$sem);
   $thisPage->SetLinks($lnk);     
   $thisPage->Display();
}else{
   $security->DenyPageAccess();
}
?>