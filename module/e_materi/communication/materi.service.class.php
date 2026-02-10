<?php
class MateriClientService extends SIASettingClientService {
	var $mJudul;
	var $mDeskripsi;
	var $mFile;
	var $mStatus;
	var $mKelasId;
	var $mId;
	var $mDosen;
	
	


	function MateriClientService($soap_server,$wsdl_status, $userId, $prodiId) {
		SIASettingClientService::SIASettingClientService ($soap_server,$wsdl_status, $userId, $prodiId);	
		$this->SetReqServiceParams('e_materi', 'materi');
	}

	function GetSemesterAktif($role)
	{
		$this->mReqServiceParams["pAct"] = "GetSemesterAktif";
		$dataParams = array($this->GetProperty("UserId"),$role);
		$serviceParams = array($this->mReqServiceParams,$dataParams);
		//print_r($dataParams);
		$result = $this->Call("Dispatch", $serviceParams);
		//print_r($result);
		return $result;
	}
	
	function GetAllPassedSemester($role) {
		$this->mReqServiceParams["pAct"] = "GetAllPassedSemester";
		$dataParams = array($this->GetProperty("UserId"),$role);
		$serviceParams = array($this->mReqServiceParams,$dataParams);
		//print_r($dataParams);
		$result = $this->Call("Dispatch", $serviceParams);
		//print_r($result);
		return $result;
	}

	function GetKuliahWhereSemester($smt,$role)
	{
		$this->mReqServiceParams["pAct"] = "GetKuliahWhereSemester";
		$dataParams = array($this->GetProperty("UserId"),$smt,$role);
		
		//print_r($dataParams);
		$serviceParams = array($this->mReqServiceParams,$dataParams);
		$result = $this->Call("Dispatch", $serviceParams);
		return $result;
	}

	function GetDosenWhereSemester($smt,$role)
	{
		$this->mReqServiceParams["pAct"] = "GetDosenWhereSemester";
		$dataParams = array($this->GetProperty("UserId"),$smt,$role);
		//print_r($dataParams);
		$serviceParams = array($this->mReqServiceParams,$dataParams);
		$result = $this->Call("Dispatch", $serviceParams);
		return $result;
	}

	function GetMateriWhereKuliah($klsId,$judul,$awal,$akhir)
	{
		$this->mReqServiceParams["pAct"] = "GetMateriWhereKuliah";
		$dataParams = array($klsId,$judul,$awal,$akhir);
		//print_r($dataParams);
		$serviceParams = array($this->mReqServiceParams,$dataParams);
		$result = $this->Call("Dispatch", $serviceParams);
		return $result;
	}
	
	function CountMateriWhereKuliah($klsId,$judul)
	{
		$this->mReqServiceParams["pAct"] = "CountMateriWhereKuliah";
		$dataParams = array($klsId,$judul);
		//print_r($dataParams);
		$serviceParams = array($this->mReqServiceParams,$dataParams);
		$result = $this->Call("Dispatch", $serviceParams);
		//print_r($this);
		
		return $result;
	}

	function GetMateriWhereDosen($sem,$dsnId,$judul,$awal,$akhir)
	{
		$this->mReqServiceParams["pAct"] = "GetMateriWhereDosen";
		$dataParams = array($dsnId,$sem,$judul,$awal,$akhir);
		//print_r($dataParams);
		$serviceParams = array($this->mReqServiceParams,$dataParams);
		$result = $this->Call("Dispatch", $serviceParams);
		return $result;
	}
	
	function GetMateriWhereDosenMatakuliah($mkId,$judul,$awal,$akhir)
	{
		$this->mReqServiceParams["pAct"] = "GetMateriWhereDosenMataKuliah";
		$dataParams = array($mkId,$judul,$awal,$akhir);
		//print_r($this->mReqServiceParams);
		$serviceParams = array($this->mReqServiceParams,$dataParams);
		$result = $this->Call("Dispatch", $serviceParams);
		/*$this->Request();
		$this->Response();
		$this->Debug();
		print_r($result);exit();*/
		return $result;
	}
	
