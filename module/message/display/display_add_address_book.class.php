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
 
class DisplayAddAddressBook extends DisplayBasePopup{

   var $mMessage;
   var $mSearchNiuKey;
   var $mSearchNamaKey;
   var $mSearchFakultasKey;
   var $mPage;
   var $mNumRecordPerPage;
   var $mNiuPemilik;
   var $mErrorMessage;
   var $mErrorType;
   var $mUser;

    /**
    * DisplayPopupAddressBook::DisplayPopupAddressBook
    * Constructor for DisplayPopupAddressBook class
    *
    * @param $configObject object Configuration
    * @return void
    */
   function DisplayAddAddressBook(&$configObject, &$security, $searchNiuKey, $searchNamaKey,$searchFakultasKey, $page=1, $errMsg, $errType) 
   {
      DisplayBasePopup::DisplayBasePopup($configObject, $security) ;
      $this->mUser = New User($this->mrConfig, $this->mrUserSession->GetProperty("User"));
      $this->mSearchNiuKey = $searchNiuKey;
      $this->mSearchNamaKey = $searchNamaKey;
      $this->mSearchFakultasKey = $searchFakultasKey;
      $this->mPage = $page;
      $this->mNumRecordPerPage = 10;
      $this->mNiuPemilik = $this->mrUserSession->GetProperty("User");
      $this->mErrorMessage = $errMsg;
      $this->mErrorType = $errType;
      
      //set template untuk error dan empty box DisplayBase::SetErrorAndEmptyBox
      $this->SetErrorAndEmptyBox();
      //set template untuk navigasi DisplayBase::SetNavigationTemplate
      $this->SetNavigationTemplate();
         
      $this->SetTemplateBasedir($configObject->GetValue('app_module') . 'message/templates/');
      $this->SetTemplateFile('add_address_book.html');
      /**
      echo("<pre>");
         print_r($this->mSearchNiuKey);
         print_r($this->mSearchNamaKey);
         print_r($this->mSearchFakultasKey);
      echo("</pre>");
      */
   }
   
   function CekJenisSearch()
   {
      //$condition = NULL;
      /*
      if ($this->mSearchNiuKey !== 'off' OR $this->mSearchNamaKey !== 'off' OR $this->mSearchFakultasKey !== 'off')
      */
      //$condition = ' WHERE';
      if ($this->mSearchNiuKey !== 'off') {
         // search by niu
         //$condition .= ' tusrNama  LIKE "%'. $this->mSearchNiuKey .'%"';
         $condition[0]= $this->mSearchNiuKey;
      } else {
          $condition[0]='%';
      }
      
      if ($this->mSearchNamaKey !== 'off') {
         // search by nama
         /*
         if ($condition !== ' WHERE')
            $condition .= ' AND ';
         $condition .= ' tusrProfil LIKE "%'. $this->mSearchNamaKey .'%"';
         */
         $condition[1]=$this->mSearchNamaKey;
      } else {
         $condition[1]='%';
      }
      
      if ($this->mSearchFakultasKey !== 'off') {
         // search by fakultas
         /*
         if ($condition !== ' WHERE')
            $condition .= ' AND ';
         $condition .= ' prodiKode IN ('.$this->mSearchFakultasKey .')';
         */
         $condition[2]=$this->mSearchFakultasKey;
      } else {
         // search by fakultas
         /*
         if ($condition !== ' WHERE')
            $condition .= ' AND ';
          $dataProdi = $this->mUser->GetGroupProdi();
          $dataProdi =  $dataProdi[0]['KODE'];
         //$condition .= ' fakNamaResmi LIKE "%'. $this->mSearchFakultasKey .'%"';
         $condition .=' prodiKode IN ('.$dataProdi.')';
         */
         $dataProdi = $this->mUser->GetGroupProdi();
         $dataProdi =  $dataProdi[0]['KODE'];
         $condition[2]=$dataProdi;        
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
      $this->AddVar("content","URL_CARI", $this->mrConfig->GetURL('message','address_book','add'));
      $this->mUser->SetProperty("Condition", $this->CekJenisSearch());
      
      // data address book yang sudah dimiliki
      $start_record = ($this->mPage*$this->mNumRecordPerPage)-($this->mNumRecordPerPage);
      $recordcount = $this->mUser->CountUserByNiu();
      $recordcount = $recordcount[0]['totalUser'];
      
      if (!empty($this->mErrorMessage)) {
         // tambahkan error_box ==> pending dulu dab ..!!
         $this->SetAttribute('error_box', 'visibility', 'visible');
         $this->AddVar('error_type', 'TYPE', strtoupper($this->mErrorType));
         $this->AddVar('error_box', 'ERROR_MESSAGE', $this->mErrorMessage);
         $this->AddVar('page_type', 'TYPE', 'popup');
      }
      
      // data program tudi
      if ($this->mSearchFakultasKey=='all') {
          $this->mSearchFakultasKey = $this->mUser->GetGroupProdi();
          $this->mSearchFakultasKey =  $this->mSearchFakultasKey[0]['KODE'];
      }
      
      $dataProdi =  $this->mUser->GetProdi();
      if (!empty($dataProdi)){
          foreach ($dataProdi as $mData){
             $this->AddVar('prodi','KODE', $mData['KODE']);
             $this->AddVar('prodi','PRODI', $mData['PRODI']);
             $this->mTemplate->parseTemplate("prodi","a");
         }
         
      }
      
      $data = $this->mUser->GetAllUserByNiuForAddrBook($start_record, $this->mNumRecordPerPage);
      //echo("<pre>");print_r($data);echo("</pre>");
      if (false === $data) {
         $this->AddVar('empty_type', 'TYPE', "INFO");
         $this->AddVar("daftar_teman","IS_EMPTY","YES");
         $this->AddVar("empty_box", "WARNING_MESSAGE", $this->mUser->GetProperty('UserErrorMessage'));
      }
      else {
         $this->AddVar("daftar_teman","IS_EMPTY","NO");
         $this->AddVar("list_teman", 'url_add', $this->mrConfig->GetURL('message','message','process'));
         for ($i=0; $i < count($data); $i++)
            $data[$i]['pemilik'] = $this->mNiuPemilik;
         $this->ParseData("list_teman", $data, "TEMAN_", $start_record+1);
      }
      
      $url = $this->mrConfig->GetURL('message','address_book','add') . '&searchNiuKey='. $this->mrConfig->Enc($this->mSearchNiuKey) . '&searchNamaKey='. $this->mrConfig->Enc($this->mSearchNamaKey) . '&searchFakultasKey='. $this->mrConfig->Enc($this->mSearchFakultasKey);
      $this->ShowPageNavigation($url,$this->mPage,$recordcount);

      $this->DisplayTemplate();
   }
}
?>