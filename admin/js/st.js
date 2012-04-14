var xmlhttp;	
var resp;
function exeAjax($param, $t_resp,$append){
    xmlhttp = cXMLHttpRequest();
    var url = 'ajax.php';
    var $fullurl = url + '?' + $param; 
    resp = document.getElementById($t_resp);
    xmlhttp.open("GET", $fullurl, true);
    xmlhttp.send(null);
    if($append)xmlhttp.onreadystatechange = append; 
    else xmlhttp.onreadystatechange = proev;    
}

function proev(){
    if(xmlhttp.readyState == 4)
    {   //// TEXT
        resp.innerHTML = xmlhttp.responseText;
       
    }  
    else 
    {
        resp.innerHTML = 'Changing ...';
    }

}
function append(){
    if(xmlhttp.readyState == 4)
    {   //// TEXT
        resp.innerHTML += xmlhttp.responseText;
       
    }  
    else 
    {
        //resp.innerHTML = 'Changing ...';
    }

}

function cXMLHttpRequest() {
    var xmlHttp=null;
    if (window.ActiveXObject) 
        xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
    else 
    if (window.XMLHttpRequest) 
        xmlHttp = new XMLHttpRequest();
    return xmlHttp;
}


function switchClass(rowid, defcolor)
{
    var pvrwid = document.getElementById("prevrowid").value;
    if(pvrwid!='row_none') { 
        document.getElementById(pvrwid).style.backgroundColor = defcolor;
    }
    document.getElementById(rowid).style.background = '#EBE5C5';
    document.getElementById("prevrowid").value = rowid;                
}

function less(l){
    y = document.getElementById(l)
    y.parentNode.removeChild(y);
}    

function changeStatusTab(hidden){
    var ob;
    for( f = 1; f <= 5; f++ ){
        
        ob = document.getElementById('tab_' + f);
        current = document.getElementById('tab' + f);
        if(hidden=='tab_'+f){  
            ob.style.display='block'; 
            current.style.background = '#BFBFBF';
        }else if(ob.style.display=='block'){  
            ob.style.display='none';
            current.style.background = '#DDDDDD'; 
        }
    }
}

function lo(ident){
    var ob;
    for(f=1;f<=5;f++)
    {
        ob=document.getElementById('in'+f);
        if(ident=='in'+f){
            ob.style.display ='block';
        } else if(ob.style.display =='block'){
            ob.style.display ='none';
        }
    }
}
