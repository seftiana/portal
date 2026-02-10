<?php
require_once(getabspath("classes/cipherer.php"));




$tdatas_krs_detil = array();
	$tdatas_krs_detil[".truncateText"] = true;
	$tdatas_krs_detil[".NumberOfChars"] = 80;
	$tdatas_krs_detil[".ShortName"] = "s_krs_detil";
	$tdatas_krs_detil[".OwnerID"] = "";
	$tdatas_krs_detil[".OriginalTable"] = "s_krs_detil";

//	field labels
$fieldLabelss_krs_detil = array();
$fieldToolTipss_krs_detil = array();
$pageTitless_krs_detil = array();
$placeHolderss_krs_detil = array();

if(mlang_getcurrentlang()=="English")
{
	$fieldLabelss_krs_detil["English"] = array();
	$fieldToolTipss_krs_detil["English"] = array();
	$placeHolderss_krs_detil["English"] = array();
	$pageTitless_krs_detil["English"] = array();
	$fieldLabelss_krs_detil["English"]["krsdtId"] = "krsdtId";
	$fieldToolTipss_krs_detil["English"]["krsdtId"] = "";
	$placeHolderss_krs_detil["English"]["krsdtId"] = "";
	$fieldLabelss_krs_detil["English"]["krsMhsNiu"] = "krsMhsNiu";
	$fieldToolTipss_krs_detil["English"]["krsMhsNiu"] = "";
	$placeHolderss_krs_detil["English"]["krsMhsNiu"] = "";
	$fieldLabelss_krs_detil["English"]["mhsNama"] = "mhsNama";
	$fieldToolTipss_krs_detil["English"]["mhsNama"] = "";
	$placeHolderss_krs_detil["English"]["mhsNama"] = "";
	$fieldLabelss_krs_detil["English"]["mhsProdiKode"] = "mhsProdiKode";
	$fieldToolTipss_krs_detil["English"]["mhsProdiKode"] = "";
	$placeHolderss_krs_detil["English"]["mhsProdiKode"] = "";
	$fieldLabelss_krs_detil["English"]["klsNama"] = "klsNama";
	$fieldToolTipss_krs_detil["English"]["klsNama"] = "";
	$placeHolderss_krs_detil["English"]["klsNama"] = "";
	$fieldLabelss_krs_detil["English"]["mhsEmail"] = "mhsEmail";
	$fieldToolTipss_krs_detil["English"]["mhsEmail"] = "";
	$placeHolderss_krs_detil["English"]["mhsEmail"] = "";
	$fieldLabelss_krs_detil["English"]["sempSemId"] = "Semester ";
	$fieldToolTipss_krs_detil["English"]["sempSemId"] = "";
	$placeHolderss_krs_detil["English"]["sempSemId"] = "";
	$fieldLabelss_krs_detil["English"]["prodiJjarKode"] = "prodiJjarKode";
	$fieldToolTipss_krs_detil["English"]["prodiJjarKode"] = "";
	$placeHolderss_krs_detil["English"]["prodiJjarKode"] = "";
	$fieldLabelss_krs_detil["English"]["prodiNamaResmi"] = "Program Studi";
	$fieldToolTipss_krs_detil["English"]["prodiNamaResmi"] = "";
	$placeHolderss_krs_detil["English"]["prodiNamaResmi"] = "";
	$fieldLabelss_krs_detil["English"]["krsId"] = "krsId";
	$fieldToolTipss_krs_detil["English"]["krsId"] = "";
	$placeHolderss_krs_detil["English"]["krsId"] = "";
	if (count($fieldToolTipss_krs_detil["English"]))
		$tdatas_krs_detil[".isUseToolTips"] = true;
}
if(mlang_getcurrentlang()=="")
{
	$fieldLabelss_krs_detil[""] = array();
	$fieldToolTipss_krs_detil[""] = array();
	$placeHolderss_krs_detil[""] = array();
	$pageTitless_krs_detil[""] = array();
	$fieldLabelss_krs_detil[""]["krsdtId"] = "Krsdt Id";
	$fieldToolTipss_krs_detil[""]["krsdtId"] = "";
	$placeHolderss_krs_detil[""]["krsdtId"] = "";
	$fieldLabelss_krs_detil[""]["krsMhsNiu"] = "Krs Mhs Niu";
	$fieldToolTipss_krs_detil[""]["krsMhsNiu"] = "";
	$placeHolderss_krs_detil[""]["krsMhsNiu"] = "";
	$fieldLabelss_krs_detil[""]["mhsNama"] = "Mhs Nama";
	$fieldToolTipss_krs_detil[""]["mhsNama"] = "";
	$placeHolderss_krs_detil[""]["mhsNama"] = "";
	$fieldLabelss_krs_detil[""]["mhsProdiKode"] = "Mhs Prodi Kode";
	$fieldToolTipss_krs_detil[""]["mhsProdiKode"] = "";
	$placeHolderss_krs_detil[""]["mhsProdiKode"] = "";
	$fieldLabelss_krs_detil[""]["klsNama"] = "Kls Nama";
	$fieldToolTipss_krs_detil[""]["klsNama"] = "";
	$placeHolderss_krs_detil[""]["klsNama"] = "";
	$fieldLabelss_krs_detil[""]["mhsEmail"] = "Mhs Email";
	$fieldToolTipss_krs_detil[""]["mhsEmail"] = "";
	$placeHolderss_krs_detil[""]["mhsEmail"] = "";
	$fieldLabelss_krs_detil[""]["sempSemId"] = "Semp Sem Id";
	$fieldToolTipss_krs_detil[""]["sempSemId"] = "";
	$placeHolderss_krs_detil[""]["sempSemId"] = "";
	$fieldLabelss_krs_detil[""]["prodiJjarKode"] = "Prodi Jjar Kode";
	$fieldToolTipss_krs_detil[""]["prodiJjarKode"] = "";
	$placeHolderss_krs_detil[""]["prodiJjarKode"] = "";
	$fieldLabelss_krs_detil[""]["prodiNamaResmi"] = "Prodi Nama Resmi";
	$fieldToolTipss_krs_detil[""]["prodiNamaResmi"] = "";
	$placeHolderss_krs_detil[""]["prodiNamaResmi"] = "";
	$fieldLabelss_krs_detil[""]["krsId"] = "Krs Id";
	$fieldToolTipss_krs_detil[""]["krsId"] = "";
	$placeHolderss_krs_detil[""]["krsId"] = "";
	if (count($fieldToolTipss_krs_detil[""]))
		$tdatas_krs_detil[".isUseToolTips"] = true;
}


	$tdatas_krs_detil[".NCSearch"] = true;



