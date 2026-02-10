<?php
class DisplayPrintTranskrip01 extends DisplayBasePrint 
{ 
   var $mSiaServer;
   var $mObjTranksripClient;
   var $mhsNiu;
   var $prodiId;
   var $sempId;
   var $cfg;
 
  function DisplayPrintTranskrip01(&$configObject, &$security, $mhsNiu,$prodiId)
      {
         DisplayBasePrint::DisplayBasePrint ($configObject, $security);
         $this->mhsNiu = $mhsNiu;
         $this->prodiId = $prodiId;    
		   $this->mTemplate->setBasedir($this->mrConfig->GetValue('docroot') . 'module/kbk_academic_report/templates/'); 
		   $this->SetTemplateFile('print_transkrip_01.html');
		   $this->mObjTranksripClient = new AcademicReportClientService($this->mrUserSession->GetProperty("ServerServiceAddress"),
               false, $this->mhsNiu, $this->prodiId);
      	$this->cfg = $configObject;
  } 
  
   function GetDataMahasiswaTranskip01(){
      $dataMhs = $this->mObjTranksripClient->GetDataMahasiswaTranskip();
      if (false === $dataMhs) {
         $this->mErrorMessage = $this->mObjTranksripClient->GetProperty("ErrorMessages");
         return false;
      }
      else {
         return $dataMhs;
      }
   }
 
  function Display() { 
    $dataUser = $this->GetDataMahasiswaTranskip01();
    $rootServer = dirname($this->mrUserSession->GetProperty('ServerServiceAddress'));
    $rootServer = str_replace("/index.service.php","",$rootServer);
    $rootServer = str_replace("portal_services","",$rootServer);
    $fileFoto = $rootServer.'images/'.$_SESSION['identitas']['pt_logo'];
   
    DisplayBasePrint::Display("Cetak Kartu Tranksrip");
    if(false != $dataUser){
    	$dataTranskrip = $this->mObjTranksripClient->GetDataTranskip();
    	$jabatanDekan = 'dekan';
    	$resPejabatDekan = $this->mObjTranksripClient->GetPejabatDekan($jabatanDekan);
    	$this->addVar("mengetahui","NAMADEKAN",$resPejabatDekan[0]['pjbNama']);
		$this->addVar("mengetahui","NIPDEKAN",$resPejabatDekan[0]['pjbNip']);
		$jabatanRektor = 'Transkrip';
		$resPejabatRektor = $this->mObjTranksripClient->GetPejabatRektor($jabatanRektor);
    	$this->addVar("mengetahui","NAMAREKTOR",$resPejabatRektor[0]['pjbNama']);
		$this->addVar("mengetahui","NIPREKTOR",$resPejabatRektor[0]['pjbNip']);
    	$arrTranskripSemGanjil = array();
		$arrTranskripSemGenap = array();
		if($dataTranskrip){
			foreach($dataTranskrip as $val){
				if($val['PAKET_SEM'] % 2 == 0){
					$arrTranskripSemGenap[] = $val;
				}else{
					$arrTranskripSemGanjil[] = $val;
				}
			}
		}
		
		$countArrTransSemGenap = count($arrTranskripSemGenap);
		$countArrTransSemGanjil = count($arrTranskripSemGanjil);
		
		if(($countArrTransSemGenap > $countArrTransSemGanjil) || ($countArrTransSemGenap > $countArrTransSemGanjil)){
			$maxTrans = $countArrTransSemGenap;
		}else{
			$maxTrans = $countArrTransSemGanjil;
		}
		
	    $arrLineBreak = array();
		for($i=0;$i<$maxTrans;$i++){
			$explMateriGanjil = explode('|',$arrTranskripSemGanjil[$i]['NAMAMK']);
			$explMateriGenap= explode('|',$arrTranskripSemGenap[$i]['NAMAMK']);
			$countMateriGanjil = count($explMateriGanjil);
			$countMateriGenap = count($explMateriGenap);
			if(($countMateriGanjil > $countMateriGenap) || ($countMateriGanjil > $countMateriGenap)){
				$arrLineBreak[] = $countMateriGanjil;
			}else {
				$arrLineBreak[] = $countMateriGenap;
			}
		}
		
		//ganjil
		//$resTranskripSemGanjil = $qw->sqlExecute($sql['get_transkrip_sem_ganjil'],array($mhsNiu),true);
		if($arrTranskripSemGanjil){
			$this->SetAttribute('show_table_ganjil', 'visibility', 'visible');
			foreach($arrTranskripSemGanjil as $key=>$val){
				$explMateriGanjil = explode('|',$val['NAMAMK']);
				$explSksGanjil = explode('|',$val['JUMLAH_SKS']);
				$explNilaiGanjil = explode('|',$val['NILAI']);
				
				$maxMateri = $arrLineBreak[$key];
				$outputMateri = '';
				$outputSks = '';
				$outputNilai = '';
				for($i=0;$i<$maxMateri;$i++){
					$break = '<br />';
					$outputMateri .= $explMateriGanjil[$i].$break;
					$outputSks .= $explSksGanjil[$i].$break;
					$outputNilai .= $explNilaiGanjil[$i].$break;
				}
				$val['NAMAMK'] = $outputMateri;
				$val['JUMLAH_SKS'] = $outputSks;
				$val['NILAI'] = $outputNilai;
				$this->addVars("transkrip_sem_ganjil",$val,"");
				$this->parseTemplate('transkrip_sem_ganjil','a');
			}
		}
		
		//$resTranskripSemGenap = $qw->sqlExecute($sql['get_transkrip_sem_genap'],array($mhsNiu),true);
		if($arrTranskripSemGenap){
			$this->SetAttribute('show_table_genap', 'visibility', 'visible');	
			foreach($arrTranskripSemGenap as $key=>$val){
				$explMateriGenap = explode('|',$val['NAMAMK']);
				$explSksGenap = explode('|',$val['JUMLAH_SKS']);
				$explNilaiGenap = explode('|',$val['NILAI']);
				
				$maxMateri = $arrLineBreak[$key];
				$outputMateri = '';
				$outputSks = '';
				$outputNilai = '';
				for($i=0;$i<$maxMateri;$i++){
					$break = '<br />';
					$outputMateri .= $explMateriGenap[$i].$break;
					$outputSks .= $explSksGenap[$i].$break;
					$outputNilai .= $explNilaiGenap[$i].$break;
				}
				$val['NAMAMK'] = $outputMateri;
				$val['JUMLAH_SKS'] = $outputSks;
				$val['NILAI'] = $outputNilai;
				$this->addVars("transkrip_sem_genap",$val,"");
				$this->parseTemplate('transkrip_sem_genap','a');
			}
		}
		$this->ParseData("data_mahasiswa_2",$dataUser,"");
		$this->ParseData("data_mahasiswa",$dataUser,"");
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