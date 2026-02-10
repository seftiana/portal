<?php
//Load Application Class
require_once $cfg->GetValue('app_proc') . 'display_base.class.php';
require_once $cfg->GetValue('app_proc') . 'display_base_full.class.php';
require_once $cfg->GetValue('app_service') . 'client/base_client.service.class.php';
require_once $cfg->GetValue('app_data') . 'database_connected.class.php';
// Load Application Display Class	   
require_once $cfg->GetValue('app_proc') . 'process_base.class.php';      


// Load Module Class  
require_once $cfg->GetValue('app_module') . 'wisuda/display/display_edit_wisuda.class.php';
require_once $cfg->GetValue('app_module') . 'wisuda/display/process_wisuda.class.php';
require_once $cfg->GetValue('app_module') . 'wisuda/business/user.class.php';
require_once $cfg->GetValue('app_module') . 'wisuda/communication/user_client.service.class.php';

include $cfg->GetValue("app_module") . "wisuda/communication/user_sireg.service.class.php";


$ThisPageAccessRight = "MAHASISWA | DOSEN";
$security = new Security($cfg);
$app = new ProcessWisuda($cfg, $security, $mhsNiu, $prodiId);


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
	  // echo'<pre>';
	  // echo'userid '.$userId;
	  // echo'role '.$userRole;
	  // print_r($_GET);
	$ThisPage = new DisplayEditWisuda($cfg, $security, $userId, $userRole, $viewBy, $siaaddr);
	$ThisPage->SetLinks($lnk);
	$ThisPage->Display();
}else{
	$security->DenyPageAccess();
}
   
   
