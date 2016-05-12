<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html class="jp-pc">
    <head>
        <title>订单确认 - 卷皮网</title>
        <meta name="keywords" content="卷皮折扣,独家,超值,品牌折扣,卷皮网">
        <meta name="description" content="卷皮网-专注独家折扣，汇聚全网最优质商品及促销活动，每日千款超值商品低至1折限量秒杀，天天更新，件件超值。商城优品超值买，优质大牌低价购，享折扣更享品质。">
        <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
        <link type="text/css" rel="stylesheet" href="/BBBB/project/Public/Home/Css/8d0e0542ec8c470c9d987827dbb2ba8e.css"/>
        <link type="text/css" rel="stylesheet" href="/BBBB/project/Public/Home/Css/9608499ebc734f95bbc5e9732e1a9410.css"/>

    </head>
    <body>
        
<!-- 页头 -->
            
<div id="toolbar">
  <div class="bar-con">
      <div class="other_links fl"><a href="http://www.juanpi.com">卷皮首页</a></div>
    <div class="right-show fr">
      <div class="union-login"> <a href="" rel="nofollow">QQ登录</a><a href="" rel="nofollow">微博登录</a>　| </div>
      <div class="login-show"><a href="" rel="nofollow">登录</a><a href="" rel="nofollow">免费注册</a>　|</div>
      <div class="other-show"><a href="" rel="nofollow">联系客服</a><a href="" rel="nofollow">卖家报名</a></div>
    </div>
 </div>
</div>


<!--head start-->
<div class="header header_shop">
    <div class="area">
        <div class="logo shopping shopping-step2">
            <div class="fl"><a class="juan-logo fl" href="javascript:;" title="卷皮购物袋">卷皮购物袋</a><span class="juan-txt fl"></span></div>
        </div>
        <div class="step-box step-box-short">
            <i class="flow-steps steps_2"></i>
            <ul>
            <li class="cur">购物袋</li>
            <li class="cur">确认订单</li>
            <li>支付完成</li>
            </ul>
        </div>
    </div>
</div>
<!--head end-->
<script type="text/javascript" src="/BBBB/project/Public/Home/Js/jp.header.js" id="cart_only_id"></script>

<!-- /页头 -->
        
