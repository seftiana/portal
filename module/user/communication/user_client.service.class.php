<?php

   class UserClientService extends ServiceClient
   {
      var $mReqServiceParams;
      var $mUserId;
      var $mUserRole;
      
      
      function UserClientService($soap_server, $wsdl_status, $userId)
      {
         ServiceClient::ServiceClient($soap_server, $wsdl_status);
         $this->mReqServiceParams = array('pModule' => 'user', 
                                          'pSub' => 'user');
         $this->mUserId = $userId;
      }
      
      function GetUserInfo($infoLengkap=0)
      {
         $tmp = array('pAct' => 'GetUserInfo');
         $this->mReqServiceParams = array_merge($this->mReqServiceParams, $tmp);
         $dataParams = array($this->GetProperty("UserId"), $this->GetProperty("UserRole"), $infoLengkap);
         
         $serviceParams = array($this->mReqServiceParams, $dataParams);
         //print_r($serviceParams);
         $result = $this->Call("Dispatch", $serviceParams);
		 //$this->Request();
		 //$this->Response();
		 //$this->Debug();
		 //print_r($result);
		 //exit();
         return $result;
      }
	  
	  function GetSemesterAktifInfo() {
         $tmp = array('pAct' => 'GetSemesterAktifInfo');
         $this->mReqServiceParams = array_merge($this->mReqServiceParams, $tmp);
         $dataParams = array();
         $serviceParams = array($this->mReqServiceParams, $dataParams);
         $result = $this->Call("Dispatch", $serviceParams);
		 //$this->Request();
		 //$this->Response();
		 //$this->Debug();
		 //print_r($result);
		 //exit();
         return $result;
      }
      
      function GetUserProfile()
      {
         $tmp = array('pAct' => 'GetUserProfile');
         $this->mReqServiceParams = array_merge($this->mReqServiceParams, $tmp);
         $dataParams = array($this->GetProperty("UserId"), $this->GetProperty("UserRole"));
         
         $serviceParams = array($this->mReqServiceParams, $dataParams);         
         $result = $this->Call("Dispatch", $serviceParams);         
		/*$this->Request();
		 $this->Response();
		 $this->Debug();
		 print_r($result);
		 exit();*/
         return $result;
      }
      
      function GetUserPt()
      {
         $tmp = array('pAct' => 'GetUserPt');
         $this->mReqServiceParams = array_merge($this->mReqServiceParams, $tmp);      
		 $dataParams = array($this->GetProperty("UserId"), $this->GetProperty("UserRole"));   
         $serviceParams = array($this->mReqServiceParams, $dataParams);
         
         $result = $this->Call("Dispatch", $serviceParams);
         return $result;
      }	  
	  
		function GetTanggunganPendapatanOrtumhs() {
			$tmp = array('pAct' => 'GetTanggunganPendapatanOrtumhs');
         $this->mReqServiceParams = array_merge($this->mReqServiceParams, $tmp);
         $dataParams = array($this->GetProperty("UserId"));
         $serviceParams = array($this->mReqServiceParams, $dataParams);
         $result = $this->Call("Dispatch", $serviceParams);
         return $result;
		}
	  
		function GetDataAgama() {
			$tmp = array('pAct' => 'GetDataAgama');
         $this->mReqServiceParams = array_merge($this->mReqServiceParams, $tmp);
         $dataParams = array();
         $serviceParams = array($this->mReqServiceParams, $dataParams);
         $result = $this->Call("Dispatch", $serviceParams);
         return $result;
		}
	  
		function GetDataPropinsi() {
			$tmp = array('pAct' => 'GetDataPropinsi');
         $this->mReqServiceParams = array_merge($this->mReqServiceParams, $tmp);
         $dataParams = array();
         $serviceParams = array($this->mReqServiceParams, $dataParams);
         $result = $this->Call("Dispatch", $serviceParams);
         return $result;
		}
	  
		function GetDataKota($propinsi) {
			$tmp = array('pAct' => 'GetDataKota');
         $this->mReqServiceParams = array_merge($this->mReqServiceParams, $tmp);
         $dataParams = array($propinsi);
         $serviceParams = array($this->mReqServiceParams, $dataParams);
         $result = $this->Call("Dispatch", $serviceParams);
         return $result;
		}
	  
		function GetDataSmta($kota) {
			$tmp = array('pAct' => 'GetDataSmta');
         $this->mReqServiceParams = array_merge($this->mReqServiceParams, $tmp);
         $dataParams = array($kota);
         $serviceParams = array($this->mReqServiceParams, $dataParams);
         $result = $this->Call("Dispatch", $serviceParams);
         return $result;
		}
	  
		function GetDataWargaNegara() {
			$tmp = array('pAct' => 'GetDataWargaNegara');
         $this->mReqServiceParams = array_merge($this->mReqServiceParams, $tmp);
         $dataParams = array();
         $serviceParams = array($this->mReqServiceParams, $dataParams);
         $result = $this->Call("Dispatch", $serviceParams);
         return $result;
		}
		
		function GetDataHistoryPembayaran($count=0) {
			$tmp = array('pAct' => 'GetDataHistoryPembayaran');
         $this->mReqServiceParams = array_merge($this->mReqServiceParams, $tmp);
		 $count = (int)(($count<1)?1:$count);
         $dataParams = array($this->GetProperty("UserId"), $count);
         $serviceParams = array($this->mReqServiceParams, $dataParams);
         $result = $this->Call("Dispatch", $serviceParams);
		 //$this->Request();
		 //$this->Response();
		 //$this->Debug();
		 //print_r($result);
		 //exit();
         return $result;
		}
		
		#add ccp 26-8-2019
		function GetDataAccountEmail() {
			$tmp = array('pAct' => 'GetDataAccountEmail');
			$this->mReqServiceParams = array_merge($this->mReqServiceParams, $tmp);
			$dataParams = array($this->GetProperty("UserId"));
			$serviceParams = array($this->mReqServiceParams, $dataParams);
			$result = $this->Call("Dispatch", $serviceParams);
			//$this->Request();
			//$this->Response();
			//$this->Debug();
			//print_r($result);
			//exit();
			return $result;
		}
		#end

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
	
	//add ccp 22-10-2018
	function GetInputNilaiAkademik($prodiId) {
		$tmp = array('pAct' => 'GetInputNilaiAkademik');
		$this->mReqServiceParams = array_merge($this->mReqServiceParams, $tmp);
		$dataParams = array($prodiId);
		$serviceParams = array($this->mReqServiceParams, $dataParams);
		$result = $this->Call("Dispatch", $serviceParams);
		return $result;
	}
		
	//add ccp 01-11-2018
	function GetSemesterAktifInfoPerProdiMhs($prodiId) {
		$tmp = array('pAct' => 'GetSemesterAktifInfoPerProdiMhs');
		$this->mReqServiceParams = array_merge($this->mReqServiceParams, $tmp);
		$dataParams = array($prodiId);
		$serviceParams = array($this->mReqServiceParams, $dataParams);
		$result = $this->Call("Dispatch", $serviceParams);
		return $result;
	}

	//add ccp 12-02-2019
	function GetPeriodeKuisioner($prodiId) {
		$tmp = array('pAct' => 'GetPeriodeKuisioner');
		$this->mReqServiceParams = array_merge($this->mReqServiceParams, $tmp);
		$dataParams = array($prodiId);
		$serviceParams = array($this->mReqServiceParams, $dataParams);
		$result = $this->Call("Dispatch", $serviceParams);
		return $result;
	}

	//add ccp 16-07-2020
	function GetPemilu($userId) {
		$tmp = array('pAct' => 'GetPemilu');
		$this->mReqServiceParams = array_merge($this->mReqServiceParams, $tmp);
		$dataParams = array($userId);
		$serviceParams = array($this->mReqServiceParams, $dataParams);
		$result = $this->Call("Dispatch", $serviceParams);
		return $result;
	}

	#add ccp 6-9-2020
	function GetBiodataDosen($userId) {
		$tmp = array('pAct' => 'GetBiodataDosen');
		$this->mReqServiceParams = array_merge($this->mReqServiceParams, $tmp);
		$dataParams = array($userId);
		$serviceParams = array($this->mReqServiceParams, $dataParams);
		$result = $this->Call("Dispatch", $serviceParams);
		return $result;
	}
	
	
	function DoUpdateBiodataDosen($noreg,$pegNoHP,$pegNomorKtp,$pegNamaIbu,$pegAlamatRumah,$dsnNidn){
		$tmp = array('pAct' => 'DoUpdateBiodataDosen');
		$this->mReqServiceParams = array_merge($this->mReqServiceParams, $tmp);
		$dataParams = array($noreg,$pegNoHP,$pegNomorKtp,$pegNamaIbu,$pegAlamatRumah,$dsnNidn);
		$serviceParams = array($this->mReqServiceParams, $dataParams);
		$result = $this->Call("Dispatch", $serviceParams);
		// print_r ($result);die;
		return $result;
	}
	
	#add ccp 24-8-2021
	function GetBiodataMhs($userId) {
		$tmp = array('pAct' => 'GetBiodataMhs');
		$this->mReqServiceParams = array_merge($this->mReqServiceParams, $tmp);
		//$dataParams = array($userId);
		$dataParams = array($this->GetProperty("UserId"), $this->GetProperty("UserRole"));
		$serviceParams = array($this->mReqServiceParams, $dataParams);
		$result = $this->Call("Dispatch", $serviceParams);
		return $result;
	}
	function DoUpdateBiodataMhs($niu,$mhsData){
		$tmp = array('pAct' => 'DoUpdateBiodataMhs');
		$this->mReqServiceParams = array_merge($this->mReqServiceParams, $tmp);
		$dataParams = array($niu,$mhsData);
		$serviceParams = array($this->mReqServiceParams, $dataParams);
		$result = $this->Call("Dispatch", $serviceParams);
		// print_r ($result);die;
		return $result;
	}
	
	#add ccp 15-6-2023
	function GetDataSisaStudi($nim) {
		$tmp = array('pAct' => 'GetDataSisaStudi');
        $this->mReqServiceParams = array_merge($this->mReqServiceParams, $tmp);
        $dataParams = array($nim);
        $serviceParams = array($this->mReqServiceParams, $dataParams);
        $result = $this->Call("Dispatch", $serviceParams);
        return $result;
	}
    
   }
?>