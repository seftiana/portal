<?php
   //Load Application Class
   require_once $cfg->GetValue('app_proc') . 'display_base.class.php';
   require_once $cfg->GetValue('app_proc') . 'display_base_full.class.php';
   require_once $cfg->GetValue('app_data') . 'database_connected.class.php';
   
   require_once $cfg->GetValue('app_module') . 'feedback/display/display_view_feedback_detail.class.php';
   require_once $cfg->GetValue('app_module') . 'feedback/business/feedback.class.php';
   
   require_once $cfg->GetValue('app_module') . 'reference/business/reference.class.php';

   $ThisPageAccessRight = "ADMINISTRASI";
   $security = new Security($cfg);
   if (false !== $security->CheckAccessRight($ThisPageAccessRight)){
      $ThisPageLinks = $security->mUserIdentity->GetProperty("Role");      
      $lnk = new Links($cfg, $ThisPageLinks);
      
      $search = "";
      if (isset($_GET['key'])) {
         $search = $_GET['key'];
      }
      
      $tipe = '';
      if (isset($_GET['type'])) {
         $tipe = $cfg->Dec($_GET['type']);
      }
      
      $id = '';
      if (isset($_GET['fid'])) {
         $id = $cfg->Dec($_GET['fid']);
      }
      
      $errMsg = '';
      if (isset($_GET['err'])) {
         $errMsg = $cfg->Dec($_GET['err']);
      }

      $ThisPage = new DisplayViewFeedbackDetail($cfg, $security, $id,  $tipe, $search, $errMsg);
      $ThisPage->SetLinks($lnk);
      $ThisPage->Display();
   }else{
      $security->DenyPageAccess();
   }
   
   
?>