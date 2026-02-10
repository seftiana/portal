<?php
	// header("Location: https://portalakademik.perbanas.id");exit;

	// Domain yang diizinkan
	/*
	$allowed_domains = [
		'localhost',       // Web 1 dan Web 2 sama-sama pakai ini
		'192.168.0.7',       // Web 1 dan Web 2 sama-sama pakai ini
		'https://perbanas.id/',      // Web 1 dan Web 2 sama-sama pakai ini
		'192.168.0.21'     // Jika suatu saat akses via IP LAN
	];

	if (!isset($_SERVER['HTTP_REFERER'])) {
		// echo "Referer kosong. Akses ditolak. silahkan ke <a href='https://perbanas.id/' >https://perbanas.id</a> terlebih dahulu";
		echo "Referer kosong. Akses ditolak. silahkan ke <a href='' >https://perbanas.id</a> terlebih dahulu";
		exit;
	}

	$referer_host = parse_url($_SERVER['HTTP_REFERER'], PHP_URL_HOST);

	if (!in_array($referer_host, $allowed_domains)) {
		echo "Referer tidak valid: " . $referer_host;
		exit;
	}
	*/

   ini_set('display_errors',0);
   //Load Configuration
	require_once 'config/configuration.class.php';
	$cfg = new Configuration();

   if(!file_exists('config/base.conf.php'))
      header("location:../install/");
   else
      $cfg->Load('base.conf.php');

	//Load Library Class
	require_once $cfg->GetValue('app_lib') . 'adodb/adodb.inc.php';
	require_once $cfg->GetValue('app_lib') . 'pat_template/pat_template.php';
	#require_once $cfg->GetValue('app_lib') . 'pat_template_v3/pat_template.php';
   require_once $cfg->GetValue('app_lib') . 'nusoap/nusoap.php';

   //Load Application Class
	require_once $cfg->GetValue('app_data') . 'user_identity.class.php';
	require_once $cfg->GetValue('app_data') . 'security.class.php';
	require_once $cfg->GetValue('app_data') . 'role.class.php';
	require_once $cfg->GetValue('app_data') . 'links.class.php';

	require_once $cfg->GetValue('app_proc') . 'error.class.php';

	$valid = false;
	session_start();

	/*
		pModule : Nama Module
		pSub : Sub Module. Ex : di Module Manajemen User, ada Sub Modul Kategori User
		pAct: Prefix Sub Module. Ex : View, Add, Edit, atau lainnya..
	*/
   $mustCheckSession = false;
	if (isset($_REQUEST['pModule']) && isset($_REQUEST['pAct']) && isset($_REQUEST['pSub'])) {
      $fileStatus = $cfg->GetPage($_REQUEST['pModule'], $_REQUEST['pSub'], $_REQUEST['pAct']);

		$valid = true;
      $module = $cfg->Dec($_REQUEST['pModule']);

      if ($cfg->Dec($_REQUEST['pSub']) == "logout") {
         require_once $fileStatus;
      }elseif ($module != "login" AND $module != "error" ) {
         $mustCheckSession = true;
      }
	} else {
		$fileStatus = $cfg->ForcePageTo('login', 'login', 'view');
		$valid = true;
	}

 // echo "masuk sisni "; exit;

   if (false !== $valid){
   	if (false == $fileStatus) {
         $security = new Security($cfg);
            //echo "denied file status"  ;
			$security->DenyPageAccess();
		} else {
         if ($mustCheckSession === true){
			if(strpos($fileStatus,'view_hasil_kuisioner.php')!==False) require_once $fileStatus;
			else {
				$security = new Security($cfg);
				if (true === $security->IsSessionExpired()) {
				   //echo "session expired access"  ;
				   $security->SessionExpiredAccess();
				} else
				   require_once $fileStatus;
			}
         }else
			   require_once $fileStatus;
		}
	} else {
      //echo "denied bawah"  ;
		$security->DenyPageAccess();
	}
?>