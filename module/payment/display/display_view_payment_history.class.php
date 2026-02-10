<?php
   /**
   * DisplayViewPaymentHistory
   * DisplayViewPaymentHistory class
   * 
   * @package communication 
   * @author Yudhi Aksara, S.Kom
   * @copyright Copyright (c) 2006 GamaTechno
   * @version 1.0 
   * @date 2006-03-07
   * @revision Maya Alipin 2006.09.07
   */
   
   class DisplayViewPaymentHistory extends DisplayBaseFull {
      var $mUserRole;
      var $mMahasiswaNiu;
      var $mMahasiswaProdiId;
      var $mErrorMessage;
      var $mCurrentPeriode;
      var $mObj;
      var $mPeriode;
      var $mViewBy;
		var $mSiaServer;
      
      function DisplayViewPaymentHistory(&$configObject, &$security, $userRole, $mhsniu, $prodiId, $errMsg, $viewBy, $siaServer) {
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
         $this->SetTemplateBasedir($configObject->GetValue('app_module') . 'payment/templates/');
         $this->SetTemplateFile('view_payment_history.html');
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
            
			$dataPembayaran = $this->mObj->GetDataHistoryPembayaran(18446744073709551615); // limit bigint
			$flag = true;
             if (false === $dataPembayaran) {
               $this->AddVar('data_container','IS_EMPTY','YES');
               $this->AddVar('empty_type', 'TYPE', "INFO");
               $this->AddVar("empty_box", "WARNING_MESSAGE", $this->ComposeErrorMessage('Data pembayaran tidak ditemukan. ', $this->GetProperty("ErrorMessage")));
            } else {
               $this->AddVar('data_container','IS_EMPTY','NO');
			   for($i=0,$m=count($dataPembayaran);$i<$m;++$i){
				if($i%2==0) $this->AddVar('data_item', '_CLASS', '');
				else $this->AddVar('data_item', '_CLASS', 'table-common-even');
				$this->AddVar('data_item', 'NUMBER', $i+1);
				$this->AddVar('data_item', 'TANGGAL', $dataPembayaran[$i]['TANGGAL']);
				$this->AddVar('data_item', 'SEMESTER', $dataPembayaran[$i]['semester']);
				$this->AddVar('data_item', 'LABEL', $dataPembayaran[$i]['label']);
				$this->AddVar('data_item', 'IS_LUNAS', ($dataPembayaran[$i]['is_lunas']==1)?'Sudah':'Belum');
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