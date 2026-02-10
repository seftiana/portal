<?php
require_once(getabspath("classes/cipherer.php"));




$tdataKelas_ID = array();
	$tdataKelas_ID[".truncateText"] = true;
	$tdataKelas_ID[".NumberOfChars"] = 80;
	$tdataKelas_ID[".ShortName"] = "Kelas_ID";
	$tdataKelas_ID[".OwnerID"] = "";
	$tdataKelas_ID[".OriginalTable"] = "s_kelas";

//	field labels
$fieldLabelsKelas_ID = array();
$fieldToolTipsKelas_ID = array();
$pageTitlesKelas_ID = array();
$placeHoldersKelas_ID = array();

if(mlang_getcurrentlang()=="English")
{
	$fieldLabelsKelas_ID["English"] = array();
	$fieldToolTipsKelas_ID["English"] = array();
	$placeHoldersKelas_ID["English"] = array();
	$pageTitlesKelas_ID["English"] = array();
	$fieldLabelsKelas_ID["English"]["klsId"] = "klsId";
	$fieldToolTipsKelas_ID["English"]["klsId"] = "";
	$placeHoldersKelas_ID["English"]["klsId"] = "";
	$fieldLabelsKelas_ID["English"]["klsSemId"] = "Semester";
	$fieldToolTipsKelas_ID["English"]["klsSemId"] = "";
	$placeHoldersKelas_ID["English"]["klsSemId"] = "";
	$fieldLabelsKelas_ID["English"]["klsNama"] = "klsNama";
	$fieldToolTipsKelas_ID["English"]["klsNama"] = "";
	$placeHoldersKelas_ID["English"]["klsNama"] = "";
	$fieldLabelsKelas_ID["English"]["dosen_2"] = "dosen 2";
	$fieldToolTipsKelas_ID["English"]["dosen_2"] = "";
	$placeHoldersKelas_ID["English"]["dosen_2"] = "";
	$fieldLabelsKelas_ID["English"]["dosen_all"] = "dosen_all";
	$fieldToolTipsKelas_ID["English"]["dosen_all"] = "";
	$placeHoldersKelas_ID["English"]["dosen_all"] = "";
	if (count($fieldToolTipsKelas_ID["English"]))
		$tdataKelas_ID[".isUseToolTips"] = true;
}
if(mlang_getcurrentlang()=="")
{
	$fieldLabelsKelas_ID[""] = array();
	$fieldToolTipsKelas_ID[""] = array();
	$placeHoldersKelas_ID[""] = array();
	$pageTitlesKelas_ID[""] = array();
	$fieldLabelsKelas_ID[""]["dosen_2"] = "Dosen 2";
	$fieldToolTipsKelas_ID[""]["dosen_2"] = "";
	$placeHoldersKelas_ID[""]["dosen_2"] = "";
	$fieldLabelsKelas_ID[""]["dosen_all"] = "Dosen All";
	$fieldToolTipsKelas_ID[""]["dosen_all"] = "";
	$placeHoldersKelas_ID[""]["dosen_all"] = "";
	if (count($fieldToolTipsKelas_ID[""]))
		$tdataKelas_ID[".isUseToolTips"] = true;
}


	$tdataKelas_ID[".NCSearch"] = true;



$tdataKelas_ID[".shortTableName"] = "Kelas_ID";
$tdataKelas_ID[".nSecOptions"] = 0;
$tdataKelas_ID[".recsPerRowPrint"] = 1;
$tdataKelas_ID[".mainTableOwnerID"] = "";
$tdataKelas_ID[".moveNext"] = 1;
$tdataKelas_ID[".entityType"] = 1;

$tdataKelas_ID[".strOriginalTableName"] = "s_kelas";

	



$tdataKelas_ID[".showAddInPopup"] = false;

$tdataKelas_ID[".showEditInPopup"] = false;

$tdataKelas_ID[".showViewInPopup"] = false;

