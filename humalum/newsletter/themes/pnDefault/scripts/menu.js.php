<?PHP
$javascript =
'var agt = navigator.userAgent.toLowerCase();'."\n".
'var versInt = parseInt(navigator.appVersion);'."\n".
'var is_ie	= ((agt.indexOf("msie") != -1) && (agt.indexOf("opera") == -1));'."\n".
'var is_ie3    = (is_ie && (versInt < 4));'."\n".
'var is_ie4    = (is_ie && (versInt == 4) && (agt.indexOf("msie 4")!=-1) );'."\n".
'var is_aol   = (agt.indexOf("aol") != -1);'."\n".
'var is_aol3  = (is_aol && is_ie3);'."\n".
'var is_aol4  = (is_aol && is_ie4);'."\n".
'var is_aol5  = (agt.indexOf("aol 5") != -1);'."\n".
'var is_aol6  = (agt.indexOf("aol 6") != -1);'."\n".
'var is_comp   = (agt.indexOf("compuserve") != -1);'."\n".
'var is_comp2000   = (agt.indexOf("cs") != -1);'."\n".
'var is_compie = (is_comp && is_ie);'."\n".


'function xan_navBar( tableCellRef, hoverFlag, navStyle ) {'."\n".
'	if ( hoverFlag ) {'."\n".
'		switch ( navStyle ) {'."\n".
'			case 1:'."\n".
'				tableCellRef.style.backgroundColor = \''.$colors['color2'].'\';'."\n".
'				break;'."\n".
'			default:'."\n".

'				if ( document.getElementsByTagName ) {'."\n".
'					tableCellRef.getElementsByTagName( \'a\' )[0].style.color = \''.$colors['color3'].'\';'."\n".
'				}'."\n".
'		}'."\n".
'	} else {'."\n".
'		switch ( navStyle ) {'."\n".
'			case 1:'."\n".
'				tableCellRef.style.backgroundColor = \''.$colors['color5'].'\';'."\n".
'				break;'."\n".
'			default:'."\n".

'				if ( document.getElementsByTagName ) {'."\n".
'					tableCellRef.getElementsByTagName( \'a\' )[0].style.color = \''.$colors['color3'].'\';'."\n".
'				}'."\n".
'		}'."\n".
'	}'."\n".
'}'."\n".

'function xan_goTo (url) {'."\n".
'  location.href = url;'."\n".
'}'."\n".

'function xan_navBarClick( tableCellRef, navStyle, url ) {'."\n".
'	xan_navBar( tableCellRef, 0, navStyle );'."\n".
'	xan_goTo( url );'."\n".
'}'."\n".



'function napVector (vectorChoice) {'."\n".
'	   location.href = document.nap.vector.options[document.nap.vector.selectedIndex].value;'."\n".
'	   }'."\n".
'function ipVector (vectorChoice) {'."\n".
'	   location.href = document.ip.vector.options[document.ip.vector.selectedIndex].value;'."\n".
'	   }'."\n".


'function clickEdLink() {'."\n".
'	if ((document.cookie.indexOf(\'SelectedEdition\') == -1) && (document.cookie.indexOf(\'envoid\') != -1)) {'."\n".
'		launchEditionPopup();'."\n".
'	}'."\n".
'}'."\n";
?>
