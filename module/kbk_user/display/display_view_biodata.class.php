<?php

class DisplayViewBiodata extends DisplayBaseFull 
{

   var $mUserService;
   var $mUserId;
   var $mUserRole;
   var $mErrorMessage;
   var $mViewBy;
	var $mSiaServer;
   
   /**
    * DisplayViewUser::DisplayViewUser
    * Constructor for DisplayViewUser class
    *
    * @param $configObject object Configuration
    * @param $securityObj  object Security
    * @param $userId       integer user id
    * @param $userRole     integer user role
    * @return void
    */
   function DisplayViewBiodata(&$configObject, $securityObj, $userId, $userRole, $viewBy, $siaServer) 
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
      $this->SetTemplateFile('view_biodata.html');
    
   }
   
   /**
    * DisplayViewUser::Display
    * Parsing data to template
    *
    * @param 
    * @return void
    */
   function Display() 
   {
      //DisplayBaseFull::Display("[ Logout ]");            
      
      if ($this->mUserRole != 1 && $this->mUserRole != 2){
         $this->mErrorMessage .= "User role tidak sesuai.";
         $this->ShowErrorBox("NONE");
      }else{
         $this->AddVar("content", "BIODATA_NIM", $this->mUserId);
         
         $biodata = $this->mSiregService->GetBiodataMahasiswa($this->mUserId);
		 //echo "<pre>";print_r($this->mUserService); echo "</pre>";
		 $this->DoUpdateServiceStatus($this->mUserService, $biodata, 'SIA');
         if (empty($biodata)){            
            $this->mErrorMessage .= $this->mUserService->GetProperty("ErrorMessages");
            if ($this->mUserService->GetProperty("FaultMessages")==""){
               $this->mErrorMessage .= "<br />".$this->mUserService->GetProperty("FaultMessages");
            }
            $this->ShowErrorBox();
         } else {
			if(isset($biodata[1])){
				$pengalaman = &$biodata[1];
				for($i=0,$m=count($pengalaman);$i<$m;++$i){
					$this->AddVar("data_pengalaman", "NO", ($i+1));  
					$this->AddVar("data_pengalaman", "TEMPAT", $pengalaman[$i]['tempat']);   
					$this->AddVar("data_pengalaman", "ORGANISASI", $pengalaman[$i]['organisasi']);
					$this->mTemplate->ParseTemplate('data_pengalaman', 'a');
				}
				unset($biodata[1]);
			}
			$biodata[0]["mhs_tanggal_daftar"] = $this->IndonesianDate($biodata[0]["mhs_tanggal_daftar"]);
            $biodata[0]["mhs_tanggal_lahir"] = $this->IndonesianDate($biodata[0]["mhs_tanggal_lahir"]);
			if($biodata[0]["mhs_status_kerja"]{0} != 'B')$biodata[0]["class_is_kerja"] = 'hidden';
            $this->AddVar("data_biodata", "INFO_AVAILABLE", "YES");   
            $this->ParseData("data_biodata", $biodata, "");
         }
      }
  
        $this->AddVar("content", "URL_EDIT", $this->mrConfig->GetURL('user','biodata','edit').
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
