<?php
require_once(getabspath("classes/cipherer.php"));




$tdatapengguna = array();
	$tdatapengguna[".truncateText"] = true;
	$tdatapengguna[".NumberOfChars"] = 80;
	$tdatapengguna[".ShortName"] = "pengguna";
	$tdatapengguna[".OwnerID"] = "";
	$tdatapengguna[".OriginalTable"] = "pengguna";

//	field labels
$fieldLabelspengguna = array();
$fieldToolTipspengguna = array();
$pageTitlespengguna = array();
$placeHolderspengguna = array();

if(mlang_getcurrentlang()=="English")
{
	$fieldLabelspengguna["English"] = array();
	$fieldToolTipspengguna["English"] = array();
	$placeHolderspengguna["English"] = array();
	$pageTitlespengguna["English"] = array();
	$fieldLabelspengguna["English"]["Id"] = "Id";
	$fieldToolTipspengguna["English"]["Id"] = "";
	$placeHolderspengguna["English"]["Id"] = "";
	$fieldLabelspengguna["English"]["iduser"] = "Iduser";
	$fieldToolTipspengguna["English"]["iduser"] = "";
	$placeHolderspengguna["English"]["iduser"] = "";
	$fieldLabelspengguna["English"]["sandi"] = "Sandi";
	$fieldToolTipspengguna["English"]["sandi"] = "";
	$placeHolderspengguna["English"]["sandi"] = "";
	$fieldLabelspengguna["English"]["peran"] = "Peran";
	$fieldToolTipspengguna["English"]["peran"] = "";
	$placeHolderspengguna["English"]["peran"] = "";
	if (count($fieldToolTipspengguna["English"]))
		$tdatapengguna[".isUseToolTips"] = true;
}
if(mlang_getcurrentlang()=="")
{
	$fieldLabelspengguna[""] = array();
	$fieldToolTipspengguna[""] = array();
	$placeHolderspengguna[""] = array();
	$pageTitlespengguna[""] = array();
	$fieldLabelspengguna[""]["Id"] = "Id";
	$fieldToolTipspengguna[""]["Id"] = "";
	$placeHolderspengguna[""]["Id"] = "";
	$fieldLabelspengguna[""]["iduser"] = "Iduser";
	$fieldToolTipspengguna[""]["iduser"] = "";
	$placeHolderspengguna[""]["iduser"] = "";
	$fieldLabelspengguna[""]["sandi"] = "Sandi";
	$fieldToolTipspengguna[""]["sandi"] = "";
	$placeHolderspengguna[""]["sandi"] = "";
	$fieldLabelspengguna[""]["peran"] = "Peran";
	$fieldToolTipspengguna[""]["peran"] = "";
	$placeHolderspengguna[""]["peran"] = "";
	if (count($fieldToolTipspengguna[""]))
		$tdatapengguna[".isUseToolTips"] = true;
}


	$tdatapengguna[".NCSearch"] = true;



$tdatapengguna[".shortTableName"] = "pengguna";
$tdatapengguna[".nSecOptions"] = 0;
$tdatapengguna[".recsPerRowPrint"] = 1;
$tdatapengguna[".mainTableOwnerID"] = "";
$tdatapengguna[".moveNext"] = 1;
$tdatapengguna[".entityType"] = 0;

$tdatapengguna[".strOriginalTableName"] = "pengguna";

	



$tdatapengguna[".showAddInPopup"] = false;

$tdatapengguna[".showEditInPopup"] = false;

$tdatapengguna[".showViewInPopup"] = false;

//page's base css files names
$popupPagesLayoutNames = array();
$tdatapengguna[".popupPagesLayoutNames"] = $popupPagesLayoutNames;


$tdatapengguna[".fieldsForRegister"] = array();

$tdatapengguna[".listAjax"] = false;

	$tdatapengguna[".audit"] = false;

	$tdatapengguna[".locking"] = false;

$tdatapengguna[".edit"] = true;
$tdatapengguna[".afterEditAction"] = 1;
$tdatapengguna[".closePopupAfterEdit"] = 1;
$tdatapengguna[".afterEditActionDetTable"] = "";

