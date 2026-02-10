<?php
/*
Author : Nikolius
Email : n1colius.lau@gmail.com
Date : 6/4/2014 1:29:22 AM
*/

class PengajuanCutiService extends ServiceClient{

   var $mReqServiceParams;
   var $mUserId;
   var $mUserRole;

   function PengajuanCutiService($soap_server, $wsdl_status, $userId){
      ServiceClient::ServiceClient($soap_server, $wsdl_status);
      $this->mReqServiceParams = array('pModule' => 'pengajuan_cuti','pSub' => 'pengajuan_cuti');
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

   function getDataContoh(){
      $tmp = array('pAct' => 'getDataContoh');
      $this->mReqServiceParams = array_merge($this->mReqServiceParams, $tmp);
      $dataParams = array("test");

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

   function getDataPengajuanCuti(){
      $tmp = array('pAct' => 'getDataPengajuanCuti');
      $this->mReqServiceParams = array_merge($this->mReqServiceParams, $tmp);
      $dataParams = array($this->mUserId);

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

   function getComboSemester(){
      $tmp = array('pAct' => 'getComboSemester');
      $this->mReqServiceParams = array_merge($this->mReqServiceParams, $tmp);
      $dataParams = array($this->mUserId);

      $serviceParams = array($this->mReqServiceParams, $dataParams);
      $result = $this->Call("Dispatch", $serviceParams);
      return $result;
   }

   function getComboSebabCuti(){
      $tmp = array('pAct' => 'getComboSebabCuti');
      $this->mReqServiceParams = array_merge($this->mReqServiceParams, $tmp);
      $dataParams = array();

      $serviceParams = array($this->mReqServiceParams, $dataParams);
      $result = $this->Call("Dispatch", $serviceParams);
      return $result;
   }

   function insertPengajuanCuti($varPost){
      $tmp = array('pAct' => 'insertPengajuanCuti');
      $this->mReqServiceParams = array_merge($this->mReqServiceParams, $tmp);
      $dataParams = array($this->mUserId,$varPost);

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

   function hapusPengajuanCuti($idHapus){
      $tmp = array('pAct' => 'hapusPengajuanCuti');
      $this->mReqServiceParams = array_merge($this->mReqServiceParams, $tmp);
      $dataParams = array($idHapus);

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

   function getDataFormEditPengajuanCuti($idProses){
      $tmp = array('pAct' => 'getDataFormEditPengajuanCuti');
      $this->mReqServiceParams = array_merge($this->mReqServiceParams, $tmp);
      $dataParams = array($idProses);

      $serviceParams = array($this->mReqServiceParams, $dataParams);
      $result = $this->Call("Dispatch", $serviceParams);
      return $result;
   }

   function getDataDetailPengajuanCuti($idProses){
      $tmp = array('pAct' => 'getDataDetailPengajuanCuti');
      $this->mReqServiceParams = array_merge($this->mReqServiceParams, $tmp);
      $dataParams = array($idProses);

      $serviceParams = array($this->mReqServiceParams, $dataParams);
      $result = $this->Call("Dispatch", $serviceParams);
      return $result;
   }

   function updatePengajuanCuti($varPost){
      $tmp = array('pAct' => 'updatePengajuanCuti');
      $this->mReqServiceParams = array_merge($this->mReqServiceParams, $tmp);
      $dataParams = array($varPost);

      $serviceParams = array($this->mReqServiceParams, $dataParams);
      $result = $this->Call("Dispatch", $serviceParams);
      return $result;
   }
}
?>