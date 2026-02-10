<?php

   // Load Application Display Class	   
   require_once $cfg->GetValue('app_proc') . 'display_base.class.php';   
   require_once $cfg->GetValue('app_proc') . 'display_base_full.class.php';

   // Load Data Display Class
   require_once $cfg->GetValue('app_data') . 'database_connected.class.php';

   // Load Module display Class
   require_once $cfg->GetValue('app_module') . 'announcement/display/display_update_announcement.class.php';
   require_once $cfg->GetValue('app_module') . 'announcement/business/announcement.class.php';   
   require_once $cfg->GetValue('app_module') . 'reference/business/reference.class.php';
   

	$ThisPageAccessRight = "ADMINISTRASI | ADMINUNIT";

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
         
      $ThisPage = new DisplayUpdateAnnouncement($cfg, $security, $errMsg, $id);
		$ThisPage->SetLinks($lnk);
		$ThisPage->Display();
	}
	else {
		$security->DenyPageAccess();
	}
?>