// Timer Bar - Version 1.1
// Author: Brian Gosselin of http://scriptasylum.com
// Script featured on http://www.dynamicdrive.com
// Adapted by Martin Stær Andersen 26/6/2004

var loadedcolor='darkgray' ;       // PROGRESS BAR COLOR
var unloadedcolor='lightgrey';     // COLOR OF UNLOADED AREA
var bordercolor='black';           // COLOR OF THE BORDER
var barheight=15;                  // HEIGHT OF PROGRESS BAR IN PIXELS
var barwidth=250;                  // WIDTH OF THE BAR IN PIXELS
var waitTime=5;                    // NUMBER OF SECONDS FOR PROGRESSBAR

// The function below contains the action(s) taken once bar reaches 100%.
// If no action is desired, take everything out from between the curly braces ({})
// but leave the function name and curly braces in place.
// Presently, it is set to do nothing, but can be changed easily.

var action=function()
{
//alert("Page loaded!");
//window.location="http://www.postnuke.com";
}

//*****************************************************//
//**********  DO NOT EDIT BEYOND THIS POINT  **********//
//*****************************************************//

var dom=document.getElementById?true:false;
var ns4=(document.layers)?true:false;
var ie4=(document.all)?true:false;
var blocksize=(barwidth-2)/waitTime/10;
var loaded=0;
var loading;
var PBouter;
var PBdone;
var PBbckgnd;
var Pid=0;
var txt='';
if(ns4){ exit;
}else{
txt+='<div id="PBouter" onmouseup="hidebar()" style="position:relative; visibility:hidden; background-color:'+bordercolor+'; width:'+barwidth+'px; height:'+barheight+'px;">\n';
txt+='<div style="position:absolute; top:1px; left:1px; width:'+(barwidth-2)+'px; height:'+(barheight-2)+'px; background-color:'+unloadedcolor+'; font-size:1px;"></div>\n';
txt+='<div id="PBdone" style="position:absolute; top:1px; left:1px; width:0px; height:'+(barheight-2)+'px; background-color:'+loadedcolor+'; font-size:1px;"></div>\n';
txt+='</div>\n';
}
document.write(txt);

function incrCount(){
  window.status="Loading...";
  loaded++;
  if(loaded<0)loaded=0;
  if(loaded>=waitTime*10){
    clearInterval(Pid);
    loaded=waitTime*10;
    setTimeout('hidebar()',100);
  }
  resizeEl(PBdone, 0, blocksize*loaded, barheight-2, 0);
}

function hidebar(){
  clearInterval(Pid);
  loading = dom?document.getElementById('loading'):
            ie4?document.all['loading']:null;
  if (loading.style.display!='none') { progressBarInit(); }// If not done, restart
  window.status='';
//  PBouter.style.visibility="hidden";
  action();
}

function progressBarInit(){
  if (ns4) return;
  loaded=0;
  Pid=0;
  PBouter=(dom)?document.getElementById('PBouter'):
          (ie4)?document.all['PBouter']:null;
  PBdone=(dom)?document.getElementById('PBdone'):
         (ie4)?document.all['PBdone']:null;
  resizeEl(PBdone,0,0,barheight-2,0);
  PBouter.style.visibility="visible";
  Pid=setInterval('incrCount()',95);
}

function resizeEl(id,t,r,b,l){
  id.style.width=r+'px';
}

// window.onload=progressBarInit;
progressBarInit();