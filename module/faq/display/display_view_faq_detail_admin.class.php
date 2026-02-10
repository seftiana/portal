<?php

   /**
     * DisplayViewFaqDetail
     * Display Class for Detail FAQ
     * 
     * @package DisplayViewFaqDetailAdmin
     * @author Maya Alipin
     * @copyright Copyright (c) 2006 GamaTechno
     * @version 1.0 
     * @date 2006-09-22
     * @revision 
     *
     */
   class DisplayViewFaqDetailAdmin extends DisplayBaseFull
   {
      var $mErrorMessage;
      var $mFaqId;
      var $mKatId;
      var $mObjFaq;
      
      function DisplayViewFaqDetailAdmin(&$configObject, &$security, $faqId, $katId)
      {
         DisplayBaseFull::DisplayBaseFull($configObject, $security);

         $this->mFaqId = $faqId;
         $this->mKatId = $katId;
         $this->mViewAdmin = $viewAdmin;
         $this->SetErrorAndEmptyBox();

         $this->SetTemplateBasedir($this->mrConfig->GetValue('app_module') . 'faq/templates/');
         $this->SetTemplateFile('view_faq_detail_admin.html');
      }

      function Display()
      {
         DisplayBaseFull::Display('[ Logout ]');

         $this->mObjFaq = new Faq($this->mrConfig);
         $this->mObjFaq->SetProperty("FaqId", $this->mFaqId);
         $dataDetail = $this->mObjFaq->GetFaqDataById(true);
			if(false === $dataDetail){
            $this->AddVar("detail_faq", "IS_EMPTY", "YES");
            $this->AddVar('empty_type', 'TYPE', "INFO");
            $this->AddVar("empty_box", "WARNING_MESSAGE", $this->ComposeErrorMessage("Data tidak ditemukan .... ",$objFaq->GetProperty('FaqErrorMessage')));
         }
         else{
            $this->AddVar("detail_faq", "IS_EMPTY", "NO");
				$id = $this->mrConfig->Enc($dataDetail[0]['id']);
				$katId = $this->mrConfig->Enc($this->mKatId);
				if ($dataDetail[0]['is_public'] == 0) {
					$referencaObj = new Reference($this->mrConfig);
					$tujuan = $referencaObj->LoadHakAksesByArrayId(explode("|", $dataDetail[0]['hak_id']));
					$temp = array();
					if (!empty($tujuan)) {
						foreach($tujuan as $value) {
							$temp[] = $value[name];
						}
						$dataDetail[0]['tujuan'] = implode (', ', $temp);
					}
				} else {
					$dataDetail[0]['tujuan'] = 'semua';
				}
				$dataDetail[0]['url_kembali'] = $this->mrConfig->GetUrl('faq', 'faq_admin', 'view'). '&katid=' . $katId;
				$dataDetail[0]['url_ubah'] = $this->mrConfig->GetURL('faq', 'faq', 'update') . '&id=' . $id . '&katId=' . $katId;	
				$dataDetail[0]['url_hapus']  = $this->mrConfig->GetUrl('faq', 'faq', 'process') . '&id=' . $id . '&act=' . $this->mrConfig->Enc('HapusFaq') . '&katId=' . $katId;	;
            $this->ParseData("detail_faq", $dataDetail, "DETAIL_");
         }
         $this->DisplayTemplate();
      }

   }
?>