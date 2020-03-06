<?php
// $Id: modifier.footnotes.php 17338 2005-12-16 13:44:37Z markwest $
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
 * @version      $Id: modifier.footnotes.php 17338 2005-12-16 13:44:37Z markwest $
 * @author       The PostNuke development team
 * @link         http://www.postnuke.com  The PostNuke Home Page
 * @license      http://www.gnu.org/copyleft/gpl.html GNU General Public License
 */ 

 
/**
 * Smarty modifier to convert urls into footnote references for printable page
 *
 * File:     	modifier.footnotes.php
 * Type:     	modifier
 * Name:     	footnotes
 * Date:     	Feb 23, 2005
 * Purpose:  	Generate footnotes for printable page
 * @author		Jochen Roemling
 * @author      Mark West
 * @version  	1.3
 * @param 		string
 * @param 		Smarty
 */
function smarty_modifier_footnotes($string)
{
	// globalise the links array
	global $link_arr;

	$link_arr = array();
	// replace the links
    $text = preg_replace_callback('/<a [^>]*href\s*=\s*\"?([^>\"]*)\"?[^>]*>(.*?)<\/a.*?>/i','Link_Callback',$string);

	return $text;
}


function Link_Callback($arr)
{
	// globalise the links array
	global $link_arr;

	// remember the link
    // TODO - work out why some links need decoding twice (&amp;amp;....)
	$link_arr[] = html_entity_decode(html_entity_decode($arr[1]));
	
	// return the replaced link
	return '<strong><u>'.$arr[2].'</u></strong> <small>['.count($link_arr).']</small>';
}

?>