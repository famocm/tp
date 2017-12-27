<?php
namespace Home\Controller;
use Think\Controller;
class SearchController extends AllController{
	public function getCatesbypid($pid){
        $s=M("Cates")->where("pid=$pid")->select();
        $data=array();
        //遍历
        foreach($s as $key=>$value){
            $value['shop']=$this->getCatesbypid($value['id']);
            $data[]=$value;
        }
        return $data;
    }
	//加载列表页
	public function index(){
        $pid=I('get.id');
        // echo $pid;exit;
        $_SESSION['typeid']=$pid;
        $mod=M('Cates');
        $mods=M('Goods');
         //搜索
        $where=array();
        if(!empty($_GET['goods'])){
            $where['goods']=array('like',"%{$_GET['goods']}%");
        }
        // 分页
        $tot=$mods->where("typeid=$pid")->Count();
        //实例化page
        $page=new \Think\Page($tot,16);
        $page->setConfig("prev",'上一页');
        $page->setConfig("next",'下一页');
        $page->setConfig("first",'首页');
        $page->setConfig("last",'末页');
        $page->setConfig("theme","%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%");
        //获取数据
        $data=$mods->where("typeid=$pid and status!='3'")->limit($page->firstRow,$page->listRows)->select();
        // var_dump($data);exit;
        $this->assign("data",$data);
        $this->assign("pageinfo",$page->show());
        // $a=$page->show();
        // var_dump($a);die;
        // var_dump($list2);
        $this->assign('data',$data);
        // $this->assign("list2",$list2);
        $list=$this->getCatesbypid($pid);
        // var_dump($list);die;
        $name=$mod->where("id=$pid")->select();
        // var_dump($list);
        $this->assign('name',$name);
		$this->assign("list",$list);

		$this->display('Search/search');
	}

    //价格排序
    public function index1(){
        $id=$_SESSION['typeid'];
        // echo $id;exit;
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
        $this->assign('data',$data);
        $this->assign("pageinfo",$page->show());
        $this->display('Search/search');
    }

    //销量排序
    public function index2(){
        $id=$_SESSION['typeid'];
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
        $data=$mod->where("typeid=$id")->order('num desc')->limit($page->firstRow,$page->listRows)->select();
        // var_dump($data);
        $this->assign('data',$data);
        $this->assign("pageinfo",$page->show());
        $this->display('Search/search');
    }

    public function index3(){
        $mods=M('Goods');
        
         //搜索
        $where=array();
        if(!empty($_GET['goods'])){
            $where['goods']=array('like',"%{$_GET['goods']}%");
        }
        // var_dump($where);exit;
        //获取数据
        if(empty($_GET['goods'])){
            // 分页
            $tot=$mods->Count();
            //实例化page
            $page=new \Think\Page($tot,32);
            $page->setConfig("prev",'上一页');
            $page->setConfig("next",'下一页');
            $page->setConfig("first",'首页');
            $page->setConfig("last",'末页');
            $page->setConfig("theme","%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%");
            $data=$mods->order('cprice desc')->limit($page->firstRow,$page->listRows)->select();
            
            
            // var_dump($data);
        }else{
            // 分页
            $tot=$mods->where($where)->Count();
            //实例化page
            $page=new \Think\Page($tot,16);
            $page->setConfig("prev",'上一页');
            $page->setConfig("next",'下一页');
            $page->setConfig("first",'首页');
            $page->setConfig("last",'末页');
            $page->setConfig("theme","%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%");
            $data=$mods->where($where)->limit($page->firstRow,$page->listRows)->select();

            // var_dump($_SESSION['goods']);
        }
        // var_dump($data);exit;
        $this->assign("data",$data);
        $this->assign("pageinfo",$page->show());
        // $a=$page->show();
        // var_dump($a);die;
        $this->display('Search/search');
    }
}
  