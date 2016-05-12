<?php 
namespace Home\Controller;
use Think\Controller;
class GoodsController extends Controller {
    public function goods(){
    	$this->assign('title','商品详情');
    	$this->display();
    }
    public function show(){
    	$gid = I('get.gid');
    	// dump($a);
    	$this->assign('gid',$gid);
    	$this->display();
    }
    public function like(){
    	$gid = I('get.gid');
    	dump($gid);
    	die();
    	// $this->display();
    }





}

 ?>