<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html class="jp-pc w1200">
    <head>

        <title><?php echo ($title); ?></title>
        <meta content="卷皮折扣,品牌折扣,折扣,特卖,打折,9.9元包邮,卷皮网" name="keywords">
        <meta content="卷皮折扣汇聚全网最优质折扣商品，每日精选千款超值折扣商品9.9元起全场包邮1折特卖，每天10点限时秒杀！上卷皮购便宜！" name="description">
        <meta charset="utf-8">
    <link href="/AAA/project/Public/Home/Css/bootstrap.min.css" rel="stylesheet" media="screen">

    <link href="/AAA/project/Public/Admin/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

        <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <link type="text/css" rel="stylesheet" href="/AAA/project/Public/Home/Css/9245c5eeb79d45ea8fca9ffcd464f12f.css" />
    <link type="text/css" rel="stylesheet" href="/AAA/project/Public/Home/Css/41109579bcee494389f359ae0e914606.css" />
    <link type="text/css" rel="stylesheet" href="/AAA/project/Public/Home/Css/bb3e08540e584c09ac7578fd0213f369.css" />
    <link type="text/css" rel="stylesheet" href="/AAA/project/Public/Home/Css/lunbo.css" />
    </head>
    <body>
        
        
    <div class="container">
        <br>
        <br>
        <br>
        <br>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-8">
                                <h3 class="panel-title">欢迎注册 <big>三人行</big></h3>
                            </div>
                            <div class="col-md-2">
                                <h3 class="panel-title"><small><a href="<?php echo U('Index/index');?>">回首页</a></small></h3>
                            </div>
                            <div class="col-md-2">
                                <h3 class="panel-title"><small><a href="<?php echo U('Login/index');?>">去登录</a></small></h3>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" action="<?php echo U('Home/Regist/regist');?>">
                            <fieldset >
                                <div class="form-group row">
                                    <div class="col-md-2">
                                        用户名:
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" autofocus="" name="username" placeholder="请输入用户名" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <span id="cuser"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-2">
                                    邮箱:
                                    </div>

                                    <div class="col-md-6">
                                        <input type="text" autofocus="" name="email" placeholder="请输入邮箱" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <span id="cemail"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-2">
                                        密码:
                                    </div>

                                    <div class="col-md-6">
                                        <input type="password" value="" name="password" placeholder="请输入密码" class="form-control"><span></span>
                                    </div>
                                    <div class="col-md-4">
                                        <span id="cpass"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-2">
                                        确认密码:
                                    </div>

                                    <div class="col-md-6">
                                        <input type="password" value="" name="repassword" placeholder="请再次输入密码" class="form-control"><span></span>
                                    </div>
                                    <div class="col-md-4">
                                        <span id="crepass"></span>
                                    </div>
                                </div>

                                <div class="form-group row">

                                    <div class="col-md-2">
                                        验证码:
                                    </div>

                                    <div class="col-md-6">
                                        
                                        <input type="text" class="form-control" placeholder="请输入验证码" name="code">
                                    </div>
         <!--                            <div class="col-md-2">
                                        <span id="ccode"></span>
                                    </div> -->
                                    <div class="col-md-4">
                                        
                                        <img onclick="this.src=this.src+'?i='+Math.random()" src="<?php echo U('Home/Regist/yzm');?>" title="看不清楚?点击换一张吧!">
                                        <br>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group row">
                                    <div class="col-md-11">
                                        <button class="btn btn-lg btn-success btn-block" style="width:100%; ">提交</button>
                                    </div>
                                </div>                               


                          
                            </fieldset>
                        </form>
                        <script type="text/javascript" src="/AAA/project/Public/Admin/js/jquery-1.8.3.min.js"></script>
                        <script type="text/javascript">
                            // alert($);
                            //定义全局 变量
                            var Cuser = false;
                            var Cpass = false;
                            var Crepass = false;
                            var Cemail = false;
                            var Ccode = false;


                            //提交
                            $('form').submit(function(){
                             
                                $('input').trigger('blur');//丧失焦点

                            //检测是否能够提交
                            if(Cuser && Cpass && Crepass && Cemail && Ccode){
                                //提交
                                // alert(Ccode);
                                return true;
                            }else{
                                // alert(Ccode);
                            return false;
                            }
                           });

                            $('input[name="username"]').blur(function(){
                                // alert(1);
                                var reg = /^\w{6,16}$/;
                                var username = $(this).val();
                                var res = reg.test(username);
                                if (!res) {
                                   $(this).parents('.row').find('#cuser').html('用户名格式不正确').css('color','red');
                                   $(this).css('border','1px solid red');
                                   Cuser = false;
                                   //停止
                                   return false; 
                                }
                                var inp = $(this);
                                //发送ajax验证用户是否可用
                                $.ajax({
                                    //url
                                    url:'<?php echo U("Home/Regist/test");?>',
                                    //发送的数据
                                    data:{username:username},
                                    type:'get',
                                    //同步
                                    async:false,
                                    success:function(data){
                                        if (data==1) {
                                            inp.parents('.row').find('#cuser').html('√').css('color','green');
                                            inp.css('border','1px solid green');
                                            Cuser = true;
                                        }else{
                                            inp.parents('.row').find('#cuser').html('此用户已存在').css('color','red');
                                            inp.css('border','1px solid red');
                                            Cuser = false;
                                        }
                                    },

                                });

                            });
                            //密码
                            $('input[name="password"]').blur(function(){
                                // alert(1);
                                var reg = /^\w{6,16}$/;
                                var password = $(this).val();
                                var res = reg.test(password);
                                if (!res) {
                                   $(this).parents('.row').find('#cpass').html('密码格式错误').css('color','red');
                                   $(this).css('border','1px solid red');
                                   Cpass = false;
                                }else{
                                   $(this).parents('.row').find('#cpass').html('√').css('color','green');
                                   $(this).css('border','1px solid green');
                                   Cpass = true;
                                }

                            });
                          
                            $('input[name="repassword"]').blur(function(){
                                //获取
                                var repass = $(this).val();
                                var pass = $('input[name="password"]').val();
                                //验证

                                if (pass==repass && repass!='') {
                                    
                                   $(this).parents('.row').find('#crepass').html('√').css('color','green');
                                   $(this).css('border','1px solid green');
                                   Crepass = true;
                                }else{
                                   $(this).parents('.row').find('#crepass').html('两次密码不一致').css('color','red');
                                   $(this).css('border','1px solid red');
                                   Crepass = false;
                                }

                            });
                            //再次密码
                            $('input[name="email"]').blur(function(){
                                // alert(1);
                                var reg = /^\w+@\w+\.(com|cn|com\.cn|net|org)$/;
                                
                                var email = $(this).val();
                                var res = reg.test(email);
                                if (!res) {
                                   var a = $(this).parents('.row').find('#cemail').html('邮箱格式不正确').css('color','red');
                                   $(this).css('border','1px solid red');
                                   Cemail = false;
                                }else{
                                   var a = $(this).parents('.row').find('#cemail').html('√').css('color','green');
                                   $(this).css('border','1px solid green');
                                   Cemail = true;
                                }
                            });
                            $('input[name="code"]').blur(function(){
                                var code = $(this).val();
                                if (code!='') {
                                    Ccode=true;
                                }else{
                                    Ccode=false;
                                }
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
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
    </script>
    </body>
</html>