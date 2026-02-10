<?php
/**
 * DisplayUpdateFeedback
 * DisplayUpdateFeedback class
 * 
 * @package feedback 
 * @author Maya Alipin
 * @copyright Copyright (c) 2006 GamaTechno
 * @version 1.0 
 * @date 2006-06-13
 * @revision 
 *
 */
 
class DisplayUpdateFeedback extends DisplayBaseFull {
   var $mKeySearch;
   var $mFeedbackId;
   
   function DisplayUpdateFeedback(&$config, &$security, $id, $search) {
      DisplayBaseFull::DisplayBaseFull($config, $security);
      $this->mKeySearch = $search;
      $this->mFeedbackId = $id;
   
      //set template untuk error dan empty box DisplayBase::SetErrorAndEmptyBox
      $this->SetErrorAndEmptyBox();
      
      $this->SetTemplateBasedir($this->mrConfig->GetValue('app_module') . 'feedback/templates/');
      $this->SetTemplateFile('update_feedback.html');
      
   }
   
   function GetListPrioritas($priorDef) {
      $refObj = new Reference($this->mrConfig);
      $arrPrior = $refObj->GetListFeedbackPriority();
      $list = array();
      if ($arrPrior !== false) {
         foreach ($arrPrior as $key=>$value) {
            if ($value['id'] != 0) {
               $list[$key] = $value;
               if ($priorDef == $value['id']) {
                  $list[$key]['selected'] = "selected";
               } else {
                  $list[$key]['selected'] = "";            
               }
            }
         }
      }
      return $list;
   }
   
   function GetDataFeedback() {
      $feedbackObj = new Feedback($this->mrConfig);
      $feedbackObj->SetProperty('FeedbackId', $this->mFeedbackId);
      return $feedbackObj->GetFeedbackById();
   }
   
   function Display() {
      DisplayBaseFull::Display('[ Logout ]');
      $dataFeedback = $this->GetDataFeedback();
      if ($dataFeedback !== false) {
         $dataFeedback[0]['id'] = $this->mrConfig->Enc($dataFeedback[0]['id']);
         $tglTemp = explode(" ", $dataFeedback[0]['tanggal_post']);
         $dataFeedback[0]['tanggal_post'] = $this->IndonesianDate($tglTemp[0]) . " " . $tglTemp[1];
         $listPr = $this->GetListPrioritas($dataFeedback[0]['prioritas_id']);
         if (false !== $listPr) {
            $this->ParseData('prioritas_list', $listPr, 'PR_');
         }
      }

      $this->ParseData('data_feedback', $dataFeedback, 'FB_');
      $this->AddVar('content', 'KEY_SEARCH', $this->mKeySearch );
      $this->AddVar('content', 'URL_PROCESS', $this->mrConfig->GetURL('feedback', 'feedback', 'process'));
      
      /*if ($this->mErrorMessage != "") {
         $this->SetAttribute('error_box', 'visibility', 'visible');
         $this->AddVar("error_box", "ERROR_MESSAGE",
            $this->ComposeErrorMessage("Proses perubahan prioritas gagal, harap ulangi kembali.\n", $this->mErrorMessage));
      }*/
      
      $this->DisplayTemplate();
   }

}
?>