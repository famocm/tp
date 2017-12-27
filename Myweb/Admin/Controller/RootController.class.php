<?php
// 管理员模块
namespace Admin\Controller;
use Think\Controller;
class RootController extends AllowController {
	//用户列表页
    public function index(){
    	//获取搜索条件
    	// $where=array();
    	// if(!empty($_GET['username'])){
    	// 	$where['username']=array('like',"%{$_GET['username']}%");
    	// }
        $mod=M("Roots");
    	$count=$mod->Count();
        // var_dump($count);
        //规定每页显示的条数
        $rev='2';
        //获取总页数
        $sums=ceil($count/$rev);//11
        // var_dump($sums);
        //数字分页
        $pp=array();//方便列表页遍历
        for($i=1;$i<=$sums;$i++){
            $pp[$i]=$i;
        }

        $page=$_GET['page'];//当前页
        if(empty($page)){
            $page=1;
        }

        //获取偏移量
        $offset=($page-1)*$rev;
        //组合sql语句
        $data=$mod->query("select * from roots limit $offset,$rev");
        // $data=$mod->where($where)->limit($offset,$rev)->select();
        // echo $mod->getLastSql();
        //Ajax分离
        if(IS_AJAX){
            $this->assign('data',$data);
            $this->display('Root/test');
            exit;
        }
        // var_dump($pp);
        $this->assign('pp',$pp);
        $this->assign('data',$data);
        $this->display('Root/index');
    }

    public function add(){
            $this->display('Root/add');
    	
    }

    //执行添加
    public function insert(){
    	//实例化
    	$mod=D('roots');
        $mods=M('roots_roles');
        

    	if(!$mod->create()){
    		$this->error($mod->getError());
    	}
    	//执行添加
    	if($id=$mod->add()){
    		$this->success('添加成功',U("Root/index"));
            $data['rid']=1;
            $data['uid']=$id;
            $mods->add($data);
    	}else{
    		$this->error('添加失败');
    	}

    }

    //执行删除
    public function delete(){
        $id=I('get.id');
        $uid=$_SESSION['islogin'];
        $mod=M('roots_roles');
        $mods=M('Roots');
        $list=$mod->where("uid=$uid")->select();
        $list1=$mod->where("uid=$id")->select();
        // var_dump($list1);
        // var_dump($list);
        foreach($list as $key=>$value){

        }
        foreach ($list1 as $key => $valuee) {
            
        }
        // var_dump($valuee);
        if($value['rid']==2&&$valuee['rid']==2){
            $this->error("没有权限操作",U('Root/index'));
        }else{
        	
            if($mods->delete($id)){
                $this->success("删除成功",U('Root/index'));
            }else{
                $this->error("删除失败",U('Root/index'));
            }


        }

        
       
       
        	
    }


    public function edit(){
        //权限为3才能修改
        	$id=I("get.id");
            //实例化
            $mod=M('roots');
            $list=$mod->find($id);
            // var_dump($list);exit;
            $this->assign("info",$list);
            $this->display("Root/edit");
    	
    }

    //执行修改
    public function update(){
    	//实例化
    	$mod=D("roots");
        if(!$mod->create()){
            $this->error($mod->getError());
        }
        // var_dump($data);exit;
    	if($mod->save() !== false){
    		$this->success("修改成功",U("Root/index"));
    	}else{
    		$this->error("修改失败");
    	}

    }
    public function rolelist(){
        $id=I('get.id');
        // 1.获取用户信息
        $roots=M("Roots")->find($id);
        // echo M("Roots")->getLastSql();die;
        // var_dump($roots);
        $this->assign('roots',$roots);
        // 2.获取所有的角色信息
        $rolelist=M('Roles')->field("id,name")->select();
        // var_dump($rolelist);die;
        $this->assign('rolelist',$rolelist);
        //3. 获取当前用户的角色信息
        $data=M('roots_roles')->where("uid='$id'")->select();
        // var_dump($data);die;
        $rids=array();
        foreach($data as $v){
            $rids[]=$v['rid'];
        }
        // var_dump($rids);die;
        $this->assign('rids',$rids);
        $this->display('Role/rolelist');
    }
    
}
?>