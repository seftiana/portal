<?php
/**
 * DisplayViewFaq
 * Display class for view Faq 
 * 
 * @package 
 * @author Gitra Perdana
 * @copyright Copyright (c) 2006 GamaTechno
 * @version 1.0 
 * @date 2006-09-11
 * @revision 
 *
 */

   class DisplayViewFaqDetailUser extends DisplayBaseFull {
      var $mKatId;
      var $mId;

      function DisplayViewFaqDetailUser(&$configObject, &$security, $katId, $id){
         DisplayBaseFull::DisplayBaseFull($configObject, $security);
         $this->SetErrorAndEmptyBox();
         $this->mKatId = $katId;
         $this->mId = $id;
         $this->SetTemplateBasedir($this->mrConfig->GetValue('app_module') . 'faq/templates/');
         $this->SetTemplateFile('view_faq_detail_user.html');

      }

      function Display(){
         DisplayBaseFull::Display('[ Logout ]');

         $objFaq = new Faq($this->mrConfig);
         $objFaq->SetProperty("FaqTujuan", $this->mrUserSession->GetProperty("Role"));
         $objFaq->SetProperty("FaqKategoriId", $this->mKatId);
         $data = $objFaq->GetFaqDataByKategoriUserrole();
         $dataKategori = $objFaq->GetKategoriFaqById();
         //print_r($dataKategori);
         if ($data === false){
            $this->AddVar("detail_faq_user", "IS_EMPTY", "YES");
            $this->AddVar('empty_type', 'TYPE', "INFO");
            $this->AddVar("empty_box", "WARNING_MESSAGE", $this->ComposeErrorMessage("Data tidak ditemukan .... ",$objFaq->GetProperty('FaqErrorMessage')));
         }
         else{
            $this->AddVar("detail_faq_user", "IS_EMPTY", "NO");
            foreach($data as $key => $value){
               $data[$key]['PERTANYAAN_DETAIL'] = $data[$key]['pertanyaan'];
            }

            $this->ParseData("kategori_list", $data, "KATEGORI_");
            $this->ParseData("kategori_list_detail", $data, "DETAIL_KATEGORI_");
            $this->ParseData("content", $dataKategori, "KATEGORI_");
         }
         $this->DisplayTemplate();
      }

   }
?>