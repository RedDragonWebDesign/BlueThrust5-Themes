<?php

include($prevFolder."themes/include_header.php");
include($prevFolder."themes/wot/wotmenu.php");
$themeMenusObj = new WoTMenu($mysqli);

$btThemeObj->setThemeName("World of Tanks");

$btThemeObj->menusObj = $themeMenusObj;
$btThemeObj->addHeadItem("wotjs", "<script type='text/javascript' src='".MAIN_ROOT."themes/wot/wot.js'></script>");
$btThemeObj->addHeadItem("google-font", "<link href='http://fonts.googleapis.com/css?family=Quantico:400,700' rel='stylesheet' type='text/css'>");
$btThemeObj->updateHeadItem("jquery-ui", "<script type='text/javascript' src='".MAIN_ROOT."themes/wot/jqueryui/jquery-ui-1.9.2.custom.min.js'></script>");
$btThemeObj->updateHeadItem("jquery-ui-css", "<link rel='stylesheet' type='text/css' href='".MAIN_ROOT."themes/wot/jqueryui/jquery-ui-1.9.2.custom.css'>");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta charset="ISO-8859-1">
	<?php $btThemeObj->displayHead(); ?>
</head>
<body>

	<div class='tankBG'>
	
		<div class='tankBGBottomLeft'>
			<div class='tankBGBottomLeftIndent'></div>
		</div>
		
		<div class='tankBGBottomRight'>
			<div class='tankBGBottomRightIndent'></div>
		</div>
	
	</div>

	<div class='gridBG'></div>

	<div class='topBar'>
		<div class='wotLogo'></div>
		<div id='logoSmall'><a href='<?php echo MAIN_ROOT; ?>'><img src='<?php echo MAIN_ROOT;?>themes/wot/images/logo-small.png'></a></div>
		
			<?php $themeMenusObj->displayMenu(2); ?>

	</div>

	<div class='wrapper'>
		<div class='headerDiv'>
			
			<div class='logoDiv'>
				<a href='<?php echo MAIN_ROOT; ?>'><img src='<?php echo $websiteInfo['logourl']; ?>'></a>
			</div>
			
			<div class='logoFade'></div>	
		</div>
	
		<div class='bodyDiv'>
		
			<div class='leftMenuDiv'>
				<?php $themeMenusObj->displayMenu(0); ?>
			</div>
			<div class='rightMenuDiv'>
				<?php $themeMenusObj->displayMenu(1); ?>
			</div>
			<div class='centerContentDiv'>
			<?php include(BASE_DIRECTORY."include/clocks.php"); ?>