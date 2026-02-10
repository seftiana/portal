<?php
   //Load Application Class
   require_once $cfg->GetValue('app_proc') . 'display_base.class.php';
   require_once $cfg->GetValue('app_proc') . 'display_base_full.class.php';
   require_once $cfg->GetValue('app_data') . 'database_connected.class.php';
   
   // Load Module Class  
   require_once $cfg->GetValue('app_module') . 'user/display/display_add_succeed.class.php';
   require_once $cfg->GetValue('app_module') . 'user/business/user.class.php';
   
   require_once $cfg->GetValue('app_module') . 'reference/business/reference.class.php';
   
   
   $ThisPageAccessRight = "ADMINISTRASI";
   $security = new Security($cfg);
   
   if (false !== $security->CheckAccessRight($ThisPageAccessRight)){
      $ThisPageLinks = $security->mUserIdentity->GetProperty("Role");      
      $lnk = new Links($cfg, $ThisPageLinks);
      $newId = "";
      if (isset($_GET["new"])){
         $newId = $cfg->Dec($_GET["new"]);
      }
      $password ="";
      if (isset($_GET["ps"])){
         $password = $cfg->Dec($_GET["ps"]);
      }
      $err="";
      if (isset($_GET["err"])){
         $err = $cfg->Dec($_GET["err"]);
      }
      
      $ThisPage = new DisplayAddSucceed($cfg, $security, $newId, $password, $err);
      $ThisPage->SetLinks($lnk);
      $ThisPage->Display();
   }else{
      $security->DenyPageAccess();
   }
   
   
?>