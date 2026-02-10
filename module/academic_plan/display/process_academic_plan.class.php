<?php

   /**
     * ProcessAcademicPlan
     * ProcessAcademicPlan class
     * 
     * @package ProcessAcademicPlan
     * @author Yudhi Aksara, S.Kom
     * @copyright Copyright (c) 2006 GamaTechno
     * @version 1.0 
     * @date 2006-02-10
     * @revision Maya Alipin 2006-03-21 
     *
     */
   class ProcessAcademicPlan extends ProcessBase
   {
      /**
        * var $mDataAcademicPlan arrData(message.class)
        */
      var $mDataAcademicPlan;
      
      /**
        * var $mProcessAcademicPlanError string Process Error AcademicPlan
        */
      var $mProcessAcademicPlanError;
      
      var $mMahasiswaNiu;
      var $mMahasiswaProdiId;
      var $mView; #add ccp 10-2-2020
      var $mUserIdentity;
      /**
        * ProcessAcademicPlan::ProcessAcademicPlan
        * Constructor for ProcessAcademicPlan Class
        *
        * @param $configObject object Configuration
        * @return void
        */
      function ProcessAcademicPlan(&$configObject,$security, $mhsNiu, $prodiId, $sia, $view) #update ccp 10-2-2020
      {
         ProcessBase::ProcessBase($configObject);
         $this->mMahasiswaNiu = $mhsNiu;
         $this->mMahasiswaProdiId = $prodiId;
         $this->mUserIdentity = $security->mUserIdentity;
         if ($sia == "") {
            $sia = $this->mUserIdentity->GetProperty("ServerServiceAddress");
         }
         $this->mDataAcademicPlan = New AcademicPlanClientService($sia, false, $this->mMahasiswaNiu, $this->mMahasiswaProdiId);
         $this->mDataAcademicPlan->SetProperty("UserRole", '1');
         $this->mDataAcademicPlan->DoSiaSetting();
	 $this->mView = $view; #add ccp 10-2-2020
      }
      
      /**
        * ProcessAcademicPlan::SetAttributes
        * Set Attributes
        *
        * @param $arrAttributes array Attributes for SetProperty
        * @return 
        */
      function SetAttributes($arrAttributes)
      {
         foreach($arrAttributes as $key => $value) {
            $this->mDataAcademicPlan->SetProperty($key, $value);
         }
      }
      
      /**
        * ProcessAcademicPlan::AddKrsItem
        * Add AcademicPlan
        *
        * @param $arrDataKrs array Kode Mata Kuliah yang diambil
        * @return boolean
        */
      function AddKrsItem($krsItems)
      {
         // proses penambahan krs dipanggil disini
         // pastikan anda telah meset seluruh property dari kelas communication anda
         $this->mDataAcademicPlan->SetProperty("KrsItem", $krsItems);
         $this->mDataAcademicPlan->SetProperty("AplPengubahItem", $this->mUserIdentity->GetProperty("ApplicationId"));
         $this->mDataAcademicPlan->SetProperty("UserNamaPengubahItem", $this->mUserIdentity->GetProperty("User"));
         $this->mDataAcademicPlan->SetProperty("UserProfilPengubahItem", $this->mUserIdentity->GetProperty("UserFullName"));
	 $this->mDataAcademicPlan->SetProperty("View", $this->mView); #add ccp 10-2-2020

         $result = $this->mDataAcademicPlan->DoAddKrsProcess($krsItems);
         if ($result === false) {
            // berarti bukan periode krs`
            $this->SetProperty("ProcessAcademicPlanError", "Tidak dapat merubah KRS, bukan masa KRS atau revisi." . $this->mDataAcademicPlan->GetProperty("ErrorMessages"));
            return false;
         } else {
            return $result;
         }
      }
      
      /**
        * ProcessAcademicPlan::DeleteKrsItem
        * Delete AcademicPlan
        *
        * @param $arrDataKrs  kode Mata Kuliah yang dihapus
        * @return boolean
        */
      function DeleteKrsItem($arrDataKrs)
      {
         // proses delete krs dipanggil di sini
         $krsItems = array();
         foreach ($arrDataKrs as $krsId) {
            $krsItems[] = $this->mrConfig->Dec($krsId);
         }
         $this->mDataAcademicPlan->SetProperty("KrsItem", $krsItems);
         $this->mDataAcademicPlan->SetProperty("AplPengubahItem", $this->mUserIdentity->GetProperty("ApplicationId"));
         $this->mDataAcademicPlan->SetProperty("UserNamaPengubahItem", $this->mUserIdentity->GetProperty("User"));
         $this->mDataAcademicPlan->SetProperty("UserProfilPengubahItem", $this->mUserIdentity->GetProperty("UserFullName"));
         $result = $this->mDataAcademicPlan->DoDeleteKrsItem();
         if (false === $result) {
            $this->SetProperty("ProcessAcademicPlanError", $this->mDataAcademicPlan->GetProperty("ErrorMessages"));
            return false;
         }
         else {
            return $result;
         }
      }
      
      
   function SetKrsApprove($approval) {
      if (empty($approval)) {
         if ($this->mDataAcademicPlan->mCurrentPeriode == "REVISIKRS") {
            $approval = 2;
         } else {
            $approval = 1;
         }
      } else {
         $approval = 0;
      }
      
      $this->mDataAcademicPlan->SetProperty("KrsId", $this->mDataAcademicPlan->GetKrsIdMahasiswaForSemester());
      
      $this->mDataAcademicPlan->SetProperty("AplPengubahItem", $this->mUserIdentity->GetProperty("ApplicationId"));
      $this->mDataAcademicPlan->SetProperty("UserNamaPengubahItem", $this->mUserIdentity->GetProperty("User"));
      $this->mDataAcademicPlan->SetProperty("UserProfilPengubahItem", $this->mUserIdentity->GetProperty("UserFullName"));
      
      $this->mDataAcademicPlan->DoSetKrsApproval($approval);
      if (false === $result) {
         $this->SetProperty("ProcessAcademicPlanError", $this->mDataAcademicPlan->GetProperty("ErrorMessages"));
         return false;
      } else {
         return $result;
      }
   }
   
   function CancelKrsRevision($approval) {
      if (empty($approval)) {
         if ($this->mDataAcademicPlan->mCurrentPeriode == "REVISIKRS") {
            $approval = 2;
         } else {
            $approval = 1;
         }
      } else {
         $approval = 0;
      }
      
      $this->mDataAcademicPlan->SetProperty("KrsId", $this->mDataAcademicPlan->GetKrsIdMahasiswaForSemester());
      $result = $this->mDataAcademicPlan->DoCancelKrsRevision($approval);
      
      if (false === $result) {
         $this->SetProperty("ProcessAcademicPlanError", $this->mDataAcademicPlan->GetProperty("ErrorMessages"));
         return false;
      } else {
         return $result;
      }
   }

   function RemedialKrsItem($arrDataKrs,$krsId)
      {
         // proses remedial krs dipanggil di sini
         $krsItems = array();
         foreach ($arrDataKrs as $krsId) {
            $krsItems[] = $this->mrConfig->Dec($krsId);
         }
         $this->mDataAcademicPlan->SetProperty("KrsItem", $krsItems);
         $this->mDataAcademicPlan->SetProperty("AplPengubahItem", $this->mUserIdentity->GetProperty("ApplicationId"));
         $this->mDataAcademicPlan->SetProperty("UserNamaPengubahItem", $this->mUserIdentity->GetProperty("User"));
         $this->mDataAcademicPlan->SetProperty("UserProfilPengubahItem", $this->mUserIdentity->GetProperty("UserFullName"));
         $result = $this->mDataAcademicPlan->DoRemedialKrsItem($krsId);
         if (false === $result) {
            $this->SetProperty("ProcessAcademicPlanError", $this->mDataAcademicPlan->GetProperty("ErrorMessages"));
            return false;
         }
         else {
            return $result;
         }
      }

}
?>