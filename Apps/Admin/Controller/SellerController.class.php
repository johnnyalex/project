<?php
namespace Admin\Controller;
use Think\Controller;
class SellerController extends CommonController {
//显示
    public function index (){
        //实例化
        $seller = M('seller');
        //接受查询的值
        $name = $_POST['name'];
        // 拼接where
        if (!empty($name)) {
            $where = ' name like "%'.$name.'%"';
        }else{
            $where = '';
        }
        // 每页默认显示
        $num = !empty($_GET['num'])?$_GET['num']:5;
        //统计总数
        $count = $seller->where($where)->count();
        //实例化分页类
        $Page = new \Think\Page($count,$num);
        //获取limit
        $limit = $Page->firstRow.','.$Page->listRows;
        //分页显示输出
        $pages = $Page->show();
        $sellers = $seller->limit($limit)->select();
        // 三元  到显示html
        for ($i=0; $i < count($sellers); $i++) { 
            if ($sellers[$i]['status']==0) {
                $sellers[$i]['status'] = '下架';
            }else if ($sellers[$i]['status']==1){
                $sellers[$i]['status'] = '上架';
            }
        }
        // 
        $this->assign('sellers',$sellers);
        // var_dump($sellers);
        $this->assign('pages',$pages);
        // var_dump($sellers);
        $this->display();
    }
//显示处理是否上架
        public function seller_status(){
            $sellers = M('seller');
            $a = $sellers->create();
            var_dump($a);
            die();
            $res = $sellers->save();
            if($res)
                echo 1; 
        }
// 删除 商家
        public function delete(){
          $id = I('get.id');
          // var_dump($id);die;
          $sellers = M('seller');
          $res =  $sellers->delete($id);
          if($res)
          echo 1;
        }
//添加商家 
    public function add (){
        $this->display();
    }
// 编辑商家
    public function edit(){       
        $seller = M('seller');//实例化一下
        $seller->create();
        $res = $seller->save();
        if ($res) 
            echo 1;           
    }
// 编辑 2  含有图片的编辑
    public function edit1(){
        // 先查询
        $id = I('get.id');
        $seller = M('seller');
        $res = $seller->where(['id'=>$id])->find();
        $this->assign('res',$res);
        // var_dump($res);
        $this->display();
    }
// 执行 编辑2 
    public function do_edit1(){
        // 将图片url放入post中
        $_POST['pic']='/Home/Picture/'.$_FILES['pic']['name'];
        $seller = M('seller');
        $seller->create();
        $res = $seller->save();
        if($res){
            $this->success('修改成功',U('Admin/Seller/index'));
        }else{
            $this->error('修改失败',U('Admin/Seller/index'));
        }     
    }

// 执行 插入
    public function insert (){
        $_POST['pic']='/Home/Picture/'.$_FILES['pic']['name'];
        $seller = M('seller');
        $seller->create();
        $res = $seller->add();
        if($res){
            $this->success('添加成功',U('Admin/Seller/index'));
        }else{
            $this->error('添加失败',U('Admin/Seller/index'));
        }

    }

}
