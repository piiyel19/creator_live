<div class="breadcrumb-holder">
  <div class="container-fluid">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="">Code Editor</a></li>
      <li class="breadcrumb-item active" id="html_module">
        <?php
                if(!empty($_POST['mod'])){
                    echo $_POST['mod'];
                } else {
                    echo 'Module';
                }
        ?>
      </li>
      <li class="breadcrumb-item active" id="html_sub_module">
        <?php
                if(!empty($_POST['sub_mod'])){
                    echo $_POST['sub_mod'];
                } else {
                    echo 'Sub Module';
                }
        ?>
      </li>
      <li class="breadcrumb-item active" id="html_mvc">
        <?php
                if(!empty($_POST['tmvc'])){
                    echo $_POST['tmvc'];
                } else {
                    echo 'MVC';
                }
        ?>
      </li>
      <li class="breadcrumb-item active" id="html_file">
        <?php
                // if(!empty($_POST['file'])){
                //     echo $_POST['file'];
                // } else {
                //     echo 'File';
                // }

                echo 'File';
        ?>
      </li>
    </ul>
  </div>
</div>

<section class="forms">
  <div class="container-fluid">
    <!-- Page Header-->
    <header> 
      <h1 class="h3 display"></h1>
    </header>
    <div class="row">
    	<div class="container">



    		<div class="row">
    			<div class="col-md-10">
    				<div class="row">
                        <div class="col-md-6" style="padding-bottom: 30px;">
                            <select class="form-control" name="module" id="module" onchange="module_selected();">
                                <option value="">- Module -</option>
                                <?= lookup_module()?>
                            </select>
                        </div>
                        <div class="col-md-6" style="padding-bottom: 30px;">
                            <select class="form-control" name="sub_module" id="sub_module">
                                <option value="">- Sub Module -</option>
                            </select>
                        </div>
	    				<div class="col-md-6" style="padding-bottom: 30px;">
	    					<select class="form-control" name="type_mvc" id="type_mvc" onchange="mvc_selected();">
	    						<option value="">- Type MVC -</option>
                                <option value="Model">Model</option>
                                <option value="View">View</option>
                                <option value="Controller">Controller</option>
	    					</select>
	    				</div>
	    				<div class="col-md-6" style="padding-bottom: 30px;">
	    					<select class="form-control" name="type_file" id="type_file" onchange="file_selected();">
	    						<option value="">- Type File -</option>
	    					</select>
	    				</div>
	    			</div>
    			</div>
    			<div class="col-md-2">
    				<div style="float: right; padding-bottom: 30px;">
                        <?php
                            if(!empty($_POST['file'])){
                        ?>
						<button class="btn btn-primary" onclick="save();">Commit Code</button>
                        <?php } ?>
					</div>	
    			</div>
    		</div>


            <div class="row" style="padding-left: 0px;">
                <div class="col-md-4">
                    <a href="http://beautifytools.com/php-beautifier.php" target="_blank"><button class="btn btn-primary" style="float: left">Beauty PHP</button></a>
                    <a href="https://www.freeformatter.com/html-formatter.html#ad-output" target="_blank"><button class="btn btn-primary" style="float: left">Beauty HTML</button></a>
                </div>
            </div>

            <?php
                if(!empty($_POST['file'])){
            ?>
            <hr>
			
			<textarea id="demo" class="form-control" name="history"cols="80" label="notes" rows="50" wrap="virtual">
				<?php
                if(!empty($_POST['file'])){
    	    		//$path_helper = $_SERVER['DOCUMENT_ROOT'].'/application/controllers/login.php';
    				$path_helper = $_POST['file'];
                    //var_dump($path_helper); exit();
                    $file = fopen($path_helper, "r");

    				//Output lines until EOF is reached
    				while(! feof($file)) {
    				  $line = fgets($file);
    				  echo $line;
    				}

    				fclose($file);
                }
				?>
			</textarea>
			<div style="float: right; padding-bottom: 30px; padding-top: 30px;">
				<button class="btn btn-primary" onclick="save();">Commit Code</button>
			</div>	

            <?php } ?>

		</div>
    </div>
  </div>
