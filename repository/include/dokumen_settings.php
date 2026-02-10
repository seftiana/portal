<?php
require_once(getabspath("classes/cipherer.php"));




$tdatadokumen = array();
	$tdatadokumen[".truncateText"] = true;
	$tdatadokumen[".NumberOfChars"] = 80;
	$tdatadokumen[".ShortName"] = "dokumen";
	$tdatadokumen[".OwnerID"] = "";
	$tdatadokumen[".OriginalTable"] = "dokumen";

//	field labels
$fieldLabelsdokumen = array();
$fieldToolTipsdokumen = array();
$pageTitlesdokumen = array();
$placeHoldersdokumen = array();

if(mlang_getcurrentlang()=="English")
{
	$fieldLabelsdokumen["English"] = array();
	$fieldToolTipsdokumen["English"] = array();
	$placeHoldersdokumen["English"] = array();
	$pageTitlesdokumen["English"] = array();
	$fieldLabelsdokumen["English"]["ID"] = "ID";
	$fieldToolTipsdokumen["English"]["ID"] = "";
	$placeHoldersdokumen["English"]["ID"] = "";
	$fieldLabelsdokumen["English"]["namadoc"] = "Dokumen";
	$fieldToolTipsdokumen["English"]["namadoc"] = "";
	$placeHoldersdokumen["English"]["namadoc"] = "";
	$fieldLabelsdokumen["English"]["deskripsi"] = "Link Dokumen";
	$fieldToolTipsdokumen["English"]["deskripsi"] = "";
	$placeHoldersdokumen["English"]["deskripsi"] = "";
	$fieldLabelsdokumen["English"]["tanggal"] = "Tanggal";
	$fieldToolTipsdokumen["English"]["tanggal"] = "";
	$placeHoldersdokumen["English"]["tanggal"] = "";
	$fieldLabelsdokumen["English"]["namadosen"] = "Dosen";
	$fieldToolTipsdokumen["English"]["namadosen"] = "";
	$placeHoldersdokumen["English"]["namadosen"] = "";
	if (count($fieldToolTipsdokumen["English"]))
		$tdatadokumen[".isUseToolTips"] = true;
}
if(mlang_getcurrentlang()=="")
{
	$fieldLabelsdokumen[""] = array();
	$fieldToolTipsdokumen[""] = array();
	$placeHoldersdokumen[""] = array();
	$pageTitlesdokumen[""] = array();
	$fieldLabelsdokumen[""]["namadosen"] = "Namadosen";
	$fieldToolTipsdokumen[""]["namadosen"] = "";
	$placeHoldersdokumen[""]["namadosen"] = "";
	if (count($fieldToolTipsdokumen[""]))
		$tdatadokumen[".isUseToolTips"] = true;
}


	$tdatadokumen[".NCSearch"] = true;



$tdatadokumen[".shortTableName"] = "dokumen";
$tdatadokumen[".nSecOptions"] = 0;
$tdatadokumen[".recsPerRowPrint"] = 1;
$tdatadokumen[".mainTableOwnerID"] = "";
$tdatadokumen[".moveNext"] = 1;
$tdatadokumen[".entityType"] = 0;

$tdatadokumen[".strOriginalTableName"] = "dokumen";

	



$tdatadokumen[".showAddInPopup"] = false;

$tdatadokumen[".showEditInPopup"] = false;

$tdatadokumen[".showViewInPopup"] = false;

//page's base css files names
$popupPagesLayoutNames = array();
$tdatadokumen[".popupPagesLayoutNames"] = $popupPagesLayoutNames;


$tdatadokumen[".fieldsForRegister"] = array();

$tdatadokumen[".listAjax"] = false;

	$tdatadokumen[".audit"] = false;

	$tdatadokumen[".locking"] = false;


$tdatadokumen[".add"] = true;
$tdatadokumen[".afterAddAction"] = 1;
$tdatadokumen[".closePopupAfterAdd"] = 1;
$tdatadokumen[".afterAddActionDetTable"] = "";

$tdatadokumen[".list"] = true;

$tdatadokumen[".inlineEdit"] = true;


$tdatadokumen[".reorderRecordsByHeader"] = true;


$tdatadokumen[".exportFormatting"] = 2;
$tdatadokumen[".exportDelimiter"] = ",";
		
$tdatadokumen[".inlineAdd"] = true;
$tdatadokumen[".view"] = true;

$tdatadokumen[".import"] = true;

$tdatadokumen[".exportTo"] = true;

$tdatadokumen[".printFriendly"] = true;

$tdatadokumen[".delete"] = true;

