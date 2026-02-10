<?php
require_once(getabspath("classes/cipherer.php"));




$tdatas_kelas = array();
	$tdatas_kelas[".truncateText"] = true;
	$tdatas_kelas[".NumberOfChars"] = 80;
	$tdatas_kelas[".ShortName"] = "s_kelas";
	$tdatas_kelas[".OwnerID"] = "";
	$tdatas_kelas[".OriginalTable"] = "s_kelas";

//	field labels
$fieldLabelss_kelas = array();
$fieldToolTipss_kelas = array();
$pageTitless_kelas = array();
$placeHolderss_kelas = array();

if(mlang_getcurrentlang()=="English")
{
	$fieldLabelss_kelas["English"] = array();
	$fieldToolTipss_kelas["English"] = array();
	$placeHolderss_kelas["English"] = array();
	$pageTitless_kelas["English"] = array();
	$fieldLabelss_kelas["English"]["klsId"] = "klsId";
	$fieldToolTipss_kelas["English"]["klsId"] = "";
	$placeHolderss_kelas["English"]["klsId"] = "";
	$fieldLabelss_kelas["English"]["klsSemId"] = "klsSemId";
	$fieldToolTipss_kelas["English"]["klsSemId"] = "";
	$placeHolderss_kelas["English"]["klsSemId"] = "";
	$fieldLabelss_kelas["English"]["klsNama"] = "klsNama";
	$fieldToolTipss_kelas["English"]["klsNama"] = "";
	$placeHolderss_kelas["English"]["klsNama"] = "";
	$fieldLabelss_kelas["English"]["mkkurKode"] = "mkkurKode";
	$fieldToolTipss_kelas["English"]["mkkurKode"] = "";
	$placeHolderss_kelas["English"]["mkkurKode"] = "";
	$fieldLabelss_kelas["English"]["mkkurNamaResmi"] = "mkkurNamaResmi";
	$fieldToolTipss_kelas["English"]["mkkurNamaResmi"] = "";
	$placeHolderss_kelas["English"]["mkkurNamaResmi"] = "";
	$fieldLabelss_kelas["English"]["prodiJjarKode"] = "prodiJjarKode";
	$fieldToolTipss_kelas["English"]["prodiJjarKode"] = "";
	$placeHolderss_kelas["English"]["prodiJjarKode"] = "";
	$fieldLabelss_kelas["English"]["prodiNamaResmi"] = "prodiNamaResmi";
	$fieldToolTipss_kelas["English"]["prodiNamaResmi"] = "";
	$placeHolderss_kelas["English"]["prodiNamaResmi"] = "";
	$fieldLabelss_kelas["English"]["dosen_2"] = "dosen2";
	$fieldToolTipss_kelas["English"]["dosen_2"] = "";
	$placeHolderss_kelas["English"]["dosen_2"] = "";
	$fieldLabelss_kelas["English"]["dosen_all"] = "dosen_all";
	$fieldToolTipss_kelas["English"]["dosen_all"] = "";
	$placeHolderss_kelas["English"]["dosen_all"] = "";
	$fieldLabelss_kelas["English"]["dsnkDsnPegNip"] = "dosen1";
	$fieldToolTipss_kelas["English"]["dsnkDsnPegNip"] = "";
	$placeHolderss_kelas["English"]["dsnkDsnPegNip"] = "";
	if (count($fieldToolTipss_kelas["English"]))
		$tdatas_kelas[".isUseToolTips"] = true;
}
if(mlang_getcurrentlang()=="")
{
	$fieldLabelss_kelas[""] = array();
	$fieldToolTipss_kelas[""] = array();
	$placeHolderss_kelas[""] = array();
	$pageTitless_kelas[""] = array();
	$fieldLabelss_kelas[""]["mkkurKode"] = "Mkkur Kode";
	$fieldToolTipss_kelas[""]["mkkurKode"] = "";
	$placeHolderss_kelas[""]["mkkurKode"] = "";
	$fieldLabelss_kelas[""]["mkkurNamaResmi"] = "Mkkur Nama Resmi";
	$fieldToolTipss_kelas[""]["mkkurNamaResmi"] = "";
	$placeHolderss_kelas[""]["mkkurNamaResmi"] = "";
	$fieldLabelss_kelas[""]["prodiJjarKode"] = "Prodi Jjar Kode";
	$fieldToolTipss_kelas[""]["prodiJjarKode"] = "";
	$placeHolderss_kelas[""]["prodiJjarKode"] = "";
	$fieldLabelss_kelas[""]["prodiNamaResmi"] = "Prodi Nama Resmi";
	$fieldToolTipss_kelas[""]["prodiNamaResmi"] = "";
	$placeHolderss_kelas[""]["prodiNamaResmi"] = "";
	$fieldLabelss_kelas[""]["dosen_2"] = "Dosen 2";
	$fieldToolTipss_kelas[""]["dosen_2"] = "";
	$placeHolderss_kelas[""]["dosen_2"] = "";
	$fieldLabelss_kelas[""]["dosen_all"] = "Dosen All";
	$fieldToolTipss_kelas[""]["dosen_all"] = "";
	$placeHolderss_kelas[""]["dosen_all"] = "";
	$fieldLabelss_kelas[""]["dsnkDsnPegNip"] = "Dsnk Dsn Peg Nip";
	$fieldToolTipss_kelas[""]["dsnkDsnPegNip"] = "";
	$placeHolderss_kelas[""]["dsnkDsnPegNip"] = "";
	if (count($fieldToolTipss_kelas[""]))
		$tdatas_kelas[".isUseToolTips"] = true;
}


	$tdatas_kelas[".NCSearch"] = true;



