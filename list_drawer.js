"use strict"
//jquery required
$.extend({
	class_expanded:		"expanded", 
	class_collapsed:	"collapsed"
})
$.fn.extend({
	list_drawer:	function(){
		var mouseonchild=false
		$(this).children("ul").mouseover(function(){mouseonchild=true /*alert($(this).parent().attr("solarsystemname")+"moc=t")*/})
		$(this).children("ul").mouseout(function(){mouseonchild=false /*alert($(this).parent().attr("solarsystemname")+"moc=f")*/})
		$(this).click(function(){
			//alert($(this).attr("solarsystemname")+" mouseonchild="+mouseonchild)
			if (!mouseonchild) {
				$(this).children("ul").toggle(250)
				$(this).toggleClass($.class_expanded)
				$(this).toggleClass($.class_collapsed) }
		})
	}
})
