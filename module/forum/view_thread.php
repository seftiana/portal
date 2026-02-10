<?php

   // Load Application Display Class	   
   require_once $cfg->GetValue('app_proc') . 'display_base.class.php';   
   require_once $cfg->GetValue('app_proc') . 'display_base_full.class.php';
   
   // Load Core Business Class
   require_once $cfg->GetValue('app_data') . 'database_connected.class.php';
   
   // Load Module Display Class
   require_once $cfg->GetValue('app_module') . 'forum/display/display_view_thread.class.php';
   
   // Load Module Business Class
   require_once $cfg->GetValue('app_module') . 'forum/business/forum.class.php';
      

	$ThisPageAccessRight = "ADMINISTRASI | ADMINUNIT | MAHASISWA | DOSEN | MAHASISWA_KBK | DOSEN_KBK";

	$security = new Security($cfg);

	if (false !== $security->CheckAccessRight($ThisPageAccessRight)) {
		$ThisPageLinks = $security->mUserIdentity->GetProperty("Role");      
		$lnk = new Links($cfg, $ThisPageLinks);
      if($ThisPageLinks == 3)
         $isManaged = true;
      else
         $isManaged = false;
      
      $err = NULL;
      if(isset($_GET['err']))
         $err = $cfg->Dec($_GET['err']);
      
      $errtype = NULL;
      if(isset($_GET['errType']))
         $errtype = $cfg->Dec($_GET['errType']);
         
      $katid = NULL;
      if(isset($_GET['katid']))
         $katid = $cfg->Dec($_GET['katid']);
      
      $topid = NULL;
      if(isset($_GET['topid']))
         $topid = $cfg->Dec($_GET['topid']);
			
		$page = 1;
      if(isset($_GET['page']))
         $page = $cfg->Dec($_GET['page']);
         
		$ThisPage = new DisplayViewThread($cfg, $security, $katid, $topid, $isManaged, $page, $err, $errtype);
		$ThisPage->SetLinks($lnk);
		$ThisPage->Display();
	}
	else {
		$security->DenyPageAccess();
	}
?>