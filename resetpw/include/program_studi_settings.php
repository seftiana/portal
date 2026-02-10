<?php
require_once(getabspath("classes/cipherer.php"));




$tdataprogram_studi = array();
	$tdataprogram_studi[".truncateText"] = true;
	$tdataprogram_studi[".NumberOfChars"] = 80;
	$tdataprogram_studi[".ShortName"] = "program_studi";
	$tdataprogram_studi[".OwnerID"] = "";
	$tdataprogram_studi[".OriginalTable"] = "program_studi";

//	field labels
$fieldLabelsprogram_studi = array();
$fieldToolTipsprogram_studi = array();
$pageTitlesprogram_studi = array();
$placeHoldersprogram_studi = array();

if(mlang_getcurrentlang()=="English")
{
	$fieldLabelsprogram_studi["English"] = array();
	$fieldToolTipsprogram_studi["English"] = array();
	$placeHoldersprogram_studi["English"] = array();
	$pageTitlesprogram_studi["English"] = array();
	$fieldLabelsprogram_studi["English"]["prodiKode"] = "Prodi Kode";
	$fieldToolTipsprogram_studi["English"]["prodiKode"] = "";
	$placeHoldersprogram_studi["English"]["prodiKode"] = "";
	$fieldLabelsprogram_studi["English"]["prodiKodeUm"] = "Prodi Kode Um";
	$fieldToolTipsprogram_studi["English"]["prodiKodeUm"] = "";
	$placeHoldersprogram_studi["English"]["prodiKodeUm"] = "";
	$fieldLabelsprogram_studi["English"]["prodiKodeUniv"] = "Prodi Kode Univ";
	$fieldToolTipsprogram_studi["English"]["prodiKodeUniv"] = "";
	$placeHoldersprogram_studi["English"]["prodiKodeUniv"] = "";
	$fieldLabelsprogram_studi["English"]["prodiLabelNim"] = "Prodi Label Nim";
	$fieldToolTipsprogram_studi["English"]["prodiLabelNim"] = "";
	$placeHoldersprogram_studi["English"]["prodiLabelNim"] = "";
	$fieldLabelsprogram_studi["English"]["prodiJurKode"] = "Prodi Jur Kode";
	$fieldToolTipsprogram_studi["English"]["prodiJurKode"] = "";
	$placeHoldersprogram_studi["English"]["prodiJurKode"] = "";
	$fieldLabelsprogram_studi["English"]["prodiFakKode"] = "Prodi Fak Kode";
	$fieldToolTipsprogram_studi["English"]["prodiFakKode"] = "";
	$placeHoldersprogram_studi["English"]["prodiFakKode"] = "";
	$fieldLabelsprogram_studi["English"]["prodiNamaResmi"] = "Prodi Nama Resmi";
	$fieldToolTipsprogram_studi["English"]["prodiNamaResmi"] = "";
	$placeHoldersprogram_studi["English"]["prodiNamaResmi"] = "";
	$fieldLabelsprogram_studi["English"]["prodiNamaSingkat"] = "Prodi Nama Singkat";
	$fieldToolTipsprogram_studi["English"]["prodiNamaSingkat"] = "";
	$placeHoldersprogram_studi["English"]["prodiNamaSingkat"] = "";
	$fieldLabelsprogram_studi["English"]["prodiNamaAsing"] = "Prodi Nama Asing";
	$fieldToolTipsprogram_studi["English"]["prodiNamaAsing"] = "";
	$placeHoldersprogram_studi["English"]["prodiNamaAsing"] = "";
	$fieldLabelsprogram_studi["English"]["prodiNamaJenjang"] = "Prodi Nama Jenjang";
	$fieldToolTipsprogram_studi["English"]["prodiNamaJenjang"] = "";
	$placeHoldersprogram_studi["English"]["prodiNamaJenjang"] = "";
	$fieldLabelsprogram_studi["English"]["prodiJjarKode"] = "Prodi Jjar Kode";
	$fieldToolTipsprogram_studi["English"]["prodiJjarKode"] = "";
	$placeHoldersprogram_studi["English"]["prodiJjarKode"] = "";
	$fieldLabelsprogram_studi["English"]["prodiModelrId"] = "Prodi Modelr Id";
	$fieldToolTipsprogram_studi["English"]["prodiModelrId"] = "";
	$placeHoldersprogram_studi["English"]["prodiModelrId"] = "";
	if (count($fieldToolTipsprogram_studi["English"]))
		$tdataprogram_studi[".isUseToolTips"] = true;
}
if(mlang_getcurrentlang()=="")
{
	$fieldLabelsprogram_studi[""] = array();
	$fieldToolTipsprogram_studi[""] = array();
	$placeHoldersprogram_studi[""] = array();
	$pageTitlesprogram_studi[""] = array();
	$fieldLabelsprogram_studi[""]["prodiKode"] = "Prodi Kode";
	$fieldToolTipsprogram_studi[""]["prodiKode"] = "";
	$placeHoldersprogram_studi[""]["prodiKode"] = "";
	$fieldLabelsprogram_studi[""]["prodiKodeUm"] = "Prodi Kode Um";
	$fieldToolTipsprogram_studi[""]["prodiKodeUm"] = "";
	$placeHoldersprogram_studi[""]["prodiKodeUm"] = "";
	$fieldLabelsprogram_studi[""]["prodiKodeUniv"] = "Prodi Kode Univ";
	$fieldToolTipsprogram_studi[""]["prodiKodeUniv"] = "";
	$placeHoldersprogram_studi[""]["prodiKodeUniv"] = "";
	$fieldLabelsprogram_studi[""]["prodiLabelNim"] = "Prodi Label Nim";
	$fieldToolTipsprogram_studi[""]["prodiLabelNim"] = "";
	$placeHoldersprogram_studi[""]["prodiLabelNim"] = "";
	$fieldLabelsprogram_studi[""]["prodiJurKode"] = "Prodi Jur Kode";
	$fieldToolTipsprogram_studi[""]["prodiJurKode"] = "";
	$placeHoldersprogram_studi[""]["prodiJurKode"] = "";
	$fieldLabelsprogram_studi[""]["prodiFakKode"] = "Prodi Fak Kode";
	$fieldToolTipsprogram_studi[""]["prodiFakKode"] = "";
	$placeHoldersprogram_studi[""]["prodiFakKode"] = "";
	$fieldLabelsprogram_studi[""]["prodiNamaResmi"] = "Prodi Nama Resmi";
	$fieldToolTipsprogram_studi[""]["prodiNamaResmi"] = "";
	$placeHoldersprogram_studi[""]["prodiNamaResmi"] = "";
	$fieldLabelsprogram_studi[""]["prodiNamaSingkat"] = "Prodi Nama Singkat";
	$fieldToolTipsprogram_studi[""]["prodiNamaSingkat"] = "";
	$placeHoldersprogram_studi[""]["prodiNamaSingkat"] = "";
	$fieldLabelsprogram_studi[""]["prodiNamaAsing"] = "Prodi Nama Asing";
	$fieldToolTipsprogram_studi[""]["prodiNamaAsing"] = "";
	$placeHoldersprogram_studi[""]["prodiNamaAsing"] = "";
	$fieldLabelsprogram_studi[""]["prodiNamaJenjang"] = "Prodi Nama Jenjang";
	$fieldToolTipsprogram_studi[""]["prodiNamaJenjang"] = "";
	$placeHoldersprogram_studi[""]["prodiNamaJenjang"] = "";
	$fieldLabelsprogram_studi[""]["prodiJjarKode"] = "Prodi Jjar Kode";
	$fieldToolTipsprogram_studi[""]["prodiJjarKode"] = "";
	$placeHoldersprogram_studi[""]["prodiJjarKode"] = "";
	$fieldLabelsprogram_studi[""]["prodiModelrId"] = "Prodi Modelr Id";
	$fieldToolTipsprogram_studi[""]["prodiModelrId"] = "";
	$placeHoldersprogram_studi[""]["prodiModelrId"] = "";
	if (count($fieldToolTipsprogram_studi[""]))
		$tdataprogram_studi[".isUseToolTips"] = true;
}


	$tdataprogram_studi[".NCSearch"] = true;



