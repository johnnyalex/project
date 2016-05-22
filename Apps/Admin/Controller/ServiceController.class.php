<?php 
namespace Admin\Controller;
use Think\Controller;
class ServiceController extends Controller {
    public function index(){
        $res = M('service')->select();
        $this->assign('res',$res);
        $this->display();
    }
    public function tongyi(){
        $id = I('get.id');
        $res = M('service')->save(['id'=>$id,'status'=>'1']);
        if ($res) {
            $this->success('确认同意',U('Admin/Service/index'));
        }
    }
    public function jujue(){
        $id = I('get.id');
        $res = M('service')->save(['id'=>$id,'status'=>'2']);
        if ($res) {
            $this->success('确认拒绝',U('Admin/Service/index'));
            
        }
    }

}

?>