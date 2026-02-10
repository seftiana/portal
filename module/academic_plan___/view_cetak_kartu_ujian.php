<?php
/*
Author : Nikolius
Email : n1colius.lau@gmail.com
Date : 6/16/2014 9:20:16 PM
*/
// Load Application Display Class
require_once $cfg->GetValue('app_proc') . 'display_base.class.php';
require_once $cfg->GetValue('app_proc') . 'display_base_full.class.php';
require_once $cfg->GetValue('app_service') . 'client/base_client.service.class.php';

// Load Module data Class
require_once $cfg->GetValue("app_service") . "client/sia/sia_setting_client.service.class.php";
require_once $cfg->GetValue("app_module") . "user/communication/user_client.service.class.php" ;
require_once $cfg->GetValue("app_module") . "academic_plan/communication/academic_plan_client.service.class.php" ;
require_once $cfg->GetValue('app_module') . 'academic_plan/display/display_cetak_kartu_ujian.class.php';

	//Konek Ke gtPembayaran   
   require_once $cfg->GetValue('app_data') . 'RestClient.class.php';
   $getBlock = $cfg->GetValue('enable_block'); #add ccp 1-4-2019

$ThisPageAccessRight = "MAHASISWA";
$security = new Security($cfg);

if (false !== $security->CheckAccessRight($ThisPageAccessRight)){
   $ThisPageLinks = $security->mUserIdentity->GetProperty("Role");
   $lnk = new Links($cfg, $ThisPageLinks);
   $userRole = $ThisPageLinks;

   $mhsNiu = $security->mUserIdentity->GetProperty("UserReferenceId");
   $prodiId = $security->mUserIdentity->GetProperty("UserProdiId");

   $ThisPage = new DisplayCetakKartuUjian($cfg, $security, $userRole, $mhsNiu, $prodiId, $getBlock);
   $ThisPage->SetLinks($lnk);
   $ThisPage->Display();
}else{
   $security->DenyPageAccess();
}
?>