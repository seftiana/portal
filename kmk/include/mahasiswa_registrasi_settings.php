<?php
require_once(getabspath("classes/cipherer.php"));




$tdatamahasiswa_registrasi = array();
	$tdatamahasiswa_registrasi[".truncateText"] = true;
	$tdatamahasiswa_registrasi[".NumberOfChars"] = 80;
	$tdatamahasiswa_registrasi[".ShortName"] = "mahasiswa_registrasi";
	$tdatamahasiswa_registrasi[".OwnerID"] = "";
	$tdatamahasiswa_registrasi[".OriginalTable"] = "mahasiswa_registrasi";

//	field labels
$fieldLabelsmahasiswa_registrasi = array();
$fieldToolTipsmahasiswa_registrasi = array();
$pageTitlesmahasiswa_registrasi = array();
$placeHoldersmahasiswa_registrasi = array();

if(mlang_getcurrentlang()=="English")
{
	$fieldLabelsmahasiswa_registrasi["English"] = array();
	$fieldToolTipsmahasiswa_registrasi["English"] = array();
	$placeHoldersmahasiswa_registrasi["English"] = array();
	$pageTitlesmahasiswa_registrasi["English"] = array();
	$fieldLabelsmahasiswa_registrasi["English"]["mhsregSemId"] = "SEMESTER ID";
	$fieldToolTipsmahasiswa_registrasi["English"]["mhsregSemId"] = "";
	$placeHoldersmahasiswa_registrasi["English"]["mhsregSemId"] = "";
	$fieldLabelsmahasiswa_registrasi["English"]["mhsregTotalBayar"] = "TOTAL BAYAR";
	$fieldToolTipsmahasiswa_registrasi["English"]["mhsregTotalBayar"] = "";
	$placeHoldersmahasiswa_registrasi["English"]["mhsregTotalBayar"] = "";
	$fieldLabelsmahasiswa_registrasi["English"]["mhsregTanggalRegistrasi"] = "TANGGAL";
	$fieldToolTipsmahasiswa_registrasi["English"]["mhsregTanggalRegistrasi"] = "";
	$placeHoldersmahasiswa_registrasi["English"]["mhsregTanggalRegistrasi"] = "";
	$fieldLabelsmahasiswa_registrasi["English"]["mhsregKuitansiId"] = "KUWITANSI ID";
	$fieldToolTipsmahasiswa_registrasi["English"]["mhsregKuitansiId"] = "";
	$placeHoldersmahasiswa_registrasi["English"]["mhsregKuitansiId"] = "";
	if (count($fieldToolTipsmahasiswa_registrasi["English"]))
		$tdatamahasiswa_registrasi[".isUseToolTips"] = true;
}
if(mlang_getcurrentlang()=="")
{
	$fieldLabelsmahasiswa_registrasi[""] = array();
	$fieldToolTipsmahasiswa_registrasi[""] = array();
	$placeHoldersmahasiswa_registrasi[""] = array();
	$pageTitlesmahasiswa_registrasi[""] = array();
	if (count($fieldToolTipsmahasiswa_registrasi[""]))
		$tdatamahasiswa_registrasi[".isUseToolTips"] = true;
}


	$tdatamahasiswa_registrasi[".NCSearch"] = true;



$tdatamahasiswa_registrasi[".shortTableName"] = "mahasiswa_registrasi";
$tdatamahasiswa_registrasi[".nSecOptions"] = 0;
$tdatamahasiswa_registrasi[".recsPerRowPrint"] = 1;
$tdatamahasiswa_registrasi[".mainTableOwnerID"] = "";
$tdatamahasiswa_registrasi[".moveNext"] = 1;
$tdatamahasiswa_registrasi[".entityType"] = 0;

$tdatamahasiswa_registrasi[".strOriginalTableName"] = "mahasiswa_registrasi";

	



$tdatamahasiswa_registrasi[".showAddInPopup"] = false;

$tdatamahasiswa_registrasi[".showEditInPopup"] = false;

$tdatamahasiswa_registrasi[".showViewInPopup"] = false;

//page's base css files names
$popupPagesLayoutNames = array();
$tdatamahasiswa_registrasi[".popupPagesLayoutNames"] = $popupPagesLayoutNames;


$tdatamahasiswa_registrasi[".fieldsForRegister"] = array();

$tdatamahasiswa_registrasi[".listAjax"] = false;

	$tdatamahasiswa_registrasi[".audit"] = false;

	$tdatamahasiswa_registrasi[".locking"] = false;



