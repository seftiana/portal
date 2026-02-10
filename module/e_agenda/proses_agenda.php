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
   require_once $cfg->GetValue('app_module') . 'e_agenda/display/proses.class.php';
   require_once $cfg->GetValue('app_module') . 'e_agenda/communication/agenda.service.class.php';
   require_once $cfg->GetValue('app_module') . 'user/business/user.class.php';
   


$ThisPageAccessRight = "DOSEN | ELEARNINGADM | MAHASISWA";

$security = new Security($cfg);
if (false !== $security->CheckAccessRight($ThisPageAccessRight)) 
{  
	$mId = $security->mUserIdentity->GetProperty("UserReferenceId");
	$prodiId = $security->mUserIdentity->GetProperty("UserProdiId");
	
	$proses = new ProsesAgenda($cfg, $security, $mId, $prodiId);
    //print_r($_POST);
	if (isset($_POST['AddSimpan']))
	{
		$proses->Insert($_POST);
	}
	
	//print_r($_POST);
	if (isset($_POST['simpan']))
	{
		if (!empty($_POST['chk']))
	  	{
	  		$str= '';
	  		foreach (array_keys($_POST['chk']) as $id)
	  		{
	  			$str = $str.','.$id;
	  		}
	  		$str = trim($str,',');
	  		if ($_POST['action'] == 'done')
			{
				$proses->DoSetDone($str);
			}
			else 
			{
				$proses->DoDelete($str);
			}
	  		
	  	}
		
	}
	
		
	if ($_POST['jenis'] == 1) $nmjenis = 'kelas';
	else $nmjenis = 'pribadi';
	//echo $nmjenis;
	header("Location: " . $cfg->GetURL('e_agenda',$nmjenis,'view'));        	
	
	exit;
	
    
}
else
{
    $security->DenyPageAccess();
}


?>
