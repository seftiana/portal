<?php
require_once(getabspath("classes/cipherer.php"));




$tdatamahasiswa = array();
	$tdatamahasiswa[".truncateText"] = true;
	$tdatamahasiswa[".NumberOfChars"] = 80;
	$tdatamahasiswa[".ShortName"] = "mahasiswa";
	$tdatamahasiswa[".OwnerID"] = "";
	$tdatamahasiswa[".OriginalTable"] = "mahasiswa";

//	field labels
$fieldLabelsmahasiswa = array();
$fieldToolTipsmahasiswa = array();
$pageTitlesmahasiswa = array();
$placeHoldersmahasiswa = array();

if(mlang_getcurrentlang()=="English")
{
	$fieldLabelsmahasiswa["English"] = array();
	$fieldToolTipsmahasiswa["English"] = array();
	$placeHoldersmahasiswa["English"] = array();
	$pageTitlesmahasiswa["English"] = array();
	$fieldLabelsmahasiswa["English"]["mhsNama"] = "Mhs Nama";
	$fieldToolTipsmahasiswa["English"]["mhsNama"] = "";
	$placeHoldersmahasiswa["English"]["mhsNama"] = "";
	$fieldLabelsmahasiswa["English"]["prodiNamaResmi"] = "Prodi Nama Resmi";
	$fieldToolTipsmahasiswa["English"]["prodiNamaResmi"] = "";
	$placeHoldersmahasiswa["English"]["prodiNamaResmi"] = "";
	$fieldLabelsmahasiswa["English"]["mhsStatusMasukPt"] = "Mhs Status Masuk Pt";
	$fieldToolTipsmahasiswa["English"]["mhsStatusMasukPt"] = "";
	$placeHoldersmahasiswa["English"]["mhsStatusMasukPt"] = "";
	$fieldLabelsmahasiswa["English"]["mhsNiu"] = "Mhs Niu";
	$fieldToolTipsmahasiswa["English"]["mhsNiu"] = "";
	$placeHoldersmahasiswa["English"]["mhsNiu"] = "";
	$fieldLabelsmahasiswa["English"]["mhsStakmhsrKode"] = "Status MHS";
	$fieldToolTipsmahasiswa["English"]["mhsStakmhsrKode"] = "";
	$placeHoldersmahasiswa["English"]["mhsStakmhsrKode"] = "";
	if (count($fieldToolTipsmahasiswa["English"]))
		$tdatamahasiswa[".isUseToolTips"] = true;
}
if(mlang_getcurrentlang()=="")
{
	$fieldLabelsmahasiswa[""] = array();
	$fieldToolTipsmahasiswa[""] = array();
	$placeHoldersmahasiswa[""] = array();
	$pageTitlesmahasiswa[""] = array();
	$fieldLabelsmahasiswa[""]["prodiNamaResmi"] = "Prodi Nama Resmi";
	$fieldToolTipsmahasiswa[""]["prodiNamaResmi"] = "";
	$placeHoldersmahasiswa[""]["prodiNamaResmi"] = "";
	$fieldLabelsmahasiswa[""]["mhsStatusMasukPt"] = "Mhs Status Masuk Pt";
	$fieldToolTipsmahasiswa[""]["mhsStatusMasukPt"] = "";
	$placeHoldersmahasiswa[""]["mhsStatusMasukPt"] = "";
	$fieldLabelsmahasiswa[""]["mhsNiu"] = "Mhs Niu";
	$fieldToolTipsmahasiswa[""]["mhsNiu"] = "";
	$placeHoldersmahasiswa[""]["mhsNiu"] = "";
	$fieldLabelsmahasiswa[""]["mhsStakmhsrKode"] = "Mhs Stakmhsr Kode";
	$fieldToolTipsmahasiswa[""]["mhsStakmhsrKode"] = "";
	$placeHoldersmahasiswa[""]["mhsStakmhsrKode"] = "";
	if (count($fieldToolTipsmahasiswa[""]))
		$tdatamahasiswa[".isUseToolTips"] = true;
}


	$tdatamahasiswa[".NCSearch"] = true;



