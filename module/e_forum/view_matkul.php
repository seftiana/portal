<?php
   
   // Load application class
   require_once $cfg->GetValue("app_proc") . "display_base.class.php" ;
   require_once $cfg->GetValue("app_proc") . "display_base_full.class.php" ;
   require_once $cfg->GetValue("app_service") . "client/base_client.service.class.php";
   require_once $cfg->GetValue('app_proc') . 'process_base.class.php';
   require_once $cfg->GetValue("app_service") . "client/sia/sia_setting_client.service.class.php";
   
   require_once $cfg->GetValue('app_data') . 'database_connected.class.php';
   // Load module class
   require_once $cfg->GetValue("app_module") . "e_forum/communication/forum_client.service.class.php" ;
   require_once $cfg->GetValue("app_module") . "e_forum/display/display_view_matkul.class.php" ;  
   require_once $cfg->GetValue('app_module') . 'e_materi/business/materi.class.php';
   
   $ThisPageAccessRight = "ELEARNINGADM | MAHASISWA | DOSEN";
   $security = new Security($cfg);
   
   if(isset($_POST['getUnit']))
   {
		$_SESSION['forum']['unit'] = $_POST['unit'];
		$_SESSION['forum']['prodi'] = $_POST['prodi'];
   }
   
   
   
   if (false !== $security->CheckAccessRight($ThisPageAccessRight)){
      $ThisPageLinks = $security->mUserIdentity->GetProperty("Role");
      $lnk = new Links($cfg, $ThisPageLinks);

      $ThisPage = new DisplayViewMatkul($cfg, $security);      
      $ThisPage->SetLinks($lnk);      
      $ThisPage->Display();
   }else{
      $security->DenyPageAccess();
   }
   
?>