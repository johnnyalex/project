<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller {
    public function index(){
        // echo '后台的index';
        //实例化对象
        $user = M('user');
        //统计总数
        $count = $user->count();
        //实例化分页类
        $Page = new \Think\Page($count,10);
        //获取limit
        $limit = $Page->firstRow.','.$Page->listRows;
        //分页显示输出
        $pages = $Page->show();
        //查询
        $users = $user->limit($limit)->select();
        // var_dump($users);
        // die;
        //分配变量
        $this->assign('users',$users);
        $this->assign('pages',$pages);
        //解析模板
        $this->display();

    }
    public function add(){
        // echo '后台用户的的添加';
        $this->display();

    }
    public function save(){
        // echo '后台用户的的添加';
        $this->display();

    }

    public function addimage(){
       // var_dump($_POST);
       //  var_dump($_FILES);
       //  die;

        $user = M('user');
        //处理图片上产
        if ($_FILES['pic']['error']==0) {
            $upload = new \Think\Upload();//实例化上传类
            $upload ->maxSize = 3145728; //上传最大值
            $upload->exts = ['jpg','gif','png','jpeg'];//图片类型
            // 手动设置网站根目录
            $upload ->rootPath = './Public';//
            $upload->savePath = '/Uploads/';//设置附件上传目录
            $info = $upload->upload();//上传文件
            if (!$info) {
                $this->error($upload->getError());
            }else{
                $str = $info['pic']['savepath'].$info['pic']['savename'];
                //写入post
                $_POST['pic'] = $str;
            }
        }
        //创建数据 去除非法字段
        $user->create();
        //执行添加
        $res = $user->add();
        //判断
        if ($res) {
            $this->success('添加成功',U('Admin/Home/center'));
        }else{
            $this->error('添加成功',U('Admin/Home/center'));

        }

    }
}
