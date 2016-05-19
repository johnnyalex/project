<?php
namespace Admin\Controller;
use Think\Controller;
class BrandController extends CommonController {
//显示
    public function index (){
        //实例化
        $brand = M('brand');
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
        $count = $brand->where($where)->count();
        //实例化分页类
        $Page = new \Think\Page($count,$num);
        //获取limit
        $limit = $Page->firstRow.','.$Page->listRows;
        //分页显示输出
        $pages = $Page->show();

        $brands = $brand->limit($limit)->select();

        // 三元  到显示html
        for ($i=0; $i < count($brands); $i++) { 
            if ($brands[$i]['status']==0) {
                $brands[$i]['status'] = '下架';
            }else if ($brands[$i]['status']==1){
                $brands[$i]['status'] = '上架';
            }
        }
        // 
        $this->assign('brands',$brands);
        $this->assign('pages',$pages);
        // var_dump($brands);
        $this->display();
    }
//显示处理是否上架
        public function brand_status(){
            $brands = M('brand');
            $brands->create();
            $res = $brands->save();
            if($res)
                echo 1; 
        }
// 删除 品牌
        public function delete(){
          $id = I('get.id');
          // var_dump($id);die;
          $brands = M('brand');
          $res =  $brands->delete($id);
          if($res)
          echo 1;
        }
//添加品牌 
    public function add (){
        $this->display();
    }
// 编辑品牌
    public function edit(){       
        $brand = M('brand');//实例化一下
        $brand->create();
        $res = $brand->save();
        $a  = $brand->_sql();
        var_dump($a);die;
        if ($res) 
            echo 1;           
    }
// 编辑 2  含有图片的编辑
    public function edit1(){
        // 先查询
        $id = I('get.id');
        $brand = M('brand');
        $res = $brand->where(['id'=>$id])->find();
        $this->assign('res',$res);
        // var_dump($res);
        $this->display();
    }
// 执行 编辑2 
    public function do_edit1(){
        // 将图片url放入post中
        $_POST['pic']='/Home/Picture/'.$_FILES['pic']['name'];
        $brand = M('brand');
        $brand->create();
        $res = $brand->save();
        // $zz = $brand->_sql();

        if($res){
            $this->success('修改成功',U('Admin/Brand/index'));
        }else{
            $this->error('修改失败',U('Admin/Brand/index'));
        }     
    }

// 执行 插入
    public function insert (){
        $_POST['pic']='/Home/Picture/'.$_FILES['pic']['name'];
        // var_dump($_POST);
        $brand = M('brand');
        $brand->create();
        $res = $brand->add();
        // $a = $brand->_sql();
        // var_dump($a);
        // die();
        if($res){
            $this->success('添加成功',U('Admin/Brand/index'));
        }else{
            $this->error('添加失败',U('Admin/Brand/index'));
        }

    }

}
