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

   class DisplayViewFaq extends DisplayBaseFull {

      function DisplayViewFaq(&$configObject, &$security){
         DisplayBaseFull::DisplayBaseFull($configObject, $security);
         $this->SetErrorAndEmptyBox();
         $this->SetTemplateBasedir($this->mrConfig->GetValue('app_module') . 'faq/templates/');
         $this->SetTemplateFile('view_faq.html');

      }

      function Display(){
         DisplayBaseFull::Display('[ Logout ]');

         $objFaq = new Faq($this->mrConfig);
         $objFaq->SetProperty("FaqTujuan", array($this->mrUserSession->GetProperty("Role")));
         $data = $objFaq->GetFaqDataByUserrole();

         if ($data === false){
            $this->AddVar("list_faq", "IS_EMPTY", "YES");
            $this->AddVar('empty_type', 'TYPE', "INFO");
            $this->AddVar("empty_box", "WARNING_MESSAGE", $this->ComposeErrorMessage("Data tidak ditemukan .... ",$objFaq->GetProperty('FaqErrorMessage')));
         }
         else{
            $this->AddVar("list_faq", "IS_EMPTY", "NO");
            $temp = array();
            /*foreach($data as $key => $value){
               $value['URL'] = $this->mrConfig->GetURL('faq', 'faq_detail_user', 'view'). '&katid=' . $this->mrConfig->Enc($value['kategori_id']) . '&id=' . $this->mrConfig->Enc($value['id']) . '#' . $this->mrConfig->Enc($value['id']); 
               $temp[$value['kategori_nama']][] = $value;
            }*/
				foreach($data as $key => $value){
					$value['URL'] = $this->mrConfig->GetURL('faq', 'faq_detail_user', 'view'). '&katid=' . $this->mrConfig->Enc($value['kategori_id']) . '&id=' . $this->mrConfig->Enc($value['id']) . '#' . $this->mrConfig->Enc($value['id']);
               $temp[$value['kategori_nama']][] = $value;
            }
            foreach ($temp as $key => $value) {
               $ktgr['NAMA'] = $key;
               $this->AppendVarWithInnerTemplate("kategori_header", $ktgr, "UL_KATEGORI_", "kategori_list", $value, "LI_KATEGORI_");
            }

         }
         $this->DisplayTemplate();
      }

   }
?>