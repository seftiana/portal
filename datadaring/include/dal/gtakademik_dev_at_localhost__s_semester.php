<?php
$dalTables_semester = array();
$dalTables_semester["semId"] = array("type"=>20,"varname"=>"semId", "name" => "semId");
$dalTables_semester["semTahun"] = array("type"=>2,"varname"=>"semTahun", "name" => "semTahun");
$dalTables_semester["semNmsemrId"] = array("type"=>2,"varname"=>"semNmsemrId", "name" => "semNmsemrId");
$dalTables_semester["semTanggalMulai"] = array("type"=>7,"varname"=>"semTanggalMulai", "name" => "semTanggalMulai");
$dalTables_semester["semTanggalSelesai"] = array("type"=>7,"varname"=>"semTanggalSelesai", "name" => "semTanggalSelesai");
$dalTables_semester["semIsNilaiBolehDieditDariPortal"] = array("type"=>16,"varname"=>"semIsNilaiBolehDieditDariPortal", "name" => "semIsNilaiBolehDieditDariPortal");
$dalTables_semester["semIsEditBiodataPortal"] = array("type"=>16,"varname"=>"semIsEditBiodataPortal", "name" => "semIsEditBiodataPortal");
	$dalTables_semester["semId"]["key"]=true;

$dal_info["gtakademik_dev_at_localhost__s_semester"] = &$dalTables_semester;
?>