<!-- 主体 -->
<div class="main pr mt20 clear">
<div class="confirm-order">
<!-- 收货信息 -->
<div class="order-address clear">
        <input type="hidden" value="5" name="addrnum">
    <h2><span class="fl">选择收货地址</span><a style="display:none" href="javascript:void(0)" class="manage_links write_links fl"><i class="icons icons-tips fl"></i><span class="fl">请填写收货地址</span></a></h2>
    <ul data-flag="confirm" id="myAddress" class="list">
    <li class="cur"><input type="radio" style="display:none" townid="310108" cityid="310100" provinceid="310000" primary="1" value="835346" tel="" class="area-radio check" name="area"><div class="fl"><div class="slice-border"><div class="area-sumary"><em class="icons icons-user fl"></em><span class="area-name name">姚宁元</span>收</div></div><div class="mb10"><em class="icons icons-address fl"></em><span class="area-address street"><i class="province">上海市 闸北区</i> <i class="jp_addr_street">少年村路415弄96号。梅奥菲斯公寓 2527室</i></span> <span class="area-postcode"></span></div><div><em class="icons icons-phone fl"></em><span class="area-mobile phone">185****8785</span><a class="addr-edit modify" href="javascript:void(0);">修改</a></div></div><div class="slt-icon"></div><div class="addr-primary">[默认地址]</div><div class="default-add">默认地址</div><div class="slt-icon"></div></li><li class=""><input type="radio" style="display:none" townid="310117" cityid="310100" provinceid="310000" primary="0" value="282395" tel="021-57715030" class="area-radio check" name="area"><div class="fl"><div class="slice-border"><div class="area-sumary"><em class="icons icons-user fl"></em><span class="area-name name">姚宁元</span>收</div></div><div class="mb10"><em class="icons icons-address fl"></em><span class="area-address street"><i class="province">上海市 松江区</i> <i class="jp_addr_street">九亭镇沪松公路1399弄69号817（九号公馆）</i></span> <span class="area-postcode">201601</span></div><div><em class="icons icons-phone fl"></em><span class="area-mobile phone">185****8785</span><a class="addr-edit modify" href="javascript:void(0);">修改</a></div></div><div class="slt-icon"></div><div class="addr-primary" style="display: none;">设置默认</div></li><li class="add"><a class="add" href="javascript:;"><em class="icons icons-add"></em>新增地址</a></li></ul>
    <div uadid="0" style="display: none;" id="addrform" class="new-address">
        <div class="panel-box" style="">
            <div class="adr" id="adr">
                <ul>
                    <li>
                        <label><!-- <span class="import">*</span> -->收货人：</label>
                        <input type="text" class="text w195" value="" name="name" id="truename" size="16" maxlength="16" tabindex="1">
                        <p style="display:none;" class="s13"></p>
                        <p class="s12">只包含汉字、数字和字母,长度不超过16个字</p>
                    </li>
                    <li>
                        <label><!-- <span class="import">*</span> -->手机号码：</label>
                        <input type="text" value="" name="mobile" id="mobile" size="11" maxlength="11" tabindex="2" class="text w195">
                        <p style="display:none;" class="s13"></p>
                    </li>
                    <li>
                        <label> <!-- <span class="import">*</span> -->所在地区：</label>
                        <select class="w200" name="province" id="province" tabindex="3"><option value="0">选择省份</option><option value="110000">北京市</option><option value="120000">天津市</option><option value="130000">河北省</option><option value="140000">山西省</option><option value="150000">内蒙古自治区</option><option value="210000">辽宁省</option><option value="220000">吉林省</option><option value="230000">黑龙江省</option><option value="310000">上海市</option><option value="320000">江苏省</option><option value="330000">浙江省</option><option value="340000">安徽省</option><option value="350000">福建省</option><option value="360000">江西省</option><option value="370000">山东省</option><option value="410000">河南省</option><option value="420000">湖北省</option><option value="430000">湖南省</option><option value="440000">广东省</option><option value="450000">广西壮族自治区</option><option value="460000">海南省</option><option value="500000">重庆市</option><option value="510000">四川省</option><option value="520000">贵州省</option><option value="530000">云南省</option><option value="540000">西藏自治区</option><option value="610000">陕西省</option><option value="620000">甘肃省</option><option value="630000">青海省</option><option value="640000">宁夏回族自治区</option><option value="650000">新疆维吾尔自治区</option></select>
                        <select class="w200" name="city" id="city" tabindex="4"><option value="0">选择城市</option></select>
                        <select class="w200" name="town" id="town" tabindex="5"><option value="0">选择区域</option></select>
                        <p style="display:none;" class="s13"></p>
                    </li>
                    <li>
                        <label> <!-- <span class="import">*</span> -->街道地址：</label>
                        <input type="text" value="" name="addr" id="addr" size="40" maxlength="40" tabindex="6" class="text addr-long">
                        <p style="display:none;" class="s13"></p>
                        <!-- <p class="s12">请填写详细地址信息</p> -->
                    </li>
                    <li style="display:none">
                        <label>座机号码：</label>
                        <input type="text" value="" name="tel" id="tel" size="30" maxlength="30" tabindex="7" class="text">
                        <p style="display:none;" class="s13"></p>
                        <p class="s12">027-xxxxxxx</p>
                    </li>
                    <!-- <li>
                        <label>邮编：</label>
                        <input type="text" class="text" tabindex="6" maxlength="6" size="30" id="postcode" name="postcode" value="">
                    </li> -->
                    <li>
                        <label></label>
                        <input type="checkbox" value="1" id="J_SetDefault" name="primary" class="set-check">
                        <label for="J_SetDefault" class="set">设置为默认收货地址</label>
                    </li>
                    <li>
                        <label></label>
                        <input type="hidden" value="" name="addr_token" id="addr_token">
                        <input type="button" class="smt smt1 baocun" value="保 存" tabindex="8">
                        <input type="button" class="smt smt2 quxiao" value="取 消" tabindex="9">
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="order-payment">
    <!--选择支付方式-->
    <h2>选择支付方式</h2>
    <div class="pay-method">
        <ul>
                                    <li>
                        <a class="fl" href="javascript:;"><label>
                            <input type="radio" checked="" data-type="支付宝支付" class="check" name="choose_pay" value="2" autocomplete="off">
                            <p class="img"><img src="/BBBB/project/Public/Home/Images/Alipay.jpg"></p>
                        </label></a>
                        <span style="color:#f36; line-height: 42px;margin-left: 5px" class="fl"></span>
                    </li>
                                    <li>
                        <a class="fl" href="javascript:;"><label>
                            <input type="radio" data-type="微信支付" class="check" name="choose_pay" value="9" autocomplete="off">
                            <p class="img"><img src="/BBBB/project/Public/Home/Images/weixin.jpg"></p>
                        </label></a>
                        <span style="color:#f36; line-height: 42px;margin-left: 5px" class="fl">（推荐）</span>
                    </li>
                                    <li>
                        <a class="fl" href="javascript:;"><label>
                            <input type="radio" data-type="银联支付" class="check" name="choose_pay" value="3" autocomplete="off">
                            <p class="img"><img src="/BBBB/project/Public/Home/Images/yinlian.jpg"></p>
                        </label></a>
                        <span style="color:#f36; line-height: 42px;margin-left: 5px" class="fl"></span>
                    </li>
                        </ul>
    </div>
