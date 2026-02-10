<?php
require_once(getabspath("classes/cipherer.php"));




$tdatamahasiswa_akun = array();
	$tdatamahasiswa_akun[".truncateText"] = true;
	$tdatamahasiswa_akun[".NumberOfChars"] = 80;
	$tdatamahasiswa_akun[".ShortName"] = "mahasiswa_akun";
	$tdatamahasiswa_akun[".OwnerID"] = "";
	$tdatamahasiswa_akun[".OriginalTable"] = "mahasiswa_akun";

//	field labels
$fieldLabelsmahasiswa_akun = array();
$fieldToolTipsmahasiswa_akun = array();
$pageTitlesmahasiswa_akun = array();
$placeHoldersmahasiswa_akun = array();

if(mlang_getcurrentlang()=="English")
{
	$fieldLabelsmahasiswa_akun["English"] = array();
	$fieldToolTipsmahasiswa_akun["English"] = array();
	$placeHoldersmahasiswa_akun["English"] = array();
	$pageTitlesmahasiswa_akun["English"] = array();
	$fieldLabelsmahasiswa_akun["English"]["maMhsNiu"] = "nim";
	$fieldToolTipsmahasiswa_akun["English"]["maMhsNiu"] = "";
	$placeHoldersmahasiswa_akun["English"]["maMhsNiu"] = "";
	$fieldLabelsmahasiswa_akun["English"]["maEmail"] = "Akun_Email";
	$fieldToolTipsmahasiswa_akun["English"]["maEmail"] = "";
	$placeHoldersmahasiswa_akun["English"]["maEmail"] = "";
	$fieldLabelsmahasiswa_akun["English"]["maEmailPswd"] = "Email_Pswd";
	$fieldToolTipsmahasiswa_akun["English"]["maEmailPswd"] = "";
	$placeHoldersmahasiswa_akun["English"]["maEmailPswd"] = "";
	$fieldLabelsmahasiswa_akun["English"]["maEmailAktif"] = "Email_Aktif";
	$fieldToolTipsmahasiswa_akun["English"]["maEmailAktif"] = "";
	$placeHoldersmahasiswa_akun["English"]["maEmailAktif"] = "";
	$fieldLabelsmahasiswa_akun["English"]["maElearning"] = "Akun_Elearning";
	$fieldToolTipsmahasiswa_akun["English"]["maElearning"] = "";
	$placeHoldersmahasiswa_akun["English"]["maElearning"] = "";
	$fieldLabelsmahasiswa_akun["English"]["maElearningPswd"] = "Elearning_Pswd";
	$fieldToolTipsmahasiswa_akun["English"]["maElearningPswd"] = "";
	$placeHoldersmahasiswa_akun["English"]["maElearningPswd"] = "";
	$fieldLabelsmahasiswa_akun["English"]["maElearningAktif"] = "Elearning_Aktif";
	$fieldToolTipsmahasiswa_akun["English"]["maElearningAktif"] = "";
	$placeHoldersmahasiswa_akun["English"]["maElearningAktif"] = "";
	if (count($fieldToolTipsmahasiswa_akun["English"]))
		$tdatamahasiswa_akun[".isUseToolTips"] = true;
}
if(mlang_getcurrentlang()=="")
{
	$fieldLabelsmahasiswa_akun[""] = array();
	$fieldToolTipsmahasiswa_akun[""] = array();
	$placeHoldersmahasiswa_akun[""] = array();
	$pageTitlesmahasiswa_akun[""] = array();
	$fieldLabelsmahasiswa_akun[""]["maMhsNiu"] = "Ma Mhs Niu";
	$fieldToolTipsmahasiswa_akun[""]["maMhsNiu"] = "";
	$placeHoldersmahasiswa_akun[""]["maMhsNiu"] = "";
	$fieldLabelsmahasiswa_akun[""]["maEmail"] = "Ma Email";
	$fieldToolTipsmahasiswa_akun[""]["maEmail"] = "";
	$placeHoldersmahasiswa_akun[""]["maEmail"] = "";
	$fieldLabelsmahasiswa_akun[""]["maEmailPswd"] = "Ma Email Pswd";
	$fieldToolTipsmahasiswa_akun[""]["maEmailPswd"] = "";
	$placeHoldersmahasiswa_akun[""]["maEmailPswd"] = "";
	$fieldLabelsmahasiswa_akun[""]["maEmailAktif"] = "Ma Email Aktif";
	$fieldToolTipsmahasiswa_akun[""]["maEmailAktif"] = "";
	$placeHoldersmahasiswa_akun[""]["maEmailAktif"] = "";
	$fieldLabelsmahasiswa_akun[""]["maElearning"] = "Ma Elearning";
	$fieldToolTipsmahasiswa_akun[""]["maElearning"] = "";
	$placeHoldersmahasiswa_akun[""]["maElearning"] = "";
	$fieldLabelsmahasiswa_akun[""]["maElearningPswd"] = "Ma Elearning Pswd";
	$fieldToolTipsmahasiswa_akun[""]["maElearningPswd"] = "";
	$placeHoldersmahasiswa_akun[""]["maElearningPswd"] = "";
	$fieldLabelsmahasiswa_akun[""]["maElearningAktif"] = "Ma Elearning Aktif";
	$fieldToolTipsmahasiswa_akun[""]["maElearningAktif"] = "";
	$placeHoldersmahasiswa_akun[""]["maElearningAktif"] = "";
	if (count($fieldToolTipsmahasiswa_akun[""]))
		$tdatamahasiswa_akun[".isUseToolTips"] = true;
}


	$tdatamahasiswa_akun[".NCSearch"] = true;



