<?php
/**
 * SIASettingClient
 * SIASettingClient class
 * 
 * @package DosenClientService
 * @author Ageng Prianto 
 * @copyright Copyright (c) 2006 GamaTechno
 * @version 1.0 
 * @date 2006-03-23
 * @revision Maya Alipin 2006-04-07
 *
 */
 
class DosenClientService extends SIASettingClientService {
   
   function DosenClientService($soap_server,$wsdl_status, $userId, $prodiId) {
      SIASettingClientService::SIASettingClientService ($soap_server,$wsdl_status, $userId, $prodiId);
      $this->SetReqServiceParams('dosen', 'dosen');
   }
   
   /**
    * DosenClientService::GetAllCoursesSupportedDosenForSemester
    * get all matakuliah yang diampu dosen pada semester aktif
    *
    * @return array data matakuliah diampu
    */   
   function GetAllCoursesSupportedDosenForSemester() {      
      $this->mReqServiceParams["pAct"] = "GetAllCoursesSupportedDosenForSemester";      
      $dataParams = array($this->mUserId, $this->mSemesterProdiSemesterId);
      $serviceParams = array($this->mReqServiceParams,$dataParams);
	  //print_r($serviceParams);exit();
      $result = $this->Call ("Dispatch", $serviceParams);
	  /*$this->Request();
	  $this->Response();
	  $this->Debug();
	   print_r($result);
		exit();*/
      return $result;      
   }
   
