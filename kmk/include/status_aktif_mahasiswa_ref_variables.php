<?php
$strTableName="status_aktif_mahasiswa_ref";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="status_aktif_mahasiswa_ref";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

// alias for 'SQLQuery' object
$gSettings = new ProjectSettings("status_aktif_mahasiswa_ref");
$gQuery = $gSettings->getSQLQuery();
$eventObj = &$tableEvents["status_aktif_mahasiswa_ref"];

$reportCaseSensitiveGroupFields = false;

$gstrSQL = $gQuery->gSQLWhere("");

?>