</div>

<!-- 确认商品订单信息 -->
<div class="order-goods">
    <h2><span class="fl">确认订单信息</span><a href="https://cart.juanpi.com" class="go_back fr">&lt;&lt;返回购物袋修改</a></h2>
    <div class="orders clear">
        <div class="orders-hd">
            <ul>
                <li data-goodsnums="1" class="product-item"><span>共（1）件商品</span></li>
                <li class="price-item"><span class="text">规格</span></li>
                <li class="quantity-item"><span class="text">单价</span></li>
                <li class="subtotal-item"><span class="text">数量</span></li>
                <li class="actions-item"><span class="text">小计</span></li>
            </ul>
        </div>

                    <div class="order-list other-list">
                <div class="table-box"><span class="name">店铺：</span><span>博来美居日用专营店</span></div>
                <div class="orders-bd">
                    <table class="tbl-main">
                        <tbody>
                            <tr data-goodid="23202797" data-undeliveryarea="" class="posttr no mz_padding1" ispost="0">
                                <td class="product-item">
                                    <div class="pic"><a target="_blank" href="http://shop.juanpi.com/deal/9469150"><img d-src="//s2.juancdn.com/bao/151215/c/9/566fc1e892be59c8878b457b_800x800.jpg?iopcmd=thumbnail&amp;type=8&amp;width=60&amp;height=60%7Ciopcmd=convert&amp;Q=88&amp;dst=jpg" class="lazy" src="//s2.juancdn.com/bao/151215/c/9/566fc1e892be59c8878b457b_800x800.jpg?iopcmd=thumbnail&amp;type=8&amp;width=60&amp;height=60%7Ciopcmd=convert&amp;Q=88&amp;dst=jpg" style="display: inline;"></a></div>
                                    <div class="detail">
                                        <div class="title"><a target="_blank" href="http://shop.juanpi.com/deal/9469150">大容量超轻防水收纳包</a></div>
                                    </div>
                                </td>
                                <td class="price-item cell-center">
                                    <p class="type">
                                        <span class="color">藏青色</span> 
                                    </p>
                                </td>
                                <td class="quantity-item cell-center">
                                    <p class="price"><em class="u-yen">¥</em><span>15.90</span></p>
                                    <p style="display: none" class="oprice"><em class="u-yen">¥</em><span>218.00</span></p>
                                </td>
                                <td class="subtotal-item cell-center">
                                    <p class="number">1</p>
                                </td>
                                <td class="actions-item cell-center">
                                    <p class="count"><em class="u-yen">¥</em><span>15.90</span></p>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="4" class="bgc">
                                <div class="message"><label class="hd">留言：</label>
                                    <div class="inputmask"><textarea title="选填：对本次交易的补充说明，最多不超过50字" name="u_note[1127444]" data-sellerid="1127444" id="u_note" data-maxlength="50" class="txt" autocomplete="off" placeholder="选填：对本次交易的补充说明，最多不超过50字"></textarea>
                                    </div></div>
                            </td>
                            <td class="bgc" colspan="2">
                                <p><span>合计：</span><span class="fr postage"><em class="u-yen">¥</em><i>15.90</i></span></p>
                            </td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            </div>
