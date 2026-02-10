<?php
require_once(getabspath("classes/cipherer.php"));




$tdatas_semester = array();
	$tdatas_semester[".truncateText"] = true;
	$tdatas_semester[".NumberOfChars"] = 80;
	$tdatas_semester[".ShortName"] = "s_semester";
	$tdatas_semester[".OwnerID"] = "";
	$tdatas_semester[".OriginalTable"] = "s_semester";

//	field labels
$fieldLabelss_semester = array();
$fieldToolTipss_semester = array();
$pageTitless_semester = array();
$placeHolderss_semester = array();

if(mlang_getcurrentlang()=="English")
{
	$fieldLabelss_semester["English"] = array();
	$fieldToolTipss_semester["English"] = array();
	$placeHolderss_semester["English"] = array();
	$pageTitless_semester["English"] = array();
	$fieldLabelss_semester["English"]["semId"] = "Sem Id";
	$fieldToolTipss_semester["English"]["semId"] = "";
	$placeHolderss_semester["English"]["semId"] = "";
	$fieldLabelss_semester["English"]["semTahun"] = "Sem Tahun";
	$fieldToolTipss_semester["English"]["semTahun"] = "";
	$placeHolderss_semester["English"]["semTahun"] = "";
	$fieldLabelss_semester["English"]["semNmsemrId"] = "Sem Nmsemr Id";
	$fieldToolTipss_semester["English"]["semNmsemrId"] = "";
	$placeHolderss_semester["English"]["semNmsemrId"] = "";
	$fieldLabelss_semester["English"]["semTanggalMulai"] = "Sem Tanggal Mulai";
	$fieldToolTipss_semester["English"]["semTanggalMulai"] = "";
	$placeHolderss_semester["English"]["semTanggalMulai"] = "";
	$fieldLabelss_semester["English"]["semTanggalSelesai"] = "Sem Tanggal Selesai";
	$fieldToolTipss_semester["English"]["semTanggalSelesai"] = "";
	$placeHolderss_semester["English"]["semTanggalSelesai"] = "";
	$fieldLabelss_semester["English"]["semIsNilaiBolehDieditDariPortal"] = "Sem Is Nilai Boleh Diedit Dari Portal";
	$fieldToolTipss_semester["English"]["semIsNilaiBolehDieditDariPortal"] = "";
	$placeHolderss_semester["English"]["semIsNilaiBolehDieditDariPortal"] = "";
	$fieldLabelss_semester["English"]["semIsEditBiodataPortal"] = "Sem Is Edit Biodata Portal";
	$fieldToolTipss_semester["English"]["semIsEditBiodataPortal"] = "";
	$placeHolderss_semester["English"]["semIsEditBiodataPortal"] = "";
	if (count($fieldToolTipss_semester["English"]))
		$tdatas_semester[".isUseToolTips"] = true;
}
if(mlang_getcurrentlang()=="")
{
	$fieldLabelss_semester[""] = array();
	$fieldToolTipss_semester[""] = array();
	$placeHolderss_semester[""] = array();
	$pageTitless_semester[""] = array();
	$fieldLabelss_semester[""]["semId"] = "Sem Id";
	$fieldToolTipss_semester[""]["semId"] = "";
	$placeHolderss_semester[""]["semId"] = "";
	$fieldLabelss_semester[""]["semTahun"] = "Sem Tahun";
	$fieldToolTipss_semester[""]["semTahun"] = "";
	$placeHolderss_semester[""]["semTahun"] = "";
	$fieldLabelss_semester[""]["semNmsemrId"] = "Sem Nmsemr Id";
	$fieldToolTipss_semester[""]["semNmsemrId"] = "";
	$placeHolderss_semester[""]["semNmsemrId"] = "";
	$fieldLabelss_semester[""]["semTanggalMulai"] = "Sem Tanggal Mulai";
	$fieldToolTipss_semester[""]["semTanggalMulai"] = "";
	$placeHolderss_semester[""]["semTanggalMulai"] = "";
	$fieldLabelss_semester[""]["semTanggalSelesai"] = "Sem Tanggal Selesai";
	$fieldToolTipss_semester[""]["semTanggalSelesai"] = "";
	$placeHolderss_semester[""]["semTanggalSelesai"] = "";
	$fieldLabelss_semester[""]["semIsNilaiBolehDieditDariPortal"] = "Sem Is Nilai Boleh Diedit Dari Portal";
	$fieldToolTipss_semester[""]["semIsNilaiBolehDieditDariPortal"] = "";
	$placeHolderss_semester[""]["semIsNilaiBolehDieditDariPortal"] = "";
	$fieldLabelss_semester[""]["semIsEditBiodataPortal"] = "Sem Is Edit Biodata Portal";
	$fieldToolTipss_semester[""]["semIsEditBiodataPortal"] = "";
	$placeHolderss_semester[""]["semIsEditBiodataPortal"] = "";
	if (count($fieldToolTipss_semester[""]))
		$tdatas_semester[".isUseToolTips"] = true;
}


	$tdatas_semester[".NCSearch"] = true;



