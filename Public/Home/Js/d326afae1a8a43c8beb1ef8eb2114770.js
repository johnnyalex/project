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
