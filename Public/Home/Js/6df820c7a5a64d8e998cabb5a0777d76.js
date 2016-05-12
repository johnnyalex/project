//关闭弹窗
function alert_colse() {
    $("#alert_robot_bg").remove();
    $("#alert_robot").remove();
}
//弹窗
function alert_robot() {
    var html = '<div id="alert_robot_bg" class="alert_fullbg"></div>' +
            '<div id="alert_robot" class="alert_bg" style="left:50%;margin-left:-240px; top: 110px; position: fixed;"' +
            '<div class="alert_box">' +
            '<div class="alert_top">' +
            '<span class="jp-alert-logo"></span>' +
            '<a href="javascript:alert_colse();" class="alert_close"></a>' +
            '</div>' +
            '<div class="alert_content">' +
            '<p class="pb30">亲，在这样一个机器人横行的年代，快来证明自己是人类吧！</p>' +
            '<a class="sub" href="http://user.juanpi.com/setting/index?type=robot">GO  !</a>' +
            '</div>' +
            '</div>' +
            '</div>';
    $("body").append(html);
}


function userrobot() {
    var params = "";
    $.getJSON('http://user.juanpi.com/Robot/robot?callback=?', params, function(json) {
        if (json.status == 1) {
            $("body").append(json.info);
        }
    }).error(function(d) {
        alert("网络错误");
    });
}


//返利页集分宝
$('#robot_cash').click(function(){
    var url='/setting/bank';
    getuserrobot(url);
});



//返利页直接提现
$('#robot_money').click(function(){
    var url='/setting/bank';
    getuserrobot(url);
});

//返利页面公用请求
function getuserrobot(url) {
    var params = "";
    $.getJSON('http://user.juanpi.com/Robot/robot?callback=?', params, function(json) {
        if (json.status == 1) {
            $("body").append(json.info);
        } else {
            location.href = url;
        }
    }).error(function(d) {
        alert("网络错误");
    });
}