$tdatadokumen[".showSimpleSearchOptions"] = false;

// Allow Show/Hide Fields in GRID
$tdatadokumen[".allowShowHideFields"] = false;
//

// Allow Fields Reordering in GRID
$tdatadokumen[".allowFieldsReordering"] = false;
//

// search Saving settings
$tdatadokumen[".searchSaving"] = false;
//

$tdatadokumen[".showSearchPanel"] = true;
		$tdatadokumen[".flexibleSearch"] = true;

$tdatadokumen[".isUseAjaxSuggest"] = true;

$tdatadokumen[".rowHighlite"] = true;





$tdatadokumen[".ajaxCodeSnippetAdded"] = false;

$tdatadokumen[".buttonsAdded"] = false;

$tdatadokumen[".addPageEvents"] = false;

// use timepicker for search panel
$tdatadokumen[".isUseTimeForSearch"] = false;



$tdatadokumen[".badgeColor"] = "6DA5C8";


$tdatadokumen[".allSearchFields"] = array();
$tdatadokumen[".filterFields"] = array();
$tdatadokumen[".requiredSearchFields"] = array();

$tdatadokumen[".allSearchFields"][] = "namadosen";
	$tdatadokumen[".allSearchFields"][] = "namadoc";
	$tdatadokumen[".allSearchFields"][] = "deskripsi";
	$tdatadokumen[".allSearchFields"][] = "tanggal";
	

$tdatadokumen[".googleLikeFields"] = array();
$tdatadokumen[".googleLikeFields"][] = "ID";
$tdatadokumen[".googleLikeFields"][] = "namadoc";
$tdatadokumen[".googleLikeFields"][] = "deskripsi";
$tdatadokumen[".googleLikeFields"][] = "tanggal";
$tdatadokumen[".googleLikeFields"][] = "namadosen";


$tdatadokumen[".advSearchFields"] = array();
$tdatadokumen[".advSearchFields"][] = "namadosen";
$tdatadokumen[".advSearchFields"][] = "namadoc";
$tdatadokumen[".advSearchFields"][] = "deskripsi";
$tdatadokumen[".advSearchFields"][] = "tanggal";

$tdatadokumen[".tableType"] = "list";

$tdatadokumen[".printerPageOrientation"] = 0;
$tdatadokumen[".nPrinterPageScale"] = 100;

$tdatadokumen[".nPrinterSplitRecords"] = 40;

$tdatadokumen[".nPrinterPDFSplitRecords"] = 40;



$tdatadokumen[".geocodingEnabled"] = false;





$tdatadokumen[".listGridLayout"] = 3;





// view page pdf

// print page pdf


$tdatadokumen[".pageSize"] = 20;

$tdatadokumen[".warnLeavingPages"] = true;



$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatadokumen[".strOrderBy"] = $tstrOrderBy;

$tdatadokumen[".orderindexes"] = array();

$tdatadokumen[".sqlHead"] = "SELECT ID,  	namadoc,  	deskripsi,  	tanggal,  	namadosen";
$tdatadokumen[".sqlFrom"] = "FROM dokumen";
$tdatadokumen[".sqlWhereExpr"] = "";
$tdatadokumen[".sqlTail"] = "";












//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatadokumen[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatadokumen[".arrGroupsPerPage"] = $arrGPP;

$tdatadokumen[".highlightSearchResults"] = true;

$tableKeysdokumen = array();
$tableKeysdokumen[] = "ID";
$tdatadokumen[".Keys"] = $tableKeysdokumen;

$tdatadokumen[".listFields"] = array();
$tdatadokumen[".listFields"][] = "namadosen";
$tdatadokumen[".listFields"][] = "namadoc";
$tdatadokumen[".listFields"][] = "deskripsi";

$tdatadokumen[".hideMobileList"] = array();


$tdatadokumen[".viewFields"] = array();
$tdatadokumen[".viewFields"][] = "namadosen";
$tdatadokumen[".viewFields"][] = "namadoc";
$tdatadokumen[".viewFields"][] = "deskripsi";
$tdatadokumen[".viewFields"][] = "tanggal";

$tdatadokumen[".addFields"] = array();
$tdatadokumen[".addFields"][] = "namadosen";
$tdatadokumen[".addFields"][] = "namadoc";
$tdatadokumen[".addFields"][] = "deskripsi";
$tdatadokumen[".addFields"][] = "tanggal";

