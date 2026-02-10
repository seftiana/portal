<?php
class DisplayViewNilai extends DisplayBaseFull 
{ 
   var $mSiaServer;
   var $mObjViewNilaiService;
   var $mhsNiu;
   var $prodiId;
   var $sempId;
 
  function DisplayViewNilai(&$configObject, &$security, $userId, $prodiId, $sempId)
      {
         DisplayBaseFull::DisplayBaseFull($configObject, $security);
    $this->mhsNiu = $userId;
    $this->prodiId = $prodiId;
    $this->SetErrorAndEmptyBox();
    $this->mTemplate->setBasedir($this->mrConfig->GetValue('docroot') . 'module/kbk_nilai/templates/'); 
    $this->SetTemplateFile('view_nilai.html');

		$this->mSiaServer = $this->mrUserSession->GetProperty("ServerServiceAddress");
      $this->mObjViewNilaiService = new NilaiClientService($this->mSiaServer,false,$this->mhsNiu,$this->prodiId);
      $this->mObjViewNilaiService->DoSiaSetting(); 
      if($sempId == ''){
	    	$this->sempId = $this->mObjViewNilaiService->GetProperty("SemesterProdiId");
	    }else{
	    	$this->sempId = $sempId;
	    }
  } 
  
	function GetDataMahasiswa() {
      $objUserService = new UserClientService($this->mSiaServer, false, $this->mhsNiu);
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
  
   function CreateSemesterList() {
      
      $semesterList = $this->mObjViewNilaiService->GetAllPassedSemesterMahasiswa();
      if ($semesterList!==false){
         if ($this->sempId != ""){
            $len = sizeof($semesterList);
            for ($i=0; $i<$len; $i++){
               if ($semesterList[$i]["id"] == $this->sempId){  
                  $semesterList[$i]["selected"] = "selected";
                  $this->mNamaSemester = $semesterList[$i]["name"];
               }else{
                  $semesterList[$i]["selected"] = "";
               }
            }
         }
      }
      return $semesterList;
   }
   
	function DisplayKhsForOneSemester($dataUser) {
      $dataKhs = $this->mObjViewNilaiService->GetAllKHSItemForSemester($this->sempId);
      if  (!empty($dataKhs)) {
         $this->AddVar("data_khs", "KHS_AVAILABLE", "YES");
         foreach($dataKhs as $key=>$value){
         	$dataKhs[$key]['BUTTON_DETIL'] = $this->mrConfig->GetURL('kbk_nilai','nilai_detil','view').'&kelasId='.$this->mrConfig->Enc($value['krsdtKlsId']).'&semp='.$this->mrConfig->Enc($this->sempId);
         }   
         $this->ParseData("data_khs_item", $dataKhs, "KHS_",1);
         $arrData[0]["nama"] = $dataUser[0]["fullname"];
         $arrData[0]["nim"] = $dataUser[0]["no_id"];
         $arrData[0]["prodi"] = $dataUser[0]["info"];
         $arrData[0]["sem"] = $this->mNamaSemester ;
         $this->ParseData("data_khs", $arrData, "MHS_");
         return true;
      } else {
         $this->mErrorMessage = $this->mObjViewNilaiService->GetProperty("FaultMessages");
         $this->AddVar("empty_box", "WARNING_MESSAGE",  
            $this->ComposeErrorMessage("Data tidak ditemukan.<br />" , $this->mErrorMessage));   
            $this->AddVar('empty_type', 'TYPE', "INFO");
         $this->AddVar("data_khs", "KHS_AVAILABLE", "NO");   
         $this->SetAttribute('empty_box', 'visibility', 'visible');
         return false;
      }
      
   }
 
  function Display() {
  	 $dataUser = $this->GetDataMahasiswa(); 
    DisplayBaseFull::Display('[ Logout ]');
    
    if(false != $dataUser){
    	$semesterList = $this->CreateSemesterList();
    	if ($semesterList !== false){
            $this->ParseData("semester_list", $semesterList, "SMT_");
            if ($this->sempId != ""){
               $this->DisplayKhsForOneSemester($dataUser);
            }
         }else{
            $this->mErrorMessage = "Daftar semester tidak ditemukan. <br />".$this->mErrorMessage. 
               $objAcademicReport->GetProperty("FaultMessages");
            $this->ShowErrorBox();
            $this->SetAttribute('view_semester_list', 'visibility', 'hidden');
            
         }
    }
    $this->DisplayTemplate();   
    }  
}
?>