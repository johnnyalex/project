var setFavoriteFun = function() {
    var gidArray = new Array();
    var favken = XDTOOL.getCookie('s_sign');
    var s_uid = XDTOOL.getCookie('s_uid');
    $.getJSON(__URL_JUANPI__ + '/favorite/getFavoriteList?callback=?', {
        "uid": s_uid
    }, function(data) {
        if (data.code == 1000) {
            $.each(data.data, function(key, val) {
                val = val.replace(/[^0-9]/ig, "");
                if ($(".y-like[data-gid='" + val + "']").find(".like-ico").size() != 0) { //.find(".like-ico").size() != 0){
                    !$(".y-like[data-gid='" + val + "']").parents("li").find(".list-good").hasClass("gone") && $(".y-like[data-gid='" + val + "']").show();
                    $(".y-like[data-gid='" + val + "']").find(".like-ico").addClass("l-active");
                }
            });
        }
    });
};

var favoriteEventFun = function() {
    //大促活动活动页面不加载用户收藏的商品列表  yutu 
    var noGetFavorite = $("#noGetFavorite").val();

    if (XDPROFILE.uid != '' && noGetFavorite != 1) {
        setFavoriteFun();
    }
};

function getAppStatus() {
    var appStatus = 1;
    if (location.href.indexOf(__URL_JUANPI__) >= 0) {
        appStatus = 1;
    } else if (location.href.indexOf(__URL_JKY__) >= 0) {
        appStatus = 2;
    }

    return appStatus;
}


$(document).ready(function() {

    $("body").on('click', '.y-like', function() {

        if (XDPROFILE.uid == '') {
            XD.user_handsome_login_init();
            XD.user_handsome_login();
            return false;
        }
        if ($(this).find(".like-ico").size() != 0) {
            var do_status = $(this).find(".like-ico").hasClass("l-active") ? 0 : 1;
        } else {
            var do_status = $(this).hasClass("active") ? 0 : 1;

        }

        //大促活动只能收藏，不能取消  yutu  2015-07-09
        var noDoUnFavorite = $("#noDoUnFavorite").val();
        if (do_status == 0 && noDoUnFavorite == 1) {
            return false;
        }


        var likeObj = $(this);
        var gid = $(this).data("gid");
        var g_type = $(this).data("gtype");
        var mark = $(this).data("mark");
        if (!gid || !g_type) {
            return;
        }

        var favken = XDTOOL.getCookie('s_sign');

        //特卖收藏数据埋点,放在最后有小bug，故放在前面
        if (g_type == 3) {
            if (do_status == 1) {
                _paq.push(['trackEvent', 'temai', 'click_collect', 'goodsid', gid, ]);
            } else {
                _paq.push(['trackEvent', 'temai', 'click_cancel_collect', 'goodsid', gid, ]);
            }

        }
        $.ajax({
            type: 'GET',
            url: __URL_JUANPI__ + '/favorite/option',
            data: {
                "gid": gid,
                "status": do_status,
                'app': getAppStatus(),
                'gtype': g_type,
                'favken': favken
            },
            dataType: 'jsonp',
            success: function(data) {
                if (data.code == 1004) {
                    XD.user_handsome_login_init();
                    XD.user_handsome_login();
                } else {
                    $(".y-like[data-gid='" + gid + "']").each(function() {
                        $(this).find(".like-ico").toggleClass("l-active");
                        $(this).toggleClass("active");
                        $(this).html($(this).html().replace(/已收藏/, "收藏"));
                        if (do_status == 1) {
                            $(this).addClass("active");
                            $(this).html($(this).html().replace(/收藏/, "已收藏"));
                        } else {
                            $(this).removeClass("active");
                            $(this).html($(this).html().replace(/已收藏/, "收藏"));
                        }
                    });
                    if (likeObj.find(".like-ico").size() != 0) {
                        $("#likeico").remove();
                        likeObj.append('<div id="likeico"><span class="heart_left"></span><span class="heart_right"></span></div>');
                        setTimeout(function() {
                            $("#likeico").remove()
                        }, 600);
                        if (do_status == 1) {
                            $("#likeico").removeClass('unliked').addClass('like-big').addClass('demo1');
                            likeObj.css("display", "inline");
                        } else {
                            $("#likeico").removeClass('like-big').addClass('unliked').removeClass('demo1');
                            likeObj.css("display", "");
                        }
                    } else {
                        if (data.code == 1001 || data.code == 1100) {
                            if (data.code == 1100 && do_status == 1 && mark != "yugao") {
                                var content = '<div class="top_tips"><p><em class="over">收藏成功，你可在手机端随时随地找到你喜欢的宝贝了！</em></p> </div>' + '<p class="app-show"></p>' + '<div class="foot_tips">还没有安装客户端？<a  href="' + __URL_JUANPI__ + '/apps" class="foot_app">点击下载</a>' + '</div>';
                                b = new XDLightBox({
                                    title: "添加商品至“我的收藏”",
                                    lightBoxId: "alert_remind",
                                    contentHtml: content,
                                    scroll: false
                                });
                                b.init();
                            }


                            if (likeObj.find(".like-ico").size() == 0) {
                                if (do_status == 1) {
                                    var li = '<li li-id="' + data.data.uid + '"><a href="http://www.juanpi.com/u/' + data.data.uid + '" target="_blank"><img src="' + getResizeImageUrl(data.data.avatar, 80, 80) + '" width="35px" height="35px" alt="' + data.data.username + '" title="' + data.data.username + '"></a></li>';
                                    if ($('.share_people:eq(0) ul').size() == 0) { //http://s1.juancdn.com/'+data.data.avatar+'_80x80.jpg
                                        $('.share_people:eq(0) span').replaceWith("<ul>" + li + "</ul>");
                                    } else {
                                        if ($('.share_people:eq(0) li').size() >= 12) {
                                            $('.share_people:eq(0) li:last').remove();
                                        }
                                        $('.share_people:eq(0) ul').prepend(li);
                                    }
                                } else {
                                    if ($('.share_people:eq(0) li').size() == 1) {
                                        $('.share_people:eq(0) ul').replaceWith("<span>暂无用户收藏</span>");
                                    } else {
                                        $('.share_people:eq(0) ul li[li-id=' + data.data.uid + ']').remove();
                                    }
                                }
                            }

                        }

                    }

                }
            }
        });
    });
});(function($){
    $.fn.slowShow = function(ele,time){
        time = time == undefined?100:time;
        var timer=null;
        clearInterval(timer);
        this.hover(function(){
                clearTimeout(timer);
                timer=setTimeout(function(){
                    ele.show();
                },time);
            },
            function(){
                clearTimeout(timer);
                timer=setTimeout(function(){
                    ele.hide();
                },time);
            }
        )
    }



})(jQuery);

