<?php
//echo 'hai';exit;
// Load Application Display Class	   
   require_once $cfg->GetValue('app_proc') . 'display_base.class.php';   
   require_once $cfg->GetValue('app_proc') . 'display_base_full.class.php';
   require_once $cfg->GetValue('app_proc') . 'process_base.class.php';
   require_once $cfg->GetValue("app_service") . "client/base_client.service.class.php";
   require_once $cfg->GetValue("app_service") . "client/sia/sia_setting_client.service.class.php";
   // Load Data Display Class
   require_once $cfg->GetValue('app_data') . 'database_connected.class.php';
   require_once $cfg->GetValue('app_data') . 'ReadFilePhp4.class.php';

   // Load Module data Class
   require_once $cfg->GetValue('app_module') . 'e_sharing/display/proses.class.php';
   require_once $cfg->GetValue('app_module') . 'e_sharing/communication/sharing.service.class.php';
   require_once $cfg->GetValue('app_module') . 'user/business/user.class.php';
   


$ThisPageAccessRight = "MAHASISWA | DOSEN | ADMINISTRASI | ADMINUNIT";

$security = new Security($cfg);
if (false !== $security->CheckAccessRight($ThisPageAccessRight)) 
{  
	$mId = $security->mUserIdentity->GetProperty("UserReferenceId");
	$prodiId = $security->mUserIdentity->GetProperty("UserProdiId");
	
	$filename = $cfg->Dec($_GET['file']);
	$url = $cfg->GetValue('file_upload_root')."module/e_sharing/file_upload/".$filename;
	$proses = new SmartRead();
	$proses->Read($url);
	
	exit;
	    
}
else
{
    $security->DenyPageAccess();
}


?>