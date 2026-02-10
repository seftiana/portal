<?php

   class DisplayUpdateTopik extends DisplayBaseFull
   {
      var $mDataForum;
      var $mDataReference;
      
      var $mTopikId;      
      var $mDisplayError;
      var $mDisplayErrorType;
      var $mKategoriId;
      
      function DisplayUpdateTopik(&$configObject, &$security, $katid, $topid, $error, $errorType)
      {
         DisplayBaseFull::DisplayBaseFull($configObject, $security);
         
         $this->mDisplayError = $error;        
         $this->mDisplayErrorType = $errorType;
         $this->mTopikId = $topid;
         $this->mKategoriId = $katid;
         
         //set template untuk error dan empty box DisplayBase::SetErrorAndEmptyBox
         $this->SetErrorAndEmptyBox();
         
         $this->SetTemplateBasedir($this->mrConfig->GetValue('app_module') . 'forum/templates/');
         $this->SetTemplateFile('update_topik.html');
         
         // instantiate business class
         $this->mDataForum =  new Forum($this->mrConfig);
         $this->mDataReference = new Reference($this->mrConfig);
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
         
         $this->mDataForum->SetProperty("ForumTopikId", $this->mTopikId);
         $detailTopik = $this->mDataForum->GetTopikItemDetail();
         if(false === $detailTopik) {
            $this->AddVar("topik_detail", "IS_FOUND", "NO");
            $this->AddVar("empty_box", "WARNING_MESSAGE", $this->mDataForum->GetProperty("ForumErrorMessage"));
         }
         else {
            $this->AddVar("topik_detail", "IS_FOUND", "YES");
            $this->AddVar("topik_detail", "URL_UPDATE_PROCESS", $this->mrConfig->GetURL('forum', 'forum', 'process'));
            
            $this->DisplayError();
            
            // collect the user hak akses who allowed to access this topik 
            $dataHakAksesTopik = $this->mDataForum->GetHakAksesTopik();
            $dataHakAkses = $this->mDataReference->LoadHakAkses();
            if(false === $dataHakAkses and false === $dataHakAksesTopik) {
               $this->AddVar("hak_akses", "IS_EMPTY", "YES");
               $this->AddVar("hak_akses", "EMPTY_MESSAGE", $this->GetProperty("ReferenceErrorMsg"));
            }
            else {
               $this->AddVar("hak_akses", "IS_EMPTY", "NO");
               for ($i = 0; $i < count($dataHakAkses); $i++) {                                 
                  foreach($dataHakAksesTopik as $row => $value) {                           
                     if(($dataHakAkses[$i]['id'] == $value['topikuserrole']) and ($value['hakakses'] == 'Y')) {
                        $dataHakAkses[$i]['checked'] = 'checked';
                     }                     
                  }
               } 
               for ($i = 0; $i < count($dataHakAkses); $i++) {                                                   
                  if(empty($dataHakAkses[$i]['checked'])) {
                     $dataHakAkses[$i]['checked'] = '';
                  }                                       
               } 
               for ($i = 0; $i < count($dataHakAkses); $i++) {                                                   
                  $dataHakAkses[$i]['id'] = $this->mrConfig->Enc($dataHakAkses[$i]['id']);
               } 
               $this->ParseData("hak_akses_item", $dataHakAkses, "HAK_");
            }
            for($i = 0; $i < count($detailTopik); $i++) {
               $detailTopik[$i]['id'] = $this->mrConfig->Enc($detailTopik[$i]['id']);
               $detailTopik[$i]['kategoriid'] = $this->mrConfig->Enc($detailTopik[$i]['kategoriid']);
            }
            $this->ParseData("topik_detail", $detailTopik, "TOPIK_");
         }         
         $this->DisplayTemplate();
      }
   }
?>