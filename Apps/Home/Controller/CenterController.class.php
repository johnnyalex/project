<?php
namespace Home\Controller;
use Think\Controller;
class CenterController extends Controller {
	//个人订单后台 我的卷皮
	public function index(){
		$this->assign('title','用户中心-卷皮网');

		$this->display();
	}
	//个人信息后台 账户设置
	public function userinfo(){
		$id = $_SESSION['user']['id'];
		$user = M('user');
		$sql = "SELECT A.*,B.sex,B.sign,B.birthday FROM user A LEFT JOIN userinfo B on A.id=B.uid WHERE A.id=".$id;
		$users = $user->query($sql)['0'];
		$time = $users['birthday'];
		$users['year'] = substr($time,0,4);
		$users['month'] = substr($time,4,2)['0'] == 0 ? substr($time,5,1) : substr($time,4,2);
		$users['day'] = substr($time,6,2)['0'] == 0 ? substr($time,5,1) : substr($time,4,2);
		$this->assign('user',$users);
		$this->assign('title','账户设置-卷皮网');

		$this->display();
	}
	//安全中心
	public function security(){
		$this->assign('title','安全中心-卷皮网');

		$this->display();
	}
	//三方绑定
	public function binding(){
		$this->assign('title','绑定网站-卷皮网');

		$this->display();
	}
	//兑现
	public function bank(){
		$this->assign('title','提现账户-卷皮网');

		$this->display();
	}
	//收货地址
	public function address(){
		$this->assign('title','收货地址-卷皮网');

		$this->display();
	}
	public function add_address(){
		$this->display();
	}
	public function do_add_addr(){
		var_dump($_POST);
		$addr = M('address');
		// $re=$m->where("userId={$id}")->data($_POST)->save();
		if(I('post.pri'))
			$addr->where('pri=1')->data(['pri'=>0])->save();
		// $_POST['addr'] = $_POST['pro'].$_POST['city'].$_POST['area']
	}
	// 个人基本信息
	// public function setting(){
		// $this->display();

	// }
	public function do_set(){
		$arr = array();
		$arr['uid'] = $_SESSION['user']['id'];
		$month = strlen($_POST['month']) == 1 ? '0'.$_POST['month'] : $_POST['month'];
		$day = strlen($_POST['day']) == 1 ? '0'.$_POST['day'] : $_POST['day'];
		$arr['birthday'] = $_POST['year'].$month.$day;
		$arr['sex'] = $_POST['sex'] == '男' ? '1' : '0';
		$userinfo = M('userinfo');
		$exit = $userinfo->where(['uid'=>$arr['uid']])->find();
		$userinfo->create();
		if($exit){
			$res = $userinfo->where(['uid'=>$arr['uid']])->save($arr);
		}else{
			$res = $userinfo->add($arr);
		}
		if($res){
            $this->success('更新成功',U('Home/Center/userinfo'));
        }else{
            $this->error('修改失败',U('Home/Center/userinfo'));
        }
	}
	// 所有订单
	public function allOrder(){
		$this->assign('title','订单管理-卷皮网');
		$this->display();
	}
	// 待付款订单
	public function noPayOrder(){
		$this->assign('title','订单管理-卷皮网');

		$this->display();
	}
	// 运送订单
	public function inWayOrder(){
		$this->assign('title','订单管理-卷皮网');

		$this->display();
	}
	// 我的售后
	public function backList(){
		$this->assign('title','售后管理-卷皮网');

		$this->display();
	}
	// 我的积分
	public function beans(){
		$this->assign('title','积分管理-卷皮网');

		$this->display();
	}
	// coupon 优惠券
 	public function coupon(){
		$this->assign('title','优惠券-卷皮网');

		$this->display();
	}
	// 修改密码
 	public function repass(){
		$this->assign('title','修改密码-卷皮网');

		$this->display();
	}
	// 修改邮箱
 	public function rephone(){
		$this->assign('title','手机绑定-卷皮网');

		$this->display();
	}
	// 修改手机号
 	public function reemail(){
		$this->assign('title','邮箱管理-卷皮网');
 		
		$this->display();
	}
	public function testMail(){
	    // sendMail('13701383017@139.com','这是一个神奇的网站','您的验证码lamp123');
	    sendMail('yetyao@sina.com','这是一个神奇的网站','点击以下链接完成注册<a href="http://yny.cn/Home/Index/index">点击完成验证</a>');
	}
	// public function verify(){
	//     var_dump($_GET);
	//     echo '完成注册';
	// }



}




  ?>
