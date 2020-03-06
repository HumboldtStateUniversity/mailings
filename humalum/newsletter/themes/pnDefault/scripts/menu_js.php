<?php
?>

var agt = navigator.userAgent.toLowerCase();
var versInt = parseInt(navigator.appVersion);
var is_ie	= ((agt.indexOf("msie") != -1) && (agt.indexOf("opera") == -1));
var is_ie3    = (is_ie && (versInt < 4));
var is_ie4    = (is_ie && (versInt == 4) && (agt.indexOf("msie 4")!=-1) );
var is_aol   = (agt.indexOf("aol") != -1);
var is_aol3  = (is_aol && is_ie3);
var is_aol4  = (is_aol && is_ie4);
var is_aol5  = (agt.indexOf("aol 5") != -1);
var is_aol6  = (agt.indexOf("aol 6") != -1);
var is_comp   = (agt.indexOf("compuserve") != -1);
var is_comp2000   = (agt.indexOf("cs") != -1);	 
var is_compie = (is_comp && is_ie);


function ENVO_navBar( tableCellRef, hoverFlag, navStyle ) {
	if ( hoverFlag ) {
		switch ( navStyle ) {
			case 1:
				tableCellRef.style.backgroundColor = '#999999';
				break;
			default:
//				tableCellRef.style.backgroundColor = '#999999';
				if ( document.getElementsByTagName ) {
					tableCellRef.getElementsByTagName( 'a' )[0].style.color = '#c00';
				}
		}
	} else {
		switch ( navStyle ) {
			case 1:
				tableCellRef.style.backgroundColor = '#666666';
				break;
			default:
//				tableCellRef.style.backgroundColor = '#666666';
				if ( document.getElementsByTagName ) {
					tableCellRef.getElementsByTagName( 'a' )[0].style.color = '#000';
				}
		}
	}
}

function ENVO_navBarClick( tableCellRef, navStyle, url ) {
	ENVO_navBar( tableCellRef, 0, navStyle );
	ENVO_goTo( url );
}