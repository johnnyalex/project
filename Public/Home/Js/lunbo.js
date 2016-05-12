//定义全局变量
          var i = 0;
          //无缝第一步 克隆第一张图片
          var cloneimg = $('.banner .img1 li').first().clone();
          //插入进去 克隆第二步
          $('.banner .img1').append(cloneimg);
          //获取图片的个数
          var length = $('.banner .img1 li').length;
          // console.log(length);

          // 启动定时器
          var inte = setInterval(moveR,3000);
          //鼠标悬停事件
          $('.banner').hover(function(){
            //鼠标移入以后 清除定时器
            clearInterval(inte);
          },function(){
            //启动轮播
            inte = setInterval(moveR,3000);
          })

          //给小圆点绑定鼠标滑入事件
          $('.banner .num li').hover(function(){
            //获取当前小圆点的索引
            var index = $(this).index();
            i = index;
            //计算新left
            newLeft = i*700;
            //设置样式
            $('.banner .img1').animate({left:-newLeft+'px'},500);
            //在方法中移动园点 class="on"
            $('.banner .num li').eq(i).addClass('on').siblings().removeClass();
          })

          // 绑定向右移动事件
          $('.btn_r').click(function(){
            moveR();
          })
          // 绑定向左移动事件
          $('.btn_l').click(function(){
            moveL();
          })
          // 封装向右移动的方法
          function moveR(){
            i++;
            //检测越界
            if(i == length){
              // i = 0;//不能等于0 无缝第三步
              $('.banner .img1').css({left:0});
              //把i改成1
              i = 1;
            }
            //计算新left
            newLeft = i*700;
            //修复bug
            if(i == length-1){
              $('.banner .num li').eq(0).addClass('on').siblings().removeClass();
            }else{
              $('.banner .num li').eq(i).addClass('on').siblings().removeClass();
            }
            //设置样式 //stop是为了运行更流畅
            $('.banner .img1').stop().animate({left:-newLeft+'px'},500);
            //在方法中移动园点 class="on"
          }
          // 封装向左移动的方法
          function moveL(){
            i--;
            //检测越界
            if(i == -1){
              // i = length-1;
              //第四步
              $('.banner .img1').css({left:-(length-1)*700});
              i = length-2;
            }
            //计算新left
            newLeft = i*700;
            //设置样式
            $('.banner .img1').stop().animate({left:-newLeft+'px'},500);
            //在方法中移动园点 class="on"
            $('.banner .num li').eq(i).addClass('on').siblings().removeClass();
          }

