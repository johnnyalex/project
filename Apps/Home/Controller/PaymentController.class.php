<?php 
namespace Home\Controller;
use Think\Controller;
class PaymentController extends Controller {
	
    public function payment(){
        $arr['uid'] = $_SESSION['user']['id'];
        $uid = $arr['uid'];
        if(!$_POST['addrnum'])
            $arr['address_id'] = M('address')->field('id')->where('pri=1')->find()['id'];
        else
            $arr['address_id'] = I('post.addrnum');
        $arr['order_num'] = date('Ymdhis').mt_rand(0,9999);
        $goods = M('car')->where('uid='.$arr['uid'])->select();
        foreach ($goods as $key => $value) {
            $arr['price_total'] = $arr['price_total'] + $value['price']*$value['qty'];
        }
        $o_points = M('userinfo')->field('points')->where('uid='.$uid)->find()['points'];
        $t_points = $o_points/10;
        var_dump($o_points);
        if($o_points >= $arr['price_total']/10)
            $t_points = $arr['price_total']/10*9;
        else
            $t_points = $arr['price_total']-$t_points;
        $n_points = $o_points - ($t_points*10);
        $jian = $arr['price_total'] - $t_points;
        $jia = $arr['price_total']/10;
        var_dump($t_points);
        var_dump($jian);
        var_dump($jia);
        $arr['price_true'] = $t_points;
        $arr['status'] = 1;
        $arr['time'] = date('Y-m-d H:i:s',time());
        M('order')->create();
        $order_id = M('order')->add($arr);
        $arr = array();
        foreach ($goods as $key => $value) {
            $arr['goods_id'] = $value['gid'];
            $arr['qty'] = $value['qty'];
            $arr['order_id'] = $order_id;
            M('order_goods')->create();
            M('order_goods')->add($arr);
        }
        M('car')->where('uid='.$uid)->delete();
        $this->assign('id',$order_id);
        $this->display();
    }

    public function dopay(){
        $_POST['status'] = 2;
        M('order')->create();
        $res = M('order')->save();
        if($res)
            $this->success('付款成功',U('Home/Center/allOrder'));
        else
            $this->success('付款失败',U('Home/Center/allOrder'));
    }

}

 ?>