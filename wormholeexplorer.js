"use strict"

//var nodb=0
//var xhr   //shoud not use global var,may overwrited by a new ajaxquery(key,value) before the last display() callback finish
var expanded="expanded"
var collapsed="collapsed"
function find(key,value){
    ajaxquery("find",key,value)
}
function add(parent,child){
    ajaxquery("add",parent,child)
}
function delete1(id){
    ajaxquery("delete",id)
}
function ajaxquery(mode,param1,param2){
var xhr=new XMLHttpRequest()
if (xhr==null) {
    alert ("XMLHttpRequest() failed,old IE ?")
    return
}
var url="./wormholeexplorer.php"
var param
switch (mode)
    {
        case "find":{
            url="find.php"
            param="&key="+param1+"&value="+param2
            break
        }
        case "add":{
            url="add.php"
            param="&parent="+param1+"&child="+param2
            break
        }
        case "delete":{
            url="delete.php"
            param="&id="+param1
            break
        }
        default:{
            alert("Unsupported method")
            return
        }
    }
xhr.open("POST",url,true)
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.setRequestHeader("Content-length", param.length);
xhr.setRequestHeader("Connection", "keep-alive");
var dealwithresult;
switch (mode)
    {
        case "find":{
            dealwithresult=display
            break
        }
        case "add":{
            dealwithresult=dosomething
            break
        }
        case "delete":{
            dealwithresult=dosomething
            break
        }
        default:{
            alert("Unsupported mode")//unnecessary check
            return
        }
    }
//xhr.onreadystatechange=display(xhr)
xhr.onreadystatechange=function(){if (xhr.readyState==4&&xhr.status==200) dealwithresult(xhr.responseText)}
xhr.send(param)
}

//function display(xhr){
//function display(){
function display(result){
    //alert("display(xhr): i'm running")
    //alert(xhr.readyState)
    //alert(xhr.status)
    //if (xhr.readyState==4&&xhr.status==200){
    //if (this.readyState==4&&this.status==200){    //use 'this',maybe the invoker is xhr?
    ///////////////////////////////////////////////////////THIS CAN BE DONE IN ajaxquery() TO AVOID OVERWRITING VAR "xhr"
    
        //if(nodb) {var result=JSON.parse('[{"id": 1,"parent": "LQ-AHE","child": "NODB-1"},{"id": 2,"parent": "LQ-AHE","child": "EXAMPLE"},{"id": 3,"parent": "LQ-AHE","child": "J123432"},{"id": 4,"parent": "LQ-AHE","child": "mariadb is NOT running"},{"id": 5,"parent": "LQ-AHE","child": "PHP WILL try to query mariadb"},{"id": 6,"parent": "LQ-AHE","child": "ONLY parent=LQ is avaliable"}]')}
        //else {var result=JSON.parse(xhr.responseText)}

        result=JSON.parse(result)
        
/*      var n=result.length
        var content=''
        for (var i=0;i<n;i++){
            content+='id='+result[i].id+' p='+result[i].parent+' c='+result[i].child+'</br>'
        }
        document.getElementById("display_area").innerHTML=content
        //return content
*/
        var n=result.length
    
        for (var i=0;i<n;i++){  //for every children after the requested parent do
            var jqs_parent="[solarsystemname='"+result[i].parent+"']"
            var jqs_child="[solarsystemname='"+result[i].child+"']"
            var record=document.createElement("li")
            var spannode=document.createElement("span")
            var textnode=document.createTextNode(result[i].child)
            spannode.appendChild(textnode)
            record.appendChild(spannode)
            record.className=expanded
            record.setAttribute("solarsystemname",result[i].child)
            record.setAttribute("holeid",result[i].id)
            if ($(jqs_parent+">ul").length!=1) {
                alert("number of ul != 1 under "+result[i].parent)  //as the alert
                return -1}
            if ($(jqs_parent+">ul>[holeid='"+result[i].id+"']").length==1) {//this "holeid" is NOT a wormhole's class,but a record in db
                alert("[holeid]="+result[i].id+" existed,maybe parent="+result[i].parent+" already has been queried?")  //as the alert ,but we can refresh it
                return -2}
            else {
                $(jqs_parent+">ul").append(record)}
            if ($(jqs_child+">ul").length==0){  //if the child dont have an ul(useless unless there are two more wormhole to the same child in a parent)
                record=document.createElement("ul") //create one
                $(jqs_child).append(record)}    //and append it to the child
            $(jqs_child).list_drawer()
            //alert('p='+result[i].child+' will be queried')
            find("parent",result[i].child)
            //alert('p='+result[i].child+' queried')
        }
        //an awesome way to show these
    //}
}

function dosomething(result){
        result=JSON.parse(result)
}
