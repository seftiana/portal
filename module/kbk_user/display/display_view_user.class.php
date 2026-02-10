<?php
/**
 * DisplayViewUser
 * Display class for view and search user
 * 
 * @package 
 * @author Maya Alipin
 * @copyright Copyright (c) 2006 GamaTechno
 * @version 1.0 
 * @date 2006-02-01
 * @revision 
 *
 */

class DisplayViewUser extends DisplayBaseFull 
{

   var $mDataUser;
   var $mSearchKey;
   var $mIsFromDelete;
   var $mPage;
   var $mErrorMessage;
   var $mNumRecordPerPage;
   
   /**
    * DisplayViewUser::DisplayViewUser
    * Constructor for DisplayViewUser class
    *
    * @param $configObject object Configuration
    * @param $securityObj  object Security
    * @param $searchKey    string search key
    * @return void
    */
   function DisplayViewUser(&$configObject, $securityObj, $errMsg="" ,$searchKey="", $page=1, $flag) 
   {
      DisplayBaseFull::DisplayBaseFull($configObject, $securityObj) ;
      
      //set template untuk error dan empty box DisplayBase::SetErrorAndEmptyBox
      $this->SetErrorAndEmptyBox();
      //set template untuk navigasi DisplayBase::SetNavigationTemplate
      $this->SetNavigationTemplate();
      
      $this->mSearchKey = $searchKey;
      $this->mPage = $page;
      $this->mErrorMessage = $errMsg;
      $this->mIsFromDelete = $flag;
      
      $this->mNumRecordPerPage = 15;
      $this->SetTemplateBasedir($configObject->GetValue('app_module') . 'user/templates/');
      $this->SetTemplateFile('view_user.html');
   }
   
   /**
    * DisplayViewUser::Display
    * Parsing data to template
    *
    * @param 
    * @return void
    */
   function Display() 
   {
      DisplayBaseFull::Display("[ Logout ]");      
      
      if ($this->mErrorMessage !=""){
         $this->SetAttribute('error_box', 'visibility', 'visible');
         $this->AddVar('error_type', 'TYPE', "INFO");
         $this->AddVar("error_box", "ERROR_MESSAGE", $this->mErrorMessage);
      }
      
      if (!empty($this->mSearchKey)){
         $start_record = ($this->mPage*$this->mNumRecordPerPage)-($this->mNumRecordPerPage);
         if ($this->mIsFromDelete==0)
            $this->AddVar("content", "USERID_SEARCH", $this->mSearchKey["UserId"]);
         $this->mDataUser = new User($this->mrConfig, "");   
         $this->mDataUser->SetProperty("UserId", $this->mSearchKey["UserId"]);
         $dataUser = $this->mDataUser->GetSearchUserItem($start_record, $this->mNumRecordPerPage);
         
         if ($dataUser === false && $this->mIsFromDelete==0) {
            $this->AddVar("data_user", "USER_IS_EMPTY", "YES");            
            $this->AddVar('empty_type', 'TYPE', "INFO");
            $this->AddVar("empty_box", "WARNING_MESSAGE", $this->ComposeErrorMessage("Data tidak ditemukan .... ",$this->mDataUser->GetProperty('UserErrorMessage')));
         } else if ($dataUser !== false ) {            
            $this->AddVar("data_user", "USER_IS_EMPTY", "NO");
            $recordcount = $this->mDataUser->CountSearchUserItem();
            $encSearchKey = "&key=" . $this->mrConfig->Enc($this->mSearchKey["UserId"]);
            $urlProcess = $this->mrConfig->GetURL('user', 'user', 'process') . $encSearchKey . 
                          "&doact=" . $this->mrConfig->Enc("delete") . "&id=";
            $urlUpdate = $this->mrConfig->GetURL('user', 'user', 'update') . $encSearchKey . "&id=";
            $urlResetPwd = $this->mrConfig->GetURL('user', 'user', 'rstpassword') . $encSearchKey . "&id=";
            
            foreach ($dataUser as $key => $value){
               $arrdata[$key]["nama"] = $value["Name"];
               $arrdata[$key]["nama_lengkap"] = $value["Profil"];
               $arrdata[$key]["fakultas"] = $value["ProdiName"];
               
               $encNama = $this->mrConfig->Enc($value["Name"]);
               $arrdata[$key]["urldelete"] = $urlProcess . $encNama ;
               $arrdata[$key]["urlupdate"] = $urlUpdate . $encNama ; 
               $arrdata[$key]["urlreset"] = $urlResetPwd . $encNama;               
            }
            //$this->mTemplate->addVars("data_user_item", $arrdata, "USER_");
            //$this->mTemplate->parseTemplate("data_user_item");
            $this->ParseData("data_user_item", $arrdata, "USER_", $start_record+1);
            
            $url = $this->mrConfig->GetURL('user', 'user', 'view') . 
                   "&cari=" . $this->mrConfig->Enc($this->mSearchKey["UserId"]);
            $this->ShowPageNavigation($url,$this->mPage,$recordcount, $this->mNumRecordPerPage);
         }
      }
      $this->AddVar("content", "URL_PROCESS", $this->mrConfig->GetURL('user', 'user', 'process'));
      $this->DisplayTemplate();
   }
}

?>