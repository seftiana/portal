<?php
/**
 * DisplaySharing
 * Display class for view all filesharing pages
 * 
 * @package 
 * @author Fitria Maulina
 * @copyright Copyright (c) 2006 GamaTechno
 * @version 1.0 
 * @date 2006-02-22
 * @revision 
 *
 */

class DisplaySharing extends DisplayBaseFull
{

   var $mErrorMessage;
   var $mErrorType;
      
   var $mShare;
   
   var $mNumRecordPerPage;
   var $mPage;
   
   var $mId;
   var $mUser;
   var $mRole;
   var $mAddress;
   var $mProgramStudi;
   /**
    * DisplayViewForum::DisplaySharing
    * Constructor for DisplaySharing class
    *
    * @param $configObject object Configuration
    * @param $securityObj  object Security
    * @return void
    */
   function DisplaySharing(&$configObject, $securityObj) 
   {
      DisplayBaseFull::DisplayBaseFull($configObject, $securityObj); 
      $this->SetErrorAndEmptyBox();  
      //print_r($this->mrUserSession);
      $this->mId =  $this->mrUserSession->GetProperty("UserReferenceId");
      $this->mUser =  $this->mrUserSession->GetProperty("User");
      $this->mRole =  $this->mrUserSession->GetProperty("Role");
      $this->mAddress = $this->mrUserSession->GetProperty("ServerServiceAddress");
	  $this->mProgramStudi =  $this->mrUserSession->GetProperty("UserProdiId");
	  $this->SetNavigationTemplate();//set template untuk error dan empty box DisplayBase::SetErrorAndEmptyBox
      $this->SetErrorAndEmptyBox();
      $this->SetTemplateBasedir($configObject->GetValue('app_module') . 'e_sharing/templates/');
      $this->mShare = new ShareClientService($this->mAddress,false, $this->mId, $this->mProgramStudi);
      $this->mNumRecordPerPage = 10;
      //print_r($this->mShare);
   }
   
   function DisplayViewSharing($page)
   {
   		DisplayBaseFull::Display("[ Logout ]");
		$this->SetTemplateFile('view_sharing.html');
		//echo $this->mrConfig->GetUrl("e_sharing","sharing","add");
	
		$this->mTemplate->AddGlobalVar('URL_ACTION',$this->mrConfig->GetUrl("e_sharing","sharing","proses"));
		$this->mPage = $page;
		//load data,jika untuk admin gagal kemungkinan tusrUntId admin belum sama dengan unitId SIA
      if(in_array($this->mRole,array(3,6))){
         $this->mTemplate->AddGlobalVar('COLSPAN','6');
         $recordcount = $this->mShare->CountAllFileAdmin();
         $start_record = ($this->mPage*$this->mNumRecordPerPage)-($this->mNumRecordPerPage);
         $dtFile = $this->mShare->GetAllFileAdmin($start_record, $this->mNumRecordPerPage);

         $this->setAttribute('aksi','visibility','visible');
         $this->setAttribute('aksi_daftar','visibility','visible');
         $this->setAttribute('show_activation','visibility','visible');
      }else{
         $this->mTemplate->AddGlobalVar('COLSPAN','4');
         $recordcount = $this->mShare->CountAllFile();
         $start_record = ($this->mPage*$this->mNumRecordPerPage)-($this->mNumRecordPerPage);
         $dtFile = $this->mShare->GetAllFile($start_record, $this->mNumRecordPerPage);
      }
      //print_r($dtFile);
		if(!empty($dtFile))
		{
	      if($start_record==''){
	        $no = 1;
	      }else{
	        $no = $start_record+1;
	      }			
			foreach ($dtFile as $row => $value)
			{//print_r($value);
				$value['NO'] = $no++;
				$value['SEND_DATE'] = $this->IndonesianDate($value['WAKTU']);
				//$dtFile[$row]['URL'] = "module/e_sharing/file_upload/".$dtFile[$row]['NAMA'];
				$filename = $this->mrConfig->Enc($value['NAMA']);
				$value['URL'] = $this->mrConfig->GetUrl("e_sharing","download","proses")."&file=".$filename;
				//$dtFile[$row]['FILE_DISPLAY'] = substr($dtFile[$row]['URL'],12,strlen($value['URL']));
            $this->addVar('aksi_daftar','FILE_STATUS',$value['STATUS']);
            $this->addVar('aksi_daftar','FILE_AKSI',"<input type=checkbox name=chk[".$value['ID']."] value='".$value['NAMA']."' />");
            $this->mTemplate->addVars('daftar',$value,'FILE_');
            $this->mTemplate->parseTemplate('daftar','a');
            $this->mTemplate->clearTemplate('aksi_daftar');
			}

			#$this->ParseData("daftar", $dtFile, "FILE_", $start_record+1);

		}
		
		
		
		//echo $recordcount;
    	$url = $this->mrConfig->GetURL('e_sharing', 'sharing', 'view');    			
    	$this->ShowPageNavigation($url,$this->mPage,$recordcount, $this->mNumRecordPerPage);
		
		$this->mTemplate->displayParsedTemplate();
   }   
   
   
   function DisplayAddSharing()
   {
   		DisplayBaseFull::Display("[ Logout ]");
		$this->SetTemplateFile('add_sharing.html');
		$this->mErrorMessage = $_SESSION['sharing']['error'];
		$this->mErrorType = $_SESSION['sharing']['errortype'];
        		
		$this->AddVar('content', 'FILE_JUDUL',$_SESSION['sharing']['judul']);
		$this->AddVar('content', 'FILE_KETERANGAN',$_SESSION['sharing']['keterangan']);
		
		$this->AddVar('content', 'URL_ACTION',$this->mrConfig->GetUrl("e_sharing","sharing","proses"));
		$this->ShowErrorMessage();
		$this->DisplayTemplate();
   }
   
   function ShowErrorMessage() {         
         if (!empty($this->mErrorMessage)) {
            $this->SetAttribute('error_box', 'visibility', 'visible');
            $this->AddVar('error_type', 'TYPE', strtoupper($this->mErrorType));
            $this->AddVar('error_box', 'ERROR_MESSAGE', $this->mErrorMessage);
         }
   }
   
  
    
  
}

?>