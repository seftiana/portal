<?php
require_once(getabspath("classes/cipherer.php"));




$tdatat_hak_akses_ref = array();
	$tdatat_hak_akses_ref[".truncateText"] = true;
	$tdatat_hak_akses_ref[".NumberOfChars"] = 80;
	$tdatat_hak_akses_ref[".ShortName"] = "t_hak_akses_ref";
	$tdatat_hak_akses_ref[".OwnerID"] = "";
	$tdatat_hak_akses_ref[".OriginalTable"] = "t_hak_akses_ref";

//	field labels
$fieldLabelst_hak_akses_ref = array();
$fieldToolTipst_hak_akses_ref = array();
$pageTitlest_hak_akses_ref = array();
$placeHolderst_hak_akses_ref = array();

if(mlang_getcurrentlang()=="English")
{
	$fieldLabelst_hak_akses_ref["English"] = array();
	$fieldToolTipst_hak_akses_ref["English"] = array();
	$placeHolderst_hak_akses_ref["English"] = array();
	$pageTitlest_hak_akses_ref["English"] = array();
	$fieldLabelst_hak_akses_ref["English"]["thakrId"] = "Thakr Id";
	$fieldToolTipst_hak_akses_ref["English"]["thakrId"] = "";
	$placeHolderst_hak_akses_ref["English"]["thakrId"] = "";
	$fieldLabelst_hak_akses_ref["English"]["thakrNama"] = "Thakr Nama";
	$fieldToolTipst_hak_akses_ref["English"]["thakrNama"] = "";
	$placeHolderst_hak_akses_ref["English"]["thakrNama"] = "";
	$fieldLabelst_hak_akses_ref["English"]["thakrDesc"] = "Thakr Desc";
	$fieldToolTipst_hak_akses_ref["English"]["thakrDesc"] = "";
	$placeHolderst_hak_akses_ref["English"]["thakrDesc"] = "";
	$fieldLabelst_hak_akses_ref["English"]["thakrKode"] = "Thakr Kode";
	$fieldToolTipst_hak_akses_ref["English"]["thakrKode"] = "";
	$placeHolderst_hak_akses_ref["English"]["thakrKode"] = "";
	if (count($fieldToolTipst_hak_akses_ref["English"]))
		$tdatat_hak_akses_ref[".isUseToolTips"] = true;
}
if(mlang_getcurrentlang()=="")
{
	$fieldLabelst_hak_akses_ref[""] = array();
	$fieldToolTipst_hak_akses_ref[""] = array();
	$placeHolderst_hak_akses_ref[""] = array();
	$pageTitlest_hak_akses_ref[""] = array();
	$fieldLabelst_hak_akses_ref[""]["thakrId"] = "Thakr Id";
	$fieldToolTipst_hak_akses_ref[""]["thakrId"] = "";
	$placeHolderst_hak_akses_ref[""]["thakrId"] = "";
	$fieldLabelst_hak_akses_ref[""]["thakrNama"] = "Thakr Nama";
	$fieldToolTipst_hak_akses_ref[""]["thakrNama"] = "";
	$placeHolderst_hak_akses_ref[""]["thakrNama"] = "";
	$fieldLabelst_hak_akses_ref[""]["thakrDesc"] = "Thakr Desc";
	$fieldToolTipst_hak_akses_ref[""]["thakrDesc"] = "";
	$placeHolderst_hak_akses_ref[""]["thakrDesc"] = "";
	$fieldLabelst_hak_akses_ref[""]["thakrKode"] = "Thakr Kode";
	$fieldToolTipst_hak_akses_ref[""]["thakrKode"] = "";
	$placeHolderst_hak_akses_ref[""]["thakrKode"] = "";
	if (count($fieldToolTipst_hak_akses_ref[""]))
		$tdatat_hak_akses_ref[".isUseToolTips"] = true;
}


	$tdatat_hak_akses_ref[".NCSearch"] = true;



