<?php
/**
 * DisplayViewFaqAdmin
 * Display class for view Faq For Admin
 * 
 * @package 
 * @author Gitra Perdana
 * @copyright Copyright (c) 2006 GamaTechno
 * @version 1.0 
 * @date 2006-09-11
 * @revision 
 *
 */

   class DisplayViewFaqAdmin extends DisplayBaseFull {

      var $mPage;
      var $mNumRecordPerPage;
      var $mErrorMessage;
      var $mErrorType;
      var $mKatId;

      function DisplayViewFaqAdmin(&$configObject, &$security, $page, $katId, $errMsg, $tErrMsg){
         DisplayBaseFull::DisplayBaseFull($configObject, $security);
         $this->mPage = $page;
         $this->mKatId = $katId;
			//echo $this->mKatId; exit;
         $this->SetErrorAndEmptyBox();
         $this->SetNavigationTemplate();
         $this->mNumRecordPerPage = 15;
         $this->mErrorMessage = $errMsg;
         $this->mErrorType = $tErrMsg;
         $this->SetTemplateBasedir($this->mrConfig->GetValue('app_module') . 'faq/templates/');
         $this->SetTemplateFile('view_faq_admin.html');
      }

      function Display(){
         DisplayBaseFull::Display('[ Logout ]');
			$this->ShowErrorBox();
			$katId = $this->mrConfig->Enc($this->mKatId);
         $objFaq = new Faq($this->mrConfig);
         $recordcount = $objFaq->GetTotalData($this->mKatId);
         $this->AddVar("content", "URL_ADD", $this->mrConfig->GetURL('faq', 'faq', 'process'). '&katId=' . $katId);
         $startRecord = ($this->mPage*$this->mNumRecordPerPage)-($this->mNumRecordPerPage);
         $objFaq->SetProperty("FaqKategoriId", $this->mKatId);
         $dataHeader = $objFaq->GetKategoriFaqById();
         if ($recordcount === false){
            $recordcount = 0;
				$this->ShowErrorBox();
				$this->SetAttribute('navigation_page', 'visibility', "hidden");
            $this->AddVar("data_faq", "FAQ_IS_EMPTY", "YES");
            $this->AddVar('empty_type', 'TYPE', "INFO");
            $this->AddVar("empty_box", "WARNING_MESSAGE", $this->ComposeErrorMessage("Data tidak ditemukan .... ",$objFaq->GetProperty('FaqErrorMessage')));
         }
         else{
            $this->AddVar("data_faq", "FAQ_IS_EMPTY", "NO");
            $dataFaq = $objFaq->GetFaqDataByKategori($this->mNumRecordPerPage, $startRecord);
				$actDelete =$this->mrConfig->Enc('HapusFaq');
            foreach ($dataFaq as $key=>$value) {
               if (strlen($value['pertanyaan']) > 20){
                  $dataFaq[$key]['pertanyaan'] = htmlspecialchars(substr($value['pertanyaan'], 0, 20). "...");
               }
               if (strlen($value['jawaban']) > 20){
                  $dataFaq[$key]['jawaban'] = htmlspecialchars(substr($value['jawaban'], 0, 20) . "...");
               }
					$dataFaq[$key]['url_delete'] = $this->mrConfig->GetURL('faq', 'faq', 'process') . '&id=' . $this->mrConfig->Enc($value['id']) . '&act=' . $actDelete . '&katId=' . $katId;;
               $dataFaq[$key]['url_update'] = $this->mrConfig->GetURL('faq', 'faq', 'update') . '&id=' . $this->mrConfig->Enc($value['id']) . '&katId=' . $katId;
               $dataFaq[$key]['url_detail'] = $this->mrConfig->GetUrl('faq', 'faq_detail_admin', 'view') . '&id=' . $this->mrConfig->Enc($value['id']) . '&katId=' . $katId;
            }
            $this->ParseData("data_faq_item", $dataFaq, "FAQ_", $startRecord+1);
            $urlPageNav = $this->mrConfig->GetURL('faq', 'faq_admin', 'view');
            $this->ShowPageNavigation($urlPageNav,$this->mPage,$recordcount, $this->mNumRecordPerPage);
         }
         $this->ParseData('content', $dataHeader, "KATEGORI_");
         
         $this->DisplayTemplate();
      }

      function ShowErrorBox() {
         if (!empty($this->mErrorMessage)) {
            $this->SetAttribute('error_box', 'visibility', 'visible');
            $this->AddVar('error_type', 'TYPE', strtoupper($this->mErrorType));
            $this->AddVar('error_box', 'ERROR_MESSAGE', $this->mErrorMessage);
         }
      }

   }


?>