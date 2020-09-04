<?php

include($prevFolder."themes/include_header.php");
include($prevFolder."themes/swtor/swtormenu.php");
$themeMenusObj = new SWTORMenu($mysqli);

$btThemeObj->setThemeName("SWTOR");

$btThemeObj->menusObj = $themeMenusObj;
$btThemeObj->addHeadItem("googlefont", "<link href='http://fonts.googleapis.com/css?family=Exo:400,700' rel='stylesheet' type='text/css'>");
$btThemeObj->updateHeadItem("jquery-ui-css", "<link rel='stylesheet' type='text/css' href='".MAIN_ROOT."themes/swtor/jqueryui/jquery-ui-1.9.2.custom.min.css'>");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<?php $btThemeObj->displayHead(); ?>
</head>
<body>
	
	<div class='bottom-right-character'></div>
	<div class='bottom-left-character'></div>
	<div class='bottom-center-character'></div>
	<div class='patternBG'></div>

	<div class='wrapper'>
	<div class='headerDiv'>
	
		<div class='logoDiv'>
			<a href='<?php echo $MAIN_ROOT; ?>'><img src='<?php echo $websiteInfo['logourl']; ?>'></a>
			
			<div class='logoLine'></div>
		</div>
	
	</div>
	
	<div class='topMenuDiv'>
		<?php $themeMenusObj->displayMenu(2); ?>
	</div>
	
	<div class='bodyDiv'>
		<div class='topLeftCorner'></div>
		<div class='topRightCorner'></div>
		<div class='bottomLeftCorner'></div>
		<div class='bottomRightCorner'></div>
	
		<div class='leftMenuDiv'>
			<?php $themeMenusObj->displayMenu(0); ?>		
		</div>
		<div class='rightMenuDiv'>
			<?php $themeMenusObj->displayMenu(1); ?>
		</div>
		<div class='centerContentDiv'>
		<?php include(BASE_DIRECTORY."include/clocks.php"); ?>