//page's base css files names
$popupPagesLayoutNames = array();
$tdataKelas_ID[".popupPagesLayoutNames"] = $popupPagesLayoutNames;


$tdataKelas_ID[".fieldsForRegister"] = array();

$tdataKelas_ID[".listAjax"] = false;

	$tdataKelas_ID[".audit"] = false;

	$tdataKelas_ID[".locking"] = false;



$tdataKelas_ID[".list"] = true;



$tdataKelas_ID[".reorderRecordsByHeader"] = true;


$tdataKelas_ID[".exportFormatting"] = 2;
$tdataKelas_ID[".exportDelimiter"] = ",";
		


$tdataKelas_ID[".exportTo"] = true;

$tdataKelas_ID[".printFriendly"] = true;


$tdataKelas_ID[".showSimpleSearchOptions"] = false;

// Allow Show/Hide Fields in GRID
$tdataKelas_ID[".allowShowHideFields"] = false;
//

// Allow Fields Reordering in GRID
$tdataKelas_ID[".allowFieldsReordering"] = false;
//

// search Saving settings
$tdataKelas_ID[".searchSaving"] = false;
//

$tdataKelas_ID[".showSearchPanel"] = true;
		$tdataKelas_ID[".flexibleSearch"] = true;

$tdataKelas_ID[".isUseAjaxSuggest"] = true;

$tdataKelas_ID[".rowHighlite"] = true;





$tdataKelas_ID[".ajaxCodeSnippetAdded"] = false;

$tdataKelas_ID[".buttonsAdded"] = false;

$tdataKelas_ID[".addPageEvents"] = false;

// use timepicker for search panel
$tdataKelas_ID[".isUseTimeForSearch"] = false;



$tdataKelas_ID[".badgeColor"] = "DC143C";

$tdataKelas_ID[".detailsLinksOnList"] = "2";

$tdataKelas_ID[".allSearchFields"] = array();
$tdataKelas_ID[".filterFields"] = array();
$tdataKelas_ID[".requiredSearchFields"] = array();

$tdataKelas_ID[".allSearchFields"][] = "klsId";
	$tdataKelas_ID[".allSearchFields"][] = "klsSemId";
	$tdataKelas_ID[".allSearchFields"][] = "klsNama";
	$tdataKelas_ID[".allSearchFields"][] = "dosen_2";
	$tdataKelas_ID[".allSearchFields"][] = "dosen_all";
	
$tdataKelas_ID[".filterFields"][] = "klsSemId";

$tdataKelas_ID[".googleLikeFields"] = array();
$tdataKelas_ID[".googleLikeFields"][] = "klsId";
$tdataKelas_ID[".googleLikeFields"][] = "klsSemId";
$tdataKelas_ID[".googleLikeFields"][] = "klsNama";
$tdataKelas_ID[".googleLikeFields"][] = "dosen_2";
$tdataKelas_ID[".googleLikeFields"][] = "dosen_all";


$tdataKelas_ID[".advSearchFields"] = array();
$tdataKelas_ID[".advSearchFields"][] = "klsId";
$tdataKelas_ID[".advSearchFields"][] = "klsSemId";
$tdataKelas_ID[".advSearchFields"][] = "klsNama";
$tdataKelas_ID[".advSearchFields"][] = "dosen_2";
$tdataKelas_ID[".advSearchFields"][] = "dosen_all";

$tdataKelas_ID[".tableType"] = "list";

$tdataKelas_ID[".printerPageOrientation"] = 0;
$tdataKelas_ID[".nPrinterPageScale"] = 100;

$tdataKelas_ID[".nPrinterSplitRecords"] = 40;

$tdataKelas_ID[".nPrinterPDFSplitRecords"] = 40;



$tdataKelas_ID[".geocodingEnabled"] = false;





$tdataKelas_ID[".listGridLayout"] = 3;





// view page pdf

// print page pdf


$tdataKelas_ID[".pageSize"] = 20;

$tdataKelas_ID[".warnLeavingPages"] = true;



