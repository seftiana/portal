<?php

class DisplayViewSchoolarshipRegistration extends DisplayBaseFull {
	var $mBeasiswaId;
	var $mErrorMessage;

	function DisplayViewSchoolarshipRegistration(&$configObject, &$security, $beaId, $err) {
		DisplayBaseFull::DisplayBaseFull($configObject, $security);
      $this->mBeasiswaId = $beaId;    
		$this->mErrorMessage = $err;
		$this->SetErrorAndEmptyBox();  
      $this->SetTemplateBasedir($configObject->GetValue('app_module') . 'schoolarship/templates/');
      $this->SetTemplateFile('view_schoolarship_registration.html');
	}
	
	function GetServiceServer() {
		$ref = new Reference($this->mrConfig) ;
		$server = $ref->GetAllUnitData($this->mrConfig->GetValue('si_beasiswa'));
		return $server[0]['service_address'];
	}
	
	function GetDataOrangTua($server) {
		$beasiswaServ = new SchoolarshipClientService($server, false);
		$data = $beasiswaServ->GetParentList($this->mrUserSession->GetProperty('UserReferenceId'));
		$this->DoUpdateServiceStatus($beasiswaServ, $data, 'Beasiswa');
		return $data;
	}
	
	function GetDataSaudara($server) {
		$beasiswaServ = new SchoolarshipClientService($server, false);
		$data = $beasiswaServ->GetRelativeList($this->mrUserSession->GetProperty('UserReferenceId'));
		return $data;
	}
	
	function Display() {
      if ($this->mErrorMessage != "") {
         $errtemp = explode('|', $this->mErrorMessage);
      }
		$servServer = $this->GetServiceServer();		
      $dataOrtu = $this->GetDataOrangTua($servServer);
      
		DisplayBaseFull::Display("[ Logout ]");
      
      if (!empty($errtemp)) {
         $this->SetAttribute('error_box', 'visibility', 'visible');
         if ($errtemp[0] == "updateOrangtua") {
            if ($errtemp[1] == "") {               
               $this->addVar('error_type', 'TYPE', 'INFO') ;
               $this->AddVar("error_box", 'ERROR_MESSAGE', "Proses update data orang tua berhasil.");
            } else {
               $this->AddVar("error_box", 'ERROR_MESSAGE', "Proses update data orang tua tidak berhasil.");
            }
         } elseif ($errtemp[0] == "insertOrangtua") {
            if ($errtemp[1] == "") {
               $this->addVar('error_type', 'TYPE', 'INFO') ;
               $this->AddVar("error_box", 'ERROR_MESSAGE', "Proses tambah data orang tua berhasil.");
            } else {
               $this->AddVar("error_box", 'ERROR_MESSAGE', "Proses tambah data orang tua tidak berhasil.");
            }
         } elseif ($errtemp[0] == "updateSaudara") {
            if ($errtemp[1] == "") {
               $this->addVar('error_type', 'TYPE', 'INFO') ;
               $this->AddVar("error_box", 'ERROR_MESSAGE', "Proses update data saudara berhasil.");
            } else {
               $this->AddVar("error_box", 'ERROR_MESSAGE', "Proses update data saudara tidak berhasil.");
            }
         } elseif ($errtemp[0] == "insertSaudara") {
            if ($errtemp[1] == "") {
               $this->addVar('error_type', 'TYPE', 'INFO') ;
               $this->AddVar("error_box", 'ERROR_MESSAGE', "Proses tambah data saudara berhasil.");
            } else {
               $this->AddVar("error_box", 'ERROR_MESSAGE', "Proses tambah data saudara tidak berhasil.");
            }
         }
      }
      
      
		if (!empty($dataOrtu)) {
         $len = sizeof($dataOrtu);
         for ($i=0; $i<$len; $i++) {
            switch ($dataOrtu[$i]['ket_keluarga']) {
               case 1:
                  $dataOrtu[$i]['ket_keluarga'] = 'Ayah';
                  break;
               case 2:
                  $dataOrtu[$i]['ket_keluarga'] = 'Ibu';
                  break;
               case 3:
                  $dataOrtu[$i]['ket_keluarga'] = 'Wali';
                  break;
            }
            if ($dataOrtu[$i]['status'] == "N") {
               $dataOrtu[$i]['status'] = 'masih hidup';
            } else {
               $dataOrtu[$i]['status'] = 'sudah meninggal';
            }
            $dataOrtu[$i]['urlupdate'] = $this->mrConfig->GetURL('schoolarship','orangtua','input') .
               "&bea=" . $this->mrConfig->Enc($this->mBeasiswaId) . '&ortu=' . $this->mrConfig->Enc($dataOrtu[$i]['id_ortu']);
         }
         
			$this->addVar('data_orangtua', 'ORANGTUA_IS_EMPTY', 'NO') ;
			$this->ParseData('data_orangtua_item', $dataOrtu, 'ORTU_', 1);
		} else {
			$this->addVar('data_orangtua', 'ORANGTUA_IS_EMPTY', 'YES') ;
         $this->addVar('empty_type', 'TYPE', 'INFO') ;
			$this->SetAttribute('empty_box', 'visibility', 'visible');
			$this->AddVar("empty_box", 'WARNING_MESSAGE', 
				$this->ComposeErrorMessage('Data orang tua belum ada.', $this->mErrorMessage));   
		}
		
		$dataSaudara = $this->GetDataSaudara($servServer);
      if (!empty($dataSaudara)) {
         $len = sizeof($dataSaudara);
         for ($i=0; $i<$len; $i++) {
            if ($dataSaudara[$i]['stat_nikah'] == "N") {
               $dataSaudara[$i]['stat_nikah'] = "Belum Menikah";
            } else {
               $dataSaudara[$i]['stat_nikah'] = "Sudah Menikah";
            }
            if ($dataSaudara[$i]['stat_kel'] == "1") {
               $dataSaudara[$i]['stat_kel'] = "Adik";
            } else {
               $dataSaudara[$i]['stat_kel'] = "Kakak";
            }
            $dataSaudara[$i]['urlupdate'] = $this->mrConfig->GetURL('schoolarship','saudara','input') .
               "&bea=" . $this->mrConfig->Enc($this->mBeasiswaId) . '&sdr=' . $this->mrConfig->Enc($dataSaudara[$i]['id_saudara']);
         }
			$this->addVar('data_saudara', 'SAUDARA_IS_EMPTY', 'NO') ;
			$this->ParseData('data_saudara_item', $dataSaudara, 'SDR_', 1);
		} else {
			$this->addVar('data_saudara', 'SAUDARA_IS_EMPTY', 'YES') ;
			$this->AddVar("data_saudara", 'WARNING_MESSAGE', 
				$this->ComposeErrorMessage('Data saudara belum ada.', $this->mErrorMessage));   
		}
      $this->addVar('content', 'URL_PROCESS', $this->mrConfig->GetURL('schoolarship', 'schoolarship', 'process') . 
         '&bea=' . $this->mrConfig->Enc($this->mBeasiswaId)) ;
		$this->DisplayTemplate();
	}

}
?>