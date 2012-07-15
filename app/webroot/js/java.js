var win = null;
function NewWindow(mypage,myname,w,h,scroll){
LeftPosition = (screen.width) ? (screen.width-w)/2 : 0;
TopPosition = (screen.height) ? (screen.height-h)/2 : 0;
settings =
'height='+h+',width='+w+',top='+TopPosition+',left='+LeftPosition+',scrollbars='+scroll+',resizable'
win = window.open(mypage,myname,settings)
}


        function createTarget(t){
    window.open("", t, "'remote,width=600,height=350,scrollbars=no");
    return true;
}

function change(color){
var el=event.srcElement
if (el.tagName=="INPUT"&&el.type=="button")
event.srcElement.style.backgroundColor=color
}

function change(color){
if (event.srcElement.tagName=="INPUT")
event.srcElement.style.backgroundColor=color
}


defaultStatus="cartZone - clickable maps"
 
function PopupPic(sPicURL) { 
     window.open( "fit.htm?"+sPicURL, "",  
     "resizable=1,HEIGHT=420,WIDTH=420"); 
   } 