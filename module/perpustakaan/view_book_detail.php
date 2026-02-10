<?php
   
   // Load application class
   require_once $cfg->GetValue("app_proc") . "display_base.class.php" ;
   require_once $cfg->GetValue("app_proc") . "display_base_full.class.php" ;
   require_once $cfg->GetValue("app_service") . "client/base_client.service.class.php";
   require_once $cfg->GetValue("app_data") . "database_connected.class.php" ;
   
   // Load module class
   require_once $cfg->GetValue("app_module") . "user/communication/user_client.service.class.php" ;
   require_once $cfg->GetValue("app_module") . "reference/business/reference.class.php" ;
   require_once $cfg->GetValue("app_module") . "perpustakaan/communication/perpustakaan_client.service.class.php" ;
   require_once $cfg->GetValue("app_module") . "perpustakaan/display/display_view_book_detail.class.php" ;  
   
   $ThisPageAccessRight = "MAHASISWA | DOSEN";
   $security = new Security($cfg);
   
   if (false !== $security->CheckAccessRight($ThisPageAccessRight)){
      $ThisPageLinks = $security->mUserIdentity->GetProperty("Role");
      $lnk = new Links($cfg, $ThisPageLinks);

      $serviceServer = NULL;
      if (isset($_GET["serv"])){
         $serviceServer= $cfg->Dec($_GET["serv"]);
      } 
      
      $bukuId = NULL;
      if (isset($_GET["buku"])){
         $bukuId= $cfg->Dec($_GET["buku"]);
      } 
      
      $startKatalog = NULL;
      if (isset($_GET["start"])) {
         $startKatalog= $_GET["start"];
      } 
      
      $key = NULL;
      if (isset($_GET["cari"])){
         $key= $cfg->Dec($_GET["cari"]);
      } 


      $ThisPage = new DisplayViewBookDetail($cfg, $security, $bukuId, $serviceServer, $startKatalog, $key);
      $ThisPage->SetLinks($lnk);
      $ThisPage->Display();
   }else{
      $security->DenyPageAccess();
   }
   
?>