</div>

<div class="m-orders-box">
    <div class="m-orders-detail clear">
        <div class="site fl">
            <div class="re_address">
                <label class="fl">收货信息：</label><span class="fl">上海市 闸北区 少年村路415弄96号。梅奥菲斯公寓 2527室<br>姚宁元 185****8785</span>
            </div>
        </div>
        <div class="other fr">
            <div class="detail">
                <p><label>商品金额：</label><span class="normal"> <em class="u-yen">¥</em><span class="confirm_order_spje">15.90</span></span></p>
                <p><label>合计运费：</label><span class="normal"> <em class="u-yen">¥</em><span class="confirm_order_yun">0.00</span></span></p>
                <p><label>活动优惠：</label><span class="normal">-<em class="u-yen">¥</em><span class="confirm_order_hdyh">0.00</span></span></p>
                <p><label>优惠券抵扣：</label><span class="normal">-<em class="u-yen">¥</em><span class="confirm_order_liquan">0.00</span></span></p>
            </div>
            <div class="pay-all">
                <span class="wait_pay"><b>待支付：</b><span><em>￥</em><label class="confirm_order_waitpay">15.90</label></span></span>
            </div>
            <em class="line-cur cur-top"></em>
            <em class="line-cur cur-bottom"></em>
        </div>
    </div>
</div>
<form target="_blank" method="post" action="//user.juanpi.com/pay/action_order" id="payFormNew" name="payFormNew" accept-charset="UTF-8">
    <input type="hidden" value="" name="orderPay">
    <input type="hidden" value="" name="token">
    <input type="hidden" value="2" name="paytype">
</form>
<form method="post" action="//user.juanpi.com/pay/create_order" id="post_order" name="post_order" accept-charset="UTF-8">
    <input type="hidden" value="" name="token" id="token">
    <!--邮费-->
    <input type="hidden" value="0.00" name="postage" id="postage">
    <!--购买方式-->
    <input type="hidden" value="2" name="pay_type" id="pay_type">
    <!--总价-->
    <input type="hidden" value="15.90" name="cprice" id="cprice">
    <input type="hidden" value="15.90" name="pay_amount" id="pay_amount">
    <!--用户收获地址-->
    <input type="hidden" value="835346" name="address_id" id="address_id" data-address_id="835346">
    <!--优惠券激活码-->
    <input type="hidden" value="" name="coupon_code" id="coupon_code">
    <input type="hidden" value="" name="actids" id="actids">
    <input type="hidden" value="" name="order_no" id="order_no">
</form>
<input type="hidden" value="0" name="coupon_amount" id="coupon_amount">
</div>
<div class="orders-pay-fixed">
    <div class="orders-total-pay">
        <div class="pay-type fl">
            <p> 支付方式：<label id="ck">支付宝支付</label></p>
        </div>
        <a class="go_pay fr" href="javascript:;">
            <span class="go_pay_text">确认并支付</span>
                <span class="t_box open" style="display:none;">
                    <span></span> <em></em>
                </span>
        </a>
        <p data-curtime="1463022000" data-time="1463023189" id="counDown" class="fr tips">
            请在 <em id="countm">08</em><span class="org_1">分</span><em id="counts">36</em><span class="org_1">秒</span>内提交订单，下单后您会另有<em>30</em>分钟的支付时间
        </p>
        <em class="pay-bg bg_l"></em>
        <em class="pay-bg bg_r"></em>
    </div>
