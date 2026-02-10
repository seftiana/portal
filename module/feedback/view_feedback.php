<?php
   //Load Application Class
   require_once $cfg->GetValue('app_proc') . 'display_base.class.php';
   require_once $cfg->GetValue('app_proc') . 'display_base_full.class.php';
   require_once $cfg->GetValue('app_data') . 'database_connected.class.php';
   
   require_once $cfg->GetValue('app_module') . 'feedback/display/display_view_feedback.class.php';
   require_once $cfg->GetValue('app_module') . 'feedback/business/feedback.class.php';
   require_once $cfg->GetValue('app_module') . 'reference/business/reference.class.php';
   
   $ThisPageAccessRight = "ADMINISTRASI";
   $security = new Security($cfg);
   if (false !== $security->CheckAccessRight($ThisPageAccessRight)){
      $ThisPageLinks = $security->mUserIdentity->GetProperty("Role");      
      $lnk = new Links($cfg, $ThisPageLinks);
      
      $hal = 1;
      if (isset($_GET['page'])) {
         $hal = $cfg->Dec($_GET['page']);
      }
      
      $search = "";
      if (isset($_GET['key'])) {
         $search = $cfg->Dec($_GET['key']);
      }
      
      $tipe = '';
      if (isset($_GET['type'])) {
         $tipe = $cfg->Dec($_GET['type']);
      }
      
      $err = "";
      if (isset($_GET['err'])) {
         $err = $cfg->Dec($_GET['err']);
      }
      
      $ThisPage = new DisplayViewFeedback($cfg, $security,$hal, $tipe, $search, $err);
      $ThisPage->SetLinks($lnk);
      $ThisPage->Display();
   }else{
      $security->DenyPageAccess();
   }
   
   
?>