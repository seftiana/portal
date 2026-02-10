<?php
/*
Author : Nikolius
Email : n1colius.lau@gmail.com
Date : 6/6/2014 5:26:43 PM
*/
// Load Application Display Class
require_once $cfg->GetValue('app_proc') . 'display_base.class.php';
require_once $cfg->GetValue('app_proc') . 'display_base_full.class.php';
require_once $cfg->GetValue('app_proc') . 'process_base.class.php';
require_once $cfg->GetValue('app_service') . 'client/base_client.service.class.php';

// Load Module data Class
require_once $cfg->GetValue('app_module') . 'pengajuan_cuti/display/proses_pengajuan_cuti.class.php';
require_once $cfg->GetValue('app_module') . 'pengajuan_cuti/communication/pengajuan_cuti.service.class.php';

$ThisPageAccessRight = "MAHASISWA";
$security = new Security($cfg);
if (false !== $security->CheckAccessRight($ThisPageAccessRight)) {
   $ThisPageLinks = $security->mUserIdentity->GetProperty("Role");
   $lnk = new Links($cfg, $ThisPageLinks);

   $userId = $security->mUserIdentity->GetProperty("UserReferenceId");
   $userRole = $security->mUserIdentity->GetProperty("Role");

   $proses = new ProsesPengajuanCuti($cfg, $security, $userId, $userRole);

   //cek apakah hapus
   $isCaseHapus = $cfg->dec($_GET['caseHapus']);
   if($isCaseHapus == 'ya'){
      $idHapus = $cfg->dec($_GET['id']);
      $proses->hapusPengajuanCuti($idHapus);
      header("Location: " . $cfg->GetURL('pengajuan_cuti','pengajuan_cuti','view'));
      exit;
   }

   if($_POST['opsiForm'] == 'tambah'){
      $cekValidForm = $proses->validasiForm($_POST);
      if($cekValidForm === FALSE){
         header("Location: " . $cfg->GetURL('pengajuan_cuti','add_pengajuan','view').'&opsiForm=tambah');
         exit;
      }
      $prosesInsert = $proses->insertPengajuanCuti($_POST);
      if($prosesInsert === FALSE){
         $_SESSION['isFormValid'] = 'tidak';
         $_SESSION['pesanFormValid'] = 'Form Gagal disimpan';
         header("Location: " . $cfg->GetURL('pengajuan_cuti','add_pengajuan','view').'&opsiForm=tambah');
         exit;
      }else{
         header("Location: " . $cfg->GetURL('pengajuan_cuti','pengajuan_cuti','view'));
         exit;
      }
   }

   if($_POST['opsiForm'] == 'edit'){
      $cekValidForm = $proses->validasiForm($_POST);
      if($cekValidForm === FALSE){
         header("Location: " . $cfg->GetURL('pengajuan_cuti','edit_pengajuan','view').'&id='.$cfg->enc($_POST['mhsajuctId']));
         exit;
      }
      $prosesUpdate = $proses->updatePengajuanCuti($_POST);
      if($prosesUpdate === FALSE){
         $_SESSION['isFormValid'] = 'tidak';
         $_SESSION['pesanFormValid'] = 'Form Gagal diupdate';
         header("Location: " . $cfg->GetURL('pengajuan_cuti','edit_pengajuan','view').'&id='.$cfg->enc($_POST['mhsajuctId']));
         exit;
      }else{
         header("Location: " . $cfg->GetURL('pengajuan_cuti','pengajuan_cuti','view'));
         exit;
      }
   }
}else{

}
?>