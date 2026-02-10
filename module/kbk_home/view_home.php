<?php
	
   // Load Application Display Class	   
   require_once $cfg->GetValue('app_proc') . 'display_base.class.php';   
   require_once $cfg->GetValue('app_proc') . 'display_base_full.class.php';
   
   require_once $cfg->GetValue('app_data') . 'database_connected.class.php';
	// Load Module display Class
	require_once $cfg->GetValue('app_module') . 'kbk_home/display/display_view_home.class.php';
   
   require_once $cfg->GetValue('app_module') . 'announcement/business/announcement.class.php';
   require_once $cfg->GetValue('app_module') . 'forum/business/forum.class.php';
   require_once $cfg->GetValue('app_module') . 'reference/business/reference.class.php';
   require_once $cfg->GetValue('app_module') . 'message/business/message.class.php';
   require_once $cfg->GetValue('app_module') . 'feedback/business/feedback.class.php';

   $ThisPageAccessRight = "ADMINISTRASI | ADMINUNIT | MAHASISWA_KBK | DOSEN_KBK | KEPENDIDIKAN | UMUM | ORTU";
   $security = new Security($cfg);

	if (false !== $security->CheckAccessRight($ThisPageAccessRight)) {
		$ThisPageLinks = $security->mUserIdentity->GetProperty("Role");  
		$lnk = new Links($cfg, $ThisPageLinks);
		$ThisPage = new DisplayViewHome($cfg, $security);
		$ThisPage->SetLinks($lnk);
		$ThisPage->Display();
	}
	else {
		$security->DenyPageAccess();
	}
?>