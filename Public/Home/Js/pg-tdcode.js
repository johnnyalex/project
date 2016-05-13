(function(a){
    /**
     * Author: zhuwenfang
     * Date: 14-01-10
     * Time: AM 10:02
     * Function: when mouse hovers, showing 'the two dimensional code' div 
     **/
    var F_showTwoDimenCode = function(){
        var popImgHtml = "<div class='pop-img fl'>"
        + "<div class='jqywx fl'></div>" 
        + "<p class='tao-img fl'></p>"
        + "</div>";

        $(".kik").on("mouseenter", function(){
            if( $(".pop-img").length == 0 ){                  
                $(".follow ul li:last").append( popImgHtml ); 
            }       
        });
       
        $(".follow ul li:last").on("mouseleave", function(){
           $(".pop-img").remove();
        });
    }
    F_showTwoDimenCode();

    /**
     * Author: zhuwenfang
     * Date: 14-01-13
     * Time: AM 9:03
     * Function: append 'pop zone pic' to a.zone 
     **/   
    var F_attachZonePic = function(){
        var popZonePicHtml = '<div class="pop_zonepic">'+'<p id="pop_zonepic_p">有奖关注！</p>'+'</div>';
        $("a.zone").after(popZonePicHtml);
    }
    F_attachZonePic();
    $("#pop_zonepic_p").on("click", function(){
        window.open("http://user.qzone.qq.com/474171717/blog/1389335560");
    });
    
})(jQuery);
