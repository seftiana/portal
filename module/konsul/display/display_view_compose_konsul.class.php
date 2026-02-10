<?php

   /**
     * DisplayViewComposeKonsul
     * Display Class for View Compose Konsul 
     * 
     * @package DisplayViewComposeKonsul
     * @author Yudhi Aksara, S.Kom
     * @copyright Copyright (c) 2006 GamaTechno
     * @version 1.0 
     * @date 2006-02-10
     * @revision 
     *
     */
   class DisplayViewComposeKonsul extends DisplayBaseFull
   {
      /**
        * var $mComposeType string Tipe Compose (default, Reply, Forward)
        */
      var $mComposeType;
      
      /**
        * var $mErrorMessage string Error Konsul
        */
      var $mErrorMessage;
      
      /**
        * var $mErrorType string Tipe Error Konsul
        */
      var $mErrorType;
      
      /**
        * var $mMessageId integer Id Konsul
        */
      var $mMessageId;
      
      /**
        * DisplayViewComposeKonsul::DisplayViewComposeKonsul
        * Constructor for Class DisplayViewComposeKonsul
        *
        * @param $configObject object Configuration
        * @param $security object Security
        * @param $composeType string Tipe Compose (default, Reply, Forward)
        * @param $errMsg string Error Konsul
        * @param $msgId integer Id Konsul
        * @return void
        */
		function DisplayViewComposeKonsul(&$configObject, &$security, $composeType, $errMsg, $errType, $msgId){
			 DisplayBaseFull::DisplayBaseFull($configObject, $security);
			 $this->mDataMessage = New Konsul($this->mrConfig);
			 $this->mComposeType = $composeType;
			 $this->mErrorMessage = $errMsg;
			 $this->mErrorType = $errType;
			 $this->mMessageId = $msgId;
			 
			 //set template untuk error dan empty box DisplayBase::SetErrorAndEmptyBox
			 $this->SetErrorAndEmptyBox();
			 
			 $this->SetTemplateBasedir($this->mrConfig->GetValue('app_module') . 'konsul/templates/');
			 // if($this->mrUserSession->GetProperty("Role")=='1'){ // 1=mahasiswa
				$this->SetTemplateFile('view_compose_konsul.html');
			 // }else{
				// $this->SetTemplateFile('view_compose_konsul_by_dosen.html');
			 // }
		}
      
      /**
        * DisplayViewComposeKonsul::Display
        * Parsing Data to Template
        *
        * @param
        * @return void
        */
		function Display(){
			DisplayBaseFull::Display('[ Logout ]');
			$this->AddVar("content", "APPLICATION_MODULE", 'Kotak Konsul');
			if ($this->mComposeType == NULL)
				$tipe = "Kirim";
			if ($this->mComposeType == 'Reply')
				$tipe = "Balas";
			if ($this->mComposeType == 'Forward')
				$tipe = "Lanjutkan";
			$this->AddVar("content", "APPLICATION_SUBMODULE",$tipe. ' Konsul');
         
				// echo"<pre>";
				// echo "<br>";
				// echo"role = ".$this->mrUserSession->GetProperty("Role");
				// print_r($this->mrUserSession);
				// echo"</pre>";
			if($this->mrUserSession->GetProperty("Role")=='1'){ // 1=mahasiswa
				$dataUser = $this->GetDataMahasiswa(); // add ccp 15-1-2024
				$id_tujuan = $dataUser[0]['nip_pa'];
				$nama_tujuan = $dataUser[0]['dosen_pa'];
				$email_tujuan = $dataUser[0]['email_pa'];
			}else{
				$id_tujuan = '';
				$nama_tujuan = '';
				$email_tujuan = '';
			}
         
			if (empty($this->mComposeType)) {
				// compose saja
				$this->AddVar("compose","IS_EMPTY","NO");
				$composeDetail[0]['APPLICATION_SUBMODULE'] = $tipe. ' Konsul';
				$composeDetail[0]['nama_pengirim'] = $this->mrUserSession->GetProperty("UserFullName");
				$composeDetail[0]['id_pengirim'] = $this->mrUserSession->GetProperty("User");
				$composeDetail[0]['id_tujuan'] = $id_tujuan;
				$composeDetail[0]['nama_tujuan'] = $nama_tujuan;
				$composeDetail[0]['email_tujuan'] = $email_tujuan;
				$composeDetail[0]['tanggal_kirim'] = $this->IndonesianDate(date('Y-m-d'));
				$composeDetail[0]['url_process'] = $this->mrConfig->GetURL('konsul','konsul','process');
			}else {

				//reply atau forward
				if (!empty($this->mMessageId)) {
					$this->mDataMessage->SetProperty("MessageId", $this->mMessageId);
					$composeDetail = $this->mDataMessage->GetDetailMessageItem();
					if (false === $composeDetail) {
						$this->AddVar("compose","IS_EMPTY","YES");
						$this->AddVar('empty_type', 'TYPE', "INFO");
						$this->AddVar("empty_box", "WARNING_MESSAGE", $this->mDataMessage->GetProperty("MessageErrorMessage"));;
					}else {
						$this->AddVar("compose","IS_EMPTY","NO");
						$composeDetail[0]['APPLICATION_SUBMODULE'] = $tipe. ' Konsul';
						$composeDetail[0]['nama_pengirim'] = $this->mrUserSession->GetProperty("UserFullName");
						$composeDetail[0]['id_pengirim'] = $this->mrUserSession->GetProperty("User");
						$composeDetail[0]['tanggal_kirim'] = $this->IndonesianDate(date('Y-m-d'));
						$composeDetail[0]['email_tujuan'] = $email_tujuan;
                  
						// proses tanggal kirim pesan yang akan direply atau diforward
						$tmpKirim = explode(" ", $composeDetail[0]['WaktuKirim']);
						if ($tmpKirim[0] != '')
							$tmpTglKirim = $this->IndonesianDate($tmpKirim[0]);
						else
							$tmpTglKirim = '--';
						$composeDetail[0]['WaktuKirim'] = $tmpTglKirim;
                  
						// proses penulisan pesan lama ke kotak penulisan pesan
						$pesan = "> From : " .$composeDetail[0]['Pengirim']."\n";
						$pesan .= "> Tanggal : " .$composeDetail[0]['WaktuKirim']."\n";
						$pesan .= "> Title : ".$composeDetail[0]['Judul']."\n";
						$pesan .= "> Pesan : " .$composeDetail[0]['Isi']."\n";
						$pesan .= "------------------------\n";
						$composeDetail[0]['Isi'] = $pesan;
						$composeDetail[0]['url_process'] = $this->mrConfig->GetURL('konsul','konsul','process') . '&composeType='. $this->mrConfig->Enc($this->mComposeType) . '&msgId='. $this->mrConfig->Enc($this->mMessageId);
						switch ($this->mComposeType) {
							case "Reply":
								$composeDetail[0]['id_tujuan'] = $composeDetail[0]['IdPengirim'];
								$composeDetail[0]['nama_tujuan'] = $composeDetail[0]['Pengirim'];
								
								if (substr($composeDetail[0]['Judul'],0,4) == "re:[")
								   $judul = $composeDetail[0]['Judul'];
								else
								   $judul = "re:[" .$composeDetail[0]['Judul']."]";
								$composeDetail[0]['Judul'] = $judul;
								break;
							case "Forward":	
								if (substr($composeDetail[0]['Judul'],0,5) == "fwd:[")
								   $judul = $composeDetail[0]['Judul'];
								else
								   $judul = "fwd:[" .$composeDetail[0]['Judul']."]";
								$composeDetail[0]['Judul'] = $judul;
								break;
						}
					}
				}
			}
         
			// tampilkan error konsul jika ada
			if (!empty($this->mErrorMessage)) {
				$this->SetAttribute('error_box', 'visibility', 'visible');
				$this->AddVar('error_type', 'TYPE', strtoupper($this->mErrorType));
				$this->AddVar('error_box', 'ERROR_MESSAGE', $this->mErrorMessage);
            
				$formData = $this->mrUserSession->GetProperty("LastFormData");
				if (!empty($formData)) {
					$composeDetail[0]['id_pengirim'] = $formData['MessageSender'];
					$composeDetail[0]['id_tujuan'] = $formData['MessageReceiver'];
					$composeDetail[0]['Judul'] = $formData['MessageTitle'];
					$composeDetail[0]['Isi'] = $formData['MessageContent'];  
				}
			}

			$composeDetail[0]['url_addr_book'] = $this->mrConfig->GetURL('konsul','address_book','popup') . '&niuPemilik='. $this->mrConfig->Enc($this->mrUserSession->GetProperty("User"));
			$this->ParseData('compose', $composeDetail, "CMPS_");
			$this->DisplayTemplate();
		}
	  
		
		function GetDataMahasiswa() {
			$objUserService = new UserClientService($this->mrUserSession->GetProperty("ServerServiceAddress"),
            false, $this->mrUserSession->GetProperty("User"));
			if ($objUserService->IsError()) {
				$this->mErrorMessage .= $this->mUserService->GetProperty("ErrorMessages");
			}else{
				$objUserService->SetProperty("UserRole", 1 );
				$dataUser = $objUserService->GetUserInfo(1);
				$this->DoUpdateServiceStatus($objUserService, $dataUser, 'SIA');
				if (false === $dataUser){
					$this->mErrorMessage .= $objUserService->GetProperty("ErrorMessages");
					return false;
				} else {
					return $dataUser;
				}
			}
		}
   }
?>