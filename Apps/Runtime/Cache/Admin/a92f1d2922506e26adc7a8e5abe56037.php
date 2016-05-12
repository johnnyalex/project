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
    <link href="/BBBB/project/Public/Admin/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="/BBBB/project/Public/Admin/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="/BBBB/project/Public/Admin/dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/BBBB/project/Public/Admin/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="/BBBB/project/Public/Admin/bower_components/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/BBBB/project/Public/Admin/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

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
                
    <h1 class="page-header">用户列表</h1>

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
                            <form method="get" action="<?php echo U('Admin/User/index');?>">
                        	<div class="row">
                        		<div class="col-sm-6">
                        			<div class="dataTables_length" id="dataTables-example_length">
                        				<label>每页显示
		                        			<select name="num" aria-controls="dataTables-example" class="form-control input-sm">
		                        				<option value="5">5</option>
		                        				<option value="10">10</option>
		                        				<option value="15">15</option>
		                        				<option value="20">20</option>
		                        			</select>条
                        				</label>
                        			</div>
                        		</div>
                        		<div class="col-sm-6">
                        			<div id="dataTables-example_filter" class="dataTables_filter">
                        				<label>用户名查询:<input type="text" name="keyword" value="<?php echo ($_GET['keyword']); ?>"  class="form-control input-sm" placeholder="" aria-controls="dataTables-example"></label>
                                        <button class="btn btn-primary">搜索</button>
                        			</div>
                        		</div>
                        	</div>
                            </form>
                        	<div class="row">
                        	<div class="col-sm-12">
                        	<table id="dataTables-example" class="table table-striped table-bordered table-hover dataTable no-footer" role="grid" aria-describedby="dataTables-example_info">
                            <thead>
                                <tr role="row">
                                	<th class="sorting_asc" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 60px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">头像</th>
                                	<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 40px;" aria-label="Browser: activate to sort column ascending">ID</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 100px;" aria-label="Platform(s): activate to sort column ascending">用户名</th>
                                	<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 100px;" aria-label="Platform(s): activate to sort column ascending">性别</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 100px;" aria-label="Engine version: activate to sort column ascending">邮箱</th>
                                	<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 100px;" aria-label="Engine version: activate to sort column ascending">手机号</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 100px;" aria-label="CSS grade: activate to sort column ascending">等级</th>
                                	<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 100px;" aria-label="CSS grade: activate to sort column ascending">锁定</th>
                                	<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 100px;" aria-label="CSS grade: activate to sort column ascending">操作</th>
                                </tr>
                            </thead>
                            <tbody>
                            <!-- z这是用户列表的遍历 -->
                            <?php if(is_array($users)): foreach($users as $key=>$vo): ?><tr class="gradeA odd" role="row">
	                                <td class="sorting_1"><img src="/BBBB/project/Public/<?php echo ($vo["pic"]); ?>" height="30px"></td>
	                                <td class="sid"><?php echo ($vo["id"]); ?></td>
                                    <td class="susername"><?php echo ($vo["username"]); ?></td>
	                                <td class="ssex"><?php echo ($vo["sex"]); ?></td>
                                    <td class="center semail"><?php echo ($vo["email"]); ?></td>
	                                <td class="center sphone"><?php echo ($vo["phone"]); ?></td>
                                    <td class="center stype"><?php echo ($vo["type"]); ?></td>
                                    <td class="sstatus center">
                                    <button class="btn_dis btn-info" type="button"><?php echo ($vo["status"]); ?></button>
                                    </td>
	                                <td class="center">
                                    <button class="btn btn-danger btn-del"  type="button"><i class="fa fa-times">删除</i></button>
                                    <a href=""><button class="btn btn-primary " type="button"><i class="fa fa-list">修改</i></button></a>
                                    </td>
	                            </tr><?php endforeach; endif; ?>
                            </tbody>
                        </table></div></div>
                        <style type="text/css">
                        #pages a,#pages span{
                              background-color: #fff;
                              border: 1px solid #ddd;
                              color: #337ab7;
                              float: left;
                              line-height: 1.42857;
                              margin-left: -1px;
                              padding: 6px 12px;
                              position: relative;
                              text-decoration: none;
                          }
                          #pages span{
                        background-color: #337ab7;
                         border-color: #337ab7;
                         color: #fff;
                         cursor: default;
                         z-index: 2;
                       }
                     </style>
                   <div class="row">
                       <div class="col-sm-6">
                           <div class="dataTables_info" id="dataTables-example_info" role="status" aria-live="polite"></div>
                       </div>
                        <div class="col-sm-6">
                         <div id="pages">
                          <?php echo ($pages); ?>
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
<script type="text/javascript" src="/BBBB/project/Public/Admin/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript">
    // alert($);
    $(function(){
        $('.btn_dis').bind("click",function(){
            var status = $(this).html();
            var id = $(this).parents('tr').find('.sid').html();
            var $this = $(this);
            console.log(status);
            if(status == '正常'){
                $.post('<?php echo U("Admin/User/user_status");?>',
                    {id:id,status:0},
                    function(data){
                        if(data)
                            $this.html('锁定');
                    })
            }
            else if(status == '锁定'){
                $.post('<?php echo U("Admin/User/user_status");?>',
                    {id:id,status:1},
                    function(data){
                        if(data)
                            $this.html('正常');
                    })
            }
        })
     //加载完毕
    $(function(){
        //定义全局变量
        var edit = true;

        $('.susername').dblclick(function(){
            if(edit == false) 
                return;
            edit = false;
            //声明 td
            var td = $(this);
            //获取原有的值
            var v = $(this).html();
            //新建input
            var ipt = $('<input type="text" name="username" size="10" value="'+v+'">');
            //清空input 后 在添加input
            td.empty().append(ipt);
            //设置文本选中
            ipt.select();
            //文本失去焦点后 发ajax 改数据库中的文件
            ipt.blur(function(){
                //提交ajax  url
                edit = true;
                var url = '<?php echo U("Admin/User/edit");?>';
                //获取用户 id
                var id = ipt.parents('.gradeA').find('.sid').html();
                //获取新的值
                var username = ipt.val();
                $.ajax({
                    url:url,
                    data:{'id':id,'username':username,},
                    type:'post',
                    success:function(data){
                        if (data==0) {
                            td.empty().append(username).css('color','green');
                            // edit = false;
                        }else{
                            // alert('修改失败');  
                            ipt.replaceWith(username);
                            // edit = false;
                        }
                    },
                });
            })
        })

        $('.semail').dblclick(function(){
            //声明 td
            if(edit == false) 
                return;
            edit = false;

            var td = $(this);
            //获取原有的值
            var v = $(this).html();
            //新建input
            var ipt = $('<input type="text" name="email" size="10" value="'+v+'">');
            //清空input 后 在添加input
            td.empty().append(ipt);
            //设置文本选中
            ipt.select();
            //文本失去焦点后 发ajax 改数据库中的文件
            ipt.blur(function(){
                edit = true;

                //提交ajax  url
                var url = '<?php echo U("Admin/User/edit");?>';
                //获取用户 id
                var id = ipt.parents('.gradeA').find('.sid').html();
                //获取新的值
                var email = ipt.val();
                $.ajax({
                    url:url,
                    data:{'id':id,'email':email,},
                    type:'post',
                    success:function(data){
                        if (data==0) {
                            td.empty().append(email).css('color','green');
                        }else{
                            // alert('修改失败');  
                            td.empty().append(email);
                        }
                    },
                });
            })
        })

        $('.stype').dblclick(function(){
            if(edit == false) 
                return;
            edit = false;

            //声明 td
            var td = $(this);
            //获取原有的值
            var v = $(this).html();
            //新建input
            var ipt = $('<select name="type"><option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option></select>');
            //清空input 后 在添加input
            td.empty().append(ipt);
            //文本失去焦点后 发ajax 改数据库中的文件
            ipt.blur(function(){
                edit = true;
                //提交ajax  url
                var url = '<?php echo U("Admin/User/edit");?>';
                //获取用户 id
                var id = ipt.parents('.gradeA').find('.sid').html();
                //获取新的值
                var type = ipt.val();
                $.ajax({
                    url:url,
                    data:{'id':id,'type':type,},
                    type:'post',
                    success:function(data){
                        if (data==0) {
                            td.empty().append(type).css('color','green');
                        }else{
                            // alert('修改失败');  
                            td.empty().append(type);
                        }
                    },
                });
            })
        })

        $('.btn-del').click(function(){
            var v = $(this).parents('.gradeA').find('.sid').html();
            // alert(v);
            var url = '<?php echo U("Admin/User/delete");?>';
            var  btn = $(this);
            $.ajax({
                url:url,
                data:{id:v},
                type:'get',
                success:function(data){
                    if(data==0){
                        btn.parents('.gradeA').remove();
                    }else{
                        alert('delete fail');
                    }
                },
            })
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
    <script src="/BBBB/project/Public/Admin/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/BBBB/project/Public/Admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="/BBBB/project/Public/Admin/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->

    <!-- Custom Theme JavaScript -->
    <script src="/BBBB/project/Public/Admin/dist/js/sb-admin-2.js"></script>

</body>

</html>