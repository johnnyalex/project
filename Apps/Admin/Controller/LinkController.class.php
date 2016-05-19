<?php
namespace Admin\Controller;
use Think\Controller;
class LinkController extends CommonController {
//显示
    public function index (){
       $link = M('link');
            // var_dump($_GET);
            $name = $_GET['name'];
            // $where['name'] = array('like','%'.$_GET['name'].'%');
            if($name)
            $where = "name like '%".$_GET['name']."%'";
        else
            $where = '';
         //获取每页显示的数量
       $num = !empty($_GET['show']) ? $_GET['show'] : 5;
        $links = $link->select();
        // var_dump($links);
        
        //统计总数
        $count = $link->where($where)->count();
        // 实例化分页类
        $Page = new \Think\Page($count,$num);
        //获取limit
        $limit = $Page->firstRow.','.$Page->listRows;
        $pages = $Page->show();
        $links = $link->limit($limit)->where($where)->select();

          $this->assign('links',$links);
        $this->assign('pages',$pages);

        $this->display();
    }

    //是否显示和隐藏
    public function link_dis(){
        var_dump($_POST);
        $link = M('link');
        $link->create();
        $res = $link->save();
        // echo $goods->_sql();
        // die;
        if($res)
            echo 1; 
    }
// 删除 商家
        public function delete(){
          $id = I('get.id');
          // var_dump($id);die;
          $link = M('link');
          $res =  $link->delete($id);
          if($res)
          echo 1;
        }
//添加商家
    public function add (){
     
        $this->display();
    }
//执行添加
    public function insert(){
        // var_dump($_POST);
        // var_dump($_FILES);
        $link = M('link');
      
        //处理图片上传
        if($_FILES['pic']['error'] == 0){
            $upload = new \Think\Upload();// 实例化上传类    
            $upload->maxSize   =   3145728 ;// 设置附件上传大小   
            $upload->exts      =   array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型    
            $upload->rootPath = './Public';//手动设置网站根目录
            $upload->savePath  =   '/Uploads/'; // 设置附件上传目录    
            $info   =   $upload->upload();    // 上传文件     
            if(!$info) {// 上传错误提示错误信息        
                $this->error($upload->getError());    
            }else{// 上传成功       
                // $this->success('上传成功！'); 
                $str = $info['pic']['savepath']. $info['pic']['savename'];
                // var_dump($str);
                $_POST['pic'] = $str;
            }
        }
        
        if(empty($_POST['name']))
            $this->error('商家名称不能为空',U('Admin/Link/index'));

        //创建数据
        $link->create();
        //执行添加
        if($link->add()){
             //添加成功
            $this->success('添加成功',U('Admin/Link/index'));
        }else{
            //失败
            $this->error('添加失败',U('Admin/Link/index'));
        }
    }



//商品修改
    public function update(){
        // var_dump(I('get.id'));
        $link = M('link');
        $id = I('get.id');
        $info = $link->find($id);
        // var_dump($info);
        $this->assign('info',$info);
        $this->display();
    }  


  //执行修改
    public function change(){
        $link = M('link');
         if($_FILES['pic']['error'] == 0){
            $upload = new \Think\Upload();// 实例化上传类    
            $upload->maxSize   =   3145728 ;// 设置附件上传大小   
            $upload->exts      =   array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型    
            $upload->rootPath = './Public';//手动设置网站根目录
            $upload->savePath  =   '/Uploads/'; // 设置附件上传目录    
            $info   =   $upload->upload();    // 上传文件     
            if(!$info) {// 上传错误提示错误信息        
                $this->error($upload->getError());    
            }else{// 上传成功       
                // $this->success('上传成功！'); 
                $str = $info['pic']['savepath']. $info['pic']['savename'];
                // var_dump($str);
                $_POST['pic'] = $str;
            }
            //获取原图的路径
            $res = $link->find($_POST['id']);
            $pic = $res['pic'];
            //删除图片
            unlink('./Public'.$pic);
        }
        // var_dump($_POST);die;

        if(empty($_POST['name']))
            $this->error('商家名称不能为空',U('Admin/Link/index'));
         // 创建数据
        $a=$link->create();
        // dump($a);
        // die();
        //执行更新
        $res = $link->save();

        if($res){
             //添加成功
            $this->success('修改成功',U('Admin/Link/index'));
        }else{
            //失败
            $this->error('修改失败',U('Admin/Link/index'));
        }

}

// 双击编辑改变input表单值
    public function edit(){       
        $link = M('link');
        $link->create();
        $res = $link->save();
        if ($res) 
            echo 1;           
    }


}
