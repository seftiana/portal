<?php
   
   // Load Application Process Class      
   require_once $cfg->GetValue('app_proc') . 'process_base.class.php';

   // Load Core Business Class
   require_once $cfg->GetValue('app_data') . 'database_connected.class.php';
   
   // Load Module Process Class
   require_once $cfg->GetValue('app_module') . 'forum/display/process_forum.class.php';
      
   // Load Module Business Class   
   require_once $cfg->GetValue('app_module') . 'forum/business/forum.class.php';

   $ThisPageAccessRight = "ADMINISTRASI | MAHASISWA | DOSEN | MAHASISWA_KBK | DOSEN_KBK";

   $security = new Security($cfg);

   if (false !== $security->CheckAccessRight($ThisPageAccessRight)) {
      $app = New ProcessForum($cfg);
      
      // add kategori for admin only
      if($_POST['act'] == 'doAddKategori') {         
         $result = $app->AddKategoriItem($_POST['data']);            
         if(false === $result) {
            $errorMsg = $cfg->Enc($app->GetProperty("ProcessErrorMessage"));
            $errorType = $cfg->Enc('warning');
            header("Location: " . $cfg->GetURL('forum', 'kategori', 'view') . '&err=' . $errorMsg . '&errType=' . $errorType);
            exit();
         }
         else {
            $errorMsg = $cfg->Enc($app->GetProperty("ProcessErrorMessage"));
            $errorType = $cfg->Enc('info');
            header("Location: " . $cfg->GetURL('forum', 'kategori', 'view') . '&err=' . $errorMsg . '&errType=' . $errorType);
            exit();
         }         
      }
      //modify kategori ->delete & update
      elseif($_POST['act'] == 'modifyKategori') {
         if($_POST['mdfyBtn'] == 'Ubah') {            
            header("Location: " . $cfg->GetURL('forum', 'kategori', 'update') . '&katid=' . $_POST['data']['ForumKategoriId']);
            exit();
         }
         elseif($_POST['mdfyBtn'] == 'Hapus') {
            $_POST['data']['ForumKategoriId'] = $cfg->Dec($_POST['data']['ForumKategoriId']);
            $result = $app->DeleteKategoriItem($_POST['data']);            
            if(false === $result) {
               $errorMsg = $cfg->Enc($app->GetProperty("ProcessErrorMessage"));
               $errorType = $cfg->Enc('warning');
               header("Location: " . $cfg->GetURL('forum', 'kategori', 'view') . '&err=' . $errorMsg . '&errType=' . $errorType);
               exit();
            }
            else {
               $errorMsg = $cfg->Enc($app->GetProperty("ProcessErrorMessage"));
               $errorType = $cfg->Enc('info');
               header("Location: " . $cfg->GetURL('forum', 'kategori', 'view') . '&err=' . $errorMsg . '&errType=' . $errorType);
               exit();
            }
         }
      }
      // do update kategori
      elseif($_POST['act'] == 'doUpdateKategori') {
         if(isset($_POST['cnclBtn'])) {
            header("Location: " . $cfg->GetURL('forum', 'kategori', 'view'));
            exit();
         }
         else {
            $tmpKatId = $_POST['data']['ForumKategoriId'];
            $_POST['data']['ForumKategoriId'] = $cfg->Dec($_POST['data']['ForumKategoriId']);
            $result = $app->UpdateKategoriItem($_POST['data']);            
            if(false === $result) {
               $errorMsg = $cfg->Enc($app->GetProperty("ProcessErrorMessage"));
               $errorType = $cfg->Enc('warning');
               header("Location: " . $cfg->GetURL('forum', 'kategori', 'update') . '&katid=' . $tmpKatId . '&err=' . $errorMsg . '&errType=' . $errorType);
               exit();
            }
            else {
               $errorMsg = $cfg->Enc($app->GetProperty("ProcessErrorMessage"));
               $errorType = $cfg->Enc('info');
               header("Location: " . $cfg->GetURL('forum', 'kategori', 'view') . '&err=' . $errorMsg . '&errType=' . $errorType);
               exit();
            }
         }
      }
      // do add topik
      elseif($_POST['act'] == 'doAddTopik') {
         $tmpKategoriId = $_POST['data']['ForumKategoriId'];
         if(!empty($_POST['forumHakAkses'])) {
            for($i = 0; $i < count($_POST['forumHakAkses']); $i++) {
               $_POST['forumHakAkses'][$i] = $cfg->Dec($_POST['forumHakAkses'][$i]);
            }
         }
         else         
            $_POST['forumHakAkses'] = array();
            
         for($i = 0; $i < count($_POST['forumHakAksesAll']); $i++) {
            $_POST['forumHakAksesAll'][$i] = $cfg->Dec($_POST['forumHakAksesAll'][$i]);
         }
         $_POST['data']['ForumKategoriId'] = $cfg->Dec($_POST['data']['ForumKategoriId']);
         $result = $app->AddTopikItem($_POST['data'], $_POST['forumHakAkses'], $_POST['forumHakAksesAll']);            
         if(false === $result) {
            $errorMsg = $cfg->Enc($app->GetProperty("ProcessErrorMessage"));
            $errorType = $cfg->Enc('warning');
            header("Location: " . $cfg->GetURL('forum', 'topik', 'view') . '&katid=' . $tmpKategoriId . '&err=' . $errorMsg . '&errType=' . $errorType);
            exit();
         }
         else {
            $errorMsg = $cfg->Enc($app->GetProperty("ProcessErrorMessage"));
            $errorType = $cfg->Enc('info');
            header("Location: " . $cfg->GetURL('forum', 'topik', 'view') . '&katid=' . $tmpKategoriId . '&err=' . $errorMsg . '&errType=' . $errorType);
            exit();
         }
      }
      // do delete topik
      elseif($_POST['act'] == 'modifyTopik') {         
         if($_POST['mdfyBtn'] == 'Ubah') {            
            header("Location: " . $cfg->GetURL('forum', 'topik', 'update') . '&katid=' . $_POST['data']['ForumKategoriId'] . '&topid=' . $_POST['data']['ForumTopikId']);
            exit();
         }
         elseif($_POST['mdfyBtn'] == 'Hapus') {
            $_POST['data']['ForumTopikId'] = $cfg->Dec($_POST['data']['ForumTopikId']);
            $result = $app->DeleteTopikItem($_POST['data']['ForumTopikId']);            
            if(false === $result) {
               $errorMsg = $cfg->Enc($app->GetProperty("ProcessErrorMessage"));               
               $errorType = $cfg->Enc('warning');
               header("Location: " . $cfg->GetURL('forum', 'topik', 'view') . '&katid=' . $_POST['data']['ForumKategoriId'] . '&err=' . $errorMsg . '&errType=' . $errorType);
               exit();
            }
            else {
               $errorMsg = $cfg->Enc($app->GetProperty("ProcessErrorMessage"));               
               $errorType = $cfg->Enc('info');
               header("Location: " . $cfg->GetURL('forum', 'topik', 'view') . '&katid=' . $_POST['data']['ForumKategoriId'] . '&err=' . $errorMsg . '&errType=' . $errorType);
               exit();
            }
         }
      }
      // do update topik
      elseif($_POST['act'] == 'doUpdateTopik') {
         if(isset($_POST['cnclBtn'])) {
            header("Location: " . $cfg->GetURL('forum', 'topik', 'view') . '&katid=' . $_POST['forumKategoriId']);
            exit();
         }
         else {
            $tmpTopikId = $_POST['data']['ForumTopikId'];
            if(!empty($_POST['forumHakAkses'])) {
               for($i = 0; $i < count($_POST['forumHakAkses']); $i++) {
                  $_POST['forumHakAkses'][$i] = $cfg->Dec($_POST['forumHakAkses'][$i]);
               }
            }
            else         
               $_POST['forumHakAkses'] = array();
            
            for($i = 0; $i < count($_POST['forumHakAksesAll']); $i++) {
               $_POST['forumHakAksesAll'][$i] = $cfg->Dec($_POST['forumHakAksesAll'][$i]);
            }
            $_POST['data']['ForumTopikId'] = $cfg->Dec($_POST['data']['ForumTopikId']); 
            $result = $app->UpdateTopikItem($_POST['data'], $_POST['forumHakAkses'], $_POST['forumHakAksesAll']);                        
            if(false === $result) {
               $errorMsg = $cfg->Enc($app->GetProperty("ProcessErrorMessage")); 
               $errorType = $cfg->Enc('warning');
               header("Location: " . $cfg->GetURL('forum', 'topik', 'update') . '&katid=' . $_POST['forumKategoriId'] . '&topid=' . $tmpTopikId . '&err=' . $errorMsg . '&errType=' . $errorType);
               exit();
            }
            else {
               $errorMsg = $cfg->Enc($app->GetProperty("ProcessErrorMessage")); 
               $errorType = $cfg->Enc('info');
               header("Location: " . $cfg->GetURL('forum', 'topik', 'view') . '&katid=' . $_POST['forumKategoriId'] . '&err=' . $errorMsg . '&errType=' . $errorType);
               exit();
            }
         }
      }
      // do add thread
      elseif($_POST['act'] == 'doAddThread') {
         $tmpTopikId = $_POST['data']['ForumTopikId'];
         $_POST['data']['ForumTopikId'] = $cfg->Dec($_POST['data']['ForumTopikId']);
         $result = $app->AddThreadItem($_POST['data']);                     
         if(false === $result) {
            $errorMsg = $cfg->Enc($app->GetProperty("ProcessErrorMessage"));
            $errorType = $cfg->Enc('warning');
            header("Location: " . $cfg->GetURL('forum', 'thread', 'view') . '&katid=' . $_POST['forumKategoriId'] . '&topid=' . $tmpTopikId . '&err=' . $errorMsg . '&errType=' . $errorType);
            exit();
         }
         else {
            // redirect to reply post when user finished create new thread
            $currThreadId = $app->GetMaxThreadId();
            if(false === $currThreadId) 
               die('Proses tidak bisa dilanjutkan karena'.$app->GetProperty("ProcessErrorMessage"));
            else {
               header("Location: " . $cfg->GetURL('forum', 'post', 'reply') . '&katid=' . $_POST['forumKategoriId'] . '&topid=' . $tmpTopikId . '&thrdid=' . $cfg->Enc($currThreadId));
               exit();
            }            
         } 
      }
      // do delete thread for admin only
      elseif($_POST['act'] == 'modifyThread') {
         if($_POST['mdfyBtn'] == 'Ubah') {            
            header("Location: " . $cfg->GetURL('forum', 'thread', 'update') . '&katid=' . $_POST['forumKategoriId'] . '&topid=' . $_POST['forumTopikId'] . '&thrdid=' . $_POST['data']['ForumThreadId']);
            exit();
         }
         elseif($_POST['mdfyBtn'] == 'Hapus') {            
            $_POST['data']['ForumThreadId'] = $cfg->Dec($_POST['data']['ForumThreadId']);
            $result = $app->DeleteThreadItem($_POST['data']);            
            if(false === $result) {
               $errorMsg = $cfg->Enc($app->GetProperty("ProcessErrorMessage"));               
               $errorType = $cfg->Enc('warning');
               header("Location: " . $cfg->GetURL('forum', 'thread', 'view') . '&katid=' . $_POST['forumKategoriId'] . '&topid=' . $_POST['forumTopikId'] . '&err=' . $errorMsg . '&errType=' . $errorType);
               exit();
            }
            else {
               $errorMsg = $cfg->Enc($app->GetProperty("ProcessErrorMessage"));               
               $errorType = $cfg->Enc('info');
               header("Location: " . $cfg->GetURL('forum', 'thread', 'view') . '&katid=' . $_POST['forumKategoriId'] . '&topid=' . $_POST['forumTopikId'] . '&err=' . $errorMsg . '&errType=' . $errorType);
               exit();
            }
         }
      }
      //do update thread
      elseif($_POST['act'] == 'doUpdateThread') {         
         if(isset($_POST['cnclBtn'])) {
            header("Location: " . $cfg->GetURL('forum', 'thread', 'view') . '&katid=' . $_POST['forumKategoriId'] . '&topid=' . $_POST['forumTopikId']);
            exit();
         }
         else {
            $tmpThreadId = $_POST['data']['ForumThreadId'];
            $_POST['data']['ForumThreadId'] = $cfg->Dec($_POST['data']['ForumThreadId']);
            $result = $app->UpdateThreadItem($_POST['data']);            
            if(false === $result) {
               $errorMsg = $cfg->Enc($app->GetProperty("ProcessErrorMessage"));  
               $errorType = $cfg->Enc('warning');               
               header("Location: " . $cfg->GetURL('forum', 'thread', 'update') . '&katid=' . $_POST['forumKategoriId'] . '&topid=' . $_POST['forumTopikId'] . '&thrdid=' . $tmpThreadId . '&err=' . $errorMsg . '&errType=' . $errorType);
               exit();
            }
            else {
               $errorMsg = $cfg->Enc($app->GetProperty("ProcessErrorMessage"));  
               $errorType = $cfg->Enc('info'); 
               header("Location: " . $cfg->GetURL('forum', 'thread', 'view') . '&katid=' . $_POST['forumKategoriId'] . '&topid=' . $_POST['forumTopikId'] . '&err=' . $errorMsg . '&errType=' . $errorType);
               exit();
            }
         }
      }
      //do add post
      elseif($_POST['act'] == 'doAddPost') {         
         if(isset($_POST['cnclBtn'])) {
            header("Location: " . $cfg->GetURL('forum', 'post', 'view') . '&katid=' . $_POST['forumKategoriId'] . '&topid=' . $_POST['forumTopikId'] . '&thrdid=' . $_POST['data']['ForumThreadId']);
            exit();
         }
         else {
            $tmpThreadId = $_POST['data']['ForumThreadId'];
            $_POST['data']['ForumThreadId'] = $cfg->Dec($_POST['data']['ForumThreadId']);
            $_POST['data']['ForumPostUserId'] = $security->mUserIdentity->GetProperty("User");
            $_POST['data']['ForumTopikId'] = $cfg->Dec($_POST['forumTopikId']);
            $result = $app->AddPostItem($_POST['data']); 
            if(false === $result) {
               $errorMsg = $cfg->Enc($app->GetProperty("ProcessErrorMessage"));  
               $errorType = $cfg->Enc('warning'); 
               header("Location: " . $cfg->GetURL('forum', 'post', 'reply') . '&katid=' . $_POST['forumKategoriId'] . '&topid=' . $_POST['forumTopikId'] . '&thrdid=' . $tmpThreadId . '&err=' . $errorMsg . '&errType=' . $errorType);
               exit();
            }
            else {
               $errorMsg = $cfg->Enc($app->GetProperty("ProcessErrorMessage"));  
               $errorType = $cfg->Enc('info'); 
               header("Location: " . $cfg->GetURL('forum', 'post', 'view') . '&katid=' . $_POST['forumKategoriId'] . '&topid=' . $_POST['forumTopikId'] . '&thrdid=' . $tmpThreadId . '&err=' . $errorMsg . '&errType=' . $errorType);
               exit();
            } 
         }         
      }
      // do reply post
      elseif($_POST['act'] == 'replyPost') {         
         if($_POST['btnReply'] == 'Reply') {
            header("Location: " . $cfg->GetURL('forum', 'post', 'reply') . '&katid=' . $_POST['forumKategoriId'] . '&topid=' . $_POST['forumTopikId'] . '&thrdid=' . $_POST['forumThreadId']. '&postid=' . $_POST['forumPostId']);
            exit();
         }
         else {
            // do delete post            
            $postId = $cfg->Dec($_POST['forumPostId']);
            $threadId = $cfg->Dec($_POST['forumThreadId']);
            $result = $app->DoDeletePostItem($postId, $threadId);
            if(false === $result) {
               $errorMsg = $cfg->Enc($app->GetProperty("ProcessErrorMessage"));   
               $errorType = $cfg->Enc('warning');               
               header("Location: " . $cfg->GetURL('forum', 'post', 'view') . '&katid=' . $_POST['forumKategoriId'] . '&topid=' . $_POST['forumTopikId'] . '&thrdid=' . $_POST['forumThreadId'] . '&err=' . $errorMsg . '&errType=' . $errorType);
               exit();
            }
            else {
               $errorMsg = $cfg->Enc($app->GetProperty("ProcessErrorMessage"));   
               $errorType = $cfg->Enc('info'); 
               header("Location: " . $cfg->GetURL('forum', 'post', 'view') . '&katid=' . $_POST['forumKategoriId'] . '&topid=' . $_POST['forumTopikId'] . '&thrdid=' . $_POST['forumThreadId'] . '&err=' . $errorMsg . '&errType=' . $errorType);
               exit();
            }
         }         
      }
   }
   else{
      $security->DenyPageAccess();
   }
?>