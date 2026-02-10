<?php
   //Load Application Class
   require_once $cfg->GetValue('app_proc') . 'display_base.class.php';
   require_once $cfg->GetValue('app_proc') . 'display_base_popup.class.php';
   require_once $cfg->GetValue('app_data') . 'database_connected.class.php';
   // Load service 
   require_once $cfg->GetValue("app_service") . "client/base_client.service.class.php";
   require_once $cfg->GetValue("app_service") . "client/sia/sia_setting_client.service.class.php";
   require_once $cfg->GetValue("app_module") . "dosen/communication/dosen_client.service.class.php" ;
   // Load Module Class  
   require_once $cfg->GetValue('app_module') . 'konsul/display/display_popup_address_book.class.php';
   require_once $cfg->GetValue('app_module') . 'konsul/business/konsul.class.php';
   
   
   $ThisPageAccessRight = "ADMINISTRASI | ADMINUNIT | MAHASISWA | DOSEN | KEPENDIDIKAN | UMUM | MAHASISWA_KBK | DOSEN_KBK";
   $security = new Security($cfg);
   //echo("<pre>");print_r($_POST);echo("</pre>");exit;
   if (false !== $security->CheckAccessRight($ThisPageAccessRight)){
      
      // Search By Niu
      $searchNiuKey = 'off';
      if (isset($_POST['chk']['niu']))
         $searchNiuKey = $_POST['searchKey']['niu'];

      if (isset($_GET['searchNiuKey']))
         $searchNiuKey = $cfg->Dec($_GET['searchNiuKey']);
         
      // Search By Nama
      $searchNamaKey = 'off';
      if (isset($_POST['chk']['nama']))
         $searchNamaKey = $_POST['searchKey']['nama'];
      
      if (isset($_GET['searchNamaKey']))
         $searchNamaKey = $cfg->Dec($_GET['searchNamaKey']);
         
      
      $searchFakultasKey = 'off';
      if (isset($_POST['chk']['prodi']))
         $searchFakultasKey = $_POST['searchKey']['prodi'];
         
      if (isset($_GET['searchFakultasKey']))
         $searchFakultasKey = $cfg->Dec($_GET['searchFakultasKey']);
         
      // untuk list teman
      $niuPemilik = NULL;
      if (isset($_GET['niuPemilik']))
         $niuPemilik = $cfg->Dec($_GET['niuPemilik']);
      
      // untuk paging daftar address book tersedia
      $page = "1";
      if (isset($_GET['page']))
         $page = $cfg->Dec($_GET['page']);
         
      $errMsg = NULL;
      if (isset($_GET['errMsg']))
         $errMsg = $cfg->Dec($_GET['errMsg']);
      
      $errType = NULL;
      if (isset($_GET['errType']))
         $errType = $cfg->Dec($_GET['errType']);
         
      //echo $searchNiuKey.' '.$searchNamaKey.' '.$searchFakultasKey;
      
      $ThisPage = new DisplayPopupAddressBook($cfg, $security, $searchNiuKey, $searchNamaKey,$searchFakultasKey, $page, $niuPemilik, $errMsg, $errType);
      $ThisPage->Display();
   }else{
      
      $security->DenyPageAccess();
   }
   
   
?>