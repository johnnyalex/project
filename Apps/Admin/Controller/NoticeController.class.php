<?php
namespace Admin\Controller;
use Think\Controller;
class NoticeController extends CommonController {
//显示
    public function index (){
       $notice = M('notice');
            // var_dump($_GET);
            $name = $_GET['notice'];
            // $where['name'] = array('like','%'.$_GET['name'].'%');
            if($name)
            $where = "name like '%".$_GET['notice']."%'";
        else
            $where = '';
         //获取每页显示的数量
       $num = !empty($_GET['show']) ? $_GET['show'] : 5;
        $notices = $notice->select();
        // var_dump($notices);
        
        //统计总数
        $count = $notice->where($where)->count();
        // 实例化分页类
        $Page = new \Think\Page($count,$num);
        //获取limit
        $limit = $Page->firstRow.','.$Page->listRows;
        $pages = $Page->show();
        $notices = $notice->limit($limit)->where($where)->select();

          $this->assign('notices',$notices);
        $this->assign('pages',$pages);

        $this->display();
    }

   
// 删除 商家
        public function delete(){
          $id = I('get.id');
          // var_dump($id);die;
          $notice = M('notice');
          $res =  $notice->delete($id);
          if($res)
          echo 1;
        }
//添加商家
    public function add (){
     
        $this->display();
    }
//执行添加
    public function insert(){
        // var_dump($_POST);die();
        // var_dump($_FILES);
        $notice = M('notice');
      
        if(empty($_POST['title'])) {
            $this->error('商家名称不能为空',U('Admin/Notice/index'));
        }

//注意，这里把上面的正则表达式中的单引号用反斜杠转义了，不然没法放在字符串里
$reg= '@(?i)\b((?:[a-z][\w-]+:(?:/{1,3}|[a-z0-9%])|www\d{0,3}[.]|[a-z0-9.\-]+[.][a-z]{2,4}/)(?:[^\s()<>]+|\(([^\s()<>]+|(\([^\s()<>]+\)))*\))+(?:\(([^\s()<>]+|(\([^\s()<>]+\)))*\)|[^\s`!()\[\]{};:\'".,<>?«»“”‘’]))@';

        $content=$_POST['url'];
$res= preg_match($reg, $content) ;  

        if($res!=1)
            $this->error('请输入正规的网址类型',U('Admin/Notice/index'));
        //创建数据
        $notice->create();
        //执行添加
        if($notice->add()){
             //添加成功
            $this->success('添加成功',U('Admin/Notice/index'));
        }else{
            //失败
            $this->error('添加失败',U('Admin/Notice/index'));
        }
    }



//商品修改
    public function update(){
        // var_dump(I('get.id'));
        $notice = M('notice');
        $id = I('get.id');
        $info = $notice->find($id);
        // var_dump($info);
        $this->assign('info',$info);
        $this->display();
    }  


  //执行修改
    public function change(){
        $notice = M('notice');
        if(empty($_POST['title']))
            $this->error('公告名称不能为空',U('Admin/Notice/index'));

        $reg= '@(?i)\b((?:[a-z][\w-]+:(?:/{1,3}|[a-z0-9%])|www\d{0,3}[.]|[a-z0-9.\-]+[.][a-z]{2,4}/)(?:[^\s()<>]+|\(([^\s()<>]+|(\([^\s()<>]+\)))*\))+(?:\(([^\s()<>]+|(\([^\s()<>]+\)))*\)|[^\s`!()\[\]{};:\'".,<>?«»“”‘’]))@';

        $content=$_POST['url'];
$res= preg_match($reg, $content) ;  

        if($res!=1)
            $this->error('请输入正规的网址类型',U('Admin/Notice/index'));

         // 创建数据
        $a=$notice->create();
        // dump($_POST);die;
        // die();
        //执行更新
        $res = $notice->save();

        if($res){
             //添加成功
            $this->success('修改成功',U('Admin/Notice/index'));
        }else{
            //失败
            $this->error('修改失败',U('Admin/Notice/index'));
        }

}

// 双击编辑改变input表单值
    public function edit(){       
        $notice = M('notice');
        $notice->create();
        $res = $notice->save();
        if ($res) 
            echo 1;           
    }


}
