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
         $this->SetReqServiceParams('proposed_classes', 'proposed_classes');
      }

      function GetSemesterPaket($mhsNiu){
         $this->mReqServiceParams["pAct"] = "GetSemesterPaket";
         $dataParams = array($this->GetProperty("UserProdiId"),$this->GetProperty("SemesterProdiSemesterId"),$this->GetProperty("UserId"),$mhsNiu);      
         $serviceParams = array($this->mReqServiceParams, $dataParams);         
         $result = $this->Call ("Dispatch", $serviceParams);      
         return $result;
      }
            
      function GetAllProposedClassesKrsForSemester($mhsNiu) {
         $this->mReqServiceParams["pAct"] = "GetAllProposedClassesKrsForSemester";
         $dataParams = array($this->GetProperty("SemesterProdiSemesterId"),$this->GetProperty("UserId"),$mhsNiu);
         $serviceParams = array($this->mReqServiceParams, $dataParams);
         $result = $this->Call ("Dispatch", $serviceParams);
		 //$this->Request();
		 //$this->Response();
		 //$this->Debug();
		 // echo"<pre>";print_r($result);echo"</pre>";
		 // exit();
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
      
      function GetAllProdiForAdministrasi($unitId) {
		 $this->mReqServiceParams["pAct"] = "GetAllProdiForAdministrasi";	
		 $dataParams = array($unitId);
		 $serviceParams = array($this->mReqServiceParams, $dataParams);
         $result = $this->Call ("Dispatch", $serviceParams);         
         return $result;
	  }
	  
      function getSemesterNama(){
         $this->mReqServiceParams["pAct"] = "getSemesterNama";
         $dataParams = array($this->GetProperty("SemesterProdiSemesterId"));
         $serviceParams = array($this->mReqServiceParams, $dataParams);
         $result = $this->Call ("Dispatch", $serviceParams);
         return $result;
      }

      function getListMkDitawarkan(){
         $this->mReqServiceParams["pAct"] = "getListMkDitawarkan";
         $dataParams = array($this->GetProperty("SemesterProdiSemesterId"), $this->mUserProdiId);
         $serviceParams = array($this->mReqServiceParams, $dataParams);
         $result = $this->Call ("Dispatch", $serviceParams);
         return $result;
      }

      function getListMkDitawarkanMhs($mhsNiu){
         $this->mReqServiceParams["pAct"] = "getListMkDitawarkan";
         $dataParams = array($this->GetProperty("SemesterProdiSemesterId"), $this->mUserProdiId, $mhsNiu);
         $serviceParams = array($this->mReqServiceParams, $dataParams);
         $result = $this->Call ("Dispatch", $serviceParams);
         return $result;
      }

      function getDataPejabatTtd($namaDokumen,$tipeSah){
         $this->mReqServiceParams["pAct"] = "getDataPejabatTtd";
         $dataParams = array($namaDokumen,$tipeSah,$this->mUserProdiId);
         $serviceParams = array($this->mReqServiceParams, $dataParams);
         $result = $this->Call ("Dispatch", $serviceParams);
         return $result;
      }

      function getDataMhs($mhsNiu){
         $this->mReqServiceParams["pAct"] = "getDataMhs";
         $dataParams = array($mhsNiu);
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
	   
		#add ccp 9-juli-2019
		function GetApprovalKrsProposedClassesSemester($mhsNiu) {
			$this->mReqServiceParams["pAct"] = "GetApprovalKrsProposedClassesSemester";
			$dataParams = array($this->GetProperty("SemesterProdiSemesterId"),$this->mUserProdiId,$mhsNiu);
			$serviceParams = array($this->mReqServiceParams, $dataParams);         
			$result = $this->Call ("Dispatch", $serviceParams);         
			return $result;
		}
		
		function GetAllInfoDetailForClassObe() {
			$this->mReqServiceParams["pAct"] = "GetAllInfoDetailForClassObe";
			$dataParams = array($this->mClassId);
			$serviceParams = array($this->mReqServiceParams, $dataParams);         
			$result = $this->Call ("Dispatch", $serviceParams);
			// $this->Request();
			// $this->Response();
			// $this->Debug();
			// echo "<pre>";print_r($result);
			// exit();
			return $result;
		}
		
	  ##add presensi online cecep 2025-11-27
	  function GetAllSemesterDataKrs($niu) {
		 $this->mReqServiceParams["pAct"] = "GetAllSemesterDataKrs";	
		 $dataParams = array($niu);
		 $serviceParams = array($this->mReqServiceParams, $dataParams);
         $result = $this->Call ("Dispatch", $serviceParams);         
         return $result;
	  }
	  
	  function GetAllProposedClassesSemesterBySelectSemester($niu,$semester_aktif) {
		 $this->mReqServiceParams["pAct"] = "GetAllProposedClassesSemesterBySelectSemester";	
		 $dataParams = array($niu,$semester_aktif);
		 $serviceParams = array($this->mReqServiceParams, $dataParams);
         $result = $this->Call ("Dispatch", $serviceParams);         
         return $result;
	  }
	  ##end presensi online ccp 2025-11-27
	  
   }
?>