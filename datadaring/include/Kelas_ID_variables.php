<?php
$strTableName="Kelas ID";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="s_kelas";

$gstrOrderBy="ORDER BY klsSemId DESC";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

// alias for 'SQLQuery' object
$gSettings = new ProjectSettings("Kelas ID");
$gQuery = $gSettings->getSQLQuery();
$eventObj = &$tableEvents["Kelas ID"];

$reportCaseSensitiveGroupFields = false;

$gstrSQL = $gQuery->gSQLWhere("");

?>