$tdatas_kelas[".shortTableName"] = "s_kelas";
$tdatas_kelas[".nSecOptions"] = 0;
$tdatas_kelas[".recsPerRowPrint"] = 1;
$tdatas_kelas[".mainTableOwnerID"] = "";
$tdatas_kelas[".moveNext"] = 1;
$tdatas_kelas[".entityType"] = 0;

$tdatas_kelas[".strOriginalTableName"] = "s_kelas";

	



$tdatas_kelas[".showAddInPopup"] = false;

$tdatas_kelas[".showEditInPopup"] = false;

$tdatas_kelas[".showViewInPopup"] = false;

//page's base css files names
$popupPagesLayoutNames = array();
$tdatas_kelas[".popupPagesLayoutNames"] = $popupPagesLayoutNames;


$tdatas_kelas[".fieldsForRegister"] = array();

$tdatas_kelas[".listAjax"] = false;

	$tdatas_kelas[".audit"] = false;

	$tdatas_kelas[".locking"] = false;



$tdatas_kelas[".list"] = true;



$tdatas_kelas[".reorderRecordsByHeader"] = true;


$tdatas_kelas[".exportFormatting"] = 2;
$tdatas_kelas[".exportDelimiter"] = ",";
		


$tdatas_kelas[".exportTo"] = true;

$tdatas_kelas[".printFriendly"] = true;


$tdatas_kelas[".showSimpleSearchOptions"] = false;

// Allow Show/Hide Fields in GRID
$tdatas_kelas[".allowShowHideFields"] = false;
//

// Allow Fields Reordering in GRID
$tdatas_kelas[".allowFieldsReordering"] = false;
//

// search Saving settings
$tdatas_kelas[".searchSaving"] = false;
//

$tdatas_kelas[".showSearchPanel"] = true;
		$tdatas_kelas[".flexibleSearch"] = true;

$tdatas_kelas[".isUseAjaxSuggest"] = true;

$tdatas_kelas[".rowHighlite"] = true;





$tdatas_kelas[".ajaxCodeSnippetAdded"] = false;

$tdatas_kelas[".buttonsAdded"] = false;

$tdatas_kelas[".addPageEvents"] = false;

// use timepicker for search panel
$tdatas_kelas[".isUseTimeForSearch"] = false;



$tdatas_kelas[".badgeColor"] = "E67349";

$tdatas_kelas[".detailsLinksOnList"] = "2";

$tdatas_kelas[".allSearchFields"] = array();
$tdatas_kelas[".filterFields"] = array();
$tdatas_kelas[".requiredSearchFields"] = array();

$tdatas_kelas[".allSearchFields"][] = "klsId";
	$tdatas_kelas[".allSearchFields"][] = "klsSemId";
	$tdatas_kelas[".allSearchFields"][] = "mkkurKode";
	$tdatas_kelas[".allSearchFields"][] = "mkkurNamaResmi";
	$tdatas_kelas[".allSearchFields"][] = "klsNama";
	$tdatas_kelas[".allSearchFields"][] = "prodiJjarKode";
	$tdatas_kelas[".allSearchFields"][] = "prodiNamaResmi";
	$tdatas_kelas[".allSearchFields"][] = "dsnkDsnPegNip";
	$tdatas_kelas[".allSearchFields"][] = "dosen_2";
	$tdatas_kelas[".allSearchFields"][] = "dosen_all";
	
$tdatas_kelas[".filterFields"][] = "klsSemId";
$tdatas_kelas[".filterFields"][] = "prodiNamaResmi";

$tdatas_kelas[".googleLikeFields"] = array();
$tdatas_kelas[".googleLikeFields"][] = "klsId";
$tdatas_kelas[".googleLikeFields"][] = "klsSemId";
$tdatas_kelas[".googleLikeFields"][] = "mkkurKode";
$tdatas_kelas[".googleLikeFields"][] = "mkkurNamaResmi";
$tdatas_kelas[".googleLikeFields"][] = "klsNama";
$tdatas_kelas[".googleLikeFields"][] = "prodiJjarKode";
$tdatas_kelas[".googleLikeFields"][] = "prodiNamaResmi";
$tdatas_kelas[".googleLikeFields"][] = "dsnkDsnPegNip";
$tdatas_kelas[".googleLikeFields"][] = "dosen_2";
$tdatas_kelas[".googleLikeFields"][] = "dosen_all";


$tdatas_kelas[".advSearchFields"] = array();
$tdatas_kelas[".advSearchFields"][] = "klsId";
$tdatas_kelas[".advSearchFields"][] = "klsSemId";
$tdatas_kelas[".advSearchFields"][] = "mkkurKode";
$tdatas_kelas[".advSearchFields"][] = "mkkurNamaResmi";
$tdatas_kelas[".advSearchFields"][] = "klsNama";
$tdatas_kelas[".advSearchFields"][] = "prodiJjarKode";
$tdatas_kelas[".advSearchFields"][] = "prodiNamaResmi";
$tdatas_kelas[".advSearchFields"][] = "dsnkDsnPegNip";
$tdatas_kelas[".advSearchFields"][] = "dosen_2";
$tdatas_kelas[".advSearchFields"][] = "dosen_all";

$tdatas_kelas[".tableType"] = "list";

$tdatas_kelas[".printerPageOrientation"] = 0;
$tdatas_kelas[".nPrinterPageScale"] = 100;

$tdatas_kelas[".nPrinterSplitRecords"] = 40;

$tdatas_kelas[".nPrinterPDFSplitRecords"] = 40;



$tdatas_kelas[".geocodingEnabled"] = false;





$tdatas_kelas[".listGridLayout"] = 3;





// view page pdf

// print page pdf


$tdatas_kelas[".pageSize"] = 20;

$tdatas_kelas[".warnLeavingPages"] = true;



$tstrOrderBy = "ORDER BY s_kelas.klsSemId DESC";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatas_kelas[".strOrderBy"] = $tstrOrderBy;

