"use strict"

var nodb=0
var xhr
function query(key,value){
xhr=new XMLHttpRequest()
if (xhr==null) {
	alert ("XMLHttpRequest() failed")
	return
}
var url="./wormholeexplorer.php"
var param="key="+key+"&"+"value="+value
xhr.open("POST",url,true)
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.setRequestHeader("Content-length", param.length);
xhr.setRequestHeader("Connection", "keep-alive");
xhr.onreadystatechange=display
xhr.send(param)
}

function display(){
	if (xhr.readyState==4&&xhr.status==200){
		if(nodb) {var result=JSON.parse('[{"id": 1,"parent": "LQ-AHE","child": "NODB-1"},{"id": 2,"parent": "LQ-AHE","child": "EXAMPLE"},{"id": 3,"parent": "LQ-AHE","child": "J123432"},{"id": 4,"parent": "LQ-AHE","child": "mariadb is NOT running"},{"id": 5,"parent": "LQ-AHE","child": "PHP WILL try to query mariadb"},{"id": 6,"parent": "LQ-AHE","child": "ONLY parent=LQ is avaliable"}]')}
		else {var result=JSON.parse(xhr.responseText)}

		var n=result.length
		var content=''
		for (var i=0;i<n;i++){
			content+='id='+result[i].id+' p='+result[i].parent+' c='+result[i].child+'</br>'
		}
		document.getElementById("display_area").innerHTML=content
		//return content

		var n=result.length
		for (var i=0;i<n;i++){	//for every children after the requested parent do
			var jqs_parent="[solarsystemname='"+result[i].parent+"']"
			var jqs_child="[solarsystemname='"+result[i].child+"']"
			var record=document.createElement("li")
			var textnode=document.createTextNode(result[i].child)
			record.appendChild(textnode)
			record.className=$.class_expanded
			record.setAttribute("solarsystemname",result[i].child)
			record.setAttribute("holeid",result[i].id)
			if ($(jqs_parent+">ul").length==0) {
				alert("where is the <ul> under <li> "+result[i].parent+" ?")	//as the alert
				return -1}
			if ($(jqs_parent+">ul>[holeid='"+result[i].id+"']").length!=0) {
				alert("don't query parent="+result[i].parent+" again")}	//as the alert
			else {
				$(jqs_parent+">ul").append(record)}
			if ($(jqs_child+">ul").length==0){	//if the child dont have an ul(useless unless there are two more wormhole to the same child in a parent)
				record=document.createElement("ul")	//create one
				$(jqs_child).append(record)}	//and append it to the child
			$(jqs_child).list_drawer()
			query("parent",result[i].child)
		}
		//an awesome way to show these
	}
}
