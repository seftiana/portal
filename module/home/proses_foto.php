<?php
require_once $cfg->GetValue('app_proc') . 'display_base.class.php';
require_once $cfg->GetValue('app_proc') . 'display_base_full.class.php';
require_once $cfg->GetValue('app_proc') . 'process_base.class.php';
require_once $cfg->GetValue('app_service') . 'client/base_client.service.class.php';

// Load Module data Class
require_once $cfg->GetValue('app_module') . 'home/display/proses_home.class.php';
	include $cfg->GetValue("app_module") . "user/communication/user_sireg.service.class.php";

   $ThisPageAccessRight = "ADMINISTRASI | ADMINUNIT | MAHASISWA | DOSEN";
   $security = new Security($cfg);

	if (false !== $security->CheckAccessRight($ThisPageAccessRight)) {
		$ThisPageLinks = $security->mUserIdentity->GetProperty("Role");
		$lnk = new Links($cfg, $ThisPageLinks);

		$userId = $security->mUserIdentity->GetProperty("UserReferenceId");
		$userRole = $security->mUserIdentity->GetProperty("Role");

		$proses = new ProsesHome($cfg, $security, $userId, $userRole);

		if(isset($_FILES['uploadFoto'])){
			$upload = $proses->uploadFoto();
			if($upload === true)echo '<script>window.top.updateUserFoto();</script>';
			else echo '<script>window.top.errorUserFoto("' . addslashes($upload) . '");</script>';
		}
		die;
	}
	else {
		$security->DenyPageAccess();
	}

?>
