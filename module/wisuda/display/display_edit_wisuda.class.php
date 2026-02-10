<?php
set_time_limit(0);
class DisplayEditWisuda extends DisplayBaseFull 
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
   function DisplayEditWisuda(&$configObject, $securityObj, $userId, $userRole, $viewBy, $siaServer) 
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
      
		$this->SetTemplateBasedir($configObject->GetValue('app_module') . 'wisuda/templates/');
		$this->SetTemplateFile('view_edit_wisuda.html');
   }
   
  
   function Display() { 
		//DisplayBaseFull::Display("[ Logout ]");            
		$this->AddVar("content", "URL_PROCESS","");
		$this->AddVar("data_biodata", "URL_KEMBALI", $this->mrConfig->GetURL('wisuda', 'daftar', 'view'));
   
		$this->AddVar("content", "BIODATA_NIM", $this->mUserId);
		$referensi = $this->mSiregService->GetListReferensiMahasiswa();
		
		$UserService 	= new UserClientService($this->mSiaServer, false, $this->mUserId);
		$biodata 		= $UserService->GetMwisudaMhs($this->mUserId);
		$totalipksks 	= $UserService->GetIpkSksMhs($this->mUserId);
		$ref_propinsi 	= $UserService->GetDataPropinsi();
		// $tgl_wisuda 	= $UserService->GetDataTglWisuda();
		$tgl_wisuda 	= $biodata[0]['tgl_wisuda'];
	
        if (empty($biodata)){            
            $this->mErrorMessage .= $this->mUserService->GetProperty("ErrorMessages");
            if ($this->mUserService->GetProperty("FaultMessages")==""){
               $this->mErrorMessage .= "<br />".$this->mUserService->GetProperty("FaultMessages");
            }
            $this->ShowErrorBox();
        }else {
			if (!empty($_GET['err'])){
				$this->ShowValidateBox($_GET['err']);
			}
			$this->AddVar("data_biodata", "URL_PROCESS", $this->mrConfig->GetURL('wisuda','wisuda','process')."&sia=".$this->mrConfig->Enc($this->mSiaServer));
			
			
			$tgl = explode(' ', $biodata[0]["tanggal_lahir"]);
			for($i=1;$i<13;++$i){
				if(strlen($i)<2){
					$i='0'.$i;
				}
				$dt = array('value' => $i, 'label' => $i);
				$this->fillComboManual('data_tanggal_lahir', $dt, $tgl[2]);
				$this->fillComboManual('data_bulan_lahir', $dt, $tgl[1]);
			}
			for($i=13;$i<32;++$i){
				$dt = array('value' => $i, 'label' => $i);
				$this->fillComboManual('data_tanggal_lahir', $dt, $tgl[2]);
			}
			$angkatahun = date("Y")-10;
			for($i=1960;$i<$angkatahun;++$i){
				$dt = array('value' => $i, 'label' => $i);
				$this->fillComboManual('data_tahun_lahir', $dt, $tgl[0]);
			}
			
			##tgl lulus
			$tgl_lulus = explode('-', $biodata[0]["TGL_LULUS"]);
			for($i=1;$i<13;++$i){
				if(strlen($i)<2){
					$i='0'.$i;
				}
				$dt = array('value' => $i, 'label' => $i);
				$this->fillComboManual('data_tanggal_lulus', $dt, $tgl_lulus[2]);
				$this->fillComboManual('data_bulan_lulus', $dt, $tgl_lulus[1]);
			}
			for($i=13;$i<32;++$i){
				$dt = array('value' => $i, 'label' => $i);
				$this->fillComboManual('data_tanggal_lulus', $dt, $tgl_lulus[2]);
			}
			$angkatahunlulus = date("Y");
			for($i=2000;$i<=$angkatahunlulus;++$i){
				$dt = array('value' => $i, 'label' => $i);
				$this->fillComboManual('data_tahun_lulus', $dt, $tgl_lulus[0]);
			}
			
			$toga = array(
				array(
					'value' => 'SS',
					'label' => 'SS (pb. 106, lp. 30, pt. 52)'
				),
				array(
					'value' => 'S',
					'label' => 'S (pb. 109, lp. 42, pt. 54)'
				),
				array(
					'value' => 'M',
					'label' => 'M (pb. 112, lp. 44, pt. 56)'
				),
				array(
					'value' => 'L',
					'label' => 'L (pb. 115, lp. 46, pt. 58)'
				),
				array(
					'value' => 'XL',
					'label' => 'XL (pb. 118, lp. 48, pt. 60)'
				),
				array(
					'value' => 'XXL',
					'label' => 'XXL (pb. 121, lp. 50, pt. 62)'
				),
				array(
					'value' => 'XXXL',
					'label' => 'XXXL (pb. 124, lp. 52, pt. 64)'
				),
				array(
					'value' => '5XL',
					'label' => '5XL'
				),
			);
			for($i=0;$i<count($toga);++$i){
				$dt = array('value' => $toga[$i]['value'], 'label' => $toga[$i]['label']);
				$this->fillComboManual('data_toga', $dt, $biodata[0]["ukuran_toga"]);
			}
			
			$utopi = array(
				array(
					'value' => '53',
					'label' => '53',
				),
				array(
					'value' => '54',
					'label' => '54',
				),
				array(
					'value' => '55',
					'label' => '55',
				),
				array(
					'value' => '56',
					'label' => '56',
				),
				array(
					'value' => '57',
					'label' => '57',
				),
				array(
					'value' => '58',
					'label' => '58',
				),
				array(
					'value' => '59',
					'label' => '59',
				),
			);
			for($i=0;$i<count($utopi);++$i){
				$dt = array('value' => $utopi[$i]['value'], 'label' => $utopi[$i]['label']);
				$this->fillComboManual('data_topi', $dt, $biodata[0]["ukuran_topi"]);
			}
			
		// echo"<pre>";
		// echo"<br>";
		// echo $this->mrConfig->mValue['baseaddress'];
		// $referensi=array("aaa","bbbb","bbvvvv");
		// print_r($tgl_wisuda);
		// print_r($_GET);
		// print_r($biodata);
		// print_r($this->mrConfig->mValue);
		// echo"</pre>";
		// die;
			
			
			$biodata[0]['sks'] = $totalipksks[0]['totol_sks'];
			$biodata[0]['ipk'] = $totalipksks[0]['ipk'];
			$tgl_wisuda_indo = explode('-', $tgl_wisuda);
			$biodata[0]['tgl_wisuda'] = $tgl_wisuda;
			$biodata[0]['tgl_wisuda_indo'] = $tgl_wisuda_indo[2].'-'.$tgl_wisuda_indo[1].'-'.$tgl_wisuda_indo[0];
            $this->AddVar("data_biodata", "INFO_AVAILABLE", "YES");   
			$this->mTemplate->AddVars("data_biodata", $biodata[0]);
			// $this->AddVar("data_biodata", "URL_UPLOAD_FOTO", $this->mrConfig->GetURL('home', 'foto', 'proses'));
			$this->AddVar("data_biodata", "URL_UPLOAD_FOTO_WISUDA", $this->mrConfig->mValue['baseaddress'].'module/wisuda/edit_upload.php');
		    $this->AddVar("data_biodata", "FILE_FOTO", $this->mrConfig->GetURL('home', 'foto', 'view'));
			
			#koneksi ftp 
			// $remote_dir 	= '/nfs/pmai/kerjasama/';
			// $ftp_server 	= '192.168.0.24';
			// $ftp_username 	= 'cecep';
			// $ftp_userpass 	= 'GPxgLJXxR4nFJ7cA';
			// $filename 		= "ftp://".$ftp_username.":".$ftp_userpass."@".$ftp_server.":2120".$remote_dir;
			// $this->AddVar("data_biodata", "IMG_SRC", $filename);
			$this->AddVar("data_biodata", "IMG_SRC", $this->mrConfig->mValue['baseaddress'].'module/wisuda/upload/'.$biodata[0]['foto']);
			
            $this->mTemplate->ParseTemplate('data_biodata', 'a');
        }

		DisplayBaseFull::Display("[ Logout ]");            
		$this->DisplayTemplate();
	}
   
   function ShowErrorBox($infoavailable = "NO") {
		$this->AddVar("error_box", "ERROR_MESSAGE",$this->ComposeErrorMessage("Pengambilan data profil tidak berhasil." , $this->mErrorMessage));   
		$this->AddVar("data_profile", "INFO_AVAILABLE", $infoavailable);   
		$this->SetAttribute('error_box', 'visibility', 'visible');
	}
	
	function ShowValidateBox($ket) {
		$this->AddVar("error_box", "ERROR_MESSAGE",$this->ComposeErrorMessage($ket , $this->mErrorMessage));   
		$this->AddVar("data_profile", "INFO_AVAILABLE", "NO");   
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
