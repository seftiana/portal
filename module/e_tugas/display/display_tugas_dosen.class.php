<?php

/**
* DisplayDosenTampil
*
* @package
* @author Fitria Maulina (lina@gamatechno.com)
* @copyright Copyright (c) 2006 Gamatechno
* @version $Id$
* @access public
**/
class DisplayDosenTampil extends DisplayBaseFull
{
	var $mrConfig;
	var $mDbConnection;
	
	var $mMateri;
	var $mTugas;
	
	var $mSemester;	
	var $mNim;
	var $mKelas;
	var $mJudul;
	var $mRole;
	var $mProgramStudi;
	var $mAddress;
	var $mMateriLokal;
	
	var $mNumRecordPerPage;
	var $mPage;	
	

	function DisplayDosenTampil(&$configObject,&$security, $page)
	{
		 DisplayBaseFull::DisplayBaseFull($configObject, $security);   
        
      	$this->mSemester = $_SESSION['tugas']['semester'];
      	$this->mKelas = $_SESSION['tugas']['kelas'];
      	$this->mJudul = '%'.$_SESSION['tugas']['judul'].'%';
      	      	
      	$this->mNim = $this->mrUserSession->GetProperty("UserReferenceId");
        $this->mRole = $this->mrUserSession->GetProperty("Role");
		
		if($this->mRole == 7)
		{
			$this->mAddress = isset($_SESSION['tugas']['unit'])? $_SESSION['tugas']['unit'] : "";
			$this->mProgramStudi =  "";
		}
		else
		{
			$this->mAddress = $this->mrUserSession->GetProperty("ServerServiceAddress");
			$this->mProgramStudi =  $security->mUserIdentity->GetProperty("UserProdiId");
		}
        
      	//$this->mProgramStudi = $security->mUserIdentity->GetProperty("UserProdiId");
      	$this->mMateri = new MateriClientService($this->mAddress,false, $this->mNim, $this->mProgramStudi);
      	$this->mTugas = new TugasClientService($this->mAddress,false, $this->mNim, $this->mProgramStudi);
      	$this->mMateriLokal = new Materi( $this->mrConfig);
		$this->mNumRecordPerPage = 15;
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
	* DisplayDosenTampil::Display()
	*
	* @return
	**/
	function Display()
	{
		DisplayBaseFull::Display('[ Logout ]');
    	$this->mTemplate->AddVar("content", "APPLICATION_MODULE", "Daftar Tugas");

    	$start_record = ($this->mPage*$this->mNumRecordPerPage)-($this->mNumRecordPerPage);		
    	
    	//ambil dan parse  data unit jika login sbg admin elearning
		//echo $this->mProgramStudi;
		if($this->mRole == 7)
		{
				
			$this->mTemplate->SetAttribute("view_unit", "visibility", "show");
			$dtUnit = $this->mMateriLokal->GetUnit();
			
			if(!empty($dtUnit))
			{
				foreach($dtUnit as $row => $value)
				{
	    			$this->mTemplate->addVars("list_unit",$value,"UNIT_");
	    			$this->mTemplate->parseTemplate("list_unit", "a");
					$this->mTemplate->AddVar("list_unit", "SELECT_".$this->mAddress, "selected");
	    		}
			}	

		}
		
    	//pilihan semester
    	$empty = array(array("ID"=>"","selected"=>"","NAMA"=>"--kosong--"));
      	$pilihanSemester = $this->mMateri->GetAllPassedSemester($this->mRole);
    	if (empty($pilihanSemester))
    	{
    		foreach($empty as $row => $value){

    			$this->mTemplate->addVars("list_semester",$value,"SEM_");
    			$this->mTemplate->parseTemplate("list_semester", "a");
				
    		}
    	}
    	else
    	{    		
    		foreach($pilihanSemester as $row => $value)
			{
    			$pilihanSemester[$row]['NAMA'] = $pilihanSemester[$row]['SEMESTER']." ".$pilihanSemester[$row]['TAHUN'];    			
              			
    			//jika belum ada session nya nbgambil default sem aktif
    			if(!isset($_SESSION['tugas']['semester']))
    			{
    				if($pilihanSemester[$row]['IS_AKTIF'] == '1')
    				{    				
						$_SESSION['tugas']['semester'] = $pilihanSemester[$row]['ID'];
    					$this->mSemester = $pilihanSemester[$row]['ID'];
    					$nmSemester = $pilihanSemester[$row]['NAMA'];
    				}
    			}
    			else
    			{
    				//$this->mSemester = $_SESSION['tugas']['semester'];
    				if ($this->mSemester == $pilihanSemester[$row]['ID'])
    				{	
    					$nmSemester = $pilihanSemester[$row]['NAMA'];
    				}
    				
    			}    
    			//echo $this->mSemester;
    			$this->mTemplate->addVars("list_semester",$pilihanSemester[$row],"SEM_");
				$this->mTemplate->AddVar("list_semester","SELECT_".$this->mSemester,"selected");   
    			$this->mTemplate->parseTemplate("list_semester", "a"); 			
    		}
    		
    	}
    	
    	$this->mTemplate->AddVar("content","NAMA_SEMESTER",$nmSemester);      	
    	// end of pilihan semester 
    	
    	
    	//pilihan kelas
    	$dtKelas = $this->mMateri->GetKuliahWhereSemester($this->mSemester,$this->mRole);
    	$emptyKelas = array(array("DSN_ID"=>"","selected"=>"","DSN_NAMA"=>"--kosong--"));
    	if(empty($dtKelas)) $dtKelas = $empty;
    	foreach ($dtKelas as $rowKelas => $valKelas)
    	{

    		$this->mTemplate->addVars("list_kelas",$valKelas,"KLS_");
    		$this->mTemplate->parseTemplate("list_kelas", "a");
    		$this->mTemplate->AddVar("list_kelas","SELECT_".$this->mKelas,"selected");
    	}    	
    	//end of pilihan kelas
    	
    	
    	//mulai retrieve data tugas
    	if (isset($this->mKelas))
    	{
    		$dtTugas = $this->mTugas->GetTugasWhereDosen($this->mKelas,$this->mJudul,$start_record, $this->mNumRecordPerPage);
    		$recordcount = $this->mTugas->CountTugasWhereDosen($this->mKelas,$this->mJudul);
    		$this->mTemplate->SetAttribute("show_table", "visibility", "show");
    		if (empty($dtTugas))
    		{
    			$this->mTemplate->AddVar("data_tugas","DATA_EXIST","false");
    		}
    		else
    		{
    			$this->mTemplate->AddVar("data_tugas","DATA_EXIST","true");
    			//print_r($dtTugas);
				//$recordcount = $this->mTugas->CountTugas($this->mSemester,$this->mKelas,$this->mJudul);
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
    				$valTugas['LINK_EDIT'] = $this->mrConfig->GetURL('e_tugas','tugas_tampil','update')."&id=".$this->mrConfig->Enc($dtTugas[$rowTugas]['ID']);
					$valTugas['LINK_NILAI'] = $this->mrConfig->GetURL('e_tugas','nilai_tugas','view')."&id=".$this->mrConfig->Enc($dtTugas[$rowTugas]['ID']);
					//echo $this->mrConfig->GetURL('e_tugas','tugas_tampil','update')."&id=".$dtTugas[$rowTugas]['ID'];
					//$valTugas['DOWNLOAD'] = 'module/e_tugas/file_upload/'.$valTugas['NAMA_FILE'];
      			$filename = $this->mrConfig->Enc($valTugas['NAMA_FILE']);
      			$valTugas['DOWNLOAD'] = $this->mrConfig->GetUrl("e_tugas","download","proses")."&file=".$filename;
    				
					
					
    				$this->mTemplate->addVars("daftar_tugas",$valTugas,"TUGAS_");
    				$this->mTemplate->parseTemplate("daftar_tugas", "a");
    			}
				$url = $this->mrConfig->GetURL('e_tugas', 'tugas_dosen', 'view');

				$this->ShowPageNavigation($url,$this->mPage,$recordcount, $this->mNumRecordPerPage);
    		}
    	}
    	
       
    	
    	

    			
		$this->mTemplate->displayParsedTemplate();
	}
}

?>
