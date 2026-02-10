<?php

/**
 * DisplayPopupProgramStudi
 * Display class for view popup program studi
 * 
 * @package 
 * @author Maya Alipin
 * @copyright Copyright (c) 2006 GamaTechno
 * @version 1.0 
 * @date 2006-02-01
 * @revision 
 *
 */
 
class DisplayPopupProgramStudi extends DisplayBasePopup{

   var $mSearchKey ;
   var $mPage;
   var $mNumRecordPerPage;

    /**
    * DisplayPopupProgramStudi::DisplayPopupProgramStudi
    * Constructor for DisplayPopupProgramStudi class
    *
    * @param $configObject object Configuration
    * @return void
    */
   function DisplayPopupProgramStudi(&$configObject, &$security, $searchKey, $page=1) 
   {
      DisplayBasePopup::DisplayBasePopup($configObject, $security) ;
      
      $this->SetErrorAndEmptyBox();
      //set template untuk navigasi DisplayBase::SetNavigationTemplate
      $this->SetNavigationTemplate();
      $this->mSearchKey = $searchKey;
      
      $this->mPage = $page;
      $this->mNumRecordPerPage = 10;
      $this->SetTemplateBasedir($configObject->GetValue('app_module') . 'reference/templates/');
      $this->SetTemplateFile('popup_program_studi.html');
   }
   
   /**
    * DisplayPopupProgramStudi::Display
    * Parsing data to template
    *
    * @param 
    * @return void
    */
   function Display() 
   {
      DisplayBasePopup::Display();
      
      $start_record = ($this->mPage*$this->mNumRecordPerPage)-($this->mNumRecordPerPage);
      $referensi = new Reference($this->mrConfig) ;
      $recordcount = $referensi->CountProdi($this->mSearchKey);
      $recordcount = $recordcount[0]['totalProdi'] ;
      
      $this->AddVar("content", "URL_CARI", $this->mrConfig->GetURL('reference', 'program_studi', 'popup') . 
                          "&prodiKey=" . $this->mrConfig->Enc($this->mSearchKey));
      $data = $referensi->LoadProdi($start_record, $this->mNumRecordPerPage, $this->mSearchKey);
      if (empty($data)) {
         $this->AddVar("daftar_prodi", "IS_EMPTY", "yes");
         $this->SetAttribute('empty_box', 'visibility', 'visible');
         $this->AddVar("empty_box", "WARNING_MESSAGE", $this->ComposeErrorMessage("Data tidak ditemukan .... ",$referensi->GetProperty('ReferenceErrorMsg')));
         $this->AddVar('page_type', 'TYPE', 'popup');
         $this->AddVar('empty_type', 'TYPE', "INFO");
         
      }else{
         $this->AddVar("daftar_prodi", "IS_EMPTY", "no");
         $this->ParseData("list_prodi", $data, "PRODI_", $start_record+1 );
      }
      $this->AddVar("content", "SEARCH_KEY", $this->mSearchKey);
      $url = $this->mrConfig->GetURL('reference', 'program_studi', 'popup') . "&prodiKey=".$this->mrConfig->Enc($this->mSearchKey);
      //echo $url;
      $this->ShowPageNavigation($url,$this->mPage,$recordcount);
      $this->DisplayTemplate();
   }
}
?>