$tdatas_semester[".shortTableName"] = "s_semester";
$tdatas_semester[".nSecOptions"] = 0;
$tdatas_semester[".recsPerRowPrint"] = 1;
$tdatas_semester[".mainTableOwnerID"] = "";
$tdatas_semester[".moveNext"] = 1;
$tdatas_semester[".entityType"] = 0;

$tdatas_semester[".strOriginalTableName"] = "s_semester";

	



$tdatas_semester[".showAddInPopup"] = false;

$tdatas_semester[".showEditInPopup"] = false;

$tdatas_semester[".showViewInPopup"] = false;

//page's base css files names
$popupPagesLayoutNames = array();
$tdatas_semester[".popupPagesLayoutNames"] = $popupPagesLayoutNames;


$tdatas_semester[".fieldsForRegister"] = array();

$tdatas_semester[".listAjax"] = false;

	$tdatas_semester[".audit"] = false;

	$tdatas_semester[".locking"] = false;






$tdatas_semester[".reorderRecordsByHeader"] = true;








$tdatas_semester[".showSimpleSearchOptions"] = false;

// Allow Show/Hide Fields in GRID
$tdatas_semester[".allowShowHideFields"] = false;
//

// Allow Fields Reordering in GRID
$tdatas_semester[".allowFieldsReordering"] = false;
//

// search Saving settings
$tdatas_semester[".searchSaving"] = false;
//

$tdatas_semester[".showSearchPanel"] = true;
		$tdatas_semester[".flexibleSearch"] = true;

$tdatas_semester[".isUseAjaxSuggest"] = true;

$tdatas_semester[".rowHighlite"] = true;





$tdatas_semester[".ajaxCodeSnippetAdded"] = false;

$tdatas_semester[".buttonsAdded"] = false;

$tdatas_semester[".addPageEvents"] = false;

// use timepicker for search panel
$tdatas_semester[".isUseTimeForSearch"] = false;



$tdatas_semester[".badgeColor"] = "4682B4";


$tdatas_semester[".allSearchFields"] = array();
$tdatas_semester[".filterFields"] = array();
$tdatas_semester[".requiredSearchFields"] = array();



$tdatas_semester[".googleLikeFields"] = array();
$tdatas_semester[".googleLikeFields"][] = "semId";
$tdatas_semester[".googleLikeFields"][] = "semTahun";
$tdatas_semester[".googleLikeFields"][] = "semNmsemrId";
$tdatas_semester[".googleLikeFields"][] = "semTanggalMulai";
$tdatas_semester[".googleLikeFields"][] = "semTanggalSelesai";
$tdatas_semester[".googleLikeFields"][] = "semIsNilaiBolehDieditDariPortal";
$tdatas_semester[".googleLikeFields"][] = "semIsEditBiodataPortal";



$tdatas_semester[".tableType"] = "list";

$tdatas_semester[".printerPageOrientation"] = 0;
$tdatas_semester[".nPrinterPageScale"] = 100;

$tdatas_semester[".nPrinterSplitRecords"] = 40;

$tdatas_semester[".nPrinterPDFSplitRecords"] = 40;



$tdatas_semester[".geocodingEnabled"] = false;





$tdatas_semester[".listGridLayout"] = 3;





// view page pdf

// print page pdf


$tdatas_semester[".pageSize"] = 20;

$tdatas_semester[".warnLeavingPages"] = true;



$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatas_semester[".strOrderBy"] = $tstrOrderBy;

$tdatas_semester[".orderindexes"] = array();

$tdatas_semester[".sqlHead"] = "SELECT semId,  	semTahun,  	semNmsemrId,  	semTanggalMulai,  	semTanggalSelesai,  	semIsNilaiBolehDieditDariPortal,  	semIsEditBiodataPortal";
$tdatas_semester[".sqlFrom"] = "FROM s_semester";
$tdatas_semester[".sqlWhereExpr"] = "";
$tdatas_semester[".sqlTail"] = "";












