<?php

   // Load Application Display Class	   
   require_once $cfg->GetValue('app_proc') . 'process_base.class.php';   
   
   require_once $cfg->GetValue("app_service") . "client/base_client.service.class.php";
	require_once $cfg->GetValue("app_service") . "client/sia/sia_setting_client.service.class.php";
	require_once $cfg->GetValue("app_data") . "database_connected.class.php" ;
   // Load Module display Class
	require_once $cfg->GetValue("app_module") . "reference/business/reference.class.php" ; 
   require_once $cfg->GetValue('app_module') . 'schoolarship/display/process_schoolarship.class.php';
   require_once $cfg->GetValue("app_module") . "schoolarship/communication/schoolarship_client.service.class.php";
	require_once $cfg->GetValue("app_module") . "user/communication/user_client.service.class.php";
	require_once $cfg->GetValue("app_module") . "academic_report/communication/academic_report_client.service.class.php";
   

   $ThisPageAccessRight = "MAHASISWA | DOSEN";

   $security = new Security($cfg);

   if (false !== $security->CheckAccessRight($ThisPageAccessRight)) {
		$action = "";
      if (isset($_POST['btnBack']))
			$action = "view_beasiswa";
		elseif (isset ($_POST['btnDaftar']))
			$action = "validate";
		elseif (isset ($_POST['btnPendaftaran']))
			$action = "daftar";
      elseif (isset ($_POST['btnOrangTua']))
			$action = "viewTambahOrtu";
      elseif (isset ($_POST['btnSaudara']))
			$action = "viewTambahSaudara";
      elseif (isset ($_POST['act']))
			$action = $_POST['act'];
		
     
      if (isset($_GET['bea'])) {
         $beaId = $cfg->Dec($_GET['bea']); 
      }
      
			
		if ($action == "view_beasiswa") {
         /*view beasiswa*/
			header("Location: " . $cfg->GetURL('schoolarship','schoolarship','view'));
			exit;
         
		} elseif ($action == "validate") {
         /*validate*/
			if (isset($_POST['beasiswa'])){
				$beaId = $cfg->Dec($_POST['beasiswa']); 
				$app = new ProcessSchoolarship($cfg, $security, $security->mUserIdentity->mUserReferenceId,
					$security->mUserIdentity->mUserProdiId, $beaId, $security->mUserIdentity->mServerServiceAddress);
				if ($app->DoValidateSemesterMahasiswa() === false) {
					header("Location: " . $cfg->GetURL('schoolarship','schoolarship','view') . "&err=" .
						$cfg->Enc('semester'));
					exit;
				}
				if ($app->DoValidateIpkMahasiswa() === false) {
					header("Location: " . $cfg->GetURL('schoolarship','schoolarship','view') . "&err=" .
						$cfg->Enc('ipk'));
					exit;
				}
            //insert data pribadi
            $userServObj = new UserClientService($security->mUserIdentity->mServerServiceAddress, false, $security->mUserIdentity->mUserReferenceId);
            $userServObj->SetProperty('UserRole', $security->mUserIdentity->mRole);
            $dataUser = $userServObj->GetUserProfile();
            
            $isLulus = 'N';
            if ($dataUser[0]['status_mhs'] == "L") {
               $isLulus = 'Y';
            }
            if ($dataUser[0]['nomor_hp'] != "") {
               $noTelp = $dataUser[0]['nomor_hp'];
            } else {
               $noTelp = $dataUser[0]['nomor_telepon'];
            }
            $result = $app->InsertPribadi($dataUser[0]['kode_fakultas'], $dataUser[0]['kode_jurusan'], 
               $dataUser[0]['jenjang_pendidikan'], $isLulus, $dataUser[0]['nama'], $dataUser[0]['tempat_lahir'], 
               $dataUser[0]['tanggal_lahir'], $noTelp, $dataUser[0]['alamat_asal'], $dataUser[0]['alamat_di_kota_ini']);
            if ($result){
               //ngisi data orang tua ama data saudara
               header("Location: " . $cfg->GetURL('schoolarship','registration','schoolarship') . '&bea=' . $_POST['beasiswa']);
               exit;
            } else {
               header("Location: " . $cfg->GetURL('schoolarship','schoolarship','view') . '&err=' . $cfg->Enc('pribadi'));
               exit;
            }
			} else {
            header("Location: " . $cfg->GetURL('schoolarship','schoolarship','view') . "&err=" .
					$cfg->Enc('beasiswa'));
				exit;
         }
         
      } elseif ($action == "daftar") {
         /*pendaftaran*/
         $app = new ProcessSchoolarship($cfg, $security, $security->mUserIdentity->mUserReferenceId,
            $security->mUserIdentity->mUserProdiId, $beaId, $security->mUserIdentity->mServerServiceAddress);
         if ($app->DoValidatePendapatanOrtu() == false) {
            header("Location: " . $cfg->GetURL('schoolarship','schoolarship','view') . "&err=" .
						$cfg->Enc('pendapatan'));
            exit;
         }
         
         if ($app->DoValidateTanggunganOrtu() == false) {
            header("Location: " . $cfg->GetURL('schoolarship','schoolarship','view') . "&err=" .
						$cfg->Enc('tanggungan'));
            exit;
         }
         
         //masukkin data history studi
         $result = $app->InsertStudyHistory();
         if (!$result) {
            header("Location: " . $cfg->GetURL('schoolarship','schoolarship','view') . "&err=" .
						$cfg->Enc('history'));
            exit;
         }
         
         //masukkin data pendaftaran beasiswa
         $result = $app->DoApplyBeasiswa();
         if (!$result) {
            header("Location: " . $cfg->GetURL('schoolarship','schoolarship','view') . "&err=" .
						$cfg->Enc('beasiswa'));
            exit;
         } else {
            header("Location: " . $cfg->GetURL('schoolarship','schoolarship','view') . "&err=" .
						$cfg->Enc('pendaftaran berhasil'));
            exit;
         }
		} elseif ($action == "viewTambahOrtu") {
         /*view tambah ortu*/
         header("Location: " . $cfg->GetURL('schoolarship','orangtua','input') . "&bea=" . $_GET['bea']);
				exit;
            
      } elseif ($action == "viewTambahSaudara") {
         /*view tambah saudara*/
         header("Location: " . $cfg->GetURL('schoolarship','saudara','input') . "&bea=" . $_GET['bea']);
				exit;
            
      } elseif ($action == "insertSaudara") {
         /*insert saudara*/
         if ($_POST['btnTambah']) {
            if ($_POST['txtNamaSaudara'] == "" ) {
               header("Location: " . $cfg->GetURL('schoolarship','orangtua','input') . "&bea=" . $_GET['bea'] . 
                  "&err=" . $cfg->Enc('nama'));
               exit;
            }
            $app = new ProcessSchoolarship($cfg, $security, $security->mUserIdentity->mUserReferenceId,
                  $security->mUserIdentity->mUserProdiId, $beaId, $security->mUserIdentity->mServerServiceAddress);
            $result = $app->InsertSaudara($_POST['txtNamaSaudara'], $_POST['txtPekerjaanSaudara'], 
               $_POST['statusMenikah'], $_POST['statusKeluarga']);
            $err = "insertSaudara|";
            if ($result === false) {
               $err .= "gagal";
            } 
            header("Location: " . $cfg->GetURL('schoolarship','registration','schoolarship') . "&bea=" . $_GET['bea'] .
                  "&err=" . $cfg->Enc($err));
         } else {
            header("Location: " . $cfg->GetURL('schoolarship','registration','schoolarship') . "&bea=" . $_GET['bea']);
         }
            
      } elseif ($action == "updateSaudara") {
         /*update saudara*/
         if ($_POST['btnTambah']) {
            $app = new ProcessSchoolarship($cfg, $security, $security->mUserIdentity->mUserReferenceId,
                  $security->mUserIdentity->mUserProdiId, $beaId, $security->mUserIdentity->mServerServiceAddress);
                  
            $idSaudara = $cfg->Dec($_POST['saudara']);
            $result = $app->UpdateSaudara($idSaudara, $_POST['txtNamaSaudara'], $_POST['txtPekerjaanSaudara'], 
               $_POST['statusMenikah'], $_POST['statusKeluarga']);
            $err = "updateSaudara|";
            if ($result === false) {
               $err .= "gagal";
            } 
            header("Location: " . $cfg->GetURL('schoolarship','registration','schoolarship') . "&bea=" . $_GET['bea'] .
                  "&err=" . $cfg->Enc($err));
         } else {
            header("Location: " . $cfg->GetURL('schoolarship','registration','schoolarship') . "&bea=" . $_GET['bea']);
         }
         
      } elseif ($action == "insertOrtu") {
         /*insert orang tua*/
         if ($_POST['btnTambah']) {
            if ($_POST['txtNamaOrtu'] == "" ) {
               header("Location: " . $cfg->GetURL('schoolarship','orangtua','input') . "&bea=" . $_GET['bea'] . 
                  "&err=" . $cfg->Enc('nama'));
               exit;
            }
            if ($_POST['txtPekerjaanOrtu']== "") {
               header("Location: " . $cfg->GetURL('schoolarship','orangtua','input') . "&bea=" . $_GET['bea'] .
                  "&err=" . $cfg->Enc('pekerjaan'));
               exit;
            }
            $tanggal = "0000-00-00";
            if ($_POST['statusWali'] == "Y") {
               $tanggal = $_POST['tahun'] . '-' . $_POST['bulan'] . '-' . $_POST['tanggal'];
            }
            
            $app = new ProcessSchoolarship($cfg, $security, $security->mUserIdentity->mUserReferenceId,
                  $security->mUserIdentity->mUserProdiId, $beaId, $security->mUserIdentity->mServerServiceAddress);
            $result = $app->InsertOrangtua($_POST['txtNamaOrtu'], $_POST['txtPekerjaanOrtu'], $_POST['txtPenghasilan'], 
                  $_POST['statusWali'], $tanggal, $_POST['ketOrtu']);
            $err = "insertOrangtua|";
            if ($result === false) {
               $err .= "gagal";
            } 
            header("Location: " . $cfg->GetURL('schoolarship','registration','schoolarship') . "&bea=" . $_GET['bea'] .
                  "&err=" . $cfg->Enc($err));
         } else {
            header("Location: " . $cfg->GetURL('schoolarship','registration','schoolarship') . "&bea=" . $_GET['bea']);
         }
         
         exit;
         
      } elseif ($action == "updateOrtu") {
         /*update orang tua*/
         if ($_POST['btnTambah']) {
            if ($_POST['txtNamaOrtu'] == "" ) {
               header("Location: " . $cfg->GetURL('schoolarship','orangtua','input') . "&bea=" . $_GET['bea'] . 
                  "&ortu=" . $_POST['ortu'] . "&err=" . $cfg->Enc('nama'));
               exit;
            }
            if ($_POST['txtPekerjaanOrtu']== "") {
               header("Location: " . $cfg->GetURL('schoolarship','orangtua','input') . "&bea=" . $_GET['bea'] .
                  "&ortu=" . $_POST['ortu'] . "&err=" . $cfg->Enc('pekerjaan'));
               exit;
            }
            
            $app = new ProcessSchoolarship($cfg, $security, $security->mUserIdentity->mUserReferenceId,
                  $security->mUserIdentity->mUserProdiId, $beaId, $security->mUserIdentity->mServerServiceAddress);
            $idOrtu = $cfg->Dec($_POST['ortu']);
            $result = $app->UpdateOrangtua($idOrtu, $_POST['txtNamaOrtu'], $_POST['txtPekerjaanOrtu'], $_POST['txtPenghasilan'], 
                  $_POST['statusWali'], $_POST['tahun'] . '-' . $_POST['bulan'] . '-' . $_POST['tanggal'], $_POST['ketOrtu']);
            $err = "updateOrangtua|";
            if ($result === false) {
               $err .= "gagal";
            } 
            header("Location: " . $cfg->GetURL('schoolarship','registration','schoolarship') . "&bea=" . $_GET['bea'] .
                  "&err=" . $cfg->Enc($err));
         } else {
            header("Location: " . $cfg->GetURL('schoolarship','registration','schoolarship') . "&bea=" . $_GET['bea']);
         }
         exit;
      }
   } else { 
      $security->DenyPageAccess();
   }
?>