<?php 
namespace Home\Controller;
use Think\Controller;
class OrderController extends AllowController{
	// 确认收货操作
	public function confirm(){
        // echo "执行确认收货";
         $id=I("get.id");
        // var_dump($id);
        //实例化
        $mod=M("Orders");
        // $list=$mod->where("id=$id")->select();
        $data['status']=3;
        // var_dump($data);exit;
         if($mod->where("id=$id")->save($data)){
            $this->success("亲!请前去评价我们的商品吧,感谢您对我们的支持",U("Personal/order"));
           
        }
    }

    //提醒发货操作
    public function remind(){
        // echo "提醒收货";
        $id=I("get.id");
        // var_dump($id);
        $this->success("亲已经收到您的提醒,火速派件中,请耐心等待,感谢您的支持",U("Personal/order"));
    }
    
     
}
?>