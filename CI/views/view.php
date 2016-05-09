<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><div id="body">
    <div class="row">
        <div class="col-sm-6 col-md-6">
            <h4>TODO</h4>
            <ul>
                <li>移出部分js到js/下;</li>
                <li>每一条目前以“&lt;(holeid)”表示上一星系(root除外);</li>
                <li>每一条目后添加删除/查看/新建子星系,设为路径点/终点等选项;</li>
                <li>登录相关内容.</li>
                <li>I never stretch bg, nor repeat it. Sorry for 1366x768, but your IGB window should not be larger ;-)</li>
                <li>让php/mariadb自动删除旧记录.</li>
            </ul>
            <div class="result">                    <!--selected by script-->
                <p><span id="hover">鼠标指向即被选定的result:</span></p>
                <br />
                <p id="display_area" style="min-height:0px"></p>
            </div>
            <script>                                //帮你选块,简化操作
                function selectElement(element) {
                    if (window.getSelection) {
                        var sel = window.getSelection();
                        sel.removeAllRanges();
                        var range = document.createRange();
                        range.selectNodeContents(element);
                        sel.addRange(range);
                    } else if (document.selection) {
                        var textRange = document.body.createTextRange();
                        textRange.moveToElementText(element);
                        textRange.select();
                    }
                }
                $('p').mouseenter(function(){
                    selectElement($('span#hover').get(0));
                });
            </script>
        </div>
        <div class="col-sm-6 col-md-6 list_content panel panel-default">
            <div class="panel-heading">
                <b>list:</b>
            </div>
            <div id="tree" class="panel-body fancytree-colorize-hover fancytree-fade-expander">
            </div>
            <div class="panel-footer">
                <button id="btnExpandAll" class="btn btn-xs btn-primary">Expand all</button>
                <button id="btnCollapseAll" class="btn btn-xs btn-warning">Collapse all</button>
            </div>
        </div>
    </div>
    <div>                 <!--clipboard-->
        <input type="text" class="form-control" id="inp" value="剪切板事件与处理" />
        <script>
            //获取剪贴板数据方法
            function getClipboardText(event){
                var clipboardData = event.clipboardData || window.clipboardData;
                return clipboardData.getData("text");
            };
            //设置剪贴板数据
            function setClipboardText(event, value){
                if(event.clipboardData){
                    return event.clipboardData.setData("text/plain", value);
                }else if(window.clipboardData){
                    return window.clipboardData.setData("text", value);
                }
            };
            window.onload = function(){
                var oInp = document.getElementById("inp");
                oInp.addEventListener('paste',function(event){
                    var event = event || window.event;
                    var text = getClipboardText(event);
                    if(!/^\d+$/.test(text)){
                        event.preventDefault();
                    }
                }, false);
                document.addEventListener('copy',function(event){
                    var text = setClipboardText(event,"so that's it.");
                    event.preventDefault();
                },false);
            }
        </script>
    </div>

    <script>
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
        })
    </script>

</div>
