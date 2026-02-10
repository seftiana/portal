<?php

class ProcessFeedback extends ProcessBase {
   var $mErrorMessage;
   var $mFeedbackObj;

   function ProcessFeedback(&$configObject,&$security) {
      ProcessBase::ProcessBase($configObject,$security);
      $this->mFeedbackObj = new Feedback($this->mrConfig);
   }
   
   function AddFeedback($username, $feedback) {
      $this->mFeedbackObj->SetProperty('UserName', $username);
      $this->mFeedbackObj->SetProperty('IsiFeedback', $feedback);
      if (false === $this->mFeedbackObj->DoAddFeedback()) {
         $this->mErrorMessage = $this->mFeedbackObj->GetProperty('FeedbackErrorMessage');
         return false;
      } else {
         return true;
      }
   }
   
   function DeleteFeedback($feedbackId) {
      $this->mFeedbackObj->SetProperty('FeedbackId', $feedbackId);
      if (false === $this->mFeedbackObj->DoDeleteFeedback()) {
         $this->mErrorMessage = $this->mFeedbackObj->GetProperty('FeedbackErrorMessage');
         return false;
      } else {
         return true;
      }
   }
   
   function DeleteArrayFeedback($arrFeedbackId) {
      if (false === $this->mFeedbackObj->DoDeleteFeedback(true, $arrFeedbackId)) {
         $this->mErrorMessage = $this->mFeedbackObj->GetProperty('FeedbackErrorMessage');
         return false;
      } else {
         return true;
      }
   }
   
   function ChangePriority($priority, $feedbackId, $isNew= false) {
      $this->mFeedbackObj->SetProperty('FeedbackId', $feedbackId);
      $this->mFeedbackObj->SetProperty('Priority', $priority);
      if (false === $this->mFeedbackObj->DoChangePriority($isNew)) {
         $this->mErrorMessage = $this->mFeedbackObj->GetProperty('FeedbackErrorMessage');
         return false;
      } else {
         return true;
      }
   }
   
   function ChangePriorityForArrayFeedback($arrFeedbackId, $priority) {
      $this->mFeedbackObj->SetProperty('Priority', $priority);
      if (false === $this->mFeedbackObj->DoChangePriority(false, true, $arrFeedbackId)) {
         $this->mErrorMessage = $this->mFeedbackObj->GetProperty('FeedbackErrorMessage');
         return false;
      } else {
         return true;
      }
   }
   
   function InsertComment ($priority, $comment,$id) {
      $this->mFeedbackObj->SetProperty('FeedbackId', $id);
      $this->mFeedbackObj->SetProperty('Komentar', $comment);
      $this->mFeedbackObj->SetProperty('Priority', $priority);
      if (false === $this->mFeedbackObj->DoUpdateFeedback()) {
         $this->mErrorMessage = $this->mFeedbackObj->GetProperty('FeedbackErrorMessage');
         return false;
      } else {
         return true;
      }
   }
}
?>