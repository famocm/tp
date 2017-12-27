<?php
namespace Home\Controller;
use Think\Controller;
class PublicController extends AllController{
	public function index(){
		// echo '111';
		//搜索
        $where=array();
        if(!empty($_GET['goods'])){
            $where['goods']=array('like',"%{$_GET['goods']}%");
        }
		// //价格排序
        $id=I('get.id');
        //实例化
        $mod=M('Goods');
        // 分页
        $tot=$mod->where("typeid=$id")->Count();
        //实例化page
        $page=new \Think\Page($tot,16);
        $page->setConfig("prev",'上一页');
        $page->setConfig("next",'下一页');
        $page->setConfig("first",'首页');
        $page->setConfig("last",'末页');
        $page->setConfig("theme","%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%");
        $data=$mod->where("typeid=$id")->order('cprice desc')->limit($page->firstRow,$page->listRows)->select();
        // var_dump($data);
         if(empty($_GET['goods'])){
            // 分页
            $tot=$mod->Count();
            //实例化page
            $page=new \Think\Page($tot,32);
            $page->setConfig("prev",'上一页');
            $page->setConfig("next",'下一页');
            $page->setConfig("first",'首页');
            $page->setConfig("last",'末页');
            $page->setConfig("theme","%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%");
            $data=$mod->limit($page->firstRow,$page->listRows)->select();
            // var_dump($data);
        }else{
            // 分页
            $tot=$mod->where($where)->Count();
            //实例化page
            $page=new \Think\Page($tot,16);
            $page->setConfig("prev",'上一页');
            $page->setConfig("next",'下一页');
            $page->setConfig("first",'首页');
            $page->setConfig("last",'末页');
            $page->setConfig("theme","%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%");
            $data=$mod->where($where)->limit($page->firstRow,$page->listRows)->select();
        }
        $this->assign('data',$data);
        $this->assign("pageinfo",$page->show());
        $this->display('Search/search');
	}
}
?>