$tdatas_kelas[".orderindexes"] = array();
	$tdatas_kelas[".orderindexes"][] = array(2, (0 ? "ASC" : "DESC"), "s_kelas.klsSemId");


$tdatas_kelas[".sqlHead"] = "SELECT s_kelas.klsId,  s_kelas.klsSemId,  s_matakuliah_kurikulum.mkkurKode,  s_matakuliah_kurikulum.mkkurNamaResmi,  s_kelas.klsNama,  program_studi.prodiJjarKode,  program_studi.prodiNamaResmi,  s_dosen_kelas.dsnkDsnPegNip,  '\\\\N' AS dosen_2,  '\\\\N' AS dosen_all";
$tdatas_kelas[".sqlFrom"] = "FROM s_kelas  LEFT OUTER JOIN s_jadwal_kuliah ON s_kelas.klsId = s_jadwal_kuliah.jdkulKlsId  LEFT OUTER JOIN s_dosen_kelas ON s_kelas.klsId = s_dosen_kelas.dsnkKlsId  INNER JOIN s_matakuliah_kurikulum ON s_kelas.klsMkkurIdDisetarakan = s_matakuliah_kurikulum.mkkurId AND s_kelas.klsMkkurId = s_matakuliah_kurikulum.mkkurId  INNER JOIN program_studi ON s_matakuliah_kurikulum.mkkurProdiKode = program_studi.prodiKode";
$tdatas_kelas[".sqlWhereExpr"] = "s_dosen_kelas.dsnkDsnPegNip is not null";
$tdatas_kelas[".sqlTail"] = "";












//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatas_kelas[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatas_kelas[".arrGroupsPerPage"] = $arrGPP;

$tdatas_kelas[".highlightSearchResults"] = true;

$tableKeyss_kelas = array();
$tableKeyss_kelas[] = "klsId";
$tdatas_kelas[".Keys"] = $tableKeyss_kelas;

$tdatas_kelas[".listFields"] = array();
$tdatas_kelas[".listFields"][] = "klsId";
$tdatas_kelas[".listFields"][] = "klsSemId";
$tdatas_kelas[".listFields"][] = "mkkurKode";
$tdatas_kelas[".listFields"][] = "mkkurNamaResmi";
$tdatas_kelas[".listFields"][] = "klsNama";
$tdatas_kelas[".listFields"][] = "prodiJjarKode";
$tdatas_kelas[".listFields"][] = "prodiNamaResmi";
$tdatas_kelas[".listFields"][] = "dsnkDsnPegNip";
$tdatas_kelas[".listFields"][] = "dosen_2";
$tdatas_kelas[".listFields"][] = "dosen_all";

$tdatas_kelas[".hideMobileList"] = array();


$tdatas_kelas[".viewFields"] = array();

$tdatas_kelas[".addFields"] = array();

$tdatas_kelas[".masterListFields"] = array();
$tdatas_kelas[".masterListFields"][] = "klsId";
$tdatas_kelas[".masterListFields"][] = "klsSemId";
$tdatas_kelas[".masterListFields"][] = "mkkurKode";
$tdatas_kelas[".masterListFields"][] = "mkkurNamaResmi";
$tdatas_kelas[".masterListFields"][] = "klsNama";
$tdatas_kelas[".masterListFields"][] = "prodiJjarKode";
$tdatas_kelas[".masterListFields"][] = "prodiNamaResmi";
$tdatas_kelas[".masterListFields"][] = "dsnkDsnPegNip";
$tdatas_kelas[".masterListFields"][] = "dosen_2";
$tdatas_kelas[".masterListFields"][] = "dosen_all";

$tdatas_kelas[".inlineAddFields"] = array();

$tdatas_kelas[".editFields"] = array();

$tdatas_kelas[".inlineEditFields"] = array();

$tdatas_kelas[".updateSelectedFields"] = array();


$tdatas_kelas[".exportFields"] = array();
$tdatas_kelas[".exportFields"][] = "klsId";
$tdatas_kelas[".exportFields"][] = "klsSemId";
$tdatas_kelas[".exportFields"][] = "mkkurKode";
$tdatas_kelas[".exportFields"][] = "mkkurNamaResmi";
$tdatas_kelas[".exportFields"][] = "klsNama";
$tdatas_kelas[".exportFields"][] = "prodiJjarKode";
$tdatas_kelas[".exportFields"][] = "prodiNamaResmi";
$tdatas_kelas[".exportFields"][] = "dsnkDsnPegNip";
$tdatas_kelas[".exportFields"][] = "dosen_2";
$tdatas_kelas[".exportFields"][] = "dosen_all";

$tdatas_kelas[".importFields"] = array();

$tdatas_kelas[".printFields"] = array();
$tdatas_kelas[".printFields"][] = "klsId";
$tdatas_kelas[".printFields"][] = "klsSemId";
$tdatas_kelas[".printFields"][] = "mkkurKode";
$tdatas_kelas[".printFields"][] = "mkkurNamaResmi";
$tdatas_kelas[".printFields"][] = "klsNama";
$tdatas_kelas[".printFields"][] = "prodiJjarKode";
$tdatas_kelas[".printFields"][] = "prodiNamaResmi";
$tdatas_kelas[".printFields"][] = "dsnkDsnPegNip";
$tdatas_kelas[".printFields"][] = "dosen_2";
$tdatas_kelas[".printFields"][] = "dosen_all";


//	klsId
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "klsId";
	$fdata["GoodName"] = "klsId";
	$fdata["ownerTable"] = "s_kelas";
	$fdata["Label"] = GetFieldLabel("s_kelas","klsId");
	$fdata["FieldType"] = 20;

	
	
	
			
		$fdata["bListPage"] = true;

	
	
	
	
	

	
		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "klsId";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "s_kelas.klsId";

	
	
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




	$tdatas_kelas["klsId"] = $fdata;
