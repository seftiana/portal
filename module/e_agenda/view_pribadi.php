<?php
   
   // Load application class
   require_once $cfg->GetValue("app_proc") . "display_base.class.php" ;
   require_once $cfg->GetValue("app_proc") . "display_base_full.class.php" ;
   require_once $cfg->GetValue("app_service") . "client/base_client.service.class.php";
   require_once $cfg->GetValue("app_service") . "client/sia/sia_setting_client.service.class.php";
   require_once $cfg->GetValue('app_proc') . 'process_base.class.php';
   
   require_once $cfg->GetValue('app_data') . 'database_connected.class.php';
   
   // Load module class
   require_once $cfg->GetValue("app_module") . "e_agenda/communication/agenda.service.class.php" ;
   require_once $cfg->GetValue("app_module") . "e_materi/communication/materi.service.class.php" ;
  // require_once $cfg->GetValue("app_module") . "e_forum/business/forum.class.php" ;
   require_once $cfg->GetValue("app_module") . "e_agenda/display/display.class.php" ;    
   
   $ThisPageAccessRight = "MAHASISWA | DOSEN";
   $security = new Security($cfg);
   
   if (false !== $security->CheckAccessRight($ThisPageAccessRight)){
      $ThisPageLinks = $security->mUserIdentity->GetProperty("Role");
      $lnk = new Links($cfg, $ThisPageLinks);

	  if(isset($_POST['tambah']))
	  {
	  		header("Location: " . $cfg->GetURL('e_agenda','agenda_pribadi','add'));        	
	  }
	  
	  if (isset($_POST['cari']))
	  {
	  	 $_SESSION['pribadi']['frekuensi'] = $_POST['frekuensi'];
	  	 $_SESSION['pribadi']['done'] = $_POST['OnlyUndone'];
	  }
	  
	  $hal = $cfg->Dec($_GET['page']);
	  $page = isset($_GET['page']) ? $hal : 1;
	  
	  
      $ThisPage = new DisplayAgenda($cfg, $security);      
      $ThisPage->SetLinks($lnk);
      
      $ThisPage->DisplayViewAgenda($page, 2);
   }else{
      $security->DenyPageAccess();
   }
   
?>