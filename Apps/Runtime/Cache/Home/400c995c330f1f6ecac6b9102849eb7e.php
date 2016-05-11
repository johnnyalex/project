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
        
        
        
        <div class="totop-tips" style="display:none;"><p class="">按&nbsp;<strong>Ctrl+D&nbsp;</strong>，把卷皮网放入收藏夹，折扣信息一手掌握！<a href="javascript:void(0)">不再提醒</a><span class="closet"><em>x</em>关闭</span></p></div>

        <!-- 广告弹出框 -->
        <div id="tan_chuang_div">
        
        </div>

        <!-- 页头 -->
        <div class="full_column" style="display:none">
   
        </div>
        <div id="toolbar">
            <div class="bar-con">
                <div class="right-show fr">
                        <?php if ($_SESSION['user']['id']!=''){ echo'你好,'.$_SESSION['user']['username']?>
                            &#12288;|
                            <a href="<?php echo U('Home/Center/index');?>">个人中心</a>&#12288;|
                            <a href="<?php echo U('Home/Login/outlogin');?>">退出登录</a>&#12288;|
                            <a href="<?php echo U('Home/Center/allOrder');?>" rel="nofollow" target="_blank">我的订单</a>&#12288;|
                        <?php }else{ ?>
                            <a href="" rel="nofollow">QQ登录</a>&#12288;|
                            <a href="" rel="nofollow">微博登录</a>&#12288;| 
                            <a href="<?php echo U('Home/Login/index');?>" rel="nofollow">账户登录</a>&#12288;|
                            <a href="<?php echo U('Home/Regist/index');?>" >免费注册</a>&#12288;|
                        <?php }?>
                            <a href="" rel="nofollow">联系客服</a>&#12288;|
                </div>
            </div>
        </div>
<div class="header clear">
    <div class="area">
        <a  class="juan-logo fl" href="<?php echo U('Home/Index/index');?>" title="卷皮首页">
        <div class="logo logo1">
            <div class="fl"><span class="juan-txt fl"></span></div>
        </div>
        </a>
        <div class="protection">
            <a title="每天10点开抢" class="update" href="###/help/xiaobao" target="_blank" rel="nofollow"></a>
            <a title="职业买手砍价" class="lowest" href="###/help/xiaobao#consumer03" target="_blank" rel="nofollow"></a>
            <a title="商品验货质检" class="check1" href="###/help/xiaobao#consumer04" target="_blank" rel="nofollow"></a>
        </div>
        <div class="search">
            <span class="search-area fl">
                <input type="text" name="keywords" id="keywords" class="txt" value="请输入想找的宝贝" title="请输入想找的宝贝" />
            </span>
            <input type="submit" value="" class="smt fr" />
            <input type="hidden" id="search_action" name="search_action" value="###/search">
            <input type="hidden" id="search_from"   name="search_from" value="1">
        </div>
        <img class="banner-right-code" style="display:block;" src="/BBBB/project/Public/Home/Picture/jp-app-index.png">
    </div>
    <div class="mainNav">
        <div class="nav">
            <ul class="navigation fl">
                <li class="current first" channel="1">
                    <a style="" href="###" target="_blank">最新折扣</a>
                </li>
                <li >
                    <a href="http://brand.juanpi.com" target="_blank">品牌折扣</a>
                </li>
                <li  channel="25">
                    <a href="http://shop.juanpi.com" target="_blank">特卖精选</a>
                </li>
                <li   channel="7">
                    <a href="http://jkj.juanpi.com" target="_blank">9.9包邮</a>
                </li>
                <li class="last">
                    <a href="###/yugao" target="_blank">明日预告</a>
                </li>
                <li>
                    <a href="###/apps" target="_blank" id="show-qcodes">
                        <em class="icon-normal icon-phone" id="new-phone"></em>
                        手机版
                    </a>
                    <div id="new-qcodes" class="code-tips" style="display: none;">
                        <div class="code-box">
                            <p class="code"></p>
                            <p class="txt" style="text-align:center;font-size: 14px">随时逛 及时抢</p>
                        </div>
                    </div>
                </li>
            </ul>
            <div class="state-show fr">
                <a  id="jifen" class="normal-a dosign">
                    <em class="icon-normal icon-nosign"></em>
                    <em class="text">签到领积分</em>
                </a>
                <div id ='addjifen' style="width: 300px;height: 300px;background: #ff436e; position:absolute;display:none"></div>

                <script type="text/javascript">
                   
                        //获取窗口的高度 
                    //     var windowHeight; 
                    //     //获取窗口的宽度 
                    //     var windowWidth; 
                    //     var top;
                    //     var left;
                    //     // 获取 宽高
                    //     function init(){ 
                    //        windowHeight=$(window).height(); 
                    //        windowWidth=$(window).width(); 
                    //         top = (windowWidth-300)/2;
                    //         left = (windowHeight-300)/2;
                    //     } 
                    // $(function(){
                    //     $('#jifen').click(function(){
                    //         $('.box_tips').css('',)
                    //         // init();
                    //         // $('#addjifen').css('top',top).css('left',left).css('display','block'); 
                    //     })
                    // })

                </script>
                <script type="text/javascript">
                </script>

                <!-- <div style="display:none;" class="normal-side-box" id="top-side-box"> -->
                    <div class="box-tips" style="display: none;">
                        <p class="text">每天最多可赚：<b>100</b> 积分<br>
                            <a target="_blank" href="###/jifen/task">赚积分攻略</a></p>
                        <p class="other"> <a target="_blank" href="//user.juanpi.com/beans">我的积分</a>&#12288;｜&#12288;<a target="_blank" href="###/jifen">积分商城</a><br>
                            <a target="_blank" href="###/jifen/sns">新手任务，轻松起步！</a><br>
                            QQ特享群：<b>390623218</b> </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
                <!-- /页头 -->

        <!-- 主体 -->
        <div class="banner">
          <ul class="img1">
                <li><a href=""><img src="/BBBB/project/Public/Home/Picture/mao1.png"></a></li>
                <li><a href=""><img src="/BBBB/project/Public/Home/Picture/kid2.png"></a></li>
                <li><a href=""><img src="/BBBB/project/Public/Home/Picture/biao3.png"></a></li>
                <li><a href=""><img src="/BBBB/project/Public/Home/Picture/bao4.png" ></a></li>
            </ul>
              
            <div class="btn btn_l">&lt;</div>
            <div class="btn btn_r">&gt;</div>
            <ul class="num">
                <li class="on"></li>
                <li></li>
                <li></li>
                <li></li>
            </ul>
        </div>
