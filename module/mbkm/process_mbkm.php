<?php

   // Load Application Display Class	   
   require_once $cfg->GetValue('app_proc') . 'process_base.class.php';   

   // Load Data Display Class
   require_once $cfg->GetValue('app_data') . 'database_connected.class.php';

   // Load Module display Class
   require_once $cfg->GetValue('app_module') . 'mbkm/display/process_mbkm.class.php';
   
   #service soap ke akademik#
   require_once $cfg->GetValue("app_service") . "client/base_client.service.class.php"; 
   require_once $cfg->GetValue("app_service") . "client/sia/sia_setting_client.service.class.php";
   require_once $cfg->GetValue("app_module") . "dosen/communication/dosen_client.service.class.php" ;
   ##end####
   

	$ThisPageAccessRight = "MAHASISWA | DOSEN | ADMINISTRASI | ADMINUNIT";

	$security = new Security($cfg);
   
	#seting services
	$userId = $security->mUserIdentity->GetProperty("UserReferenceId");
	$prodiId = $security->mUserIdentity->GetProperty("UserProdiId");
	$serverUsed = $security->mUserIdentity->GetProperty("ServerServiceAddress");		
	$objDosenService = new DosenClientService($serverUsed, false, $userId, $prodiId);
	##
	
	if (false !== $security->CheckAccessRight($ThisPageAccessRight)) {
		$app = new ProcessMbkm($cfg);   
		if (isset ($_POST['act'])) {
			$action = $_POST['act'];
		} elseif (isset ($_GET['act'])) {
			$action = $cfg->Dec($_GET['act']);
		}
		if($action == 'ViewAddMbkm') {
			header("Location: " . $cfg->GetURL('mbkm', 'mbkm', 'add'));
			exit();
		}elseif($action == 'DoAddMbkm'){
			if(isset($_POST['btnCancel'])){
				header("Location: " . $cfg->GetURL('mbkm', 'mbkm', 'view'));
				exit();
			}
			$_POST['data']['Tanggal'] = $_POST['data']['tahun'].'-'.$_POST['data']['bulan'].'-'.$_POST['data']['hari'];
			if(empty($_POST['data']['Kegiatan'])) {
				$errMsg = 'Data tanggal dan kegiatan harus diisi';
				header("Location: " . $cfg->GetURL('mbkm', 'mbkm', 'add') . '&errMsg=' . $cfg->Enc($errMsg).'&tanggal='.$_POST['data']['Tanggal']);
				exit();
			}else{
		
				$result = $objDosenService->InsertMbkm($_POST['data']['Tanggal'],$_POST['data']['IDUser'], $_POST['data']['Kegiatan']);
				
				if(false === $result) {
					$errMsg = 'Proses tambah laporan mbkm tidak berhasil';
					header("Location: " . $cfg->GetURL('mbkm', 'mbkm', 'add') . '&errMsg=' . $cfg->Enc($errMsg));
					exit();
				} else {
					$errMsg = 'Proses tambah laporan mbkm berhasil';
					$tErrMsg = 'info';
					header("Location: " . $cfg->GetURL('mbkm', 'mbkm', 'view') . '&errMsg=' . $cfg->Enc($errMsg) . '&tErrMsg=' . $cfg->Enc($tErrMsg));
					exit();
				}
			}
		}elseif($action == 'DoDeleteMbkm') {
            $id = $cfg->Dec($_GET['id']);
   
            $result = $objDosenService->DeleteMbkm($id);
            if(false === $result) {
               $errMsg = 'Proses hapus laporan mbkm tidak berhasil';
               $tErrMsg = 'warning';
               header("Location: " . $cfg->GetURL('mbkm', 'mbkm', 'view') . '&errMsg=' . $cfg->Enc($errMsg)  . '&tErrMsg=' . $cfg->Enc($tErrMsg));
               exit();
            }else {
               $errMsg = 'Proses hapus laporan mbkm berhasil';
               $tErrMsg = 'info';
               header("Location: " . $cfg->GetURL('mbkm', 'mbkm', 'view') . '&errMsg=' . $cfg->Enc($errMsg) . '&tErrMsg=' . $cfg->Enc($tErrMsg));
               exit();
            }
		}elseif($action == 'DoUpdateMbkm') {
			if(isset($_POST['btnCancel'])) {
				header("Location: " . $cfg->GetURL('mbkm', 'mbkm', 'view'));
				exit();
			}
			$_POST['data']['Tanggal'] = $_POST['data']['tahun'].'-'.$_POST['data']['bulan'].'-'.$_POST['data']['hari'];
			if(empty($_POST['data']['Kegiatan'])) {
				$errMsg = 'Data kegiatan harus diisi';
				header("Location: " . $cfg->GetURL('mbkm', 'mbkm', 'update') . '&errMsg=' . $cfg->Enc($errMsg).'&id='.$cfg->Dec($_POST['data']['AnnouncementId']));
				exit();
			} else {
				$_POST['data']['AnnouncementId'] = $cfg->Dec($_POST['data']['AnnouncementId']);

				$result = $objDosenService->UpdateMbkm($_POST['data']['Tanggal'],$_POST['data']['Kegiatan'],$_POST['data']['AnnouncementId']);
				if(false === $result) {
					$errMsg = 'Proses ubah mbkm tidak berhasil';
					header("Location: " . $cfg->GetURL('mbkm', 'mbkm', 'update') . '&errMsg=' . $cfg->Enc($errMsg).'&id='.$cfg->Dec($_POST['data']['AnnouncementId']));
					exit();
				} else {
					$errMsg = 'Proses ubah mbkm berhasil';
					$tErrMsg = 'info';
					header("Location: " . $cfg->GetURL('mbkm', 'mbkm', 'view') . '&errMsg=' . $cfg->Enc($errMsg) . '&tErrMsg=' . $cfg->Enc($tErrMsg));
					exit();
				}
			}
		}elseif($action == 'DoUpdateKomentarMbkm') {
			if(isset($_POST['btnCancel'])) {
				header("Location: " . $cfg->GetURL('mbkm', 'mbkm', 'view') . '&cari='.$cfg->Enc($_POST['cari']) );
				exit();
			}
			if(empty($_POST['data']['Komentar']) ) {
				$errMsg = 'Data komentar harus diisi';
				header("Location: " . $cfg->GetURL('mbkm', 'mbkm', 'update_komentar') . '&errMsg=' . $cfg->Enc($errMsg).'&id='.$cfg->Dec($_POST['data']['AnnouncementId']) . '&cari='.$cfg->Enc($_POST['cari']) );
				exit();
			} else {
				$_POST['data']['AnnouncementId'] = $cfg->Dec($_POST['data']['AnnouncementId']);
				$result = $objDosenService->UpdateKomentarMbkm($_POST['data']['Komentar'],$_POST['data']['AnnouncementId']);
				if(false === $result) {
					$errMsg = 'Proses komentar mbkm tidak berhasil';
					header("Location: " . $cfg->GetURL('mbkm', 'mbkm', 'update') . '&errMsg=' . $cfg->Enc($errMsg).'&id='.$cfg->Dec($_POST['data']['AnnouncementId']) . '&cari='.$cfg->Enc($_POST['cari']) );
					exit();
				} else {
					$errMsg = 'Proses komentar mbkm berhasil';
					$tErrMsg = 'info';
					header("Location: " . $cfg->GetURL('mbkm', 'mbkm', 'view') . '&errMsg=' . $cfg->Enc($errMsg) . '&tErrMsg=' . $cfg->Enc($tErrMsg) . '&cari='.$cfg->Enc($_POST['cari']) );
					exit();
				}
			}
		} else {
			header("Location: " . $cfg->GetURL('mbkm', 'mbkm', 'view'));
			exit();
		}      
	} else {
      $security->DenyPageAccess();
	}
?>
