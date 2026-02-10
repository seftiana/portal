<?php
class DisplayViewPesertaKelas extends DisplayBaseFull 
{ 
   var $mSiaServer;
   var $mObjViewNilaiDetilService;
   var $mhsNiu;
   var $prodiId;
   var $sempId;
   var $klsId;
   var $urlPesertaKelas;
 
  function DisplayViewPesertaKelas(&$configObject, &$security, $userId, $prodiId, $sempId, $klsId)
      {
      	$this->mhsNiu = $userId;
	    $this->prodiId = $prodiId;
	    $this->sempId = $sempId;
	    $this->klsId = $klsId;
	    $this->mhsNiu = $userId;
	    $this->mSiaServer = $security->mUserIdentity->GetProperty("ServerServiceAddress");
      	$this->mObjViewNilaiDetilService = new NilaiClientService($this->mSiaServer,false,$this->mhsNiu,$this->prodiId);
      	$this->mObjViewNilaiDetilService->DoSiaSetting();
      	DisplayBase::DisplayBase($configObject);
      	$this->SetTemplateBasedir($this->mrConfig->GetValue('docroot') . 'module/kbk_nilai/templates/');
      	$this->SetTemplateFile('view_peserta_kelas.html');
  }
  
  function GetPesertaKelas(){
   	$dataMahasiswa = $this->mObjViewNilaiDetilService->GetPesertaKelas($this->klsId);
   	$dataKrsNilai = $this->mObjViewNilaiDetilService->GetKrsNilai($this->klsId);
   	$dataRmdNilai = $this->mObjViewNilaiDetilService->GetRmdNilai($this->klsId);
		$dataKomponenNilaiRemidial = $this->GetKomponenNilaiRemedial();
  		$start_numbering = 1;
		if ($start_numbering !== false) {
      	$number = $start_numbering;
      }
   	foreach($dataMahasiswa as $key=>$value){
   		if($value['MHS_NIM'] == $this->mhsNiu){
   			$value['MHS_NAMA'] = '<b>'.$value['MHS_NAMA'].'</b>';
   		}
   		if($dataKrsNilai){
   			foreach($dataKrsNilai as $ind=>$nilai){
   				if($value['MHS_NIM'] == $nilai['mhsNiu']){
   					$explNilaiDpna = explode('|',$nilai['DPNANILAI']);
   					$explPersenDpna = explode('|',$nilai['DPNAPERSEN']);
   					$explDpnaIdNilai = explode('|',$nilai['DPNAID']);
   					
   					$explNilaiRemidi = explode('|',$dataRmdNilai[$ind]['RMDNILAI']);
   					$explDpnaIdRmd = explode('|',$dataRmdNilai['DPNAID']);
	   				foreach($explNilaiDpna as $keys=>$rows){
	   					$statusRmd = false;
	   					if($dataKomponenNilaiRemidial){
	   						foreach($dataKomponenNilaiRemidial as $rmd){
	   							if($explDpnaIdNilai[$keys] == $rmd['DPNARMD']){
	   								$statusRmd = true;
	   								break;
	   							}
	   						}
	   					}
	   					if($rows == '#'){
	   						$rows = '';
	   					}
	   					if($explNilaiRemidi[$keys] == '#'){
	   						$explNilaiRemidi[$keys] = '';
	   					}
	   					if($statusRmd){
	   						$this->SetAttribute('show_data_remidi','visibility','visible');
	   					}else{
	   						$this->SetAttribute('show_data_remidi','visibility','hidden');
	   					}
	   					$this->ClearTemplate('show_data_remidi');
	   					$this->AddVar('show_data_remidi','NILAIREMIDI',$explNilaiRemidi[$keys]);
	   					$nilaiAkhir = '';
	   					$nilaiAcuan = $rows > $explNilaiRemidi[$keys]?$rows:$explNilaiRemidi[$keys];
	   					if($nilaiAcuan != ''){
	   						$nilaiAkhir = number_format(($explPersenDpna[$keys] * $nilaiAcuan) / 100,2);
	   					}
		   				$this->AddVar("nilai_dpna",'KRSDTDPNANILAI',$rows);
							$this->parseTemplate('nilai_dpna','a');
							$this->AddVar('dpna_skor','SKOR_DPNA',$nilaiAkhir);
							$this->parseTemplate('dpna_skor','a');
		   			}
   				}
   			}
   		}
   		if (false !== $start_numbering) {
         	if ($number % 2 == 0 ) {
            	$this->addVar("data_peserta_kelas_item", "ODDEVEN", "EVEN");
            } else {
            	$this->addVar("data_peserta_kelas_item", "ODDEVEN", "ODD");
            }
            	$value["number"] = $number++;
         }
         if($value['NIL_KODE'] != '' && $value['NIL_BOBOT'] != ''){
         	$value['NILAI_RELATIF'] = $value['NIL_KODE'].' ('.$value['NIL_BOBOT'].')';	
         }else{
         	$value['NILAI_RELATIF'] = '';
         }
   		$this->AddVars("data_peserta_kelas_item",$value,'PESERTA_');
   		$this->ParseTemplate("data_peserta_kelas_item","a");
   		$this->clearTemplate("nilai_dpna");
   		$this->clearTemplate("dpna_skor");
   	}
  }
  
