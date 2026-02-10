<?php
   /**
   * AcademicPlanClientService
   * AcademicPlanClientService class
   * 
   * @package academic_report 
   * @author Yudhi Aksara, S.Kom
   * @copyright Copyright (c) 2006 GamaTechno
   * @version 1.0 
   * @date 2006-03-14
   * @revision Maya Alipin 2006-03-21
   *
   */
   
   class AcademicPlanClientService extends SIASettingClientService {
      
      var $mKrsId;
      var $mKrsItem;
      var $mAplPengubahItem;
      var $mUserNamaPengubahItem;
      var $mUserProfilPengubahItem;
   
      function AcademicPlanClientService($soap_server,$wsdl_status, $userId, $prodiId) {
         SIASettingClientService::SIASettingClientService ($soap_server,$wsdl_status, $userId, $prodiId);
         $this->SetReqServiceParams('kbk_academic_plan', 'academic_plan');
      }
      
      function GetAllKrsItemForSemester() {
         $this->mReqServiceParams["pAct"] = "GetAllKrsItemForSemester";
         $dataParams = array($this->GetProperty("UserId"), $this->GetProperty("SemesterProdiId"));
         $serviceParams = array($this->mReqServiceParams,$dataParams);
         $result = $this->Call ("Dispatch", $serviceParams);
         return $result;
      }
      
      function GetAllKrsItemForSemesterKbk() {
         $this->mReqServiceParams["pAct"] = "GetAllKrsItemForSemesterKbk";
         $dataParams = array($this->GetProperty("UserId"), $this->GetProperty("SemesterProdiId"));
         $serviceParams = array($this->mReqServiceParams,$dataParams);
         $result = $this->Call ("Dispatch", $serviceParams);
         return $result;
      }
      
      function DoSetKrsApproval($approvalNumber) {
         $this->mReqServiceParams["pAct"] = "DoSetKrsApproval";
         //$dataParams = array($this->mKrsId, $approvalNumber);
         $dataParams = array($this->mKrsId, $approvalNumber, $this->mAplPengubahItem, $this->mUserNamaPengubahItem, $this->mUserProfilPengubahItem);
         
         $serviceParams = array($this->mReqServiceParams,$dataParams);
         $result = $this->Call ("Dispatch", $serviceParams);
         return $result;
      }

      function DoCancelKrsRevision($approvalNumber) {
         $this->mReqServiceParams["pAct"] = "DoCancelKrsRevision";
         //$dataParams = array($this->GetProperty("UserId"), $this->GetProperty("SemesterProdiId"));
         $dataParams = array($this->mKrsId, $approvalNumber);
         
         $serviceParams = array($this->mReqServiceParams,$dataParams);
         $result = $this->Call ("Dispatch", $serviceParams);
         return $result;
      }

      function GetJatahMaksimumSksForKrsId($withIp=0) {
         $this->mReqServiceParams["pAct"] = "GetJatahMaksimumSksForKrsId";
         $dataParams = array($this->GetProperty("UserId"),$this->GetProperty("SemesterProdiId"), $withIp);
         $serviceParams = array($this->mReqServiceParams,$dataParams);
         $result = $this->Call ("Dispatch", $serviceParams);
         return $result;
      }
      
      
      function DoValidateKrsItems() {
         $this->mReqServiceParams["pAct"] = "DoValidateKrsItems";
         $dataParams = array($this->GetProperty("UserId"));
         $serviceParams = array($this->mReqServiceParams, $dataParams);
         $result = $this->Call ("Dispatch", $serviceParams);
         return $result;
      }
      
      function DoDeleteKrsItem() {
         $this->mReqServiceParams['pAct'] = "DoDeleteKrsItem";
         $dataParams = array($this->mKrsItem, $this->GetProperty("CurrentPeriode"), $this->mAplPengubahItem, 
                                   $this->mUserNamaPengubahItem, $this->mUserProfilPengubahItem);
         $serviceParams = array($this->mReqServiceParams, $dataParams);
         $result = $this->Call("Dispatch", $serviceParams);
         return $result;
      }
      
      /*
        * use : set mDataProceed[0] = UserId integer
        * use : set mDataProceed[1] = SemesterProdiId integer
        * use : set mDataProceed[2] = UserProdiId integer
        * use : set mDataProceed[3] = SemesterId integer
        * use : set mDataProceed[4] = KrsItem array 
        *       set mDataProceed[5] = Periode string
        *       set mDataProceed[6] = AplikasiPengubah string
        *       set mDataProceed[7] = UserNamaPengubah string
        *       set mDataProceed[8] = UserProfilPengubah integer
      */
      function DoAddKrsProcess() {
         if ($this->GetProperty("CurrentPeriode") == "BUKANPERIODE") {
            return false;
         }
         $this->mReqServiceParams['pAct'] = "DoAddKrsProcess";
         $dataParams = array($this->GetProperty("UserId"), $this->GetProperty("SemesterProdiId"), 
                       $this->GetProperty("UserProdiId"), $this->GetProperty("SemesterProdiSemesterId"), 
                       $this->mKrsItem, $this->GetProperty("CurrentPeriode"), 
                       $this->mAplPengubahItem, $this->mUserNamaPengubahItem, $this->mUserProfilPengubahItem);
         $serviceParams = array($this->mReqServiceParams, $dataParams);         
         $result = $this->Call("Dispatch", $serviceParams);
         /*$this->Request();
		 $this->Response();
		 $this->Debug();
		 print_r($result);
		 exit();*/
         return $result;
      }
      
      function GetKrsIdMahasiswaForSemester($newId = false) {
         $dataParams[0] = $this->GetProperty("UserId");
         $dataParams[1] = $this->GetProperty("SemesterProdiId");
         $dataParams[2] = $newId;
         if ($newId) {
            $dataParams[3] = $this->GetProperty("UserProdiId");
         }
         $this->mReqServiceParams['pAct'] = "GetKrsIdMahasiswaForSemester";
         $serviceParams = array($this->mReqServiceParams, $dataParams);
         //echo "<pre>";print_r($serviceParams );echo "</pre>";exit;
         $result = $this->Call("Dispatch", $serviceParams);
         return $result;
      }      
      
      function CekKrsOnline($sempId){
      	$this->mReqServiceParams["pAct"] = "CekKrsOnline";
         $dataParams = array($sempId);
         $serviceParams = array($this->mReqServiceParams, $dataParams);
         $result = $this->Call ("Dispatch", $serviceParams);
         return $result;
      }
      
      function GetCfgKbk(){
      	$this->mReqServiceParams["pAct"] = "GetCfgKbk";
         $dataParams = array();
         $serviceParams = array($this->mReqServiceParams, $dataParams);
         $result = $this->Call ("Dispatch", $serviceParams);
         return $result;
      }
      
      function Request()
	   {
	      echo '<h2>Request</h2><pre>' . htmlspecialchars($this->mSoapClient->request, ENT_QUOTES) . '</pre>';
	   }

	   function Response()
	   {
	      echo '<h2>Response</h2><pre>' . htmlspecialchars($this->mSoapClient->response, ENT_QUOTES) . '</pre>';
	   }

	   function Debug()
	   {
	      echo '<h2>Debug</h2><pre>' . htmlspecialchars($this->mSoapClient->debug_str, ENT_QUOTES) . '</pre>';
	   }
   }
?>