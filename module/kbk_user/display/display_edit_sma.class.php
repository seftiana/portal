<?php
set_time_limit(0);
class DisplayEditSma extends DisplayBaseFull 
{

   var $mUserService;
   var $mUserId;
   var $mUserRole;
   var $mErrorMessage;
   var $mViewBy;
	var $mSiaServer;
   
   /**
    * DisplayViewUser::DisplayViewUser
    * Constructor for DisplayViewUser class
    *
    * @param $configObject object Configuration
    * @param $securityObj  object Security
    * @param $userId       integer user id
    * @param $userRole     integer user role
    * @return void
    */
   function DisplayEditSma(&$configObject, $securityObj, $userId, $userRole, $viewBy, $siaServer) 
   {
      DisplayBaseFull::DisplayBaseFull($configObject, $securityObj);      
      
      //set template untuk error dan empty box DisplayBase::SetErrorAndEmptyBox
      $this->SetErrorAndEmptyBox();
		if ($siaServer == "") {
			$this->mSiaServer = $this->mrUserSession->GetProperty("ServerServiceAddress");
		} else {
			$this->mSiaServer = $siaServer;
		}
      
      $this->mSiregService = new UserSiregService($this->mrUserSession->GetProperty("SiregServiceAddress"));
	  
      $this->mUserService = new UserClientService($this->mSiaServer, false, $userId);
      if($this->mUserService->IsError()) {
         $this->mErrorMessage .= $this->mUserService->GetProperty("ErrorMessages");
      }else{
         $this->mUserService->SetProperty("UserRole", $userRole );
      }
      
      
      $this->mUserId = $userId;
      $this->mUserRole = $userRole;
      $this->mViewBy = $viewBy;
      
      $this->SetTemplateBasedir($configObject->GetValue('app_module') . 'user/templates/');
      $this->SetTemplateFile('view_edit_sma.html');
   }
   
   /**
    * DisplayViewUser::Display
    * Parsing data to template
    *
    * @param 
    * @return void
    */
   function Display() 
   {
      //DisplayBaseFull::Display("[ Logout ]");            
      $this->AddVar("content", "URL_PROCESS", $this->mrConfig->GetURL('user', 'sma', 'edit'));
      if ($this->mUserRole != 1 && $this->mUserRole != 2){
         $this->mErrorMessage .= "User role tidak sesuai.";
         $this->ShowErrorBox("NONE");
      }else{
         if ($this->mUserRole == 1){
            $this->AddVar("content", "BIODATA_NIM", $this->mUserId);   
         } else if ($this->mUserRole == 2) {
            $this->AddVar("data_biodata", "BIODATA_NIP", $this->mUserId);   
         }
         
         //simpan
         if(!empty($_POST['simpan'])) {
			 
			if($_POST['sma_kode']=='')
				$sma_kode = 'NULL';
			else
				$sma_kode = $_POST['sma_kode'];
				
			if($_POST['jurusan_slta']=='')
				$jurusan_id = 'NULL';
			else
				$jurusan_id = $_POST['jurusan_slta'];
			
			$tgl = explode('/',$_POST['tanggal_ijazah_slta']);
			$tgl_ijazah = $tgl[2].'-'.$tgl[1].'-'.$tgl[0];
			            
            $this->mUserService->UpdateDataSma($sma_kode,$jurusan_id,$_POST['nomor_ijazah_slta'],$_POST['nem'],$_POST['tahun_lulus_slta'],$tgl_ijazah,$_POST['status_pindahan'],$this->mUserId);
            header("Location: " . $this->mrConfig->GetURL('user','sma','view'). '&err='. $errMsg);
            exit;
         }
         
         $biodata = $this->mSiregService->GetDataSma($this->mUserId);
		$referensi = $this->mSiregService->GetListReferensiSma();//print_r($biodata);print_r($referensi);die;
		//echo "<pre>";print_r($this->mUserService); echo "</pre>";
		$this->DoUpdateServiceStatus($this->mUserService, $biodata, 'SIA');
		if (false === $biodata){            
			$this->mErrorMessage .= $this->mUserService->GetProperty("ErrorMessages");
				if ($this->mUserService->GetProperty("FaultMessages")==""){
				$this->mErrorMessage .= "<br />".$this->mUserService->GetProperty("FaultMessages");
			}
			$this->ShowErrorBox();
		} else {
			if(isset($biodata[1])){
				$riwayat = &$biodata[1];
				for($i=0,$m=count($riwayat);$i<$m;++$i){
					$this->AddVar("data_riwayat", "RIWAYAT_NO", ($i+1));  
					$this->AddVar("data_riwayat", "RIWAYAT_JENJANG_NAMA", $riwayat[$i]['jenjang_nama']);   
					$this->AddVar("data_riwayat", "RIWAYAT_JENJANG_ID", $riwayat[$i]['jenjang_id']);
					$this->AddVar("data_riwayat", "RIWAYAT_NAMA_PENDIDIKAN", $riwayat[$i]['nama_pendidikan']);   
					$this->AddVar("data_riwayat", "RIWAYAT_TAHUN_LULUS", $riwayat[$i]['tahun_lulus']);
					$this->mTemplate->ParseTemplate('data_riwayat', 'a');
				}
				unset($biodata[1]);
			}
			$tahunSekarang = date('Y')+1;
			
			$val = $this->translateToKey($biodata[0]["is_lulus_smta"], 's', 'checked');
			$biodata[0]["is_lulus_smta_checked" . $val[0]] = $val[1];
			
			$selected = array('field' => 'id', 'value' => $biodata[0]["id_status_smta"]);
			$this->fillCombo('data_status_smta', $referensi['status_smta'], $selected);
			
			$selected['value'] = $biodata[0]["id_jurusan_smta"];
			$this->fillCombo('data_jurusan_smta', $referensi['jurusan_smta'], $selected);
			
			$selected['value'] = $biodata[0]["id_jenis_smta"];
			$this->fillCombo('data_jenis_smta', $referensi['jenis_smta'], $selected);
			
			$selected['value'] = $biodata[0]["kelas_masuk_smta"];
			$this->fillCombo('data_kelas_masuk_smta', $referensi['kelas_masuk_smta'], $selected);
			
			$selected['value'] = $biodata[0]["id_akreditasi"];
			$this->fillCombo('data_akreditasi', $referensi['akreditasi'], $selected);
			
			$selected['value'] = $biodata[0]["id_propinsi_smta"];
			$this->fillCombo('data_propinsi', $referensi['propinsi'], $selected);
			
			$selected['value'] = '';
			$this->fillCombo('data_pendidikan_pra', $referensi['pendidikan_pra'], $selected);
			
			
			$tglIjasah = explode('-', $biodata[0]["tgl_ijazah_smta"]);
			$this->fillComboDate('data_tanggal_ijasah', $tglIjasah, $tahunSekarang - 15, $tahunSekarang);
			
			for($i=$tahunSekarang,$m=($tahunSekarang - 20);$i>$m;--$i){
				$dt = array('value' => $i, 'label' => $i . '/' . ($i+1));
				$this->fillComboManual('data_tahun_daftar', $dt, $biodata[0]["tahun_daftar_smta"]);
				$this->fillComboManual('data_tahun_lulus', $dt, $biodata[0]["tahun_lulus_smta"]);
				$this->fillComboManual('data_tahun_lulus_pra', $dt);
			}
			
			$this->AddVar("data_biodata", "URL_PROCESS", $this->mrConfig->GetURL('user','user','process').
				"&sia=".$this->mrConfig->Enc($this->mSiaServer));
			$this->AddVar("data_biodata", "URL_KEMBALI", $this->mrConfig->GetURL('user','sma','view'));
			$this->AddVar("data_biodata", "URL_SMTA", $this->mrConfig->GetURL('user','smta','view'));
			
			$this->AddVar("data_biodata", "INFO_AVAILABLE", "YES");   
			$this->ParseData("data_biodata", $biodata, "");
		}
		}
            
		DisplayBaseFull::Display("[ Logout ]");            
      $this->DisplayTemplate();
   }
   
