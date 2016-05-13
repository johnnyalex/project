<?php
namespace Admin\Controller;
use Think\Controller;
class RootController extends CommonController {
    public function index(){
    	$think = M('think_auth_rule');
    	$p = empty($_GET['p']) ? 1 : $_GET['p'];
    	if($p == 0)
    		$p = 1;
    	if(empty($_GET['show'])&&empty($_GET['search'])){
	    	$show = 5;
<<<<<<< HEAD
	    	$start = $p*$show;
=======
	    	$start = ($p-1)*$show;
>>>>>>> 1e177447aacbab8d44bd01755f7d7a9a104723f1
	    	$res = $think->limit($start.','.$show)->select();
	    	$count = $think->field('id')->count();
    	}
    	else 
    	{
    		$search = I('get.search');
    		$show = I('get.show');
    		$start = ($p-1)*$show;
    		$res = $think->where("title like '%".$search."%'")->limit($start.','.$show)->select();
    		$count = $think->where("title like '%".$search."%'")->field('id')->count();
    	}
    	$page_count = ceil($count/$show);
    	for ($i=0; $i < count($res); $i++) { 
    		if($res[$i]['status'] == 1)
    			$res[$i]['status'] = '开启';
    		else if($res[$i]['status'] == 0)
    			$res[$i]['status'] = '关闭';
    	}
    	$this->assign('page',$p);
    	$this->assign('page_c',$page_count);
    	$this->assign('shw',$show);
    	$this->assign('seh',$search);
    	$this->assign('res',$res);
        $this->display();
    }
    public function add(){
 		$this->display();   	
    }
    public function insert(){
    	$_POST['type'] = 1;
    	$think = M('think_auth_rule');
    	$think->create();
    	$res = $think->add();
    	$think = M('think_auth_group');
    	$rules = $think->field('rules')->where('id=1')->find();
    	$rules = $rules['rules'].','.$res;
    	$_POST = array();
    	$_POST['id'] = 1;
    	$_POST['rules'] = $rules;
    	$think->create();
    	$think->save();
    	if($res)
    		$this->success('添加成功',U('Admin/Root/index'));
    	else
    		$this->error('添加失败',U('Admin/Root/index'));
    }
    public function group(){
    	$think = M('think_auth_group');
        $sql = "SELECT A.*,C.username FROM think_auth_group A,think_auth_group_access B,admin C WHERE A.id=B.group_id AND B.uid=C.id";
        $res = $think->query($sql);
        $groups = $think->select();
        foreach ($groups as $key => $value) {
            $groups[$key]['rules'] = str_replace(',',' ',$value['rules']);
            foreach ($res as $k => $v) {
                if($value['id'] == $v['id'])
                    $groups[$key]['username'] .= $v['username'].'　';
            }
        }
        $this->assign('groups',$groups);
    	$this->display();
    }
    public function groupadd(){
    	$think = M('think_auth_rule');
    	$res = $think->field('id,title')->select();
    	$this->assign('res',$res);
    	$this->display();
    }
    public function groupinsert(){
    	$think = M('think_auth_group');
    	$_POST['rules'] = implode(',',$_POST['rules']);
    	$think->create();
    	$res = $think->add();
    	if($res)
    		$this->success('添加成功',U('Admin/Root/group'));
    	else
    		$this->error('添加失败',U('Admin/Root/group'));
    }
    public function do_ajax(){
    	$think = M('think_auth_rule');
    	$think->create();
    	$res = $think->save();
    	if($res)
    		echo 1;
    }
    public function ajax_delete(){
    	$id = I('get.id');
    	$think = M('think_auth_rule');
    	$res = $think->delete($id);
    	if($res)
    		echo 1;
    }
    public function group_delete(){
        $id = I('get.id');
        $think = M('think_auth_group');
        $res = $think->field('id')->delete($id);
        if($res)
            echo 1;
    }
    public function update(){
        $think = M('think_auth_group');
        $id = I('get.id');
        $rule = M('think_auth_rule');
        $rules_a = $rule->field('id,title')->select();
        $rules_h = $think->field('title,rules')->find($id);
        $rules_h = explode(',',implode(',',$rules_h));
        foreach ($rules_a as $key => $value) {
            if(in_array($value['id'],$rules_h))
                $rules_a[$key]['have'] = 1;
        }
        $sql = "SELECT A.uid,B.username FROM think_auth_group_access A,admin B WHERE A.uid=B.id";
        $users_a = $think->query($sql);
        $think_acc = M('think_auth_group_access');
        $users_h = $think_acc->field('uid')->where(['group_id'=>$id])->select();
        foreach ($users_a as $key => $value) {
            foreach ($users_h as $k => $v) {
                if($value['uid'] == $v['uid'])
                    $users_a[$key]['have'] = true;
            }
        }
        $this->assign('users',$users_a);
        $this->assign('id',$id);
        $this->assign('title',$rules_h[0]);
        $this->assign('rules',$rules_a);
        $this->display();
    }
    public function save(){
        $_POST['rules'] = implode(',',$_POST['rules']);
        $think = M('think_auth_group');
        $think->create();
        $res = $think->save();
        if(I('post.users'))
            $users = I('post.users');
            $id = I('post.id');
            foreach ($users as $key => $value) {
                $sql = "UPDATE think_auth_group_access SET group_id=".$id." WHERE uid=".$value;
                $think->query($sql);
            }
        $this->success('更新成功',U('Admin/Root/group'));
    }
    public function group_ajax(){
        $think = M('think_auth_group');
        $think->create();
        $res = $think->save();
        if($res)
            echo 1;   
    }
<<<<<<< HEAD
=======
    public function update_root(){
        $id = I('get.id');
        $rules = M('think_auth_rule')->find($id);
        $this->assign('rules',$rules);
        $this->display();
    }
    public function save_root(){
        M('think_auth_rule')->create();
        $res = M('think_auth_rule')->save();
        if($res)
            $this->success('更新成功',U('Admin/Root/index'));
        else
            $this->error('修改失败',U('Admin/Root/index'));
    }
>>>>>>> 1e177447aacbab8d44bd01755f7d7a9a104723f1
}