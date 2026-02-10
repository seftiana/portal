<?php
   //Load Application Class
   require_once $cfg->GetValue('app_proc') . 'display_base.class.php';
   require_once $cfg->GetValue('app_proc') . 'display_base_full.class.php';
   require_once $cfg->GetValue('app_data') . 'database_connected.class.php';
   
   // Load Module Class  
   require_once $cfg->GetValue('app_module') . 'user/display/display_rstpassword_user.class.php';
   require_once $cfg->GetValue('app_module') . 'user/business/user.class.php';
   
   require_once $cfg->GetValue('app_module') . 'reference/business/reference.class.php';
   
   
   $ThisPageAccessRight = "ADMINISTRASI";
   $security = new Security($cfg);

   if (false !== $security->CheckAccessRight($ThisPageAccessRight)){
      $ThisPageLinks = $security->mUserIdentity->GetProperty("Role");      
      $lnk = new Links($cfg, $ThisPageLinks);
      
      $errMsg=NULL;
      if (isset($_GET["errMsg"]))
         $errMsg = $cfg->Dec($_GET["errMsg"]);
         
      $errType = NULL;
      if (isset($_GET['errType']))
         $errType = $cfg->Dec($_GET['errType']);
      
      $newPwd = NULL;
      if (isset($_GET['newPwd']))
         $newPwd = $cfg->Dec($_GET['newPwd']);
      $ThisPage = new DisplayResetPasswordUser($cfg, $security, $cfg->Dec($_GET["id"]), $cfg->Dec($_GET["key"]), $errMsg, $errType, $newPwd);
      $ThisPage->SetLinks($lnk);
      $ThisPage->Display();
   }else{
      $security->DenyPageAccess();
   }
   
   
?>