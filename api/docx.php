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
	$_dir = scandir($_SERVER["DOCUMENT_ROOT"]."/api/docx/");
	$_year = [];
	$_yearDir = [];
	$_blog = [];
	echo("<title>Blog Docx Tab</title>");
	echo("<code>Coming Soon...</code>");
	foreach($_dir as $_token => $_coin){
		if($_coin == "." || $_coin == ".."){
			continue;
		}else{
			$_yearDir[] = (scandir($_SERVER["DOCUMENT_ROOT"]."/api/docx/".$_coin."/"));
			$_year[] = ($_coin);
		}
	}
	for($_g = 0;$_g <= count($_year)-1;$_g++){
		foreach($_yearDir[$_g] as $_token => $_coin){
			if($_coin == "." || $_coin == ".."){
				continue;
			}else{
				$_blog[] = ("//".$_SERVER["HTTP_HOST"]."/blog/".($_coin)."/".($_g));
			}
		}
	}	
	print_r($_blog);
}//
?>