<?php

/**
* DisplayMhsTampil
*
* @package
* @author izzul@gamatechno.com
* @copyright Copyright (c) 2006 Gamatechno
* @version $Id$
* @access public
**/
class DisplayMhsTampil extends DisplayBaseFull
{
	var $mrConfig;
	var $mMateri;
	var $mTugas;
	var $mRef;
	var $pageId;
	var $mDbConnection;
	
	
	var $mNim;
	var $mRole;
	var $mProgramStudi;

	function DisplayMhsTampil(&$configObject, &$security,$pageId, $errId)
	{
		DisplayBaseFull::DisplayBaseFull($configObject, $security);   
		$this->SetNavigationTemplate();

    	$this->SetTemplateBasedir($this->mrConfig->GetValue('app_module') . 'e_tugas/templates/');

		
		$this->mNim = $this->mrUserSession->GetProperty("UserReferenceId");
		$this->mRole = $this->mrUserSession->GetProperty("Role");
        $this->mProgramStudi = $security->mUserIdentity->GetProperty("UserProdiId");
		
		$this->mMateri = new MateriClientService($this->mrUserSession->GetProperty("ServerServiceAddress"),false, $this->mNim, $this->mProgramStudi);
      	$this->mTugas = new TugasClientService($this->mrUserSession->GetProperty("ServerServiceAddress"),false, $this->mNim, $this->mProgramStudi);

		//print_r($this->mTugas);
		
	}

	/**
	* DisplayMhsTampil::Display()
	*
	* @return
	**/
	function Display()
	{
		DisplayBaseFull::Display('[ Logout ]');
		
	
		$active = $this->mTugas->GetSemesterAktif($this->mProgramStudi);
		//echo $this->mProgramStudi;
		//print_r($active);
		$this->mTemplate->AddVar("content", "SEMESTER", $active[0]['SEMESTER']);
      $this->mTemplate->AddVar("content", "APPLICATION_MODULE", "Tugas Kuliah");
		$this->mSemester = $active[0]['ID'];

		$dtTugas = $this->mTugas->GetTugasWhereMahasiswa($this->mNim,$this->mSemester);
		if (empty($dtTugas))
    	{
    		$this->mTemplate->AddVar("tugas","IS_EMPTY","empty");
    	}
    	else
    	{
    		$this->mTemplate->AddVar("tugas","IS_EMPTY","isi");
			$no = 0;
    			
    			foreach ($dtTugas as $rowTugas => $valTugas)
    			{
    				$valTugas['NO'] = ++$no;
    				$valTugas['MULAI'] = $this->IndonesianDate($valTugas['AWAL']);
    				$valTugas['SELESAI'] = $this->IndonesianDate($valTugas['AKHIR']);
    				$file = substr($dtTugas[$rowTugas]['NAMA_FILE'],12,strlen($dtTugas[$rowTugas]['NAMA_FILE']));
    				//jika $materi terlalu panjang maka dipotong dl
    				if (strlen($file) > 10)
    				{
    					$arrFile = explode(".",$file);
    					$strFile = "";
    					for ($i=0;$i<count($arrFile)-1;$i++)
    					{
    						$strFile .= $arrFile[$i];
    					}
    					$valTugas['FILE'] = substr($strFile,0,10)."...".$arrFile[count($arrFile)-1];
    				}
    				else 
    				{
    					$valTugas['FILE'] = $file;	
    				}

    				
//					$valTugas['DOWNLOAD'] = 'module/e_tugas/file_upload/'.$valTugas['NAMA_FILE'];
      			$filename = $this->mrConfig->Enc($valTugas['NAMA_FILE']);
      			$valTugas['DOWNLOAD'] = $this->mrConfig->GetUrl("e_tugas","download","proses")."&file=".$filename;
    				$valTugas['DETAIL'] = $this->mrConfig->GetURL('e_tugas','tugas_tampil','detail')."&id=".$this->mrConfig->Enc($dtTugas[$rowTugas]['ID']);
					
					
    				$this->mTemplate->addVars("daftar_tugas",$valTugas,"TUGAS_");
    				$this->mTemplate->parseTemplate("daftar_tugas", "a");
    			}
		}
		
		$this->mTemplate->displayParsedTemplate();
	}
}

?>
