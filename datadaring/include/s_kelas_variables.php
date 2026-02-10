<?php
$strTableName="s_kelas";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="s_kelas";

$gstrOrderBy="ORDER BY s_kelas.klsSemId DESC";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

// alias for 'SQLQuery' object
$gSettings = new ProjectSettings("s_kelas");
$gQuery = $gSettings->getSQLQuery();
$eventObj = &$tableEvents["s_kelas"];

$reportCaseSensitiveGroupFields = false;

$gstrSQL = $gQuery->gSQLWhere("");

?>