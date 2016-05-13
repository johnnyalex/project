<?php
namespace Home\Controller;
use Think\Controller;
class CenterController extends Controller {
	//个人订单后台 我的卷皮
	public function index(){
		// dump($_SESSION);
		$id = $_SESSION['user']['id'];
		// 实例化
		$use=M('user');
		// 查询
		$user=$use->where(' id = '.$id)->find();
		// user的pic 存session
		$_SESSION['user']['pic']=$user['pic'];
		//实例化
		$this->assign('title','用户中心-卷皮网');
		$this->assign('user',$user);
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
		$users['day'] = substr($time,6,2)['0'] == 0 ? substr($time,7,1) : substr($time,6,2);
		$this->assign('user',$users);
		// var_dump($users);
		$this->assign('title','账户设置-卷皮网');
		$this->display();
	}
	//安全中心
	public function security(){
		$user['pic']=$_SESSION['user']['pic'];
		$this->assign('user',$user);
		$this->assign('title','安全中心-卷皮网');
		$this->display();
	}
	public function question (){
		$arr2=['您的母亲名字','您的父亲名字','您的爱人名字','您的孩子名字','您的小学名字','您的中学名字','您的大学名字','自定义问题',];
		$arr1=['您最喜欢的动物','您最喜欢的花','您最喜欢的食物','您最喜欢的地方','您最喜欢的季节','您最喜欢的颜色','你最喜欢的书','你最热爱的运动','自定义问题'];
		$arr3=['您最喜欢的歌曲','您的偶像是谁','您最喜欢的电影','您最喜欢的电视剧','您最喜欢的餐厅','您最喜欢的车','您最喜欢的周几','自定义问题',];
		// var_dump($arr);
		$user['pic']=$_SESSION['user']['pic'];
		$this->assign('user',$user);
		$this->assign('arr1',$arr1);
		$this->assign('arr2',$arr2);
		$this->assign('arr3',$arr3);
		$this->assign('title','密保问题-卷皮网');
		$this->display();
	}
	public function do_question(){
		$_POST['uid']=$_SESSION['user']['id'];
		$q=M('question');
		$aa=$q->create();
		var_dump($aa);
		// die();
		$res=$q->add();
		if ($res) 
			$this->redirect('Center/question');
		else
			$this->redirect('Center/question');

	}
	//三方绑定
	public function binding(){

		$user['pic']=$_SESSION['user']['pic'];
		$this->assign('user',$user);

		$this->assign('title','绑定网站-卷皮网');

		$this->display();
	}
	//兑现
	public function bank(){
		$user['pic']=$_SESSION['user']['pic'];
		$this->assign('user',$user);
		$this->assign('title','提现账户-卷皮网');

		$this->display();
	}
	//收货地址
	public function address(){
		$address = M('address');
		$count = $address->count();
		$id = $_SESSION['user']['id'];
		$addr = $address->where(['uid'=>$id])->select();
		foreach ($addr as $key => $value) {
			$addr[$key]['address'] = $value['pro'].' '.$value['city'].' '.$value['area'].' '.$value['addr'];
			$addr[$key]['tel'] = substr_replace($addr[$key]['tel'],'****',3,4);
		}
		$user['pic']=$_SESSION['user']['pic'];
		$this->assign('user',$user);
		$this->assign('addr',$addr);
		$this->assign('count',$count);
		$this->assign('title','收货地址-卷皮网');
		$this->display();
	}
	public function do_change_addr(){
		$id = I('get.id');
		$address = M('address');
		$res = $address->where('')->data(['pri'=>0])->save();
		$res = $address->where(['id'=>$id])->data(['pri'=>1])->save();
		if(!$res)
			echo 1;		
	}
	public function do_delete_addr(){
		$id = I('get.id');
		$address = M('address');
		$res = $address->where(['id'=>$id])->delete();
		if($res)
			echo 1;
	}
	public function add_address(){
		$this->display();
	}
	public function change_address(){
		$id = I('get.id');
		$address = M('address');
		$res = $address->where(['id'=>$id])->find();
		$res['id'] = $id;
		$this->assign('res',$res);
		$this->display();
	}
	public function do_change_address(){
		$address = M('address');
		if($_POST['pri'] == 1)
			$address->where('')->data(['pri'=>0])->save();
		if(!$_POST['pri'])
			$_POST['pri'] = 0;
		$address->create();
		$res = $address->save();
		if($res)
			$this->success('修改成功',U("Home/Center/address"));
		else
			$this->error('修改失败',U("Home/Center/address"));
	}
	public function do_add_addr(){
		$addr = M('address');
		if(I('post.pri'))
			$addr->where('pri=1')->data(['pri'=>0])->save();
		$_POST['uid'] = $_POST['id'];
		unset($_POST['id']);
		$addr->create();
		$res = $addr->add();
		if($res)
			$this->success('添加成功',U("Home/Center/address"));
		else
			$this->error('添加失败',U("Home/Center/address"));
	}
	// 个人基本信息
	// public function setting(){
		// $this->display();