</div>
</div>
<!-- /主体 -->     
            <!-- 页脚 -->
            <div class="foot">
    <div class="white_bg">
    <div class="foot-con">
        <div class="con-box-n clear">
            <div class="app-side-box fl">
                <p class="app-show"></p>
                <p class="app-txt">扫描二维码下载</p>
            </div>
            <div class="con-left-info fl">
                <dl class="update">
                    <dt>获取更新</dt>
                    <dd><a href="http://www.juanpi.com/apps" target="_blank"><i></i>iPhone/Android</a></dd>
                    <dd><a href="http://user.qzone.qq.com/474171717" target="_blank"><i></i>卷皮QQ空间</a></dd>
                    <dd><a href="http://weibo.com/juanpicom" target="_blank"><i></i>卷皮新浪微博</a></dd>
                    <dd><a href="http://www.juanpi.com/about/api" target="_blank"><i></i>开放API</a></dd>
                </dl>
                <dl class="cooperation">
                    <dt>商务合作</dt>
                    <dd><a href="https://seller.juanpi.com/choice" target="_blank"><i></i>卖家免费报名</a></dd>
                    <dd><a href="http://www.juanpi.com/about/partner" target="_blank"><i></i>商务合作</a></dd>
                    <dd><a onclick="if (window.confirm('本邮箱仅接收合作商家对卷皮员工违规行为的举报。不接受用户咨询、投诉或商务合作申请。')) { window.location = 'mailto:' + 'moc.ipnauj@gnehznail'.split('').reverse().join(''); }" href="javascript:void(0)"><i></i>廉政邮箱<br><span class="revEmail">lianzheng@juanpi.com</span></a></dd>
                </dl>
                <dl class="cor-info">
                    <dt>公司信息</dt>
                    <dd><a href="http://www.juanpi.com/about/juanpi" target="_blank"><i></i>关于卷皮</a></dd>
                    <dd><a href="http://www.juanpi.com/about/media" target="_blank"><i></i>媒体报道</a></dd>
                    <dd class="school"><a href="http://www.juanpi.com/about/job" target="_blank"><i></i>诚聘英才</a><a href="http://www.juanpi.com/about/job_2015campus" target="_blank"><em></em></a></dd>
                    <dd><a href="http://www.juanpi.com/event/xiaoyuan_zhaomu" target="_blank"><i></i>校园大使招募</a></dd>
                </dl>
                <dl class="help-info">
                    <dt>帮助中心</dt>
                    <dd><a href="http://www.juanpi.com/help" target="_blank"><i></i>新手上路</a></dd>
                    <!-- <dd><a href="http://www.juanpi.com/help/qianggou" target="_blank"><i></i>抢购小技巧</a></dd> -->
                    <dd><a href="http://www.juanpi.com/jifen/task" target="_blank"><i></i>积分攻略</a></dd>
                    <dd><a href="http://www.juanpi.com/about/map" target="_blank"><i></i>网站地图</a></dd>
                </dl>
            </div>
            <div class="con-menu fr">
                <a href="http://www.juanpi.com/about/service" class="service-add fl" target="_blank" rel="nofollow"></a>
            <span class="service-time fl">
                <p>周一至周日</p>
                <p>9:00-21:00 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
            </span>
            </div>
        </div>
        <p class="ft-company"><a href="http://www.juanpi.com" target="_blank">武汉奇米网络科技有限公司</a> 鄂ICP备10209250号 | ICP许可证号：鄂B1-20150109 | 食品流通许可证 SP4201991510041888&#12288;&#12288;Copyright &copy; 2010 - 2016 JuanPi.com All Rights Reserved</p>
            </div>
</div>
<div class="tag_remind" style="display:none;">
  <p class="tips"><em icon-bag="" icon-normal="" class="icon-normal icon-clock"></em>有货啦！</p>
  <p class="txt"><em class="remindnum"></em>件商品恢复有货！赶紧抢回来吧</p>
  <p class="btn_all"><a target="_blank" href="//user.juanpi.com/favorite">马上查看</a></p>
  <a class="del" href="javascript:;">×</a>
</div>

    </body>
</html>