	function CountMateriWhereDosenMataKuliah($mkId,$judul)
	{
		$this->mReqServiceParams["pAct"] = "CountMateriWhereDosenMataKuliah";
		$dataParams = array($mkId,$judul);
		$serviceParams = array($this->mReqServiceParams,$dataParams);
		$result = $this->Call("Dispatch", $serviceParams);
		return $result;
	
	}

	function GetNamaSemester($semId)
	{
		$this->mReqServiceParams["pAct"] = "GetNamaSemester";
		$dataParams = array($semId);

		$serviceParams = array($this->mReqServiceParams,$dataParams);
		$result = $this->Call("Dispatch", $serviceParams);

		return $result;
	}
	
	function GetMateriWhereId($id)
	{
		$this->mReqServiceParams["pAct"] = "GetMateriWhereId";
		$dataParams = array($id);
		
		$serviceParams = array($this->mReqServiceParams,$dataParams);
		$result = $this->Call("Dispatch", $serviceParams);

		return $result;
	}
	
	//untuk modul referensi
	function GetReferensi($cari, $limit, $offset)
	{
		$this->mReqServiceParams["pAct"] = "GetReferensi";
		$dataParams = array(strtolower($cari), $limit, $offset);		
		$serviceParams = array($this->mReqServiceParams,$dataParams);
		
		$result = $this->Call("Dispatch", $serviceParams);
		return $result;
	}
	
	function CountReferensi($cari)
	{
		$this->mReqServiceParams["pAct"] = "CountReferensi";
		$dataParams = array(strtolower($cari));		
		$serviceParams = array($this->mReqServiceParams,$dataParams);
		$result = $this->Call("Dispatch", $serviceParams);
		return $result;
	}
	
		
	//transaction 
	function DoInsertMateri()
	{
		$this->mReqServiceParams['pAct'] = "DoInsertMateri";
		$dataParams = array(
			$this->mJudul,
			$this->mKelasId,
			$this->mDeskripsi,
			$this->mFile,
			$this->mStatus,			
			$this->mDosen
		);
		//print_r($dataParams);
		$serviceParams = array($this->mReqServiceParams, $dataParams);
		$result = $this->Call("Dispatch", $serviceParams);
		return $result;
	}
	
	function DoActivationMateri()
	{
		$this->mReqServiceParams['pAct'] = "DoActivationMateri";
		$dataParams = array(
			$this->mStatus,
			$this->mId			
		);	
		//print_r($dataParams)	;exit;
		$serviceParams = array($this->mReqServiceParams, $dataParams);		
		$result = $this->Call("Dispatch", $serviceParams);
		return $result;
	}
	
	function DoDeleteMateri()
	{
		$this->mReqServiceParams['pAct'] = "DoDeleteMateri";
		$dataParams = array(
			$this->mId			
		);	
		//print_r($dataParams)	;exit;
		$serviceParams = array($this->mReqServiceParams, $dataParams);		
		$result = $this->Call("Dispatch", $serviceParams);
		return $result;
	}
	
	function DoUpdateMateri()
	{
		$this->mReqServiceParams['pAct'] = "DoUpdateMateri";
		$dataParams = array(
			$this->mJudul,
			$this->mKelasId,
			$this->mDeskripsi,
			$this->mFile,
			$this->mStatus,			
			$this->mDosen,
			$this->mId			
		);
		//print_r($dataParams)	;		
		
		$serviceParams = array($this->mReqServiceParams, $dataParams);		
		$result = $this->Call("Dispatch", $serviceParams);
		return $result;
	}
	
	//set function
	function SetId($param)
	{
		$this->mId = $param;	
	}	
	
	function SetJudul($param)
	{
		$this->mJudul = $param;
	}
	function SetKelasId($param)
	{
		$this->mKelasId = $param;		
	}
	
	function SetDeskripsi($param)
	{
		$this->mDeskripsi = $param;
	}
	
	function SetFile($param)
	{
		$this->mFile = $param;
	}
		
	function SetDosenId($param)
	{
		$this->mDosen = $param;	
	}	
	
	function SetStatus($param)
	{
		$this->mStatus = $param;	
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
