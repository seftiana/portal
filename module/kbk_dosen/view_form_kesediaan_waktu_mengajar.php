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
   require_once $cfg->GetValue("app_module") . "dosen/display/display_view_form_kesediaan_waktu_mengajar.class.php" ;  
   
   $ThisPageAccessRight = "DOSEN";
   $security = new Security($cfg);
   if (false !== $security->CheckAccessRight($ThisPageAccessRight) ){
      
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
      
      $id = "";
      if (isset($_GET['w']))
         $id = $cfg->Dec($_GET['w']);
      
      $errMsg = "";
      if (isset($_GET["err"])){
         $errMsg = $cfg->Dec($_GET["err"]);
      }
      
      $servServer = "";
      if(isset($_GET["sia"])) {
         $servServer = $cfg->Dec($_GET["sia"]);
      }

      $mdl = "";
      if (isset($_GET["modul"])){
         $mdl = $_GET["modul"];
      }
      
      $paramAdditional = "";
      if (isset($_GET["addparam"])){
         $paramAdditional = $_GET["addparam"];
      }
      
      $valueAdditional = "";
      if (isset($_GET["addval"])){
         $valueAdditional = $_GET["addval"];
      }
      
      $ThisPage = new DisplayViewFormKesediaanWaktuMengajar($cfg, $security, $dsnNip, $prodiId, $id, $errMsg, $servServer, $mdl, $paramAdditional, $valueAdditional);
      $ThisPage->SetLinks($lnk);
      $ThisPage->Display();
   }else{
      $security->DenyPageAccess();
   }
?>