<!-- </div> -->
<script type="text/javascript" src="/BBBB/project/Public/Home/Js/lunbo.js"></script>
<div class="top_wrap">
    <div class="top_box">
        <div class="banner_l">
            <dl>
                <dd>
                    <a href="###/nvzhuang">
                        <i class="ct-icon ct-icon-nvzhuang"></i> 女装
                        <em class="ct-line"></em>
                    </a>
                </dd>
                <dd>
                    <a href="###/nanzhuang">
                        <i class="ct-icon ct-icon-nanzhuang"></i> 男装
                    </a>
                </dd>
                <dd>
                    <a href="###/xiezi">
                        <i class="ct-icon ct-icon-xiezi"></i> 鞋子
                        <em class="ct-line"></em>
                    </a>
                </dd>
                <dd>
                    <a href="###/xiangbao">
                        <i class="ct-icon ct-icon-xiangbao"></i> 箱包
                    </a>
                </dd>
                <dd>
                    <a href="###/muying">
                        <i class="ct-icon ct-icon-muying"></i> 母婴
                        <em class="ct-line"></em>
                    </a>
                </dd>
                <dd>
                    <a href="###/meizhuang">
                        <i class="ct-icon ct-icon-meizhuang"></i> 美妆
                    </a>
                </dd>
                <dd>
                    <a href="###/jujia">
                        <i class="ct-icon ct-icon-jujia"></i> 居家
                        <em class="ct-line"></em>
                    </a>
                </dd>
                <dd>
                    <a href="###/jiafang">
                        <i class="ct-icon ct-icon-jiafang"></i> 家纺
                    </a>
                </dd>
                <dd>
                    <a href="###/wenti">
                        <i class="ct-icon ct-icon-wenti"></i> 文体
                        <em class="ct-line"></em>
                    </a>
                </dd>
                <dd>
                    <a href="###/meishi">
                        <i class="ct-icon ct-icon-meishi"></i> 美食
                    </a>
                </dd>
                <dd>
                    <a href="###/shuma">
                        <i class="ct-icon ct-icon-shuma"></i> 数码
                        <em class="ct-line"></em>
                    </a>
                </dd>
                <dd>
                    <a href="###/dianqi">
                        <i class="ct-icon ct-icon-dianqi"></i> 电器
                    </a>
                </dd>
                <dd class="border-none">
                    <a href="###/neiyi">
                        <i class="ct-icon ct-icon-neiyi"></i> 内衣
                        <em class="ct-line"></em>
                    </a>
                </dd>
                <dd class="border-none">
                    <a href="###/peishi">
                        <i class="ct-icon ct-icon-peishi"></i> 配饰
                    </a>
                </dd>
            </dl>
        </div>
        
        <div class="banner_r" style="background:#f7f7f7;box-shadow:none">
        <dl>
            <dd>
                <a class="'right" data-value="ad_banner_right#1_1" data-ga="迈克·菲恩" target="_blank" href="">
                    <img src="/BBBB/project/Public/Home/Picture/a.jpg">
                </a>
            </dd>
            <dd>
                <a class="'right" data-value="ad_banner_right#1_2" data-ga="迈克·菲恩" target="_blank" href="">
                    <img src="/BBBB/project/Public/Home/Picture/b.jpg">
                </a>
            </dd>
            <dd>
                <a class="'right" data-value="ad_banner_right#1_3" data-ga="迈克·菲恩" target="_blank" href="">
                    <img src="/BBBB/project/Public/Home/Picture/c.jpg">
                </a>
            </dd>
            <dd>
                <a class="'right" data-value="ad_banner_right#1_4" data-ga="迈克·菲恩" target="_blank" href="">
                    <img src="/BBBB/project/Public/Home/Picture/d.jpg">
                </a>
            </dd>
            <dd class="last">
                <a class="'right" data-value="ad_banner_right#1_5" data-ga="迈克·菲恩" target="_blank" href="">
                    <img src="/BBBB/project/Public/Home/Picture/e.jpg">
                </a>

            </dd>
        </dl>
        </div>
        
        <div class="round">
            <div class="adType">
            </div>
        </div>
        <div style="display:none;" class="banner_arrow" data-banner="arrow">
            <a href="javascript:;" class="arrow_prev" data-arrow="prev"><i></i></a>
            <a href="javascript:;" class="arrow_next" data-arrow="next"><i></i></a>
        </div>
    </div>
