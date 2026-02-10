<?php
$dalTabler_status_mahasiswa = array();
$dalTabler_status_mahasiswa["statmhsSemId"] = array("type"=>20,"varname"=>"statmhsSemId", "name" => "statmhsSemId");
$dalTabler_status_mahasiswa["statmhsMhsNiu"] = array("type"=>200,"varname"=>"statmhsMhsNiu", "name" => "statmhsMhsNiu");
$dalTabler_status_mahasiswa["statmhsIsDiambilRegistrasi"] = array("type"=>16,"varname"=>"statmhsIsDiambilRegistrasi", "name" => "statmhsIsDiambilRegistrasi");
$dalTabler_status_mahasiswa["statmhsTanggal"] = array("type"=>135,"varname"=>"statmhsTanggal", "name" => "statmhsTanggal");
	$dalTabler_status_mahasiswa["statmhsSemId"]["key"]=true;
	$dalTabler_status_mahasiswa["statmhsMhsNiu"]["key"]=true;

$dal_info["gtakademik_dev_at_localhost__r_status_mahasiswa"] = &$dalTabler_status_mahasiswa;
?>