$tdatadokumen[".masterListFields"] = array();
$tdatadokumen[".masterListFields"][] = "ID";
$tdatadokumen[".masterListFields"][] = "namadosen";
$tdatadokumen[".masterListFields"][] = "namadoc";
$tdatadokumen[".masterListFields"][] = "deskripsi";
$tdatadokumen[".masterListFields"][] = "tanggal";

$tdatadokumen[".inlineAddFields"] = array();
$tdatadokumen[".inlineAddFields"][] = "namadosen";
$tdatadokumen[".inlineAddFields"][] = "namadoc";
$tdatadokumen[".inlineAddFields"][] = "deskripsi";

$tdatadokumen[".editFields"] = array();

$tdatadokumen[".inlineEditFields"] = array();
$tdatadokumen[".inlineEditFields"][] = "namadosen";
$tdatadokumen[".inlineEditFields"][] = "namadoc";
$tdatadokumen[".inlineEditFields"][] = "deskripsi";

$tdatadokumen[".updateSelectedFields"] = array();


$tdatadokumen[".exportFields"] = array();
$tdatadokumen[".exportFields"][] = "namadosen";
$tdatadokumen[".exportFields"][] = "namadoc";
$tdatadokumen[".exportFields"][] = "deskripsi";
$tdatadokumen[".exportFields"][] = "tanggal";

$tdatadokumen[".importFields"] = array();
$tdatadokumen[".importFields"][] = "namadoc";
$tdatadokumen[".importFields"][] = "deskripsi";
$tdatadokumen[".importFields"][] = "tanggal";
$tdatadokumen[".importFields"][] = "namadosen";

$tdatadokumen[".printFields"] = array();
$tdatadokumen[".printFields"][] = "namadosen";
$tdatadokumen[".printFields"][] = "namadoc";
$tdatadokumen[".printFields"][] = "deskripsi";
$tdatadokumen[".printFields"][] = "tanggal";


//	ID
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "ID";
	$fdata["GoodName"] = "ID";
	$fdata["ownerTable"] = "dokumen";
	$fdata["Label"] = GetFieldLabel("dokumen","ID");
	$fdata["FieldType"] = 3;

	
		$fdata["AutoInc"] = true;

	
			
	
	
	
	
	
	

	
	
	
	
		$fdata["strField"] = "ID";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "ID";

	
	
			
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








	$tdatadokumen["ID"] = $fdata;
//	namadoc
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "namadoc";
	$fdata["GoodName"] = "namadoc";
	$fdata["ownerTable"] = "dokumen";
	$fdata["Label"] = GetFieldLabel("dokumen","namadoc");
	$fdata["FieldType"] = 200;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

		$fdata["bInlineAdd"] = true;

	
		$fdata["bInlineEdit"] = true;

	

		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "namadoc";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "namadoc";

		$fdata["DeleteAssociatedFile"] = true;

	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "Document Download");

	
	
	
						$vdata["ShowFileSize"] = true;
			$vdata["ShowIcon"] = true;
		
	
	
	
	
	
	
	
	
	
		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Document upload");

	
	
		
	


	
	
	
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
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatadokumen["namadoc"] = $fdata;
//	deskripsi
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "deskripsi";
	$fdata["GoodName"] = "deskripsi";
	$fdata["ownerTable"] = "dokumen";
	$fdata["Label"] = GetFieldLabel("dokumen","deskripsi");
	$fdata["FieldType"] = 200;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

		$fdata["bInlineAdd"] = true;

	
		$fdata["bInlineEdit"] = true;

	

		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "deskripsi";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "deskripsi";

	
	
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




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatadokumen["deskripsi"] = $fdata;
//	tanggal
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "tanggal";
	$fdata["GoodName"] = "tanggal";
	$fdata["ownerTable"] = "dokumen";
	$fdata["Label"] = GetFieldLabel("dokumen","tanggal");
	$fdata["FieldType"] = 135;

	
	
	
			
	
		$fdata["bAddPage"] = true;

	
	
	
	

		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "tanggal";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "tanggal";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "Datetime");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Readonly");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
	
	
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
		$edata["autoUpdatable"] = true;

	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Equals";

			// the default search options list
				$fdata["searchOptionsList"] = array("Equals", "More than", "Less than", "Between", EMPTY_SEARCH, NOT_EMPTY );
// the end of search options settings




	$tdatadokumen["tanggal"] = $fdata;
