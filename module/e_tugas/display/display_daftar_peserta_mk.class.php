<?php
/**
 * Display Daftar Peserta Mata Kuliah
 * 
 * @package 
 * @author Fitria Maulina
 * @copyright Copyright (c) 2006
 * @version $Id$
 * @access public
 **/

class DisplayDaftarPesertaMataKuliah extends DisplayBaseFull
{
		var $mPeserta;
		var $mParam;
		function DisplayDaftarPesertaMataKuliah(&$configObject, $param)
		{
			DisplayBase::DisplayBaseHttpRequest($configObject);
			$this->mTemplate->setBasedir($this->mrConfig->GetValue('docroot') . 'templates/tugas');
			$this->mPeserta = new Peserta($this->mDbConnection, $this->mrConfig, "assignment.sql.php");

			$this->mParam = $param;
		} 
    
		function Display()
		{
			DisplayBase::Display();

			list($mkKode, $semester, $id) = explode("|", $this->mParam);
			//print_r($this->mParam);
			$student = $this->mPeserta->GetPesertamataKuliah($mkKode,$semester);
			$studentAnnouncement = $this->mPeserta->GetPesertaTerdaftar($id);
			if (!empty($studentAnnouncement)) {
				foreach ($studentAnnouncement as $key => $value)
				{
					$arrString[] = $value['NIM'];
				}
				$string = implode("|", $arrString);
			}
			if (!empty($student)) {
				$this->mTemplate->AddVar("list_student", "IS_EMPTY", 'default');
				foreach ($student as $key => $value) {
					$this->mTemplate->AddVar("item", "STUDENT_NUMBER", $key+1);
					$this->mTemplate->AddVar("item", "STUDENT_FULLNAME", $value['NAMA']);
					$this->mTemplate->AddVar("item", "STUDENT_NIM", $value['NIM']);
					$this->mTemplate->AddVar("item", "STUDENT_PRODI", $value['PRODI']);
					if (FALSE !== strpos($string, $value['NIM'])) {
						$this->mTemplate->AddVar("item", "STUDENT_CHECKED", 'checked');
					}
					else {
						$this->mTemplate->AddVar("item", "STUDENT_CHECKED", '');
					}
					$this->mTemplate->parseTemplate("item", "a");
				}
			}
			else 	{
				$this->mTemplate->AddVar("list_student", "IS_EMPTY", 'empty');
			}

			$this->mTemplate->displayParsedTemplate();
		}
}
?>
