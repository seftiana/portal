<?php

   class DisplayViewTopik extends DisplayBaseFull
   {
      var $mDataForum;
      var $mDataReference;
      
      var $mIsManaged;      
      var $mDisplayError;
      var $mDisplayErrorType;
      var $mKategoriId;
      
      function DisplayViewTopik(&$configObject, &$security, $katid, $isManaged, $error, $errorType)
      {
         DisplayBaseFull::DisplayBaseFull($configObject, $security);
         
         $this->mDisplayError = $error;  
         $this->mDisplayErrorType = $errorType;
         $this->mIsManaged = $isManaged;
         $this->mKategoriId = $katid;
         
         //set template untuk error dan empty box DisplayBase::SetErrorAndEmptyBox
         $this->SetErrorAndEmptyBox();
         
         $this->SetTemplateBasedir($this->mrConfig->GetValue('app_module') . 'forum/templates/');
         if ($this->mIsManaged)
            $this->SetTemplateFile('view_topik_admin.html');
         else
            $this->SetTemplateFile('view_topik.html');         
         
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
         $this->AddVar("content", "APPLICATION_MODULE", 'Daftar Topik Kategori');         
         
         $this->mDataForum->SetProperty("ForumKategoriId", $this->mKategoriId);         
         $this->mDataForum->SetProperty("ForumUserRole", $this->mrUserSession->GetProperty("Role"));
         
         $dataKategori = $this->mDataForum->GetKategoriItemDetail();
         if(false === $dataKategori) {
            $this->AddVar("content", "KATEGORI_TITLE", 'Judul tidak ditemukan');
            $this->AddVar("content", "KATEGORI_DESCRIPTION", $this->mDataForum->GetProperty("ForumErrorMessage"));
         }
         else {
            $this->AddVar("content", "KATEGORI_TITLE", $dataKategori[0]['judul']);
            $this->AddVar("content", "KATEGORI_DESCRIPTION", $dataKategori[0]['deskripsi']);
         }
         
         $dataTopik = $this->mDataForum->GetAllTopikItemExceptBanned();
         if(false === $dataTopik) {
            $this->AddVar("topik_list", "IS_EMPTY", "YES");
            $this->AddVar("empty_box", "WARNING_MESSAGE", $this->mDataForum->GetProperty("ForumErrorMessage"));            
         }
         else {
            $this->AddVar("topik_list", "IS_EMPTY", "NO");
            for($i = 0; $i < count($dataTopik); $i++) {
               $dataTopik[$i]['topid'] = $this->mrConfig->Enc($dataTopik[$i]['topid']);
               $dataTopik[$i]['kategoriid'] = $this->mrConfig->Enc($dataTopik[$i]['kategoriid']);               
               if($dataTopik[$i]['tanggal'] != '0000-00-00 00:00:00')
                  $dataTopik[$i]['tanggal'] = $this->IndonesianDate($dataTopik[$i]['tanggal']);
               else
                  $dataTopik[$i]['tanggal'] = '--';
               $dataTopik[$i]['url_detail'] = $this->mrConfig->GetURL('forum', 'thread', 'view') . '&katid=' . $dataTopik[$i]['kategoriid'] . '&topid=' . $dataTopik[$i]['topid'];               
               $dataTopik[$i]['url_modify_process'] = $this->mrConfig->GetURL('forum', 'forum', 'process');               
            }
            $this->ParseData("topik_item", $dataTopik, "TOPIK_");
         }
         
         // collect the user hak akses who allowed to access this topik only for admin template
         if($this->mIsManaged) {
            $dataHakAkses = $this->mDataReference->LoadHakAkses();
            if(false === $dataHakAkses) {
               $this->AddVar("hak_akses", "IS_EMPTY", "YES");
               $this->AddVar("hak_akses", "EMPTY_MESSAGE", $this->GetProperty("ReferenceErrorMsg"));
            }
            else {
               $this->AddVar("hak_akses", "IS_EMPTY", "NO");
               for($i = 0; $i < count($dataHakAkses); $i++) {
                  $dataHakAkses[$i]['id'] = $this->mrConfig->Enc($dataHakAkses[$i]['id']);
               }
               $this->ParseData("hak_akses_item", $dataHakAkses, "HAK_");
            }
         }
         
         $this->DisplayError();
         
         $this->AddVar("content", "URL_ADD_PROCESS", $this->mrConfig->GetURL('forum', 'forum', 'process'));
         $this->AddVar("content", "KATEGORI_ID", $this->mrConfig->Enc($this->mKategoriId));
         $this->AddVar("content", "URL_BACK", $this->mrConfig->GetURL('forum', 'kategori', 'view'));
      
         $this->DisplayTemplate();
      }
   }
?>