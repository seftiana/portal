<?php
class DisplayPrintKhsBlok01 extends DisplayBasePrint 
{ 
   var $mSiaServer;
   var $mObjHasilStudiClient;
   var $mhsNiu;
   var $prodiId;
   var $sempId;
   var $cfg;
 
  function DisplayPrintKhsBlok01(&$configObject, &$security, $mhsNiu,$prodiId,$sempId)
      {
         DisplayBasePrint::DisplayBasePrint ($configObject, $security);
         $this->mhsNiu = $mhsNiu;
         $this->prodiId = $prodiId;
         $this->sempId = $sempId;    
		   $this->mTemplate->setBasedir($this->mrConfig->GetValue('docroot') . 'module/kbk_hasil_studi/templates/'); 
		   $this->SetTemplateFile('print_khs_blok_01.html');
		   $this->mObjHasilStudiClient = new HasilStudiClientService($this->mrUserSession->GetProperty("ServerServiceAddress"),
               false, $this->mhsNiu, $this->prodiId);
      	$this->cfg = $configObject;
  } 
  
   function GetDataMahasiswa(){
      $dataMhs = $this->mObjHasilStudiClient->GetDataMahasiswa($this->sempId);
      if (false === $dataMhs) {
         $this->mErrorMessage = $this->mObjHasilStudiClient->GetProperty("ErrorMessages");
         return false;
      }
      else {
         return $dataMhs;
      }
   }
 