//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatas_semester[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatas_semester[".arrGroupsPerPage"] = $arrGPP;

$tdatas_semester[".highlightSearchResults"] = true;

$tableKeyss_semester = array();
$tableKeyss_semester[] = "semId";
$tdatas_semester[".Keys"] = $tableKeyss_semester;

$tdatas_semester[".listFields"] = array();
$tdatas_semester[".listFields"][] = "semId";
$tdatas_semester[".listFields"][] = "semTahun";
$tdatas_semester[".listFields"][] = "semNmsemrId";
$tdatas_semester[".listFields"][] = "semTanggalMulai";
$tdatas_semester[".listFields"][] = "semTanggalSelesai";
$tdatas_semester[".listFields"][] = "semIsNilaiBolehDieditDariPortal";
$tdatas_semester[".listFields"][] = "semIsEditBiodataPortal";

$tdatas_semester[".hideMobileList"] = array();


$tdatas_semester[".viewFields"] = array();
$tdatas_semester[".viewFields"][] = "semId";
$tdatas_semester[".viewFields"][] = "semTahun";
$tdatas_semester[".viewFields"][] = "semNmsemrId";
$tdatas_semester[".viewFields"][] = "semTanggalMulai";
$tdatas_semester[".viewFields"][] = "semTanggalSelesai";
$tdatas_semester[".viewFields"][] = "semIsNilaiBolehDieditDariPortal";
$tdatas_semester[".viewFields"][] = "semIsEditBiodataPortal";

$tdatas_semester[".addFields"] = array();
$tdatas_semester[".addFields"][] = "semId";
$tdatas_semester[".addFields"][] = "semTahun";
$tdatas_semester[".addFields"][] = "semNmsemrId";
$tdatas_semester[".addFields"][] = "semTanggalMulai";
$tdatas_semester[".addFields"][] = "semTanggalSelesai";
$tdatas_semester[".addFields"][] = "semIsNilaiBolehDieditDariPortal";
$tdatas_semester[".addFields"][] = "semIsEditBiodataPortal";

$tdatas_semester[".masterListFields"] = array();
$tdatas_semester[".masterListFields"][] = "semId";
$tdatas_semester[".masterListFields"][] = "semTahun";
$tdatas_semester[".masterListFields"][] = "semNmsemrId";
$tdatas_semester[".masterListFields"][] = "semTanggalMulai";
$tdatas_semester[".masterListFields"][] = "semTanggalSelesai";
$tdatas_semester[".masterListFields"][] = "semIsNilaiBolehDieditDariPortal";
$tdatas_semester[".masterListFields"][] = "semIsEditBiodataPortal";

$tdatas_semester[".inlineAddFields"] = array();
$tdatas_semester[".inlineAddFields"][] = "semId";
$tdatas_semester[".inlineAddFields"][] = "semTahun";
$tdatas_semester[".inlineAddFields"][] = "semNmsemrId";
$tdatas_semester[".inlineAddFields"][] = "semTanggalMulai";
$tdatas_semester[".inlineAddFields"][] = "semTanggalSelesai";
$tdatas_semester[".inlineAddFields"][] = "semIsNilaiBolehDieditDariPortal";
$tdatas_semester[".inlineAddFields"][] = "semIsEditBiodataPortal";

$tdatas_semester[".editFields"] = array();
$tdatas_semester[".editFields"][] = "semId";
$tdatas_semester[".editFields"][] = "semTahun";
$tdatas_semester[".editFields"][] = "semNmsemrId";
$tdatas_semester[".editFields"][] = "semTanggalMulai";
$tdatas_semester[".editFields"][] = "semTanggalSelesai";
$tdatas_semester[".editFields"][] = "semIsNilaiBolehDieditDariPortal";
$tdatas_semester[".editFields"][] = "semIsEditBiodataPortal";

$tdatas_semester[".inlineEditFields"] = array();
$tdatas_semester[".inlineEditFields"][] = "semId";
$tdatas_semester[".inlineEditFields"][] = "semTahun";
$tdatas_semester[".inlineEditFields"][] = "semNmsemrId";
$tdatas_semester[".inlineEditFields"][] = "semTanggalMulai";
$tdatas_semester[".inlineEditFields"][] = "semTanggalSelesai";
$tdatas_semester[".inlineEditFields"][] = "semIsNilaiBolehDieditDariPortal";
$tdatas_semester[".inlineEditFields"][] = "semIsEditBiodataPortal";

