<?php
   //Load Application Class
   require_once $cfg->GetValue('app_proc') . 'display_base.class.php';
   require_once $cfg->GetValue('app_proc') . 'display_base_popup.class.php';
   require_once $cfg->GetValue('app_data') . 'database_connected.class.php';
   
   // Load Module Class  
   require_once $cfg->GetValue('app_module') . 'reference/display/display_popup_program_studi.class.php';
   require_once $cfg->GetValue('app_module') . 'reference/business/reference.class.php';
   
   
   $ThisPageAccessRight = "ADMINISTRASI";
   $security = new Security($cfg);
   
   if (false !== $security->CheckAccessRight($ThisPageAccessRight)){
      $prodiKey = "";
      if (isset($_POST["prodiKey"])){
         $prodiKey = $_POST["prodiKey"];
      }else if (isset($_GET["prodiKey"])){
         $prodiKey = $cfg->Dec($_GET["prodiKey"]);
      }
      $page = "1";
      if (isset($_GET["page"])){
         $page = $cfg->Dec($_GET["page"]);
      }
      
      $ThisPage = new DisplayPopupProgramStudi($cfg, $security, $prodiKey, $page);
      $ThisPage->Display();
   }else{
      
      $security->DenyPageAccess();
   }
   
   
?>