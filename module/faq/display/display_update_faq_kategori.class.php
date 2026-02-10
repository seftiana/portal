<?php
   /**
     * DisplayUpdateFaqKategori
     * Display Class for Update Faq Kategori
     * 
     * @package DisplayUpdateFaqKategori
     * @author Gitra Perdana
     * @copyright Copyright (c) 2006 GamaTechno
     * @version 1.0 
     * @date 2006-09-19
     * @revision 
     *
     */

   class DisplayUpdateFaqKategori extends DisplayBaseFull{

      var $mErrorMessage;
      var $mObjFaq;
      var $mKategoriFaqId;
      var $mErrorType;

      function DisplayUpdateFaqKategori(&$configObject, &$security, $errMsg, $tErrMsg, $id){
         DisplayBaseFull::DisplayBaseFull($configObject, $security);

         $this->SetErrorAndEmptyBox();
         $this->mErrorMessage = $errMsg;
         $this->mErrorType = $tErrMsg;
         $this->mKategoriFaqId = $id;
          
         $this->SetTemplateBasedir($this->mrConfig->GetValue('app_module') . 'faq/templates/');
         $this->SetTemplateFile('update_faq_kategori.html');

      }

      function Display(){
         DisplayBaseFull::Display('[ Logout ]');
         $this->mObjFaq = New Faq($this->mrConfig);
         $this->mObjFaq->SetProperty("FaqKategoriId", $this->mKategoriFaqId);
         $data = $this->mObjFaq->GetKategoriFaqById();
         
         $this->AddVar("form_update_faq_kategori", "URL_PROCESS", $this->mrConfig->GetURL('faq','faq','process'). '&id=' . $this->mrConfig->Enc($data[0]['id']));
         if (false === $data){
            $this->AddVar("form_update_faq_kategori", "IS_EMPTY", "YES");
            $sysEmptyMessage = $this->mObjFaq->GetProperty("FaqErrorMessage");
            $emptyMessage = $this->ComposeErrorMessage("Data tidak ditemukan", $sysEmptyMessage);
            $this->AddVar("empty_box", "WARNING_MESSAGE", $emptyMessage);
         }
         else{
            $this->AddVar("form_update_faq_kategori", "IS_EMPTY", "NO");
            $data[0]['id'] = $this->mrConfig->Enc($data[0]['id']);
            $this->ParseData('form_update_faq_kategori', $data, "KATEGORI_");

         }
         $this->ShowErrorMessage();
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