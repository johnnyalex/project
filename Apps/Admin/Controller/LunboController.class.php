<?php
namespace Admin\Controller;
use Think\Controller;
class LunboController extends CommonController {
//显示
    public function index (){
        //实例化
        $lunbo = M('lunbo');
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
        $count = $lunbo->where($where)->count();
        //实例化分页类
        $Page = new \Think\Page($count,$num);
        //获取limit
        $limit = $Page->firstRow.','.$Page->listRows;
        //分页显示输出
        $pages = $Page->show();

        $lunbos = $lunbo->limit($limit)->select();

        // 三元  到显示html
        for ($i=0; $i < count($lunbos); $i++) { 
            if ($lunbos[$i]['status']==0) {
                $lunbos[$i]['status'] = '下架';
            }else if ($lunbos[$i]['status']==1){
                $lunbos[$i]['status'] = '上架';
            }
        }
        // 
        $this->assign('lunbos',$lunbos);
        $this->assign('pages',$pages);
        // var_dump($lunbos);
        $this->display();
    }
//显示处理是否上架
        public function lunbo_status(){
            $lunbos = M('lunbo');
            $lunbos->create();
            $res = $lunbos->save();
            if($res)
                echo 1; 
        }
// 删除 轮播
        public function delete(){
          $id = I('get.id');
          // var_dump($id);die;
          $lunbos = M('lunbo');
          $res =  $lunbos->delete($id);
          if($res)
          echo 1;
        }
//添加轮播 
    public function add (){
        $this->display();
    }
// 编辑轮播
    public function edit(){       
        $lunbo = M('lunbo');//实例化一下
        $lunbo->create();
        $res = $lunbo->save();
        if ($res) 
            echo 1;           
    }
// 编辑 2  含有图片的编辑
    public function edit1(){
        // 先查询
        $id = I('get.id');
        $lunbo = M('lunbo');
        $res = $lunbo->where(['id'=>$id])->find();
        $this->assign('res',$res);
        // var_dump($res);
        $this->display();
    }
// 执行 编辑2 
    public function do_edit1(){
        // 将图片url放入post中
        $_POST['pic']='/Home/Picture/'.$_FILES['pic']['name'];
        $lunbo = M('lunbo');
        $lunbo->create();
        $res = $lunbo->save();
        // $zz = $lunbo->_sql();

        if($res){
            $this->success('修改成功',U('Admin/Lunbo/index'));
        }else{
            $this->error('修改失败',U('Admin/Lunbo/index'));
        }     
    }

// 执行 插入
    public function insert (){
        $_POST['pic']='/Home/Picture/'.$_FILES['pic']['name'];
        // var_dump($_POST);
        $lunbo = M('lunbo');
        $lunbo->create();
        $res = $lunbo->add();
        if($res){
            $this->success('添加成功',U('Admin/Lunbo/index'));
        }else{
            $this->error('添加失败',U('Admin/Lunbo/index'));
        }

    }

}