$tdatamahasiswa[".shortTableName"] = "mahasiswa";
$tdatamahasiswa[".nSecOptions"] = 0;
$tdatamahasiswa[".recsPerRowPrint"] = 1;
$tdatamahasiswa[".mainTableOwnerID"] = "";
$tdatamahasiswa[".moveNext"] = 1;
$tdatamahasiswa[".entityType"] = 0;

$tdatamahasiswa[".strOriginalTableName"] = "mahasiswa";

	



$tdatamahasiswa[".showAddInPopup"] = false;

$tdatamahasiswa[".showEditInPopup"] = false;

$tdatamahasiswa[".showViewInPopup"] = false;

//page's base css files names
$popupPagesLayoutNames = array();
$tdatamahasiswa[".popupPagesLayoutNames"] = $popupPagesLayoutNames;


$tdatamahasiswa[".fieldsForRegister"] = array();

$tdatamahasiswa[".listAjax"] = false;

	$tdatamahasiswa[".audit"] = false;

	$tdatamahasiswa[".locking"] = false;



$tdatamahasiswa[".list"] = true;

$tdatamahasiswa[".inlineEdit"] = true;


$tdatamahasiswa[".reorderRecordsByHeader"] = true;


$tdatamahasiswa[".exportFormatting"] = 2;
$tdatamahasiswa[".exportDelimiter"] = ",";
		


$tdatamahasiswa[".exportTo"] = true;

$tdatamahasiswa[".printFriendly"] = true;


$tdatamahasiswa[".showSimpleSearchOptions"] = false;

// Allow Show/Hide Fields in GRID
$tdatamahasiswa[".allowShowHideFields"] = false;
//

// Allow Fields Reordering in GRID
$tdatamahasiswa[".allowFieldsReordering"] = false;
//

// search Saving settings
$tdatamahasiswa[".searchSaving"] = false;
//

$tdatamahasiswa[".showSearchPanel"] = true;
		$tdatamahasiswa[".flexibleSearch"] = true;

$tdatamahasiswa[".isUseAjaxSuggest"] = true;

$tdatamahasiswa[".rowHighlite"] = true;





$tdatamahasiswa[".ajaxCodeSnippetAdded"] = false;

$tdatamahasiswa[".buttonsAdded"] = false;

$tdatamahasiswa[".addPageEvents"] = false;

// use timepicker for search panel
$tdatamahasiswa[".isUseTimeForSearch"] = false;



$tdatamahasiswa[".badgeColor"] = "7B68EE";

$tdatamahasiswa[".detailsLinksOnList"] = "1";

$tdatamahasiswa[".allSearchFields"] = array();
$tdatamahasiswa[".filterFields"] = array();
$tdatamahasiswa[".requiredSearchFields"] = array();

$tdatamahasiswa[".allSearchFields"][] = "mhsNiu";
	$tdatamahasiswa[".allSearchFields"][] = "mhsNama";
	$tdatamahasiswa[".allSearchFields"][] = "mhsStakmhsrKode";
	$tdatamahasiswa[".allSearchFields"][] = "prodiNamaResmi";
	$tdatamahasiswa[".allSearchFields"][] = "mhsStatusMasukPt";
	

$tdatamahasiswa[".googleLikeFields"] = array();
$tdatamahasiswa[".googleLikeFields"][] = "mhsNiu";
$tdatamahasiswa[".googleLikeFields"][] = "mhsNama";
$tdatamahasiswa[".googleLikeFields"][] = "prodiNamaResmi";
$tdatamahasiswa[".googleLikeFields"][] = "mhsStatusMasukPt";
$tdatamahasiswa[".googleLikeFields"][] = "mhsStakmhsrKode";


$tdatamahasiswa[".advSearchFields"] = array();
$tdatamahasiswa[".advSearchFields"][] = "mhsNiu";
$tdatamahasiswa[".advSearchFields"][] = "mhsNama";
$tdatamahasiswa[".advSearchFields"][] = "mhsStakmhsrKode";
$tdatamahasiswa[".advSearchFields"][] = "prodiNamaResmi";
$tdatamahasiswa[".advSearchFields"][] = "mhsStatusMasukPt";

