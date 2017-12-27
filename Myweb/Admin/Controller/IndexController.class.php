<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    	//判断session是否存在
    	if(session('username1')){
    		$this->display('Index/index');
    	}else{
    		$this->display("Index/login");
    	}
    	
    }
    
    public function dologin(){
        //加载登录模板
        $arr=array();
        $data['username']=I('post.username');
        $data['password']=md5(I('post.password'));
        if(!empty($data['username'])){
            if(!empty($data['password'])){
                $arr['username']=$data['username'];
                $mod=M('Roots');
                $list=$mod->where($arr)->select();
                foreach($list as $info){
                
                }
                // 判断用户名是否相等
                if($data['username']==$info['username']){
                    // 判断密码是否相等
                    if($data['password']==$info['password']){
                        $_SESSION['username1']=$info['username'];
                        $_SESSION['islogin']=$info['id'];
                        // 获取当前用户的权限
                        $list=M("Roots")->query("select n.controller,n.function from __PREFIX__roles_nodes rn, __PREFIX__roots_roles rr, __PREFIX__nodes n where rn.rid=rr.rid and rn.pid=n.id and rr.uid={$info['id']}");
                        // var_dump($list);die;
                        foreach($list as $v){
                            $nodelist[$v['controller']][]=$v['function'];
                            if($v['function']=="add"){
                            $nodelist[$v['controller']][]="insert";
                            }
                            if($v['function']=="edit"){
                                $nodelist[$v['controller']][]="update";
                            }

                        }
                        // 把当前用户的权限存储在session中
                            session("nodelist",$nodelist);
                            // var_dump(session());die;
                        $this->success('登录成功',U("Index/index"));
                    }else{
                        $this->error('登录失败');
                    }
                }else{
                    $this->error('登录失败');
                }
            } 
        }
    }




   //退出时删除session
    public function logout(){
        session('username1',null);
        $this->success('退出成功',U('Index/index'));
    }  
}
?>