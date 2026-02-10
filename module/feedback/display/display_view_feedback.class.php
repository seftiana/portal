<?php
/**
 * DisplayViewFeedback
 * DisplayViewFeedback class
 * 
 * @package feedback 
 * @author Maya Alipin
 * @copyright Copyright (c) 2006 GamaTechno
 * @version 1.0 
 * @date 2006-06-13
 * @revision 
 *
 */
 
class DisplayViewFeedback extends DisplayBaseFull {
   var $mPage;
   var $mErrorMessage;
   var $mType;
   var $mKeySearch;

   function DisplayViewFeedback(&$config, &$security, $page, $type, $search, $err) {
      DisplayBaseFull::DisplayBaseFull($config, $security);
      define("ROW_PER_PAGE", 15);                      
      $this->mPage = $page;
      $this->mType = $type;
      $this->mErrorMessage = $err;
      $this->mKeySearch = $search;
   
      //set template untuk error dan empty box DisplayBase::SetErrorAndEmptyBox
      $this->SetErrorAndEmptyBox();
      //set template untuk navigasi DisplayBase::SetNavigationTemplate
      $this->SetNavigationTemplate();
      
      $this->SetTemplateBasedir($this->mrConfig->GetValue('app_module') . 'feedback/templates/');
      $this->SetTemplateFile('view_feedback.html');
   }
   
   
   function GetListPrioritas() {
      $refObj = new Reference($this->mrConfig);
      $arrPrior = $refObj->GetListFeedbackPriority();
      $list = array();
      if ($arrPrior !== false) {
         foreach ($arrPrior as $key=>$value) {
            if ($value['id'] != 0) {
               $list[$key] = $value;
            }
         }
      }
      return $list;
   }
   