$tdatas_krs_detil[".shortTableName"] = "s_krs_detil";
$tdatas_krs_detil[".nSecOptions"] = 0;
$tdatas_krs_detil[".recsPerRowPrint"] = 1;
$tdatas_krs_detil[".mainTableOwnerID"] = "";
$tdatas_krs_detil[".moveNext"] = 1;
$tdatas_krs_detil[".entityType"] = 0;

$tdatas_krs_detil[".strOriginalTableName"] = "s_krs_detil";

	



$tdatas_krs_detil[".showAddInPopup"] = false;

$tdatas_krs_detil[".showEditInPopup"] = false;

$tdatas_krs_detil[".showViewInPopup"] = false;

//page's base css files names
$popupPagesLayoutNames = array();
$tdatas_krs_detil[".popupPagesLayoutNames"] = $popupPagesLayoutNames;


$tdatas_krs_detil[".fieldsForRegister"] = array();

$tdatas_krs_detil[".listAjax"] = false;

	$tdatas_krs_detil[".audit"] = false;

	$tdatas_krs_detil[".locking"] = false;



$tdatas_krs_detil[".list"] = true;



$tdatas_krs_detil[".reorderRecordsByHeader"] = true;


$tdatas_krs_detil[".exportFormatting"] = 2;
$tdatas_krs_detil[".exportDelimiter"] = ",";
		


$tdatas_krs_detil[".exportTo"] = true;

$tdatas_krs_detil[".printFriendly"] = true;


$tdatas_krs_detil[".showSimpleSearchOptions"] = false;

// Allow Show/Hide Fields in GRID
$tdatas_krs_detil[".allowShowHideFields"] = false;
//

// Allow Fields Reordering in GRID
$tdatas_krs_detil[".allowFieldsReordering"] = false;
//

// search Saving settings
$tdatas_krs_detil[".searchSaving"] = false;
//

$tdatas_krs_detil[".showSearchPanel"] = true;
		$tdatas_krs_detil[".flexibleSearch"] = true;

$tdatas_krs_detil[".isUseAjaxSuggest"] = true;

$tdatas_krs_detil[".rowHighlite"] = true;





$tdatas_krs_detil[".ajaxCodeSnippetAdded"] = false;

$tdatas_krs_detil[".buttonsAdded"] = false;

$tdatas_krs_detil[".addPageEvents"] = false;

// use timepicker for search panel
$tdatas_krs_detil[".isUseTimeForSearch"] = false;



$tdatas_krs_detil[".badgeColor"] = "CD5C5C";


$tdatas_krs_detil[".allSearchFields"] = array();
$tdatas_krs_detil[".filterFields"] = array();
$tdatas_krs_detil[".requiredSearchFields"] = array();

$tdatas_krs_detil[".allSearchFields"][] = "krsdtId";
	$tdatas_krs_detil[".allSearchFields"][] = "krsMhsNiu";
	$tdatas_krs_detil[".allSearchFields"][] = "mhsNama";
	$tdatas_krs_detil[".allSearchFields"][] = "mhsProdiKode";
	$tdatas_krs_detil[".allSearchFields"][] = "klsNama";
	$tdatas_krs_detil[".allSearchFields"][] = "mhsEmail";
	$tdatas_krs_detil[".allSearchFields"][] = "sempSemId";
	$tdatas_krs_detil[".allSearchFields"][] = "prodiJjarKode";
	$tdatas_krs_detil[".allSearchFields"][] = "prodiNamaResmi";
	$tdatas_krs_detil[".allSearchFields"][] = "krsId";
	
$tdatas_krs_detil[".filterFields"][] = "sempSemId";
$tdatas_krs_detil[".filterFields"][] = "prodiNamaResmi";

$tdatas_krs_detil[".googleLikeFields"] = array();
$tdatas_krs_detil[".googleLikeFields"][] = "krsdtId";
$tdatas_krs_detil[".googleLikeFields"][] = "krsMhsNiu";
$tdatas_krs_detil[".googleLikeFields"][] = "mhsNama";
$tdatas_krs_detil[".googleLikeFields"][] = "mhsProdiKode";
$tdatas_krs_detil[".googleLikeFields"][] = "klsNama";
$tdatas_krs_detil[".googleLikeFields"][] = "mhsEmail";
$tdatas_krs_detil[".googleLikeFields"][] = "sempSemId";
$tdatas_krs_detil[".googleLikeFields"][] = "prodiJjarKode";
$tdatas_krs_detil[".googleLikeFields"][] = "prodiNamaResmi";
$tdatas_krs_detil[".googleLikeFields"][] = "krsId";


$tdatas_krs_detil[".advSearchFields"] = array();
$tdatas_krs_detil[".advSearchFields"][] = "krsdtId";
$tdatas_krs_detil[".advSearchFields"][] = "krsMhsNiu";
$tdatas_krs_detil[".advSearchFields"][] = "mhsNama";
$tdatas_krs_detil[".advSearchFields"][] = "mhsProdiKode";
$tdatas_krs_detil[".advSearchFields"][] = "klsNama";
$tdatas_krs_detil[".advSearchFields"][] = "mhsEmail";
$tdatas_krs_detil[".advSearchFields"][] = "sempSemId";
$tdatas_krs_detil[".advSearchFields"][] = "prodiJjarKode";
$tdatas_krs_detil[".advSearchFields"][] = "prodiNamaResmi";
$tdatas_krs_detil[".advSearchFields"][] = "krsId";

$tdatas_krs_detil[".tableType"] = "list";

$tdatas_krs_detil[".printerPageOrientation"] = 0;
$tdatas_krs_detil[".nPrinterPageScale"] = 100;

$tdatas_krs_detil[".nPrinterSplitRecords"] = 40;

$tdatas_krs_detil[".nPrinterPDFSplitRecords"] = 40;



$tdatas_krs_detil[".geocodingEnabled"] = false;





$tdatas_krs_detil[".listGridLayout"] = 3;





// view page pdf

// print page pdf


$tdatas_krs_detil[".pageSize"] = 20;

$tdatas_krs_detil[".warnLeavingPages"] = true;



$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatas_krs_detil[".strOrderBy"] = $tstrOrderBy;

$tdatas_krs_detil[".orderindexes"] = array();

