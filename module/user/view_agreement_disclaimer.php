<?php
   // Load Application Display Class      
   require_once $cfg->GetValue('app_proc') . 'display_base.class.php';   
   require_once $cfg->GetValue('app_proc') . 'display_base_nolinks.class.php';
   // Load Module display Class
   require_once $cfg->GetValue('app_module') . 'user/display/display_view_agreement_disclaimer.class.php';
   
   $ThisPageAccessRight = "MAHASISWA | DOSEN";
   $security = new Security($cfg);

   if (false !== $security->CheckAccessRight($ThisPageAccessRight)) {
      $isIntro = 0;
      if (isset($_REQUEST["isIntro"])) {
         $isIntro = 1;
      }
      $ThisPage = new DisplayViewAgreementDisclaimer($cfg, $security, $isIntro);
      $ThisPage->SetTemplateFile('agreement_disclaimer.html');
      $ThisPage->Display();
   }
   else {
      $security->DenyPageAccess();
   }
?>