$tdatat_hak_akses_ref[".shortTableName"] = "t_hak_akses_ref";
$tdatat_hak_akses_ref[".nSecOptions"] = 0;
$tdatat_hak_akses_ref[".recsPerRowPrint"] = 1;
$tdatat_hak_akses_ref[".mainTableOwnerID"] = "";
$tdatat_hak_akses_ref[".moveNext"] = 1;
$tdatat_hak_akses_ref[".entityType"] = 0;

$tdatat_hak_akses_ref[".strOriginalTableName"] = "t_hak_akses_ref";

	



$tdatat_hak_akses_ref[".showAddInPopup"] = false;

$tdatat_hak_akses_ref[".showEditInPopup"] = false;

$tdatat_hak_akses_ref[".showViewInPopup"] = false;

//page's base css files names
$popupPagesLayoutNames = array();
$tdatat_hak_akses_ref[".popupPagesLayoutNames"] = $popupPagesLayoutNames;


$tdatat_hak_akses_ref[".fieldsForRegister"] = array();

$tdatat_hak_akses_ref[".listAjax"] = false;

	$tdatat_hak_akses_ref[".audit"] = false;

	$tdatat_hak_akses_ref[".locking"] = false;






$tdatat_hak_akses_ref[".reorderRecordsByHeader"] = true;








$tdatat_hak_akses_ref[".showSimpleSearchOptions"] = false;

// Allow Show/Hide Fields in GRID
$tdatat_hak_akses_ref[".allowShowHideFields"] = false;
//

// Allow Fields Reordering in GRID
$tdatat_hak_akses_ref[".allowFieldsReordering"] = false;
//

// search Saving settings
$tdatat_hak_akses_ref[".searchSaving"] = false;
//

$tdatat_hak_akses_ref[".showSearchPanel"] = true;
		$tdatat_hak_akses_ref[".flexibleSearch"] = true;

$tdatat_hak_akses_ref[".isUseAjaxSuggest"] = true;

$tdatat_hak_akses_ref[".rowHighlite"] = true;





$tdatat_hak_akses_ref[".ajaxCodeSnippetAdded"] = false;

$tdatat_hak_akses_ref[".buttonsAdded"] = false;

$tdatat_hak_akses_ref[".addPageEvents"] = false;

// use timepicker for search panel
$tdatat_hak_akses_ref[".isUseTimeForSearch"] = false;



$tdatat_hak_akses_ref[".badgeColor"] = "00C2C5";


$tdatat_hak_akses_ref[".allSearchFields"] = array();
$tdatat_hak_akses_ref[".filterFields"] = array();
$tdatat_hak_akses_ref[".requiredSearchFields"] = array();



$tdatat_hak_akses_ref[".googleLikeFields"] = array();
$tdatat_hak_akses_ref[".googleLikeFields"][] = "thakrId";
$tdatat_hak_akses_ref[".googleLikeFields"][] = "thakrNama";
$tdatat_hak_akses_ref[".googleLikeFields"][] = "thakrDesc";
$tdatat_hak_akses_ref[".googleLikeFields"][] = "thakrKode";



$tdatat_hak_akses_ref[".tableType"] = "list";

$tdatat_hak_akses_ref[".printerPageOrientation"] = 0;
$tdatat_hak_akses_ref[".nPrinterPageScale"] = 100;

$tdatat_hak_akses_ref[".nPrinterSplitRecords"] = 40;

$tdatat_hak_akses_ref[".nPrinterPDFSplitRecords"] = 40;



$tdatat_hak_akses_ref[".geocodingEnabled"] = false;





$tdatat_hak_akses_ref[".listGridLayout"] = 3;





// view page pdf

// print page pdf


$tdatat_hak_akses_ref[".pageSize"] = 20;

$tdatat_hak_akses_ref[".warnLeavingPages"] = true;



