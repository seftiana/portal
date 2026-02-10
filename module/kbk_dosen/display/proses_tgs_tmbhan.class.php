<?php
/**
 * @author Nikolius
 * @email n1colius.lau@gmail.com
 * @date 11 - 9 - 2012 10:38
 */
class ProsesTgsTmbhan extends ProcessBase {
   
   var $mDosenServiceObj;
   var $mServiceServerAddress;   
   var $mUserIdentity;
   var $dataPost;
   
   function ProsesTgsTmbhan($configObject, $security, $serviceAddress, $_POST) {
      ProcessBase::ProcessBase($configObject) ;
      $this->mServiceServerAddress = $serviceAddress;
      $this->mUserIdentity = $security->mUserIdentity;
      $this->mDosenServiceObj = new DosenClientService($this->mServiceServerAddress, false, $this->mUserIdentity->GetProperty("UserReferenceId"), $this->mUserIdentity->GetProperty("UserProdiId"));
      $this->dataPost = $_POST;      
   }
   
   function tambahTgsTmbhan(){
      $proses = $this->mDosenServiceObj->tambahTgsTmbhan($this->dataPost['krsdtId'],$this->dataPost['krsdpnatgsJudulTgs']);
      return $proses;
   }
   
   function editTgsTmbhan(){
      $proses = $this->mDosenServiceObj->editTgsTmbhan($this->dataPost['id'],$this->dataPost['krsdpnatgsJudulTgs']);
      return $proses;
   }
   
   function hapusTgsTmbhan(){
      $proses = $this->mDosenServiceObj->hapusTgsTmbhan($this->dataPost['id']);
      return $proses;      
   }
}
?>