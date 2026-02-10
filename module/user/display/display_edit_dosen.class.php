<?php
set_time_limit(0);
class DisplayEditDosen extends DisplayBaseFull 
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
   function DisplayEditDosen(&$configObject, $securityObj, $userId, $userRole, $viewBy, $siaServer) 
   {
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
      
      $this->mSiregService = new UserSiregService($this->mrUserSession->GetProperty("SiregServiceAddress"));
      
      $this->mUserId = $userId;
      $this->mUserRole = $userRole;
      $this->mViewBy = $viewBy;
      
      $this->SetTemplateBasedir($configObject->GetValue('app_module') . 'user/templates/');
      $this->SetTemplateFile('view_edit_dosen.html');
   }
   
  
   function Display() 
   {
      //DisplayBaseFull::Display("[ Logout ]");            
      $this->AddVar("content", "URL_PROCESS", $this->mrConfig->GetURL('user', 'biodata', 'edit'));
      $this->AddVar("data_biodata", "URL_KEMBALI", $this->mrConfig->GetURL('user', 'profile', 'view'));
      if ($this->mUserRole != 2){
         $this->mErrorMessage .= "User role tidak sesuai.";
         $this->ShowErrorBox("NONE");
      }else{
		$this->AddVar("content", "BIODATA_NIM", $this->mUserId);
		$referensi = $this->mSiregService->GetListReferensiMahasiswa();
         $biodata = $this->mUserService->GetBiodataDosen($this->mUserId);//print_r($biodata);die;
		 // echo "<pre>";print_r($biodata); echo "</pre>";
		 $this->DoUpdateServiceStatus($this->mUserService, $biodata, 'SIA');
         if (empty($biodata)){            
            $this->mErrorMessage .= $this->mUserService->GetProperty("ErrorMessages");
            if ($this->mUserService->GetProperty("FaultMessages")==""){
               $this->mErrorMessage .= "<br />".$this->mUserService->GetProperty("FaultMessages");
            }
            $this->ShowErrorBox();
         } else {
			$this->AddVar("data_biodata", "URL_PROCESS", $this->mrConfig->GetURL('user','user','process')."&sia=".$this->mrConfig->Enc($this->mSiaServer));
			$this->AddVar("data_biodata", "URL_COMBO", $this->mrConfig->GetURL('user','update_combo','view'));
			
			$selected['value'] = $biodata[0]["MHS_PROP_TINGGAL"];
			$propTinggal = $this->fillCombo('data_propinsi_tinggal', $referensi['propinsi'], $selected);
			
			$selected['value'] = $biodata[0]["PROP_LAHIR"];
			$propLahir = $this->fillCombo('data_propinsi_lahir', $referensi['propinsi'], $selected);
			
			$selected['value'] = $biodata[0]["mhs_gol_darah"];
			$this->fillCombo('data_golongan_darah', $referensi['golongan_darah'], $selected);
			
			
			if(!empty($biodata[0]["PROP_LAHIR"])){
				$arg = array('mode' => 'kota', 'arg' => $propTinggal);
				$refKota = $this->mSiregService->GetReference($arg);
				$selected['value'] = $biodata[0]["mhs_kota"];
				$this->fillCombo('data_kota_tinggal', $refKota, $selected);
			}
			if(!empty($biodata[0]["PROP_LAHIR"])){
				$arg = array('mode' => 'kota', 'arg' => $biodata[0]["PROP_LAHIR"]);
				$refKota = $this->mSiregService->GetReference($arg);
				$selected['value'] = $biodata[0]["KOTA_LAHIR"];
				$this->fillCombo('data_kota_lahir', $refKota, $selected);
			}
			
			$tgl = explode('-', $biodata[0]["TGL_LAHIR"]);
			for($i=1;$i<13;++$i){
				$dt = array('value' => $i, 'label' => $i);
				$this->fillComboManual('data_tanggal_lahir', $dt, $tgl[2]);
				$this->fillComboManual('data_bulan_lahir', $dt, $tgl[1]);
			}
			for($i=13;$i<32;++$i){
				$dt = array('value' => $i, 'label' => $i);
				$this->fillComboManual('data_tanggal_lahir', $dt, $tgl[2]);
			}
			for($i=1930;$i<2000;++$i){
				$dt = array('value' => $i, 'label' => $i);
				$this->fillComboManual('data_tahun_lahir', $dt, $tgl[0]);
			}
			
            $this->AddVar("data_biodata", "INFO_AVAILABLE", "YES");   
			$this->mTemplate->AddVars("data_biodata", $biodata[0]);
			$this->AddVar("data_biodata", "URL_UPLOAD_FOTO", $this->mrConfig->GetURL('home', 'foto', 'proses'));
		    $this->AddVar("data_biodata", "FILE_FOTO", $this->mrConfig->GetURL('home', 'foto', 'view'));
            $this->mTemplate->ParseTemplate('data_biodata', 'a');
	
         }
      }
  
		DisplayBaseFull::Display("[ Logout ]");            
      $this->DisplayTemplate();
   }
   
   function ShowErrorBox($infoavailable = "NO") {
      $this->AddVar("error_box", "ERROR_MESSAGE",  
            $this->ComposeErrorMessage("Pengambilan data profil tidak berhasil." , $this->mErrorMessage));   
      $this->AddVar("data_profile", "INFO_AVAILABLE", $infoavailable);   
      $this->SetAttribute('error_box', 'visibility', 'visible');
   }
   
   function translateToKey($res, $key, $value){
		$res = strtolower(substr($res,0,1));
		if($res == $key)return array('1', $value);
		else return array('2', $value);
   }
   
   // function fillCombo($template, $res, $selected=array('field'=>'', 'value')){
   function fillCombo($template, $res, $selected){
		if(!empty($res)){
			$field = $selected['field'];
			$selected = strtolower($selected['value']);
			for($i=0,$m=count($res);$i<$m;++$i){
				$this->AddVar($template, "VALUE", $res[$i]['id']);
				$this->AddVar($template, "LABEL", $res[$i]['name']);
				if(strtolower($res[$i]['id']) == $selected){
					$this->AddVar($template, "SELECTED", 'selected');
					$ret = $res[$i]['id'];
				}else $this->AddVar($template, "SELECTED", '');
				$this->mTemplate->ParseTemplate($template, 'a');
			}
			return $ret;
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
