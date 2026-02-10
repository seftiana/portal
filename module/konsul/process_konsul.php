<?php

   // Load Application Display Class	   
   require_once $cfg->GetValue('app_proc') . 'process_base.class.php';   
   // Load Data Display Class
   require_once $cfg->GetValue('app_data') . 'database_connected.class.php';
   // Load service 
   require_once $cfg->GetValue("app_service") . "client/base_client.service.class.php";
   require_once $cfg->GetValue("app_service") . "client/sia/sia_setting_client.service.class.php";
   require_once $cfg->GetValue("app_module") . "user/communication/user_client.service.class.php" ;
   // Load Module display Class
   require_once $cfg->GetValue('app_module') . 'konsul/display/process_konsul.class.php';
   require_once $cfg->GetValue('app_module') . 'konsul/business/konsul.class.php';
   require_once 'function.php';

   $ThisPageAccessRight = "ADMINISTRASI | ADMINUNIT | MAHASISWA | DOSEN | KEPENDIDIKAN | UMUM | MAHASISWA_KBK | DOSEN_KBK";

   $security = new Security($cfg);

   if (false !== $security->CheckAccessRight($ThisPageAccessRight)) {
      $app = new ProcessKonsul($cfg);
      if (isset($_GET['act'])) {
         if ($cfg->dec($_GET['act']) == "hapus") {
            // menghapus pesan
            $msgType = $cfg->Dec($_GET['msgType']);
            $msgId = $cfg->Dec($_GET['msgId']);
            $jenis = '';
            if (isset($_GET['jenis']))
               $jenis = $cfg->Dec($_GET['jenis']);
            $result = $app->DeleteMessage($msgType, $jenis, $msgId);
            if (false === $result) {
               $errMsg = $cfg->Enc('delete|'.$app->GetProperty("ProcessMessageError"));
               $errType = $cfg->Enc('warning');
            } else {
               $errMsg = $cfg->Enc('delete|');
               $errType = $cfg->Enc('info');
            }
            header("Location: " . $cfg->GetURL('konsul','konsul','view') . '&msgType='. $cfg->Enc($msgType) . '&errMsg='. $errMsg . '&errType='. $errType);
            exit;
         }
      }

      if (isset($_POST['act'])) {
         if ($_POST['act'] == "Kembali") {
            // hanya redirect ke halaman compose konsul
            header("Location: " . $cfg->GetURL('konsul','konsul','view') . "&msgType=". $_POST['msgType']);
            exit;
         }elseif ($_POST['act'] == "Pesan Baru") {
            // hanya redirect ke halaman compose konsul
            header("Location: " . $cfg->GetURL('konsul','compose_konsul','view'));
            exit;
         }
         else if ($_POST['act'] == "doCompose") {
            if ($_POST['compBtn'] == "Kirim") {
               // mengirim pesan baru
               // $result = $app->AddMessage($_POST['data']);
			   $links = $cfg->GetURL('konsul','konsul','view');
               $result = $app->AddMessage($_POST['data'],$security->mUserIdentity->GetProperty("ServerServiceAddress"),$security->mUserIdentity->GetProperty("UserReferenceId"),$security->mUserIdentity->GetProperty("Role"),$links);
				if (false === $result) {
					// kalo pengiriman konsul gagal karena ada error
					$security->mUserIdentity->SetProperty("LastFormData",$_POST['data']);
					$security->RefreshSessionInfo();
					$errMsg = $cfg->Enc('compose|'.$app->GetProperty("ProcessMessageError"));
					$errType = $cfg->Enc('warning');
					if (isset($_GET['composeType']) AND isset($_GET['msgId']))
						// untuk reply atau forward
						header("Location: " . $cfg->GetURL('konsul','compose_konsul','view') . '&composeType='. $_GET['composeType'] . '&msgId='. $_GET['msgId'] . '&errMsg='. $errMsg . '&errType='. $errType);
					else
						// untuk compose saja
						header("Location: " . $cfg->GetURL('konsul','compose_konsul','view') . '&errMsg='. $errMsg . '&errType='. $errType);
					exit;
				}else {
					// berhasil mengirim konsul
					$errMsg = $cfg->Enc('compose|');
					$errType = $cfg->Enc('info');
					$msgType = $cfg->Enc('sent');
					$security->mUserIdentity->SetProperty("LastFormData",NULL);
					$security->RefreshSessionInfo();
					header("Location: " . $cfg->GetURL('konsul','konsul','view') . '&msgType='.$msgType.'&errMsg='. $errMsg . '&errType='. $errType);
					exit;
				}
            }
            else {
               // batal mengirim konsul
               $security->mUserIdentity->SetProperty("LastFormData",NULL);
               $security->RefreshSessionInfo();
               header("Location: " . $cfg->GetURL('konsul','konsul','view'));
               exit;
            }
         }
         else if ($_POST['act'] == "Balas") {
            //redirect ke halaman compose konsul dengan data terisi semua
            header("Location: " . $cfg->GetURL('konsul','compose_konsul','view') . '&composeType='. $cfg->Enc('Reply') . '&msgId='. $cfg->Enc($_POST['msgId']));
            exit;
         }
         else if ($_POST['act'] == "Teruskan") {
            //redirect ke halaman compose konsul dengan data terisi tanpa receiver
            header("Location: " . $cfg->GetURL('konsul','compose_konsul','view') . '&composeType='. $cfg->Enc('Forward') . '&msgId='. $cfg->Enc($_POST['msgId']));
            exit;
         }
         // proses penambahan address book dari halaman detail konsul
         else if ($_POST['act'] == "AddAddressBook") {
            $msgType = $cfg->Dec($_POST['msgType']);
            //cek apakah user udah ada atau blum
            $result = $app->ValidateIsAddressBookExist($_POST['pemilik'], $_POST['teman']);
            if(true === $result) {
               $errMsg = $cfg->Enc('validasi_tambah|'.$app->GetProperty("ProcessMessageError"));
               $errType = $cfg->Enc('warning');
            }
            else {
               $result = $app->AddToAddressBook($_POST['pemilik'], $_POST['teman']);
               if (false === $result) {
                  $errMsg = $cfg->Enc('tambah|'.$app->GetProperty("ProcessMessageError"));
                  $errType = $cfg->Enc('warning');
               } else {
                  $errMsg = $cfg->Enc('tambah|');;
                  $errType = $cfg->Enc('info');
               }
            }
            header("Location: " . $cfg->GetURL('konsul','detail_message','view') . '&msgId='. $cfg->Enc($_POST['msgId']) . '&msgType='. $cfg->Enc($msgType) . '&errAddrBook='. $errMsg . '&errType='. $errType);
            exit;
         }
         else if ($_POST['act'] == 'deleteAddrBook') {
            $result = $app->DeleteAddressBook($_POST['data']);
            if (false === $result) {
               $errMsg = $cfg->Enc('delete|'.$app->GetProperty("ProcessMessageError"));
               $errType = $cfg->Enc('warning');
            } else {
               $errMsg = $cfg->Enc('delete|');
               $errType = $cfg->Enc('info');
            }
            header("Location: " . $cfg->GetURL('konsul','address_book','popup') . '&niuPemilik='. $cfg->Enc($_POST['data']['MessageReceiver']) . '&errMsg='. $errMsg . '&errType='. $errType);
            exit;
         }
         // proses penambahan address book dari halaman pencarian user khusus untuk nambah address book
         else if ($_POST['act'] == 'AddtoAddressBook') {
            $result = $app->ValidateIsAddressBookExist($_POST['pemilik'], $_POST['teman']);
            if(true === $result) {
               $errMsg = $cfg->Enc('validasi_tambah|'.$app->GetProperty("ProcessMessageError"));
               $errType = $cfg->Enc('warning');
            }
            else {
               $result = $app->AddToAddressBook($_POST['pemilik'], $_POST['teman']);
               if (false === $result) {
                  $errMsg = $cfg->Enc('tambah|'.$app->GetProperty("ProcessMessageError"));
                  $errType = $cfg->Enc('warning');
               } else {
                  $errMsg = $cfg->Enc('tambah|');;
                  $errType = $cfg->Enc('info');
               }
            }
            header("Location: " . $cfg->GetURL('konsul','address_book','popup') . '&niuPemilik='. $cfg->Enc($_POST['pemilik']) . '&errMsg='. $errMsg . '&errType='. $errType);
            exit;
         }
      }
   }
   else {
      $security->DenyPageAccess();
   }
?>