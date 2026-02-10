<?php
   // Load Application Display Class      
   require_once $cfg->GetValue('app_proc') . 'display_base.class.php';   
   require_once $cfg->GetValue('app_proc') . 'display_base_nolinks.class.php';
   // Load Module display Class
   require_once $cfg->GetValue('app_module') . 'kbk_user/display/display_view_agreement_greet.class.php';
   
   $ThisPageAccessRight = "MAHASISWA | DOSEN | MAHASISWA_KBK | DOSEN_KBK | ORTU";
   $security = new Security($cfg);

   if (false !== $security->CheckAccessRight($ThisPageAccessRight)) {
      $isSuccess = 0;
      if (isset($_REQUEST["success"])){
         $isSuccess = 1;
      }
      $ThisPage = new DisplayViewAgreementGreet($cfg, $security, $isSuccess);
      $ThisPage->SetTemplateFile('agreement_greet.html');
      $ThisPage->Display();
   }
   else {
      $security->DenyPageAccess();
   }
?>