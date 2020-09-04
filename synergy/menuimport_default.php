<?php

include("../../_setup.php");
include("../../classes/member.php");

$member = new Member($mysqli);
$consoleObj = new ConsoleOption($mysqli);

$websiteSettingsCID = $consoleObj->findConsoleIDByName("Website Settings");
$consoleObj->select($websiteSettingsCID);

if(!isset($_SESSION['btUsername']) || !isset($_SESSION['btPassword']) || !$member->select($_SESSION['btUsername']) || ($member->select($_SESSION['btUsername']) && !$member->authorizeLogin($_SESSION['btPassword'])) || ($member->select($_SESSION['btUsername']) && $member->authorizeLogin($_SESSION['btPassword']) && !$member->hasAccess($consoleObj))) {
	header("HTTP/1.0 404 Not Found");
	exit();
}


$menuSQL = "

INSERT INTO `menuitem_customblock` (`menucustomblock_id`, `menuitem_id`, `blocktype`, `code`) VALUES(6, 27, 'code', '<form action=''[MAIN_ROOT]login.php'' method=''post'' style=''padding: 0px; margin: 0px''>\r\n<div class=''rememberMe_Off'' id=''rememberMeDiv''></div>\r\n    	\r\n	<div id=''rememberMeSwitch''></div>\r\n	\r\n	<div class=''loginBox''>\r\n	\r\n		<div class=''loginUsernameDiv''>\r\n			<input type=''text'' name=''user'' class=''loginTextBox''>\r\n		</div>\r\n		<div class=''loginPasswordDiv''>\r\n			<input type=''password'' name=''pass'' class=''loginTextBox''>\r\n		</div>\r\n		\r\n	</div>\r\n	\r\n	<div id=''loginSign''></div>\r\n	\r\n	<input type=''hidden'' id=''txtRememberMe'' value=''0'' name=''rememberme''>\r\n	<input type=''submit'' name=''submit'' id=''btnSubmit'' style=''display: none''>\r\n</form>');
INSERT INTO `menuitem_customblock` (`menucustomblock_id`, `menuitem_id`, `blocktype`, `code`) VALUES(4, 25, 'code', '<div class=''loggedInBox''>\r\n    	\r\n			<div style=''float: left; width: 48%; overflow: hidden; text-overflow: ellipsis; height: 28px''>\r\n			<b>Account Name:</b><br>\r\n			<a href=''[MAIN_ROOT]profile.php?mID=[MEMBER_ID]''>[MEMBERUSERNAME]</a>\r\n			</div>\r\n			<div style=''float: right; width: 48%; overflow: hidden; text-overflow: ellipsis; height: 28px''>\r\n			<b>Rank:</b><br>\r\n			[MEMBERRANK]\r\n			</div>\r\n			<div style=''clear: both''></div>\r\n			<div style=''margin-top: 3px''>\r\n				<b>Member Options:</b>\r\n				<p align=''center'' style=''margin: 0px; padding: 0px''>\r\n					<a href=''[MAIN_ROOT]members''>My Account</a> - \r\n					[PMLINK] - \r\n					<a href=''[MAIN_ROOT]members/signout.php''>Sign Out</a>\r\n				</p>\r\n			</div>\r\n		</div>');

INSERT INTO `menuitem_custompage` (`menucustompage_id`, `menuitem_id`, `custompage_id`, `prefix`, `linktarget`, `textalign`) VALUES(3, 19, 12, '<b>&middot;</b> ', '', 'left');
INSERT INTO `menuitem_custompage` (`menucustompage_id`, `menuitem_id`, `custompage_id`, `prefix`, `linktarget`, `textalign`) VALUES(2, 18, 11, '<b>&middot;</b> ', '', 'left');

