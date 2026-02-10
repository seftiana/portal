<?php
/**
 * DisplayViewDaftar
 * Display class for view and search user
 *
 * @package
 * @author cecep septiana
 * @copyright Copyright (c) 2006 GamaTechno
 * @version 1.0
 * @date 2024-02-06
 *
 */

class DisplayViewDaftar extends DisplayBaseFull
{

	var $mUserService;
	var $mUserId;
	var $mUserRole;
	var $mErrorMessage;
	var $mViewBy;
	var $mSiaServer;

	function DisplayViewDaftar(&$configObject, $securityObj, $userId, $userRole, $viewBy, $siaServer){
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
		
		$this->mFinansiServiceAddress = $this->mrUserSession->GetProperty("FinansiServiceAddress"); #add ccp 29-2-2024

		$this->mUserId = $userId;
		$this->mUserRole = $userRole;
		$this->mViewBy = $viewBy;

		$this->SetTemplateBasedir($configObject->GetValue('app_module') . 'wisuda/templates/');
		$this->SetTemplateFile('view_daftar.html');
     
	}

	function Display(){
		//DisplayBaseFull::Display("[ Logout ]");
		if ($this->mUserRole != 1 && $this->mUserRole != 2){
			$this->mErrorMessage .= "User role tidak sesuai.";
			$this->ShowErrorBox("NONE");
		}else{
            $this->AddVar("content", "PROFILE_NIM", $this->mUserId);
			$this->AddVar("content", "URL_ADD","");
			$this->AddVar("content", "URL_UPLOAD_FOTO_WISUDA", "");
			$this->AddVar("content", "TOMBOL_DAFTAR", "");
			
			$tgl_wisuda = $this->mUserService->GetDataTglWisuda();
			$this->AddVar("content", "TANGGAL_WISUDA", $this->IndonesianDate($tgl_wisuda[0]['tgl_wisuda']));
			$dataProfil = $this->mUserService->GetWisudawan($tgl_wisuda[0]['tgl_wisuda']);
			
			$UserInfo = $this->mUserService->GetUserInfo($this->mUserId,$this->mUserRole);
			// echo"<pre>";print_r($UserInfo);echo"</pre>";
			
			// $this->DoUpdateServiceStatus($this->mUserService, $dataProfil, 'SIA');
			if (false === $dataProfil){
				
				$statusTagihanPrasyaratMhs 	=  $this->CekStatusTagihanPrasyaratMhs($this->mUserId);
				$statusTugasAkhirMhs 		=  $this->mUserService->GetNilaiTA();
				$dataProfilOld = $this->mUserService->GetWisudawanOld($tgl_wisuda[0]['tgl_wisuda']);
				
				##pengecekan status tagihan dan pembayran wisuda
				$this->AddVar("content", "VALIDASI_TA", "none");
				$this->AddVar("content", "VALIDASI_BAYAR", "none");
				$this->AddVar("content", "VALIDASI_WISUDA_OLD", "none");
				
				$this->AddVar("content", "TOMBOL_VALIDATION", "none");
				$this->ShowErrorBox();
				
				// echo"<pre>";
				// print_r($statusTagihanPrasyaratMhs['data']);
				// print_r($statusTugasAkhirMhs);
				// print_r($dataProfilOld);
				// echo"</pre>";
				
				if($UserInfo[0]['prodiKode']=='6290101' || $UserInfo[0]['prodiKode']=='6290111')$statusTugasAkhirMhs='ada';
				
				if(!empty($statusTagihanPrasyaratMhs['data']))$this->AddVar("content", "VALIDASI_BAYAR", "none");
				else $this->AddVar("content", "VALIDASI_BAYAR", "");
				
				if(!empty($statusTugasAkhirMhs))$this->AddVar("content", "VALIDASI_TA", "none");
				else $this->AddVar("content", "VALIDASI_TA", "");
				
				if(!empty($dataProfilOld))$this->AddVar("content", "VALIDASI_WISUDA_OLD", "");
				else $this->AddVar("content", "VALIDASI_WISUDA_OLD", "none");
				
				if(!empty($statusTagihanPrasyaratMhs['data']) and !empty($statusTugasAkhirMhs) and empty($dataProfilOld)){
					$this->AddVar("content", "URL_ADD", $this->mrConfig->GetURL('wisuda','wisuda','add')."&sia=".$this->mrConfig->Enc($this->mSiaServer));
					$this->ShowErrorBox();
					$this->AddVar("content", "VALIDASI_WISUDA_OLD", "none");
					$this->AddVar("content", "VALIDASI_TA", "none");
					$this->AddVar("content", "VALIDASI_BAYAR", "none");
					$this->AddVar("content", "TOMBOL_VALIDATION", "");
				}
			
				/*
				if(empty($statusTagihanPrasyaratMhs['data']) and empty($statusTugasAkhirMhs) and !empty($dataProfilOld) ){
					$this->ShowErrorBox();
					// echo"a";
					$this->AddVar("content", "VALIDASI_TA", "");
					$this->AddVar("content", "VALIDASI_BAYAR", "");
					$this->AddVar("content", "TOMBOL_VALIDATION", "none");
					$this->AddVar("content", "VALIDASI_WISUDA_OLD", "");
				}else if(!empty($statusTagihanPrasyaratMhs['data']) and empty($statusTugasAkhirMhs) and !empty($dataProfilOld)){
					$this->ShowErrorBox();
					// echo"b";
					$this->AddVar("content", "VALIDASI_TA", "none");
					$this->AddVar("content", "VALIDASI_BAYAR", "");
					$this->AddVar("content", "TOMBOL_VALIDATION", "none");
					$this->AddVar("content", "VALIDASI_WISUDA_OLD", "");
				}else if(!empty($statusTagihanPrasyaratMhs['data']) and empty($statusTugasAkhirMhs) and empty($dataProfilOld)){
					$this->ShowErrorBox();
					// echo"c";
					$this->AddVar("content", "VALIDASI_TA", "none");
					$this->AddVar("content", "VALIDASI_BAYAR", "");
					$this->AddVar("content", "TOMBOL_VALIDATION", "none");
					$this->AddVar("content", "VALIDASI_WISUDA_OLD", "");
				}else if(empty($statusTagihanPrasyaratMhs['data']) and !empty($statusTugasAkhirMhs) and !empty($dataProfilOld)){
					$this->ShowErrorBox();
					// echo"c";
					$this->AddVar("content", "VALIDASI_TA", "none");
					$this->AddVar("content", "VALIDASI_BAYAR", "none");
					$this->AddVar("content", "TOMBOL_VALIDATION", "none");
					$this->AddVar("content", "VALIDASI_WISUDA_OLD", "");
				}else if(empty($statusTagihanPrasyaratMhs['data']) and !empty($statusTugasAkhirMhs) and empty($dataProfilOld)){
					$this->ShowErrorBox();
					// echo"c";
					$this->AddVar("content", "VALIDASI_TA", "none");
					$this->AddVar("content", "VALIDASI_BAYAR", "none");
					$this->AddVar("content", "TOMBOL_VALIDATION", "none");
					$this->AddVar("content", "VALIDASI_WISUDA_OLD", "");
				}else{
					
					if(!empty($dataProfilOld)){
						// echo"d";
						$this->ShowErrorBox();
						$this->AddVar("content", "VALIDASI_WISUDA_OLD", "");
						$this->AddVar("content", "VALIDASI_TA", "none");
						$this->AddVar("content", "VALIDASI_BAYAR", "none");
						$this->AddVar("content", "TOMBOL_VALIDATION", "none");
					}else{
						// echo"e";
						$this->AddVar("content", "URL_ADD", $this->mrConfig->GetURL('wisuda','wisuda','add')."&sia=".$this->mrConfig->Enc($this->mSiaServer));
						$this->ShowErrorBox();
						$this->AddVar("content", "VALIDASI_WISUDA_OLD", "none");
						$this->AddVar("content", "VALIDASI_TA", "none");
						$this->AddVar("content", "VALIDASI_BAYAR", "none");
						$this->AddVar("content", "TOMBOL_VALIDATION", "");
					}
				}
				*/
				##end
				
			} else {
				
				$this->AddVar("content", "VALIDASI_TA", "none");
				$this->AddVar("content", "VALIDASI_BAYAR", "none");
				$this->AddVar("content", "VALIDASI_WISUDA_OLD", "none");
				$dataProfil[0]["SELESAI_AMBIL"]="none";
				$dataProfil[0]["FILE_UPLOAD_FOTO"]="";
				
				$dataIpkSks = $this->mUserService->GetIpkSksMhs($this->mUserId);
				$dataProfil[0]["AKD_IPK"]=$dataIpkSks[0]['ipk'];
				$dataProfil[0]["AKD_SKS"]=$dataIpkSks[0]['totol_sks'];
				
				if($dataProfil[0]["valid"]=='valid'){
					$dataProfil[0]["FILE_UPLOAD_FOTO"]="none";
					$dataProfil[0]["VALIDASI_EDIT"]="none";
					$dataProfil[0]["url_edit"] = "";
				}else {
					$dataProfil[0]["VALIDASI_EDIT"]="";
					$dataProfil[0]["url_edit"] = $this->mrConfig->GetURL('wisuda','wisuda','edit')."&sia=".$this->mrConfig->Enc($this->mSiaServer);
					$this->AddVar("content", "URL_UPLOAD_FOTO_WISUDA", $this->mrConfig->mValue['baseaddress'].'module/wisuda/edit_upload.php');
				}
				
				if($dataProfil[0]["valid"]=='valid' && empty($dataProfil[0]["tiketAmbil"])){
					$dataProfil[0]["FILE_UPLOAD_FOTO"]="none";
					$dataProfil[0]["VALIDASI_TOKEN"]="";
					$dataProfil[0]["URL_TIKET"] = $this->mrConfig->GetURL('wisuda','wisuda','process')."&sia=".$this->mrConfig->Enc($this->mSiaServer);
				}else {
					$dataProfil[0]["VALIDASI_TOKEN"]="none";
					$dataProfil[0]["URL_TIKET"] = "";
				}
				
				if($dataProfil[0]["valid"]=='valid' && !empty($dataProfil[0]["tiketAmbil"]) && empty($dataProfil[0]["tanggal_ambil"]) ){
					$dataProfil[0]["SUDAH_AMBIL"]="";
				}else {
					$dataProfil[0]["SUDAH_AMBIL"]="none";
				}
				
				if(empty($dataProfil[0]["tanggal_ambil"])){
					$dataProfil[0]["SELESAI_AMBIL"]="none";
				}else {
					$dataProfil[0]["SELESAI_AMBIL"]="";
				}
				
				$dataProfil[0]["tanggal_terdaftar"] = $this->IndonesianDate($dataProfil[0]["tanggal_terdaftar"]);
				$dataProfil[0]["tanggal_lahir"] = $this->IndonesianDate($dataProfil[0]["tanggal_lahir"]);
				$dataProfil[0]["tanggal_wisuda_ori"] = $dataProfil[0]["tanggal_wisuda"];
				$dataProfil[0]["tanggal_wisuda"] = $this->IndonesianDate($dataProfil[0]["tanggal_wisuda"]);
				$dataProfil[0]["tanggal_lulus"] = $this->IndonesianDate($dataProfil[0]["tanggal_lulus"]);
				$dataProfil[0]["NOMORTIKET"] = "Nomor tiket pengambilan : <strong>".$dataProfil[0]["tiketAmbil"]."</strong>";
				
				$dataProfil[0]["IMG_ORI"] =$this->mrConfig->mValue['baseaddress'].'module/wisuda/upload/'.$dataProfil[0]['foto'];
				$dataProfil[0]["FOTO_ORI"] =$dataProfil[0]['foto'];
				$this->AddVar("content", "IMG_SRC", $this->mrConfig->mValue['baseaddress'].'module/wisuda/upload/');
				$this->AddVar("content", "TOMBOL_DAFTAR", "none");
				$this->AddVar("data_profile", "INFO_AVAILABLE", "YES");
				$this->ParseData("data_profile", $dataProfil, "PROFILE_");
			}
		}
     
		DisplayBaseFull::Display("[ Logout ]");
		$this->DisplayTemplate();
	}

