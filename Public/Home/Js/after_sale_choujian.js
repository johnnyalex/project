/**
* 弹出抽检弹窗
*
*/
var after_sale_choujian_alert = function(boid,bogid){
 var htmlMsg = '<div class="tip_1">'
    +'<div class="pink_title"></div>'
    +'<div class="choujian_title"><img src="'+__HOST_STATIC__+'/user/images/global/choujian_title.png"></div>'
    +'<p class="tip_1_p">'
    +'<span class="tip_icon"><img src="'+__HOST_STATIC__+'/user/images/global/choujian_logo1.jpg"></span>'
    +'<span class="tip_con">恭喜你当选为神秘买家</span>'
    +'</p>'
    +'</div>'
    +'<div class="tip_2_p">参加“卷皮抽检”得5元无门槛优惠券！'
    +'<a class="btn" href="http://www.juanpi.com/help/view/1851453" target=_blank  id="go_email">查看规则>></a></div>'
    +'<div class="bottom_tip"><a href="javascript:join_qc('+boid + ','+ bogid +')" class="btn get_coupon_btn">参加拿券</a><a href="javascript:not_join_qc('+boid+ ','+ bogid + ')" class="btn close_btn">不参加</a></div>'

    var c = new XDLightBox({
        title: "",
        lightBoxId: "after_sale_choujian_alert",
        contentHtml: htmlMsg,
        scroll: true,
        isBgClickClose: false
    });
    c.init();
}

var after_sale_result_alert = function(msg1,msg2,success,boid,bogid){
    var htmlMsg = '<div class="tip_1">'
        +'<p class="tip_1_p">'
        +'<span class="tip_icon"><img src="'+__HOST_STATIC__+'/user/images/global/choujian_logo1.jpg"></span>'
        +'<span class="tip_con">'+ msg1 +'</span>'
        +'</p>'
        +'<p class="tip_1_p">'
        +'<span class="tip_icon"><img src="'+__HOST_STATIC__+'/user/images/global/choujian_logo1.jpg"></span>'
        +'<span class="tip_con">' + msg2 + '</span>'
        +'</p>'
        +'</div>';
    if(success == 1) htmlMsg += '<div class="tip_2_p"><span id="onelowtimeleft">5</span>秒自动关闭</div><div class="bottom_tip"><a class="btn get_coupon_btn" href="/refund/qc_sampling?boid='+ boid +'&bogid=' + bogid +'">立即前往</a></div>';
    if(success == 2) htmlMsg += '<div class="tip_2_p"><span id="onelowtimeleft">5</span>秒自动跳转</div><div class="bottom_tip"><a class="btn get_coupon_btn" href="/refund/goods_back?giOrderId='+ bogid +'&boid='+ boid +'">立即跳转</a></div>';

    var c = new XDLightBox({
        title: "",
        lightBoxId: "after_sale_result_alert",
        contentHtml: htmlMsg,
        scroll: true,
        isBgClickClose: false
    });
    c.init();
    $('.alert_fullbg').hide();
}


var not_join_qc = function(boid,bogid){
    var params = {type: '4',boid: boid};
    $.ajax({
        url: '/refund/qc_sampling',
        type: 'post',
        data: params,
        timeout: 6E4,
        dataType: 'json',
        success: function(result) {
            $('.alert_fullbg').hide();
            $('#after_sale_choujian_alert').hide();
            after_sale_result_alert('您已放弃参加“卷皮退货抽检”','稍后按照页面提示退货给卷皮即可',2,boid,bogid);
            $('#after_sale_result_alert .alert_close').hide();
            var time = parseInt($("#onelowtimeleft").html());
            function count(){
                if( time>0 ){
                    $("#onelowtimeleft").html(time - 1);
                    time--;
                }else{
                    clearInterval(interval);
                    location.href= '/refund/goods_back?giOrderId='+bogid+'&boid='+boid;
                }
            }
            var interval = setInterval(count , 1000);
        }
    });
};
$('body').on('click','#after_sale_result_alert .close_btn',function(){
    $('#after_sale_choujian_alert').hide();
    $('.alert_fullbg').hide();
});

$('body').on('click','#after_sale_result_alert .alert_close',function(){
    $('#after_sale_choujian_alert').hide();
    $('.alert_fullbg').hide();
    location.href = location.href;
});

