<?php

	// Load application class	
   require_once $cfg->GetValue("app_proc") . "display_base.class.php" ;
   require_once $cfg->GetValue("app_proc") . "display_base_full.class.php" ;
	require_once $cfg->GetValue("app_data") . "database_connected.class.php" ;
   require_once $cfg->GetValue("app_service") . "client/base_client.service.class.php";
	
	// Load module class
	require_once $cfg->GetValue("app_module") . "reference/business/reference.class.php" ;
   require_once $cfg->GetValue("app_module") . "schoolarship/communication/schoolarship_client.service.class.php" ;
   require_once $cfg->GetValue("app_module") . "schoolarship/display/display_view_schoolarship_detail.class.php" ;  
   
   $ThisPageAccessRight = "MAHASISWA | DOSEN";
   $security = new Security($cfg);
	if (false !== $security->CheckAccessRight($ThisPageAccessRight)){
      $ThisPageLinks = $security->mUserIdentity->GetProperty("Role");
      $lnk = new Links($cfg, $ThisPageLinks);
          
      $beasiswaId = "";
      if (isset($_GET['bid'])) {
         $beasiswaId = $cfg->Dec($_GET['bid']);
      }
		
		$showDaftar = "0";
		if (isset($_GET['dftr'])) {
         $showDaftar = $cfg->Dec($_GET['dftr']);
      }
		
      $ThisPage = new DisplayViewSchoolarshipDetail($cfg, $security, $beasiswaId, $showDaftar);
      $ThisPage->SetLinks($lnk);
      $ThisPage->Display();
   }else{
      $security->DenyPageAccess();
   }
?>