<?php
    class TugasClientService extends SIASettingClientService {
    	var $mId;
    	var $mMatkulId;    	
    	var $mJudul;
    	var $mWaktuAwal;
    	var $mWaktuAkhir;
    	var $mDeskripsi;
    	var $mFile;
    	var $mDosen;
    	var $mSemester;
		var $mJenis;
		
		//atribut untuk tugas_hasil
		var $mNilai;
		var $mNim;
		
		//atribut jenis tugas
		var $mBobot;
    	
        function TugasClientService($soap_server,$wsdl_status, $userId, $prodiId) {
           SIASettingClientService::SIASettingClientService ($soap_server,$wsdl_status, $userId, $prodiId);
           $this->SetReqServiceParams('e_tugas', 'tugas');
        }
        
        
        //Get Function
        function GetTugasWhereDosen($mkId,$judul,$limit,$offset) {        
           $this->mReqServiceParams["pAct"] = "GetTugasWhereDosen";
           $dataParams = array($mkId,$judul,$limit,$offset);
           //print_r($dataParams);
           $serviceParams = array($this->mReqServiceParams,$dataParams);
           $result = $this->Call("Dispatch", $serviceParams);           
           return $result;
        }
		
		function CountTugasWhereDosen($mkId,$judul)
		{
			$this->mReqServiceParams["pAct"] = "CountTugasWhereDosen";
           $dataParams = array($mkId,$judul);
           //print_r($dataParams);
           $serviceParams = array($this->mReqServiceParams,$dataParams);
           $result = $this->Call("Dispatch", $serviceParams);           
           return $result;
		}
		
		//Get Function
        function GetTugasWhereMahasiswa($niu,$smt) {        
           $this->mReqServiceParams["pAct"] = "GetTugasWhereMahasiswa";
           $dataParams = array($niu,$smt);
           //print_r($dataParams);
           $serviceParams = array($this->mReqServiceParams,$dataParams);
           $result = $this->Call("Dispatch", $serviceParams);           
           return $result;
        }
		
		
		function GetTugasWhereId($id)
		{
		   $this->mReqServiceParams["pAct"] = "GetTugasWhereId";
		   $dataParams = array($id);
		   //print_r($dataParams);
		   $serviceParams = array($this->mReqServiceParams,$dataParams);
		   $result = $this->Call("Dispatch", $serviceParams);           
		   return $result;
		}
		
		function GetJenisTugasWhereDosen($dsnId)
        {
		   $this->mReqServiceParams["pAct"] = "GetJenisTugasWhereDosen";
		   $dataParams = array($dsnId);
		   //print_r($dataParams);
		   $serviceParams = array($this->mReqServiceParams,$dataParams);
		   $result = $this->Call("Dispatch", $serviceParams);           
		   return $result;
		}
		
		function GetPesertaKelas($tgsId,$klsId) {        
           $this->mReqServiceParams["pAct"] = "GetPesertaKelas";
           $dataParams = array($tgsId,$klsId);
           //print_r($dataParams);exit;
           $serviceParams = array($this->mReqServiceParams,$dataParams);
           $result = $this->Call("Dispatch", $serviceParams);           
           return $result;
        }
		
		function GetSemesterAktif($prodi)
		{
		   $this->mReqServiceParams["pAct"] = "GetSemesterAktif";
           $dataParams = array($prodi);
          // print_r($dataParams);
           $serviceParams = array($this->mReqServiceParams,$dataParams);
           $result = $this->Call("Dispatch", $serviceParams);           
           return $result;
		}
		
		function CountJenisTugas($userId)
		{
		   $this->mReqServiceParams["pAct"] = "CountJenisTugas";
           $dataParams = array($userId);
           $serviceParams = array($this->mReqServiceParams,$dataParams);
           $result = $this->Call("Dispatch", $serviceParams);       
		       
           return $result[0]['JML'];
		}
		
		function GetJenisTugas($start,$limit,$userId)
		{
		   $this->mReqServiceParams["pAct"] = "GetJenisTugas";
           $dataParams = array($start,$limit,$userId);
		  //  print_r($dataParams);
           $serviceParams = array($this->mReqServiceParams,$dataParams);
           $result = $this->Call("Dispatch", $serviceParams);           
           return $result;
		}
		
		function GetJenisTugasWhereId($id)
		{
		   $this->mReqServiceParams["pAct"] = "GetJenisTugasWhereId";
           $dataParams = array($id);
		   // print_r($dataParams);
           $serviceParams = array($this->mReqServiceParams,$dataParams);
           $result = $this->Call("Dispatch", $serviceParams);           
           return $result;
		}
		
		function GetTugasMahasiswaWhereId($id,$niu)
		{
		   $this->mReqServiceParams["pAct"] = "GetTugasMahasiswaWhereId";
           $dataParams = array($id,$niu);
		   // print_r($dataParams);
           $serviceParams = array($this->mReqServiceParams,$dataParams);
           $result = $this->Call("Dispatch", $serviceParams);           
           return $result;
		}
		
		function GetNilaiMahasiswa($niu,$dosenId)
		{
		     $this->mReqServiceParams["pAct"] = "GetNilaiMahasiswa";
		   //$this->mReqServiceParams["pAct"] = "GetNilaiMahasiswa";
           $dataParams = array($niu,$dosenId);
			 //print_r($dataParams);
           $serviceParams = array($this->mReqServiceParams,$dataParams);
        //   print_r($serviceParams);
           $result = $this->Call("Dispatch", $serviceParams); 
          // var_dump($result);          

           return $result;
		}
		
		function GetDosenWhereKelas($kelas)
		{
		   $this->mReqServiceParams["pAct"] = "GetDosenWhereKelas";
           $dataParams = array($kelas);
		  //  print_r($dataParams);
           $serviceParams = array($this->mReqServiceParams,$dataParams);
           $result = $this->Call("Dispatch", $serviceParams);           
           return $result[0]['NIP'];
		}
        
        
        
        //Do functions
        function DoInsertTugas() {        
           $this->mReqServiceParams["pAct"] = "DoInsertTugas";
           $dataParams = array(
           		$this->mMatkulId,
		    	$this->mJudul,
		    	$this->mWaktuAwal,
		    	$this->mWaktuAkhir,
		    	$this->mDeskripsi,
		    	$this->mFile,
		    	$this->mDosen,
		    	$this->mSemester   ,
				$this->mJenis        
           );
           //print_r($dataParams);
           $serviceParams = array($this->mReqServiceParams,$dataParams);
           $result = $this->Call("Dispatch", $serviceParams);                      
           return $result;
        }
        
        function DoDeleteTugas() {        
           $this->mReqServiceParams["pAct"] = "DoDeleteTugas";
           $dataParams = array(
           		$this->mId     
           );
          // print_r($dataParams);
           $serviceParams = array($this->mReqServiceParams,$dataParams);
           $result = $this->Call("Dispatch", $serviceParams);                      
           return $result;
        }
		
		function DoUpdateTugas() {        
           $this->mReqServiceParams["pAct"] = "DoUpdateTugas";
           $dataParams = array(
           		$this->mMatkulId,
		    	$this->mJudul,
		    	$this->mWaktuAwal,
		    	$this->mWaktuAkhir,
		    	$this->mDeskripsi,
		    	$this->mFile,
				$this->mJenis,
				$this->mSemester,
				$this->mId
           );
		 
          // print_r($dataParams);exit;
           $serviceParams = array($this->mReqServiceParams,$dataParams);
           $result = $this->Call("Dispatch", $serviceParams);                      
           return $result;
        }
		
		function DoUpdateNilai()
		{
			$this->mReqServiceParams["pAct"] = "DoUpdateNilai";
           $dataParams = array(
           		$this->mNilai,
				$this->mId,
				$this->mNim
           );
		 //print_r($dataParams);exit;
           $serviceParams = array($this->mReqServiceParams,$dataParams);
           $result = $this->Call("Dispatch", $serviceParams);                      
           return $result;
		}
		
		function DoDeleteJenisTugas() {        
           $this->mReqServiceParams["pAct"] = "DoDeleteJenisTugas";
           $dataParams = array(
           		$this->mId     
           );
          // print_r($dataParams);
           $serviceParams = array($this->mReqServiceParams,$dataParams);
           $result = $this->Call("Dispatch", $serviceParams);                      
           return $result;
        }
		
		function DoUpdateJenisTugas() {        
           $this->mReqServiceParams["pAct"] = "DoUpdateJenisTugas";
           $dataParams = array(
		   		$this->mJudul,
				$this->mBobot,
           		$this->mId     
           );
          // print_r($dataParams);
           $serviceParams = array($this->mReqServiceParams,$dataParams);
           $result = $this->Call("Dispatch", $serviceParams);                      
           return $result;
        }
		
		function DoInsertJenisTugas() {        
           $this->mReqServiceParams["pAct"] = "DoInsertJenisTugas";
           $dataParams = array(
		   		$this->mDosen,
		   		$this->mJudul,
				$this->mBobot
           );
           //print_r($dataParams);
           $serviceParams = array($this->mReqServiceParams,$dataParams);
           $result = $this->Call("Dispatch", $serviceParams);                      
           return $result;
        }
		
		function UploadJawabanTugas()
		{
		  $this->mReqServiceParams["pAct"] = "UploadJawabanTugas";
           $dataParams = array(
		   		$this->mNim,
		   		$this->mId,
				$this->mFile,
				$this->mDeskripsi
           );
           //print_r($dataParams);
           $serviceParams = array($this->mReqServiceParams,$dataParams);
           $result = $this->Call("Dispatch", $serviceParams);                      
           return $result;
		}
        
        
        //set function
        function SetId($param)
        {
        	$this->mId = $param;
        }
        
        function SetMatkul($param)
        {
        	$this->mMatkulId = $param;
        }
        
		function SetJudul($param)
		{
			$this->mJudul = $param;			
		}
		
		function SetWaktuAwal($param)
		{
			$this->mWaktuAwal = $param;
		}
		
		function SetWaktuAkhir($param)
		{
			$this->mWaktuAkhir = $param;
		}
		
		function SetDesc($param)
		{
			$this->mDeskripsi = $param;
		}
		
		function SetFile($param)
		{
			$this->mFile = $param;
		}
		
		function SetDosen($param)
		{
			$this->mDosen = $param;
		}
		
	   	function SetSemester($param)
	   	{
	   		$this->mSemester = $param;
	   	}
		
		function SetJenisTugas($param)
		{
			$this->mJenis = $param;
		}
		
		function SetNilai($param)
		{
			$this->mNilai = $param;
		}
		
		function SetNim($param)
		{
			$this->mNim = $param;
		}
		
		function SetBobotNilai($param)
		{
			$this->mBobot = $param;
		}
               
      
    }
?>