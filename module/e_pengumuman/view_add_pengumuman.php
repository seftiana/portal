<?php
   
   // Load application class
   require_once $cfg->GetValue("app_proc") . "display_base.class.php" ;
   require_once $cfg->GetValue("app_proc") . "display_base_full.class.php" ;
   require_once $cfg->GetValue("app_service") . "client/base_client.service.class.php";
   require_once $cfg->GetValue("app_service") . "client/sia/sia_setting_client.service.class.php";
   require_once $cfg->GetValue('app_proc') . 'process_base.class.php';
   
   // Load module class
   require_once $cfg->GetValue("app_module") . "e_pengumuman/communication/pengumuman_client.service.class.php" ;
   require_once $cfg->GetValue("app_module") . "e_pengumuman/display/display_view_add_pengumuman.class.php" ;    
   
   $ThisPageAccessRight = "ELEARNINGADM | MAHASISWA | DOSEN";
   $security = new Security($cfg);
   
   if (false !== $security->CheckAccessRight($ThisPageAccessRight)){
      $ThisPageLinks = $security->mUserIdentity->GetProperty("Role");
      $lnk = new Links($cfg, $ThisPageLinks);
		/*
		if(isset($_GET['kls_id'])) {
			$klsId = $cfg->Dec($_GET['kls_id']);
		}else{
			$klsId = '';
		}
		*/
		//$submitSmstr = $_POST['getSemester'];

      $ThisPage = new DisplayViewAddPengumuman($cfg, $security, $_SESSION['pengumumanKelas'], $_SESSION['pengumumanSemester']);      
      $ThisPage->SetLinks($lnk);
      
      $ThisPage->Display();
   }else{
      $security->DenyPageAccess();
   }
   
?>