<?php
/**
 * DisplayViewPerpustakaanHome
 * DisplayViewPerpustakaanHome class
 * 
 * @package perpustakaan 
 * @author Maya Alipin 
 * @copyright Copyright (c) 2006 GamaTechno
 * @version 1.0 
 * @date 2006-04-28
 * @revision 
 *
 */
 
class DisplayViewPerpustakaanHome extends DisplayBaseFull {
   var $mView;
   var $mPerpustakaanService;
   var $mErrorMessage;
   var $mMessage;
   var $mStartKatalog;
   var $mKeySearch;
   var $mRecordCount ;
   
   /**
    * DisplayViewPerpustakaanHome::DisplayViewPerpustakaanHome
    * constructor DisplayViewPerpustakaanHome class
    *
    * @param configObject Configuration object
    * @param security Security object
    * @param view string what to view
    * @param perpustakaanService string alamat service perpustakaan
    * @param start starting record
    * @param key string kata kunci buku yang dicari
    */
   function DisplayViewPerpustakaanHome(&$configObject, &$security, $view, $perpustakaanService, $start, $key, $msg, $err) {
      DisplayBaseFull::DisplayBaseFull($configObject, $security);
      $this->mView = $view;
      $this->mPerpustakaanService = $perpustakaanService;
      $this->mStartKatalog = $start;
      $this->mKeySearch = $key;
      $this->mRecordCount = 15;
      if ($err === true) {
         $this->mErrorMessage = $msg;
      }else {
         $this->mMessage = $msg;
      }
      $this->SetErrorAndEmptyBox();  
      $this->SetTemplateBasedir($configObject->GetValue('app_module') . 'perpustakaan/templates/');
      $this->SetTemplateFile('view_perpustakaan_home.html');
   }
   
   /**
    * DisplayViewPerpustakaanHome::GetPerpustakaanUnitList
    * mengambil list unit perpustakaan yang dapat diakses oleh user
    *
    * @param
    * @return array unit
    */     
   function GetPerpustakaanUnitList($curServer) {
      $referenceObj = new Reference($this->mrConfig) ;      
      $unit = $referenceObj->GetAllUnitData('108');
      if ($unit !== false) {                     
         foreach($unit as $key=>$value) {
            if ($value["service_address"] == $curServer){
               $unit[$key]["selected"] = "selected";
            }else {
               $unit[$key]["selected"] = "";
            }
            $unit[$key]["service_address"] = $this->mrConfig->Enc($value["service_address"]);
         }
      }
      return $unit;
   }

   /**
    * DisplayViewPerpustakaanHome::ShowErrorBox
    * function for displaying error box into a template
    */
   function ShowErrorBox ($strError = "Pengambilan informasi perpustakaan gagal.") {
      $this->AddVar("error_box", "ERROR_MESSAGE", $this->ComposeErrorMessage($strError , $this->mErrorMessage));   
      $this->SetAttribute('error_box', 'visibility', 'visible');
      $this->SetAttribute('error_utama', 'visibility', 'visible');
   }
      
   function ShowBukuDipinjam (&$PerpusServiceObj) {
      $this->SetAttribute('view_buku_dipinjam', 'visibility', 'visible');
      //ambil buku yang sedang dipinjam
      $bukuDipinjam = $PerpusServiceObj->GetBukuTerpinjam();

      if (!empty($bukuDipinjam)) {
         $this->AddVar('buku_dipinjam', 'BUKU_DIPINJAM_ISEMPTY', 'NO');
         $this->ParseData('buku_dipinjam_item', $bukuDipinjam, 'BUKU_', 1);
      } else {
         $this->AddVar('buku_dipinjam', 'BUKU_DIPINJAM_ISEMPTY', 'YES');
         $this->AddVar("empty_box", 'WARNING_MESSAGE', 'Tidak ada buku yang sedang di pinjam');   
         $this->AddVar('empty_type', 'TYPE', 'INFO');
         $this->SetAttribute('empty_box', 'visibility', 'visible');
      }
      $this->AddVar('view_buku_dipinjam', 'URL_HISTORY', $this->mrConfig->GetURL('perpustakaan','perpustakaan_home','view') . 
                              '&serv=' . $this->mrConfig->Enc($this->mPerpustakaanService) . '&view=' . $this->mrConfig->Enc('history'));
      $this->AddVar('view_buku_dipinjam', 'URL_PESAN_BUKU', $this->mrConfig->GetURL('perpustakaan','perpustakaan_home','view') . 
                              '&serv=' . $this->mrConfig->Enc($this->mPerpustakaanService) . '&view=' . $this->mrConfig->Enc('pesan'));
   }
      
