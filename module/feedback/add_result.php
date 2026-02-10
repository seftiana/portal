<?php
   //Load Application Class
   require_once $cfg->GetValue('app_proc') . 'display_base.class.php';
   require_once $cfg->GetValue('app_proc') . 'display_base_full.class.php';
   
  require_once $cfg->GetValue('app_module') . 'feedback/display/display_add_result.class.php';
   
   $ThisPageAccessRight = "MAHASISWA | DOSEN";
   $security = new Security($cfg);
   if (false !== $security->CheckAccessRight($ThisPageAccessRight)){
      $ThisPageLinks = $security->mUserIdentity->GetProperty("Role");      
      $lnk = new Links($cfg, $ThisPageLinks);
      $errMsg = "";
      if (isset($_GET['err'])) {
         $errMsg = $cfg->Dec($_GET['err']);
      }
      $ThisPage = new DisplayAddResult($cfg, $security, $errMsg);
      $ThisPage->SetLinks($lnk);
      $ThisPage->Display();
   }else{
      $security->DenyPageAccess();
   }
   
   //terima kasi telah mengisi feedback.. akan kami proses selanjutnya
   
   
?>