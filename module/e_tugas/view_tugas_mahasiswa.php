<?php
    // Load Application Display Class	   
   require_once $cfg->GetValue('app_proc') . 'display_base.class.php';   
   require_once $cfg->GetValue('app_proc') . 'display_base_full.class.php';
   require_once $cfg->GetValue('app_proc') . 'process_base.class.php';
   require_once $cfg->GetValue("app_service") . "client/base_client.service.class.php";
   require_once $cfg->GetValue("app_service") . "client/sia/sia_setting_client.service.class.php";
   

   // Load Data Display Class
   require_once $cfg->GetValue('app_data') . 'database_connected.class.php';

   // Load Module data Class
   require_once $cfg->GetValue('app_module') . 'e_tugas/display/display_tugas_mahasiswa.class.php';
   require_once $cfg->GetValue('app_module') . 'e_materi/communication/materi.service.class.php';
   require_once $cfg->GetValue('app_module') . 'e_tugas/communication/tugas.service.class.php';
   
   
   require_once $cfg->GetValue('app_module') . 'user/business/user.class.php';


$ThisPageAccessRight = "MAHASISWA";
$security = new Security($cfg);



if (false !== $security->CheckAccessRight($ThisPageAccessRight)) {
	$ThisPageLinks = $security->mUserIdentity->GetProperty("Role");      
	$lnk = new Links($cfg, $ThisPageLinks);
		
	
	$page = htmlspecialchars($_GET['page']);
	$err = htmlspecialchars($_GET['err']);
	
	$app = new DisplayMhsTampil($cfg,$security, $page, $err);
	$app->SetLinks($lnk);
	$app->SetTemplateFile('mhs_tampil.html');
	$app->Display();
}
else
{
	$security->DenyPageAccess();
}


?>