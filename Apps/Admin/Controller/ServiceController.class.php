<?php 
namespace Admin\Controller;
use Think\Controller;
class ServiceController extends Controller {
    public function index(){
        $think = M('service');
        $p = empty($_GET['p']) ? 1 : $_GET['p'];//空的时候是1
        if($p == 0)//0 
            $p = 1;
        if(empty($_GET['show'])&&empty($_GET['search'])){//默认的空和 搜索都是
            $show = 5;
            $start = ($p-1)*$show;
            $res = $think->limit($start.','.$show)->select();
            $count = $think->field('id')->count();
        }
        else 
        {
            $search = I('get.search');
            $show = I('get.show');
            $start = ($p-1)*$show;
            $res = $think->where("onum like '%".$search."%'")->limit($start.','.$show)->select();
            $count = $think->where("onum like '%".$search."%'")->field('id')->count();
        }
        $page_count = ceil($count/$show);//去小数取整
        for ($i=0; $i < count($res); $i++) { 
            if($res[$i]['status'] == 1)
                $res[$i]['status'] = '已同意';
            else if($res[$i]['status'] == 0)
                $res[$i]['status'] = '未处理';
            else if($res[$i]['status'] == 2)
                $res[$i]['status'] = '已拒绝';
        }
        // var_dump($res);
        $this->assign('page',$p);
        $this->assign('page_c',$page_count);
        $this->assign('shw',$show);
        $this->assign('seh',$search);
        $this->assign('res',$res);
        $this->display();
    }
    public function tongyi(){
        $id = I('get.id');
        $res = M('service')->save(['id'=>$id,'status'=>'1']);
        if ($res) {
            echo 1;
        }
    }

}

?>