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
   require_once $cfg->GetValue('app_module') . 'e_materi/display/display_view_referensi.class.php';
   require_once $cfg->GetValue('app_module') . 'e_materi/communication/materi.service.class.php'; 
  // require_once $cfg->GetValue('app_module') . 'e_materi/display/proses_materi.class.php';
   require_once $cfg->GetValue('app_module') . 'user/business/user.class.php';


$ThisPageAccessRight = "MAHASISWA | DOSEN";
$security = new Security($cfg);

if (false !== $security->CheckAccessRight($ThisPageAccessRight)){
    $ThisPageLinks = $security->mUserIdentity->GetProperty("Role");      
	$lnk = new Links($cfg, $ThisPageLinks);
    
    //unset session ketika pertama kali di load
	if(isset($_GET['pos'])) unset($_SESSION['referensi']);
    
    //set session setelah dimasukkan kriteris pencarian
    if (isset($_POST['cari']))
    {
    	$_SESSION['referensi']['cari'] = $_POST['judul'];
    }
    
    $page = 1;
    if (isset($_GET['page']))
    {
    	$page = $_GET['page'];
    }
    
    $app = new DisplayReferensi($cfg,$security,$page);
    $app->SetLinks($lnk);
    $app->SetTemplateFile('referensi_tampil.html');
  
    $app->Display();
}
else
{
    $security->DenyPageAccess();
}


?>
