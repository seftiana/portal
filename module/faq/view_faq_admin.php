<?php
//Load Application Class
   require_once $cfg->GetValue('app_proc') . 'display_base.class.php';
   require_once $cfg->GetValue('app_proc') . 'display_base_full.class.php';
   require_once $cfg->GetValue('app_data') . 'database_connected.class.php';

//Load module Display Faq
   require_once $cfg->GetValue('app_module') . 'faq/display/display_view_faq_admin.class.php';
   require_once $cfg->GetValue('app_module') . 'faq/business/faq.class.php';
   require_once $cfg->GetValue('app_module') . 'reference/business/reference.class.php';

   $ThisPageAccessRight = "ADMINISTRASI";
   $security = new Security($cfg);
   if (false !== $security->CheckAccessRight($ThisPageAccessRight)) {
      $ThisPageLinks = $security->mUserIdentity->GetProperty("Role");  
      $lnk = new Links($cfg, $ThisPageLinks);

      $errMsg = NULL;
      if (isset($_GET['errMsg'])){
         $errMsg = $cfg->Dec($_GET['errMsg']);
      }
      
      $tErrMsg = NULL;
      if (isset($_GET['tErrMsg'])){
         $tErrMsg = $cfg->Dec($_GET['tErrMsg']);
      }
      
      $hal = 1;
      if (isset($_GET['page'])) {
         $hal = $cfg->Dec($_GET['page']);
      }
   
      $katId = NULL;
      if (isset($_GET['katid'])) {
         $katId = $cfg->Dec($_GET['katid']);
      }

      $ThisPage = new DisplayViewFaqAdmin($cfg, $security, $hal, $katId, $errMsg, $tErrMsg);

      $ThisPage->SetLinks($lnk);
      $ThisPage->Display();
   }
   else {
      $security->DenyPageAccess();
   }
?>