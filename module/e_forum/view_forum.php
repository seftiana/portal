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
   require_once $cfg->GetValue("app_module") . "e_pengumuman/communication/pengumuman_client.service.class.php" ;
   require_once $cfg->GetValue("app_module") . "e_materi/communication/materi.service.class.php" ;
   require_once $cfg->GetValue("app_module") . "e_forum/display/display_view_forum.class.php" ;    
   require_once $cfg->GetValue("app_module") . "e_materi/business/materi.class.php" ;    
   
   $ThisPageAccessRight = "ELEARNINGADM | MAHASISWA | DOSEN";
   $security = new Security($cfg);
   
   if (false !== $security->CheckAccessRight($ThisPageAccessRight)){
      $ThisPageLinks = $security->mUserIdentity->GetProperty("Role");
      $lnk = new Links($cfg, $ThisPageLinks);
		if (isset($_GET['pos']))
		{
			unset($_SESSION['forum']);
		}
     // print_r($_SESSION['forum']);
		//jika nekan tombol submit unit
		if(isset($_POST['getUnit']))
		{
			$_SESSION['forum']['unit'] = $_POST['unit'];
			$_SESSION['forum']['prodi'] = $_POST['prodi'];
		}
		
		//dari tombol submit semester
		if(isset($_POST['getSemester']))
		{
			$_SESSION['forum']['semester'] = $_POST['semId'];
		}
		
		
		
		//submit tombol cari
		if(isset($_POST['cari']))
		{
			$_SESSION['forum']['matkul'] = $_POST['matkul'];
		}
		
      //$act = isset($_POST['getSemester'])?$_POST['getSemester']:$_POST['cari'];
      
      
      $page = isset($_GET['page'])?$cfg->Dec($_GET['page']):1;
     // print_r($_SESSION['forum']);
      $ThisPage = new DisplayViewForum($cfg, $security, $_SESSION['forum']['matkul'], $_SESSION['forum']['semester'], $act, $page);      
      $ThisPage->SetLinks($lnk);
      //print_r($matkulId);
      $ThisPage->Display();
   }else{
      $security->DenyPageAccess();
   }
   
?>