$tdataprogram_studi[".shortTableName"] = "program_studi";
$tdataprogram_studi[".nSecOptions"] = 0;
$tdataprogram_studi[".recsPerRowPrint"] = 1;
$tdataprogram_studi[".mainTableOwnerID"] = "";
$tdataprogram_studi[".moveNext"] = 1;
$tdataprogram_studi[".entityType"] = 0;

$tdataprogram_studi[".strOriginalTableName"] = "program_studi";

	



$tdataprogram_studi[".showAddInPopup"] = false;

$tdataprogram_studi[".showEditInPopup"] = false;

$tdataprogram_studi[".showViewInPopup"] = false;

//page's base css files names
$popupPagesLayoutNames = array();
$tdataprogram_studi[".popupPagesLayoutNames"] = $popupPagesLayoutNames;


$tdataprogram_studi[".fieldsForRegister"] = array();

$tdataprogram_studi[".listAjax"] = false;

	$tdataprogram_studi[".audit"] = false;

	$tdataprogram_studi[".locking"] = false;






$tdataprogram_studi[".reorderRecordsByHeader"] = true;








$tdataprogram_studi[".showSimpleSearchOptions"] = false;

// Allow Show/Hide Fields in GRID
$tdataprogram_studi[".allowShowHideFields"] = false;
//

// Allow Fields Reordering in GRID
$tdataprogram_studi[".allowFieldsReordering"] = false;
//

// search Saving settings
$tdataprogram_studi[".searchSaving"] = false;
//

$tdataprogram_studi[".showSearchPanel"] = true;
		$tdataprogram_studi[".flexibleSearch"] = true;

$tdataprogram_studi[".isUseAjaxSuggest"] = true;

$tdataprogram_studi[".rowHighlite"] = true;





$tdataprogram_studi[".ajaxCodeSnippetAdded"] = false;

$tdataprogram_studi[".buttonsAdded"] = false;

