<?php 
namespace Home\Controller;
use Think\Controller;
class PayController extends Controller {
	
    public function pay(){
    	$id = $_SESSION['user']['id'];
    	$address = M('address')->where(['uid'=>$id])->select();
    	$address_true = M('address')->where(['uid'=>$id,'pri'=>'1'])->find();
<<<<<<< HEAD
    	$this->assign('addr',$address);
    	$this->assign('addr_t',$address_true);
=======
        $goods = M('car')->where(['uid'=>$id])->select();
        foreach ($goods as $key => $value) {
            $goods[$key]['count'] = $value['qty']*$value['price'];
            $goods[$key]['pic'] = M('goods')->field('pic')->where('id='.$value['gid'])->find()['pic'];
            $total = $total + $value['qty']*$value['price'];
        }
        $count = count($goods);
    	$this->assign('addr',$address);
    	$this->assign('addr_t',$address_true);
        $this->assign('goods',$goods);
        $this->assign('count',$count);
        $this->assign('total',$total);
>>>>>>> 1e177447aacbab8d44bd01755f7d7a9a104723f1
    	$this->display();
    }

}

 ?>