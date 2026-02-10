<?php
class DisplayViewHasilStudi extends DisplayBaseFull 
{ 
   var $mSiaServer;
   var $mObjHasilStudiService;
   var $mMhsNiu;
   var $mErrorMessage;
   var $khsSemId;
   var $prodiId;
 
  function DisplayViewHasilStudi(&$configObject, &$security, $userId,$khsSemId,$prodiId,$errMsg)
      {
         DisplayBaseFull::DisplayBaseFull($configObject, $security);
		$this->mErrorMessage = $errMsg;
		$this->mMhsNiu = $userId;
		$this->khsSemId = $khsSemId;
		$this->prodiId = $prodiId;
		$this->SetErrorAndEmptyBox();
		$this->mTemplate->setBasedir($this->mrConfig->GetValue('docroot') . 'module/kbk_hasil_studi/templates/'); 
	    $this->SetTemplateFile('view_hasil_studi.html');
		$this->mSiaServer = $this->mrUserSession->GetProperty("ServerServiceAddress");
      $this->mObjHasilStudiService = new HasilStudiClientService($this->mSiaServer,false,$userId,$this->prodiId);
      $this->mObjHasilStudiService->DoSiaSetting(); 
  } 
  
	function GetDataMahasiswa() {
      $objUserService = new UserClientService($this->mSiaServer, false, $this->mMhsNiu);
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
  
   function GetDataSemesterMahasiswa()
   {
      $semMahasiswaMkBlok = $this->mObjHasilStudiService->GetSemesterMahasiswaMatakuliahBlok();
      if (false === $semMahasiswaMkBlok) {
         $this->mErrorMessage .= $this->mObjHasilStudiService->GetProperty("ErrorMessages");
         return false;
      }
      else {
         return $semMahasiswaMkBlok;
      }
   }
   
   function GetHasilStudiBlokMahasiswaPerSemester($dataUser){
   	$semMahasiswaMkBlok = $this->mObjHasilStudiService->GetHasilStudiBlokMahasiswaPerSemester($this->khsSemId);
      if (false === $semMahasiswaMkBlok) {
         $this->mErrorMessage .= $this->mObjHasilStudiService->GetProperty("ErrorMessages");
         return false;
      }
      else {
         $ip = $this->mObjHasilStudiService->GetIpForSemester($this->khsSemId);
         //$totalSks = $this->mObjHasilStudiService->GetJumlahSksForSemester();
         $this->AddVar("data_khs", "KHS_AVAILABLE", "YES");
         $totalSks = 0;
         foreach($semMahasiswaMkBlok as $val){
         	$totalSks += $val['JML_SKS'];
         }   
         $this->ParseData("data_khs_item", $semMahasiswaMkBlok, "KHS_",1);
         $arrData[0]["nama"] = $dataUser[0]["fullname"];
         $arrData[0]["nim"] = $dataUser[0]["no_id"];
         $arrData[0]["prodi"] = $dataUser[0]["info"];
         $arrData[0]["sem"] = $this->mNamaSemester ;
         $arrData[0]["sks_diambil"] = $totalSks;
         $arrData[0]["matakuliah_diambil"] = sizeof($semMahasiswaMkBlok);
         $arrData[0]["ip_semester"] = $ip[0]['IP'];
         $this->ParseData("data_khs", $arrData, "MHS_");
         return true;
      }
   }
   
	function ShowErrorBox() {
      $this->mTemplate->AddVar("error_box", "ERROR_MESSAGE",  
      $this->ComposeErrorMessage("Pengambilan data hasil studi blok tidak berhasil. ", $this->mErrorMessage));   
      $this->mTemplate->SetAttribute('error_box', 'visibility', 'visible');
   }
 
  function Display() { 
    DisplayBaseFull::Display('[ Logout ]');

    $data = $this->GetDataSemesterMahasiswa();
    $dataUser = $this->GetDataMahasiswa();
    if(empty($data)){ 
      $this->mErrorMessage = "Daftar semester tidak ditemukan. <br />".$this->mErrorMessage. 
      $this->mObjHasilStudiService->GetProperty("FaultMessages");
      $this->ShowErrorBox();
      $this->SetAttribute('view_semester_list', 'visibility', 'hidden'); 
    }else{
    	for($i=0;$i<count($data);$i++){
      		if($data[$i]['ID'] == $this->khsSemId){
      			//echo $semMahasiswaMkBlok[$i]['ID'].'=='.$this->khsSemId;
      			$data[$i]["selected"] = "selected";
      			$this->mNamaSemester = $data[$i]["NAME"];
      		}else{
      			$data[$i]['selected'] = "";
      		}
      	}
      $this->ParseData("combo_semester_list",$data,"");
      $dataBlokHasilStudiBlok  = $this->GetHasilStudiBlokMahasiswaPerSemester($dataUser);
      if(!empty($dataBlokHasilStudiBlok)){
      	$this->AddVar("buttonCetak", "URL_CETAK", $this->mrConfig->GetURL('kbk_hasil_studi','khs_blok_01','print') .
                                 "&niu=" . $this->mrConfig->Enc($this->mMhsNiu) . "&prodi=" . $this->mrConfig->Enc($this->prodiId) . 
                                 "&sem=" . $this->mrConfig->Enc($this->khsSemId));
      }
    } 
    $this->DisplayTemplate(); 
  }  
}
?>