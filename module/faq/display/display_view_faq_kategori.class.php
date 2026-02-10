<?php

   class DisplayViewFaqKategori extends DisplayBaseFull
   {
      var $mDataFaq;
      var $mPage;
      var $mNumRecordPerPage;
      var $mDisplayError;
      var $mDisplayErrorType;

      function DisplayViewFaqKategori(&$configObject, &$security, $page, $error, $errorType)
      {
         DisplayBaseFull::DisplayBaseFull($configObject, $security);
         
         $this->mPage = $page;
         $this->SetNavigationTemplate();
         $this->mNumRecordPerPage = 15;

         $this->mDisplayError = $error;
         $this->mDisplayErrorType = $errorType;

         //set template untuk error dan empty box DisplayBase::SetErrorAndEmptyBox
         $this->SetErrorAndEmptyBox();

         $this->SetTemplateBasedir($this->mrConfig->GetValue('app_module') . 'faq/templates/');
         $this->SetTemplateFile('view_faq_kategori.html');
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
         $this->mDataFaq =  new Faq($this->mrConfig);
         $recordcount = $this->mDataFaq->GetTotalDataKategori();
         $startRecord = ($this->mPage*$this->mNumRecordPerPage)-($this->mNumRecordPerPage);
         //echo date("l") . ',' . date("d") . "-" . date("M") . "-" . date("Y") . " " . date("H") . ":" .date("i"). ":" .date("s");
			if (false === $recordcount){
				$this->SetAttribute('navigation_page', 'visibility', "hidden");
            $this->AddVar("faq_kategori_list", "IS_EMPTY", "YES");
            $this->AddVar('empty_type', 'TYPE', "INFO");
            $this->AddVar("empty_box", "WARNING_MESSAGE", $this->ComposeErrorMessage("Data tidak ditemukan .... ",
					$this->mDataFaq->GetProperty('FaqErrorMessage')));
         }
         else{
            $dataKategoriFaq = $this->mDataFaq->GetKategoriFaq($this->mNumRecordPerPage, $startRecord, 1);
				$actUbah = $this->mrConfig->Enc("UbahKategori");
				$actHapus = $this->mrConfig->Enc("HapusKategori");
				$len = count($dataKategoriFaq);
            for($i = 0; $i < $len; $i++){
					$id = $this->mrConfig->Enc($dataKategoriFaq[$i]['id']);
					$dataKategoriFaq[$i]['url_detail'] = $this->mrConfig->GetURL('faq', 'faq_admin', 'view') . '&katid=' . $id;
               $dataKategoriFaq[$i]['urlupdate'] = $this->mrConfig->GetURL('faq', 'faq', 'process') . "&act=" . $actUbah  . '&katid=' . $id;
					$dataKategoriFaq[$i]['urldelete'] = $this->mrConfig->GetURL('faq', 'faq', 'process') . "&act=" . $actHapus  . '&katid=' . $id;
            }
            $this->AddVar("faq_kategori_list", "IS_EMPTY", "NO");
            $this->ParseData("faq_kategori_item", $dataKategoriFaq , "FAQ_KATEGORI_",$start_record+1);
            $urlPageNav = $this->mrConfig->GetURL('faq', 'faq_kategori', 'view');
            $this->ShowPageNavigation($urlPageNav,$this->mPage,$recordcount, $this->mNumRecordPerPage);        
         }
			$this->AddVar("content", "URL_ADD_PROCESS", $this->mrConfig->GetURL('faq', 'faq', 'process'));
         $this->DisplayError();
         $this->DisplayTemplate();
      }
   }


?>