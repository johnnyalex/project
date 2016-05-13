<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $uid = $_SESSION['user']['id'];//用户id

        $goods = M('goods');//实例化商品
        $goodsList=$goods->where(['is_new'=>1])->select();//查
<<<<<<< HEAD
        $lunbo = M('lunbo');//  实例化 轮播
        $lunbos = $lunbo->where(['status'=>'1'])->select(); 
        // var_dump($lunbos);
        $lunbo_width=(count($lunbos)+1)*700;
        $this->assign('goodsList',$goodsList);
        $this->assign('uid',$uid);
        $this->assign('lunbos',$lunbos);
        $this->assign('lunbo_width',$lunbo_width);
=======
        $sql = $goods->_sql();
        // var_dump($sql);
        // var_dump($goodsList);
        // die();

        $this->assign('goodsList',$goodsList);
        $this->assign('id',$uid);
>>>>>>> 1e177447aacbab8d44bd01755f7d7a9a104723f1
        $this->assign('title','卷皮网首页');
        $this->display();
    }
    public function jifen(){
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
