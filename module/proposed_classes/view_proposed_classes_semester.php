<?php

   // Load application class
   require_once $cfg->GetValue("app_proc") . "display_base.class.php" ;
   require_once $cfg->GetValue("app_proc") . "display_base_full.class.php" ;
   require_once $cfg->GetValue("app_data") . "database_connected.class.php" ;
   require_once $cfg->GetValue("app_service") . "client/base_client.service.class.php";

   require_once $cfg->GetValue("app_service") . "client/sia/sia_setting_client.service.class.php";
   // Load module class
   require_once $cfg->GetValue("app_module") . "user/communication/user_client.service.class.php" ;
   require_once $cfg->GetValue("app_module") . "proposed_classes/communication/proposed_classes_client.service.class.php" ;
   require_once $cfg->GetValue("app_module") . "proposed_classes/display/display_view_proposed_classes_semester.class.php" ;
   require_once $cfg->GetValue("app_module") . "reference/business/reference.class.php" ;

   $ThisPageAccessRight = "MAHASISWA | DOSEN";
   $security = new Security($cfg);
   $id = NULL;
   if (false !== $security->CheckAccessRight($ThisPageAccessRight)){
	  if (isset($_POST['prodi'])) {
	  	$vProdi = trim($_POST['prodi']);
	  } else {
		$vProdi = trim($_POST['siaprodi']);
	  }
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
         //$servServer = $cfg->Dec($_GET["sia"]);
         $servServer = '';
      }

      $ThisPage = new DisplayViewProposedClassesSemester($cfg, $security, $errMsg, $servServer,$vProdi);
      $ThisPage->SetLinks($lnk);
      $ThisPage->Display();
   }else{
      $security->DenyPageAccess();
   }
?>