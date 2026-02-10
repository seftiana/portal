<?php
/**
 * DisplayViewTutup
 * Display class for view and search user
 *
 * @package
 * @author cecep septiana
 * @copyright Copyright (c) 2006 GamaTechno
 * @version 1.0
 * @date 2024-02-06
 *
 */

class DisplayViewTutup extends DisplayBaseFull
{

	var $mUserService;
	var $mUserId;
	var $mUserRole;
	var $mErrorMessage;
	var $mViewBy;
	var $mSiaServer;

	function DisplayViewTutup(&$configObject, $securityObj, $userId, $userRole, $viewBy, $siaServer){
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
		$this->SetTemplateFile('view_tutup.html');
     
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
			
			$tgl_wisuda = $this->mUserService->GetDataTglWisuda();
			$this->AddVar("content", "TANGGAL_WISUDA", $this->IndonesianDate($tgl_wisuda[0]['tgl_wisuda']));
			$dataProfil = $this->mUserService->GetWisudawan($tgl_wisuda[0]['tgl_wisuda']);
			
			// echo"<pre>";print_r($tgl_wisuda);echo"</pre>";
			// echo"<pre>";print_r($dataProfil);echo"</pre>";
			
			// $this->DoUpdateServiceStatus($this->mUserService, $dataProfil, 'SIA');
			if (false === $dataProfil){

				
				##pengecekan status tagihan dan pembayran wisuda
				
				$this->ShowErrorBox();
				
				
				
			} else {
				$dataProfil[0]["VALIDASI_TIKET"]="";
				$dataProfil[0]["VALIDASI_TOKEN"]="none";
				$dataProfil[0]["VALIDASI_SUDAH_AMBIL"]="";
				$dataProfil[0]["TOMBOL_UBAH_FOTO"]="none";
				$dataProfil[0]["VIEW_SUDAH_AMBIL"]="";
				
				if(empty($dataProfil[0]['valid']) or $dataProfil[0]['valid']==''){
					$dataProfil[0]["VALIDASI_VALID"]="Belum tervalidasi, silahkan menghubungi petugas registrasi wisuda";
					$this->AddVar("content", "URL_UPLOAD_FOTO_WISUDA", $this->mrConfig->mValue['baseaddress'].'module/wisuda/edit_upload.php');
					$dataProfil[0]["TOMBOL_UBAH_FOTO"]="";
				}else{
					$dataProfil[0]['ket']="";
					$dataProfil[0]["VALIDASI_VALID"]="Sudah tervalidasi";
					if(!empty($dataProfil[0]['tiketAmbil'])){
						$dataProfil[0]["VALIDASI_TIKET"]=$dataProfil[0]['tiketAmbil'];
					}else{
						// $dataProfil[0]["VALIDASI_TIKET"]="Silahlan buat tiket, untuk mengambil toga dan undangan wisuda";
						$dataProfil[0]["VALIDASI_TIKET"]="Ada belum dapat undangan untuk mengambil tiket dari petugas registrasi wisuda Perbanas Institute";
						$dataProfil[0]["VALIDASI_TOKEN"]="";
					}
				}
				
				if(!empty($dataProfil[0]['tanggal_ambil'])){
					$dataProfil[0]["VALIDASI_SUDAH_AMBIL"]="none";
					$dataProfil[0]["VIEW_SUDAH_AMBIL"]="Anda sudah mengambil toga dan undangan wisuda pada tanggal ".$dataProfil[0]['tanggal_ambil'].", dengan petugas registrasi Bp./Ibu ".$dataProfil[0]['userAmbil'];
				}

				$dataIpkSks = $this->mUserService->GetIpkSksMhs($this->mUserId);
				$dataProfil[0]["AKD_IPK"]=$dataIpkSks[0]['ipk'];
				$dataProfil[0]["AKD_SKS"]=$dataIpkSks[0]['totol_sks'];
				
				//$dataProfil[0]["url_edit"] = $this->mrConfig->GetURL('wisuda','wisuda','edit')."&sia=".$this->mrConfig->Enc($this->mSiaServer);
				
				if($dataProfil[0]["valid"]=='valid' && empty($dataProfil[0]["tiketAmbil"])){
					$dataProfil[0]["URL_TIKET"] = $this->mrConfig->GetURL('wisuda','wisuda','process')."&sia=".$this->mrConfig->Enc($this->mSiaServer);
				}else {
					
					$dataProfil[0]["URL_TIKET"] = "";
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