</div>

            <div class="new-users clear">
            <ul class="fr">
                <li><a href="#nvzhuang" target="_blank"><span>品牌女装</span><i class="icon-arrow"></i></a></li>
                <li><a href="#muying" target="_blank"><span>品牌母婴</span><i class="icon-arrow"></i></a></li>
                <li><a href="#jujia" target="_blank"><span>品质居家</span><i class="icon-arrow"></i></a></li>
                <li class="active"><a href="http://brand.juanpi.com" target="_blank"><span>全部品牌</span><i class="icon-arrow"></i></a></li>
            </ul>
            <div class="update-time fl" >
                <div class="today">
                    <i class="brand_new"></i>今日品牌
                </div>
            </div>
        </div>
        <div class="brand_index clear">
        <div class="brand_list">
            <ul class="brand_data clear">
                <li>
                    <div class="brand-status">
                        <a href="#xiangbao?id=1021608" class="link-box" target="_blank" data-value="brand#1_3">
                            <div class="brand-pic"><img src="/BBBB/project/Public/Home/Picture/5723187092be592b068b4580_680x280.jpg">
                                <div class="brand_time" data-etime="1462845600" style="display:none">
                                    <p><span class="icon_time"></span><span class="brand-days"><em>00</em><i>天</i></span><span class="brand-hours"><em>00</em><i>时</i></span><span class="brand-minutes"><em>00</em><i>分</i></span><span class="brand-seconds"><em>00</em><i>秒</i></span></p>
                                    <div class="brand_time_bg"></div>
                                </div>
                            </div>
                            <div class="card">
                                <img class="brand-logo" src="/BBBB/project/Public/Home/Picture/5722cd0792be590e208b4581_180x90.png">
                                <span class="discount discount1">
                                <span>马上抢</span>
                                </span>                                    
                                <span class="title" >0.6折起</span>
                            </div>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="brand-status">
                        <a href="#xiezi?id=1021642" class="link-box" target="_blank" data-value="brand#1_2">
                            <div class="brand-pic"><img src="/BBBB/project/Public/Home/Picture/5723385a92be59cc428b457c_680x280.jpg">
                                <div class="brand_time" data-etime="1462845600" style="display:none">
                                    <p><span class="icon_time"></span><span class="brand-days"><em>00</em><i>天</i></span><span class="brand-hours"><em>00</em><i>时</i></span><span class="brand-minutes"><em>00</em><i>分</i></span><span class="brand-seconds"><em>00</em><i>秒</i></span></p>
                                    <div class="brand_time_bg"></div>
                                </div>
                            </div>
                            <div class="card">
                            <img class="brand-logo" src="/BBBB/project/Public/Home/Picture/56810ebe92be599b838b4579_180x90.png">
                            <span class="discount discount1">
                            <span>马上抢</span>
                            </span>                                    
                                <span class="title" >
                                    1.4折起
                                </span>
                            </div>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="brand-status">
                        <a href="#xiangbao?id=1021608" class="link-box" target="_blank" data-value="brand#1_3">
                            <div class="brand-pic"><img src="/BBBB/project/Public/Home/Picture/5723187092be592b068b4580_680x280.jpg">
                                <div class="brand_time" data-etime="1462845600" style="display:none">
                                    <p><span class="icon_time"></span><span class="brand-days"><em>00</em><i>天</i></span><span class="brand-hours"><em>00</em><i>时</i></span><span class="brand-minutes"><em>00</em><i>分</i></span><span class="brand-seconds"><em>00</em><i>秒</i></span></p>
                                    <div class="brand_time_bg"></div>
                                </div>
                            </div>
                            <div class="card">
                                <img class="brand-logo" src="/BBBB/project/Public/Home/Picture/5722cd0792be590e208b4581_180x90.png">
                                <span class="discount discount1">
                                <span>马上抢</span>
                                </span>                                    
                                <span class="title" >0.6折起</span>
                            </div>
                        </a>
                    </div>
                </li>
            </ul>
        <ul class="brand_logo clear">
            <li class="first">更多品牌特卖：</li>
            <li><a href="#nvzhuang?id=1311676" target="_blank" data-value="brand#1_4"><img src="/BBBB/project/Public/Home/Picture/56d6978b92be5900468b4567_180x90.png"></a></li>
            <li><a href="#nvzhuang?id=1511605" target="_blank" data-value="brand#1_5"><img src="/BBBB/project/Public/Home/Picture/56c677d392be59bd9b8b456a_180x90.png"></a></li>
            <li><a href="#nvzhuang?id=1701689" target="_blank" data-value="brand#1_6"><img src="/BBBB/project/Public/Home/Picture/56e7cffb92be59657f8b4598_180x90.png"></a></li>
            <li><a href="#nvzhuang?id=1601650" target="_blank" data-value="brand#1_7"><img src="/BBBB/project/Public/Home/Picture/57189bc092be599b838b457a_180x90.png"></a></li>
            <li><a href="#nvzhuang?id=1080606" target="_blank" data-value="brand#1_8"><img src="/BBBB/project/Public/Home/Picture/571045c492be59326a8b456d_180x90.png"></a></li>
            <li><a href="#xiezi?id=1931657" target="_blank" data-value="brand#1_9"><img src="/BBBB/project/Public/Home/Picture/56fa338392be597e8d8b4567_180x90.png"></a></li>
            <li><a href="#xiezi?id=1331694" target="_blank" data-value="brand#1_10"><img src="/BBBB/project/Public/Home/Picture/568346da92be59bba88b456d_180x90.png"></a></li>
            <li><a href="#xiezi?id=1441600" target="_blank" data-value="brand#1_11"><img src="/BBBB/project/Public/Home/Picture/5673c20292be59860c8b4581_180x90.png"></a></li>
            <li class="last"><a href="http://brand.juanpi.com" target="_blank">查看全部》</a></li>
        </ul>
        </div>
    </div>

<div class="new-users clear">
    <div class="update-time fl" >
        <div class="today">
            <i class="icon_new"></i>今日新品<span>每天10点上新</span>
        </div>
    </div>
</div>    
    <div class="main pr mt25 clear" data-ugctag="C2" style="display:block;">
        <input type="hidden" name="favken" value="">
        <div id="navv" class="line-cate-nav-location hidden">
            <div class="line-cate-nav-wrapper">
                <ul class="line-cate-nav">
                    <li class="first"><a class="active" href="###">今日上新</a></li>
                    <li><a class="" href="###/nvzhuang">女装</a></li>
                    <li><a class="" href="###/nanzhuang">男装</a></li>
                    <li><a class="" href="###/xiezi">鞋子</a></li>
                    <li><a class="" href="###/xiangbao">箱包</a></li>
                    <li><a class="" href="###/muying">母婴</a></li>
                    <li><a class="" href="###/meizhuang">美妆</a></li>
                    <li><a class="" href="###/jujia">居家</a></li>
                    <li><a class="" href="###/jiafang">家纺</a></li>
                    <li><a class="" href="###/wenti">文体</a></li>
                    <li><a class="" href="###/meishi">美食</a></li>
                    <li><a class="" href="###/shuma">数码</a></li>
                    <li><a class="" href="###/dianqi">电器</a></li>
                    <li><a class="" href="###/neiyi">内衣</a></li>
                    <li><a class="" href="###/peishi">配饰</a></li>
                    <li class="last"><a target="_blank" href="###/yugao">[明日预告]</a></li>
                </ul>
            </div>
        </div>
