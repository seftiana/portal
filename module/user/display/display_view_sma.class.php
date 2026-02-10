<?php

class DisplayViewSma extends DisplayBaseFull 
{

   var $mUserService;
   var $mUserId;
   var $mUserRole;
   var $mErrorMessage;
   var $mViewBy;
   var $mSiaServer;
   
   function DisplayViewSma(&$configObject, $securityObj, $userId, $userRole, $viewBy, $siaServer) 
   {
      DisplayBaseFull::DisplayBaseFull($configObject, $securityObj);      
      
      //set template untuk error dan empty box DisplayBase::SetErrorAndEmptyBox
      $this->SetErrorAndEmptyBox();
		if ($siaServer == "") {
			$this->mSiaServer = $this->mrUserSession->GetProperty("ServerServiceAddress");
		} else {
			$this->mSiaServer = $siaServer;
		}
      
      $this->mSiregService = new UserSiregService($this->mrUserSession->GetProperty("SiregServiceAddress"));
	  
      $this->mUserService = new UserClientService($this->mSiaServer, false, $userId);
      if($this->mUserService->IsError()) {
         $this->mErrorMessage .= $this->mUserService->GetProperty("ErrorMessages");
      }else{
         $this->mUserService->SetProperty("UserRole", $userRole );
      }
      
      
      $this->mUserId = $userId;
      $this->mUserRole = $userRole;
      $this->mViewBy = $viewBy;
      
      $this->SetTemplateBasedir($configObject->GetValue('app_module') . 'user/templates/');
      $this->SetTemplateFile('view_sma.html');
    
   }
   
   function Display() 
   {
      //DisplayBaseFull::Display("[ Logout ]");            
      
      if ($this->mUserRole != 1 && $this->mUserRole != 2){
         $this->mErrorMessage .= "User role tidak sesuai.";
         $this->ShowErrorBox("NONE");
      }else{
         if ($this->mUserRole == 1){
            $this->AddVar("content", "BIODATA_NIM", $this->mUserId);   
         } else if ($this->mUserRole == 2) {
            $this->AddVar("data_profile", "BIODATA_NIP", $this->mUserId);   
         }
         
         $biodata = $this->mSiregService->GetDataSma($this->mUserId);//print_r($biodata);die;
		 //echo "<pre>";print_r($this->mUserService); echo "</pre>";
		 $this->DoUpdateServiceStatus($this->mUserService, $biodata, 'SIA');
         if (false === $biodata){            
            $this->mErrorMessage .= $this->mUserService->GetProperty("ErrorMessages");
            if ($this->mUserService->GetProperty("FaultMessages")==""){
               $this->mErrorMessage .= "<br />".$this->mUserService->GetProperty("FaultMessages");
            }
            $this->ShowErrorBox();
         } else {
			if(isset($biodata[1])){
				$riwayat = &$biodata[1];
				for($i=0,$m=count($riwayat);$i<$m;++$i){
					$this->AddVar("data_riwayat", "RIWAYAT_NO", ($i+1));  
					$this->AddVar("data_riwayat", "RIWAYAT_JENJANG_NAMA", $riwayat[$i]['jenjang_nama']);   
					$this->AddVar("data_riwayat", "RIWAYAT_JENJANG_ID", $riwayat[$i]['jenjang_id']);
					$this->AddVar("data_riwayat", "RIWAYAT_NAMA_PENDIDIKAN", $riwayat[$i]['nama_pendidikan']);   
					$this->AddVar("data_riwayat", "RIWAYAT_TAHUN_LULUS", $riwayat[$i]['tahun_lulus']);
					$this->mTemplate->ParseTemplate('data_riwayat', 'a');
				}
				unset($biodata[1]);
			}
			$biodata[0]["tgl_ijazah_smta"] = $this->IndonesianDate($biodata[0]["tgl_ijazah_smta"]);
            $this->ParseData("data_biodata", $biodata, "");
         }
      }
  
        $this->AddVar("content", "URL_EDIT", $this->mrConfig->GetURL('user','sma','edit').
				"&sia=".$this->mrConfig->Enc($this->mSiaServer));
		DisplayBaseFull::Display("[ Logout ]");            
      $this->DisplayTemplate();
   }
   
   function ShowErrorBox($infoavailable = "NO") {
      $this->AddVar("error_box", "ERROR_MESSAGE",  
            $this->ComposeErrorMessage("Pengambilan data biodata tidak berhasil." , $this->mErrorMessage));   
      $this->AddVar("data_profile", "INFO_AVAILABLE", $infoavailable);   
      $this->SetAttribute('error_box', 'visibility', 'visible');
   }
}

?>
