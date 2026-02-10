<?php
   // Load Application Display Class      
   require_once $cfg->GetValue('app_proc') . 'display_base.class.php';   
   require_once $cfg->GetValue('app_proc') . 'display_base_full.class.php';
   require_once $cfg->GetValue('app_data') . 'database_connected.class.php';
   
   // Load Module display Class
   require_once $cfg->GetValue('app_module') . 'user/display/display_chgpassword_user.class.php';
   require_once $cfg->GetValue('app_module') . 'user/business/user.class.php';
   
   $ThisPageAccessRight = "ADMINISTRASI | ADMINUNIT | MAHASISWA | DOSEN | KEPENDIDIKAN | UMUM | ORTU";
   $security = new Security($cfg);
   if (false !== $security->CheckAccessRight($ThisPageAccessRight)) {
      $ThisPageLinks = $security->mUserIdentity->GetProperty("Role");      
      $lnk = new Links($cfg, $ThisPageLinks);
      
      $errMsg = NULL;
      if (isset($_GET["errMsg"])) 
         $errMsg = $cfg->Dec($_GET["errMsg"]);
      
      $errType = NULL;
      if (isset($_GET['errType']))
         $errType = $cfg->Dec($_GET['errType']);
      
      $ThisPage = new DisplayChgpasswordUser($cfg, $security, $errMsg, $errType);
      $ThisPage->SetLinks($lnk);
      $ThisPage->Display();
   }
   else {
      $security->DenyPageAccess();
   }
?>