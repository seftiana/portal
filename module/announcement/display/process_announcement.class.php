<?php

   /**
     * ProcessAnnouncement
     * ProcessAnnouncement Class
     * 
     * @package ProcessAnnouncement
     * @author Ageng Prianto
     * @copyright Copyright (c) 2006 GamaTechno
     * @version 1.0 
     * @date 2006-05-03
     * @revision 
     *
     */
   class ProcessAnnouncement extends ProcessBase
   {
      /**
        * var $mDataAnnouncement object bisnis Announcement
        */
      var $mDataAnnouncement;
      
      /**
        * var $mProcessAnnouncementError string Process Error Announcement
        */
      var $mProcessAnnouncementError;
      
      /**
        * ProcessAnnouncement::ProcessAnnouncement
        * Constructor for ProcessAnnouncement Class
        *
        * @param $configObject object Configuration
        * @return void
        */
      function ProcessAnnouncement(&$configObject)
      {
         ProcessBase::ProcessBase($configObject);
         $this->mDataAnnouncement = New Announcement($configObject);
      }
      
      /**
        * ProcessAnnouncement::SetAttributes
        * Set Attributes
        *
        * @param $arrAttributes array Attributes for SetProperty
        * @return 
        */
      function SetAttributes($arrAttributes)
      {
         foreach($arrAttributes as $key => $value) {
            $this->mDataAnnouncement->SetProperty($key, $value);
         }
      }
      
      /**
        * ProcessAnnouncement::DeleteAnnouncementDataItem
        * Menghapus item data pengumuman
        *
        * @param $annoncementId integer id pengumuman
        * @return boolean 
        */
      function DeleteAnnouncementDataItem($announcementId, $uploadfile) {         
         $this->mDataAnnouncement->SetProperty("AnnouncementId", $announcementId);
         // get the detail of data
         $procDetail = $this->mDataAnnouncement->GetAnnouncementDataDetail();
         if(false === $procDetail) {
            $this->SetProperty("ProcessAnnouncementError", $this->mDataAnnouncement->GetProperty("AnnouncementErrorMessage"));            
            return false;
         } else {
            $procDel = $this->mDataAnnouncement->DoDeleteAnnouncementDataItem();
            if(false === $procDel) {
               $this->SetProperty("ProcessAnnouncementError", $this->mDataAnnouncement->GetProperty("AnnouncementErrorMessage"));            
               return false;
            } else {
               $this->SetProperty("ProcessAnnouncementError", "");                           
            }
            // hapus file gambarnya
            $userfile = $uploadfile . $procDetail[0]['image_path'];
            if(file_exists($userfile) AND !empty($procDetail[0]['image_path'])) {
               unlink($userfile);
            }
            return true;
         }         
      }
      
      /**
        * ProcessAnnouncement::AddAnnouncementDataItem
        * Menambahkan item data pengumuman
        *
        * @param $arrData array data for pengumuman
        * @param $arrDataFakultas array data for kode fakultas
        * @param $arrDataHakAkses array data for jenis hak akses
        * @param $uploadedFile string path untuk file gambar
        * @return boolean 
        */
      function AddAnnouncementDataItem($arrData, $arrDataFakultas, $arrDataHakAkses, $uploadedFile, $userfile) {
         // set attribut for announcement fields attribute then insert
         $this->SetAttributes($arrData);
         $this->mDataAnnouncement->SetProperty("ArrAnnouncementFakultasId", $arrDataFakultas);
         $this->mDataAnnouncement->SetProperty("ArrAnnouncementDestination", $arrDataHakAkses);
         //echo '<pre>';print_r($this->mDataAnnouncement);echo '</pre>';exit;
         if (!$this->mDataAnnouncement->Connect()) {
            $dbErrorMsg = $this->mDataAnnouncement->GetProperty("DbErrorMessage");
            $this->SetProperty("ProcessAnnouncementError", $dbErrorMsg);
            return false;
         }
         $this->mDataAnnouncement->mDbConnection->StartTrans();
         // tambahkan data ke tabel pengumuman
         $procAdd = $this->mDataAnnouncement->DoAddAnnouncementDataItem();
		 if(false === $procAdd) {
            $this->SetProperty("ProcessAnnouncementError", $this->mDataAnnouncement->GetProperty("AnnouncementErrorMessage"));            
            return false;
         } else {
            // tambahkan data pengumuman fakultas ke tabel fakultas pengumuman link
            $announcementCurrId = $this->GetMaximumAnnouncementId();
            if(false === $announcementCurrId) {
               $this->SetProperty("ProcessAnnouncementError", $this->mDataAnnouncement->GetProperty("AnnouncementErrorMessage"));            
               return false;
            } else {
               foreach($this->mDataAnnouncement->mArrAnnouncementFakultasId as $key => $value) {
                  $this->mDataAnnouncement->SetProperty("AnnouncementFakultasId", $value);
                  $this->mDataAnnouncement->SetProperty("AnnouncementId", $announcementCurrId);
                  $procFac = $this->mDataAnnouncement->DoAddAnnouncementFacultyItem();
                  if(false === $procFac) {
                     $this->SetProperty("ProcessAnnouncementError", $this->mDataAnnouncement->GetProperty("AnnouncementErrorMessage"));
                     return false;
                  }
               }
               // tambahkan data pengumuman hak akses  ke tabel tujuan pengumuman link
               foreach($this->mDataAnnouncement->mArrAnnouncementDestination as $key => $value) {
                  $this->mDataAnnouncement->SetProperty("AnnouncementDestination", $value);
                  $this->mDataAnnouncement->SetProperty("AnnouncementId", $announcementCurrId);
                  $procDest = $this->mDataAnnouncement->DoAddAnnouncementDestinationItem();
                  if(false === $procDest) {
                     $this->SetProperty("ProcessAnnouncementError", $this->mDataAnnouncement->GetProperty("AnnouncementErrorMessage"));
                     return false;
                  }
               }
               //upload the file into server
               if($uploadedFile != '') {
                  if (is_uploaded_file($userfile)) {
                     move_uploaded_file($userfile, $uploadedFile);                     
                  }
               }
            }
         }
         $this->mDataAnnouncement->mDbConnection->CompleteTrans();
         $this->mDataAnnouncement->Disconnect();
         $this->SetProperty("ProcessAnnouncementError",'Berhasil Menambah Pengumuman');
         return true;
      }
      
      /**
        * ProcessAnnouncement::UpdateAnnouncementDataItem
        * Mengubah item data pengumuman
        *
        * @param $arrData array data for pengumuman
        * @param $arrDataFakultas array data for kode fakultas
        * @param $arrDataHakAkses array data for jenis hak akses
        * @param $uploadedFile string path untuk file gambar
        * @return boolean 
        */
      function UpdateAnnouncementDataItem($arrData, $arrDataFakultas, $arrDataHakAkses, $uploadedFile, $userfile) {         
         // set attribut for announcement fields attribute then update
         $this->SetAttributes($arrData);
         $this->mDataAnnouncement->SetProperty("ArrAnnouncementFakultasId", $arrDataFakultas);
         $this->mDataAnnouncement->SetProperty("ArrAnnouncementDestination", $arrDataHakAkses);
         //echo '<pre>';print_r($this->mDataAnnouncement);echo '</pre>';exit;
         if (!$this->mDataAnnouncement->Connect()) {
            $dbErrorMsg = $this->mDataAnnouncement->GetProperty("DbErrorMessage");
            $this->SetProperty("ProcessAnnouncementError", $dbErrorMsg);
            return false;
         }
         $this->mDataAnnouncement->mDbConnection->StartTrans();
         // update data di tabel pengumuman
         $procUpd = $this->mDataAnnouncement->DoUpdateAnnouncementDataItem();
         if(false === $procUpd) {
            $this->SetProperty("ProcessAnnouncementError", $this->mDataAnnouncement->GetProperty("AnnouncementErrorMessage"));            
            return false;
         } else {
            // hapus data pengumuman fakultas kemudian tambahkan data pengumuman fakultas baru ke tabel fakultas pengumuman link
            $announcementCurrId = $this->mDataAnnouncement->GetProperty("AnnouncementId");
            $procDelFak = $this->mDataAnnouncement->DoDeleteAnnouncementFacultyItem();
            if(false === $procDelFak) {
               $this->SetProperty("ProcessAnnouncementError", $this->mDataAnnouncement->GetProperty("AnnouncementErrorMessage"));            
               return false;
            } else {
               foreach($this->mDataAnnouncement->mArrAnnouncementFakultasId as $key => $value) {
                  $this->mDataAnnouncement->SetProperty("AnnouncementFakultasId", $value);
                  $this->mDataAnnouncement->SetProperty("AnnouncementId", $announcementCurrId);
                  $procFac = $this->mDataAnnouncement->DoAddAnnouncementFacultyItem();
                  if(false === $procFac) {
                     $this->SetProperty("ProcessAnnouncementError", $this->mDataAnnouncement->GetProperty("AnnouncementErrorMessage"));
                     return false;
                  }
               }
            }            
            // hapus data pengumuman hak akses kemudian tambahkan data pengumuman hak akses  ke tabel tujuan pengumuman link
            $procDelHakAkses = $this->mDataAnnouncement->DoDeleteAnnouncementDestinationItem();
            if(false === $procDelHakAkses) {
               $this->SetProperty("ProcessAnnouncementError", $this->mDataAnnouncement->GetProperty("AnnouncementErrorMessage"));            
               return false;
            } else {
               foreach($this->mDataAnnouncement->mArrAnnouncementDestination as $key => $value) {
                  $this->mDataAnnouncement->SetProperty("AnnouncementDestination", $value);
                  $this->mDataAnnouncement->SetProperty("AnnouncementId", $announcementCurrId);
                  $procDest = $this->mDataAnnouncement->DoAddAnnouncementDestinationItem();
                  if(false === $procDest) {
                     $this->SetProperty("ProcessAnnouncementError", $this->mDataAnnouncement->GetProperty("AnnouncementErrorMessage"));
                     return false;
                  }
               }
            }            
            //upload the file into server
            if($uploadedFile != '') {
               if (is_uploaded_file($userfile)) {
                  move_uploaded_file($userfile, $uploadedFile);                     
               }
            }            
         }
         $this->mDataAnnouncement->mDbConnection->CompleteTrans();
         $this->mDataAnnouncement->Disconnect();
         $this->SetProperty("ProcessAnnouncementError",'Berhasil Menambah Pengumuman');
         return true;
      }
      
      /**
        * ProcessAnnouncement::GetMaximumAnnouncementId
        * Mengambil data Id Pengumuman yang tebaru
        *        
        * @return integer 
        */
      function GetMaximumAnnouncementId() {
         return $result = $this->mDataAnnouncement->GetMaximumAnnouncementId();         
      }
   }
?>