$tdatamahasiswa_akun[".shortTableName"] = "mahasiswa_akun";
$tdatamahasiswa_akun[".nSecOptions"] = 0;
$tdatamahasiswa_akun[".recsPerRowPrint"] = 1;
$tdatamahasiswa_akun[".mainTableOwnerID"] = "";
$tdatamahasiswa_akun[".moveNext"] = 1;
$tdatamahasiswa_akun[".entityType"] = 0;

$tdatamahasiswa_akun[".strOriginalTableName"] = "mahasiswa_akun";

	



$tdatamahasiswa_akun[".showAddInPopup"] = false;

$tdatamahasiswa_akun[".showEditInPopup"] = false;

$tdatamahasiswa_akun[".showViewInPopup"] = false;

//page's base css files names
$popupPagesLayoutNames = array();
$tdatamahasiswa_akun[".popupPagesLayoutNames"] = $popupPagesLayoutNames;


$tdatamahasiswa_akun[".fieldsForRegister"] = array();

$tdatamahasiswa_akun[".listAjax"] = false;

	$tdatamahasiswa_akun[".audit"] = false;

	$tdatamahasiswa_akun[".locking"] = false;

$tdatamahasiswa_akun[".edit"] = true;
$tdatamahasiswa_akun[".afterEditAction"] = 1;
$tdatamahasiswa_akun[".closePopupAfterEdit"] = 1;
$tdatamahasiswa_akun[".afterEditActionDetTable"] = "";

$tdatamahasiswa_akun[".add"] = true;
$tdatamahasiswa_akun[".afterAddAction"] = 1;
$tdatamahasiswa_akun[".closePopupAfterAdd"] = 1;
$tdatamahasiswa_akun[".afterAddActionDetTable"] = "";

$tdatamahasiswa_akun[".list"] = true;

$tdatamahasiswa_akun[".inlineEdit"] = true;


$tdatamahasiswa_akun[".reorderRecordsByHeader"] = true;


$tdatamahasiswa_akun[".exportFormatting"] = 2;
$tdatamahasiswa_akun[".exportDelimiter"] = ",";
		
$tdatamahasiswa_akun[".inlineAdd"] = true;
$tdatamahasiswa_akun[".view"] = true;

$tdatamahasiswa_akun[".import"] = true;

$tdatamahasiswa_akun[".exportTo"] = true;

$tdatamahasiswa_akun[".printFriendly"] = true;

$tdatamahasiswa_akun[".delete"] = true;

$tdatamahasiswa_akun[".showSimpleSearchOptions"] = false;

// Allow Show/Hide Fields in GRID
$tdatamahasiswa_akun[".allowShowHideFields"] = false;
//

