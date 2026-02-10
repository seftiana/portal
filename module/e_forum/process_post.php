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
      $action = "";
      $action = $cfg->Dec($_GET['act']);
      $app = new ProcessThread($cfg, $security); 
      if ($action == 'insert') {    
         $threadId = $_POST['thread_id'];
         $postPesan = $_POST['pesan']; 
         $app->DoInsertPost($threadId, $postPesan);
         header("Location: " . $cfg->GetURL('e_forum','post','view')."&thread_id=".$cfg->Enc($threadId));
      }else if ($action == 'delete') { 
         $postId = $cfg->Dec($_GET['post_id']);
         $thrdId = $cfg->Dec($_GET['thread_id']);
         $app->DoDeletePost($postId, $thrdId);
         header("Location: " . $cfg->GetURL('e_forum','post','view')."&thread_id=".$_GET['thread_id']);
      }
   }else{
      $security->DenyPageAccess();
   }
   
?>