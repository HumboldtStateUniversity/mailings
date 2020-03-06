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

	// Create theme configuration variables
	//   CreateThemeVar($skinID, <variablename>, <language define>, <value>, '');
	CreateThemeVar($skinID, 'pagewidth', _TM_PAGEWIDTH, '100%', '');
    CreateThemeVar($skinID, 'lcolwidth', _TM_LCOLWIDTH, '150', '');
    CreateThemeVar($skinID, 'rcolwidth', _TM_RCOLWIDTH, '170', '');
    CreateThemeVar($skinID, 'indexcol', _TM_INDEXCOL, '2', '');
    CreateThemeVar($skinID, 'buttons', _TM_BUTTONSTYLE, '2', '');
    CreateThemeVar($skinID, 'size_title', _TM_SIZETITLE, '13', '');
    CreateThemeVar($skinID, 'size_text', _TM_SIZETEXT, '12', '');
    CreateThemeVar($skinID, 'size_litletext', _TM_SIZESMALL, '11', '');
    CreateThemeVar($skinID, 'buttons_header', _TM_HEADERMENU, '1', '');
    CreateThemeVar($skinID, 'buttons_top', _TM_TOPLINKS, '1', '');
    CreateThemeVar($skinID, 'buttons_footer', _TM_FOOTERMENU, '0', '');

    // Create theme palettes
	// Create one entry per palette available for this theme
	//	CreatePalette($skinName, $skinID, <default = 1 otherwise 0>, <palette name>,<background>,
	//                <color1>,<color2>,<color3>,<color4>,<color5>,<color6>, <color7>,
	//	              <color8>, <sepcolor>, <text1>, <text2>, <link>, <vlink>, <hover>);
	CreatePalette($skinName, $skinID, 1, 'Shades of Grey', '#FEFEFE','#E1E5E5','#CBCDCD','#B0B5B6','#A3A9AA','#979D9E',
	              '#FF9933', '#7B8284', '#666633', '#889091', '#000000', '#000000', '#FF0033', '#FF0033', '#0033FF');
    CreatePalette($skinName, $skinID, 0, 'Peachy', '#FFFFFF', '#F2CDCD', '#A24141', '#FCB281', '#EBC6C6', '#CB8787',
	             '#889091', '#7B8284', '#666633', '#FE6702', '#7D2A2A', '#5A2929', '#000080', '#800080','#F0E68C');
    CreatePalette($skinName, $skinID, 0, 'Blues', '#FFFFFF', '#F6F7FF', '#E6E8F6', '#B1B6D3', '#7F85A9', '#686E93',
	              '#EAEDED', '#E1E5E5', '#FF9900', '#434765', '#7B8284', '#575B7D', '#000080', '#800080', '#F0E68C');
    CreatePalette($skinName, $skinID, 0, 'Lima Green', '#FFFFFF', '#D0D9CF', '#B8C8B4', '#9DB598', '#82A17C', '#65865E',
	              '#FF9933', '#889091', '#7B8284', '#B39801', '#3F5E39', '#1D3418', '#000080', '#800080', '#F0E68C');
    CreatePalette($skinName, $skinID, 0, 'Autumn', '#FFFFFF', '#FFF8F0', '#EEDECB', '#E4CCAD', '#D1B48F', '#B59469',
	              '#FF9933', '#889091', '#7B8284', '#E1A04D', '#8A6536', '#6B4D27', '#000080', '#800080','#F0E68C');
    CreatePalette($skinName, $skinID, 0, 'Cream Soda', '#FFFFFF', '#FED585', '#FDCD71', '#FDC456', '#FDBC3E', '#FDA701',
	              '#FF9933', '#889091', '#7B8284', '#888887', '#795001', '#322100', '#000080', '#800080', '#F0E68C');
    CreatePalette($skinName, $skinID, 0,'Violet', '#FFFFFF', '#F4EEF7', '#DBD3DF', '#D0C6D4', '#B1A4B7', '#8C7D93', 
	              '#FF9933', '#889091', '#7B8284', '#9197B2', '#3A2E3F', '#67586D', '#000080', '#800080', '#F0E68C');  
    
	// Create theme templates
	// CreateThemeTemplate($skinID, <template label>, <template filename>, <template type>);
    CreateThemeTemplate($skinID, 'master', 'master.htm', 'theme');
    CreateThemeTemplate($skinID, 'lsblock', 'lsblock.htm', 'block');
    CreateThemeTemplate($skinID, 'rsblock', 'rsblock.htm', 'block');
    CreateThemeTemplate($skinID, 'table1', 'table1.htm', 'theme');
    CreateThemeTemplate($skinID, 'table2', 'table2.htm', 'theme');
    CreateThemeTemplate($skinID, 'News-index', 'News-index.htm', 'theme');
    CreateThemeTemplate($skinID, 'News-article', 'News-article.htm', 'theme');
    CreateThemeTemplate($skinID, 'News-index2', 'News-index2.htm', 'theme');
    CreateThemeTemplate($skinID, 'mainmenu', 'mainmenu.htm', 'block');
    CreateThemeTemplate($skinID, 'ccblock', 'ccblock.htm', 'block');
    CreateThemeTemplate($skinID, '*home', 'home.htm', 'module');
	CreateThemeTemplate($skinID, 'dsblock', 'dsblock.htm', 'block');

	// Add zones for theme
	pnModSetVar('Xanthia', $skinName.'newzone','|1:Upper Top Zone:ZUPPERTOP|2:Logo Zone:ZLOGO|3:Full Banner A:ZBANNERA|4:Channel Zone:ZCHANNEL|5:Full BannerB:ZBANNERB|6:Channel SubTop:ZSCHANNELTOP|7:Half Banner:ZBANNERC|8:Channel SubBot:ZSCHANNELBOT|9:Col3 Left:ZCOL3SLEFT|10:Col3 Center:ZCOL3SCENTER|11:Col3 Right:ZCOL3SRIGHT|12:Inner Left Column:ZINCOLLEFT|13:Inner Right Column:ZINCOLRIGHT|14:Center Block:ZCCBLOCK');

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
    CreateThemeZone($skinID, _TM_MAINMENUB, 'mainmenu', 1, 1, 'block');
    CreateThemeZone($skinID, _TM_CENTERBLOCK, 'ccblock', 1, 1, 'block');
    CreateThemeZone($skinID, _TM_HOMEPAGE, '*home', 1, 1, 'module');
	CreateThemeZone($skinID, _TM_DEFAULT, 'dsblock', 0, 1, 'block');

	// Report success
	return true;
}

?>