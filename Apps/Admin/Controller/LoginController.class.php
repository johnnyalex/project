<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
    //显示
    public function index(){
        // var_dump($_SESSION);
        //解析模板
        $this->display();
    }
    public function outlogin(){
        unset($_SESSION['uid']);
        $this->display('index');
    }
    //验证用户信息
    public function dologin(){
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $yzm = $_POST['yzm'];
        $Verify = new \Think\Verify();
        $result = $Verify->check($yzm);
        if (!$result)$this->error('验证码错误');
        $admin=M('admin');
        $res=$admin->where(['username'=>$username,'password'=>$password])->find();
        if (!empty($res)) {
            $_SESSION['uid']=$res['id'];
            $_SESSION['count'] = true;
            $this->success('登录成功',U('Admin/Index/index'));
        }else{
            $this->error('用户名或密码错误,登录失败',U('Admin/Login/index'));
        }
    }
    public function yzm(){
        $config = array(
            'fontSize'    =>    14,    // 验证码字体大小    
            'length'      =>    4,     // 验证码位数    
            'useNoise'    =>    false, // 关闭验证码杂点
        );
        $Verify = new \Think\Verify($config);
        $Verify->entry();
    }
}
