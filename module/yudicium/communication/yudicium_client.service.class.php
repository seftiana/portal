<?php
/**
 * SIASettingClient
 * SIASettingClient class
 * 
 * @package YudiciumClientService
 * @author Gitra Perdana 
 * @copyright Copyright (c) 2006 GamaTechno
 * @version 1.0 
 * @date 2006-08-31
 * 
 *
 */
 
class YudiciumClientService extends SIASettingClientService {

   function YudiciumClientService($soap_server,$wsdl_status, $userId, $prodiId) {
      SIASettingClientService::SIASettingClientService ($soap_server,$wsdl_status, $userId, $prodiId);
      $this->SetReqServiceParams('yudicium', 'yudicium');
   }

   function IsMahasiswaRegistered (){
      $this->mReqServiceParams["pAct"] = "IsMahasiswaRegistered";
      $dataParams = array($this->GetProperty("UserId"));
      $serviceParams = array($this->mReqServiceParams, $dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
      if ($result === false){
         return false;
      }
      else{
         return true;
      }
   }

   function GetYudiciumRequisite(){
      $this->mReqServiceParams["pAct"] = "GetYudiciumRequisite";
      $dataParams =  array($this->GetProperty("UserId"));
      $serviceParams = array($this->mReqServiceParams, $dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
      return $result;
   }

   function DoYudiciumRegistration(){
      $this->mReqServiceParams["pAct"] = "DoYudiciumRegistration";
      $dataParams = array($this->GetProperty("UserId"), $this->GetProperty("SemesterProdiSemesterId"));
      $serviceParams = array($this->mReqServiceParams, $dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
      if ($result === false){
         return false;
      }
      else{
         return true;
      }
   }

}
?>