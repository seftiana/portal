<?php
   //Load Application Class
   require_once $cfg->GetValue('app_proc') . 'display_base.class.php';
   require_once $cfg->GetValue('app_proc') . 'display_base_full.class.php';
   require_once $cfg->GetValue('app_service') . 'client/base_client.service.class.php';   
   
   
   // Load Module Class  
   require_once $cfg->GetValue('app_module') . 'user/display/display_view_orang_tua.class.php';
   require_once $cfg->GetValue('app_module') . 'user/communication/user_client.service.class.php';
   
	include $cfg->GetValue("app_module") . "user/communication/user_sireg.service.class.php";
   
   
   $ThisPageAccessRight = "MAHASISWA | DOSEN";
   $security = new Security($cfg);
   
   if (false !== $security->CheckAccessRight($ThisPageAccessRight)){
      $ThisPageLinks = $security->mUserIdentity->GetProperty("Role");      
      $lnk = new Links($cfg, $ThisPageLinks);
      
      $viewBy = "user";
      if (isset($_GET["view"])){
         $viewBy = $cfg->Dec($_GET["view"]);
      }
      
		$siaaddr = "";
      if (isset($_GET["sia"])){
         $siaaddr = $cfg->Dec($_GET["sia"]);
      }
		
      if (isset($_GET["niu"])){
         $userId = $cfg->Dec($_GET["niu"]);
         $userRole = "1";
      }else{
         $userId = $security->mUserIdentity->GetProperty("UserReferenceId");
         $userRole = $security->mUserIdentity->GetProperty("Role");
      }
      $ThisPage = new DisplayViewOrangTua($cfg, $security, $userId, $userRole, $viewBy, $siaaddr);
      $ThisPage->SetLinks($lnk);
      $ThisPage->Display();
   }else{
      $security->DenyPageAccess();
   }
   
   
