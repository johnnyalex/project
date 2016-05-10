<?php 
namespace Home\Controller;
use Think\Controller;
class GoodsController extends Controller {
    public function goods(){
    	
    	$this->assign('title','商品详情');
    	$this->display();
    }





}

 ?>