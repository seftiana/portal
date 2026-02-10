<?php
/**
 * DisplayViewFeedbackDetail
 * DisplayViewFeedbackDetail class
 * 
 * @package feedback 
 * @author Maya Alipin
 * @copyright Copyright (c) 2006 GamaTechno
 * @version 1.0 
 * @date 2006-06-13
 * @revision 
 *
 */
 
class DisplayViewFeedbackDetail extends DisplayBaseFull {
   var $mType;
   var $mKeySearch;
   var $mFeedbackId;
   var $mErrorMessage;
   
   function DisplayViewFeedbackDetail(&$config, &$security, $id, $type, $search, $err) {
      DisplayBaseFull::DisplayBaseFull($config, $security);
      $this->mType = $type;
      $this->mKeySearch = $search;
      $this->mFeedbackId = $id;
      $this->mErrorMessage = $err;
   
      //set template untuk error dan empty box DisplayBase::SetErrorAndEmptyBox
      $this->SetErrorAndEmptyBox();
      
      $this->SetTemplateBasedir($this->mrConfig->GetValue('app_module') . 'feedback/templates/');
      $this->SetTemplateFile('feedback_detail.html');
      
   }
   
   function GetListPrioritas($priorDef) {
      $refObj = new Reference($this->mrConfig);
      $arrPrior = $refObj->GetListFeedbackPriority();
      if ($arrPrior !== false) {
         foreach ($arrPrior as $key=>$value) {
            if ($priorDef == $value['id']) {
               $arrPrior[$key]['selected'] = "selected";
            } else {
               $arrPrior[$key]['selected'] = "";            
            }
         }
      }
      return $arrPrior;
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
         if ($dataFeedback[0]['tanggal_komentar'] != "") {
            $tglTemp = explode(" ", $dataFeedback[0]['tanggal_komentar']);
            $dataFeedback[0]['tanggal_komentar'] = $this->IndonesianDate($tglTemp[0]) . " " . $tglTemp[1];
         }
         if ($dataFeedback[0]['prioritas_id']=='0' && $this->mType != "new") {
            $this->mType = "[new]";
         }
         if ($this->mType == "new" || $this->mType == "[new]") {
            $this->AddVar('prioritas', 'CHANGEABLE', 'YES');
            $listPr = $this->GetListPrioritas($dataFeedback[0]['prioritas_id']);
            if (false !== $listPr) {
               $this->ParseData('prioritas_list', $listPr, 'PR_');
            }
            $this->SetAttribute('btnUbahPrioritas', 'visibility', 'visible');
         } else {
            $this->AddVar('prioritas', 'CHANGEABLE', 'NO');
            $this->AddVar('prioritas', 'FB_PRIORITAS',$dataFeedback[0]['prioritas'] );
         }
      }

      $this->ParseData('data_feedback', $dataFeedback, 'FB_');
      $this->AddVar('content', 'TYPE', $this->mrConfig->Enc($this->mType));
      $this->AddVar('content', 'KEY_SEARCH', $this->mKeySearch );
      $this->AddVar('content', 'URL_PROCESS', $this->mrConfig->GetURL('feedback', 'feedback', 'process'));
      
      if ($this->mErrorMessage != "") {
         $this->SetAttribute('error_box', 'visibility', 'visible');
         $this->AddVar("error_box", "ERROR_MESSAGE",
            $this->ComposeErrorMessage("Proses perubahan prioritas gagal, harap ulangi kembali.\n", $this->mErrorMessage));
      }
      
      $this->DisplayTemplate();
   }

}
?>