<?php
/**
 * DisplayViewSchoolarshipDetail
 * DisplayViewSchoolarshipDetail class
 * 
 * @package schoolarship
 * @author Maya Alipin 
 * @copyright Copyright (c) 2006 GamaTechno
 * @version 1.0 
 * @date 2006-10-06
 * @revision 
 *
 */

class DisplayViewSchoolarshipDetail extends DisplayBaseFull {
   var $mBeasiswaId;
	var $mShowDaftar;

	function DisplayViewSchoolarshipDetail(&$configObject, &$security, $beaId, $showDaftar) {
		DisplayBaseFull::DisplayBaseFull($configObject, $security);
      $this->mBeasiswaId = $beaId;    
		$this->mShowDaftar = $showDaftar;
		$this->SetErrorAndEmptyBox();  
      $this->SetTemplateBasedir($configObject->GetValue('app_module') . 'schoolarship/templates/');
      $this->SetTemplateFile('view_schoolarship_detail.html');
	}

	function GetBeasiswaData($server) {
		$beasiswaServ = new SchoolarshipClientService($server, false);
		$data = $beasiswaServ->GetDetailBeasiswaMahasiswa($this->mBeasiswaId);
		$this->DoUpdateServiceStatus($beasiswaServ, $data, 'Beasiswa');
		return $data;
   }
   
	function GetServiceServer() {
		$ref = new Reference($this->mrConfig) ;
		$server = $ref->GetAllUnitData($this->mrConfig->GetValue('si_beasiswa'));
		return $server[0]['service_address'];
	}
	
   function GetBeasiswaNominal($server) {
      $beasiswaServ = new SchoolarshipClientService($server, false);
		$data = $beasiswaServ->GetNominalBeasiswaMahasiswa($this->mBeasiswaId);
		return $data;
   }
  
	function Display() {
		$serv = $this->GetServiceServer();
      $data = $this->GetBeasiswaData($serv) ;
		DisplayBaseFull::Display("[ Logout ]");
      if (empty($data)) {
         $this->addVar('data_beasiswa', 'INFO_AVAILABLE', 'NO') ;
         $this->SetAttribute('empty_box', 'visibility', 'visible');
         $this->AddVar("empty_box", 'WARNING_MESSAGE', 'Data beasiswa yang di tawarkan belum ada.');   
      } else {
			$this->addVar('data_beasiswa', 'INFO_AVAILABLE', 'YES') ;
			$data[0]['end_date'] = $this->IndonesianDate($data[0]['end_date']);
			$data[0]['periode'] = $this->IndonesianDate($data[0]['periode_awal']) . " - " .
										$this->IndonesianDate($data[0]['periode_akhir']);
			$data[0]['jumlah_pelamar'] = $data[0]['jumlah_penerima'] - $data[0]['sisa'] ;
			if ($data[0]['is_aktif'] == "Y") {
				$data[0]['status'] = "aktif" ;
			} else {
				$data[0]['status'] = "tidak aktif" ;
			}
			
			
			$nominal = $this->GetBeasiswaNominal($serv);
			if (!empty($nominal)) {
				$this->SetAttribute('jumlah_nominal', 'visibility', 'visible');
				$jml = sizeof($nominal);
				for ($i=0; $i<$jml; $i++) {
					$nominal[$i]['periode_awal'] = $this->IndonesianDate($nominal[$i]['periode_awal']);
					$nominal[$i]['periode_akhir'] = $this->IndonesianDate($nominal[$i]['periode_akhir']);
				}
				$this->ParseData('jumlah_nominal_item', $nominal, 'NOM_', 1);
			}
			
			$this->ParseData('data_beasiswa', $data, 'BSW_');
      } 
		if ($this->mShowDaftar == "1") {
			$this->SetAttribute('buttonPendaftaran', 'visibility', 'visible');
		}
      $this->AddVar('content', 'BEA_ID', $this->mrConfig->Enc($this->mBeasiswaId));
		$this->AddVar('content', 'URL_PROCESS', $this->mrConfig->GetURL('schoolarship', 'schoolarship', 'process'));
		$this->DisplayTemplate();
	}
	
}
?>