INSERT INTO `menuitem_link` (`menulink_id`, `menuitem_id`, `link`, `linktarget`, `prefix`, `textalign`) VALUES(1, 1, 'index.php', '', '<b>&middot;</b> ', 'left');
INSERT INTO `menuitem_link` (`menulink_id`, `menuitem_id`, `link`, `linktarget`, `prefix`, `textalign`) VALUES(3, 8, 'news', '', '<b>&middot;</b> ', 'left');
INSERT INTO `menuitem_link` (`menulink_id`, `menuitem_id`, `link`, `linktarget`, `prefix`, `textalign`) VALUES(4, 9, 'members.php', '', '<b>&middot;</b> ', 'left');
INSERT INTO `menuitem_link` (`menulink_id`, `menuitem_id`, `link`, `linktarget`, `prefix`, `textalign`) VALUES(5, 10, 'ranks.php', '', '<b>&middot;</b> ', 'left');
INSERT INTO `menuitem_link` (`menulink_id`, `menuitem_id`, `link`, `linktarget`, `prefix`, `textalign`) VALUES(6, 11, 'squads', '', '<b>&middot;</b> ', 'left');
INSERT INTO `menuitem_link` (`menulink_id`, `menuitem_id`, `link`, `linktarget`, `prefix`, `textalign`) VALUES(7, 12, 'tournaments', '', '<b>&middot;</b> ', 'left');
INSERT INTO `menuitem_link` (`menulink_id`, `menuitem_id`, `link`, `linktarget`, `prefix`, `textalign`) VALUES(8, 13, 'events', '', '<b>&middot;</b> ', 'left');
INSERT INTO `menuitem_link` (`menulink_id`, `menuitem_id`, `link`, `linktarget`, `prefix`, `textalign`) VALUES(9, 14, 'medals.php', '', '<b>&middot;</b> ', 'left');
INSERT INTO `menuitem_link` (`menulink_id`, `menuitem_id`, `link`, `linktarget`, `prefix`, `textalign`) VALUES(10, 15, 'diplomacy', '', '<b>&middot;</b> ', 'left');
INSERT INTO `menuitem_link` (`menulink_id`, `menuitem_id`, `link`, `linktarget`, `prefix`, `textalign`) VALUES(11, 16, 'diplomacy/request.php', '', '<b>&middot;</b> ', 'left');
INSERT INTO `menuitem_link` (`menulink_id`, `menuitem_id`, `link`, `linktarget`, `prefix`, `textalign`) VALUES(12, 20, 'forum', '', '<b>&middot;</b> ', 'left');
INSERT INTO `menuitem_link` (`menulink_id`, `menuitem_id`, `link`, `linktarget`, `prefix`, `textalign`) VALUES(13, 21, 'signup.php', '', '<b>&middot;</b> ', 'left');
INSERT INTO `menuitem_link` (`menulink_id`, `menuitem_id`, `link`, `linktarget`, `prefix`, `textalign`) VALUES(15, 33, 'news', '', '', 'left');
INSERT INTO `menuitem_link` (`menulink_id`, `menuitem_id`, `link`, `linktarget`, `prefix`, `textalign`) VALUES(16, 34, 'members.php', '', '', 'left');
INSERT INTO `menuitem_link` (`menulink_id`, `menuitem_id`, `link`, `linktarget`, `prefix`, `textalign`) VALUES(17, 35, 'tournaments', '', '', 'left');
INSERT INTO `menuitem_link` (`menulink_id`, `menuitem_id`, `link`, `linktarget`, `prefix`, `textalign`) VALUES(18, 36, 'squads', '', '', 'left');
INSERT INTO `menuitem_link` (`menulink_id`, `menuitem_id`, `link`, `linktarget`, `prefix`, `textalign`) VALUES(19, 37, 'events', '', '', 'left');
INSERT INTO `menuitem_link` (`menulink_id`, `menuitem_id`, `link`, `linktarget`, `prefix`, `textalign`) VALUES(20, 38, 'forum', '', '', 'left');
INSERT INTO `menuitem_link` (`menulink_id`, `menuitem_id`, `link`, `linktarget`, `prefix`, `textalign`) VALUES(29, 45, 'forgotpassword.php', '', '<b>&middot;</b> ', 'left');

