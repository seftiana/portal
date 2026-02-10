<?php
// Load application class
   require_once $cfg->GetValue("app_proc") . "display_base.class.php" ;
   require_once $cfg->GetValue("app_proc") . "display_base_print.class.php" ;
   require_once $cfg->GetValue("app_service") . "client/base_client.service.class.php";
   require_once $cfg->GetValue("app_service") . "client/sia/sia_setting_client.service.class.php";
   require_once $cfg->GetValue("app_data") . "database_connected.class.php" ;
   
   
   // Load module class
   require_once $cfg->GetValue("app_module") . "kbk_user/communication/user_client.service.class.php" ;
  	require_once $cfg->GetValue("app_module") . "kbk_reference/business/reference.class.php" ;
   require_once $cfg->GetValue("app_module") . "kbk_academic_report/communication/academic_report_client.service.class.php" ;
   require_once $cfg->GetValue("app_module") . "kbk_academic_report/display/display_print_transkrip_01.class.php" ;
   
   $ThisPageAccessRight = "DOSEN_KBK | MAHASISWA_KBK"; 
       
      $security = new Security($cfg); 
      if (false !== $security->CheckAccessRight($ThisPageAccessRight)) 
      { 
         $ThisPageLinks = $security->mUserIdentity->GetProperty("Role");  
         $lnk = new Links($cfg, $ThisPageLinks);
	      $mhsNiu = "";
	      if (isset($_GET["niu"])){
	         $mhsNiu = $cfg->Dec($_GET["niu"]);
	      } 
	      
	      $prodiId = "";
	      if (isset($_GET["prodi"])){
	         $prodiId = $cfg->Dec($_GET["prodi"]);
	      }
	      
         $app = new DisplayPrintTranskrip01($cfg, $security,$mhsNiu,$prodiId);
         $app->SetLinks($lnk);  
         $app->Display(); 
      } 
      else 
      { 
         $security->DenyPageAccess(); 
      }
?>