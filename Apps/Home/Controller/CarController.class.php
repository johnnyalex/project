<?php
namespace Home\Controller;
use Think\Controller;
class CarController extends Controller {
    public function car(){
        //解析模板
        var_dump($_POST);
        $this->display();

    }
  
}
