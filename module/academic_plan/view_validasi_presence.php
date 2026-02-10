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
   require_once $cfg->GetValue("app_module") . "academic_plan/display/display_view_validasi_presence.class.php" ; 
   // echo'<pre>';print_r($_GET);die;   
   $ThisPageAccessRight = "MAHASISWA";
   $security = new Security($cfg);
   
   if (false !== $security->CheckAccessRight($ThisPageAccessRight)){
      $ThisPageLinks = $security->mUserIdentity->GetProperty("Role");
      $lnk = new Links($cfg, $ThisPageLinks);
      
	  $kelasId = NULL;
      if (isset($_GET["kls"])){
         $kelasId = $cfg->Dec($_GET["kls"]);
      }
	  
	  $semesterId = NULL;
      if (isset($_GET["smt"])){
         $semesterId = $cfg->Dec($_GET["smt"]);
      }
      
      $servServer = NULL;
      if (isset($_GET["sia"])){
         $servServer = $cfg->Dec($_GET["sia"]);
      }
      
      $errMsg = NULL;
      if (isset($_GET["err"])){
         $errMsg = $cfg->Dec($_GET["err"]);
      }
      
      $ThisPage = new DisplayViewValidasiPresenceClass($cfg, $security, $semesterId, $kelasId, $servServer, $errMsg);
      $ThisPage->SetLinks($lnk);
      $ThisPage->Display();
   }else{
      $security->DenyPageAccess();
   }
?>