// Allow Fields Reordering in GRID
$tdatamahasiswa_akun[".allowFieldsReordering"] = false;
//

// search Saving settings
$tdatamahasiswa_akun[".searchSaving"] = false;
//

$tdatamahasiswa_akun[".showSearchPanel"] = true;
		$tdatamahasiswa_akun[".flexibleSearch"] = true;

$tdatamahasiswa_akun[".isUseAjaxSuggest"] = true;

$tdatamahasiswa_akun[".rowHighlite"] = true;





$tdatamahasiswa_akun[".ajaxCodeSnippetAdded"] = false;

$tdatamahasiswa_akun[".buttonsAdded"] = false;

$tdatamahasiswa_akun[".addPageEvents"] = false;

// use timepicker for search panel
$tdatamahasiswa_akun[".isUseTimeForSearch"] = false;



$tdatamahasiswa_akun[".badgeColor"] = "BC8F8F";


$tdatamahasiswa_akun[".allSearchFields"] = array();
$tdatamahasiswa_akun[".filterFields"] = array();
$tdatamahasiswa_akun[".requiredSearchFields"] = array();

$tdatamahasiswa_akun[".allSearchFields"][] = "maMhsNiu";
	$tdatamahasiswa_akun[".allSearchFields"][] = "maEmail";
	$tdatamahasiswa_akun[".allSearchFields"][] = "maEmailPswd";
	$tdatamahasiswa_akun[".allSearchFields"][] = "maEmailAktif";
	$tdatamahasiswa_akun[".allSearchFields"][] = "maElearning";
	$tdatamahasiswa_akun[".allSearchFields"][] = "maElearningPswd";
	$tdatamahasiswa_akun[".allSearchFields"][] = "maElearningAktif";
	

$tdatamahasiswa_akun[".googleLikeFields"] = array();
$tdatamahasiswa_akun[".googleLikeFields"][] = "maMhsNiu";
$tdatamahasiswa_akun[".googleLikeFields"][] = "maEmail";
$tdatamahasiswa_akun[".googleLikeFields"][] = "maEmailPswd";
$tdatamahasiswa_akun[".googleLikeFields"][] = "maEmailAktif";
$tdatamahasiswa_akun[".googleLikeFields"][] = "maElearning";
$tdatamahasiswa_akun[".googleLikeFields"][] = "maElearningPswd";
$tdatamahasiswa_akun[".googleLikeFields"][] = "maElearningAktif";


$tdatamahasiswa_akun[".advSearchFields"] = array();
$tdatamahasiswa_akun[".advSearchFields"][] = "maMhsNiu";
$tdatamahasiswa_akun[".advSearchFields"][] = "maEmail";
$tdatamahasiswa_akun[".advSearchFields"][] = "maEmailPswd";
$tdatamahasiswa_akun[".advSearchFields"][] = "maEmailAktif";
$tdatamahasiswa_akun[".advSearchFields"][] = "maElearning";
$tdatamahasiswa_akun[".advSearchFields"][] = "maElearningPswd";
$tdatamahasiswa_akun[".advSearchFields"][] = "maElearningAktif";

$tdatamahasiswa_akun[".tableType"] = "list";

$tdatamahasiswa_akun[".printerPageOrientation"] = 0;
$tdatamahasiswa_akun[".nPrinterPageScale"] = 100;

$tdatamahasiswa_akun[".nPrinterSplitRecords"] = 40;

$tdatamahasiswa_akun[".nPrinterPDFSplitRecords"] = 40;



$tdatamahasiswa_akun[".geocodingEnabled"] = false;





$tdatamahasiswa_akun[".listGridLayout"] = 3;





// view page pdf

// print page pdf


$tdatamahasiswa_akun[".pageSize"] = 20;

$tdatamahasiswa_akun[".warnLeavingPages"] = true;



$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatamahasiswa_akun[".strOrderBy"] = $tstrOrderBy;

$tdatamahasiswa_akun[".orderindexes"] = array();

