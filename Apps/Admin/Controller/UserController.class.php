<?php
namespace Admin\Controller;
use Think\Controller;
class UserController extends CommonController {
    public function index(){
        //echo '后台的index';
        //实例化对象
        $user = M('user');
        //获取关键字
        if (!empty($_GET['keyword'])) {
            $where = " username like '%".$_GET['keyword']."%'";
        }else{
            $where = '';
        }
        //每页默认显示条数
        $num = !empty($_GET['num'])?$_GET['num']:5;
        //统计总数
        $count = $user->where($where)->count();
        //实例化分页类
        $Page = new \Think\Page($count,$num);

        //获取limit
        $limit = $Page->firstRow.','.$Page->listRows;
        //分页显示输出
        $pages = $Page->show();

        //查询
        $users = $user->limit($limit)->select();
        // var_dump($users);
        for($i = 0;$i < count($users);$i++){
            if($users[$i]['status'] == 1)
                $users[$i]['status'] = '正常';
            else if($users[$i]['status'] == 0)
                $users[$i]['status'] = '锁定';
        }
        $this->assign('status',$status);
        //分配变量
        $this->assign('users',$users);
        $this->assign('pages',$pages);

        //解析模板
        $this->display();

    }
    // 锁定否
    public function user_status(){
        $uer = M('user');
        $uer->create();
        $res = $uer->save();
        if($res)
            echo 1;
    }
    public function add(){
        // echo '后台用户的的添加';
        $this->display();

    }

    //执行插入
    public function insert(){
/*        var_dump($_POST);
        var_dump($_FILES);
*/
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
        $uid = $user->add();

        //添加附表
        $userinfo = M('userinfo');
        //添加用户id
        $_POST['uid']=$uid;

        //处理hobby 字段
        if (!empty($_POST['hobby'])) {
            $_POST['hobby'] = implode(',',$_POST['hobby']);
        }

        //再次执行 数据的插入

        $userinfo->create();
        $res = $userinfo->add();
        //判断
        if ($res) {
            $this->success('添加成功',U('Admin/User/index'));
        }else{
            $this->error('添加成功',U('Admin/User/index'));

        }

    }
    //执行删除
    public function delete(){
        // 接受id
        $id = I('get.id');
        //创建对象模型 
        $m = new \Think\Model();
        //开启事务
        $m -> startTrans();
        //创建对象 执行删除
        $one = $m->table('user')->delete($id);

        $two = $m->table('userinfo')->where(array('uid'=>$id))->delete();

        if ($one&&$two) {
            echo 0;
            //发送事务
            $m->commit();
        }else{
            echo 1;
            $m->rollback();
        }
    }
    public function edit(){
        //实例化一下
        $user = M('user');
        //保存
        $user->create();
        $res = $user->save();
        if ($res) {
            echo 0;     
            die;
        }else{
            echo 1;
            die;
        }        
    }
}
