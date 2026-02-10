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
   
   class DisplayViewBillInformationDetil extends DisplayBaseFull {
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

      function DisplayViewBillInformationDetil(&$configObject, &$security, $userRole, $mhsniu, $prodiId, $errMsg, $viewBy, $siaServer) {
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
         $this->SetTemplateFile('view_bill_information_detil.html');         
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
            $restClient->SetGet('&nim='.$this->mMahasiswaNiu.'&id='.$this->mrConfig->Dec($_GET['id']));
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
         $this->AddVar('content','PERIODE', $this->mrConfig->Dec($_GET['p']));
         $this->AddVar('content','JENIS_TAGIHAN', $this->mrConfig->Dec($_GET['j']));
         if(isset($_GET['sb']))
            $sudah_dibayar = $this->mrConfig->Dec($_GET['sb']);
         else 
            $sudah_dibayar = 0;

         $this->AddVar('content','SUDAH_BAYAR', number_format($this->mrConfig->Dec($_GET['sudah_bayar']),0,',','.'));
         $this->ParseData('mahasiswa', $dataUser, "MHS_");     

         $gtfwData = $this->GetTagihanMahasiswa();
         if($gtfwData == NULL){
            $this->ShowErrorBox('Pengambilan data tagihan tidak berhasil.');
         }else if ($gtfwData['status'] == '404') {
            $this->AddVar('data_container','IS_EMPTY','YES');
            $this->AddVar('empty_type', 'TYPE', "INFO");
            $this->AddVar("empty_box", "WARNING_MESSAGE", $this->ComposeErrorMessage($gtfwData['message'], $this->GetProperty("ErrorMessage")));
         } else {
            $dataTagihan = $gtfwData['data'];
            $this->AddVar('data_container','IS_EMPTY','NO');
            $total_biaya =  0;
            $total_potongan =  0;
            for($i=0,$m=count($dataTagihan);$i<$m;++$i){
               if($i%2==0) $this->AddVar('data_item', '_CLASS', '');
               else $this->AddVar('data_item', '_CLASS', 'table-common-even');
               $this->AddVar('data_item', 'NUMBER', $i+1);
               $this->AddVar('data_item', 'JENIS_BIAYA', $dataTagihan[$i]['nama_biaya']);
               $this->AddVar('data_item', 'NOMINAL_TAGIHAN', number_format($dataTagihan[$i]['nominal_tagihan'],0,',','.'));
               $this->AddVar('data_item', 'NOMINAL_POTONGAN', number_format($dataTagihan[$i]['nominal_potongan'],0,',','.'));
               
               $this->mTemplate->parseTemplate('data_item', 'a');  
               
               $total_biaya += $dataTagihan[$i]['nominal_tagihan']; 
               $total_potongan += $dataTagihan[$i]['nominal_potongan'];    
            }            
            $total_tagihan = $total_biaya - $total_potongan - $sudah_dibayar;            
            $this->AddVar('data_container','TOTAL_BIAYA', number_format($total_biaya,0,',','.'));
            $this->AddVar('data_container','TOTAL_POTONGAN', number_format($total_potongan,0,',','.'));
            $this->AddVar('data_container','SUDAH_DIBAYAR', number_format($sudah_dibayar,0,',','.'));
            $this->AddVar('data_container','TOTAL_TAGIHAN', number_format($total_tagihan,0,',','.'));
         }
         $this->AddVar("content", "URL_BACK", $this->mrConfig->GetURL('payment','bill_information','view').
         "&sia=".$this->mrConfig->Enc($this->mSiaServer));
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