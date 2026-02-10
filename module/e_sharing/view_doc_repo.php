<?php
   
   // Load application class
   require_once $cfg->GetValue("app_proc") . "display_base.class.php" ;
   require_once $cfg->GetValue("app_proc") . "display_base_full.class.php" ;
   require_once $cfg->GetValue("app_service") . "client/base_client.service.class.php";
   require_once $cfg->GetValue('app_proc') . 'process_base.class.php';
   
   require_once $cfg->GetValue('app_data') . 'database_connected.class.php';
   
   // Load module class
//   require_once $cfg->GetValue("app_module") . "e_agenda/communication/thread_client.service.class.php" ;
  // require_once $cfg->GetValue("app_module") . "e_forum/business/forum.class.php" ;
   require_once $cfg->GetValue("app_module") . "e_sharing/display/display.class.php" ;    
   
   $ThisPageAccessRight = "MAHASISWA | DOSEN | ADMINISTRASI | ADMINUNIT";
   $security = new Security($cfg);
   
   if (false !== $security->CheckAccessRight($ThisPageAccessRight)){
      $ThisPageLinks = $security->mUserIdentity->GetProperty("Role");
      $lnk = new Links($cfg, $ThisPageLinks);


      $ThisPage = new DisplaySharing($cfg, $security, $threadId,$page);      
      $ThisPage->SetLinks($lnk);
      
      $ThisPage->DisplayRepo();
   }else{
      $security->DenyPageAccess();
   }
   
?>