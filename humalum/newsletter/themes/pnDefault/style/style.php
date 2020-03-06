<?PHP
$stylesheet =
// main body style
'body {'."\n".
'	margin: 0px;'."\n".
'	padding: 0px;'."\n".
'	background-color: '.$colors['background'].';'."\n".
'	font-family: Verdana, Arial, Helvetica;'."\n".
'	color: '.$colors['text1'].';'."\n".
'	font-size: ' . "$size_text".'px;'."\n".
'	font-weight: normal;'."\n".
'}'."\n\n".

// block element styles
'div, p, td, th, input, textarea, form, select, font {'."\n".
'	font-family: Verdana, Arial, Helvetica;'."\n".
'	color:  '.$colors['text1'].';'."\n".
'	font-size: ' . "$size_text".'px;'."\n".
'}'."\n".

// anchor styles 
'a {'."\n".
'	font-size: ' . "$size_text".'px;'."\n".
'	text-decoration: none;'."\n".
'}'."\n".
'a:link {'."\n".
'	color: '.$colors['link'].';'."\n".
'}'."\n\n".
'a:visited {'."\n".
'	color: '.$colors['vlink'].';'."\n".
'}'."\n\n".
'a:hover {'."\n".
'	color: '.$colors['hover'].';'."\n".
'}'."\n\n".
'a:active {'."\n".
'	color: '.$colors['text2'].';'."\n".
'}'."\n\n".

'a img {'."\n".
'	border : 0px;'."\n".
'}'."\n\n".

'hr	{'."\n".
'	color:  '.$colors['text2'].';'."\n".
'}'."\n\n".

// news styles
'.content 	{'."\n".
'	background: none;'."\n".
'	font-size: ' . "$size_text".'px;'."\n".
'	font-family: geneva,arial,Verdana, Helvetica'."\n".
'}'."\n\n".

'.storycat	{'."\n".
'	background: none;'."\n".
'	font-size: 103%;'."\n".
'	font-weight: bold;'."\n".
'	font-family: Verdana, Helvetica;'."\n".
'	text-decoration: underline'."\n".
'}'."\n\n".

// block styles
'.boxtitle 	{'."\n".
'	background: none;'."\n".
'	color: '.$colors['color2'].';'."\n".
'	font-size: ' . "$size_text".'px;'."\n".
'	font-weight: bold;'."\n".
'	font-family: Verdana, Helvetica;'."\n".
'	text-decoration: none'."\n".
'}'."\n\n".

'.boxcontent 	{'."\n".
'	font-size: ' . "$size_text".'px;'."\n".
'	margin-top: .1em;'."\n".
'	padding-left: .5em;'."\n".
'	padding-right: .5em;'."\n".
'	border-left: solid;'."\n".
'	border-right: solid;'."\n".
'	border-left-width: thin;'."\n".
'	border-right-width: thin;'."\n".
'	border-bottom: solid;'."\n".
'	border-bottom-width: thin;'."\n".
'	border-top: solid;'."\n".
'	border-top-width: thin;'."\n".
'	border-color:  '.$colors['color2'].';'."\n".
'}'."\n\n".

'.box		{'."\n".
'	margin: 0em 3em 0em 3em;'."\n".
'	font-size: 97%;'."\n".
'	padding-left: .5em;'."\n".
'	padding-right: .5em;'."\n".
'	border-left: solid;'."\n".
'	border-right: solid;'."\n".
'	border-left-width: thin;'."\n".
'	border-right-width: thin;'."\n".
'	border-bottom: solid;'."\n".
'	border-bottom-width: thin;'."\n".
'	border-top: solid;'."\n".
'	border-top-width: thin;'."\n".
'	border-color:  '.$colors['color2'].';'."\n".
'}'."\n\n".

// theme navigation tabs
'.pn-navtabs {'."\n".
'	color: '.$colors['color2'].';'."\n".
'	background-color: #000000;'."\n".
'	font-size: ' . "$size_text".'px;'."\n".
'	font-weight: normal;'."\n".
'	text-align: center;'."\n".
'}'."\n\n".
	
'.pn-navtabs a {'."\n".
'	color: '.$colors['color4'].';'."\n".
'	font-size: ' . "$size_text".'px;'."\n".
'	font-weight: bold;'."\n".
'	text-decoration : none;'."\n".
'}'."\n\n".
	
