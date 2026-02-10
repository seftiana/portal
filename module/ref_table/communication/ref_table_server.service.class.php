<?php
   // here u must include business class
   require_once $cfg->GetValue('app_module') . 'ref_table/business/ref_table.class.php';
   
   class RefTableServerService
   {
      var $mrConfig;
      var $mrDataProceed;
            
      var $mIsError;
      var $mErrorMessage;

      function RefTableServerService(&$configObject, $dataProceed)
      {         
         $this->mrConfig = &$configObject;
         $this->mrDataProceed = $dataProceed;
         $this->InitError();
      } 
         
      function InitError() {
         $this->mIsError = false;
         $this->mErrorMessage = '';
      }
      
      function SetError($strMsg) {
         $this->mIsError = true;
         $this->mErrorMessage = $strMsg;
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
      
      function PortalClientInsertFakultas() {         
         $objUserData = new RefTable($this->mrConfig);
         $objUserData->SetProperty("FakKode", $this->mrDataProceed[0]);         
         $objUserData->SetProperty("FakKodeUniv", $this->mrDataProceed[1]);         
         $objUserData->SetProperty("FakNamaResmi", $this->mrDataProceed[2]);         
         $objUserData->SetProperty("FakNamaSingkat", $this->mrDataProceed[3]);
         $objUserData->SetProperty("FakNamaAsing", $this->mrDataProceed[4]);
         $objUserData->SetProperty("FakAlamat", $this->mrDataProceed[5]);
         $objUserData->SetProperty("FakTelp", $this->mrDataProceed[6]);
         $objUserData->SetProperty("FakFax", $this->mrDataProceed[7]);
         $objUserData->SetProperty("FakEmail", $this->mrDataProceed[8]);
         $objUserData->SetProperty("FakKontakPerson", $this->mrDataProceed[9]);
         $proc = $objUserData->InsertFakultas();
         if(false === $proc) {
            $this->SetError($objUserData->GetProperty("RefTableErrorMessage"));
            return false;
         } else {
            return true;
         }         
      }
      
      function PortalClientUpdateFakultas() {         
         $objUserData = new RefTable($this->mrConfig);
         $objUserData->SetProperty("FakKode", $this->mrDataProceed[0]);         
         $objUserData->SetProperty("FakKodeUniv", $this->mrDataProceed[1]);         
         $objUserData->SetProperty("FakNamaResmi", $this->mrDataProceed[2]);         
         $objUserData->SetProperty("FakNamaSingkat", $this->mrDataProceed[3]);
         $objUserData->SetProperty("FakNamaAsing", $this->mrDataProceed[4]);
         $objUserData->SetProperty("FakAlamat", $this->mrDataProceed[5]);
         $objUserData->SetProperty("FakTelp", $this->mrDataProceed[6]);
         $objUserData->SetProperty("FakFax", $this->mrDataProceed[7]);
         $objUserData->SetProperty("FakEmail", $this->mrDataProceed[8]);
         $objUserData->SetProperty("FakKontakPerson", $this->mrDataProceed[9]);
         $proc = $objUserData->UpdateFakultas();
         if(false === $proc) {
            $this->SetError($objUserData->GetProperty("RefTableErrorMessage"));
            return false;
         } else {
            return true;
         }         
      }
      
      function PortalClientDeleteFakultas() {         
         $objUserData = new RefTable($this->mrConfig);
         $objUserData->SetProperty("FakKode", $this->mrDataProceed[0]);         
         $proc = $objUserData->DeleteFakultas();
         if(false === $proc) {
            $this->SetError($objUserData->GetProperty("RefTableErrorMessage"));
            return false;
         } else {
            return true;
         }         
      }
      
      function PortalClientInsertJurusan() {         
         $objUserData = new RefTable($this->mrConfig);
         $objUserData->SetProperty("JurKode", $this->mrDataProceed[0]);         
         $objUserData->SetProperty("JurKodeuniv", $this->mrDataProceed[1]);         
         $objUserData->SetProperty("FakKode", $this->mrDataProceed[2]);         
         $objUserData->SetProperty("JurNamaResmi", $this->mrDataProceed[3]);
         $objUserData->SetProperty("JurNamaSingkat", $this->mrDataProceed[4]);
         $objUserData->SetProperty("JurNamaAsing", $this->mrDataProceed[5]);
         $objUserData->SetProperty("JurAlamat", $this->mrDataProceed[6]);
         $objUserData->SetProperty("JurTelp", $this->mrDataProceed[7]);
         $objUserData->SetProperty("JurFax", $this->mrDataProceed[8]);
         $objUserData->SetProperty("JurEmail", $this->mrDataProceed[9]);
         $objUserData->SetProperty("JurKontakPerson", $this->mrDataProceed[10]);
         $proc = $objUserData->InsertJurusan();
         if(false === $proc) {
            $this->SetError($objUserData->GetProperty("RefTableErrorMessage"));
            return false;
         } else {
            return true;
         }         
      }
      
      function PortalClientUpdateJurusan() {         
         $objUserData = new RefTable($this->mrConfig);
         $objUserData->SetProperty("JurKode", $this->mrDataProceed[0]);         
         $objUserData->SetProperty("JurKodeuniv", $this->mrDataProceed[1]);         
         $objUserData->SetProperty("FakKode", $this->mrDataProceed[2]);         
         $objUserData->SetProperty("JurNamaResmi", $this->mrDataProceed[3]);
         $objUserData->SetProperty("JurNamaSingkat", $this->mrDataProceed[4]);
         $objUserData->SetProperty("JurNamaAsing", $this->mrDataProceed[5]);
         $objUserData->SetProperty("JurAlamat", $this->mrDataProceed[6]);
         $objUserData->SetProperty("JurTelp", $this->mrDataProceed[7]);
         $objUserData->SetProperty("JurFax", $this->mrDataProceed[8]);
         $objUserData->SetProperty("JurEmail", $this->mrDataProceed[9]);
         $objUserData->SetProperty("JurKontakPerson", $this->mrDataProceed[10]);
         $proc = $objUserData->UpdateJurusan();
         if(false === $proc) {
            $this->SetError($objUserData->GetProperty("RefTableErrorMessage"));
            return false;
         } else {
            return true;
         }         
      }
      
      function PortalClientDeleteJurusan() {         
         $objUserData = new RefTable($this->mrConfig);
         $objUserData->SetProperty("JurKode", $this->mrDataProceed[0]);         
         $proc = $objUserData->DeleteJurusan();
         if(false === $proc) {
            $this->SetError($objUserData->GetProperty("RefTableErrorMessage"));
            return false;
         } else {
            return true;
         }         
      }
      
      function PortalClientInsertProdi() {         
         $objUserData = new RefTable($this->mrConfig);
         $objUserData->SetProperty("ProdiKode", $this->mrDataProceed[0]);         
         $objUserData->SetProperty("ProdiJjarKode", $this->mrDataProceed[1]);         
         $objUserData->SetProperty("ProdiNamaResmi", $this->mrDataProceed[2]);         
         $objUserData->SetProperty("ProdiNamaAsing", $this->mrDataProceed[3]);
         $objUserData->SetProperty("ProdiNamaSingkat", $this->mrDataProceed[4]);
         $objUserData->SetProperty("ProdiKodeUm", $this->mrDataProceed[5]);
         $objUserData->SetProperty("ProdiKodeUniv", $this->mrDataProceed[6]);
         $objUserData->SetProperty("ProdiLabelNim", $this->mrDataProceed[7]);
         $objUserData->SetProperty("FakKode", $this->mrDataProceed[8]);
         $objUserData->SetProperty("JurKode", $this->mrDataProceed[9]);
         $objUserData->SetProperty("ProdiModelrId", $this->mrDataProceed[10]);
         $proc = $objUserData->InsertProdi();
         if(false === $proc) {
            $this->SetError($objUserData->GetProperty("RefTableErrorMessage"));
            return false;
         } else {
            return true;
         }         
      }
      function PortalClientUpdateProdi() {         
         $objUserData = new RefTable($this->mrConfig);
         $objUserData->SetProperty("ProdiKode", $this->mrDataProceed[0]);         
         $objUserData->SetProperty("ProdiJjarKode", $this->mrDataProceed[1]);         
         $objUserData->SetProperty("ProdiNamaResmi", $this->mrDataProceed[2]);         
         $objUserData->SetProperty("ProdiNamaAsing", $this->mrDataProceed[3]);
         $objUserData->SetProperty("ProdiNamaSingkat", $this->mrDataProceed[4]);
         $objUserData->SetProperty("ProdiKodeUm", $this->mrDataProceed[5]);
         $objUserData->SetProperty("ProdiKodeUniv", $this->mrDataProceed[6]);
         $objUserData->SetProperty("ProdiLabelNim", $this->mrDataProceed[7]);
         $objUserData->SetProperty("FakKode", $this->mrDataProceed[8]);
         $objUserData->SetProperty("JurKode", $this->mrDataProceed[9]);
         $objUserData->SetProperty("ProdiModelrId", $this->mrDataProceed[10]);
         $proc = $objUserData->UpdateProdi();
         if(false === $proc) {
            $this->SetError($objUserData->GetProperty("RefTableErrorMessage"));
            return false;
         } else {
            return true;
         }         
      }
      function PortalClientDeleteProdi() {         
         $objUserData = new RefTable($this->mrConfig);
         $objUserData->SetProperty("ProdiKode", $this->mrDataProceed[0]);         
         $proc = $objUserData->DeleteProdi();
         if(false === $proc) {
            $this->SetError($objUserData->GetProperty("RefTableErrorMessage"));
            return false;
         } else {
            return true;
         }         
      }
      
   }
?>	