$tdataprogram_studi[".addPageEvents"] = false;

// use timepicker for search panel
$tdataprogram_studi[".isUseTimeForSearch"] = false;



$tdataprogram_studi[".badgeColor"] = "778899";


$tdataprogram_studi[".allSearchFields"] = array();
$tdataprogram_studi[".filterFields"] = array();
$tdataprogram_studi[".requiredSearchFields"] = array();



$tdataprogram_studi[".googleLikeFields"] = array();
$tdataprogram_studi[".googleLikeFields"][] = "prodiKode";
$tdataprogram_studi[".googleLikeFields"][] = "prodiKodeUm";
$tdataprogram_studi[".googleLikeFields"][] = "prodiKodeUniv";
$tdataprogram_studi[".googleLikeFields"][] = "prodiLabelNim";
$tdataprogram_studi[".googleLikeFields"][] = "prodiJurKode";
$tdataprogram_studi[".googleLikeFields"][] = "prodiFakKode";
$tdataprogram_studi[".googleLikeFields"][] = "prodiNamaResmi";
$tdataprogram_studi[".googleLikeFields"][] = "prodiNamaSingkat";
$tdataprogram_studi[".googleLikeFields"][] = "prodiNamaAsing";
$tdataprogram_studi[".googleLikeFields"][] = "prodiNamaJenjang";
$tdataprogram_studi[".googleLikeFields"][] = "prodiJjarKode";
$tdataprogram_studi[".googleLikeFields"][] = "prodiModelrId";



$tdataprogram_studi[".tableType"] = "list";

$tdataprogram_studi[".printerPageOrientation"] = 0;
$tdataprogram_studi[".nPrinterPageScale"] = 100;

$tdataprogram_studi[".nPrinterSplitRecords"] = 40;

$tdataprogram_studi[".nPrinterPDFSplitRecords"] = 40;



$tdataprogram_studi[".geocodingEnabled"] = false;





$tdataprogram_studi[".listGridLayout"] = 3;





// view page pdf

// print page pdf


$tdataprogram_studi[".pageSize"] = 20;

$tdataprogram_studi[".warnLeavingPages"] = true;



$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdataprogram_studi[".strOrderBy"] = $tstrOrderBy;

$tdataprogram_studi[".orderindexes"] = array();

$tdataprogram_studi[".sqlHead"] = "SELECT prodiKode,  	prodiKodeUm,  	prodiKodeUniv,  	prodiLabelNim,  	prodiJurKode,  	prodiFakKode,  	prodiNamaResmi,  	prodiNamaSingkat,  	prodiNamaAsing,  	prodiNamaJenjang,  	prodiJjarKode,  	prodiModelrId";
$tdataprogram_studi[".sqlFrom"] = "FROM program_studi";
$tdataprogram_studi[".sqlWhereExpr"] = "";
$tdataprogram_studi[".sqlTail"] = "";












//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdataprogram_studi[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdataprogram_studi[".arrGroupsPerPage"] = $arrGPP;

$tdataprogram_studi[".highlightSearchResults"] = true;

$tableKeysprogram_studi = array();
$tableKeysprogram_studi[] = "prodiKode";
$tdataprogram_studi[".Keys"] = $tableKeysprogram_studi;

$tdataprogram_studi[".listFields"] = array();
$tdataprogram_studi[".listFields"][] = "prodiKode";
$tdataprogram_studi[".listFields"][] = "prodiKodeUm";
$tdataprogram_studi[".listFields"][] = "prodiKodeUniv";
$tdataprogram_studi[".listFields"][] = "prodiLabelNim";
$tdataprogram_studi[".listFields"][] = "prodiJurKode";
$tdataprogram_studi[".listFields"][] = "prodiFakKode";
$tdataprogram_studi[".listFields"][] = "prodiNamaResmi";
$tdataprogram_studi[".listFields"][] = "prodiNamaSingkat";
$tdataprogram_studi[".listFields"][] = "prodiNamaAsing";
$tdataprogram_studi[".listFields"][] = "prodiNamaJenjang";
$tdataprogram_studi[".listFields"][] = "prodiJjarKode";
$tdataprogram_studi[".listFields"][] = "prodiModelrId";

$tdataprogram_studi[".hideMobileList"] = array();


$tdataprogram_studi[".viewFields"] = array();
$tdataprogram_studi[".viewFields"][] = "prodiKode";
$tdataprogram_studi[".viewFields"][] = "prodiKodeUm";
$tdataprogram_studi[".viewFields"][] = "prodiKodeUniv";
$tdataprogram_studi[".viewFields"][] = "prodiLabelNim";
$tdataprogram_studi[".viewFields"][] = "prodiJurKode";
$tdataprogram_studi[".viewFields"][] = "prodiFakKode";
$tdataprogram_studi[".viewFields"][] = "prodiNamaResmi";
$tdataprogram_studi[".viewFields"][] = "prodiNamaSingkat";
$tdataprogram_studi[".viewFields"][] = "prodiNamaAsing";
$tdataprogram_studi[".viewFields"][] = "prodiNamaJenjang";
$tdataprogram_studi[".viewFields"][] = "prodiJjarKode";
$tdataprogram_studi[".viewFields"][] = "prodiModelrId";

