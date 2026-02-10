<?php

   class DisplayReplyPost extends DisplayBaseFull
   {
      var $mDataForum;
      var $mDataReference;
            
      var $mDisplayError;
      var $mDisplayErrorType;
      var $mPostId;
      var $mThreadId;
      var $mKategoriId;
      var $mTopikId;
      
      function DisplayReplyPost(&$configObject, &$security, $threadId, $katid, $topid, $postid, $error, $errorType)
      {
         DisplayBaseFull::DisplayBaseFull($configObject, $security);
         
         $this->mDisplayError = $error;
         $this->mDisplayErrorType = $errorType;   
         $this->mPostId = $postid;
         $this->mThreadId = $threadId;
         $this->mKategoriId = $katid;
         $this->mTopikId = $topid;
         
         //set template untuk error dan empty box DisplayBase::SetErrorAndEmptyBox
         $this->SetErrorAndEmptyBox();
         
         $this->SetTemplateBasedir($this->mrConfig->GetValue('app_module') . 'forum/templates/');
         $this->SetTemplateFile('reply_post.html');
         
         // instantiate business class
         $this->mDataForum =  new Forum($this->mrConfig);
         
      }
      
      function DisplayError()
      {
         // show error if occured
         if(!empty($this->mDisplayError)) { 
            $this->SetAttribute('error_box', 'visibility', 'visible');
            $this->AddVar('error_type', 'TYPE', strtoupper($this->mDisplayErrorType));
            $this->AddVar('error_box', 'ERROR_MESSAGE', $this->mDisplayError);
         }
      }
      
      function Display()
      {
         DisplayBaseFull::Display('[ Logout ]');         
         
         $this->DisplayError();
         
         $this->AddVar("content", "URL_ADD_PROCESS", $this->mrConfig->GetURL('forum', 'forum', 'process'));
         $this->AddVar("content", "APPLICATION_MODULE", 'Forum Diskusi');
         $this->AddVar("content", "FORM_TITLE", 'Form Tambah Post');
         $this->AddVar("content", "KATEGORI_ID", $this->mrConfig->Enc($this->mKategoriId));
         $this->AddVar("content", "TOPIK_ID", $this->mrConfig->Enc($this->mTopikId));
         $this->AddVar("content", "THREAD_ID", $this->mrConfig->Enc($this->mThreadId));         
         if(!empty($this->mPostId)) {
            //get the data then parse it into template
            $this->AddVar("content", "APPLICATION_MODULE", 'Forum Diskusi');
            $this->AddVar("content", "FORM_TITLE", 'Form Reply Post');
            $this->mDataForum->SetProperty("ForumPostId", $this->mPostId);
            $detailOldPost = $this->mDataForum->GetPostItemDetail();
            if(false !== $detailOldPost) {
               for($i = 0; $i < count($detailOldPost); $i++) {                  
                  $content = "";
                  $content .= "> Pesan asli \n";
                  $content .= "> Dari : " . $detailOldPost[$i]['userprofil'] . "\n";
                  $content .= "> Tanggal : " . $this->IndonesianDate($detailOldPost[$i]['tanggal']) . "\n";
                  $content .= "> Judul : " . $detailOldPost[$i]['judul'] . "\n";
                  $content .= "> Isi : " . $detailOldPost[$i]['content'] . "\n";                  
                  $content .= "-----------------------------------\n";                  
                  $detailOldPost[$i]['content'] = $content;
                  $detailOldPost[$i]['judul'] = 'Re : ['.$detailOldPost[$i]['judul'].']';
               }
               $this->ParseData("content", $detailOldPost, "POST_");
            }            
         }         
         $this->DisplayTemplate();
      }
   }
?>