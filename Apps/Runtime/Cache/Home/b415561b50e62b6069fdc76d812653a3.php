<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html class="jp-pc w1200">
    <head>

        <title><?php echo ($title); ?></title>
        <meta content="卷皮折扣,品牌折扣,折扣,特卖,打折,9.9元包邮,卷皮网" name="keywords">
        <meta content="卷皮折扣汇聚全网最优质折扣商品，每日精选千款超值折扣商品9.9元起全场包邮1折特卖，每天10点限时秒杀！上卷皮购便宜！" name="description">
        <meta charset="utf-8">
    <link href="/BBBB/project/Public/Home/Css/bootstrap.min.css" rel="stylesheet" media="screen">

    <link href="/BBBB/project/Public/Admin/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

        <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <link type="text/css" rel="stylesheet" href="/BBBB/project/Public/Home/Css/9245c5eeb79d45ea8fca9ffcd464f12f.css" />
    <link type="text/css" rel="stylesheet" href="/BBBB/project/Public/Home/Css/41109579bcee494389f359ae0e914606.css" />
    <link type="text/css" rel="stylesheet" href="/BBBB/project/Public/Home/Css/bb3e08540e584c09ac7578fd0213f369.css" />
    <link type="text/css" rel="stylesheet" href="/BBBB/project/Public/Home/Css/fix.css" />
    <link type="text/css" rel="stylesheet" href="/BBBB/project/Public/Home/Css/lunbo.css" />
    <script type="text/javascript" src="/BBBB/project/Public/Home/Js/jquery-1.8.3.min.js"></script>


    <body>
        
        
        
    <div class="container">
        <div class="window" id="center1" > 
             <div id="title" class="title"><img src="/BBBB/project/Public/Home/Images/cuo.jpg" alt="关闭" />卷皮网积分</div> 
             <div class="content">领取积分</div> 
        </div> 
    </div>


<script type="text/javascript">
    // 侧边
        // $(function(){
        //     $('.i-love').mouseover(function(e){
        //         $(this).parent('.side-love').find('.tab-tips').addClass('display','block');
        //         var x = e.clientX;
        //         var y = e.clientY;
        //         var p = $('<p class="addP">我的收藏</p>');
        //         // p.show(1000);
                
        //     });
        //     $('.i-love').mouseover(function(){
        //         // alert(567);
        //     });

        // });
    //top nav
    // alert($);
$(function(){
    //获取窗口的高度 
    var windowHeight; 
    //获取窗口的宽度 
    var windowWidth; 
    //获取弹窗的宽度 
    var popWidth; 
    //获取弹窗高度 
    var popHeight; 
    function init(){ 
       windowHeight=$(window).height(); 
       windowWidth=$(window).width(); 
       popHeight=$(".window").height(); 
       popWidth=$(".window").width(); 
    } 
    //关闭窗口的方法 
        function closeWindow(){ 
        $(".title img").click(function(){ 
            $(this).parent().parent().hide("slow"); 
            }); 
        } 
        //定义弹出居中窗口的方法 
        function popCenterWindow(){ 
        init(); 
            //计算弹出窗口的左上角Y的偏移量 
        var popY=(windowHeight-popHeight)/2; 
        var popX=(windowWidth-popWidth)/2; 
        //alert('jihua.cnblogs.com'); 
        //设定窗口的位置 
        $("#center1").css("top",popY).css("left",popX).css('display','block').slideToggle("slow"); 
         // 调用close方法
         // alert(1);
        closeWindow(); 
        }
    // 弹出积分框
    $("#jifen").click(function () {
        // alert(1);
        // window.open('<?php echo U("Home/Index/jifen");?>');
        // popCenterWindow();
        init();
        var popY=(windowHeight-popHeight)/2; 
        var popX=(windowWidth-popWidth)/2; 

        window.open ('<?php echo U("Home/Index/jifen");?>','卷皮网积分','height=popY,width=popX,top=0,left=0,toolbar=no,menubar=no,scrollbars=no,resizable=no,location=no,status=no'); 
    });

// 滚动
    $(window).scroll(function(){
        var top = $(document).scrollTop();
        if (top>760) {
            // console.log(top);
            $('#navv').removeClass('hidden').addClass('topnav');
        } else {
            // console.log(top);
            $('#navv').addClass('hidden');
        }
    })
})
        

    </script>
    </body>
</html>