INSERT INTO `menuitem_shoutbox` (`menushoutbox_id`, `menuitem_id`, `width`, `height`, `percentwidth`, `percentheight`, `textboxwidth`) VALUES(1, 2, 0, 0, 0, 0, 0);

INSERT INTO `menu_category` (`menucategory_id`, `section`, `name`, `sortnum`, `headertype`, `headercode`, `accesstype`, `hide`) VALUES(3, 0, 'Main Menu', 1, 'customformat', '<div class=\"leftMenuTitle\">&raquo; Main Menu</div>', 0, 0);
INSERT INTO `menu_category` (`menucategory_id`, `section`, `name`, `sortnum`, `headertype`, `headercode`, `accesstype`, `hide`) VALUES(2, 0, 'Top Players', 2, 'customformat', '<div class=\"leftMenuTitle\">&raquo; Top Players</div>', 0, 0);
INSERT INTO `menu_category` (`menucategory_id`, `section`, `name`, `sortnum`, `headertype`, `headercode`, `accesstype`, `hide`) VALUES(5, 0, 'Forum Activity', 3, 'customformat', '<div class=\"leftMenuTitle\">&raquo; Forum Activity</div>', 0, 0);
INSERT INTO `menu_category` (`menucategory_id`, `section`, `name`, `sortnum`, `headertype`, `headercode`, `accesstype`, `hide`) VALUES(1, 1, 'Shoutbox', 1, 'customformat', '<div class=\"rightMenuTitle\">Shoutbox &laquo;</div>', 0, 0);
INSERT INTO `menu_category` (`menucategory_id`, `section`, `name`, `sortnum`, `headertype`, `headercode`, `accesstype`, `hide`) VALUES(4, 1, 'Newest Members', 2, 'customformat', '<div class=\"rightMenuTitle\">Newest Members &laquo;</div>', 0, 0);
INSERT INTO `menu_category` (`menucategory_id`, `section`, `name`, `sortnum`, `headertype`, `headercode`, `accesstype`, `hide`) VALUES(6, 2, 'Logged In', 1, 'custom', '', 1, 0);
INSERT INTO `menu_category` (`menucategory_id`, `section`, `name`, `sortnum`, `headertype`, `headercode`, `accesstype`, `hide`) VALUES(7, 2, 'Logged Out', 2, 'custom', '', 2, 0);
INSERT INTO `menu_category` (`menucategory_id`, `section`, `name`, `sortnum`, `headertype`, `headercode`, `accesstype`, `hide`) VALUES(14, 3, 'Top Menu', 1, 'customcode', '', 0, 0);
INSERT INTO `menu_category` (`menucategory_id`, `section`, `name`, `sortnum`, `headertype`, `headercode`, `accesstype`, `hide`) VALUES(15, 0, 'Poll', 4, 'customcode', '<div class=\"leftMenuTitle\">� Poll</div>', 0, 1);

