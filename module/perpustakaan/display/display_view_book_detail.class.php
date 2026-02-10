<?php
/**
 * DisplayViewBookDetail
 * DisplayViewBookDetail class
 * 
 * @package perpustakaan
 * @author Maya Alipin 
 * @copyright Copyright (c) 2006 GamaTechno
 * @version 1.0 
 * @date 2006-05-01
 * @revision 
 *
 */
 
class DisplayViewBookDetail extends DisplayBaseFull {
   var $mPerpustakaanService;
   var $mBukuId;
   var $mErrorMessage;
   var $mStartKatalog;
   var $mKeySearch;
   
   /**
    * DisplayViewPerpustakaanHome::DisplayViewPerpustakaanHome
    * constructor DisplayViewPerpustakaanHome class
    *
    * @param configObject Configuration object
    * @param security Security object
    * @param userRole integer user role id
    * @param userId inetger reference user 
    */
   function DisplayViewBookDetail(&$configObject, &$security, $bukuId, $serviceAddr, $start, $key) {
      DisplayBaseFull::DisplayBaseFull($configObject, $security);
      $this->mPerpustakaanService = $serviceAddr;
      $this->mStartKatalog = $start;
      $this->mKeySearch = $key;
      $this->mBukuId = $bukuId;   
      $this->SetErrorAndEmptyBox();  
      $this->SetTemplateBasedir($configObject->GetValue('app_module') . 'perpustakaan/templates/');
      $this->SetTemplateFile('view_book_detail.html');
   }
   
   function GetBukuDetail ($kodeBuku) {
      $perpusServiceObj = new PerpustakaanClientService($this->mPerpustakaanService, false, $this->mrUserSession->GetProperty('UserReferenceId'));      
      if ($perpusServiceObj->IsError()) {
         $this->mErrorMessage .= $this->mObjProposedClasses->GetProperty("ErrorMessages");
         return  false;
      } else {
         $detailBuku = $perpusServiceObj->GetKatalogDetail($kodeBuku);   
         $this->DoUpdateServiceStatus($perpusServiceObj, $detailBuku, 'Perpustakaan');
         if (empty($detailBuku)) {
            $this->mErrorMessage .= $perpusServiceObj->GetProperty("ErrorMessages");
            return false;
         } else {
            return $detailBuku;   
         }
      }
   }
   
   function Display() {
      
      $bukuDetail = $this->GetBukuDetail($this->mBukuId);
      DisplayBaseFull::Display("[ Logout ]");
      $this->AddVar('content', 'URL_BACK', $this->mrConfig->GetURL('perpustakaan','perpustakaan','process'));
      $this->AddVar('content', 'SERVICE_ADDR',$this->mrConfig->Enc($this->mPerpustakaanService));
      $this->AddVar('content', 'START_RECORD', $this->mStartKatalog); 
      $this->AddVar('content', 'KEY_SEARCH', $this->mKeySearch); 
      if (!empty($bukuDetail)) {
         $this->ParseData('content', $bukuDetail, 'BUKU_');
      }
      $this->DisplayTemplate();
      /*
      buku_id AS kode_buku, 
                  b.judul AS judul, 
                  b.entri_utama AS pengarang, 
                  b.entri_tambahan AS pengarang_tambahan, 
                  b.penerbit AS penerbit, 
                  b.edisi AS edisi, 
                  b.tahun AS tahun, 
                  b.isbn AS isbn, 
                  b.klasifikasi_no AS nomor_klasifikasi, 
                  b.subyek AS subyek, 
                  g.golongan AS golongan, 
                  bhs.bahasa AS bahasa,
                  (SELECT count(*) FROM buku_eksemplar WHERE buku_id = \''. $kodeBuku .'\') AS jumlah_eksemplar,
                  (SELECT count(*) FROM buku_eksemplar WHERE buku_id = \''. $kodeBuku .'\' AND terpinjam IS true) AS jumlah_terpinjam,
                  (SELECT count(*) FROM buku_eksemplar WHERE buku_id = \''. $kodeBuku .'\')-(SELECT count(*) FROM buku_eksemplar WHERE buku_id = \''. $kodeBuku .'\' AND terpinjam IS true) AS jumlah_tersedia
      */
      
      
   }
}
 
 
?>