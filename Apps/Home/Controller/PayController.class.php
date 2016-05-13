<?php 
namespace Home\Controller;
use Think\Controller;
class PayController extends Controller {
	
    public function pay(){
    	$id = $_SESSION['user']['id'];
    	$address = M('address')->where(['uid'=>$id])->select();
    	$address_true = M('address')->where(['uid'=>$id,'pri'=>'1'])->find();
    	$this->assign('addr',$address);
    	$this->assign('addr_t',$address_true);
    	$this->display();
    }

}

 ?>