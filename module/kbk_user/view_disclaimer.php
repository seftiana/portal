<?php
   // Load Application Display Class      
   require_once $cfg->GetValue('app_proc') . 'display_base.class.php';   
   require_once $cfg->GetValue('app_proc') . 'display_base_full.class.php';
   // Load Module display Class
   require_once $cfg->GetValue('app_module') . 'user/display/display_view_disclaimer.class.php';
   
   $ThisPageAccessRight = "MAHASISWA | DOSEN";
   $security = new Security($cfg);

   if (false !== $security->CheckAccessRight($ThisPageAccessRight)) {
      $ThisPageLinks = $security->mUserIdentity->GetProperty("Role");      
      $lnk = new Links($cfg, $ThisPageLinks);
      $ThisPage = new DisplayViewDisclaimer($cfg, $security);
      $ThisPage->SetLinks($lnk);
      $ThisPage->Display();
   }
   else {
      $security->DenyPageAccess();
   }
?>