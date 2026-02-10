<?php

   class ProcessBase
   {
      var $mrConfig;
      var $mProcessBaseErrorMessage;
      
      function ProcessBase(&$configObject)
      {
         //session_start();
         $this->mrConfig = &$configObject;        
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
      
      function ValidateForm($arrData, $arrValidateFunc, $arrNama) {
         foreach ($arrData as $key=>$value){
            $result = true;  
            $function_name = "ValidateEmpty";
            if (isset($arrValidateFunc[$key]) && $arrValidateFunc[$key]!=""){
               $function_name = $arrValidateFunc[$key];
            }
            $result = $this->$function_name($value);
               
            if ($result===false){
               $this->mProcessBaseErrorMessage = $arrNama[$key] ." tidak boleh kosong";
               return false;
            }
         }
      }
      
      function ValidateEmpty($value) {
         if ($value ==="")
            return false;
         else
            return true;
      }
      
      function ComposeErrorMessage($errorUser="", $errorSystem="")  {
         $developerWarning = $this->mrConfig->GetValue('enable_developer_warning');
         if ($developerWarning === true) {
            return $errorUser . "\n" . $errorSystem;
         } else {
            return $errorUser;
         }
      }
   } 
?>