<?php

/**
 * DisplayPopupAddressBook
 * Display class for view popup address book
 * 
 * @package 
 * @author Yudhi Aksara
 * @copyright Copyright (c) 2006 GamaTechno
 * @version 1.0 
 * @date 2006-02-18
 * @revision 
 *
 */
 
class DisplayPopupAddressBook extends DisplayBasePopup{

   var $mMessage;
   var $mSearchNiuKey;
   var $mSearchNamaKey;
   var $mSearchFakultasKey;
   var $mPage;
   var $mNumRecordPerPage;
   var $mNiuPemilik;
   var $mErrorMessage;
   var $mErrorType;

    /**
    * DisplayPopupAddressBook::DisplayPopupAddressBook
    * Constructor for DisplayPopupAddressBook class
    *
    * @param $configObject object Configuration
    * @return void
    */
   function DisplayPopupAddressBook(&$configObject, &$security, $searchNiuKey, $searchNamaKey,$searchFakultasKey, $page=1, $niuPemilik, $errMsg, $errType) 
   {
      DisplayBasePopup::DisplayBasePopup($configObject, $security) ;
      $this->mMessage = New Konsul($this->mrConfig);
      $this->mSearchNiuKey = $searchNiuKey;
      $this->mSearchNamaKey = $searchNamaKey;
      $this->mSearchFakultasKey = $searchFakultasKey;
      $this->mPage = $page;
      $this->mNumRecordPerPage = 10;
      $this->mNiuPemilik = $niuPemilik;
      $this->mErrorMessage = $errMsg;
      $this->mErrorType = $errType;
      
      //set template untuk error dan empty box DisplayBase::SetErrorAndEmptyBox
      $this->SetErrorAndEmptyBox();
      //set template untuk navigasi DisplayBase::SetNavigationTemplate
      $this->SetNavigationTemplate();
      
      $this->SetTemplateBasedir($configObject->GetValue('app_module') . 'konsul/templates/');
      $this->SetTemplateFile('popup_address_book.html');
      /**
      echo("<pre>");
         print_r($this->mSearchNiuKey);
         print_r($this->mSearchNamaKey);
         print_r($this->mSearchFakultasKey);
      echo("</pre>");
      */
   }
   
