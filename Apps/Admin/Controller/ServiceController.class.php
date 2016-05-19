<?php 
namespace Admin\Controller;
use Think\Controller;
class ServiceController extends Controller {
    public function index(){
        $service=M('service');
        // $service=M();
        // $sql = "SELECT A.*,B.id gid FROM service A,order B WHERE A.order_id=B.order_num";
        // $s=$service->table('service','order')->where('order.id=service.id')->select();
         // echo $service->_sql();
        // var_dump($s);
        $services=$service->select();
        // var_dump($service);
        // var_dump($services);die;
        // var_dump($s);
        // $s = $service->table()
        // $this->assign('s',$s);
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