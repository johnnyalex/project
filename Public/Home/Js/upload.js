
;(function($, window) {
    var $window = $(window);
    var element_length = 0;

    $.fn.upload = function(options,callback) {
        var ele = this;
        var myID = this.attr('id');
         if(typeof(myID) =='undefined'){
             element_length++;
             myID = 'autoid__'+element_length;
         }
        var formID = 'uploadfrom_'+myID;
        var boxID = 'upload_div_'+myID;
        var settings = {
            action       : "//upload.juancdn.com/api/upload.image",
            sign          : ele.data("sign"),
            token          : ele.data("token"),
            savePath          : "",
            container       : $window,
            //不再过分依赖callback,如果指定,程序将回写到这些属性组上.
            urlID   : ele.attr('data-urlID'),
            urlAttr : ele.attr('data-urlAttr'),
            fUrlID  : ele.attr('data-fUrlID'),
            fUrlAttr: ele.attr('data-fUrlAttr')
        };
        if(settings.sign === undefined) return false;
        if(settings.token === undefined) return false;
        //if (typeof(options)!=='undefined' && undefined !== options.action) delete options.action;


        if(typeof(callback)==='undefined'){ //如果没有指定callback.那么给这些没有赋值的变量给初值
        	if(settings.urlID !== undefined && settings.urlAttr ===undefined){ 
        		settings.urlAttr ='value';
        	}
        	if(settings.fUrlID !== undefined && settings.fUrlAttr === undefined){  
        		settings.fUrlAttr ='src';
        	}
        	//alert(settings.urlElementID);
            if(typeof(options)!=='undefined'){
                if (undefined !== options.urlID) delete settings.urlID;
                if (undefined !== options.urlAttr) delete settings.urlAttr;
                if (undefined !== options.fUrlID) delete settings.fUrlID;
                if (undefined !== options.fUrlAttr) delete settings.fUrlAttr;
            }
        }

        if(typeof(options)!=='undefined') {
            $.extend(settings, options);
        }

        if(ele.data("lock")) return false;
        if($("#"+boxID).size() == 0){
            var html = '<div style="display:none;" id="'+boxID+'"><iframe style="display: none;" frameborder="0" name="iframe'+myID+'" id="iframe'+myID+'"></iframe><form action="'+settings.action+'" method="post" enctype="multipart/form-data" id="'+formID+'" target="iframe'+myID+'" class="userin111">'
                +'<input style="font-size:50px;" type="file" name="pic" size="2" value="上传图片" class="fileinput"><input type="hidden" name="uploadID" value="'+myID+'"/><input type="hidden" name="sign" value="'+settings.sign+'"><input type="hidden" name="token" value="'+settings.token+'"><input type="hidden" name="output" value="iframe1"></form></div>';
            $("body").append(html);
            if(settings.savePath !== ""){
                $("#"+formID).append('<input type="hidden" name="savePath" value="'+settings.savePath+'">');
            }
            $("body").css("position","relative");

            var messenger = new Messenger('parent'+myID, 'MessengerDemo'),
                iframe1 = document.getElementById('iframe'+myID);


            // 绑定子页面 iframe
            messenger.addTarget(iframe1.contentWindow, 'iframe'+myID);

            messenger.listen(function (msg) {
                msg = eval("("+msg+")");

                function getUploadErrorMsg(error) {
                    if (!error || !error.code) {
                        return '文件上传失败，请重新上传。';
                    }
                    switch (parseInt(error.code)) {
                        case 10001:
                            return '请上传文件。';
                        case 10002:
                            return '您上传的文件格式不对，仅支持jpg、png、gif格式。';
                        case 10003:
                            return '您上传的文件过大，请压缩后再上传。';
                        default:
                            return '文件上传失败，请重新上传。';
                    }
                }

                //图片新接口数据 兼容以前的数据结构
                if (msg.apiVersion) {
                    var newObj = {error:''};
                    if (msg.error) {
                        if (msg.error.errors && $.isArray(msg.error.errors)) {
                            newObj.error = getUploadErrorMsg(msg.error.errors[0]);
                        } else {
                            newObj.error = '上传失败';
                        }
                    }

                   if (msg.data) {
                        if (msg.data.uploadID) {
                            newObj.uploadID = msg.data.uploadID;
                        }
                        newObj.data = {};
                        if (msg.data.items) {
                            var items, item, key;
                            for (key in msg.data.items) {
                                items = msg.data.items[key];
                                item = items[0];
                                newObj.data.path = item.filename;
                                newObj.data.extension = item.suffix;
                                newObj.data.size = item.size;
                                newObj.data.size01 = item.length;
                                newObj.data.type = item.mimetype;
                                break;
                            }
                        }
                    }
                    msg = newObj;
                }

                if(msg.uploadID != myID) return;

                if(typeof(callback)=='function'){ 
                    msg.me = settings; 
                	callback(msg);
                }else{
                	//alert(msg.data.path);
                	//拖过参数来修改对应的元素.
                	if(msg.error!=''){ //有错误
                		alert(msg.error);
                	}else{ 
                		var path = msg.data.path;
                		var fpath = __HOST_IMAGE__+path;
                        var selector = settings.urlID;
                        if(typeof(selector)!=='undefined' && selector!=''){
                            var selectorOper = selector.substring(0,1);
                            if(selectorOper!='#' && selectorOper!='.'){
                                selector = '#'+ settings.urlID;
                            }
                            var urlElement = $(selector);
                            if(urlElement.length>0){ 
                                urlElement.attr(settings.urlAttr,path);
                            }
                        }
                        var selector =settings.fUrlID;
                        if(typeof(selector)!=='undefined' && selector!=''){
                            var selectorOper = selector.substring(0,1);
                            if(selectorOper!='#' && selectorOper!='.'){
                                selector = '#'+selector;
                            }
                            var fUrlElement = $(selector);
                            if(fUrlElement.length>0){ 
                                fUrlElement.attr(settings.fUrlAttr,fpath);
                                //默认为某个元素添加一个value的属性
                                fUrlElement.val(fpath);
                                fUrlElement.show();
                            }
                        }
                	}
                	$("#defe").removeData("lock");
                }

            })
            $("#"+formID+" input[type='file']").change(function(){
                if (!$(this).val()) {
                    return;
                }
                var host_verify;
                if(document.domain.indexOf('.org')>0){
                    host_verify = "//c20c39d15cad.juanpi.org"
                }else{
                    host_verify = "//user.juanpi.com";
                }
                $.getJSON(host_verify + "/public/upVerify?callback=?","",function(backdata){
                    if(backdata.code == 1001){
                        $("#"+formID).append('<input type="hidden" name="l_sign" value="'+backdata.msg+'">');
                        ele.data("lock",true);
                        $("#"+formID).submit();
                        $("#"+formID+" input[name='l_sign']").remove();
                    }else{
                        alert(backdata.msg);
                    }
                });

            });

            //$(ele).live('click',function(){
                //alert(formID);
                //$("#"+formID+" input[type='file']").click();
            //});

            $(ele).live('mouseenter',function(){
                var offset = $(this).offset();
                //console.log('x:'+offset.top+"y:"+offset.left);
                $("#"+boxID).css({
                    "position":"absolute",
                    "top":offset.top,
                    "left":offset.left,
                    "height":$(this).height(),
                    "width":$(this).width(),
                    "opacity":"0",
                    "z-index":"999999",
                    'display':'block',
                    'cursor': 'pointer'
                });
                $("#"+boxID+" .fileinput").css({
                    "height":$(this).height(),
                    "width":$(this).width(),
                    'cursor': 'pointer'
                });
            });

            $('#'+boxID).live('mouseleave',function(){
                //console.log('1111');
                $("#"+boxID).css({
                    "position":"absolute",
                    'display':'none',
                    "top":0,
                    "left":0});
            });

        }
    }

    //用于使用类选择器的多个上传效果
    $.fn.multiUpload = function (options,callback){
        if(this.length>0){ 
            this.each(function(){
                $(this).upload(options,callback);
            });
        }
    }

})(jQuery, window);
