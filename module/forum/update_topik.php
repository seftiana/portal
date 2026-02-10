<?php

   // Load Application Display Class	   
   require_once $cfg->GetValue('app_proc') . 'display_base.class.php';   
   require_once $cfg->GetValue('app_proc') . 'display_base_full.class.php';
   
   // Load Core Business Class
   require_once $cfg->GetValue('app_data') . 'database_connected.class.php';
   
   // Load Module Display Class
   require_once $cfg->GetValue('app_module') . 'forum/display/display_update_topik.class.php';
   
   // Load Module Business Class
   require_once $cfg->GetValue('app_module') . 'forum/business/forum.class.php';
   require_once $cfg->GetValue('app_module') . 'reference/business/reference.class.php';
   

	$ThisPageAccessRight = "ADMINISTRASI";

	$security = new Security($cfg);

	if (false !== $security->CheckAccessRight($ThisPageAccessRight)) {
		$ThisPageLinks = $security->mUserIdentity->GetProperty("Role");      
		$lnk = new Links($cfg, $ThisPageLinks);      
      
      $err = NULL;
      if(isset($_GET['err']))
         $err = $cfg->Dec($_GET['err']);
      
      $katid = NULL;
      if(isset($_GET['katid']))
         $katid = $cfg->Dec($_GET['katid']);
      
      $errtype = NULL;
      if(isset($_GET['errType']))
         $errtype = $cfg->Dec($_GET['errType']);
         
      $topid = NULL;
      if(isset($_GET['topid']))
         $topid = $cfg->Dec($_GET['topid']);
         
		$ThisPage = new DisplayUpdateTopik($cfg, $security, $katid, $topid, $err, $errtype);
		$ThisPage->SetLinks($lnk);
		$ThisPage->Display();
	}
	else {
		$security->DenyPageAccess();
	}
?>