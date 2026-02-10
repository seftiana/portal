<?php

	class ProcessMbkm extends ProcessBase{
      /**
        * var $mDataMbkm object bisnis MbkmModel
        */
      var $mDataMbkm;
      
      /**
        * var $mProcessAnnouncementError string Process Error MbkmModel
        */
      var $mProcessAnnouncementError;
      
      
		function ProcessMbkm(&$configObject){
			ProcessBase::ProcessBase($configObject);
			// $this->mDataMbkm = New MbkmModel($configObject);
		}
   }
?>