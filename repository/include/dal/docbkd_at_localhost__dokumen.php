<?php
$dalTabledokumen = array();
$dalTabledokumen["ID"] = array("type"=>3,"varname"=>"ID", "name" => "ID");
$dalTabledokumen["namadoc"] = array("type"=>200,"varname"=>"namadoc", "name" => "namadoc");
$dalTabledokumen["deskripsi"] = array("type"=>200,"varname"=>"deskripsi", "name" => "deskripsi");
$dalTabledokumen["tanggal"] = array("type"=>135,"varname"=>"tanggal", "name" => "tanggal");
$dalTabledokumen["namadosen"] = array("type"=>200,"varname"=>"namadosen", "name" => "namadosen");
	$dalTabledokumen["ID"]["key"]=true;

$dal_info["docbkd_at_localhost__dokumen"] = &$dalTabledokumen;
?>