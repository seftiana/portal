<?php
require_once(getabspath("classes/cipherer.php"));




$tdatat_user = array();
	$tdatat_user[".truncateText"] = true;
	$tdatat_user[".NumberOfChars"] = 80;
	$tdatat_user[".ShortName"] = "t_user";
	$tdatat_user[".OwnerID"] = "";
	$tdatat_user[".OriginalTable"] = "t_user";

//	field labels
$fieldLabelst_user = array();
$fieldToolTipst_user = array();
$pageTitlest_user = array();
$placeHolderst_user = array();

if(mlang_getcurrentlang()=="English")
{
	$fieldLabelst_user["English"] = array();
	$fieldToolTipst_user["English"] = array();
	$placeHolderst_user["English"] = array();
	$pageTitlest_user["English"] = array();
	$fieldLabelst_user["English"]["tusrNama"] = "User ID";
	$fieldToolTipst_user["English"]["tusrNama"] = "";
	$placeHolderst_user["English"]["tusrNama"] = "";
	$fieldLabelst_user["English"]["tusrPassword"] = "Password";
	$fieldToolTipst_user["English"]["tusrPassword"] = "";
	$placeHolderst_user["English"]["tusrPassword"] = "";
	$fieldLabelst_user["English"]["tusrThakrId"] = "Hak Akses";
	$fieldToolTipst_user["English"]["tusrThakrId"] = "";
	$placeHolderst_user["English"]["tusrThakrId"] = "";
	$fieldLabelst_user["English"]["tusrProfil"] = "Nama User";
	$fieldToolTipst_user["English"]["tusrProfil"] = "";
	$placeHolderst_user["English"]["tusrProfil"] = "";
	$fieldLabelst_user["English"]["tusrPertanyaan"] = "Tusr Pertanyaan";
	$fieldToolTipst_user["English"]["tusrPertanyaan"] = "";
	$placeHolderst_user["English"]["tusrPertanyaan"] = "";
	$fieldLabelst_user["English"]["tusrJawaban"] = "Tusr Jawaban";
	$fieldToolTipst_user["English"]["tusrJawaban"] = "";
	$placeHolderst_user["English"]["tusrJawaban"] = "";
	$fieldLabelst_user["English"]["tusrSignature"] = "Tusr Signature";
	$fieldToolTipst_user["English"]["tusrSignature"] = "";
	$placeHolderst_user["English"]["tusrSignature"] = "";
	$fieldLabelst_user["English"]["tusrAvatar"] = "Tusr Avatar";
	$fieldToolTipst_user["English"]["tusrAvatar"] = "";
	$placeHolderst_user["English"]["tusrAvatar"] = "";
	$fieldLabelst_user["English"]["tusrEmail"] = "Tusr Email";
	$fieldToolTipst_user["English"]["tusrEmail"] = "";
	$placeHolderst_user["English"]["tusrEmail"] = "";
	$fieldLabelst_user["English"]["tusrIsTampilBiodata"] = "Tusr Is Tampil Biodata";
	$fieldToolTipst_user["English"]["tusrIsTampilBiodata"] = "";
	$placeHolderst_user["English"]["tusrIsTampilBiodata"] = "";
	$fieldLabelst_user["English"]["tusrNoTelp"] = "Tusr No Telp";
	$fieldToolTipst_user["English"]["tusrNoTelp"] = "";
	$placeHolderst_user["English"]["tusrNoTelp"] = "";
	$fieldLabelst_user["English"]["tusrRefIndex"] = "Tusr Ref Index";
	$fieldToolTipst_user["English"]["tusrRefIndex"] = "";
	$placeHolderst_user["English"]["tusrRefIndex"] = "";
	$fieldLabelst_user["English"]["tusrUntId"] = "Tusr Unt Id";
	$fieldToolTipst_user["English"]["tusrUntId"] = "";
	$placeHolderst_user["English"]["tusrUntId"] = "";
	$fieldLabelst_user["English"]["tusrIsAgree"] = "Tusr Is Agree";
	$fieldToolTipst_user["English"]["tusrIsAgree"] = "";
	$placeHolderst_user["English"]["tusrIsAgree"] = "";
	$fieldLabelst_user["English"]["tusrAgreementDate"] = "Tusr Agreement Date";
	$fieldToolTipst_user["English"]["tusrAgreementDate"] = "";
	$placeHolderst_user["English"]["tusrAgreementDate"] = "";
	$fieldLabelst_user["English"]["tusrLastAccess"] = "Tusr Last Access";
	$fieldToolTipst_user["English"]["tusrLastAccess"] = "";
	$placeHolderst_user["English"]["tusrLastAccess"] = "";
	$fieldLabelst_user["English"]["tusrIsOnline"] = "Tusr Is Online";
	$fieldToolTipst_user["English"]["tusrIsOnline"] = "";
	$placeHolderst_user["English"]["tusrIsOnline"] = "";
	$fieldLabelst_user["English"]["tusrProdiKode"] = "Tusr Prodi Kode";
	$fieldToolTipst_user["English"]["tusrProdiKode"] = "";
	$placeHolderst_user["English"]["tusrProdiKode"] = "";
	if (count($fieldToolTipst_user["English"]))
		$tdatat_user[".isUseToolTips"] = true;
}
if(mlang_getcurrentlang()=="")
{
	$fieldLabelst_user[""] = array();
	$fieldToolTipst_user[""] = array();
	$placeHolderst_user[""] = array();
	$pageTitlest_user[""] = array();
	if (count($fieldToolTipst_user[""]))
		$tdatat_user[".isUseToolTips"] = true;
}


	$tdatat_user[".NCSearch"] = true;



