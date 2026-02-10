<?php
	
   // Load Application Display Class	
   require_once $cfg->GetValue('app_proc') . 'display_base.class.php';
   require_once $cfg->GetValue('app_proc') . 'display_base_nolinks.class.php';
   // Load Module display Class	
   require_once $cfg->GetValue('app_module') . 'error/display/display_view_expired_session.class.php';
   
   $userName = '';
   if (isset($_GET['uname'])) {
      $userName = $_GET['uname'];
   }
   
	$ThisPage = new DisplayViewErrorExpiredSession($cfg, $userName);
	$ThisPage->Display();
?>