<?php
// $Id: function.footnotes.php 17338 2005-12-16 13:44:37Z markwest $
// ----------------------------------------------------------------------
// PostNuke Content Management System
// Copyright (C) 2002 by the PostNuke Development Team.
// http://www.postnuke.com/
// ----------------------------------------------------------------------
// Based on:
// PHP-NUKE Web Portal System - http://phpnuke.org/
// Thatware - http://thatware.org/
// ----------------------------------------------------------------------
// LICENSE
//
// This program is free software; you can redistribute it and/or
// modify it under the terms of the GNU General Public License (GPL)
// as published by the Free Software Foundation; either version 2
// of the License, or (at your option) any later version.
//
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// To read the license please visit http://www.gnu.org/copyleft/gpl.html
// ----------------------------------------------------------------------

/**
 * Xanthia plugin
 * 
 * This file is a plugin for Xanthia, the PostNuke implementation of Smarty
 *
 * @package      Xanthia_Templating_Environment
 * @subpackage   Xanthia
 * @version      $Id: function.footnotes.php 17338 2005-12-16 13:44:37Z markwest $
 * @author       The PostNuke development team
 * @link         http://www.postnuke.com  The PostNuke Home Page
 * @copyright    Copyright (C) 2002 by the PostNuke Development Team
 * @license      http://www.gnu.org/copyleft/gpl.html GNU General Public License
 */ 

/**
 * Smarty function to display footnotes caculated by earlier modifier
 * 
 * Example
 *   <!--[footnotes]-->
 * 
 * @author		 Jochen Roemling
 * @author       Mark West
 * @since        23/02/2004
 * @param        array       $params      All attributes passed to this function from the template
 * @param        object      &$smarty     Reference to the Smarty object
 */
function smarty_function_footnotes($params, &$smarty) 
{
	// globalise the links array
	global $link_arr;

	if (is_array($link_arr) && !empty($link_arr)) {
		foreach ($link_arr as $key => $link) {
            // check for an e-mail address
			if (eregi("^([a-z0-9_]|\\-|\\.)+@(([a-z0-9_]|\\-)+\\.)+[a-z]{2,4}$", $link)) {
                $linktext = $link;
                $link = 'mailto:' . $link;
			// append base URL for local links (not web links)
            } elseif (!preg_match("/^http:\/\//i",$link))	{
                $link = pnGetBaseURL().$link;
                $linktext = $link;
			} else {
                $linktext = $link;
            }
            list($linktext, $link) = pnVarPrepForDisplay($linktext, $link);
			// output link
			$text .= '&nbsp;&nbsp;['.($key+1).'] <a class="print-normal" href="'.$link.'">'.$linktext.'</a><br />'."\n";
		}
	}
	return $text;
}

?>