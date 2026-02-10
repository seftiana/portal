<?php
   /**
   * DisplayViewAccountEmail
   * DisplayViewAccountEmail class
   * 
   * @package communication 
   * @author Cecep Seftiana P, S.Kom
   * @copyright Copyright (c) 2019 Perbanas
   * @version 1.0 
   * @date 2019-08-26
   */
   
   class DisplayViewAccountEmail extends DisplayBaseFull {
      var $mUserRole;
      var $mMahasiswaNiu;
      var $mMahasiswaProdiId;
      var $mErrorMessage;
      var $mCurrentPeriode;
      var $mObj;
      var $mPeriode;
      var $mViewBy;
		var $mSiaServer;
      
      function DisplayViewAccountEmail(&$configObject, &$security, $userRole, $mhsniu, $prodiId, $errMsg, $viewBy, $siaServer) {
         DisplayBaseFull::DisplayBaseFull($configObject, $security);
         $this->mUserRole = $userRole;
         $this->mMahasiswaProdiId = $prodiId;
         $this->mMahasiswaNiu = $mhsniu;
         $this->mErrorMessage = $errMsg;
         $this->mViewBy = $viewBy;
			if ($siaServer == "") {
				$this->mSiaServer = $this->mrUserSession->GetProperty("ServerServiceAddress");
			} else {
				$this->mSiaServer = $siaServer;
			}
         $this->mObj = new UserClientService($this->mSiaServer,false, $this->mMahasiswaNiu);
         $this->SetErrorAndEmptyBox();  
         $this->SetTemplateBasedir($configObject->GetValue('app_module') . 'account/templates/');
         $this->SetTemplateFile('view_account_email.html');
      }
      
      function GetDataMahasiswa() {
         if ($this->mObj->IsError()) {
            $this->mErrorMessage .= $this->mUserService->GetProperty("ErrorMessages");
         }else{
            $this->mObj->SetProperty("UserRole", 1 );
            $dataUser = $this->mObj->GetUserInfo(1);
            $this->DoUpdateServiceStatus($this->mObj, $dataUser, 'SIA');
            if (false === $dataUser){    
               $this->mErrorMessage .= $this->mObj->GetProperty("ErrorMessages");
               return false;
            } else {
               return $dataUser;
            }   
         }
      }
      
      function Display() {
         // cek apakah service sia is available
         $dataUser = $this->GetDataMahasiswa();
         DisplayBaseFull::Display("[ Logout ]");
         
         if (false === $dataUser) {
            // service tidak available
            $this->ShowErrorBox("Pengambilan data tidak berhasil. ");
            $this->SetAttribute('mahasiswa','visibility','hidden');
            $this->SetAttribute('data_container','visibility','hidden');
         } else {
         
             //parse data user
            // $semester = $this->mObj->GetProperty("NamaSemester") ." ". $this->mObj->GetProperty("TahunSemester");
            $arrTempSem = explode(" ",$semester);
            $dataUser[0]['sem'] = $semester . " / " . (++$arrTempSem[1]);
            
            $this->AddVar('content','id',$this->mrConfig->Enc('krs'));
            $this->ParseData('mahasiswa', $dataUser, "MHS_");
            
			$dataMahasiswa = $this->mObj->GetDataAccountEmail(); // limit bigint
			$flag = true;
             if (false === $dataMahasiswa) {
               $this->AddVar('data_container','IS_EMPTY','YES');
               $this->AddVar('empty_type', 'TYPE', "INFO");
               $this->AddVar("empty_box", "WARNING_MESSAGE", $this->ComposeErrorMessage('Data account email yang tampil khusus mahasiswa angkatan 2019 keatas. ', $this->GetProperty("ErrorMessage")));
            } else {
               $this->AddVar('data_container','IS_EMPTY','NO');
			   for($i=0,$m=count($dataMahasiswa);$i<$m;++$i){
				if($i%2==0) $this->AddVar('data_item', '_CLASS', '');
				else $this->AddVar('data_item', '_CLASS', 'table-common-even');
				$this->AddVar('data_item', 'NUMBER', $i+1);
				$this->AddVar('data_item', 'USERNAME', $dataMahasiswa[$i]['maEmail']);
				$this->AddVar('data_item', 'ELEARNING', $dataMahasiswa[$i]['maElearning']);
				$this->AddVar('data_item', 'PASSWORD', $dataMahasiswa[$i]['maEmailPswd']);
				$this->AddVar('data_item', 'PASSWORDEL', $dataMahasiswa[$i]['maElearningPswd']);
				$this->AddVar('data_item', 'AKTIF', ($dataMahasiswa[$i]['maEmailAktif']==1)?'Sudah':'Sudah');
				$this->mTemplate->parseTemplate('data_item', 'a');
			   }
            }
         }

         $this->DisplayTemplate();
      }
      
      function ShowErrorBox($stringError="") {
         if ($stringError != "" || $this->mErrorMessage != ""){
            $this->AddVar("error_box", "ERROR_MESSAGE",  
                  $this->ComposeErrorMessage($stringError , $this->mErrorMessage));   
            $this->SetAttribute('error_box', 'visibility', 'visible');
         }
      }
   }
?>