$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatat_hak_akses_ref[".strOrderBy"] = $tstrOrderBy;

$tdatat_hak_akses_ref[".orderindexes"] = array();

$tdatat_hak_akses_ref[".sqlHead"] = "SELECT thakrId,  	thakrNama,  	thakrDesc,  	thakrKode";
$tdatat_hak_akses_ref[".sqlFrom"] = "FROM t_hak_akses_ref";
$tdatat_hak_akses_ref[".sqlWhereExpr"] = "";
$tdatat_hak_akses_ref[".sqlTail"] = "";












//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatat_hak_akses_ref[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatat_hak_akses_ref[".arrGroupsPerPage"] = $arrGPP;

$tdatat_hak_akses_ref[".highlightSearchResults"] = true;

$tableKeyst_hak_akses_ref = array();
$tableKeyst_hak_akses_ref[] = "thakrId";
$tdatat_hak_akses_ref[".Keys"] = $tableKeyst_hak_akses_ref;

$tdatat_hak_akses_ref[".listFields"] = array();
$tdatat_hak_akses_ref[".listFields"][] = "thakrId";
$tdatat_hak_akses_ref[".listFields"][] = "thakrNama";
$tdatat_hak_akses_ref[".listFields"][] = "thakrDesc";
$tdatat_hak_akses_ref[".listFields"][] = "thakrKode";

$tdatat_hak_akses_ref[".hideMobileList"] = array();


$tdatat_hak_akses_ref[".viewFields"] = array();
$tdatat_hak_akses_ref[".viewFields"][] = "thakrId";
$tdatat_hak_akses_ref[".viewFields"][] = "thakrNama";
$tdatat_hak_akses_ref[".viewFields"][] = "thakrDesc";
$tdatat_hak_akses_ref[".viewFields"][] = "thakrKode";

$tdatat_hak_akses_ref[".addFields"] = array();
$tdatat_hak_akses_ref[".addFields"][] = "thakrId";
$tdatat_hak_akses_ref[".addFields"][] = "thakrNama";
$tdatat_hak_akses_ref[".addFields"][] = "thakrDesc";
$tdatat_hak_akses_ref[".addFields"][] = "thakrKode";

$tdatat_hak_akses_ref[".masterListFields"] = array();
$tdatat_hak_akses_ref[".masterListFields"][] = "thakrId";
$tdatat_hak_akses_ref[".masterListFields"][] = "thakrNama";
$tdatat_hak_akses_ref[".masterListFields"][] = "thakrDesc";
$tdatat_hak_akses_ref[".masterListFields"][] = "thakrKode";

$tdatat_hak_akses_ref[".inlineAddFields"] = array();
$tdatat_hak_akses_ref[".inlineAddFields"][] = "thakrId";
$tdatat_hak_akses_ref[".inlineAddFields"][] = "thakrNama";
$tdatat_hak_akses_ref[".inlineAddFields"][] = "thakrDesc";
$tdatat_hak_akses_ref[".inlineAddFields"][] = "thakrKode";

$tdatat_hak_akses_ref[".editFields"] = array();
$tdatat_hak_akses_ref[".editFields"][] = "thakrId";
$tdatat_hak_akses_ref[".editFields"][] = "thakrNama";
$tdatat_hak_akses_ref[".editFields"][] = "thakrDesc";
$tdatat_hak_akses_ref[".editFields"][] = "thakrKode";

$tdatat_hak_akses_ref[".inlineEditFields"] = array();
$tdatat_hak_akses_ref[".inlineEditFields"][] = "thakrId";
$tdatat_hak_akses_ref[".inlineEditFields"][] = "thakrNama";
$tdatat_hak_akses_ref[".inlineEditFields"][] = "thakrDesc";
$tdatat_hak_akses_ref[".inlineEditFields"][] = "thakrKode";