$tdatamahasiswa_akun[".sqlHead"] = "SELECT maMhsNiu,  	maEmail,  	maEmailPswd,  	maEmailAktif,  	maElearning,  	maElearningPswd,  	maElearningAktif";
$tdatamahasiswa_akun[".sqlFrom"] = "FROM mahasiswa_akun";
$tdatamahasiswa_akun[".sqlWhereExpr"] = "";
$tdatamahasiswa_akun[".sqlTail"] = "";












//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatamahasiswa_akun[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatamahasiswa_akun[".arrGroupsPerPage"] = $arrGPP;

$tdatamahasiswa_akun[".highlightSearchResults"] = true;

$tableKeysmahasiswa_akun = array();
$tableKeysmahasiswa_akun[] = "maMhsNiu";
$tdatamahasiswa_akun[".Keys"] = $tableKeysmahasiswa_akun;

$tdatamahasiswa_akun[".listFields"] = array();
$tdatamahasiswa_akun[".listFields"][] = "maMhsNiu";
$tdatamahasiswa_akun[".listFields"][] = "maEmail";
$tdatamahasiswa_akun[".listFields"][] = "maEmailPswd";
$tdatamahasiswa_akun[".listFields"][] = "maEmailAktif";
$tdatamahasiswa_akun[".listFields"][] = "maElearning";
$tdatamahasiswa_akun[".listFields"][] = "maElearningPswd";
$tdatamahasiswa_akun[".listFields"][] = "maElearningAktif";

$tdatamahasiswa_akun[".hideMobileList"] = array();


$tdatamahasiswa_akun[".viewFields"] = array();
$tdatamahasiswa_akun[".viewFields"][] = "maMhsNiu";
$tdatamahasiswa_akun[".viewFields"][] = "maEmail";
$tdatamahasiswa_akun[".viewFields"][] = "maEmailPswd";
$tdatamahasiswa_akun[".viewFields"][] = "maEmailAktif";
$tdatamahasiswa_akun[".viewFields"][] = "maElearning";
$tdatamahasiswa_akun[".viewFields"][] = "maElearningPswd";
$tdatamahasiswa_akun[".viewFields"][] = "maElearningAktif";

$tdatamahasiswa_akun[".addFields"] = array();
$tdatamahasiswa_akun[".addFields"][] = "maMhsNiu";
$tdatamahasiswa_akun[".addFields"][] = "maEmail";
$tdatamahasiswa_akun[".addFields"][] = "maEmailPswd";
$tdatamahasiswa_akun[".addFields"][] = "maEmailAktif";
$tdatamahasiswa_akun[".addFields"][] = "maElearning";
$tdatamahasiswa_akun[".addFields"][] = "maElearningPswd";
$tdatamahasiswa_akun[".addFields"][] = "maElearningAktif";

$tdatamahasiswa_akun[".masterListFields"] = array();
$tdatamahasiswa_akun[".masterListFields"][] = "maMhsNiu";
$tdatamahasiswa_akun[".masterListFields"][] = "maEmail";
$tdatamahasiswa_akun[".masterListFields"][] = "maEmailPswd";
$tdatamahasiswa_akun[".masterListFields"][] = "maEmailAktif";
$tdatamahasiswa_akun[".masterListFields"][] = "maElearning";
$tdatamahasiswa_akun[".masterListFields"][] = "maElearningPswd";
$tdatamahasiswa_akun[".masterListFields"][] = "maElearningAktif";

$tdatamahasiswa_akun[".inlineAddFields"] = array();
$tdatamahasiswa_akun[".inlineAddFields"][] = "maMhsNiu";
$tdatamahasiswa_akun[".inlineAddFields"][] = "maEmail";
$tdatamahasiswa_akun[".inlineAddFields"][] = "maEmailPswd";
$tdatamahasiswa_akun[".inlineAddFields"][] = "maEmailAktif";
$tdatamahasiswa_akun[".inlineAddFields"][] = "maElearning";
$tdatamahasiswa_akun[".inlineAddFields"][] = "maElearningPswd";
$tdatamahasiswa_akun[".inlineAddFields"][] = "maElearningAktif";