$tstrOrderBy = "ORDER BY klsSemId DESC";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdataKelas_ID[".strOrderBy"] = $tstrOrderBy;

$tdataKelas_ID[".orderindexes"] = array();
	$tdataKelas_ID[".orderindexes"][] = array(2, (0 ? "ASC" : "DESC"), "klsSemId");


$tdataKelas_ID[".sqlHead"] = "SELECT klsId,  klsSemId,  klsNama,  '\\\\N' AS dosen_2,  '\\\\N' AS dosen_all";
$tdataKelas_ID[".sqlFrom"] = "FROM s_kelas";
$tdataKelas_ID[".sqlWhereExpr"] = "";
$tdataKelas_ID[".sqlTail"] = "";












//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdataKelas_ID[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdataKelas_ID[".arrGroupsPerPage"] = $arrGPP;

$tdataKelas_ID[".highlightSearchResults"] = true;

$tableKeysKelas_ID = array();
$tableKeysKelas_ID[] = "klsId";
$tdataKelas_ID[".Keys"] = $tableKeysKelas_ID;

$tdataKelas_ID[".listFields"] = array();
$tdataKelas_ID[".listFields"][] = "klsId";
$tdataKelas_ID[".listFields"][] = "klsSemId";
$tdataKelas_ID[".listFields"][] = "klsNama";
$tdataKelas_ID[".listFields"][] = "dosen_2";
$tdataKelas_ID[".listFields"][] = "dosen_all";

$tdataKelas_ID[".hideMobileList"] = array();


$tdataKelas_ID[".viewFields"] = array();

$tdataKelas_ID[".addFields"] = array();

$tdataKelas_ID[".masterListFields"] = array();
$tdataKelas_ID[".masterListFields"][] = "klsId";
$tdataKelas_ID[".masterListFields"][] = "klsSemId";
$tdataKelas_ID[".masterListFields"][] = "klsNama";
$tdataKelas_ID[".masterListFields"][] = "dosen_2";
$tdataKelas_ID[".masterListFields"][] = "dosen_all";

$tdataKelas_ID[".inlineAddFields"] = array();

$tdataKelas_ID[".editFields"] = array();

$tdataKelas_ID[".inlineEditFields"] = array();

$tdataKelas_ID[".updateSelectedFields"] = array();


$tdataKelas_ID[".exportFields"] = array();
$tdataKelas_ID[".exportFields"][] = "klsId";
$tdataKelas_ID[".exportFields"][] = "klsSemId";
$tdataKelas_ID[".exportFields"][] = "klsNama";
$tdataKelas_ID[".exportFields"][] = "dosen_2";
$tdataKelas_ID[".exportFields"][] = "dosen_all";

$tdataKelas_ID[".importFields"] = array();

$tdataKelas_ID[".printFields"] = array();
$tdataKelas_ID[".printFields"][] = "klsId";
$tdataKelas_ID[".printFields"][] = "klsSemId";
$tdataKelas_ID[".printFields"][] = "klsNama";
$tdataKelas_ID[".printFields"][] = "dosen_2";
$tdataKelas_ID[".printFields"][] = "dosen_all";


//	klsId
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "klsId";
	$fdata["GoodName"] = "klsId";
	$fdata["ownerTable"] = "s_kelas";
	$fdata["Label"] = GetFieldLabel("Kelas_ID","klsId");
	$fdata["FieldType"] = 20;

	
	
	
			
		$fdata["bListPage"] = true;

	
	
	
	
	

	
		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "klsId";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "klsId";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "Custom");

	
	
	
	
	
	
	
	
	
	
	
	
	
		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


		$edata["IsRequired"] = true;

	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
		
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
				$edata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");
						$edata["validateAs"]["basicValidate"][] = "IsRequired";
		
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdataKelas_ID["klsId"] = $fdata;
//	klsSemId
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "klsSemId";
	$fdata["GoodName"] = "klsSemId";
	$fdata["ownerTable"] = "s_kelas";
	$fdata["Label"] = GetFieldLabel("Kelas_ID","klsSemId");
	$fdata["FieldType"] = 20;

	
	
	
			
		$fdata["bListPage"] = true;

	
	
	
	
	

	
		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "klsSemId";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "klsSemId";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Lookup wizard");

	
	
		
	
