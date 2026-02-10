<?php

   // Load Application Display Class	   
   require_once $cfg->GetValue('app_proc') . 'display_base.class.php';   
   require_once $cfg->GetValue('app_proc') . 'display_base_full.class.php';

   // Load Data Display Class
   require_once $cfg->GetValue('app_data') . 'database_connected.class.php';

   // Load Module data Class
   require_once $cfg->GetValue('app_module') . 'announcement/display/display_view_workshop_announcement.class.php';
   require_once $cfg->GetValue('app_module') . 'announcement/business/announcement.class.php';
   require_once $cfg->GetValue('app_module') . 'user/business/user.class.php';
   

	$ThisPageAccessRight = "MAHASISWA | DOSEN | ADMINISTRASI | ADMIN UNIT | KEPENDIDIKAN | UMUM | MAHASISWA_KBK | DOSEN_KBK";

	$security = new Security($cfg);

	if (false !== $security->CheckAccessRight($ThisPageAccessRight)) {
		$ThisPageLinks = $security->mUserIdentity->GetProperty("Role");      
		$lnk = new Links($cfg, $ThisPageLinks);
      
      $page = 1;
      if(isset($_GET['page']))
         $page = $cfg->Dec($_GET['page']);
         
		$ThisPage = new DisplayViewUserWorkshopAnnouncement($cfg, $security, $page);
		$ThisPage->SetLinks($lnk);
		$ThisPage->Display();
	}
	else {
		$security->DenyPageAccess();
	}
?>