<?php   
   require_once $cfg->GetValue('app_proc') . 'process_base.class.php';   
   
   require_once $cfg->GetValue("app_service") . "client/base_client.service.class.php";
   require_once $cfg->GetValue("app_service") . "client/sia/sia_setting_client.service.class.php";
   
   require_once $cfg->GetValue("app_module") . "dosen/display/process_dosen.class.php" ;  
   require_once $cfg->GetValue("app_module") . "dosen/communication/dosen_client.service.class.php" ;   

   $ThisPageAccessRight = "DOSEN";
   $security = new Security($cfg);
//echo'<pre>';print_r($_POST);die;
   if (false !== $security->CheckAccessRight($ThisPageAccessRight)) {
      $urlAdditional = '&sia=' . $_POST['sia'];
      
      if(isset($_POST['action']) AND  $_POST['action'] == 'viewMatKulDiampuFromNilai') {
         // pengelolaan nilai
         //dirtyHack sori
         $urlAdditional .= '&from=' . $cfg->Enc('nilai') ;
         if(isset($_POST['btnLihat'])) {
            // lihat nilai 
            header("Location: " . $cfg->GetURL('dosen','course_supported','view') . $urlAdditional . '&sem=' . $_POST['lstSemester']);
         } else if (isset($_POST['btnUbah'])) {
            // update nilai
            $sia = $cfg->Dec($_POST['sia']);
            $app = new ProcessDosen($cfg, $security, $sia ) ;
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
                           );
            $result = $app->DoUpdateBobot($paramsBobot, $klsId);            

            # Update Nilai
            $result = $result && $app->DoUpdateNilai($arrKrsId, $_POST['nilai'], $_POST['mhstambahan'], $semId, $_POST['niu'],$kodeProdi);
            
            // decrypt data yang telah di-encrypt
            for ($k=0; $k<count($_POST['cek']['krsdtId']); $k++)
               $_POST['cek']['krsdtId'][$k] = $cfg->Dec($_POST['cek']['krsdtId'][$k]);
            for ($k=0; $k<count($_POST['krsdt']); $k++)
               $_POST['krsdt'][$k] = $cfg->Dec($_POST['krsdt'][$k]);

			$rDpna = $app->DoUpdateDpna($_POST);
            $urlAdditional = '&sia=' . $_POST['sia'] . '&kelas=' . $_POST['kls'] . '&smt=' . $_POST['smt'] .'&pkk=' . $_POST['kodeProdi'];
            if ($result === false) {
               $urlAdditional .= '&err=' . $cfg->Enc($app->GetProperty("ProcessDosenError"));
            } else {
			   $urlAdditional .= '&proc=1';
			}

            header("Location: " . $cfg->GetURL('history_nilai_dosen','grade_management','view') . $urlAdditional);
         } else if (isset($_POST['btnKembali'])) {
            // kembali ke pengelolaan nilai
            header("Location: " . $cfg->GetURL('history_nilai_dosen','kelas_nilai','view') . $urlAdditional  . '&sem=' . $_POST['smt']);
         } else {
            header("Location: " . $cfg->GetURL('history_nilai_dosen','kelas_nilai','view') . $urlAdditional);
         }
       }else {
         // mata kuliah diampu
         header("Location: " . $cfg->GetURL('history_nilai_dosen','kelas_nilai','view') . $urlAdditional);
      }
      exit;
   } else {
      $security->DenyPageAccess();
   }
?>