$tdatat_hak_akses_ref[".updateSelectedFields"] = array();
$tdatat_hak_akses_ref[".updateSelectedFields"][] = "thakrId";
$tdatat_hak_akses_ref[".updateSelectedFields"][] = "thakrNama";
$tdatat_hak_akses_ref[".updateSelectedFields"][] = "thakrDesc";
$tdatat_hak_akses_ref[".updateSelectedFields"][] = "thakrKode";


$tdatat_hak_akses_ref[".exportFields"] = array();
$tdatat_hak_akses_ref[".exportFields"][] = "thakrId";
$tdatat_hak_akses_ref[".exportFields"][] = "thakrNama";
$tdatat_hak_akses_ref[".exportFields"][] = "thakrDesc";
$tdatat_hak_akses_ref[".exportFields"][] = "thakrKode";

$tdatat_hak_akses_ref[".importFields"] = array();
$tdatat_hak_akses_ref[".importFields"][] = "thakrId";
$tdatat_hak_akses_ref[".importFields"][] = "thakrNama";
$tdatat_hak_akses_ref[".importFields"][] = "thakrDesc";
$tdatat_hak_akses_ref[".importFields"][] = "thakrKode";

$tdatat_hak_akses_ref[".printFields"] = array();
$tdatat_hak_akses_ref[".printFields"][] = "thakrId";
$tdatat_hak_akses_ref[".printFields"][] = "thakrNama";
$tdatat_hak_akses_ref[".printFields"][] = "thakrDesc";
$tdatat_hak_akses_ref[".printFields"][] = "thakrKode";


//	thakrId
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "thakrId";
	$fdata["GoodName"] = "thakrId";
	$fdata["ownerTable"] = "t_hak_akses_ref";
	$fdata["Label"] = GetFieldLabel("t_hak_akses_ref","thakrId");
	$fdata["FieldType"] = 2;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

		$fdata["bInlineAdd"] = true;

		$fdata["bEditPage"] = true;

		$fdata["bInlineEdit"] = true;

		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

	
		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "thakrId";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "thakrId";

	
	
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








	$tdatat_hak_akses_ref["thakrId"] = $fdata;
//	thakrNama
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "thakrNama";
	$fdata["GoodName"] = "thakrNama";
	$fdata["ownerTable"] = "t_hak_akses_ref";
	$fdata["Label"] = GetFieldLabel("t_hak_akses_ref","thakrNama");
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

		$fdata["strField"] = "thakrNama";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "thakrNama";

	
	
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








	$tdatat_hak_akses_ref["thakrNama"] = $fdata;
//	thakrDesc
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "thakrDesc";
	$fdata["GoodName"] = "thakrDesc";
	$fdata["ownerTable"] = "t_hak_akses_ref";
	$fdata["Label"] = GetFieldLabel("t_hak_akses_ref","thakrDesc");
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

		$fdata["strField"] = "thakrDesc";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "thakrDesc";

	
	
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








	$tdatat_hak_akses_ref["thakrDesc"] = $fdata;
//	thakrKode
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "thakrKode";
	$fdata["GoodName"] = "thakrKode";
	$fdata["ownerTable"] = "t_hak_akses_ref";
	$fdata["Label"] = GetFieldLabel("t_hak_akses_ref","thakrKode");
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

		$fdata["strField"] = "thakrKode";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "thakrKode";

	
	
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
			$edata["EditParams"].= " maxlength=40";

		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;








	$tdatat_hak_akses_ref["thakrKode"] = $fdata;


$tables_data["t_hak_akses_ref"]=&$tdatat_hak_akses_ref;
$field_labels["t_hak_akses_ref"] = &$fieldLabelst_hak_akses_ref;
$fieldToolTips["t_hak_akses_ref"] = &$fieldToolTipst_hak_akses_ref;
$placeHolders["t_hak_akses_ref"] = &$placeHolderst_hak_akses_ref;
$page_titles["t_hak_akses_ref"] = &$pageTitlest_hak_akses_ref;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["t_hak_akses_ref"] = array();