$tdataprogram_studi[".addFields"] = array();
$tdataprogram_studi[".addFields"][] = "prodiKode";
$tdataprogram_studi[".addFields"][] = "prodiKodeUm";
$tdataprogram_studi[".addFields"][] = "prodiKodeUniv";
$tdataprogram_studi[".addFields"][] = "prodiLabelNim";
$tdataprogram_studi[".addFields"][] = "prodiJurKode";
$tdataprogram_studi[".addFields"][] = "prodiFakKode";
$tdataprogram_studi[".addFields"][] = "prodiNamaResmi";
$tdataprogram_studi[".addFields"][] = "prodiNamaSingkat";
$tdataprogram_studi[".addFields"][] = "prodiNamaAsing";
$tdataprogram_studi[".addFields"][] = "prodiNamaJenjang";
$tdataprogram_studi[".addFields"][] = "prodiJjarKode";
$tdataprogram_studi[".addFields"][] = "prodiModelrId";

$tdataprogram_studi[".masterListFields"] = array();
$tdataprogram_studi[".masterListFields"][] = "prodiKode";
$tdataprogram_studi[".masterListFields"][] = "prodiKodeUm";
$tdataprogram_studi[".masterListFields"][] = "prodiKodeUniv";
$tdataprogram_studi[".masterListFields"][] = "prodiLabelNim";
$tdataprogram_studi[".masterListFields"][] = "prodiJurKode";
$tdataprogram_studi[".masterListFields"][] = "prodiFakKode";
$tdataprogram_studi[".masterListFields"][] = "prodiNamaResmi";
$tdataprogram_studi[".masterListFields"][] = "prodiNamaSingkat";
$tdataprogram_studi[".masterListFields"][] = "prodiNamaAsing";
$tdataprogram_studi[".masterListFields"][] = "prodiNamaJenjang";
$tdataprogram_studi[".masterListFields"][] = "prodiJjarKode";
$tdataprogram_studi[".masterListFields"][] = "prodiModelrId";

$tdataprogram_studi[".inlineAddFields"] = array();
$tdataprogram_studi[".inlineAddFields"][] = "prodiKode";
$tdataprogram_studi[".inlineAddFields"][] = "prodiKodeUm";
$tdataprogram_studi[".inlineAddFields"][] = "prodiKodeUniv";
$tdataprogram_studi[".inlineAddFields"][] = "prodiLabelNim";
$tdataprogram_studi[".inlineAddFields"][] = "prodiJurKode";
$tdataprogram_studi[".inlineAddFields"][] = "prodiFakKode";
$tdataprogram_studi[".inlineAddFields"][] = "prodiNamaResmi";
$tdataprogram_studi[".inlineAddFields"][] = "prodiNamaSingkat";
$tdataprogram_studi[".inlineAddFields"][] = "prodiNamaAsing";
$tdataprogram_studi[".inlineAddFields"][] = "prodiNamaJenjang";
$tdataprogram_studi[".inlineAddFields"][] = "prodiJjarKode";
$tdataprogram_studi[".inlineAddFields"][] = "prodiModelrId";

$tdataprogram_studi[".editFields"] = array();
$tdataprogram_studi[".editFields"][] = "prodiKode";
$tdataprogram_studi[".editFields"][] = "prodiKodeUm";
$tdataprogram_studi[".editFields"][] = "prodiKodeUniv";
$tdataprogram_studi[".editFields"][] = "prodiLabelNim";
$tdataprogram_studi[".editFields"][] = "prodiJurKode";
$tdataprogram_studi[".editFields"][] = "prodiFakKode";
$tdataprogram_studi[".editFields"][] = "prodiNamaResmi";
$tdataprogram_studi[".editFields"][] = "prodiNamaSingkat";
$tdataprogram_studi[".editFields"][] = "prodiNamaAsing";
$tdataprogram_studi[".editFields"][] = "prodiNamaJenjang";
$tdataprogram_studi[".editFields"][] = "prodiJjarKode";
$tdataprogram_studi[".editFields"][] = "prodiModelrId";

$tdataprogram_studi[".inlineEditFields"] = array();
$tdataprogram_studi[".inlineEditFields"][] = "prodiKode";
$tdataprogram_studi[".inlineEditFields"][] = "prodiKodeUm";
$tdataprogram_studi[".inlineEditFields"][] = "prodiKodeUniv";
$tdataprogram_studi[".inlineEditFields"][] = "prodiLabelNim";
$tdataprogram_studi[".inlineEditFields"][] = "prodiJurKode";
$tdataprogram_studi[".inlineEditFields"][] = "prodiFakKode";
$tdataprogram_studi[".inlineEditFields"][] = "prodiNamaResmi";
$tdataprogram_studi[".inlineEditFields"][] = "prodiNamaSingkat";
$tdataprogram_studi[".inlineEditFields"][] = "prodiNamaAsing";
$tdataprogram_studi[".inlineEditFields"][] = "prodiNamaJenjang";
$tdataprogram_studi[".inlineEditFields"][] = "prodiJjarKode";
$tdataprogram_studi[".inlineEditFields"][] = "prodiModelrId";

