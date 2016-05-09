<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $id = $_SESSION['user']['id'];
        // $user=M('user');
        // $res=$user->find($id);
        $this->assign('id',$id);
        $this->assign('title','卷皮网首页');
        $this->display();
    }
    public function dologin(){
    	$username = $_POST['username'];
    	$password = $_POST['password'];
    	$yzm = $_POST['yzm'];
    	$Verify = new \Think\Verify();
    	$result = $Verify->check($yzm);
    	if (!$result)$this->error('验证码错误');
    	// die;
    	$admin=M('admin');
    	$res=$admin->where(['username'=>$username,'password'=>$password])->find();

    	if (!empty($res)) {
    		$_SESSION['admin']['id']=$res['id'];
    		$this->success('登录成功',U('Admin/Index/index'));
    		
    	}else{
    		$this->success('用户名或密码错误,登录失败',U('Admin/Index/login'));
    	}
    }
    public function center(){
        $id=$_SESSION['user']['id'];
        if (!empty($id)) {
            $this->redirect('Home/Center/index');
        }else{
            $this->redirect('Home/Login/index');
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
