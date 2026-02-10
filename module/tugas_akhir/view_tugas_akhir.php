<?php

// Load Application Display Class
require_once $cfg->GetValue('app_proc') . 'display_base.class.php';
require_once $cfg->GetValue('app_proc') . 'display_base_full.class.php';
require_once $cfg->GetValue('app_service') . 'client/base_client.service.class.php';
require_once $cfg->GetValue('app_data') . 'database_connected.class.php';
require_once $cfg->GetValue('app_data') . 'RestClient.class.php';

// Load Module data Class
require_once $cfg->GetValue('app_module') . 'reference/business/reference.class.php';
require_once $cfg->GetValue('app_module') . 'tugas_akhir/display/display_tugas_akhir.class.php';
require_once $cfg->GetValue('app_module') . 'tugas_akhir/communication/tugas_akhir.service.class.php';

$ThisPageAccessRight = "MAHASISWA";
$security = new Security($cfg);

if (false !== $security->CheckAccessRight($ThisPageAccessRight)){
   $ThisPageLinks = $security->mUserIdentity->GetProperty("Role");
   $lnk = new Links($cfg, $ThisPageLinks);

   $userId = $security->mUserIdentity->GetProperty("UserReferenceId");
   $userRole = $security->mUserIdentity->GetProperty("Role");

   unset($_SESSION['isFormValid'],$_SESSION['pesanFormValid']);
   $ThisPage = new DisplayTugasAkhir($cfg, $security, $userId, $userRole);
   $ThisPage->SetLinks($lnk);
   $ThisPage->Display();
}else{
   $security->DenyPageAccess();
}

?>