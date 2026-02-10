<?php

   // Load application class
   require_once $cfg->GetValue("app_proc") . "display_base.class.php" ;
   require_once $cfg->GetValue("app_proc") . "display_base_full.class.php" ;
   require_once $cfg->GetValue("app_data") . "database_connected.class.php" ;
   require_once $cfg->GetValue("app_service") . "client/base_client.service.class.php";
   
   require_once $cfg->GetValue("app_service") . "client/sia/sia_setting_client.service.class.php";
   // Load module class
   require_once $cfg->GetValue("app_module") . "kbk_user/communication/user_client.service.class.php" ;
   require_once $cfg->GetValue("app_module") . "kbk_dosen/communication/dosen_client.service.class.php" ;
   require_once $cfg->GetValue("app_module") . "kbk_dosen/display/display_view_mentored_students.class.php" ;
   require_once $cfg->GetValue("app_module") . "kbk_reference/business/reference.class.php" ;
   
   $ThisPageAccessRight = "DOSEN_KBK";
   $security = new Security($cfg);
   $id = NULL;
   if (false !== $security->CheckAccessRight($ThisPageAccessRight)){
      $ThisPageLinks = $security->mUserIdentity->GetProperty("Role");
      $lnk = new Links($cfg, $ThisPageLinks);
      
      $errMsg = NULL;
      if (isset($_GET["err"])){
         $errMsg = $cfg->Dec($_GET["err"]);
      }

      $servServer = "";
      if (isset($_POST["sia"])){
         $servServer = $cfg->Dec($_POST["sia"]);
      } else if (isset($_GET["sia"])){
         $servServer = $cfg->Dec($_GET["sia"]);
      }

      $ThisPage = new DisplayViewMentoredStudents($cfg, $security, $errMsg,$servServer);
      $ThisPage->SetLinks($lnk);
      $ThisPage->Display();
   }else{
      $security->DenyPageAccess();
   }
?>