$tdatas_semester[".updateSelectedFields"] = array();
$tdatas_semester[".updateSelectedFields"][] = "semId";
$tdatas_semester[".updateSelectedFields"][] = "semTahun";
$tdatas_semester[".updateSelectedFields"][] = "semNmsemrId";
$tdatas_semester[".updateSelectedFields"][] = "semTanggalMulai";
$tdatas_semester[".updateSelectedFields"][] = "semTanggalSelesai";
$tdatas_semester[".updateSelectedFields"][] = "semIsNilaiBolehDieditDariPortal";
$tdatas_semester[".updateSelectedFields"][] = "semIsEditBiodataPortal";


$tdatas_semester[".exportFields"] = array();
$tdatas_semester[".exportFields"][] = "semId";
$tdatas_semester[".exportFields"][] = "semTahun";
$tdatas_semester[".exportFields"][] = "semNmsemrId";
$tdatas_semester[".exportFields"][] = "semTanggalMulai";
$tdatas_semester[".exportFields"][] = "semTanggalSelesai";
$tdatas_semester[".exportFields"][] = "semIsNilaiBolehDieditDariPortal";
$tdatas_semester[".exportFields"][] = "semIsEditBiodataPortal";

$tdatas_semester[".importFields"] = array();
$tdatas_semester[".importFields"][] = "semId";
$tdatas_semester[".importFields"][] = "semTahun";
$tdatas_semester[".importFields"][] = "semNmsemrId";
$tdatas_semester[".importFields"][] = "semTanggalMulai";
$tdatas_semester[".importFields"][] = "semTanggalSelesai";
$tdatas_semester[".importFields"][] = "semIsNilaiBolehDieditDariPortal";
$tdatas_semester[".importFields"][] = "semIsEditBiodataPortal";

$tdatas_semester[".printFields"] = array();
$tdatas_semester[".printFields"][] = "semId";
$tdatas_semester[".printFields"][] = "semTahun";
$tdatas_semester[".printFields"][] = "semNmsemrId";
$tdatas_semester[".printFields"][] = "semTanggalMulai";
$tdatas_semester[".printFields"][] = "semTanggalSelesai";
$tdatas_semester[".printFields"][] = "semIsNilaiBolehDieditDariPortal";
$tdatas_semester[".printFields"][] = "semIsEditBiodataPortal";


//	semId
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "semId";
	$fdata["GoodName"] = "semId";
	$fdata["ownerTable"] = "s_semester";
	$fdata["Label"] = GetFieldLabel("s_semester","semId");
	$fdata["FieldType"] = 20;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

		$fdata["bInlineAdd"] = true;

		$fdata["bEditPage"] = true;

		$fdata["bInlineEdit"] = true;

		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

	
		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "semId";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "semId";

	
	
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








	$tdatas_semester["semId"] = $fdata;
//	semTahun
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "semTahun";
	$fdata["GoodName"] = "semTahun";
	$fdata["ownerTable"] = "s_semester";
	$fdata["Label"] = GetFieldLabel("s_semester","semTahun");
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

		$fdata["strField"] = "semTahun";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "semTahun";

	
	
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
				$edata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");
							
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;








	$tdatas_semester["semTahun"] = $fdata;
//	semNmsemrId
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "semNmsemrId";
	$fdata["GoodName"] = "semNmsemrId";
	$fdata["ownerTable"] = "s_semester";
	$fdata["Label"] = GetFieldLabel("s_semester","semNmsemrId");
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

		$fdata["strField"] = "semNmsemrId";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "semNmsemrId";

	
	
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
	$edata["LookupTable"] = "s_nama_semester_ref";
	$edata["LookupConnId"] = "gtakademik_dev_at_localhost";
		$edata["autoCompleteFieldsOnEdit"] = 0;
	$edata["autoCompleteFields"] = array();
		$edata["LCType"] = 0;

	
		
	$edata["LinkField"] = "nmsemrId";
	$edata["LinkFieldType"] = 2;
	$edata["DisplayField"] = "nmsemrId";
	
	

	
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








	$tdatas_semester["semNmsemrId"] = $fdata;
