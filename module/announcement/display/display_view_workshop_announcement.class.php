<?php

   /**
     * DisplayViewUserWorkshopAnnouncement
     * Display Class for View Workshop Announcement for User
     * 
     * @package DisplayViewUserWorkshopAnnouncement
     * @author Ageng Prianto
     * @copyright Copyright (c) 2006 GamaTechno
     * @version 1.0 
     * @date 2006-05-06
     * @revision 
     *
     */
   class DisplayViewUserWorkshopAnnouncement extends DisplayBaseFull
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
        * DisplayViewUserWorkshopAnnouncement::DisplayViewUserWorkshopAnnouncement
        * Constructor for Class DisplayViewUserAcademicAnnouncement
        *
        * @param $configObject object Configuration
        * @param $security object Security
        * @return void
        */
      function DisplayViewUserWorkshopAnnouncement(&$configObject, &$security, $page)
      {
         DisplayBaseFull::DisplayBaseFull($configObject, $security);         
         
         $this->mDataAnnouncement = new Announcement($this->mrConfig);
         $this->mDataUser = new User($this->mrConfig, $this->mrUserSession->GetProperty("User"),
                                     $this->mrUserSession->GetProperty("Role"));
                  
         $this->mPage = $page;
         $this->mNumRecordPerPage = 15;
         
         //set template untuk error dan empty box DisplayBase::SetErrorAndEmptyBox
         $this->SetErrorAndEmptyBox();
         //set template untuk navigasi DisplayBase::SetNavigationTemplate
         $this->SetNavigationTemplate();
         
         $this->SetTemplateBasedir($this->mrConfig->GetValue('app_module') . 'announcement/templates/');
         $this->SetTemplateFile('view_workshop_announcement.html');
      }
      
      /**
        * DisplayViewUserWorkshopAnnouncement::GetDataAnnouncement
        * Get data Pengumuman based on user and faculty
        *
        * @param $start integer mulai record yang akan diambil
        * @param $start integer jumlah record yang akan diambil
        * @return array
        */
      function GetDataAnnouncement($start, $limit) {         
         $dataUser = $this->mDataUser->LoadUserById();
         if(false === $dataUser) {
                     return false;
         } else {
            if ($dataUser[0]['nama'] == "admin"){
               return $this->mDataAnnouncement->GetInformationByType(2, $limit,$start);
            }
            else {
               $this->mDataAnnouncement->SetProperty("AnnouncementTypeId", 2);
               $this->mDataAnnouncement->SetProperty("AnnouncementRoleId", $this->mrUserSession->GetProperty("Role"));
               $this->mDataAnnouncement->SetProperty("AnnouncementFakultasId", $dataUser[0]['fak_kode']);
               return $this->mDataAnnouncement->GetDataAnnouncementBasedOnTypeForUserAndFaculty($start, $limit);
             }
         }
      }
         /**
        * DisplayViewUserWorkshopAnnouncement::GetCountDataAnnouncement
        * Get jumlah data Pengumuman based on user and faculty
        *
        * @param 
        * @return integer
        */
      function GetCountDataAnnouncement() {         
         $dataUser = $this->mDataUser->LoadUserById();
         if(false === $dataUser) {
                     return false;
         } else {
               $this->mDataAnnouncement->SetProperty("AnnouncementTypeId", 2);
               if ($dataUser[0]['nama'] == "admin"){
                  return $this->mDataAnnouncement->GetCountInformationByType();
               }
               else {
                  $this->mDataAnnouncement->SetProperty("AnnouncementRoleId", $this->mrUserSession->GetProperty("Role"));
                  $this->mDataAnnouncement->SetProperty("AnnouncementFakultasId", $dataUser[0]['fak_kode']);
                  return $this->mDataAnnouncement->GetCountDataAnnouncementBasedOnTypeForUserAndFaculty();
               }
         }
      }
      /**
        * DisplayViewUserWorkshopAnnouncement::Display
        * Parsing Data to Template
        *
        * @param 
        * @return void
        */
      function Display()
      {
         DisplayBaseFull::Display('[ Logout ]');
         $this->AddVar("content", "APPLICATION_MODULE", 'Informasi Workshop');
         
         $recordCount = $this->GetCountDataAnnouncement();
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
               $data[$i]['date'] = $this->IndonesianDate($data[$i]['date']);               
               $urlDetail = $this->mrConfig->GetUrl('announcement', 'announcement', 'detail') . '&id=' . $this->mrConfig->Enc($data[$i]['id']);
               $data[$i]['url_detail'] = $urlDetail;               
            }
            $this->ParseData("informasi_item", $data, "INFO_", 1);
            $urlPageNav = $this->mrConfig->GetURL('announcement', 'academic_announcement', 'view');
            $this->ShowPageNavigation($urlPageNav, $this->mPage, $recordCount, $this->mNumRecordPerPage);
         }
         $this->DisplayTemplate();
      }
   }
?>