$tdatapengguna[".add"] = true;
$tdatapengguna[".afterAddAction"] = 1;
$tdatapengguna[".closePopupAfterAdd"] = 1;
$tdatapengguna[".afterAddActionDetTable"] = "";

$tdatapengguna[".list"] = true;



$tdatapengguna[".reorderRecordsByHeader"] = true;


$tdatapengguna[".exportFormatting"] = 2;
$tdatapengguna[".exportDelimiter"] = ",";
		
$tdatapengguna[".view"] = true;

$tdatapengguna[".import"] = true;

$tdatapengguna[".exportTo"] = true;

$tdatapengguna[".printFriendly"] = true;

$tdatapengguna[".delete"] = true;

$tdatapengguna[".showSimpleSearchOptions"] = false;

// Allow Show/Hide Fields in GRID
$tdatapengguna[".allowShowHideFields"] = false;
//

// Allow Fields Reordering in GRID
$tdatapengguna[".allowFieldsReordering"] = false;
//

// search Saving settings
$tdatapengguna[".searchSaving"] = false;
//

$tdatapengguna[".showSearchPanel"] = true;
		$tdatapengguna[".flexibleSearch"] = true;

$tdatapengguna[".isUseAjaxSuggest"] = true;

$tdatapengguna[".rowHighlite"] = true;





$tdatapengguna[".ajaxCodeSnippetAdded"] = false;

$tdatapengguna[".buttonsAdded"] = false;

$tdatapengguna[".addPageEvents"] = false;

// use timepicker for search panel
$tdatapengguna[".isUseTimeForSearch"] = false;



$tdatapengguna[".badgeColor"] = "1E90FF";


$tdatapengguna[".allSearchFields"] = array();
$tdatapengguna[".filterFields"] = array();
$tdatapengguna[".requiredSearchFields"] = array();

$tdatapengguna[".allSearchFields"][] = "Id";
	$tdatapengguna[".allSearchFields"][] = "iduser";
	$tdatapengguna[".allSearchFields"][] = "sandi";
	$tdatapengguna[".allSearchFields"][] = "peran";
	

$tdatapengguna[".googleLikeFields"] = array();
$tdatapengguna[".googleLikeFields"][] = "Id";
$tdatapengguna[".googleLikeFields"][] = "iduser";
$tdatapengguna[".googleLikeFields"][] = "sandi";
$tdatapengguna[".googleLikeFields"][] = "peran";


$tdatapengguna[".advSearchFields"] = array();
$tdatapengguna[".advSearchFields"][] = "Id";
$tdatapengguna[".advSearchFields"][] = "iduser";
$tdatapengguna[".advSearchFields"][] = "sandi";
$tdatapengguna[".advSearchFields"][] = "peran";

$tdatapengguna[".tableType"] = "list";

$tdatapengguna[".printerPageOrientation"] = 0;
$tdatapengguna[".nPrinterPageScale"] = 100;

$tdatapengguna[".nPrinterSplitRecords"] = 40;

$tdatapengguna[".nPrinterPDFSplitRecords"] = 40;



$tdatapengguna[".geocodingEnabled"] = false;





$tdatapengguna[".listGridLayout"] = 3;





// view page pdf

// print page pdf


$tdatapengguna[".pageSize"] = 20;

$tdatapengguna[".warnLeavingPages"] = true;



$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatapengguna[".strOrderBy"] = $tstrOrderBy;

$tdatapengguna[".orderindexes"] = array();

$tdatapengguna[".sqlHead"] = "SELECT Id,  	iduser,  	sandi,  	peran";
$tdatapengguna[".sqlFrom"] = "FROM pengguna";
$tdatapengguna[".sqlWhereExpr"] = "";
$tdatapengguna[".sqlTail"] = "";












//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatapengguna[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatapengguna[".arrGroupsPerPage"] = $arrGPP;

$tdatapengguna[".highlightSearchResults"] = true;

$tableKeyspengguna = array();
$tableKeyspengguna[] = "Id";
$tdatapengguna[".Keys"] = $tableKeyspengguna;

