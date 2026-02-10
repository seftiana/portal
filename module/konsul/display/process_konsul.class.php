<?php

   /**
     * ProcessKonsul
     * ProcessKonsul class
     * 
     * @package ProcessKonsul
     * @author Yudhi Aksara, S.Kom
     * @copyright Copyright (c) 2006 GamaTechno
     * @version 1.0 
     * @date 2006-02-10
     * @revision 
     *
     */
   class ProcessKonsul extends ProcessBase
   {
      /**
        * var $mDataMessage arrData(message.class)
        */
      var $mDataMessage;
      
      /**
        * var $mProcessMessageError string Process Error Konsul
        */
      var $mProcessMessageError;
      
      /**
        * ProcessKonsul::ProcessKonsul
        * Constructor for ProcessKonsul Class
        *
        * @param $configObject object Configuration
        * @return void
        */
      function ProcessKonsul(&$configObject)
      {
         ProcessBase::ProcessBase($configObject);
         $this->mDataMessage = New Konsul($configObject);
      }
      
      /**
        * ProcessKonsul::SetAttributes
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
        * ProcessKonsul::AddMessage
        * Add Konsul
        *
        * @param $arrData array to be set as Property
        * @return boolean
        */
      function AddMessage($arrData,$SiaService,$user_id,$role,$links)
      {
         if (empty($arrData['MessageReceiver']) or empty($arrData['MessageTitle']) or empty($arrData['MessageContent'])) {
            $this->SetProperty("ProcessMessageError", 'Semua entry harus diisi');
            return false;
         }
         else {
			$this->SetAttributes($arrData);
					//email
					$profil = new UserClientService($SiaService, false, $user_id);
					$profil->SetProperty('UserRole',$role);
					$userInfo = $profil->GetUserProfile();
					$email = $userInfo[0]['email'];
					$subject = GetSubject($userInfo[0]['nama']);
					$content = GetContent($userInfo[0]['nama'],$links);
					$send = SendMail($arrData['EmailTujuan'],$subject,$content);
					//end email
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
        * ProcessKonsul::DeleteMessage
        * Delete Konsul
        *
        * @param $msgType string tipe Konsul (Inbox, Sent, Trash)
        * @param $jenis string jenis Trash (from : Inbox, Sent)
        * @param $msgId integer Id Konsul
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