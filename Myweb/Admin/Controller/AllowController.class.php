<?php
namespace Admin\Controller;
use Think\Controller;
class AllowController extends Controller {
	//初始化方法
    public function _initialize(){
    	//做session判断
    	if(!session('username1')){
    		$this->error("请先登录",U("Index/index"));
    	}
    	//判断当前用户是否具有当前权限
    	$controller=CONTROLLER_NAME;//获取当前控制器名
    	$action=ACTION_NAME;//获取当前控制器下的方法名
    	// echo $controller.":".$action;
    	// 获取当前用户的权限
    	$nodelist=$_SESSION['nodelist'];
    	// var_dump($nodelist);exit;
    	if(empty($nodelist[$controller])||!in_array($action, $nodelist[$controller])){
    		$this->error('对不起,您没有操作权限');
    	}
    }

    public function _empty(){
        $src = '/Public/404/u=44056108,772148444&fm=23&gp=0.jpg';
        echo "<img src=".$src." style='width:100%;height:100%;'>";
    }
}