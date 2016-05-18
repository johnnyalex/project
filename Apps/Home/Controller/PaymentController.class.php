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
        $old_points = M('userinfo')->field('points')->where('uid='.$uid)->find()['points'];
        if($old_points/10 >= $arr['price_total']/20)
            $use_points = ($arr['price_total']/20)*10;
        else
            $use_points = $old_points;
        $new_points = ($old_points-$use_points)+($arr['price_total']/10);
        M('userinfo')->where('uid='.$uid)->data('points='.$new_points)->save();
        $arr['status'] = 1;
        $arr['time'] = date('Y-m-d H:i:s',time());
        M('order')->create();
        $order_id = M('order')->add($arr);
        $arr = array();
        foreach ($goods as $key => $value) {
            $arr['goods_id'] = $value['gid'];
            $arr['qty'] = $value['qty'];
            $arr['order_id'] = $order_id;
            $stock = M('goods')->field('stock')->where('id='.$value['gid'])->find()['stock']-$value['qty'];
            M('goods')->where('id='.$value['gid'])->data('stock='.$stock)->save();
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