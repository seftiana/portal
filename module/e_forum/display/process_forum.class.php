<?php
/**
 * ProcessForum
 * Process class Forum
 * 
 * @package 
 * @author Refit Gustaroska
 * @copyright Copyright (c) 2006 GamaTechno
 * @version 1.0 
 * @date 2006-05-02
 * @revision 
 *
  */

class ProcessForum extends ProcessBase {
   var $mProcessForumError;
	var $mAddress;
	var $mProdi;

   /**
    * ProcessForum::ProcessForum
    * Constructor for ProcessForum class
    *
    * @param $configObject object Configuration
    * @return void
    */
   function ProcessForum($configObject, $security) 
   {
         ProcessBase::ProcessBase($configObject) ;
			if($_SESSION['user_identity_portal']->GetProperty('Role') == 7)
			{
				$this->mAddress = $_SESSION['forum']['unit'];
				$this->mProdi = $_SESSION['forum']['prodi'];
			}
			else
			{
				$this->mAddress = $_SESSION['user_identity_portal']->GetProperty('ServerServiceAddress');
				$this->mProdi = "";
			}
   }
   
   /**
      * ProcessForum::DoInsertForum      
      *
      * @param arrKrsItemId integer kelas id
      * @param arrNilai integer kelas id
      * @param arrIsMhsTambahan array flag 0|1 is mahasiswa tambahan
      * @return boolean hasil update
      */
   function DoInsertForum($frmNama, $frmMkId, $frmDesk) 
   {
      //print_r($_SESSION['user_identity_portal']->GetProperty('User'));exit();
      $forumServiceObj = new ForumClientService($this->mAddress, false);      
      $result = $forumServiceObj->DoInsertForum($frmNama, $frmMkId, $frmDesk, $_SESSION['user_identity_portal']->GetProperty('User'));
      if ($result === false) {
         $this->mProcessForumError = $forumServiceObj->GetProperty("ErrorMessages");
         return false;
      } else {
         return $result;
      }
   }
   
   function DoUpdateForum($frmId, $frmNama, $frmDesk) 
   {                  
      $forumServiceObj = new ForumClientService($this->mAddress, false);      
      $result = $forumServiceObj->DoUpdateForum($frmId, $frmNama, $frmDesk);
      if ($result === false) {
         $this->mProcessForumError = $forumServiceObj->GetProperty("ErrorMessages");
         return false;
      } else {
         return $result;
      }
   }
   
   function DoDeleteForum($frmId) 
   {                  
      $forumServiceObj = new ForumClientService($this->mAddress, false);      
      $result = $forumServiceObj->DoDeleteForum($frmId);
      if ($result === false) {
         $this->mProcessForumError = $forumServiceObj->GetProperty("ErrorMessages");
         return false;
      } else {
         return $result;
      }
   }
}