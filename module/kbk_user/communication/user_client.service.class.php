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
                           
         $result = $this->Call("Dispatch", $serviceParams);		 
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
      
      function GetUserProfileMhs($mhsNiu,$role){
         $tmp = array('pAct' => 'GetUserProfile');
         $this->mReqServiceParams = array_merge($this->mReqServiceParams, $tmp);
         $dataParams = array($mhsNiu,$role);
         
         $serviceParams = array($this->mReqServiceParams, $dataParams);         
         $result = $this->Call("Dispatch", $serviceParams);         		
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