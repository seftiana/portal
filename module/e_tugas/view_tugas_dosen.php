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
   require_once $cfg->GetValue('app_module') . 'e_tugas/display/display_tugas_dosen.class.php';
   require_once $cfg->GetValue('app_module') . 'e_tugas/display/proses_tugas.class.php';
   
   require_once $cfg->GetValue('app_module') . 'e_materi/communication/materi.service.class.php';
   require_once $cfg->GetValue('app_module') . 'e_tugas/communication/tugas.service.class.php';
   
   
   require_once $cfg->GetValue('app_module') . 'user/business/user.class.php';
   require_once $cfg->GetValue('app_module') . 'e_materi/business/materi.class.php';


$ThisPageAccessRight = "DOSEN | ELEARNINGADM";

$security = new Security($cfg);
if (false !== $security->CheckAccessRight($ThisPageAccessRight))
{
	
	$ThisPageLinks = $security->mUserIdentity->GetProperty("Role");     
	$lnk = new Links($cfg, $ThisPageLinks);
	if($security->mUserIdentity->GetProperty("Role") == 7)
	{
		$mhsNiu = $_SESSION['tugas']['unit'];
		$prodiId = "";
	}
	else
	{
		$mhsNiu = $security->mUserIdentity->GetProperty("User");
		$prodiId = $security->mUserIdentity->GetProperty("UserProdiId");
	}

	$proses = new ProsesTugas($cfg, $security, $mhsNiu, $prodiId);
	
	if(isset($_GET['pos']))
	{
		unset($_SESSION['tugas']);
	}
	
	if (isset($_POST['getSemester']))
	{
		$_SESSION['tugas']['semester'] = $_POST['semId'];
	}
	
	if(isset($_POST['getUnit']))
	{
		$_SESSION['tugas']['unit'] = $_POST['unit'];
	}
	
	if (isset($_POST['cari']))
	{
		$_SESSION['tugas']['kelas'] = $_POST['klsId'];
		$_SESSION['tugas']['judul'] = $_POST['judul'];
	}
	
	
    if($_POST['addTugas'] == "Tambah")
   {
      unset($_SESSION['tugas']['judul'] );
      unset($_SESSION['tugas']['abstraksi'] );
      unset($_SESSION['tugas']['tujuan'] );
      unset($_SESSION['tugas']['file']) ;
      unset($_SESSION['tugas']['err'] );
        if (!isset($_SESSION['tugas']['semester']) )$_SESSION['tugas']['semester'] = $_POST['semId'];
    	header("Location: " . $cfg->GetURL('e_tugas','tugas_tampil','add'));          
        exit;
    }
    
    if (isset($_POST['hapusTugas']))
    {
    	$uploadDir = $cfg->GetValue('docroot')."module/e_tugas/file_upload/";
    	$strId = "";
		if(!empty($_POST['chk']))
		{
	    	foreach (array_keys($_POST['chk']) as $row)
	    	{
	    		//jika ada file nya
	    		if (($_POST['chk'][$row] != "") && (file_exists($uploadDir . $_POST['chk'][$row])))
	    		{
	    			unlink($uploadDir . $_POST['chk'][$row]);
	    		}
	    		$strId = $row.",".$strId;
	    	}
	    	$strId = rtrim($strId,',');
			//echo $strId;
	    	$proses->Delete($strId);
		}
    }
	
	$page = 1;
    if (isset($_GET["page"])){
         $page = $cfg->Dec($_GET["page"]);
    }
	$app = new DisplayDosenTampil($cfg,$security,$page);
	$app->SetLinks($lnk);
	$app->SetTemplateFile('dsn_tampil.html');
	$app->Display();
}
else
{
	$security->DenyPageAccess();
}


?>