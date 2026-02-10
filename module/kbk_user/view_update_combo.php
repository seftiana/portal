<?php
   //Load Application Class
   require_once $cfg->GetValue('app_proc') . 'display_base.class.php';
   require_once $cfg->GetValue('app_proc') . 'display_base_full.class.php';
   require_once $cfg->GetValue('app_service') . 'client/base_client.service.class.php';   
   
   
   // Load Module Class  
   require_once $cfg->GetValue('app_module') . 'user/display/display_view_update_combo.class.php';
   require_once $cfg->GetValue('app_module') . 'user/communication/user_client.service.class.php';
   
	include $cfg->GetValue("app_module") . "user/communication/user_sireg.service.class.php";
   
   $ThisPageAccessRight = "MAHASISWA";
   $security = new Security($cfg);
   
   if (false !== $security->CheckAccessRight($ThisPageAccessRight)){
      $ThisPageLinks = $security->mUserIdentity->GetProperty("Role");
      
      $viewBy = "user";
      if (isset($_GET["view"])){
         $viewBy = $cfg->Dec($_GET["view"]);
      }
      
      if (isset($_GET["niu"])){
         $userId = $cfg->Dec($_GET["niu"]);
         $userRole = "1";
      }else{
         $userId = $security->mUserIdentity->GetProperty("UserReferenceId");
         $userRole = $security->mUserIdentity->GetProperty("Role");
      }
      $ThisPage = new DisplayViewUpdateCombo($cfg, $security, $userId, $userRole, $viewBy);
      $ThisPage->Display();
   }else{
      $security->DenyPageAccess();
   }
   
   
