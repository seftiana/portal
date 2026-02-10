<?php
/**
 * DisplayViewPengumuman
 * Display class for view pengumuman
 * 
 * @package e_pengumuman
 * @author Refit Gustaroska
 *@updated by Fitria Maulina @ 2007-02-08
 * @copyright Copyright (c) 2006 GamaTechno
 * @version 1.0 
 * @date 2006-07-08
 * @revision 
 *
 */

class DisplayViewPengumuman extends DisplayBaseFull
{

   var $mErrorMessage;
	
	var $mKelasId;
	
	var $mAct;
	
	var $mSemId;
	
	var $mJudul;
	
	var $mTglMulai;
	
	var $mTanggalAkhir;
	
	var $mNumRecordPerPage;
	
	var $mPage;
	
	var $mRole;
	
	var $mProgramStudi;
	
	var $mAddress;
	
	var $mId;
	
	var $mMateri;
	var $mMateriLokal;
	var $mPengumuman;
   
   /**
    * DisplayViewPengumuman::DisplayViewPengumuman
    * Constructor for DisplayViewPengumuman class
    *
    * @param $configObject object Configuration
    * @param $securityObj  object Security
    * @return void
    */
   function DisplayViewPengumuman(&$configObject, $securityObj, $act, $kelasId, $semId, $judul, $tglMulai, $tglAkhir, $page) 
   {
      	DisplayBaseFull::DisplayBaseFull($configObject, $securityObj); 
      	$this->SetErrorAndEmptyBox();  
		$this->mKelasId = $_SESSION['pengumumanKelas'];
		$this->mAct = $this->mrConfig->Dec($act);
		$this->mSemId = $_SESSION['pengumumanSemester'];
		$this->mJudul = $_SESSION['pengumumanJudul'];
		$this->mTglMulai = $_SESSION['pengumumanMulai'];
		$this->mTglAkhir = $_SESSION['pengumumanAkhir'];
		
		$this->SetNavigationTemplate();
		$this->mPage = $page;
		$this->mNumRecordPerPage = 15;
		$this->mId = $this->mrUserSession->GetProperty("UserReferenceId");
		
		$this->mRole = $this->mrUserSession->GetProperty("Role");
		if($this->mRole == 7)
		{
			$this->mAddress = isset($_SESSION['pengumumanUnit'])? $_SESSION['pengumumanUnit'] : "";
			$this->mProgramStudi =  "";
		}
		else
		{
			$this->mAddress = $this->mrUserSession->GetProperty("ServerServiceAddress");
			$this->mProgramStudi =  $this->mrUserSession->GetProperty("UserProdiId");
		}
      	$this->mMateriLokal = new Materi( $this->mrConfig);
		$this->mMateri = new MateriClientService($this->mAddress,false, $this->mId, $this->mProgramStudi);
		$this->mPengumuman = new PengumumanClientService($this->mAddress,false, $this->mId, $this->mProgramStudi);
      	$this->SetTemplateBasedir($configObject->GetValue('app_module') . 'e_pengumuman/templates/');
      	$this->SetTemplateFile('view_pengumuman.html');
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
		$this->mTemplate->AddVar("content", "APPLICATION_MODULE", "Daftar Pengumuman");
							
	    $this->mKelas = isset($_SESSION['pengumumanKelas'])? $_SESSION['pengumumanKelas'] : "";
       $this->mPengumuman = new PengumumanClientService($this->mAddress,false,$this->mId, $this->mProgramStudi);             
		//  print_r($this->mPengumuman );
	    $start_record = ($this->mPage*$this->mNumRecordPerPage)-($this->mNumRecordPerPage);
	    //print($start_record);
		//** Fetching data
		$empty = array(array("ID"=>"","selected"=>"","NAMA"=>"--kosong--"));    	
		//ambil dan parse  data unit jika login sbg admin elearning
		//echo $this->mProgramStudi;
		//echo $mAct;
		
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
    			if(!isset($_SESSION['pengumumanSemester']))
    			{
    				if($pilihanSemester[$row]['IS_AKTIF'] == '1')
    				{
    					
    					$_SESSION['pengumumanSemester'] = $pilihanSemester[$row]['ID'];
    					$this->mSemId = $pilihanSemester[$row]['ID'];
    					$nmSemester = $pilihanSemester[$row]['NAMA'];
    					//echo $_SESSION['materiSemester'];
    				}
    			}
    			else
    			{
    				//echo $_SESSION['materiSemester'];
    				$this->mSemId = $_SESSION['pengumumanSemester'];
    				//echo $this->mSemester ;
    				if ($this->mSemId == $pilihanSemester[$row]['ID'])
    				{    					
    					$nmSemester = $pilihanSemester[$row]['NAMA'];
    				}
    				
    			} 
    			
    			$this->mTemplate->addVars("list_semester",$pilihanSemester[$row],"SEM_");
				$this->mTemplate->AddVar("list_semester","SELECT_".$this->mSemId,"selected");    	
    			$this->mTemplate->parseTemplate("list_semester", "a");		
    		}
			$this->mTemplate->AddVar("content","NMSMT",$nmSemester);    			
    	}
    	
    	//display pilihan kelas
    	$emptyKelas = array(array("DSN_ID"=>"","selected"=>"","DSN_NAMA"=>"--kosong--"));
    	if(empty($dtKelas)) $dtKelas = $empty;
    	$dataKelas = $this->mMateri->GetKuliahWhereSemester($this->mSemId, $this->mRole);
		if (!empty($dataKelas)){
			foreach ($dataKelas as $rowKelas => $valKelas)
			{
	
				$this->mTemplate->addVars("list_kelas",$valKelas,"KLS_");
				$this->mTemplate->parseTemplate("list_kelas", "a");				            
            $this->mTemplate->AddVar("list_kelas","SELECT_".$this->mKelas,"selected");
			}
		}    	
		if($this->mRole == 7)
		{
			//if(isset($_SESSION['materiUnit'])) 
				
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
		}
		
		/***** end of admin ***************/
		/*
		//get data referensi
		if($this->mRole ==2) //dosen
		{
			$dataSem = $this->mPengumuman->GetListSemester($this->mrUserSession->GetProperty('User'));
			if($this->mAct == 'kelas' || $this->mSemId != '') {				
				$dataKelas = $this->mPengumuman->GetListKelasBySem($this->mrUserSession->GetProperty('User'), $this->mSemId);				
			}
		}
		
		
		if($this->mRole == 7) //admin
		{
			$dataSem = $this->mPengumuman->GetListSemesterAdmin();
			if($this->mAct == 'kelas' || $this->mSemId != '') {				
				$dataKelas = $this->mPengumuman->GetListKelasBySemesterAdmin($this->mSemId);				
			}
		}
		*/
		if(isset($_SESSION['pengumumanKelas']))
		{
			$this->SetAttribute("list_pgmn", "visibility", "show"); 			
			
		}
		else
		{
			$this->SetAttribute("list_pgmn", "visibility", "hidden"); 
			
		}
		
		
		      
		if ($this->mrUserSession->GetProperty('Role') == 2 || $this->mrUserSession->GetProperty('Role') == 7 ) {
			//echo $this->mAct ;
		//	if($this->mAct == 'filter') {			
		      //$dataPengumuman = $this->mPengumuman->GetListPengumuman($this->mKelasId, $this->mJudul, $this->mTglMulai, $this->mTglAkhir);
		      $dataPengumuman = $this->mPengumuman->GetListPengumumanWithLimit($this->mKelasId, $this->mJudul, $this->mTglMulai, $this->mTglAkhir,$start_record, $this->mNumRecordPerPage);
		      $recordcount = $this->mPengumuman->GetCountListPengumuman($this->mKelasId, $this->mJudul, $this->mTglMulai, $this->mTglAkhir);
/*			}else{
				//$dataPengumuman = $this->mPengumuman->GetAllListPengumuman($this->mrUserSession->GetProperty('User'));
				//$dataPengumuman = $this->mPengumuman->GetAllListPengumumanWithLimit($this->mrUserSession->GetProperty('User'),$start_record, $this->mNumRecordPerPage);
				$dataPengumuman = $this->mPengumuman->GetAllListPengumumanWithLimit($this->mKelasId,$start_record, $this->mNumRecordPerPage);
				//$recordcount = $this->mPengumuman->GetCountAllListPengumuman($this->mrUserSession->GetProperty('User'));				
            $recordcount = $this->mPengumuman->GetCountAllListPengumuman($this->mKelasId);
		}*/	
		}else //($this->mrUserSession->GetProperty('Role') == 1)
		{
			if ($this->mAct == 'new') {
				$dataPengumuman = $this->mPengumuman->GetListPengumumanBaruWithLimit($start_record, $this->mNumRecordPerPage);	
				
				$recordcount = $this->mPengumuman->GetCountListPengumumanBaru();
			   if($recordcount!=0){
   				// "kalska";
   				$this->mTemplate->AddVar("content", "APPLICATION_MODULE", "Daftar Pengumuman Baru");
   				$this->SetAttribute("filter", "visibility", "hidden");
   				$this->SetAttribute("daftar", "visibility", "show");
		 	  }else{
		 	     	$this->SetAttribute("filter", "visibility", "hidden");
               $this->SetAttribute("list_pengumuman", "visibility", "hidden");
      			$this->SetAttribute("no_new_pgmn", "visibility", "show");               
            }
         }else{
				$this->mTemplate->AddVar("content", "APPLICATION_MODULE", "Daftar Pengumuman");
				//$dataPengumuman = $this->mPengumuman->GetDaftarPengumuman($this->mKelasId);
				$dataPengumuman = $this->mPengumuman->GetDaftarPengumumanWithLimit($this->mKelasId,$start_record, $this->mNumRecordPerPage);
				$recordcount = $this->mPengumuman->GetCountDaftarPengumuman($this->mKelasId);
			}
		}
		
		
      //** Manage display
		if ($this->mrUserSession->GetProperty('Role') == 2 || $this->mrUserSession->GetProperty('Role') == 7) 
		{
			$this->SetAttribute("aksi", "visibility", "show");         
         
			if(isset($_SESSION['pengumumanKelas']))	$this->SetAttribute("tambah", "visibility", "show");
			$this->AddVar('tambah', 'URL_ADD', $this->mrConfig->GetURL('e_pengumuman','add_pengumuman','view')."&kls_id=".$this->mrConfig->Enc($this->mKelasId));
         
			$this->SetAttribute("link_aksi", "visibility", "show");
		}else if ($this->mrUserSession->GetProperty('Role') == 1)
		{
			$this->SetAttribute("list_pgmn", "visibility", "show");
			if ($this->mAct == 'new') {
				$this->SetAttribute("header_kelas", "visibility", "show");
				$this->SetAttribute("kolom_kelas", "visibility", "show");
			}
			
		}
		
		
		//if ($this->mrUserSession->GetProperty('Role') == 2 || $this->mrUserSession->GetProperty('Role') == 7) 		{
			/*if (!empty($dataSem)) 
			{
				//print_r($dataSem);
				
				foreach($dataSem as $row => $val) {    
					
					$this->mTemplate->addVars("semester",$val,"SEM_");
					$this->mTemplate->parseTemplate("semester", "a");            
					$this->mTemplate->addVar("semester","SELECT_".$this->mSemId,"selected");
				}
			}*/
			
			for($i=1;$i<=31;$i++){
				$tgl = $i;
				if ($i>=1 && $i<=9) {
					$tgl = "0".$i;
				}
				if ($tgl == substr($this->mTglMulai,8,2)) {
					$this->AddVar('tglMulai', 'SELECTED', ' selected');
				}else{
					$this->AddVar('tglMulai', 'SELECTED', '');
				} 
				
				if ($tgl == substr($this->mTglAkhir,8,2)) {
					$this->AddVar('tglAkhir', 'SELECTED', ' selected');
				}else{
					$this->AddVar('tglAkhir', 'SELECTED', '');
				}
				
				$this->mTemplate->AddVar('tglMulai', 'TGL', $tgl);
				$this->mTemplate->parseTemplate("tglMulai", "a");
				
				$this->mTemplate->AddVar('tglAkhir', 'TGL', $tgl);
				$this->mTemplate->parseTemplate("tglAkhir", "a");
			}
			
			for($i=1;$i<=12;$i++){
				$bln = $i;
				if ($i>=1 && $i<=9) {
					$bln = "0".$i;
				}
				if ($bln == substr($this->mTglMulai,5,2)) {
					$this->AddVar('blnMulai', 'SELECTED', ' selected');
				}else{
					$this->AddVar('blnMulai', 'SELECTED', '');
				} 
				
				if ($bln == substr($this->mTglAkhir,5,2)) {
					$this->AddVar('blnAkhir', 'SELECTED', ' selected');
				}else{
					$this->AddVar('blnAkhir', 'SELECTED', '');
				}  
				$this->mTemplate->AddVar('blnAkhir', 'BLN', $bln);
				$this->mTemplate->parseTemplate("blnAkhir", "a");
				
				$this->mTemplate->AddVar('blnMulai', 'BLN', $bln);
				$this->mTemplate->parseTemplate("blnMulai", "a");
			}
			
			for($i=(date('Y')-3);$i<=(date('Y')+3);$i++){
				if ($i == substr($this->mTglMulai,0,4)) {
					$this->AddVar('thnMulai', 'SELECTED', ' selected');
				}else{
					$this->AddVar('thnMulai', 'SELECTED', '');
				} 
				
				if ($i == substr($this->mTglAkhir,0,4)) {
					$this->AddVar('thnAkhir', 'SELECTED', ' selected');
				}else{
					$this->AddVar('thnAkhir', 'SELECTED', '');
				}
			
				$this->mTemplate->AddVar('thnMulai', 'THN', $i);
				$this->mTemplate->parseTemplate("thnMulai", "a");
				
				$this->mTemplate->AddVar('thnAkhir', 'THN', $i);
				$this->mTemplate->parseTemplate("thnAkhir", "a");
			}
			
			if (!empty($dataKelas)) {
				foreach($dataKelas as $row => $val) { 
					$this->mTemplate->AddVars('kelas', $val, "KLS_");				
					$this->mTemplate->parseTemplate("kelas", "a"); 
					$this->mTemplate->addVar("kelas","SELECT_".$this->mKelas,"selected");					
				}
			}
			$this->AddVar('filter', 'JUDUL', $this->mJudul);
			$this->AddVar('filter', 'ENC_KELAS', $this->mrConfig->Enc('kelas'));
			$this->AddVar('filter', 'ENC_FILTER', $this->mrConfig->Enc('filter'));
			$this->AddVar('filter', 'URL_FILTER', $this->mrConfig->GetURL('e_pengumuman','pengumuman','view'));
		/*}else{
			if($this->mAct == 'new') {
				$this->SetAttribute("daftar", "visibility", "show");
				$this->AddVar('daftar', 'URL_DAFTAR', $this->mrConfig->GetURL('e_pengumuman','daftar_kelas','view'));
			}
		}*/
		$this->AddVar('daftar', 'URL_DAFTAR', $this->mrConfig->GetURL('e_pengumuman','pengumuman','view'));
		$tmpPgmn = array();
      if (!empty($dataPengumuman)) {
         if($start_record==''){
	        $i=1;
	      }else{
	        $i = $start_record+1;
	      }
         foreach($dataPengumuman as $val) {    
				if ($this->mrUserSession->GetProperty('Role') == 1 && $this->mAct == 'new') {
					if(strpos($val['pgmniMhsNiu'], $this->mrUserSession->GetProperty('User')) > -1) {
						continue;
					}else{
						$tmpPgmn[$i] = $val;
					}
				}//fne(aa);
            $this->AddVar('list_pengumuman', 'PENGUMUMAN_NO', $i++);          
				$tmpTgl = preg_split("/ /",$val['pgmnTanggal']);
				if($val['pgmnIsAktif'] == '1') {
					$this->AddVar('link_aksi', 'URL_AKTIF', $this->mrConfig->GetURL('e_pengumuman','pengumuman','process')."&act=".$this->mrConfig->Enc('nonaktif')."&pgmn_id=".$this->mrConfig->Enc($val['pgmnId'])."&kelas_id=".$this->mrConfig->Enc($this->mKelasId));
					$this->AddVar('link_aksi', 'PENGUMUMAN_AKTIF', 'Aktif');
				}else{
					$this->AddVar('link_aksi', 'URL_AKTIF', $this->mrConfig->GetURL('e_pengumuman','pengumuman','process')."&act=".$this->mrConfig->Enc('aktif')."&pgmn_id=".$this->mrConfig->Enc($val['pgmnId'])."&kelas_id=".$this->mrConfig->Enc($this->mKelasId));
					$this->AddVar('link_aksi', 'PENGUMUMAN_AKTIF', 'Tidak Aktif');
				}
				if ($this->mrUserSession->GetProperty('Role') == 1 && $this->mAct == 'new') {
					$this->AddVar('kolom_kelas', 'PENGUMUMAN_KELAS', $val['klsNama']);
					$this->mTemplate->parseTemplate("kolom_kelas");
				}
				$tmpTglBts = preg_split("/ /",$val['pgmnTglBatas']);
				$this->AddVar('link_aksi', 'URL_EDIT', $this->mrConfig->GetURL('e_pengumuman','edit_pengumuman','view')."&pgmn_id=".$this->mrConfig->Enc($val['pgmnId']));
            $this->AddVar('link_aksi', 'URL_DELETE', $this->mrConfig->GetURL('e_pengumuman','pengumuman','process')."&act=".$this->mrConfig->Enc('delete')."&pgmn_id=".$this->mrConfig->Enc($val['pgmnId'])."&kelas_id=".$this->mrConfig->Enc($this->mKelasId));
            $this->AddVar('link_aksi', 'PENGUMUMAN_TGLBATAS', $this->IndonesianDate($tmpTglBts[0]));
				$this->mTemplate->parseTemplate("link_aksi");
				$this->AddVar('list_pengumuman', 'PENGUMUMAN_TANGGAL', $this->IndonesianDate($tmpTgl[0])." ".$tmpTgl[1]);
            $this->AddVar('list_pengumuman', 'URL_DETAIL_PENGUMUMAN', $this->mrConfig->GetURL('e_pengumuman','detail_pengumuman','view')."&pgmn_id=".$this->mrConfig->Enc($val['pgmnId']));
            $this->AddVar('list_pengumuman', 'PENGUMUMAN_JUDUL', $val['pgmnJudul']);            
				
				
            if ($i%2 != 0){
               $this->AddVar('list_pengumuman', 'EVEN', ' class="table-common-even"');
            }else{
               $this->AddVar('list_pengumuman', 'EVEN', '');   
            }
            $this->mTemplate->parseTemplate("list_pengumuman", "a");
            
         }
         
 
      }else{
         $this->SetAttribute("list_pengumuman", "visibility", "hidden");
			$this->SetAttribute("no_new_pgmn", "visibility", "show");
      }
      
		if ($recordcount!=0) {				
         $url = $this->mrConfig->GetURL('e_pengumuman', 'pengumuman', 'view')."&act=".$this->mAct;
         $this->ShowPageNavigation($url,$this->mPage,$recordcount, $this->mNumRecordPerPage);
        
		}
         
      //$this->AddVar('content', 'URL_POST',$this->mrConfig->GetURL('e_pengumuman', 'pengumuman', 'view'));         
      $this->DisplayTemplate();
   }
   
   function ShowErrorBox($infoavailable = "NO") {
      $this->AddVar("error_box", "ERROR_MESSAGE",  
            $this->ComposeErrorMessage("Pengambilan data kelas tidak berhasil." , $this->mErrorMessage));   
      $this->AddVar("data_profile", "INFO_AVAILABLE", $infoavailable);   
      $this->SetAttribute('error_box', 'visibility', 'visible');
   }
}

?>