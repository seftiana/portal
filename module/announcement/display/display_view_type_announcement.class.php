<?php

   /**
     * DisplayViewUserTypeAnnouncement
     * Display Class forView Type/Category for User
     * 
     * @package DisplayViewUserTypeAnnouncement
     * @author Agung Puji M
     * @copyright Copyright (c) 2007 GamaTechno
     * @version 1.0 
     * @date 2007-03-06
     * @revision 
     *
     */
   class DisplayViewUserTypeAnnouncement extends DisplayBaseFull
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
       * tipe pengumuman  
       */
      var $mType;
      
      /**
        * DisplayViewUserWorkshopAnnouncement::DisplayViewUserWorkshopAnnouncement
        * Constructor for Class DisplayViewUserAcademicAnnouncement
        *
        * @param $configObject object Configuration
        * @param $security object Security
        * @return void
        */
      function DisplayViewUserTypeAnnouncement(&$configObject, &$security, $page,$type)
      {
         DisplayBaseFull::DisplayBaseFull($configObject, $security);         
         
         $this->mDataAnnouncement = new Announcement($this->mrConfig);
         $this->mDataUser = new User($this->mrConfig, $this->mrUserSession->GetProperty("User"),
                                     $this->mrUserSession->GetProperty("Role"));
                  
         $this->mPage = $page;
         $this->mType = $this->mrConfig->Dec($type);
         $this->mNumRecordPerPage = 15;
         
         //set template untuk error dan empty box DisplayBase::SetErrorAndEmptyBox
         $this->SetErrorAndEmptyBox();
         //set template untuk navigasi DisplayBase::SetNavigationTemplate
         $this->SetNavigationTemplate();
         
         $this->SetTemplateBasedir($this->mrConfig->GetValue('app_module') . 'announcement/templates/');
         $this->SetTemplateFile('view_type_announcement.html');
      }
      
      /**
       * mengambil nama tipe dari idnya
      **/
      function GetPengumumanTypeName() {
           return $this->mDataAnnouncement->GetTypeName($this->mType);
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
            if ($dataUser[0]['nama'] == "admin" || $dataUser[0]['nama'] == "groot" || $dataUser[0]['nama'] == "laafeb"){
               #return $this->mDataAnnouncement->GetInformationByType($this->mType, $limit,$start);
	       return $this->mDataAnnouncement->GetInformationByTypeAll($this->mType);
            }
            else {
               $this->mDataAnnouncement->SetProperty("AnnouncementTypeId", $this->mType);
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
               $this->mDataAnnouncement->SetProperty("AnnouncementTypeId", $this->mType);
               if ($dataUser[0]['nama'] == "admin" || $dataUser[0]['nama'] == "groot" || $dataUser[0]['nama'] == "laafeb"){
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
         $tipe=$this->GetPengumumanTypeName();
         //$this->addVar("content","KETERANGAN",$tipe[0]['keterangan']);
         $this->AddVar("content", "MODULE",$tipe[0]['nama']);
         
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
            $urlPageNav = $this->mrConfig->GetURL('announcement', 'type_announcement', 'view');
            $this->ShowPageNavigation($urlPageNav, $this->mPage, $recordCount, $this->mNumRecordPerPage);
         }
         $this->DisplayTemplate();
      }
   }
?>