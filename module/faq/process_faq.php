<?php

   // Load Application Display Class      
   require_once $cfg->GetValue('app_proc') . 'process_base.class.php';   

   // Load Data Display Class
   require_once $cfg->GetValue('app_data') . 'database_connected.class.php';

   // Load Module display Class
   require_once $cfg->GetValue('app_module') . 'faq/display/process_faq.class.php';
   require_once $cfg->GetValue('app_module') . 'faq/business/faq.class.php';

   $ThisPageAccessRight = "ADMINISTRASI";

   $security = new Security($cfg);

   if (false !== $security->CheckAccessRight($ThisPageAccessRight)) {
      $app = new ProcessFaq($cfg, $security);
      if (isset ($_POST['act'])) {
         $action = $_POST['act'];
      } elseif (isset ($_GET['act'])) {
         $action = $cfg->Dec($_GET['act']);
      }
      
      if($action == 'ViewAddFaq') {
         if(isset($_POST['btnKembali'])) {
            header("Location: " . $cfg->GetURL('faq', 'faq_kategori', 'view'));
            exit();
         }
         else{
            $KatId = $cfg->Dec($_GET['katId']);
            header("Location: " . $cfg->GetURL('faq', 'faq', 'add'). '&KatId=' . $cfg->Enc($KatId));
            exit();
         }
      } elseif($action == 'TambahFaq') {
         if(isset($_POST['btnBatal'])) {
            header("Location: " . $cfg->GetURL('faq', 'faq_admin', 'view') . '&katid=' . $cfg->Enc($_GET['katid']));
            exit();
         }
         else{
				//validasi
				$errMsg = "";
				if (empty($_POST['TxtPertanyaan'])){
					$errMsg = 'Pertanyaan tidak boleh kosong.';
				}else if (empty($_POST['TxtJawaban'])){
					$errMsg = 'Jawaban tidak boleh kosong.';
				} else if (empty($_POST['tujuan'])){
					$errMsg = 'Harap masukkan pilihan tujuan.';
				}
				if ($errMsg != "") {
					$tErrMsg = 'warning';
               header("Location: " . $cfg->GetURL('faq', 'faq', 'add') . '&KatId=' . $_POST['katid'] . '&errMsg=' . $cfg->Enc($errMsg) . '&tErrMsg=' . $cfg->Enc($tErrMsg));
               exit();
				}
				
				// proses
				$ktgr = $cfg->Dec($_POST['katid']);
				$result = $app->AddFaq($_POST['TxtPertanyaan'], $_POST['TxtJawaban'], $ktgr, $_POST['tujuan']);
            if(false === $result) {
               //$errMsg = $app->ComposeErrorMessage('Proses tambah data FAQ tidak berhasil', $app->GetProperty("FaqErrorMessage"));
               $errMsg = 'Proses tambah data FAQ tidak berhasil';
               $tErrMsg = 'warning';
               header("Location: " . $cfg->GetURL('faq', 'faq_admin', 'view') . '&katid=' . $_POST['katid'] . '&errMsg=' . $cfg->Enc($errMsg) . '&tErrMsg=' . $cfg->Enc($tErrMsg));
               exit();
            } else {
               $errMsg = 'Proses tambah FAQ berhasil';
               $tErrMsg = 'info';
               header("Location: " . $cfg->GetURL('faq', 'faq_admin', 'view') . '&katid=' . $_POST['katid'] . '&errMsg=' . $cfg->Enc($errMsg) . '&tErrMsg=' . $cfg->Enc($tErrMsg));
               exit();
            }
         }
      } elseif($action == 'HapusFaq') {
         $FaqId = $cfg->Dec($_GET['id']);
         $result = $app->DeleteFaq($FaqId);
         if(false === $result) {
            //$errMsg = $app->ComposeErrorMessage('Proses hapus data FAQ tidak berhasil', $app->GetProperty("FaqErrorMessage"));
            $errMsg = 'Proses hapus data FAQ tidak berhasil';
            $tErrMsg = 'warning';
            header("Location: " . $cfg->GetURL('faq', 'faq_admin', 'view') . '&katid=' . $_GET['katId'] . '&errMsg=' . $cfg->Enc($errMsg)  . '&tErrMsg=' . $cfg->Enc($tErrMsg));
            exit();
         } else {
            $errMsg = 'Proses hapus data FAQ berhasil';
            $tErrMsg = 'info';
            header("Location: " . $cfg->GetURL('faq', 'faq_admin', 'view') . '&katid=' . $_GET['katId'] . '&errMsg=' . $cfg->Enc($errMsg) . '&tErrMsg=' . $cfg->Enc($tErrMsg));
            exit();
         }
      } elseif($action == 'EditFaq') {
			if(isset($_POST['btnBatal'])) {
            header("Location: " . $cfg->GetURL('faq', 'faq_admin', 'view') . '&katid=' . $_GET['katid']);
            exit();
         }else{
				//validasi
				$errMsg = "";
				if (empty($_POST['TxtPertanyaan'])){
					$errMsg = 'Pertanyaan tidak boleh kosong.';
				}else if (empty($_POST['TxtJawaban'])){
					$errMsg = 'Jawaban tidak boleh kosong.';
				} else if (empty($_POST['tujuan'])){
					$errMsg = 'Harap masukkan pilihan tujuan.';
				}
				if ($errMsg != "") {
					$tErrMsg = 'warning';
					header("Location: " . $cfg->GetURL('faq', 'faq', 'add') . '&KatId=' . $_POST['katid'] . '&errMsg=' . $cfg->Enc($errMsg) . '&tErrMsg=' . $cfg->Enc($tErrMsg));
					exit();
				}

				$faqId = $cfg->Dec($_POST['fid']);
				$ktgr = $cfg->Dec($_POST['katid']);
				$result = $app->UpdateFaq($faqId,$_POST['TxtPertanyaan'], $_POST['TxtJawaban'], $ktgr, $_POST['tujuan']);
				if(false === $result) {
					$errMsg = $app->ComposeErrorMessage('Proses ubah data FAQ tidak berhasil', $app->GetProperty("ErrorMessage"));
					$tErrMsg = 'warning';
					header("Location: " . $cfg->GetURL('faq', 'faq_admin', 'view') . '&katid=' . $_GET['katid'] . '&errMsg=' . $cfg->Enc($errMsg) . '&tErrMsg=' . $cfg->Enc($tErrMsg));
					exit();
				} else {
					$errMsg = 'Proses ubah FAQ berhasil';
					$tErrMsg = 'info';
					header("Location: " . $cfg->GetURL('faq', 'faq_admin', 'view') . '&katid=' . $_GET['katid'] . '&errMsg=' . $cfg->Enc($errMsg) . '&tErrMsg=' . $cfg->Enc($tErrMsg));
					exit();
				}  
         }
      } elseif($action == 'DoAddFaqKategori'){
         $result = $app->AddKategoriItem($_POST['Nama'], $_POST['Keterangan']);
         if(false === $result) {
            $errMsg = 'Proses tambah data kategori FAQ tidak berhasil';
            $tErrMsg = 'warning';
            header("Location: " . $cfg->GetURL('faq', 'faq_kategori', 'view') . '&errMsg=' . $cfg->Enc($errMsg)  . '&tErrMsg=' . $cfg->Enc($tErrMsg));
            exit();
         }
         else {
            $errMsg = 'Proses tambah kategori FAQ berhasil';
            $tErrMsg = 'info';
            header("Location: " . $cfg->GetURL('faq', 'faq_kategori', 'view') . '&err=' . '&errMsg=' . $cfg->Enc($errMsg)  . '&tErrMsg=' . $cfg->Enc($tErrMsg));
            exit();
         }
      } elseif($action == 'UbahKategori') {
            header("Location: " . $cfg->GetURL('faq', 'faq_kategori', 'update') . '&katid=' . $_GET['katid']);
            exit();
      } elseif($action == 'HapusKategori') {
			$FaqKategoriId = $cfg->Dec($_GET['katid']);
			$result = $app->DoDeleteFaqKategori($FaqKategoriId);
			if(false === $result) {
				$errMsg = 'Proses hapus data kategori FAQ tidak berhasil';
				$tErrMsg = 'warning';
				header("Location: " . $cfg->GetURL('faq', 'faq_kategori', 'view') . '&errMsg=' . $cfg->Enc($errMsg)  . '&tErrMsg=' . $cfg->Enc($tErrMsg));
				exit();
			} else {
				$errMsg = 'Proses hapus data kategori FAQ berhasil';
				$tErrMsg = 'info';
				header("Location: " . $cfg->GetURL('faq', 'faq_kategori', 'view') . '&errMsg=' . $cfg->Enc($errMsg) . '&tErrMsg=' . $cfg->Enc($tErrMsg));
				exit();
			}
		} elseif($action == 'DoUpdateFaqKategori') {
         if(isset($_POST['btnBatal'])) {
            header("Location: " . $cfg->GetURL('faq', 'faq_kategori', 'view'));
            exit();
         }else{
               $id = $cfg->Dec($_POST['katid']);
               $result = $app->UpdateFaqKategori($id,$_POST['TxtNama'], $_POST['TxtKeterangan']);
               if(false === $result) {
                  $errMsg = $app->ComposeErrorMessage('Proses ubah data kategori FAQ tidak berhasil', $app->GetProperty("FaqErrorMessage"));
                  $tErrMsg = 'warning';
                  header("Location: " . $cfg->GetURL('faq', 'update_faq_kategori', 'view') . '&errMsg=' . $cfg->Enc($errMsg)  . '&tErrMsg=' . $cfg->Enc($tErrMsg));
                  exit();
               } else {
                  $errMsg = 'Proses ubah kategori FAQ berhasil';
                  $tErrMsg = 'info';
                  header("Location: " . $cfg->GetURL('faq', 'faq_kategori', 'view') . '&errMsg=' . $cfg->Enc($errMsg) . '&tErrMsg=' . $cfg->Enc($tErrMsg));
                  exit();
               }  
         }
      }

   
   }
   else{
      $security->DenyPageAccess();
   }
   
?>