$tdatat_user[".shortTableName"] = "t_user";
$tdatat_user[".nSecOptions"] = 0;
$tdatat_user[".recsPerRowPrint"] = 1;
$tdatat_user[".mainTableOwnerID"] = "";
$tdatat_user[".moveNext"] = 1;
$tdatat_user[".entityType"] = 0;

$tdatat_user[".strOriginalTableName"] = "t_user";

	



$tdatat_user[".showAddInPopup"] = false;

$tdatat_user[".showEditInPopup"] = false;

$tdatat_user[".showViewInPopup"] = false;

//page's base css files names
$popupPagesLayoutNames = array();
$tdatat_user[".popupPagesLayoutNames"] = $popupPagesLayoutNames;


$tdatat_user[".fieldsForRegister"] = array();

$tdatat_user[".listAjax"] = false;

	$tdatat_user[".audit"] = false;

	$tdatat_user[".locking"] = false;



$tdatat_user[".list"] = true;

$tdatat_user[".inlineEdit"] = true;


$tdatat_user[".reorderRecordsByHeader"] = true;



$tdatat_user[".inlineAdd"] = true;



$tdatat_user[".printFriendly"] = true;

$tdatat_user[".delete"] = true;

$tdatat_user[".showSimpleSearchOptions"] = false;

// Allow Show/Hide Fields in GRID
$tdatat_user[".allowShowHideFields"] = false;
//

// Allow Fields Reordering in GRID
$tdatat_user[".allowFieldsReordering"] = false;
//

// search Saving settings
$tdatat_user[".searchSaving"] = false;
//

$tdatat_user[".showSearchPanel"] = true;
		$tdatat_user[".flexibleSearch"] = true;

$tdatat_user[".isUseAjaxSuggest"] = true;

$tdatat_user[".rowHighlite"] = true;





$tdatat_user[".ajaxCodeSnippetAdded"] = false;

$tdatat_user[".buttonsAdded"] = false;

$tdatat_user[".addPageEvents"] = false;

// use timepicker for search panel
$tdatat_user[".isUseTimeForSearch"] = false;



$tdatat_user[".badgeColor"] = "E8926F";


$tdatat_user[".allSearchFields"] = array();
$tdatat_user[".filterFields"] = array();
$tdatat_user[".requiredSearchFields"] = array();

$tdatat_user[".allSearchFields"][] = "tusrNama";
	$tdatat_user[".allSearchFields"][] = "tusrPassword";
	$tdatat_user[".allSearchFields"][] = "tusrThakrId";
	$tdatat_user[".allSearchFields"][] = "tusrProfil";
	$tdatat_user[".allSearchFields"][] = "tusrRefIndex";
	$tdatat_user[".allSearchFields"][] = "tusrUntId";
	$tdatat_user[".allSearchFields"][] = "tusrIsAgree";
	$tdatat_user[".allSearchFields"][] = "tusrProdiKode";
	

$tdatat_user[".googleLikeFields"] = array();
$tdatat_user[".googleLikeFields"][] = "tusrNama";
$tdatat_user[".googleLikeFields"][] = "tusrPassword";
$tdatat_user[".googleLikeFields"][] = "tusrThakrId";
$tdatat_user[".googleLikeFields"][] = "tusrProfil";
$tdatat_user[".googleLikeFields"][] = "tusrPertanyaan";
$tdatat_user[".googleLikeFields"][] = "tusrJawaban";
$tdatat_user[".googleLikeFields"][] = "tusrSignature";
$tdatat_user[".googleLikeFields"][] = "tusrAvatar";
$tdatat_user[".googleLikeFields"][] = "tusrEmail";
$tdatat_user[".googleLikeFields"][] = "tusrIsTampilBiodata";
$tdatat_user[".googleLikeFields"][] = "tusrNoTelp";
$tdatat_user[".googleLikeFields"][] = "tusrRefIndex";
$tdatat_user[".googleLikeFields"][] = "tusrUntId";
$tdatat_user[".googleLikeFields"][] = "tusrIsAgree";
$tdatat_user[".googleLikeFields"][] = "tusrAgreementDate";
$tdatat_user[".googleLikeFields"][] = "tusrLastAccess";
$tdatat_user[".googleLikeFields"][] = "tusrIsOnline";
$tdatat_user[".googleLikeFields"][] = "tusrProdiKode";


$tdatat_user[".advSearchFields"] = array();
$tdatat_user[".advSearchFields"][] = "tusrNama";
$tdatat_user[".advSearchFields"][] = "tusrPassword";
$tdatat_user[".advSearchFields"][] = "tusrThakrId";
$tdatat_user[".advSearchFields"][] = "tusrProfil";
$tdatat_user[".advSearchFields"][] = "tusrRefIndex";
$tdatat_user[".advSearchFields"][] = "tusrUntId";
$tdatat_user[".advSearchFields"][] = "tusrIsAgree";
$tdatat_user[".advSearchFields"][] = "tusrProdiKode";

