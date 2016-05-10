    glyph_opts = {
        map: {
            doc: "glyphicon glyphicon-file",
            docOpen: "glyphicon glyphicon-file",
            checkbox: "glyphicon glyphicon-unchecked",
            checkboxSelected: "glyphicon glyphicon-check",
            checkboxUnknown: "glyphicon glyphicon-share",
            dragHelper: "glyphicon glyphicon-play",
            dropMarker: "glyphicon glyphicon-arrow-right",
            error: "glyphicon glyphicon-warning-sign",
            expanderClosed: "glyphicon glyphicon-menu-right",
            expanderLazy: "glyphicon glyphicon-menu-right",  // glyphicon-plus-sign
            expanderOpen: "glyphicon glyphicon-menu-down",  // glyphicon-collapse-down
            folder: "glyphicon glyphicon-folder-close",
            folderOpen: "glyphicon glyphicon-folder-open",
            loading: "glyphicon glyphicon-refresh glyphicon-spin"
        }
    };

    $(function(){
        // Initialize Fancytree
        var initial_url = "/wormholeexplorer/Record/fancytree/parent/root"
        $("#tree").fancytree({
          extensions: ["edit", "glyph"],
          checkbox: true,
          glyph: glyph_opts,
          selectMode: 2,
          source: {url: initial_url, debugDelay: 1000},
          toggleEffect: { effect: "drop", options: {direction: "left"}, duration: 400 },
          wide: {
            iconWidth: "1em",     // Adjust this if @fancy-icon-width != "16px"
            iconSpacing: "0.5em", // Adjust this if @fancy-icon-spacing != "3px"
            levelOfs: "1.5em"     // Adjust this if ul padding != "16px"
          },

          icon: function(event, data){
            // if( data.node.isFolder() ) {
            //   return "glyphicon glyphicon-book";
            // }
          },
          lazyLoad: function(event, data) {
            data.result = {url: "/wormholeexplorer/Record/fancytree/parent/"+data.node.title, debugDelay: 1000};
          }
        });

        $("#btnExpandAll").click(function(){
    		$("#tree").fancytree("getTree").visit(function(node){
    			node.setExpanded(true);
    		});
    	});
    	$("#btnCollapseAll").click(function(){
    		$("#tree").fancytree("getTree").visit(function(node){
    			node.setExpanded(false);
    		});
    	});
    })
