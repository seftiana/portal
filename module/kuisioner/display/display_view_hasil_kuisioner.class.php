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
	  if(isset($_GET['e']) && $this->mUserRole==3){
	  $resData = $objKuisionerService->GetHasilKuisioner('RAW');
	  $c = count($resData);
	  $str = implode('\n\r',$str);
	  Header("Content-Disposition: attachment; filename=export.csv");
	  echo "NO;PERTANYAAN;GRUP PERTANYAAN;PENGISI;FAKULTAS;JURUSAN;PROGRAM STUDI;SEMESTER;MATAKULIAH;DOSEN;BOBOT;\n";
	  for($i=0;$i<$c;$i++){
		echo ($i+1).';'.$resData[$i]['PERTANYAAN'].';'.$resData[$i]['GRUP_LABEL'].';'.$resData[$i]['USERID'].';'.$resData[$i]['FAKULTAS'].';'.$resData[$i]['JURUSAN'].';'.$resData[$i]['PRODI'].';'.$resData[$i]['SEMID'].';'.$resData[$i]['MATAKULIAH'].';'.$resData[$i]['NAMA_DOSEN'].';'.$resData[$i]['NILAI']." \n ";
	  }
	  die;
	  }elseif(isset($_GET['j']) && $this->mUserRole==3){
      $this->SetTemplateFile('view_sebaran_responden.html');
	  $resSebaran = $objKuisionerService->GetSebaranResponden();
		$c = count($resSebaran);
		if(!empty($resSebaran[$c-1])){
			$arrPrev = array_pop($resSebaran);
			$c--;
		}
		$tpGrup = $arrPrev[0]['FAK'];
		for($i=0;$i<$c;$i++){
		if($tpGrup != $arrPrev[$i]['FAK']){
			$prNilai[] = 'Array('.implode(',',$ptNilai).')';
			$tpGrup = $arrPrev[$i]['FAK'];
			$ptNilai = array();
		}
		$ptNilai[] = '\''.$arrPrev[$i]['JUMLAH'].'\'';
		}
			$prNilai[] = 'Array('.implode(',',$ptNilai).')';
			$prNilai = implode(',',$prNilai);
			$this->AddVar("data_prev_rerata", "DATA", $prNilai);
			
		$tmpGrup = $resSebaran[0]['FAK'];
		$rGrup[] = '\''.$resSebaran[0]['FAK'].'\'';
		for($i=0;$i<$c;$i++){
		if($tmpGrup != $resSebaran[$i]['FAK']){
			$rJur[] = 'Array('.implode(',',$tJur).')';
			$rNilai[] = 'Array('.implode(',',$tNilai).')';
			$rGrup[] = '\''.$resSebaran[$i]['FAK'].'\'';
			$tmpGrup = $resSebaran[$i]['FAK'];
			$tJur = array();
			$tNilai = array();
		}
		$tJur[] = '\''.$resSebaran[$i]['JUR'].'\'';
		$tNilai[] = '\''.$resSebaran[$i]['JUMLAH'].'\'';
		}
			$rJur[] = 'Array('.implode(',',$tJur).')';
			$rNilai[] = 'Array('.implode(',',$tNilai).')';
			$rJur = implode(',',$rJur);
			$rNilai = implode(',',$rNilai);
			$rGrup = implode(',',$rGrup);
			$this->AddVar("data_axis_label", "DATA", $rJur);
			$this->AddVar("data_rerata", "DATA", $rNilai);
			$this->AddVar("data_grup", "DATA", $rGrup);
			$this->AddVar("link_kembali", "LINK", $this->mrConfig->GetURL('home', 'home', 'view'));
			$this->AddVar("judul", "THNAJARAN", substr($resSebaran[0]['SEMID'],0,-1));
	  }else{
      $this->SetTemplateFile('view_hasil_kuisioner.html');
			$tipe = $mode = isset($_GET['m'])?$this->mrConfig->Dec(trim($_GET['m'])):'FAKULTAS';
			$det = isset($_GET['d'])?$this->mrConfig->Dec(trim($_GET['d'])):'';
			$isPD='false';
			$gTipe='\''+$this->mrConfig->Enc('1')+'\'';
			if($mode=='MATAKULIAH'){
				if($this->mUserRole==2)$det=$this->mUserId;
				elseif($this->mUserRole==3){
					$det=$this->mrConfig->Dec(trim($_GET['id']));
					if(!empty($det)){
						$this->AddVar("isAdminMK", "LINK_DOSEN", $this->mrConfig->GetURL('kuisioner', 'hasil_kuisioner', 'view').'&m='.$this->mrConfig->Enc('MATAKULIAH'));
						$this->AddVar("isAdminMK", "LABEL", "Lihat Semua");
					}else{
						$this->AddVar("isAdminMK", "LINK_DOSEN", $this->mrConfig->GetURL('kuisioner', 'daftar_dosen', 'view'));
						$this->AddVar("isAdminMK", "LABEL", "Lihat Per Dosen");
					}
				}
			}elseif($mode=='GROUP'&&$this->mUserRole==3){
				if(isset($_GET['g'])){
					if($_GET['g'][0]=='*'){
						$_GET['g']=substr($_GET['g'],1);
						$gTipe = $_GET['g'] - 2;
						if($gTipe<0)$gTipe=0;
					}else $gTipe = $this->mrConfig->Dec($_GET['g'])%3;
					$mode .= $gTipe;
					$gTipe++;
					$gTipe = '\''+$this->mrConfig->Enc($gTipe)+'\'';
				}else $mode .= '0';
				
				$isPD = 'true';
			}
		 $dataKuisioner = $objKuisionerService->GetHasilKuisioner($mode,$det);
		 //print_r($dataKuisioner);die;
         if(!empty($dataKuisioner)&&!empty($dataKuisioner[0])) {
			if($this->mUserRole==3){
				$this->SetAttribute('isAdmin', 'visibility', 'visible');
				$this->AddVar("isAdmin", "ISPD", $isPD);
				$this->AddVar("isAdmin", "GTIPE", $gTipe);
				$this->AddVar("isAdmin", "LINK_EXP", $this->mrConfig->GetURL('kuisioner', 'hasil_kuisioner', 'view').'&e=1');
				$this->AddVar("isAdmin", "GUP", $dataKuisioner[0]['GUP']);
			}
			$c = count($dataKuisioner);
			if(!empty($dataKuisioner[$c-1])){
				$arrPrev = array_pop($dataKuisioner);
				$c--;
				$tpGrup = $arrPrev[0]['GRUP'];
				$tpIns = $arrPrev[0][$mode];
				$j = count($arrPrev);
				for($a=0;$a<$j;$a++){
				if($tpGrup != $arrPrev[$a]['GRUP'] || $tpIns != $arrPrev[$a][$mode]){
					$pPId[] = 'Array('.implode(',',$tpPId).')';
					$pNilai[] = 'Array('.implode(',',$tpNilai).')';
					$pJml[] = 'Array('.implode(',',$tpJml).')';
					$tpPId = array();
					$tpNilai = array();
					$tpJml = array();
					$tpIns = $arrPrev[$a][$mode];
					$tpGrup = $arrPrev[$a]['GRUP'];
				}
				$tpPId[] = '\''.$arrPrev[$a]['ID_PERTANYAAN'].'\'';
				$tpNilai[] = '\''.$arrPrev[$a]['NILAI'].'\'';
				$tpJml[] = '\''.$arrPrev[$a]['JUMLAH'].'\'';
				}
				$pPId[] = 'Array('.implode(',',$tpPId).')';
				$pNilai[] = 'Array('.implode(',',$tpNilai).')';
				$pJml[] = 'Array('.implode(',',$tpJml).')';
				$pPId = implode(',',$pPId);
				$pNilai = implode(',',$pNilai);
				$pJml = implode(',',$pJml);
				
			}
			$tmpGrup = $dataKuisioner[0]['GRUP'];
			$tmpIns = $dataKuisioner[0][$mode];
			$rIns[] = '\''.$dataKuisioner[0][$mode].'\'';
			$tmpLink[] = '\''.$this->mrConfig->Enc($dataKuisioner[0][($mode.'KODE')]).'\'';
			$rGrup[] = '\''.$dataKuisioner[0]['GRUP_LABEL'].'\'';
			$rCount[] = '\''.count(explode(',',$dataKuisioner[0]['USERID'])).'\'';
			if(!empty($dataKuisioner[0]['IDMK']))$rIsMk[] = 1;
			else $rIsMk[] = 0;
			
			for($i=0;$i<$c;$i++){
			if($tmpGrup != $dataKuisioner[$i]['GRUP'] || $tmpIns != $dataKuisioner[$i][$mode]){
				$rPertanyaan[] = 'Array('.implode(',',$tPertanyaan).')';
				$rPId[] = 'Array('.implode(',',$tPId).')';
				$rNilai[] = 'Array('.implode(',',$tNilai).')';
				$rJml[] = 'Array('.implode(',',$tJml).')';
				$rGrup[] = '\''.$dataKuisioner[$i]['GRUP_LABEL'].'\'';
				$rIns[] = '\''.$dataKuisioner[$i][$mode].'\'';
				$rCount[] = '\''.count(explode(',',$dataKuisioner[$i]['USERID'])).'\'';
				$grJml[] = 'Array('.implode(',',$tgrJml).')';
				$tmpIns = $dataKuisioner[$i][$mode];
				if(!empty($dataKuisioner[$i]['IDMK']))$rIsMk[] = 1;
				else $rIsMk[] = 0;
				$tmpGrup = $dataKuisioner[$i]['GRUP'];
				$tmpLink[] = '\''.$this->mrConfig->Enc($dataKuisioner[$i][($mode.'KODE')]).'\'';
				$tPertanyaan = array();
				$tPId = array();
				$tNilai = array();
				$tJml = array();
			}
			$tPertanyaan[] = '\''.$dataKuisioner[$i]['PERTANYAAN'].'\'';
			$tPId[] = '\''.$dataKuisioner[$i]['ID_PERTANYAAN'].'\'';
			$tNilai[] = '\''.$dataKuisioner[$i]['NILAI'].'\'';
			$tJml[] = '\''.$dataKuisioner[$i]['JUMLAH'].'\'';
			$tgrJml [] = '\''.count(explode(',',$dataKuisioner[$i]['USERID'])).'\'';
			}
			$rPertanyaan[] = 'Array('.implode(',',$tPertanyaan).')';
			$rPId[] = 'Array('.implode(',',$tPId).')';
			$rNilai[] = 'Array('.implode(',',$tNilai).')';
			$rJml[] = 'Array('.implode(',',$tJml).')';
			$grJml[] = 'Array('.implode(',',$tgrJml).')';
			$rPertanyaan = implode(',',$rPertanyaan);
			$rPId = implode(',',$rPId);
			$rNilai = implode(',',$rNilai);
			$rJml = implode(',',$rJml);
			$grJml = implode(',',$grJml);
			$rGrup = implode(',',$rGrup);
			$rCount = implode(',',$rCount);
			$rIns = implode(',',$rIns);
			$rLink = implode(',',$tmpLink);
			$rIsMk = 'new Array('.implode(',',$rIsMk).')';
			$this->AddVar("data_axis_label", "DATA", $rPertanyaan);
			$this->AddVar("data_axis_id", "DATA", $rPId);
			$this->AddVar("data_rerata", "DATA", $rNilai);
			$this->AddVar("data_jumlah", "DATA", $rJml);
			$this->AddVar("data_count", "DATA", $rCount);
			$this->AddVar("data_grup", "DATA", $rGrup);
			$this->AddVar("data_instansi", "DATA", $rIns);
			$this->AddVar("data_link", "DATA", $rLink);
			$arrRoleViewMk = array(2,3);
			if(in_array($this->mUserRole,$arrRoleViewMk))$encMk = $this->mrConfig->Enc('MATAKULIAH');
			else $encMk = '';
			if($mode=='FAKULTAS')$rDest = '\''.$this->mrConfig->Enc('JURUSAN').'\',\''.$encMk.'\',\''.$this->mrConfig->Enc('GROUP').'\'';
			else $rDest = '\''.$this->mrConfig->Enc('FAKULTAS').'\',\''.$encMk.'\',\''.$this->mrConfig->Enc('GROUP').'\'';
			if(substr($mode,0,5)=='GROUP'&&$this->mUserRole==3){
				$this->AddVar("isAdmin", "GJML", $grJml);
			}
			$this->AddVar("data_dest", "DATA", $rDest);
			$this->AddVar("tipe_data", "DATA", $tipe);
			$this->AddVar("arr_data_matakuliah", "DATA", $rIsMk);
			$this->AddVar("judul", "THNAJARAN", substr($dataKuisioner[0]['SEMID'],0,-1));
			$this->AddVar("data_prev_axis_id", "DATA", $pPId);
			$this->AddVar("data_prev_rerata", "DATA", $pNilai);
			$this->AddVar("data_prev_jumlah", "DATA", $pJml);
			if($this->mUserRole)$this->AddVar("link_kembali", "LINK", $this->mrConfig->GetURL('home', 'home', 'view'));
			else $this->AddVar("link_kembali", "LINK", "./");
         } else header('location:'.$_SERVER['HTTP_REFERER']);
		}
      $this->DisplayTemplate();
   }
}
?>