   function ShowErrorBox($infoavailable = "NO") {
      $this->AddVar("error_box", "ERROR_MESSAGE",  
            $this->ComposeErrorMessage("Pengambilan data tidak berhasil." , $this->mErrorMessage));   
      $this->AddVar("data_profile", "INFO_AVAILABLE", $infoavailable);   
      $this->SetAttribute('error_box', 'visibility', 'visible');
   }
   
   function translateToKey($res, $key, $value){
		$res = strtolower(substr($res,0,1));
		if($res == $key)return array('1', $value);
		else return array('2', $value);
   }
   
   function fillCombo($template, $res, $selected=array('field'=>'', 'value')){
		if(!empty($res)){
			$field = $selected['field'];
			$selected = strtolower($selected['value']);
			for($i=0,$m=count($res);$i<$m;++$i){
				$this->AddVar($template, "VALUE", $res[$i]['id']);
				$this->AddVar($template, "LABEL", $res[$i]['name']);
				if(strtolower($res[$i][$field]) == $selected){
					$this->AddVar($template, "SELECTED", 'selected');
					$ret = $res[$i]['id'];
				}else $this->AddVar($template, "SELECTED", '');
				$this->mTemplate->ParseTemplate($template, 'a');
			}
			return $ret;
		}
   }
   
   function fillComboDate($template, $selected, $tahunAwal = 1920, $tahunAkhir = 2000){
		$tglTemplate = $template;
		$blnTemplate = str_replace('tanggal', 'bulan', $template);
		$thnTemplate = str_replace('tanggal', 'tahun', $template);
		for($i=1;$i<13;++$i){
			$dt = array('value' => $i, 'label' => $i);
			$this->fillComboManual($tglTemplate, $dt, $selected[2]);
			$this->fillComboManual($blnTemplate, $dt, $selected[1]);
		}
		for($i=13;$i<32;++$i){
			$dt = array('value' => $i, 'label' => $i);
			$this->fillComboManual($tglTemplate, $dt, $selected[2]);
		}
		for($i=$tahunAwal;$i<$tahunAkhir;++$i){
			$dt = array('value' => $i, 'label' => $i);
			$this->fillComboManual($thnTemplate, $dt, $selected[0]);
		}
   }
   
   function fillComboManual($template, $data, $selected=''){
		$this->AddVar($template, "VALUE", $data['value']);
		$this->AddVar($template, "LABEL", $data['label']);
		if($data['value'] == $selected)$this->AddVar($template, "SELECTED", 'selected');
		else $this->AddVar($template, "SELECTED", '');
		$this->mTemplate->ParseTemplate($template, 'a');
   }
}

?>