//	namadosen
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "namadosen";
	$fdata["GoodName"] = "namadosen";
	$fdata["ownerTable"] = "dokumen";
	$fdata["Label"] = GetFieldLabel("dokumen","namadosen");
	$fdata["FieldType"] = 200;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

		$fdata["bInlineAdd"] = true;

	
		$fdata["bInlineEdit"] = true;

	

		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "namadosen";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "namadosen";

	
	
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
	$edata["LookupTable"] = "tb_user";
		$edata["autoCompleteFieldsOnEdit"] = 0;
	$edata["autoCompleteFields"] = array();
		$edata["LCType"] = 1;

	
		
	$edata["LinkField"] = "nama";
	$edata["LinkFieldType"] = 0;
	$edata["DisplayField"] = "nama";
	
	

	
	$edata["LookupOrderBy"] = "";

	
	
	
	

	
	
	
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




	$tdatadokumen["namadosen"] = $fdata;


$tables_data["dokumen"]=&$tdatadokumen;
$field_labels["dokumen"] = &$fieldLabelsdokumen;
$fieldToolTips["dokumen"] = &$fieldToolTipsdokumen;
$placeHolders["dokumen"] = &$placeHoldersdokumen;
$page_titles["dokumen"] = &$pageTitlesdokumen;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["dokumen"] = array();

// tables which are master tables for current table (detail)
$masterTablesData["dokumen"] = array();


// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_dokumen()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "ID,  	namadoc,  	deskripsi,  	tanggal,  	namadosen";
$proto0["m_strFrom"] = "FROM dokumen";
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
	"m_strName" => "ID",
	"m_strTable" => "dokumen",
	"m_srcTableName" => "dokumen"
));

$proto6["m_sql"] = "ID";
$proto6["m_srcTableName"] = "dokumen";
$proto6["m_expr"]=$obj;
$proto6["m_alias"] = "";
$obj = new SQLFieldListItem($proto6);

$proto0["m_fieldlist"][]=$obj;
						$proto8=array();
			$obj = new SQLField(array(
	"m_strName" => "namadoc",
	"m_strTable" => "dokumen",
	"m_srcTableName" => "dokumen"
));

$proto8["m_sql"] = "namadoc";
$proto8["m_srcTableName"] = "dokumen";
$proto8["m_expr"]=$obj;
$proto8["m_alias"] = "";
$obj = new SQLFieldListItem($proto8);

$proto0["m_fieldlist"][]=$obj;
						$proto10=array();
			$obj = new SQLField(array(
	"m_strName" => "deskripsi",
	"m_strTable" => "dokumen",
	"m_srcTableName" => "dokumen"
));

$proto10["m_sql"] = "deskripsi";
$proto10["m_srcTableName"] = "dokumen";
$proto10["m_expr"]=$obj;
$proto10["m_alias"] = "";
$obj = new SQLFieldListItem($proto10);

$proto0["m_fieldlist"][]=$obj;
						$proto12=array();
			$obj = new SQLField(array(
	"m_strName" => "tanggal",
	"m_strTable" => "dokumen",
	"m_srcTableName" => "dokumen"
));

$proto12["m_sql"] = "tanggal";
$proto12["m_srcTableName"] = "dokumen";
$proto12["m_expr"]=$obj;
$proto12["m_alias"] = "";
$obj = new SQLFieldListItem($proto12);

$proto0["m_fieldlist"][]=$obj;
						$proto14=array();
			$obj = new SQLField(array(
	"m_strName" => "namadosen",
	"m_strTable" => "dokumen",
	"m_srcTableName" => "dokumen"
));

$proto14["m_sql"] = "namadosen";
$proto14["m_srcTableName"] = "dokumen";
$proto14["m_expr"]=$obj;
$proto14["m_alias"] = "";
$obj = new SQLFieldListItem($proto14);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto16=array();
$proto16["m_link"] = "SQLL_MAIN";
			$proto17=array();
$proto17["m_strName"] = "dokumen";
$proto17["m_srcTableName"] = "dokumen";
$proto17["m_columns"] = array();
$proto17["m_columns"][] = "ID";
$proto17["m_columns"][] = "namadoc";
$proto17["m_columns"][] = "deskripsi";
$proto17["m_columns"][] = "tanggal";
$proto17["m_columns"][] = "namadosen";
$obj = new SQLTable($proto17);

$proto16["m_table"] = $obj;
$proto16["m_sql"] = "dokumen";
$proto16["m_alias"] = "";
$proto16["m_srcTableName"] = "dokumen";
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
$proto0["m_srcTableName"]="dokumen";		
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_dokumen = createSqlQuery_dokumen();


	
				;

					

$tdatadokumen[".sqlquery"] = $queryData_dokumen;

include_once(getabspath("include/dokumen_events.php"));
$tableEvents["dokumen"] = new eventclass_dokumen;
$tdatadokumen[".hasEvents"] = true;

?>