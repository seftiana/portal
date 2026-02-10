<?php

   class DisplayViewPost extends DisplayBaseFull
   {
      var $mDataForum;
            
      var $mIsManaged;      
      var $mDisplayError;
      var $mDisplayErrorType;
      var $mKategoriId;
      var $mTopikId;
      var $mThreadId;
		var $mPageNumber;
		var $mNumRecordPerPage;
      
      function DisplayViewPost(&$configObject, &$security, $katid, $topid, $threadid, $isManaged, $page, $error, $errorType)
      {
         DisplayBaseFull::DisplayBaseFull($configObject, $security);
         
         $this->mDisplayError = $error;   
         $this->mDisplayErrorType = $errorType;         
         $this->mIsManaged = $isManaged;
         $this->mKategoriId = $katid;
         $this->mTopikId = $topid;
			$this->mPageNumber = $page;
         $this->mThreadId = $threadid;
         $this->mNumRecordPerPage = 10;
			
         //set template untuk error dan empty box DisplayBase::SetErrorAndEmptyBox
         $this->SetErrorAndEmptyBox();
         $this->SetNavigationTemplate();
         $this->SetTemplateBasedir($this->mrConfig->GetValue('app_module') . 'forum/templates/');
         if ($this->mIsManaged)
            $this->SetTemplateFile('view_post_admin.html');
         else
            $this->SetTemplateFile('view_post.html');
         
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
         $this->AddVar("content", "APPLICATION_MODULE", 'Daftar Post Thread');         
         
         $this->DisplayError();
         
         $this->mDataForum->SetProperty("ForumThreadId", $this->mThreadId);
         $dataThread = $this->mDataForum->GetThreadItemDetail();
         if(false === $dataThread) {
            $this->AddVar("content", "THREAD_TITLE", 'Judul tidak ditemukan');         
            $this->AddVar("content", "APPLICATION_MODULE", $this->mDataForum->GetProperty("ForumErrorMessage"));         
         }
         else {
            $this->AddVar("content", "THREAD_TITLE", $dataThread[0]['judul']);                     
         }
			$start_record = ($this->mPageNumber*$this->mNumRecordPerPage)-($this->mNumRecordPerPage);
         $katId = $this->mrConfig->Enc($this->mKategoriId);
			$topId = $this->mrConfig->Enc($this->mTopikId);
			$threadId = $this->mrConfig->Enc($this->mThreadId);
         $dataPost = $this->mDataForum->GetAllPostItem($start_record, $this->mNumRecordPerPage);
         if(false === $dataPost) {
            $this->AddVar("post_list", "IS_EMPTY", "YES");
            $this->AddVar("empty_box", "WARNING_MESSAGE", $this->mDataForum->GetProperty("ForumErrorMessage"));
            $this->AddVar("post_list", "URL_BACK", $this->mrConfig->GetURL('forum', 'thread', 'view') . '&katid=' . $katId . '&topid=' . $topId );
            $this->AddVar("post_list", "URL_ADD_POST", $this->mrConfig->GetURL('forum', 'post', 'reply') . '&katid=' . $katId . '&topid=' . $topId . '&thrdid=' . $threadId);
         }
         else {
            $this->AddVar("post_list", "IS_EMPTY", "NO");
            for($i = 0; $i < count($dataPost); $i++) {
               $dataPost[$i]['id'] = $this->mrConfig->Enc($dataPost[$i]['id']);
               $dataPost[$i]['threadid'] = $threadId;
               $dataPost[$i]['topikid'] = $topId;
               $dataPost[$i]['kategoriid'] = $katId;
               $dataPost[$i]['content'] = nl2br($dataPost[$i]['content']);
               //proses tanggal               
               $tmp = explode(" ", $dataPost[$i]['tanggal']);
               if ($tmp[0] != '')
                  $tmpTanggal = $this->IndonesianDate($tmp[0] . ' ' . $tmp[1]);
               else
                  $tmpTanggal = '--';
               $dataPost[$i]['tanggal'] = $tmpTanggal;
               $dataPost[$i]['url_reply_process'] = $this->mrConfig->GetURL('forum', 'forum', 'process');
            }
            $this->ParseData("post_item", $dataPost, "POST_");
            $this->AddVar("post_list", "URL_BACK", $this->mrConfig->GetURL('forum', 'thread', 'view') . '&katid=' . $katId . '&topid=' . $topId);
         }
         $recordcount = $this->mDataForum->GetCountPostItem();
			$url = $this->mrConfig->GetURL('forum', 'post', 'view') . 
					'&katid=' . $katId . '&topid=' . $topId  . '&thrdid=' . $threadId;
			$this->ShowPageNavigation($url,$this->mPageNumber,$recordcount);
         $this->DisplayTemplate();
      }
   }
?>