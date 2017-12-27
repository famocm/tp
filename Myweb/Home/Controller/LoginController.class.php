<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends AllController{
	//加载登录模板
	public function login(){
		$this->display("Login/login");
	}

	public function checkname(){
		$username=I('post.username');
		//实例化model类
		$mod=M('Users');
		$list=$mod->select();
		// var_dump($list);exit;
		$arr=array();
		//遍历
		foreach ($list as $key => $value) {
			$arr[$key]=$value['username'];
		}
		// var_dump($arr);exit;
		if(in_array($username,$arr)){
			echo 1;
		}else{
			echo 0;
		}
	}

	public function checkpass(){
		// $password=md5(I('post.password'));
		//实例化model类
		$arr=array();
		$username=I('post.username');
		$password=md5(I('post.password'));
		$mod=M('Users');
		$arr['username']=$username;
		$list=$mod->where($arr)->select();
		foreach ($list as $key => $value) {
			
		}
		if($password==$value['password']){
			echo 1;
		}else{
			echo 0;
		}
		
	}

	//登录
	public function dologin(){
		$username=I('post.username');
		$password=md5(I('post.password'));
		// echo $username;exit;
		$mod=M('Users');
		$list=$mod->where("username='{$username}' and password='{$password}' ")->select();
		// echo $mod->getLastSql();exit;
		// var_dump($list);exit;
		foreach($list as $key=>$value){

		}
		if($value['status']!=0){
			$_SESSION['username2']=$value['username'];
			$_SESSION['status2']=$value['status'];
			$_SESSION['sex2']=$value['sex'];
			$_SESSION['phone2']=$value['phone'];
			$_SESSION['email2']=$value['email'];
			$_SESSION['pic2']=$value['pic'];
			$_SESSION['id2']=$value['id'];
			$_SESSION['week2']=date("N",time());
			$_SESSION['year2']=date("Y",time());
			$_SESSION['mounth2']=date("m",time());
			$_SESSION['day2']=date("d",time());
			$this->success('登录成功',U("Index/index"));
		}else{
			$this->error('您的用户没激活,请先用邮箱激活再重新登录',U('Login/login'));
		}	
		
		
	}

	// 退出时删除session
	public function loginout(){
		// session('username2',null);
		// session('status2',null);
		// session('email2',null);
		// session('phone2',null);
		// session('id2',null);
		session(null);
		$this->success('退出成功',U('Index/index'));
	}

	public function respass(){
		//加载重置密码页面
		$this->display('Login/index');
	}
	
	public function checkemail(){
        //获取参数
        $email=$_GET['email'];
        //实例化
        $mod=M("Users");
        //获取数据
        $list=$mod->select();
        //遍历
        $arr=array();
        foreach($list as $key=>$value){
            $arr[$key]=$value['email'];
        }

        if(in_array($email,$arr)){
            echo 1;
        }else{
            echo 0;
        }
    }

    public function forget(){
    	// echo "111";
    	$email=I('post.email');
    	//实例化
    	$mod=M('Users');
    	$list=$mod->where("email='{$email}'")->find();
    	// var_dump($list);exit;
    	$ss=sendMail($email,"重置密码","<a href='http://localhost/test/index.php/Home/Login/reset?id={$list['id']}&token={$list['token']}'>重置密码</a>");
    	if($ss){
    		$this->success('邮件发送成功,请尽快修改密码',U('Login/index'));
    	}else{
    		$this->error('邮件发送失败');
    	}
    	// $this->success('邮件发送成功',U('Login/index'));
    }

    //密码重置
    public function reset(){
    	// echo "111";
    	//获取id
    	$id=I('get.id');
 	   	$token=I('get.token');
 	   	// echo $token;
 	   	//获取数据
 	   	$info=M('Users')->where("id=$id")->find();
 	   	// var_dump($info);exit;
 	   	if($token==$info['token']){
            $this->assign('id',$id);
            //加载重置密码模板
            $this->display('Login/index1'); 
        }
    }

    public function doreset(){
    	//实例化
    	$mod=M('Users');
    	//获取id
    	$id=I('post.id');
    	// echo $id;
    	$data['password']=md5(I('post.password'));
    	$data['token']=rand(10000,50000);
    	// var_dump($data);exit;
    	if($mod->where("id=$id")->save($data)){
    		$this->success('重置成功',U('Login/login'));
    	}else{
    		$this->error('重置失败');
    	}
    }
}
?>