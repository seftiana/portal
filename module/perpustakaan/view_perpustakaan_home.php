<?php
   
   // Load application class
   require_once $cfg->GetValue("app_proc") . "display_base.class.php" ;
   require_once $cfg->GetValue("app_proc") . "display_base_full.class.php" ;
   require_once $cfg->GetValue("app_service") . "client/base_client.service.class.php";
   require_once $cfg->GetValue("app_data") . "database_connected.class.php" ;
   
   // Load module class
   //require_once $cfg->GetValue("app_module") . "user/communication/user_client.service.class.php" ;
   require_once $cfg->GetValue("app_module") . "reference/business/reference.class.php" ;
   require_once $cfg->GetValue("app_module") . "perpustakaan/communication/perpustakaan_client.service.class.php" ;
   require_once $cfg->GetValue("app_module") . "perpustakaan/display/display_view_perpustakaan_home.class.php" ;  
   
   $ThisPageAccessRight = "MAHASISWA | DOSEN";
   $security = new Security($cfg);
   
   if (false !== $security->CheckAccessRight($ThisPageAccessRight)){
      $ThisPageLinks = $security->mUserIdentity->GetProperty("Role");
      $lnk = new Links($cfg, $ThisPageLinks);
          
      $serviceServer = NULL;
      if (isset($_GET["serv"])){
         $serviceServer= $cfg->Dec($_GET["serv"]);
      } 
      
      $viewType = NULL;
      if (isset($_GET["view"])){
         $viewType= $cfg->Dec($_GET["view"]);
      } 

      $start = 0;
      if (isset($_GET['next'])) {
         $start = $cfg->Dec($_GET['next']);
      }elseif (isset($_GET['prev'])) {
         $start = $cfg->Dec($_GET['prev']);
      }
      
      $keySearch = "";
      if (isset($_GET['cari'])) {
         $keySearch = $cfg->Dec($_GET['cari']);
      }
      
      $msg = "";
      $err = false;
      if (isset($_GET['inf'])) {
         $msg = $cfg->Dec($_GET['inf']);
         $err = false;
      } else if (isset($_GET['err'])) {
         $msg = $cfg->Dec($_GET['err']);
         $err = true;
      }
      
      
      $ThisPage = new DisplayViewPerpustakaanHome($cfg, $security, $viewType,$serviceServer, $start, $keySearch, $msg, $err);
      $ThisPage->SetLinks($lnk);
      $ThisPage->Display();
   }else{
      $security->DenyPageAccess();
   }
   
?>