<?php
namespace Admin\Controller;
use Think\Controller;
class ArticleController extends AllowController {

	//列表页
    public function index(){
        // var_dump($_SESSION);die;
        //搜索
        // $where=array();
        if(!empty($_GET['goods'])){
            $where['goods_id']=array('like',"%{$_GET['goods']}%");
        }
        // var_dump($where);exit;
    	//实例化
    	$mod=M('Articles');
    	//获取总数据条数
    	$tot=$mod->where($where)->Count();
    	//实例化page
    	$page=new \Think\Page($tot,10);
    	$page->setConfig("prev",'上一页');
    	$page->setConfig("next",'下一页');
    	$page->setConfig("first",'首页');
    	$page->setConfig("last",'末页');
    	$page->setConfig("theme","%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%");
    	//获取数据
    	$list=$mod->where($where)->limit($page->firstRow,$page->listRows)->select();
        // echo $mod->getLastSql();exit;
        // var_dump($list);die;
    	$this->assign("list",$list);
    	$this->assign("pageinfo",$page->show());

    	//加载模板
    	$this->display("Article/index");
    }

    // 修改  回复
    public function edit(){
        $id=$_GET['id'];
    	//获取需要修改
    	$info=M("Articles")->find($id);
        // var_dump($info);die;
    	$this->assign('info',$info);
    	$this->display("Article/edit");
    }

    //执行修改
    public function update(){
        //获取要修该的id
        $id=I('post.id');
        // echo $id;die;
        //实例化model类
        $mod=M('Articles');
        // $list=$mod->find($id);
        $data['reply']=I('post.reply');
        // var_dump($data);exit;
        if($mod->where("id=$id")->save($data)){
            $this->success("回复成功",U("Article/index"));
        }else{
            $this->error("回复失败");
        }
    }

}