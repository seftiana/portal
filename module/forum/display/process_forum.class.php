<?php

   class ProcessForum extends ProcessBase
   {
      var $mDataForum;     
    
      var $mProcessErrorMessage;
      
      function ProcessForum(&$configObject)
      {
         ProcessBase::ProcessBase($configObject);
         $this->mDataForum = New Forum($configObject);
      }
      
      function SetAttributes($arrAttributes)
      {
         foreach($arrAttributes as $key => $value) {
            $this->mDataForum->SetProperty($key, $value);
         }
      }
      
      function AddKategoriItem($arrData)
      {
         if(empty($arrData['ForumKategoriTitle']) or empty($arrData['ForumKategoriDescription'])) {
            $this->SetProperty("ProcessErrorMessage", 'Semua entry harus diisi');
            return false;
         }
         else {
            $this->SetAttributes($arrData);
            $result = $this->mDataForum->DoAddKategoriItem();
            if (false === $result) {
               $this->SetProperty("ProcessErrorMessage", $this->mDataForum->GetProperty("ForumErrorMessage"));
               return false;
            }
            else {
               $this->SetProperty("ProcessErrorMessage", $this->mDataForum->GetProperty("ForumErrorMessage"));
               return true;
            }
         }         
      }
      
      function UpdateKategoriItem($arrData)
      {
         if(empty($arrData['ForumKategoriTitle']) or empty($arrData['ForumKategoriDescription'])) {
               $this->SetProperty("ProcessErrorMessage", 'Semua entry harus diisi');
               return false;
         }
         else {
            $this->SetAttributes($arrData);
            $result = $this->mDataForum->DoUpdateKategoriItem();
            if (false === $result) {
               $this->SetProperty("ProcessErrorMessage", $this->mDataForum->GetProperty("ForumErrorMessage"));
               return false;
            }
            else {
               $this->SetProperty("ProcessErrorMessage", $this->mDataForum->GetProperty("ForumErrorMessage"));
               return true;
            }
         }
      }
      
      function DeleteKategoriItem($arrData)
      {
         if(empty($arrData['ForumKategoriId'])) {
            $this->SetProperty("ProcessErrorMessage", 'Id kategori tidak ditemukan');
            return false;
         }
         else {
            $this->SetAttributes($arrData);
            $result = $this->mDataForum->DoDeleteKategoriItem();
            if (false === $result) {
               $this->SetProperty("ProcessErrorMessage", $this->mDataForum->GetProperty("ForumErrorMessage"));
               return false;
            }
            else {
               $this->SetProperty("ProcessErrorMessage", $this->mDataForum->GetProperty("ForumErrorMessage"));
               return true;
            }
         }         
      }
      
      function AddTopikItem($arrData, $arrGrantedAccessRights, $arrAccessRights)
      {         
         //print_r($arrData);exit;
         if(empty($arrData['ForumTopikTitle']) or empty($arrData['ForumTopikDescription']) or empty($arrData['ForumTopikModeratorId']) or empty($arrGrantedAccessRights)) {
            $this->SetProperty("ProcessErrorMessage", 'Semua entry harus diisi');
            return false;
         }
         else {
            if(!empty($arrGrantedAccessRights)) {
               // topik granted for spesific user role
               foreach($arrAccessRights as $key => $value) {
                  if(in_array($value, $arrGrantedAccessRights))
                     $arrAllowedRole[$value] = 'Y';
                  else
                     $arrAllowedRole[$value] = 'N';
               }
            }
            else {
               // topik granted for no one user role
               foreach($arrAccessRights as $key => $value) {                  
                  $arrAllowedRole[$value] = 'N';
               }
            }  
            $this->SetAttributes($arrData);
            // do connect here !!! :: why?? to facilitate transaction in one connection for more than one query
            if(!$this->mDataForum->Connect()) {            
               $dbErrorMsg = $this->mDataForum->GetProperty("DbErrorMessage");
               $this->SetProperty("ProcessErrorMessage", $dbErrorMsg);
               return false;
            }
            $this->mDataForum->mDbConnection->StartTrans();
            // first add topik
            $rsAddTopik = $this->mDataForum->DoAddTopikItem();
            if (false === $rsAddTopik) {
               $this->SetProperty("ProcessErrorMessage", $this->mDataForum->GetProperty("ForumErrorMessage"));
               return false;
            }
            else {
               // do add hak_akses for this topik
               $maxId = $this->GetMaxTopikId();
               if(false === $maxId) {               
                  return false;
               }
               else {
                  $resultHakAkses = $this->AddHakAksesTopik($maxId, $arrAllowedRole);
                  if(false === $resultHakAkses) {
                     return false;
                  }                  
               }
            }
            $this->mDataForum->mDbConnection->CompleteTrans();
            $this->mDataForum->Disconnect();
            $this->SetProperty("ProcessErrorMessage", "Proses penambahan topik berhasil");
            return true;
         }
      }
      
      function DeleteTopikItem($topikId)
      {
         if(empty($topikId)) {
            $this->SetProperty("ProcessErrorMessage", 'Id topik tidak ditemukan');
            return false;
         }
         else {
            $this->mDataForum->SetProperty("ForumTopikId", $topikId);
            $result = $this->mDataForum->DoDeleteTopikItem();
            if (false === $result) {
               $this->SetProperty("ProcessErrorMessage", $this->mDataForum->GetProperty("ForumErrorMessage"));
               return false;
            }
            else {
               $this->SetProperty("ProcessErrorMessage", $this->mDataForum->GetProperty("ForumErrorMessage"));
               return true;
            }
         }         
      }
      
      function UpdateTopikItem($arrData, $arrGrantedAccessRights, $arrAccessRights)
      {         
         //print_r($arrData);exit;
         if(empty($arrData['ForumTopikTitle']) or empty($arrData['ForumTopikDescription']) or empty($arrData['ForumTopikModeratorId']) or empty($arrGrantedAccessRights)) {
            $this->SetProperty("ProcessErrorMessage", 'Semua entry harus diisi');
            return false;
         }
         else {
            if(!empty($arrGrantedAccessRights)) {
               // topik granted for spesific user role
               foreach($arrAccessRights as $key => $value) {
                  if(in_array($value, $arrGrantedAccessRights))
                     $arrAllowedRole[$value] = 'Y';
                  else
                     $arrAllowedRole[$value] = 'N';
               }
            }
            else {
               // topik granted for no one user role
               foreach($arrAccessRights as $key => $value) {                  
                  $arrAllowedRole[$value] = 'N';
               }
            }              
            $this->SetAttributes($arrData);
            // do connect here !!! :: why?? to facilitate transaction in one connection for more than one query
            if(!$this->mDataForum->Connect()) {            
               $dbErrorMsg = $this->mDataForum->GetProperty("DbErrorMessage");
               $this->SetProperty("ProcessErrorMessage", $dbErrorMsg);
               return false;
            }
            $this->mDataForum->mDbConnection->StartTrans();
            // first update topik
            $rsUpdTopik = $this->mDataForum->DoUpdateTopikItem();
            if (false === $rsUpdTopik) {
               $this->SetProperty("ProcessErrorMessage", $this->mDataForum->GetProperty("ForumErrorMessage"));
               return false;
            }
            else {
               // do delete hak_akses for this topik, then insert again with new one                              
               $rsDelHakAkses = $this->mDataForum->DoDeleteHakAksesTopik();
               if(false === $rsDelHakAkses) {
                  $this->SetProperty("ProcessErrorMessage", $this->mDataForum->GetProperty("ForumErrorMessage"));                  
                  return false;
               }                          
               else {
                  $resultHakAkses = $this->AddHakAksesTopik($arrData['ForumTopikId'], $arrAllowedRole);
                  if(false === $resultHakAkses) {
                     $this->SetProperty("ProcessErrorMessage", $this->mDataForum->GetProperty("ForumErrorMessage"));                  
                     return false;
                  }
               }
            }
            $this->mDataForum->mDbConnection->CompleteTrans();
            $this->mDataForum->Disconnect();
            $this->SetProperty("ProcessErrorMessage", "Proses pengubahan topik berhasil");                  
            return true;
         }
      }
      
      function GetMaxTopikId()
      {
         $result = $this->mDataForum->GetMaximumTopikId();
         if (false === $result) {
            $this->SetProperty("ProcessErrorMessage", $this->mDataForum->GetProperty("ForumErrorMessage"));
            return false;
         }
         else {            
            $this->SetProperty("ProcessErrorMessage", "");
            return $result;
         }
      }
      
      function AddHakAksesTopik($topikId, $arrHakAkses)
      {
         foreach($arrHakAkses as $key => $value) {
            $this->mDataForum->SetProperty("ForumTopikId", $topikId);
            $this->mDataForum->SetProperty("ForumUserRole", $key);
            $this->mDataForum->SetProperty("ForumTopikHakAkses", $value);
            $result = $this->mDataForum->DoAddHakAksesTopik();
            if (false === $result) {
               $this->SetProperty("ProcessErrorMessage", $this->mDataForum->GetProperty("ForumErrorMessage"));
               return false;
            }
            else {            
               $this->SetProperty("ProcessErrorMessage", "");               
            }
         }
         return true;
      }
      
      function AddThreadItem($arrData)
      {         
         if(empty($arrData['ForumThreadTitle'])) {
            $this->SetProperty("ProcessErrorMessage", 'Semua entry harus diisi');
            return false;
         }
         else {
            $this->SetAttributes($arrData);
            $result = $this->mDataForum->DoAddThreadItem();
            if (false === $result) {
               $this->SetProperty("ProcessErrorMessage", $this->mDataForum->GetProperty("ForumErrorMessage"));
               return false;
            }
            else {
               $this->SetProperty("ProcessErrorMessage", "");
               return true;
            }
         }
      }
      
      function UpdateThreadItem($arrData)
      {         
         if(empty($arrData['ForumThreadId'])) {
            $this->SetProperty("ProcessErrorMessage", 'Id Thread tidak ditemukan dalam form');
            return false;
         }
         elseif(empty($arrData['ForumThreadTitle'])) {
            $this->SetProperty("ProcessErrorMessage", 'Semua entry harus diisi');
            return false;
         }
         else {
            $this->SetAttributes($arrData);
            $result = $this->mDataForum->DoUpdateThreadItem();
            if (false === $result) {
               $this->SetProperty("ProcessErrorMessage", $this->mDataForum->GetProperty("ForumErrorMessage"));
               return false;
            }
            else {
               $this->SetProperty("ProcessErrorMessage", $this->mDataForum->GetProperty("ForumErrorMessage"));
               return true;
            }
         }
      }
      
      function DeleteThreadItem($arrData)
      {         
         if(empty($arrData['ForumThreadId'])) {
            $this->SetProperty("ProcessErrorMessage", 'Id Thread tidak ditemukan');
            return false;
         }
         else {
            $this->SetAttributes($arrData);
            $result = $this->mDataForum->DoDeleteThreadItem();
            if (false === $result) {
               $this->SetProperty("ProcessErrorMessage", $this->mDataForum->GetProperty("ForumErrorMessage"));
               return false;
            }
            else {
               $this->SetProperty("ProcessErrorMessage", $this->mDataForum->GetProperty("ForumErrorMessage"));
               return true;
            }
         }
      }
      
      function GetMaxThreadId()
      {
         $result = $this->mDataForum->GetMaximumThreadId();
         if (false === $result) {
            $this->SetProperty("ProcessErrorMessage", $this->mDataForum->GetProperty("ForumErrorMessage"));
            return false;
         }
         else {            
            $this->SetProperty("ProcessErrorMessage", "");
            return $result;
         }
      }
      
      function AddPostItem($arrData)
      {
         //print_r($arrData);exit;
         if(empty($arrData['ForumThreadId'])) {
            $this->SetProperty("ProcessErrorMessage", 'Thread id tidak ditemukan dalam form');
            return false;
         }         
         elseif(empty($arrData['ForumPostTitle']) or empty($arrData['ForumPostContent'])) {
            $this->SetProperty("ProcessErrorMessage", 'Semua entry harus diisi');
            return false;
         }
         else {            
            $this->SetAttributes($arrData);
            // do connect here !!! :: why?? to facilitate transaction in one connection for more than one query
            if(!$this->mDataForum->Connect()) {            
               $dbErrorMsg = $this->mDataForum->GetProperty("DbErrorMessage");
               $this->SetProperty("ProcessErrorMessage", $dbErrorMsg);
               return false;
            }
            $this->mDataForum->mDbConnection->StartTrans();
            // first add post
            $result = $this->mDataForum->DoAddPostItem();            
            if (false === $result) {
               $this->SetProperty("ProcessErrorMessage", $this->mDataForum->GetProperty("ForumErrorMessage"));
               return false;
            }
            else {
               // do update lastpost dan jumlah post untuk thread dan user who has posted
               $rsLastPostThread = $this->mDataForum->DoUpdateLastPostThreadItem();
               if(false === $rsLastPostThread) {
                  $this->SetProperty("ProcessErrorMessage", $this->mDataForum->GetProperty("ForumErrorMessage"));
                  return false;
               }
               else {
                  $rsSumOfPostThread = $this->mDataForum->DoUpdateSumOfPostThreadItem('plus');
                  if(false === $rsSumOfPostThread) {
                     $this->SetProperty("ProcessErrorMessage", $this->mDataForum->GetProperty("ForumErrorMessage"));
                     return false;
                  }
                  else {
                     $rsUserPostThread = $this->mDataForum->DoUpdateUserPostThreadItem();
                     if(false === $rsUserPostThread) {
                        $this->SetProperty("ProcessErrorMessage", $this->mDataForum->GetProperty("ForumErrorMessage"));
                        return false;
                     }
                     else {
                        // do update lastpost untuk topik               
                        $rsLastPostTopik = $this->mDataForum->DoUpdateLastPostTopikItem();
                        if(false === $rsLastPostTopik) {
                           $this->SetProperty("ProcessErrorMessage", $this->mDataForum->GetProperty("ForumErrorMessage"));
                           return false;
                        }
                        else {
                           $this->SetProperty("ProcessErrorMessage", "");
                        }                     
                     }                     
                  }                                    
               }               
            }
            $this->mDataForum->mDbConnection->CompleteTrans();
            $this->mDataForum->Disconnect();
            $this->SetProperty("ProcessErrorMessage", "Proses penambahan Post berhasil");
            return true;
         }
      }
      
      function DoDeletePostItem($postId, $threadId)
      {
         if(empty($postId) or empty($threadId)) {
            $this->SetProperty("ProcessErrorMessage", 'Id post atau id thread tidak ditemukan');
            return false;
         }
         else {
            // do connect here !!! :: why?? to facilitate transaction in one connection for more than one query
            if(!$this->mDataForum->Connect()) {            
               $dbErrorMsg = $this->mDataForum->GetProperty("DbErrorMessage");
               $this->SetProperty("ProcessErrorMessage", $dbErrorMsg);
               return false;
            }
            $this->mDataForum->mDbConnection->StartTrans();
            // first delete post item
            $this->mDataForum->SetProperty("ForumPostId", $postId);
            $result = $this->mDataForum->DoDeletePostItem();
            if (false === $result) {
               $this->SetProperty("ProcessErrorMessage", $this->mDataForum->GetProperty("ForumErrorMessage"));
               return false;
            }
            else {
               // then update sum of post on thread
               $this->mDataForum->SetProperty("ForumThreadId", $threadId);
               $rsThreadUpd = $this->mDataForum->DoUpdateSumOfPostThreadItem('minus');
               if(false === $rsThreadUpd) {
                  $this->SetProperty("ProcessErrorMessage", $this->mDataForum->GetProperty("ForumErrorMessage"));
                  return false;
               }
               else {
                  $this->SetProperty("ProcessErrorMessage", "");
               }
            }
            $this->mDataForum->mDbConnection->CompleteTrans();
            $this->mDataForum->Disconnect();
            $this->SetProperty("ProcessErrorMessage", "Proses penghapusan Post berhasil");
            return true;
         }
      }
   }
?>