$tdatamahasiswa_registrasi[".list"] = true;

$tdatamahasiswa_registrasi[".inlineEdit"] = true;


$tdatamahasiswa_registrasi[".reorderRecordsByHeader"] = true;


$tdatamahasiswa_registrasi[".exportFormatting"] = 2;
$tdatamahasiswa_registrasi[".exportDelimiter"] = ",";
		
$tdatamahasiswa_registrasi[".inlineAdd"] = true;


$tdatamahasiswa_registrasi[".exportTo"] = true;

$tdatamahasiswa_registrasi[".printFriendly"] = true;

$tdatamahasiswa_registrasi[".delete"] = true;

$tdatamahasiswa_registrasi[".showSimpleSearchOptions"] = false;

// Allow Show/Hide Fields in GRID
$tdatamahasiswa_registrasi[".allowShowHideFields"] = false;
//

// Allow Fields Reordering in GRID
$tdatamahasiswa_registrasi[".allowFieldsReordering"] = false;
//

// search Saving settings
$tdatamahasiswa_registrasi[".searchSaving"] = false;
//

$tdatamahasiswa_registrasi[".showSearchPanel"] = true;
		$tdatamahasiswa_registrasi[".flexibleSearch"] = true;

$tdatamahasiswa_registrasi[".isUseAjaxSuggest"] = true;

$tdatamahasiswa_registrasi[".rowHighlite"] = true;





$tdatamahasiswa_registrasi[".ajaxCodeSnippetAdded"] = false;

$tdatamahasiswa_registrasi[".buttonsAdded"] = false;

$tdatamahasiswa_registrasi[".addPageEvents"] = false;

// use timepicker for search panel
$tdatamahasiswa_registrasi[".isUseTimeForSearch"] = false;



$tdatamahasiswa_registrasi[".badgeColor"] = "e8926f";


$tdatamahasiswa_registrasi[".allSearchFields"] = array();
$tdatamahasiswa_registrasi[".filterFields"] = array();
$tdatamahasiswa_registrasi[".requiredSearchFields"] = array();

$tdatamahasiswa_registrasi[".allSearchFields"][] = "mhsregSemId";
	$tdatamahasiswa_registrasi[".allSearchFields"][] = "mhsregTotalBayar";
	$tdatamahasiswa_registrasi[".allSearchFields"][] = "mhsregTanggalRegistrasi";
	$tdatamahasiswa_registrasi[".allSearchFields"][] = "mhsregKuitansiId";
	

$tdatamahasiswa_registrasi[".googleLikeFields"] = array();
$tdatamahasiswa_registrasi[".googleLikeFields"][] = "mhsregSemId";
$tdatamahasiswa_registrasi[".googleLikeFields"][] = "mhsregTotalBayar";
$tdatamahasiswa_registrasi[".googleLikeFields"][] = "mhsregTanggalRegistrasi";
$tdatamahasiswa_registrasi[".googleLikeFields"][] = "mhsregKuitansiId";


$tdatamahasiswa_registrasi[".advSearchFields"] = array();
$tdatamahasiswa_registrasi[".advSearchFields"][] = "mhsregSemId";
$tdatamahasiswa_registrasi[".advSearchFields"][] = "mhsregTotalBayar";
$tdatamahasiswa_registrasi[".advSearchFields"][] = "mhsregTanggalRegistrasi";
$tdatamahasiswa_registrasi[".advSearchFields"][] = "mhsregKuitansiId";

$tdatamahasiswa_registrasi[".tableType"] = "list";

$tdatamahasiswa_registrasi[".printerPageOrientation"] = 0;
$tdatamahasiswa_registrasi[".nPrinterPageScale"] = 100;

$tdatamahasiswa_registrasi[".nPrinterSplitRecords"] = 40;

$tdatamahasiswa_registrasi[".nPrinterPDFSplitRecords"] = 40;



$tdatamahasiswa_registrasi[".geocodingEnabled"] = false;





$tdatamahasiswa_registrasi[".listGridLayout"] = 3;





// view page pdf

// print page pdf


$tdatamahasiswa_registrasi[".pageSize"] = 20;

$tdatamahasiswa_registrasi[".warnLeavingPages"] = true;



$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatamahasiswa_registrasi[".strOrderBy"] = $tstrOrderBy;

$tdatamahasiswa_registrasi[".orderindexes"] = array();

