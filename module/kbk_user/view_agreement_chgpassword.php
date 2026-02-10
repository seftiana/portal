<?php
   // Load Application Display Class      
   require_once $cfg->GetValue('app_proc') . 'display_base.class.php';   
   require_once $cfg->GetValue('app_proc') . 'display_base_nolinks.class.php';
   // Load Module display Class
   require_once $cfg->GetValue('app_module') . 'kbk_user/display/display_view_agreement_chgpassword.class.php';
   
   $ThisPageAccessRight = "MAHASISWA | DOSEN | MAHASISWA_KBK | DOSEN_KBK | ORTU";
   $security = new Security($cfg);
   
   if (false !== $security->CheckAccessRight($ThisPageAccessRight)) {
      $isDisc = 0;
      if (isset($_REQUEST["isDisc"])) {
         $isDisc = 1;
      }
      $err = '';
      if (isset($_REQUEST["err"])) {
         $err = $cfg->Dec($_REQUEST["err"]);
      }
      $ThisPage = new DisplayViewAgreementChgpassword($cfg, $security, $isDisc, $err);      
      $ThisPage->Display();
   }
   else {
      $security->DenyPageAccess();
   }
?>