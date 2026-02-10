<?php
   // Load Application Display Class	   
   require_once $cfg->GetValue('app_proc') . 'display_base.class.php';   
   require_once $cfg->GetValue('app_proc') . 'display_base_full.class.php';
   
   require_once $cfg->GetValue('app_data') . 'streamFilePhp4.class.php';
   require_once $cfg->GetValue('app_data') . 'database_connected.class.php';
	// Load Module display Class
	require_once $cfg->GetValue('app_module') . 'home/display/display_view_home.class.php';
   
   require_once $cfg->GetValue('app_module') . 'announcement/business/announcement.class.php';
   require_once $cfg->GetValue('app_module') . 'forum/business/forum.class.php';
   require_once $cfg->GetValue('app_module') . 'reference/business/reference.class.php';
   require_once $cfg->GetValue('app_module') . 'message/business/message.class.php';
   require_once $cfg->GetValue('app_module') . 'feedback/business/feedback.class.php';

   $ThisPageAccessRight = "ADMINISTRASI | ADMINUNIT | MAHASISWA | DOSEN";
   $security = new Security($cfg);

	if (false !== $security->CheckAccessRight($ThisPageAccessRight)) {
		$ThisPageLinks = $security->mUserIdentity->GetProperty("Role");  
		$lnk = new Links($cfg, $ThisPageLinks);		
		
		$rootServer = dirname($security->mUserIdentity->GetProperty('ServerServiceAddress'));		
		$rootServer = str_replace("/index.service.php","",$rootServer);
		$rootServer = str_replace("portal_services","",$rootServer);       				
		
		$fileFoto = $cfg->GetValue('base_image');	
		
		// ambil nama nim anggap 
		$nimMhs = $security->mUserIdentity->GetProperty("UserFotoFile");		
		
		$streamclass = new StreamFile();
		$getFile = $streamclass->Stream($fileFoto,$nimMhs); echo $getFile; exit;
	}
	else {
		$security->DenyPageAccess();
	}

/*
	require_once '../../config/configuration.class.php';
	$cfg = new Configuration();print_r($cfg);
	require_once $cfg->GetValue('app_data') . 'security.class.php';


   $ThisPageAccessRight = "ADMINISTRASI | ADMINUNIT | MAHASISWA | DOSEN";
   $security = new Security($cfg);

*/
?>