//	klsSemId
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "klsSemId";
	$fdata["GoodName"] = "klsSemId";
	$fdata["ownerTable"] = "s_kelas";
	$fdata["Label"] = GetFieldLabel("s_kelas","klsSemId");
	$fdata["FieldType"] = 20;

	
	
	
			
		$fdata["bListPage"] = true;

	
	
	
	
	

	
		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "klsSemId";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "s_kelas.klsSemId";

	
	
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
				$edata["LookupType"] = 1;
	$edata["LookupTable"] = "s_semester1";
	$edata["LookupConnId"] = "";
		$edata["autoCompleteFieldsOnEdit"] = 0;
	$edata["autoCompleteFields"] = array();
		$edata["LCType"] = 0;

	
		
	$edata["LinkField"] = "semId";
	$edata["LinkFieldType"] = 20;
	$edata["DisplayField"] = "semId";
	
	

	
	$edata["LookupOrderBy"] = "";

	
	
	
		$edata["SimpleAdd"] = true;


	
	
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


	$tdatas_kelas["klsSemId"] = $fdata;
//	mkkurKode
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "mkkurKode";
	$fdata["GoodName"] = "mkkurKode";
	$fdata["ownerTable"] = "s_matakuliah_kurikulum";
	$fdata["Label"] = GetFieldLabel("s_kelas","mkkurKode");
	$fdata["FieldType"] = 200;

	
	
	
			
		$fdata["bListPage"] = true;

	
	
	
	
	

	
		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mkkurKode";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "s_matakuliah_kurikulum.mkkurKode";

	
	
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




	$tdatas_kelas["mkkurKode"] = $fdata;
//	mkkurNamaResmi
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "mkkurNamaResmi";
	$fdata["GoodName"] = "mkkurNamaResmi";
	$fdata["ownerTable"] = "s_matakuliah_kurikulum";
	$fdata["Label"] = GetFieldLabel("s_kelas","mkkurNamaResmi");
	$fdata["FieldType"] = 200;

	
	
	
			
		$fdata["bListPage"] = true;

	
	
	
	
	

	
		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mkkurNamaResmi";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "s_matakuliah_kurikulum.mkkurNamaResmi";

	
	
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




	$tdatas_kelas["mkkurNamaResmi"] = $fdata;
//	klsNama
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "klsNama";
	$fdata["GoodName"] = "klsNama";
	$fdata["ownerTable"] = "s_kelas";
	$fdata["Label"] = GetFieldLabel("s_kelas","klsNama");
	$fdata["FieldType"] = 200;

	
	
	
			
		$fdata["bListPage"] = true;

	
	
	
	
	

	
		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "klsNama";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "s_kelas.klsNama";

	
	
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




	$tdatas_kelas["klsNama"] = $fdata;
//	prodiJjarKode
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 6;
	$fdata["strName"] = "prodiJjarKode";
	$fdata["GoodName"] = "prodiJjarKode";
	$fdata["ownerTable"] = "program_studi";
	$fdata["Label"] = GetFieldLabel("s_kelas","prodiJjarKode");
	$fdata["FieldType"] = 200;

	
	
	
			
		$fdata["bListPage"] = true;

	
	
	
	
	

	
		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "prodiJjarKode";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "program_studi.prodiJjarKode";

	
	
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




	$tdatas_kelas["prodiJjarKode"] = $fdata;
//	prodiNamaResmi
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 7;
	$fdata["strName"] = "prodiNamaResmi";
	$fdata["GoodName"] = "prodiNamaResmi";
	$fdata["ownerTable"] = "program_studi";
	$fdata["Label"] = GetFieldLabel("s_kelas","prodiNamaResmi");
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


//Filters settings
	$fdata["filterTotals"] = 0;
		$fdata["filterMultiSelect"] = 0;
		$fdata["filterTotalFields"] = "klsId";
		$fdata["filterFormat"] = "Values list";
		$fdata["showCollapsed"] = false;

		$fdata["sortValueType"] = 0;
		$fdata["numberOfVisibleItems"] = 7;

			
	
	
//end of Filters settings


	$tdatas_kelas["prodiNamaResmi"] = $fdata;
//	dsnkDsnPegNip
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 8;
	$fdata["strName"] = "dsnkDsnPegNip";
	$fdata["GoodName"] = "dsnkDsnPegNip";
	$fdata["ownerTable"] = "s_dosen_kelas";
	$fdata["Label"] = GetFieldLabel("s_kelas","dsnkDsnPegNip");
	$fdata["FieldType"] = 200;

	
	
	
			
		$fdata["bListPage"] = true;

	
	
	
	
	

	
		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "dsnkDsnPegNip";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "s_dosen_kelas.dsnkDsnPegNip";

	
	
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




	$tdatas_kelas["dsnkDsnPegNip"] = $fdata;
//	dosen_2
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 9;
	$fdata["strName"] = "dosen_2";
	$fdata["GoodName"] = "dosen_2";
	$fdata["ownerTable"] = "";
	$fdata["Label"] = GetFieldLabel("s_kelas","dosen_2");
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




	$tdatas_kelas["dosen_2"] = $fdata;
//	dosen_all
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 10;
	$fdata["strName"] = "dosen_all";
	$fdata["GoodName"] = "dosen_all";
	$fdata["ownerTable"] = "";
	$fdata["Label"] = GetFieldLabel("s_kelas","dosen_all");
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




	$tdatas_kelas["dosen_all"] = $fdata;


