<?php
namespace Admin\Controller;
use Think\Controller;
class CategoryController extends CommonController {
    public function index(){
        //实例化
        $cate = M('category');
        //接受值
        $name = $_POST['name'];
        //判断是够查询
        if($name)
            $cates = $cate->where("name LIKE '%".$name."%'")->select();
        else
            $cates = $cate->where("path='0,'")->select();
        //三元
        for($i = 0;$i < count($cates);$i++){
            if($cates[$i]['display'] == 1)
                $cates[$i]['display'] = '显示';
            else if($cates[$i]['display'] == 0)
                $cates[$i]['display'] = '隐藏';
        }
        $this->assign('cates',$cates);
        $this->display();	
    }
    public function parent(){
        $id = I('post.id');
        $path = '0,'.$id.',';
        $cate = M('category');
        $res = $cate->where("path='".$path."'")->select();//取得path为父级的内容  遍历添加
        for($i = 0;$i < count($res);$i++){
            if($res[$i]['display'] == 1)
                $res[$i]['display'] = '显示';
            else if($res[$i]['display'] == 0)
                $res[$i]['display'] = '隐藏';
        }
        $res = json_encode($res);//转json格式
        echo $res;
    }
    public function parent_add(){
        $id = I('post.id');
        $path = I('post.path').$id.',';
        $cate = M('category');
        $res = $cate->where("path='".$path."'")->select();
        for($i = 0;$i < count($res);$i++){
            if($res[$i]['display'] == 1)
                $res[$i]['display'] = '显示';
            else if($res[$i]['display'] == 0)
                $res[$i]['display'] = '隐藏';
        }
        $res = json_encode($res);
        echo $res;
    }
    public function add(){
        //实例化
        $cate = M('category');
        //查询一级分类
        $res = $cate->where('pid=0')->select();
        //分配
        $this->assign('res',$res);
        //显示
        $this->display();
    }
    public function insert(){
        $arr = array();
        if($_POST['second']){
            $pid = $_POST['second'];
            $id = $_POST['second'];
            $name = $_POST['name'];
            $cate = M('category');
            $path = $cate->where('id='.$id)->find();
            $path = $path['path'].$id.',';
            $_POST = array();
            $_POST['pid'] = $pid;
            $_POST['path'] = $path;
            $_POST['name'] = $name;
        }else{
            $name = $_POST['name'];
            $_POST = array();
            $_POST['name'] = $name;
            $_POST['path'] = '0,';
        }
        $_POST['display'] = 1;
        $cate = M('category');
        $cate->create();
        $res = $cate->add();
        if($res){
            $this->success('添加成功',U('Admin/Category/index'));
        }else{
            $this->error('添加失败',U('Admin/Category/index'));
        }
    }
    public function select(){
        //接受id
        $id = I('post.id');
        //实例化
        $cate = M('category');
        // 查询
        $res = $cate->where('id='.$id)->find();
        // 拼接ready path
        $path = $res['path'].$id.',';
        // 拼接 path
        $res = $cate->where("path='".$path."'")->select();
        // json_encode 形式返回str
        $res = json_encode($res);
        echo $res;
    }
    public function delete(){
        $id = I('get.id');
        $cate = M('category');
        $res = $cate->where('id='.$id)->find();
        $path = $res['path'].$id.',';
        $rea = $cate->where('id='.$id)->delete();
        $reb = $cate->where("path like '".$path."%'")->delete();
        if($rea || $reb)
            echo 1;
    }
    public function cate_display(){
        $cate = M('category');
        $cate->create();
        $res = $cate->save();
        if($res)
            echo 1;
    }
    public function update(){
        $cate = M('category');
        $res = $cate->where('pid=0')->select();
        $this->assign('res',$res);
        $id = I('get.id');
        $name = $cate->find($id);
        $name = $name['name'];
        $this->assign('id',$id);
        $this->assign('name',$name);
        $this->display();
    }
    public function change(){
        $cate = M('category');
        $id = I('post.id');
        $name = I('post.name');
        if($_POST['second']){
            $pid = $_POST['second'];
            $path = $cate->find($pid);
            $path = $path['path'].$path['id'].',';
            unset($_POST['level']);
            unset($_POST['second']);
        }
        else
        {
            $path = '0,';
            $pid = 0;
            unset($_POST['level']);
        }
        $_POST['pid'] = $pid;
        $_POST['path'] = $path;
        $_POST['display'] = 1;
        $cate->create();
        $res = $cate->save();
        if($res)
            $this->success('更新成功',U('Admin/Category/index'));
        else
            $this->error('修改失败',U('Admin/Category/index'));
    }
}