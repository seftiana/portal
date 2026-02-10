<?php
   require_once $cfg->GetValue("app_proc") . "process_base.class.php" ;
   require_once $cfg->GetValue("app_service") . "client/base_client.service.class.php";
   
   // Load module class
   require_once $cfg->GetValue("app_module") . "perpustakaan/communication/perpustakaan_client.service.class.php" ;
   require_once $cfg->GetValue("app_module") . "perpustakaan/display/process_perpustakaan.class.php" ;  
   
   $ThisPageAccessRight = "MAHASISWA | DOSEN";

   $security = new Security($cfg);

   if (false !== $security->CheckAccessRight($ThisPageAccessRight)) {
      $action = "";
      if (isset($_POST['act'])){
         $action = $_POST['act'];
      } else if (isset($_GET['act'])){
         $action = $cfg->Dec($_GET['act']);
      }
      
      
      if ($action == 'view') {
         header("Location: " . $cfg->GetURL('perpustakaan','perpustakaan_home','view') . '&serv=' . $_POST['perpus'] .
                     '&view=' . $cfg->Enc('view'));
      } else if ($action == 'carikatalog') {
         $urlAdditional = "";
         if (isset($_POST['next'])){
            $urlAdditional = '&next=' . $_POST['next'];
         }
         header("Location: " . $cfg->GetURL('perpustakaan','perpustakaan_home','view') . '&serv=' . $_POST['perpusserv'] .
                     '&view=' . $cfg->Enc('pesan') . '&cari=' . $cfg->Enc($_POST['cari']) . $urlAdditional);
      } else if ($action == 'pesanbuku') {
         $serviceAddress = $cfg->Dec($_GET['serv']);
         $app = new ProcessPerpustakaan($cfg, $security, $serviceAddress);
         $result = $app->DoPesanBuku($cfg->Dec($_GET['buku']));
         $urlAdditional = "";

         if ($result !== false) {
            $urlAdditional = '&inf=' . $cfg->Enc('Pemesanan buku berhasil')   ;
         } else {
            $urlAdditional = '&err=' . $cfg->Enc('Pemesanan buku gagal');
         }
         header("Location: " . $cfg->GetURL('perpustakaan','perpustakaan_home','view') . '&serv=' . $_GET['serv'] .
                     '&view=' . $cfg->Enc('pesan') . $urlAdditional );
      }  
      
      exit;
   } else {
      $security->DenyPageAccess();
   }
?>