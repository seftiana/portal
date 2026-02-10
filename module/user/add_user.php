<?php
   //Load Application Class
   require_once $cfg->GetValue('app_proc') . 'display_base.class.php';
   require_once $cfg->GetValue('app_proc') . 'display_base_full.class.php';
   require_once $cfg->GetValue('app_data') . 'database_connected.class.php';
   
   // Load Module Class  
   require_once $cfg->GetValue('app_module') . 'user/display/display_add_user.class.php';
   require_once $cfg->GetValue('app_module') . 'user/business/user.class.php';
   
   require_once $cfg->GetValue('app_module') . 'reference/business/reference.class.php';
   
   
   $ThisPageAccessRight = "ADMINISTRASI";
   $security = new Security($cfg);
   $err="";
   if (isset($_GET["err"])){
      $err = $cfg->Dec($_GET["err"]);
      
   }
   if (false !== $security->CheckAccessRight($ThisPageAccessRight)){
      $ThisPageLinks = $security->mUserIdentity->GetProperty("Role");      
      $lnk = new Links($cfg, $ThisPageLinks);
      $ThisPage = new DisplayAddUser($cfg, $security, $err);
      $ThisPage->SetLinks($lnk);
      $ThisPage->Display();
   }else{
      $security->DenyPageAccess();
   }
   
   
?>