$tdataprogram_studi[".updateSelectedFields"] = array();
$tdataprogram_studi[".updateSelectedFields"][] = "prodiKode";
$tdataprogram_studi[".updateSelectedFields"][] = "prodiKodeUm";
$tdataprogram_studi[".updateSelectedFields"][] = "prodiKodeUniv";
$tdataprogram_studi[".updateSelectedFields"][] = "prodiLabelNim";
$tdataprogram_studi[".updateSelectedFields"][] = "prodiJurKode";
$tdataprogram_studi[".updateSelectedFields"][] = "prodiFakKode";
$tdataprogram_studi[".updateSelectedFields"][] = "prodiNamaResmi";
$tdataprogram_studi[".updateSelectedFields"][] = "prodiNamaSingkat";
$tdataprogram_studi[".updateSelectedFields"][] = "prodiNamaAsing";
$tdataprogram_studi[".updateSelectedFields"][] = "prodiNamaJenjang";
$tdataprogram_studi[".updateSelectedFields"][] = "prodiJjarKode";
$tdataprogram_studi[".updateSelectedFields"][] = "prodiModelrId";


$tdataprogram_studi[".exportFields"] = array();
$tdataprogram_studi[".exportFields"][] = "prodiKode";
$tdataprogram_studi[".exportFields"][] = "prodiKodeUm";
$tdataprogram_studi[".exportFields"][] = "prodiKodeUniv";
$tdataprogram_studi[".exportFields"][] = "prodiLabelNim";
$tdataprogram_studi[".exportFields"][] = "prodiJurKode";
$tdataprogram_studi[".exportFields"][] = "prodiFakKode";
$tdataprogram_studi[".exportFields"][] = "prodiNamaResmi";
$tdataprogram_studi[".exportFields"][] = "prodiNamaSingkat";
$tdataprogram_studi[".exportFields"][] = "prodiNamaAsing";
$tdataprogram_studi[".exportFields"][] = "prodiNamaJenjang";
$tdataprogram_studi[".exportFields"][] = "prodiJjarKode";
$tdataprogram_studi[".exportFields"][] = "prodiModelrId";

$tdataprogram_studi[".importFields"] = array();
$tdataprogram_studi[".importFields"][] = "prodiKode";
$tdataprogram_studi[".importFields"][] = "prodiKodeUm";
$tdataprogram_studi[".importFields"][] = "prodiKodeUniv";
$tdataprogram_studi[".importFields"][] = "prodiLabelNim";
$tdataprogram_studi[".importFields"][] = "prodiJurKode";
$tdataprogram_studi[".importFields"][] = "prodiFakKode";
$tdataprogram_studi[".importFields"][] = "prodiNamaResmi";
$tdataprogram_studi[".importFields"][] = "prodiNamaSingkat";
$tdataprogram_studi[".importFields"][] = "prodiNamaAsing";
$tdataprogram_studi[".importFields"][] = "prodiNamaJenjang";
$tdataprogram_studi[".importFields"][] = "prodiJjarKode";
$tdataprogram_studi[".importFields"][] = "prodiModelrId";

$tdataprogram_studi[".printFields"] = array();
$tdataprogram_studi[".printFields"][] = "prodiKode";
$tdataprogram_studi[".printFields"][] = "prodiKodeUm";
$tdataprogram_studi[".printFields"][] = "prodiKodeUniv";
$tdataprogram_studi[".printFields"][] = "prodiLabelNim";
$tdataprogram_studi[".printFields"][] = "prodiJurKode";
$tdataprogram_studi[".printFields"][] = "prodiFakKode";
$tdataprogram_studi[".printFields"][] = "prodiNamaResmi";
$tdataprogram_studi[".printFields"][] = "prodiNamaSingkat";
$tdataprogram_studi[".printFields"][] = "prodiNamaAsing";
$tdataprogram_studi[".printFields"][] = "prodiNamaJenjang";
$tdataprogram_studi[".printFields"][] = "prodiJjarKode";
$tdataprogram_studi[".printFields"][] = "prodiModelrId";


//	prodiKode
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "prodiKode";
	$fdata["GoodName"] = "prodiKode";
	$fdata["ownerTable"] = "program_studi";
	$fdata["Label"] = GetFieldLabel("program_studi","prodiKode");
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

		$fdata["strField"] = "prodiKode";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "prodiKode";

	
	
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








	$tdataprogram_studi["prodiKode"] = $fdata;
//	prodiKodeUm
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "prodiKodeUm";
	$fdata["GoodName"] = "prodiKodeUm";
	$fdata["ownerTable"] = "program_studi";
	$fdata["Label"] = GetFieldLabel("program_studi","prodiKodeUm");
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

		$fdata["strField"] = "prodiKodeUm";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "prodiKodeUm";

	
	
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
			$edata["EditParams"].= " maxlength=10";

		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;








	$tdataprogram_studi["prodiKodeUm"] = $fdata;
