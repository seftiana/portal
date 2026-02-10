<?php
   
   // Load application class
   require_once $cfg->GetValue("app_proc") . "display_base.class.php" ;
   require_once $cfg->GetValue("app_proc") . "display_base_full.class.php" ;
   require_once $cfg->GetValue("app_service") . "client/base_client.service.class.php";
   require_once $cfg->GetValue('app_proc') . 'process_base.class.php';
   
   // Load module class
   require_once $cfg->GetValue("app_module") . "e_forum/communication/forum_client.service.class.php" ;
   require_once $cfg->GetValue("app_module") . "e_forum/display/process_forum.class.php" ;    
   
   $ThisPageAccessRight = "ELEARNINGADM | MAHASISWA | DOSEN";
   $security = new Security($cfg);
   
       
   if (false !== $security->CheckAccessRight($ThisPageAccessRight)){
      $action = "";
      $action = $cfg->Dec($_GET['act']);
		$app = new ProcessForum($cfg, $security);
		/*print_r($_POST);
		print_r($_GET);exit();*/
      if ($action == 'insert') {  
         $frmNama = $_POST['namaforum'];
         $frmMkId = $_POST['matkul'];
         $frmDesk = $_POST['deskripsi']; 
         $app->DoInsertForum($frmNama, $frmMkId, $frmDesk);
         header("Location: " . $cfg->GetURL('e_forum','forum','view'));
      }else if ($action == 'delete') {
         $frmId = $cfg->Dec($_GET['forum_id']);
         $app->DoDeleteForum($frmId);
         header("Location: " . $cfg->GetURL('e_forum','forum','view'));
      }else if ($action == 'update') {
         $frmId = $_POST['forumid'];
         $frmNama = $_POST['namaforum'];
         $frmDesk = $_POST['deskripsi'];          
         $app->DoUpdateForum($frmId, $frmNama, $frmDesk);
         header("Location: " . $cfg->GetURL('e_forum','forum','view'));
      }
   }else{
      $security->DenyPageAccess();
   }
   
?>