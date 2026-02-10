<?php
/**
 * DisplayViewProfile2
 * Display class for view and search user
 *
 * @package
 * @author Maya Alipin
 * @copyright Copyright (c) 2006 GamaTechno
 * @version 1.0
 * @date 2006-02-22
 * @revision Maya Alipin 2006-09-08
 *
 */

class DisplayViewProfile2 extends DisplayBaseFull
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
   function DisplayViewProfile2(&$configObject, $securityObj, $userId, $userRole, $viewBy, $siaServer)
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


      $this->mUserId = $userId;
      $this->mUserRole = $userRole;
      $this->mViewBy = $viewBy;

      $this->SetTemplateBasedir($configObject->GetValue('app_module') . 'user/templates/');
      if ($this->mUserRole == 1) {
         $this->SetTemplateFile('view_profile_mhs2.html');
      } else {
         $this->SetTemplateFile('view_profile_dosen2.html');
      }
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
         if ($this->mUserRole == 1){
            $this->AddVar("content", "PROFILE_NIM", $this->mUserId);
			$this->AddVar("content", "URL_EDIT", $this->mrConfig->GetURL('user','mahasiswa','edit')."&sia=".$this->mrConfig->Enc($this->mSiaServer)); #add ccp 24-8-2021
         } else if ($this->mUserRole == 2) {
            $this->AddVar("data_profile", "PROFILE_NIP", $this->mUserId);
			$this->AddVar("content", "URL_EDIT", $this->mrConfig->GetURL('user','dosen','edit')."&sia=".$this->mrConfig->Enc($this->mSiaServer)); #add ccp 5-9-2020
         }
         $dataProfil = $this->mUserService->GetUserProfile();
			// echo "<pre>";print_r($dataProfil); echo "</pre>";die;
			$this->DoUpdateServiceStatus($this->mUserService, $dataProfil, 'SIA');
         if (false === $dataProfil){
            $this->mErrorMessage .= $this->mUserService->GetProperty("ErrorMessages");
            if ($this->mUserService->GetProperty("FaultMessages")==""){
               $this->mErrorMessage .= "<br />".$this->mUserService->GetProperty("FaultMessages");
            }
            $this->ShowErrorBox();
         } else {
				if ($this->mUserRole ==1){
               $dataProfil[0]["tanggal_terdaftar"] = $this->IndonesianDate($dataProfil[0]["tanggal_terdaftar"]);
            }
            $dataProfil[0]["tanggal_lahir"] = $this->IndonesianDate($dataProfil[0]["tanggal_lahir"]);
            if ($dataProfil[0]["jenis_kelamin"] == "L") {
               $dataProfil[0]["jenis_kelamin"] = "Laki-laki" ;
            } elseif ($dataProfil[0]["jenis_kelamin"] == "P") {
               $dataProfil[0]["jenis_kelamin"] = "Perempuan" ;
            }
            $this->AddVar("data_profile", "INFO_AVAILABLE", "YES");
            $this->ParseData("data_profile", $dataProfil, "PROFILE_");
         }
      }
     
		DisplayBaseFull::Display("[ Logout ]");
      $this->DisplayTemplate();
   }

   function ShowErrorBox($infoavailable = "NO") {
      $this->AddVar("error_box", "ERROR_MESSAGE",
            $this->ComposeErrorMessage("Pengambilan data profil tidak berhasil." , $this->mErrorMessage));
      $this->AddVar("data_profile", "INFO_AVAILABLE", $infoavailable);
      $this->SetAttribute('error_box', 'visibility', 'visible');
   }
}

?>