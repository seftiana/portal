<?php

   class DisplayAddFaq extends DisplayBaseFull{

      var $mErrorMessage;
      var $mObjFaq;
      var $mFaqId;
      var $mKatFaqId;
      var $mDataReference;

      function DisplayAddFaq(&$configObject, &$security, $katId, $errMsg, $tErrMsg){
         DisplayBaseFull::DisplayBaseFull($configObject, $security);
         $this->SetErrorAndEmptyBox();
         $this->mErrorMessage = $errMsg;
         $this->mErrorType = $tErrMsg;
			$this->mKatFaqId = $katId;
         $this->mDataReference = New Reference($this->mrConfig);
         $this->SetTemplateBasedir($this->mrConfig->GetValue('app_module') . 'faq/templates/');
         $this->SetTemplateFile('add_faq.html');
      }

      function GetHakAksesData() {
         $listTujuan = $this->mDataReference->LoadHakAkses();
			$listTujuan[0]['id'] = "all";
         $listTujuan[0]['name'] = "Semua";
         if (false === $listTujuan) {
            $this->AddVar("tujuan","IS_EMPTY", "YES");
            $errMsg = $this->ComposeErrorMessage("Data hak akses tidak ditemukan", $this->mDataReference->GetProperty("ReferenceErrorMsg"));
            $this->AddVar("tujuan","TUJUAN_EMPTY_MSG", $errMsg);
         }
         else {
            $this->AddVar("tujuan","IS_EMPTY", "NO");
            $this->ParseData('tujuan', $listTujuan, "REF_");
         }
      }

      function Display(){
         DisplayBaseFull::Display('[ Logout ]');
			$this->ShowErrorBox();
         $this->AddVar("content", "URL_PROCESS", $this->mrConfig->GetURL('faq', 'faq', 'process'). '&katid=' . $this->mrConfig->Enc($this->mKatFaqId));
         $objFaq = new Faq($this->mrConfig);
         $objFaq->SetProperty("FaqKategoriId",$this->mKatFaqId);
         $data = $objFaq->GetKategoriFaqById();
			$data[0]['id'] = $this->mrConfig->Enc($this->mKatFaqId);
         $this->GetHakAksesData();
			if (!empty($data)) {
				$this->ParseData('content', $data, "KATEGORI_");
			} else {
				$this->ShowErrorBox();
			}
         $this->DisplayTemplate();
      }

      function ShowErrorBox() {
         if ($this->mErrorMessage != "") {
				echo $masuk;
			   $this->SetAttribute('error_box', 'visibility', 'visible');
            $this->AddVar('error_type', 'TYPE', strtoupper($this->mErrorType));
            $this->AddVar('error_box', 'ERROR_MESSAGE', $this->mErrorMessage);
         }
      }



   }
?>