$tdatat_user[".tableType"] = "list";

$tdatat_user[".printerPageOrientation"] = 0;
$tdatat_user[".nPrinterPageScale"] = 100;

$tdatat_user[".nPrinterSplitRecords"] = 40;

$tdatat_user[".nPrinterPDFSplitRecords"] = 40;



$tdatat_user[".geocodingEnabled"] = false;





$tdatat_user[".listGridLayout"] = 3;





// view page pdf

// print page pdf


$tdatat_user[".pageSize"] = 20;

$tdatat_user[".warnLeavingPages"] = true;



$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatat_user[".strOrderBy"] = $tstrOrderBy;

$tdatat_user[".orderindexes"] = array();

$tdatat_user[".sqlHead"] = "SELECT tusrNama,  	tusrPassword,  	tusrThakrId,  	tusrProfil,  	tusrPertanyaan,  	tusrJawaban,  	tusrSignature,  	tusrAvatar,  	tusrEmail,  	tusrIsTampilBiodata,  	tusrNoTelp,  	tusrRefIndex,  	tusrUntId,  	tusrIsAgree,  	tusrAgreementDate,  	tusrLastAccess,  	tusrIsOnline,  	tusrProdiKode";
$tdatat_user[".sqlFrom"] = "FROM t_user";
$tdatat_user[".sqlWhereExpr"] = "";
$tdatat_user[".sqlTail"] = "";












//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatat_user[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatat_user[".arrGroupsPerPage"] = $arrGPP;

$tdatat_user[".highlightSearchResults"] = true;

$tableKeyst_user = array();
$tableKeyst_user[] = "tusrNama";
$tdatat_user[".Keys"] = $tableKeyst_user;

$tdatat_user[".listFields"] = array();
$tdatat_user[".listFields"][] = "tusrNama";
$tdatat_user[".listFields"][] = "tusrPassword";
$tdatat_user[".listFields"][] = "tusrThakrId";
$tdatat_user[".listFields"][] = "tusrProfil";
$tdatat_user[".listFields"][] = "tusrRefIndex";
$tdatat_user[".listFields"][] = "tusrUntId";
$tdatat_user[".listFields"][] = "tusrIsAgree";
$tdatat_user[".listFields"][] = "tusrProdiKode";

$tdatat_user[".hideMobileList"] = array();


$tdatat_user[".viewFields"] = array();
$tdatat_user[".viewFields"][] = "tusrNama";
$tdatat_user[".viewFields"][] = "tusrPassword";
$tdatat_user[".viewFields"][] = "tusrThakrId";
$tdatat_user[".viewFields"][] = "tusrProfil";
$tdatat_user[".viewFields"][] = "tusrRefIndex";
$tdatat_user[".viewFields"][] = "tusrUntId";
$tdatat_user[".viewFields"][] = "tusrIsAgree";
$tdatat_user[".viewFields"][] = "tusrProdiKode";

$tdatat_user[".addFields"] = array();
$tdatat_user[".addFields"][] = "tusrNama";
$tdatat_user[".addFields"][] = "tusrPassword";
$tdatat_user[".addFields"][] = "tusrThakrId";
$tdatat_user[".addFields"][] = "tusrProfil";
$tdatat_user[".addFields"][] = "tusrRefIndex";
$tdatat_user[".addFields"][] = "tusrUntId";
$tdatat_user[".addFields"][] = "tusrIsAgree";
$tdatat_user[".addFields"][] = "tusrProdiKode";

$tdatat_user[".masterListFields"] = array();
$tdatat_user[".masterListFields"][] = "tusrNama";
$tdatat_user[".masterListFields"][] = "tusrPassword";
$tdatat_user[".masterListFields"][] = "tusrThakrId";
$tdatat_user[".masterListFields"][] = "tusrProfil";
$tdatat_user[".masterListFields"][] = "tusrPertanyaan";
$tdatat_user[".masterListFields"][] = "tusrJawaban";
$tdatat_user[".masterListFields"][] = "tusrSignature";
$tdatat_user[".masterListFields"][] = "tusrAvatar";
$tdatat_user[".masterListFields"][] = "tusrEmail";
$tdatat_user[".masterListFields"][] = "tusrIsTampilBiodata";
$tdatat_user[".masterListFields"][] = "tusrNoTelp";
$tdatat_user[".masterListFields"][] = "tusrRefIndex";
$tdatat_user[".masterListFields"][] = "tusrUntId";
$tdatat_user[".masterListFields"][] = "tusrIsAgree";
$tdatat_user[".masterListFields"][] = "tusrAgreementDate";
$tdatat_user[".masterListFields"][] = "tusrLastAccess";
$tdatat_user[".masterListFields"][] = "tusrIsOnline";
$tdatat_user[".masterListFields"][] = "tusrProdiKode";

$tdatat_user[".inlineAddFields"] = array();
$tdatat_user[".inlineAddFields"][] = "tusrNama";
$tdatat_user[".inlineAddFields"][] = "tusrPassword";
$tdatat_user[".inlineAddFields"][] = "tusrThakrId";
$tdatat_user[".inlineAddFields"][] = "tusrProfil";
$tdatat_user[".inlineAddFields"][] = "tusrRefIndex";
$tdatat_user[".inlineAddFields"][] = "tusrUntId";
$tdatat_user[".inlineAddFields"][] = "tusrIsAgree";
$tdatat_user[".inlineAddFields"][] = "tusrProdiKode";