$tdatamahasiswa[".tableType"] = "list";

$tdatamahasiswa[".printerPageOrientation"] = 0;
$tdatamahasiswa[".nPrinterPageScale"] = 100;

$tdatamahasiswa[".nPrinterSplitRecords"] = 40;

$tdatamahasiswa[".nPrinterPDFSplitRecords"] = 40;



$tdatamahasiswa[".geocodingEnabled"] = false;





$tdatamahasiswa[".listGridLayout"] = 3;





// view page pdf

// print page pdf


$tdatamahasiswa[".pageSize"] = 20;

$tdatamahasiswa[".warnLeavingPages"] = true;



$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatamahasiswa[".strOrderBy"] = $tstrOrderBy;

$tdatamahasiswa[".orderindexes"] = array();

$tdatamahasiswa[".sqlHead"] = "SELECT mahasiswa.mhsNiu,  mahasiswa.mhsNama,  program_studi.prodiNamaResmi,  mahasiswa.mhsStatusMasukPt,  mahasiswa.mhsStakmhsrKode";
$tdatamahasiswa[".sqlFrom"] = "FROM mahasiswa  INNER JOIN program_studi ON mahasiswa.mhsProdiKode = program_studi.prodiKode";
$tdatamahasiswa[".sqlWhereExpr"] = "";
$tdatamahasiswa[".sqlTail"] = "";












//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatamahasiswa[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatamahasiswa[".arrGroupsPerPage"] = $arrGPP;

$tdatamahasiswa[".highlightSearchResults"] = true;

$tableKeysmahasiswa = array();
$tableKeysmahasiswa[] = "mhsNiu";
$tdatamahasiswa[".Keys"] = $tableKeysmahasiswa;

$tdatamahasiswa[".listFields"] = array();
$tdatamahasiswa[".listFields"][] = "mhsNiu";
$tdatamahasiswa[".listFields"][] = "mhsNama";
$tdatamahasiswa[".listFields"][] = "mhsStakmhsrKode";
$tdatamahasiswa[".listFields"][] = "prodiNamaResmi";
$tdatamahasiswa[".listFields"][] = "mhsStatusMasukPt";

$tdatamahasiswa[".hideMobileList"] = array();


$tdatamahasiswa[".viewFields"] = array();

$tdatamahasiswa[".addFields"] = array();

$tdatamahasiswa[".masterListFields"] = array();
$tdatamahasiswa[".masterListFields"][] = "mhsNiu";
$tdatamahasiswa[".masterListFields"][] = "mhsNama";
$tdatamahasiswa[".masterListFields"][] = "mhsStakmhsrKode";
$tdatamahasiswa[".masterListFields"][] = "prodiNamaResmi";
$tdatamahasiswa[".masterListFields"][] = "mhsStatusMasukPt";

$tdatamahasiswa[".inlineAddFields"] = array();

$tdatamahasiswa[".editFields"] = array();

$tdatamahasiswa[".inlineEditFields"] = array();
$tdatamahasiswa[".inlineEditFields"][] = "mhsStakmhsrKode";

$tdatamahasiswa[".updateSelectedFields"] = array();


$tdatamahasiswa[".exportFields"] = array();
$tdatamahasiswa[".exportFields"][] = "mhsNiu";
$tdatamahasiswa[".exportFields"][] = "mhsNama";
$tdatamahasiswa[".exportFields"][] = "mhsStakmhsrKode";
$tdatamahasiswa[".exportFields"][] = "prodiNamaResmi";
$tdatamahasiswa[".exportFields"][] = "mhsStatusMasukPt";

$tdatamahasiswa[".importFields"] = array();

$tdatamahasiswa[".printFields"] = array();
$tdatamahasiswa[".printFields"][] = "mhsNiu";
$tdatamahasiswa[".printFields"][] = "mhsNama";
$tdatamahasiswa[".printFields"][] = "mhsStakmhsrKode";
$tdatamahasiswa[".printFields"][] = "prodiNamaResmi";
$tdatamahasiswa[".printFields"][] = "mhsStatusMasukPt";


