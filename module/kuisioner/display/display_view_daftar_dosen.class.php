<?php   
class DisplayViewHasilKuisioner extends DisplayBaseNoLinks {
   var $mUserId;
   var $mProdiId;
   var $mDosenServiceObj;
   var $mServiceServer;
   var $mDisplay;

   function DisplayViewHasilKuisioner(&$configObject, &$security) {
      DisplayBaseNoLinks::DisplayBaseNoLinks($configObject, $security);
		$kuisObj = new Kuisioner($configObject);
		$this->mServiceServer = $kuisObj->getServiceAddress();
	  if(is_object($security->mUserIdentity)){
	  $this->mUserId = $security->mUserIdentity->GetProperty("UserReferenceId");
	  $this->mUserRole = $this->mrUserSession->GetProperty('Role');
	  }else $this->mUserId = '';
      $this->SetTemplateBasedir($configObject->GetValue('app_module') . 'kuisioner/templates/');
      $this->SetTemplateFile('view_daftar_dosen.html');
   }
   
   function Display() {
      DisplayBaseNoLinks::Display();
      if(empty($this->mServiceServer)) {
         $serverUsed = $this->mrUserSession->GetProperty("ServerServiceAddress");
         $this->mServiceServer = $serverUsed;
		 }
      else {
         $serverUsed = $this->mServiceServer;
	  }  
	  $objKuisionerService = new KuisionerClientService($serverUsed, false, $this->mUserId);
	  $objKuisionerService->SetProperty("UserRole", $this->mUserRole);
	  if($this->mUserRole==3){
		$listDosen = $objKuisionerService->GetListDosen();
		$tmpFak = $listDosen[0]['FAKULTASKODE'];
		$tmpJur = $listDosen[0]['JURUSANKODE'];
		$tmpProdi = $listDosen[0]['PRODIKODE'];
		$this->AddVar("fakultas", "NAMA", $listDosen[0]['FAKULTAS']);
		$this->AddVar("jurusan", "NAMA", $listDosen[0]['JURUSAN']);
		$this->AddVar("prodi", "NAMA", $listDosen[0]['PRODI']);
		$this->AddVar("fakultas", "FAK", $listDosen[0]['FAKULTASKODE']);
		$this->AddVar("jurusan", "JUR", $listDosen[0]['JURUSANKODE']);
		$this->AddVar("prodi", "PROD", $listDosen[0]['PRODIKODE']);
		foreach($listDosen as $data){
			if($tmpFak!=$data['FAKULTASKODE']){
				$this->AddVar("fakultas", "NAMA", $data['FAKULTAS']);
				$this->mTemplate->parseTemplate('fakultas', "a");
				$tmpFak=$data['FAKULTASKODE'];
			}elseif($tmpJur!=$data['JURUSANKODE']){
				$this->AddVar("jurusan", "NAMA", $data['JURUSAN']);
				$this->mTemplate->parseTemplate('jurusan', "a");
				$tmpJur=$data['JURUSANKODE'];
			}elseif($tmpProdi!=$data['PRODIKODE']){
				$this->AddVar("prodi", "NAMA", $data['PRODI']);
				$this->mTemplate->parseTemplate('prodi', "a");
				$tmpProdi=$data['PRODIKODE'];
			}else{
				$this->AddVar("dosen", "LNK", $this->mrConfig->GetURL('kuisioner', 'hasil_kuisioner', 'view').'&m='.$this->mrConfig->Enc('MATAKULIAH').'&id='.$this->mrConfig->Enc($data['NIP']));
				$this->AddVar("dosen", "NAMA", $data['NAMA_DOSEN']);
				$this->mTemplate->parseTemplate('dosen', "a");
			}
		}
		$this->mTemplate->parseTemplate('prodi', "a");
		$this->mTemplate->parseTemplate('jurusan', "a");
		$this->mTemplate->parseTemplate('fakultas', "a");
		$this->AddVar("link_kembali", "LINK", $this->mrConfig->GetURL('home', 'home', 'view'));
		$this->DisplayTemplate();
	   }	
       else header('location:'.$_SERVER['HTTP_REFERER']);
   }
}
?>