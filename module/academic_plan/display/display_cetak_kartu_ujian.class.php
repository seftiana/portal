<?php
/*
Author : Nikolius
Email : n1colius.lau@gmail.com
Date : 6/16/2014 9:25:21 PM
*/
class DisplayCetakKartuUjian extends DisplayBaseFull {
   var $mUserRole;
   var $mMahasiswaNiu;
   var $mMahasiswaProdiId;

   var $mObjKrsService;
   var $mSiaServer;
   var $mEnableBlock; //add ccp 1-4-2019

   function DisplayCetakKartuUjian(&$configObject, &$security, $userRole, $mhsniu, $prodiId, $getBlock) {
      DisplayBaseFull::DisplayBaseFull($configObject, $security);
      $this->mUserRole = $userRole;
      $this->mMahasiswaProdiId = $prodiId;
      $this->mMahasiswaNiu = $mhsniu;
      $this->mSiaServer = $this->mrUserSession->GetProperty("ServerServiceAddress");

      $this->mFinansiServiceAddress = $this->mrUserSession->GetProperty("FinansiServiceAddress"); 
      $this->mEnableBlock = $getBlock  ; //add ccp 1-4-2019    

      $this->mObjKrsService = new AcademicPlanClientService($this->mSiaServer,false, $this->mMahasiswaNiu, $this->mMahasiswaProdiId);
      $this->mObjKrsService->SetProperty("UserRole", $this->mUserRole);
      $this->mObjKrsService->DoSiaSetting();

      $this->SetErrorAndEmptyBox();
      $this->SetTemplateBasedir($configObject->GetValue('app_module') . 'academic_plan/templates/');
      $this->SetTemplateFile('view_cetak_kartu_ujian.html');
   }

      function GetTagihanPrasyaratMahasiswa($smt='') {
         if($this->mFinansiServiceAddress == ''){            
            return array(
                     'status' => 404,
                     'message' => 'Pengambilan data tagihan tidak berhasil.',
                     'data' => true,
                  );
         } else{
            $restClient = new RestClient();
            $restClient->SetPath($this->mFinansiServiceAddress.'?mod=lap_histori_pembayaran&sub=HistoriPembayaranMahasiswa&typ=rest&act=rest');
            // $restClient->SetGet('&prasyarat=yes&nim='.json_encode($this->mMahasiswaNiu));
	    $restClient->SetGet('&prasyarat=yes&smt='.$smt.'&nim='.json_encode($this->mMahasiswaNiu)); //add ccp 15-8-2018
            $restClient->SetDebugOn();
            $this->dataRest = $restClient->Send();
            return $this->dataRest['gtfwResult'];
         }
      }

