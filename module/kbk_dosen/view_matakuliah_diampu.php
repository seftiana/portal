<?php
//Load Application Class
require_once $cfg->GetValue('app_proc') . 'display_base.class.php';
require_once $cfg->GetValue('app_proc') . 'display_base_full.class.php';
//require_once $cfg->GetValue('app_data') . 'database_connected.class.php';
require_once $cfg->GetValue("app_service") . "client/base_client.service.class.php";

require_once $cfg->GetValue("app_service") . "client/sia/sia_setting_client.service.class.php";
// Load module class
require_once $cfg->GetValue("app_module") . "kbk_dosen/communication/dosen_client.service.class.php" ;

//Load module Display Faq
require_once $cfg->GetValue('app_module') . 'kbk_dosen/display/display_view_matakuliah_diampu.class.php';
require_once $cfg->GetValue("app_module") . "kbk_user/communication/user_client.service.class.php" ;

$ThisPageAccessRight = "DOSEN_KBK"; 
    
   $security = new Security($cfg); 
   if (false !== $security->CheckAccessRight($ThisPageAccessRight)) 
   { 
      $ThisPageLinks = $security->mUserIdentity->GetProperty("Role");  
      $lnk = new Links($cfg, $ThisPageLinks);
   	$errMsg = NULL;
      if (isset($_GET["err"])){
         $errMsg = $cfg->Dec($_GET["err"]);
      }
      $dsnNip = $security->mUserIdentity->GetProperty("UserReferenceId");
      $app = new DisplayViewMatakuliahDiampu($cfg, $security, $dsnNip,$errMsg);
      $app->SetLinks($lnk);  
      $app->Display(); 
   } 
   else 
   { 
      $security->DenyPageAccess(); 
   }
?>