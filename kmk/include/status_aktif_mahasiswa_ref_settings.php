<?php
require_once(getabspath("classes/cipherer.php"));




$tdatastatus_aktif_mahasiswa_ref = array();
	$tdatastatus_aktif_mahasiswa_ref[".truncateText"] = true;
	$tdatastatus_aktif_mahasiswa_ref[".NumberOfChars"] = 80;
	$tdatastatus_aktif_mahasiswa_ref[".ShortName"] = "status_aktif_mahasiswa_ref";
	$tdatastatus_aktif_mahasiswa_ref[".OwnerID"] = "";
	$tdatastatus_aktif_mahasiswa_ref[".OriginalTable"] = "status_aktif_mahasiswa_ref";

//	field labels
$fieldLabelsstatus_aktif_mahasiswa_ref = array();
$fieldToolTipsstatus_aktif_mahasiswa_ref = array();
$pageTitlesstatus_aktif_mahasiswa_ref = array();
$placeHoldersstatus_aktif_mahasiswa_ref = array();

if(mlang_getcurrentlang()=="English")
{
	$fieldLabelsstatus_aktif_mahasiswa_ref["English"] = array();
	$fieldToolTipsstatus_aktif_mahasiswa_ref["English"] = array();
	$placeHoldersstatus_aktif_mahasiswa_ref["English"] = array();
	$pageTitlesstatus_aktif_mahasiswa_ref["English"] = array();
	$fieldLabelsstatus_aktif_mahasiswa_ref["English"]["stakmhsrKode"] = "Stakmhsr Kode";
	$fieldToolTipsstatus_aktif_mahasiswa_ref["English"]["stakmhsrKode"] = "";
	$placeHoldersstatus_aktif_mahasiswa_ref["English"]["stakmhsrKode"] = "";
	$fieldLabelsstatus_aktif_mahasiswa_ref["English"]["stakmhsrNama"] = "Stakmhsr Nama";
	$fieldToolTipsstatus_aktif_mahasiswa_ref["English"]["stakmhsrNama"] = "";
	$placeHoldersstatus_aktif_mahasiswa_ref["English"]["stakmhsrNama"] = "";
	if (count($fieldToolTipsstatus_aktif_mahasiswa_ref["English"]))
		$tdatastatus_aktif_mahasiswa_ref[".isUseToolTips"] = true;
}
if(mlang_getcurrentlang()=="")
{
	$fieldLabelsstatus_aktif_mahasiswa_ref[""] = array();
	$fieldToolTipsstatus_aktif_mahasiswa_ref[""] = array();
	$placeHoldersstatus_aktif_mahasiswa_ref[""] = array();
	$pageTitlesstatus_aktif_mahasiswa_ref[""] = array();
	$fieldLabelsstatus_aktif_mahasiswa_ref[""]["stakmhsrKode"] = "Stakmhsr Kode";
	$fieldToolTipsstatus_aktif_mahasiswa_ref[""]["stakmhsrKode"] = "";
	$placeHoldersstatus_aktif_mahasiswa_ref[""]["stakmhsrKode"] = "";
	$fieldLabelsstatus_aktif_mahasiswa_ref[""]["stakmhsrNama"] = "Stakmhsr Nama";
	$fieldToolTipsstatus_aktif_mahasiswa_ref[""]["stakmhsrNama"] = "";
	$placeHoldersstatus_aktif_mahasiswa_ref[""]["stakmhsrNama"] = "";
	if (count($fieldToolTipsstatus_aktif_mahasiswa_ref[""]))
		$tdatastatus_aktif_mahasiswa_ref[".isUseToolTips"] = true;
}


	$tdatastatus_aktif_mahasiswa_ref[".NCSearch"] = true;



$tdatastatus_aktif_mahasiswa_ref[".shortTableName"] = "status_aktif_mahasiswa_ref";
$tdatastatus_aktif_mahasiswa_ref[".nSecOptions"] = 0;
$tdatastatus_aktif_mahasiswa_ref[".recsPerRowPrint"] = 1;
$tdatastatus_aktif_mahasiswa_ref[".mainTableOwnerID"] = "";
$tdatastatus_aktif_mahasiswa_ref[".moveNext"] = 1;
$tdatastatus_aktif_mahasiswa_ref[".entityType"] = 0;

$tdatastatus_aktif_mahasiswa_ref[".strOriginalTableName"] = "status_aktif_mahasiswa_ref";

	



