<?php
/*
Author :: Cecep Seftiana
10-04-2019
menampilkan informasi ketiaka mahasiswa berhasil login ke gtportal
*/
class DisplayInformasi extends DisplayBaseNoLinks {
   
   var $mErrorMessage;
   var $mNiu;
   var $mServiceServer;
   
   function DisplayInformasi(&$configObject, &$security, $niu, $sia, $errMsg) { 
		DisplayBaseNoLinks::DisplayBaseNoLinks($configObject, $security);
		$this->mErrorMessage = $errMsg;
		$this->mNiu = $niu;
		$this->mServiceServer = $sia;
        
		$this->SetErrorAndEmptyBox();
		$this->SetTemplateBasedir($configObject->GetValue('app_module') . 'kuisioner/templates/');
		$this->SetTemplateFile('view_informasi.html');
	}
   
   function Display() {
		if(isset($_POST['btnSkip'])){
			header("Location: ". $this->mrConfig->GetURL('home', 'home', 'view'));
			die;
		}
		DisplayBaseNoLinks::Display();
		$this->DisplayTemplate();
	}
}
?>