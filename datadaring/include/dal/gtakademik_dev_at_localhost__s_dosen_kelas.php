<?php
$dalTables_dosen_kelas = array();
$dalTables_dosen_kelas["dsnkKlsId"] = array("type"=>20,"varname"=>"dsnkKlsId", "name" => "dsnkKlsId");
$dalTables_dosen_kelas["dsnkDsnPegNip"] = array("type"=>200,"varname"=>"dsnkDsnPegNip", "name" => "dsnkDsnPegNip");
$dalTables_dosen_kelas["dsnkDosenKe"] = array("type"=>16,"varname"=>"dsnkDosenKe", "name" => "dsnkDosenKe");
$dalTables_dosen_kelas["dsnkIsBolehInputNilaiOnline"] = array("type"=>16,"varname"=>"dsnkIsBolehInputNilaiOnline", "name" => "dsnkIsBolehInputNilaiOnline");
	$dalTables_dosen_kelas["dsnkKlsId"]["key"]=true;
	$dalTables_dosen_kelas["dsnkDsnPegNip"]["key"]=true;

$dal_info["gtakademik_dev_at_localhost__s_dosen_kelas"] = &$dalTables_dosen_kelas;
?>