// Begin Lookup settings
				$edata["LookupType"] = 2;
	$edata["LookupTable"] = "s_semester";
		$edata["autoCompleteFieldsOnEdit"] = 0;
	$edata["autoCompleteFields"] = array();
		$edata["LCType"] = 0;

	
		
	$edata["LinkField"] = "semId";
	$edata["LinkFieldType"] = 20;
	$edata["DisplayField"] = "semId";
	
	

	
	$edata["LookupOrderBy"] = "";

	
	
	
	

	
	
		$edata["SelectSize"] = 1;

// End Lookup Settings


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
	
	
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
							
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Equals";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings


//Filters settings
	$fdata["filterTotals"] = 0;
		$fdata["filterMultiSelect"] = 0;
		$fdata["filterTotalFields"] = "klsId";
		$fdata["filterFormat"] = "Values list";
		$fdata["showCollapsed"] = false;

		$fdata["sortValueType"] = 0;
		$fdata["descendingOrder"] = true;
	$fdata["numberOfVisibleItems"] = 9;

			
	
	
//end of Filters settings


	$tdataKelas_ID["klsSemId"] = $fdata;
//	klsNama
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "klsNama";
	$fdata["GoodName"] = "klsNama";
	$fdata["ownerTable"] = "s_kelas";
	$fdata["Label"] = GetFieldLabel("Kelas_ID","klsNama");
	$fdata["FieldType"] = 200;

	
	
	
			
		$fdata["bListPage"] = true;

	
	
	
	
	

	
		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "klsNama";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "klsNama";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=255";

		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdataKelas_ID["klsNama"] = $fdata;
//	dosen_2
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "dosen_2";
	$fdata["GoodName"] = "dosen_2";
	$fdata["ownerTable"] = "";
	$fdata["Label"] = GetFieldLabel("Kelas_ID","dosen_2");
	$fdata["FieldType"] = 200;

	
	
	
			
		$fdata["bListPage"] = true;

	
	
	
	
	

	
		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "dosen_2";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "'\\\\N'";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
		
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdataKelas_ID["dosen_2"] = $fdata;
//	dosen_all
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "dosen_all";
	$fdata["GoodName"] = "dosen_all";
	$fdata["ownerTable"] = "";
	$fdata["Label"] = GetFieldLabel("Kelas_ID","dosen_all");
	$fdata["FieldType"] = 200;

	
	
	
			
		$fdata["bListPage"] = true;

	
	
	
	
	

	
		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "dosen_all";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "'\\\\N'";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
		
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdataKelas_ID["dosen_all"] = $fdata;


$tables_data["Kelas ID"]=&$tdataKelas_ID;
$field_labels["Kelas_ID"] = &$fieldLabelsKelas_ID;
$fieldToolTips["Kelas_ID"] = &$fieldToolTipsKelas_ID;
$placeHolders["Kelas_ID"] = &$placeHoldersKelas_ID;
$page_titles["Kelas_ID"] = &$pageTitlesKelas_ID;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["Kelas ID"] = array();
//	s_krs_detil
	
	

		$dIndex = 0;
	$detailsParam = array();
	$detailsParam["dDataSourceTable"]="s_krs_detil";
		$detailsParam["dOriginalTable"] = "s_krs_detil";
		$detailsParam["proceedLink"] = true;
				$detailsParam["dType"]=PAGE_LIST;
	$detailsParam["dShortTable"] = "s_krs_detil";
	$detailsParam["dCaptionTable"] = GetTableCaption("s_krs_detil");
	$detailsParam["masterKeys"] =array();
	$detailsParam["detailKeys"] =array();

	$detailsParam["dispChildCount"] = 0;
	$detailsParam["hideChild"] = false;
					$detailsParam["previewOnAdd"] = 0;
		$detailsParam["previewOnEdit"] = 0;
		$detailsParam["previewOnView"] = 0;
		
	$detailsTablesData["Kelas ID"][$dIndex] = $detailsParam;

	
		$detailsTablesData["Kelas ID"][$dIndex]["masterKeys"] = array();

	$detailsTablesData["Kelas ID"][$dIndex]["masterKeys"][]="klsId";

				$detailsTablesData["Kelas ID"][$dIndex]["detailKeys"] = array();

	$detailsTablesData["Kelas ID"][$dIndex]["detailKeys"][]="krsdtKlsId";

