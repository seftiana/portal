<?php
/**
 * @author Nikolius
 * @email n1colius.lau@gmail.com
 */
 
require_once $cfg->GetValue('app_proc') . 'process_base.class.php';      
require_once $cfg->GetValue("app_service") . "client/base_client.service.class.php";
require_once $cfg->GetValue("app_service") . "client/sia/sia_setting_client.service.class.php";

require_once $cfg->GetValue("app_module") . "dosen/display/process_dosen_komponen.class.php" ;
require_once $cfg->GetValue("app_module") . "dosen/communication/dosen_client.service.class.php" ;

$ThisPageAccessRight = "DOSEN";
$security = new Security($cfg);

if (false !== $security->CheckAccessRight($ThisPageAccessRight)) {   
   $sia = $cfg->dec($_POST['sia']);
   $kelas = $cfg->dec($_POST['kls']);
   $smt = $cfg->dec($_POST['smt']);

   $_POST['kodeProdi'] = $cfg->dec($_POST['kodeProdi']);
   $_POST['sia'] = $cfg->dec($_POST['sia']);
   $_POST['smt'] = $cfg->dec($_POST['smt']);
   $_POST['kls'] = $cfg->dec($_POST['kls']);
   
   //cek if post
   if(isset($_POST['btnKomponen']) AND $_POST['btnKomponen'] == 'Save Komponen Nilai'){
      
      $urlAdditional = '&sia='.$cfg->enc($sia).'&kelas='.$cfg->enc($kelas).'&smt='.$cfg->enc($smt);
      
      $app = new ProcessDosenKomponen($cfg,$security,$sia,$_POST);         
      $updateKomponen = $app->updateKomponen();      
      if($updateKomponen === TRUE){
         
         header("Location: ".$cfg->GetURL('dosen','grade_management','view').$urlAdditional.'&pesan='.$cfg->enc('Proses Save Komponen Nilai Berhasil'));                     
         
      }else{
         
         header("Location: " . $cfg->GetURL('dosen','grade_management','view').$urlAdditional.'&err='.$cfg->enc('Proses Save Komponen Nilai Gagal'));
         
      }
      die();
      
   }else{
      
      $urlAdditional = '&sia=' . $cfg->Enc($_POST['sia']).'&sem=' . $cfg->Enc($_POST['smt'].'&from='.$cfg->Enc('nilai'));
      // mata kuliah diampu
      header("Location: " . $cfg->GetURL('dosen','course_supported','view') . $urlAdditional);
      die();
                  
   }
   
}else{
   $security->DenyPageAccess();
}
?>