<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>三人行 -- 42</title>

    <!-- Bootstrap Core CSS -->
    <link href="/Public/Admin/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="/Public/Admin/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="/Public/Admin/dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/Public/Admin/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="/Public/Admin/bower_components/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/Public/Admin/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">请登录<big>三人行</big>后台</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" action="<?php echo U('Admin/Login/dologin');?>">
                            <fieldset>
                                <div class="form-group">
                                    <input type="text" autofocus="" name="username" placeholder="请输入用户名" class="form-control"><span></span>
                                </div>
                                <div class="form-group">
                                    <input type="password" value="" name="password" placeholder="请输入密码" class="form-control"><span></span>
                                </div>

                                <div class="checkbox row">
                                        <span class="vcode">
                                        <div class="col-md-6">
                                            
                                            <input type="text" class="form-control" placeholder="请输入验证码" name="yzm">
                                        </div>
                                        <div class="col-md-6">
                                            
                                            <img onclick="this.src=this.src+'?i='+Math.random()" src="<?php echo U('Admin/Login/yzm');?>" title="看不清楚?点击换一张吧!"><br>
                                        </div>

                                        </span>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                    
                                <button class="btn btn-lg btn-success btn-block">登录</button>
                         
                            </fieldset>
                        </form>
                        <script type="text/javascript" src="/Public/Admin/js/jquery-1.8.3.min.js"></script>
                        <script type="text/javascript">
                            $('.btn-success').click(function(){
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
    </div>

</body>

</html>