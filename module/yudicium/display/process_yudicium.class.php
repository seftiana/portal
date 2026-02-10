<?php

   /**
     * ProcessMessage
     * ProcessMessage class
     * 
     * @package ProcessYudicium
     * @author Gitra Perdana
     * @copyright Copyright (c) 2006 GamaTechno
     * @version 1.0 
     * @date 2006-08-31
     * @revision 
     *
     */
   class ProcessYudicium extends ProcessBase
   {

      var $mYudiciumServiceObj;
      var $mProcessYudiciumError;

      function ProcessYudicium(&$configObject, &$security){
         ProcessBase::ProcessBase($configObject,$security);
         $this->mYudiciumServiceObj= New YudiciumClientService($security->mUserIdentity->GetProperty("ServerServiceAddress"),
               false, $security->mUserIdentity->GetProperty('UserReferenceId'), $security->mUserIdentity->GetProperty('UserProdiId'));
         $this->mYudiciumServiceObj->SetProperty("UserRole", 1);
         $this->mYudiciumServiceObj->DoSiaSetting();
      }

      function DoYudiciumRegistration(){
         $result = $this->mYudiciumServiceObj->DoYudiciumRegistration();
         if ($result === false) {
            $this->SetProperty("ProcessYudiciumRegistrationError", "Pendaftaran yudisium tidak berhasil." .
                              $this->mYudiciumServiceObj->GetProperty("ErrorMessages"));
            return false;
         } else {
            return $result;
         }
      }

   }
?>