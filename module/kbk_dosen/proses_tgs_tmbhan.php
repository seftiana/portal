<?php
/**
 * @author Nikolius
 * @email n1colius.lau@gmail.com
 * @date 11 - 9 - 2012 10:33
 */
require_once $cfg->GetValue('app_proc') . 'process_base.class.php';      
require_once $cfg->GetValue("app_service") . "client/base_client.service.class.php";
require_once $cfg->GetValue("app_service") . "client/sia/sia_setting_client.service.class.php";

require_once $cfg->GetValue("app_module") . "dosen/communication/dosen_client.service.class.php" ;
require_once $cfg->GetValue("app_module") . "dosen/display/proses_tgs_tmbhan.class.php" ;

$ThisPageAccessRight = "DOSEN";
$security = new Security($cfg);

if (false !== $security->CheckAccessRight($ThisPageAccessRight)) {
   
   //cek apakah hapus
   $opsi = $cfg->dec($_GET['opsi']);
   if($opsi == 'hapus'){
      //hapus
      
      //dekrip
      foreach($_GET as $key => $value){
         $dataGet[$key] = $cfg->dec($value);   
      }
      $sia = $dataGet['sia'];
      
      $paramUrl = '&kelas='.$_GET['kelas'].'&sia='.$_GET['sia'].'&mhs='.$_GET['mhs'].'&krsdt='.$_GET['krsdt'].'&smt='.$_GET['smt'];
      $urlList = $cfg->GetURL('dosen','tugas_tmbhan','view');
      
      $app = new ProsesTgsTmbhan($cfg,$security,$sia,$dataGet);
      $proses = $app->hapusTgsTmbhan();
      if($proses === TRUE){
         header("Location: " . $urlList.$paramUrl.'&psnMsg='.$cfg->enc('Data berhasil dihapus'));      
      }else{
         header("Location: " . $urlList.$paramUrl.'&psnErr='.$cfg->enc('Data gagal dihapus'));
      }
      die();
   }else{
      //tambah n edit
      
      //dekrip      
      foreach($_POST as $key => $value){
         $dataPost[$key] = $cfg->dec($value);   
      }
      $sia = $dataPost['sia'];
      
      $paramUrl = '&kelas='.$_POST['klsId'].'&sia='.$_POST['sia'].'&mhs='.$_POST['mhsNiu'].'&krsdt='.$_POST['krsdtId'].'&smt='.$_POST['semester'];
      $urlList = $cfg->GetURL('dosen','tugas_tmbhan','view'); 
         
      $app = new ProsesTgsTmbhan($cfg,$security,$sia,$dataPost);
      
      if($dataPost['opsi'] == 'tambah'){
         $proses = $app->tambahTgsTmbhan();
         if($proses === TRUE){
            header("Location: " . $urlList.$paramUrl.'&psnMsg='.$cfg->enc('Data berhasil ditambahkan'));      
         }else{
            header("Location: " . $urlList.$paramUrl.'&psnErr='.$cfg->enc('Data gagal ditambahkan'));
         }      
      }else{
         $proses = $app->editTgsTmbhan();
         if($proses === TRUE){
            header("Location: " . $urlList.$paramUrl.'&psnMsg='.$cfg->enc('Data berhasil diupdate'));      
         }else{
            header("Location: " . $urlList.$paramUrl.'&psnErr='.$cfg->enc('Data gagal diupdate'));
         }               
      }   
      die();
         
   }      
   
}else{
   $security->DenyPageAccess();
}
?>