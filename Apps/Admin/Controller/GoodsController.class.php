<?php 
namespace Admin\Controller;
use Think\Controller;
class GoodsController extends CommonController {
    public function index(){
    	$goods = M('goods');
            // var_dump($_GET);
            $name = $_GET['name'];
            // $where['name'] = array('like','%'.$_GET['name'].'%');
            if($name)
            $where = "name like '%".$_GET['name']."%'";
        else
            $where = '';
         //获取每页显示的数量
       $num = !empty($_GET['show']) ? $_GET['show'] : 10;
        $goodlist = $goods->select();
        // var_dump($goodlist);
        
        //统计总数
        $count = $goods->where($where)->count();
        // 实例化分页类
        $Page = new \Think\Page($count,$num);
        //获取limit
        $limit = $Page->firstRow.','.$Page->listRows;
        $pages = $Page->show();
        $goodlist = $goods->limit($limit)->where($where)->select();

          $this->assign('goodlist',$goodlist);
    	$this->assign('pages',$pages);

    	$this->display();
    }
//商品管理上传图片
    public function img(){

         // var_dump($_POST);
         // echo '<hr>';
        // var_dump($_FILES);die;

        $goods_id = I('post.goods_id');
        // var_dump($_POST);
        // die;
         // var_dump($goods_id);
         // echo '<hr>';
        // var_dump($_FILES);die;

        $images = M('image');
      
        //处理图片上传
        if($_FILES['name']['error'] == 0){
            $upload = new \Think\Upload();// 实例化上传类    
            $upload->maxSize   =   3145728 ;// 设置附件上传大小   
            $upload->exts      =   array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型    
            $upload->rootPath = './Public';//手动设置网站根目录
            $upload->savePath  =   '/Uploads/'; // 设置附件上传目录    
            $info   =   $upload->upload();    // 上传文件     
            if(!$info) {// 上传错误提示错误信息        
                $this->error($upload->getError());    
            }else{// 上传成功       
                // $this->success('上传成功！'); 
                $str = $info['name']['savepath']. $info['name']['savename'];
                // var_dump($str);
                $_POST['name'] = $str;
            }
        }

       

       $_POST['goods_id'] = $_POST['id'];
       unset($_POST['id']);

        //创建数据
        $images->create();
        //执行添加
        if($images->add()){
             //添加成功
            $this->success('添加成功',U('Admin/Goods/image'));
            $this->success('添加成功',U('Admin/Goods/index'));
        }else{
            //失败
            $this->error('添加失败',U('Admin/Goods/image'));
        }

    }


    //商品图片管理
    public function image(){
        $images = M('image');   
        $goods_id = I('get.id');
        var_dump($goods_id);   
        // var_dump($sql);
       $imagelist = $images->select();
        $goods_id = I('get.id');
        // var_dump($goods_id);     
        $images = M('image'); 
        $sql = "SELECT A.*,B.id gid FROM image A,goods B WHERE A.goods_id=B.id AND A.goods_id=".$goods_id;
      
       $imagelist = $images->query($sql);
        $this->assign('imagelist',$imagelist);
        $this->assign('goods_id',$goods_id);

        $this->display();

    }

    public function add(){
        //创建表对象
        $cate = M('category');
        $cates = $cate->query('select * from category order by concat(path,id) asc');
        
        foreach ($cates as $k => $v) {
            //计算出分隔多少次
            $c = count(explode(',',$v['path']))-2;
            $cates[$k]['name'] = str_repeat('|-----',$c).$v['name'];
        }
        //分配变量
        $this->assign('cates',$cates);

        //解析模板
        $this->display();
    }