$tables_data["s_kelas"]=&$tdatas_kelas;
$field_labels["s_kelas"] = &$fieldLabelss_kelas;
$fieldToolTips["s_kelas"] = &$fieldToolTipss_kelas;
$placeHolders["s_kelas"] = &$placeHolderss_kelas;
$page_titles["s_kelas"] = &$pageTitless_kelas;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["s_kelas"] = array();
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
		
	$detailsTablesData["s_kelas"][$dIndex] = $detailsParam;

	
		$detailsTablesData["s_kelas"][$dIndex]["masterKeys"] = array();

	$detailsTablesData["s_kelas"][$dIndex]["masterKeys"][]="klsId";

				$detailsTablesData["s_kelas"][$dIndex]["detailKeys"] = array();

	$detailsTablesData["s_kelas"][$dIndex]["detailKeys"][]="krsdtKlsId";

// tables which are master tables for current table (detail)
$masterTablesData["s_kelas"] = array();


// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_s_kelas()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "s_kelas.klsId,  s_kelas.klsSemId,  s_matakuliah_kurikulum.mkkurKode,  s_matakuliah_kurikulum.mkkurNamaResmi,  s_kelas.klsNama,  program_studi.prodiJjarKode,  program_studi.prodiNamaResmi,  s_dosen_kelas.dsnkDsnPegNip,  '\\\\N' AS dosen_2,  '\\\\N' AS dosen_all";
$proto0["m_strFrom"] = "FROM s_kelas  LEFT OUTER JOIN s_jadwal_kuliah ON s_kelas.klsId = s_jadwal_kuliah.jdkulKlsId  LEFT OUTER JOIN s_dosen_kelas ON s_kelas.klsId = s_dosen_kelas.dsnkKlsId  INNER JOIN s_matakuliah_kurikulum ON s_kelas.klsMkkurIdDisetarakan = s_matakuliah_kurikulum.mkkurId AND s_kelas.klsMkkurId = s_matakuliah_kurikulum.mkkurId  INNER JOIN program_studi ON s_matakuliah_kurikulum.mkkurProdiKode = program_studi.prodiKode";
$proto0["m_strWhere"] = "s_dosen_kelas.dsnkDsnPegNip is not null";
$proto0["m_strOrderBy"] = "ORDER BY s_kelas.klsSemId DESC";
	
		;
			$proto0["cipherer"] = null;
$proto2=array();
$proto2["m_sql"] = "s_dosen_kelas.dsnkDsnPegNip is not null";
$proto2["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "dsnkDsnPegNip",
	"m_strTable" => "s_dosen_kelas",
	"m_srcTableName" => "s_kelas"
));

$proto2["m_column"]=$obj;
$proto2["m_contained"] = array();
$proto2["m_strCase"] = "is not null";
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
	"m_srcTableName" => "s_kelas"
));

$proto6["m_sql"] = "s_kelas.klsId";
$proto6["m_srcTableName"] = "s_kelas";
$proto6["m_expr"]=$obj;
$proto6["m_alias"] = "";
$obj = new SQLFieldListItem($proto6);

$proto0["m_fieldlist"][]=$obj;
						$proto8=array();
			$obj = new SQLField(array(
	"m_strName" => "klsSemId",
	"m_strTable" => "s_kelas",
	"m_srcTableName" => "s_kelas"
));

$proto8["m_sql"] = "s_kelas.klsSemId";
$proto8["m_srcTableName"] = "s_kelas";
$proto8["m_expr"]=$obj;
$proto8["m_alias"] = "";
$obj = new SQLFieldListItem($proto8);

$proto0["m_fieldlist"][]=$obj;
						$proto10=array();
			$obj = new SQLField(array(
	"m_strName" => "mkkurKode",
	"m_strTable" => "s_matakuliah_kurikulum",
	"m_srcTableName" => "s_kelas"
));

$proto10["m_sql"] = "s_matakuliah_kurikulum.mkkurKode";
$proto10["m_srcTableName"] = "s_kelas";
$proto10["m_expr"]=$obj;
$proto10["m_alias"] = "";
$obj = new SQLFieldListItem($proto10);

$proto0["m_fieldlist"][]=$obj;
						$proto12=array();
			$obj = new SQLField(array(
	"m_strName" => "mkkurNamaResmi",
	"m_strTable" => "s_matakuliah_kurikulum",
	"m_srcTableName" => "s_kelas"
));

$proto12["m_sql"] = "s_matakuliah_kurikulum.mkkurNamaResmi";
$proto12["m_srcTableName"] = "s_kelas";
$proto12["m_expr"]=$obj;
$proto12["m_alias"] = "";
$obj = new SQLFieldListItem($proto12);

$proto0["m_fieldlist"][]=$obj;
						$proto14=array();
			$obj = new SQLField(array(
	"m_strName" => "klsNama",
	"m_strTable" => "s_kelas",
	"m_srcTableName" => "s_kelas"
));

$proto14["m_sql"] = "s_kelas.klsNama";
$proto14["m_srcTableName"] = "s_kelas";
$proto14["m_expr"]=$obj;
$proto14["m_alias"] = "";
$obj = new SQLFieldListItem($proto14);

$proto0["m_fieldlist"][]=$obj;
						$proto16=array();
			$obj = new SQLField(array(
	"m_strName" => "prodiJjarKode",
	"m_strTable" => "program_studi",
	"m_srcTableName" => "s_kelas"
));

$proto16["m_sql"] = "program_studi.prodiJjarKode";
$proto16["m_srcTableName"] = "s_kelas";
$proto16["m_expr"]=$obj;
$proto16["m_alias"] = "";
$obj = new SQLFieldListItem($proto16);

$proto0["m_fieldlist"][]=$obj;
						$proto18=array();
			$obj = new SQLField(array(
	"m_strName" => "prodiNamaResmi",
	"m_strTable" => "program_studi",
	"m_srcTableName" => "s_kelas"
));

$proto18["m_sql"] = "program_studi.prodiNamaResmi";
$proto18["m_srcTableName"] = "s_kelas";
$proto18["m_expr"]=$obj;
$proto18["m_alias"] = "";
$obj = new SQLFieldListItem($proto18);