//	prodiKodeUniv
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "prodiKodeUniv";
	$fdata["GoodName"] = "prodiKodeUniv";
	$fdata["ownerTable"] = "program_studi";
	$fdata["Label"] = GetFieldLabel("program_studi","prodiKodeUniv");
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

		$fdata["strField"] = "prodiKodeUniv";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "prodiKodeUniv";

	
	
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
			$edata["EditParams"].= " maxlength=10";

		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;








	$tdataprogram_studi["prodiKodeUniv"] = $fdata;
//	prodiLabelNim
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "prodiLabelNim";
	$fdata["GoodName"] = "prodiLabelNim";
	$fdata["ownerTable"] = "program_studi";
	$fdata["Label"] = GetFieldLabel("program_studi","prodiLabelNim");
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

		$fdata["strField"] = "prodiLabelNim";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "prodiLabelNim";

	
	
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
			$edata["EditParams"].= " maxlength=5";

		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;








	$tdataprogram_studi["prodiLabelNim"] = $fdata;
//	prodiJurKode
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "prodiJurKode";
	$fdata["GoodName"] = "prodiJurKode";
	$fdata["ownerTable"] = "program_studi";
	$fdata["Label"] = GetFieldLabel("program_studi","prodiJurKode");
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

		$fdata["strField"] = "prodiJurKode";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "prodiJurKode";

	
	
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
	$edata["LookupTable"] = "jurusan";
	$edata["LookupConnId"] = "gtportal_dev_at_localhost";
		$edata["autoCompleteFieldsOnEdit"] = 0;
	$edata["autoCompleteFields"] = array();
		$edata["LCType"] = 0;

	
		
	$edata["LinkField"] = "jurKode";
	$edata["LinkFieldType"] = 2;
	$edata["DisplayField"] = "jurKode";
	
	

	
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








	$tdataprogram_studi["prodiJurKode"] = $fdata;
//	prodiFakKode
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 6;
	$fdata["strName"] = "prodiFakKode";
	$fdata["GoodName"] = "prodiFakKode";
	$fdata["ownerTable"] = "program_studi";
	$fdata["Label"] = GetFieldLabel("program_studi","prodiFakKode");
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

		$fdata["strField"] = "prodiFakKode";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "prodiFakKode";

	
	
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
	$edata["LookupTable"] = "fakultas";
	$edata["LookupConnId"] = "gtportal_dev_at_localhost";
		$edata["autoCompleteFieldsOnEdit"] = 0;
	$edata["autoCompleteFields"] = array();
		$edata["LCType"] = 0;

	
		
	$edata["LinkField"] = "fakKode";
	$edata["LinkFieldType"] = 2;
	$edata["DisplayField"] = "fakKode";
	
	

	
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








	$tdataprogram_studi["prodiFakKode"] = $fdata;
//	prodiNamaResmi
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 7;
	$fdata["strName"] = "prodiNamaResmi";
	$fdata["GoodName"] = "prodiNamaResmi";
	$fdata["ownerTable"] = "program_studi";
	$fdata["Label"] = GetFieldLabel("program_studi","prodiNamaResmi");
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

		$fdata["strField"] = "prodiNamaResmi";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "prodiNamaResmi";

	
	
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








	$tdataprogram_studi["prodiNamaResmi"] = $fdata;
//	prodiNamaSingkat
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 8;
	$fdata["strName"] = "prodiNamaSingkat";
	$fdata["GoodName"] = "prodiNamaSingkat";
	$fdata["ownerTable"] = "program_studi";
	$fdata["Label"] = GetFieldLabel("program_studi","prodiNamaSingkat");
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

		$fdata["strField"] = "prodiNamaSingkat";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "prodiNamaSingkat";

	
	
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








	$tdataprogram_studi["prodiNamaSingkat"] = $fdata;
//	prodiNamaAsing
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 9;
	$fdata["strName"] = "prodiNamaAsing";
	$fdata["GoodName"] = "prodiNamaAsing";
	$fdata["ownerTable"] = "program_studi";
	$fdata["Label"] = GetFieldLabel("program_studi","prodiNamaAsing");
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

		$fdata["strField"] = "prodiNamaAsing";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "prodiNamaAsing";

	
	
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








	$tdataprogram_studi["prodiNamaAsing"] = $fdata;
//	prodiNamaJenjang
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 10;
	$fdata["strName"] = "prodiNamaJenjang";
	$fdata["GoodName"] = "prodiNamaJenjang";
	$fdata["ownerTable"] = "program_studi";
	$fdata["Label"] = GetFieldLabel("program_studi","prodiNamaJenjang");
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

		$fdata["strField"] = "prodiNamaJenjang";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "prodiNamaJenjang";

	
	
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








	$tdataprogram_studi["prodiNamaJenjang"] = $fdata;
