<?php

   // Load application class
   require_once $cfg->GetValue("app_proc") . "display_base.class.php" ;
   require_once $cfg->GetValue("app_proc") . "display_base_full.class.php" ;
   require_once $cfg->GetValue("app_service") . "client/base_client.service.class.php";   
   require_once $cfg->GetValue("app_service") . "client/sia/sia_setting_client.service.class.php";
   // Load module class
   require_once $cfg->GetValue("app_module") . "user/communication/user_client.service.class.php" ;
   require_once $cfg->GetValue("app_module") . "payment/display/display_view_bill_information.class.php" ; 
   //Konek Ke gtPembayaran
   require_once $cfg->GetValue('app_data') . 'database_connected.class.php';;
   require_once $cfg->GetValue('app_module') . 'reference/business/reference.class.php';
   require_once $cfg->GetValue('app_data') . 'RestClient.class.php';
   
   $ThisPageAccessRight = "MAHASISWA | ORTU";
   $security = new Security($cfg);
   
   if (false !== $security->CheckAccessRight($ThisPageAccessRight)){
      $ThisPageLinks = $security->mUserIdentity->GetProperty("Role");
      $lnk = new Links($cfg, $ThisPageLinks);
      $userRole = $ThisPageLinks;
      
      
      $viewBy = "mahasiswa";
      if (isset($_GET["view"])){
         $viewBy = $cfg->Dec($_GET["view"]);
      }
      $mhsNiu = NULL;
      if (isset($_GET["niu"])){
         $mhsNiu = $cfg->Dec($_GET["niu"]);
         $userRole = "1";
      } else {
         $mhsNiu = $security->mUserIdentity->GetProperty("UserReferenceId");
      }
		
      $siaaddr = "";
      if (isset($_GET["sia"])){
         $siaaddr = $cfg->Dec($_GET["sia"]);
      }
		
      $prodiId = NULL;
      if (isset($_GET["prodi"])){
         $prodiId = $cfg->Dec($_GET["prodi"]);
      }else {
         $prodiId = $security->mUserIdentity->GetProperty("UserProdiId");
      }
      
      $errMsg = NULL;
      if (isset($_GET["err"])){
         $errMsg = $cfg->Dec($_GET["err"]);
      }

      $ThisPage = new DisplayViewBillInformation($cfg, $security, $userRole, $mhsNiu, $prodiId, $errMsg, $viewBy, $siaaddr);
      $ThisPage->SetLinks($lnk);
      $ThisPage->Display();
   }else{
      $security->DenyPageAccess();
   }
?>