<?php
   /**
   * DisplayViewPaymentHistory
   * DisplayViewPaymentHistory class
   * 
   * @package communication 
   * @author Yudhi Aksara, S.Kom
   * @copyright Copyright (c) 2006 GamaTechno
   * @version 1.0 
   * @date 2006-03-07
   * @revision Maya Alipin 2006.09.07
   */
   
   class DisplayViewBillInformation extends DisplayBaseFull {
      var $mUserRole;
      var $mMahasiswaNiu;
      var $mMahasiswaProdiId;
      var $mErrorMessage;
      var $mCurrentPeriode;
      var $mObj;
      var $mFinansiServiceAddress;
      var $dataRest;
      var $mPeriode;
      var $mViewBy;
      var $mSiaServer;
      var $mUserId;
      
      function DisplayViewBillInformation(&$configObject, &$security, $userRole, $mhsniu, $prodiId, $errMsg, $viewBy, $siaServer) {
         DisplayBaseFull::DisplayBaseFull($configObject, $security);
         $this->mUserRole = $userRole;
         $this->mMahasiswaProdiId = $prodiId;
         $this->mMahasiswaNiu = $mhsniu;
         $this->mErrorMessage = $errMsg;
         $this->mViewBy = $viewBy;
         if ($siaServer == "") {
            $this->mSiaServer = $this->mrUserSession->GetProperty("ServerServiceAddress");
         } else {
            $this->mSiaServer = $siaServer;
         }
         $this->mFinansiServiceAddress = $this->mrUserSession->GetProperty("FinansiServiceAddress");
         $this->mObj = new UserClientService($this->mSiaServer,false, $this->mMahasiswaNiu);
         $this->SetErrorAndEmptyBox();  
         $this->SetTemplateBasedir($configObject->GetValue('app_module') . 'payment/templates/');
         $this->SetTemplateFile('view_bill_information.html');         
      }
      
      function GetDataMahasiswa() { 
         if ($this->mObj->IsError()) {
            $this->mErrorMessage .= $this->mUserService->GetProperty("ErrorMessages");
         }else{
            $this->mObj->SetProperty("UserRole", 1 );
            $dataUser = $this->mObj->GetUserInfo(1);
            $this->DoUpdateServiceStatus($this->mObj, $dataUser, 'SIA');
            if (false === $dataUser){    
               // service tidak available
               $this->ShowErrorBox("Pengambilan data tidak berhasil. ");
               $this->SetAttribute('mahasiswa','visibility','visible');
               $this->SetAttribute('data_container','visibility','hidden');
               $this->mErrorMessage .= $this->mObj->GetProperty("ErrorMessages");
               return false;
            } else {
               return $dataUser;
            }   
         }
      }      
      function GetTagihanMahasiswa() {
         if($this->mFinansiServiceAddress == ''){
             $this->ShowErrorBox('Pengambilan data tagihan tidak berhasil.');
         } else{
            $restClient = new RestClient();
            $restClient->SetPath($this->mFinansiServiceAddress.'?mod=lap_histori_pembayaran&sub=HistoriPembayaranMahasiswa&typ=rest&act=rest');
            $restClient->SetGet('&nim='.$this->mMahasiswaNiu);
            $restClient->SetDebugOn();
            $this->dataRest = $restClient->Send();
            return $this->dataRest['gtfwResult'];
         }
      }
      function Display() {
         // cek apakah service sia is available
         $dataUser = $this->GetDataMahasiswa();
         DisplayBaseFull::Display("[ Logout ]");
         
         //parse data user         
         $this->AddVar('content','id',$this->mrConfig->Enc('krs'));
         $this->ParseData('mahasiswa', $dataUser, "MHS_");     

         $gtfwData = $this->GetTagihanMahasiswa();   
         //echo "<pre>";print_r($gtfwData);echo "</pre>";      
         if(empty($gtfwData)){
            $this->ShowErrorBox('Pengambilan data tagihan tidak berhasil.');
         }else if ($gtfwData['status'] == '404') {
            $this->AddVar('data_container','IS_EMPTY','YES');
            $this->AddVar('empty_type', 'TYPE', "INFO");
            $this->AddVar("empty_box", "WARNING_MESSAGE", $this->ComposeErrorMessage($gtfwData['message'], $this->GetProperty("ErrorMessage")));
         } else {
            $dataTagihan = $gtfwData['data'];
            //echo "<pre>";print_r($dataTagihan);echo "</pre>";

            $this->AddVar('data_container','IS_EMPTY','NO');
            $saldo_hutang =  0;
            for($i=0,$m=count($dataTagihan);$i<$m;++$i){
               if($i%2==0) $this->AddVar('data_item', '_CLASS', '');
               else $this->AddVar('data_item', '_CLASS', 'table-common-even');
               $this->AddVar('data_item', 'NUMBER', $i+1);
               $this->AddVar('data_item', 'PERIODE', $dataTagihan[$i]['periode']);
               $this->AddVar('data_item', 'TAGIHAN', $dataTagihan[$i]['tagihan']);
               $this->AddVar('data_item', 'BATAS_AKHIR', $dataTagihan[$i]['batas_akhir']);
	       $this->AddVar('data_item', 'BATAS_AWAL', $dataTagihan[$i]['batas_awal']);
               // $this->AddVar('data_item', 'TOTAL_TAGIHAN', number_format($dataTagihan[$i]['saldo_hutang'],0,',','.')); // hide ccp 27 juli 2018
		$this->AddVar('data_item', 'TOTAL_TAGIHAN', number_format($dataTagihan[$i]['total_tagihan'],0,',','.')); //add ccp 27 juli 2018
               $this->AddVar('data_item', 'TOTAL_KWITANSI', number_format($dataTagihan[$i]['sudah_bayar'],0,',','.')); //add ccp 27 juli 2018
               $this->AddVar('data_item', 'TOTAL_POTONGAN', number_format($dataTagihan[$i]['total_potongan'],0,',','.')); //add ccp 27 juli 2018
		/*if($dataTagihan[$i]['total_tagihan']==$dataTagihan[$i]['total_potongan']){
			$sisa = $dataTagihan[$i]['total_tagihan']-$dataTagihan[$i]['total_potongan']; //add ccp 30 juli 2018
		}else{
			$sisa = $dataTagihan[$i]['total_tagihan']-$dataTagihan[$i]['total_kwitansi']; //add ccp 30 juli 2018
		}*/
		$sisa = $dataTagihan[$i]['saldo_hutang'];#update ccp 20-05-2019
               // $sisa = $dataTagihan[$i]['total_tagihan']-($dataTagihan[$i]['total_kwitansi']+$dataTagihan[$i]['total_potongan']); //add ccp 27 juli 2018
               $this->AddVar('data_item', 'TOTAL_SISA', number_format($sisa,0,',','.')); // add ccp 27 juli 2018
               $this->AddVar('data_item', 'STATUS', $dataTagihan[$i]['status_bayar']);               
               $url_detil = $this->mrConfig->GetURL('payment','bill_information_detil','view').
                           '&id='.$this->mrConfig->Enc($dataTagihan[$i]['id_history_tagihan']).
                           '&p='.$this->mrConfig->Enc($dataTagihan[$i]['periode']).
                           '&j='.$this->mrConfig->Enc($dataTagihan[$i]['tagihan']).
                           '&sb='.$this->mrConfig->Enc($dataTagihan[$i]['sudah_bayar']);
               $this->AddVar('data_item', 'URL_DETIL', $url_detil);
               $this->mTemplate->parseTemplate('data_item', 'a');  
               
               $saldo_hutang += $dataTagihan[$i]['saldo_hutang'];
	       $ssisa += $sisa; //add ccp 27 juli 2018    
            }            
            // $this->AddVar('content','SALDO_HUTANG', 'Saldo Hutang: '.number_format($saldo_hutang,0,',','.')); // hide ccp 27 juli 2018
	    $this->AddVar('content','SALDO_HUTANG', 'Total Hutang: '.number_format($ssisa,0,',','.')); //add ccp 27 juli 2018
	    $this->AddVar('content','DEPOSIT', 'Deposit : '.number_format($dataTagihan[0]['deposit'],0,',','.')); //add ccp 27 juli 2018
         }
         $this->DisplayTemplate();
      }
      
      function ShowErrorBox($stringError="") {
         if ($stringError != "" || $this->mErrorMessage != ""){
            $this->AddVar("error_box", "ERROR_MESSAGE",  
                  $this->ComposeErrorMessage($stringError , $this->mErrorMessage));   
            $this->SetAttribute('error_box', 'visibility', 'visible');
         }
      }
    }
?>