var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3Fdb55e4f19d63bf355540efe831dc46ed' type='text/javascript'%3E%3C/script%3E"));

//网站流量统计，大数据分析流量数据来源 2014-11-19
function getCookie(cookieName) {
	var cookiePattern = new RegExp('(^|;)[ ]*' + cookieName + '=([^;]*)'),
    	cookieMatch = cookiePattern.exec(document.cookie);

	return cookieMatch ? cookieMatch[2] : '';
}
function getCookieFormat(cookieName) {
	var cookiePattern = new RegExp('(^|;)[ ]*' + cookieName + '=([^;]*)'),
    	cookieMatch = cookiePattern.exec(document.cookie);
		cookieValue = cookieMatch ? cookieMatch[2] : '';
	return encodeURIComponent(cookieValue);
}
function setCookie(value)
{
    name="key_url_list";
    var value_list = getCookie(name).split(",");
   
    if(value_list.length>=4){
        value_list.shift();
    }
    value_list.push(value);
    if(value_list.length>=1){
        value_str=value_list.join(",");
    }
    else{
        value_str=value_list[0];
    }
    //去掉逗号
    if (value_str.substr(0,1)==',') value_str=value_str.substr(1);
    
    var Days = 30;
    var exp = new Date(); 
    exp.setTime(exp.getTime() + Days*24*60*60*1000);
    document.cookie = name + "="+ value_str + ";expires=" + exp.toGMTString()+";domain=.juanpi.com;path=/";
}
  var _paq = _paq || [];
  //_paq.push(["setRequestMethod", 'GET']);
  _paq.push(["setCookieDomain", "*.juanpi.com"]);
  _paq.push(['trackPageView']);
  //获取当前url存入一个数组
  var url=window.location.href;
  //如果为下面类型的一种存入cookie
  if($(".top_bar").length > 0 || url.toString().indexOf('zhuanti')>0 || url.toString().indexOf('brand')>0 || url.toString().indexOf('search')>0 || url.toString().indexOf('fushi')>0 || url.toString().indexOf('muying')>0 || url.toString().indexOf('jujia')>0 || url.toString().indexOf('qita')>0 || url.toString().indexOf('yugao')>0 || url.toString().indexOf('event')>0 || url.toString().indexOf('act')>0){
    setCookie(url);
  }
  //_paq.push(['enableLinkTracking']);
  //_paq.push(["setCustomVariable", "useragent", navigator.userAgent, "visit"]);
  //var piwikTracker = Piwik.getTracker();
  //_paq.push([ function() { var qt = this.getCookie("_Qt"); }]);
  //var qt = piwikTracker.getCookie("_Qt")
  (function() {
    var u="http://d.juanpi.com/";
    _paq.push(["setTrackerUrl", u+"sermon/receiver/receive.do?ua="+navigator.userAgent
    		+"&_Qt="+getCookie("_Qt")
    		+"&s_uid="+getCookie("s_uid")
    		+"&s_name="+getCookieFormat("s_name")
    		+"&s_pic="+getCookie("s_pic")
    		+"&s_sign="+getCookie("s_sign")
    		+"&s_exp="+getCookie("s_exp")
    		+"&sid="+getCookie("sid")
    		+"&newPerson="+getCookie("newPerson")
    		+"&utm="+getCookie("curutm")
    		+"&topic=jp"
            +"&key_url_list="+getCookieFormat('key_url_list')
            +"&jpk="+getCookie("hashfollow")
    		]);
    _paq.push(["setSiteId", "1"]);
    var d=document, g=d.createElement("script"), s=d.getElementsByTagName("script")[0]; g.type="text/javascript";
    g.defer=true; g.async=true; g.src=u+"static/js/piwik.js"; s.parentNode.insertBefore(g,s);
  })();
