<?php 
namespace Home\Controller;
use Think\Controller;
class PayController extends Controller {
	
    public function pay(){
    	$id = $_SESSION['user']['id'];
    	$address = M('address')->where(['uid'=>$id])->select();
    	$address_true = M('address')->where(['uid'=>$id,'pri'=>'1'])->find();
        $goods = M('car')->where(['uid'=>$id])->select();
        foreach ($goods as $key => $value) {
            $goods[$key]['count'] = $value['qty']*$value['price'];
            $goods[$key]['pic'] = M('goods')->field('pic')->where('id='.$value['gid'])->find()['pic'];
            $total = $total + $value['qty']*$value['price'];
        }
        $points = M('userinfo')->field('points')->where('uid='.$id)->find()['points']/10;
        if($points >= $total/10)
            $points = $total/10;
        $ttp = $total-$points;
        $count = count($goods);
        $this->assign('pts',$points);
    	$this->assign('addr',$address);
    	$this->assign('addr_t',$address_true);
        $this->assign('goods',$goods);
        $this->assign('count',$count);
        $this->assign('total',$total);
        $this->assign('ttp',$ttp);
    	$this->display();
    }

}

 ?>