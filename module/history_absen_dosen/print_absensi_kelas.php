   <?php

   // Load application class
   require_once $cfg->GetValue("app_proc") . "display_base.class.php" ;
   // require_once $cfg->GetValue("app_proc") . "display_base_full.class.php" ;
   require_once $cfg->GetValue("app_proc") . "display_base_print.class.php" ;
   require_once $cfg->GetValue("app_service") . "client/base_client.service.class.php";
   
   require_once $cfg->GetValue("app_service") . "client/sia/sia_setting_client.service.class.php";
   
   // Load module class
   require_once $cfg->GetValue("app_module") . "user/communication/user_client.service.class.php" ;
   require_once $cfg->GetValue("app_module") . "dosen/communication/dosen_client.service.class.php" ;
   require_once $cfg->GetValue("app_module") . "history_absen_dosen/display/display_print_absen_kelas.class.php" ;  
   require_once $cfg->GetValue("app_module") . "proposed_classes/communication/proposed_classes_client.service.class.php" ;

   //Konek Ke gtPembayaran      
   require_once $cfg->GetValue('app_data') . 'RestClient.class.php';
   // echo"<pre>";print_r($_GET);die;
   $ThisPageAccessRight = "DOSEN";
   $security = new Security($cfg);
   
   if (false !== $security->CheckAccessRight($ThisPageAccessRight)){
      $ThisPageLinks = $security->mUserIdentity->GetProperty("Role");
      $lnk = new Links($cfg, $ThisPageLinks);
      
      $errMsg = NULL;
	  if(isset($_GET["pBl"])){
	     $halaman=$cfg->Dec($_GET["pBl"]);
		 $go=$cfg->Dec($_GET["pGo"]);
		  $nif=$cfg->Dec($_GET["nif"]);
	  }else{
	     $halaman='';
		 $nif='';
	  }
      if (isset($_GET["err"])){
         $errMsg = $cfg->Dec($_GET["err"]);
      }
   
      $semester = "";
      if (isset($_GET["smt"])){
         $semester = $cfg->Dec($_GET["smt"]);
      }
      
      $kelasId = "";
      if (isset($_GET["kelas"])){
         $kelasId = $cfg->Dec($_GET["kelas"]);
      }
      
      $sia = $security->mUserIdentity->GetProperty("ServerServiceAddress");
      if (isset($_GET["sia"])){
         $sia = $cfg->Dec($_GET["sia"]);
      }
	  
	  $afterProc="";
      if (isset($_GET["proc"])){
         $afterProc = $_GET["proc"];
      }
	  
      $ThisPage = new DisplayPrintAbsenKelas($cfg, $security, $errMsg, $semester, $kelasId, $sia, $halaman, $nif, $afterProc); //add cecep 10 maret 2017
      $ThisPage->SetLinks($lnk);
	  
      $ThisPage->Display();
   }else{
      $security->DenyPageAccess();
   }
?>