   /**
    * DosenClientService::GetTotalMentoredStudents
    * get total students mentored by a dosen
    *
    * @return integer total students
    */   
   function GetTotalMentoredStudents() {
      $this->mReqServiceParams["pAct"] = "GetTotalMentoredStudents";      
      $dataParams = array($this->mUserId);
      $serviceParams = array($this->mReqServiceParams,$dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
      return $result;      
   }
   
   /**
    * DosenClientService::GetAllMentoredStudents
    * get all students mentored by a dosen
    *
    * @param limit integer limit data, optional
    * @param offset integer offser data, optional
    * @return array data matakuliah diampu
    */   
   function GetAllMentoredStudents($limit="", $offset="") {
      $this->mReqServiceParams["pAct"] = "GetAllMentoredStudents";      
      $dataParams[0] = $this->mUserId;
      $dataParams[1] = $this->GetProperty("SemesterProdiSemesterId");
      if ($limit != "") {
         $dataParams[2] = $limit;
         if ($offset != ""){
            $dataParams[3] = $offset;
         }
      }
      $serviceParams = array($this->mReqServiceParams,$dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
      return $result;      
   }
   
    /**
    * DosenClientService::GetNilaiMahasiswaForKelas
    * get all nilai mahasiswa for a class based on kelasId
    *
    * @param kelasId integer kelas id
    * @return array data nilai mahasiswa
    */   
   function GetNilaiMahasiswaForKelas($kelasId) {
      $this->mReqServiceParams["pAct"] = "GetNilaiMahasiswaForKelas";      
      $dataParams = array($kelasId);
      $serviceParams = array($this->mReqServiceParams,$dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
      /**
      print_r($serviceParams);
      $this->Request();
      $this->Response();
      $this->Debug();
      print_r($result);
      exit();
      **/
      return $result;      
   }
   
   function GetNilaiBobotPerKelas($kelasId) {
      $this->mReqServiceParams["pAct"] = "GetNilaiBobotPerKelas";      
      $dataParams = array($kelasId);
      $serviceParams = array($this->mReqServiceParams,$dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
      return $result;      
   }
   
   function GetKrsDpnaNiu($kelasId, $nif) {
      $this->mReqServiceParams["pAct"] = "GetKrsDpnaNiu";      
      $dataParams = array($kelasId, $nif);
      $serviceParams = array($this->mReqServiceParams,$dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
      return $result;      
   }
   
   function GetCaraPenilaian() {
      $this->mReqServiceParams["pAct"] = "GetCaraPenilaian";      
      $dataParams = array();
      $serviceParams = array($this->mReqServiceParams,$dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
      return $result;      
   }
   
   function GetKodeNilai($prodiId) {
      $this->mReqServiceParams["pAct"] = "GetKodeNilai";      
      $dataParams = array($prodiId);
      $serviceParams = array($this->mReqServiceParams,$dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
      return $result;      
   }

    /**
    * DosenClientService::GetHakAksesDosenForInputNilai
    * get hak akses dosen for inputting nilai
    *
    * @param kelasId integer kelas id
    * @return array data hak akses dosen
    */   
   function GetHakAksesDosenForInputNilai($kelasId) {
      $this->mReqServiceParams["pAct"] = "GetHakAksesDosenForInputNilai";      
      $dataParams = array($this->mUserId, $kelasId);
      $serviceParams = array($this->mReqServiceParams,$dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
      return $result;      
   }
   
   function UpdateKrsDpna($params){
      $this->mReqServiceParams["pAct"] = "UpdateKrsDpna";   
	  $dataParams = array(
                $params['cp'],
                $params['inHarian'],
                $params['inMandiri'],
				$params['inKelompok'],
				$params['inPresentasi'],
                $params['inTerstruktur'],
                $params['inTambahan'],
                $params['inUts'],
                $params['inUas'],
                $params['nilHarian'],
                $params['nilMandiri'],
				$params['nilKelompok'],
				$params['nilPresentasi'],
                $params['nilTerstruktur'],
                $params['nilTambahan'],
                $params['nilUts'],
                $params['nilUas'],
                $params['nilAbsolut'],
                $params['nilai'],
                $params['krsdtId']
                ,$params['inRemedial'] #add ccp 30-08-2018
        );	  
	  //print_r($params);exit();
      $serviceParams = array($this->mReqServiceParams,$dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
	  //$this->Request();
	  //$this->Response();
	  //$this->Debug();
	  //print_r($result);exit();
      return $result;      
   }
   
    /**
    * DosenClientService::DoUpdateAllNilaiForKelas
    * get hak akses dosen for inputting nilai
    *
    * @param arrKrsItemId integer kelas id
    * @param arrNilai integer kelas id
    * @param arrIsMhsTambahan array flag 0|1 is mahasiswa tambahan
    * @param arrPengubahInfo array info pengubah (aplikasi pengubah, user id pengubah, user nama pengubah)
    * @return boolean hasil update
    */   
   function DoUpdateAllNilaiForKelas($arrKrsItemId, $arrNilai, $arrIsMhsTambahan, $semId, $arrNiu, $kodeProdi, $arrPengubahInfo) {
      $this->mReqServiceParams["pAct"] = "DoUpdateAllNilaiForKelas";      
      $dataParams = array($arrKrsItemId, $arrNilai, $arrIsMhsTambahan, $semId, $arrNiu, $kodeProdi);
      $dataParams = array_merge($dataParams, $arrPengubahInfo);
      //echo "<pre>";print_r($dataParams ); echo "</pre>";exit;
      $serviceParams = array($this->mReqServiceParams,$dataParams);      
      $result = $this->Call ("Dispatch", $serviceParams);
      return $result;      
   }
   
   function GetDataPertemuanKelas($klsId,$pertemuanId,$semId){
      $this->mReqServiceParams["pAct"] = "GetDataPertemuanKelas";
	  $dataParams = array($klsId,$pertemuanId,$semId);
      $serviceParams = array($this->mReqServiceParams,$dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
	  //$this->Request();
	  //$this->Response();
	  //$this->Debug();
	  //print_r($result);exit();
      return $result;      
   }
   
   function DoInsertPresensiKelas($dataParams){
      $this->mReqServiceParams["pAct"] = "DoInsertPresensiKelas";
      $serviceParams = array($this->mReqServiceParams,$dataParams);	  
      $result = $this->Call ("Dispatch", $serviceParams);
	  //$this->Request();
	  //$this->Response();
	  //$this->Debug();
	  //print_r($result);exit();
      return $result;      
   }
   
   function DoUpdatePresensiKelas($dataParams){
      $this->mReqServiceParams["pAct"] = "DoUpdatePresensiKelas";
      $serviceParams = array($this->mReqServiceParams,$dataParams);	  
      $result = $this->Call ("Dispatch", $serviceParams);
	  //$this->Request();
	  //$this->Response();
	  //$this->Debug();
	  //print_r($result);exit();
      return $result;      
   }
   
   function DoUpdateMasterPresensiKelas($dataParams){
      $this->mReqServiceParams["pAct"] = "DoUpdateMasterPresensiKelas";
      $serviceParams = array($this->mReqServiceParams,$dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
	  //$this->Request();
	  //$this->Response();
	  //$this->Debug();
	  //print_r($result);exit();
      return $result;      
   }

   #add ccp 23-juni-2020
   function GetAllCoursesSupportedDosenForSemesterSelect() {      
      $this->mReqServiceParams["pAct"] = "GetAllCoursesSupportedDosenForSemesterSelect";      
      $dataParams = array($this->mUserId, $this->mSemesterProdiSemesterId);
      $serviceParams = array($this->mReqServiceParams,$dataParams);
	  //print_r($serviceParams);exit();
      $result = $this->Call ("Dispatch", $serviceParams);
	  /*$this->Request();
	  $this->Response();
	  $this->Debug();
	   print_r($result);
		exit();*/
      return $result;      
   }
   
   function GetKuisionerDosenForKelas($kelasId,$dsnNip,$ketUjian) {
      $this->mReqServiceParams["pAct"] = "GetKuisionerDosenForKelas";      
      $dataParams = array($kelasId,$dsnNip,$ketUjian);
      $serviceParams = array($this->mReqServiceParams,$dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
      /**
      print_r($serviceParams);
      $this->Request();
      $this->Response();
      $this->Debug();
      print_r($result);
      exit();
      **/
      return $result;      
   }

   function GetKuisionerDosenForKelasKomentar($kelasId,$dsnNip,$ketUjian) {
      $this->mReqServiceParams["pAct"] = "GetKuisionerDosenForKelasKomentar";      
      $dataParams = array($kelasId,$dsnNip,$ketUjian);
      $serviceParams = array($this->mReqServiceParams,$dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
      /**
      print_r($serviceParams);
      $this->Request();
      $this->Response();
      $this->Debug();
      print_r($result);
      exit();
      **/
      return $result;      
   }
   #end

   function DoUpdateBobot($dataParams){
      $this->mReqServiceParams["pAct"] = "DoUpdateBobot";
      $serviceParams = array($this->mReqServiceParams,$dataParams);   
      $result = $this->Call ("Dispatch", $serviceParams);    
      return $result;      
   }

   #add ccp 16-juli-2020
   function InsertPilihan($pilihan,$nim) {
      $this->mReqServiceParams["pAct"] = "InsertPilihan";      
      $dataParams = array($pilihan,$nim);
      $serviceParams = array($this->mReqServiceParams,$dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
      return $result;      
   }

	#add ccp 12-agustus-2020
	function GetAllKelasDosenForSemester() {      
      $this->mReqServiceParams["pAct"] = "GetAllKelasDosenForSemester";      
      $dataParams = array($this->mUserId, $this->mSemesterProdiSemesterId);
      $serviceParams = array($this->mReqServiceParams,$dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
      return $result;      
    }

    #add ccp 14-agustus-2020
    function DoUpdateMasterPresensiKelasHistory($dataParams){
	$this->mReqServiceParams["pAct"] = "DoUpdateMasterPresensiKelasHistory";
	$serviceParams = array($this->mReqServiceParams,$dataParams);
	$result = $this->Call ("Dispatch", $serviceParams);
	return $result;      
    }

    #add ccp 17-agustus-2020
	function GetDataPertemuanKelasCetak($klsId,$semId){
		$this->mReqServiceParams["pAct"] = "GetDataPertemuanKelasCetak";
		$dataParams = array($klsId,$semId);
		$serviceParams = array($this->mReqServiceParams,$dataParams);
		$result = $this->Call ("Dispatch", $serviceParams);
		//$this->Request();
		//$this->Response();
		//$this->Debug();
		//print_r($result);exit();
		return $result;      
	}
	
	#add ccp 21-feb-2020
	function GetDataTranskrip($nim){
		$this->mReqServiceParams["pAct"] = "GetDataTranskrip";
		$dataParams = array($nim);
		$serviceParams = array($this->mReqServiceParams,$dataParams);
		$result = $this->Call ("Dispatch", $serviceParams);
		return $result;      
	}
	
	#add ccp 11-10-2023
	function InsertMbkm($Tanggal,$IDUser,$Kegiatan) {
      $this->mReqServiceParams["pAct"] = "InsertMbkm";      
      $dataParams = array($Tanggal,$IDUser,$Kegiatan);
      $serviceParams = array($this->mReqServiceParams,$dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
      return $result;      
	}
   
	function GetCountMbkmDosen($dosen,$cari){
		$this->mReqServiceParams["pAct"] = "GetCountMbkmDosen";
		$dataParams = array($dosen,$cari);
		$serviceParams = array($this->mReqServiceParams,$dataParams);
		$result = $this->Call ("Dispatch", $serviceParams);
		return $result;      
	}
	
	function GetCountMbkmMhs($nim){
		$this->mReqServiceParams["pAct"] = "GetCountMbkmMhs";
		$dataParams = array($nim);
		$serviceParams = array($this->mReqServiceParams,$dataParams);
		$result = $this->Call ("Dispatch", $serviceParams);
		return $result;      
	}
	
	function GetMbkmMhs($nim,$start, $limit){
		$this->mReqServiceParams["pAct"] = "GetMbkmMhs";
		$dataParams = array($nim,$start, $limit);
		$serviceParams = array($this->mReqServiceParams,$dataParams);
		$result = $this->Call ("Dispatch", $serviceParams);
		return $result;      
	}
	
	function GetMbkmMhsByDosen($dosen,$cari,$start, $limit){
		$this->mReqServiceParams["pAct"] = "GetMbkmMhsByDosen";
		$dataParams = array($dosen,$cari,$start, $limit);
		$serviceParams = array($this->mReqServiceParams,$dataParams);
		$result = $this->Call ("Dispatch", $serviceParams);
		return $result;      
	}
	
	function DeleteMbkm($id) {
      $this->mReqServiceParams["pAct"] = "DeleteMbkm";      
      $dataParams = array($id);
      $serviceParams = array($this->mReqServiceParams,$dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
      return $result;      
	}
	
	function GetMbkmDataDetail($id){
		$this->mReqServiceParams["pAct"] = "GetMbkmDataDetail";
		$dataParams = array($id);
		$serviceParams = array($this->mReqServiceParams,$dataParams);
		$result = $this->Call ("Dispatch", $serviceParams);
		return $result;      
	}
	
	function UpdateMbkm($Tanggal,$Kegiatan,$id) {
      $this->mReqServiceParams["pAct"] = "UpdateMbkm";      
      $dataParams = array($Tanggal,$Kegiatan,$id);
      $serviceParams = array($this->mReqServiceParams,$dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
      return $result;      
	}
	
	function UpdateKomentarMbkm($komentar,$id) {
      $this->mReqServiceParams["pAct"] = "UpdateKomentarMbkm";      
      $dataParams = array($komentar,$id);
      $serviceParams = array($this->mReqServiceParams,$dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
      return $result;      
	}
	#end ccp 11-10-2023
	
	#add ccp 22-01-2025
	function GetAllKelasDosenForSemesterObe() {      
      $this->mReqServiceParams["pAct"] = "GetAllKelasDosenForSemesterObe";      
      $dataParams = array($this->mUserId, $this->mSemesterProdiSemesterId);
      $serviceParams = array($this->mReqServiceParams,$dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
      return $result;      
    }
	
	function GetNilaiBobotPerKelasObe($kelasId) {
      $this->mReqServiceParams["pAct"] = "GetNilaiBobotPerKelasObe";      
      $dataParams = array($kelasId);
      $serviceParams = array($this->mReqServiceParams,$dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
      return $result;      
	}
	
	function GetKrsDpnaNiuObe($kelasId, $nif) {
      $this->mReqServiceParams["pAct"] = "GetKrsDpnaNiuObe";      
      $dataParams = array($kelasId, $nif);
      $serviceParams = array($this->mReqServiceParams,$dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
      return $result;      
	}
	
	function DoUpdateAllNilaiForKelasObe($arrKrsItemId, $arrNilai, $semId, $arrNiu, $kodeProdi, $arrPengubahInfo) {
      $this->mReqServiceParams["pAct"] = "DoUpdateAllNilaiForKelasObe";      
      $dataParams = array($arrKrsItemId, $arrNilai, $semId, $arrNiu, $kodeProdi);
      $dataParams = array_merge($dataParams, $arrPengubahInfo);
      $serviceParams = array($this->mReqServiceParams,$dataParams);      
      $result = $this->Call ("Dispatch", $serviceParams);
      // echo "<pre>";print_r($dataParams ); echo "</pre>";exit;
	  // $this->Request();
	  // $this->Response();
	  // $this->Debug();
	  // echo "<pre>";print_r($result);echo "</pre>";exit();
      return $result;      
	}
	
	function UpdateKrsDpnaObe($params){
      $this->mReqServiceParams["pAct"] = "UpdateKrsDpnaObe";   
	  $dataParams = array(
                $params['cp'],
                $params['inHarian'],
                $params['inMandiri'],
				$params['inKelompok'],
				$params['inPresentasi'],
                $params['inTerstruktur'],
                $params['inTambahan'],
                $params['inUts'],
                $params['inUas'],
                $params['nilHarian'],
                $params['nilMandiri'],
				$params['nilKelompok'],
				$params['nilPresentasi'],
                $params['nilTerstruktur'],
                $params['nilTambahan'],
                $params['nilUts'],
                $params['nilUas'],
                $params['nilAbsolut'],
                $params['nilai'],
                $params['krsdtId'],
                $params['inCpmk1'],
                $params['inCpmk2'],
                $params['inCpmk3'],
                $params['inCpmk4'],
                $params['inCpmk5'],
                $params['inCpmk6'],
                $params['bobotCpmk1'],
                $params['bobotCpmk2'],
                $params['bobotCpmk3'],
                $params['bobotCpmk4'],
                $params['bobotCpmk5'],
                $params['bobotCpmk6']
        );	  

      $serviceParams = array($this->mReqServiceParams,$dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
	  // echo'<pre>';print_r($params);echo'</pre>';exit();
      return $result;      
	}
	
	function UpdateKrsDpnaObeCpmk($params){
      $this->mReqServiceParams["pAct"] = "UpdateKrsDpnaObeCpmk";   
	  $dataParams = array(
                $params['cp'],
                $params['nilAbsolut'],
                $params['nilai'],
                $params['krsdtId'],
                $params['inCpmk1'],
                $params['inCpmk2'],
                $params['inCpmk3'],
                $params['inCpmk4'],
                $params['inCpmk5'],
                $params['inCpmk6'],
                $params['bobotCpmk1'],
                $params['bobotCpmk2'],
                $params['bobotCpmk3'],
                $params['bobotCpmk4'],
                $params['bobotCpmk5'],
                $params['bobotCpmk6']
        );	  

      $serviceParams = array($this->mReqServiceParams,$dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
	  // echo'<pre>';print_r($params);echo'</pre>';exit();
      return $result;      
	}
	
	function DoUpdateBobotObe($dataParams){
      $this->mReqServiceParams["pAct"] = "DoUpdateBobotObe";
      $serviceParams = array($this->mReqServiceParams,$dataParams);   
      $result = $this->Call ("Dispatch", $serviceParams);    
      return $result;      
	}
	
	function DoUpdateAllNilaiForKelasObeCpmk($arrKrsItemId, $arrNilai, $semId, $arrNiu, $kodeProdi, $arrPengubahInfo) {
      $this->mReqServiceParams["pAct"] = "DoUpdateAllNilaiForKelasObeCpmk";      
      $dataParams = array($arrKrsItemId, $arrNilai, $semId, $arrNiu, $kodeProdi);
      $dataParams = array_merge($dataParams, $arrPengubahInfo);
      $serviceParams = array($this->mReqServiceParams,$dataParams);      
      $result = $this->Call ("Dispatch", $serviceParams);
      // echo "<pre>";print_r($dataParams ); echo "</pre>";exit;
	  // $this->Request();
	  // $this->Response();
	  // $this->Debug();
	  // echo "<pre>";print_r($result);echo "</pre>";exit();
      return $result;      
	}
	
	function GetCountMahasiswaForKelasObe($kelasId) {
      $this->mReqServiceParams["pAct"] = "GetCountMahasiswaForKelasObe";      
      $dataParams = array($kelasId);
      $serviceParams = array($this->mReqServiceParams,$dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
      return $result;      
   }
   
     function GetNilaiMahasiswaForKelasPerPage($kelasId,$start,$perPage) {
      $this->mReqServiceParams["pAct"] = "GetNilaiMahasiswaForKelasPerPage";      
      $dataParams = array($kelasId,$start,$perPage);
      $serviceParams = array($this->mReqServiceParams,$dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);

      return $result;      
	}
   
	##end
	
	function GetDataPertemuanKelasValidasi($klsId,$pertemuanId,$semId,$userId){
      $this->mReqServiceParams["pAct"] = "GetDataPertemuanKelasValidasi";
	  $dataParams = array($klsId,$pertemuanId,$semId,$userId);
      $serviceParams = array($this->mReqServiceParams,$dataParams);
      $result = $this->Call ("Dispatch", $serviceParams);
      return $result;      
    }
   
    function DoUpdateMasterPresensiKelasValidasi($dataParams){
		$this->mReqServiceParams["pAct"] = "DoUpdateMasterPresensiKelasValidasi";
		$serviceParams = array($this->mReqServiceParams,$dataParams);
		$result = $this->Call ("Dispatch", $serviceParams);
		// echo "<pre>";print_r($result);echo "</pre>";exit();
		return $result;      
    }
   
	function Request()
	   {
	      echo '<h2>Request</h2><pre>' . htmlspecialchars($this->mSoapClient->request, ENT_QUOTES) . '</pre>';
	   }

	   function Response()
	   {
	      echo '<h2>Response</h2><pre>' . htmlspecialchars($this->mSoapClient->response, ENT_QUOTES) . '</pre>';
	   }

	   function Debug()
	   {
	      echo '<h2>Debug</h2><pre>' . htmlspecialchars($this->mSoapClient->debug_str, ENT_QUOTES) . '</pre>';
	   }

}
?>