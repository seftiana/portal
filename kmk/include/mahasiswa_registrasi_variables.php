<?php
$strTableName="mahasiswa_registrasi";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="mahasiswa_registrasi";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

// alias for 'SQLQuery' object
$gSettings = new ProjectSettings("mahasiswa_registrasi");
$gQuery = $gSettings->getSQLQuery();
$eventObj = &$tableEvents["mahasiswa_registrasi"];

$reportCaseSensitiveGroupFields = false;

$gstrSQL = $gQuery->gSQLWhere("");

?>