<?php
//Load Application Class
   require_once $cfg->GetValue('app_proc') . 'display_base.class.php';
   require_once $cfg->GetValue('app_proc') . 'display_base_full.class.php';
   require_once $cfg->GetValue('app_data') . 'database_connected.class.php';

   require_once $cfg->GetValue("app_service") . "client/base_client.service.class.php";
   require_once $cfg->GetValue("app_service") . "client/sia/sia_setting_client.service.class.php";

//Load module Display Yudicium
   require_once $cfg->GetValue('app_module') . 'yudicium/display/display_yudicium_registration.class.php';
   require_once $cfg->GetValue("app_module") . "yudicium/communication/yudicium_client.service.class.php" ;

   require_once $cfg->GetValue("app_module") . "academic_report/communication/academic_report_client.service.class.php" ;
   require_once $cfg->GetValue("app_module") . "reference/business/reference.class.php" ;
   require_once $cfg->GetValue("app_module") . "user/communication/user_client.service.class.php" ;

   $ThisPageAccessRight = "MAHASISWA";
   $security = new Security($cfg);
   if (false !== $security->CheckAccessRight($ThisPageAccessRight)) {
      $ThisPageLinks = $security->mUserIdentity->GetProperty("Role");  
      $lnk = new Links($cfg, $ThisPageLinks);
      $ThisPage = new DisplayYudiciumRegistration($cfg, $security);
      $ThisPage->SetLinks($lnk);
      $ThisPage->Display();
   }
   else {
      $security->DenyPageAccess();
   }
?>