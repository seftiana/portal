<?php
/**
 * ProcessPerpustakaan
 * Process class Perpustakaan
 * 
 * @package 
 * @author Maya Alipin
 * @copyright Copyright (c) 2006 GamaTechno
 * @version 1.0 
 * @date 2006-05-02
 * @revision 
 *
  */

class ProcessPerpustakaan extends ProcessBase {
      var $mServiceServerAddress;
      var $mProcessPerpustakaanError;
      var $mUserId;

   /**
    * ProcessPerpustakaan::ProcessPerpustakaan
    * Constructor for ProcessPerpustakaan class
    *
    * @param $configObject object Configuration
    * @return void
    */
   function ProcessPerpustakaan($configObject, $security, $serviceAddress) 
   {
         ProcessBase::ProcessBase($configObject) ;
         $this->mServiceServerAddress = $serviceAddress;
         $this->mUserId= $security->mUserIdentity->GetProperty('UserReferenceId');
   }
   
   /**
      * ProcessPerpustakaan::DoPesanBuku
      * update nilai for kelas
      *
      * @param arrKrsItemId integer kelas id
      * @param arrNilai integer kelas id
      * @param arrIsMhsTambahan array flag 0|1 is mahasiswa tambahan
      * @return boolean hasil update
      */
   function DoPesanBuku($bukuId) 
   {
      $perpusServiceObj = new PerpustakaanClientService($this->mServiceServerAddress, false, $this->mUserId);      
      $result = $perpusServiceObj->DoPesanBuku($bukuId);
      if ($result === false) {
         $this->mProcessPerpustakaanError = $perpusServiceOb->GetProperty("ErrorMessages");
         return false;
      } else {
         return $result;
      }
   }
}