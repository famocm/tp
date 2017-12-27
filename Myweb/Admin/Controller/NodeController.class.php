<?php 
namespace Admin\Controller;
use Think\Controller;
class NodeController extends AllowController {
	public function index(){
		 //获取搜索条件
        $where=array();
        if(!empty($_GET['name'])){
            $where['name']=array('like',"%{$_GET['name']}%");
        }
        // var_dump($where);eixt;
    	//实例化查询数据
    	$mod=M('Nodes');
        // 获取总条数

    	$tot=$mod->where($where)->Count();
    	// var_dump($list);
        //分页
        //实例化分页类
        $page=new \Think\Page($tot,10);
        $page->setConfig("prev",'上一页');
        $page->setConfig("next",'下一页');
        $page->setConfig("first",'首页');
        $page->setConfig("last",'末页');
        $page->setConfig("theme","%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%");
        //获取数据信息
        $list=$mod->where($where)->limit($page->firstRow,$page->listRows)->select();
    	// 分配数据
    	$this->assign('list',$list);
        $this->assign('pageinfo',$page->show());
    	//加载模板
    	$this->display("Node/index1");
	}
	// 添加角色
	public function add(){
		$this->display("Node/add1");
	}

	// 执行添加角色
	public function insert(){
		$mod=D('Nodes');
		if(!$mod->create()){
    		$this->error($mod->getError());
    	}
		if($mod->add()){
			$this->success('添加成功',U('Node/index'));
		}else{
			$this->error("添加失败");
		}
	}

	// 修改
	public function edit(){
		$mod=M("Nodes");
		$info=$mod->find(I('get.id'));
		$this->assign('info',$info);
		$this->display('Node/edit');
	}

	// 执行修改
	public function update(){
		$mod=M('Nodes');
		$mod->create();
		if($mod->save() !== false){
			$this->success('修改成功',U('Node/index'));
		}else{
			$this->error("修改失败");
		}
	}

	// 删除
	public function delete(){
		$mod=M('Nodes');
		if($mod->delete(I('get.id'))){
			$this->success('删除成功',U('Node/index'));
		}else{
			$this->error("删除失败");
		}
	}

	public function nodelist(){
		$mod=M('roles_nodes');
		$rid=I('post.rid');
		$mod->where("rid=$rid")->delete();
		// 把当前选择的权限信息添加进去
		foreach($_POST['pid'] as $v){
			$data['rid']=$rid;
			$data['pid']=$v;
			$mod->add($data);
		}
		$this->success('分配权限成功',U("Root/index"));
	}
}
 ?>