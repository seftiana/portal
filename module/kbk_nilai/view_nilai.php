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
require_once $cfg->GetValue('app_module') . 'kbk_nilai/display/display_view_nilai.class.php';

$ThisPageAccessRight = "MAHASISWA_KBK"; 
    
   $security = new Security($cfg); 
   if (false !== $security->CheckAccessRight($ThisPageAccessRight)) 
   { 
      $ThisPageLinks = $security->mUserIdentity->GetProperty("Role");  
      $lnk = new Links($cfg, $ThisPageLinks);
      $nim = $security->mUserIdentity->GetProperty("UserReferenceId");
      $prodiId = $security->mUserIdentity->GetProperty("UserProdiId");
   	$sempId = "";
      if (isset($_GET["semp"])){
         $sempId = $cfg->Dec($_GET["semp"]);
      } else if (isset($_POST["lstSemester"])){
         $sempId = $_POST["lstSemester"];
      }
      $app = new DisplayViewNilai($cfg, $security,$nim,$prodiId,$sempId);
      $app->SetLinks($lnk);  
      $app->Display(); 
   } 
   else 
   { 
      $security->DenyPageAccess(); 
   }
?>