// tables which are master tables for current table (detail)
$masterTablesData["Kelas ID"] = array();


	
				$strOriginalDetailsTable="s_semester";
	$masterParams = array();
	$masterParams["mDataSourceTable"]="s_semester";
	$masterParams["mOriginalTable"]= $strOriginalDetailsTable;
	$masterParams["mShortTable"]= "s_semester";
	$masterParams["masterKeys"]= array();
	$masterParams["detailKeys"]= array();
	
		$masterParams["dispChildCount"]= "1";
	$masterParams["hideChild"]= "0";
	$masterParams["dispMasterInfo"] = array();
				$masterParams["dispMasterInfo"][PAGE_LIST] = true;
			$masterParams["dispMasterInfo"][PAGE_PRINT] = true;
		
	$masterParams["previewOnList"]= 1;
	$masterParams["previewOnAdd"]= 0;
	$masterParams["previewOnEdit"]= 0;
	$masterParams["previewOnView"]= 0;
	$masterParams["proceedLink"]= 1;

	$masterParams["type"] = PAGE_LIST;
					$masterTablesData["Kelas ID"][0] = $masterParams;
				$masterTablesData["Kelas ID"][0]["masterKeys"] = array();
	$masterTablesData["Kelas ID"][0]["masterKeys"][]="semId";
				$masterTablesData["Kelas ID"][0]["detailKeys"] = array();
	$masterTablesData["Kelas ID"][0]["detailKeys"][]="klsSemId";
		
// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_Kelas_ID()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "klsId,  klsSemId,  klsNama,  '\\\\N' AS dosen_2,  '\\\\N' AS dosen_all";
$proto0["m_strFrom"] = "FROM s_kelas";
$proto0["m_strWhere"] = "";
$proto0["m_strOrderBy"] = "ORDER BY klsSemId DESC";
	
		;
			$proto0["cipherer"] = null;
$proto2=array();
$proto2["m_sql"] = "";
$proto2["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto2["m_column"]=$obj;
$proto2["m_contained"] = array();
$proto2["m_strCase"] = "";
$proto2["m_havingmode"] = false;
$proto2["m_inBrackets"] = false;
$proto2["m_useAlias"] = false;
$obj = new SQLLogicalExpr($proto2);

$proto0["m_where"] = $obj;
$proto4=array();
$proto4["m_sql"] = "";
$proto4["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto4["m_column"]=$obj;
$proto4["m_contained"] = array();
$proto4["m_strCase"] = "";
$proto4["m_havingmode"] = false;
$proto4["m_inBrackets"] = false;
$proto4["m_useAlias"] = false;
$obj = new SQLLogicalExpr($proto4);

$proto0["m_having"] = $obj;
$proto0["m_fieldlist"] = array();
						$proto6=array();
			$obj = new SQLField(array(
	"m_strName" => "klsId",
	"m_strTable" => "s_kelas",
	"m_srcTableName" => "Kelas ID"
));

$proto6["m_sql"] = "klsId";
$proto6["m_srcTableName"] = "Kelas ID";
$proto6["m_expr"]=$obj;
$proto6["m_alias"] = "";
$obj = new SQLFieldListItem($proto6);

$proto0["m_fieldlist"][]=$obj;
						$proto8=array();
			$obj = new SQLField(array(
	"m_strName" => "klsSemId",
	"m_strTable" => "s_kelas",
	"m_srcTableName" => "Kelas ID"
));

$proto8["m_sql"] = "klsSemId";
$proto8["m_srcTableName"] = "Kelas ID";
$proto8["m_expr"]=$obj;
$proto8["m_alias"] = "";
$obj = new SQLFieldListItem($proto8);

$proto0["m_fieldlist"][]=$obj;
						$proto10=array();
			$obj = new SQLField(array(
	"m_strName" => "klsNama",
	"m_strTable" => "s_kelas",
	"m_srcTableName" => "Kelas ID"
));

$proto10["m_sql"] = "klsNama";
$proto10["m_srcTableName"] = "Kelas ID";
$proto10["m_expr"]=$obj;
$proto10["m_alias"] = "";
$obj = new SQLFieldListItem($proto10);

$proto0["m_fieldlist"][]=$obj;
						$proto12=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "'\\\\N'"
));

