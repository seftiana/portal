<?php
//Load Application Class
   require_once $cfg->GetValue('app_proc') . 'display_base.class.php';
   require_once $cfg->GetValue('app_proc') . 'display_base_full.class.php';

 // Load Data Display Class
   require_once $cfg->GetValue('app_data') . 'database_connected.class.php';

//Load module Display Faq
   require_once $cfg->GetValue('app_module') . 'faq/display/display_view_faq.class.php';
   require_once $cfg->GetValue('app_module') . 'faq/business/faq.class.php';
   require_once $cfg->GetValue('app_module') . 'reference/business/reference.class.php';

   $ThisPageAccessRight = "DOSEN | MAHASISWA";
   $security = new Security($cfg);
   if (false !== $security->CheckAccessRight($ThisPageAccessRight)) {
      $ThisPageLinks = $security->mUserIdentity->GetProperty("Role");  
      $lnk = new Links($cfg, $ThisPageLinks);

      $ThisPage = new DisplayViewFaq($cfg, $security);
      $ThisPage->SetLinks($lnk);
      $ThisPage->Display();
   }
   else {
      $security->DenyPageAccess();
   }
?>