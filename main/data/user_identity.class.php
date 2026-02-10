<?php
   class UserIdentity
   {
      //Core User Identity
      var $mUser; //Username
      var $mRole; //Role
   
      //Other User Identity      
      var $mUserFullName;      
      var $mUserUnitId;
      var $mUserProdiId;
      var $mUserProdiName;
      var $mUserReferenceId;
      var $mUserFotoFile;
      var $mUserIsAgree;
      var $mUserIdNumber;
      
      var $mServerServiceAddress;
      var $mSiregServiceAddress;
      var $mIsEditBiodata;
      var $mFinansiServiceAddress;
      var $mServerServiceAvailable = array();
      
      var $mApplicationId;
      var $mLastFormData = array();      
      
      function UserIdentity($user, $role)
      {
         $this->mUser = $user;
         $this->mRole = $role;
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
   } 
?>