    public function insert(){
        var_dump($_POST);
        // var_dump($_POST);
    	// var_dump($_FILES);
        $goods = M('goods');
      
        //处理图片上传
        if($_FILES['pic']['error'] == 0){
            $upload = new \Think\Upload();// 实例化上传类    
            $upload->maxSize   =   3145728 ;// 设置附件上传大小   
            $upload->exts      =   array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型    
            $upload->rootPath = './Public';//手动设置网站根目录
            $upload->savePath  =   '/Uploads/'; // 设置附件上传目录    
            $info   =   $upload->upload();    // 上传文件     
            if(!$info) {// 上传错误提示错误信息        
                $this->error($upload->getError());    
            }else{// 上传成功       
                // $this->success('上传成功！'); 
                $str = $info['pic']['savepath']. $info['pic']['savename'];
                // var_dump($str);
                $_POST['pic'] = $str;
            }
        }
        if($_POST['price']<=0){$_POST['price']=0;}
        if($_POST['freight']<=0){$_POST['freight']=0;}
        if($_POST['stock']<=0){$_POST['stock']=0;}
        if(empty($_POST['name']))
            $this->error('商品名称不能为空',U('Admin/Goods/index'));
        //创建数据
        $goods->create();
        //执行添加
        if($goods->add()){
             //添加成功
            $this->success('添加成功',U('Admin/Goods/index'));
        }else{
            //失败
            $this->error('添加失败',U('Admin/Goods/index'));
        }
    }
//删除商品管理中图片
  public function del(){
    $id = I('get.id');
    var_dump($id);
    $images = M('image');
    $sql = "SELECT A.goods_id,B.id FROM image A,goods B WHERE A.goods_id=B.id";
    $res =  $images->delete($id);
    if($res)
    echo 1;
  }  
//显示处理是否是封面
    public function is_face(){
        $images = M('image');
        $images->create();
        $res = $images->save();
        // echo $goods->_sql();
        $images->where('id!='.$_POST['id'])->data('is_face=0')->save();
        // echo $images->_sql();
        $images->create();
        $res = $images->save();
        if($res)
            echo 1; 
    }

//显示处理是否上架
    public function goods_status(){
        $goods = M('goods');
        $goods->create();
        $res = $goods->save();
        // echo $goods->_sql();
        // die;
        if($res)
            echo 1; 
    }


    //显示处理是否热销
    public function goods_host(){
        $goods = M('goods');
        $goods->create();
        $res = $goods->save();
        // echo $goods->_sql();
        // die;
        if($res)
            echo 1; 
    }

     //显示处理是否精品
    public function goods_best(){
        $goods = M('goods');
        $goods->create();
        $res = $goods->save();
        // echo $goods->_sql();
        // die;
        if($res)
            echo 1; 
    }

 //显示处理是否新款
    public function goods_new(){
        $goods = M('goods');
        $goods->create();
        $res = $goods->save();
        // echo $goods->_sql();
        // die;
        if($res)
            echo 1; 
    }



//删除商品
  public function delete(){
    $id = I('get.id');
    // var_dump($id);die;
    $goods = M('goods');
    $res =  $goods->delete($id);
    if($res)
    echo 1;
  }    

    //商品修改
    public function update(){
        // var_dump(I('get.id'));
        $goods = M('goods');
        $id = I('get.id');
        $info = $goods->find($id);
        // echo $goods->_sql();
        // var_dump($info);
        $info['describe'] = htmlspecialchars_decode($info['describe']);
        // echo $info['describe'];
        $this->assign('info',$info);
        $this->display();
    }  


    //执行修改
    public function change(){

        // var_dump($_POST);

        
        // var_dump($_FILES);
        $goods = M('goods');
         if($_FILES['pic']['error'] == 0){
            $upload = new \Think\Upload();// 实例化上传类    
            $upload->maxSize   =   3145728 ;// 设置附件上传大小   
            $upload->exts      =   array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型    
            $upload->rootPath = './Public';//手动设置网站根目录
            $upload->savePath  =   '/Uploads/'; // 设置附件上传目录    
            $info   =   $upload->upload();    // 上传文件     
            if(!$info) {// 上传错误提示错误信息        
                $this->error($upload->getError());    
            }else{// 上传成功       
                // $this->success('上传成功！'); 
                $str = $info['pic']['savepath']. $info['pic']['savename'];
                // var_dump($str);
                $_POST['pic'] = $str;
            }
            //获取原图的路径
            $res = $goods->find($_POST['id']);
            $pic = $res['pic'];
            //删除图片
            unlink('./Public'.$pic);
        }
        // var_dump($_POST);die;

        if($_POST['price']<=0){$_POST['price']=0;}
        if($_POST['freight']<=0){$_POST['freight']=0;}
        if($_POST['stock']<=0){$_POST['stock']=0;}
         // 创建数据
        $a=$goods->create();
        // dump($a);
        // die();
        //执行更新
        $res = $goods->save();

        if($res){
             //添加成功
            $this->success('修改成功',U('Admin/Goods/index'));
        }else{
            //失败
            $this->error('修改失败',U('Admin/Goods/index'));
        }


        
    }




   



}

?>