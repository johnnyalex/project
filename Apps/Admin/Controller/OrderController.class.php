<?php 
namespace Admin\Controller;
use Think\Controller;
class OrderController extends Controller {

    public function index(){
        $order_list = M()->table(array('order'=>'A','user'=>'B'))->field('A.*,B.username')->where('A.uid=B.id')->select();
        var_dump($order_list);
        $this->assign('order_sel',$order_list);
        $this->display();
    }
//删除商品
  public function delete(){
    $id = I('get.id');
    // var_dump($id);
    $orders = M('order');
    $res =  $orders->delete($id);
    if($res)
    echo 1;
  }  

//订单修改
    public function edit(){
        // var_dump(I('get.id'));
        $orders = M('order');
        $id = I('get.id');

        $info = $orders->find($id);
        // echo $goods->_sql();
        // var_dump($info);
       
        $this->assign('info',$info);
        $this->display();
    }  

 //执行修改
    public function change(){

        // var_dump($_POST);
        // var_dump($_FILES);
        $orders = M('order');
        // var_dump($_POST);die;
         // 创建数据
        $a=$orders->create();
        // dump($a);
        // die();
        //执行更新
        $res = $orders->save();
        if($res){
             //添加成功
            $this->success('修改成功',U('Admin/Order/index'));
        }else{
            //失败
            $this->error('修改失败',U('Admin/Order/index'));
        }
}






}

?>