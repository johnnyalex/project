<?php
namespace Home\Controller;
use Think\Controller;
class RegistController extends Controller{
	//显示
	public function index (){
		$this->display();
	}
	//提交
	public function regist(){
		$code = $_POST['code'];
		$Verify = new \Think\Verify();
		$result = $Verify->check($code);
		if (!$result) {
			$this->error('验证码错误',U('Home/Regist/index'));
		}

		$user = M('user');
		$a=$user->create();
		$a['password']=md5($a['password']);
		$res=$user->add($a);
		if ($res) {
			$_SESSION['user']['id']=$res['id'];
			$_SESSION['user']['username']=$res['username'];
			$this->success('注册成功',U('Home/Login/index'));
		}else{
			$this->error('注册失败',U('Home/Regist/index'));
		}
	}
	//验证用户名
	public function test(){
		// var_dump($_GET);
		$username=$_GET['username'];
		//实例化
		$user = M('user');
		//调用查找
		$res=$user->where(array('username'=>$username))->find();

		if ($res) {
			//不存在
			echo 0;
		}else{
			//已经有了
			echo 1;
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


?>
