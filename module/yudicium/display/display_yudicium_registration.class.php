<?php
/**
 * DisplayYudiciumRegistration
 * Display class for view Yudicium Registration
 * 
 * @package 
 * @author Gitra Perdana
 * @copyright Copyright (c) 2006 GamaTechno
 * @version 1.0 
 * @date 2006-08-31
 * @revision 
 *
 */

   class DisplayYudiciumRegistration extends DisplayBaseFull{

     var $mYudiciumServiceObj;
     var $mUserId;
     var $mProdiId;
     var $mErrorMessage;
     var $mServiceServer;
     var $mNama;
      /**
      * DisplayYudiciumRegistration::DisplayYudiciumRegistration
      * Constructor for DisplayYudiciumRegistration class
      *
      * @param $configObject object Configuration
      * @param $securityObj  object Security
      * @return void
      */
      function DisplayYudiciumRegistration (&$configObject, &$security){
         DisplayBaseFull::DisplayBaseFull($configObject, $security);
         $this->mServiceServer = $this->mrUserSession->GetProperty("ServerServiceAddress");
         $this->mUserId = $security->mUserIdentity->GetProperty("UserReferenceId");
         $this->mProdiId = $security->mUserIdentity->GetProperty("UserProdiId");
         $this->mYudiciumServiceObj =  New YudiciumClientService($this->mServiceServer,false, $this->mUserId,$this->mProdiId);
         $this->mErrorMessage = "";
         $this->SetErrorAndEmptyBox();
         $this->SetTemplateBasedir($this->mrConfig->GetValue('app_module') . 'yudicium/templates/');
         $this->SetTemplateFile('view_yudicium_registration.html');
      }

//       function DoInitializeService(){
//          $this->mYudiciumServiceObj =  New YudiciumClientService($this->mServiceServer,false, $this->mUserId, $this->mProdiId);
//          if ($this->mYudiciumServiceObj->IsError()) {
//             $this->mErrorMessage .= $this->mUserService->GetProperty("ErrorMessages");
//             return false;
//          }else{
//             $this->mYudiciumServiceObj->SetProperty("UserRole", 1);
//             $arrService = $this->mrUserSession->GetProperty("ServerServiceAvailable");
//             $result = $this->mYudiciumServiceObj->DoSiaSetting();
//             $this->DoUpdateServiceStatus($this->mYudiciumServiceObj, $result, 'SIA');
//             if (false === $result) {
//                $arrService = $this->mrUserSession->GetProperty("ServerServiceAvailable");
//                if ($this->mYudiciumServiceObj->IsError() && $this->mYudiciumServiceObj->GetProperty("FaultMessages")==""){
//                   $arrService["SIA"] = false;
//                } else {
//                   $arrService["SIA"] = true;
//                }
//                $this->mErrorMessage .= $this->mYudiciumServiceObj->GetProperty("ErrorMessages");
//                $this->mrUserSession->SetProperty("ServerServiceAvailable", $arrService);
//                $this->mrSecurity->RefreshSessionInfo();
//                return false;
//             } else {
//                return true;
//             }
//          }
//       }

      function GetMahasiswaInfo(){
         $objUserService = new UserClientService($this->mServiceServer, false, $this->mUserId);
         if ($objUserService->IsError()) {
            $this->mErrorMessage .= $this->mUserService->GetProperty("ErrorMessages");
         }else{
            $objUserService->SetProperty("UserRole", 1 );
            $dataUser = $objUserService->GetUserInfo(1);
				$this->DoUpdateServiceStatus($this->mYudiciumServiceObj, $result, 'SIA');
            if (false === $dataUser){
               $this->mErrorMessage .= $objUserService->GetProperty("ErrorMessages");
               return false;
            } else {
               return $dataUser;
            }   
         }
      }


      function CheckIsRegistered(){
         $isYudiciumRegistered = $this->mYudiciumServiceObj->IsMahasiswaRegistered();
         if (false === $isYudiciumRegistered) {
            return false;
         }
         else {
            return true;
         }
      }

      function GetInfoIpk(){
         $objAcademicReport = new AcademicReportClientService($this->mServiceServer,false, $this->mUserId, $this->mProdiId);
         $data = $objAcademicReport->GetIpkInfoLengkap();
         if (false === $data) {
            return false;
         }
         else {
            return $data;
         }
      }

      function GetYudiciumRequisite(){
         $syaratYudicium = $this->mYudiciumServiceObj->GetYudiciumRequisite();
         if (false === $syaratYudicium) {
            return false;
         }
         else {
            return $syaratYudicium;
         }
      }

      function Display(){
         $init = $this->GetMahasiswaInfo();
         DisplayBaseFull::Display('[ Logout ]');
         if (false === $init){
            $err="Pengambilan data mahasiswa pendaftaran yudisium tidak berhasil";
            $this->ShowErrorBox($err);
            $this->SetAttribute('profil','visibility','hidden');
            $this->SetAttribute('syarat','visibility','hidden');
         }
         else {
            $result = $this->mYudiciumServiceObj->DoYudiciumRegistration();
            $dataYudicium = $this->GetInfoIpk();
            $syaratYudicium = $this->GetYudiciumRequisite();
            $cekRegister = $this->CheckIsRegistered();
            $cekStatus = $init[0]['status_mhs'];
            $this->SetAttribute('syarat_judul','visibility','visible');
            $this->AddVar("profil", "YUDICIUM_IPK", $dataYudicium[0]["ipk"]);
            $this->AddVar("profil", "YUDICIUM_SKS", $dataYudicium[0]["sks_total"]);
            $this->AddVar("profil", "YUDICIUM_NIM", $this->mUserId);
            $this->AddVar("profil", "YUDICIUM_NAMA", $this->mrUserSession->GetProperty("UserFullName"));
            $this->AddVar("profil", "YUDICIUM_PS", $this->mrUserSession->GetProperty("UserProdiName"));
            $this->AddVar("content", "URL_DAFTAR", $this->mrConfig->GetURL("yudicium","yudicium","process"));
            if (true === $cekRegister){
               if ($cekStatus == 'A') {
                  $err="Anda sudah mendaftar yudisium";
                  $this->ShowErrorBox($err, "INFO");
                  $this->SetAttribute('btn_daftar','visibility','visible');
               }
               else {
                  $err = 'Status Anda Tidak Aktif';
                  $this->ShowErrorBox($err, "WARNING");
               }
            }
            if (false !== $syaratYudicium){
               $this->AddVar("syarat", "SYARAT_AVAILABLE", "YES");
               if (!empty($syaratYudicium)){
                  $this->ParseData('list_sayarat',$syaratYudicium , "SYARAT_", 1);
               }
            }
            else{
               $this->mErrorMessage .= $this->mYudiciumServiceObj->GetProperty("ErrorMessages");
               $this->AddVar("empty_box", "WARNING_MESSAGE",
               $this->ComposeErrorMessage("Data syarat yudisium tidak ditemukan. " , $this->mErrorMessage));
               $this->AddVar("syarat", "SYARAT_AVAILABLE", "NO");
            }
         }
         $this->DisplayTemplate();
      }

   function ShowErrorBox($err, $type='WARNING') {
		$this->AddVar("error_type","TYPE",$type);
      $this->AddVar("error_box", "ERROR_MESSAGE",$this->ComposeErrorMessage($err , $this->mErrorMessage));
      $this->SetAttribute("error_box","visibility",'visible');
   }

}
?>