<ul class="goods-list clear">
    <li gtype="1" g_type="1"  re="" id="77432594" >
        <div class="list-good buy">
            <div class="good-pic">
                <a href="###/click/?id=77432594" class="pic-img" target="_blank" data-value="goods#1_1">
                    <img alt="无痕冰丝抹胸(买3送1)" src="/BBBB/project/Public/Home/Picture/blank.png" class="lazy" d-src="" />
                    <span class="new-icon">新品</span>                    
                </a>
            </div>
            <h3 class="good-title">
                [包邮]<a href="###/click/?id=77432594" target="_blank">无痕冰丝抹胸(买3送1)</a>
                <div class="icon-all" style="display:none;">
            <span class="sold">剩4天</span>
            </h3>
            <div class="good-price">
                <span class="price-current" ><em>￥</em>9.8</span>
                <span class="des-other">
                    <strong></strong>
                    <span class="price-old"><em>￥</em>29.8</span>
                    <span class="discount">(<em>3.3</em>折)</span>
                </span>
                <div class="btn buy t-buy">
                    <a href="###/click/?id=77432594" target="_blank" rel="nofollow"><em class="t-icon"></em><span>淘宝</span></a>
                </div>
            </div>
            <!-- like -->
            <a class="y-like my-like" data-gid="77432594" data-gtype="1" lkid="77432594" lks="1"  gtype="1"  title="加入收藏">
                <i class="like-ico"><span class="heart_left"></span><span class="heart_right"></span></i>
            </a>
            <!-- end like -->
            <div class="box-hd" style="display:block;clear:both;">
            </div>
        </div>
    </li>
    <li gtype="1" g_type="1"  re="" id="77432594" >
        <div class="list-good buy">
            <div class="good-pic">
                <a href="###/click/?id=77432594" class="pic-img" target="_blank" data-value="goods#1_1">
                    <img alt="无痕冰丝抹胸(买3送1)" src="/BBBB/project/Public/Home/Picture/blank.png" class="lazy" d-src="" />
                    <span class="new-icon">新品</span>                    
                </a>
            </div>
            <h3 class="good-title">
                [包邮]<a href="###/click/?id=77432594" target="_blank">无痕冰丝抹胸(买3送1)</a>
                <div class="icon-all" style="display:none;">
            <span class="sold">剩4天</span>
            </h3>
            <div class="good-price">
                <span class="price-current" ><em>￥</em>9.8</span>
                <span class="des-other">
                    <strong></strong>
                    <span class="price-old"><em>￥</em>29.8</span>
                    <span class="discount">(<em>3.3</em>折)</span>
                </span>
                <div class="btn buy t-buy">
                    <a href="###/click/?id=77432594" target="_blank" rel="nofollow"><em class="t-icon"></em><span>淘宝</span></a>
                </div>
            </div>
            <!-- like -->
            <a class="y-like my-like" data-gid="77432594" data-gtype="1" lkid="77432594" lks="1"  gtype="1"  title="加入收藏">
                <i class="like-ico"><span class="heart_left"></span><span class="heart_right"></span></i>
            </a>
            <!-- end like -->
            <div class="box-hd" style="display:block;clear:both;">
            </div>
        </div>
    </li>
    <li gtype="1" g_type="1"  re="" id="77432594" >
        <div class="list-good buy">
            <div class="good-pic">
                <a href="###/click/?id=77432594" class="pic-img" target="_blank" data-value="goods#1_1">
                    <img alt="无痕冰丝抹胸(买3送1)" src="/BBBB/project/Public/Home/Picture/blank.png" class="lazy" d-src="" />
                    <span class="new-icon">新品</span>                    
                </a>
            </div>
            <h3 class="good-title">
                [包邮]<a href="###/click/?id=77432594" target="_blank">无痕冰丝抹胸(买3送1)</a>
                <div class="icon-all" style="display:none;">
            <span class="sold">剩4天</span>
            </h3>
            <div class="good-price">
                <span class="price-current" ><em>￥</em>9.8</span>
                <span class="des-other">
                    <strong></strong>
                    <span class="price-old"><em>￥</em>29.8</span>
                    <span class="discount">(<em>3.3</em>折)</span>
                </span>
                <div class="btn buy t-buy">
                    <a href="###/click/?id=77432594" target="_blank" rel="nofollow"><em class="t-icon"></em><span>淘宝</span></a>
                </div>
            </div>
            <!-- like -->
            <a class="y-like my-like" data-gid="77432594" data-gtype="1" lkid="77432594" lks="1"  gtype="1"  title="加入收藏">
                <i class="like-ico"><span class="heart_left"></span><span class="heart_right"></span></i>
            </a>
            <!-- end like -->
            <div class="box-hd" style="display:block;clear:both;">
            </div>
        </div>
    </li>
    <li gtype="1" g_type="1"  re="" id="77432594" >
        <div class="list-good buy">
            <div class="good-pic">
                <a href="###/click/?id=77432594" class="pic-img" target="_blank" data-value="goods#1_1">
                    <img alt="无痕冰丝抹胸(买3送1)" src="/BBBB/project/Public/Home/Picture/blank.png" class="lazy" d-src="" />
                    <span class="new-icon">新品</span>                    
                </a>
            </div>
            <h3 class="good-title">
                [包邮]<a href="###/click/?id=77432594" target="_blank">无痕冰丝抹胸(买3送1)</a>
                <div class="icon-all" style="display:none;">
            <span class="sold">剩4天</span>
            </h3>
            <div class="good-price">
                <span class="price-current" ><em>￥</em>9.8</span>
                <span class="des-other">
                    <strong></strong>
                    <span class="price-old"><em>￥</em>29.8</span>
                    <span class="discount">(<em>3.3</em>折)</span>
                </span>
                <div class="btn buy t-buy">
                    <a href="###/click/?id=77432594" target="_blank" rel="nofollow"><em class="t-icon"></em><span>淘宝</span></a>
                </div>
            </div>
            <!-- like -->
            <a class="y-like my-like" data-gid="77432594" data-gtype="1" lkid="77432594" lks="1"  gtype="1"  title="加入收藏">
                <i class="like-ico"><span class="heart_left"></span><span class="heart_right"></span></i>
            </a>
            <!-- end like -->
            <div class="box-hd" style="display:block;clear:both;">
            </div>
        </div>
    </li>
    <li gtype="1" g_type="1"  re="" id="77432594" >
        <div class="list-good buy">
            <div class="good-pic">
                <a href="###/click/?id=77432594" class="pic-img" target="_blank" data-value="goods#1_1">
                    <img alt="无痕冰丝抹胸(买3送1)" src="/BBBB/project/Public/Home/Picture/blank.png" class="lazy" d-src="" />
                    <span class="new-icon">新品</span>                    
                </a>
            </div>
            <h3 class="good-title">
                [包邮]<a href="###/click/?id=77432594" target="_blank">无痕冰丝抹胸(买3送1)</a>
                <div class="icon-all" style="display:none;">
            <span class="sold">剩4天</span>
            </h3>
            <div class="good-price">
                <span class="price-current" ><em>￥</em>9.8</span>
                <span class="des-other">
                    <strong></strong>
                    <span class="price-old"><em>￥</em>29.8</span>
                    <span class="discount">(<em>3.3</em>折)</span>
                </span>
                <div class="btn buy t-buy">
                    <a href="###/click/?id=77432594" target="_blank" rel="nofollow"><em class="t-icon"></em><span>淘宝</span></a>
                </div>
            </div>
            <!-- like -->
            <a class="y-like my-like" data-gid="77432594" data-gtype="1" lkid="77432594" lks="1"  gtype="1"  title="加入收藏">
                <i class="like-ico"><span class="heart_left"></span><span class="heart_right"></span></i>
            </a>
            <!-- end like -->
            <div class="box-hd" style="display:block;clear:both;">
            </div>
        </div>
    </li>
    <li gtype="1" g_type="1"  re="" id="77432594" >
        <div class="list-good buy">
            <div class="good-pic">
                <a href="###/click/?id=77432594" class="pic-img" target="_blank" data-value="goods#1_1">
                    <img alt="无痕冰丝抹胸(买3送1)" src="/BBBB/project/Public/Home/Picture/blank.png" class="lazy" d-src="" />
                    <span class="new-icon">新品</span>                    
                </a>
            </div>
            <h3 class="good-title">
                [包邮]<a href="###/click/?id=77432594" target="_blank">无痕冰丝抹胸(买3送1)</a>
                <div class="icon-all" style="display:none;">
            <span class="sold">剩4天</span>
            </h3>
            <div class="good-price">
                <span class="price-current" ><em>￥</em>9.8</span>
                <span class="des-other">
                    <strong></strong>
                    <span class="price-old"><em>￥</em>29.8</span>
                    <span class="discount">(<em>3.3</em>折)</span>
                </span>
                <div class="btn buy t-buy">
                    <a href="###/click/?id=77432594" target="_blank" rel="nofollow"><em class="t-icon"></em><span>淘宝</span></a>
                </div>
            </div>
            <!-- like -->
            <a class="y-like my-like" data-gid="77432594" data-gtype="1" lkid="77432594" lks="1"  gtype="1"  title="加入收藏">
                <i class="like-ico"><span class="heart_left"></span><span class="heart_right"></span></i>
            </a>
            <!-- end like -->
            <div class="box-hd" style="display:block;clear:both;">
            </div>
        </div>
    </li>
    <li gtype="1" g_type="1"  re="" id="77432594" >
        <div class="list-good buy">
            <div class="good-pic">
                <a href="###/click/?id=77432594" class="pic-img" target="_blank" data-value="goods#1_1">
                    <img alt="无痕冰丝抹胸(买3送1)" src="/BBBB/project/Public/Home/Picture/blank.png" class="lazy" d-src="" />
                    <span class="new-icon">新品</span>                    
                </a>
            </div>
            <h3 class="good-title">
                [包邮]<a href="###/click/?id=77432594" target="_blank">无痕冰丝抹胸(买3送1)</a>
                <div class="icon-all" style="display:none;">
            <span class="sold">剩4天</span>
            </h3>
            <div class="good-price">
                <span class="price-current" ><em>￥</em>9.8</span>
                <span class="des-other">
                    <strong></strong>
                    <span class="price-old"><em>￥</em>29.8</span>
                    <span class="discount">(<em>3.3</em>折)</span>
                </span>
                <div class="btn buy t-buy">
                    <a href="###/click/?id=77432594" target="_blank" rel="nofollow"><em class="t-icon"></em><span>淘宝</span></a>
                </div>
            </div>
            <!-- like -->
            <a class="y-like my-like" data-gid="77432594" data-gtype="1" lkid="77432594" lks="1"  gtype="1"  title="加入收藏">
                <i class="like-ico"><span class="heart_left"></span><span class="heart_right"></span></i>
            </a>
            <!-- end like -->
            <div class="box-hd" style="display:block;clear:both;">
            </div>
        </div>
    </li>
    <li gtype="1" g_type="1"  re="" id="77432594" >
        <div class="list-good buy">
            <div class="good-pic">
                <a href="###/click/?id=77432594" class="pic-img" target="_blank" data-value="goods#1_1">
                    <img alt="无痕冰丝抹胸(买3送1)" src="/BBBB/project/Public/Home/Picture/blank.png" class="lazy" d-src="" />
                    <span class="new-icon">新品</span>                    
                </a>
            </div>
            <h3 class="good-title">
                [包邮]<a href="###/click/?id=77432594" target="_blank">无痕冰丝抹胸(买3送1)</a>
                <div class="icon-all" style="display:none;">
            <span class="sold">剩4天</span>
            </h3>
            <div class="good-price">
                <span class="price-current" ><em>￥</em>9.8</span>
                <span class="des-other">
                    <strong></strong>
                    <span class="price-old"><em>￥</em>29.8</span>
                    <span class="discount">(<em>3.3</em>折)</span>
                </span>
                <div class="btn buy t-buy">
                    <a href="###/click/?id=77432594" target="_blank" rel="nofollow"><em class="t-icon"></em><span>淘宝</span></a>
                </div>
            </div>
            <!-- like -->
            <a class="y-like my-like" data-gid="77432594" data-gtype="1" lkid="77432594" lks="1"  gtype="1"  title="加入收藏">
                <i class="like-ico"><span class="heart_left"></span><span class="heart_right"></span></i>
            </a>
            <!-- end like -->
            <div class="box-hd" style="display:block;clear:both;">
            </div>
        </div>
    </li>
    <li gtype="1" g_type="1"  re="" id="77432594" >
        <div class="list-good buy">
            <div class="good-pic">
                <a href="###/click/?id=77432594" class="pic-img" target="_blank" data-value="goods#1_1">
                    <img alt="无痕冰丝抹胸(买3送1)" src="/BBBB/project/Public/Home/Picture/blank.png" class="lazy" d-src="" />
                    <span class="new-icon">新品</span>                    
                </a>
            </div>
            <h3 class="good-title">
                [包邮]<a href="###/click/?id=77432594" target="_blank">无痕冰丝抹胸(买3送1)</a>
                <div class="icon-all" style="display:none;">
            <span class="sold">剩4天</span>
            </h3>
            <div class="good-price">
                <span class="price-current" ><em>￥</em>9.8</span>
                <span class="des-other">
                    <strong></strong>
                    <span class="price-old"><em>￥</em>29.8</span>
                    <span class="discount">(<em>3.3</em>折)</span>
                </span>
                <div class="btn buy t-buy">
                    <a href="###/click/?id=77432594" target="_blank" rel="nofollow"><em class="t-icon"></em><span>淘宝</span></a>
                </div>
            </div>
            <!-- like -->
            <a class="y-like my-like" data-gid="77432594" data-gtype="1" lkid="77432594" lks="1"  gtype="1"  title="加入收藏">
                <i class="like-ico"><span class="heart_left"></span><span class="heart_right"></span></i>
            </a>
            <!-- end like -->
            <div class="box-hd" style="display:block;clear:both;">
            </div>
        </div>
    </li>
    <li gtype="1" g_type="1"  re="" id="77432594" >
        <div class="list-good buy">
            <div class="good-pic">
                <a href="###/click/?id=77432594" class="pic-img" target="_blank" data-value="goods#1_1">
                    <img alt="无痕冰丝抹胸(买3送1)" src="/BBBB/project/Public/Home/Picture/blank.png" class="lazy" d-src="" />
                    <span class="new-icon">新品</span>                    
                </a>
            </div>
            <h3 class="good-title">
                [包邮]<a href="###/click/?id=77432594" target="_blank">无痕冰丝抹胸(买3送1)</a>
                <div class="icon-all" style="display:none;">
            <span class="sold">剩4天</span>
            </h3>
            <div class="good-price">
                <span class="price-current" ><em>￥</em>9.8</span>
                <span class="des-other">
                    <strong></strong>
                    <span class="price-old"><em>￥</em>29.8</span>
                    <span class="discount">(<em>3.3</em>折)</span>
                </span>
                <div class="btn buy t-buy">
                    <a href="###/click/?id=77432594" target="_blank" rel="nofollow"><em class="t-icon"></em><span>淘宝</span></a>
                </div>
            </div>
            <!-- like -->
            <a class="y-like my-like" data-gid="77432594" data-gtype="1" lkid="77432594" lks="1"  gtype="1"  title="加入收藏">
                <i class="like-ico"><span class="heart_left"></span><span class="heart_right"></span></i>
            </a>
            <!-- end like -->
            <div class="box-hd" style="display:block;clear:both;">
            </div>
        </div>
    </li>
    <li gtype="1" g_type="1"  re="" id="77432594" >
        <div class="list-good buy">
            <div class="good-pic">
                <a href="###/click/?id=77432594" class="pic-img" target="_blank" data-value="goods#1_1">
                    <img alt="无痕冰丝抹胸(买3送1)" src="/BBBB/project/Public/Home/Picture/blank.png" class="lazy" d-src="" />
                    <span class="new-icon">新品</span>
                </a>
            </div>
            <h3 class="good-title">
                [包邮]<a href="###/click/?id=77432594" target="_blank">无痕冰丝抹胸(买3送1)</a>
                <div class="icon-all" style="display:none;">
            <span class="sold">剩4天</span>
            </h3>
            <div class="good-price">
                <span class="price-current" ><em>￥</em>9.8</span>
                <span class="des-other">
                    <strong></strong>
                    <span class="price-old"><em>￥</em>29.8</span>
                    <span class="discount">(<em>3.3</em>折)</span>
                </span>
                <div class="btn buy t-buy">
                    <a href="###/click/?id=77432594" target="_blank" rel="nofollow"><em class="t-icon"></em><span>淘宝</span></a>
                </div>
            </div>
            <!-- like -->
            <a class="y-like my-like" data-gid="77432594" data-gtype="1" lkid="77432594" lks="1"  gtype="1"  title="加入收藏">
                <i class="like-ico"><span class="heart_left"></span><span class="heart_right"></span></i>
            </a>
            <!-- end like -->
            <div class="box-hd" style="display:block;clear:both;">
            </div>
        </div>
    </li>
    <li gtype="1" g_type="1"  re="" id="77432594" >
        <div class="list-good buy">
            <div class="good-pic">
                <a href="###/click/?id=77432594" class="pic-img" target="_blank" data-value="goods#1_1">
                    <img alt="无痕冰丝抹胸(买3送1)" src="/BBBB/project/Public/Home/Picture/blank.png" class="lazy" d-src="" />
                    <span class="new-icon">新品</span>                    
                </a>
            </div>
            <h3 class="good-title">
                [包邮]<a href="###/click/?id=77432594" target="_blank">无痕冰丝抹胸(买3送1)</a>
                <div class="icon-all" style="display:none;">
            <span class="sold">剩4天</span>
            </h3>
            <div class="good-price">
                <span class="price-current" ><em>￥</em>9.8</span>
                <span class="des-other">
                    <strong></strong>
                    <span class="price-old"><em>￥</em>29.8</span>
                    <span class="discount">(<em>3.3</em>折)</span>
                </span>
                <div class="btn buy t-buy">
                    <a href="###/click/?id=77432594" target="_blank" rel="nofollow"><em class="t-icon"></em><span>淘宝</span></a>
                </div>
            </div>
            <!-- like -->
            <a class="y-like my-like" data-gid="77432594" data-gtype="1" lkid="77432594" lks="1"  gtype="1"  title="加入收藏">
                <i class="like-ico"><span class="heart_left"></span><span class="heart_right"></span></i>
            </a>
            <!-- end like -->
            <div class="box-hd" style="display:block;clear:both;">
            </div>
        </div>
    </li>
    <li gtype="1" g_type="1"  re="" id="77432594" >
        <div class="list-good buy">
            <div class="good-pic">
                <a href="###/click/?id=77432594" class="pic-img" target="_blank" data-value="goods#1_1">
                    <img alt="无痕冰丝抹胸(买3送1)" src="/BBBB/project/Public/Home/Picture/blank.png" class="lazy" d-src="" />
                    <span class="new-icon">新品</span>                    
                </a>
            </div>
            <h3 class="good-title">
                [包邮]<a href="###/click/?id=77432594" target="_blank">无痕冰丝抹胸(买3送1)</a>
                <div class="icon-all" style="display:none;">
            <span class="sold">剩4天</span>
            </h3>
            <div class="good-price">
                <span class="price-current" ><em>￥</em>9.8</span>
                <span class="des-other">
                    <strong></strong>
                    <span class="price-old"><em>￥</em>29.8</span>
                    <span class="discount">(<em>3.3</em>折)</span>
                </span>
                <div class="btn buy t-buy">
                    <a href="###/click/?id=77432594" target="_blank" rel="nofollow"><em class="t-icon"></em><span>淘宝</span></a>
                </div>
            </div>
            <!-- like -->
            <a class="y-like my-like" data-gid="77432594" data-gtype="1" lkid="77432594" lks="1"  gtype="1"  title="加入收藏">
                <i class="like-ico"><span class="heart_left"></span><span class="heart_right"></span></i>
            </a>
            <!-- end like -->
            <div class="box-hd" style="display:block;clear:both;">
            </div>
        </div>
    </li>