$proto12["m_sql"] = "'\\\\N'";
$proto12["m_srcTableName"] = "Kelas ID";
$proto12["m_expr"]=$obj;
$proto12["m_alias"] = "dosen_2";
$obj = new SQLFieldListItem($proto12);

$proto0["m_fieldlist"][]=$obj;
						$proto14=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "'\\\\N'"
));

$proto14["m_sql"] = "'\\\\N'";
$proto14["m_srcTableName"] = "Kelas ID";
$proto14["m_expr"]=$obj;
$proto14["m_alias"] = "dosen_all";
$obj = new SQLFieldListItem($proto14);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto16=array();
$proto16["m_link"] = "SQLL_MAIN";
			$proto17=array();
$proto17["m_strName"] = "s_kelas";
$proto17["m_srcTableName"] = "Kelas ID";
$proto17["m_columns"] = array();
$proto17["m_columns"][] = "klsId";
$proto17["m_columns"][] = "klsSemId";
$proto17["m_columns"][] = "klsMkkurId";
$proto17["m_columns"][] = "klsKodeParalel";
$proto17["m_columns"][] = "klsNama";
$proto17["m_columns"][] = "klsJumlahPesertaMin";
$proto17["m_columns"][] = "klsJumlahPesertaMax";
$proto17["m_columns"][] = "klsJumlahPesertaMaxProdiAsing";
$proto17["m_columns"][] = "klsIsBatal";
$proto17["m_columns"][] = "klsCatatan";
$proto17["m_columns"][] = "klsIsPublic";
$proto17["m_columns"][] = "klsPeserta";
$proto17["m_columns"][] = "klsMkkurIdDisetarakan";
$proto17["m_columns"][] = "klsWktkulId";
$obj = new SQLTable($proto17);

$proto16["m_table"] = $obj;
$proto16["m_sql"] = "s_kelas";
$proto16["m_alias"] = "";
$proto16["m_srcTableName"] = "Kelas ID";
$proto18=array();
$proto18["m_sql"] = "";
$proto18["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto18["m_column"]=$obj;
$proto18["m_contained"] = array();
$proto18["m_strCase"] = "";
$proto18["m_havingmode"] = false;
$proto18["m_inBrackets"] = false;
$proto18["m_useAlias"] = false;
$obj = new SQLLogicalExpr($proto18);

$proto16["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto16);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
												$proto20=array();
						$obj = new SQLField(array(
	"m_strName" => "klsSemId",
	"m_strTable" => "s_kelas",
	"m_srcTableName" => "Kelas ID"
));

$proto20["m_column"]=$obj;
$proto20["m_bAsc"] = 0;
$proto20["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto20);

$proto0["m_orderby"][]=$obj;					
$proto0["m_srcTableName"]="Kelas ID";		
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_Kelas_ID = createSqlQuery_Kelas_ID();


	
		;

					

$tdataKelas_ID[".sqlquery"] = $queryData_Kelas_ID;

$tableEvents["Kelas ID"] = new eventsBase;
$tdataKelas_ID[".hasEvents"] = false;

?>