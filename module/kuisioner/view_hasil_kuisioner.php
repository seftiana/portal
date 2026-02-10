<?php
   // Load application class
   require_once $cfg->GetValue("app_proc") . "display_base.class.php" ;
   require_once $cfg->GetValue('app_proc') . 'display_base_nolinks.class.php';
   require_once $cfg->GetValue("app_data") . "database_connected.class.php" ;
   require_once $cfg->GetValue("app_service") . "client/base_client.service.class.php";
   
   require_once $cfg->GetValue("app_service") . "client/sia/sia_setting_client.service.class.php";
   // Load module class
   require_once $cfg->GetValue("app_module") . "user/communication/user_client.service.class.php" ;
   require_once $cfg->GetValue("app_module") . "kuisioner/communication/kuisioner_client.service.class.php" ;
   require_once $cfg->GetValue("app_module") . "kuisioner/display/display_view_hasil_kuisioner.class.php" ;
   require_once $cfg->GetValue("app_module") . "kuisioner/business/kuisioner.class.php" ;
   
   if(empty($_SESSION['user_identity_portal'])){
   $_SESSION['user_identity_portal'] = 'guest';
   $_SESSION['role_base_portal'] = 'guest';   
   }else{
   $ThisPageAccessRight = "ADMINISTRASI | ADMINUNIT | MAHASISWA | DOSEN | KEPENDIDIKAN | UMUM";
   $security = new Security($cfg);
   }
      
      $ThisPage = new DisplayViewHasilKuisioner($cfg, $security);
      $ThisPage->Display();
?>