<?php
   // Load application class
   require_once $cfg->GetValue("app_proc") . "display_base.class.php" ;
   require_once $cfg->GetValue("app_proc") . "display_base_full.class.php" ;
   require_once $cfg->GetValue("app_service") . "client/base_client.service.class.php";
   
   require_once $cfg->GetValue("app_service") . "client/sia/sia_setting_client.service.class.php";
   // Load module class
   require_once $cfg->GetValue("app_module") . "user/communication/user_client.service.class.php" ;
   require_once $cfg->GetValue("app_module") . "academic_report/communication/academic_report_client.service.class.php" ;
   require_once $cfg->GetValue("app_module") . "academic_report/display/display_view_grade_history_mhs.class.php" ;  

   //Konek Ke gtPembayaran  add ccp 5-3-2019 
   require_once $cfg->GetValue('app_data') . 'RestClient.class.php'; #add ccp 6-3-2019
   #$getBlock = $cfg->GetValue('enable_block'); #add ccp 6-3-2019
   #add cecep un blok khusus orang tua 16-11-2020
   if($security->mUserIdentity->GetProperty("Role")==10){ #role 10 orang tua
	$getBlock = 0;
   }else{
	$getBlock = $cfg->GetValue('enable_block'); #add ccp 6-3-2019
   }
   
   $ThisPageAccessRight = "MAHASISWA | DOSEN | ORTU";
   $security = new Security($cfg);

   if (false !== $security->CheckAccessRight($ThisPageAccessRight)){
      $ThisPageLinks = $security->mUserIdentity->GetProperty("Role");
      $lnk = new Links($cfg, $ThisPageLinks);
      
      $mhsNiu = NULL;
      if (isset($_GET["niu"])){
         $mhsNiu = $cfg->Dec($_GET["niu"]);
      } else {
         $mhsNiu = $security->mUserIdentity->GetProperty("UserReferenceId");
      }

      #add ccp 12-03-2019
	$prodiId = NULL;
	if (isset($_GET["prodi"])){
		$prodiId = $cfg->Dec($_GET["prodi"]);
	}else {
		$prodiId = $security->mUserIdentity->GetProperty("UserProdiId");
	}
	  
      $ThisPage = new DisplayViewGradeHistoryMhs($cfg, $security, $mhsNiu, $prodiId, $getBlock);
      $ThisPage->SetLinks($lnk);
      $ThisPage->Display();
   }else{
      $security->DenyPageAccess();
   }
?>