$tdatamahasiswa_akun[".editFields"] = array();
$tdatamahasiswa_akun[".editFields"][] = "maMhsNiu";
$tdatamahasiswa_akun[".editFields"][] = "maEmail";
$tdatamahasiswa_akun[".editFields"][] = "maEmailPswd";
$tdatamahasiswa_akun[".editFields"][] = "maEmailAktif";
$tdatamahasiswa_akun[".editFields"][] = "maElearning";
$tdatamahasiswa_akun[".editFields"][] = "maElearningPswd";
$tdatamahasiswa_akun[".editFields"][] = "maElearningAktif";

$tdatamahasiswa_akun[".inlineEditFields"] = array();
$tdatamahasiswa_akun[".inlineEditFields"][] = "maMhsNiu";
$tdatamahasiswa_akun[".inlineEditFields"][] = "maEmail";
$tdatamahasiswa_akun[".inlineEditFields"][] = "maEmailPswd";
$tdatamahasiswa_akun[".inlineEditFields"][] = "maEmailAktif";
$tdatamahasiswa_akun[".inlineEditFields"][] = "maElearning";
$tdatamahasiswa_akun[".inlineEditFields"][] = "maElearningPswd";
$tdatamahasiswa_akun[".inlineEditFields"][] = "maElearningAktif";

$tdatamahasiswa_akun[".updateSelectedFields"] = array();
$tdatamahasiswa_akun[".updateSelectedFields"][] = "maMhsNiu";
$tdatamahasiswa_akun[".updateSelectedFields"][] = "maEmail";
$tdatamahasiswa_akun[".updateSelectedFields"][] = "maEmailPswd";
$tdatamahasiswa_akun[".updateSelectedFields"][] = "maEmailAktif";
$tdatamahasiswa_akun[".updateSelectedFields"][] = "maElearning";
$tdatamahasiswa_akun[".updateSelectedFields"][] = "maElearningPswd";
$tdatamahasiswa_akun[".updateSelectedFields"][] = "maElearningAktif";


$tdatamahasiswa_akun[".exportFields"] = array();
$tdatamahasiswa_akun[".exportFields"][] = "maMhsNiu";
$tdatamahasiswa_akun[".exportFields"][] = "maEmail";
$tdatamahasiswa_akun[".exportFields"][] = "maEmailPswd";
$tdatamahasiswa_akun[".exportFields"][] = "maEmailAktif";
$tdatamahasiswa_akun[".exportFields"][] = "maElearning";
$tdatamahasiswa_akun[".exportFields"][] = "maElearningPswd";
$tdatamahasiswa_akun[".exportFields"][] = "maElearningAktif";

$tdatamahasiswa_akun[".importFields"] = array();
$tdatamahasiswa_akun[".importFields"][] = "maMhsNiu";
$tdatamahasiswa_akun[".importFields"][] = "maEmail";
$tdatamahasiswa_akun[".importFields"][] = "maEmailPswd";
$tdatamahasiswa_akun[".importFields"][] = "maEmailAktif";
$tdatamahasiswa_akun[".importFields"][] = "maElearning";
$tdatamahasiswa_akun[".importFields"][] = "maElearningPswd";
$tdatamahasiswa_akun[".importFields"][] = "maElearningAktif";

$tdatamahasiswa_akun[".printFields"] = array();
$tdatamahasiswa_akun[".printFields"][] = "maMhsNiu";
$tdatamahasiswa_akun[".printFields"][] = "maEmail";
$tdatamahasiswa_akun[".printFields"][] = "maEmailPswd";
$tdatamahasiswa_akun[".printFields"][] = "maEmailAktif";
$tdatamahasiswa_akun[".printFields"][] = "maElearning";
$tdatamahasiswa_akun[".printFields"][] = "maElearningPswd";
$tdatamahasiswa_akun[".printFields"][] = "maElearningAktif";


//	maMhsNiu
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "maMhsNiu";
	$fdata["GoodName"] = "maMhsNiu";
	$fdata["ownerTable"] = "mahasiswa_akun";
	$fdata["Label"] = GetFieldLabel("mahasiswa_akun","maMhsNiu");
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

		$fdata["strField"] = "maMhsNiu";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "maMhsNiu";

	
	
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
			$edata["EditParams"].= " maxlength=12";

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




	$tdatamahasiswa_akun["maMhsNiu"] = $fdata;
