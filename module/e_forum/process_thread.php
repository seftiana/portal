<?php
   
   // Load application class
   require_once $cfg->GetValue("app_proc") . "display_base.class.php" ;
   require_once $cfg->GetValue("app_proc") . "display_base_full.class.php" ;
   require_once $cfg->GetValue("app_service") . "client/base_client.service.class.php";
   require_once $cfg->GetValue('app_proc') . 'process_base.class.php';
   
   // Load module class
   require_once $cfg->GetValue("app_module") . "e_forum/communication/thread_client.service.class.php" ;
   require_once $cfg->GetValue("app_module") . "e_forum/display/process_thread.class.php" ;    
   
   $ThisPageAccessRight = "ELEARNINGADM | MAHASISWA | DOSEN";
   $security = new Security($cfg);
   
   if (false !== $security->CheckAccessRight($ThisPageAccessRight)){
		
         $app = new ProcessThread($cfg, $security);     
      $action = "";
      $action = $cfg->Dec($_GET['act']);
      if ($action == 'insert') {
         $thrdJudul = $_POST['judul_thread'];
         $forumId = $_POST['forum_id'];
         $postPesan = $_POST['pesan']; 
         $app->DoInsertThread($thrdJudul, $forumId);
         $app->DoInsertPost('', $postPesan);
         header("Location: " . $cfg->GetURL('e_forum','thread','view')."&forum_id=".$cfg->Enc($forumId));
      }else if ($action == 'delete') {  
         $thrdId = $cfg->Dec($_GET['thread_id']);
         $app->DoDeleteThread($thrdId);
         header("Location: " . $cfg->GetURL('e_forum','thread','view')."&forum_id=".$_GET['forum_id']);
      }else if ($action == 'update') {
         $frmId = $_POST['forum_id'];
         $thrdId = $_POST['thread_id'];
         $thrdJudul = $_POST['judul_thread'];          
         $app->DoUpdateThread($thrdId, $thrdJudul);
         header("Location: " . $cfg->GetURL('e_forum','thread','view')."&forum_id=".$cfg->Enc($frmId));
      }
   }else{
      $security->DenyPageAccess();
   }
   
?>