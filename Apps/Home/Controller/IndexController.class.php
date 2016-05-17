<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $uid = $_SESSION['user']['id'];//用户id
        $goods = M('goods');//实例化商品
        $goodsAll=$goods->where(['status'=>1])->select();//查
        $lunbo = M('lunbo');//  实例化 轮播
        $lunbos = $lunbo->where(['status'=>'1'])->select(); 
        $lunbo_width=(count($lunbos)+1)*700;
        $brand = M('brand');// 品牌
        $brand_2 = $brand->where(['status'=>'1','level'=>'2'])->select();
        $brand_3 = $brand->where(['status'=>'1','level'=>'3'])->find();
        $brand_4 = $brand->where(['status'=>'1','level'=>'4'])->select();
        $brand_1 = $brand->where(['status'=>'1','level'=>'1'])->select();
        $register = M('userinfo')->field('register')->where('uid='.$uid)->find()['register'];
        if($register == date('Y-m-d'))
            $this->assign('register','今日已签到');
        else
            $this->assign('register','签到领积分');
        $num = 12;//每页显示的个数
        $count = count($goodsAll);//统计总商品数
        $Page = new \Think\Page($count,$num);//实例化分页 
        $limit = $Page->firstRow.','.$Page->listRows;//获取limit
        $pages = $Page->show();//分页显示输出
        $goodsList = $goods->where(['status'=>1])->limit($limit)->select();
        $this->assign('goodsList',$goodsList);
        $this->assign('uid',$uid);
        $this->assign('lunbos',$lunbos);
        $this->assign('brand_2',$brand_2);
        $this->assign('brand_3',$brand_3);
        $this->assign('brand_4',$brand_4);
        $this->assign('brand_1',$brand_1);
        $this->assign('categorys',$categorys);
        $this->assign('lunbo_width',$lunbo_width);
        $this->assign('pages',$pages);
        $this->assign('title','卷皮网首页');
        $this->display();
    }
    public function more(){
        $cate_id = I('get.cid');
        $good = M('goods');
        $goods = $good->where(['cate_id'=>$cate_id])->select();
        $this->assign('title','分类详情');
        // var_dump($goods);
        $this->assign('goods',$goods);
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
    public function regist_do(){
        $uid = $_SESSION['user']['id'];
        $date = date('Y-m-d');
        $sql = "UPDATE userinfo SET register='".$date."' WHERE uid=".$uid;
        M('userinfo')->query($sql);
        $sql = "UPDATE userinfo SET points=points+1 WHERE uid=".$uid;
        M('userinfo')->query($sql);
    }
}
