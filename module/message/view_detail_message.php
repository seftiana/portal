<?php

   // Load Application Display Class	   
   require_once $cfg->GetValue('app_proc') . 'display_base.class.php';   
   require_once $cfg->GetValue('app_proc') . 'display_base_full.class.php';
   // Load Data Display Class
   require_once $cfg->GetValue('app_data') . 'database_connected.class.php';
   // Load Module display Class
   require_once $cfg->GetValue('app_module') . 'message/display/display_view_detail_message.class.php';
   require_once $cfg->GetValue('app_module') . 'message/business/message.class.php';
   

   $ThisPageAccessRight = "ADMINISTRASI | ADMINUNIT | MAHASISWA | DOSEN | KEPENDIDIKAN | UMUM | MAHASISWA_KBK | DOSEN_KBK";

   $security = new Security($cfg);

   if (false !== $security->CheckAccessRight($ThisPageAccessRight)) {
      $ThisPageLinks = $security->mUserIdentity->GetProperty("Role");      
      $lnk = new Links($cfg, $ThisPageLinks);
      
      $msgId = NULL;
      if (isset($_GET['msgId'])) 
         $msgId = $cfg->Dec($_GET['msgId']);
      
      $msgType = NULL;
      if (isset($_GET['msgType']))
         $msgType = $cfg->Dec($_GET['msgType']);
      
      $errAddrBook = NULL;
      if (isset($_GET['errAddrBook']))
         $errAddrBook = $cfg->Dec($_GET['errAddrBook']);
      
      $errType = NULL;
      if (isset($_GET['errType']))
         $errType = $cfg->Dec($_GET['errType']);
      
      $ThisPage = new DisplayViewDetailMessage($cfg, $security, $msgId, $msgType, $errAddrBook, $errType);
      $ThisPage->SetLinks($lnk);
      $ThisPage->Display();
   }
   else {
      $security->DenyPageAccess();
   }
?>