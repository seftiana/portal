<?php

   // Load Application Display Class	   
   require_once $cfg->GetValue('app_proc') . 'display_base.class.php';   
   require_once $cfg->GetValue('app_proc') . 'display_base_full.class.php';
   // Load Data Display Class
   require_once $cfg->GetValue('app_data') . 'database_connected.class.php';
   // Load Module display Class
   require_once $cfg->GetValue('app_module') . 'message/display/display_view_compose_aduan.class.php';
   require_once $cfg->GetValue('app_module') . 'message/business/message.class.php';
   

	$ThisPageAccessRight = "ADMINISTRASI | ADMINUNIT | MAHASISWA | DOSEN | KEPENDIDIKAN | UMUM | MAHASISWA_KBK | DOSEN_KBK";

	$security = new Security($cfg);

	if (false !== $security->CheckAccessRight($ThisPageAccessRight)) {
		$ThisPageLinks = $security->mUserIdentity->GetProperty("Role");      
		$lnk = new Links($cfg, $ThisPageLinks);
      
      $composeType = NULL;
      if (isset($_GET['composeType']))
         $composeType = $cfg->Dec($_GET['composeType']);
      
      $errMsg = NULL;
      if (isset($_GET['errMsg']))
         $errMsg = $cfg->Dec($_GET['errMsg']);
      
      $errType = NULL;
      if (isset($_GET['errType']))
         $errType = $cfg->Dec($_GET['errType']);
      
      $msgId = NULL;
      if (isset($_GET['msgId']))
         $msgId = $cfg->Dec($_GET['msgId']);
      
		$ThisPage = new DisplayViewComposeAduan($cfg, $security, $composeType, $errMsg, $errType, $msgId);
		$ThisPage->SetLinks($lnk);
		$ThisPage->Display();
	}
	else {
		$security->DenyPageAccess();
	}
?>