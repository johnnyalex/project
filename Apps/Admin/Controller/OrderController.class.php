<?php 
namespace Admin\Controller;
use Think\Controller;
class OrderController extends Controller {

    public function index(){
        $orders = M('order');
        $sql = "SELECT A.*,B.goods_id,B.price,B.qty FROM `order` A LEFT JOIN order_goods B ON A.id=B.order_id ORDER BY A.id";
        $orders_list = $orders->query($sql);
        var_dump($orders_list);
        $arr = array();
        $goods = M('goods');
        foreach ($orders_list as $key => $value) {
            $arr[] = $goods->field('name,pic')->where(['id'=>$value['goods_id']])->find();
        }
        var_dump($arr);
        // $this->display();
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
        var_dump($info);
       
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