//	mhsNiu
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "mhsNiu";
	$fdata["GoodName"] = "mhsNiu";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsNiu");
	$fdata["FieldType"] = 200;

	
	
	
			
		$fdata["bListPage"] = true;

	
	
	
	
	

	
		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsNiu";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mahasiswa.mhsNiu";

	
	
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
			$edata["EditParams"].= " maxlength=20";

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




	$tdatamahasiswa["mhsNiu"] = $fdata;
//	mhsNama
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "mhsNama";
	$fdata["GoodName"] = "mhsNama";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsNama");
	$fdata["FieldType"] = 200;

	
	
	
			
		$fdata["bListPage"] = true;

	
	
	
	
	

	
		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsNama";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mahasiswa.mhsNama";

	
	
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




	$tdatamahasiswa["mhsNama"] = $fdata;
//	prodiNamaResmi
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "prodiNamaResmi";
	$fdata["GoodName"] = "prodiNamaResmi";
	$fdata["ownerTable"] = "program_studi";
	$fdata["Label"] = GetFieldLabel("mahasiswa","prodiNamaResmi");
	$fdata["FieldType"] = 200;

	
	
	
			
		$fdata["bListPage"] = true;

	
	
	
	
	

	
		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "prodiNamaResmi";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "program_studi.prodiNamaResmi";

	
	
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




	$tdatamahasiswa["prodiNamaResmi"] = $fdata;
//	mhsStatusMasukPt
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "mhsStatusMasukPt";
	$fdata["GoodName"] = "mhsStatusMasukPt";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsStatusMasukPt");
	$fdata["FieldType"] = 129;

	
	
	
			
		$fdata["bListPage"] = true;

	
	
	
	
	

	
		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsStatusMasukPt";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mahasiswa.mhsStatusMasukPt";

	
	
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
		$fdata["defaultSearchOption"] = "Equals";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsStatusMasukPt"] = $fdata;
//	mhsStakmhsrKode
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "mhsStakmhsrKode";
	$fdata["GoodName"] = "mhsStakmhsrKode";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsStakmhsrKode");
	$fdata["FieldType"] = 200;

	
	
	
			
		$fdata["bListPage"] = true;

	
	
	
		$fdata["bInlineEdit"] = true;

	

	
		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsStakmhsrKode";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mahasiswa.mhsStakmhsrKode";

	
	
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
	$edata["LookupTable"] = "status_aktif_mahasiswa_ref";
		$edata["autoCompleteFieldsOnEdit"] = 0;
	$edata["autoCompleteFields"] = array();
		$edata["LCType"] = 0;

	
		
	$edata["LinkField"] = "stakmhsrKode";
	$edata["LinkFieldType"] = 200;
	$edata["DisplayField"] = "stakmhsrNama";
	
	

	
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




	$tdatamahasiswa["mhsStakmhsrKode"] = $fdata;


$tables_data["mahasiswa"]=&$tdatamahasiswa;
$field_labels["mahasiswa"] = &$fieldLabelsmahasiswa;
$fieldToolTips["mahasiswa"] = &$fieldToolTipsmahasiswa;
$placeHolders["mahasiswa"] = &$placeHoldersmahasiswa;
$page_titles["mahasiswa"] = &$pageTitlesmahasiswa;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["mahasiswa"] = array();
//	mahasiswa_registrasi
	
	

		$dIndex = 0;
	$detailsParam = array();
	$detailsParam["dDataSourceTable"]="mahasiswa_registrasi";
		$detailsParam["dOriginalTable"] = "mahasiswa_registrasi";
		$detailsParam["proceedLink"] = true;
				$detailsParam["dType"]=PAGE_LIST;
	$detailsParam["dShortTable"] = "mahasiswa_registrasi";
	$detailsParam["dCaptionTable"] = GetTableCaption("mahasiswa_registrasi");
	$detailsParam["masterKeys"] =array();
	$detailsParam["detailKeys"] =array();

	$detailsParam["dispChildCount"] = "1";

		$detailsParam["hideChild"] = false;
						$detailsParam["previewOnList"] = "1";
		$detailsParam["previewOnAdd"] = 1;
		$detailsParam["previewOnEdit"] = 1;
		$detailsParam["previewOnView"] = 1;
		
	$detailsTablesData["mahasiswa"][$dIndex] = $detailsParam;

	
		$detailsTablesData["mahasiswa"][$dIndex]["masterKeys"] = array();

	$detailsTablesData["mahasiswa"][$dIndex]["masterKeys"][]="mhsNiu";

				$detailsTablesData["mahasiswa"][$dIndex]["detailKeys"] = array();

	$detailsTablesData["mahasiswa"][$dIndex]["detailKeys"][]="mhsregMhsNiu";

