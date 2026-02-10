<?php
   // Load application class
   require_once $cfg->GetValue("app_proc") . "display_base.class.php" ;
   require_once $cfg->GetValue('app_proc') . 'display_base_nolinks.class.php';
   require_once $cfg->GetValue("app_service") . "client/base_client.service.class.php";
   require_once $cfg->GetValue("app_data") . "database_connected.class.php";
   
   require_once $cfg->GetValue("app_service") . "client/sia/sia_setting_client.service.class.php";
   
   // Load module class
   require_once $cfg->GetValue("app_module") . "reference/business/reference.class.php" ;  
   require_once $cfg->GetValue("app_module") . "user/communication/user_client.service.class.php" ;
   require_once $cfg->GetValue("app_module") . "kuisioner/communication/kuisioner_client.service.class.php" ;   
   require_once $cfg->GetValue("app_module") . "kuisioner/display/display_informasi.class.php" ; 
   require_once $cfg->GetValue("app_module") . "kuisioner/business/informasi.class.php" ; 
   
   $ThisPageAccessRight = "ADMINISTRASI | ADMINUNIT | MAHASISWA | DOSEN | ALUMNI | KEPENDIDIKAN | UMUM |ORTU";
   $security = new Security($cfg);
  
   if (false !== $security->CheckAccessRight($ThisPageAccessRight)){
      $ThisPageLinks = $security->mUserIdentity->GetProperty("Role");
      $lnk = new Links($cfg, $ThisPageLinks);
      
      $niu = $security->mUserIdentity->GetProperty("User");
      
      $servServer = $security->mUserIdentity->GetProperty("ServerServiceAddress");
      if(empty($servServer)){
	  $kuisObj = new Kuisioner($cfg);
	  $servServer = $kuisObj->getServiceAddress();
	  }
	  
      $errMsg = NULL;
      if (isset($_GET["err"])){
         $errMsg = $cfg->Dec($_GET["err"]);
      }
		
		
      $ThisPage = new DisplayInformasi($cfg, $security, $niu, $servServer, $errMsg); //update ccp 12-02-2019 23-10-2018
      $ThisPage->Display();
   }else{
      $security->DenyPageAccess();
   }
?>