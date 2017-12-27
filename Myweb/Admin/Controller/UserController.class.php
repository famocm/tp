<?php
// 用户管理模块
namespace Admin\Controller;
use Think\Controller;
class UserController extends AllowController {
	//用户列表页
    public function index(){
    	//获取搜索条件
    	$where=array();
    	if(!empty($_GET['username'])){
    		$where['username']=array('like',"%{$_GET['username']}%");
    	}
    	//实例化Model类
    	$mod=M('Users');
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
    	//分配数据
    	$this->assign('list',$list);
    	$this->assign('pageinfo',$page->show());

    	//加载模板
    	$this->display("User/index");
    }

    public function add(){
    	$this->display('User/add');
    }

    //执行添加
    public function insert(){
    	//实例化
    	$mod=D('Users');
    	//封装信息
        if(!$mod->create()){
            //添加失败 显示规则对应的错误信息
            $this->error($mod->getError());
        }

    	//执行添加
    	if($mod->add()){
            // echo $mod->getLastSql();die;
    		$this->success('添加成功',U("User/index"));
    	}else{
    		$this->error('添加失败');
    	}

    }

    //执行删除
    public function delete(){
    	// 获取id
    	$id=I("get.id");
    	//实例化
    	$mod=M('Users');
    	if($mod->delete($id)){
    		$this->success("删除成功",U("User/index"));
    	}else{
    		$this->error("删除失败");
    	}
    }

    public function edit(){
    	$id=I("get.id");
    	$info=M("Users")->find($id);
    	$this->assign("info",$info);
    	$this->display("User/edit");
    }

    //执行修改
    public function update(){
    	//实例化
    	$mod=M("Users");
    	if(!$mod->create()){
            //添加失败 显示规则对应的错误信息
            $this->error($mod->getError());
        }
    	if($mod->save() !== false){
    		$this->success("修改成功",U("User/index"));
    	}else{
    		$this->error("修改失败");
    	}

    }

    //Ajax批量删除数据
    public function del(){
        // echo "Ajax";
        //获取a参数 数组
        $uname=isset($_GET['uname'])?$_GET['uname']:"";

        if($uname==""){
            echo "至少选中一条数据";
            exit;
        }

        // //遍历
        foreach($uname as $key=>$value){
            if(M("users")->delete($value)){
                
            }
        }

        echo 1;

    }

    //Ajax修改
    public function ajaxname(){
         $id=I('post.id');
         // 实例化
         $mod=M("Users");
         $info=$mod->find($id);
        //获取参数值
        $data1['username']=I('post.usernames');
        if(!preg_match("/^\w{4,8}$/",$data1['username'])){
            echo "用户名必须是4-8位任意数字字母下划线组成";
            exit;
        }
        if($data1['username']==$info['username']){
            echo "数据没有修改";
            exit;
        }
        //执行修改
        if($mod->where("id=$id")->save($data1)){
            echo "修改成功";
        }else{
            echo "用户名重名";
        }

    }

    public function ajaxemail(){
         $id=I('post.id');
         // 实例化
         $mod=M("Users");
         $info=$mod->find($id);
        //获取参数值
        $data1['email']=I('post.email');
        if(!preg_match("/^\w+@\w+(\.\w+)$/",$data1['email'])){
            echo "邮箱格式不对";
            exit;
        }
        if($data1['email']==$info['email']){
            echo "数据没有修改";
            exit;
        }
        //执行修改
        if($mod->where("id=$id")->save($data1)){
            echo "修改成功";
        }else{
            echo "邮箱账号已经存在";
        }

    }

}
?>