<?php

   /**
     * DisplayViewKonsul
     * Display Class for View Konsul
     * 
     * @package DisplayViewKonsul
     * @author Yudhi Aksara, S.Kom
     * @copyright Copyright (c) 2006 GamaTechno
     * @version 1.0 
     * @date 2006-02-10
     * @revision 
     *
     */
   class DisplayViewKonsul extends DisplayBaseFull
   {
      /**
        * var $mMessageType string Tipe Konsul (Inbox, Sent, Trash)
        */
      var $mMessageType;
      
      /**
        * var $mDataMessage array Data Konsul
        */
      var $mDataMessage;
      
      /**
        * var $mErrorMessage string Error Konsul saat Hapus Konsul
        */
      var $mErrorMessage;
      
      /**
        * var $mErrorType string Tipe Error Konsul saat Hapus Konsul
        */
      var $mErrorType;
      
      /**
        * var $mPage integer Page Konsul
        */
      var $mPage;
      
      /**
        * var $mNumRecordPerPage integer Jumlah Record per Page
        */
      var $mNumRecordPerPage;
      var $mRole;
      
      /**
        * DisplayViewKonsul::DisplayViewKonsul
        * Constructor for Class DisplayViewKonsul
        *
        * @param $configObject object Configuration
        * @param $security object Security
        * @param $messageType string Tipe Konsul (Inbox, Sent, Trash)
        * @param $page integer Page Konsul
        * @return void
        */
      function DisplayViewKonsul(&$configObject, &$security, $msgType, $errMsg, $errType, $page, $role)
      {
         DisplayBaseFull::DisplayBaseFull($configObject, $security);
         $this->mDataMessage = New Konsul($this->mrConfig);
         $this->mMessageType = $msgType;
         $this->mErrorMessage = $errMsg;
         $this->mErrorType = $errType;
         $this->mPage = $page;
         $this->mRole = $role;
         $this->mNumRecordPerPage = 15;
         
         //set template untuk error dan empty box DisplayBase::SetErrorAndEmptyBox
         $this->SetErrorAndEmptyBox();
         //set template untuk navigasi DisplayBase::SetNavigationTemplate
         $this->SetNavigationTemplate();
         
         $this->SetTemplateBasedir($this->mrConfig->GetValue('app_module') . 'konsul/templates/');
		 if($this->mrUserSession->GetProperty("Role")=='1'){ // 1=mahasiswa
			$this->SetTemplateFile('view_konsul.html');
	     }else{
			$this->SetTemplateFile('view_konsul_by_dosen.html');
		 }
      }
      
      /**
        * DisplayViewKonsul::Display
        * Parsing Data to Template
        *
        * @param 
        * @return void
        */
		function Display(){
			DisplayBaseFull::Display('[ Logout ]');
			$this->AddVar("content", "APPLICATION_MODULE", 'Konsultasi');
			$judul = "Kotak Masuk";
			if ($this->mMessageType == 'sent') {
				$judul = "Kotak Terkirim";
			} elseif ($this->mMessageType == 'trash') {
				$judul = "Sampah";
			} 
			$this->AddVar("content", "APPLICATION_SUBMODULE", 'Daftar Konsultasi ' . $judul);
         
			$this->mDataMessage->SetProperty("MessageReceiver", $this->mrUserSession->GetProperty("User"));
			$this->mDataMessage->SetProperty("MessageSender", $this->mrUserSession->GetProperty("User"));
         
			// tampilkan error konsul jika ada
			if (!empty($this->mErrorMessage)) {
				$this->SetAttribute('error_box', 'visibility', 'visible');
				$this->AddVar('error_type', 'TYPE', strtoupper($this->mErrorType));
				$temp = explode ('|', $this->mErrorMessage);
				$errorSystem= $temp[1];
				if ($temp[0] == 'compose') {
					if ($temp[1] == "")
						$error = "Pengiriman pesan konsultasi berhasil dilakukan.";
					else
						$error = "Pengiriman pesan konsultasi tidak berhasil..";
				} elseif ($temp[0] == 'delete') {
					if ($temp[1] == "")
						$error = "Berhasil menghapus pesan konsultasi.";
					else
						$error = "Pesan konsultasi tidak berhasil dihapus.";
				}
				$this->AddVar('error_box', 'ERROR_MESSAGE', $this->ComposeErrorMessage($error, $errorSystem));
			}
         
			// ambil jumlah konsul di inbox(baru dan total), sent dan trash
			$jumlahInbox = $this->mDataMessage->GetCountInboxMessageItem();
         if (false == $jumlahInbox)
            $jumlahInbox = 0;
         $jumlahNewInbox = $this->mDataMessage->GetCountNewInboxMessageItem();
         if (false == $jumlahNewInbox)
            $jumlahNewInbox = 0;
         $jumlahSent = $this->mDataMessage->GetCountSentMessageItem();
         if (false == $jumlahSent)
            $jumlahSent = 0;
         $jumlahTrash = $this->mDataMessage->GetCountTrashMessageItem();
         if (false == $jumlahTrash)
            $jumlahTrash = 0;
         
         $this->AddVar("content", "URL_INBOX",$this->mrConfig->GetURL('konsul','konsul','view') . "&msgType=".$this->mrConfig->Enc('inbox'));
         $this->AddVar("content", "URL_SENT",$this->mrConfig->GetURL('konsul','konsul','view') . "&msgType=".$this->mrConfig->Enc('sent'));
         $this->AddVar("content", "URL_TRASH",$this->mrConfig->GetURL('konsul','konsul','view') . "&msgType=".$this->mrConfig->Enc('trash'));
         $this->AddVar("content","URL_COMPOSE", $this->mrConfig->GetURL('konsul','konsul','process'));
         $this->AddVar("content", "JML_NEW", $jumlahNewInbox);
         $this->AddVar("content", "JML_INBOX", $jumlahInbox);
         $this->AddVar("content", "JML_SENT", $jumlahSent);
         $this->AddVar("content", "JML_TRASH", $jumlahTrash);
         
         $start_record = ($this->mPage*$this->mNumRecordPerPage)-($this->mNumRecordPerPage);
		 
			if($this->mRole='1'){
				$aksi = "display: none;";
			}else{
				$aksi = "";
			}
         
         if (isset($this->mMessageType)) {
            switch ($this->mMessageType) {
               case "inbox":
                  $data = $this->mDataMessage->GetAllInboxMessageItem($start_record, $this->mNumRecordPerPage);
                  $this->AddVar("konsul", "TANGGAL", "Tanggal Kirim");
                  $recordcount = $jumlahInbox;
                  $header = 'Inbox';
                  break;
               case "sent":
                  $data = $this->mDataMessage->GetAllSentMessageItem($start_record, $this->mNumRecordPerPage);
                  $this->AddVar("konsul", "TANGGAL", "Tanggal Kirim");
                  $recordcount = $jumlahSent;
                  $header = 'Sent';
                  break;
               case "trash":
                  $data = $this->mDataMessage->GetAllTrashMessageItem($start_record, $this->mNumRecordPerPage);
                  $this->AddVar("konsul", "TANGGAL", "Tanggal Hapus");
                  $recordcount = $jumlahTrash;
                  $header = 'Trash';
                  break;
            }
         
         
            if (false === $data) {
               $this->AddVar("konsul", "IS_EMPTY", "YES");
               $this->AddVar('empty_type', 'TYPE', "INFO");
               $this->AddVar("empty_box", "WARNING_MESSAGE", 
                  $this->ComposeErrorMessage("Pesan konsultasi masuk tidak ditemukan .... \n",$this->mDataMessage->GetProperty("MessageErrorMessage")));
            }
            else {
               $this->AddVar("konsul", "IS_EMPTY", "NO");
               $this->AddVar("konsul", "MSG_HEADER", $header);
               for ($i = 0; $i < count($data); $i++) {
                  // proses tanggal
                  $tmp = explode(" ", $data[$i]['Tanggal']);
                  if ($tmp[0] != '')
                     $tmpTanggal = $this->IndonesianDate($tmp[0]);
                  else
                     $tmpTanggal = '--';
                  $data[$i]['Tanggal'] = $tmpTanggal;
                  $data[$i]['aksi'] = $aksi;
                  $data[$i]['url_detail'] = $this->mrConfig->GetURL('konsul', 'detail_konsul', 'view') . "&msgType=". $this->mrConfig->Enc($this->mMessageType) . "&msgId=". $this->mrConfig->Enc($data[$i]['Id']);
                  $data[$i]['url_hapus'] = $this->mrConfig->GetURL('konsul','konsul','process') . "&act=". $this->mrConfig->Enc('hapus') . "&msgType=". $this->mrConfig->Enc($this->mMessageType) . "&msgId=". $this->mrConfig->Enc($data[$i]['Id']);
				  $data[$i]['hidden_sampah'] = "";
                  if (isset($data[$i]['Jenis'])){
                     $data[$i]['url_hapus'] = $this->mrConfig->GetURL('konsul','konsul','process') . "&act=". $this->mrConfig->Enc('hapus') . "&msgType=". $this->mrConfig->Enc($this->mMessageType) . "&jenis=". $this->mrConfig->Enc($data[$i]['Jenis']) . "&msgId=". $this->mrConfig->Enc($data[$i]['Id']);
                     $data[$i]['hidden_sampah'] = "display: none;";
				  }
                  if ($this->mMessageType == 'inbox') {
                     if (!isset($data[$i]['Baca'])) {
                        $data[$i]['Judul'] = "<b>".$data[$i]['Judul']."</b>";
                     }
                  }
               }
               $urlPage = $this->mrConfig->GetURL('konsul','konsul','view'). "&msgType=". $this->mrConfig->Enc($this->mMessageType);
               $this->ShowPageNavigation($urlPage,$this->mPage,$recordcount, $this->mNumRecordPerPage);
               $this->ParseData("message_item", $data, "MSG_", $start_record+1);
            }
         }
         $this->DisplayTemplate();
      }
   }
?>