<?php 
namespace Admin\Controller;
use Think\Controller;
class RoleController extends AllowController {
	public function index(){
		$mod=M("Roles");
		$list=$mod->select();
		$this->assign('list',$list);
		$this->display('Role/index1');
	}
	// 添加角色
	public function add(){
		$this->display("Role/add1");
	}

	// 执行添加角色
	public function insert(){
		$mod=D('Roles');
		if(!$mod->create()){
    		$this->error($mod->getError());
    	}
		if($mod->add()){
			$this->success('添加成功',U('Role/index'));
		}else{
			$this->error("添加失败");
		}
	}

	// 修改
	public function edit(){
		$mod=M("Roles");
		$info=$mod->find(I('get.id'));
		$this->assign('info',$info);
		$this->display('Role/edit');
	}

	// 执行修改
	public function update(){
		$mod=M('Roles');
		$mod->create();
		if($mod->save() !==false){
			$this->success('修改成功',U('Role/index'));
		}else{
			$this->error("修改失败");
		}
	}

	// 删除
	public function delete(){
		$mod=M('Roles');
		if($mod->delete(I('get.id'))){
			$this->success('删除成功',U('Role/index'));
		}else{
			$this->error("删除失败");
		}
	}

	public function rolelist(){
		// var_dump($_POST);
		$mod=M('roots_roles');
		$uid=I('post.uid');
		$mod->where("uid=$uid")->delete();
		// 把当前选择的角色信息添加进去
		foreach($_POST['rid'] as $v){
			$data['uid']=$uid;
			$data['rid']=$v;
			$mod->add($data);
		}
		$this->success('分配角色成功',U("Root/index"));
	}	

	public function nodelist(){
        $id=I('get.id');
        // echo $id;die;
        // 1.获取角色信息
        // $roles=M("Roles")->where("id=$id")->select();
        // var_dump($roles);die;
        $roles=M("Roles")->find($id);
        // var_dump($roles);die;
        $this->assign('roles',$roles);
        // 2.获取节点表信息
        $nodelist=M("Nodes")->field("id,name")->select();
        // var_dump($nodelist);die;
        $this->assign("nodelist",$nodelist);
        $data=M('roles_nodes')->where("rid=$id")->select();
        // var_dump($data);die;
        $pids=array();
        foreach($data as $v){
          // var_dump($v);
          $pids[]=$v['pid'];
        }
        // die;
        // var_dump($pids);die;
        $this->assign("pids",$pids);
        $this->display("Node/nodelist");
    }
}
 ?>