// 头像上传
    (function(a){
        var lock = false;
        $('.imgupload input.smt_file').mouseover(function(){
            if (lock)  return ;
        });
        a('.imgupload input.smt_file').change(function() {
            if (! XD.Globe_Check_Login() || lock) {
                return;
            }

            if(XDTOOL.getCookie("l_sign") == ""){
                alert("请刷新重试！");return;
            }

            lock = true;

            var g = a(this);

            var upload_pic = function(msg){
                if(msg.error != ""){
                    alert(msg.error);lock = false;
                }else{
                    $.post("http://user.juanpi.com/setting/resetpic",{uid:__XD_USER__.uid,pic:msg.data.path},function(result){
                        if (result.code != 1001) {
                            alert(result.info);
                        } else {
                            picUrl = result.info;
                            //上传成功之后，显示更新后的头像
                            a(".head_b").find("img").attr("src",picUrl);
                            a(".face_out").find("img").attr("src",picUrl);
                            a(".userinfo-img").find("img").attr("src",picUrl.replace(/_100x100/, '_80x80'));
                            a(".logined-show .normal-a").find("img").attr("src",picUrl.replace(/_100x100/, '_20x20'));
                            $.getScript('http://www.jiukuaiyou.com/notice/userLoginInfo');
                        }
                        lock = false;
                    });
                }
            }
            XD.Globe_Upload(upload_pic);
            var uploadForm = g.parents(".user-info");
            //为表单添加target属性指向iframe，并提交
            uploadForm.attr("target", "iframe1");
            uploadForm.submit();
        })

        var upload_pic = function(msg){
            if(msg.error != ""){
                alert(msg.error);
                $("#defe").removeData("lock");
            }else{
                $.post("http://user.juanpi.com/setting/resetpic",{uid:__XD_USER__.uid,pic:msg.data.path},function(result){
                    if (result.code != 1001) {
                        alert(result.info);
                    } else {
                        picUrl = result.info;
                        //上传成功之后，显示更新后的头像
                        a(".head_b").find("img").attr("src",picUrl);
                        a(".face_out").find("img").attr("src",picUrl);
                        a(".userinfo-img").find("img").attr("src",picUrl.replace(/_100x100/, '_80x80'));
                        a(".logined-show .normal-a").find("img").attr("src",picUrl.replace(/_100x100/, '_20x20'));
                        $.getScript('http://www.jiukuaiyou.com/notice/userLoginInfo');
                    }
                    $("#defe").removeData("lock");
                });
            }
        }
        $(".smt_file_fake").upload({savePath:"face"},upload_pic);


    })(jQuery);