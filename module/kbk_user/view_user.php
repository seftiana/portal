<?php
   //Load Application Class
   require_once $cfg->GetValue('app_proc') . 'display_base.class.php';
   require_once $cfg->GetValue('app_proc') . 'display_base_full.class.php';
   require_once $cfg->GetValue('app_data') . 'database_connected.class.php';
   
   // Load Module Class  
   require_once $cfg->GetValue('app_module') . 'user/display/display_view_user.class.php';
   require_once $cfg->GetValue('app_module') . 'user/business/user.class.php';
   
   
   $ThisPageAccessRight = "ADMINISTRASI";
   $security = new Security($cfg);
   
   if (false !== $security->CheckAccessRight($ThisPageAccessRight)){
      $ThisPageLinks = $security->mUserIdentity->GetProperty("Role");      
      $lnk = new Links($cfg, $ThisPageLinks);
      
      $searchKey = "";
      if (isset($_GET["cari"])){
         $searchKey["UserId"] = $cfg->Dec($_GET["cari"]);
      }
      
      $page = 1;
      if (isset($_GET["page"])){
         $page = $cfg->Dec($_GET["page"]);
      }
      
      $err = "";
      if (isset($_GET["err"])){
         $err = $cfg->Dec($_GET["err"]);
      }

      $flag = "0";
      if (isset($_GET["flag"])){
         $flag = $cfg->Dec($_GET["flag"]);
      }
      
      $ThisPage = new DisplayViewUser($cfg, $security, $err, $searchKey, $page, $flag);
      $ThisPage->SetLinks($lnk);
      $ThisPage->Display();
   }else{
      $security->DenyPageAccess();
   }
   
   
?>