<?php
// ini_set('display_errors', 1);
class DisplayTugasAkhir extends DisplayBaseFull{

   var $mUserId;
   var $mUserRole;
   var $mSiaServer;
   var $mErrorMessage = array();

   var $mData;

   function DisplayTugasAkhir(&$configObject, $securityObj, $userId, $userRole){
      DisplayBaseFull::DisplayBaseFull($configObject, $securityObj);
      $this->mSiaServer = $this->mrUserSession->GetProperty("ServerServiceAddress");
	  
	  $this->SetErrorAndEmptyBox();
	  
      $this->SetTemplateBasedir($configObject->GetValue('app_module') . 'tugas_akhir/templates/');
      $this->SetTemplateFile('view_tugas_akhir.html');
	  
      $this->mData = new TugasAkhirService($this->mSiaServer, false, $userId);
	  $semid = $this->mData->getSemesterAktif();
	  
	  if(!$semid)$this->mErrorMessage[] = 'Data Semester Tidak Ditemukan';

	  $syaratAkademik = $this->mData->getSyaratAkademikTugasAkhir();
	  if(!$syaratAkademik)$this->mErrorMessage[] = 'Anda Belum Mengambil KRS matakuliah Skripsi';
	  
	  $ref = new Reference($configObject);
	  $tUnit = $ref->GetAllUnitData('1041001');
	  if(isset($tUnit[0]['service_address'])){
		$tUnit = $tUnit[0]['service_address'];
		if($tUnit{strlen($tUnit) - 1} !== '/')$tUnit .= '/';
		$url = $tUnit . 'rest.php?mod=lap_histori_pembayaran&sub=StatusBayarMahasiswa&act=rest&typ=rest&nim=' . $userId . '&semester=' . $semid;
		
		$obj = new RestClient();
		$obj->SetPath($url);
		$result = $obj->Send();
		if(isset($result['gtfwResult']) and $result['gtfwResult']['status'] == 200){
			$pembayaran = $result['gtfwResult']['data'];
			$cek = array('skripsi');
			
			$m = count($pembayaran);
			if($m > 0)$valid = true;
			else $valid = false;
			for($i = 0; $i < $m; ++$i){
				if(in_array($pembayaran[$i]['jenis_biaya'], $cek)){
					$valid = $valid && (bool)$pembayaran[$i]['status'];
				}
			}
			
			if(!$valid){
				$this->mErrorMessage[] = 'Anda Belum Melakukan Pembayaran Skripsi';
			}
		}
	  }else{
		$this->mErrorMessage[] = $ref->GetProperty('ReferenceErrorMsg');
	  }
   }

   function Display(){
      DisplayBaseFull::Display("[ Logout ]");

	 if (!empty($this->mErrorMessage)) {
		$err = trim(implode('<br />', $this->mErrorMessage));
		$this->AddVar('error_box', 'ERROR_MESSAGE', $err);
		$this->SetAttribute('error_box', 'visibility', 'visible');
		$this->mTemplate->SetAttribute('form', 'visibility', 'hidden');
	 }else{
	 
      $urlAddPengajuan = $this->mrConfig->GetURL('tugas_akhir','add_tugas_akhir','view').'&opsiForm='.$this->mrConfig->Enc('tambah');
      $this->mTemplate->addVar("form","URL_ADD_PENGAJUAN",$urlAddPengajuan);

	 }
      //syarat ujian
      $data = $this->mData->getSyaratPendaftaranTugasAkhir();
	  if(!isset($data[0]))$this->mTemplate->SetAttribute("data_syarat", 'visibility', 'hidden');
      else for ($i=0, $m=count($data); $i < $m; ++$i) {
         $this->mTemplate->addVars("data_syarat",$data[$i]);
         $this->mTemplate->parseTemplate("data_syarat", "a");
      }

      $data = $this->mData->getDetailTugasAkhir();
	  $m = count($data);if(empty($data)){$m=0;}
      if($m > 0){
		$this->mTemplate->addVar("form",'LABEL_ADD', 'Ubah');
		
		$romawi = array('', 'I', 'II');
		for($i = 0; $i < $m; ++$i){
			$data[$i]['NUM'] = $romawi[$i+1];
			$this->mTemplate->addVars("data_form", $data[$i]);
			$this->mTemplate->parseTemplate("data_form", "a");
		}
      }else{
		$this->mTemplate->addVar("form",'FORM_HIDDEN', 'hidden');
		$this->mTemplate->addVar("form",'LABEL_ADD', 'Daftar');
		$this->mTemplate->SetAttribute("data_dosen", 'visibility', 'hidden');
      }

      $this->DisplayTemplate();
   }

}
?>