//	semTanggalMulai
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "semTanggalMulai";
	$fdata["GoodName"] = "semTanggalMulai";
	$fdata["ownerTable"] = "s_semester";
	$fdata["Label"] = GetFieldLabel("s_semester","semTanggalMulai");
	$fdata["FieldType"] = 7;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

		$fdata["bInlineAdd"] = true;

		$fdata["bEditPage"] = true;

		$fdata["bInlineEdit"] = true;

		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

	
		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "semTanggalMulai";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "semTanggalMulai";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "Short Date");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Date");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
		$edata["DateEditType"] = 13;
	$edata["InitialYearFactor"] = 100;
	$edata["LastYearFactor"] = 10;

	
	
	
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;








	$tdatas_semester["semTanggalMulai"] = $fdata;
//	semTanggalSelesai
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "semTanggalSelesai";
	$fdata["GoodName"] = "semTanggalSelesai";
	$fdata["ownerTable"] = "s_semester";
	$fdata["Label"] = GetFieldLabel("s_semester","semTanggalSelesai");
	$fdata["FieldType"] = 7;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

		$fdata["bInlineAdd"] = true;

		$fdata["bEditPage"] = true;

		$fdata["bInlineEdit"] = true;

		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

	
		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "semTanggalSelesai";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "semTanggalSelesai";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "Short Date");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Date");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
		$edata["DateEditType"] = 13;
	$edata["InitialYearFactor"] = 100;
	$edata["LastYearFactor"] = 10;

	
	
	
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;








	$tdatas_semester["semTanggalSelesai"] = $fdata;
//	semIsNilaiBolehDieditDariPortal
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 6;
	$fdata["strName"] = "semIsNilaiBolehDieditDariPortal";
	$fdata["GoodName"] = "semIsNilaiBolehDieditDariPortal";
	$fdata["ownerTable"] = "s_semester";
	$fdata["Label"] = GetFieldLabel("s_semester","semIsNilaiBolehDieditDariPortal");
	$fdata["FieldType"] = 16;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

		$fdata["bInlineAdd"] = true;

		$fdata["bEditPage"] = true;

		$fdata["bInlineEdit"] = true;

		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

	
		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "semIsNilaiBolehDieditDariPortal";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "semIsNilaiBolehDieditDariPortal";

	
	
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
				$edata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");
							
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;








	$tdatas_semester["semIsNilaiBolehDieditDariPortal"] = $fdata;
//	semIsEditBiodataPortal
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 7;
	$fdata["strName"] = "semIsEditBiodataPortal";
	$fdata["GoodName"] = "semIsEditBiodataPortal";
	$fdata["ownerTable"] = "s_semester";
	$fdata["Label"] = GetFieldLabel("s_semester","semIsEditBiodataPortal");
	$fdata["FieldType"] = 16;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

		$fdata["bInlineAdd"] = true;

		$fdata["bEditPage"] = true;

		$fdata["bInlineEdit"] = true;

		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

	
		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "semIsEditBiodataPortal";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "semIsEditBiodataPortal";

	
	
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
				$edata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");
							
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;








	$tdatas_semester["semIsEditBiodataPortal"] = $fdata;


$tables_data["s_semester"]=&$tdatas_semester;
$field_labels["s_semester"] = &$fieldLabelss_semester;
$fieldToolTips["s_semester"] = &$fieldToolTipss_semester;
$placeHolders["s_semester"] = &$placeHolderss_semester;
$page_titles["s_semester"] = &$pageTitless_semester;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["s_semester"] = array();

// tables which are master tables for current table (detail)
$masterTablesData["s_semester"] = array();


// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_s_semester()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "semId,  	semTahun,  	semNmsemrId,  	semTanggalMulai,  	semTanggalSelesai,  	semIsNilaiBolehDieditDariPortal,  	semIsEditBiodataPortal";
$proto0["m_strFrom"] = "FROM s_semester";
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
	"m_strName" => "semId",
	"m_strTable" => "s_semester",
	"m_srcTableName" => "s_semester"
));

$proto6["m_sql"] = "semId";
$proto6["m_srcTableName"] = "s_semester";
$proto6["m_expr"]=$obj;
$proto6["m_alias"] = "";
$obj = new SQLFieldListItem($proto6);

$proto0["m_fieldlist"][]=$obj;
						$proto8=array();
			$obj = new SQLField(array(
	"m_strName" => "semTahun",
	"m_strTable" => "s_semester",
	"m_srcTableName" => "s_semester"
));

