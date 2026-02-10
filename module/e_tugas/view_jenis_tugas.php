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
   require_once $cfg->GetValue('app_module') . 'e_tugas/display/display_jenis_tugas.class.php';
   require_once $cfg->GetValue('app_module') . 'e_tugas/display/proses_tugas.class.php';   
   
   require_once $cfg->GetValue('app_module') . 'e_materi/communication/materi.service.class.php';
   require_once $cfg->GetValue('app_module') . 'e_tugas/communication/tugas.service.class.php';
   
   
   require_once $cfg->GetValue('app_module') . 'user/business/user.class.php';


$ThisPageAccessRight = "DOSEN";

$security = new Security($cfg);
if (false !== $security->CheckAccessRight($ThisPageAccessRight))
{
	
	$ThisPageLinks = $security->mUserIdentity->GetProperty("Role");     
	$lnk = new Links($cfg, $ThisPageLinks);
	$mhsNiu = $security->mUserIdentity->GetProperty("User");
	$prodiId = $security->mUserIdentity->GetProperty("UserProdiId");

	$proses = new ProsesTugas($cfg, $security, $mhsNiu, $prodiId);
	
	unset($_SESSION['tugas']);
	if(isset($_GET['pos']))
	{
		unset($_SESSION['jenis_tugas']);
	}
	
    if($_POST['addJenisTugas'] == "Tambah")
    {  
    	header("Location: " . $cfg->GetURL('e_tugas','jenis_tugas','add'));          
        exit;
    }
	
    //JIKA ADA ACTION HAPUS
    if (isset($_POST['hapusTugas']))
    {    	
    	foreach (array_keys($_POST['chk']) as $row)
    	{
			//jika ada tugas yg menggunakan data ref
			if($_POST['chk'][$row] != "")    		
			{
				header("Location: " . $cfg->GetURL('e_tugas','jenis_tugas','view')."&e=1");  
				exit; 
			}
			else
			{
	    		$strId = $row.",".$strId;
			}
    	}		
		$strId = rtrim($strId,',');
	    $proses->DeleteJenisTugas($strId);
    }
	
	$page = 1;
    if (isset($_GET["page"])){
         $page = $cfg->Dec($_GET["page"]);
    }
	$app = new DisplayJenisTugas($cfg,$security,$page);
	$app->SetLinks($lnk);
	$app->SetTemplateFile('jenis_tugas_tampil.html');
	$app->Display();
}
else
{
	$security->DenyPageAccess();
}


?>