'.pn-navtabs a:hover {'."\n".
'	color: '.$colors['color2'].';'."\n".
'	border-color:  '.$colors['color4'].';'."\n".
'}'."\n\n".

// title styles 
'.pn-pagetitle, h1 {'."\n".
'	color: '.$colors['text1'].';'."\n".
'	font-size: ' . "$size_title".'px;'."\n".
'	font-weight: bold;'."\n".
'	text-transform: uppercase;'."\n".
'}'."\n\n".

'.pn-title, h2 {'."\n".
'	font-size: ' . "$size_title".'px;'."\n".
'	font-weight: bold;'."\n".
'	color: '.$colors['text1'].';'."\n".
'	text-decoration: none;'."\n".
'}'."\n\n".

'.pn-title a {'."\n".
'	color: '.$colors['text2'].';'."\n".
'	font-size: ' . "$size_title".'px;'."\n".
'	font-weight: bold;'."\n".
'	text-decoration: none;'."\n".
'}'."\n\n".

'.pn-title a:hover {'."\n".
'	color: '.$colors['sepcolor'].';'."\n".
'}'."\n\n".

'.pn-sub {'."\n".
'	color: '.$colors['text1'].';'."\n".
'	font-size: ' . "$litletext".'px;'."\n".
'	font-weight: normal;'."\n".
'}'."\n\n".

'.pn-sub a {'."\n".
'	color: '.$colors['text1'].';'."\n".
'	font-size: ' . "$litletext".'px;'."\n".
'	font-weight: bold;'."\n".
'	text-decoration: none;'."\n".
'}'."\n\n".

'.pn-sub A:hover {'."\n".
'	color: '.$colors['sepcolor'].';'."\n".
'}'."\n\n".

'.pn-logo {'."\n".
'	color: '.$colors['text1'].';'."\n".
'	font-size: ' . "$size_text".'px;'."\n".
'	font-weight: bold;'."\n".
'	letter-spacing: 3px;'."\n".
'	background-color : transparent;'."\n".
'	text-decoration: none;'."\n".
'}'."\n\n".

'a.pn-logo {'."\n".
'	color: '.$colors['text2'].';'."\n".
'	font-size: ' . "$size_text".'px;'."\n".
'	font-weight: bold;'."\n".
'	letter-spacing: 3px;'."\n".
'	background-color : transparent;'."\n".
'	text-decoration: none;'."\n".
'}'."\n\n".

'a.pn-logo:hover {'."\n".
'	color: '.$colors['sepcolor'].';'."\n".
'}'."\n\n".

// .8x templated menu block styles
'.xanNav {'."\n".
'	color: '.$colors['text2'].';'."\n".
'	background-color: '.$colors['color5'].''."\n".
'}'."\n\n".

'.xanNav a:link {'."\n".
'	color: '.$colors['text2'].''."\n".
'}'."\n\n".

'.xanNav A:visited {'."\n".
'	color: '.$colors['text2'].''."\n".
'}'."\n\n".

'.xanNavText {'."\n".
'	padding-left: 4px;'."\n".
'	padding-bottom: 1.5px;'."\n".
'	font-weight: bold;'."\n".
'	font-size: 10px;'."\n".
'	line-height: 14px;'."\n".
'	font-family: verdana, arial, sans-serif'."\n".
'}'."\n\n".

'tr td.xanNav a:link {'."\n".
'	text-decoration: none'."\n".
'}'."\n\n".

'tr td.xanNav a:visited {'."\n".
'	text-decoration: none'."\n".
'}'."\n\n".

'td.swath {'."\n".
'	font: 10px sans-serif'."\n".
'}'."\n\n".

'tr.xanNavRow TD {'."\n".
'	border-right: '.$colors['text2'].' 1px solid;'."\n".
'	border-top: '.$colors['color3'].' 1px solid;'."\n".
'	vertical-align: middle;'."\n".
'	border-left: medium none;'."\n".
'	border-bottom: '.$colors['text2'].' 1px solid'."\n".
'}'."\n\n".

'tr.xanNavRow TD.swath {'."\n".
'	border-right: medium none;'."\n".
'	background-color: '.$colors['color3'].''."\n".
'}'."\n\n".

'.pn-sub_white {'."\n".
'	color: '.$colors['color1'].';'."\n".
'	font-size: ' . "$litletext".'px;'."\n".
'	font-weight: normal;'."\n".
'}'."\n\n";


?>