  function Display() { 
    $dataUser = $this->GetDataMahasiswa();
    $rootServer = dirname($this->mrUserSession->GetProperty('ServerServiceAddress'));
    $rootServer = str_replace("/index.service.php","",$rootServer);
    $rootServer = str_replace("portal_services","",$rootServer);
    $fileFoto = $rootServer.'images/'.$_SESSION['identitas']['pt_logo'];
   
    DisplayBasePrint::Display("Cetak Kartu Hasil Studi");
    if(false != $dataUser){
    	$refObj = new Reference($this->mrConfig);
      $fak = $refObj->GetFakultasByProdi($this->mrUserSession->GetProperty('UserProdiId'));
      $this->AddVar('fakultas','TIPE', $this->cfg->GetValue('university_type'));
      $this->AddVar('fakultas','FACULTY_NAME', 'FAKULTAS '. $fak[0]['Nama']);
    	$resHasilBlok = $this->mObjHasilStudiClient->GetHasilStudiBlok($this->sempId);
    	$resIpSem = $this->mObjHasilStudiClient->GetIpSemBlok($this->sempId);
    	$resKrsHasilStudi = $this->mObjHasilStudiClient->GetKrsHasilStudi($this->sempId);
    	$this->AddVar('content','UNIVERSITY_NAME',strtoupper($_SESSION['identitas']['pt_nama']));
    	$jabatan = 'ketua program studi';
    	$resPejabat = $this->mObjHasilStudiClient->GetPejabat($jabatan);
    	$this->addVar("tanda_tangan","NAMAPEJABAT",$resPejabat[0]['pjbNama']);
		$this->addVar("tanda_tangan","NIPPEJABAT",$resPejabat[0]['pjbNip']);
    	$tgglSkg = date("Y-m-d h:i:s");
		$tanggalCetak = $this->displayTanggal($tgglSkg,false);
		$this->addVar("info_mahasiswa","TGL_CETAK",$tanggalCetak);
		$tanggalLokasi = $this->displayTanggal();
      $arrTgglCetak = preg_split('/ /',$tanggalLokasi);
      $tgglTandaTangan = $this->mrConfig->GetValue('app_client_location'). ',   '. '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $arrTgglCetak[1] . ' ' . $arrTgglCetak[2];
      $this->addVar("tanda_tangan","TANGGALTANDATANGAN",$tgglTandaTangan);
	    if($resHasilBlok){
				$capaianKredit=  0;
				$bebanKredit = 0;
				foreach ($resHasilBlok as $value) {
					$value['SKS_BOBOT'] = $value['JML_SKS'] * $value['BOBOT_NILAI'];
					if($value['SKS_BOBOT'] == '0'){
						$value['SKS_BOBOT'] = '';
					}
					$capaianKredit += $value['SKS_BOBOT'];
				}
			}
			
	    	$n=1;
			$tmpArrRowSpan = array();
			for($i = 0;$i<count($resKrsHasilStudi);$i++){
				if($resKrsHasilStudi[$i]['BLOK_ID'] == $resKrsHasilStudi[$i+1]['BLOK_ID']){
					$n++;
				}elseif($resKrsHasilStudi[$i]['BLOK_ID'] == $resKrsHasilStudi[$i-1]['BLOK_ID']){
					$tmpArrRowSpan[$resKrsHasilStudi[$i]['BLOK_ID']] = $n;
					$n=1;
				}
			}
			$j = 0;
			$k = 0;
			$this->ClearTemplate("data_blok");
			for($i = 0;$i<count($resKrsHasilStudi);$i++){
				$this->ClearTemplate("show_data_blok");
				if((count($resKrsHasilStudi) > 1) && $j == 0 && $resKrsHasilStudi[$i]['BLOK_ID'] == $resKrsHasilStudi[$i+1]['BLOK_ID']){
					$j++;
					$this->addVar("show_data_blok","no",++$k);
					$this->SetAttribute('show_data_blok', 'visibility', 'visible');
				}elseif((count($resKrsHasilStudi) == 1) && $j == 0 | $resKrsHasilStudi[$i]['BLOK_ID'] == $resKrsHasilStudi[$i+1]['BLOK_ID']){
					$j++;
					$this->addVar("show_data_blok","no",++$k);
					$this->SetAttribute('show_data_blok', 'visibility', 'visible');
				}elseif($resKrsHasilStudi[$i]['BLOK_ID'] != $resKrsHasilStudi[$i+1]['BLOK_ID']){
					$j = 0;
					$this->SetAttribute('show_data_blok', 'visibility', 'hidden');
				}elseif($resKrsHasilStudi[$i]['BLOK_ID'] == $resKrsHasilStudi[$i+1]['BLOK_ID']){
					$j++;
					$this->SetAttribute('show_data_blok', 'visibility', 'hidden');
				}
				$this->addVar("show_data_blok","ROWSPAN",$tmpArrRowSpan[$resKrsHasilStudi[$i]['BLOK_ID']]);
				$this->addVar("show_data_blok","BLOK_KODE",$resKrsHasilStudi[$i]['BLOK_KODE']);
				$this->addVar("show_data_blok","BLOK_NAMA",$resKrsHasilStudi[$i]['BLOK_NAMA']);
				$this->addVars("data_blok",$resKrsHasilStudi[$i],"");
				$this->parseTemplate('data_blok','a');
			}
					
		$this->addVar("content","TOTAL_SKS",$resIpSem[0]['bhsSks']);
		$this->addVar("content","IP",$resIpSem[0]['bhsIp']);	
		$this->addVar("content","CAPAIAN_KREDIT",$capaianKredit);
		$this->ParseData("data",$resHasilBlok, "");	
		$this->ParseData("info_mahasiswa",$dataUser, "");
    	 $this->DisplayTemplate();
    }
  }

function displayTanggal($tgl="now", $showLocation="true", $location="default") {
        global $config_obj;
        global $page;

        if ($tgl == "now") {
            $tgl = date("Y-m-d");
        }
        $arrayBulan = array("01" => "Januari", "02" => "Februari", "03" => "Maret", "04" => "April", "05" => "Mei",
            "06" => "Juni", "07" => "Juli", "08" => "Agustus", "09" => "September", "10" => "Oktober",
            "11" => "November", "12" => "Desember");
        $arrayTgl = explode("-", $tgl);
        $setTanggal = $arrayTgl[2] + 0;

        $tanggal = $setTanggal . ' ' . $arrayBulan[$arrayTgl[1]] . ' ' . $arrayTgl[0];
        return $tanggal;
    }
}
?>