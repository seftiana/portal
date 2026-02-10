<?php

class Assignment extends DatabaseConnected
{

	
	
	function Assignment(&$databaseConnection, &$configObject)
	{
		DatabaseConnected::DatabaseConnected($configObject, "module/e_tugas/business/assignment.sql.php");
		//$this->mrDbConnection->debug=true;
		$this->mErrors = array();
	}	
	
	function GetActiveStudentAssignment($tahunajaran, $semGG, $semJenis, $nim, $sqlAdd)
	{
		$sql = $this->mSqlQueries["get_active_student_assignment"];
		
		return $this->GetAllDataAsArray($sql,array($tahunajaran, $semGG, $semJenis, $nim, $sqlAdd));
	}
	
	function ExecuteInsertStudentAssignmentQuery($tgshId, $tgshTgsId, $tgshMhsNim, $tgshWaktuKirim, $tgshNamaFile, $tgshDeskripsi)
	{
		//$this->mrDbConnection->StartTrans();
		$sql = sprintf($this->mSqlQueries['insert_into_student_assignment'], 
		$tgshId, $tgshTgsId, $tgshMhsNim, $tgshWaktuKirim, $tgshNamaFile, $tgshDeskripsi);		
    	$this->mrDbConnection->Execute($sql);
		//return $this->mrDbConnection->CompleteTrans();
	}
	
	function GetNextId()
	{
		$sql = $this->mSqlQueries["get_next_id"];
		return $this->GetAllDataAsArray($sql,array());
	}			
	
	function IsStudentHaveSendAssignment($TahunAjaran, $SemGG, $SemJenis, $IDMatakuliah, $tgshMhsNim, $tugasId)
	{
		$sql = $this->mSqlQueries["is_student_have_send_assignment"];
		return $this->GetAllDataAsArray($sql,array($TahunAjaran, $SemGG, $SemJenis, $IDMatakuliah, $tgshMhsNim, $tugasId));
	}
	
	function ExecuteUpdateStudentAssignmentQuery($tgshWaktuKirim, $tgshNamaFile, $tgshDeskripsi, $tgshId, $tgshMhsNim)
	{
		//$this->mrDbConnection->StartTrans();
		$sql = sprintf($this->mSqlQueries['update_student_assignment'], 
		$tgshWaktuKirim, $tgshNamaFile, $tgshDeskripsi, $tgshId, $tgshMhsNim);		
    	$this->mrDbConnection->Execute($sql);
		//return $this->mrDbConnection->CompleteTrans();
	}

	

}
?>