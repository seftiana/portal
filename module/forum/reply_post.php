<?php

   // Load Application Display Class	   
   require_once $cfg->GetValue('app_proc') . 'display_base.class.php';   
   require_once $cfg->GetValue('app_proc') . 'display_base_full.class.php';
   
   // Load Core Business Class
   require_once $cfg->GetValue('app_data') . 'database_connected.class.php';
   
   // Load Module Display Class
   require_once $cfg->GetValue('app_module') . 'forum/display/display_reply_post.class.php';
   
   // Load Module Business Class
   require_once $cfg->GetValue('app_module') . 'forum/business/forum.class.php';
      

	$ThisPageAccessRight = "ADMINISTRASI  | ADMINUNIT | MAHASISWA | DOSEN | MAHASISWA_KBK | DOSEN_KBK";

	$security = new Security($cfg);

	if (false !== $security->CheckAccessRight($ThisPageAccessRight)) {
		$ThisPageLinks = $security->mUserIdentity->GetProperty("Role");      
		$lnk = new Links($cfg, $ThisPageLinks);
            
      $err = NULL;
      if(isset($_GET['err']))
         $err = $cfg->Dec($_GET['err']);
      
      $errtype = NULL;
      if(isset($_GET['errType']))
         $errtype = $cfg->Dec($_GET['errType']);
         
      $postid = NULL;
      if(isset($_GET['postid']))
         $postid = $cfg->Dec($_GET['postid']);
         
      $threadid = NULL;
      if(isset($_GET['thrdid']))
         $threadid = $cfg->Dec($_GET['thrdid']);
      
      $katid = NULL;
      if(isset($_GET['katid']))
         $katid = $cfg->Dec($_GET['katid']);
      
      $topid = NULL;
      if(isset($_GET['topid']))
         $topid = $cfg->Dec($_GET['topid']);
         
		$ThisPage = new DisplayReplyPost($cfg, $security, $threadid, $katid, $topid, $postid, $err, $errtype);
		$ThisPage->SetLinks($lnk);
		$ThisPage->Display();
	}
	else {
		$security->DenyPageAccess();
	}
?>