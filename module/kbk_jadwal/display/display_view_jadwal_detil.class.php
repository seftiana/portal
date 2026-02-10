<?php
class DisplayViewJadwalDetil extends DisplayBaseFull 
{ 
   var $mSiaServer;
   var $mObjJadwalService;
   var $userId;
   var $prodiId;
   var $kelasId;
 
  function DisplayViewJadwalDetil(&$configObject, &$security, $userId,$prodiId, $kelasId)
      {
         DisplayBaseFull::DisplayBaseFull($configObject, $security);
         $this->userId = $userId;
    	$this->prodiId = $prodiId;
    	$this->kelasId = $kelasId;
    	$this->SetErrorAndEmptyBox();    
    	$this->mTemplate->setBasedir($this->mrConfig->GetValue('docroot') . 'module/kbk_jadwal/templates/'); 
    	$this->SetTemplateFile('view_jadwal_detil.html');
		$this->mSiaServer = $this->mrUserSession->GetProperty("ServerServiceAddress");
      $this->mObjJadwalService = new JadwalClientService($this->mSiaServer,false,$userId,$this->prodiId);
      $this->mObjJadwalService->DoSiaSetting(); 
  } 
  
   function GetDataViewJadwalDetil()
   {
      $data = $this->mObjJadwalService->GetDataViewJadwalDetil($this->kelasId);
      if (false === $data) {
         $this->mErrorMessage = $this->mObjJadwalService->GetProperty("ErrorMessages");
         return false;
      }
      else {
         return $data;
      }
   }
   
	function GetDataMahasiswa() {
      $objUserService = new UserClientService($this->mSiaServer, false, $this->userId);
      if ($objUserService->IsError()) {
         $this->mErrorMessage .= $this->mUserService->GetProperty("ErrorMessages");
      }else{
         //$objUserService->SetProperty("UserRole", 1 );
         $objUserService->SetProperty("UserRole", 8 );
         $dataUser = $objUserService->GetUserInfo();
			$this->DoUpdateServiceStatus($objUserService, $dataUser, 'SIA');
         if (false === $dataUser){    
            $this->mErrorMessage .= $objUserService->GetProperty("ErrorMessages");
            return false;
         } else {
            return $dataUser;
         }   
      }
   }
   
	function ShowErrorBox() {
      $this->mTemplate->AddVar("error_box", "ERROR_MESSAGE",  
      $this->ComposeErrorMessage("Pengambilan data jadwal tidak berhasil. ", $this->mErrorMessage));   
      $this->mTemplate->SetAttribute('error_box', 'visibility', 'visible');
   }
 
  function Display() { 
    DisplayBaseFull::Display('[ Logout ]');
	$this->AddVar('content','URL_BACK',$this->mrConfig->GetURL('kbk_jadwal', 'jadwal', 'view'));
    $data = $this->GetDataViewJadwalDetil();
    $dataUser = $this->GetDataMahasiswa();	
    if(!empty($data)){
    	$arrData[0]["nama"] = $dataUser[0]["fullname"];
      $arrData[0]["nim"] = $dataUser[0]["no_id"];
      $arrData[0]["prodi"] = $dataUser[0]["info"];
      $arrData[0]["sem"] = $this->mObjJadwalService->GetProperty("NamaSemester").' '.$this->mObjJadwalService->GetProperty("TahunSemester").' / '. ($this->mObjJadwalService->GetProperty("TahunSemester")+1);
      $this->ParseData("data_jadwal",$arrData,"MHS_");
    	$this->addVar('data_jadwal','JADWAL_AVAILABLE','YES');
    	foreach($data as $key=>$val){
    		if($val['ttpmukaId']){
		    	$arr_tatap_muka_id = explode('-',$val['ttpmukaId']);
				$dosen = array();
				foreach($arr_tatap_muka_id as $value=>$p){
					$resDosen = $this->mObjJadwalService->GetDosenPengajar($p);
					if($resDosen){
						foreach ($resDosen as $in){
							array_push($dosen,$in['pegNama']);
						}
					}
				}
				$dosen = array_unique($dosen);
				asort($dosen);
				$implDosen = implode(', ',$dosen);
    		}
    		$data[$key]['dosen'] = $implDosen;
    		$tgglIndo = $this->tanggalIndo($val['ttpmukaRencTanggal']);
    		$explTggl = explode(',',$tgglIndo);
    		$data[$key]['hari'] = $explTggl[0];
    		$data[$key]['tanggal'] = $explTggl[1]; 
    	}
    	$this->ParseData("jadwal_item",$data,"",1);
    }else{
    	$this->mErrorMessage = $this->mObjJadwalService->GetProperty("FaultMessages");
      $this->AddVar("empty_box", "WARNING_MESSAGE",  
      $this->ComposeErrorMessage("Data tidak ditemukan. " , $this->mErrorMessage));   
      $this->AddVar("data_jadwal", "JADWAL_AVAILABLE", "NO");
    }
 
    $this->DisplayTemplate();  
   }

	function tanggalIndo($_waktu){	//format input : date("Y-m-d h:i:s")
		$_tahun = substr($_waktu,0,4);
		$_bulan = substr($_waktu,5,2);
		$_tanggal = substr($_waktu,8,2);
		$_jam= substr($_waktu,11,2);
		$_mnt= substr($_waktu,14,2);
		$_dtk= substr($_waktu,17,2);
		$_hari_en =date("D", mktime(0,0,0,$_bulan, $_tanggal, $_tahun));
		$hari_en = array("Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat");
		$hari_id=array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat", "Sabtu");
		$bulan_en = array("01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12");
		$bulan_id = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
		$_hari_id = str_replace($hari_en, $hari_id, $_hari_en);
		$_bulan_id = str_replace($bulan_en, $bulan_id, $_bulan);
		$_tgl = $_hari_id.", ".$_tanggal." ".$_bulan_id." ".$_tahun;
		return $_tgl;
	}
}
?>