   function ShowHistoryPinjam(&$PerpusServiceObj) {
      $this->SetAttribute('view_history', 'visibility', 'visible');
      //ambil buku yang sedang dipinjam
      $historyPinjam = $PerpusServiceObj->GetHistoryPinjam();

      if (!empty($historyPinjam)) {
         $this->AddVar('history', 'HISTORY_ISEMPTY', 'NO');
         $this->ParseData('history_item', $historyPinjam, 'BUKU_', 1);
      } else {
         $this->AddVar('history', 'HISTORY_ISEMPTY', 'YES');
         $this->AddVar("empty_box", 'WARNING_MESSAGE', 'TIdak ada history buku.');   
         $this->AddVar('empty_type', 'TYPE', 'INFO');
         $this->SetAttribute('empty_box', 'visibility', 'visible');
      }
      $this->AddVar('view_history', 'URL_VIEW', $this->mrConfig->GetURL('perpustakaan','perpustakaan_home','view') . 
                              '&serv=' . $this->mrConfig->Enc($this->mPerpustakaanService) . '&view=' . $this->mrConfig->Enc('view'));
      
   }
      
   function ShowKatalogBuku(&$PerpusServiceObj) {
      $this->SetAttribute('view_katalog_buku', 'visibility', 'visible');
      //ambil buku yang sedang dipinjam
      $katalog = $PerpusServiceObj->GetKatalogBuku($this->mKeySearch, $this->mStartKatalog, $this->mRecordCount);
      if ($this->mMessage != "") {
         $this->AddVar("error_box", "ERROR_MESSAGE", $this->ComposeErrorMessage($this->mMessage, $this->mErrorMessage));   
         $this->SetAttribute('error_box', 'visibility', 'visible');
         $this->AddVar('error_type', 'type', 'INFO');
      } else if ($this->mErrorMessage != "") {
         $this->AddVar("error_box", "ERROR_MESSAGE", $this->ComposeErrorMessage($this->mErrorMessage, $this->mErrorMessage));   
         $this->SetAttribute('error_box', 'visibility', 'visible');
      }

      if (!empty($katalog)) {
         $this->AddVar('katalog_buku', 'KATALOG_ISEMPTY', 'NO');
         foreach ($katalog as $key=>$value) {
            $urlAdditional  = '&serv=' . $this->mrConfig->Enc($this->mPerpustakaanService) . '&buku=' . $this->mrConfig->Enc($value['kode_buku']);
            $katalog[$key]["url_detil"] = $this->mrConfig->GetURL('perpustakaan','book_detail','view') .
                                                          $urlAdditional . '&start=' . $this->mrConfig->Enc($this->mStartKatalog).
                                                          '&cari=' . $this->mrConfig->Enc($this->mKeySearch);
            $katalog[$key]["url_pesan"] = $this->mrConfig->GetURL('perpustakaan','perpustakaan','process') .
                                                           '&act=' . $this->mrConfig->Enc('pesanbuku') . $urlAdditional;
         }
         $this->ParseData('katalog_item', $katalog, 'BUKU_', ($this->mStartKatalog+1));
      } else {
         $this->AddVar('katalog_buku', 'KATALOG_ISEMPTY', 'YES');
         $this->AddVar("empty_box", 'WARNING_MESSAGE', 'Tidak ada katalog buku.');   
         $this->AddVar('empty_type', 'TYPE', 'INFO');
         $this->SetAttribute('empty_box', 'visibility', 'visible');
      }
      $strUrl = $this->mrConfig->GetURL('perpustakaan','perpustakaan_home','view') . 
                        '&serv=' . $this->mrConfig->Enc($this->mPerpustakaanService);
      $this->AddVar('view_katalog_buku', 'KEY_SEARCH', $this->mKeySearch);
      $this->AddVar('view_katalog_buku', 'URL_VIEW', $strUrl . '&view=' . $this->mrConfig->Enc('view'));
      $this->AddVar('view_katalog_buku', 'URL_PROCESS', $this->mrConfig->GetURL('perpustakaan','perpustakaan','process'));
      $this->AddVar('view_katalog_buku', 'SERV_ADDRESS', $this->mrConfig->Enc($this->mPerpustakaanService));
      $prev = $this->mStartKatalog - $this->mRecordCount;
      if ($prev < 0) {
         $prev = 0;
      }
      $next = $this->mStartKatalog + $this->mRecordCount;
      if (sizeof($katalog) < $this->mRecordCount) {
         $next = $this->mStartKatalog;
      }
      $strUrl .= '&cari=' . $this->mrConfig->Enc($this->mKeySearch) . '&view=' . $this->mrConfig->Enc('pesan') ;
      $this->AddVar('katalog_buku', 'URL_PREV', $strUrl . '&prev=' . $this->mrConfig->Enc($prev));
      $this->AddVar('katalog_buku', 'URL_NEXT', $strUrl . '&next=' . $this->mrConfig->Enc($next));
   }
      