INSERT INTO `menu_item` (`menuitem_id`, `menucategory_id`, `name`, `itemtype`, `itemtype_id`, `accesstype`, `hide`, `sortnum`) VALUES(2, 1, 'Shoutbox', 'shoutbox', 1, 0, 0, 1);
INSERT INTO `menu_item` (`menuitem_id`, `menucategory_id`, `name`, `itemtype`, `itemtype_id`, `accesstype`, `hide`, `sortnum`) VALUES(3, 2, 'Top Players Links', 'top-players', 0, 0, 0, 1);
INSERT INTO `menu_item` (`menuitem_id`, `menucategory_id`, `name`, `itemtype`, `itemtype_id`, `accesstype`, `hide`, `sortnum`) VALUES(1, 3, 'Home', 'link', 1, 0, 0, 1);
INSERT INTO `menu_item` (`menuitem_id`, `menucategory_id`, `name`, `itemtype`, `itemtype_id`, `accesstype`, `hide`, `sortnum`) VALUES(8, 3, 'News', 'link', 3, 0, 0, 2);
INSERT INTO `menu_item` (`menuitem_id`, `menucategory_id`, `name`, `itemtype`, `itemtype_id`, `accesstype`, `hide`, `sortnum`) VALUES(9, 3, 'Members', 'link', 4, 0, 0, 3);
INSERT INTO `menu_item` (`menuitem_id`, `menucategory_id`, `name`, `itemtype`, `itemtype_id`, `accesstype`, `hide`, `sortnum`) VALUES(10, 3, 'Ranks', 'link', 5, 0, 0, 4);
INSERT INTO `menu_item` (`menuitem_id`, `menucategory_id`, `name`, `itemtype`, `itemtype_id`, `accesstype`, `hide`, `sortnum`) VALUES(11, 3, 'Squads', 'link', 6, 0, 0, 5);
INSERT INTO `menu_item` (`menuitem_id`, `menucategory_id`, `name`, `itemtype`, `itemtype_id`, `accesstype`, `hide`, `sortnum`) VALUES(12, 3, 'Tournaments', 'link', 7, 0, 0, 6);
INSERT INTO `menu_item` (`menuitem_id`, `menucategory_id`, `name`, `itemtype`, `itemtype_id`, `accesstype`, `hide`, `sortnum`) VALUES(13, 3, 'Events', 'link', 8, 0, 0, 7);
INSERT INTO `menu_item` (`menuitem_id`, `menucategory_id`, `name`, `itemtype`, `itemtype_id`, `accesstype`, `hide`, `sortnum`) VALUES(14, 3, 'Medals', 'link', 9, 0, 0, 8);
INSERT INTO `menu_item` (`menuitem_id`, `menucategory_id`, `name`, `itemtype`, `itemtype_id`, `accesstype`, `hide`, `sortnum`) VALUES(15, 3, 'Diplomacy', 'link', 10, 0, 0, 9);
INSERT INTO `menu_item` (`menuitem_id`, `menucategory_id`, `name`, `itemtype`, `itemtype_id`, `accesstype`, `hide`, `sortnum`) VALUES(16, 3, 'Diplomacy Request', 'link', 11, 0, 0, 10);
INSERT INTO `menu_item` (`menuitem_id`, `menucategory_id`, `name`, `itemtype`, `itemtype_id`, `accesstype`, `hide`, `sortnum`) VALUES(19, 3, 'Rules', 'custompage', 3, 0, 0, 11);
INSERT INTO `menu_item` (`menuitem_id`, `menucategory_id`, `name`, `itemtype`, `itemtype_id`, `accesstype`, `hide`, `sortnum`) VALUES(18, 3, 'History', 'custompage', 2, 0, 0, 12);
INSERT INTO `menu_item` (`menuitem_id`, `menucategory_id`, `name`, `itemtype`, `itemtype_id`, `accesstype`, `hide`, `sortnum`) VALUES(20, 3, 'Forum', 'link', 12, 0, 0, 13);
INSERT INTO `menu_item` (`menuitem_id`, `menucategory_id`, `name`, `itemtype`, `itemtype_id`, `accesstype`, `hide`, `sortnum`) VALUES(21, 3, 'Sign Up', 'link', 13, 2, 0, 14);
INSERT INTO `menu_item` (`menuitem_id`, `menucategory_id`, `name`, `itemtype`, `itemtype_id`, `accesstype`, `hide`, `sortnum`) VALUES(45, 3, 'Forgot Password', 'link', 29, 2, 0, 15);
INSERT INTO `menu_item` (`menuitem_id`, `menucategory_id`, `name`, `itemtype`, `itemtype_id`, `accesstype`, `hide`, `sortnum`) VALUES(4, 4, 'Newest Members', 'newestmembers', 0, 0, 0, 1);
INSERT INTO `menu_item` (`menuitem_id`, `menucategory_id`, `name`, `itemtype`, `itemtype_id`, `accesstype`, `hide`, `sortnum`) VALUES(5, 5, 'Forum Activity', 'forumactivity', 0, 0, 0, 1);
INSERT INTO `menu_item` (`menuitem_id`, `menucategory_id`, `name`, `itemtype`, `itemtype_id`, `accesstype`, `hide`, `sortnum`) VALUES(31, 6, 'Default Login', 'login', 0, 1, 0, 1);
INSERT INTO `menu_item` (`menuitem_id`, `menucategory_id`, `name`, `itemtype`, `itemtype_id`, `accesstype`, `hide`, `sortnum`) VALUES(25, 6, 'Logged In', 'customcode', 4, 1, 1, 2);
INSERT INTO `menu_item` (`menuitem_id`, `menucategory_id`, `name`, `itemtype`, `itemtype_id`, `accesstype`, `hide`, `sortnum`) VALUES(32, 7, 'Default Login', 'login', 0, 2, 0, 1);
INSERT INTO `menu_item` (`menuitem_id`, `menucategory_id`, `name`, `itemtype`, `itemtype_id`, `accesstype`, `hide`, `sortnum`) VALUES(27, 7, 'Logged Out', 'customcode', 6, 2, 1, 2);
INSERT INTO `menu_item` (`menuitem_id`, `menucategory_id`, `name`, `itemtype`, `itemtype_id`, `accesstype`, `hide`, `sortnum`) VALUES(33, 14, 'NEWS', 'link', 15, 0, 0, 1);
INSERT INTO `menu_item` (`menuitem_id`, `menucategory_id`, `name`, `itemtype`, `itemtype_id`, `accesstype`, `hide`, `sortnum`) VALUES(34, 14, 'MEMBERS', 'link', 16, 0, 0, 2);
INSERT INTO `menu_item` (`menuitem_id`, `menucategory_id`, `name`, `itemtype`, `itemtype_id`, `accesstype`, `hide`, `sortnum`) VALUES(35, 14, 'TOURNAMENTS', 'link', 17, 0, 0, 3);
INSERT INTO `menu_item` (`menuitem_id`, `menucategory_id`, `name`, `itemtype`, `itemtype_id`, `accesstype`, `hide`, `sortnum`) VALUES(36, 14, 'SQUADS', 'link', 18, 0, 0, 4);
INSERT INTO `menu_item` (`menuitem_id`, `menucategory_id`, `name`, `itemtype`, `itemtype_id`, `accesstype`, `hide`, `sortnum`) VALUES(37, 14, 'EVENTS', 'link', 19, 0, 0, 5);
INSERT INTO `menu_item` (`menuitem_id`, `menucategory_id`, `name`, `itemtype`, `itemtype_id`, `accesstype`, `hide`, `sortnum`) VALUES(38, 14, 'FORUM', 'link', 20, 0, 0, 6);

";


$menuSQL = str_replace("INSERT INTO `", "INSERT INTO `".$dbprefix, $menuSQL);


$emptyMenusSQL = "TRUNCATE `".$dbprefix."menuitem_customblock`;";
$emptyMenusSQL .= "TRUNCATE `".$dbprefix."menuitem_custompage`;";
$emptyMenusSQL .= "TRUNCATE `".$dbprefix."menuitem_image`;";
$emptyMenusSQL .= "TRUNCATE `".$dbprefix."menuitem_link`;";
$emptyMenusSQL .= "TRUNCATE `".$dbprefix."menuitem_shoutbox`;";
$emptyMenusSQL .= "TRUNCATE `".$dbprefix."menu_category`;";
$emptyMenusSQL .= "TRUNCATE `".$dbprefix."menu_item`;";


$fullSQL = $emptyMenusSQL.$menuSQL;

if($mysqli->multi_query($fullSQL)) {


	do {
		if($result = $mysqli->store_result()) {
			$result->free();
		}
	}
	while($mysqli->next_result());
	
	echo "Menus restored to default!";
	
	
}

?>

