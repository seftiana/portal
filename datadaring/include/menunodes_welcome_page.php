<?php

function getMenuNodes_welcome_page($menuNodesObject)
{
	// create menu nodes arr
	$menuNodesObject->menuNodes["welcome_page"] = array();

	$menuNode = array();
	$menuNode["id"] = "1";
	$menuNode["name"] = "daringdb";
	$menuNode["href"] = "";
	$menuNode["type"] = "Group";
	$menuNode["table"] = "";
	$menuNode["style"] = "";
	$menuNode["params"] = "";
	$menuNode["parent"] = "0";
	$menuNode["nameType"] = "Text";
	$menuNode["linkType"] = "None";
	$menuNode["pageType"] = "List";//
	$menuNode["openType"] = "None";
	
	$menuNode["icon"] = "";
	$menuNode["iconType"] = "0";

			$menuNode["color"] = "";
	
	$menuNode["title"] = "daringdb";



	$menuNodesObject->menuNodes["welcome_page"][] = $menuNode;
	$menuNode = array();
	$menuNode["id"] = "2";
	$menuNode["name"] = "Data Kelas";
	$menuNode["href"] = "mypage.htm";
	$menuNode["type"] = "Leaf";
	$menuNode["table"] = "s_kelas";
	$menuNode["style"] = "";
	$menuNode["params"] = "";
	$menuNode["parent"] = "1";
	$menuNode["nameType"] = "Text";
	$menuNode["linkType"] = "Internal";
	$menuNode["pageType"] = "List";//
	$menuNode["openType"] = "None";
	
	$menuNode["icon"] = "glyphicon-calendar";
	$menuNode["iconType"] = "2";

			$menuNode["color"] = "#"."E67349";
	
	$menuNode["title"] = "Data Kelas";

	$menuNode["comments"] = "Untuk Export data kelas daring";


	$menuNodesObject->menuNodes["welcome_page"][] = $menuNode;
	$menuNode = array();
	$menuNode["id"] = "3";
	$menuNode["name"] = "Data Peserta Kelas";
	$menuNode["href"] = "mypage.htm";
	$menuNode["type"] = "Leaf";
	$menuNode["table"] = "s_krs_detil";
	$menuNode["style"] = "";
	$menuNode["params"] = "";
	$menuNode["parent"] = "1";
	$menuNode["nameType"] = "Text";
	$menuNode["linkType"] = "Internal";
	$menuNode["pageType"] = "List";//
	$menuNode["openType"] = "None";
	
	$menuNode["icon"] = "glyphicon-briefcase";
	$menuNode["iconType"] = "2";

			$menuNode["color"] = "#"."CD5C5C";
	
	$menuNode["title"] = "Data Peserta Kelas";

	$menuNode["comments"] = "Untuk Export peserta kelas daring";


	$menuNodesObject->menuNodes["welcome_page"][] = $menuNode;
	$menuNode = array();
	$menuNode["id"] = "4";
	$menuNode["name"] = "Akun Mahasiswa";
	$menuNode["href"] = "mypage.htm";
	$menuNode["type"] = "Leaf";
	$menuNode["table"] = "mahasiswa_akun";
	$menuNode["style"] = "";
	$menuNode["params"] = "";
	$menuNode["parent"] = "1";
	$menuNode["nameType"] = "Text";
	$menuNode["linkType"] = "Internal";
	$menuNode["pageType"] = "List";//
	$menuNode["openType"] = "None";
	
	$menuNode["icon"] = "glyphicon-arrow-up";
	$menuNode["iconType"] = "2";

			$menuNode["color"] = "#"."BC8F8F";
	
	$menuNode["title"] = "Akun Mahasiswa";

	$menuNode["comments"] = "Import Akun email, elearning untuk mahasiswa baru";


	$menuNodesObject->menuNodes["welcome_page"][] = $menuNode;
}
?>