$(document).ready(function(){
    //双十二页面跳转
    var doubuleRedirectFun=function(){
        var ajaxUrl=__URL_JUANPI__+'/act/shop1212go';
        var ajaxParm='current_url='+location.href;
        $.ajax({
            type: "get",
            async: false,
            url: ajaxUrl,
            data: ajaxParm,
            dataType: "jsonp",
            jsonp: "callback", //传递给请求处理程序或页面的，用以获得jsonp回调函数名的参数名(一般默认为:callback)
            success: function (data) {
                if(data.redirect_url!=''){
                    window.location.href=data.redirect_url;
                }
            },
            error: function (e) {
                e;
            }
        });
    }
    //doubuleRedirectFun();

    //右侧导航定位
    var nav_show=function(){
        var _height=$(window).height();
        var ul_height=0;
        $("#J_sidebar .side-oper").each(function(i){
            ul_height+=$(this).height();
           
        })
        var con_height=_height-120;
        if(ul_height>con_height)
        {
            var _top=-(ul_height-con_height)+120;
            //console.log(_top);
            if(_top<0){
                $("#J_sidebar .side-oper").eq(0).css("top","0px");
            }else{
                $("#J_sidebar .side-oper").eq(0).css("top",_top+'px');
            }
        }
    }
    nav_show();
});
(function($){
    $("img.lazy").lazyload({threshold:200,failure_limit:30});
    /**
     * 服饰折扣推荐显示
     */
    if($('html.w1200').size()>0){
        $('.brand-show .brand-logo').show();
    }else{		
		if($('.baby-brand-show').size()>0){
            strlength = $('.baby-brand-show .brand-window li').length;
            for(i=strlength-1; i<=strlength; i++){
                $('.baby-brand-show .brand-window li')[i].remove();
            }
		}
        $('.brand-show .brand-logo').hide();
    }

    /**
     * 搜索
     * @author xueli@juanpi.com
     * @date   2014-12-05
     * @return {[type]}   [description]
     */
    searchFun = function () {
        var $search_txt = $("#keywords");
        $search_txt.on('focusin', function () {
            if ($(this).val() == "请输入想找的宝贝") {
                $(this).val("");
            } else {
                $(this).css({
                    color: '#646464'
                });
            }
        }).on('focusout', function () {
                if ($(this).val() == "") {
                    $(this).val("请输入想找的宝贝");
                    $(this).css({
                        color: '#C6C6C6'
                    });
                }
            }).on('focus', function () {
                if ($(this).val() == "请输入想找的宝贝") {
                    $(this).val("");
                    $(this).css({
                        color: '#666'
                    });
                } else {
                    $(this).css({
                        color: '#646464'
                    });
                }
            });

        $(".search .smt").on('click', function () {
            if ($search_txt.val() == "请输入想找的宝贝" || $search_txt.val() == "") {
                return false;
            }
            var s_url = $("#search_action").val() + '?keywords=' + $search_txt.val();
            window.location.href = s_url;
        });
        $search_txt.on('keydown', function (event) {
            if (event.keyCode == 13) {
                var s_url = $("#search_action").val() + '?keywords=' + $search_txt.val();
                window.location.href = s_url;
            }
        });
    }
    searchFun();

    /**
     * 用户数据初始化
     * @author xueli@juanpi.com
     * @date   2014-12-05
     * @return {[type]}   [description]
     */
    statusInit = function(){
        $(".state-show .normal-side-box").remove();
        //导航签到
        if (XDPROFILE.uid == '') {
            //未登录
            $(".state-show").append('<div class="normal-side-box"><div class="box-tips"><p class="text">每天最多可赚：<b>100</b> 积分<br><a target="_blank" href="'+__URL_JUANPI__+'/jifen/task">赚积分攻略</a></p><p class="other"> <a target="_blank" href="http://user.juanpi.com/beans">我的积分</a>&#12288;｜&#12288;<a target="_blank" href="http://www.juanpi.com/jifen">积分商城</a><br><a target="_blank" href="http://www.juanpi.com/jifen/sns">新手任务，轻松起步！</a><br>QQ特享群：<b>390623218</b> </p></div></div>');
        }else{
            var signData = XDTOOL.getCookie('sign_'+__XD_USER__.uid);
            if(signData != undefined && signData != null && $.trim(signData) != ''){
                var json = decodeURIComponent(signData);
                json = $.parseJSON(json);
                if(json.code == 1001){
                    $(".state-show .normal-a:last .text").html('已签到').css("color","#ff464e");
                    $(".state-show .normal-a:last .icon-normal").removeClass().addClass('icon-normal icon-sign');
                    $(".state-show").append('<div class="normal-side-box"><div class="box-tips"><p class="text">您已连续签到'+json.data.day+'天：<b>+'+json.data.dou+'</b> 积分<br><a href="http://www.juanpi.com/jifen/task" target="_blank">赚积分攻略</a></p><p class="other"> <a href="http://user.juanpi.com/beans" target="_blank">我的积分</a>&#12288;｜&#12288;<a href="http://www.juanpi.com/jifen" target="_blank">积分商城</a><br><a href="http://www.juanpi.com/jifen/sns" target="_blank">新手任务，轻松起步！</a><br>QQ特享群：<b>390623218</b> </p></div></div>');
                }else{
                    $(".state-show").append('<div class="normal-side-box"><div class="box-tips"><p class="text">每天最多可赚：<b>100</b> 积分<br><a target="_blank" href="'+__URL_JUANPI__+'/jifen/task">赚积分攻略</a></p><p class="other"> <a target="_blank" href="http://user.juanpi.com/beans">我的积分</a>&#12288;｜&#12288;<a target="_blank" href="http://www.juanpi.com/jifen">积分商城</a><br><a target="_blank" href="http://www.juanpi.com/jifen/sns">新手任务，轻松起步！</a><br>QQ特享群：<b>390623218</b> </p></div></div>');
                }
            }else{
                $.getJSON(__URL_MEMBER__ + "/public/pointLoadJson?uid="+__XD_USER__.uid+"&callback=?", function(json) {
                    if(json.code == 1001){
                        $(".state-show .normal-a:last .text").html('已签到').css("color","#ff464e");
                        $(".state-show .normal-a:last .icon-normal").removeClass().addClass('icon-normal icon-sign');
                        $(".state-show").append('<div class="normal-side-box"><div class="box-tips"><p class="text">您已连续签到'+json.data.day+'天：<b>+'+json.data.dou+'</b> 积分<br><a href="http://www.juanpi.com/jifen/task" target="_blank">赚积分攻略</a></p><p class="other"> <a href="http://user.juanpi.com/beans" target="_blank">我的积分</a>&#12288;｜&#12288;<a href="http://www.juanpi.com/jifen" target="_blank">积分商城</a><br><a href="http://www.juanpi.com/jifen/sns" target="_blank">新手任务，轻松起步！</a><br>QQ特享群：<b>390623218</b> </p></div></div>');
                    }else{
                        $(".state-show").append('<div class="normal-side-box"><div class="box-tips"><p class="text">每天最多可赚：<b>100</b> 积分<br><a target="_blank" href="'+__URL_JUANPI__+'/jifen/task">赚积分攻略</a></p><p class="other"> <a target="_blank" href="http://user.juanpi.com/beans">我的积分</a>&#12288;｜&#12288;<a target="_blank" href="http://www.juanpi.com/jifen">积分商城</a><br><a target="_blank" href="http://www.juanpi.com/jifen/sns">新手任务，轻松起步！</a><br>QQ特享群：<b>390623218</b> </p></div></div>');
                    }
                });
            }
        }
        $(".state-show .dosign,.state-show .normal-side-box").slowShow($(".state-show .normal-side-box"));
    }
    statusInit();

    var tpl = '<div class="app-show fl">'
        +'<a class="pic" href="'+__URL_JUANPI__+'/apps" ></a><p><a  href="'+__URL_JUANPI__+'/apps" >下载或登录手机端<br>再得一次签到机会</p></a>'
        +'</div>'
        +'<div class="sign-show fl">'
        +'<div class="top_tips">'
        +'<p class="result">签到成功，获得 <em class="red_1">{DOU}</em> 积分</p>'
        +'<p class="sum">您已连续签到{NUM}天，<br>明天继续签到，可获得 <em class="red_1">{tDou}</em> 积分</p>'
        +'</div>'
        +'<div class="btn"><a class="sub" href="'+__URL_JUANPI__+'/jifen/gift">花积分</a></div>'
        +'</div>';
    var checkedTpl = '<div class="app-show fl">'
        +'<a class="pic" href="'+__URL_JUANPI__+'/apps" ></a><p><a  href="'+__URL_JUANPI__+'/apps" >下载或登录手机端<br>再得一次签到机会</p></a>'
        +'</div>'
        +'<div class="sign-show fl">'
        +'<div class="top_tips">'
        +'<p class="result">您今天已经签到过了</p>'
        +'<p class="sum">明天继续签到，可获得 <em class="red_1">{tDou}</em> 积分</p>'
        +'</div>'
        +'<div class="btn"><a class="sub" href="'+__URL_JUANPI__+'/jifen/gift">花积分</a></div>'
        +'</div>';
    var failTpl = '<div class="app-show fl">'
        +'<a class="pic" href="'+__URL_JUANPI__+'/apps" ></a><p><a  href="'+__URL_JUANPI__+'/apps" >下载或登录手机端<br>再得一次签到机会</p></a>'
        +'</div>'
        +'<div class="sign-show fl">'
        +'<div class="top_tips">'
        +'<p class="result">签到失败！</p>'
        +'</div>'
        +'<div class="btn"><a class="sub" href="'+__URL_JUANPI__+'/jifen/gift">花积分</a></div>'
        +'</div>';
    var closeTpl = '<div class="app-show fl">'
        +'<a class="pic" href="'+__URL_JUANPI__+'/apps" ></a><p><a  href="'+__URL_JUANPI__+'/apps" >下载或登录手机端<br>再得一次签到机会</p></a>'
        +'</div>'
        +'<div class="sign-show fl">'
        +'<div class="top_tips">'
        +'<p class="result">系统繁忙，请稍后再试！</p>'
        +'</div>'
        +'</div>';
    var failCookie='<div class="app-show fl">'
        +'<a class="pic" href="'+__URL_JUANPI__+'/apps" ></a><p><a  href="'+__URL_JUANPI__+'/apps" >下载或登录手机端<br>再得一次签到机会</p></a>'
        +'</div>'
        +'<div class="sign-show fl">'
        +'<div class="top_tips">'
        +'<p class="result">为避免刷小号现象,即日起每台电脑仅允许一个帐号进行签到!</p>'
        +'</div>'
        +'<div class="btn"><a class="sub" href="'+__URL_JUANPI__+'/jifen/gift">花积分</a></div>'
        +'</div>';
    /*var failMajia='<div class="app-show fl">'
        +'<a class="pic" href="'+__URL_JUANPI__+'/apps" ></a><p><a  href="'+__URL_JUANPI__+'/apps" >下载或登录手机端<br>再得一次签到机会</p></a>'
        +'</div>'
        +'<div class="sign-show fl">'
        +'<div class="top_tips">'
        +'<label>验证码：</label>'
        +'<input type="text"  placeholder="验证码" name="code" id="code" autocomplete="off">'
        +'<img src="'+__URL_MEMBER__+'/public/verify" id="verify" onclick="this.src='+__URL_MEMBER__+'/public/verify?\'+(new Date()).getTime()" >'
        +'</div>'
        +'<div class="maJiabtn"><input type="submit"  value="签到" autocomplete="off" /></div>'
        +'</div>';*/


    function closeAlert(){
        $(".alert_bg").remove();
        $(".alert_fullbg").remove();
    }
    //获取焦点就去除错误提示
    $("[name='mjcode']").live('focus',function(){
        $("#mj_warn_1,#mj_warn_2").css("display","none");
    });

    //取消按钮事件,关闭验证码弹窗
    $("#mjclear,.alert_close").live("click",function(){
        var that = this;
        $(".phone-verify").attr("disabled",false);
        $(".phone-verify").val("获取验证码");
        if($(that).attr("class")!="alert_close"){
            $(".alert_close").click();
        }
    });

    //确认提交验证码
    $("#mjconfirm").live('click',function(){
        var btn =  $(this);
        //验证是否登录
        if (XDPROFILE.uid == "") return XD.user_handsome_login_init(),
            XD.user_handsome_login(),
            false;
        if(btn.data('lock')) return false;
        btn.data('lock', 1);
        var code = $("[name='mjcode']");
        if(code.val()==""){
            btn.data('lock', 0);
            $("#mj_warn_2").css("display","none");
            $("#mj_warn_1").css("display","block");
            return false;
        }

        $.getJSON(__URL_MEMBER__ + "/public/doSign?uid="+XDPROFILE.uid+"&code="+code.val()+"&callback=?", function(d) {
            //马甲验证
            if(d.code==1100){
                closeAlert();
                alert_robot();
                btn.data('lock',0);
                return;
            }else if( (d.code == 1005) && ((d.msg == "error"))){
                closeAlert();
                return XD.user_handsome_login_init(),
                    XD.user_handsome_login(),
                    false;
            }else if ( (d.code == 1001) && ((d.msg == "succuss"))) {
                var box_tpl = tpl
                    .replace(/{DOU}/, d.Dou)
                    .replace(/{tDou}/, d.tDou)
                    .replace(/{NUM}/, d.lastNum)
            }else if( (d.code == 1004) && (d.msg == "succuss")) {
                var box_tpl = checkedTpl
                    .replace(/{tDou}/g,  d.tDou);
            }else if( (d.code == 1102) && (d.msg == "error")) {
                var box_tpl = failCookie;
            }else if( (d.code == 1103) && (d.msg == "error")) {
                closeAlert();
                btn.data('lock', 0);
                showMjVerfiyAlert();
                return;
            }else if( (d.code == 1105) && (d.msg == "error")) {
                btn.data('lock', 0);
                $(".codeimg").click();//强制刷新验证码
                $("#mj_warn_2").find(".tips_txt").html('验证码错误');
                $("#mj_verfiy").click();
                $("#mj_warn_1").css("display","none");
                $("#mj_warn_2").css("display","block");
                return;
            }else if( (d.code == 2000) && (d.msg == "close") ){
                var box_tpl = closeTpl;
            }else{
                var box_tpl = failTpl;
            }
            closeAlert();
            var box = new XDLightBox({
                title:'每日签到送积分',
                lightBoxId:'alert_sign',
                contentHtml:box_tpl,
                scroll:true
            });
            box.init();
            btn.data('lock', 0);
            statusInit();
            //关闭弹出框
            $(".alert_close").live('click', function(){
                $('#alert_sign').hide();
            });
        });


    });
    /**
     * 弹出验证码框
     *
     */
    var showMjVerfiyAlert = function(){
        var htmlMsg = '<div class="sign-show clear">'
            +'<ul><li class="clear">'
            +'<input type="text" name="mjcode" class="check-code mr10 fl" />'
            +'<a href="javascript:;" id="mj_verfiy" class="fl"><img src="http://user.juanpi.com/public/verify" class="codeimg" onclick="this.src=\'http://user.juanpi.com/public/verify?\'+(new Date()).getTime()"/></a>'
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
            +'<div class="btn mt20 clear"><a class="sub mr15 fl" id="mjconfirm" href="javascript:;">确认</a> <a id="mjclear" class="sub sub01 fl" href="javascript:;">取消</a></div>'
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

    //签到领积分
    $(".state-show .normal-a:last,#sign-point").live('click', function(){
        var btn = $(this);
        //验证是否登录
        if (XDPROFILE.uid == "") return XD.user_handsome_login_init(),
            XD.user_handsome_login(),
            false;
        if(btn.data('lock')) return false;
        btn.data('lock', 1);
		$.getJSON(__URL_MEMBER__ + "/public/doSign?uid="+XDPROFILE.uid+"&callback=?", function(d) {
			//马甲验证
			if(d.code==1100){
				alert_robot();
				btn.data('lock', '');
				return;
			}else if( (d.code == 1005) && ((d.msg == "error"))){
				return XD.user_handsome_login_init(),
					XD.user_handsome_login(),
					false;
			}else if ( (d.code == 1001) && ((d.msg == "succuss"))) {
				var box_tpl = tpl
					.replace(/{DOU}/, d.Dou)
					.replace(/{tDou}/, d.tDou)
					.replace(/{NUM}/, d.lastNum)
			}else if( (d.code == 1004) && (d.msg == "succuss")) {
				var box_tpl = checkedTpl
					.replace(/{tDou}/g,  d.tDou);
            }else if( (d.code == 1102) && (d.msg == "error")) {
                var box_tpl = failCookie;
            }else if( (d.code == 1103) && (d.msg == "error")) {
                btn.data('lock', 0);
                showMjVerfiyAlert();
                return;
			}else if( (d.code == 2000) && (d.msg == "close") ){
                var box_tpl = closeTpl;
            }else{
				var box_tpl = failTpl;
			}
			var box = new XDLightBox({
				title:'每日签到送积分',
				lightBoxId:'alert_sign',
				contentHtml:box_tpl,
				scroll:true
			});
			box.init();
			btn.data('lock', 0);
			statusInit();
			//关闭弹出框
			$(".alert_close").live('click', function(){
				$('#alert_sign').hide();
			});
		});
      
		//签到行为数据埋点
		_paq.push(['trackEvent', 'jifen', 'click_dosign', 'uid', XDPROFILE.uid,]);

    });




    /**
     * 顶部导航隐藏显示功能
     * @author xueli@juanpi.com
     * @date   2014-12-05
     * @return {[type]}   [description]
     */
    allMenu_show=function(){
        if((document.domain == "www.jiukuaiyou.com" || document.domain == "ju.jiukuaiyou.com") && $(".top_bar").size() > 0) return;
        $(".nav ul li:first").removeClass("open");
        var timer=null;
        $(".nav ul li:first").hover(
            function(){
                var mu=$(this);
                timer=setTimeout(function(){
                    mu.addClass("open");
                },100);
            },
            function(){
                clearTimeout(timer);
                $(this).removeClass("open");
            }
        );
    }
    allMenu_show();

    /**
     * 页面向下滑动时，给左边侧标题栏增添'九块邮'图像
     * @author xueli@juanpi.com
     * @date   2014-12-05
     * @return {[type]}   [description]
     */
    var $navFun_1 = function() {
        var st = $(document).scrollTop(),
            headh = $("div.header").height(),
            $nav_classify = $("div.jiu-side-nav");
        if(st > headh){
            $nav_classify.addClass("fixed");
        } else {
            $nav_classify.removeClass("fixed");
        }

    };

    /**
     * 右侧返回顶部
     * @author xueli@juanpi.com
     * @date   2014-10-14
     * @return {[type]}   [description]
     */
    var $navFun_2 = function() {
        var st = $(document).scrollTop(),
            winh = $(window).height(),
            doch = $(document).height(),
            headh = $("#toolbar").height(),
            header = $(".header").height(),
            $nav_classify = $("div.side_right");

        if(st > headh + header){
            $nav_classify.show()
            $nav_classify.addClass('fix')
        } else {

            $nav_classify.hide()
            $nav_classify.removeClass('fix')
        }
    };

    var $navFun = function(){
        $navFun_1();
        $navFun_2();
    }

    /**
     * fangfang，绑定滚动函数
     * @param {}
     * @time 2014-02-12
     */
    /*var F_nav_scroll = function () {
        if(navigator.userAgent.indexOf('iPad') > -1){
            return false;
        }
        if (!window.XMLHttpRequest) {
           return;
        }else{
            $(".side_right").css("bottom",($(window).height()-$(".side_right").height())/2-100);
            //默认执行一次
            $navFun();
            $(window).bind("scroll", $navFun);
        }
        $(window).resize(function(){
            $(".side_right").css("bottom",($(window).height()-$(".side_right").height())/2-100);
        })
    }*/
    //F_nav_scroll();

    $('a.go-top').click(function(){
        $('body,html').animate({scrollTop:0},500);
    });
    $('#J_sidebar .side-box a#J_backtop').click(function(){
        $('body,html').animate({scrollTop:0},500);
    });
    //显示回到顶部按钮
    var backtop_show=function(){
        $(window).scroll(function(){
            var st=$(window).scrollTop();
            if(st>0){
               $("a#J_backtop").css("display","block"); 
            }
            else{
                $("a#J_backtop").css("display","none");
                $("a#J_backtop").parents().find(".tab-tips").css({"opacity":"0","display":"none","right":"62px"});
            }
        })
    }
    backtop_show();
    /**
     * 首页幻灯片
     * @param {}
     * @time 2015-01-13
     */

    var carousel_index = function(){
        if($(".banner li").size() == 1) $(".banner li").eq(0).css("opacity", "1");
        if($(".banner li").size() <= 1) return;
        var i = 0,max = $(".banner li").size()- 1,playTimer;
        $(".banner li").each(function(){
            $(".adType").append('<a></a>');
        });
    //初始化
	
        $(".adType a").eq(0).addClass("current");
    $(".banner li").eq(0).css({"z-index":"2","opacity":"1"});
    var playshow=function(){
        $(".adType a").removeClass("current").eq(i).addClass("current");
        $(".top_bar .banner li").eq(i).css("z-index", "2").fadeTo(500, 1, function(){
        $(".top_bar .banner li").eq(i).siblings("li").css({
                  "z-index": 0,
                  opacity: 0
        }).end().css("z-index", 1);
        });
    }
    var next = function(){
      i = i>=max?0:i+1;
      playshow()
    }
    var prev = function(){
      i = i<=0?max:i-1;
      playshow()
    }
        var play = setInterval(next,3000);
        $(".banner li a,.banner_arrow").hover(function(){
            clearInterval(play);
            $(".banner_arrow").css("display","block");
        },function(){
            clearInterval(play);
            play = setInterval(next,3000);
            $(".banner_arrow").css("display","none");
        });
        $(".banner_arrow .arrow_prev").on('click', _.throttle(function(event) {
          prev();
        },600) );
        $(".banner_arrow .arrow_next").on('click', _.throttle(function(event) {
          next();
        },600) );
        $(".adType a").mouseover(function(){
            if($(this).hasClass("current")) return;
            var index = $(this).index()-1;
            var playTimer = setTimeout(function(){
                clearInterval(play);
                i = index;
                next();
            },500)
        }).mouseout(function(){
                clearTimeout(playTimer);
            });
    }
	if($("#banner_list li").length>0 || $('.banner li').length>0){
		carousel_index();
	}
    

    /**
     * 将文字信息上下滚动
     * Author: zhuwenfang
     * Date: 14-01-10
     * Time: PM 16:55
     * Function: scrolling the dom 'li' up&down
     **/
    var liAutoScroll = function(){
        var liScrollTimer;
        var $obj = $('.links_list_box');
        $obj.hover(function(){
            clearInterval(liScrollTimer);
        }, function(){
            liScrollTimer = setInterval(function(){
                $obj.find(".links_list").animate({
                    marginTop : -20 + 'px'
                }, 500, function(){
                    $(this).css({ marginTop : "0px"}).find("li:first").appendTo(this);
                });

            }, 3000);
        }).trigger("mouseleave");

    }
    liAutoScroll();


    /**
     * 右侧购物袋交互
     * Author:phpdance
     * 2015-03-26新增
     * */
    var $obj=null;
    var timer=null;
    var normal_show_fun=function(){
        clearInterval(timer);
        $('#J_sidebar .side-oper li').hover(function(){
                $('#J_sidebar .side-oper li').find(".tab-tips").css({"opacity":"0","display":"none","right":"62px"})
                $('#J_sidebar .side-oper li').removeClass("curr");
                $("#J_sidebar .side-oper li.side-cart").removeClass("selected");
                $obj=$(this);
                clearTimeout(timer);
                timer=setTimeout(function(){
                    $obj.addClass("curr");
                    if($obj.hasClass("side-cart")){
                        if($obj.find(".carttime").html()=="" || $obj.find("em.cartnum").html()=="0"){
                            $('.carttime').hide();
                            return;
                        }
                    }
                    if(($obj.hasClass("side-backtop") && $obj.find("a.links").css("display")=="none")||($obj.hasClass("side-cart") && $obj.find("#side-empty").css("display")=="block")){
                        return;
                    }else{
                        $obj.find(".tab-tips").css("opacity","1");
                        $obj.find(".tab-tips").animate({
                            right: 36,opacity: 'show'
                        }, 300);
                    }
                },100);
                if($obj.hasClass("side-user")){
                    $obj.find(".close").on('click',function(){
                        $obj.find(".tab-tips").css({"opacity":"0","display":"none","right":"62px"});
                    })
                }
            },
            function(){
                clearTimeout(timer);
                timer=setTimeout(function(){
                    $obj.removeClass("curr");
                    $obj.find(".tab-tips").css({"opacity":"0","display":"none","right":"62px"});
                    if($obj.hasClass("side-cart")){
                        $obj.removeClass("selected");
                    }
                },100);
            }
        )

        //会员中心特殊处理
        $('#J_sidebar .side-oper li.side-user').hover(function(){
            if (XDPROFILE.uid == '') {
                //未登录
                $(this).find('#side-login .user-box p.txt').html('快来<a target="_blank" href="'+__HTTPS_MEMBER__+'/login">登录</a>吧，么么哒！');
            }else{
                $(this).find('#side-login .user-box p.txt').html('<a target="_blank" href="'+__URL_MEMBER__+'">'+XDPROFILE.username+'</a>');
                var _partten = /.*?\/default(\-60)?.jpg$/;
                if ( !_partten.test(XDPROFILE.face) ) {
                    $(this).find('#side-login .user-box .pic img').attr('src',getResizeImageUrl(XDPROFILE.face,60,60));//XDPROFILE.face+'_60x60.jpg'
                }
            }
        })
        
    }
    normal_show_fun(); //鼠标移入在左侧显示信息的效果

    //点击购物袋按钮，请求mini购物袋列表
    var get_mini_cart=function(){
        $("#J_sidebar .side-oper li.side-cart").on('click',function(){
            //购物袋清空，提示关闭
            JP.JPCartNoticWarp.checkShow();
            var login_htmll='<div style="opacity:1;right:36px;" id="side-login" class="tab-login"><div class="user-box"><a target="_blank" class="head" href="'+__URL_MEMBER__+'/login"><div class="pic"><img src="'+__HOST_STATIC__+'/common/images/global/default-60.jpg"></div></a><p class="txt">快来<a target="_blank" href="'+__HTTPS_MEMBER__+'/login">登录</a>吧，么么哒！</p></div><i class="close">×</i><div class="arr-icon">◆</div> </div>';
            $("#J_sidebar .side-oper li.side-cart").addClass("selected");
            if (XDPROFILE.uid == '' && XDPROFILE.guestswitch != 1) {
                //未登录
                $('.carttime').hide();
                $('.cartnum').text('0').css("background","#ccc");
                if($(this).find("#side-login").size()==0){
                    $(this).append(login_htmll);
                    $(this).find("#side-login .close").on('click',function(e){
                        if (e && e.stopPropagation) {
                            e.stopPropagation();
                        }else {//IE浏览器
                            window.event.cancelBubble = true;
                        }
                        $(this).parents("li.side-cart").removeClass("selected");
                    })

                }else{
                    return;
                }
            }else{
                var $bag_tool = $("#J-right-bag");
                var loadingDom = '<div class="sidebar-hd"><i class="close" id="J_cart_close">×</i><span class="t">购物袋</span><span class="time carttime"></span></div><div id="loadingimg" style="display:none;"></div>';
                $(this).find('.tab-tag').hide();
                if($bag_tool.hasClass("bag-show")){
                    $bag_tool.removeClass("bag-show");
					$("#side-empty").css("opacity","1");
                }else{
					if($("#side-empty").css("display")=="block"){
						$("#side-empty").css("opacity","0");
					}
                    $bag_tool.addClass("bag-show");
                    $bag_tool.html(loadingDom);
                    $bag_tool.find('#loadingimg').show();
                    $.ajax({
                        type: 'get',
                        url: __URL_CART__+'/MiniCart/miniCartList',
                        dataType: 'jsonp',
                        success: function(data) {
                            $bag_tool.find('#loadingimg').hide();
                            if(data.status == 1){
                                //购物袋列表
                                var carthtml = loadingDom;
                                carthtml += '<ul class="clear">';
                                $.each(data.data, function(index, val){
                                    carthtml += '<li><a target="_blank" class="pic fl" href="'+__URL_SHOP__+'/deal/'+val['productId']+'"><img class="lazy" d-src="'+getResizeImageUrl(val['pic'],60,60)+'" src="'+__HOST_STATIC__+'/common/images/blank_90x90.png"></a>';//'+__HOST_IMAGE__+val['pic']+'_60x60.jpg
                                    carthtml += '<div class="detail">';
                                    carthtml += '<p class="title"><a target="_blank" href="'+__URL_SHOP__+'/deal/'+val['productId']+'">'+val['title']+'</a></p>';
                                    carthtml += '<p class="normal"><span class="price"><em class="u-yen">¥</em>'+val['cprice']+'</span>x '+val['num']+'</p>';
                                    carthtml += '</div></li>';
                                });
                                carthtml += "</ul>";
                                carthtml += '<div class="amount"><span class="fl">共<em class="cartnum">'+data.goodsNum+'</em>件商品</span><span class="all fr"><em class="u-yen">¥</em>'+data.totalPrice+'</span></div> <div class="go-buy clear"><a href="'+__URL_CART__+'" target="_blank">去购物袋结算</a></div>'
                                $bag_tool.html(carthtml);
                                $bag_tool.find("ul img.lazy").lazyload({threshold:20,failure_limit:30});
                                $('.cartnum').text(data.goodsNum);

                                if(data.goodsNum==0){
                                    $('.cartnum').css("background","#ccc");
                                }else{
                                    $('.cartnum').css("background","#ff464e");
                                }

                                $bag_tool.find(".sidebar-hd").append('<span>后清空</span>');
                                $bag_tool.find('ul li:last').addClass('last');
                                $('.carttime').show();
                                var shareCartData = {'shareCartNum':data.goodsNum,'residualTime':data.residualTime};
                                setCartNum('shareCartData',shareCartData);

                                //更新定时器
                                window.clearInterval(document.cartClockTimer);
                                document.servtime = data.servertime, document.expiretime = data.expireTime;
                                if(typeof document.cartTimer !== "undefined"){
                                    window.clearInterval(document.cartTimer);
                                }
                                document.cartTimerFuc();
                                document.cartTimer = window.setInterval("document.cartTimerFuc()", 1000);

                            }else if(data.status == 2){
                                //未登录
                                $('.carttime').hide();
                                $('.cartnum').text('0').css("background","#ccc");
                                if(typeof document.cartTimer !== "undefined") {
                                    window.clearInterval(document.cartTimer);
                                }
                                $bag_tool.html(loadingDom+'<p><span class="icon-normal icon-bag-empty"></span>好像还没有<a href="'+__HTTPS_MEMBER__+'/login">登录</a>哦~</p>');
                            }else{
                                var shareCartData = {'shareCartNum':0,'residualTime':3600};
                                setCartNum('shareCartData',shareCartData);
                                //购物袋为空
                                $('.carttime').hide();
                                $('.cartnum').text('0').css("background","#ccc");
                                if(typeof document.cartTimer !== "undefined") {
                                    window.clearInterval(document.cartTimer);
                                }
                                $bag_tool.html(loadingDom+'<div class="bag-empty"><p class="img"></p><p class="txt">购物袋还是空荡荡哒~<br>快去抢购宝贝吧！</p></div>');
                            }
                        },
                        error: function () {
                            $bag_tool.html(loadingDom+'<div class="bag-empty"><p><span class="icon-normal icon-bag-empty"></span>操作失败，请稍后再试~</p></div>');
                        }
                    });
                }

            }

        })
        $("#J-right-bag #J_cart_close").live('click',function(){
            $("#J-right-bag").removeClass("bag-show");
			$("#side-empty").css("opacity","1");
        })

    }
    get_mini_cart();
	window.carousel_index=carousel_index;
})(jQuery);
(function($){
	
	$(".goods-list img.lazy").lazyload({threshold:200,failure_limit:30});
	var ugctag=Cookie("user_group_ctag");
	var dtd=$.Deferred();
	var channel=channel || 1;
	var page=page || 1;
	page=$(".page div span").not(".pg-prev").not(".pg-next").html();
	$(".navigation li").not(".last").each(function(i){
		if($(".navigation li").eq(i).hasClass('current')){
			channel=$(this).attr("channel");	
		}
	})
	
	//判断是新老用户
	if(!ugctag)
		{
			$.ajax({
			url:__URL_MEMBER__+'/tag/getgroupctag',
			type: 'GET',
			dataType: 'jsonp',
			timeout: 3000,
			success: function(data) {
				if(data && data!=''){
					ugctag = data;
					dtd.resolve();
					newUser(ugctag);					
				}
			},
			error: function() {
				$(".list-loading").hide();
				$(".main").show();
				newUser('C2');
				setTimeout(function(){
					$(".goods-list img.lazy").lazyload({threshold:200,failure_limit:30});
				},0);
			}
		})
	}else{
		dtd.resolve();
		newUser(ugctag)
	}
	
	//新用户商品列表
	dtd.done(function(){
		if(!ugctag){
			$(".list-loading").hide();
			$(".main").show();
			return;	
		}
		if (ugctag=='C1') {
			if(XDTOOL.getCookie("toptips").length==0){
				$(".totop-tips").show();
				$(".totop-tips .closet,.totop-tips a").on('click',function(){
					$(".totop-tips").hide();
					XDTOOL.setCookie("toptips","1", {
			            expires: 999,
		                path: "/"
		            });
				});
			}
		};
		var nodo = $('div.main[data-ugctag]').attr('data-ugctag');
		if (nodo) {
			nodo = nodo.split(',');
			var i=0;
			for(i;i<nodo.length;i++){
				if(ugctag == nodo[i]){
					$(".list-loading").hide();
					$(".main").show();
					$(".goods-list img.lazy").lazyload({threshold:200,failure_limit:30});
					favoriteEventFun();
					return;
				}
			}
		}
		var url=__URL_SHOP__+'/list/index/pf/1/channel/'+channel+'/ugctag/'+ugctag+'/rows/240';
		var query = location.href.split("?")[1];
		if(query){
			url+='?'+query;
		}
		$.ajax({
			url:url,
			type: 'GET',
			dataType: 'jsonp',
			//data:'',
			cache:true,
			jsonp:'callback',
			timeout: 3000,
			jsonpCallback:'showgoodslist',
			
			success: function(data) {
				if(data){
					$('.goods-list').remove();
					$('.page').remove();
					$('.search-no').remove();
					$(".main").append(data);
					setTimeout(function(){
						$(".goods-list img.lazy").lazyload({threshold:200,failure_limit:30});
					},0);
				}
				$(".list-loading").hide();
				$(".main").show();
				favoriteEventFun();//新用户时 对已收藏的商品标红
			},
			error: function(data) {
				$(".list-loading").hide();
				$(".main").show();
				setTimeout(function(){
					$(".goods-list img.lazy").lazyload({threshold:200,failure_limit:30});
				},0);
			}
		})
	})
	

	//参数为一读取cookie，参数为二为设置cookie
	function Cookie(name,value)//两个参数，一个是cookie的名子，一个是值
	{
		if(arguments.length==2){
			var Days = 30; //此 cookie 将被保存 30 天
			var exp = new Date(); //new Date("December 31, 9998");
			exp.setTime(exp.getTime() + 28800*1000);
			document.cookie = name + "="+ escape (value) + ";expires=" + exp.toGMTString()+";path=/";
		}else{
			var arrStr = document.cookie.split("; ");
			for(var i = 0;i < arrStr.length;i ++){
				var temp = arrStr[i].split("=");
				if(temp[0] == name) return unescape(temp[1]);
			};
		}
		
	};
	//广告弹出 by longyi start
    var F_gdwin = function(){
        var gdwin_close = function(){
            $("#tan_chuang_div").hide();
            XDTOOL.setCookie("gdwin","1", {
                expires: 0.5,
                path: "/"
            });
        }
        if(XDTOOL.getCookie("gdwin").length == 0){
            $("#tan_chuang_div").show();
            $("div.gdwin-box a.btn-close").on("click",gdwin_close);
            $("div.gdwin-box a.a_close").on("click",gdwin_close);
        }else{
            $("#tan_chuang_div").hide();
        }

        //禁止点击
        $("div.gdwin-bg").on("click mousedown",function(e){
            return false;
        })


    }
    //广告弹出 by longyi end
    
	function newUser(ugctag){
		//shop域不需要调用banner
		if(typeof(noNeedIndexAd) != 'undefined' && noNeedIndexAd==1){
			return;
		}

		if(!ugctag){
			ugctag='C2';
		};
		
		$.ajax({
			//http://www.juanpi.com/Index/getIndexAd
			url:'/Index/getIndexAd/ugctag/'+ugctag,
			type: 'GET',
			dataType: 'jsonp',
			jsonpCallback:'getindexad',
			cache: true,
			//timeout: 3000,
			
			success: function(data) {
				if(data['cdh']){
					$(".side-ad").show().empty().append(data['cdh']);
				}
				if(data['dt']){
					$(".full_column").show().empty().append(data['dt']);
				}
				// if(data['left']){
				// 	$(".ad-loading-left").hide();
				// 	$(".banner_l").show().empty().append(data['left']);
				// }
				if(data['zjb']){
					$(".ad-loading").hide();
					$("#banner_list").show().empty().append(data['zjb']);
					carousel_index();
				}
				if(data['right']){
					$(".ad-loading-right").hide();
					$(".banner_r").show().empty().append(data['right']);
				}
				if(data['tanchuang']){
					if($("#tan_chuang_div") != undefined){
						$("#tan_chuang_div").show().empty().append(data['tanchuang']);
						F_gdwin();
					}
				}
				//full_column 右侧  dt
				//side-ad 底部 cdh
				//banner_list 中间 zjb
			},
			error: function(data) {
				
			}
		})	
	}
	
})(jQuery);
(function($){
    //fix bug by wudong  因为c3新用户的商品数据是异步加载的，所有需要用代理
    $(document).delegate('.goods-list li','mouseenter',function(){
        $(this).find(".list-good").hasClass("gone") && $(this).find(".like-ceng").size() != 0 && $(this).find(".like-ico").hasClass("l-active") && $(this).find(".like-ceng").show();

        /*20150226 by adong begin*/

        $(this).find(".list-good").hasClass("gone") && $(this).find(".like-ceng").size() != 0 && $(this).find(".like-ico").hasClass('l-active') && $(this).find(".buy-over.brand").hide();

        /*20150226 by adong end*/
        /*20150514 晚8点场*/
        var isEight=$(this).hasClass('other_time');
        if(isEight){
            $(this).find('.box-hd').hide();
        }
        /*20150514 晚8点场*/
        $(this).addClass("hover1");
        if($(this).find(".list-good").hasClass("gone") && !isEight) return;
        if($(this).find(".brand-bd").size() != 0) return;
        $(this).addClass("hover");
        if(!isEight){
            $(this).find(".btn span").html() == "淘宝" && $(this).find(".btn span").html("去淘宝");
            $(this).find(".btn span").html() == "天猫" && $(this).find(".btn span").html("去天猫");
            $(this).find(".btn span").html() == "特卖" && $(this).find(".btn span").html("去购买");
            $(this).find(".btn span").html() == "卷皮" && $(this).find(".btn span").html("去卷皮");
            $(this).find(".btn span").html() == "品牌" && $(this).find(".btn span").html("逛品牌");
        }
    });

    //hover不是一个标准的事件流，需要通过enter和over来处理
    $(document).delegate('.goods-list li','mouseleave',function(){
        var isEight=$(this).hasClass('other_time');
        if(isEight){
            $(this).find('.box-hd').show();
        }
        $(this).removeClass("hover1");
        $(this).find(".like-ceng").hide();

        /*20150226 by adong begin*/
        $(this).find(".buy-over.brand").show();
        $(this).removeClass("hover");
        /*20150226 by adong end*/
        if(!isEight){
            $(this).find(".btn span").html() == "去淘宝" && $(this).find(".btn span").html("淘宝");
            $(this).find(".btn span").html() == "去天猫" && $(this).find(".btn span").html("天猫");
            $(this).find(".btn span").html() == "去购买" && $(this).find(".btn span").html("特卖");
            $(this).find(".btn span").html() == "去卷皮" && $(this).find(".btn span").html("卷皮");
            $(this).find(".btn span").html() == "逛品牌" && $(this).find(".btn span").html("品牌");
        }
    });
    

    // 价格长度超过一定长度时隐藏折扣信息
    $(".goods-list li").each(function(){
        var priceOldLen = $(this).find('span.price-old').width()
            ,priceCurrentLen = $(this).find('span.price-current').width()
            ,totalLeng = priceOldLen + priceCurrentLen;
        if(priceOldLen>= 55||priceCurrentLen>= 125){
            $(this).find('span.discount').hide();
        }
        // 如果有闹钟小图标价格总长度大于160就隐藏折扣信息
        if($(this).find('.start_clock').length && totalLeng>110){
            $(this).find('span.discount').hide();
        }
        if($(this).find('.list-good').hasClass("gone")){
            $(this).find(".btn a").attr("href","javascript:;");
            $(this).find(".btn a").removeAttr("target");
        }
    });

    $(".goods-list .buy-over a").click(function(e){
        if (e && e.stopPropagation) {
            e.stopPropagation();
        }else {//IE浏览器
            window.event.cancelBubble = true;
        }
    });

    $(".goods-list li").find(".btn a").unbind("click").click(function(e){

        var title = $(this).parents("li").find(".good-title a").html();
        var btntitle=$(this).parents("li").find(".btn span").html();
        var link = $(this).attr("href");

        if(link.indexOf("click")!=-1&&link.indexOf("url")==-1){
         /* if(btntitle.indexOf("明日")!=-1||btntitle.indexOf("今日")!=-1){
                var istao=$(this).parents("li").attr('data_jstype');
                if(parseInt(istao)==0){
                    var click_action_name = '跳转到淘宝('+title+')';
                }else if(parseInt(istao)==1){
                    var click_action_name = '跳转到天猫('+title+')';
                }
            }else{
                if(btntitle.indexOf("淘宝")!=-1){
                   var click_action_name = '跳转到淘宝('+title+')';
                }else if(btntitle.indexOf("天猫")!=-1){
                    var click_action_name = '跳转到天猫('+title+')';
                }
            }
            */
            //console.log(link.split('=')[1]);
            //任务编号1437
            _paq.push(['trackEvent', 'jump', 'click_jump', 'goodsid',link.split('=')[1],]);
        }
    });
   
    //卷皮列表页提醒
    $('body').on('click','.goods-list li .good-pic,.goods-list li .good-title a,.goods-list li .good-price .btn,.goods-list .mask-bg,.goods-list .buy-over,.goods-list li .into-item-brand a',function(){
        // add by weiyi
        var $doods_li = $(this).parents("li"), content = "", temaiConfirm="";
        var thisClass = $(this).attr('class');
        //919类分目预热移除弹窗
        if($doods_li.hasClass('919noalert')){
            return false;
        }
        //919类分目预热移除弹窗
        //商品流埋点Starta
        BURIED_POINT.good_sendData($(this));
        //商品流埋点End
        //晚8点点击品牌团进入聚合页
        var scr_link_other=__HOST_STATIC__+"/juanpi/images/global/app-icon-juan-8.png?20150610";
        var src_link="";
        if($doods_li.hasClass("noalert")){
           src_link=__HOST_STATIC__+"/juanpi/images/global/app-icon.png?20150119";
           if(thisClass=='btn start_1'){
                return true;
            }else if(thisClass ==undefined){
               if($(this).attr('href')){
                   return true;
               }
           }
        }else{
            //获取当前URL
            var local_url = document.location.href;
           
            if(local_url.replace("http://","")=="www.juanpi.com/zhuanti/shop618"){
                
               src_link=__HOST_STATIC__+"/juanpi/images/global/app-icon-act.png?20150119";
            }else{
                
                src_link=__HOST_STATIC__+"/juanpi/images/global/app-icon-juan.png?20150119";
            }
        }
        
//        if($(".header_user").length == 0 && $(".advance-nav").lenght == 0){
//            return true;
//        }
       /* if($doods_li.find(".btn.start_1").size() == 0 && !$doods_li.find(".list-good").hasClass("gone")){
            return true;
        }*/
        if($doods_li.hasClass('other_time')) {
            if($doods_li.hasClass('eightbrand')==false){
                var href= $doods_li.find('.btn a').attr('href');
                if(( href !='javascript:;') && href) {
                    window.open($doods_li.find('.btn a').attr('href'));
                    return false;
                }
            }
        }
        var isEight = $doods_li.hasClass("other_time");
        if($doods_li.find(".btn.start_1").size() == 0 && $doods_li.find(".btn.start_clock").size() == 0 && !$doods_li.find(".list-good").hasClass("gone") && !isEight){
            return true;
        }

        var link = $doods_li.find(".good-title a").attr("href");
        var gid = $doods_li.attr("id");
        var gtype = $doods_li.attr("gtype");
        //积分兑换  采集   优惠券
        if(link.match(/jifen/i) || link.match(/url/i) || ($doods_li.find(".go-quan").length != 0 && !$doods_li.find(".list-good").hasClass("gone"))){   //积分兑换抽奖去内页
            return true;
        }
        
        // 品牌引流款不弹出已抢光，跳去聚合页
        if ($doods_li.attr('is_channel_index') == 1 && $doods_li.find(".list-good").hasClass("gone")) {
            return true;
        }
        
        
        if($doods_li.find(".j-icon").length){
            temaiConfirm = "下次早点下单吧";
        }else{
            temaiConfirm = "无法跳转到淘宝下单";
        }
        var isBrand = $doods_li.hasClass("eightbrand");

        if($doods_li.hasClass("other_time") && ($doods_li.find(".list-good").hasClass("start") || isBrand) ){
            content = '<div class="con"><div class="right-app"><img src="'+scr_link_other+'"><span class="clear">移动专享，快来抢购吧！</span></div></div>';
            b = new XDLightBox({
            title: "晚8点专场",
            lightBoxId: "alert_app",
            contentHtml: content,
            scroll: false
            });
            b.init();
            return false;
        }else{
            if($doods_li.find(".list-good").hasClass("gone")){
                if($(this).parents(".good-title").size()>0 || $(this).parents(".good-price").size()>0) return true;
                if($doods_li.find(".like-ico").hasClass("l-active") || $doods_li.find(".del-ico").length != 0){
                    content = '<div class="top_tips"><p><em class="over">商品抢光了！</em></p><p class="tips01">因商品已经抢光，'+ temaiConfirm +'</p></div><div class="item-btn mb20 clear"><div class="collect-box  fl"><a data-gtype="'+gtype+'" data-gid="'+gid+'" class="y-like item-like active" href="javascript:void(0)"> <em class="heart"></em><p class="like-l">已收藏</p></a><p class="like-o"><span class="fl">随时留意您的手机哦</span><a href="'+__URL_JUANPI__+'/apps#jky" target="_blank" class="phone fr">手机端下载</a></p></div></div>';
                }else{
                    content = '<div class="top_tips"><p><em class="over">商品抢光了！</em></p><p class="tips01">因商品已经抢光，'+ temaiConfirm +'</p></div><div class="item-btn mb20 clear"><div class="collect-box  fl"><a data-gtype="'+gtype+'" data-gid="'+gid+'" class="y-like item-like" href="javascript:void(0)" data-mark="yugao"> <em class="heart"></em><p class="like-l">收藏</p></a><p class="like-o"><span class="fl">下次开抢可提醒您</span><a href="'+__URL_JUANPI__+'/apps#jky" target="_blank" class="phone fr">手机端下载</a></p></div></div>';
                }
            }else{
                if($doods_li.find(".like-ico").hasClass("l-active") || $doods_li.find(".del-ico").length != 0){
                    content = '<div class="con"><div class="left-tips fl"><p class="txt">您已收藏，商品开抢前会在手机提醒您开抢！</p><a data-gtype="'+gtype+'" data-gid="'+gid+'" class="y-like item-like active" href="javascript:void(0)"> <em class="heart"></em><p class="like-l">已收藏</p></a></div><div class="right-app fr"><img src="'+src_link+'"><span class="clear">还没安装客户端<br>立即扫码下载吧</span></div></div>';
                    //content = '<div class="top_tips"><p><em class="over">您已收藏，商品开抢前会在手机提醒您开抢！</em></p></div><div class="item-btn clear"><div class="collect-box  fl"><a data-gtype="'+gtype+'" data-gid="'+gid+'" class="y-like item-like active" href="javascript:void(0)"> <em class="heart"></em><p class="like-l">已收藏</p></a><p class="like-o"><span class="fl">开抢前5分钟手机提醒</span><a href="'+__URL_JUANPI__+'/apps#jky" target="_blank" class="phone fr">手机端下载</a></p></div></div>';
                }else{
                    content = '<div class="con"><div class="left-tips fl"><p class="txt">收藏商品，开抢前手机自动提醒。</p><a data-gtype="'+gtype+'" data-gid="'+gid+'" class="y-like item-like" href="javascript:void(0)" data-mark="yugao"> <em class="heart"></em><p class="like-l">收藏</p></a></div><div class="right-app fr"><img src="'+src_link+'"><span class="clear">还没安装客户端<br>立即扫码下载吧</span></div></div>';
                    //content = '<div class="top_tips"><p><em class="over">商品还未开始，收藏享开抢提醒！</em></p></div><div class="item-btn clear"><div class="collect-box  fl"><a data-gtype="'+gtype+'" data-gid="'+gid+'" class="y-like item-like" href="javascript:void(0)"> <em class="heart"></em><p class="like-l">收藏</p></a><p class="like-o"><span class="fl">开抢前手机自动提醒</span><a href="'+__URL_JUANPI__+'/apps#jky" target="_blank" class="phone fr">手机端下载</a></p></div></div>';
                }
            }
    
            b = new XDLightBox({
                title: "开抢提醒-卷皮客户端用户特权",
                lightBoxId: "alert_remind",
                contentHtml: content,
                scroll: false
            });
            b.init();
            return false;
        }
    })
})(jQuery);
/**
 * Created by @along on 15-7-22.
 */
    var BURIED_POINT = {
        class_attr : [], //需要监听的埋点class
        class_paqName : {'is_send':true,'is_home':false,'is_juan':true}, //埋点开关
        //广告区 品牌区 等埋点
        sendData:function(event) {
            //log
            //console.log(event.data);
            //log

            if(!event.data.is_send){
                return;
            }

            var $this = $(this);

            var str = '';
            if(event.data.is_home){ //谷歌数据埋点,迁移首页广告区的onclick埋点事件
                if(ga){
                    var ga_str = $this.attr('data-ga');
                    if($this.hasClass('center')){
                        if(event.data.is_juan){

                            ga('send', 'event', '卷皮首页', '中间轮播banner', ga_str);
                        }else{
                            ga('send', 'event', '九块邮首页', '中间轮播banner', ga_str);
                        }
                    }else if($this.hasClass('right')){
                        if(event.data.is_juan){
                            ga('send', 'event', '卷皮首页', '右边长图banner', ga_str)
                        }else{
                            ga('send', 'event', '九块邮首页', '右边banner', ga_str);
                        }
                    }else if($this.hasClass('left')){
                        if(event.data.is_juan){
                            ga('send', 'event', '卷皮首页', '左边方图banner', ga_str);
                        }else{

                        }
                    }else if($this.hasClass('ad_on_sidebar')){ //侧导航广告
                        if(event.data.is_juan){
                            ga('send', 'event', '卷皮首页', '侧导航广告', ga_str);
                        }else{
                            ga('send', 'event', '九块邮首页', '侧导航广告', ga_str);
                        }
                    }else if($this.hasClass('ad_top')){ //顶部广告
                        if(event.data.is_juan){
                            ga('send', 'event', '卷皮首页', '顶通广告', ga_str);
                        }else{
                            ga('send', 'event', '九块邮首页', '顶通广告', ga_str);
                        }
                    }
                }
            }
            str = $this.attr('data-value');

            if(str !='' && str !=undefined){
                var newStr = str.split('#');
                if( newStr.length==2){
                    //alert(newStr[0]+' '+newStr[1]);
                    var ValidStr = newStr[1].split('_');
                    if(ValidStr.length ==2){
                        if(ValidStr[0] !='' && ValidStr[0] !=undefined){
                            var href = $this.attr('href');
                            if(href != '' && href != undefined){
                                var sendStr = newStr[1] + '::' +href;
                                //alert(sendStr);
                                _paq.push(['trackEvent','click_pit_position',newStr[0], 'position_num',sendStr]);
                            }
                        }
                    }
                }
            }

        },

        init:function(data){
            $.extend(this,data);
            //log
            //console.log(this.class_attr);
            //log
            var length = this.class_attr.length;
            for(var i =0;i < length ; i++){
                var class_name = this.class_attr[i];
                $('body').on('click',class_name,this.class_paqName,this.sendData)
                //$(class_name).unbind('click');
                //$(class_name).bind('click',this.class_paqName,this.sendData);
            }
        },
        //商品流区域埋点
        good_sendData:function(self){

            if(!this.class_paqName.is_send) return;
            var $thisClass = self.attr('class');
            var str,href = '';
            if($thisClass == 'good-pic'){
                //cps pop
                var aObj = self.find('a');
                str = aObj.attr('data-value');
                href =aObj.attr('href');

            }else if($thisClass == 'buy-over' || $thisClass =='mask-bg'){
                //抢光
                var aObj = self.closest('.list-good');
                aObj = aObj.find('.good-pic .pic-img a');
                str = aObj.attr('data-value');
                href =aObj.attr('href');
            }else if(self.hasClass('btn')){
                //淘宝 天猫 特卖 品牌
                var aObj=self.closest('.list-good');
                aObj =aObj.find('.good-pic  a');
                str = aObj.attr('data-value');
                href = aObj.attr('href');

            }else if(self.hasClass('good-pic other')){
                //广告
                var aObj = self.find('a');
                str = aObj.attr('data-value');
                href = aObj.attr('href');
            }else{
                var $thisHref = self.attr('href');
                if($thisHref !=undefined && $thisHref !=""){
                   //点击商品标题a 事件
                    var aObj=self.closest('.list-good');
                    aObj = aObj.find('.good-pic a');
                    str = aObj.attr('data-value');
                    href = aObj.attr('href');
                }
            }
            if( href == undefined || href ==""){ //明日预告埋点用id
                var newObj = self.closest('li')
                href = newObj.attr('id');
            }
            if(str !='' && str !=undefined){
                var newStr = str.split('#');
                if( newStr.length==2){
                    //alert(newStr[0]+' '+newStr[1]);
                    var ValidStr = newStr[1].split('_');
                    if(ValidStr.length ==2){
                        if(ValidStr[0] !='' && ValidStr[0] !=undefined){
                            if(href != '' && href !=undefined){
                                var sendStr = newStr[1] +'::' + href;
                                _paq.push(['trackEvent','click_pit_position',newStr[0], 'position_num', sendStr]);
                            }
                        }
                    }
                }
            }
        }

    };
