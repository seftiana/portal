<?php
/**
 * @author Nikolius
 * @email n1colius.lau@gmail.com
 * @date 10 - 9 - 2012 15:40
 */
// Load application class
require_once $cfg->GetValue("app_proc") . "display_base.class.php" ;
require_once $cfg->GetValue("app_proc") . "display_base_full.class.php" ;
require_once $cfg->GetValue("app_service") . "client/base_client.service.class.php";
require_once $cfg->GetValue("app_service") . "client/sia/sia_setting_client.service.class.php";

require_once $cfg->GetValue("app_module") . "dosen/communication/dosen_client.service.class.php" ;
require_once $cfg->GetValue("app_module") . "proposed_classes/communication/proposed_classes_client.service.class.php" ;
require_once $cfg->GetValue("app_module") . "user/communication/user_client.service.class.php" ;

require_once $cfg->GetValue("app_module") . "dosen/display/display_view_tugas_tmbhan.class.php" ;

$ThisPageAccessRight = "DOSEN";
$security = new Security($cfg);

if (false !== $security->CheckAccessRight($ThisPageAccessRight)){
   $ThisPageLinks = $security->mUserIdentity->GetProperty("Role");
   $lnk = new Links($cfg, $ThisPageLinks);
      
   //get parameter
   $sia = $cfg->dec($_GET['sia']);
   $kelas = $cfg->dec($_GET['kelas']);
   $smt = $cfg->dec($_GET['smt']);
   $mhsNiu = $cfg->dec($_GET['mhs']);
   $krsdtId = $cfg->dec($_GET['krsdt']);
   $psnErr = $cfg->dec($_GET['psnErr']); 
   $psnMsg = $cfg->dec($_GET['psnMsg']); 
   
   $thisPage = new DisplayViewTugasTmbhan($cfg,$security,$sia,$kelas,$smt,$mhsNiu,$krsdtId,$psnErr,$psnMsg);      
   $thisPage->SetLinks($lnk);     
   $thisPage->Display();   
}else{
   $security->DenyPageAccess();   
}
?>