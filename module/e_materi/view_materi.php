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
   require_once $cfg->GetValue('app_module') . 'e_materi/display/display_view_materi.class.php';
   require_once $cfg->GetValue('app_module') . 'e_materi/communication/materi.service.class.php'; 
   require_once $cfg->GetValue('app_module') . 'e_materi/business/materi.class.php';
   require_once $cfg->GetValue('app_module') . 'e_materi/display/proses_materi.class.php';
   require_once $cfg->GetValue('app_module') . 'user/business/user.class.php';


$ThisPageAccessRight = "MAHASISWA | DOSEN | ELEARNINGADM";
$security = new Security($cfg);

if (false !== $security->CheckAccessRight($ThisPageAccessRight)){
    $ThisPageLinks = $security->mUserIdentity->GetProperty("Role");      
	$lnk = new Links($cfg, $ThisPageLinks);
    
    $mhsNiu = $security->mUserIdentity->GetProperty("UserReferenceId");
	$prodiId = $security->mUserIdentity->GetProperty("UserProdiId");
	
	$proses = new ProsesMateri($cfg, $security, $mhsNiu, $prodiId);
    
   
    //jika dibuka dr menu, semua session dihapus
    if (isset($_GET['post']))
    {
    	unset($_SESSION['materiSemester']);
    	unset($_SESSION['materiKelas']);
    	unset($_SESSION['materiDosen']);
    	unset($_SESSION['materiKelasLain']);
    	unset($_SESSION['materiDosenLain']);
		unset($_SESSION['materiUnit']);
		unset($_SESSION['materiProdi']);
    }
	
	if(isset($_POST['getUnit']))
	{
		$_SESSION['materiUnit'] = $_POST['unit'];
		$_SESSION['materiProdi'] = $_POST['prodi'];
	}
    
    //set session drinput form pencarian
    
	if (isset($_POST['cari']))
	{
	    if (isset($_POST['judul'])) $_SESSION['materiJudul'] = htmlspecialchars($_POST['judul']);
		$_SESSION['materiKelas'] = $_POST['klsId'];
	    /*if (($_POST['tglMulai'] != "") && ($_POST['blnMulai'] != "") && ($_POST['thnMulai'] != "")) $_SESSION['materiMulai'] = $_POST['blnMulai']."/".$_POST['tglMulai']."/".$_POST['thnMulai'];
		    else unset($_SESSION['materiMulai']);
		    if (($_POST['tglAkhir'] != "") && ($_POST['blnAkhir'] != "") && ($_POST['thnAkhir'] != "")) $_SESSION['materiAkhir'] = $_POST['blnAkhir']."/".$_POST['tglAkhir']."/".$_POST['thnAkhir'];
		    else unset($_SESSION['materiAkhir']);*/
		    //if ($_POST['klsDsn'] == "kelas" ) 
		    
		    //if ($_POST['klsDsn'] == "dosen" ) $_SESSION['materiDosen'] = $_POST['dsnId'];
		    /*if ($_POST['isKlsDsnLain'] == "1" ) 
		    {
		    	if ($_POST['klsDsnLain'] == "kelas" ) $_SESSION['materiKelasLain'] = $_POST['klsLainId'];
		    	if ($_POST['klsDsnLain'] == "dosen" ) $_SESSION['materiDosenLain'] = $_POST['dsnLainId'];
		    }*/
	}
	
	if (isset($_POST['getSemester'])) $_SESSION['materiSemester'] = $_POST['semId'];
	

	if (isset($_POST['simpanAktifasi']))
	{
		if ($_POST['isAktifkan'] == 'del')			
		{
			//print_r($_POST);exit;
			if(isset($_POST['chk']))
			{
				$uploadDir = $cfg->GetValue('file_upload_root')."module/e_materi/file_upload/";
				$strId = "";
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
				$proses->Delete($strId);
			}
		}
		else 
		{
			if(isset($_POST['chk']))
			{
				$strId = "";				
				foreach (array_keys($_POST['chk']) as $row)
				{			
					$strId = $row.",".$strId;			
				}
				$strId = rtrim($strId,',');
				$strId = "'".$strId."'";
				$proses->Activation($strId,$_POST['isAktifkan']);
			}
		}
	}
	
	
    if(isset($_POST['addMateri']))
    {    	
    	$_SESSION['materiSemester'] = $_POST['semId'];
      unset($_SESSION['materiKelas']);
      unset($_SESSION['materiJudul']);
      unset($_SESSION['materiDeskripsi']);
      unset($_SESSION['materiError']);
    	header("Location: " . $cfg->GetURL('e_materi','materi_tampil','add'));        
        exit;
    }
	
	$page = 1;
	if (isset($_GET["page"])){
         $page = $cfg->Dec($_GET["page"]);
    }
    $app = new DisplayMateri($cfg,$security,$page);
    $app->SetLinks($lnk);
    $app->SetTemplateFile('materi_tampil.html');
  
    $app->Display();
}
else
{
    $security->DenyPageAccess();
}


?>
