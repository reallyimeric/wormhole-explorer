"use strict"

function ajaxquery(mode, param1, param2){
    var xhr = new XMLHttpRequest()
    if (xhr == null) {
        alert ("new XMLHttpRequest() failed")
        return
    }
    var url = "index/"+param1+"/"+param2
    var dealwithresult
    xhr.timeout = 10000
    //xhr.addEventListener("progress", updateProgress, false)
    xhr.addEventListener("load", transferComplete, false)
    xhr.addEventListener("error", transferFailed, false)
    xhr.responseType = 'json'
    //xhr.addEventListener("abort", transferCanceled, false)
    function transferComplete(){dealwithresult(xhr)}
    function transferFailed(){alert('Failed')}
    switch (mode) {
        case "find":{
            xhr.open("GET",url)
            dealwithresult = traversal
            break
        }
        case "add":{
            xhr.open("POST",url)
            dealwithresult = display
            break
        }
        case "delete":{
            xhr.open("DELETE",url)
            dealwithresult = display
            break
        }
        default:{
            alert("Unsupported method")
            return
        }
    }
    xhr.setRequestHeader("Connection", "keep-alive")
    xhr.send()
}

function traversal(xhr){
    var result = xhr.response
    var n = result.length
    for (var i = 0;i < n;i++){  //for every children after the requested parent do
        var jqs_parent="[solarsystemname='"+result[i].parent+"']"
        var jqs_child="[solarsystemname='"+result[i].child+"']"
        var ulnode = document.createElement("ul")
        var linode = document.createElement("li")
        var spannode = document.createElement("span")
        var textnode = document.createTextNode(result[i].child)
        spannode.appendChild(textnode)
        linode.appendChild(spannode)
        ulnode.appendChild(linode)
        linode.className = $.list_drawer_class_expanded
        linode.setAttribute("solarsystemname",result[i].child)
        linode.setAttribute("holeid",result[i].id)
        $(jqs_parent).append(ulnode)
        $(jqs_child).list_drawer()
        //alert('p='+result[i].child+' will be queried')
        ajaxquery("find","parent",result[i].child)
        //alert('p='+result[i].child+' queried')
    }
}
