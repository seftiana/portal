<?php

   class DisplayViewThread extends DisplayBaseFull
   {
      var $mDataForum;
            
      var $mIsManaged;      
      var $mDisplayError;
      var $mDisplayErrorType;
      var $mKategoriId;
      var $mTopikId;
		var $mPageNumber;
		var $mNumRecordPerPage;
      
      function DisplayViewThread(&$configObject, &$security, $katid, $topid, $isManaged, $page, $error, $errorType)
      {
         DisplayBaseFull::DisplayBaseFull($configObject, $security);
         
         $this->mDisplayError = $error;        
         $this->mDisplayErrorType = $errorType;
         $this->mIsManaged = $isManaged;
         $this->mKategoriId = $katid;
         $this->mTopikId = $topid;
         $this->mPageNumber = $page;
			$this->mNumRecordPerPage = 10;
         //set template untuk error dan empty box DisplayBase::SetErrorAndEmptyBox
         $this->SetErrorAndEmptyBox();
         $this->SetNavigationTemplate();
         $this->SetTemplateBasedir($this->mrConfig->GetValue('app_module') . 'forum/templates/');
         if ($this->mIsManaged)
            $this->SetTemplateFile('view_thread_admin.html');
         else
            $this->SetTemplateFile('view_thread.html');
         
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
		
		function ParsingHeader($header) {
			$len = strlen($header);
			if ($len < 40) {
				return $header;
			}
			$newHeader = "";
			while ($len > 40){
				 $pos = strrpos(substr($header, 0, 40), " ") ;
				 if ($pos == false) {
					$pos = 39;
					$newHeader .= substr($header, 0, $pos). "<br/>";
				} else {				 
					$newHeader .= substr_replace(substr($header, 0, $pos), "<br/>", $pos, 1);
				}
				 $header = substr ($header, $pos, ($len-$pos)) ;
				 $len = strlen($header);
			} 
			return $newHeader . $header;
		}
      
      function Display()
      {
         DisplayBaseFull::Display('[ Logout ]');
         $this->AddVar("content", "APPLICATION_MODULE", 'Daftar Thread Topik');
         
         $this->mDataForum->SetProperty("ForumTopikId", $this->mTopikId);
         $dataTopik = $this->mDataForum->GetTopikItemDetail();
         if(false === $dataTopik) {
            $this->AddVar("content", "TOPIK_TITLE", 'Judul tidak ditemukan');
            $this->AddVar("content", "TOPIK_DESCRIPTION", $this->mDataForum->GetProperty("ForumErrorMessage"));
         }
         else {
            $this->AddVar("content", "TOPIK_TITLE", $dataTopik[0]['judul']);
            $this->AddVar("content", "TOPIK_DESCRIPTION", $dataTopik[0]['deskripsi']);
         }
         $start_record = ($this->mPageNumber*$this->mNumRecordPerPage)-($this->mNumRecordPerPage);
			$katId = $this->mrConfig->Enc($this->mKategoriId);
			$topId = $this->mrConfig->Enc($this->mTopikId);
				
         $dataThread = $this->mDataForum->GetAllThreadItem($start_record, $this->mNumRecordPerPage);
         if(false === $dataThread) {
            $this->AddVar("thread_list", "IS_EMPTY", "YES");
            $this->AddVar("empty_box", "WARNING_MESSAGE", $this->mDataForum->GetProperty("ForumErrorMessage"));            
         }
         else {
            $this->AddVar("thread_list", "IS_EMPTY", "NO");
            $len = count($dataThread);
				for($i = 0; $i < $len; $i++) {
					$dataThread[$i]['judul_truncate'] = $this->ParsingHeader($dataThread[$i]['judul']);
               $dataThread[$i]['id'] = $this->mrConfig->Enc($dataThread[$i]['id']);
               $dataThread[$i]['topikid'] = $topId;
               $dataThread[$i]['kategoriid'] = $katId;
               //proses tanggal               
					if($dataThread[$i]['tanggal'] == '0000-00-00 00:00:00') 
                  $dataThread[$i]['tanggal'] = '--';
               else
                  $dataThread[$i]['tanggal'] = $this->IndonesianDate($dataThread[$i]['tanggal']);
               $dataThread[$i]['url_detail'] = $this->mrConfig->GetURL('forum', 'post', 'view') . '&katid='. $dataThread[$i]['kategoriid'] . '&topid=' . $dataThread[$i]['topikid'] . '&thrdid=' . $dataThread[$i]['id'];
               $dataThread[$i]['url_modify_process'] = $this->mrConfig->GetURL('forum', 'forum', 'process');
            }
            $this->ParseData("thread_item", $dataThread, "THREAD_");
         }
         $this->DisplayError();
         
         $this->AddVar("content", "URL_BACK", $this->mrConfig->GetURL('forum', 'topik', 'view') . '&katid=' . $katId);
         $this->AddVar("content", "TOPIK_ID", $this->mrConfig->Enc($this->mTopikId));
         $this->AddVar("content", "KATEGORI_ID", $this->mrConfig->Enc($this->mKategoriId));
         $this->AddVar("content", "URL_ADD_PROCESS", $this->mrConfig->GetURL('forum', 'forum', 'process'));
			$recordcount = $this->mDataForum->GetCountThreadInTopik();
			$url = $this->mrConfig->GetURL('forum', 'thread', 'view') . 
					'&katid=' . $katId . '&topid=' . $topId ;
			$this->ShowPageNavigation($url,$this->mPageNumber,$recordcount);
         $this->DisplayTemplate();
      }
   }
?>