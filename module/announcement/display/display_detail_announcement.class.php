<?php

   /**
     * DisplayDetailAnnouncement
     * Display Class for Detail Announcement
     * 
     * @package DisplayDetailAnnouncement
     * @author Ageng Prianto
     * @copyright Copyright (c) 2006 GamaTechno
     * @version 1.0 
     * @date 2006-05-04
     * @revision 
     *
     */
   class DisplayDetailAnnouncement extends DisplayBaseFull
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
        * DisplayDetailAnnouncement::DisplayDetailAnnouncement
        * Constructor for Class DisplayDetailAnnouncement
        *
        * @param $configObject object Configuration
        * @param $security object Security
        * @param $errMsg string Process Information Error Message
        * @return void
        */
      function DisplayDetailAnnouncement(&$configObject, &$security, $errMsg, $announcementId)
      {
         DisplayBaseFull::DisplayBaseFull($configObject, $security);
         $this->mDataAnnouncement = New Announcement($this->mrConfig);         
         
         $this->mErrorMessage = $errMsg;
         $this->mAnnouncementId = $announcementId;
         
         //set template untuk error dan empty box DisplayBase::SetErrorAndEmptyBox
         $this->SetErrorAndEmptyBox();
         
         $this->SetTemplateBasedir($this->mrConfig->GetValue('app_module') . 'announcement/templates/');
         $this->SetTemplateFile('detail_announcement.html');
      }      
      
      /**
        * DisplayDetailAnnouncement::Display
        * Parsing Data to Template
        *
        * @param 
        * @return void
        */
      function Display()
      {
         DisplayBaseFull::Display('[ Logout ]');         
         
         $this->mDataAnnouncement->SetProperty("AnnouncementId", $this->mAnnouncementId);
         $dataDetail = $this->mDataAnnouncement->GetAnnouncementDataDetail();         
         if(false === $dataDetail) {
            $this->AddVar("detail_announcement", "IS_EMPTY", "YES");
            $sysEmptyMessage = $this->mDataAnnouncement->GetProperty("AnnouncementErrorMessage");
            $emptyMessage = $this->ComposeErrorMessage("Data tidak ditemukan", $sysEmptyMessage);
            $this->AddVar("empty_box", "WARNING_MESSAGE", $emptyMessage);
         } else {
            $this->AddVar("detail_announcement", "IS_EMPTY", "NO");
            $this->AddVar("content", "APPLICATION_MODULE", 'Detil '. $dataDetail[0]['type_nama']);
            for($i = 0; $i < count($dataDetail); $i++) {
               $dataDetail[$i]['date'] = $this->IndonesianDate($dataDetail[$i]['date']);
               if(empty($dataDetail[$i]['image_path'])) {
                  $this->SetAttribute("view_image", "visibility", 'hidden');
               }
               /*
               if($dataDetail[$i]['type_nama'] == 'Workshop')
                  $dataDetail[$i]['url_kembali'] = $this->mrConfig->GetUrl('announcement', 'workshop_announcement', 'view');
               elseif($dataDetail[$i]['type_nama'] == 'Informasi Akademik') 
                  $dataDetail[$i]['url_kembali'] = $this->mrConfig->GetUrl('announcement', 'academic_announcement', 'view');
               else*/
                  $dataDetail[$i]['url_kembali'] = $this->mrConfig->GetUrl('announcement', 'type_announcement', 'view') . "&id=" . $this->mrConfig->Enc($dataDetail[$i]['type']);;
            }            
			$this->ParseData("view_image", $dataDetail, "ANNOUNCEMENT_");
            $this->ParseData("detail_announcement", $dataDetail, "ANNOUNCEMENT_");
         }
         $this->DisplayTemplate();
      }
   }
?>