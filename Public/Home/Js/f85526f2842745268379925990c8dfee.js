/**
 * Created with JetBrains WebStorm.
 * User: jimi
 * Date: 12-17
 * Time: 下午15:11
 *
 */
(function(a) {
    // 倒计时 start
    var F_Class = function (){
        var timeZero = function(d){
            if(d.toString().length < 2){
                return "0" + d.toString();
            }else{
                return d.toString();
            }
        }

        var edate = new Date($(".update-time").data("etime")*1000);
        var Temp = new JP_time(edate);
        if(Temp.timerRunning){
            Temp = Temp.data;
            $(".times .hours em").text(timeZero(Temp.H));
            $(".times .minutes em").text(timeZero(Temp.M));
            $(".times .seconds em").text(timeZero(Temp.S));
        }else{
            $(".times .hours em").text('00');
            $(".times .minutes em").text('00');
            $(".times .seconds em").text('00');
        }

    }

    var timeStart = function (){
        F_Class();
        setTimeout(arguments.callee,500);

    }
    timeStart();
    // 倒计时 end

    // 顶部 ctr+d 收藏start
    var F_totoptips = function(){
        var F_isMac = function(){
            if(navigator.userAgent.indexOf("Mac") > -1){
                $(".totop-tips strong").html("Command+d");
            }else{
                $('body').on("keydown",function(e){
                    if(e.ctrlKey && 68 == e.keyCode) {
                        ever_open();
                        return true;
                    }
                });
            }
        }
        var tips_close = function(){
            $("div.totop-tips").hide();
        }
        var ever_open = function(){
            XDTOOL.setCookie("toptips","1", {
                expires: 999,
                path: "/"
            });
            tips_close();
        }
        if(XDTOOL.getCookie("toptips").length == 0){
            $("div.totop-tips").show();
            $(".jiu-side-nav").css("top","196px");
            var $tips_a = $("div.totop-tips a")
            $tips_a.on("click",ever_open);
            $("div.totop-tips .closet").on("click",ever_open);
            F_isMac();
        }else{
            $("div.totop-tips").hide();
        }
    }
    /*if($(".main").data("isnew") == 1){
        F_totoptips();
    }*/

    //add by wudong  fix bug 
    //F_totoptips();
    // 顶部 ctr+d 收藏end


    //新版2014-12-17 改版提示换装banner start
    var alertBar = function(){
        var timestamp = Date.parse(new Date());
        var banDiv ='<div class="alert-activity">'+
                        '<p class="activity-ceng"></p>'+
                        '<div class="links" href="/">'+
                        '<a class="go-new"  target=""></a>'+
                        '<a class="back-old" href=""></a>'+
                        '<p>5s自动关闭</p>'+
                        '</div>'+
                    '</div>';
        //老用户并且没点过并且一个星期有效
        if($(".main").data("isnew") == 0 && !XDTOOL.getCookie("newbar") && timestamp < 1419955200000){
            $('.side_right').after(banDiv);
            $(".alert-activity .go-new ,.activity-ceng").click(function(){
                $(".alert-activity").hide();
            });
            XDTOOL.setCookie("newbar", '1', {
                expires: 86400*7,
                path: "/"
            });
            var int=self.setInterval(function(){
                $(".alert-activity").hide();
            },5000)

        }
    }
    alertBar();
    //新版2014-12-17 改版banner end
})(jQuery);$(document).ready(function () {
	var $lineCateLocation = $('.line-cate-nav-location'),
		$lineCate = $lineCateLocation.find('.line-cate-nav-wrapper'),
		oHeight = $lineCateLocation.height(),
		oTop = $lineCateLocation.offset().top;

	if ($lineCateLocation.hasClass('hidden')) {
		oHeight = 0;
		oTop = 820;
	}

	setClass();
	
	$(window).on('scroll', function () {
		setClass();
	});

	function setClass() {
		if ($(window).scrollTop() > oTop + oHeight) {
			$lineCate.addClass('fix-top');
		} else {
			$lineCate.removeClass('fix-top');
		}
	}
});