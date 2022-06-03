<?php
if(!empty($_GET["filename"]) && !empty($_GET["year"])){
	$_filetitle = (ucfirst($_GET["filename"]));
	$_filename = (($_GET["filename"]).".json");
	$_filename = (($_GET["year"])."/".($_filename));
	if(file_exists($_SERVER["DOCUMENT_ROOT"]."/api/docx/".($_filename))){
		Header("Content-Type:Application/JSON");
		Require_Once($_SERVER["DOCUMENT_ROOT"]."/api/docx/".($_filename));
	}elseif(!file_exists($_SERVER["DOCUMENT_ROOT"]."/api/docx/".($_filename))){
		echo("<title>Blog Docx Files</title>");
		echo("<code>Coming Soon...</code>");
	}
}elseif(empty($_GET["filename"]) || empty($_GET["year"])){
	$_dir = scandir($_SERVER["DOCUMENT_ROOT"]."/docx/");
	$_year = [];
	echo("<title>Blog Docx Tab</title>");
	echo("<code>Coming Soon...</code>");
	foreach($_dir as $_token => $_coin){
		if($_coin == "." || $_coin == ".."){
			continue;
		}else{
			$_year[] = ($_coin);
		}
	}
	print_r($_year);
}//
?>