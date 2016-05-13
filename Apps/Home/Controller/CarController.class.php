<?php
namespace Home\Controller;
use Think\Controller;
class CarController extends Controller {
    public function car_before(){
      $uid = $_SESSION['user']['id'];
      if(!$uid)
        $this->redirect('Home/Login/index');
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
      $this->redirect('car');
    }
    public function car(){
        $uid = $_SESSION['user']['id'];
       	$goods = M()->table(array('car'=>'A','goods'=>'B'))->field('A.*,B.pic,B.stock')->where('A.gid=B.id AND A.uid='.$uid)->select();
       	foreach ($goods as $key => $value) {
       		$goods[$key]['total'] = $value['price']*$value['qty'];
       		$count = $count + $goods[$key]['total'];
       	}
       	$all = count($goods);
       	$this->assign('all',$all);
       	$this->assign('goods',$goods);
       	$this->assign('count',$count);
        $this->display('car');
    }
    public function del(){
    	$res = M('car')->delete($_GET['id']);
    }
    public function remove(){
      $id = $_SESSION['user']['id'];
      M('car')->where('uid='.$id)->delete();
    }
    public function sql_jian(){
      $id = I('get.id');
      $uid = $_SESSION['user']['id'];
      $sql = "UPDATE car SET qty=qty-1 WHERE id=".$id." AND uid=".$uid;
      M()->query($sql);
    }
    public function sql_jia(){
      $id = I('get.id');
      $uid = $_SESSION['user']['id'];
      $sql = "UPDATE car SET qty=qty+1 WHERE id=".$id." AND uid=".$uid;
      M()->query($sql);
    }
}