</section>


<style type="text/css">
	/* Styles go here */


	body{
		text-align:center;
		padding:50px;
	}
			
	textarea{
		width:400px;
			
		/* The following three rules make a difference in the script */
		overflow:hidden;
		line-height: 13px;
		font-size: 13px;
				
		border:1px solid #999;
		padding:10px;
		font-family: monospace;
		margin:0;
		display:block;
		outline:none;
	}

	/* textarea:focus{
	  border-color:#333;
	} */

	.container{
		position:relative;
		display:inline-block;
	}

	.line-nums{
		font-size:13px;
		line-height:13px;
		padding:10px 4px;
		font-family: monospace;
	  background: #EEE;
		position: absolute;
		width: 20px;
		left: -28px;
		bottom: 0;
		top: 0;
		text-align:right;
		border:1px solid #999;
	}
</style>


<script type="text/javascript">
	function save()
	{
        <?php
            if(!empty($_POST['file'])){
        ?>
            var r = confirm("Are you sure to commit ?");
            if (r == true) {
        		var code = $("#demo").val();
        		var data =  {
                                    'code':code,
                                    'file':"<?= $_POST['file'] ?>",
                                    '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                            }

                $.ajax({
                            url: '<?= base_url() ?>cpanel/save_code',
                            type: 'POST',
                            dataType: 'html',
                            data: data,
                            beforeSend: function() {
                               
                            },
                            success: function(response){
                                alert('Success Save');
                                location.reload();
                            }
                      })
            }
        <?php } else { ?>
            alert('Please Select File !');
        <?php } ?>
	}
</script>


<script data-require="angularjs@1.3.6" data-semver="1.3.6" src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.6/angular.min.js"></script>


<script type="text/javascript">
	window.onload = function(){
	  
	  $('textarea').val($('textarea').val().trim())

	  /*
	   * This hook adds autosizing functionality
	   * to your textarea
	   */
	  BehaveHooks.add(['keydown'], function(data){
	  	var numLines = data.lines.total, 
	  	    fontSize = parseInt( getComputedStyle(data.editor.element)['font-size'] ),
	  	    padding = parseInt( getComputedStyle(data.editor.element)['padding'] );
	  			data.editor.element.style.height = (((numLines*fontSize)+padding))+'px';
	  });
	  			
	  /*
	   * This hook adds Line Number Functionality
	   */
	  BehaveHooks.add(['keydown'], function(data){
	  	var numLines = data.lines.total,
	    		house = document.getElementsByClassName('line-nums')[0],
	  			html = '',
	  			i;
	  	
	  	for(i=0; i<numLines; i++){
	  		html += '<div>'+(i+1)+'</div>';
	  	}
	  	
	  	house.innerHTML = html;
	  
	  });
	  			
	  var editor = new Behave({
	  
	  	textarea: 		document.getElementById('demo'),
	  	replaceTab: 	true,
	    softTabs: 		true,
	    tabSize: 		4,
	  	autoOpen: 		true,
	  	overwrite: 		true,
	  	autoStrip: 		true,
	  	autoIndent: 	true
	  });
	};


	(function(undefined){

    'use strict';
    
    var BehaveHooks = BehaveHooks || (function(){
		var hooks = {};
		
		return {
		    add: function(hookName, fn){
			    if(typeof hookName == "object"){
			    	var i;
			    	for(i=0; i<hookName.length; i++){
				    	var theHook = hookName[i];
				    	if(!hooks[theHook]){
					    	hooks[theHook] = [];
				    	}
				    	hooks[theHook].push(fn);
			    	}
			    } else {
				    if(!hooks[hookName]){
				    	hooks[hookName] = [];
			    	}
			    	hooks[hookName].push(fn);
			    }
		    },
		    get: function(hookName){
			    if(hooks[hookName]){
			    	return hooks[hookName];
		    	}
		    }
	    };
	    
	})(),
	Behave = Behave || function (userOpts) {

        if (typeof String.prototype.repeat !== 'function') {
            String.prototype.repeat = function(times) {
                if(times < 1){
                    return '';
                }
                if(times % 2){
                    return this.repeat(times - 1) + this;
                }
                var half = this.repeat(times / 2);
                return half + half;
            };
        }

        if (typeof Array.prototype.filter !== 'function') {
            Array.prototype.filter = function(func /*, thisp */) {
                if (this === null) {
                    throw new TypeError();
                }

                var t = Object(this),
                    len = t.length >>> 0;
                if (typeof func != "function"){
                    throw new TypeError();
                }
                var res = [],
                    thisp = arguments[1];
                for (var i = 0; i < len; i++) {
                    if (i in t) {
                        var val = t[i];
                        if (func.call(thisp, val, i, t)) {
                            res.push(val);
                        }
                    }
                }
                return res;
            };
        }

        var defaults = {
            textarea: null,
            replaceTab: true,
            softTabs: true,
            tabSize: 4,
            autoOpen: true,
            overwrite: true,
            autoStrip: true,
            autoIndent: true,
            fence: false
        },
        tab,
        newLine,
        charSettings = {

            keyMap: [
                { open: "\"", close: "\"", canBreak: false },
                { open: "'", close: "'", canBreak: false },
                { open: "(", close: ")", canBreak: false },
                { open: "[", close: "]", canBreak: true },
                { open: "{", close: "}", canBreak: true }
            ]

        },
        utils = {
        	
        	_callHook: function(hookName, passData){
    			var hooks = BehaveHooks.get(hookName);
	    		passData = typeof passData=="boolean" && passData === false ? false : true;
	    		
	    		if(hooks){
			    	if(passData){
				    	var theEditor = defaults.textarea,
				    		textVal = theEditor.value,
				    		caretPos = utils.cursor.get(),
				    		i;
				    	
				    	for(i=0; i<hooks.length; i++){
					    	hooks[i].call(undefined, {
					    		editor: {
						    		element: theEditor,
						    		text: textVal,
						    		levelsDeep: utils.levelsDeep()
					    		},
						    	caret: {
							    	pos: caretPos
						    	},
						    	lines: {
							    	current: utils.cursor.getLine(textVal, caretPos),
							    	total: utils.editor.getLines(textVal)
						    	}
					    	});
				    	}
			    	} else {
				    	for(i=0; i<hooks.length; i++){
				    		hooks[i].call(undefined);
				    	}
			    	}
		    	}
	    	},
        	
            defineNewLine: function(){
                var ta = document.createElement('textarea');
                ta.value = "\n";
                
                if(ta.value.length==2){
                    newLine = "\r\n";
                } else {
                    newLine = "\n";
                }
            },
            defineTabSize: function(tabSize){
                if(typeof defaults.textarea.style.OTabSize != "undefined"){ 
                    defaults.textarea.style.OTabSize = tabSize; return;
                }
                if(typeof defaults.textarea.style.MozTabSize != "undefined"){ 
                    defaults.textarea.style.MozTabSize = tabSize; return;
                }
                if(typeof defaults.textarea.style.tabSize != "undefined"){ 
                    defaults.textarea.style.tabSize = tabSize; return;
                }
            },
            cursor: {
	            getLine: function(textVal, pos){
		        	return ((textVal.substring(0,pos)).split("\n")).length;
	        	},
	            get: function() {

                    if (typeof document.createElement('textarea').selectionStart==="number") {
                        return defaults.textarea.selectionStart;
                    } else if (document.selection) {
                        var caretPos = 0,
                            range = defaults.textarea.createTextRange(),
                            rangeDupe = document.selection.createRange().duplicate(),
                            rangeDupeBookmark = rangeDupe.getBookmark();
                        range.moveToBookmark(rangeDupeBookmark);

                        while (range.moveStart('character' , -1) !== 0) {
                            caretPos++;
                        }
                        return caretPos;
                    }
                },
                set: function (start, end) {
                    if(!end){
                        end = start;
                    }
                    if (defaults.textarea.setSelectionRange) {
                        defaults.textarea.focus();
                        defaults.textarea.setSelectionRange(start, end);
                    } else if (defaults.textarea.createTextRange) {
                        var range = defaults.textarea.createTextRange();
                        range.collapse(true);
                        range.moveEnd('character', end);
                        range.moveStart('character', start);
                        range.select();
                    }
                },
                selection: function(){
                    var textAreaElement = defaults.textarea,
                        start = 0, 
                        end = 0, 
                        normalizedValue, 
                        range,
                        textInputRange, 
                        len, 
                        endRange;

                    if (typeof textAreaElement.selectionStart == "number" && typeof textAreaElement.selectionEnd == "number") {
                        start = textAreaElement.selectionStart;
                        end = textAreaElement.selectionEnd;
                    } else {
                        range = document.selection.createRange();

                        if (range && range.parentElement() == textAreaElement) {
                            
                            normalizedValue = utils.editor.get();
                            len = normalizedValue.length;
                            
                            textInputRange = textAreaElement.createTextRange();
                            textInputRange.moveToBookmark(range.getBookmark());

                            endRange = textAreaElement.createTextRange();
                            endRange.collapse(false);

                            if (textInputRange.compareEndPoints("StartToEnd", endRange) > -1) {
                                start = end = len;
                            } else {
                                start = -textInputRange.moveStart("character", -len);
                                start += normalizedValue.slice(0, start).split(newLine).length - 1;

                                if (textInputRange.compareEndPoints("EndToEnd", endRange) > -1) {
                                    end = len;
                                } else {
                                    end = -textInputRange.moveEnd("character", -len);
                                    end += normalizedValue.slice(0, end).split(newLine).length - 1;
                                }
                            }
                        }
                    }

                    return start==end ? false : {
                        start: start,
                        end: end
                    };
                }
            },
            editor: {
                getLines: function(textVal){
		        	return (textVal).split("\n").length;
	        	},
	            get: function(){
                    return defaults.textarea.value.replace(/\r/g,'');
                },
                set: function(data){
                    defaults.textarea.value = data;
                }
            },
            fenceRange: function(){
                if(typeof defaults.fence == "string"){

                    var data = utils.editor.get(),
                        pos = utils.cursor.get(),
                        hacked = 0,
                        matchedFence = data.indexOf(defaults.fence),
                        matchCase = 0;

                    while(matchedFence>=0){
                        matchCase++;
                        if( pos < (matchedFence+hacked) ){
                            break;
                        }

                        hacked += matchedFence+defaults.fence.length;
                        data = data.substring(matchedFence+defaults.fence.length);
                        matchedFence = data.indexOf(defaults.fence);

                    }

                    if( (hacked) < pos && ( (matchedFence+hacked) > pos ) && matchCase%2===0){
                        return true;
                    }
                    return false;
                } else {
                    return true;
                }
            },
            isEven: function(_this,i){
                return i%2;
            },
            levelsDeep: function(){
                var pos = utils.cursor.get(),
                    val = utils.editor.get();

                var left = val.substring(0, pos),
                    levels = 0,
                    i, j;

                for(i=0; i<left.length; i++){
                    for (j=0; j<charSettings.keyMap.length; j++) {
                        if(charSettings.keyMap[j].canBreak){
                            if(charSettings.keyMap[j].open == left.charAt(i)){
                                levels++;
                            }

                            if(charSettings.keyMap[j].close == left.charAt(i)){
                                levels--;
                            }
                        }
                    }
                }

                var toDecrement = 0,
                    quoteMap = ["'", "\""];
                for(i=0; i<charSettings.keyMap.length; i++) {
                    if(charSettings.keyMap[i].canBreak){
                        for(j in quoteMap){
                            toDecrement += left.split(quoteMap[j]).filter(utils.isEven).join('').split(charSettings.keyMap[i].open).length - 1;
                        }
                    }
                }

                var finalLevels = levels - toDecrement;
                
                return finalLevels >=0 ? finalLevels : 0;
            },
            deepExtend: function(destination, source) {
                for (var property in source) {
                    if (source[property] && source[property].constructor &&
                        source[property].constructor === Object) {
                        destination[property] = destination[property] || {};
                        utils.deepExtend(destination[property], source[property]);
                    } else {
                        destination[property] = source[property];
                    }
                }
                return destination;
            },
            addEvent: function addEvent(element, eventName, func) {
                if (element.addEventListener){
                    element.addEventListener(eventName,func,false);
                } else if (element.attachEvent) {
                    element.attachEvent("on"+eventName, func);
                }
            },
            removeEvent: function addEvent(element, eventName, func){
	            if (element.addEventListener){
	                element.removeEventListener(eventName,func,false);
	            } else if (element.attachEvent) {
	                element.detachEvent("on"+eventName, func);
	            }
	        },
	        
            preventDefaultEvent: function(e){
                if(e.preventDefault){
                    e.preventDefault();
                } else {
                    e.returnValue = false;
                }
            }
        },
        intercept = {
            tabKey: function (e) {

                if(!utils.fenceRange()){ return; }

                if (e.keyCode == 9) {
                    utils.preventDefaultEvent(e);
                    
                    var toReturn = true;
                    utils._callHook('tab:before');
                    
                    var selection = utils.cursor.selection(),
                        pos = utils.cursor.get(),
                        val = utils.editor.get();

                    if(selection){
                        
                        var tempStart = selection.start;
                        while(tempStart--){
                            if(val.charAt(tempStart)=="\n"){
                                selection.start = tempStart + 1;
                                break;
                            }
                        }

                        var toIndent = val.substring(selection.start, selection.end),
                            lines = toIndent.split("\n"),
                            i;

                        if(e.shiftKey){
                            for(i = 0; i<lines.length; i++){
                                if(lines[i].substring(0,tab.length) == tab){
                                    lines[i] = lines[i].substring(tab.length);
                                }
                            }
                            toIndent = lines.join("\n");
                            
                            utils.editor.set( val.substring(0,selection.start) + toIndent + val.substring(selection.end) );
                            utils.cursor.set(selection.start, selection.start+toIndent.length);

                        } else {
                            for(i in lines){
                                lines[i] = tab + lines[i];
                            }
                            toIndent = lines.join("\n");

                            utils.editor.set( val.substring(0,selection.start) + toIndent + val.substring(selection.end) );
                            utils.cursor.set(selection.start, selection.start+toIndent.length);
                        }
                    } else {
                        var left = val.substring(0, pos),
                            right = val.substring(pos),
                            edited = left + tab + right;

                        if(e.shiftKey){
                            if(val.substring(pos-tab.length, pos) == tab){
                                edited = val.substring(0, pos-tab.length) + right;
                                utils.editor.set(edited);
                                utils.cursor.set(pos-tab.length);
                            }
                        } else {
                            utils.editor.set(edited);
                            utils.cursor.set(pos + tab.length);
                            toReturn = false;
                        }
                    }
                    utils._callHook('tab:after');
                }
                return toReturn;
            },
            enterKey: function (e) {

                if(!utils.fenceRange()){ return; }

                if (e.keyCode == 13) {

                    utils.preventDefaultEvent(e);
                    utils._callHook('enter:before');
                    
                    var pos = utils.cursor.get(),
                        val = utils.editor.get(),
                        left = val.substring(0, pos),
                        right = val.substring(pos),
                        leftChar = left.charAt(left.length - 1),
                        rightChar = right.charAt(0),
                        numTabs = utils.levelsDeep(),
                        ourIndent = "",
                        closingBreak = "",
                        finalCursorPos,
                        i;
                    if(!numTabs){
                        finalCursorPos = 1;
                    } else {
                        while(numTabs--){
                            ourIndent+=tab;
                        }
                        ourIndent = ourIndent;
                        finalCursorPos = ourIndent.length + 1;

                        for(i=0; i<charSettings.keyMap.length; i++) {
                            if (charSettings.keyMap[i].open == leftChar && charSettings.keyMap[i].close == rightChar){
                                closingBreak = newLine;
                            }
                        }
                        
                    }

                    var edited = left + newLine + ourIndent + closingBreak + (ourIndent.substring(0, ourIndent.length-tab.length) ) + right;
                    utils.editor.set(edited);
                    utils.cursor.set(pos + finalCursorPos);
                    utils._callHook('enter:after');
                }
            },
            deleteKey: function (e) {

	            if(!utils.fenceRange()){ return; }
	
	            if(e.keyCode == 8){
	            	utils.preventDefaultEvent(e);
	                            
	            	utils._callHook('delete:before');
	            	
	            	var pos = utils.cursor.get(),
	                    val = utils.editor.get(),
	                    left = val.substring(0, pos),
	                    right = val.substring(pos),
	                    leftChar = left.charAt(left.length - 1),
	                    rightChar = right.charAt(0),
	                    i;
	            	
	                if( utils.cursor.selection() === false ){
	                    for(i=0; i<charSettings.keyMap.length; i++) {
	                        if (charSettings.keyMap[i].open == leftChar && charSettings.keyMap[i].close == rightChar) {
	                            var edited = val.substring(0,pos-1) + val.substring(pos+1);
	                            utils.editor.set(edited);
	                            utils.cursor.set(pos - 1);
	                            return;
	                        }
	                    }
	                    var edited = val.substring(0,pos-1) + val.substring(pos);
	                    utils.editor.set(edited);
	                    utils.cursor.set(pos - 1);
	                } else {
	                	var sel = utils.cursor.selection(),
	                		edited = val.substring(0,sel.start) + val.substring(sel.end);
	                    utils.editor.set(edited);
	                    utils.cursor.set(pos);
	                }
	                
	                utils._callHook('delete:after');
	                
	            }
	        }
        },
        charFuncs = {
            openedChar: function (_char, e) {
                utils.preventDefaultEvent(e);
                utils._callHook('openChar:before');
                var pos = utils.cursor.get(),
                    val = utils.editor.get(),
                    left = val.substring(0, pos),
                    right = val.substring(pos),
                    edited = left + _char.open + _char.close + right;

                defaults.textarea.value = edited;
                utils.cursor.set(pos + 1);
                utils._callHook('openChar:after');
            },
            closedChar: function (_char, e) {
                var pos = utils.cursor.get(),
                    val = utils.editor.get(),
                    toOverwrite = val.substring(pos, pos + 1);
                if (toOverwrite == _char.close) {
                    utils.preventDefaultEvent(e);
                    utils._callHook('closeChar:before');
                    utils.cursor.set(utils.cursor.get() + 1);
                    utils._callHook('closeChar:after');
                    return true;
                }
                return false;
            }
        },
        action = {
            filter: function (e) {

                if(!utils.fenceRange()){ return; }

                var theCode = e.which || e.keyCode;
                
                if(theCode == 39 || theCode == 40 && e.which===0){ return; }

                var _char = String.fromCharCode(theCode),
                    i;

                for(i=0; i<charSettings.keyMap.length; i++) {

                    if (charSettings.keyMap[i].close == _char) {
                        var didClose = defaults.overwrite && charFuncs.closedChar(charSettings.keyMap[i], e);

                        if (!didClose && charSettings.keyMap[i].open == _char && defaults.autoOpen) {
                            charFuncs.openedChar(charSettings.keyMap[i], e);
                        }
                    } else if (charSettings.keyMap[i].open == _char && defaults.autoOpen) {
                        charFuncs.openedChar(charSettings.keyMap[i], e);
                    }
                }
            },
            listen: function () {

                if(defaults.replaceTab){ utils.addEvent(defaults.textarea, 'keydown', intercept.tabKey); }
                if(defaults.autoIndent){ utils.addEvent(defaults.textarea, 'keydown', intercept.enterKey); }
                if(defaults.autoStrip){ utils.addEvent(defaults.textarea, 'keydown', intercept.deleteKey); }

                utils.addEvent(defaults.textarea, 'keypress', action.filter);
                
                utils.addEvent(defaults.textarea, 'keydown', function(){ utils._callHook('keydown'); });
                utils.addEvent(defaults.textarea, 'keyup', function(){ utils._callHook('keyup'); });
            }
        },
        init = function (opts) {

            if(opts.textarea){
            	utils._callHook('init:before', false);
                utils.deepExtend(defaults, opts);
                utils.defineNewLine();

                if (defaults.softTabs) {
                    tab = " ".repeat(defaults.tabSize);
                } else {
                    tab = "\t";

                    utils.defineTabSize(defaults.tabSize);
                }

                action.listen();
                utils._callHook('init:after', false);
            }

        };

        this.destroy = function(){
            utils.removeEvent(defaults.textarea, 'keydown', intercept.tabKey);
	        utils.removeEvent(defaults.textarea, 'keydown', intercept.enterKey);
	        utils.removeEvent(defaults.textarea, 'keydown', intercept.deleteKey);
	        utils.removeEvent(defaults.textarea, 'keypress', action.filter);
        };

        init(userOpts);

    };

    if (typeof module !== 'undefined' && module.exports) {
        module.exports = Behave;
    }

    if (typeof ender === 'undefined') {
        this.Behave = Behave;
        this.BehaveHooks = BehaveHooks;
    }

    if (typeof define === "function" && define.amd) {
        define("behave", [], function () { 
            return Behave; 
        });
    }

}).call(this);
</script>


<style type="text/css">
	textarea {
        overflow-y: scroll;
        height: 1000px;
        resize: none; /* Remove this if you want the user to resize the textarea */
    }


</style>




<script type="text/javascript">
    function module_selected()
    {
        $("#type_file").val('');
        $("#type_mvc").val('');


        var url_go = "<?= base_url()?>cpanel/";
        var module_selected = $("#module").val();
        var data = 
                {
                    'module':module_selected,
                    '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                }

                
        $.ajax({
                url: url_go+'module_selected',
                type: 'POST',
                dataType: 'html',
                data: data,
                beforeSend: function() {
                   // alert('Sila Tunggu');

                },
                success: function(response){
                  $("#sub_module").html('<option value="">- Sub Module -</option>'+response);
                }
        });
    }

    function mvc_selected()
    {
        var url_go = "<?= base_url()?>cpanel/";
        var module_selected = $("#module").val();
        var sub_selected = $("#sub_module").val();
        var type_mvc = $("#type_mvc").val();
        
        if((module_selected=='')||(sub_selected=='')||(type_mvc=='')){
            alert('Please Select Filter Item');
        } else {

            var data = 
                    {
                        'module':module_selected,
                        'sub_module':sub_selected,
                        'type_mvc':type_mvc,
                        '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                    }

                    
            $.ajax({
                    url: url_go+'get_file_editor',
                    type: 'POST',
                    dataType: 'html',
                    data: data,
                    beforeSend: function() {
                       // alert('Sila Tunggu');

                    },
                    success: function(response){
                      $("#type_file").html('<option value="">- Type File -</option>'+response);

                      $("#mod").val(module_selected);
                      $("#sub_mod").val(sub_selected);
                      $("#tmvc").val(type_mvc);
                    }
            });

        }

        
    }


    function file_selected()
    {
        var url_go = "<?= base_url()?>cpanel/";
        var type_file = $("#type_file").val();

        if(type_file==''){

        } else {
           $("#file").val(type_file);
           $("#btn_file").trigger('click');
        }
        
        
    }
</script>


<form action="<?= base_url()?>cpanel/text_editor" method="post" style="display: none">
    <input type="text" name="file" id="file">
    <input type="text" name="mod" id="mod">
    <input type="text" name="sub_mod" id="sub_mod">
    <input type="text" name="tmvc" id="tmvc">
    <button type="submit" id="btn_file"></button>
</form>