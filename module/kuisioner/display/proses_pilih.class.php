<?php
class ProsesPilih extends ProcessBase {
	var $objPilihan;
	var $mId;

	function ProsesPilih($configObject, $security, $address, $prodi) 
	{
		ProcessBase::ProcessBase($configObject) ;
		$this->mId = $security->mUserIdentity->GetProperty("UserReferenceId");
		$this->objPilihan = new DosenClientService($address, false, $this->mId, $prodi);
	}
   
	function DoInsertPilihan($pilihan,$nim) 
	{    
		$result = $this->objPilihan->InsertPilihan($pilihan,$nim);
		if ($result === 'oke') {
			return $result;
		} else {
			return false;
		}
	}
	
}