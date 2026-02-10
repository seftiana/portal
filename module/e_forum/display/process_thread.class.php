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

class ProcessThread extends ProcessBase {
   var $mProcessThreadError;
	
	var $mRole;
	var $mAddress;

   /**
    * ProcessForum::ProcessForum
    * Constructor for ProcessForum class
    *
    * @param $configObject object Configuration
    * @return void
    */
   function ProcessThread($configObject, $security) 
   {
         ProcessBase::ProcessBase($configObject) ;
			$this->mRole = $_SESSION['user_identity_portal']->GetProperty('Role');
			if($this->mRole == 7)
			{
				$this->mAddress = $_SESSION['forum']['unit'];
			}
			else
			{
				$this->mAddress = $_SESSION['user_identity_portal']->GetProperty("ServerServiceAddress");
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
   function DoInsertThread($thrdJudul, $forumId) 
   {
      $threadServiceObj = new ThreadClientService($this->mAddress, false);      
      $result = $threadServiceObj->DoInsertThread($thrdJudul, $forumId, $_SESSION['user_identity_portal']->GetProperty('User'));
      if ($result === false) {
         $this->mProcessThreadError = $threadServiceObj->GetProperty("ErrorMessages");
         return false;
      } else {
         return $result;
      }
   }
   
   function DoInsertPost($thrdId, $postPesan) 
   {
      $threadServiceObj = new ThreadClientService($this->mAddress, false);      
      $result = $threadServiceObj->DoInsertPost($thrdId, $postPesan, $_SESSION['user_identity_portal']->GetProperty('User'));
      if ($result === false) {
         $this->mProcessThreadError = $threadServiceObj->GetProperty("ErrorMessages");
         return false;
      } else {
         return $result;
      }
   }
   
   function DoUpdateThread($thrdId, $thrdJudul) 
   {                  
      $threadServiceObj = new ThreadClientService($_SESSION['user_identity_portal']->GetProperty('ServerServiceAddress'), false);      
      $result = $threadServiceObj->DoUpdateThread($thrdId, $thrdJudul);
      if ($result === false) {
         $this->mProcessThreadError = $threadServiceObj->GetProperty("ErrorMessages");
         return false;
      } else {
         return $result;
      }
   }
   
   function DoDeleteThread($thrdId) 
   {                  
      $threadServiceObj = new ThreadClientService($_SESSION['user_identity_portal']->GetProperty('ServerServiceAddress'), false);      
      $result = $threadServiceObj->DoDeleteThread($thrdId);
      if ($result === false) {
         $this->mProcessThreadError = $threadServiceObj->GetProperty("ErrorMessages");
         return false;
      } else {
         return $result;
      }
   }
   
   function DoDeletePost($postId, $thrdId) 
   {                  
      $threadServiceObj = new ThreadClientService($_SESSION['user_identity_portal']->GetProperty('ServerServiceAddress'), false);      
      $result = $threadServiceObj->DoDeletePost($postId, $thrdId);
      if ($result === false) {
         $this->mProcessThreadError = $threadServiceObj->GetProperty("ErrorMessages");
         return false;
      } else {
         return $result;
      }
   }
}