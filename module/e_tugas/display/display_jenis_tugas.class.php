<?php

/**
* DisplayJenisTugas
*
* @package
* @author Fitria Maulina (lina@gamatechno.com)
* @copyright Copyright (c) 2006 Gamatechno
* @version $Id$
* @access public
**/
class DisplayJenisTugas extends DisplayBaseFull
{
	var $mrConfig;
	var $mDbConnection;
	
	var $mMateri;
	var $mTugas;
	
	
	var $mProgramStudi;
	var $mUser;
	var $mNumRecordPerPage;
	var $mPage;	
	

	function DisplayJenisTugas(&$configObject,&$security, $page)
	{
		 DisplayBaseFull::DisplayBaseFull($configObject, $security);   
        
      	
      	$this->mUser = $this->mrUserSession->GetProperty("UserReferenceId");
        $this->mRole = $this->mrUserSession->GetProperty("Role");
        
      	$this->mProgramStudi = $security->mUserIdentity->GetProperty("UserProdiId");
      	$this->mMateri = new MateriClientService($this->mrUserSession->GetProperty("ServerServiceAddress"),false, $this->mNim, $this->mProgramStudi);
      	$this->mTugas = new TugasClientService($this->mrUserSession->GetProperty("ServerServiceAddress"),false, $this->mNim, $this->mProgramStudi);
      	
		$this->mNumRecordPerPage = 10;
		$this->mPage = $page;
      //	print_r($this->mMateri);    
       // echo $this->mrUserSession->GetProperty("ServerServiceAddress")."-".$this->mrUserSession->GetProperty("User");
      	//set template untuk error dan empty box DisplayBase::SetErrorAndEmptyBox
      	$this->SetErrorAndEmptyBox();
      	//set template untuk navigasi DisplayBase::SetNavigationTemplate
      	$this->SetNavigationTemplate();
  
      	$this->SetTemplateBasedir($this->mrConfig->GetValue('app_module') . 'e_tugas/templates/');      
	}

	/**
	* DisplayJenisTugas::Display()
	*
	* @return
	**/
	function Display()
	{
		DisplayBaseFull::Display('[ Logout ]');
    	$this->mTemplate->AddVar("content", "APPLICATION_MODULE", "Daftar Jenis Tugas");
		if(isset($_GET['e']))
			$this->mTemplate->AddVar("content", "ERROR", "Item tidak dapat dihapus. Jenis tugas ini telah digunakan");
		//echo  $_SESSION['tugas']['error'];
		
		$start_record = ($this->mPage*$this->mNumRecordPerPage)-($this->mNumRecordPerPage);
		$recordcount = $this->mTugas->CountJenisTugas($this->mUser);
		$dtJenisTugas = $this->mTugas->GetJenisTugas($start_record, $this->mNumRecordPerPage,$this->mUser);
    	//print_r($dtJenisTugas);
		if(empty($dtJenisTugas))
		{
			$this->mTemplate->AddVar("data_tugas","DATA_EXIST","false");
		}
		else
		{
			$this->mTemplate->AddVar("data_tugas","DATA_EXIST","true");
			$counter = 0;
			foreach($dtJenisTugas as $row => $value)
			{
				$arrdata[$row]['no'] = ++$counter;
				$arrdata[$row]['nama'] = $value['NAMA'];
				$arrdata[$row]['id'] = $value['ID'];
				$arrdata[$row]['persen'] = $value['PERSEN'];
				$arrdata[$row]['tugas'] = $value['TGS_ID'];			
				$arrdata[$row]['edit'] = $this->mrConfig->GetURL('e_tugas', 'jenis_tugas', 'update')."&id=".$value['ID'];
				
			}
			$this->ParseData("daftar_jenis_tugas", $arrdata, "TUGAS_", $start_record+1);
		}
		
		
    	$url = $this->mrConfig->GetURL('e_tugas', 'jenis_tugas', 'view');
        $this->ShowPageNavigation($url,$this->mPage,$recordcount, $this->mNumRecordPerPage);
		$this->mTemplate->displayParsedTemplate();
	}
}

?>