$tdatat_user[".editFields"] = array();
$tdatat_user[".editFields"][] = "tusrNama";
$tdatat_user[".editFields"][] = "tusrPassword";
$tdatat_user[".editFields"][] = "tusrThakrId";
$tdatat_user[".editFields"][] = "tusrProfil";
$tdatat_user[".editFields"][] = "tusrRefIndex";
$tdatat_user[".editFields"][] = "tusrUntId";
$tdatat_user[".editFields"][] = "tusrIsAgree";
$tdatat_user[".editFields"][] = "tusrProdiKode";

$tdatat_user[".inlineEditFields"] = array();
$tdatat_user[".inlineEditFields"][] = "tusrNama";
$tdatat_user[".inlineEditFields"][] = "tusrPassword";
$tdatat_user[".inlineEditFields"][] = "tusrThakrId";
$tdatat_user[".inlineEditFields"][] = "tusrProfil";
$tdatat_user[".inlineEditFields"][] = "tusrRefIndex";
$tdatat_user[".inlineEditFields"][] = "tusrUntId";
$tdatat_user[".inlineEditFields"][] = "tusrIsAgree";
$tdatat_user[".inlineEditFields"][] = "tusrProdiKode";

$tdatat_user[".updateSelectedFields"] = array();
$tdatat_user[".updateSelectedFields"][] = "tusrNama";
$tdatat_user[".updateSelectedFields"][] = "tusrPassword";
$tdatat_user[".updateSelectedFields"][] = "tusrThakrId";
$tdatat_user[".updateSelectedFields"][] = "tusrProfil";
$tdatat_user[".updateSelectedFields"][] = "tusrRefIndex";
$tdatat_user[".updateSelectedFields"][] = "tusrUntId";
$tdatat_user[".updateSelectedFields"][] = "tusrIsAgree";
$tdatat_user[".updateSelectedFields"][] = "tusrProdiKode";


$tdatat_user[".exportFields"] = array();
$tdatat_user[".exportFields"][] = "tusrNama";
$tdatat_user[".exportFields"][] = "tusrPassword";
$tdatat_user[".exportFields"][] = "tusrThakrId";
$tdatat_user[".exportFields"][] = "tusrProfil";
$tdatat_user[".exportFields"][] = "tusrRefIndex";
$tdatat_user[".exportFields"][] = "tusrUntId";
$tdatat_user[".exportFields"][] = "tusrIsAgree";
$tdatat_user[".exportFields"][] = "tusrProdiKode";

$tdatat_user[".importFields"] = array();
$tdatat_user[".importFields"][] = "tusrNama";
$tdatat_user[".importFields"][] = "tusrPassword";
$tdatat_user[".importFields"][] = "tusrThakrId";
$tdatat_user[".importFields"][] = "tusrProfil";
$tdatat_user[".importFields"][] = "tusrRefIndex";
$tdatat_user[".importFields"][] = "tusrUntId";
$tdatat_user[".importFields"][] = "tusrIsAgree";
$tdatat_user[".importFields"][] = "tusrProdiKode";

$tdatat_user[".printFields"] = array();
$tdatat_user[".printFields"][] = "tusrNama";
$tdatat_user[".printFields"][] = "tusrPassword";
$tdatat_user[".printFields"][] = "tusrThakrId";
$tdatat_user[".printFields"][] = "tusrProfil";
$tdatat_user[".printFields"][] = "tusrRefIndex";
$tdatat_user[".printFields"][] = "tusrUntId";
$tdatat_user[".printFields"][] = "tusrIsAgree";
$tdatat_user[".printFields"][] = "tusrProdiKode";


//	tusrNama
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "tusrNama";
	$fdata["GoodName"] = "tusrNama";
	$fdata["ownerTable"] = "t_user";
	$fdata["Label"] = GetFieldLabel("t_user","tusrNama");
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

		$fdata["strField"] = "tusrNama";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "tusrNama";

	
	
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




	$tdatat_user["tusrNama"] = $fdata;
//	tusrPassword
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "tusrPassword";
	$fdata["GoodName"] = "tusrPassword";
	$fdata["ownerTable"] = "t_user";
	$fdata["Label"] = GetFieldLabel("t_user","tusrPassword");
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

		$fdata["strField"] = "tusrPassword";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "tusrPassword";

	
	
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




	$tdatat_user["tusrPassword"] = $fdata;
//	tusrThakrId
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "tusrThakrId";
	$fdata["GoodName"] = "tusrThakrId";
	$fdata["ownerTable"] = "t_user";
	$fdata["Label"] = GetFieldLabel("t_user","tusrThakrId");
	$fdata["FieldType"] = 2;

	
	
	
			
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

		$fdata["strField"] = "tusrThakrId";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "tusrThakrId";

	
	
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
	$edata["LookupTable"] = "t_hak_akses_ref";
		$edata["autoCompleteFieldsOnEdit"] = 0;
	$edata["autoCompleteFields"] = array();
		$edata["LCType"] = 0;

	
		
	$edata["LinkField"] = "thakrId";
	$edata["LinkFieldType"] = 2;
	$edata["DisplayField"] = "thakrNama";
	
	

	
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




	$tdatat_user["tusrThakrId"] = $fdata;