$tdatastatus_aktif_mahasiswa_ref[".showAddInPopup"] = false;

$tdatastatus_aktif_mahasiswa_ref[".showEditInPopup"] = false;

$tdatastatus_aktif_mahasiswa_ref[".showViewInPopup"] = false;

//page's base css files names
$popupPagesLayoutNames = array();
$tdatastatus_aktif_mahasiswa_ref[".popupPagesLayoutNames"] = $popupPagesLayoutNames;


$tdatastatus_aktif_mahasiswa_ref[".fieldsForRegister"] = array();

$tdatastatus_aktif_mahasiswa_ref[".listAjax"] = false;

	$tdatastatus_aktif_mahasiswa_ref[".audit"] = false;

	$tdatastatus_aktif_mahasiswa_ref[".locking"] = false;






$tdatastatus_aktif_mahasiswa_ref[".reorderRecordsByHeader"] = true;








$tdatastatus_aktif_mahasiswa_ref[".showSimpleSearchOptions"] = false;

// Allow Show/Hide Fields in GRID
$tdatastatus_aktif_mahasiswa_ref[".allowShowHideFields"] = false;
//

// Allow Fields Reordering in GRID
$tdatastatus_aktif_mahasiswa_ref[".allowFieldsReordering"] = false;
//

// search Saving settings
$tdatastatus_aktif_mahasiswa_ref[".searchSaving"] = false;
//

$tdatastatus_aktif_mahasiswa_ref[".showSearchPanel"] = true;
		$tdatastatus_aktif_mahasiswa_ref[".flexibleSearch"] = true;

$tdatastatus_aktif_mahasiswa_ref[".isUseAjaxSuggest"] = true;

$tdatastatus_aktif_mahasiswa_ref[".rowHighlite"] = true;





$tdatastatus_aktif_mahasiswa_ref[".ajaxCodeSnippetAdded"] = false;

$tdatastatus_aktif_mahasiswa_ref[".buttonsAdded"] = false;

$tdatastatus_aktif_mahasiswa_ref[".addPageEvents"] = false;

// use timepicker for search panel
$tdatastatus_aktif_mahasiswa_ref[".isUseTimeForSearch"] = false;



$tdatastatus_aktif_mahasiswa_ref[".badgeColor"] = "00C2C5";


$tdatastatus_aktif_mahasiswa_ref[".allSearchFields"] = array();
$tdatastatus_aktif_mahasiswa_ref[".filterFields"] = array();
$tdatastatus_aktif_mahasiswa_ref[".requiredSearchFields"] = array();



$tdatastatus_aktif_mahasiswa_ref[".googleLikeFields"] = array();
$tdatastatus_aktif_mahasiswa_ref[".googleLikeFields"][] = "stakmhsrKode";
$tdatastatus_aktif_mahasiswa_ref[".googleLikeFields"][] = "stakmhsrNama";



$tdatastatus_aktif_mahasiswa_ref[".tableType"] = "list";

$tdatastatus_aktif_mahasiswa_ref[".printerPageOrientation"] = 0;
$tdatastatus_aktif_mahasiswa_ref[".nPrinterPageScale"] = 100;

$tdatastatus_aktif_mahasiswa_ref[".nPrinterSplitRecords"] = 40;

$tdatastatus_aktif_mahasiswa_ref[".nPrinterPDFSplitRecords"] = 40;



$tdatastatus_aktif_mahasiswa_ref[".geocodingEnabled"] = false;





$tdatastatus_aktif_mahasiswa_ref[".listGridLayout"] = 3;





// view page pdf

// print page pdf


$tdatastatus_aktif_mahasiswa_ref[".pageSize"] = 20;

$tdatastatus_aktif_mahasiswa_ref[".warnLeavingPages"] = true;



$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatastatus_aktif_mahasiswa_ref[".strOrderBy"] = $tstrOrderBy;

$tdatastatus_aktif_mahasiswa_ref[".orderindexes"] = array();

$tdatastatus_aktif_mahasiswa_ref[".sqlHead"] = "SELECT stakmhsrKode,  	stakmhsrNama";
$tdatastatus_aktif_mahasiswa_ref[".sqlFrom"] = "FROM status_aktif_mahasiswa_ref";
$tdatastatus_aktif_mahasiswa_ref[".sqlWhereExpr"] = "";
$tdatastatus_aktif_mahasiswa_ref[".sqlTail"] = "";