</ul>
<div class="page">
    <em></em>
    <div><span class="pg-prev">上一页</span><span>1</span><a href="/?page=2">2</a><a href="/?page=3">3</a><i>...</i><a  href="/?page=5">5</a><a class="pg-next" href="/?page=2">下一页</a>
</div>
<!-- 广告 -->
<!-- <div class="ad">

    
</div>
 -->
 <!-- 弹出提分框 -->

</div>
</div>
<!-- 举报 box start -->
<div class="alert_bg" id="alert_report" style="left: 539px; top: 182.5px; position: fixed; display: none;">
    <div class="alert_box">
        <div class="alert_top">
            <span class="iconimg"></span>
      <span>举报</span> 
      <a href="javascript:;" class="alert_close" onclick="$('#alert_report').hide();$('.alert_fullbg').hide();"></a>
        </div>
        <div class="alert_content">
            <div class="l_c_l">
                <form method="post" target="_self" id="inform" name="inform">
                    商品名称：<font class="bloak" re="" id="report_title">家居室内按摩浴室防滑凉拖鞋
                    原价25元 促销价9.9元</font><br> 举报原因：
          <select class="selectClass" id="reportAn" name="reportAn">
            <option value="0">请选择</option>
            <option value="1">宝贝价格与活动价格不符合</option>
            <option value="2">宝贝不包邮或只包平邮</option>
            <option value="3">宝贝已下架</option>
            <option value="4">宝贝要求两件起拍，一件不发货</option>
            <option value="5">卖家拒绝发货</option>
            <option value="6">宝贝分类错误</option>
            <option value="7">主图宝贝与实际出售宝贝不符</option>
            <option value="8">其他原因</option>
                  </select> 
          <br> 
          <label style="display: none" class="other">其他原因：
                      <input type="text" id="otherReasons" class="text" name="otherReasons">
            <br>
                  </label> 
          <input type="hidden" id="znid" value="10ui9d" name="inform_znid">
                    <input type="button" onclick="XD.JUBAO_SMT()" value="提 交" tabindex="3" class="smt">
                </form>
            </div>
        </div>
        <div class="bottom">注：为保证您的合法权益，请如实填写您所遇到的情况。</div>
    </div>
