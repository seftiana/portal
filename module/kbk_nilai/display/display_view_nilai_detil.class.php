<?php
class DisplayViewNilaiDetil extends DisplayBaseFull 
{ 
   var $mSiaServer;
   var $mObjViewNilaiDetilService;
   var $mhsNiu;
   var $prodiId;
   var $sempId;
   var $klsId;
   var $urlPesertaKelas;
 
  function DisplayViewNilaiDetil(&$configObject, &$security, $userId, $prodiId, $sempId, $klsId)
      {
         DisplayBaseFull::DisplayBaseFull($configObject, $security);
    $this->mhsNiu = $userId;
    $this->prodiId = $prodiId;
    $this->sempId = $sempId;
    $this->klsId = $klsId;
    $this->urlPesertaKelas = $configObject->GetURL('kbk_nilai', 'peserta_kelas', 'view').'&kelasId='.$this->mrConfig->Enc($this->klsId).'&semp='.$this->mrConfig->Enc($this->sempId);
    $this->SetErrorAndEmptyBox();
    $this->mTemplate->setBasedir($this->mrConfig->GetValue('docroot') . 'module/kbk_nilai/templates/'); 
    $this->SetTemplateFile('view_nilai_detil.html');
		$this->mSiaServer = $this->mrUserSession->GetProperty("ServerServiceAddress");
      $this->mObjViewNilaiDetilService = new NilaiClientService($this->mSiaServer,false,$this->mhsNiu,$this->prodiId);
      $this->mObjViewNilaiDetilService->DoSiaSetting();
      if($sempId == ''){
      	$this->sempId = $this->mObjViewNilaiDetilService->GetProperty("SemesterProdiId");
      }else{
      	$this->sempId = $sempId;
      }
       
  }
  
  function GetPesertaKelas(){
   	$dataMahasiswa = $this->mObjViewNilaiDetilService->GetPesertaKelas($this->klsId);
   	return $dataMahasiswa;
  }
  
  function GetKelasData(){
  		$dataMatakuliah = $this->mObjViewNilaiDetilService->GetDataMatakuliah($this->klsId);
  		$semesterList = $this->mObjViewNilaiDetilService->GetAllPassedSemesterMahasiswa();
  		if ($semesterList!==false){
         if ($this->sempId != ""){
            $len = sizeof($semesterList);
            for ($i=0; $i<$len; $i++){
               if ($semesterList[$i]["id"] == $this->sempId){  
                  $semesterList[$i]["selected"] = "selected";
                  $this->mNamaSemester = $semesterList[$i]["name"];
               }
            }
         }
      }else{
      	$this->mNamaSemester = $this->mObjViewNilaiDetilService->GetProperty("NamaSemester").' '.$this->mObjViewNilaiDetilService->GetProperty("TahunSemester").'/'.($this->mObjViewNilaiDetilService->GetProperty("TahunSemester")+1);
      }
      foreach($dataMatakuliah as $key=>$value){
      	$dataMatakuliah[$key]['SEM'] =  $this->mNamaSemester;
      }
  		$this->ParseData("info_mk", $dataMatakuliah, "",false);
  }
  
	function GetKomponenNilaiKelas(){
  		$dataKomponenNilaiKelas = $this->mObjViewNilaiDetilService->GetKomponenNilaiKelas($this->klsId,$this->prodiId);
  		if($dataKomponenNilaiKelas){
  			$this->AddVar('data_bobot','BOBOT_AVAILABLE','YES');
  			$this->ParseData("bobot_nilai_item", $dataKomponenNilaiKelas, "BOBOT_",1);	
  		}else{
  			$this->mErrorMessage = $this->mObjViewNilaiDetilService->GetProperty("FaultMessages");
	      $this->AddVar("empty_box", "WARNING_MESSAGE",  
	      $this->ComposeErrorMessage("Data bobot tidak ditemukan. " , $this->mErrorMessage));
  			$this->AddVar('data_bobot','BOBOT_AVAILABLE','NO');
  		}
  }
 
  function Display() {
  	 DisplayBaseFull::Display('[ Logout ]');
  	 $this->AddVar('content','URL_BACK',$this->mrConfig->GetURL('kbk_nilai', 'nilai', 'view'));
  	 $dataPesertaKelas = $this->GetPesertaKelas();
  	 $dataKelas = $this->GetKelasData();
  	 $this->GetKomponenNilaiKelas();
  	 if(!false == $dataPesertaKelas){
  	 	$this->AddVar("content", "VIEW_PESERTA", $this->urlPesertaKelas);
  	 	$this->AddVar("data_peserta_kelas", "PESERTA_AVAILABLE", "YES");
  	 	$this->ParseData("data_peserta_kelas_item", $dataPesertaKelas, "PESERTA_",1);
  	 }
    $this->DisplayTemplate();   
    }  
}
?>