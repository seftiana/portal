<?php
require_once(getabspath("classes/cipherer.php"));




$tdatat_unit = array();
	$tdatat_unit[".truncateText"] = true;
	$tdatat_unit[".NumberOfChars"] = 80;
	$tdatat_unit[".ShortName"] = "t_unit";
	$tdatat_unit[".OwnerID"] = "";
	$tdatat_unit[".OriginalTable"] = "t_unit";

//	field labels
$fieldLabelst_unit = array();
$fieldToolTipst_unit = array();
$pageTitlest_unit = array();
$placeHolderst_unit = array();

if(mlang_getcurrentlang()=="English")
{
	$fieldLabelst_unit["English"] = array();
	$fieldToolTipst_unit["English"] = array();
	$placeHolderst_unit["English"] = array();
	$pageTitlest_unit["English"] = array();
	$fieldLabelst_unit["English"]["untId"] = "Unt Id";
	$fieldToolTipst_unit["English"]["untId"] = "";
	$placeHolderst_unit["English"]["untId"] = "";
	$fieldLabelst_unit["English"]["untServiceAddress"] = "Unt Service Address";
	$fieldToolTipst_unit["English"]["untServiceAddress"] = "";
	$placeHolderst_unit["English"]["untServiceAddress"] = "";
	$fieldLabelst_unit["English"]["untNama"] = "Unt Nama";
	$fieldToolTipst_unit["English"]["untNama"] = "";
	$placeHolderst_unit["English"]["untNama"] = "";
	if (count($fieldToolTipst_unit["English"]))
		$tdatat_unit[".isUseToolTips"] = true;
}
if(mlang_getcurrentlang()=="")
{
	$fieldLabelst_unit[""] = array();
	$fieldToolTipst_unit[""] = array();
	$placeHolderst_unit[""] = array();
	$pageTitlest_unit[""] = array();
	$fieldLabelst_unit[""]["untId"] = "Unt Id";
	$fieldToolTipst_unit[""]["untId"] = "";
	$placeHolderst_unit[""]["untId"] = "";
	$fieldLabelst_unit[""]["untServiceAddress"] = "Unt Service Address";
	$fieldToolTipst_unit[""]["untServiceAddress"] = "";
	$placeHolderst_unit[""]["untServiceAddress"] = "";
	$fieldLabelst_unit[""]["untNama"] = "Unt Nama";
	$fieldToolTipst_unit[""]["untNama"] = "";
	$placeHolderst_unit[""]["untNama"] = "";
	if (count($fieldToolTipst_unit[""]))
		$tdatat_unit[".isUseToolTips"] = true;
}


	$tdatat_unit[".NCSearch"] = true;



$tdatat_unit[".shortTableName"] = "t_unit";
$tdatat_unit[".nSecOptions"] = 0;
$tdatat_unit[".recsPerRowPrint"] = 1;
$tdatat_unit[".mainTableOwnerID"] = "";
$tdatat_unit[".moveNext"] = 1;
$tdatat_unit[".entityType"] = 0;

$tdatat_unit[".strOriginalTableName"] = "t_unit";

	



$tdatat_unit[".showAddInPopup"] = false;

$tdatat_unit[".showEditInPopup"] = false;

$tdatat_unit[".showViewInPopup"] = false;

//page's base css files names
$popupPagesLayoutNames = array();
$tdatat_unit[".popupPagesLayoutNames"] = $popupPagesLayoutNames;


$tdatat_unit[".fieldsForRegister"] = array();

$tdatat_unit[".listAjax"] = false;

	$tdatat_unit[".audit"] = false;

	$tdatat_unit[".locking"] = false;






$tdatat_unit[".reorderRecordsByHeader"] = true;








$tdatat_unit[".showSimpleSearchOptions"] = false;

// Allow Show/Hide Fields in GRID
$tdatat_unit[".allowShowHideFields"] = false;
//

// Allow Fields Reordering in GRID
$tdatat_unit[".allowFieldsReordering"] = false;
//

// search Saving settings
$tdatat_unit[".searchSaving"] = false;
//

$tdatat_unit[".showSearchPanel"] = true;
		$tdatat_unit[".flexibleSearch"] = true;

$tdatat_unit[".isUseAjaxSuggest"] = true;

$tdatat_unit[".rowHighlite"] = true;





$tdatat_unit[".ajaxCodeSnippetAdded"] = false;

$tdatat_unit[".buttonsAdded"] = false;

$tdatat_unit[".addPageEvents"] = false;

// use timepicker for search panel
$tdatat_unit[".isUseTimeForSearch"] = false;



$tdatat_unit[".badgeColor"] = "CFAE83";