$tdatas_krs_detil[".sqlHead"] = "SELECT s_krs_detil.krsdtId,  s_krs.krsMhsNiu,  mahasiswa.mhsNama,  mahasiswa.mhsProdiKode,  s_kelas.klsNama,  mahasiswa.mhsEmail,  s_semester_prodi.sempSemId,  program_studi.prodiJjarKode,  program_studi.prodiNamaResmi,  s_krs.krsId";
$tdatas_krs_detil[".sqlFrom"] = "FROM s_krs_detil  INNER JOIN s_krs ON s_krs_detil.krsdtKrsId = s_krs.krsId  INNER JOIN mahasiswa ON s_krs.krsMhsNiu = mahasiswa.mhsNiu  INNER JOIN s_kelas ON s_krs_detil.krsdtKlsId = s_kelas.klsId  INNER JOIN s_semester_prodi ON s_krs.krsSempId = s_semester_prodi.sempId  INNER JOIN program_studi ON mahasiswa.mhsProdiKode = program_studi.prodiKode AND s_semester_prodi.sempProdiKode = program_studi.prodiKode";
$tdatas_krs_detil[".sqlWhereExpr"] = "";
$tdatas_krs_detil[".sqlTail"] = "";












//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatas_krs_detil[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatas_krs_detil[".arrGroupsPerPage"] = $arrGPP;

$tdatas_krs_detil[".highlightSearchResults"] = true;

$tableKeyss_krs_detil = array();
$tableKeyss_krs_detil[] = "krsdtId";
$tdatas_krs_detil[".Keys"] = $tableKeyss_krs_detil;

$tdatas_krs_detil[".listFields"] = array();
$tdatas_krs_detil[".listFields"][] = "krsdtId";
$tdatas_krs_detil[".listFields"][] = "krsMhsNiu";
$tdatas_krs_detil[".listFields"][] = "mhsNama";
$tdatas_krs_detil[".listFields"][] = "mhsProdiKode";
$tdatas_krs_detil[".listFields"][] = "klsNama";
$tdatas_krs_detil[".listFields"][] = "mhsEmail";
$tdatas_krs_detil[".listFields"][] = "sempSemId";
$tdatas_krs_detil[".listFields"][] = "prodiJjarKode";
$tdatas_krs_detil[".listFields"][] = "prodiNamaResmi";
$tdatas_krs_detil[".listFields"][] = "krsId";

$tdatas_krs_detil[".hideMobileList"] = array();


$tdatas_krs_detil[".viewFields"] = array();

$tdatas_krs_detil[".addFields"] = array();

$tdatas_krs_detil[".masterListFields"] = array();
$tdatas_krs_detil[".masterListFields"][] = "krsdtId";
$tdatas_krs_detil[".masterListFields"][] = "krsMhsNiu";
$tdatas_krs_detil[".masterListFields"][] = "mhsNama";
$tdatas_krs_detil[".masterListFields"][] = "mhsProdiKode";
$tdatas_krs_detil[".masterListFields"][] = "klsNama";
$tdatas_krs_detil[".masterListFields"][] = "mhsEmail";
$tdatas_krs_detil[".masterListFields"][] = "sempSemId";
$tdatas_krs_detil[".masterListFields"][] = "prodiJjarKode";
$tdatas_krs_detil[".masterListFields"][] = "prodiNamaResmi";
$tdatas_krs_detil[".masterListFields"][] = "krsId";

$tdatas_krs_detil[".inlineAddFields"] = array();

$tdatas_krs_detil[".editFields"] = array();

$tdatas_krs_detil[".inlineEditFields"] = array();

$tdatas_krs_detil[".updateSelectedFields"] = array();


$tdatas_krs_detil[".exportFields"] = array();
$tdatas_krs_detil[".exportFields"][] = "krsdtId";
$tdatas_krs_detil[".exportFields"][] = "krsMhsNiu";
$tdatas_krs_detil[".exportFields"][] = "mhsNama";
$tdatas_krs_detil[".exportFields"][] = "mhsProdiKode";
$tdatas_krs_detil[".exportFields"][] = "klsNama";
$tdatas_krs_detil[".exportFields"][] = "mhsEmail";
$tdatas_krs_detil[".exportFields"][] = "sempSemId";
$tdatas_krs_detil[".exportFields"][] = "prodiJjarKode";
$tdatas_krs_detil[".exportFields"][] = "prodiNamaResmi";
$tdatas_krs_detil[".exportFields"][] = "krsId";

$tdatas_krs_detil[".importFields"] = array();

$tdatas_krs_detil[".printFields"] = array();
$tdatas_krs_detil[".printFields"][] = "krsdtId";
$tdatas_krs_detil[".printFields"][] = "krsMhsNiu";
$tdatas_krs_detil[".printFields"][] = "mhsNama";
$tdatas_krs_detil[".printFields"][] = "mhsProdiKode";
$tdatas_krs_detil[".printFields"][] = "klsNama";
$tdatas_krs_detil[".printFields"][] = "mhsEmail";
$tdatas_krs_detil[".printFields"][] = "sempSemId";
$tdatas_krs_detil[".printFields"][] = "prodiJjarKode";
$tdatas_krs_detil[".printFields"][] = "prodiNamaResmi";
$tdatas_krs_detil[".printFields"][] = "krsId";


//	krsdtId
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "krsdtId";
	$fdata["GoodName"] = "krsdtId";
	$fdata["ownerTable"] = "s_krs_detil";
	$fdata["Label"] = GetFieldLabel("s_krs_detil","krsdtId");
	$fdata["FieldType"] = 20;

	
	
	
			
		$fdata["bListPage"] = true;

	
	
	
	
	

	
		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "krsdtId";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "s_krs_detil.krsdtId";

	
	
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




	$tdatas_krs_detil["krsdtId"] = $fdata;
//	krsMhsNiu
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "krsMhsNiu";
	$fdata["GoodName"] = "krsMhsNiu";
	$fdata["ownerTable"] = "s_krs";
	$fdata["Label"] = GetFieldLabel("s_krs_detil","krsMhsNiu");
	$fdata["FieldType"] = 200;

	
	
	
			
		$fdata["bListPage"] = true;

	
	
	
	
	

	
		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "krsMhsNiu";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "s_krs.krsMhsNiu";

	
	
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




	$tdatas_krs_detil["krsMhsNiu"] = $fdata;
//	mhsNama
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "mhsNama";
	$fdata["GoodName"] = "mhsNama";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("s_krs_detil","mhsNama");
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




	$tdatas_krs_detil["mhsNama"] = $fdata;
//	mhsProdiKode
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "mhsProdiKode";
	$fdata["GoodName"] = "mhsProdiKode";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("s_krs_detil","mhsProdiKode");
	$fdata["FieldType"] = 3;

	
	
	
			
		$fdata["bListPage"] = true;

	
	
	
	
	

	
		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsProdiKode";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mahasiswa.mhsProdiKode";

	
	
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




	$tdatas_krs_detil["mhsProdiKode"] = $fdata;
//	klsNama
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "klsNama";
	$fdata["GoodName"] = "klsNama";
	$fdata["ownerTable"] = "s_kelas";
	$fdata["Label"] = GetFieldLabel("s_krs_detil","klsNama");
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




	$tdatas_krs_detil["klsNama"] = $fdata;
