<?php
class DisplayViewMatakuliahDiampu extends DisplayBaseFull 
{ 
   var $mSiaServer;
   var $objUserService;
   var $mDosenNip;
 
  function DisplayViewMatakuliahDiampu(&$configObject, &$security, $userId)
      {
         DisplayBaseFull::DisplayBaseFull($configObject, $security);    
	    $this->SetTemplateBasedir($configObject->GetValue('app_module') . 'kbk_dosen/templates/');
      $this->SetTemplateFile('view_matakuliah_diampu.html');
	    $this->mDosenNip = $userId;
	    $this->objUserService = new UserClientService($this->mrUserSession->GetProperty("ServerServiceAddress"),false,$this->mDosenNip);
	    $this->dosenObjClientService = new DosenClientService($this->mrUserSession->GetProperty("ServerServiceAddress"),false,$this->mDosenNip,$this->mrUserSession->GetProperty("UserProdiId"));
  } 
  
	function GetDataDosen() {
		$data = $this->objUserService->GetUserInfo();
		echo $semesterAktif;
      if(false == $data){
      	$this->objUserService->GetProperty("ErrorMessages");
      	return false;
      }else{
      	return $data;
      }
   }
   
   function GetSemester(){
   	$this->dosenObjClientService->SetProperty("UserProdiId", $this->mrUserSession->GetProperty("UserProdiId"));
      $this->dosenObjClientService->SetProperty("UserRole", $this->mrUserSession->GetProperty("Role"));
      $this->dosenObjClientService->DoSiaSetting();
   	$nextThSemester = $this->dosenObjClientService->GetProperty("TahunSemester") + 1;
                        $nmSemester = $this->dosenObjClientService->GetProperty("NamaSemester") . ' ' .
                                      $this->dosenObjClientService->GetProperty("TahunSemester") . '/' .
                                      $nextThSemester;
   	return $nmSemester;
   }
 
  function Display() { 
    DisplayBaseFull::Display('[ Logout ]');
	$this->AddVar('content', 'JUDUL', 'Matakuliah Diampu');
    $data = $this->GetDataDosen();
	 $semester = $this->GetSemester();
    if(empty($data)){ 
      $this->SetAttribute('data_dosen', 'visibility', 'hidden'); 
    }else{
    	$data[0]['SEM'] = $semester; 
      $this->SetAttribute('data_dosen', 'visibility', 'visible'); 
      $this->ParseData("data_dosen", $data, "DOSEN_"); 
    }
    $dataMatakuliahDiampu = $this->dosenObjClientService->GetAllJadwalTatapMukaDosen();
    $this->SetAttribute('data_matakuliah_diampu', 'visibility', 'visible');
    if(false === $dataMatakuliahDiampu){
    	$this->AddVar("data_matakuliah_diampu", "MATAKULIAH_DIAMPU_AVAILABLE", "NO");
    }else{
    	$this->AddVar("data_matakuliah_diampu", "MATAKULIAH_DIAMPU_AVAILABLE", "YES");
    	for($i=0;$i<count($dataMatakuliahDiampu);$i++){
    		$dataMatakuliahDiampu[$i]['URLDETAIL'] = $this->mrConfig->GetURL('kbk_dosen', 'matakuliah_diampu_detil', 'view').'&kelas='.$dataMatakuliahDiampu[$i]['id'];
    		$dataMatakuliahDiampu[$i]['BUTTON_DETIL_NILAI'] = $this->mrConfig->GetURL('kbk_nilai','nilai_detil','view').'&kelasId='.$this->mrConfig->Enc($dataMatakuliahDiampu[$i]['id']); 
    	}
    	$this->ParseData("data_matakuliah_diampu_item", $dataMatakuliahDiampu, "MK_DIAMPU_",1);
    }
    $this->DisplayTemplate();
    }  
}
?>