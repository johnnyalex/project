(function($){
    /**
     *
     * @param object arg
     *      arg:{
     *          btn: 获取验证码按钮对象
     *          opcode: 操作码
     *          data: 获取验证码传递的参数
     *          textseter: 设置验证码按钮文字显示
     *          tipseter: 设置验证码相关提示文字显示
     *          bthandler: 设置验证码按钮状态
     *          beforeget: 获取前的调用
     *          afterget: 获取成功后的回调
     *      }
     */

    var sendNum = 0; // 发送手机短信的次数
    
    CaptchaCode = function(arg){
        var this_obj = this;
        var base_url = __URL_MEMBER__ + '/sender';

        this.init = function() {
            var count_down = function(){
                arg.btn.css('color', '#999');

                var cur_time = 120;
                var down = function() {
                    arg.textseter('剩余(' + cur_time + 's)');
                    cur_time -= 1;

                    if (cur_time < 0) {
                        arg.btn.css('color', '#535353');
                        arg.textseter('获取验证码');
                    } else {
                        setTimeout(down, 1000);
                    }
                }
                down();
            }

            $.ajax({
                url:base_url + '/getcaptchacode?opcode=' + arg.opcode,
                type:'GET',
                data:arg.data ? arg.data : '',
                dataType:'json',
                beforeSend:function(){
                    arg.textseter('获取中...');
                    if (arg.beforeget && typeof arg.beforeget == 'function') {
                        arg.beforeget();
                    }
                },
                success:function(d) {
                    switch( parseInt(d.code)){
                        case 1000://sucess
                            count_down();
                        break;
                        case 1002:
                            try{
                                arg.tipseter('您今日获取5次短信验证码的机会已用尽，请明日再来。');
                                arg.textseter('重新获取');
                            }catch(e){}
                        break;
                        case 1003:
                            try{
                                arg.tipseter('您操作太频繁了，请稍后再试。');
                                arg.textseter('重新获取');
                                arg.bthandler(true);//disabled
                            }catch(e){}
                        break;
                        case 1001:
                        case 1004:
                        case 1005:
                        case 1008:
                            try{
                                arg.tipseter('验证码发送失败，请稍后再试。');
                                arg.textseter('重新获取');
                            }catch(e){}
                        break;
                        case 1007:
                            sendNum = d.num;
                            showVerfiyAlert2(arg.actions);
                            break;
                        default:
                            arg.textseter('重新获取');
                            try{arg.tipseter('');}catch(e){}
                        break;
                    }

                    if (arg.afterget && typeof arg.afterget == 'function') {
                        arg.afterget();
                    }
                }
            });
        }

        this.checkcode = function(code, callback) {
        	if(arg.opcode == 1001){
        		params = "&params=" + $('.phonenumber').val();
        	}else if(arg.opcode == 1002){
        		params = "&params=" + $('.oldphone').val();
        	}else{
        		params = '';
        	}
            $.ajax({
                url:base_url + '/checkcaptchacode?opcode=' + arg.opcode + '&cptcode=' + code + params,
                dataType:'json',
                success:function(d){
                    if (typeof callback === 'function') {
                        callback(d.code);
                    }
                }
            });
        }

    }

    /**
     * 弹出验证码框
     *
     */
    var showVerfiyAlert2 = function(actions){
        var htmlMsg = '<div class="sign-show clear">'
            +'<ul><li class="clear">'
            +'<input type="text" name="mjcode" class="check-code mr10 fl" />'
            +'<a href="javascript:;" id="mj_verfiy2" class="fl"><img src="/Public/wsverify?t='+new Date().getTime()+'" /></a>'
            +'<p class="link-tips link-tips05 mt10" id="mj_warn_1" style="display:none;">'
            +'<span class="title_cur"></span>'
            +'<span class="tips_ico"><i></i></span>'
            +'<span class="tips_txt">请输入图片验证码</span>'
            +'</p>'
            +'<p class="link-tips link-tips05 mt10 " id="mj_warn_2" style="display:none;">'
            +'<span class="title_cur"></span>'
            +'<span class="tips_ico"><i></i></span>'
            +'<span class="tips_txt">验证码错误</span>'
            +'</p>'
            +'</li>'
            +' <li>'
            +'<div class="btn mt20 clear"><a class="sub mr15 fl" id="mjconfirm2" data-action="'+actions+'" href="javascript:;">确认</a> <a id="mjclear" class="sub sub01 fl" href="javascript:;">取消</a></div>'
            +'</li></ul></div>'

        var c = new XDLightBox({
            title: "请输入图片验证码",
            lightBoxId: "alert_check_code",
            contentHtml: htmlMsg,
            scroll: false,
            isBgClickClose: false
        });
        c.init();
    }

    //确认提交验证码
    $("#mjconfirm2").live('click',function(){
        var that = this;
        var actions = $(this).data('action');
        var code = $("input[name='mjcode']");

        if(actions == 'verifyphone'){
            var phone = $("#verifyphone input[name='phonenumber']");
            var opt = 101;
        }else if(actions == 'resetphone'){
            var phone = $("#resetphone input[name='newphone']");
            var opt = 111;
        }else{
            return false;
        }

        if(code.val()==""){
            $("#mj_warn_2").css("display","none");
            $("#mj_warn_1").css("display","block");
            return false;
        }
        var wskey = "ws_" + code + phone;
        if($("body").data(wskey)=="islock"){
            return false;
        }else{
            $("body").data(wskey,"islock");
        }
        $(that).addClass('sub01');
        //验证验证码
        $.ajax({
            url: '/Sender/checkUserVerify',
            type:'POST',
            data:{"code":code.val(),"phone":phone.val(),"num":sendNum,"opt":opt},
            dataType:'json',
            success:function(d) {
                //如果验证码错误
                if (d.code == 1008) {
                    $("#mj_warn_2").find(".tips_txt").html(d.info);
                    $("#mj_verfiy2").click();
                    $("#mj_warn_1").css("display","none");
                    $("#mj_warn_2").css("display","block");
                    $(".phone_fake:visible").attr("disabled",false);
                    $(that).removeClass("sub01");
                } else {
                    $(".phone_fake:visible").val("获取中");
                    $("#alert_check_code,.alert_fullbg").remove();
                    $(that).css("color","rgb(153, 153, 153)");
                    $(that).css("cursor", "not-allowed");
                    $("body").data(wskey,"");
                    codeStatusWarn2(d);
                }

                $("body").data(wskey,"");
            },
        });
    });

//验证码状态提示
    var codeStatusWarn2 = function(d){
        var code = parseInt(d.code);
        switch(code){
            case 1001:
                count_down2();
                break;
            case 1003:
                $(".phone_fake:visible").attr("disabled",true).val("重新获取");
                $('#code_warn').html('<strong class="error"></strong><p class="msg_error">您今日获取5次短信验证码的机会已用尽，请明日再来。</p>');
                break;
            case 1004:
                $(".phone_fake:visible").attr("disabled",false).val("重新获取");
                $('#code_warn').html('<strong class="error"></strong><p class="msg_error">您操作太频繁了，请稍后再试。</p>');
                break;
            case 1002:
                $(".phone_fake:visible").attr("disabled",false).val("重新获取");
                $('#code_warn').html('<strong class="error"></strong><p class="msg_error">验证码发送失败，请稍后再试。</p>');
                break;
            case 1007:
                sendNum = d.num;
                showVerfiyAlert();
                break;
            default:
                $(".phone_fake:visible").val('重新获取');
                $('#code_warn').html('<strong class="error"></strong><p class="msg_error">未知错误，请稍后再试。</p>');
                break;
        }
    }

    /**
     * 发送短信验证  begin
     */
    var count_down2 = function(){
        var obj = $(".phone_fake:visible");
        obj.css('color', '#999');

        var cur_time = 180;
        var down = function() {
            obj.val('剩余(' + cur_time + 's)');
            obj.css('cursor', 'not-allowed');
            cur_time -= 1;

            if (cur_time < 0) {
                obj.removeAttr("disabled");
                obj.css('color', '#535353');
                obj.css('cursor', 'pointer');
                obj.val('获取验证码');
            } else {
                setTimeout(down, 1000);
            }
        }
        down();
    }

    //改变验证码
    $("#mj_verfiy2").live('click',function(){
        var that = this;
        var src ="/Public/wsverify?t=" + new Date().getTime();
        $(this).find("img").attr("src",src);
    });

    //取消提交验证
    $("#mjclear,.alert_close").live("click",function(){
        var that = this;
        $(".phone_fake:visible").attr("disabled",false);
        $(".phone_fake:visible").val("获取验证码");
        if($(that).attr("class")!="alert_close"){
            $(".alert_close").click();
        }
    });

})(jQuery);
