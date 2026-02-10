<?php

   // Load application class
   require_once $cfg->GetValue("app_proc") . "display_base.class.php" ;
   require_once $cfg->GetValue("app_proc") . "display_base_full.class.php" ;
   require_once $cfg->GetValue("app_service") . "client/base_client.service.class.php";
   require_once $cfg->GetValue("app_data") . "database_connected.class.php";
   
   require_once $cfg->GetValue("app_service") . "client/sia/sia_setting_client.service.class.php";
   // Load module class
   require_once $cfg->GetValue("app_module") . "kbk_user/communication/user_client.service.class.php" ;
   require_once $cfg->GetValue("app_module") . "kbk_proposed_classes/communication/proposed_classes_client.service.class.php" ;
   require_once $cfg->GetValue("app_module") . "kbk_proposed_classes/display/display_view_proposed_classes_detail.class.php" ;  
   require_once $cfg->GetValue("app_module") . "kbk_reference/business/reference.class.php" ;  
   
   $ThisPageAccessRight = "MAHASISWA_KBK | DOSEN_KBK";
   $security = new Security($cfg);
   if (false !== $security->CheckAccessRight($ThisPageAccessRight) ){
      
      $ThisPageLinks = $security->mUserIdentity->GetProperty("Role");
      $lnk = new Links($cfg, $ThisPageLinks);
      
      $kelasId = "";
      if (isset($_GET['kelas']))
         $kelasId = $cfg->Dec($_GET['kelas']);
      
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
      
      $ThisPage = new DisplayViewProposedClassesDetail($cfg, $security, $kelasId, $errMsg, $servServer, $mdl, $paramAdditional, $valueAdditional);
      $ThisPage->SetLinks($lnk);
      $ThisPage->Display();
   }else{
      $security->DenyPageAccess();
   }
?>