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
var id
id=document.getElementById("id").value
param="id="+id
xhr.open("POST",url,true)
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.setRequestHeader("Content-length", param.length);
xhr.setRequestHeader("Connection", "close");
xhr.onreadystatechange=display
xhr.send(param)
}

function display(){
	if (xhr.readyState==4||xhr.status==200){
		var result_json=JSON.parse(xhr.responseText)
		var result=result_json.id+' '+result_json.parent
		document.getElementById("display_area").innerHTML=result
	}
}