  function GetKomponenNilaiKelas(){
  		$dataKomponenNilaiKelas = $this->mObjViewNilaiDetilService->GetKomponenNilaiKelas($this->klsId,$this->prodiId);
  		return $dataKomponenNilaiKelas;
  }
  
  function GetKomponenNilaiRemedial(){
  		$dataKomponenNilaiRemidial = $this->mObjViewNilaiDetilService->GetKomponenNilaiRemidial($this->klsId);
  		return $dataKomponenNilaiRemidial;
  }
 
  function Display() {
  	 	$dataKomponenNilai = $this->GetKomponenNilaiKelas();
  	 	$dataKomponenNilaiRemidial = $this->GetKomponenNilaiRemedial();
  	 	if($dataKomponenNilaiRemidial){
  	 		$countRmd = count($dataKomponenNilaiRemidial);
  	 	}else{
  	 		$countRmd = 0;
  	 	}
  	 	
  	 	$this->AddVar("data_peserta_kelas", "PESERTA_AVAILABLE", "YES");
  	 	$this->AddVar("data_peserta_kelas", "COLSPAN_NILAI_ASAL", count($dataKomponenNilai)+$countRmd);
  	 	$this->AddVar("data_peserta_kelas", "COLSPAN_NILAI_AKHIR", count($dataKomponenNilai));
  	 	$this->GetPesertaKelas();
  	 	if($dataKomponenNilai){
	  	 	for($i=0;$i<sizeof($dataKomponenNilai);$i++){
	  	 		$statusRmd = false;
	  	 		if($dataKomponenNilaiRemidial){
	  	 			foreach($dataKomponenNilaiRemidial as $kmpRmd){
	  	 				if($dataKomponenNilai[$i]['klsdpnaDpnajnsId'] == $kmpRmd['DPNARMD']){
	  	 					$statusRmd = true;
			  	 			break;
			  	 		}
	  	 			}
	  	 		}
	  	 		
	  	 		if($statusRmd){
	  	 			$this->SetAttribute('show_remidi', 'visibility', 'visible');
	  	 		}else{
	  	 			$this->SetAttribute('show_remidi', 'visibility', 'hidden');
	  	 		}
	    		//$page->tmpl->addVar("dpna_jenis_asal","ROWSPAN2",$rowspan2);
				$this->AddVar("dpna_jenis_asal","JENIS_NAMA",$dataKomponenNilai[$i]['dpnajnsNama']);
				$this->parseTemplate('dpna_jenis_asal','a');
				//$page->tmpl->addVar("dpna_jenis_akhir","ROWSPAN2",$rowspan2);
				$this->AddVar("dpna_jenis_akhir","JENIS_NAMA",$dataKomponenNilai[$i]['dpnajnsNama']);
				$this->parseTemplate('dpna_jenis_akhir','a');
			}
  	 	}
  	 	//$this->ParseData("data_peserta_kelas_item", $dataPesertaKelas, "PESERTA_",1);
    $this->DisplayTemplate();   
    } 
}
?>