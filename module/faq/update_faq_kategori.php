<?php

   // Load Application Display Class      
   require_once $cfg->GetValue('app_proc') . 'display_base.class.php';   
   require_once $cfg->GetValue('app_proc') . 'display_base_full.class.php';

   // Load Data Display Class
   require_once $cfg->GetValue('app_data') . 'database_connected.class.php';

   // Load Module display Class
   require_once $cfg->GetValue('app_module') . 'faq/display/display_update_faq_kategori.class.php';
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
      
      $id = NULL;
      if (isset($_GET['katid'])){
         $id = $cfg->Dec($_GET['katid']);
      }
      
      $ThisPage = new DisplayUpdateFaqKategori($cfg, $security, $errMsg, $tErrMsg, $id);
      $ThisPage->SetLinks($lnk);
      $ThisPage->Display();
   }
   else {
      $security->DenyPageAccess();
   }
?>