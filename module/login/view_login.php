<?php
	
   // Load Application Display Class	
   require_once $cfg->GetValue('app_proc') . 'display_base.class.php';
   require_once $cfg->GetValue('app_proc') . 'display_base_nolinks.class.php';   
   // Load Module display Class	
   require_once $cfg->GetValue('app_module') . 'login/display/display_view_login.class.php';

	$ThisPage = new DisplayViewLogin($cfg);
	$ThisPage->Display();
?>