<?php
/**
 * Display Materi
 * 
 * @package 
 * @author Fitria Maulina (lina@gamatechno.com)
 * @copyright Copyright (c) 2006
 * @version $Id$
 * @access public
 **/
class DisplayReferensi extends DisplayBaseFull 
{
    var $mrConfig;
    var $mMataKuliahDiampu;
  	var $mSemester;
  	var $mProgramStudi;
  	
  	var $mMateri;
  	var $mNim;
  	
  	var $mKelas;
  	var $mDosen;
  	var $mRole;
  	
  	var $mNumRecordPerPage;
  	var $mPage;
  	
  	var $mCari;
    /**
     * DisplayMateri::DisplayMateri()
     * 
     * @param $configObject
     * @return 
     **/
    function DisplayReferensi(&$configObject,&$security, $page)
    {
        DisplayBaseFull::DisplayBaseFull($configObject, $security);   
        
      	$this->mSemester = $_SESSION['materiSemester'];
      	$this->mNim = $this->mrUserSession->GetProperty("UserReferenceId");		
        $this->mRole = $this->mrUserSession->GetProperty("Role");
      	$this->mProgramStudi = $security->mUserIdentity->GetProperty("UserProdiId");
      	$this->mMateri = new MateriClientService($this->mrUserSession->GetProperty("ServerServiceAddress"),false, $this->mNim, $this->mProgramStudi);
      	
      	$this->mPage = $page;
      	$this->SetNavigationTemplate();
      	$this->mNumRecordPerPage = 15;
      	
      	$this->mCari = $_SESSION['referensi']['cari'];
      	//set template untuk error dan empty box DisplayBase::SetErrorAndEmptyBox
      	$this->SetErrorAndEmptyBox();
      	//set template untuk navigasi DisplayBase::SetNavigationTemplate
      	$this->SetNavigationTemplate();
      	$this->SetTemplateBasedir($this->mrConfig->GetValue('app_module') . 'e_materi/templates/');      		
  		
    } 

    /**
     * DisplayMateri::Display()
     * 
     * @return 
     **/
    function Display()
    {
    	DisplayBaseFull::Display('[ Logout ]');
    	$this->mTemplate->AddVar("content", "APPLICATION_MODULE", "Daftar Materi");
    	$this->mTemplate->AddVar("content", "FORM_AKSI", $this->mrConfig->GetURL('e_materi','materi','view'));

		
		if(isset($this->mCari))
		{
			$this->mTemplate->SetAttribute("show_table", "visibility", "show");
    		
    		$start_record = ($this->mPage*$this->mNumRecordPerPage)-($this->mNumRecordPerPage);
    		$dtRef = $this->mMateri->Getreferensi('%'.$this->mCari.'%', $start_record, $this->mNumRecordPerPage);    		    			
    		$recordcount = $this->mMateri->CountReferensi('%'.$this->mCari.'%');
    		
    		$this->mTemplate->AddVar("show_table","CARI",$this->mCari);
    		$this->mTemplate->AddVar("show_table","HASIL",$recordcount);
    		if(empty($dtRef))
    		{
    			$this->mTemplate->AddVar("referensi","DATA_EXIST","no");
    		}
    		else 
    		{
    			$this->mTemplate->AddVar("referensi","DATA_EXIST","yes");
    			//echo $recordcount;
    			$no = 1;
    			//print_r($dtRef);
    			foreach ($dtRef as $row => $value)
    			{
    				$dtRef[$row]['NO'] = $no++;
    				$materi = substr($dtRef[$row]['NAMA_FILE'],12,strlen($dtRef[$row]['NAMA_FILE']));
    				if (strlen($materi) > 15)
    				{
    					$arrMateri = explode(".",$materi);
    					$strFile = "";
    					for ($i=0;$i<count($arrMateri)-1;$i++)
    					{    						
    						$strFile .= $arrMateri[$i];
    					}
    					//echo $strFile;
    					$materi = substr($strFile,0,10)."...".$arrMateri[count($arrMateri)-1];
    				}
    				$dtRef[$row]['FILE_DISPLAY'] = $materi;
    				//$dtRef[$row]['DOWNLOAD'] = "module/e_materi/file_upload/".$dtRef[$row]['NAMA_FILE'];
      			$filename = $this->mrConfig->Enc($dtRef[$row]['NAMA_FILE']);
      			$dtRef[$row]['DOWNLOAD'] = $this->mrConfig->GetUrl("e_materi","download","proses")."&file=".$filename;
    			}
    			
    			$this->ParseData("daftar", $dtRef, "DATA_", $start_record+1);
    			$url = $this->mrConfig->GetURL('e_materi', 'referensi', 'view');    			
    			$this->ShowPageNavigation($url,$this->mPage,$recordcount, $this->mNumRecordPerPage);
    			
    		}

		}
    			
    	


    	$this->mTemplate->displayParsedTemplate();
    } 
} 

?>