// tables which are master tables for current table (detail)
$masterTablesData["mahasiswa"] = array();


// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_mahasiswa()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "mahasiswa.mhsNiu,  mahasiswa.mhsNama,  program_studi.prodiNamaResmi,  mahasiswa.mhsStatusMasukPt,  mahasiswa.mhsStakmhsrKode";
$proto0["m_strFrom"] = "FROM mahasiswa  INNER JOIN program_studi ON mahasiswa.mhsProdiKode = program_studi.prodiKode";
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
	"m_strName" => "mhsNiu",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto6["m_sql"] = "mahasiswa.mhsNiu";
$proto6["m_srcTableName"] = "mahasiswa";
$proto6["m_expr"]=$obj;
$proto6["m_alias"] = "";
$obj = new SQLFieldListItem($proto6);

$proto0["m_fieldlist"][]=$obj;
						$proto8=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsNama",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto8["m_sql"] = "mahasiswa.mhsNama";
$proto8["m_srcTableName"] = "mahasiswa";
$proto8["m_expr"]=$obj;
$proto8["m_alias"] = "";
$obj = new SQLFieldListItem($proto8);

$proto0["m_fieldlist"][]=$obj;
						$proto10=array();
			$obj = new SQLField(array(
	"m_strName" => "prodiNamaResmi",
	"m_strTable" => "program_studi",
	"m_srcTableName" => "mahasiswa"
));

$proto10["m_sql"] = "program_studi.prodiNamaResmi";
$proto10["m_srcTableName"] = "mahasiswa";
$proto10["m_expr"]=$obj;
$proto10["m_alias"] = "";
$obj = new SQLFieldListItem($proto10);

$proto0["m_fieldlist"][]=$obj;
						$proto12=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsStatusMasukPt",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto12["m_sql"] = "mahasiswa.mhsStatusMasukPt";
$proto12["m_srcTableName"] = "mahasiswa";
$proto12["m_expr"]=$obj;
$proto12["m_alias"] = "";
$obj = new SQLFieldListItem($proto12);

$proto0["m_fieldlist"][]=$obj;
						$proto14=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsStakmhsrKode",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto14["m_sql"] = "mahasiswa.mhsStakmhsrKode";
$proto14["m_srcTableName"] = "mahasiswa";
$proto14["m_expr"]=$obj;
$proto14["m_alias"] = "";
$obj = new SQLFieldListItem($proto14);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto16=array();
$proto16["m_link"] = "SQLL_MAIN";
			$proto17=array();