$tdatamahasiswa_registrasi[".sqlHead"] = "SELECT mhsregSemId,  mhsregTotalBayar,  mhsregTanggalRegistrasi,  mhsregKuitansiId";
$tdatamahasiswa_registrasi[".sqlFrom"] = "FROM mahasiswa_registrasi";
$tdatamahasiswa_registrasi[".sqlWhereExpr"] = "";
$tdatamahasiswa_registrasi[".sqlTail"] = "";












//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatamahasiswa_registrasi[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatamahasiswa_registrasi[".arrGroupsPerPage"] = $arrGPP;

$tdatamahasiswa_registrasi[".highlightSearchResults"] = true;

$tableKeysmahasiswa_registrasi = array();
$tableKeysmahasiswa_registrasi[] = "mhsregSemId";
$tdatamahasiswa_registrasi[".Keys"] = $tableKeysmahasiswa_registrasi;

$tdatamahasiswa_registrasi[".listFields"] = array();
$tdatamahasiswa_registrasi[".listFields"][] = "mhsregSemId";
$tdatamahasiswa_registrasi[".listFields"][] = "mhsregTotalBayar";
$tdatamahasiswa_registrasi[".listFields"][] = "mhsregTanggalRegistrasi";
$tdatamahasiswa_registrasi[".listFields"][] = "mhsregKuitansiId";

$tdatamahasiswa_registrasi[".hideMobileList"] = array();


$tdatamahasiswa_registrasi[".viewFields"] = array();

$tdatamahasiswa_registrasi[".addFields"] = array();

$tdatamahasiswa_registrasi[".masterListFields"] = array();
$tdatamahasiswa_registrasi[".masterListFields"][] = "mhsregSemId";
$tdatamahasiswa_registrasi[".masterListFields"][] = "mhsregTotalBayar";
$tdatamahasiswa_registrasi[".masterListFields"][] = "mhsregTanggalRegistrasi";
$tdatamahasiswa_registrasi[".masterListFields"][] = "mhsregKuitansiId";

$tdatamahasiswa_registrasi[".inlineAddFields"] = array();
$tdatamahasiswa_registrasi[".inlineAddFields"][] = "mhsregSemId";
$tdatamahasiswa_registrasi[".inlineAddFields"][] = "mhsregTotalBayar";
$tdatamahasiswa_registrasi[".inlineAddFields"][] = "mhsregTanggalRegistrasi";
$tdatamahasiswa_registrasi[".inlineAddFields"][] = "mhsregKuitansiId";

$tdatamahasiswa_registrasi[".editFields"] = array();

$tdatamahasiswa_registrasi[".inlineEditFields"] = array();
$tdatamahasiswa_registrasi[".inlineEditFields"][] = "mhsregSemId";
$tdatamahasiswa_registrasi[".inlineEditFields"][] = "mhsregTotalBayar";
$tdatamahasiswa_registrasi[".inlineEditFields"][] = "mhsregTanggalRegistrasi";
$tdatamahasiswa_registrasi[".inlineEditFields"][] = "mhsregKuitansiId";

$tdatamahasiswa_registrasi[".updateSelectedFields"] = array();


$tdatamahasiswa_registrasi[".exportFields"] = array();
$tdatamahasiswa_registrasi[".exportFields"][] = "mhsregSemId";
$tdatamahasiswa_registrasi[".exportFields"][] = "mhsregTotalBayar";
$tdatamahasiswa_registrasi[".exportFields"][] = "mhsregTanggalRegistrasi";
$tdatamahasiswa_registrasi[".exportFields"][] = "mhsregKuitansiId";

$tdatamahasiswa_registrasi[".importFields"] = array();

$tdatamahasiswa_registrasi[".printFields"] = array();
$tdatamahasiswa_registrasi[".printFields"][] = "mhsregSemId";
$tdatamahasiswa_registrasi[".printFields"][] = "mhsregTotalBayar";
$tdatamahasiswa_registrasi[".printFields"][] = "mhsregTanggalRegistrasi";
$tdatamahasiswa_registrasi[".printFields"][] = "mhsregKuitansiId";


//	mhsregSemId
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "mhsregSemId";
	$fdata["GoodName"] = "mhsregSemId";
	$fdata["ownerTable"] = "mahasiswa_registrasi";
	$fdata["Label"] = GetFieldLabel("mahasiswa_registrasi","mhsregSemId");
	$fdata["FieldType"] = 20;

	
	
	
			
		$fdata["bListPage"] = true;

	
		$fdata["bInlineAdd"] = true;

	
		$fdata["bInlineEdit"] = true;

	

	
		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsregSemId";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsregSemId";

	
	
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




	$tdatamahasiswa_registrasi["mhsregSemId"] = $fdata;