$proto0["m_fieldlist"][]=$obj;
						$proto20=array();
			$obj = new SQLField(array(
	"m_strName" => "dsnkDsnPegNip",
	"m_strTable" => "s_dosen_kelas",
	"m_srcTableName" => "s_kelas"
));

$proto20["m_sql"] = "s_dosen_kelas.dsnkDsnPegNip";
$proto20["m_srcTableName"] = "s_kelas";
$proto20["m_expr"]=$obj;
$proto20["m_alias"] = "";
$obj = new SQLFieldListItem($proto20);

$proto0["m_fieldlist"][]=$obj;
						$proto22=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "'\\\\N'"
));

$proto22["m_sql"] = "'\\\\N'";
$proto22["m_srcTableName"] = "s_kelas";
$proto22["m_expr"]=$obj;
$proto22["m_alias"] = "dosen_2";
$obj = new SQLFieldListItem($proto22);

$proto0["m_fieldlist"][]=$obj;
						$proto24=array();
			$obj = new SQLNonParsed(array(
	"m_sql" => "'\\\\N'"
));

$proto24["m_sql"] = "'\\\\N'";
$proto24["m_srcTableName"] = "s_kelas";
$proto24["m_expr"]=$obj;
$proto24["m_alias"] = "dosen_all";
$obj = new SQLFieldListItem($proto24);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto26=array();
$proto26["m_link"] = "SQLL_MAIN";
			$proto27=array();
$proto27["m_strName"] = "s_kelas";
$proto27["m_srcTableName"] = "s_kelas";
$proto27["m_columns"] = array();
$proto27["m_columns"][] = "klsId";
$proto27["m_columns"][] = "klsSemId";
$proto27["m_columns"][] = "klsMkkurId";
$proto27["m_columns"][] = "klsKodeParalel";
$proto27["m_columns"][] = "klsNama";
$proto27["m_columns"][] = "klsJumlahPesertaMin";
$proto27["m_columns"][] = "klsJumlahPesertaMax";
$proto27["m_columns"][] = "klsJumlahPesertaMaxProdiAsing";
$proto27["m_columns"][] = "klsIsBatal";
$proto27["m_columns"][] = "klsCatatan";
$proto27["m_columns"][] = "klsIsPublic";
$proto27["m_columns"][] = "klsPeserta";
$proto27["m_columns"][] = "klsMkkurIdDisetarakan";
$proto27["m_columns"][] = "klsWktkulId";
$obj = new SQLTable($proto27);

