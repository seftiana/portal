<?php
	
   // Load Application Display Class	
   require_once $cfg->GetValue('app_proc') . 'display_base.class.php';
   require_once $cfg->GetValue('app_proc') . 'display_base_nolinks.class.php';
   // Load Module display Class	
   require_once $cfg->GetValue('app_module') . 'error/display/display_view_module_denied.class.php';
   
   
	$ThisPage = new DisplayViewErrorModuleDenied($cfg);
	$ThisPage->Display();
?>