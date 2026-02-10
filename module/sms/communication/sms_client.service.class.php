<?php
/**
 * SmsClientService
 * SmsClientService class
 * 
 * @package sms 
 * @author Maya Alipin 
 * @copyright Copyright (c) 2006 GamaTechno
 * @version 1.0 
 * @date 2006-06-24
 * @revision 
 *
 */
 
class SmsClientService extends ServiceClient{

   function SmsClientService($soap_server,$wsdl_status) {
      ServiceClient::ServiceClient($soap_server,$wsdl_status);
   }

   function GetIpk($niu) {
      $this->mReqServiceParams = array('pModule' => 'academic_report', 'pSub' => 'academic_report');
      $this->mReqServiceParams["pAct"] = "GetInfoIpkForSms";
      $dataParams = array($niu);
      $serviceParams = array($this->mReqServiceParams, $dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
      return $result;
   }
   
   function GetNilai($niu, $kodeMk) {
      $this->mReqServiceParams = array('pModule' => 'academic_report', 'pSub' => 'academic_report');
      $this->mReqServiceParams["pAct"] = "GetNilaiTerakhirForSms";
      $dataParams = array($niu, $kodeMk);
      $serviceParams = array($this->mReqServiceParams, $dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
      return $result;
   }
   
}
?>