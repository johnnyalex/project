(function(window, $){
    var JOA = {
        n:0,
        browser:{
            v: (function(){
                var u = navigator.userAgent, app = navigator.appVersion, p = navigator.platform;
                return {
                    ios: !!u.match(/i[^;]+;( U;)? CPU.+Mac OS X/), //ios终端
                    android: u.indexOf('Android') > -1 || (u.indexOf('Linux') > -1 && u.indexOf('UCBrowser') > -1) , //android终端或uc浏览器
                    iPhone: u.indexOf('iPhone') > -1 , //是否为iPhone或者QQHD浏览器
                    iPad: u.indexOf('iPad') > -1, //是否iPad
                    weixin: u.indexOf('MicroMessenger') > -1 //是否微信
                };
            })()
        },
        //设置应用打开地址和下载地址
        setAppInfo:{
            iosUrl : "juanpi://m.juanpi.com/", //ios应用地址
            androidUrl : "juanpi://m.juanpi.com/", //android应用地址
            download:true, //下载开关
            jump:true, //跳转唤醒开关
            downloadUrl : "http://a.app.qq.com/o/simple.jsp?pkgname=com.juanpi.ui" //应用下载地址
        },
        //使用iframe打开手机上的应用
        iframe2open:function(url){
            this.n = (new Date).getTime();
            var i = document.createElement("iframe");
            if(url!=''){
                i.src=url;
            }else{
                i.src = this.browser.v.ios ? this.setAppInfo.iosUrl : this.setAppInfo.androidUrl;
            }
            i.style.display = "none";
            document.head.appendChild(i);
        },
        //打开成功进入应用，失败就进入下载页面
        jump2download:function(){
            var t = null;
            clearTimeout(t);
            t = setTimeout(function () {
                var s = (new Date).getTime();
                if(400 >= s-JOA.n && JOA.setAppInfo.download === true){
                    location.href = JOA.setAppInfo.downloadUrl;
                }
            }, 200);
        }
    };
    var initJOA=function(){
        
        function getCookie(cookieName) {
            var cookiePattern = new RegExp('(^|;)[ ]*' + cookieName + '=([^;]*)'),
                cookieMatch = cookiePattern.exec(document.cookie);

            return cookieMatch ? cookieMatch[2] : '';
        }

        var locationHref=encodeURIComponent(location.href);
        var clientType='';
        var ajaxUrl='http://www.juanpi.com/h5';

         if(JOA.browser.v.weixin){
            clientType='weixin';
         }
         else if(!JOA.browser.v.ios &&!JOA.browser.v.android && !JOA.browser.v.iPad && !JOA.browser.v.iPhone){
            clientType='pc';
         }else{

            var is_wap=getCookie('is_wap');
            if (is_wap ==1 ){
                if(locationHref.indexOf('?')<=0){
                    locationHref += '?from_wap=1';
                }else{
                     locationHref += '&from_wap=1';
                }
            }
            clientType='wap';
         }
        var ajaxParm='curl='+locationHref+'&client='+clientType;
        var successFun=function(data){
        	if(data.type==0)
                return;
            var url='';
            if(data.url!=undefined && data.url!=''){
                url=data.url;
            }
            if(data.type==10){// pe=10打开APP，如果没有安装APP当前也跳转到下载页)
                JOA.iframe2open(url);         
                JOA.jump2download();
            }else if(data.type==11){// pe=11只打开APP，如果用户没有安装，则不作任何操作
            	
                JOA.iframe2open(url);
            }
            else {
                var target=""
                if(data.type==1){
                    target="_blank";
                }else if(data.type==2){
                    target="_self";
                }else if(data.type==3){
                    target="_parent";
                }else if(data.type==4){
                    target="_top";
                }
                window.open(data.url,target);
            }
        }
        $.ajax({
            type: "get",
            async: false,
            url: ajaxUrl,
            data: ajaxParm,
            dataType: "jsonp",
            cache:true,
            jsonpCallback:'h5joacallback',
            jsonp: "callback", //传递给请求处理程序或页面的，用以获得jsonp回调函数名的参数名(一般默认为:callback)
            success: function (data) {
                successFun(data);
            },
            error: function (e) {
                e;
            }
        });
    }
    initJOA();
    window.JOA = JOA;
})(window, $);

$(document).ready(function(){
    var clickApp=function(){
         $('[name="appVerif"]').on('click',function(){
            if(!getCookie('qm_device_id')){                                       
                if($(this).attr('landing_url')){
                    location.href = $(this).attr('landing_url');
                }else{
                    var url=$(this).attr('h5joa')+$(this).attr('jump_url');  
                    JOA.iframe2open(url);
                    JOA.jump2download();
                }               
            }else{
                location.href =  'qimi://juanpi?type=1' + '&content=' + $(this).attr('jump_url');
            }         
        })
    }
    clickApp();
})
