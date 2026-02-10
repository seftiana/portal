<?php

   // Load Application Display Class	   
   require_once $cfg->GetValue('app_proc') . 'display_base.class.php';   
   require_once $cfg->GetValue('app_proc') . 'display_base_full.class.php';

   // Load Data Display Class
   require_once $cfg->GetValue('app_data') . 'database_connected.class.php';

   // Load Module display Class
   require_once $cfg->GetValue('app_module') . 'announcement/display/display_detail_announcement.class.php';
   require_once $cfg->GetValue('app_module') . 'announcement/business/announcement.class.php';      
   

	$ThisPageAccessRight = "MAHASISWA | DOSEN | ADMINISTRASI | ADMIN UNIT | ORTU | KEPENDIDIKAN | UMUM | MAHASISWA_KBK | DOSEN_KBK";

	$security = new Security($cfg);

	if (false !== $security->CheckAccessRight($ThisPageAccessRight)) {
		$ThisPageLinks = $security->mUserIdentity->GetProperty("Role");      
		$lnk = new Links($cfg, $ThisPageLinks);
		
      $errMsg = NULL;
      if (isset($_GET['errMsg']))
         $errMsg = $cfg->Dec($_GET['errMsg']);
      
      $id = NULL;
      if (isset($_GET['id']))
         $id = $cfg->Dec($_GET['id']);
         
      $ThisPage = new DisplayDetailAnnouncement($cfg, $security, $errMsg, $id);
		$ThisPage->SetLinks($lnk);
		$ThisPage->Display();
	}
	else {
		$security->DenyPageAccess();
	}
?>