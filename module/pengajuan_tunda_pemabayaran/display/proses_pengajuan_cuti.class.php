<?php
/*
Author : Nikolius
Email : n1colius.lau@gmail.com
Date : 6/6/2014 5:30:02 PM
*/
class ProsesPengajuanCuti extends ProcessBase{

   var $mPengajuanCutiService;
   var $mUserIdentity;
   var $mSiaServer;

   function ProsesPengajuanCuti(&$configObject, $securityObj, $userId, $userRole){
      ProcessBase::ProcessBase($configObject);
      $this->mUserIdentity =  $securityObj->mUserIdentity;
      $this->mSiaServer = $this->mUserIdentity->GetProperty("ServerServiceAddress");

      $this->mPengajuanCutiService = new PengajuanCutiService($this->mSiaServer, false, $userId);
   }

   function validasiForm($varPost){
      $isValid = TRUE;
      $pesan = '';

      if($varPost['semesterId'] == ''){
         $pesan .= 'Semester belum dipilih<br />';
         $isValid = FALSE;
      }

      if($varPost['sebabCutiId'] == ''){
         $pesan .= '&nbsp;Sebab Cuti belum dipilih<br />';
         $isValid = FALSE;
      }

      if($isValid === FALSE){
         $_SESSION['isFormValid'] = 'tidak';
         $_SESSION['pesanFormValid'] = $pesan;
      }
      return $isValid;
   }

   function insertPengajuanCuti($varPost){
      return $this->mPengajuanCutiService->insertPengajuanCuti($varPost);
   }

   function updatePengajuanCuti($varPost){
      return $this->mPengajuanCutiService->updatePengajuanCuti($varPost);
   }

   function hapusPengajuanCuti($idHapus){
      return $this->mPengajuanCutiService->hapusPengajuanCuti($idHapus);
   }
}
?>