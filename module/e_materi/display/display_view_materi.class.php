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
class DisplayMateri extends DisplayBaseFull 
{
    var $mrConfig;
    var $mMataKuliahDiampu;
  	var $mSemester;
  	var $mProgramStudi;
  	
  	var $mMateri;
	var $mLokalMateri;
  	var $mNim;
  	
  	var $mKelas;
  	var $mDosen;
  	var $mRole;
	var $mAddress;
  	var $mNumRecordPerPage;
  	var $mPage;
    /**
     * DisplayMateri::DisplayMateri()
     * 
     * @param $configObject
     * @return 
     **/
    function DisplayMateri(&$configObject,&$security, $page)
    {
        DisplayBaseFull::DisplayBaseFull($configObject, $security);   
        
      	$this->mSemester = isset($_SESSION['materiSemester'])?$_SESSION['materiSemester']: "";
      	$this->mNim = $this->mrUserSession->GetProperty("UserReferenceId");
		//echo $this->mNim;
        $this->mRole = $this->mrUserSession->GetProperty("Role");
      	
		if($this->mRole == 7)
		{
			$this->mAddress = isset($_SESSION['materiUnit'])? $_SESSION['materiUnit'] : "";
			$this->mProgramStudi =  isset($_SESSION['materiProdi'])? $_SESSION['materiProdi'] : "";
		}
		else
		{
			$this->mAddress = $this->mrUserSession->GetProperty("ServerServiceAddress");
			$this->mProgramStudi =  $this->mrUserSession->GetProperty("UserProdiId");
		}
      	$this->mMateri = new MateriClientService($this->mAddress,false, $this->mNim, $this->mProgramStudi);
		$this->mMateriLokal = new Materi( $this->mrConfig);
      	//echo $this->mRole;
      	$this->mPage = $page;
      	$this->mNumRecordPerPage = 15;
      	//print_r($this->mMateri);
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

		//print_r($_SESSION);
    	$this->mKelas = isset($_SESSION['materiKelas'])?$_SESSION['materiKelas'] : "";
    	$this->mDosen = isset($_SESSION['materiDosen']) ? $_SESSION['materiDosen'] : "";
		
		//ambil dan parse  data unit jika login sbg admin elearning
		//echo $this->mProgramStudi;
		if($this->mRole == 7)
		{
			//if(isset($_SESSION['materiUnit'])) 
			$pilihanSemester = $this->mMateri->GetAllPassedSemester($this->mRole);
				
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
					$this->mTemplate->AddVar("list_prodi", "SELECT_".$this->mProgramStudi, "selected");
	    		}
			}
		}else
		{
			$pilihanSemester = $this->mMateri->GetAllPassedSemester($this->mRole);
		}
		
		//$this->mTemplate->displayParsedTemplate();
      
    	//echo "123456";
      	//pilihan semester
    	$empty = array(array("ID"=>"","selected"=>"","NAMA"=>"--kosong--"));    	
    	$start_record = ($this->mPage*$this->mNumRecordPerPage)-($this->mNumRecordPerPage);
		//123
      	
		
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
    			if(!isset($_SESSION['materiSemester']))
    			{
    				if($pilihanSemester[$row]['IS_AKTIF'] == '1')
    				{
    					
    					$_SESSION['materiSemester'] = $pilihanSemester[$row]['ID'];
    					$this->mSemester = $pilihanSemester[$row]['ID'];
    					$nmSemester = $pilihanSemester[$row]['NAMA'];
    					//echo $_SESSION['materiSemester'];
    				}
    			}
    			else
    			{
    				//echo $_SESSION['materiSemester'];
    				$this->mSemester = $_SESSION['materiSemester'];
    				//echo $this->mSemester ;
    				if ($this->mSemester == $pilihanSemester[$row]['ID'])
    				{    					
    					$nmSemester = $pilihanSemester[$row]['NAMA'];
    				}
    				
    			} 
    			
    			$this->mTemplate->addVars("list_semester",$pilihanSemester[$row],"SEM_");
				$this->mTemplate->AddVar("list_semester","SELECT_".$this->mSemester,"selected");    
    			$this->mTemplate->parseTemplate("list_semester", "a");			
    		}
			$this->mTemplate->AddVar("content","NMSMT",$nmSemester);    				
    		
    	}
    	//echo "2";
    	
    	
    
    	$judul = isset($_SESSION['materiJudul'])?'%'.$_SESSION['materiJudul'].'%' : '%%';
		//echo "3";
		// echo $this->mSemester ."-" . $this->mRole;
    	//tampilkan bagian2 yg untuk dosen/mahasiswa saja
    	if ($this->mRole == 1) {//mahsiswa
	    	$this->mTemplate->AddVar("pilihan_lain", "ROLE", "mahasiswa");
	    	$this->mTemplate->SetAttribute("show_activation", "visibility", "hidden");
	    	$this->mTemplate->SetAttribute("showRadioKelas", "visibility", "show");
	    	$this->mTemplate->SetAttribute("show_add_button", "visibility", "hidden");
	
	    	//
	    	$dtKelas = $this->mMateri->GetKuliahWhereSemester($this->mSemester, $this->mRole);
	    	$dtDosen = $this->mMateri->GetDosenWhereSemester($this->mSemester, $this->mRole);	    	
	    	if ($_POST['klsDsn'] == "dosen")
	    	{
	    		//echo $this->mDosen;
	    		$dtMateri = $this->mMateri->GetMateriWhereDosen($this->mSemester,$this->mDosen,$judul,$start_record, $this->mNumRecordPerPage);
	    		$recordcount = $this->mMateri->CountMateriWhereDosen($this->mSemester,$this->mDosen);
	    		$this->mTemplate->AddVar("content", "KELAS_DISABLED", "disabled");
	    		$this->mTemplate->AddVar("pilihan_lain", "DOSEN_DISABLED", "");
	
	    		$this->mTemplate->AddVar("showRadioKelas", "KELAS_CHECK", "");
	    		$this->mTemplate->AddVar("pilihan_lain", "DOSEN_CHECK", "checked");
	    	}
	    	else
	    	{
	    		$dtMateri = $this->mMateri->GetMateriWhereKuliah($this->mKelas,$judul,$start_record, $this->mNumRecordPerPage);
	    		$recordcount = $this->mMateri->CountMateriWhereKuliah($this->mKelas,$judul);
	    		
	    		$this->mTemplate->AddVar("pilihan_lain", "DOSEN_DISABLED", "disabled");
	    		$this->mTemplate->AddVar("content", "KELAS_DISABLED", "");
	
	    		$this->mTemplate->AddVar("showRadioKelas", "KELAS_CHECK", "checked");
	    		$this->mTemplate->AddVar("pilihan_lain", "DOSEN_CHECK", "");
	    	}
    	}
    	else{
			//echo "4";
    		$this->mTemplate->AddVar("pilihan_lain", "ROLE", "dosen");
    		$this->mTemplate->SetAttribute("show_add_button", "visibility", "show");
    		$this->mTemplate->SetAttribute("show_activation", "visibility", "show");
    		//$this->mTemplate->AddVar("aktivation", "ROLE", "dosen");
			$dtKelas = $this->mMateri->GetKuliahWhereSemester($this->mSemester,$this->mRole);
			
			
			$dtMateri = $this->mMateri->GetMateriWhereDosenMataKuliah($this->mKelas,$judul,$start_record, $this->mNumRecordPerPage);
    		$recordcount = $this->mMateri->CountMateriWhereDosenMataKuliah($this->mKelas,$judul);	
    	}

		//echo "7";
    

    	$emptyKelas = array(array("DSN_ID"=>"","selected"=>"","DSN_NAMA"=>"--kosong--"));
    	if(empty($dtKelas)) $dtKelas = $empty;
		
    	foreach ($dtKelas as $rowKelas => $valKelas)
    	{

    		$this->mTemplate->addVars("list_kelas",$valKelas,"KLS_");
    		$this->mTemplate->parseTemplate("list_kelas", "a");
    		$this->mTemplate->AddVar("list_kelas","SELECT_".$this->mKelas,"selected");
    	}
			
		/*
    	if(empty($dtDosen)) $dtDosen = $emptyKelas;
    	//print_r($dtDosen);
    	foreach ($dtDosen as $rowDsn => $valDsn)
    	{
    		$this->mTemplate->addVars("list_dosen",$valDsn,"");
    		$this->mTemplate->parseTemplate("list_dosen", "a");
    		$this->mTemplate->AddVar("list_dosen","SELECT_".$this->mDosen,"selected");
    	}
		*/
		//echo "6";
      	
    	if (($this->mKelas != "") || ($this->mDosen != ""))
    	{
    		$this->mTemplate->SetAttribute("show_table", "visibility", "show");
    		if (empty($dtMateri))
    		{
    			$this->mTemplate->AddVar("data_materi","DATA_EXIST","false");
    		}
    		else
    		{
    			$this->mTemplate->AddVar("data_materi","DATA_EXIST","true");
    			$no = 0;
    			foreach ($dtMateri as $rowMateri => $valMateri)
    			{
    				if ($this->mRole == 1) //MAHASISWA
    				{
    					//$aksi = "<a href=".$cfg->GetValue('docroot')."/materi_upload_file/".$dtMateri[$rowMateri]['NAMA_FILE']."></a>";    					
    					$linkJudul =  $this->mrConfig->GetURL('e_materi','materi_tampil','detail')."&id=".$dtMateri[$rowMateri]['ID'];
    					$aksi = "<a href=".$linkJudul.">Detail</a>";

    				}
    				else //DOSEN
    				{
    					$aksi = "<input type=checkbox name=chk[".$dtMateri[$rowMateri]['ID']."] value='".$dtMateri[$rowMateri]['NAMA_FILE']."' />";
    					$linkJudul =  $this->mrConfig->GetURL('e_materi','materi_tampil','update')."&id=".$this->mrConfig->Enc($dtMateri[$rowMateri]['ID']);

    				}
    				$materi = substr($dtMateri[$rowMateri]['NAMA_FILE'],12,strlen($dtMateri[$rowMateri]['NAMA_FILE']));
    				
    				//jika $materi terlalu panjang maka dipotong dl
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
    				$dtMateri[$rowMateri]['AKSI'] = $aksi;
    				$dtMateri[$rowMateri]['NO'] = ++$no;
    				$dtMateri[$rowMateri]['FILE'] = $materi;
    				//$dtMateri[$rowMateri]['DOWNLOAD'] = "module/e_materi/file_upload/".$dtMateri[$rowMateri]['NAMA_FILE'];
      			$filename = $this->mrConfig->Enc($dtMateri[$rowMateri]['NAMA_FILE']);
      			$dtMateri[$rowMateri]['DOWNLOAD'] = $this->mrConfig->GetUrl("e_materi","download","proses")."&file=".$filename;
    				
    				$dtMateri[$rowMateri]['LINK_JUDUL'] = $linkJudul;
    				
    			
    				
    			}
    			
    			
    			$this->ParseData("daftar_materi", $dtMateri, "MATERI_", $start_record+1);
    			$url = $this->mrConfig->GetURL('e_materi', 'materi', 'view');
    			
    			$this->ShowPageNavigation($url,$this->mPage,$recordcount, $this->mNumRecordPerPage);
    			
    		}
    	}

		
    	$this->mTemplate->displayParsedTemplate();
    } 
} 

?>
