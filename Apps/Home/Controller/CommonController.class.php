<?php
namespace Home\Controller;
use Think\Controller;
class CommonController extends Controller{
    //类似构造方法 率先执行的方法
    public function _initialize(){
        //用户检测
        $id = $_SESSION['user']['id'];
        //判断
        if(empty($id)){
            $this->error('您还没有登录',U('Admin/Login/index'));
        }
    
    
    }
}


?>
