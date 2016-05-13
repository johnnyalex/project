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
        $goods = M('goods')->find($gid);
        $goods_images = M('image')->where('goods_id='.$gid)->limit(5)->select();
    	$this->assign('gid',$gid);
        $this->assign('goods',$goods);
        $this->assign('goods_images',$goods_images);
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