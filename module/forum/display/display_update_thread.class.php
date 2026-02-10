<?php

   class DisplayUpdateThread extends DisplayBaseFull
   {
      var $mDataForum;
            
      var $mDisplayError;
      var $mDisplayErrorType;
      var $mKategoriId;
      var $mTopikId;      
      var $mThreadId;
      
      
      function DisplayUpdateThread(&$configObject, &$security, $katid, $topid, $threadid, $error, $errorType)
      {
         DisplayBaseFull::DisplayBaseFull($configObject, $security);
         
         $this->mDisplayError = $error;   
         $this->mDisplayErrorType = $errorType;         
         $this->mTopikId = $topid;
         $this->mKategoriId = $katid;
         $this->mThreadId = $threadid;
         
         //set template untuk error dan empty box DisplayBase::SetErrorAndEmptyBox
         $this->SetErrorAndEmptyBox();
         
         $this->SetTemplateBasedir($this->mrConfig->GetValue('app_module') . 'forum/templates/');
         $this->SetTemplateFile('update_thread.html');
         
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
         $this->AddVar("content", "APPLICATION_MODULE", "Forum Diskusi"); 
         
         $this->DisplayError();
            
         $this->mDataForum->SetProperty("ForumThreadId", $this->mThreadId);
         $detailThread = $this->mDataForum->GetThreadItemDetail();
         if(false === $detailThread) {
            $this->AddVar("thread_detail", "IS_FOUND", "NO");
            $this->AddVar("empty_box", "WARNING_MESSAGE", $this->mDataForum->GetProperty("ForumErrorMessage"));
         }
         else {
            $this->AddVar("thread_detail", "IS_FOUND", "YES");
            $this->AddVar("thread_detail", "URL_UPDATE_PROCESS", $this->mrConfig->GetURL('forum', 'forum', 'process'));
            for($i = 0; $i < count($detailThread); $i++) {
               $detailThread[$i]['id'] = $this->mrConfig->Enc($detailThread[$i]['id']);
               $detailThread[$i]['topikid'] = $this->mrConfig->Enc($detailThread[$i]['topikid']);
               $detailThread[$i]['kategoriid'] = $this->mrConfig->Enc($detailThread[$i]['kategoriid']);
            }
            $this->ParseData("thread_detail", $detailThread, "THREAD_");            
         }
         $this->DisplayTemplate();
      }
   }
?>