//	maEmail
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "maEmail";
	$fdata["GoodName"] = "maEmail";
	$fdata["ownerTable"] = "mahasiswa_akun";
	$fdata["Label"] = GetFieldLabel("mahasiswa_akun","maEmail");
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

		$fdata["strField"] = "maEmail";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "maEmail";

	
	
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




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa_akun["maEmail"] = $fdata;
//	maEmailPswd
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "maEmailPswd";
	$fdata["GoodName"] = "maEmailPswd";
	$fdata["ownerTable"] = "mahasiswa_akun";
	$fdata["Label"] = GetFieldLabel("mahasiswa_akun","maEmailPswd");
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

		$fdata["strField"] = "maEmailPswd";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "maEmailPswd";

	
	
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
			$edata["EditParams"].= " maxlength=200";

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




	$tdatamahasiswa_akun["maEmailPswd"] = $fdata;
//	maEmailAktif
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "maEmailAktif";
	$fdata["GoodName"] = "maEmailAktif";
	$fdata["ownerTable"] = "mahasiswa_akun";
	$fdata["Label"] = GetFieldLabel("mahasiswa_akun","maEmailAktif");
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

		$fdata["strField"] = "maEmailAktif";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "maEmailAktif";

	
	
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




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa_akun["maEmailAktif"] = $fdata;
//	maElearning
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "maElearning";
	$fdata["GoodName"] = "maElearning";
	$fdata["ownerTable"] = "mahasiswa_akun";
	$fdata["Label"] = GetFieldLabel("mahasiswa_akun","maElearning");
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

		$fdata["strField"] = "maElearning";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "maElearning";

	
	
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




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa_akun["maElearning"] = $fdata;
//	maElearningPswd
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 6;
	$fdata["strName"] = "maElearningPswd";
	$fdata["GoodName"] = "maElearningPswd";
	$fdata["ownerTable"] = "mahasiswa_akun";
	$fdata["Label"] = GetFieldLabel("mahasiswa_akun","maElearningPswd");
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

		$fdata["strField"] = "maElearningPswd";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "maElearningPswd";

	
	
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
			$edata["EditParams"].= " maxlength=200";

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




	$tdatamahasiswa_akun["maElearningPswd"] = $fdata;
//	maElearningAktif
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 7;
	$fdata["strName"] = "maElearningAktif";
	$fdata["GoodName"] = "maElearningAktif";
	$fdata["ownerTable"] = "mahasiswa_akun";
	$fdata["Label"] = GetFieldLabel("mahasiswa_akun","maElearningAktif");
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

		$fdata["strField"] = "maElearningAktif";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "maElearningAktif";

	
	
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




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa_akun["maElearningAktif"] = $fdata;


$tables_data["mahasiswa_akun"]=&$tdatamahasiswa_akun;
$field_labels["mahasiswa_akun"] = &$fieldLabelsmahasiswa_akun;
$fieldToolTips["mahasiswa_akun"] = &$fieldToolTipsmahasiswa_akun;
$placeHolders["mahasiswa_akun"] = &$placeHoldersmahasiswa_akun;
$page_titles["mahasiswa_akun"] = &$pageTitlesmahasiswa_akun;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["mahasiswa_akun"] = array();

// tables which are master tables for current table (detail)
$masterTablesData["mahasiswa_akun"] = array();


// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_mahasiswa_akun()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "maMhsNiu,  	maEmail,  	maEmailPswd,  	maEmailAktif,  	maElearning,  	maElearningPswd,  	maElearningAktif";
$proto0["m_strFrom"] = "FROM mahasiswa_akun";
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
	"m_strName" => "maMhsNiu",
	"m_strTable" => "mahasiswa_akun",
	"m_srcTableName" => "mahasiswa_akun"
));

$proto6["m_sql"] = "maMhsNiu";
$proto6["m_srcTableName"] = "mahasiswa_akun";
$proto6["m_expr"]=$obj;
$proto6["m_alias"] = "";
$obj = new SQLFieldListItem($proto6);

$proto0["m_fieldlist"][]=$obj;
						$proto8=array();
			$obj = new SQLField(array(
	"m_strName" => "maEmail",
	"m_strTable" => "mahasiswa_akun",
	"m_srcTableName" => "mahasiswa_akun"
));