// tables which are master tables for current table (detail)
$masterTablesData["t_hak_akses_ref"] = array();


// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_t_hak_akses_ref()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "thakrId,  	thakrNama,  	thakrDesc,  	thakrKode";
$proto0["m_strFrom"] = "FROM t_hak_akses_ref";
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
	"m_strName" => "thakrId",
	"m_strTable" => "t_hak_akses_ref",
	"m_srcTableName" => "t_hak_akses_ref"
));

$proto6["m_sql"] = "thakrId";
$proto6["m_srcTableName"] = "t_hak_akses_ref";
$proto6["m_expr"]=$obj;
$proto6["m_alias"] = "";
$obj = new SQLFieldListItem($proto6);

$proto0["m_fieldlist"][]=$obj;
						$proto8=array();
			$obj = new SQLField(array(
	"m_strName" => "thakrNama",
	"m_strTable" => "t_hak_akses_ref",
	"m_srcTableName" => "t_hak_akses_ref"
));

$proto8["m_sql"] = "thakrNama";
$proto8["m_srcTableName"] = "t_hak_akses_ref";
$proto8["m_expr"]=$obj;
$proto8["m_alias"] = "";
$obj = new SQLFieldListItem($proto8);

$proto0["m_fieldlist"][]=$obj;
						$proto10=array();
			$obj = new SQLField(array(
	"m_strName" => "thakrDesc",
	"m_strTable" => "t_hak_akses_ref",
	"m_srcTableName" => "t_hak_akses_ref"
));

$proto10["m_sql"] = "thakrDesc";
$proto10["m_srcTableName"] = "t_hak_akses_ref";
$proto10["m_expr"]=$obj;
$proto10["m_alias"] = "";
$obj = new SQLFieldListItem($proto10);

$proto0["m_fieldlist"][]=$obj;
						$proto12=array();
			$obj = new SQLField(array(
	"m_strName" => "thakrKode",
	"m_strTable" => "t_hak_akses_ref",
	"m_srcTableName" => "t_hak_akses_ref"
));

$proto12["m_sql"] = "thakrKode";
$proto12["m_srcTableName"] = "t_hak_akses_ref";
$proto12["m_expr"]=$obj;
$proto12["m_alias"] = "";
$obj = new SQLFieldListItem($proto12);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto14=array();
$proto14["m_link"] = "SQLL_MAIN";
			$proto15=array();
$proto15["m_strName"] = "t_hak_akses_ref";
$proto15["m_srcTableName"] = "t_hak_akses_ref";
$proto15["m_columns"] = array();
$proto15["m_columns"][] = "thakrId";
$proto15["m_columns"][] = "thakrNama";
$proto15["m_columns"][] = "thakrDesc";
$proto15["m_columns"][] = "thakrKode";
$obj = new SQLTable($proto15);

$proto14["m_table"] = $obj;
$proto14["m_sql"] = "t_hak_akses_ref";
$proto14["m_alias"] = "";
$proto14["m_srcTableName"] = "t_hak_akses_ref";
$proto16=array();
$proto16["m_sql"] = "";
$proto16["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto16["m_column"]=$obj;
$proto16["m_contained"] = array();
$proto16["m_strCase"] = "";
$proto16["m_havingmode"] = false;
$proto16["m_inBrackets"] = false;
$proto16["m_useAlias"] = false;
$obj = new SQLLogicalExpr($proto16);

$proto14["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto14);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
$proto0["m_srcTableName"]="t_hak_akses_ref";		
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_t_hak_akses_ref = createSqlQuery_t_hak_akses_ref();


	
				;

				

$tdatat_hak_akses_ref[".sqlquery"] = $queryData_t_hak_akses_ref;

$tableEvents["t_hak_akses_ref"] = new eventsBase;
$tdatat_hak_akses_ref[".hasEvents"] = false;

?>