$tdatat_unit[".allSearchFields"] = array();
$tdatat_unit[".filterFields"] = array();
$tdatat_unit[".requiredSearchFields"] = array();



$tdatat_unit[".googleLikeFields"] = array();
$tdatat_unit[".googleLikeFields"][] = "untId";
$tdatat_unit[".googleLikeFields"][] = "untServiceAddress";
$tdatat_unit[".googleLikeFields"][] = "untNama";



$tdatat_unit[".tableType"] = "list";

$tdatat_unit[".printerPageOrientation"] = 0;
$tdatat_unit[".nPrinterPageScale"] = 100;

$tdatat_unit[".nPrinterSplitRecords"] = 40;

$tdatat_unit[".nPrinterPDFSplitRecords"] = 40;



$tdatat_unit[".geocodingEnabled"] = false;





$tdatat_unit[".listGridLayout"] = 3;





// view page pdf

// print page pdf


$tdatat_unit[".pageSize"] = 20;

$tdatat_unit[".warnLeavingPages"] = true;



$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatat_unit[".strOrderBy"] = $tstrOrderBy;

$tdatat_unit[".orderindexes"] = array();

$tdatat_unit[".sqlHead"] = "SELECT untId,  	untServiceAddress,  	untNama";
$tdatat_unit[".sqlFrom"] = "FROM t_unit";
$tdatat_unit[".sqlWhereExpr"] = "";
$tdatat_unit[".sqlTail"] = "";












//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatat_unit[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatat_unit[".arrGroupsPerPage"] = $arrGPP;

$tdatat_unit[".highlightSearchResults"] = true;

$tableKeyst_unit = array();
$tableKeyst_unit[] = "untId";
$tdatat_unit[".Keys"] = $tableKeyst_unit;

$tdatat_unit[".listFields"] = array();
$tdatat_unit[".listFields"][] = "untId";
$tdatat_unit[".listFields"][] = "untServiceAddress";
$tdatat_unit[".listFields"][] = "untNama";

$tdatat_unit[".hideMobileList"] = array();


$tdatat_unit[".viewFields"] = array();
$tdatat_unit[".viewFields"][] = "untId";
$tdatat_unit[".viewFields"][] = "untServiceAddress";
$tdatat_unit[".viewFields"][] = "untNama";

$tdatat_unit[".addFields"] = array();
$tdatat_unit[".addFields"][] = "untId";
$tdatat_unit[".addFields"][] = "untServiceAddress";
$tdatat_unit[".addFields"][] = "untNama";

$tdatat_unit[".masterListFields"] = array();
$tdatat_unit[".masterListFields"][] = "untId";
$tdatat_unit[".masterListFields"][] = "untServiceAddress";
$tdatat_unit[".masterListFields"][] = "untNama";

$tdatat_unit[".inlineAddFields"] = array();
$tdatat_unit[".inlineAddFields"][] = "untId";
$tdatat_unit[".inlineAddFields"][] = "untServiceAddress";
$tdatat_unit[".inlineAddFields"][] = "untNama";

$tdatat_unit[".editFields"] = array();
$tdatat_unit[".editFields"][] = "untId";
$tdatat_unit[".editFields"][] = "untServiceAddress";
$tdatat_unit[".editFields"][] = "untNama";

$tdatat_unit[".inlineEditFields"] = array();
$tdatat_unit[".inlineEditFields"][] = "untId";
$tdatat_unit[".inlineEditFields"][] = "untServiceAddress";
$tdatat_unit[".inlineEditFields"][] = "untNama";

$tdatat_unit[".updateSelectedFields"] = array();
$tdatat_unit[".updateSelectedFields"][] = "untId";
$tdatat_unit[".updateSelectedFields"][] = "untServiceAddress";
$tdatat_unit[".updateSelectedFields"][] = "untNama";


$tdatat_unit[".exportFields"] = array();
$tdatat_unit[".exportFields"][] = "untId";
$tdatat_unit[".exportFields"][] = "untServiceAddress";
$tdatat_unit[".exportFields"][] = "untNama";

$tdatat_unit[".importFields"] = array();
$tdatat_unit[".importFields"][] = "untId";
$tdatat_unit[".importFields"][] = "untServiceAddress";
$tdatat_unit[".importFields"][] = "untNama";

$tdatat_unit[".printFields"] = array();
$tdatat_unit[".printFields"][] = "untId";
$tdatat_unit[".printFields"][] = "untServiceAddress";
$tdatat_unit[".printFields"][] = "untNama";


