<?php

class DisplayInputOrangtua extends DisplayBaseFull {
   var $mBeasiswaId;
	var $mOrangtuaId;
   var $mErrorMessage;

	function DisplayInputOrangtua(&$configObject, &$security, $beaId, $ortuId, $err) {
		DisplayBaseFull::DisplayBaseFull($configObject, $security);
      $this->mBeasiswaId = $beaId;    
      $this->mOrangtuaId = $ortuId;    
		$this->mErrorMessage = $err;
      $this->SetErrorAndEmptyBox();  
      $this->SetTemplateBasedir($configObject->GetValue('app_module') . 'schoolarship/templates/');
      $this->SetTemplateFile('input_orangtua.html');
	}
   
   function GetDataOrtu() {
      $ref = new Reference($this->mrConfig) ;
		$server = $ref->GetAllUnitData($this->mrConfig->GetValue('si_beasiswa'));
      $beasiswaServ = new SchoolarshipClientService($server[0]['service_address'], false);
		$data = $beasiswaServ->GetParentList($this->mrUserSession->GetProperty('UserReferenceId'), $this->mOrangtuaId);
      return $data;
   }
   
   function ShowKeteranganOrtu($keteranganId = '') {
      $arrKet[0]['id'] = '1';
      $arrKet[0]['nama'] = 'Ayah';
      $arrKet[1]['id'] = '2';
      $arrKet[1]['nama'] = 'Ibu';
      $arrKet[2]['id'] = '3';
      $arrKet[2]['nama'] = 'Wali';
      
      for ($i=0; $i<3; $i++) {
         if ($arrKet[$i]['id'] == $keteranganId) {
            $arrKet[$i]['selected'] = "selected";
         } else {
            $arrKet[$i]['selected'] = "";
         }
      }
      $this->ParseData('keterangan_ortu', $arrKet, 'KETORTU_');
   }
   
   function ShowPilihanTanggal($tgl, $bln, $thn) {
      // untuk buat tanggal 
      for($i=0; $i<31; $i++) {
         $tmp = $i+1;
         $arrTanggal[$i]['id'] = $tmp;
         $arrTanggal[$i]['nama'] = $tmp;
         if ($tmp == $tgl) {
            $arrTanggal[$i]['selected'] = 'selected';
         } else {
            $arrTanggal[$i]['selected'] = '';
         }
      }
      $this->ParseData('tgl', $arrTanggal, 'TANGGAL_');
      
      // untuk buat bulan
      $arrTanggal= null;
      for($i=0; $i<12; $i++) {
         $tmp = $i+1;
         $arrTanggal[$i]['id'] = $tmp;
         if ($tmp == $bln) {
            $arrTanggal[$i]['selected'] = 'selected';
         } else {
            $arrTanggal[$i]['selected'] = '';
         }
      }
      $arrTanggal[0]['nama'] = "Januari";
      $arrTanggal[1]['nama'] = "Februari";
      $arrTanggal[2]['nama'] = "Maret";
      $arrTanggal[3]['nama'] = "April";
      $arrTanggal[4]['nama'] = "Mei";
      $arrTanggal[5]['nama'] = "Juni";
      $arrTanggal[6]['nama'] = "Juli";
      $arrTanggal[7]['nama'] = "Agustus";
      $arrTanggal[8]['nama'] = "September";
      $arrTanggal[9]['nama'] = "Oktober";
      $arrTanggal[10]['nama'] = "November";
      $arrTanggal[11]['nama'] = "Desember";
      $this->ParseData('bln', $arrTanggal, 'BULAN_');
      
      // untuk buat tahun
      $arrTanggal= null;
      for($i=0; $i<70; $i++) {
         $tmp = date('Y') - $i;
         $arrTanggal[$i]['id'] = $tmp;
         $arrTanggal[$i]['nama'] = $tmp;
         if ($tmp == $thn) {
            $arrTanggal[$i]['selected'] = 'selected';
         } else {
            $arrTanggal[$i]['selected'] = '';
         }
      }
      $this->ParseData('thn', $arrTanggal, 'TAHUN_');
   }
   
   function Display() {
      DisplayBaseFull::Display('[ Logout ]');
      if ($this->mErrorMessage != "") {
         if ($this->mErrorMessage == "nama") {
            $errMsg= "Nama Orang tua tidak boleh kosong";
         } elseif ($this->mErrorMessage == "pekerjaan") {
            $errMsg= "Data Pekerjaan tidak boleh kosong";
         }
         $this->AddVar("error_box", "ERROR_MESSAGE",  $errMsg);   
         $this->SetAttribute('error_box', 'visibility', 'visible');
      }
      if ($this->mOrangtuaId != "") {
         $dataOrtu = $this->GetDataOrtu();
         if ($dataOrtu[0]['status'] == "Y") {
            $dataOrtu[0]['HIDUP'] = '';
            $dataOrtu[0]['MENINGGAL'] = 'checked';
         } else {
            $dataOrtu[0]['HIDUP'] = 'checked';
            $dataOrtu[0]['MENINGGAL'] = '';
         }
         $temp = explode('-', $dataOrtu[0]['tgl_meninggal']);
         $tanggal = $temp[2];
         $bulan = $temp[1];
         $tahun = $temp[0];
         $ketKeluarga = $dataOrtu[0]['ket_keluarga'];
         $dataOrtu[0]['act'] = 'updateOrtu';
         $dataOrtu[0]['id_ortu'] = $this->mrConfig->Enc($dataOrtu[0]['id_ortu']);
         
         
      } else {
         $tanggal = date('d');
         $bulan = date('m');
         $tahun = date('Y');
         $ketKeluarga = '';
         $this->AddVar('content', 'ORTU_HIDUP', 'checked');
         $this->AddVar('content', 'ORTU_ACT', 'insertOrtu');
      }
      $this->ShowKeteranganOrtu();
      $this->ShowPilihanTanggal($tanggal, $bulan, $tahun);
      $this->addVar('content', 'URL_PROCESS', $this->mrConfig->GetURL('schoolarship', 'schoolarship', 'process') . 
         '&bea=' . $this->mrConfig->Enc($this->mBeasiswaId)) ;
      if (!empty($dataOrtu)) {
         $this->ParseData('content', $dataOrtu, 'ORTU_');
      }
      $this->DisplayTemplate();
   }
}
?>