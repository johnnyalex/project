<?php
namespace Admin\Controller;
use Think\Controller;
class CommonController extends Controller {

	// 功能类似构造方法 率先执行的方法
	public function _initialize(){
		//用户的登录检测
		$id = session('uid');
		//判断
		if(empty($id)){
			$this->error('您还有没有登录呢,思密达',U('Admin/Login/index'));
		}
		//检测用户是否具有权限
		$AUTH = new \Think\Auth();
		//类库位置应该位于ThinkPHP\Library\Think\    Admin/Cate/index
		if(!$AUTH->check(MODULE_NAME.'/'.CONTROLLER_NAME.'/'.ACTION_NAME, session('uid'))){
		           $this->error('没有权限',U('Admin/Index/index'));
		}
	}
}