//	prodiJjarKode
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 11;
	$fdata["strName"] = "prodiJjarKode";
	$fdata["GoodName"] = "prodiJjarKode";
	$fdata["ownerTable"] = "program_studi";
	$fdata["Label"] = GetFieldLabel("program_studi","prodiJjarKode");
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

		$fdata["strField"] = "prodiJjarKode";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "prodiJjarKode";

	
	
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
	$edata["LookupTable"] = "jenjang_akademik_ref";
	$edata["LookupConnId"] = "gtportal_dev_at_localhost";
		$edata["autoCompleteFieldsOnEdit"] = 0;
	$edata["autoCompleteFields"] = array();
		$edata["LCType"] = 0;

	
		
	$edata["LinkField"] = "jjarKode";
	$edata["LinkFieldType"] = 200;
	$edata["DisplayField"] = "jjarKode";
	
	

	
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








	$tdataprogram_studi["prodiJjarKode"] = $fdata;
//	prodiModelrId
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 12;
	$fdata["strName"] = "prodiModelrId";
	$fdata["GoodName"] = "prodiModelrId";
	$fdata["ownerTable"] = "program_studi";
	$fdata["Label"] = GetFieldLabel("program_studi","prodiModelrId");
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

		$fdata["strField"] = "prodiModelrId";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "prodiModelrId";

	
	
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
	$edata["LookupTable"] = "model_ref";
	$edata["LookupConnId"] = "gtportal_dev_at_localhost";
		$edata["autoCompleteFieldsOnEdit"] = 0;
	$edata["autoCompleteFields"] = array();
		$edata["LCType"] = 0;

	
		
	$edata["LinkField"] = "modelrId";
	$edata["LinkFieldType"] = 2;
	$edata["DisplayField"] = "modelrId";
	
	

	
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








	$tdataprogram_studi["prodiModelrId"] = $fdata;


$tables_data["program_studi"]=&$tdataprogram_studi;
$field_labels["program_studi"] = &$fieldLabelsprogram_studi;
$fieldToolTips["program_studi"] = &$fieldToolTipsprogram_studi;
$placeHolders["program_studi"] = &$placeHoldersprogram_studi;
$page_titles["program_studi"] = &$pageTitlesprogram_studi;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["program_studi"] = array();

// tables which are master tables for current table (detail)
$masterTablesData["program_studi"] = array();


// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_program_studi()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "prodiKode,  	prodiKodeUm,  	prodiKodeUniv,  	prodiLabelNim,  	prodiJurKode,  	prodiFakKode,  	prodiNamaResmi,  	prodiNamaSingkat,  	prodiNamaAsing,  	prodiNamaJenjang,  	prodiJjarKode,  	prodiModelrId";
$proto0["m_strFrom"] = "FROM program_studi";
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
	"m_strName" => "prodiKode",
	"m_strTable" => "program_studi",
	"m_srcTableName" => "program_studi"
));

$proto6["m_sql"] = "prodiKode";
$proto6["m_srcTableName"] = "program_studi";
$proto6["m_expr"]=$obj;
$proto6["m_alias"] = "";
$obj = new SQLFieldListItem($proto6);

$proto0["m_fieldlist"][]=$obj;
						$proto8=array();
			$obj = new SQLField(array(
	"m_strName" => "prodiKodeUm",
	"m_strTable" => "program_studi",
	"m_srcTableName" => "program_studi"
));

$proto8["m_sql"] = "prodiKodeUm";
$proto8["m_srcTableName"] = "program_studi";
$proto8["m_expr"]=$obj;
$proto8["m_alias"] = "";
$obj = new SQLFieldListItem($proto8);

$proto0["m_fieldlist"][]=$obj;
						$proto10=array();
			$obj = new SQLField(array(
	"m_strName" => "prodiKodeUniv",
	"m_strTable" => "program_studi",
	"m_srcTableName" => "program_studi"
));

$proto10["m_sql"] = "prodiKodeUniv";
$proto10["m_srcTableName"] = "program_studi";
$proto10["m_expr"]=$obj;
$proto10["m_alias"] = "";
$obj = new SQLFieldListItem($proto10);

$proto0["m_fieldlist"][]=$obj;
						$proto12=array();
			$obj = new SQLField(array(
	"m_strName" => "prodiLabelNim",
	"m_strTable" => "program_studi",
	"m_srcTableName" => "program_studi"
));

$proto12["m_sql"] = "prodiLabelNim";
$proto12["m_srcTableName"] = "program_studi";
$proto12["m_expr"]=$obj;
$proto12["m_alias"] = "";
$obj = new SQLFieldListItem($proto12);

$proto0["m_fieldlist"][]=$obj;
						$proto14=array();
			$obj = new SQLField(array(
	"m_strName" => "prodiJurKode",
	"m_strTable" => "program_studi",
	"m_srcTableName" => "program_studi"
));

$proto14["m_sql"] = "prodiJurKode";
$proto14["m_srcTableName"] = "program_studi";
$proto14["m_expr"]=$obj;
$proto14["m_alias"] = "";
$obj = new SQLFieldListItem($proto14);

$proto0["m_fieldlist"][]=$obj;
						$proto16=array();
			$obj = new SQLField(array(
	"m_strName" => "prodiFakKode",
	"m_strTable" => "program_studi",
	"m_srcTableName" => "program_studi"
));

