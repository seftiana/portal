<?php
class DisplayViewJadwal extends DisplayBaseFull 
{ 
   var $mSiaServer;
   var $mObjJadwalService;
   var $userId;
   var $prodiId;
 
  function DisplayViewJadwal(&$configObject, &$security, $userId,$prodiId)
      {
         DisplayBaseFull::DisplayBaseFull($configObject, $security);
         $this->userId = $userId;
    	$this->prodiId = $prodiId;
    	$this->SetErrorAndEmptyBox();    
    	$this->mTemplate->setBasedir($this->mrConfig->GetValue('docroot') . 'module/kbk_jadwal/templates/'); 
    	$this->SetTemplateFile('view_jadwal.html');
		$this->mSiaServer = $this->mrUserSession->GetProperty("ServerServiceAddress");
      $this->mObjJadwalService = new JadwalClientService($this->mSiaServer,false,$userId,$this->prodiId);
      $this->mObjJadwalService->DoSiaSetting(); 
  } 
  
   function GetDataViewJadwal()
   {
      $data = $this->mObjJadwalService->GetDataViewJadwal();
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

    $data = $this->GetDataViewJadwal();
    $dataUser = $this->GetDataMahasiswa();	
    if(!empty($data)){
    	$arrData[0]["nama"] = $dataUser[0]["fullname"];
      $arrData[0]["nim"] = $dataUser[0]["no_id"];
      $arrData[0]["prodi"] = $dataUser[0]["info"];
      $arrData[0]["sem"] = $this->mObjJadwalService->GetProperty("NamaSemester").' '.$this->mObjJadwalService->GetProperty("TahunSemester").' / '. ($this->mObjJadwalService->GetProperty("TahunSemester")+1);
      foreach($data as $key=>$val){
      	$urladditional = "&kelasId=".$this->mrConfig->Enc($val["klsId"]);
      	$data[$key]['url_jadwal_detil'] = $this->mrConfig->GetURL('kbk_jadwal','jadwal_detil','view') . $urladditional;
      	
	      $kode_blok = '';
		  	if ($val['mkblokKode'] == '' && $val['kodeTambahan'] == ''){
		  		$kode_blok = '';
		  	}elseif ($val['mkblokKode'] != '' && $val['kodeTambahan'] == ''){
		  		$kode_blok = "<abbr title=\"".$val[acronym_kode_blok]."\">".$val['mkblokKode']."</abbr>";
		  	}elseif ($val['mkblokKode'] == '' && $val['kodeTambahan'] != ''){
		  		$kode_blok = $val['kodeTambahan'];
		  	}elseif ($val['mkblokKode'] != '' && $val['kodeTambahan'] != ''){
		  		$kode_blok = $val['kodeTambahan'];
		  	}
		  	$data[$key]['kode_blok'] = $kode_blok;
      }
      $this->ParseData("data_jadwal",$arrData,"MHS_");
    	$this->addVar('data_jadwal','JADWAL_AVAILABLE','YES');
    	$this->ParseData("jadwal_item",$data,"",1);
    }else{
    	$this->mErrorMessage = $this->mObjJadwalService->GetProperty("FaultMessages");
      $this->AddVar("empty_box", "WARNING_MESSAGE",  
      $this->ComposeErrorMessage("Data tidak ditemukan. " , $this->mErrorMessage));   
      $this->AddVar("data_jadwal", "JADWAL_AVAILABLE", "NO");
    }
 
    $this->DisplayTemplate();  
   }  
}
?>