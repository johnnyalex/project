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
        $arr['price_true'] = $arr['price_total'];
        $arr['status'] = 0;
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
    }

}

 ?>