$tdatapengguna[".listFields"] = array();
$tdatapengguna[".listFields"][] = "Id";
$tdatapengguna[".listFields"][] = "iduser";
$tdatapengguna[".listFields"][] = "sandi";
$tdatapengguna[".listFields"][] = "peran";

$tdatapengguna[".hideMobileList"] = array();


$tdatapengguna[".viewFields"] = array();
$tdatapengguna[".viewFields"][] = "Id";
$tdatapengguna[".viewFields"][] = "iduser";
$tdatapengguna[".viewFields"][] = "sandi";
$tdatapengguna[".viewFields"][] = "peran";

$tdatapengguna[".addFields"] = array();
$tdatapengguna[".addFields"][] = "iduser";
$tdatapengguna[".addFields"][] = "sandi";
$tdatapengguna[".addFields"][] = "peran";

$tdatapengguna[".masterListFields"] = array();
$tdatapengguna[".masterListFields"][] = "Id";
$tdatapengguna[".masterListFields"][] = "iduser";
$tdatapengguna[".masterListFields"][] = "sandi";
$tdatapengguna[".masterListFields"][] = "peran";

$tdatapengguna[".inlineAddFields"] = array();
$tdatapengguna[".inlineAddFields"][] = "iduser";
$tdatapengguna[".inlineAddFields"][] = "sandi";
$tdatapengguna[".inlineAddFields"][] = "peran";

$tdatapengguna[".editFields"] = array();
$tdatapengguna[".editFields"][] = "iduser";
$tdatapengguna[".editFields"][] = "sandi";
$tdatapengguna[".editFields"][] = "peran";

$tdatapengguna[".inlineEditFields"] = array();
$tdatapengguna[".inlineEditFields"][] = "iduser";
$tdatapengguna[".inlineEditFields"][] = "sandi";
$tdatapengguna[".inlineEditFields"][] = "peran";

$tdatapengguna[".updateSelectedFields"] = array();
$tdatapengguna[".updateSelectedFields"][] = "iduser";
$tdatapengguna[".updateSelectedFields"][] = "sandi";
$tdatapengguna[".updateSelectedFields"][] = "peran";


$tdatapengguna[".exportFields"] = array();
$tdatapengguna[".exportFields"][] = "Id";
$tdatapengguna[".exportFields"][] = "iduser";
$tdatapengguna[".exportFields"][] = "sandi";
$tdatapengguna[".exportFields"][] = "peran";

$tdatapengguna[".importFields"] = array();
$tdatapengguna[".importFields"][] = "Id";
$tdatapengguna[".importFields"][] = "iduser";
$tdatapengguna[".importFields"][] = "sandi";
$tdatapengguna[".importFields"][] = "peran";

$tdatapengguna[".printFields"] = array();
$tdatapengguna[".printFields"][] = "Id";
$tdatapengguna[".printFields"][] = "iduser";
$tdatapengguna[".printFields"][] = "sandi";
$tdatapengguna[".printFields"][] = "peran";


//	Id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "Id";
	$fdata["GoodName"] = "Id";
	$fdata["ownerTable"] = "pengguna";
	$fdata["Label"] = GetFieldLabel("pengguna","Id");
	$fdata["FieldType"] = 3;

	
		$fdata["AutoInc"] = true;

	
			
		$fdata["bListPage"] = true;

	
	
	
	
	

		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "Id";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "Id";

	
	
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




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatapengguna["Id"] = $fdata;
//	iduser
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "iduser";
	$fdata["GoodName"] = "iduser";
	$fdata["ownerTable"] = "pengguna";
	$fdata["Label"] = GetFieldLabel("pengguna","iduser");
	$fdata["FieldType"] = 200;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

		$fdata["bInlineAdd"] = true;

		$fdata["bEditPage"] = true;

		$fdata["bInlineEdit"] = true;

		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "iduser";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "iduser";

	
	
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




	$tdatapengguna["iduser"] = $fdata;