</div>
<!-- 举报 box end -->


        <!-- /主体 -->

        <!-- 页脚 -->
<div class="foot">
    <div class="white_bg">
    <div class="foot-con">
        <div class="con-box-n clear">
            <div class="app-side-box fl">
                <p class="app-show"></p>
                <p class="app-txt" style="text-align:center;font-size: 14px">随时逛 及时抢</p>
            </div>
            <div class="con-left-info fl">
                <dl class="update">
                    <dt>获取更新</dt>
                    <dd><a href="###/apps" target="_blank" rel="nofollow"><i></i>iPhone/Android</a></dd>
                    <dd><a href="http://user.qzone.qq.com/474171717" target="_blank" rel="nofollow"><i></i>卷皮QQ空间</a></dd>
                    <dd><a href="http://weibo.com/juanpicom" target="_blank" rel="nofollow"><i></i>卷皮新浪微博</a></dd>
                    <dd><a href="###/about/api" target="_blank" rel="nofollow"><i></i>开放API</a></dd>
                </dl>
                <dl class="cooperation">
                    <dt>商务合作</dt>
                    <dd><a href="https://seller.juanpi.com/choice" target="_blank"><i></i>卖家免费报名</a></dd>
                    <dd><a href="###/about/partner" target="_blank" rel="nofollow"><i></i>商务合作</a></dd>
                    <dd><a onclick="if (window.confirm('本邮箱仅接收合作商家对卷皮员工违规行为的举报。不接受用户咨询、投诉或商务合作申请。')) { window.location = 'mailto:' + 'moc.ipnauj@gnehznail'.split('').reverse().join(''); }" href="javascript:void(0)"><i></i>廉政邮箱<br><span class="revEmail">lianzheng@juanpi.com</span></a></dd>
                </dl>
                <dl class="cor-info">
                    <dt>公司信息</dt>
                    <dd><a href="###/about/juanpi" target="_blank" rel="nofollow"><i></i>关于卷皮</a></dd>
                    <dd><a href="###/about/media" target="_blank" rel="nofollow"><i></i>媒体报道</a></dd>
                    <dd class="school"><a href="###/about/job" target="_blank" rel="nofollow"><i></i>诚聘英才</a><a href="###/about/job_2015campus" target="_blank"><em></em></a></dd>
                    <dd><a href="###/event/xiaoyuan_zhaomu" target="_blank" rel="nofollow"><i></i>校园大使招募</a></dd>
                </dl>
                <dl class="help-info">
                    <dt>帮助中心</dt>
                    <dd><a href="###/help" target="_blank" rel="nofollow"><i></i>新手上路</a></dd>
                    <dd><a href="###/jifen/task" target="_blank" rel="nofollow"><i></i>积分攻略</a></dd>
                    <dd><a href="###/about/map" target="_blank"><i></i>网站地图</a></dd>
                </dl>
            </div>
            <div class="con-menu fr">
                <a href="###/about/service" class="service-add fl" target="_blank" rel="nofollow"></a>
            <span class="service-time fl">
                <p>周一至周日</p>
                <p>9:00-21:00 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
            </span>
            </div>
        </div>
                    <div class="links"  style="padding-bottom: 18px;">
  <span>友情链接：</span>
  <div class="links_list_box">
    <ul class="links_list">
        
            <li>
                <a http="###.jiukuaiyou.com/" target="_blank">九块邮</a>
                <a http="###.quanlaoda.com" target="_blank">易迅优惠券</a>
                <a http="###.cnxz.cn/" target="_blank">中国鞋网</a>
                <a http="###.hua.com/" target="_blank">中国鲜花礼品网</a>
                <a http="###.zbird.com/" target="_blank">钻石小鸟</a>
                <a http="###.chinapp.com/" target="_blank">箱包品牌</a>
                <a http="###.zhigou.com" target="_blank">网上购物</a>
                <a http="###.chinapp.com/" target="_blank">中国品牌网</a>
                <a http="###.yczihua.com/" target="_blank">国画</a>
                <a http="###.jia.com" target="_blank">齐家装修</a>
            </li>
        
            <li>
                    <a http="###.edeng.cn/" target="_blank">易登网</a>
                    <a http="###.puercn.com" target="_blank">普洱茶</a>
                    <a http="###.zol.com" target="_blank">中关村商城</a>
                    <a http="###.taoxie.com/" target="_blank">品牌鞋</a>
                    <a http="###.quanmama.com" target="_blank">乐蜂网优惠券</a>
                    <a href="###/group/" target="_blank">精选折扣</a>
                    <a http="###.paixie.net/" target="_blank">拍鞋网官网</a>
            </li>
          </ul>
  </div>
  <a href="###/about/links" class="more">更多&gt;&gt;</a>
