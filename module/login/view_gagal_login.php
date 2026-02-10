<?php
	
   // Load Application Display Class	
   require_once $cfg->GetValue('app_proc') . 'display_base.class.php';   
   require_once $cfg->GetValue('app_proc') . 'display_base_nolinks.class.php';   
   //Load Module Class
	require_once $cfg->GetValue('app_module') . 'login/display/display_view_gagal_login.class.php';
   
	if(isset($_GET['errMsg']))
      $errMsg = $cfg->Dec($_GET['errMsg']);
   else
      $errMsg = NULL;
   
   $ThisPage = new DisplayViewGagalLogin($cfg, $errMsg);
	$ThisPage->Display();
      
?>