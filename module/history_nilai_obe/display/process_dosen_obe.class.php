<?php
class ProcessDosenObe extends ProcessBase {
      var $mDosenServiceObj;
      var $mServiceServerAddress;
      var $mProcessDosenError;
      var $mUserIdentity;

   /**
    * ProcessDosenObe::ProcessDosenObe
    * Constructor for ProcessDosenObe class
    *
    * @param $configObject object Configuration
    * @return void
    */
   function ProcessDosenObe($configObject, $security, $serviceAddress) 
   {
         ProcessBase::ProcessBase($configObject) ;
         $this->mServiceServerAddress = $serviceAddress;
         $this->mUserIdentity = $security->mUserIdentity;
         $this->mDosenServiceObj = new DosenClientService($this->mServiceServerAddress, false, 
         $this->mUserIdentity->GetProperty("UserReferenceId"), $this->mUserIdentity->GetProperty("UserProdiId"));
   }
   
      function DoUpdateNilai($arrKrsItemId, $arrNilai, $semId, $arrNiu,$kodeProdi) 
      {      	       	
         $result = $this->mDosenServiceObj->DoUpdateAllNilaiForKelasObe($arrKrsItemId, $arrNilai,$semId, $arrNiu,$kodeProdi,
                     array($this->mUserIdentity->GetProperty("ApplicationId"), $this->mUserIdentity->GetProperty("UserReferenceId"),$this->mUserIdentity->GetProperty("UserFullName")));
         if ($result === false) {
            $this->mProcessDosenError = $this->mDosenServiceObj->GetProperty("ErrorMessages");
            return false;
         } else {
            return $result;
         }
      }
	  
	  function DoUpdateNilaiCpmk($arrKrsItemId, $arrNilai, $semId, $arrNiu,$kodeProdi) 
      {      	       	
         $result = $this->mDosenServiceObj->DoUpdateAllNilaiForKelasObeCpmk($arrKrsItemId, $arrNilai,$semId, $arrNiu,$kodeProdi,
                     array($this->mUserIdentity->GetProperty("ApplicationId"), $this->mUserIdentity->GetProperty("UserReferenceId"),$this->mUserIdentity->GetProperty("UserFullName")));
         if ($result === false) {
            $this->mProcessDosenError = $this->mDosenServiceObj->GetProperty("ErrorMessages");
            return false;
         } else {
            return $result;
         }
      }
	  
    function DoUpdateDpna($params) {

        if(!empty($params['cek']['krsdtId'])) {
            $array=array(
                    'cp'=>$params['cara_penilaian'],
                    'krsdtId'=>$params['cek']['krsdtId'],
                    'inHarian'=>$params['inHarian'],
                    'inMandiri'=>$params['inMandiri'],
					'inKelompok'=>$params['inKelompok'],
					'inPresentasi'=>$params['inPresentasi'],
                    'inTerstruktur'=>$params['inTerstruktur'],
                    'inTambahan'=>$params['inTambahan'],
                    'inUts'=>$params['inUts'],
                    'inUas'=>$params['inUas'],
                    'nilHarian'=>$params['nilHarian'],
                    'nilMandiri'=>$params['nilMandiri'],
					'nilKelompok'=>$params['nilKelompok'],
					'nilPresentasi'=>$params['nilPresentasi'],
                    'nilTerstruktur'=>$params['nilTerstruktur'],
                    'nilTambahan'=>$params['nilTambahan'],
                    'nilUts'=>$params['nilUts'],
                    'nilUas'=>$params['nilUas'],
                    'nilAbsolut'=>$params['nilAbsolut'],
                    'nilai'=>$params['nilai'],
                    'inCpmk1'=>$params['inCpmk1'],
                    'inCpmk2'=>$params['inCpmk2'],
                    'inCpmk3'=>$params['inCpmk3'],
                    'inCpmk4'=>$params['inCpmk4'],
                    'inCpmk5'=>$params['inCpmk5'],
                    'inCpmk6'=>$params['inCpmk6'],
                    'bobotCpmk1'=>$params['bobotCpmk1'],
                    'bobotCpmk2'=>$params['bobotCpmk2'],
                    'bobotCpmk3'=>$params['bobotCpmk3'],
                    'bobotCpmk4'=>$params['bobotCpmk4'],
                    'bobotCpmk5'=>$params['bobotCpmk5'],
                    'bobotCpmk6'=>$params['bobotCpmk6']
					
            );
        }
        $result=$this->mDosenServiceObj->UpdateKrsDpnaObe($array);
        if ($result === false) {
            $this->mProcessDosenError = $this->mDosenServiceObj->GetProperty("ErrorMessages");
            return false;
        } else {
            return $result;
        }
    }
	
