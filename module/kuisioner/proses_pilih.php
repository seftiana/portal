<?php	
	require_once $cfg->GetValue("app_proc") . "display_base.class.php" ;
	require_once $cfg->GetValue("app_proc") . "display_base_full.class.php" ;
	require_once $cfg->GetValue("app_service") . "client/base_client.service.class.php";
	require_once $cfg->GetValue("app_service") . "client/sia/sia_setting_client.service.class.php";
	require_once $cfg->GetValue('app_proc') . 'process_base.class.php';
	
	require_once $cfg->GetValue("app_module") . "kuisioner/display/proses_pilih.class.php";
	require_once $cfg->GetValue("app_module") . "dosen/communication/dosen_client.service.class.php" ; 
	
	if ((!empty($_POST["calon"])))
	{
		$security = new Security($cfg);
		$address = $security->mUserIdentity->GetProperty("ServerServiceAddress");
		$prodiId=  $security->mUserIdentity->GetProperty("UserProdiId");
		
		$proses = new ProsesPilih($cfg, $security, $address, $prodiId);

		$userIdentity = $_SESSION["user_identity_portal"];
		$userId = $userIdentity->GetProperty("UserReferenceId");
  
		if (false !== $proses->DoInsertPilihan($_POST['calon'],$userId)){
			header("Location: ". $cfg->GetURL('home', 'home', 'view'));
			exit();
		}else{
			header("Location: ". $cfg->GetURL('home', 'home', 'view'));
			// header("Location: ". $cfg->GetURL('kuisioner', 'informasi', 'view').'&err=1');
			exit();
		}
	}
	else
	{  
		header("Location: ". $cfg->GetURL('kuisioner', 'informasi_pemilu', 'view').'&err=1');
	}
	
?>