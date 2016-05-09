<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends CommonController {
    public function index(){
    	$admin = M('admin');
        $id = $_SESSION['uid'];
        if($_SESSION['count']){
            $last = $admin->find($id);
            unset($last['password']);
            $_SESSION['admin']['ip'] = $last['login_ip'];
            $_SESSION['admin']['time'] = $last['login_time'];
            $count = $last['login_count']+1;
            $last['login_count'] = $count;
            $arr = array();
            $arr['id'] = $id;
            $arr['login_ip'] = $_SERVER['REMOTE_ADDR'];
            $arr['login_time'] = $_SERVER['REQUEST_TIME'];
            $arr['login_count'] = $count;
            $admin->save($arr);
            unset($_SESSION['count']);
        }else{
            $last = $admin->field('username,type,login_count')->find($id);
            $last['login_ip'] = $_SESSION['admin']['ip'];
            $last['login_time'] = $_SESSION['admin']['time'];
        }
        $last['login_time'] = date('Y-m-d H:i:s',$last['login_time']);
        $think = M('think_auth_group');
        $last['type'] = $think->field('title')->find($last['type'])['title'];
        $this->assign('admin',$last);
    	$this->display();
    }
    public function admin(){
        $admin = M('admin');
        $sql = "SELECT A.*,B.title FROM admin A,think_auth_group B WHERE A.type=B.id";
        $res = $admin->query($sql);
        foreach ($res as $key => $value) {
            unset($res[$key]['password'],$res[$key]['type']);
            $res[$key]['login_time'] = date('Y-m-d H:i:s',$res[$key]['login_time']);
        }
        $this->assign('users',$res);
        $this->display(); 
    }
    public function delete(){
    	$id = I('get.id');
    	$admin = M('admin');
    	if($admin->delete($id))
    		echo '1';
    }
    public function update(){
		$admin = M('admin');
		$admin->create();
		if($admin->save())
			echo 1;
    }
    public function add(){
        $think = M('think_auth_group');
        $res = $think->field('id,title')->select();
        $this->assign('res',$res);
    	$this->display();
    }
    public function insert(){
    	$admin = M('admin');
        $_POST['password'] = md5($_POST['password']);
    	$res = $admin->add($_POST);
        $think = M('think_auth_group_access');
        $arr = array();
        $arr['uid'] = $res;
        $arr['group_id'] = I('post.type');
        $res = $think->add($arr);
        if($res){
            $this->success('添加成功',U('Admin/Index/admin'));
        }else{
            $this->error('添加失败',U('Admin/Index/admin'));
        }
    }
    public function ch_pass(){
        $this->display();
    }
    public function do_pass(){
        $opd = I('post.old_password');
        $id = $_SESSION['uid'];
        $admin = M('admin');
        $res = $admin->field('id')->where('id='.$id.' AND password='.$opd)->find();
        if(!$res)
            die($this->error('原密码不正确',U('Admin/Index/index')));
        $arr['password'] = I('post.new_password');
        $arr['id'] = $id;
        $res = $admin->save($arr);
        if($res)
            $this->success('修改成功',U('Admin/Index/index'));
        else
            $this->error('修改失败',U('Admin/Index/index'));
    }
    public function group(){
        
    }
}