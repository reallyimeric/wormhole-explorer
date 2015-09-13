function query(){
//var XHR
XHR=new XMLHttpRequest()
if (XHR==null) {
	alert ("XMLHttpRequest() failed")
	return
}
var url="./wormholeexplorer.php"
var param
var id
id=document.getElementById("id").value
param="id="+id
XHR.open("POST",url,true)
XHR.onreadystatechange=display
XHR.send(param)
}

function display(){
	alert('displaying,readtstate='+XHR.readyState+'status='+XHR.status)
	if (XHR.readyState==4){
		document.getElementById("display_area").innerHTML=XHR.responseText
	}
}