</div>
        <p class="ft-company">武汉奇米网络科技有限公司 鄂ICP备10209250号 | ICP许可证号：鄂B1-20150109 | 食品流通许可证 SP4201991510041888&#12288;&#12288;Copyright &copy; 2010 -2016 JuanPi.com All Rights Reserved</p>
                    <div class="logo">
                <a rel="nofollow" target="_blank"
                   http="###.315online.com.cn/member/315150022.html"><img
                        border="0" src="/BBBB/project/Public/Home/Picture/r_315new.gif"></a>
                <a rel="nofollow" target="_blank"
                   href="http://ss.knet.cn/verifyseal.dll?sn=e150601420100589448w7i000000&a=1&pa=0.9669571494560153"><img
                        border="0" src="/BBBB/project/Public/Home/Picture/r_cnnic.gif" /></a>
                <a rel="nofollow" target="_blank"
                   href="http://gssoso.whhd.gov.cn:8086/soso/detail?record=1&primarykeyvalue=%E5%86%85%E9%83%A8%E5%BA%8F%E5%8F%B7%3D4201992100000000027837&channelid=20228"><img
                        border="0" src="/BBBB/project/Public/Home/Picture/r_gongshang.gif"></a>
        <a rel="nofollow" target="_blank" key ="5492626c3b05a3da0fbd05fe"  logo_size="124x47"  logo_type="realname"  http="###.anquan.org" ><script src="/BBBB/project/Public/Home/Js/aq_auth.js"></script></a>      
            </div>
            </div>