//	mhsregTotalBayar
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "mhsregTotalBayar";
	$fdata["GoodName"] = "mhsregTotalBayar";
	$fdata["ownerTable"] = "mahasiswa_registrasi";
	$fdata["Label"] = GetFieldLabel("mahasiswa_registrasi","mhsregTotalBayar");
	$fdata["FieldType"] = 14;

	
	
	
			
		$fdata["bListPage"] = true;

	
		$fdata["bInlineAdd"] = true;

	
		$fdata["bInlineEdit"] = true;

	

	
		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsregTotalBayar";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsregTotalBayar";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "Number");

	
	
	
	
	
	
		$vdata["DecimalDigits"] = 2;

	
	
	
	
	
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
				$edata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");
							
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa_registrasi["mhsregTotalBayar"] = $fdata;
//	mhsregTanggalRegistrasi
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "mhsregTanggalRegistrasi";
	$fdata["GoodName"] = "mhsregTanggalRegistrasi";
	$fdata["ownerTable"] = "mahasiswa_registrasi";
	$fdata["Label"] = GetFieldLabel("mahasiswa_registrasi","mhsregTanggalRegistrasi");
	$fdata["FieldType"] = 135;

	
	
	
			
		$fdata["bListPage"] = true;

	
		$fdata["bInlineAdd"] = true;

	
		$fdata["bInlineEdit"] = true;

	

	
		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsregTanggalRegistrasi";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsregTanggalRegistrasi";

	
	
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
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Equals";

			// the default search options list
				$fdata["searchOptionsList"] = array("Equals", "More than", "Less than", "Between", EMPTY_SEARCH, NOT_EMPTY );
// the end of search options settings




	$tdatamahasiswa_registrasi["mhsregTanggalRegistrasi"] = $fdata;
//	mhsregKuitansiId
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "mhsregKuitansiId";
	$fdata["GoodName"] = "mhsregKuitansiId";
	$fdata["ownerTable"] = "mahasiswa_registrasi";
	$fdata["Label"] = GetFieldLabel("mahasiswa_registrasi","mhsregKuitansiId");
	$fdata["FieldType"] = 20;

	
	
	
			
		$fdata["bListPage"] = true;

	
		$fdata["bInlineAdd"] = true;

	
		$fdata["bInlineEdit"] = true;

	

	
		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsregKuitansiId";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsregKuitansiId";

	
	
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

	$edata = array("EditFormat" => "Readonly");

	
	
		
	


	
	
	
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




	$tdatamahasiswa_registrasi["mhsregKuitansiId"] = $fdata;


$tables_data["mahasiswa_registrasi"]=&$tdatamahasiswa_registrasi;
$field_labels["mahasiswa_registrasi"] = &$fieldLabelsmahasiswa_registrasi;
$fieldToolTips["mahasiswa_registrasi"] = &$fieldToolTipsmahasiswa_registrasi;
$placeHolders["mahasiswa_registrasi"] = &$placeHoldersmahasiswa_registrasi;
$page_titles["mahasiswa_registrasi"] = &$pageTitlesmahasiswa_registrasi;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["mahasiswa_registrasi"] = array();

// tables which are master tables for current table (detail)
$masterTablesData["mahasiswa_registrasi"] = array();


	
				$strOriginalDetailsTable="mahasiswa";
	$masterParams = array();
	$masterParams["mDataSourceTable"]="mahasiswa";
	$masterParams["mOriginalTable"]= $strOriginalDetailsTable;
	$masterParams["mShortTable"]= "mahasiswa";
	$masterParams["masterKeys"]= array();
	$masterParams["detailKeys"]= array();
	
		$masterParams["dispChildCount"]= "1";
	$masterParams["hideChild"]= "0";
	$masterParams["dispMasterInfo"] = array();
			$masterParams["dispMasterInfo"][PAGE_ADD] = true;
			$masterParams["dispMasterInfo"][PAGE_LIST] = true;
			$masterParams["dispMasterInfo"][PAGE_PRINT] = true;
			$masterParams["dispMasterInfo"][PAGE_EDIT] = true;
			$masterParams["dispMasterInfo"][PAGE_VIEW] = true;

	$masterParams["previewOnList"]= 1;
	$masterParams["previewOnAdd"]= 1;
	$masterParams["previewOnEdit"]= 1;
	$masterParams["previewOnView"]= 1;
	$masterParams["proceedLink"]= 1;

	$masterParams["type"] = PAGE_LIST;
					$masterTablesData["mahasiswa_registrasi"][0] = $masterParams;
				$masterTablesData["mahasiswa_registrasi"][0]["masterKeys"] = array();
	$masterTablesData["mahasiswa_registrasi"][0]["masterKeys"][]="mhsNiu";
				$masterTablesData["mahasiswa_registrasi"][0]["detailKeys"] = array();
	$masterTablesData["mahasiswa_registrasi"][0]["detailKeys"][]="mhsregMhsNiu";
		
// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_mahasiswa_registrasi()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "mhsregSemId,  mhsregTotalBayar,  mhsregTanggalRegistrasi,  mhsregKuitansiId";
$proto0["m_strFrom"] = "FROM mahasiswa_registrasi";
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
	"m_strName" => "mhsregSemId",
	"m_strTable" => "mahasiswa_registrasi",
	"m_srcTableName" => "mahasiswa_registrasi"
));

$proto6["m_sql"] = "mhsregSemId";
$proto6["m_srcTableName"] = "mahasiswa_registrasi";
$proto6["m_expr"]=$obj;
$proto6["m_alias"] = "";
$obj = new SQLFieldListItem($proto6);

$proto0["m_fieldlist"][]=$obj;
						$proto8=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsregTotalBayar",
	"m_strTable" => "mahasiswa_registrasi",
	"m_srcTableName" => "mahasiswa_registrasi"
));

$proto8["m_sql"] = "mhsregTotalBayar";
$proto8["m_srcTableName"] = "mahasiswa_registrasi";
$proto8["m_expr"]=$obj;
$proto8["m_alias"] = "";
$obj = new SQLFieldListItem($proto8);

$proto0["m_fieldlist"][]=$obj;
						$proto10=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsregTanggalRegistrasi",
	"m_strTable" => "mahasiswa_registrasi",
	"m_srcTableName" => "mahasiswa_registrasi"
));

$proto10["m_sql"] = "mhsregTanggalRegistrasi";
$proto10["m_srcTableName"] = "mahasiswa_registrasi";
$proto10["m_expr"]=$obj;
$proto10["m_alias"] = "";
$obj = new SQLFieldListItem($proto10);

$proto0["m_fieldlist"][]=$obj;
						$proto12=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsregKuitansiId",
	"m_strTable" => "mahasiswa_registrasi",
	"m_srcTableName" => "mahasiswa_registrasi"
));

$proto12["m_sql"] = "mhsregKuitansiId";
$proto12["m_srcTableName"] = "mahasiswa_registrasi";
$proto12["m_expr"]=$obj;
$proto12["m_alias"] = "";
$obj = new SQLFieldListItem($proto12);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto14=array();
$proto14["m_link"] = "SQLL_MAIN";
			$proto15=array();
$proto15["m_strName"] = "mahasiswa_registrasi";
$proto15["m_srcTableName"] = "mahasiswa_registrasi";
$proto15["m_columns"] = array();
$proto15["m_columns"][] = "mhsregMhsNiu";
$proto15["m_columns"][] = "mhsregSemId";
$proto15["m_columns"][] = "mhsregSksTeori";
$proto15["m_columns"][] = "mhsregTotalBayar";
$proto15["m_columns"][] = "mhsregTanggalRegistrasi";
$proto15["m_columns"][] = "mhsregSksPraktikum";
$proto15["m_columns"][] = "mhsregKuitansiId";
$obj = new SQLTable($proto15);

$proto14["m_table"] = $obj;
$proto14["m_sql"] = "mahasiswa_registrasi";
$proto14["m_alias"] = "";
$proto14["m_srcTableName"] = "mahasiswa_registrasi";
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
$proto0["m_srcTableName"]="mahasiswa_registrasi";		
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_mahasiswa_registrasi = createSqlQuery_mahasiswa_registrasi();


	
				;

				

$tdatamahasiswa_registrasi[".sqlquery"] = $queryData_mahasiswa_registrasi;

include_once(getabspath("include/mahasiswa_registrasi_events.php"));
$tableEvents["mahasiswa_registrasi"] = new eventclass_mahasiswa_registrasi;
$tdatamahasiswa_registrasi[".hasEvents"] = true;

?>