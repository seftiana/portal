<?php

class TugasAkhirService extends ServiceClient{

   var $mReqServiceParams;
   var $mUserId;
   var $mUserRole;

   function TugasAkhirService($soap_server, $wsdl_status, $userId){
      ServiceClient::ServiceClient($soap_server, $wsdl_status);
      $this->mReqServiceParams = array('pModule' => 'tugas_akhir','pSub' => 'tugas_akhir');
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

   function getSemesterAktif(){
      $tmp = array('pAct' => 'getSemesterAktif');
      $this->mReqServiceParams = array_merge($this->mReqServiceParams, $tmp);
      $dataParams = array();

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

   function getSyaratAkademikTugasAkhir(){
      $tmp = array('pAct' => 'getSyaratAkademikTugasAkhir');
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

   function getDataTugasAkhir(){
      $tmp = array('pAct' => 'getDataTugasAkhir');
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

   function getDetailTugasAkhir(){
      $tmp = array('pAct' => 'getDetailTugasAkhir');
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

   function getSyaratPendaftaranTugasAkhir(){
      $tmp = array('pAct' => 'getSyaratPendaftaranTugasAkhir');
      $this->mReqServiceParams = array_merge($this->mReqServiceParams, $tmp);
      $dataParams = array($this->mUserId);

      $serviceParams = array($this->mReqServiceParams, $dataParams);
      $result = $this->Call("Dispatch", $serviceParams);
      return $result;
   }

   function getComboDosen(){
      $tmp = array('pAct' => 'getComboDosen');
      $this->mReqServiceParams = array_merge($this->mReqServiceParams, $tmp);
      $dataParams = array($this->mUserId);

      $serviceParams = array($this->mReqServiceParams, $dataParams);
      $result = $this->Call("Dispatch", $serviceParams);
      return $result;
   }

   function insertTugasAkhir($varPost){
      $tmp = array('pAct' => 'insertTugasAkhir');
      $this->mReqServiceParams = array_merge($this->mReqServiceParams, $tmp);
      $dataParams = array($this->mUserId,$varPost);

      $serviceParams = array($this->mReqServiceParams, $dataParams);
      $result = $this->Call("Dispatch", $serviceParams);

      /**
      $this->Request();
      $this->Response();
      $this->Debug();
      echo '<pre>'; print_r($result); exit;
      /**/

      return $result;
   }

   function updateTugasAkhir($varPost){
      $tmp = array('pAct' => 'updateTugasAkhir');
      $this->mReqServiceParams = array_merge($this->mReqServiceParams, $tmp);
      $dataParams = array($this->mUserId,$varPost);

      $serviceParams = array($this->mReqServiceParams, $dataParams);
      $result = $this->Call("Dispatch", $serviceParams);

      /**
      $this->Request();
      $this->Response();
      $this->Debug();
      echo '<pre>'; print_r($result); exit;
      /**/

      return $result;
   }

   function hapusTugasAkhir($idHapus){
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

}
?>