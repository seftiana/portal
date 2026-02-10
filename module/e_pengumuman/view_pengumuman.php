<?php
/*
@author : Refit Gustaroska
@Updated By : Fitria Maulina
*/
   //echo "kalsaklsaks";
	// Load application class
	require_once $cfg->GetValue("app_proc") . "display_base.class.php" ;
	require_once $cfg->GetValue("app_proc") . "display_base_full.class.php" ;
	require_once $cfg->GetValue("app_service") . "client/base_client.service.class.php";
	require_once $cfg->GetValue("app_service") . "client/sia/sia_setting_client.service.class.php";
	require_once $cfg->GetValue('app_proc') . 'process_base.class.php';
	require_once $cfg->GetValue('app_data') . 'database_connected.class.php';
   
	// Load module class
	require_once $cfg->GetValue("app_module") . "e_pengumuman/communication/pengumuman_client.service.class.php" ;
	require_once $cfg->GetValue("app_module") . "e_materi/communication/materi.service.class.php" ;
	require_once $cfg->GetValue("app_module") . "e_pengumuman/display/display_view_pengumuman.class.php" ;   
	require_once $cfg->GetValue('app_module') . 'e_materi/business/materi.class.php'; 
   
	$ThisPageAccessRight = "ELEARNINGADM | MAHASISWA | DOSEN";
	$security = new Security($cfg);
   
	if (false !== $security->CheckAccessRight($ThisPageAccessRight)){
      $ThisPageLinks = $security->mUserIdentity->GetProperty("Role");
      $lnk = new Links($cfg, $ThisPageLinks);
		
    if (isset($_GET['post']))
    {
    	unset($_SESSION['pengumumanSemester']);
    	unset($_SESSION['pengumumanKelas']);
    	unset($_SESSION['pengumumanJudul']);
    	unset($_SESSION['pengumumanIsi']);
    	unset($_SESSION['pengumumanError']);
		unset($_SESSION['pengumumanBatas']);
		unset($_SESSION['pengumumanStatus']);
    }
    
		$dateMulai = "";
		$dateAkhir = "";
		$klsId = "";
		$smtId = "";
		$judul = "";
		
		if(isset($_POST['getUnit']))
		{
			$_SESSION['pengumumanUnit'] = $_POST['unit'];
		}
		
		if(isset($_POST['getSemester']))
		{
			$_SESSION['pengumumanSemester'] = $_POST['semId'];
		}
		
		if(isset($_POST['cari'])) 
		{
			$_SESSION['pengumumanJudul'] = $_POST['judul'];
			$_SESSION['pengumumanKelas'] = $_POST['klsId'];
			$_SESSION['pengumumanMulai'] = $_POST['thnMulai']."-".$_POST['blnMulai']."-".$_POST['tglMulai'];
			$_SESSION['pengumumanAkhir'] = $_POST['thnAkhir']."-".$_POST['blnAkhir']."-".$_POST['tglAkhir'];
			
			$_SESSION['pengumumanMulai'] = (strlen($_SESSION['pengumumanMulai']) != 10) ? "0000-00-00" : $_SESSION['pengumumanMulai'];
			$_SESSION['pengumumanAkhir'] = (strlen($_SESSION['pengumumanAkhir']) != 10) ? "9999-99-99" : $_SESSION['pengumumanAkhir'];
			
			
		}
		$klsId = isset($_SESSION['pengumumanKelas'])? $_SESSION['pengumumanKelas'] : "";
		$judul = isset($_SESSION['pengumumanJudul'])? $_SESSION['pengumumanJudul'] : "";
		$smtId = isset($_SESSION['pengumumanSemester'])? $_SESSION['pengumumanSemester'] : "";
		$dateMulai = isset($_SESSION['pengumumanMulai'])? $_SESSION['pengumumanMulai'] : "0000-00-00";
		$dateAkhir = isset($_SESSION['pengumumanAkhir'])? $_SESSION['pengumumanAkhir'] : "9999-99-99";
		
      if(isset($_POST['tambah']))
      {    	
         $_SESSION['pengumumanSemester'] = $_POST['semId'];
         //unset($_SESSION['pengumumanKelas']);
         unset($_SESSION['pengumumanJudul']);
         unset($_SESSION['pengumumanIsi']);
         unset($_SESSION['pengumumanError']);
         unset($_SESSION['pengumumanBatas']);
         unset($_SESSION['pengumumanStatus']);
         header("Location: " . $cfg->GetURL('e_pengumuman','add_pengumuman','view')."&kls_id=".$cfg->Enc($klsId));        
         exit;
      }		
		
		/*if (isset($_GET['act'])) {
			$act = $cfg->Dec($_GET['act']);
		}else{
			$act = '';
		}*/
		
      $act = $_GET['act'];
		$page = 1;
		if (isset($_GET["page"])){
			$page = $cfg->Dec($_GET["page"]);
		}
		//echo $act;
		$ThisPage = new DisplayViewPengumuman($cfg, $security, $act, $klsId, $smtId, $judul, $dateMulai, $dateAkhir, $page);      
		$ThisPage->SetLinks($lnk);
      
		$ThisPage->Display();
      
	}else{
		$security->DenyPageAccess();
	}
   
?>