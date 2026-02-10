<?php
// Load Application Display Class	   
require_once $cfg->GetValue('app_proc') . 'process_base.class.php';   

require_once $cfg->GetValue("app_service") . "client/base_client.service.class.php";
require_once $cfg->GetValue("app_service") . "client/sia/sia_setting_client.service.class.php";
// Load Module display Class
require_once $cfg->GetValue("app_module") . "user/communication/user_client.service.class.php" ;
require_once $cfg->GetValue('app_module') . 'presensi/display/process_scan_presensi.class.php';
require_once $cfg->GetValue("app_module") . "academic_plan/communication/academic_plan_client.service.class.php";
   

$ThisPageAccessRight = "MAHASISWA | DOSEN";

$security = new Security($cfg);


if (false !== $security->CheckAccessRight($ThisPageAccessRight)) {
	
	if (isset($_GET["qr"])){
		$mhsNiu = NULL;
		if (isset($_GET["niu"])){
			 // $mhsNiu = $_GET["niu"];
			 $mhsNiu = $cfg->Dec($_GET["niu"]);
		} else {
			 $mhsNiu = $security->mUserIdentity->GetProperty("UserReferenceId");
		}
	
		$uuid = $_GET["qr"];
		$sia = $security->mUserIdentity->GetProperty("ServerServiceAddress");
		$prodiId = $security->mUserIdentity->GetProperty("UserProdiId");

		$app = new ProcessScanPresensi($cfg, $security, $mhsNiu,$prodiId, $sia);
		
		$result = $app->InsertPresensi($uuid);
		if($result==false){
			$errMsg = $cfg->Enc($app->GetProperty("ProcessAcademicPlanError"));
			$url = $cfg->GetURL('presensi','jadwal_presensi','view') . '&err=' . $errMsg;
			// unset($_SESSION['tagihan_prasyarat']);
			echo "<script>
					alert('".$cfg->Dec($errMsg)."!');
					 window.location.href = '".$url."';
				</script>";
				exit;
		}else{
			$url = $cfg->GetURL('presensi','jadwal_presensi','view');
			// unset($_SESSION['tagihan_prasyarat']);
			echo "<script>
					alert('Presensi hadir berhasil disimpan!');
					 window.location.href = '".$url."';
				</script>";
			exit; 
		}
		
	}else{	
		$security->DenyPageAccess();
	}
}else {
  $security->DenyPageAccess();
}
   
?>