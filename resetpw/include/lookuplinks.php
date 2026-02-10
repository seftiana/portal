<?php

/**
* getLookupMainTableSettings - tests whether the lookup link exists between the tables
*
*  returns array with ProjectSettings class for main table if the link exists in project settings.
*  returns NULL otherwise
*/
function getLookupMainTableSettings($lookupTable, $mainTableShortName, $mainField, $desiredPage = "")
{
	global $lookupTableLinks;
	if(!isset($lookupTableLinks[$lookupTable]))
		return null;
	if(!isset($lookupTableLinks[$lookupTable][$mainTableShortName.".".$mainField]))
		return null;
	$arr = &$lookupTableLinks[$lookupTable][$mainTableShortName.".".$mainField];
	$effectivePage = $desiredPage;
	if(!isset($arr[$effectivePage]))
	{
		$effectivePage = PAGE_EDIT;
		if(!isset($arr[$effectivePage]))
		{
			if($desiredPage == "" && 0 < count($arr))
			{
				$effectivePage = $arr[0];
			}
			else
				return null;
		}
	}
	return new ProjectSettings($arr[$effectivePage]["table"], $effectivePage);
}

/** 
* $lookupTableLinks array stores all lookup links between tables in the project
*/
function InitLookupLinks()
{
	global $lookupTableLinks;

	$lookupTableLinks = array();

	$lookupTableLinks["t_hak_akses_ref"]["t_user.tusrThakrId"]["edit"] = array("table" => "t_user", "field" => "tusrThakrId", "page" => "edit");
	$lookupTableLinks["t_unit"]["t_user.tusrUntId"]["edit"] = array("table" => "t_user", "field" => "tusrUntId", "page" => "edit");
	$lookupTableLinks["program_studi"]["t_user.tusrProdiKode"]["edit"] = array("table" => "t_user", "field" => "tusrProdiKode", "page" => "edit");
	$lookupTableLinks["jurusan"]["program_studi.prodiJurKode"]["edit"] = array("table" => "program_studi", "field" => "prodiJurKode", "page" => "edit");
	$lookupTableLinks["fakultas"]["program_studi.prodiFakKode"]["edit"] = array("table" => "program_studi", "field" => "prodiFakKode", "page" => "edit");
	$lookupTableLinks["jenjang_akademik_ref"]["program_studi.prodiJjarKode"]["edit"] = array("table" => "program_studi", "field" => "prodiJjarKode", "page" => "edit");
	$lookupTableLinks["model_ref"]["program_studi.prodiModelrId"]["edit"] = array("table" => "program_studi", "field" => "prodiModelrId", "page" => "edit");
}

?>