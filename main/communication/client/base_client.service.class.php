<?php
   
   class ServiceClient {
   
      var $mSoapClient;
      var $mErrorMessages;
      var $mErrorStatus; //true = errrors occured, false = no errors
      var $mFaultStatus;
      var $mFaultMessages;
         
      function ServiceClient($soap_server,$wsdl_status) {
         $this->InitErrorMessages();
         $this->mSoapClient = new soapclient($soap_server, $wsdl_status);
         $err = $this->mSoapClient->getError();
         if (false !== $err) {
            $this->SetProperty("ErrorStatus", true);
            $this->SetProperty("ErrorMessages", "Constructor Error: ".$err);            
         }
      }
      
      function SetProperty($propName, $value) {
         $method_name = "Set" . $propName;
         $property_name = "m" . $propName;
         if (method_exists($this, $method_name)) {
            $this->$method_name($value);
         } else {
            $object_vars = get_object_vars($this);
            if (array_key_exists($property_name, $object_vars)) {
               $this->$property_name = $value;
            } else {
               exit($propName . " has not been declared yet!");
            }
         }
      }

      function GetProperty($propName) {
         $method_name = "Get" . $propName;
         $property_name = "m" . $propName;
         if (method_exists($this, $method_name)) {
            $value = $this->$method_name();
         } else {
            $object_vars = get_object_vars($this);
            if (array_key_exists($property_name, $object_vars)) {
               $value = $this->$property_name;
            } else {
               exit($propName . " has not been declared yet!");
            }
         }   
         return $value;
      }
      
      function InitErrorMessages() {
         $this->SetProperty("ErrorStatus", false);
         $this->SetProperty("ErrorMessages", "");
      }

      function Call($function_name,$params)	
      {
         
         $this->SetProperty("FaultStatus", false);
         $this->SetProperty("FaultMessages", "");
         $result = $this->mSoapClient->Call($function_name,$params);
         $err = $this->mSoapClient->getError();		            
         if (false !== $err) {
            $this->InitErrorMessages();
            $this->SetProperty("ErrorStatus", true);
            $this->SetProperty("ErrorMessages", "Function Call Error: ". $err); 
            if ($this->mSoapClient->fault){
               $this->SetProperty("FaultStatus", true);
               $this->SetProperty("FaultMessages", "Fault: ".$this->mSoapClient->faultstring);            
            }
            return false;
         } 
         else {
            return $result;
         }
      }

      function IsFault()	{
         return $this->GetProperty("FaultStatus");
      }
   
      function IsError()	{
         return $this->GetProperty("ErrorStatus");
      }
      
      function GetErrors()	{
         return $this->GetProperty("ErrorMessages");
      }			
   }
?>