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
class Tugas extends DatabaseConnected
{	
	var $mId;
	var $mJadwal;
	var $mMatkul;
	var $mJudul;
	var $mWaktuAwal;
	var $mWaktuAkhir;
	var $mDesc;
	var $mFile;
	var $mDosen;
	var $mArrNim;
	var $mSemester;
	var $mPath;
    
    
	/**
     * Materi::Tugas()
     * 
	 * Konstruktor Tugas
	 * 
     * @param object $databaseConnection ADOdb object used to access the database
     * @param object $configObject objek Configuration
     * @return 
     **/
     function Tugas()
     {
     	//DatabaseConnected::DatabaseConnected($databaseConnection, $configObject, "assignment.sql.php");
     }


	//fungsi2 untuk generate  waktu :

     function generateTanggal()
     {
     	$arrTanggal = array();
     	$arrTmp = array("TGL"=> "");
     	for ($tgl=1;$tgl<=31;$tgl++)
     	{
     		if ($tgl<10) $tgl = '0'.$tgl;
     		$arrTmp = array("TGL"=> $tgl);
     		array_push($arrTanggal,$arrTmp);
     	}
     	return $arrTanggal;
     }

     function generateTahun()
     {

     	$arrTahun = array();
     	$arrTmp = array("THN"=> "");
     	$thnSkrg = date("Y");
     	for ($thn=$thnSkrg; $thn <= $thnSkrg+6; $thn++)
     	{
     		$arrTmp = array("THN"=> $thn);
     		array_push($arrTahun,$arrTmp)	;
     	}
     	return $arrTahun;
     }

     function generateJam()
     {
     	$arrJam = array();
     	$arrTmp = array("JAM"=> "");
     	for ($jam = 0;$jam <= 23;$jam++)
     	{
     		$strJam = strlen($jam)<2? "0".$jam : $jam;
     		$arrTmp = array("JAM"=> $strJam);
     		array_push($arrJam,$arrTmp);
     	}
     	return $arrJam;
     }

     function generateMenit()
     {
     	$arrMenit = array();
     	$arrTmp = array("MENIT"=> "");
     	for ($mnt=0;$mnt<=59;$mnt++)
     	{
     		$strMenit = strlen($mnt)<2 ? "0".$mnt : $mnt;
     		$arrTmp = array("MENIT"=> $strMenit);
     		array_push($arrMenit,$arrTmp);
     	}
     	return $arrMenit;
     }
	 
	 function KonvertNilai($nilai)
	 {
	 	switch ($nilai) {
			case 'A' : $nilAngka = 4; break;
			case 'B' : $nilAngka = 3; break;
			case 'C' : $nilAngka = 2; break;
			case 'D' : $nilAngka = 1; break;
			case 'E' : $nilAngka = 0; break;
		}
		return $nilAngka;
	 }
	 
	 function KonvertNilaiToChar($nilai)
	 {
	 	switch (round($nilai)) {
			case 4 : $nilChar = 'A'; break;
			case 3 : $nilChar = 'B'; break;
			case 2 : $nilChar = 'C'; break;
			case 1 : $nilChar = 'D'; break;
			case 0 : $nilChar = 'E'; break;
		}
		return $nilChar;
	 }
   
   
   
   
  
} 

?>