//	mhsEmail
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 6;
	$fdata["strName"] = "mhsEmail";
	$fdata["GoodName"] = "mhsEmail";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("s_krs_detil","mhsEmail");
	$fdata["FieldType"] = 200;

	
	
	
			
		$fdata["bListPage"] = true;

	
	
	
	
	

	
		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsEmail";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mahasiswa.mhsEmail";

	
	
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




	$tdatas_krs_detil["mhsEmail"] = $fdata;
//	sempSemId
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 7;
	$fdata["strName"] = "sempSemId";
	$fdata["GoodName"] = "sempSemId";
	$fdata["ownerTable"] = "s_semester_prodi";
	$fdata["Label"] = GetFieldLabel("s_krs_detil","sempSemId");
	$fdata["FieldType"] = 20;

	
	
	
			
		$fdata["bListPage"] = true;

	
	
	
	
	

	
		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "sempSemId";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "s_semester_prodi.sempSemId";

	
	
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


//Filters settings
	$fdata["filterTotals"] = 0;
		$fdata["filterMultiSelect"] = 0;
		$fdata["filterTotalFields"] = "krsdtId";
		$fdata["filterFormat"] = "Values list";
		$fdata["showCollapsed"] = false;

		$fdata["sortValueType"] = 0;
		$fdata["descendingOrder"] = true;
	$fdata["numberOfVisibleItems"] = 10;

			
	
	
//end of Filters settings


	$tdatas_krs_detil["sempSemId"] = $fdata;
//	prodiJjarKode
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 8;
	$fdata["strName"] = "prodiJjarKode";
	$fdata["GoodName"] = "prodiJjarKode";
	$fdata["ownerTable"] = "program_studi";
	$fdata["Label"] = GetFieldLabel("s_krs_detil","prodiJjarKode");
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




	$tdatas_krs_detil["prodiJjarKode"] = $fdata;
//	prodiNamaResmi
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 9;
	$fdata["strName"] = "prodiNamaResmi";
	$fdata["GoodName"] = "prodiNamaResmi";
	$fdata["ownerTable"] = "program_studi";
	$fdata["Label"] = GetFieldLabel("s_krs_detil","prodiNamaResmi");
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
			$fdata["filterFormat"] = "Values list";
		$fdata["showCollapsed"] = false;

		$fdata["sortValueType"] = 0;
		$fdata["numberOfVisibleItems"] = 10;

			
	
	
//end of Filters settings


	$tdatas_krs_detil["prodiNamaResmi"] = $fdata;
//	krsId
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 10;
	$fdata["strName"] = "krsId";
	$fdata["GoodName"] = "krsId";
	$fdata["ownerTable"] = "s_krs";
	$fdata["Label"] = GetFieldLabel("s_krs_detil","krsId");
	$fdata["FieldType"] = 20;

	
	
	
			
		$fdata["bListPage"] = true;

	
	
	
	
	

	
		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "krsId";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "s_krs.krsId";

	
	
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




	$tdatas_krs_detil["krsId"] = $fdata;


$tables_data["s_krs_detil"]=&$tdatas_krs_detil;
$field_labels["s_krs_detil"] = &$fieldLabelss_krs_detil;
$fieldToolTips["s_krs_detil"] = &$fieldToolTipss_krs_detil;
$placeHolders["s_krs_detil"] = &$placeHolderss_krs_detil;
$page_titles["s_krs_detil"] = &$pageTitless_krs_detil;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["s_krs_detil"] = array();

// tables which are master tables for current table (detail)
$masterTablesData["s_krs_detil"] = array();


	
				$strOriginalDetailsTable="s_kelas";
	$masterParams = array();
	$masterParams["mDataSourceTable"]="s_kelas";
	$masterParams["mOriginalTable"]= $strOriginalDetailsTable;
	$masterParams["mShortTable"]= "s_kelas";
	$masterParams["masterKeys"]= array();
	$masterParams["detailKeys"]= array();
	
		$masterParams["dispChildCount"]= 0;
	$masterParams["hideChild"]= 0;
	$masterParams["dispMasterInfo"] = array();
				$masterParams["dispMasterInfo"][PAGE_LIST] = true;
			$masterParams["dispMasterInfo"][PAGE_PRINT] = true;
		
	$masterParams["previewOnList"]= 2;
	$masterParams["previewOnAdd"]= 0;
	$masterParams["previewOnEdit"]= 0;
	$masterParams["previewOnView"]= 0;
	$masterParams["proceedLink"]= 1;

	$masterParams["type"] = PAGE_LIST;
					$masterTablesData["s_krs_detil"][0] = $masterParams;
				$masterTablesData["s_krs_detil"][0]["masterKeys"] = array();
	$masterTablesData["s_krs_detil"][0]["masterKeys"][]="klsId";
				$masterTablesData["s_krs_detil"][0]["detailKeys"] = array();
	$masterTablesData["s_krs_detil"][0]["detailKeys"][]="krsdtKlsId";
		
// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_s_krs_detil()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "s_krs_detil.krsdtId,  s_krs.krsMhsNiu,  mahasiswa.mhsNama,  mahasiswa.mhsProdiKode,  s_kelas.klsNama,  mahasiswa.mhsEmail,  s_semester_prodi.sempSemId,  program_studi.prodiJjarKode,  program_studi.prodiNamaResmi,  s_krs.krsId";
$proto0["m_strFrom"] = "FROM s_krs_detil  INNER JOIN s_krs ON s_krs_detil.krsdtKrsId = s_krs.krsId  INNER JOIN mahasiswa ON s_krs.krsMhsNiu = mahasiswa.mhsNiu  INNER JOIN s_kelas ON s_krs_detil.krsdtKlsId = s_kelas.klsId  INNER JOIN s_semester_prodi ON s_krs.krsSempId = s_semester_prodi.sempId  INNER JOIN program_studi ON mahasiswa.mhsProdiKode = program_studi.prodiKode AND s_semester_prodi.sempProdiKode = program_studi.prodiKode";
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
	"m_strName" => "krsdtId",
	"m_strTable" => "s_krs_detil",
	"m_srcTableName" => "s_krs_detil"
));

$proto6["m_sql"] = "s_krs_detil.krsdtId";
$proto6["m_srcTableName"] = "s_krs_detil";
$proto6["m_expr"]=$obj;
$proto6["m_alias"] = "";
$obj = new SQLFieldListItem($proto6);

$proto0["m_fieldlist"][]=$obj;
						$proto8=array();
			$obj = new SQLField(array(
	"m_strName" => "krsMhsNiu",
	"m_strTable" => "s_krs",
	"m_srcTableName" => "s_krs_detil"
));

