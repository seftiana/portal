<?php   
   require_once $cfg->GetValue('app_proc') . 'process_base.class.php';   
   
   require_once $cfg->GetValue("app_service") . "client/base_client.service.class.php";
   require_once $cfg->GetValue("app_service") . "client/sia/sia_setting_client.service.class.php";
   
   require_once $cfg->GetValue("app_module") . "dosen/display/process_dosen.class.php" ;  
   require_once $cfg->GetValue("app_module") . "dosen/communication/dosen_client.service.class.php" ;   
// echo"<pre>";print_r($_POST);echo"9 process_absen";die;exit;
   $ThisPageAccessRight = "DOSEN";
   $security = new Security($cfg);

	if (false !== $security->CheckAccessRight($ThisPageAccessRight)) {
		$urlAdditional = '&sia=' . $_POST['sia'];
        if(isset($_POST['btnLihat'])) {
            // lihat nilai 
            header("Location: " . $cfg->GetURL('history_nilai_obe','kelas_nilai','view') . $urlAdditional . '&sem=' . $_POST['lstSemester']);
        } else {
            header("Location: " . $cfg->GetURL('history_nilai_obe','kuisioner_dosen','view') . $urlAdditional);
        }
       
		exit;
	} else {
      $security->DenyPageAccess();
	}
?>