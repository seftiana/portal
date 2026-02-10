<?php
//Load Application Class
require_once $cfg->GetValue('app_proc') . 'display_base.class.php';
require_once $cfg->GetValue('app_proc') . 'display_base_full.class.php';
//require_once $cfg->GetValue('app_data') . 'database_connected.class.php';
require_once $cfg->GetValue("app_service") . "client/base_client.service.class.php";
require_once $cfg->GetValue("app_module") . "kbk_user/communication/user_client.service.class.php" ;
require_once $cfg->GetValue("app_service") . "client/sia/sia_setting_client.service.class.php";
// Load module class
require_once $cfg->GetValue("app_module") . "kbk_nilai/communication/nilai_client.service.class.php" ;

//Load module Display Faq
require_once $cfg->GetValue('app_module') . 'kbk_nilai/display/display_view_nilai_detil.class.php';

$ThisPageAccessRight = "MAHASISWA_KBK | DOSEN_KBK"; 
    
   $security = new Security($cfg); 
   if (false !== $security->CheckAccessRight($ThisPageAccessRight)) 
   { 
      $ThisPageLinks = $security->mUserIdentity->GetProperty("Role");  
      $lnk = new Links($cfg, $ThisPageLinks);
      $nim = $security->mUserIdentity->GetProperty("UserReferenceId");
      $prodiId = $security->mUserIdentity->GetProperty("UserProdiId");
      $klsId = $cfg->dec($_GET['kelasId']);
      $sempId = $cfg->Dec($_GET["semp"]);
      $app = new DisplayViewNilaiDetil($cfg, $security,$nim,$prodiId,$sempId,$klsId);
      $app->SetLinks($lnk);  
      $app->Display(); 
   } 
   else 
   { 
      $security->DenyPageAccess(); 
   }
?>