$proto8["m_sql"] = "s_krs.krsMhsNiu";
$proto8["m_srcTableName"] = "s_krs_detil";
$proto8["m_expr"]=$obj;
$proto8["m_alias"] = "";
$obj = new SQLFieldListItem($proto8);

$proto0["m_fieldlist"][]=$obj;
						$proto10=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsNama",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "s_krs_detil"
));

$proto10["m_sql"] = "mahasiswa.mhsNama";
$proto10["m_srcTableName"] = "s_krs_detil";
$proto10["m_expr"]=$obj;
$proto10["m_alias"] = "";
$obj = new SQLFieldListItem($proto10);

$proto0["m_fieldlist"][]=$obj;
						$proto12=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsProdiKode",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "s_krs_detil"
));

$proto12["m_sql"] = "mahasiswa.mhsProdiKode";
$proto12["m_srcTableName"] = "s_krs_detil";
$proto12["m_expr"]=$obj;
$proto12["m_alias"] = "";
$obj = new SQLFieldListItem($proto12);

$proto0["m_fieldlist"][]=$obj;
						$proto14=array();
			$obj = new SQLField(array(
	"m_strName" => "klsNama",
	"m_strTable" => "s_kelas",
	"m_srcTableName" => "s_krs_detil"
));

$proto14["m_sql"] = "s_kelas.klsNama";
$proto14["m_srcTableName"] = "s_krs_detil";
$proto14["m_expr"]=$obj;
$proto14["m_alias"] = "";
$obj = new SQLFieldListItem($proto14);

$proto0["m_fieldlist"][]=$obj;
						$proto16=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsEmail",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "s_krs_detil"
));

$proto16["m_sql"] = "mahasiswa.mhsEmail";
$proto16["m_srcTableName"] = "s_krs_detil";
$proto16["m_expr"]=$obj;
$proto16["m_alias"] = "";
$obj = new SQLFieldListItem($proto16);

$proto0["m_fieldlist"][]=$obj;
						$proto18=array();
			$obj = new SQLField(array(
	"m_strName" => "sempSemId",
	"m_strTable" => "s_semester_prodi",
	"m_srcTableName" => "s_krs_detil"
));

$proto18["m_sql"] = "s_semester_prodi.sempSemId";
$proto18["m_srcTableName"] = "s_krs_detil";
$proto18["m_expr"]=$obj;
$proto18["m_alias"] = "";
$obj = new SQLFieldListItem($proto18);

$proto0["m_fieldlist"][]=$obj;
						$proto20=array();
			$obj = new SQLField(array(
	"m_strName" => "prodiJjarKode",
	"m_strTable" => "program_studi",
	"m_srcTableName" => "s_krs_detil"
));

$proto20["m_sql"] = "program_studi.prodiJjarKode";
$proto20["m_srcTableName"] = "s_krs_detil";
$proto20["m_expr"]=$obj;
$proto20["m_alias"] = "";
$obj = new SQLFieldListItem($proto20);

$proto0["m_fieldlist"][]=$obj;
						$proto22=array();
			$obj = new SQLField(array(
	"m_strName" => "prodiNamaResmi",
	"m_strTable" => "program_studi",
	"m_srcTableName" => "s_krs_detil"
));

$proto22["m_sql"] = "program_studi.prodiNamaResmi";
$proto22["m_srcTableName"] = "s_krs_detil";
$proto22["m_expr"]=$obj;
$proto22["m_alias"] = "";
$obj = new SQLFieldListItem($proto22);

$proto0["m_fieldlist"][]=$obj;
						$proto24=array();
			$obj = new SQLField(array(
	"m_strName" => "krsId",
	"m_strTable" => "s_krs",
	"m_srcTableName" => "s_krs_detil"
));

$proto24["m_sql"] = "s_krs.krsId";
$proto24["m_srcTableName"] = "s_krs_detil";
$proto24["m_expr"]=$obj;
$proto24["m_alias"] = "";
$obj = new SQLFieldListItem($proto24);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto26=array();
$proto26["m_link"] = "SQLL_MAIN";
			$proto27=array();
$proto27["m_strName"] = "s_krs_detil";
$proto27["m_srcTableName"] = "s_krs_detil";
$proto27["m_columns"] = array();
$proto27["m_columns"][] = "krsdtId";
$proto27["m_columns"][] = "krsdtKrsId";
$proto27["m_columns"][] = "krsdtVmktwkrsId";
$proto27["m_columns"][] = "krsdtKlsId";
$proto27["m_columns"][] = "krsdtMkkurId";
$proto27["m_columns"][] = "krsdtSksMatakuliah";
$proto27["m_columns"][] = "krsdtSifatMatakuliah";
$proto27["m_columns"][] = "krsdtIsBatal";
$proto27["m_columns"][] = "krsdtIsDipakaiTranskrip";
$proto27["m_columns"][] = "krsdtIsRevisi";
$proto27["m_columns"][] = "krsdtBobotNilai";
$proto27["m_columns"][] = "krsdtBobotPembulatan";
$proto27["m_columns"][] = "krsdtBobotKelompok";
$proto27["m_columns"][] = "krsdtKodeNilai";
$proto27["m_columns"][] = "krsdtKodeKelompok";
$proto27["m_columns"][] = "krsdtTanggalPengubahanNilai";
$proto27["m_columns"][] = "krsdtAplikasiPengubah";
$proto27["m_columns"][] = "krsdtUserNamaPengubah";
$proto27["m_columns"][] = "krsdtUserProfilPengubah";
$proto27["m_columns"][] = "krsdtAmbilKe";
$proto27["m_columns"][] = "krsdtMkkurIdDisetarakan";
$proto27["m_columns"][] = "krsdtKrsjubahNama";
$proto27["m_columns"][] = "krsdtSbbatalNama";
$proto27["m_columns"][] = "krsdtSbtambahNama";
$proto27["m_columns"][] = "krsdtTanggalPengubahanItem";
$proto27["m_columns"][] = "krsdtAplikasiPengubahItem";
$proto27["m_columns"][] = "krsdtUserNamaPengubahItem";
$proto27["m_columns"][] = "krsdtUserProfilPengubahItem";
$proto27["m_columns"][] = "krsdtBobotNilaiHitung";
$proto27["m_columns"][] = "krsdtKlsPraktikum";
$proto27["m_columns"][] = "krsdtStatusBayar";
$proto27["m_columns"][] = "krsdtIsRemedial";
$obj = new SQLTable($proto27);

$proto26["m_table"] = $obj;
$proto26["m_sql"] = "s_krs_detil";
$proto26["m_alias"] = "";
$proto26["m_srcTableName"] = "s_krs_detil";
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
$proto30["m_link"] = "SQLL_INNERJOIN";
			$proto31=array();
