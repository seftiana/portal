<?php
/**
 * DisplayViewProfile
 * Display class for view and search user
 * 
 * @package 
 * @author Refit Gustaroska
 *@updated by Fitria Maulina
 * @copyright Copyright (c) 2006 GamaTechno
 * @version 1.0 
 * @date 2006-02-22
 * @revision 
 *
 */

class DisplayViewForum extends DisplayBaseFull
{

   var $mErrorMessage;
   var $matkulId;
   var $mNumRecordPerPage;
   var $mPage;
	
	var $mAddress;
	var $mProdi;
	var $mRole;
	var $mId;
	var $mSemester;
	
	var $mMateri;
   
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
   function DisplayViewForum(&$configObject, $securityObj, $matkulId, $semId, $act, $page=1) 
   {
      DisplayBaseFull::DisplayBaseFull($configObject, $securityObj); 
      $this->SetErrorAndEmptyBox();  
      
      $this->matkulId = $matkulId;		
      $this->semId = $semId;
      $this->act = $act;
      $this->mRole = $this->mrUserSession->GetProperty('Role');
      $this->mId = $this->mrUserSession->GetProperty('UserReferenceId');
      $this->mMateriLokal = new Materi( $this->mrConfig);
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
		//echo $this->mAddress;
	  $this->mMateri = new MateriClientService($this->mAddress,false, $this->mId, $this->mProdi);
      $this->SetNavigationTemplate();
      $this->mNumRecordPerPage = 10;
      $this->mPage = $page;
      $this->SetTemplateBasedir($configObject->GetValue('app_module') . 'e_forum/templates/');
      $this->SetTemplateFile('view_forum.html');
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
      	//echo "as;asl";
      	DisplayBaseFull::Display("[ Logout ]"); 
		$objForum = new ForumClientService($this->mrUserSession->GetProperty("ServerServiceAddress"),false); 
     	$this->mTemplate->AddVar("content", "APPLICATION_MODULE", "Daftar Forum");
      	
      	$this->mTemplate->AddVar("form_filter", "URL_ACTION", $this->mrConfig->GetURL('e_forum','forum','view'));
		/****** start by lina *******/		
      
      if($this->mRole == 7)
		{
			$paramKul = $this->mProdi;
			$this->mTemplate->SetAttribute("view_unit", "visibility", "show");
			$dtUnit = $this->mMateriLokal->GetUnit();
			$dtProdi = $this->mMateriLokal->GetProdi();
			
			if(!empty($dtUnit))
			{
				foreach($dtUnit as $row => $value)
				{
	    			$this->mTemplate->addVars("list_unit",$value,"UNIT_");
	    			$this->mTemplate->parseTemplate("list_unit", "a");
					$this->mTemplate->AddVar("list_unit", "SELECT_".$this->mAddress, "selected");
	    		}
			}	

			if(!empty($dtProdi))
			{
				foreach($dtProdi as $row => $value)
				{
	    			$this->mTemplate->addVars("list_prodi",$value,"PRODI_");
	    			$this->mTemplate->parseTemplate("list_prodi", "a");
					$this->mTemplate->AddVar("list_prodi", "SELECT_".$this->mProdi, "selected");
	    		}
			}
         
         #$this->SetAttribute("form_filter", "visibility", "show");   
	      #$this->SetAttribute("aksi", "visibility", "show");
         #$this->SetAttribute("link_aksi", "visibility", "show");
	      #$this->SetAttribute("tambah", "visibility", "show");
         #$this->mTemplate->AddVar("add_forum", "ADD_ACTION", $this->mrConfig->GetURL('e_forum','add_forum','view'));
		}
		else 
		{
			$paramKul = $this->mrUserSession->GetProperty('User');
		}
		
		
		/******************************/
		
		
		$start_record = ($this->mPage*$this->mNumRecordPerPage)-($this->mNumRecordPerPage);
      	$dataForum = $objForum->GetAllListForum($this->matkulId, $this->semId,$start_record, $this->mNumRecordPerPage);
      	$recordcount = $objForum->CountAllListForum($this->matkulId, $this->semId);            
      
      	//if ($this->mrUserSession->GetProperty('Role') == 2 || $this->mrUserSession->GetProperty('Role') == 7) {        
            $objPengumuman = new PengumumanClientService($this->mAddress,false,$this->mId,$this->mProdi);             
            $pilihanSemester = $this->mMateri->GetAllPassedSemester($this->mRole);
            
            if (empty($pilihanSemester))
    		{
    			foreach($empty as $row => $value)
				{
    				$this->mTemplate->addVars("list_semester",$value,"SEM_");
    				$this->mTemplate->parseTemplate("list_semester", "a");
    			}
    		}
    		else
    		{    		
	    		foreach($pilihanSemester as $row => $value){
	    			$pilihanSemester[$row]['NAMA'] = $pilihanSemester[$row]['SEMESTER']." ".$pilihanSemester[$row]['TAHUN'];    			
	              			
	    			//jika belum ada session nya nbgambil default sem aktif
	    			if(!isset($_SESSION['forum']['semester']))
	    			{
	    				if($pilihanSemester[$row]['IS_AKTIF'] == '1')
	    				{
	    					
	    					$_SESSION['forum']['semester'] = $pilihanSemester[$row]['ID'];
	    					$this->mSemester = $pilihanSemester[$row]['ID'];
	    					$nmSemester = $pilihanSemester[$row]['NAMA'];
	    					//echo $_SESSION['materiSemester'];
	    				}
	    			}
	    			else
	    			{
	    				//echo $_SESSION['materiSemester'];
	    				$this->mSemester = $_SESSION['forum']['semester'];
	    				//echo $this->mSemester ;
	    				if ($this->mSemester == $pilihanSemester[$row]['ID'])
	    				{    					
	    					$nmSemester = $pilihanSemester[$row]['NAMA'];
	    				}
	    				
	    			} 
	    			
	    			$this->mTemplate->addVars("list_semester",$pilihanSemester[$row],"SEM_");
	    			$this->mTemplate->parseTemplate("list_semester", "a");
					$this->mTemplate->AddVar("list_semester","SELECT_".$this->mSemester,"selected");    			
	    		}
				$this->mTemplate->AddVar("content","NMSMT",$nmSemester);    				
	    		
	    	 }
	    	 
	    	if ($this->mRole == 2){ //dosen
            $this->SetAttribute("aksi", "visibility", "show");
            $this->SetAttribute("link_aksi", "visibility", "show");
            $this->SetAttribute("tambah", "visibility", "show");         
            $this->mTemplate->AddVar("tambah", "ADD_ACTION", $this->mrConfig->GetURL('e_forum','add_forum','view'));
         }
	    	 
          //{
	    	 	$dataMatkul = $objForum->GetListMatKul($this->mId, $this->mrUserSession->GetProperty('Role'));
            //print_r($dataMatkul);
				if ($dataMatkul) 
				{
			         $i=1;
			         foreach($dataMatkul as $rowKul => $valKul) { 
			         	$val['NO'] = $i++;
			         	$this->mTemplate->addVars("matkul",$valKul,"MATKUL_");			          	
			            $this->mTemplate->parseTemplate("matkul", "a");
			            $this->mTemplate->AddVar("matkul","SELECT_".$this->matkulId,"selected"); 
			            
			         }
				}	
	    	 
	    	// }
	         $this->SetAttribute("form_filter", "visibility", "show");   
	         #$this->SetAttribute("aksi", "visibility", "show");
	         #$this->SetAttribute("tambah", "visibility", "show");
	         #$this->AddVar('tambah', 'URL_ADD', $this->mrConfig->GetURL('e_forum','add_forum','view')."&matkul_id=");
	         
            #$this->SetAttribute("link_aksi", "visibility", "show");
      	//}    
		$this->SetAttribute("show_forum", "visibility", "show");
      
		if(isset($_SESSION['forum']['matkul']) && isset($dataForum) && trim($dataForum)!='')
		{
			 
	      if ($dataForum[0]) {
	         $i=1;
	         foreach($dataForum as $row => $val) {      
	            $this->AddVar('list_forum', 'FORUM_NO', $i++);          
	            $this->AddVar('list_forum', 'FORUM_ID', $val['forumId']);
	            $this->AddVar('link_aksi', 'URL_EDIT', $this->mrConfig->GetURL('e_forum','edit_forum','view')."&forum_id=".$this->mrConfig->Enc($val['ID']));
	            $this->AddVar('link_aksi', 'URL_DELETE', $this->mrConfig->GetURL('e_forum','forum','process')."&act=".$this->mrConfig->Enc('delete')."&forum_id=".$this->mrConfig->Enc($val['ID'])."&matkul_id=".$this->mrConfig->Enc($this->matkulId));
	            $this->mTemplate->parseTemplate("link_aksi");
	            //$this->AddVar('list_forum', 'URL_THREAD', $this->mrConfig->GetURL('e_forum','thread','view')."&forum_id=".$this->mrConfig->Enc($val['forumId']));
	            //$this->AddVar('list_forum', 'FORUM_NAMA', $val['forumNama']);
	            //$this->AddVar('list_forum', 'FORUM_DESKRIPSI', $val['forumDeskripsi']);
	            //$this->AddVar('list_forum', 'FORUM_LAST_POST', $val['frmthrdLastPost']);
	            //$this->AddVar('list_forum', 'FORUM_JUMLAH_TOPIK', $val['jumlahThread']);
					
					
				$val['THREAD'] = $this->mrConfig->GetURL('e_forum','thread','view')."&forum_id=".$this->mrConfig->Enc($val['ID']);
					//$val['EDIT'] = $this->mrConfig->GetURL('e_forum','edit_forum','view')."&forum_id=".$this->mrConfig->Enc($val['ID']);
					//$val['DELETE'] = $this->mrConfig->GetURL('e_forum','edit_forum','view')."&forum_id=".$this->mrConfig->Enc($val['ID']);
					//echo $val['THREAD'];
	            if ($i%2 != 0){
	               $this->AddVar('list_forum', 'EVEN', ' class="table-common-even"');
	            }else{
	               $this->AddVar('list_forum', 'EVEN', '');   
	            }   
				$this->mTemplate->AddVars("list_forum",$val,"FORUM_");					
	            $this->mTemplate->parseTemplate("list_forum", "a");
	            
	         }
	         $url = $this->mrConfig->GetURL('e_forum', 'forum', 'view');
	         $this->ShowPageNavigation($url,$this->mPage,$recordcount, $this->mNumRecordPerPage);
	      }
		}else{
         $this->SetAttribute("list_forum", "visibility", "hidden");
         $this->SetAttribute("show_warning", "visibility", "show");
      }   
            
      $this->DisplayTemplate();
   }
   
   function ShowErrorBox($infoavailable = "NO") {
      $this->AddVar("error_box", "ERROR_MESSAGE",  
      $this->ComposeErrorMessage("Pengambilan data forum tidak berhasil." , $this->mErrorMessage));   
      $this->AddVar("data_profile", "INFO_AVAILABLE", $infoavailable);   
      $this->SetAttribute('error_box', 'visibility', 'visible');
   }
}

?>