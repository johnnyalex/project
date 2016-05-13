<?php
namespace Home\Controller;
use Think\Controller;
class CarController extends Controller {
    public function car(){
        $uid = $_SESSION['user']['id'];
        $gid = $_POST['goods_id'];
        $qty = $_POST['amount'];
       	if($_POST){
       		$ax = M('car')->where(['uid'=>$uid,'gid'=>$gid])->find();
       		if($ax){
       			M('car')->where(['uid'=>$uid,'gid'=>$gid])->data(['qty'=>$ax['qty']+$qty])->save();
       		}
       		else
       		{
	       	$arr['uid'] = $uid;
	       	$arr['gid'] = $gid;
	       	$arr['qty'] = $qty;
	       	$res = M('goods')->where(['id'=>$_POST['goods_id']])->find();
	       	$arr['name'] = $res['name'];
	       	$arr['price'] = $res['price'];
	       	M('car')->add($arr);
	       	}
       	}
       	$goods = M()->table(array('car'=>'A','goods'=>'B'))->field('A.*,B.pic,B.stock')->where('A.gid=B.id')->select();
       	foreach ($goods as $key => $value) {
       		$goods[$key]['total'] = $value['price']*$value['qty'];
       		$count = $count + $goods[$key]['total'];
       	}
       	$all = count($goods);
       	$this->assign('all',$all);
       	$this->assign('goods',$goods);
       	$this->assign('count',$count);
        $this->display();
    }

}
