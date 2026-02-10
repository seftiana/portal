<?php
/*
Author :: Cecep Seftiana
10-04-2019
menampilkan informasi ketiaka mahasiswa berhasil login ke gtportal
*/
class DisplayInformasiPemilu extends DisplayBaseNoLinks {
   
   var $mErrorMessage;
   var $mNiu;
   var $mServiceServer;
   
   function DisplayInformasiPemilu(&$configObject, &$security, $niu, $sia, $errMsg) { 
		DisplayBaseNoLinks::DisplayBaseNoLinks($configObject, $security);
		$this->mErrorMessage = $errMsg;
		$this->mNiu = $niu;
		$this->mServiceServer = $sia;
		$this->SetErrorAndEmptyBox();
		$this->SetTemplateBasedir($configObject->GetValue('app_module') . 'kuisioner/templates/');
		$this->SetTemplateFile('view_informasi_pemilu.html');
	}
   
   function Display() {
		if($this->mErrorMessage==1){
			$this->AddVar("content", "ERROR", "<h2 align=center>Anda belum memilih calon ketua!</h2>");
		}else{
			$this->AddVar("content", "ERROR", "");
		}
		$this->AddVar("content", "PATH1", $this->mrConfig->GetValue('baseaddress').'images/user_foto/1.png');
		$this->AddVar("content", "PATH2", $this->mrConfig->GetValue('baseaddress').'images/user_foto/2.jpg');
		$this->AddVar("content", "PATH3", $this->mrConfig->GetValue('baseaddress').'images/user_foto/3.png');
		$this->AddVar("content", "BLANK", $this->mrConfig->GetValue('baseaddress').'images/user_foto/blank.jpg');
		$this->AddVar("content", "URL_GOTO", $this->mrConfig->GetURL('kuisioner', 'pilih', 'proses'));
		
		DisplayBaseNoLinks::Display();
		$this->DisplayTemplate();
	}
	
}
?>