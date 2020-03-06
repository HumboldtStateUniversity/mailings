<?php
// File: $Id: theme.php 14813 2004-10-27 12:37:29Z markwest $ $Name$
// Copyright (c) 2002 by Pyksel (pyksel@envolution.com)
// http://www.envolution.com
// Envolution Content Management System - http://www.envolution.com
// --------------------------------------------------------------------
// LICENSE
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
// To read the license please read the docs/license.txt or visit
// http://www.gnu.org/copyleft/gpl.html
// --------------------------------------------------------------------
// Filename:    Xanthia Theme Engine      theme.php
// Original Author of file:     Brian K. Virgin (aka 'MADHATter7')
// Purpose of file:     Engine for Next Generation Themes
// --------------------------------------------------------------------

// check for direct call
if (strpos($_SERVER['PHP_SELF'], 'theme.php')) {
    die ("You can't access this file directly...");
}

// get the xanthia root path
if (!defined('_XANTHIA_ROOT_PATH')) {
	$xanthiarootpath = pnModGetVar('Xanthia','rootpath');
	define('_XANTHIA_ROOT_PATH', $xanthiarootpath);
}

// globalise the theme variables
global $engine, $thename, $themepath, $imagepath, $xanthia_theme;

// Check we can load the xanthia api
if (!pnModAPILoad('Xanthia', 'user')) {
	pnSessionSetVar('errormsg', _XA_APILOADFAILED);
}

// get the theme name from the file system
$thename = basename(dirname(__FILE__));

// set the theme path
$themepath = 'themes/'.$thename;

// set the image path
$imagepath = $themepath.'/images';

// we're a postnuke theme
$postnuke_theme = true;

// and a xanthia one too....
$xanthia_theme = true;

// get the theme id
$skinID = pnModAPIFunc('Xanthia','user','getSkinID', array('skin' => $thename));

// initialise the engine
$engine = pnModAPIFunc('Xanthia','user','init');

// check we have an engine object otherwise we can't procede
if (!is_object($engine)) {
	echo _XA_FAILEDTOINITENGINE . $thename;
	exit;
}

// check which palette to use
$paletteid = pnModGetVar('Xanthia',''.$thename.'use');

// get the color scheme
$colors = pnModAPIFunc('Xanthia','user','getSkinColors',
			array('skinid' => $skinID,
			'paletteid' => $paletteid));

// populate the color variables and defines
if (!empty($colors)) {
	$bgcolor1   = $colors['background'];
	$bgcolor2   = $colors['color1'];
	$bgcolor3   = $colors['color2'];
	$bgcolor4   = $colors['color3'];
	$bgcolor5   = $colors['color4'];
	$bgcolor6   = $colors['color5'];
	$sepcolor   = $colors['sepcolor'];
	$textcolor1 = $colors['text1'];
	$textcolor2 = $colors['text2'];

	define('_XA_TBGCOLOR',''.$colors['background'].'');
	define('_XA_TCOLOR1',$colors['color1']);
	define('_XA_TCOLOR2',$colors['color2']);
	define('_XA_TCOLOR3',$colors['color3']);
	define('_XA_TCOLOR4',$colors['color4']);
	define('_XA_TCOLOR5',$colors['color5']);
	define('_XA_TCOLOR6',$colors['color6']);
	define('_XA_TCOLOR7',$colors['color7']);
	define('_XA_TCOLOR8',$colors['color8']);
	define('_XA_TSEPCOLOR',$colors['sepcolor']);
	define('_XA_TTEXT1COLOR',$colors['text1']);
	define('_XA_TTEXT2COLOR',$colors['text2']);
	define('_XA_TLINKCOLOR',$colors['link']);
	define('_XA_TVLINKCOLOR',$colors['vlink']);
	define('_XA_THOVERCOLOR',$colors['hover']);
}

// get the theme language
themes_get_language();

function OpenTable() {
	global $engine;
	$engine->do_themetable('start', '1');
}

function CloseTable() {
	global $engine;
	$engine->do_themetable('stop', '1');
}

function OpenTable2() {
	global $engine;
	$engine->do_themetable('start', '2');
}

// Legacy Function: Closes the OpenTable2()
function CloseTable2() {
	global $engine;
	$engine->do_themetable('stop', '2');
}

// Legacy Function: Renders the Header of the Theme
function themeheader() {
	global $engine, $thename, $index, $themepath, $imagepath;

	//$engine->load_css_file(&$Browser);        mh7: not yet re-implemented
	if ($index != 3) {
		$engine->do_themeheader($index);
	}

}

// Legacy Function: Renders the Footer of the Theme
function themefooter() {
	global $engine, $index, $themepath;
	
	if ($index != 3) {
		$engine->do_themefooter($index);
	}

}

// Legacy Function: Displays the Articles on the News Page
// why did they not remove all of these deprecated variables ??
function themeindex ($_deprecated, $_deprecated, $_deprecated, $_deprecated,
        $_deprecated, $_deprecated, $_deprecated, $_deprecated, $_deprecated,
        $_deprecated, $_deprecated, $_deprecated, $info, $links, $preformat) {

	global $engine, $index;
	
	$engine->do_themeindex($info, $links, $preformat, $index);
}

// Legacy Function: Displays the Article Page when "Read More" is clicked
// why did they not remove all of these deprecated variables ??
function themearticle ($_deprecated, $_deprecated, $_deprecated, $_deprecated,
        $_deprecated, $_deprecated, $_deprecated, $_deprecated, $_deprecated,
        $info, $links, $preformat) {

	global $engine;
	
	$engine->do_themearticle($info, $links, $preformat);
}

// Legacy Function: Formats the Left and Right Sidblocks
function themesidebox($block) {
	global $engine, $index, $block_side;
	
	$engine->do_themesidebox($block, $index);
}

?>