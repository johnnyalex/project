(function($){
    //右侧导航鼠标经过 by mumian
    var navHover = function(){
        var timer = null;
        var $obj = null;
        $("#orderLeftBar dd").hover(function(){
            $('#orderLeftBar dd').find(".tab-tips").css({"opacity":"0","display":"none","right":"62px"})
            $('#orderLeftBar dd').removeClass("curr");
            $obj=$(this);
            clearTimeout(timer);
            if(!$obj.hasClass("side-backtop")){
                timer=setTimeout(function(){
                    $obj.addClass("curr");
                    $obj.find(".tab-tips").css("opacity","1");
                    $obj.find(".tab-tips").animate({
                        right: 42,opacity: 'show'
                    }, 300);
                },100);
            }
        },
        function(){
            clearTimeout(timer);
            timer=setTimeout(function(){
                $obj.removeClass("curr");
                $obj.find(".tab-tips").css({"opacity":"0","display":"none","right":"62px"});
            },100);
        })
    }
    if($("#orderLeftBar").size()!==0){
		navHover();
	}
    $('#J_backtop').click(function(){
        $('body,html').animate({scrollTop:0},500);
    });
	
})(jQuery);

