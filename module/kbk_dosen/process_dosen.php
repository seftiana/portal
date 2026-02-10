<?php   
   require_once $cfg->GetValue('app_proc') . 'process_base.class.php';   
   
   require_once $cfg->GetValue("app_service") . "client/base_client.service.class.php";
   require_once $cfg->GetValue("app_service") . "client/sia/sia_setting_client.service.class.php";
   
   require_once $cfg->GetValue("app_module") . "kbk_dosen/display/process_dosen.class.php" ;  
   require_once $cfg->GetValue("app_module") . "kbk_dosen/communication/dosen_client.service.class.php" ;   

   $ThisPageAccessRight = "DOSEN_KBK";
   $security = new Security($cfg);

   if (false !== $security->CheckAccessRight($ThisPageAccessRight)) {
      $urlAdditional = '&sia=' . $_POST['sia'];
      
      if(isset($_POST['action']) AND  $_POST['action'] == 'viewMatKulDiampuFromNilai') {
         // pengelolaan nilai
         //dirtyHack sori
         $urlAdditional .= '&from=' . $cfg->Enc('nilai') ;
         if(isset($_POST['btnLihat'])) {
            // lihat nilai 
            header("Location: " . $cfg->GetURL('kbk_dosen','course_supported','view') . $urlAdditional . '&sem=' . $_POST['lstSemester']);
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
            $result = $app->DoUpdateNilai($arrKrsId, $_POST['nilai'], $_POST['mhstambahan'], $semId, $_POST['niu'],$kodeProdi);
            
            // decrypt data yang telah di-encrypt
            for ($k=0; $k<count($_POST['cek']['krsdtId']); $k++)
               $_POST['cek']['krsdtId'][$k] = $cfg->Dec($_POST['cek']['krsdtId'][$k]);
            for ($k=0; $k<count($_POST['krsdt']); $k++)
               $_POST['krsdt'][$k] = $cfg->Dec($_POST['krsdt'][$k]);

			//$rDpna = $app->DoUpdateDpna($_POST); # input dpna di portal tidak digunakan di bispro KBK
            $urlAdditional = '&sia=' . $_POST['sia'] . '&kelas=' . $_POST['kls'] . '&smt=' . $_POST['smt'];
            if ($result === false) {
               $urlAdditional .= '&err=' . $cfg->Enc($app->GetProperty("ProcessDosenError"));
            } else {
			   $urlAdditional .= '&proc=1';
			   }

            header("Location: " . $cfg->GetURL('kbk_dosen','grade_management','view') . $urlAdditional);
         } else if (isset($_POST['btnKembali'])) {
            // kembali ke pengelolaan nilai
            header("Location: " . $cfg->GetURL('kbk_dosen','course_supported','view') . $urlAdditional  . '&sem=' . $_POST['smt']);
         } else if (isset($_POST['btnImportExcel'])) {
            //redirect ke template excel            
            header("Location: " . $cfg->GetURL('kbk_dosen','grade_management_excel','view') . $urlAdditional.'&sem='. $_POST['smt']."&kls=".$_POST['kls']."&sia=".$_POST['sia']);
         } else {
            header("Location: " . $cfg->GetURL('kbk_dosen','course_supported','view') . $urlAdditional);
         }
      } elseif(isset($_POST['kwm']) or isset($_POST['availableTime'])){
			$mod=$cfg->Dec($_POST['module']);
			$mod=explode('|',$mod);
			if (isset($_POST['btnProses'])) {
				if($_POST['btnProses'] == 'Hapus'){
					$sia = $security->mUserIdentity->GetProperty('ServerServiceAddress');
					$app = new ProcessDosen($cfg, $security, $sia ) ;
					foreach($_POST['availableTime'] as $k=>$val)$_POST['availableTime'][$k] = $cfg->Dec($val);
					$result = $app->deleteKesediaanWaktuMengajar($_POST['availableTime']);
					$mod = array('kbk_dosen','kesediaan_waktu_mengajar','view');
				}elseif($_POST['btnProses'] == 'Simpan'){
					$sia = $cfg->Dec($_POST['value']);
					$_POST['kwm'] = $cfg->Dec($_POST['kwm']);
					$app = new ProcessDosen($cfg, $security, $sia ) ;
					$result = $app->prosesKesediaanWaktuMengajar($_POST);
				}
				if ($result === false) {
				   $urlAdditional .= '&err=' . $cfg->Enc($app->GetProperty("ProcessDosenError"));
				} else {
				   $urlAdditional .= '&proc=1';
				}

				header("Location: " . $cfg->GetURL($mod[0],$mod[1],$mod[2]) . $urlAdditional);
			} else {
				header("Location: " . $cfg->GetURL($mod[0],$mod[1],$mod[2]));
			}
	  } else {
         // mata kuliah diampu
         header("Location: " . $cfg->GetURL('kbk_dosen','course_supported','view') . $urlAdditional);
      }
      exit;
   } else {
      $security->DenyPageAccess();
   }
?>