//	tusrProfil
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "tusrProfil";
	$fdata["GoodName"] = "tusrProfil";
	$fdata["ownerTable"] = "t_user";
	$fdata["Label"] = GetFieldLabel("t_user","tusrProfil");
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

		$fdata["strField"] = "tusrProfil";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "tusrProfil";

	
	
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




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatat_user["tusrProfil"] = $fdata;
//	tusrPertanyaan
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "tusrPertanyaan";
	$fdata["GoodName"] = "tusrPertanyaan";
	$fdata["ownerTable"] = "t_user";
	$fdata["Label"] = GetFieldLabel("t_user","tusrPertanyaan");
	$fdata["FieldType"] = 200;

	
	
	
			
	
	
	
	
	
	

	
	
	
	
		$fdata["strField"] = "tusrPertanyaan";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "tusrPertanyaan";

	
	
			
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








	$tdatat_user["tusrPertanyaan"] = $fdata;
//	tusrJawaban
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 6;
	$fdata["strName"] = "tusrJawaban";
	$fdata["GoodName"] = "tusrJawaban";
	$fdata["ownerTable"] = "t_user";
	$fdata["Label"] = GetFieldLabel("t_user","tusrJawaban");
	$fdata["FieldType"] = 200;

	
	
	
			
	
	
	
	
	
	

	
	
	
	
		$fdata["strField"] = "tusrJawaban";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "tusrJawaban";

	
	
			
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








	$tdatat_user["tusrJawaban"] = $fdata;
//	tusrSignature
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 7;
	$fdata["strName"] = "tusrSignature";
	$fdata["GoodName"] = "tusrSignature";
	$fdata["ownerTable"] = "t_user";
	$fdata["Label"] = GetFieldLabel("t_user","tusrSignature");
	$fdata["FieldType"] = 200;

	
	
	
			
	
	
	
	
	
	

	
	
	
	
		$fdata["strField"] = "tusrSignature";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "tusrSignature";

	
	
			
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








	$tdatat_user["tusrSignature"] = $fdata;
//	tusrAvatar
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 8;
	$fdata["strName"] = "tusrAvatar";
	$fdata["GoodName"] = "tusrAvatar";
	$fdata["ownerTable"] = "t_user";
	$fdata["Label"] = GetFieldLabel("t_user","tusrAvatar");
	$fdata["FieldType"] = 200;

	
	
	
			
	
	
	
	
	
	

	
	
	
	
		$fdata["strField"] = "tusrAvatar";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "tusrAvatar";

	
	
			
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
			$edata["EditParams"].= " maxlength=100";

		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;








	$tdatat_user["tusrAvatar"] = $fdata;
//	tusrEmail
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 9;
	$fdata["strName"] = "tusrEmail";
	$fdata["GoodName"] = "tusrEmail";
	$fdata["ownerTable"] = "t_user";
	$fdata["Label"] = GetFieldLabel("t_user","tusrEmail");
	$fdata["FieldType"] = 200;

	
	
	
			
	
	
	
	
	
	

	
	
	
	
		$fdata["strField"] = "tusrEmail";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "tusrEmail";

	
	
			
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








	$tdatat_user["tusrEmail"] = $fdata;
//	tusrIsTampilBiodata
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 10;
	$fdata["strName"] = "tusrIsTampilBiodata";
	$fdata["GoodName"] = "tusrIsTampilBiodata";
	$fdata["ownerTable"] = "t_user";
	$fdata["Label"] = GetFieldLabel("t_user","tusrIsTampilBiodata");
	$fdata["FieldType"] = 16;

	
	
	
			
	
	
	
	
	
	

	
	
	
	
		$fdata["strField"] = "tusrIsTampilBiodata";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "tusrIsTampilBiodata";

	
	
			
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








	$tdatat_user["tusrIsTampilBiodata"] = $fdata;
//	tusrNoTelp
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 11;
	$fdata["strName"] = "tusrNoTelp";
	$fdata["GoodName"] = "tusrNoTelp";
	$fdata["ownerTable"] = "t_user";
	$fdata["Label"] = GetFieldLabel("t_user","tusrNoTelp");
	$fdata["FieldType"] = 200;

	
	
	
			
	
	
	
	
	
	

	
	
	
	
		$fdata["strField"] = "tusrNoTelp";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "tusrNoTelp";

	
	
			
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








	$tdatat_user["tusrNoTelp"] = $fdata;
//	tusrRefIndex
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 12;
	$fdata["strName"] = "tusrRefIndex";
	$fdata["GoodName"] = "tusrRefIndex";
	$fdata["ownerTable"] = "t_user";
	$fdata["Label"] = GetFieldLabel("t_user","tusrRefIndex");
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

		$fdata["strField"] = "tusrRefIndex";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "tusrRefIndex";

	
	
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




	$tdatat_user["tusrRefIndex"] = $fdata;
