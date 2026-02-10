<?php
/**
 * Feedback
 * Feedback class
 * 
 * @package feedback
 * @author Maya Alipin
 * @copyright Copyright (c) 2006 GamaTechno
 * @version 1.0 
 * @date 2006-06-12
 * @revision 
 *
 */
 
class Feedback extends DatabaseConnected{
   var $mFeedbackId;
   var $mUserName;
   var $mIsiFeedback;
   var $mKomentar;
   var $mPriority;
   var $mFeedbackErrorMessage;
   
   function Feedback($configObject) {
      DatabaseConnected::DatabaseConnected($configObject, "module/feedback/business/feedback.sql.php") ;
   }
   
   function DoAddFeedback() {
      if (!$this->Connect()) {
         $this->mFeedbackErrorMessage =  $this->GetProperty("DbErrorMessage");
         return false;
      }
      $param= array($this->mUserName, $this->mIsiFeedback);
      $result = false;
      
      if ($this->ExecuteInsertQuery($this->mSqlQueries['do_add_feedback'], $param)){
         $result = true;
         $this->mFeedbackErrorMessage = "";
      } else {
         $this->mFeedbackErrorMessage = $this->GetProperty("DbErrorMessage");
      }  
      $this->Disconnect();         
      return $result;
   }
   
   function DoDeleteFeedback($isArray=false, $arrId=null) {
         if(!$this->Connect()) {            
            $this->mFeedbackErrorMessage = $this->GetProperty("DbErrorMessage");
            return false;
         }
         
         $result = false;
         $query = 'do_delete_feedback';
         $param = array($this->mFeedbackId);
         if ($isArray===true) {
            $strFeedbackId = implode(',', $arrId);
            $param = array($strFeedbackId);
            $query = 'do_delete_array_feedback';
         }
         if ($this->ExecuteDeleteQuery($this->mSqlQueries[$query], $param)){
            $result = true;
            $this->mFeedbackErrorMessage = "";
         } else {
            $this->mFeedbackErrorMessage = $this->GetProperty("DbErrorMessage");
         }
         $this->Disconnect();
         return $result;
   }
   
   function DoUpdateFeedback() {
      if (!$this->Connect()) {
         $this->mFeedbackErrorMessage =  $this->GetProperty("DbErrorMessage");
         return false;
      }
      $param= array($this->mPriority, $this->mKomentar, $this->mFeedbackId);
      $result = false;
      if ($this->ExecuteUpdateQuery($this->mSqlQueries['do_update_feedback'], $param)){
         $result = true;
         $this->mFeedbackErrorMessage = "";
      }else {
         $this->mFeedbackErrorMessage = $this->GetProperty("DbErrorMessage");
      }
      $this->Disconnect();         
      return $result;
   }
   
   function GetAllFeedback($offset, $limit) {   
      if (!$this->Connect()) {
         $this->mFeedbackErrorMessage =  $this->GetProperty("DbErrorMessage");
         return false;
      }
      $data = $this->GetAllDataAsArray($this->mSqlQueries['get_all_feedback'], array($offset, $limit));
      if (false === $data) {
         $this->mFeedbackErrorMessage =  $this->GetProperty("DbErrorMessage");
      } else {
         $this->mFeedbackErrorMessage = '';
      }
      $this->Disconnect();
      return $data;
   }
   
   function SearchFeedbackByIsi($offset, $limit) {
      if (!$this->Connect()) {
         $this->mFeedbackErrorMessage =  $this->GetProperty("DbErrorMessage");
         return false;
      }
      $data = $this->GetAllDataAsArray($this->mSqlQueries['search_feedback_by_isi'], array($this->mIsiFeedback, $offset, $limit));
      if (false === $data) {
         $this->mFeedbackErrorMessage =  $this->GetProperty("DbErrorMessage");
      } else {
         $this->mFeedbackErrorMessage = '';
      }
      $this->Disconnect();
      return $data;
   }
   
   function GetNewFeedback($offset, $limit) {
      if (!$this->Connect()) {
         $this->mFeedbackErrorMessage =  $this->GetProperty("DbErrorMessage");
         return false;
      }
      $data = $this->GetAllDataAsArray($this->mSqlQueries['get_new_feedback'], array($offset, $limit));
      if (false === $data) {
         $this->mFeedbackErrorMessage =  $this->GetProperty("DbErrorMessage");
      } else {
         $this->mFeedbackErrorMessage = '';
      }
      $this->Disconnect();
      return $data;
   }
   
   function GetFeedbackById() {
      if (!$this->Connect()) {
         $this->mFeedbackErrorMessage = $this->GetProperty("DbErrorMessage");
         return false;
      }
      $data = $this->GetAllDataAsArray($this->mSqlQueries['get_feedback_by_id'], array($this->mFeedbackId));
      if (false === $data) {
         $this->mFeedbackErrorMessage =  $this->GetProperty("DbErrorMessage");
      } else {
         $this->mFeedbackErrorMessage = '';
      }
      $this->Disconnect();
      return $data;
   }
   
   function GetTotalNewFeedback() {
      if (!$this->Connect()) {
         $this->mFeedbackErrorMessage = $this->GetProperty("DbErrorMessage");
         return false;
      }
      $data = $this->GetDataAsOne($this->mSqlQueries['get_total_new_feedback'], array());
      if (false === $data) {
         $this->mFeedbackErrorMessage =  $this->GetProperty("DbErrorMessage");
      } else {
         $this->mFeedbackErrorMessage = '';
      }
      $this->Disconnect();
      return $data;
   }
   
   function GetTotalFeedback() {
      if (!$this->Connect()) {
         $this->mFeedbackErrorMessage = $this->GetProperty("DbErrorMessage");
         return false;
      }
      $data = $this->GetDataAsOne($this->mSqlQueries['get_total_feedback'], array());
      if (false === $data) {
         $this->mFeedbackErrorMessage =  $this->GetProperty("DbErrorMessage");
      } else {
         $this->mFeedbackErrorMessage = '';
      }
      $this->Disconnect();
      return $data;
   }
   
   function GetTotalSearchFeedback() {
      if (!$this->Connect()) {
         $this->mFeedbackErrorMessage = $this->GetProperty("DbErrorMessage");
         return false;
      }
      $data = $this->GetDataAsOne($this->mSqlQueries['get_total_search_feedback'], array($this->mIsiFeedback));
      if (false === $data) {
         $this->mFeedbackErrorMessage =  $this->GetProperty("DbErrorMessage");
      } else {
         $this->mFeedbackErrorMessage = '';
      }
      $this->Disconnect();
      return $data;
   }
   
   function DoChangePriority($isNewFeedback = false, $isArray=false, $arrFeedbackId=null) {
      if (!$this->Connect()) {
         $this->mFeedbackErrorMessage =  $this->GetProperty("DbErrorMessage");
         return false;
      }
      $param= array($this->mPriority, $this->mFeedbackId);
      $result = false;
      $query = 'do_change_priority';
      if ($isNewFeedback === true) {
         $query = 'do_change_priority_new_feedback';
      } 
      if ($isArray === true){
         $strFeedbackId = implode(',', $arrFeedbackId);
         $param = array($this->mPriority, $strFeedbackId);
         $query = 'do_change_priority_array_feedback';
      }
      if ($this->ExecuteUpdateQuery($this->mSqlQueries[$query], $param)){
         $result = true;
         $this->mFeedbackErrorMessage = "";
      }else {
         $this->mFeedbackErrorMessage = $this->GetProperty("DbErrorMessage");
      }
      $this->Disconnect();         
      return $result;
   }
}

?>