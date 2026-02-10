<?php

class DisplayInputSaudara extends DisplayBaseFull {
   var $mBeasiswaId;
	var $mSaudaraId;
   var $mErrorMessage;

	function DisplayInputSaudara(&$configObject, &$security, $beaId, $saudaraId, $err) {
		DisplayBaseFull::DisplayBaseFull($configObject, $security);
      $this->mBeasiswaId = $beaId;    
		$this->mSaudaraId = $saudaraId;
      $this->mErrorMessage = $err;
		$this->SetErrorAndEmptyBox();  
      $this->SetTemplateBasedir($configObject->GetValue('app_module') . 'schoolarship/templates/');
      $this->SetTemplateFile('input_saudara.html');
	}
   
   function GetDataSaudara() {
      $ref = new Reference($this->mrConfig) ;
		$server = $ref->GetAllUnitData($this->mrConfig->GetValue('si_beasiswa'));
      $beasiswaServ = new SchoolarshipClientService($server[0]['service_address'], false);
		$data = $beasiswaServ->GetRelativeList($this->mrUserSession->GetProperty('UserReferenceId'), $this->mSaudaraId);
		return $data;
   }
   
   function Display() {
      DisplayBaseFull::Display("[ Logout ]");
      if ($this->mSaudaraId != "") {
            $data = $this->GetDataSaudara();
            if ($data[0]['stat_nikah'] == "N") {
               $data[0]['menikah'] = "";
               $data[0]['belum_menikah'] = "checked";
            } else {
               $data[0]['menikah'] = "checked";
               $data[0]['belum_menikah'] = "";
            }
            
            if ($data[0]['stat_kel'] == "1") {
               $data[0]['kakak'] = "";
               $data[0]['adik'] = "checked";
            } else {
               $data[0]['kakak'] = "checked";
               $data[0]['adik'] = "";
            }
            $data[0]['act'] = "updateSaudara";
            $data[0]['id_saudara'] = $this->mrConfig->Enc($data[0]['id_saudara']);
      } else {
         $this->AddVar('content', 'SDR_KAKAK', 'checked');
         $this->AddVar('content', 'SDR_MENIKAH', 'checked');
         $this->AddVar('content', 'SDR_ACT', 'insertSaudara');
      }
      $this->AddVar('content', 'URL_PROCESS', $this->mrConfig->GetURL('schoolarship', 'schoolarship', 'process') . 
         '&bea=' . $this->mrConfig->Enc($this->mBeasiswaId)) ;
      if (!empty($data)) {
         $this->ParseData('content', $data, 'SDR_');
      }
      $this->DisplayTemplate();
   }
}
?>