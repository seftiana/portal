<?php

   /**
     * DisplayViewAduan
     * Display Class for View Message
     * 
     * @package DisplayViewAduan
     * @author Yudhi Aksara, S.Kom
     * @copyright Copyright (c) 2006 GamaTechno
     * @version 1.0 
     * @date 2006-02-10
     * @revision 
     *
     */
   class DisplayViewAduan extends DisplayBaseFull
   {
      /**
        * var $mMessageType string Tipe Message (Inbox, Sent, Trash)
        */
      var $mMessageType;
      
      /**
        * var $mDataMessage array Data Message
        */
      var $mDataMessage;
      
      /**
        * var $mErrorMessage string Error Message saat Hapus Message
        */
      var $mErrorMessage;
      
      /**
        * var $mErrorType string Tipe Error Message saat Hapus Message
        */
      var $mErrorType;
      
      /**
        * var $mPage integer Page Message
        */
      var $mPage;
      
      /**
        * var $mNumRecordPerPage integer Jumlah Record per Page
        */
      var $mNumRecordPerPage;
      
      /**
        * DisplayViewAduan::DisplayViewAduan
        * Constructor for Class DisplayViewAduan
        *
        * @param $configObject object Configuration
        * @param $security object Security
        * @param $messageType string Tipe Message (Inbox, Sent, Trash)
        * @param $page integer Page Message
        * @return void
        */
      function DisplayViewAduan(&$configObject, &$security, $msgType, $errMsg, $errType, $page)
      {
         DisplayBaseFull::DisplayBaseFull($configObject, $security);
         $this->mDataMessage = New Message($this->mrConfig);
         $this->mMessageType = $msgType;
         $this->mErrorMessage = $errMsg;
         $this->mErrorType = $errType;
         $this->mPage = $page;
         $this->mNumRecordPerPage = 15;
         
         //set template untuk error dan empty box DisplayBase::SetErrorAndEmptyBox
         $this->SetErrorAndEmptyBox();
         //set template untuk navigasi DisplayBase::SetNavigationTemplate
         $this->SetNavigationTemplate();
         
         $this->SetTemplateBasedir($this->mrConfig->GetValue('app_module') . 'message/templates/');
         $this->SetTemplateFile('view_aduan.html');
      }
      
      /**
        * DisplayViewAduan::Display
        * Parsing Data to Template
        *
        * @param 
        * @return void
        */
      function Display()
      {
         DisplayBaseFull::Display('[ Logout ]');
         $this->AddVar("content", "APPLICATION_MODULE", 'Aduan Akreditasi');
         $judul = "Diterima";
         if ($this->mMessageType == 'diproses') {
            $judul = "Sedang Proses";
         } elseif ($this->mMessageType == 'keputusan') {
            $judul = "Keputusan";
         } 
         $this->AddVar("content", "APPLICATION_SUBMODULE", 'Daftar Aduan ' . $judul);
         
         $this->mDataMessage->SetProperty("MessageReceiver", $this->mrUserSession->GetProperty("User"));
         $this->mDataMessage->SetProperty("MessageSender", $this->mrUserSession->GetProperty("User"));
         
         // tampilkan error message jika ada
         if (!empty($this->mErrorMessage)) {
            $this->SetAttribute('error_box', 'visibility', 'visible');
            $this->AddVar('error_type', 'TYPE', strtoupper($this->mErrorType));
            $temp = explode ('|', $this->mErrorMessage);
            $errorSystem= $temp[1];
            if ($temp[0] == 'compose') {
               if ($temp[1] == "")
                  $error = "Pengiriman pesan berhasil dilakukan.";
               else
                  $error = "Pengiriman pesan tidak berhasil..";
            } elseif ($temp[0] == 'delete') {
               if ($temp[1] == "")
                  $error = "Berhasil menghapus pesan.";
               else
                  $error = "Pesan tidak berhasil dihapus.";
            }
            $this->AddVar('error_box', 'ERROR_MESSAGE', $this->ComposeErrorMessage($error, $errorSystem));
         }
         // echo"<pre>";print_r($this->mrUserSession);echo "</pre>";
         // ambil jumlah message di inbox(baru dan total), sent dan trash
         $jumlahInbox = $this->mDataMessage->GetCountaAduan('Diterima');
         if (false == $jumlahInbox)
            $jumlahInbox = 0;
			$jumlahSent = $this->mDataMessage->GetCountaAduan('Sedang Proses');
         if (false == $jumlahSent)
            $jumlahSent = 0;
			$jumlahTrash = $this->mDataMessage->GetCountaAduan('Keputusan');
         if (false == $jumlahTrash)
            $jumlahTrash = 0;
         
         $this->AddVar("content", "URL_INBOX",$this->mrConfig->GetURL('message','aduan','view') . "&msgType=".$this->mrConfig->Enc('diterima'));
         $this->AddVar("content", "URL_SENT",$this->mrConfig->GetURL('message','aduan','view') . "&msgType=".$this->mrConfig->Enc('diproses'));
         $this->AddVar("content", "URL_TRASH",$this->mrConfig->GetURL('message','aduan','view') . "&msgType=".$this->mrConfig->Enc('keputusan'));
         $this->AddVar("content","URL_COMPOSE", $this->mrConfig->GetURL('message','message','process'));
         $this->AddVar("content", "JML_INBOX", $jumlahInbox);
         $this->AddVar("content", "JML_SENT", $jumlahSent);
         $this->AddVar("content", "JML_TRASH", $jumlahTrash);
         
         $start_record = ($this->mPage*$this->mNumRecordPerPage)-($this->mNumRecordPerPage);

         if (isset($this->mMessageType)) {
            switch ($this->mMessageType) {
               case "diterima":
                  $data = $this->mDataMessage->GetAllInboxAduanItem($start_record, $this->mNumRecordPerPage,'Diterima');
                  $this->AddVar("message", "TANGGAL", "Tanggal");
                  $recordcount = $jumlahInbox;
                  $header = 'Diterima';
                  break;
               case "diproses":
                  $data = $this->mDataMessage->GetAllInboxAduanItem($start_record, $this->mNumRecordPerPage,'Sedang Proses');
                  $this->AddVar("message", "TANGGAL", "Tanggal");
                  $recordcount = $jumlahSent;
                  $header = 'diproses';
                  break;
               case "keputusan":
                  $data = $this->mDataMessage->GetAllInboxAduanItem($start_record, $this->mNumRecordPerPage,'Keputusan');
                  $this->AddVar("message", "TANGGAL", "Tanggal");
                  $recordcount = $jumlahTrash;
                  $header = 'keputusan';
                  break;
            }
         
         
            if (false === $data) {
               $this->AddVar("message", "IS_EMPTY", "YES");
               $this->AddVar('empty_type', 'TYPE', "INFO");
               $this->AddVar("empty_box", "WARNING_MESSAGE", 
                  $this->ComposeErrorMessage("Data aduan tidak ditemukan .... \n",$this->mDataMessage->GetProperty("MessageErrorMessage")));
            }
            else {
               $this->AddVar("message", "IS_EMPTY", "NO");
               $this->AddVar("message", "MSG_HEADER", $header);
               for ($i = 0; $i < count($data); $i++) {
                  // proses tanggal
                  $tmp = explode(" ", $data[$i]['Tanggal']);
                  if ($tmp[0] != '')
                     $tmpTanggal = $this->IndonesianDate($tmp[0]);
                  else
                     $tmpTanggal = '--';
                  $data[$i]['Tanggal'] = $tmpTanggal;
                  $data[$i]['url_detail'] = $this->mrConfig->GetURL('message', 'detail_message', 'view') . "&msgType=". $this->mrConfig->Enc($this->mMessageType) . "&msgId=". $this->mrConfig->Enc($data[$i]['Id']);
                  $data[$i]['url_hapus'] = $this->mrConfig->GetURL('message','aduan','process') . "&act=". $this->mrConfig->Enc('hapus') . "&msgType=". $this->mrConfig->Enc($this->mMessageType) . "&msgId=". $this->mrConfig->Enc($data[$i]['Id']);
                  if (isset($data[$i]['Jenis']))
                     $data[$i]['url_hapus'] = $this->mrConfig->GetURL('message','aduan','process') . "&act=". $this->mrConfig->Enc('hapus') . "&msgType=". $this->mrConfig->Enc($this->mMessageType) . "&jenis=". $this->mrConfig->Enc($data[$i]['Jenis']) . "&msgId=". $this->mrConfig->Enc($data[$i]['Id']);
                  if ($this->mMessageType == 'inbox') {
                     if (!isset($data[$i]['Baca'])) {
                        $data[$i]['Judul'] = "<b>".$data[$i]['Judul']."</b>";
                     }
                  }
               }
               $urlPage = $this->mrConfig->GetURL('message','aduan','view'). "&msgType=". $this->mrConfig->Enc($this->mMessageType);
               $this->ShowPageNavigation($urlPage,$this->mPage,$recordcount, $this->mNumRecordPerPage);
               $this->ParseData("message_item", $data, "MSG_", $start_record+1);
            }
         }
         $this->DisplayTemplate();
      }
   }
?>