   function Display() {
      DisplayBaseFull::Display('[ Logout ]');
      $feedbackObj = new Feedback($this->mrConfig);
      $urlDetil = $this->mrConfig->GetURL('feedback', 'feedback_detail', 'view');
      $start_record = $this->mPage * ROW_PER_PAGE - ROW_PER_PAGE;
      $jmlNew = $feedbackObj->GetTotalNewFeedback();
      if ($jmlNew === false)
         $jmlNew = 0;
         
      $jmlRead = $feedbackObj->GetTotalFeedback();
      if ($jmlRead === false)
         $jmlRead = 0;
         
      $urlProcess = $this->mrConfig->GetURL('feedback', 'feedback', 'process');
      $url = $this->mrConfig->GetURL('feedback', 'feedback', 'view');
      if ($this->mType == "new") {
         $urlDetil .= "&type=" . $this->mrConfig->Enc('new');
         $this->AddVar('cont_feedback', 'FEEDBACK_TYPE', 'NEW');
         $data = $feedbackObj->GetNewFeedback(($start_record), ROW_PER_PAGE) ;
         $templateName = 'new_feedback';
         $templateVar = 'NEWDATA_IS_EMPTY';
         $recordcount = $jmlNew;
         $urlPage = $url . "&type=" . $this->mrConfig->Enc('new') ;
         $keySearchEnc = '';
      } else {
         $this->AddVar('cont_feedback', 'URL_PROCESS', $urlProcess);
         $this->AddVar('cont_feedback', 'CARI_FEEDBACK', $this->mKeySearch);
         $feedbackObj->SetProperty('IsiFeedback', $this->mKeySearch);
         $data = $feedbackObj->SearchFeedbackByIsi(($start_record), ROW_PER_PAGE) ;
         $templateName = 'data_feedback';
         $templateVar = 'DATA_IS_EMPTY';
         $recordcount = $feedbackObj->GetTotalSearchFeedback();
         $keySearchEnc = "&key=" . $this->mrConfig->Enc($this->mKeySearch); 
         $urlDetil .= $keySearchEnc;
         $urlPage = $url . $keySearchEnc ;
      }
      if ($data !== false) {            
         $arrPrior = $this->GetListPrioritas();
         if ($arrPrior !== false)
            $this->ParseData('priority_list', $arrPrior, "PRIOR_");
            
         $this->AddVar($templateName, $templateVar, 'NO');         
         foreach ($data as $key=>$value) {
            if (strlen($value['isi']) > 20){
               $data[$key]['isi'] = htmlspecialchars(substr($value['isi'], 0, 20). "...");
            }
            if ($value['prioritas_id'] == '0' && $this->mType != 'new') {
               $data[$key]['new_icon'] = 'images/new.jpeg';
            } else {
                  $data[$key]['new_icon'] = '';
            }
            $data[$key]['id'] = $this->mrConfig->Enc($value['id']);
            $fid = '&fid=' . $data[$key]['id'];
            $data[$key]['url_detail'] = $urlDetil . $fid;
            if ($data[$key]['komentar'] != "" && strlen($value['komentar']) > 10){
               $data[$key]['komentar'] = htmlspecialchars(substr($value['komentar'], 0, 10) . "...");
            }
            $arrDate = explode (" ",$value['tanggal_post']);
            $data[$key]['tanggal_post'] = $this->IndonesianDate($arrDate[0]). ' ' . $arrDate[1];
            //$priorityList = $this->CreateListPrioritas($arrPrior, $value['prioritas_id']);
            //$this->AppendVarWithInnerTemplate($templateName.'_item', $data[$key], 'FB_', 'priority_list', $priorityList, 'PRIOR_', $start_record+1, true) ;
         }
         $this->ParseData($templateName.'_item', $data, "FB_", $start_record+1);
         $this->ShowPageNavigation($urlPage,$this->mPage,$recordcount, ROW_PER_PAGE);
         $this->SetAttribute('process_form', 'visibility', 'visible');
         $this->AddVar('content', 'URL_PROCESS', $urlProcess);
         $this->AddVar('process_form', 'TYPE', $this->mrConfig->Enc($this->mType));
         
         
      } else {
         $this->AddVar($templateName, $templateVar, 'YES');
         $this->SetAttribute("navigation_page", 'visibility', 'hidden');
         $this->SetAttribute("empty_box", 'visibility', 'visible');
         $this->AddVar('empty_type', 'TYPE', "INFO");
         $this->AddVar("empty_box", "WARNING_MESSAGE", 
            $this->ComposeErrorMessage("Feedback tidak ditemukan.... \n",$feedbackObj->GetProperty("FeedbackErrorMessage")));
      }
      
      if ($this->mErrorMessage != '' ) {
         $arrErr = explode('|', $this->mErrorMessage);
         if ($arrErr[0] == 'check') {
            $msg = 'Harap pilih(check) feedback yang akan di' .$arrErr[1] ;
            if ($arrErr[1] != 'hapus') {
               $msg .= 'nya';
            }
         } else {
            if ($arrErr[0] == 'edit') {
               $type = 'pengubahan';
            } elseif ($arrErr[0] == 'prior'){
               $type = 'pengubahan prioritas';
            } else {
               $type = 'penghapusan';
            }
            
            if ($arrErr[1] != '') {
               $msg = 'Proses '.$type.' feedback gagal. ';
            } else {
               $this->AddVar('error_type', 'TYPE', "INFO");
               $msg = 'Proses '.$type.' feedback berhasil. ';
            }
         }
         $this->SetAttribute("error_box", 'visibility', 'visible');
         $this->AddVar("error_box", "ERROR_MESSAGE", 
            $this->ComposeErrorMessage($msg."\n",$feedbackObj->GetProperty("FeedbackErrorMessage")));
      }
      
      $this->AddVar('content', 'URL_NEW_FEEDBACK', $url . "&type=" . $this->mrConfig->Enc('new') );
      $this->AddVar('content', 'URL_FEEDBACK', $url);
      $this->AddVar('content', 'JML_NEW', $jmlNew);
      $this->AddVar('content', 'JML_FEEDBACK', $jmlRead);
      $this->DisplayTemplate();
   }
}
?>