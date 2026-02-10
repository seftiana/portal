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
            		header("Location: " . $cfg->GetURL('history_absen_dosen','kelas_absen','view') . $urlAdditional . '&sem=' . $_POST['lstSemester']);
		} else if(isset($_POST['action']) AND $_POST['action'] == 'PresensiKelasEdit'){
			$sia = $cfg->Dec($_POST['sia']);
			$app = new ProcessDosen($cfg, $security, $sia ) ;
			$dataNim=$_POST['nimPeserta'];
			$dataStatusHadir=$_POST['statusHadirPeserta'];
			$tema=$_POST['tema'];
			$pokokBahasan=$_POST['pokok_bahasan'];
			$rencana = trim($_POST['thnRencana'].'-'.$_POST['blnRencana'].'-'.$_POST['tglRencana'].' '.'00:00:00');
			$terlaksana = trim($_POST['thnTerlaksana'].'-'.$_POST['blnTerlaksana'].'-'.$_POST['tglTerlaksana'].' '.'00:00:00');
			$pertemuanId=$_POST['pertemuanId'];
			$kelasId=$_POST['klsId'];
			$semId=$_POST['semId'];	
			$nipDosen=$_POST['nipDosen'];
		 
			//update master kelas
			$result = $app->DoUpdateMasterPresensiKelasHistory($tema,$pokokBahasan, $pertemuanId);
			$urlAdditional = '&sia=' . $_POST['sia'] . '&sem=' . $cfg->Enc($semId) . '&kls=' . $cfg->Enc($kelasId);
			if ($result === false) {
				$urlAdditional .= '&err=' . $cfg->Enc($app->GetProperty("ProcessDosenError"));
			} else {
				$urlAdditional .= '&proc=1';
			}

			header("Location: " . $cfg->GetURL('history_absen_dosen','presence_class','view') . $urlAdditional);
       	 	} else {
            		header("Location: " . $cfg->GetURL('history_absen_dosen','kelas_absen','view') . $urlAdditional);
        	}
       
		exit;
	} else {
     		$security->DenyPageAccess();
	}
?>