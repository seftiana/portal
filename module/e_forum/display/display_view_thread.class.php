<?php
/**
 * DisplayViewProfile
 * Display class for view and search user
 * 
 * @package 
 * @author Refit Gustaroska
 * @copyright Copyright (c) 2006 GamaTechno
 * @version 1.0 
 * @date 2006-02-22
 * @revision 
 *
 */

class DisplayViewThread extends DisplayBaseFull
{

   var $mErrorMessage;
   var $mForumId;
   
   var $mNumRecordPerPage;
   var $mPage;
   /**
    * DisplayViewForum::DisplayViewForum
    * Constructor for DisplayViewForum class
    *
    * @param $configObject object Configuration
    * @param $securityObj  object Security
    * @param $userId       integer user id
    * @param $userRole     integer user role
    * @return void
    */
   function DisplayViewThread(&$configObject, $securityObj, $forumId, $page) 
   {
      DisplayBaseFull::DisplayBaseFull($configObject, $securityObj); 
      $this->SetErrorAndEmptyBox();  
      $this->mForumId = $forumId;
      
      $this->SetNavigationTemplate();
      $this->mNumRecordPerPage = 10;
      $this->mPage = $page;
      
      $this->SetTemplateBasedir($configObject->GetValue('app_module') . 'e_forum/templates/');
      $this->SetTemplateFile('view_thread.html');
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
      $this->mTemplate->AddVar("content", "APPLICATION_MODULE", "Daftar Topik");
    
      $objThread = new ThreadClientService($this->mrUserSession->GetProperty("ServerServiceAddress"),false);             
      //$dataThread = $objThread->GetListThread($this->mForumId);
      $start_record = ($this->mPage*$this->mNumRecordPerPage)-($this->mNumRecordPerPage);
      $dataThread = $objThread->GetListThreadWithLimit($this->mForumId,$start_record, $this->mNumRecordPerPage);
      $recordcount = $objThread->GetCountListThread($this->mForumId);
      
      if ($this->mrUserSession->GetProperty('Role') == 2 || $this->mrUserSession->GetProperty('Role') == 7) {
         $this->SetAttribute("aksi", "visibility", "show");
         $this->SetAttribute("tambah", "visibility", "show");
         $this->AddVar('tambah', 'URL_ADD', $this->mrConfig->GetURL('e_forum','add_thread','view')."&forum_id=".$this->mrConfig->Enc($this->mForumId));
         $this->AddVar('tambah', 'URL_VIEW', $this->mrConfig->GetURL('e_forum','forum','view'));
         $this->SetAttribute("link_aksi", "visibility", "show");
      }
      if ($dataThread) {
         $i=1;
         foreach($dataThread as $val) {    
            $this->AddVar('list_thread', 'THREAD_NO', $i++);                      
            $this->AddVar('link_aksi', 'URL_EDIT', $this->mrConfig->GetURL('e_forum','edit_thread','view')."&thread_id=".$this->mrConfig->Enc($val['frmthrdId']));
            $this->AddVar('link_aksi', 'URL_DELETE', $this->mrConfig->GetURL('e_forum','thread','process')."&act=".$this->mrConfig->Enc('delete')."&thread_id=".$this->mrConfig->Enc($val['frmthrdId'])."&forum_id=".$this->mrConfig->Enc($this->mForumId));
            $this->mTemplate->parseTemplate("link_aksi");
            $this->AddVar('list_thread', 'URL_POST', $this->mrConfig->GetURL('e_forum','post','view')."&thread_id=".$this->mrConfig->Enc($val['frmthrdId']));
            $this->AddVar('list_thread', 'THREAD_JUDUL', $val['frmthrdJudul']);
            $this->AddVar('list_thread', 'THREAD_JUMLAH_POST', $val['frmthrdJumlahPost']);
            $this->AddVar('list_thread', 'THREAD_LAST_POST', $val['frmthrdLastPost']);
            if ($i%2 != 0){
               $this->AddVar('list_thread', 'EVEN', ' class="table-common-even"');
            }else{
               $this->AddVar('list_thread', 'EVEN', '');   
            }                
            $this->mTemplate->parseTemplate("list_thread", "a");
            
         }
         $url = $this->mrConfig->GetURL('e_forum', 'thread', 'view')."&forum_id=".$_GET['forum_id'];
         $this->ShowPageNavigation($url,$this->mPage,$recordcount, $this->mNumRecordPerPage);
      }
            
      $this->DisplayTemplate();
   }
   
   function ShowErrorBox($infoavailable = "NO") {
      $this->AddVar("error_box", "ERROR_MESSAGE",  
            $this->ComposeErrorMessage("Pengambilan data topik tidak berhasil." , $this->mErrorMessage));   
      $this->AddVar("data_profile", "INFO_AVAILABLE", $infoavailable);   
      $this->SetAttribute('error_box', 'visibility', 'visible');
   }
}

?>