//	untId
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "untId";
	$fdata["GoodName"] = "untId";
	$fdata["ownerTable"] = "t_unit";
	$fdata["Label"] = GetFieldLabel("t_unit","untId");
	$fdata["FieldType"] = 3;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

		$fdata["bInlineAdd"] = true;

		$fdata["bEditPage"] = true;

		$fdata["bInlineEdit"] = true;

		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

	
		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "untId";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "untId";

	
	
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








	$tdatat_unit["untId"] = $fdata;
//	untServiceAddress
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "untServiceAddress";
	$fdata["GoodName"] = "untServiceAddress";
	$fdata["ownerTable"] = "t_unit";
	$fdata["Label"] = GetFieldLabel("t_unit","untServiceAddress");
	$fdata["FieldType"] = 200;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

		$fdata["bInlineAdd"] = true;

		$fdata["bEditPage"] = true;

		$fdata["bInlineEdit"] = true;

		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

	
		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "untServiceAddress";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "untServiceAddress";

	
	
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








	$tdatat_unit["untServiceAddress"] = $fdata;
//	untNama
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "untNama";
	$fdata["GoodName"] = "untNama";
	$fdata["ownerTable"] = "t_unit";
	$fdata["Label"] = GetFieldLabel("t_unit","untNama");
	$fdata["FieldType"] = 200;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

		$fdata["bInlineAdd"] = true;

		$fdata["bEditPage"] = true;

		$fdata["bInlineEdit"] = true;

		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

	
		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "untNama";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "untNama";

	
	
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








	$tdatat_unit["untNama"] = $fdata;


$tables_data["t_unit"]=&$tdatat_unit;
$field_labels["t_unit"] = &$fieldLabelst_unit;
$fieldToolTips["t_unit"] = &$fieldToolTipst_unit;
$placeHolders["t_unit"] = &$placeHolderst_unit;
$page_titles["t_unit"] = &$pageTitlest_unit;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["t_unit"] = array();

// tables which are master tables for current table (detail)
$masterTablesData["t_unit"] = array();


// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_t_unit()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "untId,  	untServiceAddress,  	untNama";
$proto0["m_strFrom"] = "FROM t_unit";
$proto0["m_strWhere"] = "";
$proto0["m_strOrderBy"] = "";
	
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
	"m_strName" => "untId",
	"m_strTable" => "t_unit",
	"m_srcTableName" => "t_unit"
));

$proto6["m_sql"] = "untId";
$proto6["m_srcTableName"] = "t_unit";
$proto6["m_expr"]=$obj;
$proto6["m_alias"] = "";
$obj = new SQLFieldListItem($proto6);

$proto0["m_fieldlist"][]=$obj;
						$proto8=array();
			$obj = new SQLField(array(
	"m_strName" => "untServiceAddress",
	"m_strTable" => "t_unit",
	"m_srcTableName" => "t_unit"
));

$proto8["m_sql"] = "untServiceAddress";
$proto8["m_srcTableName"] = "t_unit";
$proto8["m_expr"]=$obj;
$proto8["m_alias"] = "";
$obj = new SQLFieldListItem($proto8);

$proto0["m_fieldlist"][]=$obj;
						$proto10=array();
			$obj = new SQLField(array(
	"m_strName" => "untNama",
	"m_strTable" => "t_unit",
	"m_srcTableName" => "t_unit"
));

$proto10["m_sql"] = "untNama";
$proto10["m_srcTableName"] = "t_unit";
$proto10["m_expr"]=$obj;
$proto10["m_alias"] = "";
$obj = new SQLFieldListItem($proto10);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto12=array();
$proto12["m_link"] = "SQLL_MAIN";
			$proto13=array();
$proto13["m_strName"] = "t_unit";
$proto13["m_srcTableName"] = "t_unit";
$proto13["m_columns"] = array();
$proto13["m_columns"][] = "untId";
$proto13["m_columns"][] = "untServiceAddress";
$proto13["m_columns"][] = "untNama";
$obj = new SQLTable($proto13);

$proto12["m_table"] = $obj;
$proto12["m_sql"] = "t_unit";
$proto12["m_alias"] = "";
$proto12["m_srcTableName"] = "t_unit";
$proto14=array();
$proto14["m_sql"] = "";
$proto14["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto14["m_column"]=$obj;
$proto14["m_contained"] = array();
$proto14["m_strCase"] = "";
$proto14["m_havingmode"] = false;
$proto14["m_inBrackets"] = false;
$proto14["m_useAlias"] = false;
$obj = new SQLLogicalExpr($proto14);

$proto12["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto12);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
$proto0["m_srcTableName"]="t_unit";		
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_t_unit = createSqlQuery_t_unit();


	
				;

			

$tdatat_unit[".sqlquery"] = $queryData_t_unit;

$tableEvents["t_unit"] = new eventsBase;
$tdatat_unit[".hasEvents"] = false;

?>