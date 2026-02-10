<?php

class HomeService extends ServiceClient{

   var $mReqServiceParams;
   var $mUserId;
   var $mUserRole;

   function HomeService($soap_server, $wsdl_status, $userId){
      ServiceClient::ServiceClient($soap_server, $wsdl_status);
      $this->mReqServiceParams = array('pModule' => 'home','pSub' => 'home');
      $this->mUserId = $userId;
   }

   function Request(){
      echo '<h2>Request</h2><pre>' . htmlspecialchars($this->mSoapClient->request, ENT_QUOTES) . '</pre>';
   }

   function Response(){
      echo '<h2>Response</h2><pre>' . htmlspecialchars($this->mSoapClient->response, ENT_QUOTES) . '</pre>';
   }

   function Debug(){
      echo '<h2>Debug</h2><pre>' . htmlspecialchars($this->mSoapClient->debug_str, ENT_QUOTES) . '</pre>';
   }

   function uploadFoto($ext, $varPost){
      $tmp = array('pAct' => 'uploadFoto');
      $this->mReqServiceParams = array_merge($this->mReqServiceParams, $tmp);
      $dataParams = array($this->mUserId, $ext, $varPost);

      $serviceParams = array($this->mReqServiceParams, $dataParams);
      $result = $this->Call("Dispatch", $serviceParams);

      /*
      $this->Request();
      $this->Response();
      $this->Debug();
      echo '<pre>'; print_r($result); exit;
      */

      return $result;
   }

}
?>