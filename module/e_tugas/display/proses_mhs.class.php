<?php
class ProsesMhs extends ProcessDbApp
{
	var $mTugas;
	function ProsesMhs(&$configObject)
	{
		ProcessDbApp::ProcessDbApp($configObject);
		$this->mTugas = new Assignment($this->mrDbConnection, $this->mrConfig);
	}
	
  	function AddStudentAssignment($tgshTgsId, $tgshMhsNim, $tgshWaktuKirim, $tgshNamaFile, $tgshDeskripsi)
 	{
 	 	$nextId = $this->mTugas->GetNextId(); 	 	
 	 	if ($nextId[0][0]==0 || empty($nextId[0][0])) $realId =1;
 	 	else $realId = $nextId[0][0];
        if ($this->mTugas->ExecuteInsertStudentAssignmentQuery($realId, 
        $tgshTgsId, $tgshMhsNim, $tgshWaktuKirim, $tgshNamaFile, $tgshDeskripsi))   {
        return $realId;
      }
      else return false;
  }	
  
  	function UpdateStudentAssignment($tgshWaktuKirim, $tgshNamaFile, $tgshDeskripsi, $tgshId, $tgshMhsNim)
 	{
        if ($this->mTugas->ExecuteUpdateStudentAssignmentQuery($tgshWaktuKirim, $tgshNamaFile, $tgshDeskripsi, $tgshId, $tgshMhsNim))   {
        return true;
      }
      else return false;
  }	  
}

?>