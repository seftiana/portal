<?php
   /**
   * ProposedClassesClientService
   * ProposedClassesClientService class
   * 
   * @package academic_report 
   * @author Yudhi Aksara, S.Kom
   * @copyright Copyright (c) 2006 GamaTechno
   * @version 1.0 
   * @date 2006-03-14
   * @revision 
   *
   */
   
   class ProposedClassesClientService extends SIASettingClientService {
      var $mClassId;
      
      function ProposedClassesClientService($soap_server,$wsdl_status, $userId, $prodiId) {
         SIASettingClientService::SIASettingClientService ($soap_server,$wsdl_status, $userId, $prodiId);
         $this->SetReqServiceParams('kbk_proposed_classes', 'proposed_classes');
      }
            
      function GetAllProposedClassesKrsForSemester($mhsNiu) {
         $this->mReqServiceParams["pAct"] = "GetAllProposedClassesKrsForSemester";
         $dataParams = array($this->GetProperty("SemesterProdiSemesterId"),$this->GetProperty("UserId"),$mhsNiu);
         $serviceParams = array($this->mReqServiceParams, $dataParams);
         $result = $this->Call ("Dispatch", $serviceParams);
         return $result;
      }
      
      function GetAllProposedClassesSemesterForSemester($mhsNiu) {
         $this->mReqServiceParams["pAct"] = "GetAllProposedClassesSemesterForSemester";
         $dataParams = array($this->GetProperty("SemesterProdiSemesterId"),$this->mUserProdiId,$mhsNiu);
         $serviceParams = array($this->mReqServiceParams, $dataParams);         
         $result = $this->Call ("Dispatch", $serviceParams);         
         /*$this->Request();
		 $this->Response();
		 $this->Debug();
		 print_r($result);
		 exit();*/
         return $result;
      }
      
      function GetAllInfoDetailForClass() {
         $this->mReqServiceParams["pAct"] = "GetAllInfoDetailForClass";
         $dataParams = array($this->mClassId);
         $serviceParams = array($this->mReqServiceParams, $dataParams);         
         $result = $this->Call ("Dispatch", $serviceParams);
         return $result;
      }
      
      function GetNamaKurikulum($kurikulumId) {
         $this->mReqServiceParams["pAct"] = "GetNamaKurikulum";
         $dataParams = array($kurikulumId);
         $serviceParams = array($this->mReqServiceParams, $dataParams);
         $result = $this->Call ("Dispatch", $serviceParams);
         return $result;
      }
      
      function GetJadwalKuliahForArrayClass($arrKelas) {
         $this->mReqServiceParams["pAct"] = "GetJadwalKuliahForArrayClass";
         $dataParams = array($arrKelas);
         $serviceParams = array($this->mReqServiceParams, $dataParams);
         $result = $this->Call ("Dispatch", $serviceParams);
         return $result;
      }
      
      function GetAllProdiForAdministrasi() {
		 $this->mReqServiceParams["pAct"] = "GetAllProdiForAdministrasi";	
		 $dataParams = array();
		 $serviceParams = array($this->mReqServiceParams, $dataParams);
         $result = $this->Call ("Dispatch", $serviceParams);         
         return $result;
	  }
     
     function getResKlsJmlhTerlaksana($klsId){
         $this->mReqServiceParams["pAct"] = "getResKlsJmlhTerlaksana";	
         $dataParams = array($klsId);
         $serviceParams = array($this->mReqServiceParams, $dataParams);
         $result = $this->Call("Dispatch", $serviceParams);
         //echo '<pre>'; print_r($result); exit;         
         return $result;      
     }
     
     function getDataKehadiran($klsId,$mhsNiu){         
         $this->mReqServiceParams["pAct"] = "getDataKehadiran";	
         $dataParams = array($klsId,$mhsNiu);
         $serviceParams = array($this->mReqServiceParams, $dataParams);
         $result = $this->Call("Dispatch", $serviceParams);
         //echo '<pre>'; print_r($result); exit;         
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