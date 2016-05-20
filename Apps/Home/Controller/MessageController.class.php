<?php
namespace Home\Controller;
use Think\Controller;
class MessageController extends Controller{
	public function index(){
		unset($_SESSION['words']);
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
		$otr_grp = M('group')->where('id NOT IN('.$str.')')->limit(6)->select();
		if(!$in_grp)
			$otr_grp = M('group')->limit(6)->select();
		if(empty($_GET['gid']))
			$default_gid = $groups[0]['gid'];
		else
			$default_gid = I('get.gid');
		if(!$default_gid)
			$default_gid = 0;
		$this->assign('gid',$default_gid);
		$this->assign('ogrps',$otr_grp);
		$this->assign('groups',$groups);
		$this->display();
	}
	public function mk_group(){
		if(empty($_POST['name']))
			return;
		$uid = $_SESSION['user']['id'];
		$_POST['ow'] = $uid;
		$count = M('group')->where('ow='.$uid)->count();
		echo $count;
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
	public function speak(){
		$_GET['uid'] = $_SESSION['user']['id'];
		$_GET['time'] = date('H:i:s',time());
		$res = M('message')->data($_GET)->add();
		if($res)
			$response[0] = 1;
		echo json_encode($response);
	}
	public function word(){
		$uid = $_SESSION['user']['id'];
		if(empty($_POST['gid']))
			$gid = M('group_user')->where('uid='.$uid)->limit(1)->find()['gid'];
		else
			$gid = $_POST['gid'];
		$count = M('message')->where('gid='.$gid)->count();
		if($count <= 8)
			$count = 8;
		$limit = $count-8;
		$res = M()->table(array('message'=>'A','user'=>'B'))
		->field('text,pic,uid')
		->where('A.gid='.$gid.' AND A.uid=B.id')->limit($limit,8)->select();
		$str = '';
		foreach ($res as $key => $value) {
			if($value['uid'] == $uid)
				$str .= '<div class="fr">'.$value['text'].' <img src="/project/PUBLIC'.$value['pic'].'" height="20px"></div><br><br>';
			else
				$str .= '<div class="fl"><img src="/project/Public'.$value['pic'].'" height="20px"> '.$value['text'].'</div><br><br>';
		}
		if($str != $_SESSION['words']){
			$response[0] = 1;
			$response[1] = $str;
		}else{
			$response[0] = 0;
		}
		$_SESSION['words'] = $str;
		echo json_encode($response);
	}
}
?>