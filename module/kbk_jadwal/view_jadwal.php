<?php
//Load Application Class
require_once $cfg->GetValue('app_proc') . 'display_base.class.php';
require_once $cfg->GetValue('app_proc') . 'display_base_full.class.php';
//require_once $cfg->GetValue('app_data') . 'database_connected.class.php';
require_once $cfg->GetValue("app_service") . "client/base_client.service.class.php";

require_once $cfg->GetValue("app_module") . "kbk_user/communication/user_client.service.class.php" ;

require_once $cfg->GetValue("app_service") . "client/sia/sia_setting_client.service.class.php";
// Load module class
require_once $cfg->GetValue("app_module") . "kbk_jadwal/communication/jadwal_client.service.class.php" ;

//Load module Display Faq
require_once $cfg->GetValue('app_module') . 'kbk_jadwal/display/display_view_jadwal.class.php';

$ThisPageAccessRight = "MAHASISWA_KBK"; 
    
   $security = new Security($cfg); 
   if (false !== $security->CheckAccessRight($ThisPageAccessRight)) 
   { 
      $ThisPageLinks = $security->mUserIdentity->GetProperty("Role");  
      $lnk = new Links($cfg, $ThisPageLinks);
      $mhsNiu = $security->mUserIdentity->GetProperty("UserReferenceId");
      $prodiId = $security->mUserIdentity->GetProperty("UserProdiId");
      $app = new DisplayViewJadwal($cfg, $security,$mhsNiu,$prodiId);
      $app->SetLinks($lnk);  
      $app->Display(); 
   } 
   else 
   { 
      $security->DenyPageAccess(); 
   }
?>