$proto8["m_sql"] = "semTahun";
$proto8["m_srcTableName"] = "s_semester";
$proto8["m_expr"]=$obj;
$proto8["m_alias"] = "";
$obj = new SQLFieldListItem($proto8);

$proto0["m_fieldlist"][]=$obj;
						$proto10=array();
			$obj = new SQLField(array(
	"m_strName" => "semNmsemrId",
	"m_strTable" => "s_semester",
	"m_srcTableName" => "s_semester"
));

$proto10["m_sql"] = "semNmsemrId";
$proto10["m_srcTableName"] = "s_semester";
$proto10["m_expr"]=$obj;
$proto10["m_alias"] = "";
$obj = new SQLFieldListItem($proto10);

$proto0["m_fieldlist"][]=$obj;
						$proto12=array();
			$obj = new SQLField(array(
	"m_strName" => "semTanggalMulai",
	"m_strTable" => "s_semester",
	"m_srcTableName" => "s_semester"
));

$proto12["m_sql"] = "semTanggalMulai";
$proto12["m_srcTableName"] = "s_semester";
$proto12["m_expr"]=$obj;
$proto12["m_alias"] = "";
$obj = new SQLFieldListItem($proto12);

$proto0["m_fieldlist"][]=$obj;
						$proto14=array();
			$obj = new SQLField(array(
	"m_strName" => "semTanggalSelesai",
	"m_strTable" => "s_semester",
	"m_srcTableName" => "s_semester"
));

$proto14["m_sql"] = "semTanggalSelesai";
$proto14["m_srcTableName"] = "s_semester";
$proto14["m_expr"]=$obj;
$proto14["m_alias"] = "";
$obj = new SQLFieldListItem($proto14);

$proto0["m_fieldlist"][]=$obj;
						$proto16=array();
			$obj = new SQLField(array(
	"m_strName" => "semIsNilaiBolehDieditDariPortal",
	"m_strTable" => "s_semester",
	"m_srcTableName" => "s_semester"
));

$proto16["m_sql"] = "semIsNilaiBolehDieditDariPortal";
$proto16["m_srcTableName"] = "s_semester";
$proto16["m_expr"]=$obj;
$proto16["m_alias"] = "";
$obj = new SQLFieldListItem($proto16);

$proto0["m_fieldlist"][]=$obj;
						$proto18=array();
			$obj = new SQLField(array(
	"m_strName" => "semIsEditBiodataPortal",
	"m_strTable" => "s_semester",
	"m_srcTableName" => "s_semester"
));

$proto18["m_sql"] = "semIsEditBiodataPortal";
$proto18["m_srcTableName"] = "s_semester";
$proto18["m_expr"]=$obj;
$proto18["m_alias"] = "";
$obj = new SQLFieldListItem($proto18);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto20=array();
$proto20["m_link"] = "SQLL_MAIN";
			$proto21=array();
$proto21["m_strName"] = "s_semester";
$proto21["m_srcTableName"] = "s_semester";
$proto21["m_columns"] = array();
$proto21["m_columns"][] = "semId";
$proto21["m_columns"][] = "semTahun";
$proto21["m_columns"][] = "semNmsemrId";
$proto21["m_columns"][] = "semTanggalMulai";
$proto21["m_columns"][] = "semTanggalSelesai";
$proto21["m_columns"][] = "semIsNilaiBolehDieditDariPortal";
$proto21["m_columns"][] = "semIsEditBiodataPortal";
$obj = new SQLTable($proto21);

$proto20["m_table"] = $obj;
$proto20["m_sql"] = "s_semester";
$proto20["m_alias"] = "";
$proto20["m_srcTableName"] = "s_semester";
$proto22=array();
$proto22["m_sql"] = "";
$proto22["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto22["m_column"]=$obj;
$proto22["m_contained"] = array();
$proto22["m_strCase"] = "";
$proto22["m_havingmode"] = false;
$proto22["m_inBrackets"] = false;
$proto22["m_useAlias"] = false;
$obj = new SQLLogicalExpr($proto22);

$proto20["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto20);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
$proto0["m_srcTableName"]="s_semester";		
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_s_semester = createSqlQuery_s_semester();


	
		;

							

$tdatas_semester[".sqlquery"] = $queryData_s_semester;

$tableEvents["s_semester"] = new eventsBase;
$tdatas_semester[".hasEvents"] = false;

?>