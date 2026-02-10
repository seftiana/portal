<?php

   class DisplayUpdateKategori extends DisplayBaseFull
   {
      var $mDataForum;
      
      var $mKategoriId;      
      var $mDisplayError;
      var $mDisplayErrorType;
      
      function DisplayUpdateKategori(&$configObject, &$security, $katid, $error, $errorType)
      {
         DisplayBaseFull::DisplayBaseFull($configObject, $security);
         
         $this->mDisplayError = $error;  
         $this->mDisplayErrorType = $errorType;
         $this->mKategoriId = $katid;
         
         //set template untuk error dan empty box DisplayBase::SetErrorAndEmptyBox
         $this->SetErrorAndEmptyBox();
         
         $this->SetTemplateBasedir($this->mrConfig->GetValue('app_module') . 'forum/templates/');
         $this->SetTemplateFile('update_kategori.html');
                  
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
         
         $this->mDataForum->SetProperty("ForumKategoriId", $this->mKategoriId);
         $detailKategori = $this->mDataForum->GetKategoriItemDetail(); 
         if(false === $detailKategori) {
            $this->AddVar("kategori_detail", "IS_FOUND", "NO");
            $this->AddVar("empty_box", "WARNING_MESSAGE", $this->mDataForum->GetProperty("ForumErrorMessage"));            
         }
         else {
            $this->AddVar("kategori_detail", "IS_FOUND", "YES");
            
           $this->DisplayError();
            
            for($i = 0; $i < count($detailKategori); $i++) {
               $detailKategori[$i]['id'] = $this->mrConfig->Enc($detailKategori[$i]['id']);
               $detailKategori[$i]['url_update_process'] = $this->mrConfig->GetURL('forum', 'forum', 'process');
            }
            $this->ParseData("kategori_detail", $detailKategori, "KATEGORI_");
         }
         $this->DisplayTemplate();
      }
   }
?>