<?php
   /**
     * DisplayViewUpdateFaq
     * Display Class for Update Faq
     * 
     * @package DisplayViewUpdateFaq
     * @author Gitra Perdana
     * @copyright Copyright (c) 2006 GamaTechno
     * @version 1.0 
     * @date 2006-09-12
     * @revision 
     *
     */

   class DisplayUpdateFaq extends DisplayBaseFull{

      var $mErrorMessage;
      var $mFaqId;
      var $mKatFaqId;
      var $mErrorType;
      var $mDataReference;

      function DisplayUpdateFaq(&$configObject, &$security, $katId, $errMsg, $tErrMsg, $faqId){
         DisplayBaseFull::DisplayBaseFull($configObject, $security);

         $this->SetErrorAndEmptyBox();
         $this->mErrorMessage = $errMsg;
         $this->mErrorType = $tErrMsg;
         $this->mFaqId = $faqId;
         $this->mKatFaqId = $katId;
         $this->mDataReference = New Reference($this->mrConfig);
         $this->SetTemplateBasedir($this->mrConfig->GetValue('app_module') . 'faq/templates/');
         $this->SetTemplateFile('update_faq.html');

      }
      
      function GetHakAksesData($hakAkses) {
         $listTujuan = $this->mDataReference->LoadHakAkses();
			$listTujuan[0]['id'] = "all";
         $listTujuan[0]['name'] = "Semua";
         if (false === $listTujuan) {
            $this->AddVar("tujuan","IS_EMPTY", "YES");
            $errMsg = $this->ComposeErrorMessage("Data hak akses tidak ditemukan", $this->mDataReference->GetProperty("ReferenceErrorMsg"));
            $this->AddVar("tujuan","TUJUAN_EMPTY_MSG", $errMsg);
         }
         else {
				$len = sizeof($listTujuan);
				
				if (empty($hakAkses)) {
					$listTujuan[0]['checked'] = "checked";
					for($i=0; $i<$len; $i++) {
						$listTujuan[$i]['checked'] = "";
					}
				} else {
					$lenHK = sizeof($hakAkses);
					for($i=0; $i<$len; $i++) {
						$listTujuan[$i]['checked'] = "";
						for ($j=0; $j<$lenHK; $j++) {
							if ($listTujuan[$i]['id'] == $hakAkses[$j]) {
								$listTujuan[$i]['checked'] = "checked";
							}
						}
					}
				}
            $this->AddVar("tujuan","IS_EMPTY", "NO");
            $this->ParseData('tujuan', $listTujuan, "REF_");
         }
      }

      function Display(){
         DisplayBaseFull::Display('[ Logout ]');
			$objFaq = New Faq($this->mrConfig);
			$this->ShowErrorMessage();
         
         $objFaq->SetProperty("FaqId", $this->mFaqId);
			
         $data = $objFaq->GetFaqDataById(true);
			
         $this->AddVar("form_update_faq", "URL_PROCESS", $this->mrConfig->GetURL('faq','faq','process'). '&id=' . $this->mrConfig->Enc($data[0]['id']). '&katid=' . $this->mrConfig->Enc($this->mKatFaqId));
         if (false === $data){
				$this->ShowErrorMessage();
            $this->AddVar("form_update_faq", "IS_EMPTY", "YES");
            $sysEmptyMessage = $objFaq->GetProperty("FaqErrorMessage");
            $emptyMessage = $this->ComposeErrorMessage("Data tidak ditemukan", $sysEmptyMessage);
            $this->AddVar("empty_box", "WARNING_MESSAGE", $emptyMessage);
         } else{
				$arrHakAkses = null;
				if ($data[0]['is_public'] == 1) {
					$arrHakAkses = array("all");
				} else  {
					if (!empty($data[0]['hak_id'])){
						$arrHakAkses = explode('|', $data[0]['hak_id']);
					}
				}
				$this->GetHakAksesData($arrHakAkses);
            $this->AddVar("form_update_faq", "IS_EMPTY", "NO");
            $data[0]['id'] = $this->mrConfig->Enc($data[0]['id']);
				$data[0]['kategori_id'] = $this->mrConfig->Enc($data[0]['kategori_id']);
            $this->ParseData('form_update_faq', $data, "FAQ_");
				$this->AddVar('content', 'KATEGORI_NAMA', $data[0]['kategori_nama']);
				$this->AddVar('content', 'KATEGORI_KETERANGAN', $data[0]['kategori_keterangan']);
         }
         
         $this->DisplayTemplate();
      }

      function ShowErrorMessage() {         
         if (!empty($this->mErrorMessage)) {
            $this->SetAttribute('error_box', 'visibility', 'visible');
            $this->AddVar('error_type', 'TYPE', strtoupper($this->mErrorType));
            $this->AddVar('error_box', 'ERROR_MESSAGE', $this->mErrorMessage);
         }
      }


   }

?>