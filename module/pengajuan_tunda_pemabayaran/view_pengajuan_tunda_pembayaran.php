<?php
/*
Author : Nikolius
Email : n1colius.lau@gmail.com
Date : 6/4/2014 1:16:40 AM
*/

// Load Application Display Class
require_once $cfg->GetValue('app_proc') . 'display_base.class.php';
require_once $cfg->GetValue('app_proc') . 'display_base_full.class.php';
require_once $cfg->GetValue('app_service') . 'client/base_client.service.class.php';

// Load Module data Class
require_once $cfg->GetValue('app_module') . 'pengajuan_cuti/display/display_pengajuan_cuti.class.php';
require_once $cfg->GetValue('app_module') . 'pengajuan_cuti/communication/pengajuan_cuti.service.class.php';

$ThisPageAccessRight = "MAHASISWA";
$security = new Security($cfg);

if (false !== $security->CheckAccessRight($ThisPageAccessRight)){
   $ThisPageLinks = $security->mUserIdentity->GetProperty("Role");
   $lnk = new Links($cfg, $ThisPageLinks);

   $userId = $security->mUserIdentity->GetProperty("UserReferenceId");
   $userRole = $security->mUserIdentity->GetProperty("Role");

   $ThisPage = new DisplayPengajuanCuti($cfg, $security, $userId, $userRole);
   $ThisPage->SetLinks($lnk);
   $ThisPage->Display();
}else{
   $security->DenyPageAccess();
}

?>