</div>
</div>
    <div id="J_sidebar" class="side_right">

        <div class="side-box">
            <ul class="side-oper">
                <li class="normal side-user">
                    <a class="links" id="J_user" target="_blank" href="<?php echo U('Home/Index/center');?>">
                        <i class="normal-icon i-user"></i>
                    </a>
                    <div id="side-login" class="tab-tips tab-login">
                        <div class="user-box">
                           <a class="head" href="//user.juanpi.com" target="_blank">
                            <div class="pic"><img src="/BBBB/project/Public/Home/Picture/default-60.jpg"></div>
                            </a>
                            <p class="txt"></p>
                        </div>
                        <i class="close">×</i>
                        <div class="arr-icon">◆</div>
                    </div>
                </li>
                <li class="normal side-cart">
                    <a class="links links-cart" id="J_cart" href="javascript:;">
                        <i class="normal-icon i-cart"></i>
                        <em class="num cartnum">0</em>
                    </a>
                    <div class="tab-tips tab-tag">
                        <div class="carttime"></div><div class="arr-icon">◆</div>
                    </div>
                    <div id="side-empty" class="tab-login" style="display:none;opacity:1;right:36px;">
                        <div class="user-box">
                            <div class="duang-pic"></div>
                            <p class="time"><em class="minutes">&nbsp;</em>分<em class="seconds">&nbsp;</em>秒后会清空购物袋商品<br>
                                要及时结算哦~</p>
                            <a href="" class="go_pay">去结算</a>
                        </div>
                        <i class="close">×</i>
                        <div class="arr-icon">◆</div>
                    </div>
                </li>
                <li class="normal side-love">
                    <a class="links" id="J_love" target="_blank" href="
                    <?php echo U('Home/Center/favorite');?>">
                        <i class="normal-icon i-love"></i>
                    </a>
                    <div class="tab-tips">我的收藏<div class="arr-icon">◆</div> </div>
                </li>
                <li class="normal side-quan">
                    <a class="links" id="J_quan" target="_blank" href="<?php echo U('Home/Center/coupon');?>">
                        <i class="normal-icon i-quan"></i>
                    </a>
                    <div class="tab-tips">我的优惠券<div class="arr-icon">◆</div> </div>
                </li>
            </ul>
            <ul class="side-oper other">
              <li class="normal side-ad" style="display:none">
            
          </li>
                <li class="normal side-complain">
                    <a class="links" id="J_complain" target="_blank" href="//user.juanpi.com/question">
                        <i class="normal-icon i-complain"></i>
                    </a>
                    <div class="tab-tips">意见反馈<div class="arr-icon">◆</div> </div>
                </li>
                <li class="normal side-code">
                    <a class="links" id="J_code" href="javascript:;">
                        <i class="normal-icon i-code"></i>
                    </a>
                    <div class="tab-tips">
                        <div class="code-box">
                            <p class="code"></p>
                            <p class="txt" style="text-align:center;font-size: 14px">随时逛 及时抢</p>
                        </div>
                        <div class="arr-icon">◆</div>
                    </div>
                </li>
                <li class="normal side-backtop">
                    <a class="links" id="J_backtop" href="javascript:;">
                        <i class="normal-icon i-backtop"></i>
                    </a>
                    <div class="tab-tips">返回顶部<div class="arr-icon">◆</div> </div>
                </li>
            </ul>
        </div>

        <div id="J-right-bag" class="bag-tool right-bag">
            <div class="sidebar-hd">
                <i class="close" id="J_cart_close">×</i>
                <span class="t">购物袋</span><span class="time carttime"></span>
            </div>
        </div>

        <div id="side-empty" class="tab-login" style="display:none;opacity:1;right:36px;">
            <div class="user-box">
                <div class="duang-pic"></div>
                <p class="time"><em class="minutes">&nbsp;</em>分<em class="seconds">&nbsp;</em>秒后会清空购物袋商品<br>
                    要及时结算哦~</p>
                <a href="" class="go_pay">去结算</a>
            </div>
            <i class="close">×</i>
            <div class="arr-icon">◆</div>
        </div>
    </div>
    <div class="tag_remind" style="display:none;">
      <p class="tips"><em icon-bag="" icon-normal="" class="icon-normal icon-clock"></em>有货啦！</p>
      <p class="txt"><em class="remindnum"></em>件商品恢复有货！赶紧抢回来吧</p>
      <p class="btn_all"><a target="_blank" href="//user.juanpi.com/favorite">马上查看</a></p>
      <a class="del" href="javascript:;">×</a>
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
        

    </script>
    </body>
</html>