//	tusrUntId
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 13;
	$fdata["strName"] = "tusrUntId";
	$fdata["GoodName"] = "tusrUntId";
	$fdata["ownerTable"] = "t_user";
	$fdata["Label"] = GetFieldLabel("t_user","tusrUntId");
	$fdata["FieldType"] = 3;

	
	
	
			
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

		$fdata["strField"] = "tusrUntId";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "tusrUntId";

	
	
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
	$edata["LookupTable"] = "t_unit";
		$edata["autoCompleteFieldsOnEdit"] = 0;
	$edata["autoCompleteFields"] = array();
		$edata["LCType"] = 0;

	
		
	$edata["LinkField"] = "untId";
	$edata["LinkFieldType"] = 3;
	$edata["DisplayField"] = "untNama";
	
	

	
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




	$tdatat_user["tusrUntId"] = $fdata;
//	tusrIsAgree
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 14;
	$fdata["strName"] = "tusrIsAgree";
	$fdata["GoodName"] = "tusrIsAgree";
	$fdata["ownerTable"] = "t_user";
	$fdata["Label"] = GetFieldLabel("t_user","tusrIsAgree");
	$fdata["FieldType"] = 16;

	
	
	
			
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

		$fdata["strField"] = "tusrIsAgree";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "tusrIsAgree";

	
	
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
		$edata["LookupType"] = 0;
		$edata["autoCompleteFieldsOnEdit"] = 0;
	$edata["autoCompleteFields"] = array();
		$edata["LCType"] = 0;

	
	
		$edata["LookupValues"] = array();
	$edata["LookupValues"][] = "0";
	$edata["LookupValues"][] = "1";

	
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




	$tdatat_user["tusrIsAgree"] = $fdata;
//	tusrAgreementDate
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 15;
	$fdata["strName"] = "tusrAgreementDate";
	$fdata["GoodName"] = "tusrAgreementDate";
	$fdata["ownerTable"] = "t_user";
	$fdata["Label"] = GetFieldLabel("t_user","tusrAgreementDate");
	$fdata["FieldType"] = 135;

	
	
	
			
	
	
	
	
	
	

	
	
	
	
		$fdata["strField"] = "tusrAgreementDate";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "tusrAgreementDate";

	
	
			
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

		$edata["ShowTime"] = true;

	
		
	


	
	
	
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








	$tdatat_user["tusrAgreementDate"] = $fdata;
//	tusrLastAccess
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 16;
	$fdata["strName"] = "tusrLastAccess";
	$fdata["GoodName"] = "tusrLastAccess";
	$fdata["ownerTable"] = "t_user";
	$fdata["Label"] = GetFieldLabel("t_user","tusrLastAccess");
	$fdata["FieldType"] = 135;

	
	
	
			
	
	
	
	
	
	

	
	
	
	
		$fdata["strField"] = "tusrLastAccess";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "tusrLastAccess";

	
	
			
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

		$edata["ShowTime"] = true;

	
		
	


	
	
	
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








	$tdatat_user["tusrLastAccess"] = $fdata;
//	tusrIsOnline
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 17;
	$fdata["strName"] = "tusrIsOnline";
	$fdata["GoodName"] = "tusrIsOnline";
	$fdata["ownerTable"] = "t_user";
	$fdata["Label"] = GetFieldLabel("t_user","tusrIsOnline");
	$fdata["FieldType"] = 16;

	
	
	
			
	
	
	
	
	
	

	
	
	
	
		$fdata["strField"] = "tusrIsOnline";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "tusrIsOnline";

	
	
			
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








	$tdatat_user["tusrIsOnline"] = $fdata;
//	tusrProdiKode
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 18;
	$fdata["strName"] = "tusrProdiKode";
	$fdata["GoodName"] = "tusrProdiKode";
	$fdata["ownerTable"] = "t_user";
	$fdata["Label"] = GetFieldLabel("t_user","tusrProdiKode");
	$fdata["FieldType"] = 3;

	
	
	
			
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

		$fdata["strField"] = "tusrProdiKode";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "tusrProdiKode";

	
	
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
	$edata["LookupTable"] = "program_studi";
		$edata["autoCompleteFieldsOnEdit"] = 0;
	$edata["autoCompleteFields"] = array();
		$edata["LCType"] = 0;

	
		
	$edata["LinkField"] = "prodiKode";
	$edata["LinkFieldType"] = 3;
	$edata["DisplayField"] = "prodiNamaResmi";
	
	

	
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




	$tdatat_user["tusrProdiKode"] = $fdata;


$tables_data["t_user"]=&$tdatat_user;
$field_labels["t_user"] = &$fieldLabelst_user;
$fieldToolTips["t_user"] = &$fieldToolTipst_user;
$placeHolders["t_user"] = &$placeHolderst_user;
$page_titles["t_user"] = &$pageTitlest_user;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["t_user"] = array();

// tables which are master tables for current table (detail)
$masterTablesData["t_user"] = array();


// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_t_user()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "tusrNama,  	tusrPassword,  	tusrThakrId,  	tusrProfil,  	tusrPertanyaan,  	tusrJawaban,  	tusrSignature,  	tusrAvatar,  	tusrEmail,  	tusrIsTampilBiodata,  	tusrNoTelp,  	tusrRefIndex,  	tusrUntId,  	tusrIsAgree,  	tusrAgreementDate,  	tusrLastAccess,  	tusrIsOnline,  	tusrProdiKode";
$proto0["m_strFrom"] = "FROM t_user";
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
	"m_strName" => "tusrNama",
	"m_strTable" => "t_user",
	"m_srcTableName" => "t_user"
));

