<?php
namespace Admin\Controller;
use Think\Controller;
class FriendController extends AllowController{
	//友情链表页
	public function index(){
		//获取搜索条件
		$where=array();
		if(!empty($_GET['name'])){
			$where['name']=array('like',"%{$_GET['name']}%");
		}
		// var_dump($where);
		//实例化model类
		$mod=M('Friends');
		//获取总条数
		$tot=$mod->where($where)->Count();
		//实例化page类
		$page=new \Think\Page($tot,10);
		$page->setConfig("prev",'上一页');
    	$page->setConfig("next",'下一页');
    	$page->setConfig("first",'首页');
    	$page->setConfig("last",'末页');
    	$page->setConfig("theme","%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%");
    	//获取数据
    	$list=$mod->where($where)->limit($page->firstRow,$page->listRows)->select();
		// var_dump($list);
		//分配数据
		$this->assign('list',$list);
		$this->assign('pageinfo',$page->show());
		//加载模板
		$this->display('Friend/index');
	}
	//加载添加模板
	public function add(){
		$this->display('Friend/add');
	}

	//执行添加
	public function insert(){
		//实例化
		$mod=M('Friends');
		//封装信息
		$mod->create();
		//执行添加
		if($mod->add()){
			$this->success('添加成功',U('Friend/index'));
		}else{
			$this->error('添加失败');
		}
	}

	//执行删除
	public function delete(){
		$id=I('get.id');
		// echo $id;exit;
		//实例化
		$mod=M('Friends');
		if($mod->delete($id)){
			$this->success('删除成功',U('Friend/index'));
		}else{
			$this->error("删除失败");
		}
	}
	
	public function edit(){
		$id=I('get.id');
		$mod=M('Friends');
		$info=$mod->find($id);
		//分配数据
		$this->assign('info',$info);
		//加载模板
		$this->display('Friend/edit');
	}

	//执行修改
	public function update(){
		//实例化
		$mod=M('Friends');
		//封装信息
		$mod->create();
		if($mod->save()){
			$this->success('修改成功',U('Friend/index'));
		}else{
			$this->error('修改失败');
		}
	}

}
?>