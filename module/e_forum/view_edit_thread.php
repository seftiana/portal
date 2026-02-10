<?php
   
   // Load application class
   require_once $cfg->GetValue("app_proc") . "display_base.class.php" ;
   require_once $cfg->GetValue("app_proc") . "display_base_full.class.php" ;
   require_once $cfg->GetValue("app_service") . "client/base_client.service.class.php";
   require_once $cfg->GetValue('app_proc') . 'process_base.class.php';
   
   // Load module class
   require_once $cfg->GetValue("app_module") . "e_forum/communication/thread_client.service.class.php" ;
   require_once $cfg->GetValue("app_module") . "e_forum/display/display_view_edit_thread.class.php" ;    
   
   $ThisPageAccessRight = "ADMINISTRASI | MAHASISWA | DOSEN";
   $security = new Security($cfg);
   
   if (false !== $security->CheckAccessRight($ThisPageAccessRight)){
      $ThisPageLinks = $security->mUserIdentity->GetProperty("Role");
      $lnk = new Links($cfg, $ThisPageLinks);
      $threadId = $cfg->Dec($_GET['thread_id']);      
      $ThisPage = new DisplayViewEditThread($cfg, $security, $threadId);
      $ThisPage->SetLinks($lnk);
      
      $ThisPage->Display();
   }else{
      $security->DenyPageAccess();
   }
   
?>