$proto6["m_sql"] = "tusrNama";
$proto6["m_srcTableName"] = "t_user";
$proto6["m_expr"]=$obj;
$proto6["m_alias"] = "";
$obj = new SQLFieldListItem($proto6);

$proto0["m_fieldlist"][]=$obj;
						$proto8=array();
			$obj = new SQLField(array(
	"m_strName" => "tusrPassword",
	"m_strTable" => "t_user",
	"m_srcTableName" => "t_user"
));

$proto8["m_sql"] = "tusrPassword";
$proto8["m_srcTableName"] = "t_user";
$proto8["m_expr"]=$obj;
$proto8["m_alias"] = "";
$obj = new SQLFieldListItem($proto8);

$proto0["m_fieldlist"][]=$obj;
						$proto10=array();
			$obj = new SQLField(array(
	"m_strName" => "tusrThakrId",
	"m_strTable" => "t_user",
	"m_srcTableName" => "t_user"
));

$proto10["m_sql"] = "tusrThakrId";
$proto10["m_srcTableName"] = "t_user";
$proto10["m_expr"]=$obj;
$proto10["m_alias"] = "";
$obj = new SQLFieldListItem($proto10);

$proto0["m_fieldlist"][]=$obj;
						$proto12=array();
			$obj = new SQLField(array(
	"m_strName" => "tusrProfil",
	"m_strTable" => "t_user",
	"m_srcTableName" => "t_user"
));

$proto12["m_sql"] = "tusrProfil";
$proto12["m_srcTableName"] = "t_user";
$proto12["m_expr"]=$obj;
$proto12["m_alias"] = "";
$obj = new SQLFieldListItem($proto12);

$proto0["m_fieldlist"][]=$obj;
						$proto14=array();
			$obj = new SQLField(array(
	"m_strName" => "tusrPertanyaan",
	"m_strTable" => "t_user",
	"m_srcTableName" => "t_user"
));

$proto14["m_sql"] = "tusrPertanyaan";
$proto14["m_srcTableName"] = "t_user";
$proto14["m_expr"]=$obj;
$proto14["m_alias"] = "";
$obj = new SQLFieldListItem($proto14);

$proto0["m_fieldlist"][]=$obj;
						$proto16=array();
			$obj = new SQLField(array(
	"m_strName" => "tusrJawaban",
	"m_strTable" => "t_user",
	"m_srcTableName" => "t_user"
));

$proto16["m_sql"] = "tusrJawaban";
$proto16["m_srcTableName"] = "t_user";
$proto16["m_expr"]=$obj;
$proto16["m_alias"] = "";
$obj = new SQLFieldListItem($proto16);

$proto0["m_fieldlist"][]=$obj;
						$proto18=array();
			$obj = new SQLField(array(
	"m_strName" => "tusrSignature",
	"m_strTable" => "t_user",
	"m_srcTableName" => "t_user"
));

$proto18["m_sql"] = "tusrSignature";
$proto18["m_srcTableName"] = "t_user";
$proto18["m_expr"]=$obj;
$proto18["m_alias"] = "";
$obj = new SQLFieldListItem($proto18);

$proto0["m_fieldlist"][]=$obj;
						$proto20=array();
			$obj = new SQLField(array(
	"m_strName" => "tusrAvatar",
	"m_strTable" => "t_user",
	"m_srcTableName" => "t_user"
));

$proto20["m_sql"] = "tusrAvatar";
$proto20["m_srcTableName"] = "t_user";
$proto20["m_expr"]=$obj;
$proto20["m_alias"] = "";
$obj = new SQLFieldListItem($proto20);

$proto0["m_fieldlist"][]=$obj;
						$proto22=array();
			$obj = new SQLField(array(
	"m_strName" => "tusrEmail",
	"m_strTable" => "t_user",
	"m_srcTableName" => "t_user"
));

$proto22["m_sql"] = "tusrEmail";
$proto22["m_srcTableName"] = "t_user";
$proto22["m_expr"]=$obj;
$proto22["m_alias"] = "";
$obj = new SQLFieldListItem($proto22);

$proto0["m_fieldlist"][]=$obj;
						$proto24=array();
			$obj = new SQLField(array(
	"m_strName" => "tusrIsTampilBiodata",
	"m_strTable" => "t_user",
	"m_srcTableName" => "t_user"
));

$proto24["m_sql"] = "tusrIsTampilBiodata";
$proto24["m_srcTableName"] = "t_user";
$proto24["m_expr"]=$obj;
$proto24["m_alias"] = "";
$obj = new SQLFieldListItem($proto24);

$proto0["m_fieldlist"][]=$obj;
						$proto26=array();
			$obj = new SQLField(array(
	"m_strName" => "tusrNoTelp",
	"m_strTable" => "t_user",
	"m_srcTableName" => "t_user"
));

$proto26["m_sql"] = "tusrNoTelp";
$proto26["m_srcTableName"] = "t_user";
$proto26["m_expr"]=$obj;
$proto26["m_alias"] = "";
$obj = new SQLFieldListItem($proto26);

$proto0["m_fieldlist"][]=$obj;
						$proto28=array();
			$obj = new SQLField(array(
	"m_strName" => "tusrRefIndex",
	"m_strTable" => "t_user",
	"m_srcTableName" => "t_user"
));

