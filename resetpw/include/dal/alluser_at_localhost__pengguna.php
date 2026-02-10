<?php
$dalTablepengguna = array();
$dalTablepengguna["Id"] = array("type"=>3,"varname"=>"Id", "name" => "Id");
$dalTablepengguna["iduser"] = array("type"=>200,"varname"=>"iduser", "name" => "iduser");
$dalTablepengguna["sandi"] = array("type"=>200,"varname"=>"sandi", "name" => "sandi");
$dalTablepengguna["peran"] = array("type"=>200,"varname"=>"peran", "name" => "peran");
	$dalTablepengguna["Id"]["key"]=true;

$dal_info["alluser_at_localhost__pengguna"] = &$dalTablepengguna;
?>