//	sandi
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "sandi";
	$fdata["GoodName"] = "sandi";
	$fdata["ownerTable"] = "pengguna";
	$fdata["Label"] = GetFieldLabel("pengguna","sandi");
	$fdata["FieldType"] = 200;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

		$fdata["bInlineAdd"] = true;

		$fdata["bEditPage"] = true;

		$fdata["bInlineEdit"] = true;

		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "sandi";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "sandi";

	
	
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




	$tdatapengguna["sandi"] = $fdata;
//	peran
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "peran";
	$fdata["GoodName"] = "peran";
	$fdata["ownerTable"] = "pengguna";
	$fdata["Label"] = GetFieldLabel("pengguna","peran");
	$fdata["FieldType"] = 200;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

		$fdata["bInlineAdd"] = true;

		$fdata["bEditPage"] = true;

		$fdata["bInlineEdit"] = true;

		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "peran";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "peran";

	
	
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




	$tdatapengguna["peran"] = $fdata;


$tables_data["pengguna"]=&$tdatapengguna;
$field_labels["pengguna"] = &$fieldLabelspengguna;
$fieldToolTips["pengguna"] = &$fieldToolTipspengguna;
$placeHolders["pengguna"] = &$placeHolderspengguna;
$page_titles["pengguna"] = &$pageTitlespengguna;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["pengguna"] = array();

// tables which are master tables for current table (detail)
$masterTablesData["pengguna"] = array();


// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_pengguna()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "Id,  	iduser,  	sandi,  	peran";
$proto0["m_strFrom"] = "FROM pengguna";
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
	"m_strName" => "Id",
	"m_strTable" => "pengguna",
	"m_srcTableName" => "pengguna"
));

$proto6["m_sql"] = "Id";
$proto6["m_srcTableName"] = "pengguna";
$proto6["m_expr"]=$obj;
$proto6["m_alias"] = "";
$obj = new SQLFieldListItem($proto6);

$proto0["m_fieldlist"][]=$obj;
						$proto8=array();
			$obj = new SQLField(array(
	"m_strName" => "iduser",
	"m_strTable" => "pengguna",
	"m_srcTableName" => "pengguna"
));

$proto8["m_sql"] = "iduser";
$proto8["m_srcTableName"] = "pengguna";
$proto8["m_expr"]=$obj;
$proto8["m_alias"] = "";
$obj = new SQLFieldListItem($proto8);

$proto0["m_fieldlist"][]=$obj;
						$proto10=array();
			$obj = new SQLField(array(
	"m_strName" => "sandi",
	"m_strTable" => "pengguna",
	"m_srcTableName" => "pengguna"
));

$proto10["m_sql"] = "sandi";
$proto10["m_srcTableName"] = "pengguna";
$proto10["m_expr"]=$obj;
$proto10["m_alias"] = "";
$obj = new SQLFieldListItem($proto10);

$proto0["m_fieldlist"][]=$obj;
						$proto12=array();
			$obj = new SQLField(array(
	"m_strName" => "peran",
	"m_strTable" => "pengguna",
	"m_srcTableName" => "pengguna"
));

$proto12["m_sql"] = "peran";
$proto12["m_srcTableName"] = "pengguna";
$proto12["m_expr"]=$obj;
$proto12["m_alias"] = "";
$obj = new SQLFieldListItem($proto12);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto14=array();
$proto14["m_link"] = "SQLL_MAIN";
			$proto15=array();
$proto15["m_strName"] = "pengguna";
$proto15["m_srcTableName"] = "pengguna";
$proto15["m_columns"] = array();
$proto15["m_columns"][] = "Id";
$proto15["m_columns"][] = "iduser";
$proto15["m_columns"][] = "sandi";
$proto15["m_columns"][] = "peran";
$obj = new SQLTable($proto15);

$proto14["m_table"] = $obj;
$proto14["m_sql"] = "pengguna";
$proto14["m_alias"] = "";
$proto14["m_srcTableName"] = "pengguna";
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
$proto0["m_srcTableName"]="pengguna";		
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_pengguna = createSqlQuery_pengguna();


	
				;

				

$tdatapengguna[".sqlquery"] = $queryData_pengguna;

$tableEvents["pengguna"] = new eventsBase;
$tdatapengguna[".hasEvents"] = false;

?>