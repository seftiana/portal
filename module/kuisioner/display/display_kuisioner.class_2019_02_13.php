<?php
class DisplayKuisioner extends DisplayBaseNoLinks {
   
   var $mErrorMessage;
   var $mNiu;
   var $mServiceServer;
   var $mWaktu; //add ccp 23-10-2018
   
   function DisplayKuisioner(&$configObject, &$security, $niu, $sia, $errMsg, $waktu) { //update ccp 23-10-2018
      DisplayBaseNoLinks::DisplayBaseNoLinks($configObject, $security);
      $this->mErrorMessage = $errMsg;
      $this->mNiu = $niu;
      $this->mServiceServer = $sia;
      $this->mWaktu = $waktu; //add ccp 23-10-2018
         
      $this->SetErrorAndEmptyBox();
      $this->SetTemplateBasedir($configObject->GetValue('app_module') . 'kuisioner/templates/');
      $this->SetTemplateFile('view_kuisioner.html');
   }
   
   function Display() {
	  if(isset($_POST['btnSkip'])){
		header("Location: ". $this->mrConfig->GetURL('home', 'home', 'view'));
		die;
	  }
	  DisplayBaseNoLinks::Display();
   
      if(empty($this->mServiceServer)) {
         $serverUsed = $this->mrUserSession->GetProperty("ServerServiceAddress");
         $this->mServiceServer = $serverUsed;
		 }
      else {
         $serverUsed = $this->mServiceServer;
	  }
		 if($this->mrUserSession->GetProperty('Role')!='1')$this->AddVar("isSkip", "NOTMHS", '1');
         $objKuisionerService = new KuisionerClientService($serverUsed, false, $this->mNiu);
		 $objKuisionerService->SetProperty("UserRole", $this->mrUserSession->GetProperty('Role') );
		 if(isset($_POST['t'])){
			$seq = (int)($_POST['t'])+1;
			if(isset($_POST['mk']) && !empty($_POST['mk'])){
				$_SESSION['jwbn']['mk'] = $_POST['mk'];
				$_SESSION['jwbn']['komentar_dosen'] = $_POST['komentar_dosen']; //add ccp 6-10-2018
			}else{ 
				$_SESSION['jwbn']['lain'][] = $_POST['jwbn'];
				$_SESSION['jwbn']['komentar'] = $_POST['jwbnKomentar']; //add ccp 6-10-2018
			}
		 } else	{
			$seq = 0;
			$this->mTemplate->setAttribute('welcome','visibility','visible');
		 }
		 $this->AddVar("option_form", "SEQ", $seq);
		 $dataKuisioner = $objKuisionerService->GetKuisionerBySequence($seq,$this->mWaktu); //update ccp 23-10-2018
		 $countData = count($dataKuisioner);
		 if(!empty($dataKuisioner[0][0]['ID_MK'])){
		 $dataMk = $dataKuisioner[0];
		 array_splice($dataKuisioner,0,1);
		 }
		$dataKuisionerTtl = $objKuisionerService->GetKuisionerTtl(); #add ccp 2-10-2018
		$countKuisinonerTtl = count($dataKuisionerTtl)-1; #add ccp 2-10-2018
         if(!empty($dataKuisioner[0]['ID_PERTANYAAN'])) {
			$this->ClearTemplate('mk_list');
			$this->ClearTemplate('mk_label');
			#add ccp 2-10-2018
			$this->ClearTemplate('mk_label_k');
			$this->ClearTemplate('mk_label_k2');
			#
			$sortedDataKuisioner = array();
			foreach($dataKuisioner as $data){
				$sortedDataKuisioner[$data['GRUP']][$data['JAWABAN']][] = array(
				'PERTANYAAN'=>$data['PERTANYAAN'],
				'ID_PERTANYAAN'=>$data['ID_PERTANYAAN'],
				'ID_JAWABAN'=>$data['ID_JAWABAN']
				);
			}
			$c = count($dataMk);
			if($c>0){
				$this->AddVar("option_form", "ID_MK", $this->mrConfig->Enc($dataMk[0]['ID_MK']).'|'.$this->mrConfig->Enc($dataMk[0]['NIP_DOSEN']));
				$this->AddVar("mk_label", "MKNAMA", '\''.$dataMk[0]['NAMA_MK'].' - '.$dataMk[0]['NAMA_KELAS'].' : '.$dataMk[$i]['NAMA_DOSEN'].'\'');
			for($i=1;$i<$c;$i++){
				$this->AddVar("mk_list", "ID_MK", $this->mrConfig->Enc($dataMk[$i]['ID_MK']).'|'.$this->mrConfig->Enc($dataMk[$i]['NIP_DOSEN']));
				$this->AddVar("mk_list", "MKNAMA", $dataMk[$i]['NAMA_MK'].' - '.$dataMk[$i]['NAMA_KELAS'].' : '.$dataMk[$i]['NAMA_DOSEN']);
				$this->AddVar("mk_list", "PERTANYAAN_KOM", 'Isi Komentar Untuk Dosen '.$dataMk[$i]['NAMA_DOSEN']);// add ccp 4-10-2018
				$this->AddVar("mk_list", "ID_PERTANYAAN_KT", $this->mrConfig->Enc($dataMk[$i]['ID_MK']).'|'.$this->mrConfig->Enc($dataMk[$i]['NIP_DOSEN']));// add ccp 4-10-2018
				$this->AddVar("mk_list", "VKD", '1'); // add ccp 4-10-2018
				$this->mTemplate->parseTemplate('mk_list', "a");
			}
			#add ccp 2-10-2018
				$this->AddVar("option_komentar_dosen", "COMD", 'Y');
				$this->AddVar("mk_label_k", "PERTANYAAN_KOM", 'Isi Komentar Untuk Dosen '.$dataMk[0]['NAMA_DOSEN']);
				$this->AddVar("mk_label_k2", "ID_PERTANYAAN_KT", $this->mrConfig->Enc($dataMk[0]['ID_MK']).'|'.$this->mrConfig->Enc($dataMk[0]['NIP_DOSEN']));
			#end
			}
			$no = 1;
			foreach($sortedDataKuisioner as $grup=>$dataKuisionerJawaban){
				$this->AddVar("content", "GRUP", $grup);
				$arrKey = array_keys($dataKuisionerJawaban);
				foreach($dataKuisionerJawaban as $jawaban=>$data){
					$jmlh = count($data);
					if($jmlh>1){
						$this->ClearTemplate('pertanyaan_list');
						$this->AddVar("option_table", "ISGRUP", 'YES');
						$tmpJawaban = explode('|', $jawaban);
						$tmpIdJawaban = explode('|', $data[0]['ID_JAWABAN']);
						$countRow = count($tmpJawaban);
						$this->AddVar("option_table", "JML_JAWABAN", $countRow);
						$this->AddVar("option_table", "JML_JAWABAN2", ($countRow+2));
						$this->ClearTemplate('jawaban_list');
						foreach($tmpJawaban as $dataJawaban){
							$this->AddVar("jawaban_list", "JAWABAN", $dataJawaban);
							$this->mTemplate->parseTemplate('jawaban_list', "a");
						}
						for($i=0;$i<$jmlh;$i++){
							$this->AddVar("pertanyaan_list", "NO", $no);
							$this->AddVar("pertanyaan_list", "PERTANYAAN", $data[$i]['PERTANYAAN']);
							$this->ClearTemplate('jawaban');
							for($j=0;$j<$countRow;$j++){
								$this->AddVar("jawaban", "ID_PERTANYAAN", $this->mrConfig->Enc($data[$i]['ID_PERTANYAAN']));
								$this->AddVar("jawaban", "ID_JAWABAN", $this->mrConfig->Enc($tmpIdJawaban[$j]));
								$this->mTemplate->parseTemplate('jawaban', "a");
							}
							$this->mTemplate->parseTemplate('pertanyaan_list', "a");
						$no++;
						}
						$this->mTemplate->parseTemplate('option_table', "a");
					} else {
						$this->ClearTemplate('pertanyaan_list_no_grup');
						$this->ClearTemplate('jawaban_no_grup');
						$this->AddVar("option_table", "ISGRUP", 'NO');
						$tmpJawaban = explode('|', $jawaban);
						$tmpIdJawaban = explode('|', $data[0]['ID_JAWABAN']);
						$countRow = count($tmpJawaban);
							$this->AddVar("pertanyaan_list_no_grup", "NO", $no);
							$this->AddVar("pertanyaan_list_no_grup", "PERTANYAAN", $data[0]['PERTANYAAN']);
							for($j=0;$j<$countRow;$j++){
								$this->AddVar("jawaban_no_grup", "LABEL_JAWABAN", $tmpJawaban[$j]);
								$this->AddVar("jawaban_no_grup", "ID_PERTANYAAN", $this->mrConfig->Enc($data[0]['ID_PERTANYAAN']));
								$this->AddVar("jawaban_no_grup", "ID_JAWABAN", $this->mrConfig->Enc($tmpIdJawaban[$j]));
								$this->mTemplate->parseTemplate('jawaban_no_grup', "a");
							}
							$this->mTemplate->parseTemplate('pertanyaan_list_no_grup', "a");
						$this->mTemplate->parseTemplate('option_table', "a");
						$no++;
					}
					# add ccp 2-10-2018
					if($countKuisinonerTtl == count($_SESSION['jwbn']['lain'])){
						$this->ClearTemplate('pertanyaan_list_komentar');
						$this->ClearTemplate('jawaban_no_grup_k');
						$this->AddVar("option_komentar", "ISCOMMENT", 'COMMENTY');
						$this->AddVar("pertanyaan_list_komentar", "NO", '1');
						$this->AddVar("pertanyaan_list_komentar", "PERTANYAAN", 'Isi Komentar Untuk Perbanas');
						$this->AddVar("jawaban_no_grup_ky", "ID_PERTANYAAN_KY", '1');
						$this->AddVar("validasi_kom", "VK", '1'); // add ccp 4-10-2018
					}
					#end
				}
			}
         } else {
			if(!empty($_SESSION['jwbn'])){
				$arrRes = array();
				if(!empty($_SESSION['jwbn']['mk'])){
					foreach($_SESSION['jwbn']['mk'] as $k => $tmp){
						$tid = explode('|',$k);
						$idMk = $this->mrConfig->Dec($tid[0]);
						$nip = $this->mrConfig->Dec($tid[1]);
						$tmp = explode(';',$tmp);
						foreach($tmp as $jwbn){
							$jwbn = explode('|',$jwbn);
							$idPrtyn = $this->mrConfig->Dec($jwbn[0]);
							$idJwbn = $this->mrConfig->Dec($jwbn[1]);
							$arrRes['mk']['m'.$idMk.'m'.$nip]['m'.$idPrtyn] = $idJwbn;
						}
					}
				}
				
				if(!empty($_SESSION['jwbn']['lain'])){
					foreach($_SESSION['jwbn']['lain'] as $post){
					foreach($post as $k => $jwbn){
						$idPrtyn = $this->mrConfig->Dec($k);
						$idJwbn = $this->mrConfig->Dec($jwbn);
						$arrRes['lain']['m'.$idPrtyn] = $idJwbn;						
					}
					}
				}
				#add ccp 7-10-2018
				$arrRes['komentar'] = $_SESSION['jwbn']['komentar'];
				if(!empty($_SESSION['jwbn']['komentar_dosen'])){
					foreach($_SESSION['jwbn']['komentar_dosen'] as $k => $jwbn){
						$tid = explode('|',$k);
						$idMk = $this->mrConfig->Dec($tid[0]);
						$nip = $this->mrConfig->Dec($tid[1]);
						$arrRes['komentar_dosen']['m'.$idMk.'m'.$nip] = $jwbn;
					}
				}
				#end

			$objKuisionerService = new KuisionerClientService($serverUsed, false, $this->mNiu, $this->mrUserSession->GetProperty("UserProdiId"));
			$res = $objKuisionerService->InsertJawaban($arrRes,$this->mWaktu); //update ccp 23-10-2018
			unset($_SESSION['jwbn']);
			$this->mTemplate->setAttribute('endNote','visibility','visible');
			} else{
				header("Location: ". $this->mrConfig->GetURL('home', 'home', 'view'));
			}
		 }
      $this->DisplayTemplate();
   }
}
?>