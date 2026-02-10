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
   require_once $cfg->GetValue("app_module") . "dosen/display/display_view_kesediaan_waktu_mengajar.class.php" ;  
   
   $ThisPageAccessRight = "DOSEN";
   $security = new Security($cfg);
   
   if (false !== $security->CheckAccessRight($ThisPageAccessRight)){
      $ThisPageLinks = $security->mUserIdentity->GetProperty("Role");
      $lnk = new Links($cfg, $ThisPageLinks);
      
      $dsnNip = "";
      if (isset($_GET["nip"])){
         $dsnNip = $cfg->Dec($_GET["nip"]);
      } else {
         $dsnNip = $security->mUserIdentity->GetProperty("UserReferenceId");
      }
      
      $prodiId = "";
      if (isset($_GET["prodi"])){
         $prodiId = $cfg->Dec($_GET["prodi"]);
      }else {
         $prodiId = $security->mUserIdentity->GetProperty("UserProdiId");
      }
      
      $viewFrom = "self";
      if (isset($_GET["from"])){
         $viewFrom = $cfg->Dec($_GET["from"]);
      }else if (isset($_POST["from"])){
         $viewFrom = $cfg->Dec($_POST["from"]);
      }
      $semesterId = NULL;
      if (isset($_GET["sem"])){
         $semesterId = $cfg->Dec($_GET["sem"]);
      }
      
      $servServer = NULL;
      if (isset($_GET["sia"])){
         $servServer = $cfg->Dec($_GET["sia"]);
      }
      
      $errMsg = NULL;
      if (isset($_GET["err"])){
         $errMsg = $cfg->Dec($_GET["err"]);
      }
      
      $ThisPage = new DisplayViewKesediaanWaktuMengajar($cfg, $security, $dsnNip, $prodiId, $viewFrom, $semesterId, $servServer, $errMsg);
      $ThisPage->SetLinks($lnk);
      $ThisPage->Display();
   }else{
      $security->DenyPageAccess();
   }
?>