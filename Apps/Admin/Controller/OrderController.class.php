<?php 
namespace Admin\Controller;
use Think\Controller;
class OrderController extends Controller {

    public function index(){
        if(!empty($_GET['keyword'])){
            $_GET['keyword'] = trim($_GET['keyword']);
            $where = "where order_num like '%".$_GET['keyword']."%' AND A.uid=B.id";
            $w = "order_num like '%".$_GET['keyword']."%' AND A.uid=B.id";
        }else{
            $where = 'A.uid=B.id';
        }

        $count = M()->table(array('order'=>'A','user'=>'B'))->field('A.*,B.username')->where($where)->count();

        $num = !empty($_GET['num']) ? $_GET['num'] : 5;

        $Page = new \Think\Page($count,$num);

        $limit =$Page->firstRow.','.$Page->listRows;

        $pages =$Page->show();

        $res =M()->table(array('order'=>'A','user'=>'B'))->where($where)->limit($limit)->select();

        if(!empty($_GET['keyword'])){
            $where = "order_num like '%".$_GET['keyword']."%' AND A.uid=B.id";
            $limit = '';
        }

        $order_list = M()->table(array('order'=>'A','user'=>'B'))->field('A.*,B.username')->where($where)->limit($limit)->select();
        
        foreach ($order_list as $key => $value) {
            $res = M()->table('address')->find($value['address_id']);
            $order_list[$key]['name'] = $res['name'];
            $order_list[$key]['tel'] = $res['tel'];
            $order_list[$key]['address'] = $res['pro'].$res['city'].$res['area'].$res['addr'];
        }

        $this->assign('order_sel',$order_list);
        $this->assign('pages',$pages);
        $this->display();
    }
//删除商品
  public function delete(){
    $id = I('get.id');
    $orders = M('order');
    $res =  $orders->delete($id);
    if($res)
    echo 1;
  }  

    public function select(){
        $id = I('get.id');
        $goods_list = M('order_goods')->field('goods_id,qty')->where(['order_id'=>$id])->select();
        foreach ($goods_list as $key => $value) {
            $goods[] = M('goods')->where('id='.$value['goods_id'])->find();
            $goods[$key]['qty'] = $value['qty'];
        }
        $this->assign('goods',$goods);
        $this->display();
    }  

    public function update(){
        $oid = I('get.oid');
        $uid = I('get.uid');
        $address = M('address')->where(['uid'=>$uid])->select();
        $this->assign('address',$address);
        $this->assign('id',$oid);
        $this->display();
    }

 //执行修改
    public function change(){
        $orders = M('order');
        $orders->create();
        $res = $orders->save();
        if($res){
             //添加成功
            $this->success('修改成功',U('Admin/Order/index'));
        }else{
            //失败
            $this->error('修改失败',U('Admin/Order/index'));
        }
    }

    public function fahuo(){
        $res = M('order')->data($_GET)->save();
        if($res)
            $response[0] = 1;
        echo json_encode($response);        
    }
}

?>