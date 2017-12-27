<?php
namespace Admin\Controller;
use Think\Controller;
class OrderController extends AllowController {
    public function index(){
    	//获取搜索条件
       $where=array();
       if(!empty($_GET['sname'])){
        $where['sname']=array('like',"%{$_GET['sname']}%");
       } 
       // var_dump($where);
       // 实例化model
       $mod=M("Orders");
       //查询总条数
       $tot=$mod->where($where)->Count();
       // var_dump($tot);
       // 分页
       // 实例化分页类
       $page=new \Think\Page($tot,10);
       // 初始化参数
       $page->setConfig("prev",'上一页');
       $page->setConfig("next",'下一页');
       $page->setConfig("first",'首页');
       $page->setConfig("last",'末页');
       $page->setConfig("theme","%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%");
       // 获取数据
       $list=$mod->where($where)->limit($page->firstRow,$page->listRows)->select();
       // var_dump($list);
       // 分配数据
       $this->assign("list",$list);
       //分页信息
       $this->assign("pageinfo",$page->show());
        //加载模板
        $this->display("Order/index");
         
    }
    public function edit(){
        // echo "修改";
        $id=I("get.id");
        $info=M("Orders")->find($id);
        // var_dump($info);exit;
        if($info['status']==1){
           $this->assign("info",$info);
           // 加载模板
           $this->display("Order/edit");
      }else{
        $this->error("订单处理中,请勿操作");
      }

        
    }

    //修改
    public function update(){
        // echo "xiugai";
        //实例化
        $mod=M('Orders');
        $mod->create();
        // var_dump($list);
        if($mod->save() !==false){
            $this->success("修改成功",U('Order/index'));
        }else{
            $this->error("修改失败");
        }
    }

    //删除
    public function delete(){
        // //判断传输过来的物品状态是否为 无效订单
        // // 获取id
        $id=I("get.id");
        // echo $id;
        // //实例化
        $mod=M('Orders');
        $list=$mod->find($id);
        // var_dump($list);
        if($list['status']==4){
          echo "订单已无效将进行其他操作";
        }else{
          $this->error("订单处理中...不可删除");
        }
    }


    //ajax批量操作
    public function del(){
      //获取a参数数组
      $order=isset($_GET['order'])?$_GET['order']:"";
      if($order==" "){
        // echo "至少选择一条数据";
        // exit;
      }
       // //遍历
        // foreach($order as $key=>$value){
        //     if(M("Orders")->delete($value)){
                
        //     }
        // }
        // echo 1;
    }
}
?>