<?php

   /**
     * ProcessFaq
     * ProcessFaq Class
     * 
     * @package ProcessFaq
     * @author Gitra perdana
     * @copyright Copyright (c) 2006 GamaTechno
     * @version 1.0 
     * @date 2006-09-12
     * @revision 
     *
     */

   class ProcessFaq extends ProcessBase {

      var $mFaqObj;
      var $mErrorMessage;

      function ProcessFaq(&$configObject, &$security){
         ProcessBase::ProcessBase($configObject,$security);
         $this->mFaqObj = new Faq($this->mrConfig);
      }

      function AddFaq($question, $answer, $kategoriId, $tujuan){
         $this->mFaqObj->SetProperty('FaqQuestion', $question);
         $this->mFaqObj->SetProperty('FaqAnswer', $answer);
			$this->mFaqObj->SetProperty('FaqKategoriId', $kategoriId);
			$this->mFaqObj->SetProperty('FaqTujuan', $tujuan);
			$all = false;
			if (sizeof($tujuan) > 5) {
				$all = true;
			} else {
				foreach ($tujuan as $key=>$value) {
					if ($value == "all") {
						$all = true;
						break;
					}
				}
			}
			if ($all === true) {
				$this->mFaqObj->SetProperty('FaqIsPublic', true);
			} else{
				$this->mFaqObj->SetProperty('FaqTujuan', $tujuan);
			}
         if (false === $this->mFaqObj->DoAddFaq()) {
            $this->mErrorMessage = $this->mFaqObj->GetProperty('FaqErrorMessage');
            return false;
         } else {
            return true;
         }
      }

      function AddKategoriItem($nama, $keterangan){
         $this->mFaqObj->SetProperty('FaqKategoriNama', $nama);
         $this->mFaqObj->SetProperty('FaqKategoriKeterangan', $keterangan);
			if (false === $this->mFaqObj->DoAddFaqKategori()) {
            $this->mErrorMessage = $this->mFaqObj->GetProperty('FaqErrorMessage');
            return false;
         } else {
            return true;
         }
      }

      function UpdateFaq($id, $question, $answer, $kategoriId, $tujuan){
         $this->mFaqObj->SetProperty('FaqId', $id);
         $this->mFaqObj->SetProperty('FaqAnswer', $answer);
         $this->mFaqObj->SetProperty('FaqQuestion', $question);
			$this->mFaqObj->SetProperty('FaqKategoriId', $kategoriId);
			$this->mFaqObj->SetProperty('FaqTujuan', $tujuan);
			$all = false;
			if (sizeof($tujuan) > 5) {
				$all = true;
			} else {
				foreach ($tujuan as $key=>$value) {
					if ($value == "all") {
						$all = true;
						break;
					}
				}
			}
			//$this->mFaqObj->mDbConnection->debug = true;
			if ($all === true) {
				$this->mFaqObj->SetProperty('FaqIsPublic', true);
			} else{
				$this->mFaqObj->SetProperty('FaqTujuan', $tujuan);
			}
			
         if (false === $this->mFaqObj->DoUpdateFaq()) {
            $this->mErrorMessage = $this->mFaqObj->GetProperty('FaqErrorMessage');
            return false;
         } else {
            return true;
         }
      }

      function UpdateFaqKategori($id, $nama, $keterangan){
         $this->mFaqObj->SetProperty('FaqKategoriId', $id);
         $this->mFaqObj->SetProperty('FaqKategoriNama', $nama);
         $this->mFaqObj->SetProperty('FaqKategoriKeterangan', $keterangan);
			if (false === $this->mFaqObj->DoUpdateFaqKategori()) {
            $this->mErrorMessage = $this->mFaqObj->GetProperty('FaqErrorMessage');
            return false;
         } else {
            return true;
         }
      }

      function DeleteFaq($id){
         $this->mFaqObj->SetProperty('FaqId', $id);
         if (false === $this->mFaqObj->DoDeleteFaq()) {
            $this->mErrorMessage = $this->mFaqObj->GetProperty('FaqErrorMessage');
            return false;
         } else {
            return true;
         }
      }

      function DoDeleteFaqKategori($id){
         $this->mFaqObj->SetProperty('FaqKategoriId', $id);
         if (false === $this->mFaqObj->DoDeleteFaqKategori()) {
            $this->mErrorMessage = $this->mFaqObj->GetProperty('FaqErrorMessage');
            return false;
         } else {
            return true;
         }
      }


   }

?>