$proto17["m_strName"] = "mahasiswa";
$proto17["m_srcTableName"] = "mahasiswa";
$proto17["m_columns"] = array();
$proto17["m_columns"][] = "mhsNiu";
$proto17["m_columns"][] = "mhsNif";
$proto17["m_columns"][] = "mhsNama";
$proto17["m_columns"][] = "mhsAngkatan";
$proto17["m_columns"][] = "mhsSemesterMasuk";
$proto17["m_columns"][] = "mhsPasswordRegistrasi";
$proto17["m_columns"][] = "mhsKurId";
$proto17["m_columns"][] = "mhsProdiKode";
$proto17["m_columns"][] = "mhsProdiKodeUniv";
$proto17["m_columns"][] = "mhsProdikonsentrasiId";
$proto17["m_columns"][] = "mhsWktkulId";
$proto17["m_columns"][] = "mhsNomorTes";
$proto17["m_columns"][] = "mhsTanggalTerdaftar";
$proto17["m_columns"][] = "mhsStatusMasukPt";
$proto17["m_columns"][] = "mhsIsAsing";
$proto17["m_columns"][] = "mhsJumlahSksPindahan";
$proto17["m_columns"][] = "mhsKodePtPindahan";
$proto17["m_columns"][] = "mhsKodeProdiDiktiPindahan";
$proto17["m_columns"][] = "mhsNamaPtPindahan";
$proto17["m_columns"][] = "mhsJjarKodeDiktiPindahan";
$proto17["m_columns"][] = "mhsTahunMasukPtPindahan";
$proto17["m_columns"][] = "mhsNimLama";
$proto17["m_columns"][] = "mhsJenisKelamin";
$proto17["m_columns"][] = "mhsKotaKodeLahir";
$proto17["m_columns"][] = "mhsTanggalLahir";
$proto17["m_columns"][] = "mhsAgmrId";
$proto17["m_columns"][] = "mhsSmtaKode";
$proto17["m_columns"][] = "mhsTdftSmta";
$proto17["m_columns"][] = "mhsTahunTamatSmta";
$proto17["m_columns"][] = "mhsTahunLulusSmta";
$proto17["m_columns"][] = "mhsJursmtarKode";
$proto17["m_columns"][] = "mhsAlamatSmta";
$proto17["m_columns"][] = "mhsNoIjasahSmta";
$proto17["m_columns"][] = "mhsIjasahSmta";
$proto17["m_columns"][] = "mhsTanggalIjasahSmta";
$proto17["m_columns"][] = "mhsNilaiUjianAkhirSmta";
$proto17["m_columns"][] = "mhsJumlahMpUjianAkhirSmta";
$proto17["m_columns"][] = "mhsStnkrId";
$proto17["m_columns"][] = "mhsJumlahSaudara";
$proto17["m_columns"][] = "mhsAlamatMhs";
$proto17["m_columns"][] = "mhsAlamatTerakhir";
$proto17["m_columns"][] = "mhsAlamatDiKotaIni";
$proto17["m_columns"][] = "mhsKotaKode";
$proto17["m_columns"][] = "mhsNgrKode";
$proto17["m_columns"][] = "mhsKodePos";
$proto17["m_columns"][] = "mhsStatrumahId";
$proto17["m_columns"][] = "mhsSbdnrId";
$proto17["m_columns"][] = "mhsHubbiayaId";
$proto17["m_columns"][] = "mhsTempatKerja";
$proto17["m_columns"][] = "mhsAlamatTempatKerja";
$proto17["m_columns"][] = "mhsNoTelpTempatKerja";
$proto17["m_columns"][] = "mhsBeasiswa";
$proto17["m_columns"][] = "mhsWnrId";
$proto17["m_columns"][] = "mhsJlrrKode";
$proto17["m_columns"][] = "mhsNoAskes";
$proto17["m_columns"][] = "mhsNoTelp";
$proto17["m_columns"][] = "mhsNoHp";
$proto17["m_columns"][] = "mhsEmail";
$proto17["m_columns"][] = "mhsHomepage";
$proto17["m_columns"][] = "mhsFoto";
$proto17["m_columns"][] = "mhsStakmhsrKode";
$proto17["m_columns"][] = "mhsDsnPegNipPembimbingAkademik";
$proto17["m_columns"][] = "mhsSksWajib";
$proto17["m_columns"][] = "mhsSksPilihan";
$proto17["m_columns"][] = "mhsSksA";
$proto17["m_columns"][] = "mhsSksB";
$proto17["m_columns"][] = "mhsSksC";
$proto17["m_columns"][] = "mhsSksD";
$proto17["m_columns"][] = "mhsSksE";
$proto17["m_columns"][] = "mhsSksTranskrip";
$proto17["m_columns"][] = "mhsBobotTotalTranskrip";
$proto17["m_columns"][] = "mhsIpkTranskrip";
$proto17["m_columns"][] = "mhsLamaStudiSemester";
$proto17["m_columns"][] = "mhsLamaStudiBulan";
$proto17["m_columns"][] = "mhsIsTranskripAkhirDiarsipkan";
$proto17["m_columns"][] = "mhsTanggalTranskrip";
$proto17["m_columns"][] = "mhsNomorTranskrip";
$proto17["m_columns"][] = "mhsTempatLahirTranskrip";
$proto17["m_columns"][] = "mhsTanggalLahirTranskrip";
$proto17["m_columns"][] = "mhsMetodeBuildTranskrip";
$proto17["m_columns"][] = "mhsMetodePenyetaraanTranskrip";
$proto17["m_columns"][] = "mhsTahunKurikulumPenyetaraanTranskrip";
$proto17["m_columns"][] = "mhsTanggalLulus";
$proto17["m_columns"][] = "mhsNoSuratYudisium";
$proto17["m_columns"][] = "mhsTanggalSuratYudisium";
$proto17["m_columns"][] = "mhsSemIdLulus";
$proto17["m_columns"][] = "mhsTanggalIjasah";
$proto17["m_columns"][] = "mhsNoIjasah";
$proto17["m_columns"][] = "mhsKodeIjasah";
$proto17["m_columns"][] = "mhsPinIjasah";
$proto17["m_columns"][] = "mhsPrlsrId";
$proto17["m_columns"][] = "mhsPrlsrNama";
$proto17["m_columns"][] = "mhsPrlsrNamaAsing";
$proto17["m_columns"][] = "mhsWsdId";
$proto17["m_columns"][] = "mhsTanggalPengubahan";
$proto17["m_columns"][] = "mhsUnitPengubah";
$proto17["m_columns"][] = "mhsUserPengubah";
$proto17["m_columns"][] = "mhsProdiGelarKelulusan";
$proto17["m_columns"][] = "mhsSemIdMulai";
$proto17["m_columns"][] = "mhsBiayaStudi";
$proto17["m_columns"][] = "mhsPekerjaan";
$proto17["m_columns"][] = "mhsPTKerja";
$proto17["m_columns"][] = "mhsPSKerja";
$proto17["m_columns"][] = "mhsNIDNPromotor";
$proto17["m_columns"][] = "mhsKoPromotor1";
$proto17["m_columns"][] = "mhsKoPromotor2";
$proto17["m_columns"][] = "mhsKoPromotor3";
$proto17["m_columns"][] = "mhsKoPromotor4";
$proto17["m_columns"][] = "mhsProdiAsal";
$proto17["m_columns"][] = "mhsDiktiShift";
$proto17["m_columns"][] = "mhsPembayaranIpp";
$proto17["m_columns"][] = "mshNoIpp";
$proto17["m_columns"][] = "mhsPersyaratan";
$proto17["m_columns"][] = "mhsPengOrg";
$proto17["m_columns"][] = "mhsOrg";
$proto17["m_columns"][] = "mhsDomisili";
$proto17["m_columns"][] = "mhsJenisSttb";
$proto17["m_columns"][] = "mhsIsKerja";
$proto17["m_columns"][] = "mhsStatusSmta";
$proto17["m_columns"][] = "mhsAkreditasi";
$proto17["m_columns"][] = "mhsKerja";
$proto17["m_columns"][] = "mhsSaudaraLk";
$proto17["m_columns"][] = "mhsSaudaraPr";
$proto17["m_columns"][] = "mhsHobi";
$proto17["m_columns"][] = "mhsSmtaLain";
$proto17["m_columns"][] = "mhsAkreditasiSmta";
$proto17["m_columns"][] = "mhsBiayaKuliah";
$proto17["m_columns"][] = "MhsIdJenisSmta";
$proto17["m_columns"][] = "mhsSmtaPropinsiKode";
$proto17["m_columns"][] = "mhsEmailOld";
$proto17["m_columns"][] = "mhsNoKtp";
$proto17["m_columns"][] = "mhsNoKk";
$obj = new SQLTable($proto17);

