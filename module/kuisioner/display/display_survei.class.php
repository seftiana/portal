<?php
class DisplaySurvei extends DisplayBaseNoLinks {
   
   var $mErrorMessage;
   var $mNiu;
   var $mServiceServer;
   var $mProdi; 
   
   function DisplaySurvei(&$configObject, &$security, $niu, $sia, $errMsg, $prodi) { 
      DisplayBaseNoLinks::DisplayBaseNoLinks($configObject, $security);
      $this->mErrorMessage = $errMsg;
      $this->mNiu = $niu;
      $this->mProdi = $prodi;
      $this->mServiceServer = $sia;
         
      $this->SetErrorAndEmptyBox();
      $this->SetTemplateBasedir($configObject->GetValue('app_module') . 'kuisioner/templates/');
      $this->SetTemplateFile('view_survei.html');
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
		}else {
			$serverUsed = $this->mServiceServer;
		}
		if($this->mrUserSession->GetProperty('Role')!='1')$this->AddVar("isSkip", "NOTMHS", '1');
        $objKuisionerService = new KuisionerClientService($serverUsed, false, $this->mNiu);
		$objKuisionerService->SetProperty("UserRole", $this->mrUserSession->GetProperty('Role') );
		
		if(isset($_POST['t'])){
			$seq = (int)($_POST['t'])+1;
			$_SESSION['jwbn']['lain'][] = $_POST['jwbn'];
		} else	{
			$seq = 0;
			$this->mTemplate->setAttribute('welcome','visibility','visible');
		}
		$this->AddVar("option_form", "SEQ", $seq);
		$dataKuisioner = $objKuisionerService->GetKuisionerSurvei(); //update ccp 12-02-2019
		
		$countData = count($dataKuisioner);
		if(!empty($dataKuisioner[0][0]['ID_MK'])){
			$dataMk = $dataKuisioner[0];
			array_splice($dataKuisioner,0,1);
		}
		$dataKuisionerTtl = $objKuisionerService->GetKuisionerTtlSurvei(); #add ccp 2-10-2018
		$countKuisinonerTtl = count($dataKuisionerTtl); #add ccp 2-10-2018
		if(!empty($dataKuisioner[0]['ID_PERTANYAAN']) and $countKuisinonerTtl != count($_SESSION['jwbn']['lain'])) {
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
					
					unset($dataKuisioner);
				}
			}
        }else{ 
			if(!empty($_SESSION['jwbn'])){
				$arrRes = array();
				if(!empty($_SESSION['jwbn']['lain'])){
					foreach($_SESSION['jwbn']['lain'] as $post){
					foreach($post as $k => $jwbn){
						$idPrtyn = $this->mrConfig->Dec($k);
						$idJwbn = $this->mrConfig->Dec($jwbn);
						$arrRes['lain']['m'.$idPrtyn] = $idJwbn;						
					}
					}
				}
				
				
				$objKuisionerService = new KuisionerClientService($serverUsed, false, $this->mNiu, $this->mrUserSession->GetProperty("UserProdiId"));
				$res = $objKuisionerService->InsertJawabanSurvei($arrRes); //update ccp 12-02-2018
				unset($_SESSION['jwbn']);
				header("Location: ". $this->mrConfig->GetURL('academic_report', 'academic_report', 'view'));
			} else{
				
				unset($_SESSION['jwbn']);
				header("Location: ". $this->mrConfig->GetURL('home', 'home', 'view'));
			}
		}
		$this->DisplayTemplate();
	}
}
?>