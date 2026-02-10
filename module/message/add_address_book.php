<?php
   //Load Application Class
   require_once $cfg->GetValue('app_proc') . 'display_base.class.php';
   require_once $cfg->GetValue('app_proc') . 'display_base_popup.class.php';
   require_once $cfg->GetValue('app_data') . 'database_connected.class.php';
   
   // Load Module Class  
   require_once $cfg->GetValue('app_module') . 'message/display/display_add_address_book.class.php';
   require_once $cfg->GetValue('app_module') . 'message/business/message.class.php';
   
   require_once $cfg->GetValue('app_module') . 'user/business/user.class.php';
   
   
   $ThisPageAccessRight = "ADMINISTRASI | ADMINUNIT | MAHASISWA | DOSEN | KEPENDIDIKAN | UMUM | MAHASISWA_KBK | DOSEN_KBK";
   $security = new Security($cfg);
   //echo("<pre>");print_r($_POST);echo("</pre>");exit;
   if (false !== $security->CheckAccessRight($ThisPageAccessRight)){
      
      // Search By Niu
      $searchNiuKey = 'off';
      if (isset($_POST['chk']['niu']))
         $searchNiuKey = $_POST['searchNiuKey'];
         
      if (isset($_GET['searchNiuKey']))
         $searchNiuKey = $cfg->Dec($_GET['searchNiuKey']);

      // Search By Nama
      $searchNamaKey = 'off';
      if (isset($_POST['chk']['nama']))
         $searchNamaKey = $_POST['searchNamaKey'];
      
      if (isset($_GET['searchNamaKey']))
         $searchNamaKey = $cfg->Dec($_GET['searchNamaKey']);
         
      // Search By Fakultas
      $searchFakultasKey = 'off';
      /*
      if (isset($_POST['chk']['fakultas']))
         $searchFakultasKey = $_POST['searchFakultasKey'];
      
      if (isset($_GET['searchFakultasKey']))
         $searchFakultasKey = $cfg->Dec($_GET['searchFakultasKey']);
      */
      if (isset($_POST['chk']['prodi']))
         $searchFakultasKey = $_POST['prodi'];
      
      if (isset($_GET['searchFakultasKey']))
         $searchFakultasKey = $cfg->Dec($_GET['searchFakultasKey']);     
         
      // untuk paging daftar user
      $page = 1;
      if (isset($_GET['page']))
         $page = $cfg->Dec($_GET['page']);
         
      $errMsg = NULL;
      if (isset($_GET['errMsg']))
         $errMsg = $cfg->Dec($_GET['errMsg']);
         
      $errType = NULL;
      if (isset($_GET['errType']))
         $errType = $cfg->Dec($_GET['errType']);
      //echo("<pre>");print_r($searchNamaKey);echo("</pre>");
      
      //echo $searchNiuKey.' '.$searchNamaKey.' '.$searchFakultasKey;
      $ThisPage = new DisplayAddAddressBook($cfg, $security, $searchNiuKey, $searchNamaKey,$searchFakultasKey, $page, $errMsg, $errType);
      $ThisPage->Display();
   }else{
      
      $security->DenyPageAccess();
   }
   
   
?>