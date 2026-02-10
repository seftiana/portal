<?php
/**
 * DisplayViewSchoolarship
 * DisplayViewSchoolarship class
 * 
 * @package schoolarship
 * @author Maya Alipin 
 * @copyright Copyright (c) 2006 GamaTechno
 * @version 1.0 
 * @date 2006-10-06
 * @revision 
 *
 */

class DisplayViewSchoolarship extends DisplayBaseFull {
	var $mErrorMessage;

	function DisplayViewSchoolarship(&$configObject, &$security, $err) {
		DisplayBaseFull::DisplayBaseFull($configObject, $security);
		$this->mErrorMessage = $err;
		$this->SetErrorAndEmptyBox();  
      $this->SetTemplateBasedir($configObject->GetValue('app_module') . 'schoolarship/templates/');
      $this->SetTemplateFile('view_schoolarship.html');
	}

	function GetFakultasId() {
		$ref = new Reference($this->mrConfig) ;
		$fakultas = $ref->GetFakultasByProdi($this->mrUserSession->GetProperty('UserProdiId'));
		return $fakultas[0]['id'];
	}
	
	function GetServiceServer() {
		$ref = new Reference($this->mrConfig) ;
		$server = $ref->GetAllUnitData($this->mrConfig->GetValue('si_beasiswa'));
		return $server[0]['service_address'];
	}
	
	function GetDaftarBeasiswa($server, $fakultasId) {
		$beasiswaServ = new SchoolarshipClientService($server, false, $fakultasId);
		$data = $beasiswaServ->GetBeasiswaMahasiswa();
		//echo "<pre>";print_r($beasiswaServ); echo "</pre>";exit;
		return $data;
	}
	
	function GetBeasiswaTerdaftar($server) {
		$beasiswaServ = new SchoolarshipClientService($server, false);
		$data = $beasiswaServ->GetRegisteredBeasiswaForMahasiswa($this->mrUserSession->GetProperty('UserReferenceId'));
		return $data;
	}
	
	function GetBeasiswaDiterima($server) {
		$beasiswaServ = new SchoolarshipClientService($server, false);
		$data = $beasiswaServ->GetAcceptedActiveBeasiswaForMahasiswa($this->mrUserSession->GetProperty('UserReferenceId'));
		$this->DoUpdateServiceStatus($beasiswaServ, $data, 'Beasiswa');
		return $data;
	}
   
   function SetErrorMessage() {
      if ($this->mErrorMessage == "beasiswa") {
         $this->mErrorMessage = "Anda harus memilih beasiswa yang akan didaftarkan.";
      }else if ($this->mErrorMessage == "semester") {
         $this->mErrorMessage = "Pendaftaran tidak berhasil, semester anda tidak mencukupi semester minimal.";
      }else if ($this->mErrorMessage == "ipk") {
         $this->mErrorMessage = "Pendaftaran tidak berhasil, ipk anda tidak mencukupi ipk minimal.";
      }else if ($this->mErrorMessage == "pribadi") {
         // ini dikasi pesan apa yaaaa
         $this->mErrorMessage = "Pendaftaran tidak berhasil";
      }else if ($this->mErrorMessage == "pendapatan") {
         $this->mErrorMessage = "Pendaftaran tidak berhasil, pengasilan orang tua melebihi penghasilan maksimal.";
      }else if ($this->mErrorMessage == "tanggungan") {
         $this->mErrorMessage = "Pendaftaran tidak berhasil, tanggungan orang tua kurang dari tanggungan minimal.";
      }else if ($this->mErrorMessage == "history") {
         $this->mErrorMessage = "Pendaftaran tidak berhasil.";
      }else if ($this->mErrorMessage == "beasiswa") {
         $this->mErrorMessage = "Pendaftaran tidak berhasil.";
      }else if ($this->mErrorMessage == "pendaftaran berhasil") {
         $this->mErrorMessage = "Pendaftaran beasiswa berhasil dilakukan.";
         $this->AddVar("error_type", "TYPE",  "INFO");   
      }
   }
	
