<?php       
   // Load Application Process Class
   require_once $cfg->GetValue('app_proc') . 'process_base.class.php';

   // Load Application Business Class
   require_once $cfg->GetValue('app_data') . 'database_connected.class.php';

   // Load Business Module Class   
   require_once $cfg->GetValue('app_module') . 'login/business/gatekeeper.class.php';   
   
   // Load Process Module Class
   require_once $cfg->GetValue('app_module') . 'login/display/proses_login.class.php';
   $objProsesLogin = new ProsesLogin($cfg);
   $security = new Security($cfg, true);
   $userName = '';
   if (isset ($security->mUserIdentity->mUser)) {
      $userName= $security->mUserIdentity->GetProperty('User');
   } else {
      if (isset($_GET['uname'])){
         $userName= $cfg->Dec($_GET['uname']);
      }
   }
 //echo $userName;exit;
   if (false !== $objProsesLogin->DoLogout($userName)){
      session_destroy();
      header("Location: index.php");
   }else{
      die ("Proses logout tidak berhasil.");
   }
   
?>