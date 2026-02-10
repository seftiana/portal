<?php

   /**
     * ProcessMessage
     * ProcessMessage class
     * 
     * @package ProcessMessage
     * @author Yudhi Aksara, S.Kom
     * @copyright Copyright (c) 2006 GamaTechno
     * @version 1.0 
     * @date 2006-02-10
     * @revision 
     *
     */
   class ProcessMessage extends ProcessBase
   {
      /**
        * var $mDataMessage arrData(message.class)
        */
      var $mDataMessage;
      
      /**
        * var $mProcessMessageError string Process Error Message
        */
      var $mProcessMessageError;
      
      /**
        * ProcessMessage::ProcessMessage
        * Constructor for ProcessMessage Class
        *
        * @param $configObject object Configuration
        * @return void
        */
      function ProcessMessage(&$configObject)
      {
         ProcessBase::ProcessBase($configObject);
         $this->mDataMessage = New Message($configObject);
      }
      
      /**
        * ProcessMessage::SetAttributes
        * Set Attributes
        *
        * @param $arrAttributes array Attributes for SetProperty
        * @return 
        */
      function SetAttributes($arrAttributes)
      {
         foreach($arrAttributes as $key => $value) {
            $this->mDataMessage->SetProperty($key, $value);
         }
      }
      
      /**
        * ProcessMessage::AddMessage
        * Add Message
        *
        * @param $arrData array to be set as Property
        * @return boolean
        */
      function AddMessage($arrData)
      {
         if (empty($arrData['MessageReceiver']) or empty($arrData['MessageTitle']) or empty($arrData['MessageContent'])) {
            $this->SetProperty("ProcessMessageError", 'Semua entry harus diisi');
            return false;
         }
         else {
            $this->SetAttributes($arrData);
            $result = $this->mDataMessage->DoAddMessageItem();
            if (false === $result) {
               $this->SetProperty("ProcessMessageError", $this->mDataMessage->GetProperty("MessageErrorMessage"));
               return false;
            }
            else {
               $this->SetProperty("ProcessMessageError",$this->mDataMessage->GetProperty("MessageErrorMessage"));
               return true;
            }
         }
      }
      
      /**
        * ProcessMessage::DeleteMessage
        * Delete Message
        *
        * @param $msgType string tipe Message (Inbox, Sent, Trash)
        * @param $jenis string jenis Trash (from : Inbox, Sent)
        * @param $msgId integer Id Message
        * @return boolean
        */
      function DeleteMessage($msgType, $jenis, $msgId)
      {
         $this->mDataMessage->SetProperty("MessageId", $msgId);
         switch ($msgType) {
            case "inbox":
               $result = $this->mDataMessage->DoDeleteInboxMessageItem();
               break;
            case "sent":
               $result = $this->mDataMessage->DoDeleteSentMessageItem();
               break;
            case "trash":
               switch ($jenis) {
                  case "inbox":
                     $result = $this->mDataMessage->DoDeleteTrashInboxMessageItem();
                     break;
                  case "sent":
                     $result = $this->mDataMessage->DoDeleteTrashSentMessageItem();
                     break;
                  case "all":
                     $result = $this->mDataMessage->DoDeleteTrashAllMessageItem();
                     break;
               }
               break;
            default:
               $result = false;
               break;
         }   
         if (false === $result) {
            $this->SetProperty("ProcessMessageError", $this->mDataMessage->GetProperty("MessageErrorMessage"));
            return false;
         }
         else {
            $this->SetProperty("ProcessMessageError",$this->mDataMessage->GetProperty("MessageErrorMessage"));
            return true;
         }
      }

      function ValidateIsAddressBookExist($pemilik, $teman){
         $this->mDataMessage->SetProperty("MessageReceiver", $pemilik);
         $this->mDataMessage->SetProperty("MessageSender", $teman);
         
         $result = $this->mDataMessage->IsAddressBookExist();
         if (true === $result) {
            $this->SetProperty("ProcessMessageError", $this->mDataMessage->GetProperty("MessageErrorMessage"));
            return true;
         }
         else {
            $this->SetProperty("ProcessMessageError",$this->mDataMessage->GetProperty("MessageErrorMessage"));
            return false;
         }
      }

      function AddToAddressBook($pemilik, $teman)
      {
         $this->mDataMessage->SetProperty("MessageReceiver", $pemilik);
         $this->mDataMessage->SetProperty("MessageSender", $teman);
         
         $result = $this->mDataMessage->DoAddToAddressBook();
         if (true === $result) {
            $this->SetProperty("ProcessMessageError", $this->mDataMessage->GetProperty("MessageErrorMessage"));
            return true;
         }
         else {
            $this->SetProperty("ProcessMessageError",$this->mDataMessage->GetProperty("MessageErrorMessage"));
            return false;
         }
      }
      
      function DeleteAddressBook($arrData)
      {
         $this->SetAttributes($arrData);
         $result = $this->mDataMessage->DoDeleteAddressBook();
         if (false === $result) {
            $this->SetProperty("ProcessMessageError", $this->mDataMessage->GetProperty("MessageErrorMessage"));
            return false;
         }
         else {
            $this->SetProperty("ProcessMessageError", $this->mDataMessage->GetProperty("MessageErrorMessage"));
            return true;
         }
      }
   }
?>