   function CekJenisSearch(){
      $condition[0] =  '';
      if ($this->mSearchNiuKey !== 'off') {
         // search by niu
         $condition[0] =  $this->mSearchNiuKey ;
      } 
      
      $condition[1] =  '';
      if ($this->mSearchNamaKey !== 'off') {
         // search by nama
         $condition[1] = $this->mSearchNamaKey ;
      }
      
      $condition[2] = $this->mMessage->GetGroupProdi();
      $condition[2] = $condition[2][0]['KODE'];
      if ($this->mSearchFakultasKey !== 'off') {
         // search by fakultas
         $condition[2] = $this->mSearchFakultasKey ;
      }
      
      return $condition;
   }
   
   
   /**
    * DisplayPopupAddressBook::Display
    * Parsing data to template
    *
    * @param 
    * @return void
    */
   function Display() 
   {
      DisplayBasePopup::Display();
      $this->AddVar("content","APPLICATION_SUBMODULE","Kontak");
      $this->mMessage->SetProperty("MessageReceiver", $this->mNiuPemilik);
      $this->AddVar("content","URL_CARI", $this->mrConfig->GetURL('message','address_book','popup') . '&niuPemilik='. $this->mrConfig->Enc($this->mNiuPemilik));
      $this->AddVar("content","URL_ADD", $this->mrConfig->GetURL('message','address_book','add'));
      $this->mMessage->SetProperty("Condition", $this->CekJenisSearch());
      
      // data program tudi
      if ($this->mSearchFakultasKey=='all') {
          $this->mSearchFakultasKey = $this->mMessage->GetGroupProdi();
          $this->mSearchFakultasKey =  $this->mSearchFakultasKey[0]['KODE'];
      }
      
      $dataProdi =  $this->mMessage->GetProdi();
      if (!empty($dataProdi)){
          foreach ($dataProdi as $mData){
             $this->AddVar('prodi','KODE', $mData['KODE']);
             $this->AddVar('prodi','PRODI', $mData['PRODI']);
             $this->mTemplate->parseTemplate("prodi","a");
         }
         
      }
      
      // data address book yang sudah dimiliki
      $start_record = ($this->mPage*$this->mNumRecordPerPage)-($this->mNumRecordPerPage);
      $recordcount = $this->mMessage->CountAddressBook($this->mNiuPemilik);
      $recordcount = $recordcount[0]['totalAddrBook'];
      if (!empty($this->mErrorMessage)) {
         $this->SetAttribute('error_box', 'visibility', 'visible');
         $this->AddVar('error_type', 'TYPE', strtoupper($this->mErrorType));
         $temp = explode ('|', $this->mErrorMessage);
         $errorSystem= $temp[1];
         if ($temp[0] == 'tambah') {
            if ($temp[1] == "")
               $error = "Berhasil menambah data kontak.";
            else
               $error = "Tidak berhasil menambah data kontak.";
         } elseif ($temp[0] == 'delete') {
            if ($temp[1] == "")
               $error = "Berhasil menghapus data kontak.";
            else
               $error = "Tidak berhasil menghapus data kontak.";
         }
         elseif ($temp[0] == 'validasi_tambah') {
               $error = "Data sudah ada di dalam data kontak.";
         }

         $this->AddVar('error_box', 'ERROR_MESSAGE', $this->ComposeErrorMessage($error, $errorSystem));
         $this->AddVar('page_type', 'TYPE', 'popup');
      }
      
      // $data = $this->mMessage->GetAllAdreessBookItems($this->mNiuPemilik, $start_record, $this->mNumRecordPerPage);
	  $data = $this->GetAllMentoredStudents();
	  // echo"<pre>";
	  // echo $this->mrUserSession->GetProperty("ServerServiceAddress")."<br>";
	  // echo $this->mrUserSession->GetProperty("User")."<br>";
	  // echo $this->mNiuPemilik."<br>";
	  // print_r($data);
	  // echo"</pre>";
      
      if (false === $data) {
         $this->AddVar("daftar_teman","IS_EMPTY","YES");
         $this->AddVar('empty_type', 'TYPE', "INFO");
         $this->AddVar('empty_box', "WARNING_MESSAGE", $this->ComposeErrorMessage("Data belum tersedia ....",$this->mMessage->GetProperty('MessageErrorMessage')));
      }
      else {
         $this->AddVar("daftar_teman","IS_EMPTY","NO");
         $this->AddVar("list_teman", "url_delete", $this->mrConfig->GetURL('message','message','process'));
         for ($i=0; $i < count($data); $i++)
            $data[$i]['pemilik'] = $this->mNiuPemilik;
         $this->ParseData("list_teman", $data, "TEMAN_", $start_record+1);
      }
      
      $url = $this->mrConfig->GetURL('message','address_book','popup') . '&niuPemilik='. $this->mrConfig->Enc($this->mNiuPemilik) . '&searchNiuKey='. $this->mrConfig->Enc($this->mSearchNiuKey) . '&searchNamaKey='. $this->mrConfig->Enc($this->mSearchNamaKey) . '&searchFakultasKey='. $this->mrConfig->Enc($this->mSearchFakultasKey);
      $this->ShowPageNavigation($url,$this->mPage,$recordcount);

      $this->DisplayTemplate();
   }
   
	function GetAllMentoredStudents($limit="", $offset=""){
		$ServiceServer = $this->mrUserSession->GetProperty("ServerServiceAddress");
		$UserId = $this->mrUserSession->GetProperty("User");
		$ProdiId = $this->mrUserSession->GetProperty("UserProdiId");
		$this->mDosenServiceObj =  New DosenClientService($ServiceServer,false, $UserId, $ProdiId);
		$students = $this->mDosenServiceObj->GetAllMentoredStudents();
		if (false === $students) {
			return false;
		}else {
			return $students;
		}
	}
}
?>