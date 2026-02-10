<?php

   /**
     * DisplayAddAnnouncement
     * Display Class for Add Announcement
     * 
     * @package DisplayAddAnnouncement
     * @author Ageng Prianto
     * @copyright Copyright (c) 2006 GamaTechno
     * @version 1.0 
     * @date 2006-05-04
     * @revision 
     *
     */
   class DisplayAddAnnouncement extends DisplayBaseFull
   {
      /**
        * var $mErrorMessage string Error Message
        */
      var $mErrorMessage;
      
      /**
        * var $mDataAnnouncement object Bisnis Announcement
        */
      var $mDataAnnouncement;
      
      /**
        * var $mDataReference object Bisnis Referensi
        */
      var $mDataReference;
      
      /**
        * DisplayAddAnnouncement::DisplayAddAnnouncement
        * Constructor for Class DisplayAddAnnouncement
        *
        * @param $configObject object Configuration
        * @param $security object Security
        * @param $errMsg string Process Information Error Message
        * @return void
        */
      function DisplayAddAnnouncement(&$configObject, &$security, $errMsg)
      {
         DisplayBaseFull::DisplayBaseFull($configObject, $security);
         $this->mDataAnnouncement = New Announcement($this->mrConfig);
         $this->mDataReference = New Reference($this->mrConfig);
         
         $this->mErrorMessage = $errMsg;
         
         //set template untuk error dan empty box DisplayBase::SetErrorAndEmptyBox
         $this->SetErrorAndEmptyBox();
         
         $this->SetTemplateBasedir($this->mrConfig->GetValue('app_module') . 'announcement/templates/');
         $this->SetTemplateFile('add_announcement.html');
      }
      
      /**
        * DisplayAddAnnouncement::ShowErrorMessage
        * Show error message if error has occured
        *
        * @param 
        * @return void
        */
      function ShowErrorMessage() {         
         if (!empty($this->mErrorMessage)) {
            $this->SetAttribute('error_box', 'visibility', 'visible');
            $this->AddVar('error_type', 'TYPE', strtoupper($this->mErrorType));
            $this->AddVar('error_box', 'ERROR_MESSAGE', $this->mErrorMessage);
         }
      }
      
      /**
        * DisplayAddAnnouncement::DoParseDataFakultas
        * Parsing Data Fakultas to Template if any and if user is adminunit, just parse his/her faculty
        *
        * @param 
        * @return void
        */
      function DoParseDataFakultas($user = false) {                  
         if($user == false) {
            $listFakultas = $this->mDataReference->LoadFakultas();
         } else {
            $listFakultas = $this->mDataReference->LoadFakultas($user);
         }
            
         if (false === $listFakultas) {
            $this->AddVar("fakultas","IS_EMPTY", "YES");
            $errMsg = $this->ComposeErrorMessage("Data fakultas tidak ditemukan", $this->mDataReference->GetProperty("ReferenceErrorMsg"));
            $this->AddVar("fakultas","FAKULTAS_EMPTY_MSG", $errMsg);
         }
         else {
            $this->AddVar("fakultas","IS_EMPTY", "NO");
            $this->ParseData('fakultas', $listFakultas, "FAK_");
         }
      }
      
      /**
        * DisplayAddAnnouncement::DoParseDataHakAkses
        * Parsing Data Hak akses to Template
        *
        * @param 
        * @return void
        */
      function DoParseDataHakAkses() {                  
         $listTujuan = $this->mDataReference->LoadHakAkses();
            
         if (false === $listTujuan) {
            $this->AddVar("tujuan","IS_EMPTY", "YES");
            $errMsg = $this->ComposeErrorMessage("Data hak akses tidak ditemukan", $this->mDataReference->GetProperty("ReferenceErrorMsg"));
            $this->AddVar("tujuan","TUJUAN_EMPTY_MSG", $errMsg);
         }
         else {
            $this->AddVar("tujuan","IS_EMPTY", "NO");
            $this->ParseData('tujuan', $listTujuan, "REF_");
         }
      }
      
      /**
        * DisplayAddAnnouncement::DoParseDataJenisPengumuman
        * Parsing Data Jenis Pengumuman to Combo box
        *
        * @param 
        * @return void
        */
      function DoParseDataJenisPengumuman() {                  
         $listJenisInfo = $this->mDataAnnouncement->GetAllTypeInformation();
            echo "<pre>";print_r($listJenisInfo);
         if (false === $listJenisInfo) {
            $this->AddVar("announcement_type","IS_EMPTY", "YES");
            $errMsg = $this->ComposeErrorMessage("-- belum ada data --", $this->mDataAnnouncement->GetProperty("AnnouncementErrorMessage"));
            $this->AddVar("announcement_type","JENIS_EMPTY_MSG", $errMsg);
         }
         else {
            $this->AddVar("announcement_type","IS_EMPTY", "NO");
            $this->ParseData('announcement_type', $listJenisInfo, "JENIS_");
         }
      }
      
      /**
        * DisplayAddAnnouncement::Display
        * Parsing Data to Template
        *
        * @param 
        * @return void
        */
      function Display()
      {
         DisplayBaseFull::Display('[ Logout ]');
         $this->AddVar("content", "APPLICATION_MODULE", 'Pengumuman');
                  
         $this->AddVar("form_add_announcement", "URL_PROCESS", $this->mrConfig->GetURL('announcement','announcement','process'));
         $this->AddVar("form_add_announcement", "ANNOUNCEMENT_DATE", $this->IndonesianDate(date('Y-m-d')));
         
         // parse data fakultas
         if($this->mrUserSession->GetProperty("Role") == '6')
            $this->DoParseDataFakultas($this->mrUserSession->GetProperty("User"));
         else 
            $this->DoParseDataFakultas();
            
         // parse data tujuan pengumuman
         $this->DoParseDataHakAkses();
         
         // parse data jenis pengumuman
         $this->DoParseDataJenisPengumuman();
         
         $this->ShowErrorMessage();
         $this->DisplayTemplate();
      }
   }
?>