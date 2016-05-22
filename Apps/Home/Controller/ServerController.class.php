<?php
namespace Home\Controller;
use Think\Controller;
class ServerController extends Controller {
 	public	function  create_server(){
 		$id = $_POST['oid'];
 		$gid = $_POST['gid'];
 		$oid = $_POST['oid'];
 		$resss = M('order')->find(['id'=>$oid]);
 		$ress = M('goods')->find(['id'=>$gid]);
 		$_POST['sid'] = $ress['sid'];
 		$_POST['onum'] = $resss['order_num'];
 		M('order')->save(['id'=>$id,'status'=>'6']);
 		$_POST['ctime']=date('Y-m-d H:i:s',time());
 		$_POST['uid']=$_SESSION['user']['id'];
 		$server = M('service');
 		$server->create();
 		$a = $server->add();
 		if ($a) {
 			echo 1;
 		}
 	}
 	public function commit(){
 		$_GET['uid'] = $_SESSION['user']['id'];
 		$_GET['stu'] = 0;
 		$_GET['time'] = date('Y-m-d H:i:s',time());
 		if(!empty($_GET['val']))
 			$res = M('commit')->data($_GET)->add();
 		else
 			$res = true;
 		if($res)
 			$response[0] = 1;
 		echo json_encode($response);
 	}
}
?>
