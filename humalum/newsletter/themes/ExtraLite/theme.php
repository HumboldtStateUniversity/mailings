<?php
// File: $Id: theme.php 17479 2006-01-07 17:44:02Z markwest $
// ----------------------------------------------------------------------
// PostNuke Content Management System
// Copyright (C) 2001 by the PostNuke Development Team.
// http://www.postnuke.com/
// ----------------------------------------------------------------------
// Based on:
// PHP-NUKE Web Portal System - http://phpnuke.org/
// Thatware - http://thatware.org/
// ----------------------------------------------------------------------
// LICENSE

// This program is free software; you can redistribute it and/or
// modify it under the terms of the GNU General Public License (GPL)
// as published by the Free Software Foundation; either version 2
// of the License, or (at your option) any later version.

// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.

// To read the license please visit http://www.gnu.org/copyleft/gpl.html
// ----------------------------------------------------------------------
// Original Author of file:  Francisco Burzi
// Purpose of file: Display a low bandwidth theme.
// ----------------------------------------------------------------------
$bgcolor1 = '#ffffff';
$bgcolor2 = '#cccccc';
$bgcolor3 = '#ffffff';
$bgcolor4 = '#eeeeee';
$bgcolor5 = '#000000';
$textcolor1 = '#000000';
$textcolor2 = '#000000';
$sepcolor = '#cccccc';
$postnuke_theme = true;

function OpenTable()
{
    echo "<div class=\"box1\">\n";
}

function OpenTable2()
{
    echo "<div class=\"box2\">\n";
}

function CloseTable()
{
    echo "</div>\n";
}

function CloseTable2()
{
    echo "</div>\n";
}

function themeheader()
{
    $sitename = pnConfigGetVar('sitename');
    $banners = pnConfigGetVar('banners');

    echo "</head>";
    echo "<body>";
    if(pnModAvailable('Banners')) {
		echo '<div>';
        pnBannerDisplay();
		echo '</div>';
    }
    echo "<table border=\"0\" cellpadding=\"4\" cellspacing=\"0\" style=\"width:100%\">\n" .
         "<tr>\n" .
         "<td style=\"background-color:$GLOBALS[bgcolor1]\">\n" .
         "<table border=\"0\" cellspacing=\"0\" cellpadding=\"3\" style=\"width:100%;background-color:$GLOBALS[bgcolor1]\">\n" .
         "<tr>\n" .
         "<td>\n" .
         "<a href=\"index.php\"><img src=\"" . WHERE_IS_PERSO . "images/logo.gif\" alt=\"" . _WELCOMETO . " $sitename\" /></a>\n" .
         "</td><td align=\"right\">" .
         '<form action="modules.php" method="post">' .
         '<div>' .
         '<input type="hidden" name="name" value="Search" />' .
         '<input type="hidden" name="action" value="search" />' .
         '<input type="hidden" name="overview" value="1" />' .
         '<input type="hidden" name="active_stories" value="1" />' .
         '<input type="hidden" name="bool" value="AND" />' .
         '<input type="hidden" name="stories_cat" value="" />' .
         '<input type="hidden" name="stories_topics" value="" />' .
         '<div style="text-align:right">' .
         _SEARCH . '&nbsp;' .
         "<input class=\"pn-text\" name=\"q\" type=\"text\" value=\"\" />&nbsp;\n" .
         '</div>' .
         '</div>' .
         '</form>' .
         "</td></tr></table>\n</td></tr>\n<tr><td valign=\"top\" style=\"width:100%;background-color:$GLOBALS[bgcolor1]\">" .
         "<table border=\"0\" cellspacing=\"0\" cellpadding=\"2\" style=\"width:100%\">
          <tr><td valign=\"top\" style=\"width:150px;background-color:$GLOBALS[bgcolor1]\">";
    blocks('left');
    echo "<img src=\"images/global/pix.gif\" width=\"100%\" height=\"1\" alt=\"\" />
          </td>
          <td>&nbsp;&nbsp;</td>
          <td valign=\"top\">";
	list ($module, $name) = pnVarCleanFromInput('module', 'name');
	if (empty($module) && empty($name)) {
        blocks('centre');
    }
}

