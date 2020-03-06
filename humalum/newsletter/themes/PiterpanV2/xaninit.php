<?php
// File: $Id: xaninit.php 16722 2005-08-27 12:35:10Z  $ $Name$
// Xanthia Theme Engine FOR PostNuke Content Management System
// Copyright (C) 2003 by the CorpNuke.com Development Team.
// Copyright is claimed only on changes to original files
// Modifications by: Larry E. Masters aka. PhpNut
// nut@phpnut.com
// http://www.coprnuke.com
// ----------------------------------------------------------------------------
// Copyright (c) 2002 by Brian K. Virgin (madhatter7@envolution.com)
// http://www.envolution.com
// Envolution Content Management System - http://www.envolution.com
// ----------------------------------------------------------------------------
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
// To read the license please read the docs/license.txt or visit
// http://www.gnu.org/copyleft/gpl.html
//
// ----------------------------------------------------------------------------
// Filename:        Xanthia Skin Init                             encinit.php
// Author:                Larry E. Masters
// Version:                0.95
// Purpose:                Install and Uninstall Skins
// ----------------------------------------------------------------------------
// Filename:        Encompss Skin Init                             encinit.php
// Author:                Brian K. Virgin
// Version:                0.926
// Purpose:                Install and Uninstall Skins
// ----------------------------------------------------------------------------
// Changelog
// 12-9-2002: ApathyBoy - Set theme settings specific to LogicII
// 11-2-2003: Mediatech - Set theme settings specific to TrueBlue
// ----------------------------------------------------------------------------


function xanthia_skins_install($args)
{
/////////////////////////////////////// Do Not Edit /////////////////////////////////////////

    // Check if the user has permission to perform this action
	if (!pnSecAuthAction(0, 'Xanthia', '::', ACCESS_EDIT)) {
		return false;
	}

    // extract all arguments passed to this function
	extract($args);
    
	// set the skin name from the id passed this function
	if(isset($id)) {
    	$skinName = $id;
	} else {
		return false;
	}

///////////////////////////////////// End Do Not Edit ////////////////////////////////////////

    // create theme
    $skinID = CreateTheme($skinName);

    // Create theme palettes
	// Create one entry per palette available for this theme
	//	CreatePalette($skinName, $skinID, <default = 1 otherwise 0>, <palette name>,<background>,
	//                <color1>,<color2>,<color3>,<color4>,<color5>,<color6>, <color7>,
	//	              <color8>, <sepcolor>, <text1>, <text2>, <link>, <vlink>, <hover>);
	CreatePalette($skinName, $skinID, 1, $skinName, '#FFFFFF', '#FEFEFE', '#FEFEFE', '#E9EDF5', 
	              '#E9EDF5', '#003058', '#000066', '#505050', '#505050', '#505050', '#505050',
				  '#505050', '#505050', '#505050', '#505050');

	$skinID = pnModAPIFunc('Xanthia','user','getSkinID', array('skin' => $skinName));

	// Create theme configuration variables
	//   CreateThemeVar($skinID, <variablename>, <language define>, <value>, '');
	CreateThemeVar($skinID,'pagewidth',_TM_PAGEWIDTH,'100%','');
	CreateThemeVar($skinID,'lcolwidth',_TM_LCOLWIDTH,'140','');
    CreateThemeVar($skinID,'rcolwidth',_TM_RCOLWIDTH,'170','');
	
	// Create theme templates
	// CreateThemeTemplate($skinID, <template label>, <template filename>, <template type>);
    CreateThemeTemplate($skinID,'master','master.htm', 'theme');
    CreateThemeTemplate($skinID,'lsblock','lsblock.htm', 'block');
    CreateThemeTemplate($skinID,'rsblock','rsblock.htm', 'block');
    CreateThemeTemplate($skinID,'table1','table1.htm', 'theme');
    CreateThemeTemplate($skinID,'table2','table2.htm', 'theme');
    CreateThemeTemplate($skinID,'News-index','News-index.htm', 'theme');
    CreateThemeTemplate($skinID,'News-article','News-article.htm', 'theme');
    CreateThemeTemplate($skinID,'News-index2','News-index2.htm', 'theme');
    CreateThemeTemplate($skinID,'mainmenu','mainmenu.htm', 'block');
    CreateThemeTemplate($skinID,'ccblock','ccblock.htm', 'block');
    CreateThemeTemplate($skinID, '*home', 'home.htm', 'module');
	CreateThemeTemplate($skinID, 'dsblock', 'dsblock.htm', 'block');

	// Add zones for theme
	pnModSetVar('Xanthia', $skinName.'newzone','|1:Upper Top Zone:ZUPPERTOP|2:Logo Zone:ZLOGO|3:Full Banner A:ZBANNERA|4:Channel Zone:ZCHANNEL|5:Full BannerB:ZBANNERB|6:Channel SubTop:ZSCHANNELTOP|7:Half Banner:ZBANNERC|8:Channel SubBot:ZSCHANNELBOT|9:Col3 Left:ZCOL3SLEFT|10:Col3 Center:ZCOL3SCENTER|11:Col3 Right:ZCOL3SRIGHT|12:Inner Left Column:ZINCOLLEFT|13:Inner Right Column:ZINCOLRIGHT|14:Center Block:ZCCBLOCK');
	
	// Create theme zones
	// CreateThemeZone($skinID, <definition - language define>, <label>, <type>, <active>, <skin type>);
    CreateThemeZone($skinID, _TM_MASTER, 'master', 0, 1, 'theme');
    CreateThemeZone($skinID, _TM_OPENTABLE1, 'table1', 0, 1, 'theme');
    CreateThemeZone($skinID, _TM_OPENTABLE2, 'table2', 0, 1, 'theme');
    CreateThemeZone($skinID, _TM_LEFTSIDEB, 'lsblock', 0, 1, 'block');
    CreateThemeZone($skinID, _TM_RIGHTSIDEB, 'rsblock', 1, 1, 'block');
    CreateThemeZone($skinID, _TM_NEWSINDEX, 'News-index', 0, 1, 'theme');
    CreateThemeZone($skinID, _TM_NEWSART, 'News-article', 0, 1, 'theme');
    CreateThemeZone($skinID, _TM_NEWSINDEX2, 'News-index2', 1, 1, 'theme');
    CreateThemeZone($skinID, _TM_MAINMENUB, 'mainmenu', 1, 1, 'block');
    CreateThemeZone($skinID, _TM_CENTERBLOCK, 'ccblock', 1, 1, 'block');
    CreateThemeZone($skinID, _TM_HOMEPAGE, '*home', 1, 1, 'module');
	CreateThemeZone($skinID, _TM_DEFAULT, 'dsblock', 0, 1, 'block');

	// Report success
	return true;
}

?>