<?php
namespace Admin\Controller;
use Think\Controller;
class DetailController extends AllowController {
    public function index(){
      // echo "222";exit;
    	//获取搜索条件
       $where=array();
       if(!empty($_GET['name'])){
        $where['name']=array('like',"%{$_GET['name']}%");
       } 
       $mod=M("Order_goods");
       // $list=$mod->select();
       // var_dump($list);exit;
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
       // var_dump($list);exit;
       // 分配数据
       $this->assign("list",$list);
       //分页信息
       $this->assign("pageinfo",$page->show());
        //加载模板
        $this->display("Detail/index");
    }
    
}
?>