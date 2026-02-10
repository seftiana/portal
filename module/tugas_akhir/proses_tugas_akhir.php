<?php
// Load Application Display Class
require_once $cfg->GetValue('app_proc') . 'display_base.class.php';
require_once $cfg->GetValue('app_proc') . 'display_base_full.class.php';
require_once $cfg->GetValue('app_proc') . 'process_base.class.php';
require_once $cfg->GetValue('app_service') . 'client/base_client.service.class.php';

// Load Module data Class
require_once $cfg->GetValue('app_module') . 'tugas_akhir/display/proses_tugas_akhir.class.php';
require_once $cfg->GetValue('app_module') . 'tugas_akhir/communication/tugas_akhir.service.class.php';

$ThisPageAccessRight = "MAHASISWA";
$security = new Security($cfg);
if (false !== $security->CheckAccessRight($ThisPageAccessRight)) {
   $ThisPageLinks = $security->mUserIdentity->GetProperty("Role");
   $lnk = new Links($cfg, $ThisPageLinks);

   $userId = $security->mUserIdentity->GetProperty("UserReferenceId");
   $userRole = $security->mUserIdentity->GetProperty("Role");

   unset($_SESSION['isFormValid'],$_SESSION['pesanFormValid']);
   $proses = new ProsesTugasAkhir($cfg, $security, $userId, $userRole);

   //cek apakah hapus
   $isCaseHapus = $cfg->dec($_GET['caseHapus']);
   if($isCaseHapus == 'ya'){
      $idHapus = $cfg->dec($_GET['id']);
      $proses->hapus($idHapus);
      header("Location: " . $cfg->GetURL('tugas_akhir','tugas_akhir','view'));
      exit;
   }

   if($_POST['opsiForm'] == 'tambah'){
      $cekValidForm = $proses->validasiForm($_POST);
      if($cekValidForm === FALSE){
         header("Location: " . $cfg->GetURL('tugas_akhir','add_tugas_akhir','view').'&opsiForm=tambah');
         exit;
      }
      $prosesInsert = $proses->insert($_POST);
      if($prosesInsert !== true){
         header("Location: " . $cfg->GetURL('tugas_akhir','add_tugas_akhir','view').'&opsiForm=tambah');
         exit;
      }else{
         header("Location: " . $cfg->GetURL('tugas_akhir','tugas_akhir','view'));
         exit;
      }
   }

   if($_POST['opsiForm'] == 'ubah'){
      $cekValidForm = $proses->validasiForm($_POST);
      if($cekValidForm === FALSE){
         header("Location: " . $cfg->GetURL('tugas_akhir','add_tugas_akhir','view').'&opsiForm=tambah');
         exit;
      }
      $prosesInsert = $proses->update($_POST);
      if($prosesInsert !== true){
         header("Location: " . $cfg->GetURL('tugas_akhir','add_tugas_akhir','view').'&opsiForm=tambah');
         exit;
      }else{
         header("Location: " . $cfg->GetURL('tugas_akhir','tugas_akhir','view'));
         exit;
      }
   }

}else{

}
?>