	function Display() {
		
		$servServer = $this->GetServiceServer();		
		$beasiswaDiterima = $this->GetBeasiswaDiterima($servServer);
		DisplayBaseFull::Display("[ Logout ]");
		if ($this->mErrorMessage != "") {
         $this->SetErrorMessage();
			$this->AddVar("error_box", "ERROR_MESSAGE",  $this->mErrorMessage);   
         $this->SetAttribute('error_box', 'visibility', 'visible');
         $this->mErrorMessage = "";
		}
		
		$fakId = $this->GetFakultasId();
		$readOnly = "NO";
		$tmplItem = "data_beasiswa_item";
		$colspan = 2;
		$arrBeasiswaId = array();
		if (empty($beasiswaDiterima)) {
			$beasiswaTerdaftar = $this->GetBeasiswaTerdaftar($servServer);
			if (!empty($beasiswaTerdaftar)){
				$len  = sizeof($beasiswaTerdaftar);
				$urlView= $this->mrConfig->GetURL('schoolarship', 'schoolarship_detail', 'view') . "&dftr=". $this->mrConfig->Enc("0");
				for ($i=0; $i<$len; $i++) {
					$arrBeasiswaId[] = $beasiswaTerdaftar[$i]['bea_id'];
					$beasiswaTerdaftar[$i]['url_detil'] =  $urlView . "&bid=" . $this->mrConfig->Enc($beasiswaTerdaftar[$i]['bea_id']);
					$beasiswaTerdaftar[$i]['tgl_daftar'] = $this->IndonesianDate($beasiswaTerdaftar[$i]['tgl_daftar']);
				}
            
				$this->SetAttribute('beasiswa_terdaftar', 'visibility', 'visible');
				$this->ParseData('beasiswa_terdaftar_item', $beasiswaTerdaftar, 'BDFTR_',1);
			}
		} else {
				$readOnly = "YES";
				$tmplItem = "data_beasiswa_item_readonly";
				$colspan = 1;
				$this->SetAttribute('beasiswa_diterima', 'visibility', 'visible');
				$this->SetAttribute('tmblDaftar', 'visibility', 'hidden');
				$arrBeasiswaId[] = $beasiswaDiterima[0]['id'];
				$beasiswaDiterima[0]['nim'] = $this->mrUserSession->GetProperty('UserIdNumber');
				$beasiswaDiterima[0]['nama_mhs'] = $this->mrUserSession->GetProperty('UserFullName');
				$beasiswaDiterima[0]['tgl_daftar'] = $this->IndonesianDate($beasiswaDiterima[0]['tgl_daftar']);
				$this->ParseData('beasiswa_diterima', $beasiswaDiterima, 'BDTR_');
		}
		
		$this->AddVar('data_beasiswa_is_readonly', 'BEASISWA_IS_READONLY', $readOnly);
		$this->AddVar('data_beasiswa', 'COLSPAN', $colspan);
		$this->AddVar('content', 'URL_PROCESS', $this->mrConfig->GetURL('schoolarship', 'schoolarship', 'process'));
		
		$dataBeasiswa = $this->GetDaftarBeasiswa($servServer, $fakId);
		if (empty($dataBeasiswa)) {
			$this->ShowEmptyMessage();
		}else {
         $len  = sizeof($dataBeasiswa);
			$urlView= $this->mrConfig->GetURL('schoolarship', 'schoolarship_detail', 'view') . "&dftr=". $this->mrConfig->Enc("1");
         $dataBeasiswaToShow = array();
         for ($i=0; $i<$len; $i++) {            
            if (in_array($dataBeasiswa[$i]['id'], $arrBeasiswaId) == false) {
               $dataBeasiswa[$i]['id_enc'] = $this->mrConfig->Enc($dataBeasiswa[$i]['id']);
               $dataBeasiswa[$i]['end_date'] = $this->IndonesianDate($dataBeasiswa[$i]['end_date']);
               /*$dataBeasiswa[$i]['periode'] = $this->IndonesianDate($dataBeasiswa[$i]['periode_awal']) . " - " .
                                             $this->IndonesianDate($dataBeasiswa[$i]['periode_akhir']);
                           */
               $dataBeasiswa[$i]['url_detil'] =  $urlView . "&bid=" . $dataBeasiswa[$i]['id_enc'];
               if ($dataBeasiswa[$i]['is_aktif'] == "Y") {
                  $dataBeasiswa[$i]['status'] = "aktif" ;
               } else {
                  $dataBeasiswa[$i]['status'] = "tidak aktif" ;
               }
               /*if (intval($dataBeasiswa[$i]['jumlah_penerima']) == intval($dataBeasiswa[$i]['jumlah_pelamar'])) {
                                 $dataBeasiswa[$i]['status'] = "penuh" 
                           }*/            
               $dataBeasiswaToShow[] = $dataBeasiswa[$i];
            }
         }
         if (!empty($dataBeasiswaToShow)) {
            $this->addVar('data_beasiswa', 'BEASISWA_IS_EMPTY', 'NO') ;
            $this->ParseData($tmplItem, $dataBeasiswaToShow, 'BSW_', 1);
         } else {
            $this->ShowEmptyMessage();
         }
      }
		
		$this->DisplayTemplate();
	}
	
   function ShowEmptyMessage() {
      $this->addVar('data_beasiswa', 'BEASISWA_IS_EMPTY', 'YES') ;
      $this->SetAttribute('empty_box', 'visibility', 'visible');
      $this->addVar('empty_type', 'TYPE', 'INFO') ;
      $this->AddVar("empty_box", 'WARNING_MESSAGE', 
         $this->ComposeErrorMessage('Data beasiswa yang ditawarkan belum ada.', $this->mErrorMessage));   
   }
   
}
?>