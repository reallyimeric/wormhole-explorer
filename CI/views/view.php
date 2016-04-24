<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><div id="body">
    <!--        //older ver,js+php with out any framework but jQuery
    <div style="display:none;">
        <input type="text" class="textinput" id="testinput" value="J000003"/>
        <input type="button" value="ajaxquery(p=)" onclick=ajaxquery("find","parent",document.getElementById("testinput").value) />
        <input type="button" value="p=LQ" onclick=ajaxquery("find","parent","LQ-AHE") />
        <input type="button" value="p=KR8" onclick=ajaxquery("find","parent","KR8-27") />
        <input type="button" value="START" onclick=ajaxquery("find","parent","root") />
    </div>
    -->
    <div class="row">
        <div class="col-sm-6 col-md-6">
            <h4>TODO</h4>
            <ul>
                <!--
                <p>1 ULTIMATELY FITTED RATTLESNAKE = 7e + 2.5e + 5e + (12+12+4+10+1+3+3) + (3+3+3+3+3+3) + 0.5 =...78 &gt; 1 plex </p>
                -->
                <li>移出部分js到js/下;</li>
                <li>每一条目前以“&lt;(holeid)”表示上一星系(root除外);</li>
                <li>每一条目后添加删除/查看/新建子星系,设为路径点/终点等选项;</li>
                <li>登录相关内容.</li>
                <li>I never stretch bg, nor repeat it. Sorry for 1366x768, but your IGB window should not be larger ;-)</li>
            </ul>
            <div class="result">
                <p><span id="hover">鼠标指向即被选定的result:</span></p>
                <br />
                <p id="display_area" style="min-height:0px"></p>
            </div>
        </div>
        <div class="col-sm-6 col-md-6 list_content">
            <ul>
                <li solarsystemname="root">root
                    <ul></ul>
                </li>
            </ul>
            <!--
            <p>
                <input type="text" id="solarsystemname" />
                <input type="button" value="ADD (temporarily)" onclick=add_to_base() />
            </p>
            -->
        </div>
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
    <!--                                    //no db in my windows
    <script>document.write("<p style='font-size:150%;font-weight:lighter'>nodb="+nodb+"</p>")</script>
    -->
    <!--                                    //oldold ver
    <form class="testinput" action="./wormholeexplorer.php" method="post" style="display:none;display:none;">
        <p>DO <span style="color:#ff0000;">NOT</span> use this</p>
        <div>
            <select name="key">
                <option value ="id">id</option>
                <option value ="parent">parent</option>
                <option value="child">child</option>
                <option value="type">type</option>
            </select>
            <span>=</span>
            <input name="value" type="text" value="13"></input>
            <input name="mode" value="find" style="display:none;"></input>
            <input name="parent" value="" style="display:none;"></input>
            <input name="child" value="" style="display:none;"></input>
            <input name="id" value="" style="display:none;"></input>
            <input type="submit" value="SUBMIT"></input>
        </div>
    </form>
    <form class="testinput" action="./wormholeexplorer.php" method="post" style="font-family:monospace;display:none;display:none;">
        <p>Send custom ajax query here</p>
        <div>
            <p>
                <span>mode</span>
                <select name="mode" style="position:absolute;left:10%;">
                    <option value ="find">find</option>
                    <option value ="add">add</option>
                    <option value="delete">delete</option>
                    <option value="gun!">gun!</option>
                </select>
            </p>
            <p>
                <span>find:key</span>
                <select name="key" style="position:absolute;left:10%;">
                    <option value ="id">id</option>
                    <option value ="parent">parent</option>
                    <option value="child">child</option>
                    <option value="type">type</option>
                </select>
            </p>
            <p><span>find:value</span><input name="value" value="13" style="position:absolute;left:10%;"></input></p>
            <p><span>add:parent</span><input name="parent" value="LOI-L1" style="position:absolute;left:10%;"></input></p>
            <p><span>add:child</span><input name="child" value="J113121" style="position:absolute;left:10%;"></input></p>
            <p><span>delete:id</span><input name="id" value="" style="position:absolute;left:10%;"></input></p>
            <p><input type="submit" value="SUBMIT"></input></p>
        </div>
    </form>
    -->
    <!--
    <div class="content">               //oldver,now we should use ci related
        <form action="./find.php" method="post" >
            <span name="mode" value="find" >find</span><input type="submit" value="SUBMIT" style="position:absolute;left:10%;" ></input>
            <p>
                <span>key</span>
                <select name="key" style="position:absolute;left:10%;">
                    <option value ="id">id</option>
                    <option value ="parent">parent</option>
                    <option value="child">child</option>
                    <option value="type">type</option>
                </select>
            </p>
            <p><span>value</span><input name="value" value="13" style="position:absolute;left:10%;"></input></p>
        </form>
        <form class="testinput" action="./add.php" method="post" style="border:2px;">
            <span name="mode" value="add" >add</span>
            <input type="submit" value="SUBMIT" style="position:absolute;left:10%;" ></input>
            <p>
                <span>parent</span>
                <input name="parent" value="LOI-L1" style="position:absolute;left:10%;"></input>
            </p>
            <p>
                <span>child</span>
                <input name="child" value="J113121" style="position:absolute;left:10%;"></input>
            </p>
        </form>
        <form class="testinput" action="./delete.php" method="post" style="border:2px;">
            <span name="mode" value="delete" >delete</span>
            <input type="submit" value="SUBMIT" style="position:absolute;left:10%;" ></input>
            <p>
                <span>id</span>
                <input name="id" value="" style="position:absolute;left:10%;"></input>
            </p>
        </form>
    </div>
    -->
    <div style="display:none;">
        <script language="javascript">
            function changeF()
            {
                document.getElementById('makeupCo').value=
                document.getElementById('makeupCoSe').options[document.getElementById('makeupCoSe').selectedIndex].value;
            }
        </script>
        <span style="position:absolute;border:1pt solid #c1c1c1;overflow:hidden;width:188px;height:19px;clip:rect(-1px 190px 190px 170px);">
            <select name="makeupCoSe" id="makeupCoSe" style="width:190px;height:20px;margin:-2px;" onChange="changeF();">
                <option id='1' value='java'>java</option>
                <option id='2' value='c++'>c++</option>
                <option id='3' value='python'>python</option>
                <OPTION id="99999" VALUE="" SELECTED></option>
            </select>
        </span>
        <span style="position:absolute;border-top:1pt solid #c1c1c1;border-left:1pt solid #c1c1c1;border-bottom:1pt solid #c1c1c1;width:170px;height:19px;">
            <input type="text" name="makeupCo" id="makeupCo" value="可输入的select" style="width:170px;height:15px;border:0pt;">
        </span>
    </div>
    <div>
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
</div>
