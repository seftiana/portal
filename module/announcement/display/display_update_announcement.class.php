<?php

   /**
     * DisplayUpdateAnnouncement
     * Display Class for Update Announcement
     * 
     * @package DisplayUpdateAnnouncement
     * @author Ageng Prianto
     * @copyright Copyright (c) 2006 GamaTechno
     * @version 1.0 
     * @date 2006-05-04
     * @revision 
     *
     */
   class DisplayUpdateAnnouncement extends DisplayBaseFull
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
        * var $mAnnouncementId integer announcement id
        */
      var $mAnnouncementId;
      
      /**
        * var $mDataReference object Bisnis Referensi
        */
      var $mDataReference;
      
      /**
        * DisplayUpdateAnnouncement::DisplayUpdateAnnouncement
        * Constructor for Class DisplayUpdateAnnouncement
        *
        * @param $configObject object Configuration
        * @param $security object Security
        * @param $errMsg string Process Information Error Message
        * @return void
        */
      function DisplayUpdateAnnouncement(&$configObject, &$security, $errMsg, $announcementId)
      {
         DisplayBaseFull::DisplayBaseFull($configObject, $security);
         $this->mDataAnnouncement = New Announcement($this->mrConfig);
         $this->mDataReference = New Reference($this->mrConfig);
         
         $this->mErrorMessage = $errMsg;
         $this->mAnnouncementId = $announcementId;
         
         //set template untuk error dan empty box DisplayBase::SetErrorAndEmptyBox
         $this->SetErrorAndEmptyBox();
         
         $this->SetTemplateBasedir($this->mrConfig->GetValue('app_module') . 'announcement/templates/');
         $this->SetTemplateFile('update_announcement.html');
      }
      
      /**
        * DisplayUpdateAnnouncement::ShowErrorMessage
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
        * DisplayUpdateAnnouncement::DoParseDataFakultas
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
         // get current faculty
         $this->mDataAnnouncement->SetProperty("AnnouncementId", $this->mAnnouncementId);
         $dataFaculty = $this->mDataAnnouncement->GetAllAnnouncementForFaculty();
         if (false === $listFakultas) {
            $this->AddVar("fakultas","IS_EMPTY", "YES");
            $errMsg = $this->ComposeErrorMessage("Data fakultas tidak ditemukan", $this->mDataReference->GetProperty("ReferenceErrorMsg"));
            $this->AddVar("fakultas","FAKULTAS_EMPTY_MSG", $errMsg);
         }
         else {
            $this->AddVar("fakultas","IS_EMPTY", "NO");
            for($i = 0; $i < count($listFakultas); $i++) {               
               if(!empty($dataFaculty)) {
                  for($j = 0; $j < count($dataFaculty); $j++) {
                     if($dataFaculty[$j]['fakid'] == $listFakultas[$i]['id']) {
                        $listFakultas[$i]['checked'] = 'checked';                      
                     }
                  }
               }
            }
            for($k = 0; $k < count($listFakultas); $k++) {                              
               if(empty($listFakultas[$k]['checked'])) {
                  $listFakultas[$k]['checked'] = '';                      
               }               
            } 
            $this->ParseData('fakultas', $listFakultas, "FAK_");
         }
      }
      
      /**
        * DisplayUpdateAnnouncement::DoParseDataHakAkses
        * Parsing Data Hak akses to Template
        *
        * @param 
        * @return void
        */
      function DoParseDataHakAkses() {                  
         $listTujuan = $this->mDataReference->LoadHakAkses();
         
         // get current hakakses
         $this->mDataAnnouncement->SetProperty("AnnouncementId", $this->mAnnouncementId);
         $dataHakAkses = $this->mDataAnnouncement->GetAllAnnouncementForAccessRight();         
         if (false === $listTujuan) {
            $this->AddVar("tujuan","IS_EMPTY", "YES");
            $errMsg = $this->ComposeErrorMessage("Data hak akses tidak ditemukan", $this->mDataReference->GetProperty("ReferenceErrorMsg"));
            $this->AddVar("tujuan","TUJUAN_EMPTY_MSG", $errMsg);
         }
         else {
            $this->AddVar("tujuan","IS_EMPTY", "NO");            
            for($i = 0; $i < count($listTujuan); $i++) {               
               if(!empty($dataHakAkses)) {
                  for($j = 0; $j < count($dataHakAkses); $j++) {
                     if($dataHakAkses[$j]['hakid'] == $listTujuan[$i]['id']) {
                        $listTujuan[$i]['checked'] = 'checked';                      
                     }
                  }
               }
            }
            for($k = 0; $k < count($listTujuan); $k++) {                              
               if(empty($listTujuan[$k]['checked'])) {
                  $listTujuan[$k]['checked'] = '';                      
               }               
            }
            $this->ParseData('tujuan', $listTujuan, "REF_");
         }
      }
      
      /**
        * DisplayUpdateAnnouncement::DoParseDataJenisPengumuman
        * Parsing Data Jenis Pengumuman to Combo box
        *
        * @param 
        * @return void
        */
      function DoParseDataJenisPengumuman($currTypeId) {                  
         $listJenisInfo = $this->mDataAnnouncement->GetAllTypeInformation();
            
         if (false === $listJenisInfo) {
            $this->AddVar("announcement_type","IS_EMPTY", "YES");
            $errMsg = $this->ComposeErrorMessage("-- belum ada data --", $this->mDataAnnouncement->GetProperty("AnnouncementErrorMessage"));
            $this->AddVar("announcement_type","JENIS_EMPTY_MSG", $errMsg);
         }
         else {
            $this->AddVar("announcement_type","IS_EMPTY", "NO");
            for($i = 0; $i < count($listJenisInfo); $i++) {
               if($listJenisInfo[$i]['id'] == $currTypeId) 
                  $listJenisInfo[$i]['selected'] = 'selected';
               else 
                  $listJenisInfo[$i]['selected'] = '';
            }
            $this->ParseData('announcement_type', $listJenisInfo, "JENIS_");
         }
      }
      
      /**
        * DisplayUpdateAnnouncement::Display
        * Parsing Data to Template
        *
        * @param 
        * @return void
        */
      function Display()
      {
         DisplayBaseFull::Display('[ Logout ]');
         $this->AddVar("content", "APPLICATION_MODULE", 'Pengumuman');
                  
         $this->AddVar("form_update_announcement", "URL_PROCESS", $this->mrConfig->GetURL('announcement','announcement','process'));         
         $this->mDataAnnouncement->SetProperty("AnnouncementId", $this->mAnnouncementId);
         $dataDetail = $this->mDataAnnouncement->GetAnnouncementDataDetail();         
         if(false === $dataDetail) {
            $this->AddVar("form_update_announcement", "IS_EMPTY", "YES");
            $sysEmptyMessage = $this->mDataAnnouncement->GetProperty("AnnouncementErrorMessage");
            $emptyMessage = $this->ComposeErrorMessage("Data tidak ditemukan", $sysEmptyMessage);
            $this->AddVar("empty_box", "WARNING_MESSAGE", $emptyMessage);
         } else {
            $this->AddVar("form_update_announcement", "IS_EMPTY", "NO");
            // parse data fakultas
            if($this->mrUserSession->GetProperty("Role") == '6')
               $this->DoParseDataFakultas($this->mrUserSession->GetProperty("User"));
            else 
               $this->DoParseDataFakultas();
               
            // parse data tujuan pengumuman
            $this->DoParseDataHakAkses();
            
            // parse data jenis pengumuman
            $this->DoParseDataJenisPengumuman($dataDetail[0]['type']);
            $dataDetail[0]['id'] = $this->mrConfig->Enc($dataDetail[0]['id']);
            $this->ParseData("form_update_announcement", $dataDetail, "ANNOUNCEMENT_");
         }
         $this->ShowErrorMessage();
         $this->DisplayTemplate();
      }
   }
?>