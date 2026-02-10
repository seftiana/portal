<?php   
   require_once $cfg->GetValue('app_proc') . 'process_base.class.php';   
   
   require_once $cfg->GetValue("app_service") . "client/base_client.service.class.php";
   require_once $cfg->GetValue("app_service") . "client/sia/sia_setting_client.service.class.php";
   
   require_once $cfg->GetValue("app_module") . "history_nilai_obe/display/process_dosen_obe.class.php" ;  
   require_once $cfg->GetValue("app_module") . "dosen/communication/dosen_client.service.class.php" ;   

   $ThisPageAccessRight = "DOSEN";
   $security = new Security($cfg);

   if (false !== $security->CheckAccessRight($ThisPageAccessRight)) {
      $urlAdditional = '&sia=' . $_POST['sia'];
	  // echo 'post_max_size = '.ini_get('post_max_size')."<br>";
       // echo'<pre>';print_r($_POST);die;
      if(isset($_POST['action']) AND  $_POST['action'] == 'viewMatKulDiampuFromNilai') {
         // pengelolaan nilai
         //dirtyHack sori
         $urlAdditional .= '&from=' . $cfg->Enc('nilai') ;
		
         if (isset($_POST['btnUbah'])) {
            // update nilai
            $sia = $cfg->Dec($_POST['sia']);
            $app = new ProcessDosenObe($cfg, $security, $sia ) ;
            $arrKrsId = $_POST['krsdt'];
            foreach($_POST['krsdt'] as $key=>$value) {
               $arrKrsId[$key] = $cfg->Dec($value);
            }
            $semId = $cfg->Dec($_POST['smt']);
            $kodeProdi = $cfg->Dec($_POST['kodeProdi']);
            $klsId = $cfg->Dec($_POST['kls']);
			
			 # For update bobot nilai
            $paramsBobot = array(
				  $_POST['bobotHarian'],
				  $_POST['bobotMandiri'],
				  $_POST['bobotKelompok'],
				  $_POST['bobotPresentasi'],
				  $_POST['bobotTerstruktur'],
				  $_POST['bobotTambahan'],
				  $_POST['bobotUts'],
				  $_POST['bobotUas'], 
				  
				  $_POST['bobotCpmk1'],$_POST['bobotCpmk2'],$_POST['bobotCpmk3'],$_POST['bobotCpmk4'],$_POST['bobotCpmk5'],$_POST['bobotCpmk6'],
				  $_POST['bobotHarian1'],$_POST['bobotHarian2'],$_POST['bobotHarian3'],$_POST['bobotHarian4'],$_POST['bobotHarian5'],$_POST['bobotHarian6'],
				  $_POST['bobotMandiri1'],$_POST['bobotMandiri2'],$_POST['bobotMandiri3'],$_POST['bobotMandiri4'],$_POST['bobotMandiri5'],$_POST['bobotMandiri6'],
				  $_POST['bobotKelompok1'],$_POST['bobotKelompok2'],$_POST['bobotKelompok3'],$_POST['bobotKelompok4'],$_POST['bobotKelompok5'],$_POST['bobotKelompok6'],
				  $_POST['bobotPresentasi1'],$_POST['bobotPresentasi2'],$_POST['bobotPresentasi3'],$_POST['bobotPresentasi4'],$_POST['bobotPresentasi5'],$_POST['bobotPresentasi6'],
				  $_POST['bobotTerstruktur1'],$_POST['bobotTerstruktur2'],$_POST['bobotTerstruktur3'],$_POST['bobotTerstruktur4'],$_POST['bobotTerstruktur5'],$_POST['bobotTerstruktur6'],
				  $_POST['bobotTambahan1'],$_POST['bobotTambahan2'],$_POST['bobotTambahan3'],$_POST['bobotTambahan4'],$_POST['bobotTambahan5'],$_POST['bobotTambahan6'],
				  $_POST['bobotUts1'],$_POST['bobotUts2'],$_POST['bobotUts3'],$_POST['bobotUts4'],$_POST['bobotUts5'],$_POST['bobotUts6'],
				  $_POST['bobotUas1'],$_POST['bobotUas2'],$_POST['bobotUas3'],$_POST['bobotUas4'],$_POST['bobotUas5'],$_POST['bobotUas6']
            );
            #$result = $app->DoUpdateBobotObe($paramsBobot, $klsId);  #tidak perlu update bobot kelas_dpna
			
            # Update Nilai
            $result = $app->DoUpdateNilai($arrKrsId, $_POST['nilai'], $semId, $_POST['niu'],$kodeProdi);
            
            // decrypt data yang telah di-encrypt
            for ($k=0; $k<count($_POST['cek']['krsdtId']); $k++)
               $_POST['cek']['krsdtId'][$k] = $cfg->Dec($_POST['cek']['krsdtId'][$k]);
            for ($k=0; $k<count($_POST['krsdt']); $k++)
               $_POST['krsdt'][$k] = $cfg->Dec($_POST['krsdt'][$k]);

			$result = $result && $app->DoUpdateDpna($_POST);
            $urlAdditional = '&sia=' . $_POST['sia'] . '&kelas=' . $_POST['kls'] . '&smt=' . $_POST['smt'] .'&pkk=' . $_POST['kodeProdi'];
            if ($result === false) {
               $urlAdditional .= '&err=' . $cfg->Enc($app->GetProperty("ProcessDosenError"));
            } else {
			   $urlAdditional .= '&proc=1';
			}

            header("Location: " . $cfg->GetURL('history_nilai_obe','grade_management','view') . $urlAdditional);
         } else if (isset($_POST['btnNext'])) {
			// update nilai
			$halaman_selanjutnya = $_POST['btnNext'];
            $sia = $cfg->Dec($_POST['sia']);
            $app = new ProcessDosenObe($cfg, $security, $sia ) ;
            $arrKrsId = $_POST['krsdt'];
            foreach($_POST['krsdt'] as $key=>$value) {
               $arrKrsId[$key] = $cfg->Dec($value);
            }
            $semId = $cfg->Dec($_POST['smt']);
            $kodeProdi = $cfg->Dec($_POST['kodeProdi']);
            $klsId = $cfg->Dec($_POST['kls']);
			
			 # For update bobot nilai
            $paramsBobot = array(
				  $_POST['bobotHarian'],
				  $_POST['bobotMandiri'],
				  $_POST['bobotKelompok'],
				  $_POST['bobotPresentasi'],
				  $_POST['bobotTerstruktur'],
				  $_POST['bobotTambahan'],
				  $_POST['bobotUts'],
				  $_POST['bobotUas'], 
				  
				  $_POST['bobotCpmk1'],$_POST['bobotCpmk2'],$_POST['bobotCpmk3'],$_POST['bobotCpmk4'],$_POST['bobotCpmk5'],$_POST['bobotCpmk6'],
				  $_POST['bobotHarian1'],$_POST['bobotHarian2'],$_POST['bobotHarian3'],$_POST['bobotHarian4'],$_POST['bobotHarian5'],$_POST['bobotHarian6'],
				  $_POST['bobotMandiri1'],$_POST['bobotMandiri2'],$_POST['bobotMandiri3'],$_POST['bobotMandiri4'],$_POST['bobotMandiri5'],$_POST['bobotMandiri6'],
				  $_POST['bobotKelompok1'],$_POST['bobotKelompok2'],$_POST['bobotKelompok3'],$_POST['bobotKelompok4'],$_POST['bobotKelompok5'],$_POST['bobotKelompok6'],
				  $_POST['bobotPresentasi1'],$_POST['bobotPresentasi2'],$_POST['bobotPresentasi3'],$_POST['bobotPresentasi4'],$_POST['bobotPresentasi5'],$_POST['bobotPresentasi6'],
				  $_POST['bobotTerstruktur1'],$_POST['bobotTerstruktur2'],$_POST['bobotTerstruktur3'],$_POST['bobotTerstruktur4'],$_POST['bobotTerstruktur5'],$_POST['bobotTerstruktur6'],
				  $_POST['bobotTambahan1'],$_POST['bobotTambahan2'],$_POST['bobotTambahan3'],$_POST['bobotTambahan4'],$_POST['bobotTambahan5'],$_POST['bobotTambahan6'],
				  $_POST['bobotUts1'],$_POST['bobotUts2'],$_POST['bobotUts3'],$_POST['bobotUts4'],$_POST['bobotUts5'],$_POST['bobotUts6'],
				  $_POST['bobotUas1'],$_POST['bobotUas2'],$_POST['bobotUas3'],$_POST['bobotUas4'],$_POST['bobotUas5'],$_POST['bobotUas6']
            );
            #$result = $app->DoUpdateBobotObe($paramsBobot, $klsId);  #tidak perlu update bobot kelas_dpna
			
            # Update Nilai
            $result = $app->DoUpdateNilai($arrKrsId, $_POST['nilai'], $semId, $_POST['niu'],$kodeProdi);
            
            // decrypt data yang telah di-encrypt
            for ($k=0; $k<count($_POST['cek']['krsdtId']); $k++)
               $_POST['cek']['krsdtId'][$k] = $cfg->Dec($_POST['cek']['krsdtId'][$k]);
            for ($k=0; $k<count($_POST['krsdt']); $k++)
               $_POST['krsdt'][$k] = $cfg->Dec($_POST['krsdt'][$k]);

			$result = $result && $app->DoUpdateDpna($_POST);
            $urlAdditional = '&sia=' . $_POST['sia'] . '&kelas=' . $_POST['kls'] . '&smt=' . $_POST['smt'] .'&pkk=' . $_POST['kodeProdi'];
            if ($result === false) {
               $urlAdditional .= '&err=' . $cfg->Enc($app->GetProperty("ProcessDosenError"));
            } else {
			   $urlAdditional .= '&proc=1';
			}
			$urlAdditional .= '&page='.$halaman_selanjutnya;
            header("Location: " . $cfg->GetURL('history_nilai_obe','grade_management','view') . $urlAdditional);
		 } else if (isset($_POST['btnNextSave'])) {
			// update nilai
			$halaman_selanjutnya = ($_POST['no_page']+1);
            $sia = $cfg->Dec($_POST['sia']);
            $app = new ProcessDosenObe($cfg, $security, $sia ) ;
            $arrKrsId = $_POST['krsdt'];
            foreach($_POST['krsdt'] as $key=>$value) {
               $arrKrsId[$key] = $cfg->Dec($value);
            }
            $semId = $cfg->Dec($_POST['smt']);
            $kodeProdi = $cfg->Dec($_POST['kodeProdi']);
            $klsId = $cfg->Dec($_POST['kls']);
			
			 # For update bobot nilai
            $paramsBobot = array(
				  $_POST['bobotHarian'],
				  $_POST['bobotMandiri'],
				  $_POST['bobotKelompok'],
				  $_POST['bobotPresentasi'],
				  $_POST['bobotTerstruktur'],
				  $_POST['bobotTambahan'],
				  $_POST['bobotUts'],
				  $_POST['bobotUas'], 
				  
				  $_POST['bobotCpmk1'],$_POST['bobotCpmk2'],$_POST['bobotCpmk3'],$_POST['bobotCpmk4'],$_POST['bobotCpmk5'],$_POST['bobotCpmk6'],
				  $_POST['bobotHarian1'],$_POST['bobotHarian2'],$_POST['bobotHarian3'],$_POST['bobotHarian4'],$_POST['bobotHarian5'],$_POST['bobotHarian6'],
				  $_POST['bobotMandiri1'],$_POST['bobotMandiri2'],$_POST['bobotMandiri3'],$_POST['bobotMandiri4'],$_POST['bobotMandiri5'],$_POST['bobotMandiri6'],
				  $_POST['bobotKelompok1'],$_POST['bobotKelompok2'],$_POST['bobotKelompok3'],$_POST['bobotKelompok4'],$_POST['bobotKelompok5'],$_POST['bobotKelompok6'],
				  $_POST['bobotPresentasi1'],$_POST['bobotPresentasi2'],$_POST['bobotPresentasi3'],$_POST['bobotPresentasi4'],$_POST['bobotPresentasi5'],$_POST['bobotPresentasi6'],
				  $_POST['bobotTerstruktur1'],$_POST['bobotTerstruktur2'],$_POST['bobotTerstruktur3'],$_POST['bobotTerstruktur4'],$_POST['bobotTerstruktur5'],$_POST['bobotTerstruktur6'],
				  $_POST['bobotTambahan1'],$_POST['bobotTambahan2'],$_POST['bobotTambahan3'],$_POST['bobotTambahan4'],$_POST['bobotTambahan5'],$_POST['bobotTambahan6'],
				  $_POST['bobotUts1'],$_POST['bobotUts2'],$_POST['bobotUts3'],$_POST['bobotUts4'],$_POST['bobotUts5'],$_POST['bobotUts6'],
				  $_POST['bobotUas1'],$_POST['bobotUas2'],$_POST['bobotUas3'],$_POST['bobotUas4'],$_POST['bobotUas5'],$_POST['bobotUas6']
            );
            #$result = $app->DoUpdateBobotObe($paramsBobot, $klsId);  #tidak perlu update bobot kelas_dpna
			
            # Update Nilai
            $result = $app->DoUpdateNilai($arrKrsId, $_POST['nilai'], $semId, $_POST['niu'],$kodeProdi);
            
            // decrypt data yang telah di-encrypt
            for ($k=0; $k<count($_POST['cek']['krsdtId']); $k++)
               $_POST['cek']['krsdtId'][$k] = $cfg->Dec($_POST['cek']['krsdtId'][$k]);
            for ($k=0; $k<count($_POST['krsdt']); $k++)
               $_POST['krsdt'][$k] = $cfg->Dec($_POST['krsdt'][$k]);

			$result = $result && $app->DoUpdateDpna($_POST);
            $urlAdditional = '&sia=' . $_POST['sia'] . '&kelas=' . $_POST['kls'] . '&smt=' . $_POST['smt'] .'&pkk=' . $_POST['kodeProdi'];
            if ($result === false) {
               $urlAdditional .= '&err=' . $cfg->Enc($app->GetProperty("ProcessDosenError"));
            } else {
			   $urlAdditional .= '&proc=1';
			}
			if($halaman_selanjutnya > $_POST['total_halaman']){
				$urlAdditional .= '&page=1';
				header("Location: " . $cfg->GetURL('history_nilai_obe','grade_management','view') . $urlAdditional);
			}else{
				$urlAdditional .= '&page='.$halaman_selanjutnya;
				header("Location: " . $cfg->GetURL('history_nilai_obe','grade_management','view') . $urlAdditional);
			}
		 } else if (isset($_POST['btnKembali'])) {
            // kembali ke pengelolaan nilai
            header("Location: " . $cfg->GetURL('history_nilai_obe','kelas_nilai','view') . $urlAdditional  . '&sem=' . $_POST['smt']);
         } else {
            header("Location: " . $cfg->GetURL('history_nilai_obe','kelas_nilai','view') . $urlAdditional  . '&sem=' . $_POST['smt']);
         }
       }else {
         // mata kuliah diampu
         header("Location: " . $cfg->GetURL('history_nilai_obe','kelas_nilai','view') . $urlAdditional  . '&sem=' . $_POST['smt']);
      }
      exit;
   } else {
      $security->DenyPageAccess();
   }
?>