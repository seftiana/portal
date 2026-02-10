<?php
//Load Application Class
require_once $cfg->GetValue('app_proc') . 'display_base.class.php';
require_once $cfg->GetValue('app_proc') . 'display_base_full.class.php';
require_once $cfg->GetValue('app_service') . 'client/base_client.service.class.php';   


// Load Module Class  
require_once $cfg->GetValue('app_module') . 'wisuda/display/display_view_tutup.class.php';
require_once $cfg->GetValue('app_module') . 'wisuda/communication/user_client.service.class.php';

##load services soap
require_once $cfg->GetValue('app_data') . 'RestClient.class.php'; #add ccp 29-02-2024

$ThisPageAccessRight = "MAHASISWA";
$security = new Security($cfg);

if (false !== $security->CheckAccessRight($ThisPageAccessRight)){
	$ThisPageLinks = $security->mUserIdentity->GetProperty("Role");      
	$lnk = new Links($cfg, $ThisPageLinks);
  
	$viewBy = "user";
	if (isset($_GET["view"])){
		$viewBy = $cfg->Dec($_GET["view"]);
	}
  
	$siaaddr = "";
	if (isset($_GET["sia"])){
		$siaaddr = $cfg->Dec($_GET["sia"]);
	}
	
	if (isset($_GET["niu"])){
		$userId = $cfg->Dec($_GET["niu"]);
		$userRole = "1";
	}else{
		$userId = $security->mUserIdentity->GetProperty("UserReferenceId");
		$userRole = $security->mUserIdentity->GetProperty("Role");
	}
	$ThisPage = new DisplayViewTutup($cfg, $security, $userId, $userRole, $viewBy, $siaaddr);
	$ThisPage->SetLinks($lnk);
	$ThisPage->Display();
}else{
	$security->DenyPageAccess();
}
   
   
