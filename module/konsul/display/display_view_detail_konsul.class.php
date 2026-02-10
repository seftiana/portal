<?php

   /**
     * DisplayViewDetailKonsul
     * Display Class for View Detail Konsul
     * 
     * @package DisplayViewDetailKonsul
     * @author Yudhi Aksara, S.Kom
     * @copyright Copyright (c) 2006 GamaTechno
     * @version 1.0 
     * @date 2006-02-10
     * @revision 
     *
     */
   class DisplayViewDetailKonsul extends DisplayBaseFull
   {
      /**
        * var $mMessageId integer Id Konsul
        */
      var $mMessageId;
      
      /**
        * var $mDataMessage array Data Konsul
        */
      var $mDataMessage;
      
      /**
        * var $mMessageType string Tipe Konsul (Inbox, Sent, Trash)
        */
      var $mMessageType;
      
      /**
        * var $mErrorMessage string Error Konsul 
        */
      var $mErrorMessage;
      
      /**
        * var $mErrorType string Tipe Error Konsul 
        */
      var $mErrorType;
      
      /**
        * DisplayViewDetailKonsul::DisplayViewDetailKonsul
        * Constructor for Class DisplayViewDetailKonsul
        *
        * @param $configObject object Configuration
        * @param $security object Security
        * @param $messageType string Tipe Konsul (Inbox, Sent, Trash)
        * @param $msgId integer Id Konsul
        * @return void
        */
      function DisplayViewDetailKonsul(&$configObject, &$security, $msgId, $msgType, $errAddrBook, $errType)
      {
         DisplayBaseFull::DisplayBaseFull($configObject, $security);
         $this->mDataMessage = New Konsul($this->mrConfig);
         $this->mMessageId = $msgId;
         $this->mMessageType = $msgType;
         $this->mErrorMessage = $errAddrBook;
         $this->mErrorType = $errType;
         
          //set template untuk error dan empty box DisplayBase::SetErrorAndEmptyBox
         $this->SetErrorAndEmptyBox();
         //set template untuk navigasi DisplayBase::SetNavigationTemplate
         $this->SetNavigationTemplate();
         
         $this->SetTemplateBasedir($this->mrConfig->GetValue('app_module') . 'konsul/templates/');
         $this->SetTemplateFile('view_detail_konsul.html');
      }
      
      /**
        * DisplayViewDetailKonsul::Display
        * Parsing Data to Template
        *
        * @param
        * @return void
        */
      function Display()
      {
         DisplayBaseFull::Display('[ Logout ]');
         $this->AddVar("content", "APPLICATION_MODULE", 'Kotak Konsultasi');
         $this->AddVar("content", "APPLICATION_SUBMODULE", 'Detail Konsultasi');
         
         if(!empty($this->mErrorMessage)) {
            // pending untuk menampilkan jika menambah ke address booknya gagal
            $this->SetAttribute('error_box','visibility','visible');
            $this->AddVar('error_type', 'TYPE', strtoupper($this->mErrorType));
            $err = explode('|',$this->mErrorMessage);
            $errorSystem= $err[1];
            if ($err[0] == 'tambah') {
               if ($err[1] == "")
                  $error = "Berhasil menambah data kontak.";
               else
                  $error = "Tidak berhasil menambah data kontak.";
            }
            elseif ($err[0] == 'validasi_tambah') {
                  $error = "Data sudah ada di dalam data kontak.";
            }
   
            $this->AddVar('error_box', 'ERROR_MESSAGE', $this->ComposeErrorMessage($error, $errorSystem));
         }
         
         if (!empty($this->mMessageId)) {
            $this->mDataMessage->SetProperty("MessageId", $this->mMessageId);	
            
            if ($this->mMessageType == "inbox") {
               // isikan pesanWaktuBaca dengan waktu membuka Detail Pesan
               $updateReadTime = $this->mDataMessage->DoUpdateReadMessageTime();
               // tampilkan tombol Reply
               $this->SetAttribute('reply', 'visibility', 'visible');
            }
            
            $detailMessage = $this->mDataMessage->GetDetailMessageItem();
            //echo "<pre>"; print_r($detailMessage);echo "</pre>";
            if (false === $detailMessage) {
               $this->AddVar("message_detail","IS_EMPTY","YES");
               $this->AddVar("message_detail","ERROR_MESSAGE", $this->mDataMessage->GetProperty("MessageErrorMessage"));
               $this->AddVar("message_detail","TYPE",$this->mrConfig->Enc($this->mMessageType));
               //$this->AddVar("message_detail","URL_KEMBALI",$this->mrConfig->GetURL('konsul','konsul','view') . "&msgType=". $this->mrConfig->Enc($this->mMessageType));
            }
            else {
               $this->AddVar("message_detail","IS_EMPTY","NO");
               // proses tanggal kirim
               if($detailMessage[0]['IdPengirim'] == $this->mrUserSession->mUser){
                    $this->SetAttribute('tombol_penerima', 'visibility', 'visible');
               }
               else {
                     $this->SetAttribute('tombol_pengirim', 'visibility', 'visible');
               }
               $tmpKirim = explode(" ", $detailMessage[0]['WaktuKirim']);
               if ($tmpKirim[0] != '')
                  $tmpTglKirim = $this->IndonesianDate($tmpKirim[0]);
               else
                  $tmpTglKirim = '--';
               $detailMessage[0]['WaktuKirim'] = $tmpTglKirim;
               
               // cek apakah pesan sudah masuk trash atau belum
               if (!empty($detailMessage[0]['WaktuHapus'])) {
                  // proses tanggal hapus
                  $tmpHapus = explode(" ", $detailMessage[0]['WaktuHapus']);
                  if ($tmpHapus[0] != '')
                     $tmpTglHapus = $this->IndonesianDate($tmpHapus[0]);
                  else
                     $tmpTglHapus = '--';
                  $detailMessage[0]['WaktuHapus'] = $tmpTglHapus;
               }
               $detailMessage[0]['Isi'] = nl2br($detailMessage[0]['Isi']);
               $detailMessage[0]['Type'] = $this->mrConfig->Enc($this->mMessageType);
               $detailMessage[0]['url_Kembali'] = $this->mrConfig->GetURL('konsul','konsul','view') . "&msgType=". $this->mrConfig->Enc($this->mMessageType);
               //$detailMessage[0]['url_action'] = $this->mrConfig->GetURL('konsul','konsul','process');
            
               $this->ParseData("message_detail", $detailMessage, "MSG_");
               $this->AddVar("content","URL_ACTION",$this->mrConfig->GetURL('konsul','konsul','process'));
            }
         }
         $this->DisplayTemplate();
      }
   }
?>