$proto31["m_strName"] = "s_krs";
$proto31["m_srcTableName"] = "s_krs_detil";
$proto31["m_columns"] = array();
$proto31["m_columns"][] = "krsId";
$proto31["m_columns"][] = "krsSempId";
$proto31["m_columns"][] = "krsMhsNiu";
$proto31["m_columns"][] = "krsJamMulai";
$proto31["m_columns"][] = "krsJamSelesai";
$proto31["m_columns"][] = "krsApprovalKe";
$proto31["m_columns"][] = "krsAplikasiPengubahItem";
$proto31["m_columns"][] = "krsUserNamaPengubahItem";
$proto31["m_columns"][] = "krsUserProfilPengubahItem";
$obj = new SQLTable($proto31);

$proto30["m_table"] = $obj;
$proto30["m_sql"] = "INNER JOIN s_krs ON s_krs_detil.krsdtKrsId = s_krs.krsId";
$proto30["m_alias"] = "";
$proto30["m_srcTableName"] = "s_krs_detil";
$proto32=array();
$proto32["m_sql"] = "s_krs_detil.krsdtKrsId = s_krs.krsId";
$proto32["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "krsdtKrsId",
	"m_strTable" => "s_krs_detil",
	"m_srcTableName" => "s_krs_detil"
));

$proto32["m_column"]=$obj;
$proto32["m_contained"] = array();
$proto32["m_strCase"] = "= s_krs.krsId";
$proto32["m_havingmode"] = false;
$proto32["m_inBrackets"] = false;
$proto32["m_useAlias"] = false;
$obj = new SQLLogicalExpr($proto32);

$proto30["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto30);

$proto0["m_fromlist"][]=$obj;
												$proto34=array();
$proto34["m_link"] = "SQLL_INNERJOIN";
			$proto35=array();
$proto35["m_strName"] = "mahasiswa";
$proto35["m_srcTableName"] = "s_krs_detil";
$proto35["m_columns"] = array();
$proto35["m_columns"][] = "mhsNiu";
$proto35["m_columns"][] = "mhsNif";
$proto35["m_columns"][] = "mhsNama";
$proto35["m_columns"][] = "mhsAngkatan";
$proto35["m_columns"][] = "mhsSemesterMasuk";
$proto35["m_columns"][] = "mhsPasswordRegistrasi";
$proto35["m_columns"][] = "mhsKurId";
$proto35["m_columns"][] = "mhsProdiKode";
$proto35["m_columns"][] = "mhsProdiKodeUniv";
$proto35["m_columns"][] = "mhsProdikonsentrasiId";
$proto35["m_columns"][] = "mhsWktkulId";
$proto35["m_columns"][] = "mhsNomorTes";
$proto35["m_columns"][] = "mhsTanggalTerdaftar";
$proto35["m_columns"][] = "mhsStatusMasukPt";
$proto35["m_columns"][] = "mhsIsAsing";
$proto35["m_columns"][] = "mhsJumlahSksPindahan";
$proto35["m_columns"][] = "mhsKodePtPindahan";
$proto35["m_columns"][] = "mhsKodeProdiDiktiPindahan";
$proto35["m_columns"][] = "mhsNamaPtPindahan";
$proto35["m_columns"][] = "mhsJjarKodeDiktiPindahan";
$proto35["m_columns"][] = "mhsTahunMasukPtPindahan";
$proto35["m_columns"][] = "mhsNimLama";
$proto35["m_columns"][] = "mhsJenisKelamin";
$proto35["m_columns"][] = "mhsKotaKodeLahir";
$proto35["m_columns"][] = "mhsTanggalLahir";
$proto35["m_columns"][] = "mhsAgmrId";
$proto35["m_columns"][] = "mhsSmtaKode";
$proto35["m_columns"][] = "mhsTdftSmta";
$proto35["m_columns"][] = "mhsTahunTamatSmta";
$proto35["m_columns"][] = "mhsTahunLulusSmta";
$proto35["m_columns"][] = "mhsJursmtarKode";
$proto35["m_columns"][] = "mhsAlamatSmta";
$proto35["m_columns"][] = "mhsNoIjasahSmta";
$proto35["m_columns"][] = "mhsIjasahSmta";
$proto35["m_columns"][] = "mhsTanggalIjasahSmta";
$proto35["m_columns"][] = "mhsNilaiUjianAkhirSmta";
$proto35["m_columns"][] = "mhsJumlahMpUjianAkhirSmta";
$proto35["m_columns"][] = "mhsStnkrId";
$proto35["m_columns"][] = "mhsJumlahSaudara";
$proto35["m_columns"][] = "mhsAlamatMhs";
$proto35["m_columns"][] = "mhsAlamatTerakhir";
$proto35["m_columns"][] = "mhsAlamatDiKotaIni";
$proto35["m_columns"][] = "mhsKotaKode";
$proto35["m_columns"][] = "mhsNgrKode";
$proto35["m_columns"][] = "mhsKodePos";
$proto35["m_columns"][] = "mhsStatrumahId";
$proto35["m_columns"][] = "mhsSbdnrId";
$proto35["m_columns"][] = "mhsHubbiayaId";
$proto35["m_columns"][] = "mhsTempatKerja";
$proto35["m_columns"][] = "mhsAlamatTempatKerja";
$proto35["m_columns"][] = "mhsNoTelpTempatKerja";
$proto35["m_columns"][] = "mhsBeasiswa";
$proto35["m_columns"][] = "mhsWnrId";
$proto35["m_columns"][] = "mhsJlrrKode";
$proto35["m_columns"][] = "mhsNoAskes";
$proto35["m_columns"][] = "mhsNoTelp";
$proto35["m_columns"][] = "mhsNoHp";
$proto35["m_columns"][] = "mhsEmail";
$proto35["m_columns"][] = "mhsHomepage";
$proto35["m_columns"][] = "mhsFoto";
$proto35["m_columns"][] = "mhsStakmhsrKode";
$proto35["m_columns"][] = "mhsDsnPegNipPembimbingAkademik";
$proto35["m_columns"][] = "mhsSksWajib";
$proto35["m_columns"][] = "mhsSksPilihan";
$proto35["m_columns"][] = "mhsSksA";
$proto35["m_columns"][] = "mhsSksB";
$proto35["m_columns"][] = "mhsSksC";
$proto35["m_columns"][] = "mhsSksD";
$proto35["m_columns"][] = "mhsSksE";
$proto35["m_columns"][] = "mhsSksTranskrip";
$proto35["m_columns"][] = "mhsBobotTotalTranskrip";
$proto35["m_columns"][] = "mhsIpkTranskrip";
$proto35["m_columns"][] = "mhsLamaStudiSemester";
$proto35["m_columns"][] = "mhsLamaStudiBulan";
$proto35["m_columns"][] = "mhsIsTranskripAkhirDiarsipkan";
$proto35["m_columns"][] = "mhsTanggalTranskrip";
$proto35["m_columns"][] = "mhsNomorTranskrip";
$proto35["m_columns"][] = "mhsTempatLahirTranskrip";
$proto35["m_columns"][] = "mhsTanggalLahirTranskrip";
$proto35["m_columns"][] = "mhsMetodeBuildTranskrip";
$proto35["m_columns"][] = "mhsMetodePenyetaraanTranskrip";
$proto35["m_columns"][] = "mhsTahunKurikulumPenyetaraanTranskrip";
$proto35["m_columns"][] = "mhsTanggalLulus";
$proto35["m_columns"][] = "mhsNoSuratYudisium";
$proto35["m_columns"][] = "mhsTanggalSuratYudisium";
$proto35["m_columns"][] = "mhsSemIdLulus";
$proto35["m_columns"][] = "mhsTanggalIjasah";
$proto35["m_columns"][] = "mhsNoIjasah";
$proto35["m_columns"][] = "mhsKodeIjasah";
$proto35["m_columns"][] = "mhsPinIjasah";
$proto35["m_columns"][] = "mhsPrlsrId";
$proto35["m_columns"][] = "mhsPrlsrNama";
$proto35["m_columns"][] = "mhsPrlsrNamaAsing";
$proto35["m_columns"][] = "mhsWsdId";
$proto35["m_columns"][] = "mhsTanggalPengubahan";
$proto35["m_columns"][] = "mhsUnitPengubah";
$proto35["m_columns"][] = "mhsUserPengubah";
$proto35["m_columns"][] = "mhsProdiGelarKelulusan";
$proto35["m_columns"][] = "mhsSemIdMulai";
$proto35["m_columns"][] = "mhsBiayaStudi";
$proto35["m_columns"][] = "mhsPekerjaan";
$proto35["m_columns"][] = "mhsPTKerja";
$proto35["m_columns"][] = "mhsPSKerja";
$proto35["m_columns"][] = "mhsNIDNPromotor";
$proto35["m_columns"][] = "mhsKoPromotor1";
$proto35["m_columns"][] = "mhsKoPromotor2";
$proto35["m_columns"][] = "mhsKoPromotor3";
$proto35["m_columns"][] = "mhsKoPromotor4";
$proto35["m_columns"][] = "mhsProdiAsal";
$proto35["m_columns"][] = "mhsDiktiShift";
$proto35["m_columns"][] = "mhsPembayaranIpp";
$proto35["m_columns"][] = "mshNoIpp";
$proto35["m_columns"][] = "mhsPersyaratan";
$proto35["m_columns"][] = "mhsPengOrg";
$proto35["m_columns"][] = "mhsOrg";
$proto35["m_columns"][] = "mhsDomisili";
$proto35["m_columns"][] = "mhsJenisSttb";
$proto35["m_columns"][] = "mhsIsKerja";
$proto35["m_columns"][] = "mhsStatusSmta";
$proto35["m_columns"][] = "mhsAkreditasi";
$proto35["m_columns"][] = "mhsKerja";
$proto35["m_columns"][] = "mhsSaudaraLk";
$proto35["m_columns"][] = "mhsSaudaraPr";
$proto35["m_columns"][] = "mhsHobi";
$proto35["m_columns"][] = "mhsSmtaLain";
$proto35["m_columns"][] = "mhsAkreditasiSmta";
$proto35["m_columns"][] = "mhsBiayaKuliah";
$proto35["m_columns"][] = "MhsIdJenisSmta";
$proto35["m_columns"][] = "mhsSmtaPropinsiKode";
$proto35["m_columns"][] = "mhsEmailOld";
$proto35["m_columns"][] = "mhsNoKtp";
$proto35["m_columns"][] = "mhsNoKk";
$obj = new SQLTable($proto35);

$proto34["m_table"] = $obj;
$proto34["m_sql"] = "INNER JOIN mahasiswa ON s_krs.krsMhsNiu = mahasiswa.mhsNiu";
$proto34["m_alias"] = "";
$proto34["m_srcTableName"] = "s_krs_detil";
$proto36=array();
$proto36["m_sql"] = "s_krs.krsMhsNiu = mahasiswa.mhsNiu";
$proto36["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "krsMhsNiu",
	"m_strTable" => "s_krs",
	"m_srcTableName" => "s_krs_detil"
));

