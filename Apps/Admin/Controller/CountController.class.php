<?php
namespace Admin\Controller;
use Think\Controller;
class CountController extends CommonController {
    public function like(){
        $res = M()->table('userinfo')->where(' like_id != " " ')->select();
        foreach ($res as $key => $value) {
            $like_list .=$value['like_id'];
        }
        $like_list = explode(',',$like_list);
        array_pop($like_list);
        $like_list = array_count_values($like_list);
        arsort($like_list);//排序
        $like_list = array_slice($like_list, 0,10,true);//取出前10 条
        $e = array_keys($like_list);//键 id
        $ee = implode(',', $e); //拼接含有顺序的gid
        $f = array_values($like_list);//值 次数
        $num = count($f);
        $sql = 'select goods.id gid,goods.name gname,goods.pic gpic,seller.id sid,seller.name sname from goods  left join seller on goods.sid = seller.id where goods.id in ('.$ee.')';
        $res = M('goods')->query($sql);//查询
        for ($i=0; $i < count($f); $i++) { 
            $res[$i]['count']=$f[$i];
            $res[$i]['num']=$i+1;
        }
        // var_dump($res);
        $this->assign('res',$res);
        $this->display();

    }
    public function sell(){
        $orders = M('order')->where(['status'=>'4'])->order('price_total desc')->select();
        var_dump($orders);
        $this->display();
    }

}
