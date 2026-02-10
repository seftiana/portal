<?php

   class DisplayViewKategori extends DisplayBaseFull
   {
      var $mDataForum;
      
      var $mIsManaged;      
      var $mDisplayError;
      var $mDisplayErrorType;
      
      function DisplayViewKategori(&$configObject, &$security, $isManaged, $error, $errorType)
      {
         DisplayBaseFull::DisplayBaseFull($configObject, $security);
         
         $this->mDisplayError = $error;         
         $this->mDisplayErrorType = $errorType;
         $this->mIsManaged = $isManaged;
         
         //set template untuk error dan empty box DisplayBase::SetErrorAndEmptyBox
         $this->SetErrorAndEmptyBox();
      
         $this->SetTemplateBasedir($this->mrConfig->GetValue('app_module') . 'forum/templates/');         
         if ($this->mIsManaged)
            $this->SetTemplateFile('view_kategori_admin.html');
         else
            $this->SetTemplateFile('view_kategori.html');
                  
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
         $this->AddVar("content", "APPLICATION_MODULE", 'Forum Diskusi');
         $this->AddVar("content", "APPLICATIONCLIENT", $_SESSION['identitas']['pt_nama']);
         
         $dataKategori = $this->mDataForum->GetAllKategoriItem();
         if(false === $dataKategori) {
            $this->AddVar("kategori_list", "IS_EMPTY", "YES");            
            $this->AddVar("empty_box", "WARNING_MESSAGE", $this->mDataForum->GetProperty("ForumErrorMessage"));            
         }
         else {
            $this->AddVar("kategori_list", "IS_EMPTY", "NO");            
            
            for($i = 0; $i < count($dataKategori); $i++) {
               $this->mDataForum->SetProperty("ForumKategoriId", $dataKategori[$i]['id']);               
               $this->mDataForum->SetProperty("ForumUserRole", $this->mrUserSession->GetProperty("Role"));
               $dataJmlTopik = $this->mDataForum->GetSumTopikForKategori();
               if(false === $dataJmlTopik) 
                  $dataKategori[$i]['jml_topik'] = 'Belum ada ';
               else
                  $dataKategori[$i]['jml_topik'] = $dataJmlTopik;
                  
               $dataKategori[$i]['url_detail'] = $this->mrConfig->GetURL('forum', 'topik', 'view') . '&katid=' . $this->mrConfig->Enc($dataKategori[$i]['id']);
               $dataKategori[$i]['url_modify_process'] = $this->mrConfig->GetURL('forum', 'forum', 'process');
               $dataKategori[$i]['id'] = $this->mrConfig->Enc($dataKategori[$i]['id']);
            }
            $this->ParseData("kategori_item", $dataKategori, "KATEGORI_");
         }         
         
         if ($this->mIsManaged) {
            $this->AddVar("content", "URL_ADD_PROCESS", $this->mrConfig->GetURL('forum', 'forum', 'process'));
         }
         
         $this->DisplayError();
  
         $this->DisplayTemplate();
      }
   }
?>
