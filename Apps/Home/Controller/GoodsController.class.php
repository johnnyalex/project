<?php 
namespace Home\Controller;
use Think\Controller;
class GoodsController extends Controller {
    public function goods(){
        $this->assign('title','商品详情');
        $this->display();
    }
    public function show(){
        // 商品id
        $gid = I('get.gid');
        // 用户id
        $uid = $_SESSION['user']['id'];
        // 实例化 用户信息
        $info = M('userinfo');
        // 找
        $res = $info->where(['uid'=>$uid])->find();
        // var_dump($res);
        $arr = explode(',',$res['like_id']);
        $kong = array_pop($arr);
        // var_dump($arr);
        if (in_array($gid, $arr)) {
            $aa = 'none';
            $aaa = 'block';
        }
    	$this->assign('title','商品详情');
        $this->assign('gid',$gid); //商品id
        $this->assign('uid',$uid); //用户id
        $this->assign('aa',$aa); //like 否
        $this->assign('aaa',$aaa); //like是
        $this->display();
    }
    // 处理like
    public function like(){
  //    // 获取
        $lid = I('post.gid');
        $uid = I('post.uid');
    	// 实例化
    	$info=M('userinfo');
    	// 找
    	$res = $info->where(['uid'=>$uid])->find();
	    $like_id = $res['like_id'];
	    //  去初始化0文本中含有0 拼接 like_id
	    if ($like_id==0) {
	    	$res['like_id']='';
	    	$like_id=$lid.',';
	    }else{
    		$like_id =$like_id.$lid.',';
	    }
    	$res1 = $info->where(' uid = "'.$uid.'"')->save(['like_id'=>$like_id]);
    	echo $res1;
    }
    //去除like
    public function unlike(){
  //   	// 获取
    	$lid = I('post.gid');
    	$uid = I('post.uid');
    	//拼接lid字段
    	$lid=$lid.',';
    	// 实例化
    	$info=M('userinfo');
    	// 找
    	$res = $info->where(['uid'=>$uid])->find();
	    $like_id = $res['like_id'];
	    // 拼接 like_id
	    $like_id = str_replace($lid, '', $like_id);
	    $res = $info -> where(['uid'=>$uid])->save(['like_id'=>$like_id]);
	    echo $res;
    }
}

 ?>