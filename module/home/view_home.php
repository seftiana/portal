<?php
   // Load Application Display Class	   
   require_once $cfg->GetValue('app_proc') . 'display_base.class.php';   
   require_once $cfg->GetValue('app_proc') . 'display_base_full.class.php';   
   require_once $cfg->GetValue('app_data') . 'database_connected.class.php';
   require_once $cfg->GetValue('app_service') . 'client/base_client.service.class.php';   
	// Load Module display Class
	require_once $cfg->GetValue('app_module') . 'home/display/display_view_home.class.php';
   
   require_once $cfg->GetValue('app_module') . 'announcement/business/announcement.class.php';
   require_once $cfg->GetValue('app_module') . 'forum/business/forum.class.php';
   require_once $cfg->GetValue('app_module') . 'reference/business/reference.class.php';
   require_once $cfg->GetValue('app_module') . 'message/business/message.class.php';
   require_once $cfg->GetValue('app_module') . 'feedback/business/feedback.class.php';
   require_once $cfg->GetValue('app_module') . 'user/communication/user_client.service.class.php';

   $ThisPageAccessRight = "ADMINISTRASI | ADMINUNIT | MAHASISWA | DOSEN | KEPENDIDIKAN | UMUM";
   $security = new Security($cfg);
   
	if (isset($_GET["sia"])){
        $siaaddr = $cfg->Dec($_GET["sia"]);
    }else{
		$siaaddr = $security->mUserIdentity->GetProperty("ServerServiceAddress");
	}
   
	if (isset($_GET["niu"])){
        $userId = $cfg->Dec($_GET["niu"]);
        $userRole = "1";
    }else{
        $userId = $security->mUserIdentity->GetProperty("UserReferenceId");
        $userRole = $security->mUserIdentity->GetProperty("Role");
    }

	if (false !== $security->CheckAccessRight($ThisPageAccessRight)) {
		$ThisPageLinks = $security->mUserIdentity->GetProperty("Role");  
		$lnk = new Links($cfg, $ThisPageLinks);
		$ThisPage = new DisplayViewHome($cfg, $security, $userId, $userRole, $siaaddr);
		$ThisPage->SetLinks($lnk);
		$ThisPage->Display();
	}
	else {
		$security->DenyPageAccess();
	}
?>