$proto8["m_sql"] = "maEmail";
$proto8["m_srcTableName"] = "mahasiswa_akun";
$proto8["m_expr"]=$obj;
$proto8["m_alias"] = "";
$obj = new SQLFieldListItem($proto8);

$proto0["m_fieldlist"][]=$obj;
						$proto10=array();
			$obj = new SQLField(array(
	"m_strName" => "maEmailPswd",
	"m_strTable" => "mahasiswa_akun",
	"m_srcTableName" => "mahasiswa_akun"
));

$proto10["m_sql"] = "maEmailPswd";
$proto10["m_srcTableName"] = "mahasiswa_akun";
$proto10["m_expr"]=$obj;
$proto10["m_alias"] = "";
$obj = new SQLFieldListItem($proto10);

$proto0["m_fieldlist"][]=$obj;
						$proto12=array();
			$obj = new SQLField(array(
	"m_strName" => "maEmailAktif",
	"m_strTable" => "mahasiswa_akun",
	"m_srcTableName" => "mahasiswa_akun"
));

$proto12["m_sql"] = "maEmailAktif";
$proto12["m_srcTableName"] = "mahasiswa_akun";
$proto12["m_expr"]=$obj;
$proto12["m_alias"] = "";
$obj = new SQLFieldListItem($proto12);

$proto0["m_fieldlist"][]=$obj;
						$proto14=array();
			$obj = new SQLField(array(
	"m_strName" => "maElearning",
	"m_strTable" => "mahasiswa_akun",
	"m_srcTableName" => "mahasiswa_akun"
));

$proto14["m_sql"] = "maElearning";
$proto14["m_srcTableName"] = "mahasiswa_akun";
$proto14["m_expr"]=$obj;
$proto14["m_alias"] = "";
$obj = new SQLFieldListItem($proto14);

$proto0["m_fieldlist"][]=$obj;
						$proto16=array();
			$obj = new SQLField(array(
	"m_strName" => "maElearningPswd",
	"m_strTable" => "mahasiswa_akun",
	"m_srcTableName" => "mahasiswa_akun"
));

$proto16["m_sql"] = "maElearningPswd";
$proto16["m_srcTableName"] = "mahasiswa_akun";
$proto16["m_expr"]=$obj;
$proto16["m_alias"] = "";
$obj = new SQLFieldListItem($proto16);

$proto0["m_fieldlist"][]=$obj;
						$proto18=array();
			$obj = new SQLField(array(
	"m_strName" => "maElearningAktif",
	"m_strTable" => "mahasiswa_akun",
	"m_srcTableName" => "mahasiswa_akun"
));

$proto18["m_sql"] = "maElearningAktif";
$proto18["m_srcTableName"] = "mahasiswa_akun";
$proto18["m_expr"]=$obj;
$proto18["m_alias"] = "";
$obj = new SQLFieldListItem($proto18);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto20=array();
$proto20["m_link"] = "SQLL_MAIN";
			$proto21=array();
$proto21["m_strName"] = "mahasiswa_akun";
$proto21["m_srcTableName"] = "mahasiswa_akun";
$proto21["m_columns"] = array();
$proto21["m_columns"][] = "maMhsNiu";
$proto21["m_columns"][] = "maEmail";
$proto21["m_columns"][] = "maEmailPswd";
$proto21["m_columns"][] = "maEmailAktif";
$proto21["m_columns"][] = "maElearning";
$proto21["m_columns"][] = "maElearningPswd";
$proto21["m_columns"][] = "maElearningAktif";
$obj = new SQLTable($proto21);

$proto20["m_table"] = $obj;
$proto20["m_sql"] = "mahasiswa_akun";
$proto20["m_alias"] = "";
$proto20["m_srcTableName"] = "mahasiswa_akun";
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
$proto0["m_srcTableName"]="mahasiswa_akun";		
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_mahasiswa_akun = createSqlQuery_mahasiswa_akun();


	
		;

							

$tdatamahasiswa_akun[".sqlquery"] = $queryData_mahasiswa_akun;

$tableEvents["mahasiswa_akun"] = new eventsBase;
$tdatamahasiswa_akun[".hasEvents"] = false;

?>