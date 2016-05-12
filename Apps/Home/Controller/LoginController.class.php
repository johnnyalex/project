<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller{
	public function index(){
		$this->display();
	}
	public function login(){
		//验证码
/*		$yzm =$_POST['yzm'];
		$Verify = new \Think\Verify();
		$result = $Verify->check($yzm);
		if (!$result) {
			$this->error('验证码错误',U('Home/Login/index'));
		}*/
		//发送查找
		$user=M('user');
		//加密
		$_POST['password']=md5($_POST['password']);
		$field=$user->create();
		$res=$user->where($field)->find();
		if ($res) {
			$_SESSION['user']['id']=$res['id'];
			$_SESSION['user']['username']=$res['username'];
			$this->success('登录成功',U('Home/Index/index'));
		}else{
			$this->error('用户名或密码错误',U('Home/Login/index'));
		}
		
	}
	public function outlogin(){
		// var_dump($_SESSION);
		unset($_SESSION['user']);
		// var_dump($_SESSION);
		// die();
		$this->success('退出成功',U('Home/Index/index'));
	}

}


?>
