<?php

   /**
     * Message
     * Message class
     * 
     * @package message
     * @author Yudhi Aksara, S.Kom
     * @copyright Copyright (c) 2006 GamaTechno
     * @version 1.0 
     * @date 2006-02-10
     * @revision 
     *
     */
   class Message extends DatabaseConnected
   {
      /**
        * var $mMessageId integer ID Message
        */
      var $mMessageId;
      
      /**
        * var $mMessageSender string Sender Message
        */
      var $mMessageSender;
      
      /**
        * var $mMessageReceiver string Receiver Message
        */
      var $mMessageReceiver;
      
      /**
        * var $mMessageTitle string Judul Message
        */
      var $mMessageTitle;
      
      /**
        * var $mMessageContent string Isi Message
        */
      var $mMessageContent;
      
      /**
        * var $mMessageSentTime datetime Waktu Kirim Message
        */
      var $mMessageSentTime;
      
      /**
        * var $mMessageReadTime datetime Waktu Baca/Buka Detail Message
        */
      var $mMessageReadTime;
      
      /**
        * var $mMessageDeleteTime datetime Waktu Menghapus Message
        */
      var $mMessageDeleteTime;
      
      /**
        * var $mMessageIsDeletedSender integer Keterangan Message Dihapus oleh Sender
        */
      var $mMessageIsDeletedSender;
      
      /**
        * var $mMessageIsDeletedReceiver integer Keterangan Message Dihapus oleh Receiver
        */
      var $mMessageIsDeletedReceiver;
      
      /**
        * var $mMessageErrorMessage string Error Message
        */
      var $mMessageErrorMessage;
      
      /**
        * var $mCondition string Where Condition for Search Query with many Option
        */
      var $mCondition;
      
      
      /**
      * Message::Message
      * Constructor for Message class
      *
      * @param $configObject object Configuration
      * @return void
      */
      function Message(&$configObject)
      {
         DatabaseConnected::DatabaseConnected($configObject, "module/message/business/message.sql.php");
      }
      
      /**
        * Message::GetAllInboxMessageItem
        * Get All Inbox Message Item
        *
        * @param 
        * @return array(Id, Judul, Pengirim, Penerima, Tanggal, Baca)
        */
      function GetAllInboxMessageItem($start=0, $limit=10)
      {
         if(!$this->Connect()) {            
            $dbErrorMsg = $this->GetProperty("DbErrorMessage");
            $this->SetProperty("MessageErrorMessage", $dbErrorMsg);
            return false;
         }
         $dataInbox = $this->GetAllDataAsArray($this->mSqlQueries['get_all_inbox_message_item'], array($this->mMessageReceiver, $start, $limit));
         if (false === $dataInbox) {
            $this->SetProperty("MessageErrorMessage", $this->GetProperty("DbErrorMessage"));
            $this->Disconnect();
            return false;
         }
         else {
            $this->SetProperty("MessageErrorMessage", '');
            $this->Disconnect();
            return $dataInbox;
         }
      }
      
      /**
        * Message::GetAllSentMessageItem
        * Get All Sent Message Item
        *
        * @param
        * @return array(Id, Judul, Pengirim, Penerima, Tanggal, Baca)
        */
      function GetAllSentMessageItem($start=0, $limit=10)
      {
         if(!$this->Connect()) {            
            $dbErrorMsg = $this->GetProperty("DbErrorMessage");
            $this->SetProperty("MessageErrorMessage", $dbErrorMsg);
            return false;
         }
         $dataSent = $this->GetAllDataAsArray($this->mSqlQueries['get_all_sent_message_item'], array($this->mMessageSender, $start, $limit));
         if (false === $dataSent) {
            $this->SetProperty("MessageErrorMessage", "Data Sent Belum Tersedia .... <br>".$this->GetProperty("DbErrorMessage"));
            $this->Disconnect();
            return false;
         }
         else {
            $this->SetProperty("MessageErrorMessage", '');
            $this->Disconnect();
            return $dataSent;
         }
      }
      
      /**
        * Message::GetAllTrashMessageItem
        * Get All Trash Message Item
        *
        * @param
        * @return array(Id, Judul, Pengirim, Penerima, Tanggal, Baca)
        */
      function GetAllTrashMessageItem($start=0, $limit=10)
      {
         if(!$this->Connect()) {            
            $dbErrorMsg = $this->GetProperty("DbErrorMessage");
            $this->SetProperty("MessageErrorMessage", $dbErrorMsg);
            return false;
         }
         $dataTrash = $this->GetAllDataAsArray($this->mSqlQueries['get_all_trash_message_item'], array($this->mMessageSender, $this->mMessageSender, $this->mMessageReceiver, $start, $limit));
         if (false === $dataTrash) {
            $this->SetProperty("MessageErrorMessage", "Data Trash Belum Tersedia .... <br>".$this->GetProperty("DbErrorMessage"));
            $this->Disconnect();
            return false;
         }
         else {
            $this->SetProperty("MessageErrorMessage", '');
            $this->Disconnect();
            return $dataTrash;
         }
      }
      
      /**
        * Message::GetCountInboxMessageItem
        * Get Count Inbox Message Item
        *
        * @param
        * @return integer Jumlah Inbox Message
        */
      function GetCountInboxMessageItem()
      {
         if(!$this->Connect()) {            
            $dbErrorMsg = $this->GetProperty("DbErrorMessage");
            $this->SetProperty("MessageErrorMessage", $dbErrorMsg);
            return false;
         }
         $jumlahInbox = $this->GetDataAsOne($this->mSqlQueries['get_count_inbox_message_item'], array($this->mMessageReceiver));
         if (false === $jumlahInbox) {
            $this->SetProperty("MessageErrorMessage", "Data Inbox Belum Tersedia .... <br>".$this->GetProperty("DbErrorMessage"));
            $this->Disconnect();
            return false;
         }
         else {
            $this->SetProperty("MessageErrorMessage", '');
            $this->Disconnect();
            return $jumlahInbox;
         }
      }
      
      /**
        * Message::GetCountNewInboxMessageItem
        * Get Count New Inbox Message Item
        *
        * @param
        * @return integer Jumlah New Inbox Message
        */
      function GetCountNewInboxMessageItem()
      {
         if(!$this->Connect()) {            
            $dbErrorMsg = $this->GetProperty("DbErrorMessage");
            $this->SetProperty("MessageErrorMessage", $dbErrorMsg);
            return false;
         }
         $jumlahNewInbox = $this->GetDataAsOne($this->mSqlQueries['get_count_new_inbox_message_item'], array($this->mMessageReceiver));
         if (false === $jumlahNewInbox) {
            $this->SetProperty("MessageErrorMessage", "Tidak Ada Pesan Baru .... <br>".$this->GetProperty("DbErrorMessage"));
            $this->Disconnect();
            return false;
         }
         else {
            $this->SetProperty("MessageErrorMessage", '');
            $this->Disconnect();
            return $jumlahNewInbox;
         }
      }
      
      /**
        * Message::GetCountSentMessageItem
        * Get Count Sent Message Item
        *
        * @param
        * @return integer Jumlah Sent Message
        */
      function GetCountSentMessageItem()
      {
         if(!$this->Connect()) {            
            $dbErrorMsg = $this->GetProperty("DbErrorMessage");
            $this->SetProperty("MessageErrorMessage", $dbErrorMsg);
            return false;
         }
         $jumlahSent = $this->GetDataAsOne($this->mSqlQueries['get_count_sent_message_item'], array($this->mMessageSender));
         if (false === $jumlahSent) {
            $this->SetProperty("MessageErrorMessage", "Data Sent Belum Tersedia .... <br>".$this->GetProperty("DbErrorMessage"));
            $this->Disconnect();
            return false;
         }
         else {
            $this->SetProperty("MessageErrorMessage", '');
            $this->Disconnect();
            return $jumlahSent;
         }
      }
      
      /**
        * Message::GetCountTrashMessageItem
        * Get Count Trash Message Item
        *
        * @param
        * @return integer Jumlah Trash Message
        */
      function GetCountTrashMessageItem()
      {
         if(!$this->Connect()) {            
            $dbErrorMsg = $this->GetProperty("DbErrorMessage");
            $this->SetProperty("MessageErrorMessage", $dbErrorMsg);
            return false;
         }
         $jumlahTrash = $this->GetDataAsOne($this->mSqlQueries['get_count_trash_message_item'], array($this->mMessageSender, $this->mMessageReceiver));
         if (false === $jumlahTrash) {
            $this->SetProperty("MessageErrorMessage", "Data Trash Belum Tersedia .... <br>".$this->GetProperty("DbErrorMessage"));
            $this->Disconnect();
            return false;
         }
         else {
            $this->SetProperty("MessageErrorMessage", '');
            $this->Disconnect();
            return $jumlahTrash;
         }
      }
      
      /**
        * Message::DoAddMessageItem
        * Add Message Item
        *
        * @param
        * @return boolean addMessage
        */
      function DoAddMessageItem()
      {
         if(!$this->Connect()) {            
            $dbErrorMsg = $this->GetProperty("DbErrorMessage");
            $this->SetProperty("MessageErrorMessage", $dbErrorMsg);
            return false;
         }
         $addMessage = $this->ExecuteInsertQuery($this->mSqlQueries['add_message_item'], array($this->mMessageSender,$this->mMessageReceiver,$this->mMessageTitle,$this->mMessageContent));
         if (false === $addMessage) {
            $this->SetProperty("MessageErrorMessage", "Proses Mengirim Message Tidak Berhasil .... <br>".$this->GetProperty("DbErrorMessage"));
            $this->Disconnect();
            return false;
         }
         else {
            $this->SetProperty("MessageErrorMessage", 'Berhasil Mengirim Message');
            $this->Disconnect();
            return $addMessage;
         }
      }
      
      /**
        * Message::DoDeleteInboxMessageItem
        * Delete Inbox Message Item
        *
        * @param
        * @return boolean delInbox
        */
      function DoDeleteInboxMessageItem()
      {
         if(!$this->Connect()) {            
            $dbErrorMsg = $this->GetProperty("DbErrorMessage");
            $this->SetProperty("MessageErrorMessage", $dbErrorMsg);
            return false;
         }
         $delInbox = $this->ExecuteUpdateQuery($this->mSqlQueries['delete_inbox_message'], array($this->mMessageId));
         if (false === $delInbox) {
            $this->SetProperty("MessageErrorMessage", "Proses Menghapus Inbox Message Tidak Berhasil .... <br>".$this->GetProperty("DbErrorMessage"));
            $this->Disconnect();
            return false;
         }
         else {
            $this->SetProperty("MessageErrorMessage", 'Berhasil Menghapus Inbox Message');
            $this->Disconnect();
            return $delInbox;
         }
      }
      
      /**
        * Message::DoDeleteSentMessageItem
        * Delete Sent Message Item
        *
        * @param
        * @return boolean delSent
        */
      function DoDeleteSentMessageItem()
      {
         if(!$this->Connect()) {            
            $dbErrorMsg = $this->GetProperty("DbErrorMessage");
            $this->SetProperty("MessageErrorMessage", $dbErrorMsg);
            return false;
         }
         $delSent = $this->ExecuteUpdateQuery($this->mSqlQueries['delete_sent_message'], array($this->mMessageId));
         if (false === $delSent) {
            $this->SetProperty("MessageErrorMessage", "Proses Menghapus Sent Message Tidak Berhasil .... <br>".$this->GetProperty("DbErrorMessage"));
            $this->Disconnect();
            return false;
         }
         else {
            $this->SetProperty("MessageErrorMessage", 'Berhasil Menghapus Sent Message');
            $this->Disconnect();
            return $delSent;
         }
      }
      
      /**
        * Message::DoDeleteTrashInboxMessageItem
        * Delete Trash Message Item (Trash from Inbox)
        *
        * @param
        * @return boolean delTrash
        */
      function DoDeleteTrashInboxMessageItem()
      {
         if(!$this->Connect()) {            
            $dbErrorMsg = $this->GetProperty("DbErrorMessage");
            $this->SetProperty("MessageErrorMessage", $dbErrorMsg);
            return false;
         }
         $delOldMsg = $this->ExecuteDeleteQuery($this->mSqlQueries['delete_old_message'], array());
         $delTrash = $this->ExecuteUpdateQuery($this->mSqlQueries['delete_trash_inbox_message'], array($this->mMessageId));
         if (false === $delTrash) {
            $this->SetProperty("MessageErrorMessage", "Proses Menghapus Trash Message Tidak Berhasil .... <br>".$this->GetProperty("DbErrorMessage"));
            $this->Disconnect();
            return false;
         }
         else {
            $this->SetProperty("MessageErrorMessage", 'Berhasil Menghapus Trash Message');
            $this->Disconnect();
            return $delTrash;
         }
      }
      
      /**
        * Message::DoDeleteTrashSentMessageItem
        * Delete Trash Message Item (Trash from Sent)
        *
        * @param
        * @return boolean delTrash
        */
      function DoDeleteTrashSentMessageItem()
      {
         if(!$this->Connect()) {            
            $dbErrorMsg = $this->GetProperty("DbErrorMessage");
            $this->SetProperty("MessageErrorMessage", $dbErrorMsg);
            return false;
         }
         $delOldMsg = $this->ExecuteDeleteQuery($this->mSqlQueries['delete_old_message'], array());
         $delTrash = $this->ExecuteUpdateQuery($this->mSqlQueries['delete_trash_sent_message'], array($this->mMessageId));
         if (false === $delTrash) {
            $this->SetProperty("MessageErrorMessage", "Proses Menghapus Trash Message Tidak Berhasil .... <br>".$this->GetProperty("DbErrorMessage"));
            $this->Disconnect();
            return false;
         }
         else {
            $this->SetProperty("MessageErrorMessage", 'Berhasil Menghapus Trash Message');
            $this->Disconnect();
            return $delTrash;
         }
      }
      
      /**
        * Message::DoDeleteTrashAllMessageItem
        * Delete Trash Message Item (Trash from Inbox and Sent both Deleted)
        *
        * @param
        * @return boolean delTrash
        */
      function DoDeleteTrashAllMessageItem()
      {
         if(!$this->Connect()) {            
            $dbErrorMsg = $this->GetProperty("DbErrorMessage");
            $this->SetProperty("MessageErrorMessage", $dbErrorMsg);
            return false;
         }
         $delOldMsg = $this->ExecuteDeleteQuery($this->mSqlQueries['delete_old_message'], array());
         $delTrash = $this->ExecuteUpdateQuery($this->mSqlQueries['delete_trash_all_message'], array($this->mMessageId));
         if (false === $delTrash) {
            $this->SetProperty("MessageErrorMessage", "Proses Menghapus Trash Message Tidak Berhasil .... <br>".$this->GetProperty("DbErrorMessage"));
            $this->Disconnect();
            return false;
         }
         else {
            $this->SetProperty("MessageErrorMessage", 'Berhasil Menghapus Trash Message');
            $this->Disconnect();
            return $delTrash;
         }
      }
      
      /**
        * Message::GetDetailMessageItem
        * Get Detail Message Item
        *
        * @param
        * @return array(Id, Pengirim, Penerima, Judul, Isi, WaktuKirim, WaktuHapus)
        */
      function GetDetailMessageItem()
      {
         if(!$this->Connect()) {            
            $dbErrorMsg = $this->GetProperty("DbErrorMessage");
            $this->SetProperty("MessageErrorMessage", $dbErrorMsg);
            return false;
         }
         $detailMsg = $this->GetAllDataAsArray($this->mSqlQueries['get_detail_message_item'], array($this->mMessageId));
         if (false === $detailMsg) {
            $this->SetProperty("MessageErrorMessage", "Detail Message Tidak Ditemukan .... <br>".$this->GetProperty("DbErrorMessage"));
            $this->Disconnect();
            return false;
         }
         else {
            $this->SetProperty("MessageErrorMessage", '');
            $this->Disconnect();
            return $detailMsg;
         }
      }
      
      /**
        * Message::DoUpdateReadMessageTime
        * Update Read Message Time
        *
        * @param
        * @return boolean msgTime
        */
      function DoUpdateReadMessageTime()
      {
         if(!$this->Connect()) {            
            $dbErrorMsg = $this->GetProperty("DbErrorMessage");
            $this->SetProperty("MessageErrorMessage", $dbErrorMsg);
            return false;
         }
         $msgTime = $this->ExecuteUpdateQuery($this->mSqlQueries['update_message_read_time'], array($this->mMessageId));
         if (false === $msgTime) {
            $this->SetProperty("MessageErrorMessage", "Proses Mengupdate Tanggal Baca Message Tidak Berhasil .... <br>".$this->GetProperty("DbErrorMessage"));
            $this->Disconnect();
            return false;
         }
         else {
            $this->SetProperty("MessageErrorMessage", '');
            $this->Disconnect();
            return $msgTime;
         }
      }


      /**
        * Message::IsAddressBookExist
        * check : Is Address Book Exist
        *
        * @param 
        * @return boolean 
        *
        */

      function IsAddressBookExist(){
         $params = array($this->mMessageReceiver, $this->mMessageSender);
         if(!$this->Connect()) {            
            $dbErrorMsg = $this->GetProperty("DbErrorMessage");
            $this->SetProperty("MessageErrorMessage", $dbErrorMsg);
            return false;
         }
         $isAddrBookExist = $this->GetAllDataAsArray($this->mSqlQueries['is_address_book_exist'], $params);
         if (empty($isAddrBookExist)) {
            $this->SetProperty("MessageErrorMessage", $this->GetProperty("DbErrorMessage"));
            $this->Disconnect();
            return false;
         }
         else {
            $this->SetProperty("MessageErrorMessage", '');
            $this->Disconnect();
            return true;
         }
      }
   

      /**
        * Message::DoAddToAddressBook
        * Add to Address Book
        *
        * @param 
        * @return boolean $addToAddrBook
        *
        */
      function DoAddToAddressBook()
      {
         $params = array($this->mMessageReceiver, $this->mMessageSender);
         if(!$this->Connect()) {            
            $dbErrorMsg = $this->GetProperty("DbErrorMessage");
            $this->SetProperty("MessageErrorMessage", $dbErrorMsg);
            return false;
         }
         $addToAddrBook = $this->ExecuteInsertQuery($this->mSqlQueries['add_to_address_book'], $params);
         if (false === $addToAddrBook) {
            $this->SetProperty("MessageErrorMessage", $this->GetProperty("DbErrorMessage"));
            $this->Disconnect();
            return false;
         }
         else {
            $this->SetProperty("MessageErrorMessage", '');
            $this->Disconnect();
            return $addToAddrBook;
         }
      }
      
      /**
        * Message::CountAddressBook
        * Count Address Book
        *
        * @param
        * @return integer Jumlah Address Book
        *
        */
      function CountAddressBook($niuPemilik)
      {
         if (!$this->Connect()) {
            $dbErrorMsg = $this->GetProperty("DbErrorMessage");
            $this->SetProperty("ReferenceErrorMsg", $dbErrorMsg);
            return false;
         }
         $param = array_merge(array($niuPemilik), $this->mCondition);
         $data = $this->GetAllDataAsArray($this->mSqlQueries['get_count_address_book'], $param);
         if (false === $data) {
            $this->SetProperty("MessageErrorMessage", "Data Address Book Belum Tersedia  .... <br> ".$this->GetProperty("DbErrorMessage"));
            $this->Disconnect();
            return false;
         }
         else {
            $this->SetProperty("MessageErrorMessage", '');
            $this->Disconnect();
            return $data;
         }
      }
      
      /**
        * Message::GetAllAdreessBookItems
        * Get All Address Book Item
        *
        * @param $start integer nilai awal record
        * @param $limit integer nilai batasan jumlah record yang ditampilkan
        *
        * @return boolean $data
        */
      function GetAllAdreessBookItems($niuPemilik, $start, $limit)
      {
         if (!$this->Connect()) {
            $dbErrorMsg = $this->GetProperty("DbErrorMessage");
            $this->SetProperty("MessageErrorMessage", $dbErrorMsg);
            return false;
         }
         
         $param = array_merge(array($niuPemilik), $this->mCondition, array($start, $limit));
         $data = $this->GetAllDataAsArray($this->mSqlQueries['get_all_address_book_items_by'], $param);
         if (false === $data) {
            $this->SetProperty("MessageErrorMessage", $this->GetProperty("DbErrorMessage"));
            $this->Disconnect();
            return false;
         }
         else {
            $this->SetProperty("MessageErrorMessage", '');
            $this->Disconnect();
            return $data;
         }
      }
      
      /**
        * Message::DoDeleteAddressBook
        * Delete Address Book Item
        *
        * @param 
        * @return void
        *
        */
      function DoDeleteAddressBook()
      {
         $params = array($this->mMessageReceiver, $this->mMessageSender);
         if (!$this->Connect()) {
            $dbErrorMsg = $this->GetProperty("DbErrorMessage");
            $this->SetProperty("MessageErrorMessage", $dbErrorMsg);
            return false;
         }
         $data = $this->ExecuteDeleteQuery($this->mSqlQueries['delete_address_book'], $params);
         if (false === $data) {
            $this->SetProperty("MessageErrorMessage", $this->GetProperty("DbErrorMessage"));
            $this->Disconnect();
            return false;
         }
         else {
            $this->SetProperty("MessageErrorMessage", '');
            $this->Disconnect();
            return $data;
         }
      }
      
      function GetProdi() {
          if (!$this->Connect()) {
            $dbErrorMsg = $this->GetProperty("DbErrorMessage");
            $this->SetProperty("MessageErrorMessage", $dbErrorMsg);
            return false;
         }
         
         $data = $this->GetAllDataAsArray($this->mSqlQueries['select_prodi'], array());
         if (false === $data) {
            $this->SetProperty("MessageErrorMessage", $this->GetProperty("DbErrorMessage"));
            $this->Disconnect();
            return false;
         }
         else {
            $this->SetProperty("MessageErrorMessage", '');
            $this->Disconnect();
            return $data;
         }
      }
      
      function GetGroupProdi() {
          if (!$this->Connect()) {
            $dbErrorMsg = $this->GetProperty("DbErrorMessage");
            $this->SetProperty("MessageErrorMessage", $dbErrorMsg);
            return false;
         }
         
         $data = $this->GetAllDataAsArray($this->mSqlQueries['select_group_prodi'], array());
         if (false === $data) {
            $this->SetProperty("MessageErrorMessage", $this->GetProperty("DbErrorMessage"));
            $this->Disconnect();
            return false;
         }
         else {
            $this->SetProperty("MessageErrorMessage", '');
            $this->Disconnect();
            return $data;
         }          
      }
	  
		#add ccp 28-02-2023
		function GetCountaAduan($status){
			if(!$this->Connect()) {            
				$dbErrorMsg = $this->GetProperty("DbErrorMessage");
				$this->SetProperty("MessageErrorMessage", $dbErrorMsg);
				return false;
			}
			$jumlahInbox = $this->GetDataAsOne($this->mSqlQueries['get_count_aduan'], array($this->mMessageReceiver,$status));
			if (false === $jumlahInbox) {
				$this->SetProperty("MessageErrorMessage", "Data Aduan Belum Tersedia .... <br>".$this->GetProperty("DbErrorMessage"));
				$this->Disconnect();
				return false;
			}else {
				$this->SetProperty("MessageErrorMessage", '');
				$this->Disconnect();
				return $jumlahInbox;
			}
		}
		
		function GetAllInboxAduanItem($start=0, $limit=10,$status){
			if(!$this->Connect()) {            
				$dbErrorMsg = $this->GetProperty("DbErrorMessage");
				$this->SetProperty("MessageErrorMessage", $dbErrorMsg);
				return false;
			}
			$dataInbox = $this->GetAllDataAsArray($this->mSqlQueries['get_all_inbox_aduan_item'], array($this->mMessageReceiver,$status, $start, $limit));
			if (false === $dataInbox) {
				$this->SetProperty("MessageErrorMessage", $this->GetProperty("DbErrorMessage"));
				$this->Disconnect();
				return false;
			}else {
				$this->SetProperty("MessageErrorMessage", '');
				$this->Disconnect();
            return $dataInbox;
			}
		}
		
		function GetNomorAduan(){
			if(!$this->Connect()) {            
				$dbErrorMsg = $this->GetProperty("DbErrorMessage");
				$this->SetProperty("MessageErrorMessage", $dbErrorMsg);
				return false;
			}
			$jumlahInbox = $this->GetDataAsOne($this->mSqlQueries['get_count_aduan'], array());
			if (false === $jumlahInbox) {
				$this->SetProperty("MessageErrorMessage", "Data Aduan Belum Tersedia .... <br>".$this->GetProperty("DbErrorMessage"));
				$this->Disconnect();
				return false;
			}else {
				$this->SetProperty("MessageErrorMessage", '');
				$this->Disconnect();
				return $jumlahInbox;
			}
		}
   }
?>
