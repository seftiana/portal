<?php

class MbkmModel extends DatabaseConnected {
      
   var $mMbkmUserId;
   var $mAnnouncementFakultasId;
   
   var $mAnnouncementRoleId;
   var $mAnnouncementTypeId;
   var $mAnnouncementDate;
   var $mAnnouncementTitle;
   var $mAnnouncementImageFile;
   var $mAnnouncementImageAlt;
   var $mAnnouncementContent;
   var $mAnnouncementDestination;
   var $mArrAnnouncementFakultasId = array();
   var $mArrAnnouncementDestination = array();
   
   var $mAnnouncementId;
   var $mTanggal;
   var $mIDUser;
   var $mKegiatan;
   
   var $mAnnouncementErrorMessage;
   

	function MbkmModel($configObject) {
		DatabaseConnected::DatabaseConnected($configObject, "module/mbkm/business/mbkm.sql.php") ;
	}
}
?>