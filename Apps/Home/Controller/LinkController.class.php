<?php 
namespace Home\Controller;
use Think\Controller;
class LinkController extends Controller {
	
    public function link(){
        $this->assign('title','友情链接');
        $link = M('link');
        $links = $link ->where('dis=1')->select();
        // var_dump($links);
        $this->assign('links',$links);

        $this->display();
    	
}


}
 ?>