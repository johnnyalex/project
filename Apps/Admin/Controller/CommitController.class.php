<?php
namespace Admin\Controller;
use Think\Controller;
class CommitController extends CommonController {
    public function index(){
    	// var_dump($_GET);
    	// die;
    	$commit = M('commit');
    	// var_dump($commits);
    	$name = $_GET['name'];

    	// var_dump($name);

     if($name)
            $where = "name like '%".$_GET['name']."%'";
        else
            $where = '';
         //获取每页显示的数量
       $num = !empty($_GET['show']) ? $_GET['show'] : 5;
        //统计总数
        // $count = $commits->where($where)->count();
         // 实例化分页类
        $Page = new \Think\Page($count,$num);
        //获取limit
        $limit = $Page->firstRow.','.$Page->listRows;
        $pages = $Page->show();
        $commits = $commit->table(array('commit'=>'A','goods'=>'B','user'=>'C'))
    			->field('A.id,A.stu,A.val,A.reply,B.name,B.pic,C.username')
    			->where('A.gid=B.id AND A.uid=C.id')->select();
    	
    	$this->assign('commits',$commits);
    	// var_dump($commits);
    	$this->assign('pages',$pages);
        $this->display();
    }

    public function update(){
    	// var_dump($_GET['id']);
    	$commit = M('commit');
    	$id = I('get.id');
        	$info = $commit->table(array('commit'=>'A','user'=>'C'))->field('A.id,A.stu,A.val,A.reply,C.username')->where('A.uid=C.id and A.id = '.$id)->find();

        	// var_dump($res);
        	 $this->assign('info',$info);
        	 // $this->assign('value',$value);
    	$this->display();
    }

    public function add(){


    }
    public function change(){
    	// var_dump($_POST['id']);
    	$commit = M('commit');
    	$res=$commit->create();
        	// dump($res);
        	$a= $commit->save();
        	// var_dump($a);
        if($a){
            $this->success('评论回复完成',U('Admin/Commit/index'));
        }

    }


}