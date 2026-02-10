<?php
/*
Author : Nikolius
Email : n1colius.lau@gmail.com
Date : 10/15/2012 3:36:27 PM
*/
require_once $cfg->GetValue('app_proc') . 'process_base.class.php';   
   
require_once $cfg->GetValue("app_service") . "client/base_client.service.class.php";
require_once $cfg->GetValue("app_service") . "client/sia/sia_setting_client.service.class.php";

require_once $cfg->GetValue("app_module") . "dosen/display/proses_gen_temp_excel.class.php" ;  
require_once $cfg->GetValue("app_module") . "dosen/communication/dosen_client.service.class.php";

$ThisPageAccessRight = "DOSEN";
$security = new Security($cfg);
if (false !== $security->CheckAccessRight($ThisPageAccessRight)) {      

   //get parameter
   $sia = $cfg->Dec($_GET['sia']);
   $semId = $cfg->Dec($_GET['semId']);
   $klsId = $cfg->Dec($_GET['klsId']);
   
   $app = new ProsesGenTempExcel($cfg,$security,$sia,$semId,$klsId);         
   $app->genTempExcel();   

}else{
   $security->DenyPageAccess();
}
?>