	function ShowErrorBox($infoavailable = "NO") {
		$this->AddVar("error_box", "ERROR_MESSAGE",$this->ComposeErrorMessage("Belum mendaftar wisuda." , $this->mErrorMessage));
		$this->AddVar("data_profile", "INFO_AVAILABLE", $infoavailable);
		$this->SetAttribute('error_box', 'visibility', 'visible');
	}
	
	function ShowErrorBoxValid($infoavailable = "NO") {
		$this->AddVar("error_box", "ERROR_MESSAGE",$this->ComposeErrorMessage("- Masih ada tagihan keuangan yang belum dilunasi atau <br>- Belum ada nilai matakuliah tugas akhir" , $this->mErrorMessage));
		$this->AddVar("data_profile", "INFO_AVAILABLE", $infoavailable);
		$this->SetAttribute('error_box', 'visibility', 'visible');
	}
	
	function CekStatusTagihanPrasyaratMhs($nim) {
		if($this->mFinansiServiceAddress == ''){
			$this->ShowErrorBox("Pengambilan data tagihan tidak berhasil.");       
		} else{
			$restClient = new RestClient();
			$restClient->SetPath($this->mFinansiServiceAddress.'?mod=lap_histori_pembayaran&sub=HistoriPembayaranMahasiswaWisuda&typ=rest&act=rest');
			$restClient->SetGet('&nim='.$nim);
			$restClient->SetDebugOn();
			$this->dataRest = $restClient->Send();
			return $this->dataRest['gtfwResult'];
		}
	}
}

?>