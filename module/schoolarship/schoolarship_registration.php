<?php

	// Load application class	
   require_once $cfg->GetValue("app_proc") . "display_base.class.php" ;
   require_once $cfg->GetValue("app_proc") . "display_base_full.class.php" ;
	require_once $cfg->GetValue("app_data") . "database_connected.class.php" ;
   require_once $cfg->GetValue("app_service") . "client/base_client.service.class.php";
	
	// Load module class
	require_once $cfg->GetValue("app_module") . "reference/business/reference.class.php" ;  
   require_once $cfg->GetValue("app_module") . "schoolarship/communication/schoolarship_client.service.class.php" ;
   require_once $cfg->GetValue("app_module") . "schoolarship/display/display_view_schoolarship_registration.class.php" ;  
   
   $ThisPageAccessRight = "MAHASISWA | DOSEN";
   $security = new Security($cfg);
	if (false !== $security->CheckAccessRight($ThisPageAccessRight)){
      $ThisPageLinks = $security->mUserIdentity->GetProperty("Role");
      $lnk = new Links($cfg, $ThisPageLinks);
          
		$error = "";
		if (isset($_GET['err'])) {
			$error = $cfg->Dec($_GET['err']);
		}
		
		$beasiswaId = "";
		if (isset($_GET['bea'])) {
			$beasiswaId = $cfg->Dec($_GET['bea']);
		}
			 
      $ThisPage = new DisplayViewSchoolarshipRegistration($cfg, $security, $beasiswaId, $error);
      $ThisPage->SetLinks($lnk);
      $ThisPage->Display();
   }else{
      $security->DenyPageAccess();
   }
?>