   function Display(){
      DisplayBaseFull::Display("[ Logout ]");

      $sempId = $this->mObjKrsService->mSemesterProdiId;
      $tahunAjaranPlus = $this->mObjKrsService->mTahunSemester + 1;
      $semesterLabel = $this->mObjKrsService->mNamaSemester." ".$this->mObjKrsService->mTahunSemester." / ".$tahunAjaranPlus; 
     		#add ccp 1-4-2019
		$statusTagihanPrasyaratMhs =  $this->CekStatusTagihanPrasyaratMhs($this->mMahasiswaNiu,$this->mObjKrsService->mSemesterProdiSemesterId);
		// echo"<pre>";print_r($statusTagihanPrasyaratMhs);
		
		if(!empty($statusTagihanPrasyaratMhs['data']) && $this->mEnableBlock){
			$this->AddVar("data_hutang", "BLOCK", "YES");
			for($i=0,$m=count($statusTagihanPrasyaratMhs['data']);$i<$m;++$i){
				if($i%2==0) $this->AddVar('data_item', '_CLASS', '');
				else $this->AddVar('data_item', '_CLASS', 'table-common-even');
				$this->AddVar('data_item', 'NUMBER', $i+1);
				$this->AddVar('data_item', 'PERIODE', $statusTagihanPrasyaratMhs['data'][$i]['periode']);
				$this->AddVar('data_item', 'TAGIHAN', $statusTagihanPrasyaratMhs['data'][$i]['tagihan']);
				$this->mTemplate->parseTemplate('data_item', 'a');
			}
			
			for($i=0,$m=count($statusTagihanPrasyaratMhs['tagihan']);$i<$m;++$i){
				if($i%2==0) $this->AddVar('data_item_tagihan', '_CLASS', '');
				else $this->AddVar('data_item_tagihan', '_CLASS', 'table-common-even');
				$this->AddVar('data_item_tagihan', 'NUMBER', $i+1);
				$this->AddVar('data_item_tagihan', 'PERIODE', $statusTagihanPrasyaratMhs['tagihan'][$i]['periode']);
				$this->AddVar('data_item_tagihan', 'TAGIHAN', $statusTagihanPrasyaratMhs['tagihan'][$i]['tagihan']);
				$this->AddVar('data_item_tagihan', 'BATAS_AKHIR', $statusTagihanPrasyaratMhs['tagihan'][$i]['batas_akhir']);
				$this->AddVar('data_item_tagihan', 'TOTAL_TAGIHAN', number_format($statusTagihanPrasyaratMhs['tagihan'][$i]['total_tagihan'],0,',','.'));
				$this->AddVar('data_item_tagihan', 'TOTAL_KWITANSI', number_format($statusTagihanPrasyaratMhs['tagihan'][$i]['total_kwitansi'],0,',','.'));
				$this->AddVar('data_item_tagihan', 'TOTAL_POTONGAN', number_format($statusTagihanPrasyaratMhs['tagihan'][$i]['total_potongan'],0,',','.'));
				$this->AddVar('data_item_tagihan', 'STATUS', $statusTagihanPrasyaratMhs['tagihan'][$i]['status_bayar']);   
				/*if($statusTagihanPrasyaratMhs['tagihan'][$i]['total_tagihan']==$statusTagihanPrasyaratMhs['tagihan'][$i]['total_potongan']){
					$sisa = $statusTagihanPrasyaratMhs['tagihan'][$i]['total_tagihan']-$statusTagihanPrasyaratMhs['tagihan'][$i]['total_potongan'];
				}else{
					$sisa = $statusTagihanPrasyaratMhs['tagihan'][$i]['total_tagihan']-$statusTagihanPrasyaratMhs['tagihan'][$i]['total_kwitansi'];
				}*/
				$sisa = $statusTagihanPrasyaratMhs['tagihan'][$i]['saldo_hutang'];#update ccp 20-05-2019
				$this->AddVar('data_item_tagihan', 'TOTAL_SISA', number_format($sisa,0,',','.'));
				$this->mTemplate->parseTemplate('data_item_tagihan', 'a');
			}
		}else{
			$this->AddVar("data_hutang", "BLOCK", "NO");
		}     
		
      // $tagihanPrasyarat = $this->GetTagihanPrasyaratMahasiswa();
      /*$tagihanPrasyarat = $this->GetTagihanPrasyaratMahasiswa($this->mObjKrsService->mSemesterProdiSemesterId); //add ccp 15-8-2018

      $this->mTemplate->AddVar('content','HIDDEN_INFO','hidden-tr');
      if(!empty($tagihanPrasyarat['data'])){
         if ($tagihanPrasyarat['status'] == '404') {
            $this->mTemplate->AddVar('content','INFORMASI',$tagihanPrasyarat['message']);
         } else {
            $informasi = 'Terdapat tagihan pembayaran yang harus dilunasi';            
            $no = 0;
            foreach ($tagihanPrasyarat['data'] as $rows) {
               $no++;
               $informasi .= '<br />'.$no.'. &nbsp;'.$rows['periode'].' - '.$rows['tagihan'];               
            }
            $this->mTemplate->AddVar('content','INFORMASI',$informasi);
         }
         $this->mTemplate->AddVar('content','HIDDEN_TOMBOL','hidden-tr');
      }*/

      $urlTengah = $this->mrConfig->GetURL('academic_plan','kartu_ujian','print').'&opsiSesi='.$this->mrConfig->Enc('tengah');
      $urlAkhir = $this->mrConfig->GetURL('academic_plan','kartu_ujian','print').'&opsiSesi='.$this->mrConfig->Enc('akhir');

      $this->mTemplate->AddVar('content2','URL_CETAK_TENGAH',$urlTengah);
      $this->mTemplate->AddVar('content2','URL_CETAK_AKHIR',$urlAkhir);
      $this->mTemplate->AddVar('content2','SEMESTER_LABEL',$semesterLabel);

      $this->DisplayTemplate();
   } 

    #add ccp 1-4-2019
    function GetTagihanPrasyaratMahasiswaNew($arrNim,$smt) {
        if($this->mFinansiServiceAddress == ''){
         	$this->ShowErrorBox("Pengambilan data tagihan tidak berhasil.");            
        } else{
            $restClient = new RestClient();
            $restClient->SetPath($this->mFinansiServiceAddress.'?mod=lap_histori_pembayaran&sub=HistoriPembayaranMahasiswaSingle&typ=rest&act=rest');
            // $restClient->SetGet('&prasyarat=yes&nim='.$arrNim);
            $restClient->SetGet('&smt='.$smt.'&nim='.$arrNim); //add ccp 15-8-2018
            $restClient->SetDebugOn();
            $this->dataRest = $restClient->Send();
            return $this->dataRest['gtfwResult'];
        }
    }

    # mencari mahasiswa yang tidak memenuhi prasyarat pembayaran
    function CekStatusTagihanPrasyaratMhs($nimMhs,$semesterAktif){
    	$status = false;
        $dataTagihanPrasyaratMhs = $this->GetTagihanPrasyaratMahasiswaNew($nimMhs,$semesterAktif);
		// print_r($dataTagihanPrasyaratMhs);
        // if(!empty($dataTagihanPrasyaratMhs['data'])){
         	// $status = true;	
        // }
        // return $status;
        return $dataTagihanPrasyaratMhs;
    }

}
?>