$proto36["m_column"]=$obj;
$proto36["m_contained"] = array();
$proto36["m_strCase"] = "= mahasiswa.mhsNiu";
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
$proto39["m_strName"] = "s_kelas";
$proto39["m_srcTableName"] = "s_krs_detil";
$proto39["m_columns"] = array();
$proto39["m_columns"][] = "klsId";
$proto39["m_columns"][] = "klsSemId";
$proto39["m_columns"][] = "klsMkkurId";
$proto39["m_columns"][] = "klsKodeParalel";
$proto39["m_columns"][] = "klsNama";
$proto39["m_columns"][] = "klsJumlahPesertaMin";
$proto39["m_columns"][] = "klsJumlahPesertaMax";
$proto39["m_columns"][] = "klsJumlahPesertaMaxProdiAsing";
$proto39["m_columns"][] = "klsIsBatal";
$proto39["m_columns"][] = "klsCatatan";
$proto39["m_columns"][] = "klsIsPublic";
$proto39["m_columns"][] = "klsPeserta";
$proto39["m_columns"][] = "klsMkkurIdDisetarakan";
$proto39["m_columns"][] = "klsWktkulId";
$obj = new SQLTable($proto39);

$proto38["m_table"] = $obj;
$proto38["m_sql"] = "INNER JOIN s_kelas ON s_krs_detil.krsdtKlsId = s_kelas.klsId";
$proto38["m_alias"] = "";
$proto38["m_srcTableName"] = "s_krs_detil";
$proto40=array();
$proto40["m_sql"] = "s_krs_detil.krsdtKlsId = s_kelas.klsId";
$proto40["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "krsdtKlsId",
	"m_strTable" => "s_krs_detil",
	"m_srcTableName" => "s_krs_detil"
));

$proto40["m_column"]=$obj;
$proto40["m_contained"] = array();
$proto40["m_strCase"] = "= s_kelas.klsId";
$proto40["m_havingmode"] = false;
$proto40["m_inBrackets"] = false;
$proto40["m_useAlias"] = false;
$obj = new SQLLogicalExpr($proto40);

