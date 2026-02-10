<?php
/**
 * materi
 * 
 * @package 
 * @author Fitria Maulina
 * @copyright Copyright (c) 2006 Gamatechno
 * @version 0.1
 * @access Public
 **/
class Materi extends DatabaseConnected
{
	/**
	     * Materi::Materi()
	     * 
		 * Konstruktor Materi
		 * 
	     * @param object $databaseConnection ADOdb object used to access the database
	     * @param object $configObject objek Configuration
	     * @return 
	     **/
	 function Materi( $configObject)
	 {
	 	DatabaseConnected::DatabaseConnected($configObject, "module/e_materi/business/materi.sql.php");
		$this->Connect();
	 }
	 
	 /**
	     * Materi::GetUnit()
	     * 
		 * Function untuk mendapatkan semua data dari table unit
		 * 
	     * @return array
	     **/
	 function GetUnit()
	 {
		//return array('asa;ls');
		
	 	return $this->GetAllDataAsArray($this->mSqlQueries['get_unit'],array());		
	 }
	 
	 function GetProdi()
	 {
		//return array('asa;ls');
		
	 	return $this->GetAllDataAsArray($this->mSqlQueries['get_prodi'],array());		
	 }
	 
	 
	

} 

?>