//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatastatus_aktif_mahasiswa_ref[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatastatus_aktif_mahasiswa_ref[".arrGroupsPerPage"] = $arrGPP;

$tdatastatus_aktif_mahasiswa_ref[".highlightSearchResults"] = true;

$tableKeysstatus_aktif_mahasiswa_ref = array();
$tableKeysstatus_aktif_mahasiswa_ref[] = "stakmhsrKode";
$tdatastatus_aktif_mahasiswa_ref[".Keys"] = $tableKeysstatus_aktif_mahasiswa_ref;

$tdatastatus_aktif_mahasiswa_ref[".listFields"] = array();
$tdatastatus_aktif_mahasiswa_ref[".listFields"][] = "stakmhsrKode";
$tdatastatus_aktif_mahasiswa_ref[".listFields"][] = "stakmhsrNama";

$tdatastatus_aktif_mahasiswa_ref[".hideMobileList"] = array();


$tdatastatus_aktif_mahasiswa_ref[".viewFields"] = array();
$tdatastatus_aktif_mahasiswa_ref[".viewFields"][] = "stakmhsrKode";
$tdatastatus_aktif_mahasiswa_ref[".viewFields"][] = "stakmhsrNama";

$tdatastatus_aktif_mahasiswa_ref[".addFields"] = array();
$tdatastatus_aktif_mahasiswa_ref[".addFields"][] = "stakmhsrKode";
$tdatastatus_aktif_mahasiswa_ref[".addFields"][] = "stakmhsrNama";

$tdatastatus_aktif_mahasiswa_ref[".masterListFields"] = array();
$tdatastatus_aktif_mahasiswa_ref[".masterListFields"][] = "stakmhsrKode";
$tdatastatus_aktif_mahasiswa_ref[".masterListFields"][] = "stakmhsrNama";

$tdatastatus_aktif_mahasiswa_ref[".inlineAddFields"] = array();
$tdatastatus_aktif_mahasiswa_ref[".inlineAddFields"][] = "stakmhsrKode";
$tdatastatus_aktif_mahasiswa_ref[".inlineAddFields"][] = "stakmhsrNama";

$tdatastatus_aktif_mahasiswa_ref[".editFields"] = array();
$tdatastatus_aktif_mahasiswa_ref[".editFields"][] = "stakmhsrKode";
$tdatastatus_aktif_mahasiswa_ref[".editFields"][] = "stakmhsrNama";

$tdatastatus_aktif_mahasiswa_ref[".inlineEditFields"] = array();
$tdatastatus_aktif_mahasiswa_ref[".inlineEditFields"][] = "stakmhsrKode";
$tdatastatus_aktif_mahasiswa_ref[".inlineEditFields"][] = "stakmhsrNama";

$tdatastatus_aktif_mahasiswa_ref[".updateSelectedFields"] = array();
$tdatastatus_aktif_mahasiswa_ref[".updateSelectedFields"][] = "stakmhsrKode";
$tdatastatus_aktif_mahasiswa_ref[".updateSelectedFields"][] = "stakmhsrNama";


$tdatastatus_aktif_mahasiswa_ref[".exportFields"] = array();
$tdatastatus_aktif_mahasiswa_ref[".exportFields"][] = "stakmhsrKode";
$tdatastatus_aktif_mahasiswa_ref[".exportFields"][] = "stakmhsrNama";

$tdatastatus_aktif_mahasiswa_ref[".importFields"] = array();
$tdatastatus_aktif_mahasiswa_ref[".importFields"][] = "stakmhsrKode";
$tdatastatus_aktif_mahasiswa_ref[".importFields"][] = "stakmhsrNama";

$tdatastatus_aktif_mahasiswa_ref[".printFields"] = array();
$tdatastatus_aktif_mahasiswa_ref[".printFields"][] = "stakmhsrKode";
$tdatastatus_aktif_mahasiswa_ref[".printFields"][] = "stakmhsrNama";


//	stakmhsrKode
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "stakmhsrKode";
	$fdata["GoodName"] = "stakmhsrKode";
	$fdata["ownerTable"] = "status_aktif_mahasiswa_ref";
	$fdata["Label"] = GetFieldLabel("status_aktif_mahasiswa_ref","stakmhsrKode");
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

		$fdata["strField"] = "stakmhsrKode";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "stakmhsrKode";

	
	
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
			$edata["EditParams"].= " maxlength=1";

		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;








	$tdatastatus_aktif_mahasiswa_ref["stakmhsrKode"] = $fdata;
