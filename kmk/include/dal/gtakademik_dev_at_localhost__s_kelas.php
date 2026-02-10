<?php
$dalTables_kelas = array();
$dalTables_kelas["klsId"] = array("type"=>20,"varname"=>"klsId", "name" => "klsId");
$dalTables_kelas["klsSemId"] = array("type"=>20,"varname"=>"klsSemId", "name" => "klsSemId");
$dalTables_kelas["klsMkkurId"] = array("type"=>20,"varname"=>"klsMkkurId", "name" => "klsMkkurId");
$dalTables_kelas["klsKodeParalel"] = array("type"=>16,"varname"=>"klsKodeParalel", "name" => "klsKodeParalel");
$dalTables_kelas["klsNama"] = array("type"=>200,"varname"=>"klsNama", "name" => "klsNama");
$dalTables_kelas["klsJumlahPesertaMin"] = array("type"=>2,"varname"=>"klsJumlahPesertaMin", "name" => "klsJumlahPesertaMin");
$dalTables_kelas["klsJumlahPesertaMax"] = array("type"=>2,"varname"=>"klsJumlahPesertaMax", "name" => "klsJumlahPesertaMax");
$dalTables_kelas["klsJumlahPesertaMaxProdiAsing"] = array("type"=>2,"varname"=>"klsJumlahPesertaMaxProdiAsing", "name" => "klsJumlahPesertaMaxProdiAsing");
$dalTables_kelas["klsIsBatal"] = array("type"=>16,"varname"=>"klsIsBatal", "name" => "klsIsBatal");
$dalTables_kelas["klsCatatan"] = array("type"=>200,"varname"=>"klsCatatan", "name" => "klsCatatan");
$dalTables_kelas["klsIsPublic"] = array("type"=>16,"varname"=>"klsIsPublic", "name" => "klsIsPublic");
$dalTables_kelas["klsPeserta"] = array("type"=>129,"varname"=>"klsPeserta", "name" => "klsPeserta");
$dalTables_kelas["klsMkkurIdDisetarakan"] = array("type"=>20,"varname"=>"klsMkkurIdDisetarakan", "name" => "klsMkkurIdDisetarakan");
$dalTables_kelas["klsWktkulId"] = array("type"=>2,"varname"=>"klsWktkulId", "name" => "klsWktkulId");
	$dalTables_kelas["klsId"]["key"]=true;

$dal_info["gtakademik_dev_at_localhost__s_kelas"] = &$dalTables_kelas;
?>