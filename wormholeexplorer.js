"use strict"
var xhr
function query(){
xhr=new XMLHttpRequest()
if (xhr==null) {
	alert ("XMLHttpRequest() failed")
	return
}
var url="./wormholeexplorer.php"
var param
var key,value
key="parent"
value=document.getElementById("testinput").value
param="key="+key+"&"+"value="+value
xhr.open("POST",url,true)
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.setRequestHeader("Content-length", param.length);
xhr.setRequestHeader("Connection", "close");
xhr.onreadystatechange=display
xhr.send(param)
}

function display(){
	if (xhr.readyState==4||xhr.status==200){
		var result=JSON.parse(xhr.responseText)
		//result='id='+result.id+' p='+result.parent
		//result='id='+result.id[0]+' p='+result.parent[0]
		document.getElementById("display_area").innerHTML=result
	}
}
