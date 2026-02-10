<?php   

   require_once $cfg->GetValue('app_proc') . 'process_base.class.php';   
   
   require_once $cfg->GetValue("app_service") . "client/base_client.service.class.php";
   require_once $cfg->GetValue("app_service") . "client/sia/sia_setting_client.service.class.php";
   
   require_once $cfg->GetValue("app_module") . "dosen/display/process_dosen.class.php" ;  
   require_once $cfg->GetValue("app_module") . "dosen/communication/dosen_client.service.class.php" ;   

   $ThisPageAccessRight = "MAHASISWA";
   $security = new Security($cfg);

	if (false !== $security->CheckAccessRight($ThisPageAccessRight)) {
		if($_POST['text']==''){
			$text = $_GET['text'];
		}else{
			$text = $_POST['text'];
		}
		
		if($_POST['presensiId']==''){
			$presensiId = $_GET['presensiId'];
		}else{
			$presensiId = $_POST['presensiId'];
		}
			
		$sia = $security->mUserIdentity->GetProperty("ServerServiceAddress");
		$app = new ProcessDosen($cfg, $security, $sia );
		$dataNim 		= "";
		$dataNim		= $security->mUserIdentity->GetProperty("UserReferenceId");
		$tema			= $dataNim.":".$text;
		$pertemuanId	= $presensiId;
		
		$result = $app->DoUpdateMasterPresensiKelasValidasi($tema, $pertemuanId);

		if ($result === false) {
			echo "Error";
		} else {
			echo "success";
		}

	} else {
     		$security->DenyPageAccess();
	}
?>