<?php
namespace Home\Controller;
use Think\Controller;
class MessageController extends Controller{
	public function index(){
		$uid = $_SESSION['user']['id'];
		$groups = M()->table(array('group'=>'A','group_user'=>'B'))
		->where('A.id=B.gid AND B.uid='.$uid)->select();
		foreach ($groups as $key => $value) {
			if($value['uid'] == $value['ow'])
				$groups[$key]['own'] = 1;
		}
		$in_grp = M('group_user')->field('gid')->where('uid='.$uid)->select();
		$str = '';
		foreach ($in_grp as $key => $value) {
			$str .= $value['gid'].',';
		}
		$str = rtrim($str,',');
		$otr_grp = M('group')->where('id NOT IN('.$str.')')->select();
		$this->assign('ogrps',$otr_grp);
		$this->assign('groups',$groups);
		$this->display();
	}
	public function mk_group(){
		$uid = $_SESSION['user']['id'];
		$_POST['ow'] = $uid;
		$count = M('group')->where('ow='.$uid)->count();
		if($count >=3)
			return;
		M('group')->create();
		$res = M('group')->add();
		M('group_user')->data(array('uid'=>$uid,'gid'=>$res))->add();
		if($res){
			$response[0] = 1;
			$response[1] = $res;
		}
		echo json_encode($response);
	}
	public function ex_group(){
		$uid = $_SESSION['user']['id'];
		$gid = I('get.gid');
		$res = M('group_user')->where(array('uid'=>$uid,'gid'=>$gid))->delete();
		M('group')->where(array('ow'=>$uid,'id'=>$gid))->delete();
		if($res)
			$response[0] = 1;
		echo json_encode($response);
	}
	public function dr_group(){
		$uid = $_SESSION['user']['id'];
		$gid = I('get.gid');
		$res = M('group_user')->where(array('gid'=>$gid))->delete();
		M('group')->where(array('id'=>$gid))->delete();
		if($res)
			$response[0] = 1;
		echo json_encode($response);
	}
	public function to_group(){
		$_GET['uid'] = $_SESSION['user']['id'];
		$res = M('group_user')->data($_GET)->add();
		if($res)
			$response[0] = 1;
		echo json_encode($response);
	}
	public function se_group(){
		$uid = $_SESSION['user']['id'];
		$gid = I('get.gid');
		$require = M('group_user')->where(array('uid'=>$uid,'gid'=>$gid))->find();
		if($require){
			$response[0] = 2;
		}else{
			$res = M('group')->field('name')->find($gid);
			if($res){
				$response[0] = 1;
				$response[1] = $res['name'];
			}else{
				$response[0] = 0;
			}			
		}
		echo json_encode($response);
	}
}
?>