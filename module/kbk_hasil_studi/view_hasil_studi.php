<?php
//Load Application Class
require_once $cfg->GetValue('app_proc') . 'display_base.class.php';
require_once $cfg->GetValue('app_proc') . 'display_base_full.class.php';
//require_once $cfg->GetValue('app_data') . 'database_connected.class.php';
require_once $cfg->GetValue("app_service") . "client/base_client.service.class.php";

require_once $cfg->GetValue("app_service") . "client/sia/sia_setting_client.service.class.php";

require_once $cfg->GetValue("app_module") . "kbk_user/communication/user_client.service.class.php" ;
// Load module class
require_once $cfg->GetValue("app_module") . "kbk_hasil_studi/communication/hasil_studi_client.service.class.php" ;

//Load module Display Faq
require_once $cfg->GetValue('app_module') . 'kbk_hasil_studi/display/display_view_hasil_studi.class.php';

$ThisPageAccessRight = "DOSEN_KBK | MAHASISWA_KBK"; 
    
   $security = new Security($cfg); 
   if (false !== $security->CheckAccessRight($ThisPageAccessRight)) 
   { 
      $ThisPageLinks = $security->mUserIdentity->GetProperty("Role");  
      $lnk = new Links($cfg, $ThisPageLinks);
      
      $khsSemId = '';
      if(isset($_GET['sem'])){
      	$khsSemId = $cfg->Dec($_GET['sem']);
      }elseif(isset($_POST['lstSemester'])){
      	$khsSemId = $_POST['lstSemester'];
      }
      
   	$errMsg = NULL;
      if (isset($_GET["err"])){
         $errMsg = $cfg->Dec($_GET["err"]);
      }
      
      $mhsNiu = '';
      if(isset($_GET['niu'])){
      	$mhsNiu = $cfg->Dec($_GET["niu"]);
      }else{
      	$mhsNiu = $security->mUserIdentity->GetProperty("UserReferenceId");
      }
      
      $prodiId = '';
      if(isset($_GET['prodi'])){
      	$prodiId = $cfg->Dec($_GET["prodi"]);
      }else{
      	$prodiId = $security->mUserIdentity->GetProperty("UserProdiId");
      }
      
      $app = new DisplayViewHasilStudi($cfg, $security, $mhsNiu,$khsSemId,$prodiId, $errMsg);
      $app->SetLinks($lnk);  
      $app->Display(); 
   } 
   else 
   { 
      $security->DenyPageAccess(); 
   }
?>