$proto16["m_table"] = $obj;
$proto16["m_sql"] = "mahasiswa";
$proto16["m_alias"] = "";
$proto16["m_srcTableName"] = "mahasiswa";
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
												$proto20=array();
$proto20["m_link"] = "SQLL_INNERJOIN";
			$proto21=array();
$proto21["m_strName"] = "program_studi";
$proto21["m_srcTableName"] = "mahasiswa";
$proto21["m_columns"] = array();
$proto21["m_columns"][] = "prodiKode";
$proto21["m_columns"][] = "prodiKodeUm";
$proto21["m_columns"][] = "prodiKodeUniv";
$proto21["m_columns"][] = "prodiLabelNim";
$proto21["m_columns"][] = "prodiJurKode";
$proto21["m_columns"][] = "prodiFakKode";
$proto21["m_columns"][] = "prodiNamaResmi";
$proto21["m_columns"][] = "prodiNamaSingkat";
$proto21["m_columns"][] = "prodiNamaAsing";
$proto21["m_columns"][] = "prodiNamaAsingSingkat";
$proto21["m_columns"][] = "prodiIsEksakta";
$proto21["m_columns"][] = "prodiNamaJenjang";
$proto21["m_columns"][] = "prodiJjarKode";
$proto21["m_columns"][] = "prodiModelrId";
$proto21["m_columns"][] = "prodiSksLulus";
$proto21["m_columns"][] = "prodiAlamat";
$proto21["m_columns"][] = "prodiTelp";
$proto21["m_columns"][] = "prodiFax";
$proto21["m_columns"][] = "prodiEmail";
$proto21["m_columns"][] = "prodiWebsite";
$proto21["m_columns"][] = "prodiKontakPerson";
$proto21["m_columns"][] = "prodiNomorSkDikti";
$proto21["m_columns"][] = "prodiTanggalSkDikti";
$proto21["m_columns"][] = "prodiTanggalBerakhirSkDikti";
$proto21["m_columns"][] = "prodiProdidiktiKode";
$proto21["m_columns"][] = "prodiTanggalBerdiri";
$proto21["m_columns"][] = "prodiStprodidikrId";
$proto21["m_columns"][] = "prodiSahrKode";
$proto21["m_columns"][] = "prodiSemIdStatusDihapus";
$proto21["m_columns"][] = "prodiFpkrKode";
$proto21["m_columns"][] = "prodiPpkrKode";
$proto21["m_columns"][] = "prodiKetuaProdiNidn";
$proto21["m_columns"][] = "prodiKetuaProdiNama";
$proto21["m_columns"][] = "prodiKetuaProdiNoHp";
$proto21["m_columns"][] = "prodiOperatorNama";
$proto21["m_columns"][] = "prodiOperatorNoHp";
$proto21["m_columns"][] = "prodiIsDalamSatuanAdministrasi";
$proto21["m_columns"][] = "prodiGelarKelulusan";
$proto21["m_columns"][] = "prodiNamaGelarKelulusan";
$proto21["m_columns"][] = "prodiGelarAsingKelulusan";
$proto21["m_columns"][] = "prodiNamaGelarAsingKelulusan";
$obj = new SQLTable($proto21);

$proto20["m_table"] = $obj;
$proto20["m_sql"] = "INNER JOIN program_studi ON mahasiswa.mhsProdiKode = program_studi.prodiKode";
$proto20["m_alias"] = "";
$proto20["m_srcTableName"] = "mahasiswa";
$proto22=array();
$proto22["m_sql"] = "mahasiswa.mhsProdiKode = program_studi.prodiKode";
$proto22["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "mhsProdiKode",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto22["m_column"]=$obj;
$proto22["m_contained"] = array();
$proto22["m_strCase"] = "= program_studi.prodiKode";
$proto22["m_havingmode"] = false;
$proto22["m_inBrackets"] = false;
$proto22["m_useAlias"] = false;
$obj = new SQLLogicalExpr($proto22);

$proto20["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto20);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
$proto0["m_srcTableName"]="mahasiswa";		
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_mahasiswa = createSqlQuery_mahasiswa();


	
				;

					

$tdatamahasiswa[".sqlquery"] = $queryData_mahasiswa;

$tableEvents["mahasiswa"] = new eventsBase;
$tdatamahasiswa[".hasEvents"] = false;

?>