   function GetStatusAnggota(&$perpusServiceObj ) {
      $statusAnggota = $perpusServiceObj->GetStatusAnggota();
		$this->DoUpdateServiceStatus($perpusServiceObj, $statusAnggota, 'Perpustakaan');
      if (empty($statusAnggota)) {
         $this->mErrorMessage .= $perpusServiceObj->GetProperty("ErrorMessages");
         return false;
      } else {
         return $statusAnggota;   
      }
   }
      
   /**
    * DisplayViewPerpustakaanHome::Display
    * function for parsing data into template and view it to user
    */
   function Display() {
      $perpusServiceObj = new PerpustakaanClientService($this->mPerpustakaanService, false, $this->mrUserSession->GetProperty('UserReferenceId'));      
      
      if ($perpusServiceObj->IsError()) {
         $this->mErrorMessage .= $this->mObjProposedClasses->GetProperty("ErrorMessages");
         $unitPerpus = false;
      } else {
         //ambil status anggota
         $statusAnggota = $this->GetStatusAnggota($perpusServiceObj);
         $unitPerpus = $this->GetPerpustakaanUnitList($this->mPerpustakaanService);
      }
      DisplayBaseFull::Display("[ Logout ]");
      
      if ($unitPerpus !== false){
         $this->SetAttribute('unit','visibility', 'visible' );
         $this->AddVar('unit', 'URL_VIEW', $this->mrConfig->GetURL('perpustakaan','perpustakaan','process'));
         if ($this->mView == "") {
            $act = "view";
         } else {
            $act = $this->mView;
         }
         $this->AddVar('unit', 'ACT', $act);
         $this->ParseData('unit_list', $unitPerpus, 'UNIT_');
         if ($this->mPerpustakaanService!='') {
            $perpus = array();
            if (!empty($statusAnggota)) {
               $perpus[0]['status_anggota'] = $statusAnggota['status'];
               $perpus[0]['nama'] = $statusAnggota['nama_perpustakaan'];
            }
            
            //ambil status bebas pinjam
            $statusBebasPinjam = $perpusServiceObj->GetStatusBebasPinjam();
            if (!empty($statusBebasPinjam)) {
               if ($statusAnggota['status'] != "tidak terdaftar.") {
                  if ($statusBebasPinjam['status'] == 'true') {
                     $perpus[0]['status_bebaspinjam'] = 'bebas pinjam';
                  } else {
                     $perpus[0]['status_bebaspinjam'] = 'belum bebas pinjam';
                  }
               } else {
                  $perpus[0]['status_bebaspinjam'] = '-';
               }
            }
            
            if ($statusAnggota['status'] != 'tidak terdaftar.') {
               if ($this->mView == "history") {
                  $this->ShowHistoryPinjam($perpusServiceObj);
               } else if ($this->mView == "pesan") {
                  $this->ShowKatalogBuku($perpusServiceObj);
               } else {
                  $this->ShowBukuDipinjam($perpusServiceObj);
               }
            } 
            $this->SetAttribute('data_perpustakaan', 'visibility', 'visible');
            
            $this->ParseData('data_perpustakaan', $perpus, 'PERPUS_');
         }
      } else {
         $this->ShowErrorBox("Pengambilan informasi unit perpustakaan gagal.");
      }
      $this->DisplayTemplate();
   } 
     
}
?>