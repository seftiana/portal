<?php
   // Load application class
   require_once $cfg->GetValue("app_proc") . "display_base.class.php" ;
   require_once $cfg->GetValue("app_proc") . "display_base_full.class.php" ;
   require_once $cfg->GetValue("app_service") . "client/base_client.service.class.php";
   require_once $cfg->GetValue("app_data") . "database_connected.class.php";
   
   require_once $cfg->GetValue("app_service") . "client/sia/sia_setting_client.service.class.php";
   
   // Load module class
   require_once $cfg->GetValue("app_module") . "reference/business/reference.class.php" ;  
   require_once $cfg->GetValue("app_module") . "user/communication/user_client.service.class.php" ;
   require_once $cfg->GetValue("app_module") . "dosen/communication/dosen_client.service.class.php" ;
   require_once $cfg->GetValue("app_module") . "dosen/display/display_edit_presence_class.class.php" ; 
   
   $ThisPageAccessRight = "DOSEN";
   $security = new Security($cfg);

   if (false !== $security->CheckAccessRight($ThisPageAccessRight)){
      $ThisPageLinks = $security->mUserIdentity->GetProperty("Role");
      $lnk = new Links($cfg, $ThisPageLinks);

      $semesterId = NULL;
      if (isset($_GET["sem"])){
         $semesterId = $cfg->Dec($_GET["sem"]);
      }
	  
	  $kelasId = NULL;
      if (isset($_GET["kls"])){
         $kelasId = $cfg->Dec($_GET["kls"]);
      }
      
      $pertemuanId = NULL;
      if (isset($_GET["ptm"])){
         $pertemuanId = $cfg->Dec($_GET["ptm"]);
      }
      
      $errMsg = NULL;
      if (isset($_GET["err"])){
         $errMsg = $cfg->Dec($_GET["err"]);
      }
	  
	  $ThisPage = new DisplayEditPresenceClass($cfg, $security, $semesterId, $kelasId, $pertemuanId, $errMsg);
      $ThisPage->SetLinks($lnk);
      $ThisPage->Display();	  
   }else{
      $security->DenyPageAccess();
   }
?>