$proto28["m_sql"] = "tusrRefIndex";
$proto28["m_srcTableName"] = "t_user";
$proto28["m_expr"]=$obj;
$proto28["m_alias"] = "";
$obj = new SQLFieldListItem($proto28);

$proto0["m_fieldlist"][]=$obj;
						$proto30=array();
			$obj = new SQLField(array(
	"m_strName" => "tusrUntId",
	"m_strTable" => "t_user",
	"m_srcTableName" => "t_user"
));

$proto30["m_sql"] = "tusrUntId";
$proto30["m_srcTableName"] = "t_user";
$proto30["m_expr"]=$obj;
$proto30["m_alias"] = "";
$obj = new SQLFieldListItem($proto30);

$proto0["m_fieldlist"][]=$obj;
						$proto32=array();
			$obj = new SQLField(array(
	"m_strName" => "tusrIsAgree",
	"m_strTable" => "t_user",
	"m_srcTableName" => "t_user"
));

$proto32["m_sql"] = "tusrIsAgree";
$proto32["m_srcTableName"] = "t_user";
$proto32["m_expr"]=$obj;
$proto32["m_alias"] = "";
$obj = new SQLFieldListItem($proto32);

$proto0["m_fieldlist"][]=$obj;
						$proto34=array();
			$obj = new SQLField(array(
	"m_strName" => "tusrAgreementDate",
	"m_strTable" => "t_user",
	"m_srcTableName" => "t_user"
));

$proto34["m_sql"] = "tusrAgreementDate";
$proto34["m_srcTableName"] = "t_user";
$proto34["m_expr"]=$obj;
$proto34["m_alias"] = "";
$obj = new SQLFieldListItem($proto34);

$proto0["m_fieldlist"][]=$obj;
						$proto36=array();
			$obj = new SQLField(array(
	"m_strName" => "tusrLastAccess",
	"m_strTable" => "t_user",
	"m_srcTableName" => "t_user"
));

$proto36["m_sql"] = "tusrLastAccess";
$proto36["m_srcTableName"] = "t_user";
$proto36["m_expr"]=$obj;
$proto36["m_alias"] = "";
$obj = new SQLFieldListItem($proto36);

$proto0["m_fieldlist"][]=$obj;
						$proto38=array();
			$obj = new SQLField(array(
	"m_strName" => "tusrIsOnline",
	"m_strTable" => "t_user",
	"m_srcTableName" => "t_user"
));

$proto38["m_sql"] = "tusrIsOnline";
$proto38["m_srcTableName"] = "t_user";
$proto38["m_expr"]=$obj;
$proto38["m_alias"] = "";
$obj = new SQLFieldListItem($proto38);

$proto0["m_fieldlist"][]=$obj;
						$proto40=array();
			$obj = new SQLField(array(
	"m_strName" => "tusrProdiKode",
	"m_strTable" => "t_user",
	"m_srcTableName" => "t_user"
));

$proto40["m_sql"] = "tusrProdiKode";
$proto40["m_srcTableName"] = "t_user";
$proto40["m_expr"]=$obj;
$proto40["m_alias"] = "";
$obj = new SQLFieldListItem($proto40);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto42=array();
$proto42["m_link"] = "SQLL_MAIN";
			$proto43=array();
$proto43["m_strName"] = "t_user";
$proto43["m_srcTableName"] = "t_user";
$proto43["m_columns"] = array();
$proto43["m_columns"][] = "tusrNama";
$proto43["m_columns"][] = "tusrPassword";
$proto43["m_columns"][] = "tusrThakrId";
$proto43["m_columns"][] = "tusrProfil";
$proto43["m_columns"][] = "tusrPertanyaan";
$proto43["m_columns"][] = "tusrJawaban";
$proto43["m_columns"][] = "tusrSignature";
$proto43["m_columns"][] = "tusrAvatar";
$proto43["m_columns"][] = "tusrEmail";
$proto43["m_columns"][] = "tusrIsTampilBiodata";
$proto43["m_columns"][] = "tusrNoTelp";
$proto43["m_columns"][] = "tusrRefIndex";
$proto43["m_columns"][] = "tusrUntId";
$proto43["m_columns"][] = "tusrIsAgree";
$proto43["m_columns"][] = "tusrAgreementDate";
$proto43["m_columns"][] = "tusrLastAccess";
$proto43["m_columns"][] = "tusrIsOnline";
$proto43["m_columns"][] = "tusrProdiKode";
$obj = new SQLTable($proto43);

$proto42["m_table"] = $obj;
$proto42["m_sql"] = "t_user";
$proto42["m_alias"] = "";
$proto42["m_srcTableName"] = "t_user";
$proto44=array();
$proto44["m_sql"] = "";
$proto44["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto44["m_column"]=$obj;
$proto44["m_contained"] = array();
$proto44["m_strCase"] = "";
$proto44["m_havingmode"] = false;
$proto44["m_inBrackets"] = false;
$proto44["m_useAlias"] = false;
$obj = new SQLLogicalExpr($proto44);

$proto42["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto42);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
$proto0["m_srcTableName"]="t_user";		
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_t_user = createSqlQuery_t_user();


	
				;

																		

$tdatat_user[".sqlquery"] = $queryData_t_user;

include_once(getabspath("include/t_user_events.php"));
$tableEvents["t_user"] = new eventclass_t_user;
$tdatat_user[".hasEvents"] = true;

?>