	function DoUpdateDpnaCpmk($params) {

        if(!empty($params['cek']['krsdtId'])) {
            $array=array(
                    'cp'=>$params['cara_penilaian'],
                    'krsdtId'=>$params['cek']['krsdtId'],
                    
                    'nilAbsolut'=>$params['nilAbsolut'],
                    'nilai'=>$params['nilai'],
                    'inCpmk1'=>$params['inCpmk1'],
                    'inCpmk2'=>$params['inCpmk2'],
                    'inCpmk3'=>$params['inCpmk3'],
                    'inCpmk4'=>$params['inCpmk4'],
                    'inCpmk5'=>$params['inCpmk5'],
                    'inCpmk6'=>$params['inCpmk6'],
                    'bobotCpmk1'=>$params['bobotCpmk1'],
                    'bobotCpmk2'=>$params['bobotCpmk2'],
                    'bobotCpmk3'=>$params['bobotCpmk3'],
                    'bobotCpmk4'=>$params['bobotCpmk4'],
                    'bobotCpmk5'=>$params['bobotCpmk5'],
                    'bobotCpmk6'=>$params['bobotCpmk6']
            );
        }
        $result=$this->mDosenServiceObj->UpdateKrsDpnaObeCpmk($array);
        if ($result === false) {
            $this->mProcessDosenError = $this->mDosenServiceObj->GetProperty("ErrorMessages");
            return false;
        } else {
            return $result;
        }
    }
	
	function DoUpdateMasterPresensiKelas($tema,$pokok_bahasan,$rencana,$terlaksana,$pertemuanId) {
		$param=array($tema,$pokok_bahasan,$rencana,$terlaksana,$pertemuanId);
		$result=$this->mDosenServiceObj->DoUpdateMasterPresensiKelas($param);
		if ($result === false) {
            $this->mProcessDosenError = $this->mDosenServiceObj->GetProperty("ErrorMessages");
            return false;
        } else {
            return $result;
        }
	}
	
	function DoInsertPresensiKelas($pertemuanId, $nipDosen, $arrNim, $arrStatus) {
		$param=array($pertemuanId, $nipDosen, $arrNim, $arrStatus);
		$result=$this->mDosenServiceObj->DoInsertPresensiKelas($param);
		if ($result === false) {
            $this->mProcessDosenError = $this->mDosenServiceObj->GetProperty("ErrorMessages");
            return false;
        } else {
            return $result;
        }
	}
	
	function DoUpdatePresensiKelas($pertemuanId, $nipDosen, $dosenPresensiId, $arrNim, $arrStatus) {
		$param=array($pertemuanId, $nipDosen, $dosenPresensiId, $arrNim, $arrStatus);
		$result=$this->mDosenServiceObj->DoUpdatePresensiKelas($param);
		if ($result === false) {
            $this->mProcessDosenError = $this->mDosenServiceObj->GetProperty("ErrorMessages");
            return false;
        } else {
            return $result;
        }
	}

  /**
   * Merubah bobot nilai
  */
  function DoUpdateBobotObe($paramsBobot, $kelasId){    
    $param = array_merge($paramsBobot, array($kelasId));
    $result=$this->mDosenServiceObj->DoUpdateBobotObe($param);
    if ($result === false) {
            $this->mProcessDosenError = $this->mDosenServiceObj->GetProperty("ErrorMessages");
            return false;
        } else {
            return $result;
        }
  }

    #add cecep 14-agustus-2020
    function DoUpdateMasterPresensiKelasHistory($tema,$pokok_bahasan,$pertemuanId) {
	$param=array($tema,$pokok_bahasan,$pertemuanId);
	$result=$this->mDosenServiceObj->DoUpdateMasterPresensiKelasHistory($param);
	if ($result === false) {
            $this->mProcessDosenError = $this->mDosenServiceObj->GetProperty("ErrorMessages");
            return false;
        } else {
            return $result;
        }
    }
	
}