$proto38["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto38);

$proto0["m_fromlist"][]=$obj;
												$proto42=array();
$proto42["m_link"] = "SQLL_INNERJOIN";
			$proto43=array();
$proto43["m_strName"] = "s_semester_prodi";
$proto43["m_srcTableName"] = "s_krs_detil";
$proto43["m_columns"] = array();
$proto43["m_columns"][] = "sempId";
$proto43["m_columns"][] = "sempSemId";
$proto43["m_columns"][] = "sempProdiKode";
$proto43["m_columns"][] = "sempIsAktif";
$proto43["m_columns"][] = "sempTanggalKrsMulai";
$proto43["m_columns"][] = "sempTanggalKrsSelesai";
$proto43["m_columns"][] = "sempTanggalRevisiMulai";
$proto43["m_columns"][] = "sempTanggalRevisiSelesai";
$proto43["m_columns"][] = "sempTanggalInputNilaiOnlineMulai";
$proto43["m_columns"][] = "sempTanggalInputNilaiOnlineSelesai";
$proto43["m_columns"][] = "sempTanggalInputNilaiOnline2Mulai";
$proto43["m_columns"][] = "sempTanggalInputNilaiOnline2Selesai";
$proto43["m_columns"][] = "sempBiayaPerSks";
$proto43["m_columns"][] = "sempBobotNilaiBelumKeluar";
$proto43["m_columns"][] = "sempBobotNilaiMaxBolehMengulang";
$proto43["m_columns"][] = "sempIsCekJatahSks";
$proto43["m_columns"][] = "sempIsCekPrasyaratMatakuliah";
$proto43["m_columns"][] = "sempIsCekPrasyaratIpk";
$proto43["m_columns"][] = "sempIsCekPrasyaratJumlahSks";
$proto43["m_columns"][] = "sempIsCekPrasyaratJumlahSksWajib";
$proto43["m_columns"][] = "sempIsCekPrasyaratJumlahSksPilihan";
$proto43["m_columns"][] = "sempIsCekPrasyaratJumlahSksLulus";
$proto43["m_columns"][] = "sempIsCekPrasyaratJumlahSksWajibLulus";
$proto43["m_columns"][] = "sempIsCekPrasyaratJumlahSksPilihanLulus";
$proto43["m_columns"][] = "sempIsCekMaxMengulang";
$proto43["m_columns"][] = "sempIsUseNilaiBelumKeluar";
$proto43["m_columns"][] = "sempIsUseNilaiMaxBolehMengulang";
$proto43["m_columns"][] = "sempIsCekAdministrasi";
$proto43["m_columns"][] = "sempIsCekPersetujuanKrs";
$proto43["m_columns"][] = "sempIsCekBentrokKuliah";
$proto43["m_columns"][] = "sempIsCekBentrokUjian";
$proto43["m_columns"][] = "sempIsKrsHitungSksTeoriSaja";
$proto43["m_columns"][] = "sempSksDefault";
$proto43["m_columns"][] = "sempSksMaksimal";
$proto43["m_columns"][] = "sempIsPaket";
$proto43["m_columns"][] = "sempIsPaketSemester";
$obj = new SQLTable($proto43);

$proto42["m_table"] = $obj;
$proto42["m_sql"] = "INNER JOIN s_semester_prodi ON s_krs.krsSempId = s_semester_prodi.sempId";
$proto42["m_alias"] = "";
$proto42["m_srcTableName"] = "s_krs_detil";
$proto44=array();
$proto44["m_sql"] = "s_krs.krsSempId = s_semester_prodi.sempId";
$proto44["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "krsSempId",
	"m_strTable" => "s_krs",
	"m_srcTableName" => "s_krs_detil"
));

$proto44["m_column"]=$obj;
$proto44["m_contained"] = array();
$proto44["m_strCase"] = "= s_semester_prodi.sempId";
$proto44["m_havingmode"] = false;
$proto44["m_inBrackets"] = false;
$proto44["m_useAlias"] = false;
$obj = new SQLLogicalExpr($proto44);

$proto42["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto42);

$proto0["m_fromlist"][]=$obj;
												$proto46=array();
$proto46["m_link"] = "SQLL_INNERJOIN";
			$proto47=array();
$proto47["m_strName"] = "program_studi";
$proto47["m_srcTableName"] = "s_krs_detil";
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
$proto46["m_sql"] = "INNER JOIN program_studi ON mahasiswa.mhsProdiKode = program_studi.prodiKode AND s_semester_prodi.sempProdiKode = program_studi.prodiKode";
$proto46["m_alias"] = "";
$proto46["m_srcTableName"] = "s_krs_detil";
$proto48=array();
$proto48["m_sql"] = "mahasiswa.mhsProdiKode = program_studi.prodiKode AND s_semester_prodi.sempProdiKode = program_studi.prodiKode";
$proto48["m_uniontype"] = "SQLL_AND";
	$obj = new SQLNonParsed(array(
	"m_sql" => "mahasiswa.mhsProdiKode = program_studi.prodiKode AND s_semester_prodi.sempProdiKode = program_studi.prodiKode"
));

$proto48["m_column"]=$obj;
$proto48["m_contained"] = array();
						$proto50=array();
$proto50["m_sql"] = "mahasiswa.mhsProdiKode = program_studi.prodiKode";
$proto50["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "mhsProdiKode",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "s_krs_detil"
));

$proto50["m_column"]=$obj;
$proto50["m_contained"] = array();
$proto50["m_strCase"] = "= program_studi.prodiKode";
$proto50["m_havingmode"] = false;
$proto50["m_inBrackets"] = false;
$proto50["m_useAlias"] = false;
$obj = new SQLLogicalExpr($proto50);

			$proto48["m_contained"][]=$obj;
						$proto52=array();
$proto52["m_sql"] = "s_semester_prodi.sempProdiKode = program_studi.prodiKode";
$proto52["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "sempProdiKode",
	"m_strTable" => "s_semester_prodi",
	"m_srcTableName" => "s_krs_detil"
));

$proto52["m_column"]=$obj;
$proto52["m_contained"] = array();
$proto52["m_strCase"] = "= program_studi.prodiKode";
$proto52["m_havingmode"] = false;
$proto52["m_inBrackets"] = false;
$proto52["m_useAlias"] = false;
$obj = new SQLLogicalExpr($proto52);

			$proto48["m_contained"][]=$obj;
$proto48["m_strCase"] = "";
$proto48["m_havingmode"] = false;
$proto48["m_inBrackets"] = false;
$proto48["m_useAlias"] = false;
$obj = new SQLLogicalExpr($proto48);

$proto46["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto46);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
$proto0["m_srcTableName"]="s_krs_detil";		
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_s_krs_detil = createSqlQuery_s_krs_detil();


	
		;

										

$tdatas_krs_detil[".sqlquery"] = $queryData_s_krs_detil;

$tableEvents["s_krs_detil"] = new eventsBase;
$tdatas_krs_detil[".hasEvents"] = false;

?>