function themefooter()
{
    echo "</td>
          <td>&nbsp;&nbsp;</td>
          <td valign=\"top\" style=\"width:150px;background-color:$GLOBALS[bgcolor1]\">";
    blocks('right');
    echo "</td></tr></table>
          </td></tr></table>
          <div style=\"text-align:center\">";
    footmsg();
    echo "</div>";
}

function themeindex ($_deprecated, $_deprecated, $_deprecated, $_deprecated, $_deprecated, $_deprecated, $_deprecated, $_deprecated, $_deprecated, $_deprecated, $_deprecated, $_deprecated, $info, $links, $preformat)
{
    echo "<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"background-color:$GLOBALS[bgcolor5]\" width=\"100%\"><tr><td>\n" .
         "<table border=\"0\" cellpadding=\"3\" cellspacing=\"1\" width=\"100%\"><tr><td style=\"background-color:$GLOBALS[bgcolor1]\">\n" .
         "<h2>$preformat[catandtitle]</h2>\n" .
         _POSTEDBY . ": $info[informant] " . _ON . " $info[longdatetime]\n";
    if (!empty($links['searchtopic'])) {
        echo "<br /><a href=\"$links[searchtopic]\">$info[topicname]</a>&nbsp;\n";
    }
    echo "</td></tr>\n" .
         "<tr><td style=\"background-color:$GLOBALS[bgcolor1]\">\n" .
         "$info[hometext]\n<br /><br />$preformat[notes]\n<br /><br />\n" .
         "</td></tr>\n" .
         "<tr><td style=\"background-color:$GLOBALS[bgcolor1];text-align:right\">\n" .
         "<span class=\"pn-sub\">$preformat[more]</span>\n" .
         "</td></tr></table>\n" .
         "</td></tr></table>\n" .
         "<br />";
}

function themearticle ($_deprecated, $_deprecated, $_deprecated, $_deprecated, $_deprecated, $_deprecated, $_deprecated, $_deprecated, $_deprecated, $info, $links, $preformat)
{
    echo"
    <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"text-align:left;background-color:$GLOBALS[bgcolor5];width:100%\"><tr><td>\n
    <table border=\"0\" cellpadding=\"3\" cellspacing=\"1\" style=\"width:100%\"><tr><td style=\"background-color:$GLOBALS[bgcolor1]\">\n
    <h2>$preformat[catandtitle]</h2>\n
    <span class=\"pn-sub\">" . _POSTEDBY . ": $info[informant] " . _ON . " $info[briefdatetime]</span>\n";

    if (pnSecAuthAction(0, 'Stories::Story', "$info[aid]:$info[cattitle]:$info[sid]", ACCESS_EDIT)) {
        echo "&nbsp;&nbsp; [ <a href=\"admin.php?module=AddStory&amp;op=EditStory&amp;sid=$info[sid]\">" . _EDIT . "</a> ]";
        if (pnSecAuthAction(0, 'Stories::Story', "$info[aid]:$info[cattitle]:$info[sid]", ACCESS_DELETE)) {
            echo " [ <a href=\"admin.php?module=AddStory&amp;op=RemoveStory&amp;sid=$info[sid]\">" . _DELETE . "</a> ]";
        }
    }
    if (!empty($links['searchtopic'])) {
        echo "<br /><a href=\"$links[searchtopic]\">$info[topicname]</a>&nbsp;\n";
    }
    echo "</td></tr>\n<tr><td style=\"background-color:$GLOBALS[bgcolor1]\">\n
    $preformat[fulltext]\n
    </td></tr></table>\n</td></tr></table><br />\n";
}

function themesidebox($block)
{
	if ($block['position'] == 'c') {
		if (!empty($block['title'])) {
		?>
		<div class="centerblock"><strong><?php echo $block['title'];?></strong></div>
		<?php
		} 
		?>
		<div class="centerblock"><?php echo $block['content'];?></div>
		<br />
		<?php
	} else {
		?>
		<div class="sideblock"><strong><?php echo $block['title'].'&nbsp;&nbsp;'.$block['minbox'];?></strong></div>
		<div class="sideblock"><?php echo $block['content'];?></div>
		<br />
		<?php
	}
}

?>