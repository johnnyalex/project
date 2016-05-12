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

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">三人行--42</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-tasks fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-tasks">
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 1</strong>
                                        <span class="pull-right text-muted">40% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 2</strong>
                                        <span class="pull-right text-muted">20% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                            <span class="sr-only">20% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 3</strong>
                                        <span class="pull-right text-muted">60% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                            <span class="sr-only">60% Complete (warning)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 4</strong>
                                        <span class="pull-right text-muted">80% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                            <span class="sr-only">80% Complete (danger)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Tasks</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-tasks -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-tasks fa-fw"></i> New Task
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?php echo U('Admin/Login/outlogin');?>"><i class="fa fa-sign-out fa-fw"></i> 退出</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="<?php echo U('Admin/Index/index');?>"><i class="fa fa-dashboard fa-fw"></i> 后台首页</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> 用户管理<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo U('Admin/Index/admin');?>">管理员列表</a>
                                </li>
                                <li>
                                    <a href="<?php echo U('Admin/Index/add');?>">新增管理员</a>
                                </li>
                                <li>
                                    <a href="<?php echo U('Admin/User/index');?>">用户列表</a>
                                </li>
                                <li>
                                    <a href="<?php echo U('Admin/User/add');?>">用户添加</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                         <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> 权限管理<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo U('Admin/Root/index');?>">权限列表</a>
                                </li>
                                <li>
                                    <a href="<?php echo U('Admin/Root/add');?>">添加权限</a>
                                </li>
                                <li>
                                    <a href="<?php echo U('Admin/Root/group');?>">分组列表</a>
                                </li>
                                <li>
                                    <a href="<?php echo U('Admin/Root/groupadd');?>">添加分组</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> 分类管理<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo U('Admin/Category/index');?>">分类列表</a>
                                </li>
                                <li>
                                    <a href="<?php echo U('Admin/Category/add');?>">新增分类</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> 商品管理<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo U('Admin/Goods/index');?>">商品列表</a>
                                </li>
                                <li>
                                    <a href="<?php echo U('Admin/Goods/add');?>">新增商品</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> 订单管理<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo U('Admin/Order/index');?>">订单列表</a>
                                </li>
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        
                        
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                
    <h1 class="page-header">分类列表</h1>

                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                            <form action="<?php echo U(Admin/Category/index);?>" method="post">
                            <button class="show_but btn btn-primary">Search:</button><label><input type="text" class="search form-control input-sm" placeholder="" aria-controls="dataTables-example" name="name"></label>
                            </form>
                            <div class="row">
                            <div class="col-sm-12">
                            <table id="dataTables-example" class="table table-striped table-bordered table-hover dataTable no-footer" role="grid" aria-describedby="dataTables-example_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 145px;" aria-label="Browser: activate to sort column ascending">ID</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 145px;" aria-label="Browser: activate to sort column ascending">分类名</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 145px;" aria-label="Browser: activate to sort column ascending">状态</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 145px;" aria-label="Browser: activate to sort column ascending">操作</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php if(is_array($cates)): foreach($cates as $key=>$vo): ?><tr class="gradeA odd" role="row" style="background:white">
                                    <td><?php echo ($vo["id"]); ?></td>
                                    <td><?php echo ($vo["name"]); ?></td>
                                    <td style="display:none"><?php echo ($vo["path"]); ?></td>
                                    <td class="display center"><button type="button" class="btn_dis btn-info"><?php echo ($vo["display"]); ?></button></td>
                                    <td class="center"><button class="btn" type="button">查看子分类</button>&nbsp;&nbsp;&nbsp;<button class="delete btn-danger btn-sm btn-del" type="button">删除</button>&nbsp;&nbsp;&nbsp;<a href="<?php echo U('Admin/Category/update',array('id'=>$vo['id']));?>"><button class="update btn-update btn-sm btn-del" type="button">修改</button></a></td>
                                </tr><?php endforeach; endif; ?>
                            


                            </tbody>
                        </table></div></div>
                            <div class="row">
                                
                                    <div class="col-sm-6">
                                      
                                    </div>
                                </div>
                            </div>
                    </div>
                    <!-- /.table-responsive -->
                    
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <script src="/Public/Admin/bower_components/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript">
    $(function(){
        $('.btn_dis').bind("click",function(){
            var display = $(this).html();
            var id = $(this).parents('tr').find('td:first').html();
            var $this = $(this);
            if(display == '显示'){
                $.post('<?php echo U("Admin/Category/cate_display");?>',
                    {id:id,display:0},
                    function(data){
                        if(data)
                            $this.html('隐藏');
                    })
            }
            else if(display == '隐藏'){
                $.post('<?php echo U("Admin/Category/cate_display");?>',
                    {id:id,display:1},
                    function(data){
                        if(data)
                            $this.html('显示');
                    })
            }
        })
        $('.btn').click(function(){
            var table;
            var cls = $(this).text();
            if(cls == '查看子分类'){
                $(this).addClass('close');
                $(this).html('关闭');
                var id = $(this).parents('.gradeA').find('td:first').html();
                table = $(this).parents('.table');
                var tr = $(this).parents('.gradeA');
                $.ajax({
                    url:"<?php echo U('Admin/Category/parent');?>",
                    data:{id:id},
                    datatype:'json',
                    type:'post',
                    success:function(data){
                        var arr = eval(data);
                        if(arr != null)
                        for (var i = 0; i < arr.length; i++) {
                            var td = $('<tr id="ax'+i+'" class="gradeA odd '+'add'+id+'" role="row" style="background:#EEEEEE"><td>'+arr[i]['id']+'</td><td>'+arr[i]['name']+'</td><td style="display:none">'+arr[i]['path']+'</td><td class="display center"><button type="button" class="btn_dia btn-info">'+arr[i]['display']+'</button></td><td class="center"><button class="btn btn_add" type="button">查看子分类</button>&nbsp;&nbsp;&nbsp;<button class="delete_a btn-danger btn-sm btn-del" type="button">删除</button>&nbsp;&nbsp;&nbsp;<a href="alex"><button class="update btn-update btn-sm btn-del" type="button">修改</button></a></td></tr>');
                            $(table).find(tr).css('background','#D8D8D8').after(td);
                            var htma = $('table tr[class*="add'+id+'"]').find('td:first').html();
                            var href = "update/id/"+htma;
                            $('#ax'+i).find('a').attr('href',href);
                        };
                        $('.btn_dia').bind("click",function(){
                            var display = $(this).html();
                            var id = $(this).parents('tr').find('td:first').html();
                            var $this = $(this);
                            if(display == '显示'){
                                $.post('<?php echo U("Admin/Category/cate_display");?>',
                                    {id:id,display:0},
                                    function(data){
                                        if(data)
                                            $this.html('隐藏');
                                    })
                            }
                            else if(display == '隐藏'){
                                $.post('<?php echo U("Admin/Category/cate_display");?>',
                                    {id:id,display:1},
                                    function(data){
                                        if(data)
                                            $this.html('显示');
                                    })
                            }
                        })
                        $('.delete_a').click(function(){
                            var id = $(this).parents('tr').find('td:first').html();
                            var tr = $(this);
                            $.get('<?php echo U("Admin/Category/delete");?>',{id:id},function(data){
                                if(data)
                                    tr.parents('tr').remove();
                            })
                        })
                        $('.btn_add').click(function(){
                            var pls = $(this).text();
                            if(pls == '查看子分类'){
                                $(this).addClass('close');
                                $(this).html('关闭');
                                var add_id = $(this).parents('.gradeA').find('td:first').html();
                                var tr = $(this).parents('.gradeA');
                                var path = $(this).parents('.gradeA').find('td:hidden').text();
                                $.ajax({
                                    url:"<?php echo U('Admin/Category/parent_add');?>",
                                    data:{id:add_id,path:path},
                                    datatype:'json',
                                    type:'post',
                                    success:function(data){
                                        var ary = eval(data);
                                        if(ary != null)
                                        for (var i = 0; i < ary.length; i++) {
                                            var td = $('<tr class="gradeA odd add'+id+' add" role="row" style="background:#F5F5F5"><td>'+ary[i]['id']+'</td><td>'+ary[i]['name']+'</td><td style="display:none">'+ary[i]['path']+'</td><td class="display center"><button type="button" class="btn_dib btn-info">'+ary[i]['display']+'</button></td><td class="center">&nbsp;&nbsp;&nbsp;<button class="delete_b btn-danger btn-sm btn-del" type="button">删除</button>&nbsp;&nbsp;&nbsp;<a href="update/id/'+ary[i]['id']+'"><button class="update btn-update btn-sm btn-del" type="button">修改</button></a></td></tr>');
                                            $(table).find(tr).after(td);
                                        };
                                        $('.btn_dib').bind("click",function(){
                                            var display = $(this).html();
                                            var id = $(this).parents('tr').find('td:first').html();
                                            var $this = $(this);
                                            if(display == '显示'){
                                                $.post('<?php echo U("Admin/Category/cate_display");?>',
                                                    {id:id,display:0},
                                                    function(data){
                                                        if(data)
                                                            $this.html('隐藏');
                                                    })
                                            }
                                            else if(display == '隐藏'){
                                                $.post('<?php echo U("Admin/Category/cate_display");?>',
                                                    {id:id,display:1},
                                                    function(data){
                                                        if(data)
                                                            $this.html('显示');
                                                    })
                                            }
                                        })
                                        $('.delete_b').click(function(){
                                            var id = $(this).parents('tr').find('td:first').html();
                                            var tr = $(this);
                                            $.get('<?php echo U("Admin/Category/delete");?>',{id:id},function(data){
                                                if(data)
                                                    tr.parents('tr').remove();
                                            })
                                        })
                                    }
                                });
                            }
                            if(pls == '关闭'){
                                $(table).find('.add').remove();
                                $(this).html('查看子分类').removeClass('close');
                            }
                        })
                    }
                });
            }
            if(cls == '关闭'){
                var id = $(this).parents('.gradeA').css('background','white').find('td:first').html();
                $('table tr[class*="add'+id+'"]').remove();
                $(this).html('查看子分类').removeClass('close');
            }
        });
        $('.delete').click(function(){
            var id = $(this).parents('tr').find('td:first').html();
            var tr = $(this);
            $.get('<?php echo U("Admin/Category/delete");?>',{id:id},function(data){
                if(data)
                    tr.parents('tr').remove();
            })
        }) 
    })
    </script>

            <!-- /.row -->
           
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="/Public/Admin/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/Public/Admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="/Public/Admin/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->

    <!-- Custom Theme JavaScript -->
    <script src="/Public/Admin/dist/js/sb-admin-2.js"></script>

</body>

</html>