$proto16["m_sql"] = "prodiFakKode";
$proto16["m_srcTableName"] = "program_studi";
$proto16["m_expr"]=$obj;
$proto16["m_alias"] = "";
$obj = new SQLFieldListItem($proto16);

$proto0["m_fieldlist"][]=$obj;
						$proto18=array();
			$obj = new SQLField(array(
	"m_strName" => "prodiNamaResmi",
	"m_strTable" => "program_studi",
	"m_srcTableName" => "program_studi"
));

$proto18["m_sql"] = "prodiNamaResmi";
$proto18["m_srcTableName"] = "program_studi";
$proto18["m_expr"]=$obj;
$proto18["m_alias"] = "";
$obj = new SQLFieldListItem($proto18);

$proto0["m_fieldlist"][]=$obj;
						$proto20=array();
			$obj = new SQLField(array(
	"m_strName" => "prodiNamaSingkat",
	"m_strTable" => "program_studi",
	"m_srcTableName" => "program_studi"
));

$proto20["m_sql"] = "prodiNamaSingkat";
$proto20["m_srcTableName"] = "program_studi";
$proto20["m_expr"]=$obj;
$proto20["m_alias"] = "";
$obj = new SQLFieldListItem($proto20);

$proto0["m_fieldlist"][]=$obj;
						$proto22=array();
			$obj = new SQLField(array(
	"m_strName" => "prodiNamaAsing",
	"m_strTable" => "program_studi",
	"m_srcTableName" => "program_studi"
));

$proto22["m_sql"] = "prodiNamaAsing";
$proto22["m_srcTableName"] = "program_studi";
$proto22["m_expr"]=$obj;
$proto22["m_alias"] = "";
$obj = new SQLFieldListItem($proto22);

$proto0["m_fieldlist"][]=$obj;
						$proto24=array();
			$obj = new SQLField(array(
	"m_strName" => "prodiNamaJenjang",
	"m_strTable" => "program_studi",
	"m_srcTableName" => "program_studi"
));

$proto24["m_sql"] = "prodiNamaJenjang";
$proto24["m_srcTableName"] = "program_studi";
$proto24["m_expr"]=$obj;
$proto24["m_alias"] = "";
$obj = new SQLFieldListItem($proto24);

$proto0["m_fieldlist"][]=$obj;
						$proto26=array();
			$obj = new SQLField(array(
	"m_strName" => "prodiJjarKode",
	"m_strTable" => "program_studi",
	"m_srcTableName" => "program_studi"
));

$proto26["m_sql"] = "prodiJjarKode";
$proto26["m_srcTableName"] = "program_studi";
$proto26["m_expr"]=$obj;
$proto26["m_alias"] = "";
$obj = new SQLFieldListItem($proto26);

$proto0["m_fieldlist"][]=$obj;
						$proto28=array();
			$obj = new SQLField(array(
	"m_strName" => "prodiModelrId",
	"m_strTable" => "program_studi",
	"m_srcTableName" => "program_studi"
));

$proto28["m_sql"] = "prodiModelrId";
$proto28["m_srcTableName"] = "program_studi";
$proto28["m_expr"]=$obj;
$proto28["m_alias"] = "";
$obj = new SQLFieldListItem($proto28);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto30=array();
$proto30["m_link"] = "SQLL_MAIN";
			$proto31=array();
$proto31["m_strName"] = "program_studi";
$proto31["m_srcTableName"] = "program_studi";
$proto31["m_columns"] = array();
$proto31["m_columns"][] = "prodiKode";
$proto31["m_columns"][] = "prodiKodeUm";
$proto31["m_columns"][] = "prodiKodeUniv";
$proto31["m_columns"][] = "prodiLabelNim";
$proto31["m_columns"][] = "prodiJurKode";
$proto31["m_columns"][] = "prodiFakKode";
$proto31["m_columns"][] = "prodiNamaResmi";
$proto31["m_columns"][] = "prodiNamaSingkat";
$proto31["m_columns"][] = "prodiNamaAsing";
$proto31["m_columns"][] = "prodiNamaJenjang";
$proto31["m_columns"][] = "prodiJjarKode";
$proto31["m_columns"][] = "prodiModelrId";
$obj = new SQLTable($proto31);

$proto30["m_table"] = $obj;
$proto30["m_sql"] = "program_studi";
$proto30["m_alias"] = "";
$proto30["m_srcTableName"] = "program_studi";
$proto32=array();
$proto32["m_sql"] = "";
$proto32["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto32["m_column"]=$obj;
$proto32["m_contained"] = array();
$proto32["m_strCase"] = "";
$proto32["m_havingmode"] = false;
$proto32["m_inBrackets"] = false;
$proto32["m_useAlias"] = false;
$obj = new SQLLogicalExpr($proto32);

$proto30["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto30);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
$proto0["m_srcTableName"]="program_studi";		
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_program_studi = createSqlQuery_program_studi();


	
				;

												

$tdataprogram_studi[".sqlquery"] = $queryData_program_studi;

$tableEvents["program_studi"] = new eventsBase;
$tdataprogram_studi[".hasEvents"] = false;

?>