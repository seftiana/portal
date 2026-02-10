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

class DisplayViewPost extends DisplayBaseFull
{

   var $mErrorMessage;
   var $mThreadId;
   var $mForum;
   
   var $mNumRecordPerPage;
   var $mPage;
	var $mAddress;
	var $mRole;
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
   function DisplayViewPost(&$configObject, $securityObj, $threadId, $page) 
   {
      DisplayBaseFull::DisplayBaseFull($configObject, $securityObj); 
      $this->SetErrorAndEmptyBox();  
      $this->mThreadId = $threadId;
      
      $this->SetNavigationTemplate();
      $this->mNumRecordPerPage = 10;
      $this->mPage = $page;
		$this->mRole = $this->mrUserSession->GetProperty('Role');
      
		if($this->mRole == 7)
		{
			$this->mAddress = $_SESSION['forum']['unit'];
			$this->mProdi = $_SESSION['forum']['prodi'];
		}
		else
		{
			$this->mAddress = $this->mrUserSession->GetProperty("ServerServiceAddress");
			$this->mProdi = "";
		}
		
      $this->mForum = new E_Forum($configObject);
      $this->SetTemplateBasedir($configObject->GetValue('app_module') . 'e_forum/templates/');
      $this->SetTemplateFile('view_post.html');
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
      $this->mTemplate->AddVar("content", "APPLICATION_MODULE", "Daftar Pesan");
    
      $objThread = new ThreadClientService($this->mAddress,false);             
      $dtThread = $objThread->GetDetailThread($this->mThreadId);
      $start_record = ($this->mPage*$this->mNumRecordPerPage)-($this->mNumRecordPerPage);
      $dataPost = $objThread->GetListPostWithLimit($this->mThreadId,$start_record, $this->mNumRecordPerPage);
      $recordcount = $objThread->GetCountListPost($this->mThreadId);
      //print_r($dtThread);
      $this->AddVar('content', 'THREAD_ID', $this->mThreadId);
      $this->AddVar('content', 'URL_INSERT', $this->mrConfig->GetURL('e_forum','post','process')."&act=".$this->mrConfig->Enc('insert'));
      $this->AddVar('content', 'URL_VIEW', $this->mrConfig->GetURL('e_forum','thread','view').'&forum_id='.$dtThread[0]['FORUM_ID']);
      
      if ($this->mrUserSession->GetProperty('Role') == 2 || $this->mrUserSession->GetProperty('Role') == 3) {
         $this->SetAttribute("aksi", "visibility", "show");         
         $this->SetAttribute("link_aksi", "visibility", "show");
      }
      $i=1;
      if ($dataPost) {
         foreach($dataPost as $val) {                        
            $i++;
            $this->AddVar('link_aksi', 'URL_DELETE', $this->mrConfig->GetURL('e_forum','post','process')."&act=".$this->mrConfig->Enc('delete')."&post_id=".$this->mrConfig->Enc($val['POST_ID'])."&thread_id=".$this->mrConfig->Enc($val['THREAD_ID']));
            $this->mTemplate->parseTemplate("link_aksi");
            $this->AddVar('list_post', 'USER_ID', $val['USER_ID']);
            $tmp = $this->mForum->GetUserName($val['USER_ID']);
            
            $this->AddVar('list_post', 'NAMA_PENGIRIM', $tmp[0]['USERNAME']);            
            $this->AddVar('list_post', 'JUMLAH_POST', $val['JUMLAH_POST']);
            $this->AddVar('list_post', 'TANGGAL', $val['TANGGAL']);
            $this->AddVar('list_post', 'JAM', $val['JAM']);
            $val['PESAN'] = str_replace("\n", "<br>", $val['PESAN']);
            $val['PESAN'] = str_replace('[i]', "<i>", $val['PESAN']);
            $val['PESAN'] = str_replace('[/i]', "</i>", $val['PESAN']);
            $val['PESAN'] = str_replace('[b]', "<b>", $val['PESAN']);
            $val['PESAN'] = str_replace('[/b]', "</b>", $val['PESAN']);
            $this->AddVar('list_post', 'PESAN', $val['PESAN']);
            if ($i%2 != 0){
               $this->AddVar('list_post', 'EVEN', ' class="table-common-even"');
            }else{
               $this->AddVar('list_post', 'EVEN', '');   
            }                
            $this->mTemplate->parseTemplate("list_post", "a");
            
         }
         $url = $this->mrConfig->GetURL('e_forum', 'post', 'view')."&thread_id=".$_GET['thread_id'];
         $this->ShowPageNavigation($url,$this->mPage,$recordcount, $this->mNumRecordPerPage);
      }
            
      $this->DisplayTemplate();
   }
   
   function ShowErrorBox($infoavailable = "NO") {
      $this->AddVar("error_box", "ERROR_MESSAGE",  
            $this->ComposeErrorMessage("Pengambilan data post tidak berhasil." , $this->mErrorMessage));   
      $this->AddVar("data_profile", "INFO_AVAILABLE", $infoavailable);   
      $this->SetAttribute('error_box', 'visibility', 'visible');
   }
}

?>