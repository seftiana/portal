<?php
   
   // Load application class
   require_once $cfg->GetValue("app_proc") . "display_base.class.php" ;
   require_once $cfg->GetValue("app_proc") . "display_base_full.class.php" ;
   require_once $cfg->GetValue("app_service") . "client/base_client.service.class.php";
   require_once $cfg->GetValue('app_proc') . 'process_base.class.php';
   
   // Load module class
   require_once $cfg->GetValue("app_module") . "e_forum/communication/forum_client.service.class.php" ;
   require_once $cfg->GetValue("app_module") . "e_forum/display/display_view_add_forum.class.php" ;    
   
   $ThisPageAccessRight = "ELEARNINGADM | MAHASISWA | DOSEN";
   $security = new Security($cfg);
   
   if (false !== $security->CheckAccessRight($ThisPageAccessRight)){
      $ThisPageLinks = $security->mUserIdentity->GetProperty("Role");
      $lnk = new Links($cfg, $ThisPageLinks);
      
		$matkulId = $_SESSION['forum']['matkul'];//print_r($_SESSION);exit();
      $ThisPage = new DisplayViewAddForum($cfg, $security, $matkulId);      
      $ThisPage->SetLinks($lnk);
      
      $ThisPage->Display();
   }else{
      $security->DenyPageAccess();
   }
   
?>