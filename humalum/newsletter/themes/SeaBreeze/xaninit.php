<?php
// Copyright (c) 2002 by Brian K. Virgin (madhatter7@envolution.com)
// http://www.envolution.com
// Envolution Content Management System - http://www.envolution.com
// --------------------------------------------------------------------
// LICENSE
// This program is free software; you can redistribute it and/or
// modify it under the terms of the GNU General Public License (GPL)
// as published by the Free Software Foundation; either version 2
// of the License, or (at your option) any later version.
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
// To read the license please read the docs/license.txt or visit
// http://www.gnu.org/copyleft/gpl.html
// --------------------------------------------------------------------
// Filename:    Xanthia Theme Engine      xaninit.php
// Original Author of file:     Brian K. Virgin (aka 'MADHATter7')
// Purpose of file:     Engine for Next Generation Themes
// --------------------------------------------------------------------
// pnDefault - Xanthia v1.0 Theme
// Brook A. Humphrey
// --------------------------------------------------------------------

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
	//	CreatePalette($skinName, $skinID, <default = 1 otherwise 0>, <palette name>,<bgcolor>,
	//                <color1>,<color2>,<color3>,<color4>,<color5>,<color6>, <color7>, <color8>, 
	//	          <sepcolor>, <text1color>, <text2color>, <linkcolor>, <vlinkcolor>, <hovercolor>);
	CreatePalette($skinName, $skinID, 1, 'SeaBreeze', '#F9F9F9', //'#FFFFFF', '#E6E6E6' #DFE5FF #CCCCCC #F3F3F3 #78ACFF
			'#AAC5E0','#DFE5FF','#EAF2FF','#ACB2D4','#CC6600','#979D9E','#7B8284','#666633', 
			'#7C82A4', '#000000', '#FFFFFF', '#4C5EA8', '#4C5EA8', '#CC6600'); // #889091 #78ACFF mid-blue
			
	// Create theme configuration variables
	//   CreateThemeVar($skinID, <variablename>, <language define>, <value>, '');
	CreateThemeVar($skinID,'pagewidth',_TM_PAGEWIDTH,'100%','');
	CreateThemeVar($skinID,'lcolwidth',_TM_LCOLWIDTH,'140','');
	CreateThemeVar($skinID,'rcolwidth',_TM_RCOLWIDTH,'160','');
	CreateThemeVar($skinID,'indexcol',_TM_INDEXCOL,'1','');
	CreateThemeVar($skinID,'righton',_TM_RIGHTON,'0','');

	// Create theme templates
	// CreateThemeTemplate($skinID, <template label>, <template filename>, <template type>);
    CreateThemeTemplate($skinID, 'master', 'master.htm', 'theme');
    CreateThemeTemplate($skinID, 'lsblock', 'lsblock.htm', 'block');
    CreateThemeTemplate($skinID, 'rsblock', 'rsblock.htm', 'block');
    CreateThemeTemplate($skinID, 'table1', 'table1.htm', 'theme');
    CreateThemeTemplate($skinID, 'table2', 'table2.htm', 'theme');
    CreateThemeTemplate($skinID, 'News-index', 'News-index.htm', 'theme');
    CreateThemeTemplate($skinID, 'News-index2', 'News-index2.htm', 'theme');
    CreateThemeTemplate($skinID, 'News-article', 'News-article.htm', 'theme');
    CreateThemeTemplate($skinID, 'ccblock', 'ccblock.htm', 'block');
    CreateThemeTemplate($skinID, 'mainmenu', 'mainmenu.htm', 'block');
    CreateThemeTemplate($skinID, '*home', 'home.htm', 'module');
    CreateThemeTemplate($skinID, '*admin', 'admin.htm', 'module');
    CreateThemeTemplate($skinID, 'M-PNphpBB2', 'NoRightColumn.htm', 'module');
    CreateThemeTemplate($skinID, 'M-htmlpages', 'NoRightColumn.htm', 'module');
    CreateThemeTemplate($skinID, 'M-NukeWrapper', 'NoRightColumn.htm', 'module');

	// Add zones for theme
	pnModSetVar('Xanthia', $skinName.'newzone','');

	// Create theme zones
	// CreateThemeZone($skinID, <definition - language define>, <label>, <type>, <active>, <skin type>);
    CreateThemeZone($skinID, _TM_MASTER, 'master', 0, 1, 'theme');
    CreateThemeZone($skinID, _TM_LEFTSIDEB, 'lsblock', 0, 1, 'block');
    CreateThemeZone($skinID, _TM_RIGHTSIDEB,  'rsblock', 1, 1, 'block');
    CreateThemeZone($skinID, _TM_OPENTABLE1, 'table1', 0, 1, 'theme');
    CreateThemeZone($skinID, _TM_OPENTABLE2, 'table2', 0, 1, 'theme');
    CreateThemeZone($skinID, _TM_NEWSINDEX, 'News-index', 0, 1, 'theme');
    CreateThemeZone($skinID, _TM_NEWSART, 'News-article', 0, 1, 'theme');
    CreateThemeZone($skinID, _TM_NEWSINDEX2, 'News-index2', 0, 1, 'theme');
    CreateThemeZone($skinID, _TM_CENTERB, 'ccblock', 1, 1, 'block');
    CreateThemeZone($skinID, _TM_MAINMENUB, 'mainmenu', 1, 1, 'block');
    CreateThemeZone($skinID, _TM_HOMEPAGE, '*home', 1, 1, 'module');
    CreateThemeZone($skinID, _TM_ADMIN, '*admin', 1, 1, 'module');
    CreateThemeZone($skinID, _TM_PNphpBB, 'M-PNphpBB2', 1, 1, 'module');
    CreateThemeZone($skinID, _TM_HTMLpages, 'M-htmlpages', 1, 1, 'module');
    CreateThemeZone($skinID, _TM_NukeWrapper, 'M-NukeWrapper', 1, 1, 'module');

	// Report success
	return true;
}
?>