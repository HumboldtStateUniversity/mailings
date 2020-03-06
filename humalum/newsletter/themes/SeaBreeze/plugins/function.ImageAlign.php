<?php
// $Id: function.ImageAlign.php 16598 2005-08-04 21:25:13Z markwest $
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
 * This file is a plugin for pnRender, the PostNuke implementation of Smarty
 *
 * @package      Xanthia_Templating_Environment
 * @subpackage   Xanthia
 * @version      $Id: function.ImageAlign.php 16598 2005-08-04 21:25:13Z markwest $
 * @author       The PostNuke development team
 * @link         http://www.postnuke.com  The PostNuke Home Page
 * @copyright    Copyright (C) 2002 by the PostNuke Development Team
 * @license      http://www.gnu.org/copyleft/gpl.html GNU General Public License
 */ 

 
/**
 * Smarty function to align the Topic Image on the News articles on the Index and Article page, 
 * or anywhere else, alternating from Left to Right, 
 * using the stylesheet TopicImageLeft and TopicImageRight styles.
 * It returns alternatingly Left or Right each time it is called.
 * 
 * Example
 * class="TopicImage<!--[ImageAlign]-->"
 *
 * Example
 * class="TopicImage<!--[ImageAlign align="Right"]-->"
 * Will start with the topic image of the first article on the right.
 * 
 * @author       Martin Andersen
 * @since        6/9/04
 * @see          function.ImageAlign.php::smarty_function_ImageAlign()
 * @param        array       $params      All attributes passed to this function from the template
 * @param        object      &$smarty     Reference to the Smarty object
 * @return       string      Left or Right
 */
function smarty_function_ImageAlign($params, &$smarty) {
	extract($params); 
	unset($params);
	static $SummaryCount=0;
	$Left="Left"; $Right="Right";
	if (isset($align) and strtolower($align)!="left") { $Left="Right"; $Right="Left"; } 
	return ($SummaryCount++ % 2 == 0) ? $Left : $Right; 
}

?>