$proto26["m_table"] = $obj;
$proto26["m_sql"] = "s_kelas";
$proto26["m_alias"] = "";
$proto26["m_srcTableName"] = "s_kelas";
$proto28=array();
$proto28["m_sql"] = "";
$proto28["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto28["m_column"]=$obj;
$proto28["m_contained"] = array();
$proto28["m_strCase"] = "";
$proto28["m_havingmode"] = false;
$proto28["m_inBrackets"] = false;
$proto28["m_useAlias"] = false;
$obj = new SQLLogicalExpr($proto28);

$proto26["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto26);

$proto0["m_fromlist"][]=$obj;
												$proto30=array();
$proto30["m_link"] = "SQLL_LEFTJOIN";
			$proto31=array();
$proto31["m_strName"] = "s_jadwal_kuliah";
$proto31["m_srcTableName"] = "s_kelas";
$proto31["m_columns"] = array();
$proto31["m_columns"][] = "jdkulId";
$proto31["m_columns"][] = "jdkulKlsId";
$proto31["m_columns"][] = "jdkulHari";
$proto31["m_columns"][] = "jdkulJamMulai";
$proto31["m_columns"][] = "jdkulJamSelesai";
$proto31["m_columns"][] = "jdkulJadwalSesiId";
$proto31["m_columns"][] = "jdkulRuId";
$proto31["m_columns"][] = "jdkulSksTeori";
$proto31["m_columns"][] = "jdkulSksPraktikum";
$proto31["m_columns"][] = "jdkulSksPraktikumLapangan";
$obj = new SQLTable($proto31);

$proto30["m_table"] = $obj;
$proto30["m_sql"] = "LEFT OUTER JOIN s_jadwal_kuliah ON s_kelas.klsId = s_jadwal_kuliah.jdkulKlsId";
$proto30["m_alias"] = "";
$proto30["m_srcTableName"] = "s_kelas";
$proto32=array();
$proto32["m_sql"] = "s_kelas.klsId = s_jadwal_kuliah.jdkulKlsId";
$proto32["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "klsId",
	"m_strTable" => "s_kelas",
	"m_srcTableName" => "s_kelas"
));

$proto32["m_column"]=$obj;
$proto32["m_contained"] = array();
$proto32["m_strCase"] = "= s_jadwal_kuliah.jdkulKlsId";
$proto32["m_havingmode"] = false;
$proto32["m_inBrackets"] = false;
$proto32["m_useAlias"] = false;
$obj = new SQLLogicalExpr($proto32);

$proto30["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto30);

$proto0["m_fromlist"][]=$obj;
												$proto34=array();
$proto34["m_link"] = "SQLL_LEFTJOIN";
			$proto35=array();
$proto35["m_strName"] = "s_dosen_kelas";
$proto35["m_srcTableName"] = "s_kelas";
$proto35["m_columns"] = array();
$proto35["m_columns"][] = "dsnkKlsId";
$proto35["m_columns"][] = "dsnkDsnPegNip";
$proto35["m_columns"][] = "dsnkDosenKe";
$proto35["m_columns"][] = "dsnkIsBolehInputNilaiOnline";
$obj = new SQLTable($proto35);

$proto34["m_table"] = $obj;
$proto34["m_sql"] = "LEFT OUTER JOIN s_dosen_kelas ON s_kelas.klsId = s_dosen_kelas.dsnkKlsId";
$proto34["m_alias"] = "";
$proto34["m_srcTableName"] = "s_kelas";
$proto36=array();
$proto36["m_sql"] = "s_kelas.klsId = s_dosen_kelas.dsnkKlsId";
$proto36["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "klsId",
	"m_strTable" => "s_kelas",
	"m_srcTableName" => "s_kelas"
));

$proto36["m_column"]=$obj;
$proto36["m_contained"] = array();
$proto36["m_strCase"] = "= s_dosen_kelas.dsnkKlsId";
$proto36["m_havingmode"] = false;
$proto36["m_inBrackets"] = false;
$proto36["m_useAlias"] = false;
$obj = new SQLLogicalExpr($proto36);

$proto34["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto34);

$proto0["m_fromlist"][]=$obj;
												$proto38=array();
$proto38["m_link"] = "SQLL_INNERJOIN";
			$proto39=array();
$proto39["m_strName"] = "s_matakuliah_kurikulum";
$proto39["m_srcTableName"] = "s_kelas";
$proto39["m_columns"] = array();
$proto39["m_columns"][] = "mkkurId";
$proto39["m_columns"][] = "mkkurProdiKode";
$proto39["m_columns"][] = "mkkurProdikonsentrasiId";
$proto39["m_columns"][] = "mkkurKode";
$proto39["m_columns"][] = "mkkurNamaResmi";
$proto39["m_columns"][] = "mkkurNamaAsing";
$proto39["m_columns"][] = "mkkurNamaSingkat";
$proto39["m_columns"][] = "mkkurNamaAsingSingkat";
$proto39["m_columns"][] = "mkkurKurId";
$proto39["m_columns"][] = "mkkurSemesterKurikulum";
$proto39["m_columns"][] = "mkkurJenisSemester";
$proto39["m_columns"][] = "mkkurTpmkrKode";
$proto39["m_columns"][] = "mkkurSfmkrId";
$proto39["m_columns"][] = "mkkurSfmkrKode";
$proto39["m_columns"][] = "mkkurJmkKode";
$proto39["m_columns"][] = "mkkurJkurKode";
$proto39["m_columns"][] = "mkkurStatusAktif";
$proto39["m_columns"][] = "mkkurBiId";
$proto39["m_columns"][] = "mkkurJumlahSksKurikulum";
$proto39["m_columns"][] = "mkkurJumlahSksTeori";
$proto39["m_columns"][] = "mkkurJumlahSksPraktikum";
$proto39["m_columns"][] = "mkkurJumlahSksPraktikumLapangan";
$proto39["m_columns"][] = "mkkurBobotNilaiMinimalLulus";
$proto39["m_columns"][] = "mkkurSyaratSksWajibMin";
$proto39["m_columns"][] = "mkkurSyaratSksPilihanMin";
$proto39["m_columns"][] = "mkkurSyaratSksTotal";
$proto39["m_columns"][] = "mkkurSyaratSksWajibLulusMin";
$proto39["m_columns"][] = "mkkurSyaratSksPilihanLulusMin";
$proto39["m_columns"][] = "mkkurSyaratSksTotalLulusMin";
$proto39["m_columns"][] = "mkkurSyaratIpk";
$proto39["m_columns"][] = "mkkurMaxMengulang";
$proto39["m_columns"][] = "mkkurSilabusPathFile";
$proto39["m_columns"][] = "mkkurSilabusDeskripsi";
$proto39["m_columns"][] = "mkkurIsAdaSatuanAcaraPerkuliahan";
$proto39["m_columns"][] = "mkkurIsAdaBahanAjar";
$proto39["m_columns"][] = "mkkurIsAdaDiktat";
$proto39["m_columns"][] = "mkkurIsFakultas";
$proto39["m_columns"][] = "mkkurIsAdaPetunjukPraktikum";
$proto39["m_columns"][] = "mkkurIsAdaSertifikat";
$proto39["m_columns"][] = "mkkurPegNipDosenPengampu";
$proto39["m_columns"][] = "mkkurBaris";
$proto39["m_columns"][] = "mkkurBarisEng";
$proto39["m_columns"][] = "mkkur1";
$proto39["m_columns"][] = "mkkur2";
$proto39["m_columns"][] = "mkkur3";
$proto39["m_columns"][] = "mkkur4";
$obj = new SQLTable($proto39);

$proto38["m_table"] = $obj;
$proto38["m_sql"] = "INNER JOIN s_matakuliah_kurikulum ON s_kelas.klsMkkurIdDisetarakan = s_matakuliah_kurikulum.mkkurId AND s_kelas.klsMkkurId = s_matakuliah_kurikulum.mkkurId";
$proto38["m_alias"] = "";
$proto38["m_srcTableName"] = "s_kelas";
$proto40=array();
$proto40["m_sql"] = "s_kelas.klsMkkurIdDisetarakan = s_matakuliah_kurikulum.mkkurId AND s_kelas.klsMkkurId = s_matakuliah_kurikulum.mkkurId";
$proto40["m_uniontype"] = "SQLL_AND";
	$obj = new SQLNonParsed(array(
	"m_sql" => "s_kelas.klsMkkurIdDisetarakan = s_matakuliah_kurikulum.mkkurId AND s_kelas.klsMkkurId = s_matakuliah_kurikulum.mkkurId"
));

$proto40["m_column"]=$obj;
$proto40["m_contained"] = array();
						$proto42=array();
$proto42["m_sql"] = "s_kelas.klsMkkurIdDisetarakan = s_matakuliah_kurikulum.mkkurId";
$proto42["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "klsMkkurIdDisetarakan",
	"m_strTable" => "s_kelas",
	"m_srcTableName" => "s_kelas"
));

$proto42["m_column"]=$obj;
$proto42["m_contained"] = array();
$proto42["m_strCase"] = "= s_matakuliah_kurikulum.mkkurId";
$proto42["m_havingmode"] = false;
$proto42["m_inBrackets"] = false;
$proto42["m_useAlias"] = false;
$obj = new SQLLogicalExpr($proto42);

			$proto40["m_contained"][]=$obj;
						$proto44=array();
$proto44["m_sql"] = "s_kelas.klsMkkurId = s_matakuliah_kurikulum.mkkurId";
$proto44["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "klsMkkurId",
	"m_strTable" => "s_kelas",
	"m_srcTableName" => "s_kelas"
));

