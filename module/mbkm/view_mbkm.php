<?php

   // Load Application Display Class	   
   require_once $cfg->GetValue('app_proc') . 'display_base.class.php';   
   require_once $cfg->GetValue('app_proc') . 'display_base_full.class.php';

   // Load Data Display Class
   require_once $cfg->GetValue('app_data') . 'database_connected.class.php';

   // Load Module data Class
   require_once $cfg->GetValue('app_module') . 'mbkm/display/display_view_mbkm.class.php';
   require_once $cfg->GetValue('app_module') . 'user/business/user.class.php';
   
   #service soap ke akademik#
   require_once $cfg->GetValue("app_service") . "client/base_client.service.class.php"; 
   require_once $cfg->GetValue("app_service") . "client/sia/sia_setting_client.service.class.php";
   require_once $cfg->GetValue("app_module") . "dosen/communication/dosen_client.service.class.php" ;
   ##end####
   

	$ThisPageAccessRight = "MAHASISWA | DOSEN | ADMINISTRASI | ADMINUNIT";

	$security = new Security($cfg);
	
	

	if (false !== $security->CheckAccessRight($ThisPageAccessRight)) {
		
		$ThisPageLinks = $security->mUserIdentity->GetProperty("Role");      
		$lnk = new Links($cfg, $ThisPageLinks);
		
		$cari = '';
		if(isset($_POST['cari'])){
			$cari = $_POST['cari'];
		}else if(isset($_GET['cari'])){
			$cari = $cfg->Dec($_GET['cari']);
		}
      
		$errMsg = NULL;
		if (isset($_GET['errMsg']))
			$errMsg = $cfg->Dec($_GET['errMsg']);
      
		$tErrMsg = NULL;
		if (isset($_GET['tErrMsg']))
			$tErrMsg = $cfg->Dec($_GET['tErrMsg']);
      
		$page = 1;
		if(isset($_GET['page']))
			$page = $cfg->Dec($_GET['page']);
         
		$ThisPage = new DisplayViewMbkm($cfg, $security, $page, $errMsg, $tErrMsg, $cari);
		$ThisPage->SetLinks($lnk);
		$ThisPage->Display();
	}
	else {
		$security->DenyPageAccess();
	}
?>