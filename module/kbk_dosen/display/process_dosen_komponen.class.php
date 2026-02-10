<?php
/**
 * @author Nikolius
 * @email n1colius.lau@gmail.com
 * @Date : 7 9 2012
 */ 
class ProcessDosenKomponen extends ProcessBase {
      var $mDosenServiceObj;
      var $mServiceServerAddress;
      var $mProcessDosenError;
      var $mUserIdentity;
      var $dataPost;

   /**
    * ProcessDosen::ProcessDosen
    * Constructor for ProcessDosen class
    *
    * @param $configObject object Configuration
    * @return void
    */
   function ProcessDosenKomponen($configObject, $security, $serviceAddress, $_POST) 
   {
      ProcessBase::ProcessBase($configObject) ;
      $this->mServiceServerAddress = $serviceAddress;
      $this->mUserIdentity = $security->mUserIdentity;
      $this->mDosenServiceObj = new DosenClientService($this->mServiceServerAddress, false, 
      $this->mUserIdentity->GetProperty("UserReferenceId"), $this->mUserIdentity->GetProperty("UserProdiId"));
      $this->dataPost = $_POST;
   }
   
   function updateKomponen(){
      $paramLog = array($this->mUserIdentity->GetProperty("ApplicationId"), $this->mUserIdentity->GetProperty("UserReferenceId"), $this->mUserIdentity->GetProperty("UserFullName"));
      $result = $this->mDosenServiceObj->updateKomponen($this->dataPost,$paramLog);
      if ($result === false) {
         $this->mProcessDosenError = $this->mDosenServiceObj->GetProperty("ErrorMessages");
         return false;
      } else {
         return true;
      }            
   }
}
?>