$proto44["m_column"]=$obj;
$proto44["m_contained"] = array();
$proto44["m_strCase"] = "= s_matakuliah_kurikulum.mkkurId";
$proto44["m_havingmode"] = false;
$proto44["m_inBrackets"] = false;
$proto44["m_useAlias"] = false;
$obj = new SQLLogicalExpr($proto44);

			$proto40["m_contained"][]=$obj;
$proto40["m_strCase"] = "";
$proto40["m_havingmode"] = false;
$proto40["m_inBrackets"] = false;
$proto40["m_useAlias"] = false;
$obj = new SQLLogicalExpr($proto40);

$proto38["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto38);

$proto0["m_fromlist"][]=$obj;
												$proto46=array();
$proto46["m_link"] = "SQLL_INNERJOIN";
			$proto47=array();
$proto47["m_strName"] = "program_studi";
$proto47["m_srcTableName"] = "s_kelas";
$proto47["m_columns"] = array();
$proto47["m_columns"][] = "prodiKode";
$proto47["m_columns"][] = "prodiKodeUm";
$proto47["m_columns"][] = "prodiKodeUniv";
$proto47["m_columns"][] = "prodiLabelNim";
$proto47["m_columns"][] = "prodiJurKode";
$proto47["m_columns"][] = "prodiFakKode";
$proto47["m_columns"][] = "prodiNamaResmi";
$proto47["m_columns"][] = "prodiNamaSingkat";
$proto47["m_columns"][] = "prodiNamaAsing";
$proto47["m_columns"][] = "prodiNamaAsingSingkat";
$proto47["m_columns"][] = "prodiIsEksakta";
$proto47["m_columns"][] = "prodiNamaJenjang";
$proto47["m_columns"][] = "prodiJjarKode";
$proto47["m_columns"][] = "prodiModelrId";
$proto47["m_columns"][] = "prodiSksLulus";
$proto47["m_columns"][] = "prodiAlamat";
$proto47["m_columns"][] = "prodiTelp";
$proto47["m_columns"][] = "prodiFax";
$proto47["m_columns"][] = "prodiEmail";
$proto47["m_columns"][] = "prodiWebsite";
$proto47["m_columns"][] = "prodiKontakPerson";
$proto47["m_columns"][] = "prodiNomorSkDikti";
$proto47["m_columns"][] = "prodiTanggalSkDikti";
$proto47["m_columns"][] = "prodiTanggalBerakhirSkDikti";
$proto47["m_columns"][] = "prodiProdidiktiKode";
$proto47["m_columns"][] = "prodiTanggalBerdiri";
$proto47["m_columns"][] = "prodiStprodidikrId";
$proto47["m_columns"][] = "prodiSahrKode";
$proto47["m_columns"][] = "prodiSemIdStatusDihapus";
$proto47["m_columns"][] = "prodiFpkrKode";
$proto47["m_columns"][] = "prodiPpkrKode";
$proto47["m_columns"][] = "prodiKetuaProdiNidn";
$proto47["m_columns"][] = "prodiKetuaProdiNama";
$proto47["m_columns"][] = "prodiKetuaProdiNoHp";
$proto47["m_columns"][] = "prodiOperatorNama";
$proto47["m_columns"][] = "prodiOperatorNoHp";
$proto47["m_columns"][] = "prodiIsDalamSatuanAdministrasi";
$proto47["m_columns"][] = "prodiGelarKelulusan";
$proto47["m_columns"][] = "prodiNamaGelarKelulusan";
$proto47["m_columns"][] = "prodiGelarAsingKelulusan";
$proto47["m_columns"][] = "prodiNamaGelarAsingKelulusan";
$obj = new SQLTable($proto47);

$proto46["m_table"] = $obj;
$proto46["m_sql"] = "INNER JOIN program_studi ON s_matakuliah_kurikulum.mkkurProdiKode = program_studi.prodiKode";
$proto46["m_alias"] = "";
$proto46["m_srcTableName"] = "s_kelas";
$proto48=array();
$proto48["m_sql"] = "s_matakuliah_kurikulum.mkkurProdiKode = program_studi.prodiKode";
$proto48["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "mkkurProdiKode",
	"m_strTable" => "s_matakuliah_kurikulum",
	"m_srcTableName" => "s_kelas"
));

$proto48["m_column"]=$obj;
$proto48["m_contained"] = array();
$proto48["m_strCase"] = "= program_studi.prodiKode";
$proto48["m_havingmode"] = false;
$proto48["m_inBrackets"] = false;
$proto48["m_useAlias"] = false;
$obj = new SQLLogicalExpr($proto48);

$proto46["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto46);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
												$proto50=array();
						$obj = new SQLField(array(
	"m_strName" => "klsSemId",
	"m_strTable" => "s_kelas",
	"m_srcTableName" => "s_kelas"
));

$proto50["m_column"]=$obj;
$proto50["m_bAsc"] = 0;
$proto50["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto50);

$proto0["m_orderby"][]=$obj;					
$proto0["m_srcTableName"]="s_kelas";		
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_s_kelas = createSqlQuery_s_kelas();


	
		;

										

$tdatas_kelas[".sqlquery"] = $queryData_s_kelas;

$tableEvents["s_kelas"] = new eventsBase;
$tdatas_kelas[".hasEvents"] = false;

?>