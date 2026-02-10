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
		
		$fileFoto = $cfg->GetValue('base_image');
		//$fileFoto = preg_replace('/^(http:\/\/)?([^\/]+)/i', 'http://'.$_SERVER['HTTP_HOST'], $fileFoto.$nimMhs);

		// ambil nama nim anggap 
		$foto = $security->mUserIdentity->GetProperty("UserFotoFile");            

		$streamclass = new StreamFile();
		$getFile = $streamclass->Stream($fileFoto,$foto); echo $getFile; exit;
	}
	else {
		$security->DenyPageAccess();
	}

?>