/*
setTimeout(function(){
        $('#after_sale_choujian_alert').hide();
        $('.alert_fullbg').hide();
    },5000);*/

var join_qc = function(boid,bogid){
    var boid = boid;
    //参与抽检
    $.ajax({
        url: '/refund/qc_sampling',
        type: 'POST',
        dataType: 'json',
        data: {type: '1',boid: boid}
    })
    .done(function(result) {
         $('.alert_fullbg').hide();
         $('#after_sale_choujian_alert').hide();
        if(result.code == 1){
            after_sale_result_alert('恭喜，您已成功报名参加“卷皮退货抽检”','稍后按照页面提示退货给卷皮即可',1,boid,bogid);
            $('#after_sale_result_alert .alert_close').hide();
            var time = parseInt($("#onelowtimeleft").html());
            function count(){
                if( time>0 ){
                    $("#onelowtimeleft").html(time - 1);
                    time--;
                }else{
                    clearInterval(interval);
                    location.href = '/refund/qc_sampling?boid=' + boid + '&bogid=' + bogid;
                }
            }
            var interval = setInterval(count , 1000);
        }else if(result.code == -2){
            after_sale_result_alert('抱歉，“卷皮退货抽检名额已满”','请按照正常流程退货',2,boid,bogid);
            $('#after_sale_result_alert .alert_close').hide();
            var time = parseInt($("#onelowtimeleft").html());
            function count(){
                if( time>0 ){
                    $("#onelowtimeleft").html(time - 1);
                    time--;
                }else{
                    location.href = '/refund/goods_back?giOrderId=' + boid;
                }
            }
            setInterval(count , 1000);
        }else{
            after_sale_result_alert('抽检失败','请求非法',0,boid,bogid);
            setTimeout(function(){location.href = location.href},5000)
        }
    });
};

$('.quit-qc').click(function(){
    var f = new XDLightBox({
               title: '是否取消抽检',
               lightBoxId: "alert_qc_cancle",
               contentHtml :
                   '<div class="alert_content"><p class="tips"><b>你确定取消卷皮抽检吗？</b></p>' +
                       '<div class="btn"><a href="javascript:;" class="quit_qc fl">返回</a><a href="javascript:;" class="confirm fr qc">取消抽检</a></div></div>',
               scroll: true
           });
    f.init();
    $(".alert_fullbg").hide();
    $('#alert_qc_cancle .quit_qc').click(function() {
        $("#alert_qc_cancle").hide();
    });
    $('#alert_qc_cancle .qc').click(function(){
        var boid = $('input[name="boid"]').val();
        var params = {'boid': boid,'type':2,'tj_wl':1};
        $('#alert_qc_cancle .alert_content').html('<div><p class="tips"><b>正在发送请求,请稍等.....</b></p></div>');
        $('#alert_qc_cancle .alert_top').html('');
        $.ajax({
            url: '',
            type: 'post',
            data: params,
            timeout: 6E4,
            dataType: 'json',
            success: function(result) {
                if(result.code == 1){
                    $('#alert_qc_cancle .alert_content').html('<div><p class="tips"><b>取消成功,请退货给卖家.</b></p><p class="tips"><i id="qc_cancel_time">3</i>秒后自动跳转</p></div>');
                    var time = parseInt($("#qc_cancel_time").html());
                    function count(){
                        if( time>0 ){
                            $("#qc_cancel_time").html(time - 1);
                            time--;
                        }else{
                            location.href = baseurl + '/goods_back?giOrderId='+boid;
                        }
                    }
                    setInterval(count , 1000);
                }else{
                    $('#alert_qc_cancle .alert_content').html('<div><p class="tips"><b>取消失败</b></p><p class="tips">3秒后自动跳转</p></div>');
                    setTimeout(function(){location.reload();},3000);
                }
            }
        });
    });
});


var user_return_goods = function(bogid,boid){
    //判断是否有抽检资格
    var params = {'boid':boid};
    $.ajax({
        url: '/refund/check_sampling_able',
        type: 'post',
        data: params,
        timeout: 6E4,
        dataType: 'json',
        success: function(result) {
            if(result.code == 1){
                after_sale_choujian_alert(boid,bogid);
            }else{
                location.href= '/refund/goods_back?giOrderId=' + bogid + '&boid='+boid;
            }
        }
    });



};
