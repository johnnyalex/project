<?php
namespace Admin\Controller;
use Think\Controller;
class CommitController extends CommonController {
    public function index(){
    	$commits = M()->table(array('commit'=>'A','goods'=>'B','user'=>'C'))->field('A.id,A.stu,A.val,B.name,B.pic,C.username')->where('A.gid=B.id AND A.uid=C.id')->select();
    	// var_dump($commits);
    	$this->assign('commits',$commits);
        $this->display();
    }
}