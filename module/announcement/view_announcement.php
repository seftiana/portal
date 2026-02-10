<?php

   // Load Application Display Class	   
   require_once $cfg->GetValue('app_proc') . 'display_base.class.php';   
   require_once $cfg->GetValue('app_proc') . 'display_base_full.class.php';

   // Load Data Display Class
   require_once $cfg->GetValue('app_data') . 'database_connected.class.php';

   // Load Module data Class
   require_once $cfg->GetValue('app_module') . 'announcement/display/display_view_announcement.class.php';
   require_once $cfg->GetValue('app_module') . 'announcement/business/announcement.class.php';
   require_once $cfg->GetValue('app_module') . 'user/business/user.class.php';
   

	$ThisPageAccessRight = "ADMINISTRASI | ADMINUNIT";

	$security = new Security($cfg);

	if (false !== $security->CheckAccessRight($ThisPageAccessRight)) {
		$ThisPageLinks = $security->mUserIdentity->GetProperty("Role");      
		$lnk = new Links($cfg, $ThisPageLinks);
      
      $errMsg = NULL;
      if (isset($_GET['errMsg']))
         $errMsg = $cfg->Dec($_GET['errMsg']);
      
      $tErrMsg = NULL;
      if (isset($_GET['tErrMsg']))
         $tErrMsg = $cfg->Dec($_GET['tErrMsg']);
      
      $page = 1;
      if(isset($_GET['page']))
         $page = $cfg->Dec($_GET['page']);
         
		$ThisPage = new DisplayViewAnnouncementManagement($cfg, $security, $page, $errMsg, $tErrMsg);
		$ThisPage->SetLinks($lnk);
		$ThisPage->Display();
	}
	else {
		$security->DenyPageAccess();
	}
?>