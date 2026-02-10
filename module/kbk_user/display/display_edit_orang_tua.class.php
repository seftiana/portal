<?php
set_time_limit(0);
class DisplayEditOrangTua extends DisplayBaseFull 
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
   function DisplayEditOrangTua(&$configObject, $securityObj, $userId, $userRole, $viewBy, $siaServer) 
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
      $this->SetTemplateFile('view_edit_orang_tua.html');
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
      $this->AddVar("content", "URL_PROCESS", $this->mrConfig->GetURL('user', 'orang_tua', 'edit'));
      if ($this->mUserRole != 1 && $this->mUserRole != 2){
         $this->mErrorMessage .= "User role tidak sesuai.";
         $this->ShowErrorBox("NONE");
      }else{
         $this->AddVar("content", "BIODATA_NIM", $this->mUserId);
         
         $biodata = $this->mSiregService->GetDataOrangTua($this->mUserId);//print_r($biodata);die;
		$referensi = $this->mSiregService->GetListReferensiOrangTua();
		//echo "<pre>";print_r($this->mUserService); echo "</pre>";
		$this->DoUpdateServiceStatus($this->mUserService, $biodata, 'SIA');
		if (false === $biodata){            
			$this->mErrorMessage .= $this->mUserService->GetProperty("ErrorMessages");
				if ($this->mUserService->GetProperty("FaultMessages")==""){
				$this->mErrorMessage .= "<br />".$this->mUserService->GetProperty("FaultMessages");
			}
			$this->ShowErrorBox();
		} else {
			$this->AddVar("data_biodata", "URL_PROCESS", $this->mrConfig->GetURL('user','user','process').
				"&sia=".$this->mrConfig->Enc($this->mSiaServer));
			$this->AddVar("data_biodata", "URL_COMBO", $this->mrConfig->GetURL('user','update_combo','view'));
			
			$selected = array('field' => 'id', 'value' => $biodata[0]["ortu_agama_id"]);
			$this->fillCombo('data_ortu_agama', $referensi['agama'], $selected);
			
			$selected['value'] = $biodata[0]["ortu_warga_negara_id"];
			$this->fillCombo('data_ortu_warga_negara', $referensi['warga_negara'], $selected);
			
			$selected['value'] = $biodata[0]["ortu_propinsi"];
			$this->fillCombo('data_ortu_propinsi', $referensi['propinsi'], $selected);
			
			$selected['value'] = $biodata[0]["wali_propinsi"];
			$this->fillCombo('data_wali_propinsi', $referensi['propinsi'], $selected);
			
			$selected['value'] = $biodata[0]["ortu_penghasilan"];
			$this->fillCombo('data_ortu_penghasilan', $referensi['penghasilan'], $selected);
			
			
			$selected['value'] = $biodata[0]["ortu_pendidikan_ayah"];
			$this->fillCombo('data_ayah_pendidikan', $referensi['pendidikan'], $selected);
			
			$selected['value'] = $biodata[0]["ortu_pendidikan_terakhir_ayah"];
			$this->fillCombo('data_ayah_pendidikan_terakhir', $referensi['pendidikan'], $selected);
			
			$selected['value'] = $biodata[0]["ortu_pekerjaan_ayah"];
			$this->fillCombo('data_ayah_pekerjaan', $referensi['pekerjaan'], $selected);
			
			
			$selected['value'] = $biodata[0]["ortu_pendidikan_ibu"];
			$this->fillCombo('data_ibu_pendidikan', $referensi['pendidikan'], $selected);
			
			$selected['value'] = $biodata[0]["ortu_pendidikan_terakhir_ibu"];
			$this->fillCombo('data_ibu_pendidikan_terakhir', $referensi['pendidikan'], $selected);
			
			$selected['value'] = $biodata[0]["ortu_pekerjaan_ibu"];
			$this->fillCombo('data_ibu_pekerjaan', $referensi['pekerjaan'], $selected);
			
			
			$selected['value'] = $biodata[0]["ortu_pendidikan_wali"];
			$this->fillCombo('data_wali_pendidikan', $referensi['pendidikan'], $selected);
			
			$selected['value'] = $biodata[0]["ortu_pendidikan_terakhir_wali"];
			$this->fillCombo('data_wali_pendidikan_terakhir', $referensi['pendidikan'], $selected);
			
			$selected['value'] = $biodata[0]["ortu_pekerjaan_wali"];
			$this->fillCombo('data_wali_pekerjaan', $referensi['pekerjaan'], $selected);

			$biodata[0]["ortu_ayah_meninggal"] = (int)$biodata[0]["ortu_ayah_meninggal"];
			$val = $this->translateToKey($biodata[0]["ortu_ayah_meninggal"], '1', 'checked');
			$biodata[0]["CHECKED_AYAH" . $val[0]] = $val[1];

			$biodata[0]["ortu_ibu_meninggal"] = (int)$biodata[0]["ortu_ibu_meninggal"];
			$val = $this->translateToKey($biodata[0]["ortu_ibu_meninggal"], '1', 'checked');
			$biodata[0]["CHECKED_AYAH" . $val[0]] = $val[1];
			
			$val = $this->translateToKey($biodata[0]["ortu_mampu"], '1', 'checked');
			$biodata[0]["CHECKED_MAMPU" . $val[0]] = $val[1];
			
			$biodata[0]["ortu_wali_meninggal"] = (int)$biodata[0]["ortu_wali_meninggal"];
			$val = $this->translateToKey($biodata[0]["ortu_wali_meninggal"], '1', 'checked');
			$biodata[0]["CHECKED_WALI" . $val[0]] = $val[1];
			
			
			$ayahLahir = explode('-', $biodata[0]["ortu_tgl_lahir_ayah"]);
			$this->fillComboDate('data_ayah_tanggal_lahir', $ayahLahir);
			
			$ibuLahir = explode('-', $biodata[0]["ortu_tgl_lahir_ibu"]);
			$this->fillComboDate('data_ibu_tanggal_lahir', $ibuLahir);
			
			$waliLahir = explode('-', $biodata[0]["ortu_tgl_lahir_wali"]);
			$this->fillComboDate('data_wali_tanggal_lahir', $waliLahir);
			
			$matiAyah = explode('-', $biodata[0]["ortu_tgl_ayah_meninggal"]);
			$this->fillComboDate('data_ayah_tanggal_meninggal', $matiAyah);
			
			$matiIbu = explode('-', $biodata[0]["ortu_tgl_ibu_meninggal"]);
			$this->fillComboDate('data_ibu_tanggal_meninggal', $matiIbu);
			
			$matiWali = explode('-', $biodata[0]["ortu_tgl_wali_meninggal"]);
			$this->fillComboDate('data_wali_tanggal_meninggal', $matiWali);
			
			if(!empty($biodata[0]["ortu_propinsi"])){
				$arg = array('mode' => 'kota', 'arg' => $biodata[0]["ortu_propinsi"]);
				$refKota = $this->mSiregService->GetReference($arg);
				$selected['value'] = $biodata[0]["ortu_kota"];
				$this->fillCombo('data_kota_ortu', $refKota, $selected);
			}
			
			if(!empty($biodata[0]["wali_propinsi"])){
				$arg = array('mode' => 'kota', 'arg' => $biodata[0]["wali_propinsi"]);
				$refKota = $this->mSiregService->GetReference($arg);
				$selected['value'] = $biodata[0]["ortu_kota_wali"];
				$this->fillCombo('data_kota_wali', $refKota, $selected);
			}
			
			$this->AddVar("data_biodata", "URL_KEMBALI", $this->mrConfig->GetURL('user','orang_tua','view'));
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
   
   function fillComboManual($template, $data, $selected){
		$this->AddVar($template, "VALUE", $data['value']);
		$this->AddVar($template, "LABEL", $data['label']);
		if($data['value'] == $selected)$this->AddVar($template, "SELECTED", 'selected');
		else $this->AddVar($template, "SELECTED", '');
		$this->mTemplate->ParseTemplate($template, 'a');
   }
}

?>
