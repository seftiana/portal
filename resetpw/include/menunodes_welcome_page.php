<?php

function getMenuNodes_welcome_page($menuNodesObject)
{
	// create menu nodes arr
	$menuNodesObject->menuNodes["welcome_page"] = array();

	$menuNode = array();
	$menuNode["id"] = "1";
	$menuNode["name"] = "reset";
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
	
	$menuNode["title"] = "reset";



	$menuNodesObject->menuNodes["welcome_page"][] = $menuNode;
	$menuNode = array();
	$menuNode["id"] = "2";
	$menuNode["name"] = "User";
	$menuNode["href"] = "mypage.htm";
	$menuNode["type"] = "Leaf";
	$menuNode["table"] = "t_user";
	$menuNode["style"] = "";
	$menuNode["params"] = "";
	$menuNode["parent"] = "1";
	$menuNode["nameType"] = "Text";
	$menuNode["linkType"] = "Internal";
	$menuNode["pageType"] = "List";//
	$menuNode["openType"] = "None";
	
	$menuNode["icon"] = "glyphicon-user";
	$menuNode["iconType"] = "2";

			$menuNode["color"] = "#"."E8926F";
	
	$menuNode["title"] = "User";

	$menuNode["comments"] = "Merubah Password  dan  menambah User Portal";


	$menuNodesObject->menuNodes["welcome_page"][] = $menuNode;
}
?>
