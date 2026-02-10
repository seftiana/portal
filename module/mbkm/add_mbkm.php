<?php

   // Load Application Display Class	   
   require_once $cfg->GetValue('app_proc') . 'display_base.class.php';   
   require_once $cfg->GetValue('app_proc') . 'display_base_full.class.php';

   // Load Data Display Class
   require_once $cfg->GetValue('app_data') . 'database_connected.class.php';

   // Load Module display Class
   require_once $cfg->GetValue('app_module') . 'mbkm/display/display_add_mbkm.class.php'; 
   require_once $cfg->GetValue('app_module') . 'reference/business/reference.class.php';
   

	$ThisPageAccessRight = "MAHASISWA | DOSEN | ADMINISTRASI | ADMINUNIT";

	$security = new Security($cfg);

	if (false !== $security->CheckAccessRight($ThisPageAccessRight)) {
		$ThisPageLinks = $security->mUserIdentity->GetProperty("Role");      
		$lnk = new Links($cfg, $ThisPageLinks);
		
		$errMsg = NULL;
		if (isset($_GET['errMsg']))
			$errMsg = $cfg->Dec($_GET['errMsg']);
	 
		$tanggal = date('Y-m-d');
		if (isset($_GET['tanggal']))
			$tanggal = $cfg->Dec($_GET['tanggal']);
         
		$ThisPage = new DisplayAddMbkm($cfg, $security, $errMsg, $tanggal);
		$ThisPage->SetLinks($lnk);
		$ThisPage->Display();
	}else {
		$security->DenyPageAccess();
	}
?>