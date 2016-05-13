<?php 
namespace Home\Controller;
use Think\Controller;
class PayController extends Controller {
	
    public function pay(){
<<<<<<< HEAD
=======
    	$id = $_SESSION['user']['id'];
    	$address = M('address')->where(['uid'=>$id])->select();
    	$address_true = M('address')->where(['uid'=>$id,'pri'=>'1'])->find();
    	$this->assign('addr',$address);
    	$this->assign('addr_t',$address_true);
>>>>>>> 458eab0b3f3d087a1c23d0dfedb6b9634395dd4a
    	$this->display();
    }

}

 ?>