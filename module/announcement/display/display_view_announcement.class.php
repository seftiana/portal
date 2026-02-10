<?php

   /**
     * DisplayViewAnnouncementManagement
     * Display Class for View View Announcement for Management
     * 
     * @package DisplayViewAnnouncementManagement
     * @author Ageng Prianto
     * @copyright Copyright (c) 2006 GamaTechno
     * @version 1.0 
     * @date 2006-05-03
     * @revision 
     *
     */
   class DisplayViewAnnouncementManagement extends DisplayBaseFull
   {
      /**
        * var $mDataAnnouncement object Bisnis Pengumuman
        */
      var $mDataAnnouncement;
      
      /**
        * var $mDataUser object Bisnis User
        */
      var $mDataUser;
      
      /**
        * var $mPage integer current page
        */
      var $mPage;
      
      /**
        * var $mNumRecordPerPage integer number of record per page
        */
      var $mNumRecordPerPage;
         
      /**
        * var $mErrorMessage string error message for this page
        */
      var $mErrorMessage;
      
      /**
        * var $mErrorType string error message type for this page
        */
      var $mErrorType;
      
      /**
        * DisplayViewAnnouncementManagement::DisplayViewAnnouncementManagement
        * Constructor for Class DisplayViewAnnouncementManagement
        *
        * @param $configObject object Configuration
        * @param $security object Security
        * @return void
        */
      function DisplayViewAnnouncementManagement(&$configObject, &$security, $page, $errMsg, $tErrMsg)
      {
         DisplayBaseFull::DisplayBaseFull($configObject, $security);         
         
         $this->mDataAnnouncement = new Announcement($this->mrConfig);
         $this->mDataUser = new User($this->mrConfig, $this->mrUserSession->GetProperty("User"),
                                     $this->mrUserSession->GetProperty("Role"));
         
         $this->mErrorMessage = $errMsg;
         $this->mErrorType = $tErrMsg;
         $this->mPage = $page;
         $this->mNumRecordPerPage = 15;
         
         //set template untuk error dan empty box DisplayBase::SetErrorAndEmptyBox
         $this->SetErrorAndEmptyBox();
         //set template untuk navigasi DisplayBase::SetNavigationTemplate
         $this->SetNavigationTemplate();
         
         $this->SetTemplateBasedir($this->mrConfig->GetValue('app_module') . 'announcement/templates/');
         $this->SetTemplateFile('view_announcement.html');
      }
      
      /**
        * DisplayViewAnnouncementManagement::ShowErrorBox
        * Showing the error box if any error occured
        *
        * @param 
        * @return void
        */
      function ShowErrorBox() {
         if (!empty($this->mErrorMessage)) {
            $this->SetAttribute('error_box', 'visibility', 'visible');
            $this->AddVar('error_type', 'TYPE', strtoupper($this->mErrorType));
            $this->AddVar('error_box', 'ERROR_MESSAGE', $this->mErrorMessage);
         }
      }
      
      /**
        * DisplayViewAnnouncementManagement::GetDataAnnouncement
        * Get data Pengumuman based on user
        *
        * @param $start integer mulai record yang akan diambil
        * @param $start integer jumlah record yang akan diambil
        * @return array
        */
      function GetDataAnnouncement($start, $limit) {
         $userRoleId = $this->mrUserSession->GetProperty("Role");         
         if($userRoleId == '6') {
            // jika user adalah admin unit ambil data pengumuman hanya dr fakultas ybs
            $dataUser = $this->mDataUser->LoadUserById();
            if(false === $dataUser) {
               return false;
            } else {
               $this->mDataAnnouncement->SetProperty("AnnouncementFakultasId", $dataUser[0]['fak_kode']);
            }
         } else {
            $this->mDataAnnouncement->SetProperty("AnnouncementFakultasId", "");
         }         
         return $this->mDataAnnouncement->GetAllDataInformation($start, $limit);
      }
      
      /**
        * DisplayViewAnnouncementManagement::GetCountDataAnnouncement
        * Get jumlah data Pengumuman based on user
        *
        * @param 
        * @return integer
        */
      function GetCountDataInformation() {
         $userRoleId = $this->mrUserSession->GetProperty("Role");         
         if($userRoleId == '6') {
            // jika user adalah admin unit ambil data pengumuman hanya dr fakultas ybs
            $dataUser = $this->mDataUser->LoadUserById();
            if(false === $dataUser) {
               return false;
            } else {
               $this->mDataAnnouncement->SetProperty("AnnouncementFakultasId", $dataUser[0]['fak_kode']);
            }
         } else {
            $this->mDataAnnouncement->SetProperty("AnnouncementFakultasId", "");
         }         
         return $this->mDataAnnouncement->GetCountAllDataInformation();
      }
      
      /**
        * DisplayViewAnnouncementManagement::Display
        * Parsing Data to Template
        *
        * @param 
        * @return void
        */
      function Display()
      {
         DisplayBaseFull::Display('[ Logout ]');
         
         $this->AddVar("content", "APPLICATION_MODULE", 'Pengumuman');         
         $this->AddVar("content", "URL_ADD", $this->mrConfig->GetURL('announcement', 'announcement', 'process'));
         
         $recordCount = $this->GetCountDataInformation();
         if(false === $recordCount) {
            $this->AddVar("list_announcement", "IS_EMPTY", "YES");
            $sysEmptyMessage = $this->mDataUser->GetProperty("UserErrorMessage") . $this->mDataAnnouncement->GetProperty("AnnouncementErrorMessage");
            $emptyMessage = $this->ComposeErrorMessage("Data tidak ditemukan", $sysEmptyMessage);
            $this->AddVar("empty_box", "WARNING_MESSAGE", $emptyMessage);
         } else {
            $this->AddVar("list_announcement", "IS_EMPTY", "NO");
            $start_record = ($this->mPage*$this->mNumRecordPerPage)-($this->mNumRecordPerPage);
            
            $data = $this->GetDataAnnouncement($start_record, $this->mNumRecordPerPage);
            for($i = 0; $i < count($data); $i++) {
				$data[$i]['nomer'] = ($i+1)+$start_record;
               $data[$i]['date'] = $this->IndonesianDate($data[$i]['date']);
               $data[$i]['url_delete'] = $this->mrConfig->GetURL('announcement', 'announcement', 'process') . '&id=' . $this->mrConfig->Enc($data[$i]['id']) . '&act=' . $this->mrConfig->Enc('DoDeleteAnnouncement');
               $data[$i]['url_edit'] = $this->mrConfig->GetURL('announcement', 'announcement', 'update') . '&id=' . $this->mrConfig->Enc($data[$i]['id']);
            }
            $this->ParseData("informasi_item", $data, "INFO_", 1);
            $urlPageNav = $this->mrConfig->GetURL('announcement', 'announcement', 'view');
            $this->ShowPageNavigation($urlPageNav, $this->mPage, $recordCount, $this->mNumRecordPerPage);
         }
         $this->ShowErrorBox();
         $this->DisplayTemplate();
      }
   }
?>