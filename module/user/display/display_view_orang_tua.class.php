<?php

class DisplayViewOrangTua extends DisplayBaseFull 
{

   var $mUserService;
   var $mUserId;
   var $mUserRole;
   var $mErrorMessage;
   var $mViewBy;
   var $mSiaServer;
   
   function DisplayViewOrangTua(&$configObject, $securityObj, $userId, $userRole, $viewBy, $siaServer) 
   {
      DisplayBaseFull::DisplayBaseFull($configObject, $securityObj);      
      
      //set template untuk error dan empty box DisplayBase::SetErrorAndEmptyBox
      $this->SetErrorAndEmptyBox();
		if ($siaServer == "") {
			$this->mSiaServer = $this->mrUserSession->GetProperty("ServerServiceAddress");
		} else {
			$this->mSiaServer = $siaServer;
		}
      
      $this->mUserService = new UserClientService($this->mSiaServer, false, $userId);
      if($this->mUserService->IsError()) {
         $this->mErrorMessage .= $this->mUserService->GetProperty("ErrorMessages");
      }else{
         $this->mUserService->SetProperty("UserRole", $userRole );
      }
      
      $this->mSiregService = new UserSiregService($this->mrUserSession->GetProperty("SiregServiceAddress"));
      
      $this->mUserId = $userId;
      $this->mUserRole = $userRole;
      $this->mViewBy = $viewBy;
      
      $this->SetTemplateBasedir($configObject->GetValue('app_module') . 'user/templates/');
      $this->SetTemplateFile('view_orang_tua.html');
    
   }
   
   function Display() 
   {
      //DisplayBaseFull::Display("[ Logout ]");            
      
      if ($this->mUserRole != 1 && $this->mUserRole != 2){
         $this->mErrorMessage .= "User role tidak sesuai.";
         $this->ShowErrorBox("NONE");
      }else{
         $this->AddVar("content", "BIODATA_NIM", $this->mUserId);
         
         $biodata = $this->mSiregService->GetDataOrangTua($this->mUserId);
		 //echo "<pre>";print_r($this->mUserService); echo "</pre>";
		 $this->DoUpdateServiceStatus($this->mUserService, $biodata, 'SIA');
         if (false === $biodata){            
            $this->mErrorMessage .= $this->mUserService->GetProperty("ErrorMessages");
            if ($this->mUserService->GetProperty("FaultMessages")==""){
               $this->mErrorMessage .= "<br />".$this->mUserService->GetProperty("FaultMessages");
            }
            $this->ShowErrorBox();
         } else {
			if ($this->mUserRole ==1){
               //$biodata[0]["tanggal_terdaftar"] = $this->IndonesianDate($biodata[0]["tanggal_terdaftar"]);
            }

            if ($biodata[0]["ortu_ayah_meninggal"] == "0"){
               $biodata[0]["ortu_ayah_meninggal"] = "Masih Hidup" ;
               $biodata[0]["class_ayah_meninggal"] = "hidden" ;
            }else{
				$biodata[0]["ortu_ayah_meninggal"] = "Sudah Meninggal" ;
                $biodata[0]["class_ayah_meninggal"] = "" ;
			}

            if ($biodata[0]["ortu_ibu_meninggal"] == "0"){
               $biodata[0]["ortu_ibu_meninggal"] = "Masih Hidup" ;
               $biodata[0]["class_ibu_meninggal"] = "hidden" ;
            }else{
				$biodata[0]["ortu_ibu_meninggal"] = "Sudah Meninggal" ;
                $biodata[0]["class_ibu_meninggal"] = "" ;
			}

            if ($biodata[0]["ortu_wali_meninggal"] == "0"){
               $biodata[0]["ortu_wali_meninggal"] = "Masih Hidup" ;
               $biodata[0]["class_wali_meninggal"] = "hidden" ;
            }else{
				$biodata[0]["ortu_wali_meninggal"] = "Sudah Meninggal" ;
                $biodata[0]["class_wali_meninggal"] = "" ;
			}
            
            if ($biodata[0]["ortu_mampu"] == "0"){
               $biodata[0]["ortu_mampu"] = "Tidak Mampu" ;
            }else{
				$biodata[0]["ortu_mampu"] = "Mampu" ;
			}
            
            $this->ParseData("data_biodata", $biodata, "");
         }
      }
  
        $this->AddVar("content", "URL_EDIT", $this->mrConfig->GetURL('user','orang_tua','edit').
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
