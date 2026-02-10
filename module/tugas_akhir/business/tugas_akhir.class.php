<?php
   class TugasAkhir extends DatabaseConnected
   {
      var $mConfigObject;
      
      /**
      * TugasAkhir::TugasAkhir
      * Constructor for TugasAkhir class
      *
      * @param $configObject object Configuration
      * @return void
      */
      function TugasAkhir($configObject) 
      {
         DatabaseConnected::DatabaseConnected($configObject, "module/tugas_akhir/business/tugas_akhir.sql.php") ;
         $this->mConfigObject = $mConfigObject;
      }
      
		function GetServiceSireg(){
			if (!$this->Connect()) {
				$dbErrorMsg = $this->GetProperty("DbErrorMessage");
				$this->SetProperty("UserErrorMessage", $dbErrorMsg);
				return false;
			}

			$data = $this->GetAllDataAsArray($this->mSqlQueries['select_service_finansi'], array());
			if (false === $data) {
				$this->SetProperty("UserErrorMessage", $this->GetProperty("DbErrorMessage"));
				$this->Disconnect();
				return false;
			}
			else {
				$this->SetProperty("UserErrorMessage", '');
				$this->Disconnect();
				return $data[0]['URL'];
			}
		}
   }

?>