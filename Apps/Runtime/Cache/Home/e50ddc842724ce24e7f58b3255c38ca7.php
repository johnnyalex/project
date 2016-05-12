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

        </head>
        <body>
        
        
        
    <div class="container">
        <br>
        <br>
        <br>
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="panel-title">欢迎登录 <big>三人行</big></h3>
                        </div>
                        <div class="col-md-3">
                            <h3 class="panel-title"><small><a href="<?php echo U('Index/index');?>">回首页</a></small></h3>
                        </div>
                        <div class="col-md-3">
                            <h3 class="panel-title"><small><a href="<?php echo U('Regist/index');?>">去注册</a></small></h3>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <form role="form" method="post" action="<?php echo U('Home/Login/login');?>">
                                <div class="form-group">
                                    <input type="text" autofocus="" name="username" placeholder="请输入用户名" class="form-control"><span></span>
                                </div>
                                <div class="form-group">
                                    <input type="password" value="" name="password" placeholder="请输入密码" class="form-control"><span></span>
                                </div>

<!--                                 <div class="checkbox row">
                                        <span class="vcode">
                                        <div class="col-md-6">
                                            
                                            <input type="text" class="form-control" placeholder="请输入验证码" name="yzm">
                                        </div>
                                        <div class="col-md-6">
                                            
                                            <img onclick="this.src=this.src+'?i='+Math.random()" src="<?php echo U('Home/Index/yzm');?>" title="看不清楚?点击换一张吧!"><br>
                                        </div>

                                        </span>
                                </div> -->
                                <br>
                                <br>
                                <div class="row">
                                    <div class="col-md-11">
                                        <button style='width: 100%;' class="btn btn-lg btn-success btn-block">登录</button>
                                    </div>
                                </div>
                        </form>
                        <script type="text/javascript" src="/BBBB/project/Public/Admin/js/jquery-1.8.3.min.js"></script>
                        <script type="text/javascript">
                            $('form').submit(function(){
                                // alert(123);
                                $('input').trigger('blur');//丧失焦点
                                if (($('input[name="username"]').val()!='') && ($('input[name="password"]').val()!='')) {

                                    return true;
                                }else{
                                    alert('用户名或密码不完整');
                                    return false;
                                }

                                return false;
                            });
                        </script>

                    </div>
                
            </div>
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
// 积分



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

    // $(function(){
    //     var top = $(document).scrollTop();
    //     if (top>600) {
    //         $('.top_box').css('display','block');
    //     } else {
    //         $('.top_box').css('display','none');
    //     }      
    // })
    </script>
    </body>
</html>