<?php
$strTableName="s_krs_jatah_sks";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="s_krs_jatah_sks";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

// alias for 'SQLQuery' object
$gSettings = new ProjectSettings("s_krs_jatah_sks");
$gQuery = $gSettings->getSQLQuery();
$eventObj = &$tableEvents["s_krs_jatah_sks"];

$reportCaseSensitiveGroupFields = false;

$gstrSQL = $gQuery->gSQLWhere("");

?>