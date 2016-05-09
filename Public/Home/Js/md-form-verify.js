(function($){
    XDTOOL.isEmail = function(str){
        var str = XDTOOL.trim(str);
        return  /^([a-zA-Z0-9]+[\_\-\.]*)*@([a-zA-Z0-9]+[_\-_\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,4}$/.test(str);
    }
    
    XDTOOL.isTaoEmail = function(str){
        var str = XDTOOL.trim(str);
        return  /^([a-zA-Z0-9]*[\_\-\.]*)*@([a-zA-Z0-9]+[_\-_\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,4}$/.test(str);
    }
    
    XDTOOL.isPhoneNumber = function(str){
        var str = XDTOOL.trim(str);
        return /^(1(([3578][0-9])|(47)))\d{8}$/.test(str);
    }

	XDTOOL.isTelNumber = function(str){
        var str = XDTOOL.trim(str);
        return /^(\d{3,4})-\d{7,8}$/.test(str);
    }

    XDTOOL.hasFixLength = function(str, min, max){
        if (min > max) return false;

        var str_len = str.length;

        if (str_len < min || str_len > max) {
            return false;
        } else {
            return true;
        }
    }

    XDTOOL.isPostcode = function(str)
    {
        return /^\d{6}$/.test(str);
    }

    XDTOOL.isCaptchaCode = function(str)
    {
        return /^[1-9]\d{5}$/.test(str);
    }

    XDTOOL.errorStyle= function(arg, str)
    {
        if (typeof arg == 'object' && str != '') {
            var p13 = arg.siblings('p.s13');
            var span = arg.siblings('span.s13');

            var tag = null;

            if (p13.size() > 0) {
                tag = p13;
            } else if (span.size() > 0) {
                tag = span;
            }

            if (tag) {
                tag.show();
                tag.text(str);
            }

            arg.focus(function(){
                $(this).siblings('p.s13').hide();
                $(this).siblings('span.s13').hide();
            });
        } else if (typeof arg == 'function') {
            arg();
        }
    }
    
})(jQuery);