	// }
	public function do_set(){
		// var_dump($_FILES);
		// var_dump($_POST);
		// die();
		$arr = array();
		// id
		$arr['uid'] = $_SESSION['user']['id'];
		//两位月
		$month = strlen($_POST['month']) == 1 ? '0'.$_POST['month'] : $_POST['month'];
		//两位日
		$day = strlen($_POST['day']) == 1 ? '0'.$_POST['day'] : $_POST['day'];
		//拼接生日
		$arr['birthday'] = $_POST['year'].$month.$day;
		//默认给回数据库的格式
		$arr['sex'] = $_POST['sex'] == '男' ? '1' : '0';
		// 实例化 userinfo 信息
		$userinfo = M('userinfo');
		//实例化 user
		$user = M('user');
        //处理图片上产
        if ($_FILES['pic']['error']==0) {
            $upload = new \Think\Upload();//实例化上传类
            $upload ->maxSize = 3145728; //上传最大值
            $upload->exts = ['jpg','gif','png','jpeg'];//图片类型
            // 手动设置网站根目录
            $upload ->rootPath = './Public';//
            $upload->savePath = '/Uploads/';//设置附件上传目录
            $info = $upload->upload();//上传文件
            if (!$info) {
                $this->error($upload->getError());
            }else{
                $str = $info['pic']['savepath'].$info['pic']['savename'];
                //写入post
                $_POST['pic'] = $str;
            }
        }
        $_POST['id']=$arr['uid'];
        // var_dump($_POST);
        //创建数据 去除非法字段
        $user->create();
        // dump($a);
        //执行添加
        $resimg = $user->save();
        // $b = $user->_sql();
        // var_dump($b);
        //获取uid
		$exit = $userinfo->where(['uid'=>$arr['uid']])->find();
		$userinfo->create();
		if($exit){
			$res = $userinfo->where(['uid'=>$arr['uid']])->save($arr);
		}else{
			$res = $userinfo->add($arr);
		}
		if($res || $resimg){

        	// echo 'success';
            $this->success('更新成功',U('Home/Center/userinfo'));
        }else{
        	// echo 'fail';
            $this->error('修改失败',U('Home/Center/userinfo'));
        }
	}
	// 所有订单
	public function allOrder(){
		$user['pic']=$_SESSION['user']['pic'];
		$this->assign('user',$user);
		$this->assign('title','订单管理-卷皮网');
		$this->display();
	}
	// 待付款订单
	public function noPayOrder(){
		$user['pic']=$_SESSION['user']['pic'];
		$this->assign('user',$user);

		$this->assign('title','订单管理-卷皮网');

		$this->display();
	}
	// 运送订单
	public function inWayOrder(){
		$user['pic']=$_SESSION['user']['pic'];
		$this->assign('user',$user);
		$this->assign('title','订单管理-卷皮网');

		$this->display();
	}
	// 我的售后
	public function backList(){
		$user['pic']=$_SESSION['user']['pic'];
		$this->assign('user',$user);

		$this->assign('title','售后管理-卷皮网');

		$this->display();
	}
	// 我的积分
	public function beans(){
		$user['pic']=$_SESSION['user']['pic'];
		$this->assign('user',$user);

		$this->assign('title','积分管理-卷皮网');

		$this->display();
	}
	// coupon 优惠券
 	public function coupon(){
 		$user['pic']=$_SESSION['user']['pic'];
 		$this->assign('user',$user);

		$this->assign('title','优惠券-卷皮网');

		$this->display();
	}
	// 修改密码
 	public function repass(){
 		$user['pic']=$_SESSION['user']['pic'];
 		$this->assign('user',$user);

		$this->assign('title','修改密码-卷皮网');

		$this->display();
	}
	// 修改邮箱
 	public function rephone(){
 		$user['pic']=$_SESSION['user']['pic'];
 		$this->assign('user',$user);

		$this->assign('title','手机绑定-卷皮网');

		$this->display();
	}
	// 修改手机号
 	public function reemail(){
 		$user['pic']=$_SESSION['user']['pic'];
 		$this->assign('user',$user);

		$this->assign('title','邮箱管理-卷皮网');
 		
		$this->display();
	}
	public function favorite(){
		$uid = $_SESSION['user']['id'];
		// 实例化
		$use=M('user');
		// 查询
		$user=$use->where(' id = '.$uid)->find();
		// user的pic 存session
		$_SESSION['user']['pic']=$user['pic'];
		// var_dump($uid);
		$info = M('userinfo');//
		$res = $info->where(['uid'=>$uid])->find();
		$arr = explode(',',$res['like_id']);//获取商品id
		$kong = array_pop($arr);
		$num = count($arr);//获取收藏数量
		$str = "'".implode("','", $arr)."'";//拼接 str
		$goods = M('goods');
		$goodslike = $goods->where(' id in ('.$str.')')->select();
		$user['pic']=$_SESSION['user']['pic'];
		$this->assign('user',$user);
		$this->assign('title','个人收藏-卷皮网');
		$this->assign('num',$num);
		$this->assign('user',$user);
		$this->assign('goodslike',$goodslike);
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

	public function check_question(){
		$id = $_SESSION['user']['id'];
		$res = M('question')->find($id);
		$this->assign('res',$res);
		$this->display();
	}

	public function do_check_question(){
		$id = $_SESSION['user']['id'];
		$res = M('question')->find($id);
		if($_POST['a1'] == $res['a1'] && $_POST['a2'] == $res['a2'] && $_POST['a3'] == $res['a3'])
			$this->success('验证成功',U('Home/Center/repass'));
		else
			$this->success('密保错误',U('Home/Center/check_question'));
	}
	

	public function do_repass(){
		if($_POST['npassword'] != $_POST['password'])
			$this->error('两次密码不一致',U('Home/Center/repass'));
		$_POST['id'] = $_SESSION['user']['id'];
		unset($_POST['npassword'],$_POST['code']);
		M('user')->create();
		$res = M('user')->save();
		if($res)
			$this->success('修改成功',U('Home/Center/userinfo'));
		else
			$this->error('修改失败',U('Home/Center/repass'));
	}
}




  ?>
