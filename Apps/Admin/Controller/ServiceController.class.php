<?php 
namespace Admin\Controller;
use Think\Controller;
class ServiceController extends Controller {
    public function index(){
        $service=M('service');
        $services=$service->select();
        // var_dump($services);die;
        
        $this->assign('services',$services);

        $this->display();
    }     

    public function update(){

        

    	$this->display();
    }  


    public function change(){


        $this->display();
    }

}

?>