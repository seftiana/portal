<?php
/*
Author : Nikolius
Email : n1colius.lau@gmail.com
Date : 10/16/2012 9:49:52 AM
*/
require_once $cfg->GetValue('app_proc') . 'process_base.class.php';   
   
require_once $cfg->GetValue("app_service") . "client/base_client.service.class.php";
require_once $cfg->GetValue("app_service") . "client/sia/sia_setting_client.service.class.php";

require_once $cfg->GetValue("app_module") . "dosen/display/proses_import_temp_excel.class.php" ;  
require_once $cfg->GetValue("app_module") . "dosen/communication/dosen_client.service.class.php";

$ThisPageAccessRight = "DOSEN";
$security = new Security($cfg);
if (false !== $security->CheckAccessRight($ThisPageAccessRight)) {      

   //get parameter
   $sia = $cfg->Dec($_POST['sia']);   
   $klsId = $cfg->Dec($_POST['klsId']);
   $files = $_FILES['fileImport'];
   
   $app = new ProsesImportTempExcel($cfg,$security,$sia,$klsId,$files);
   $proses = $app->importTempExcel();

   if($proses === TRUE){
      $urlAdditional = '&kelas='.$_POST['klsId'].'&smt='.$_POST['semId'].'&sia='.$_POST['sia'];
   }else{
      $encErr = $cfg->Enc('Proses Import Nilai Gagal');
      $urlAdditional = '&err='.$encErr.'&kelas='.$_POST['klsId'].'&smt='.$_POST['semId'].'&sia='.$_POST['sia'];
   }
   header("Location: " . $cfg->GetURL('dosen','grade_management','view') . $urlAdditional);
   die();
}else{
   $security->DenyPageAccess();
}
?>