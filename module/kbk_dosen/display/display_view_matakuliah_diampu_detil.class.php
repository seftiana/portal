<?php
class DisplayViewMatakuliahDiampuDetil extends DisplayBaseFull 
{ 
   var $mSiaServer;
   var $mObjDosenClientService;
   var $dsnNip;
   var $kelasId;
   var $prodiId;
 
  function DisplayViewMatakuliahDiampuDetil(&$configObject, &$security, $userId, $kelasId, $prodiId)
      {
         DisplayBaseFull::DisplayBaseFull($configObject, $security);    
    $this->mTemplate->setBasedir($this->mrConfig->GetValue('docroot') . 'module/kbk_dosen/templates/'); 
    $this->SetTemplateFile('view_matakuliah_diampu_detil.html');
    $this->dsnNip = $userId;
    $this->kelasId = $kelasId;
    $this->$prodiId = $prodiId;

		$this->mSiaServer = $this->mrUserSession->GetProperty("ServerServiceAddress");

      $this->mObjDosenClientService = new DosenClientService($this->mSiaServer,false,$userId,$this->$prodiId);
      $this->mObjDosenClientService->DoSiaSetting(); 
  } 
  
   function GetAllJadwalTatapMukaDosenResume()
   {
   	//$this->mObjDosenClientService->SetProperty("KelasId", $this->kelasId);
      $MkDiampuDetil = $this->mObjDosenClientService->GetAllJadwalTatapMukaDosenResume($this->kelasId);
      if (false === $MkDiampuDetil) {
         $this->mErrorMessage = $this->mObjDosenClientService->GetProperty("ErrorMessages");
         return false;
      }
      else {
         return $MkDiampuDetil;
      }
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
 
  function Display() { 
    DisplayBaseFull::Display('[ Logout ]');
	$this->AddVar('content', 'JUDUL', 'Detil Kelas');
	$this->AddVar('content','URL_BACK',$this->mrConfig->GetURL('kbk_dosen', 'matakuliah_diampu', 'view'));
    $data = $this->GetAllJadwalTatapMukaDosenResume();
    $this->SetAttribute('data_matakuliah_diampu', 'visibility', 'visible');
    if(empty($data)){ 
      $this->AddVar("data_matakuliah_diampu", "MATAKULIAH_DIAMPU_AVAILABLE", "NO"); 
    }else{ 
      $this->AddVar("data_matakuliah_diampu", "MATAKULIAH_DIAMPU_AVAILABLE", "YES");
      for($i=0;$i<count($data);$i++){
      	$data[$i]['TANGGAL'] = $this->tanggalIndo($data[$i]['TANGGAL']);
      }
      $this->ParseData("data_matakuliah_diampu_item", $data, "MK_JADWAL_",1);
    } 
    $this->mTemplate->displayParsedTemplate(); 
    }  
}
?>