//	stakmhsrNama
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "stakmhsrNama";
	$fdata["GoodName"] = "stakmhsrNama";
	$fdata["ownerTable"] = "status_aktif_mahasiswa_ref";
	$fdata["Label"] = GetFieldLabel("status_aktif_mahasiswa_ref","stakmhsrNama");
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

		$fdata["strField"] = "stakmhsrNama";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "stakmhsrNama";

	
	
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
			$edata["EditParams"].= " maxlength=50";

		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;








	$tdatastatus_aktif_mahasiswa_ref["stakmhsrNama"] = $fdata;


$tables_data["status_aktif_mahasiswa_ref"]=&$tdatastatus_aktif_mahasiswa_ref;
$field_labels["status_aktif_mahasiswa_ref"] = &$fieldLabelsstatus_aktif_mahasiswa_ref;
$fieldToolTips["status_aktif_mahasiswa_ref"] = &$fieldToolTipsstatus_aktif_mahasiswa_ref;
$placeHolders["status_aktif_mahasiswa_ref"] = &$placeHoldersstatus_aktif_mahasiswa_ref;
$page_titles["status_aktif_mahasiswa_ref"] = &$pageTitlesstatus_aktif_mahasiswa_ref;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["status_aktif_mahasiswa_ref"] = array();

// tables which are master tables for current table (detail)
$masterTablesData["status_aktif_mahasiswa_ref"] = array();


// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_status_aktif_mahasiswa_ref()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "stakmhsrKode,  	stakmhsrNama";
$proto0["m_strFrom"] = "FROM status_aktif_mahasiswa_ref";
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
	"m_strName" => "stakmhsrKode",
	"m_strTable" => "status_aktif_mahasiswa_ref",
	"m_srcTableName" => "status_aktif_mahasiswa_ref"
));

$proto6["m_sql"] = "stakmhsrKode";
$proto6["m_srcTableName"] = "status_aktif_mahasiswa_ref";
$proto6["m_expr"]=$obj;
$proto6["m_alias"] = "";
$obj = new SQLFieldListItem($proto6);

$proto0["m_fieldlist"][]=$obj;
						$proto8=array();
			$obj = new SQLField(array(
	"m_strName" => "stakmhsrNama",
	"m_strTable" => "status_aktif_mahasiswa_ref",
	"m_srcTableName" => "status_aktif_mahasiswa_ref"
));

$proto8["m_sql"] = "stakmhsrNama";
$proto8["m_srcTableName"] = "status_aktif_mahasiswa_ref";
$proto8["m_expr"]=$obj;
$proto8["m_alias"] = "";
$obj = new SQLFieldListItem($proto8);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto10=array();
$proto10["m_link"] = "SQLL_MAIN";
			$proto11=array();
$proto11["m_strName"] = "status_aktif_mahasiswa_ref";
$proto11["m_srcTableName"] = "status_aktif_mahasiswa_ref";
$proto11["m_columns"] = array();
$proto11["m_columns"][] = "stakmhsrKode";
$proto11["m_columns"][] = "stakmhsrNama";
$obj = new SQLTable($proto11);

$proto10["m_table"] = $obj;
$proto10["m_sql"] = "status_aktif_mahasiswa_ref";
$proto10["m_alias"] = "";
$proto10["m_srcTableName"] = "status_aktif_mahasiswa_ref";
$proto12=array();
$proto12["m_sql"] = "";
$proto12["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto12["m_column"]=$obj;
$proto12["m_contained"] = array();
$proto12["m_strCase"] = "";
$proto12["m_havingmode"] = false;
$proto12["m_inBrackets"] = false;
$proto12["m_useAlias"] = false;
$obj = new SQLLogicalExpr($proto12);

$proto10["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto10);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
$proto0["m_srcTableName"]="status_aktif_mahasiswa_ref";		
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_status_aktif_mahasiswa_ref = createSqlQuery_status_aktif_mahasiswa_ref();


	
				;

		

$tdatastatus_aktif_mahasiswa_ref[".sqlquery"] = $queryData_status_aktif_mahasiswa_ref;

$tableEvents["status_aktif_mahasiswa_ref"] = new eventsBase;
$tdatastatus_aktif_mahasiswa_ref[".hasEvents"] = false;

?>