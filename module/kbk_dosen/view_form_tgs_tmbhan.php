<?php
/**
 * @author Nikolius
 * @email n1colius.lau@gmail.com
 * @date 11 - 9 - 2012 9:58
 */
require_once $cfg->GetValue("app_proc") . "display_base.class.php" ;
require_once $cfg->GetValue("app_proc") . "display_base_full.class.php" ;
require_once $cfg->GetValue("app_service") . "client/base_client.service.class.php";
require_once $cfg->GetValue("app_service") . "client/sia/sia_setting_client.service.class.php";

require_once $cfg->GetValue("app_module") . "dosen/communication/dosen_client.service.class.php" ;
require_once $cfg->GetValue("app_module") . "dosen/display/display_view_form_tgs_tmbhan.class.php" ;

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
   $opsi = $cfg->dec($_GET['opsi']);
   $id = $cfg->dec($_GET['id']);
   
   $thisPage = new DisplayViewFormTgsTmbhan($cfg,$security,$sia,$kelas,$smt,$mhsNiu,$krsdtId,$opsi,$id);      
   $thisPage->SetLinks($lnk);     
   $thisPage->Display();
}else{
   $security->DenyPageAccess();   
}
?>