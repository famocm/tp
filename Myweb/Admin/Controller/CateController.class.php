<?php
namespace Admin\Controller;
use Think\Controller;
class CateController extends AllowController {
    public function index(){
    	//分类的列表
        //获取搜索的条件
        $where=array();
        if(!empty($_GET['name'])){
            $where['name']=array('like',"%{$_GET['name']}%");
        }
    	//实例化
    	$mod=M('Cates');
    	$tot=$mod->where($where)->Count();
    	// var_dump($tot);exit;
    	// 实例化page类
    	$page=new \Think\Page($tot,10);
    	//初始化信息
    	$page->setConfig("prev",'上一页');
    	$page->setConfig("next",'下一页');
    	$page->setConfig("first",'首页');
    	$page->setConfig("last",'末页');
    	$page->setConfig("theme","%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%");
    	//调整类别顺序
    	$list=$mod->field("*,concat(path,',',id) as paths")->order("paths")->where($where)->limit($page->firstRow,$page->listRows)->select();
    	// var_dump($list);exit;
    	//添加分隔符
    	//遍历
    	foreach ($list as $key => $value) {
    		// var_dump($value);
    		// 把字符串转换为数组
    		$arr=explode(",",$value['path']);
    		// var_dump($arr);
    		// 获取数组的长度
    		$len=count($arr);
    		// 计算逗号个数
    		$dd=$len-1;
    		//连接分隔符(根据逗号个数来添加)
    		$list[$key]['name']=str_repeat("**|",$dd).$value['name'];
    	}
    	// var_dump($list);exit;
    	// 分配变量
    	$this->assign("list",$list);
    	//分页信息
    	$this->assign("pageinfo",$page->show());
    	//加载模板
    	$this->display("Cate/index");
    }
    //类别顺序的调整
    public function getCate(){
    	//实例化
    	$mod=M('Cates');
    	//调整类别顺序
    	$list=$mod->field("*,concat(path,',',id) as paths")->order("paths")->select();
    	//添加分隔符号
    	// 遍历
    	foreach ($list as $key => $value) {
    	// var_dump($value);
    	// 字符串转换数组
    	$arr=explode(",",$value['path']);
    	//获取数组长度
    	$len=count($arr);
    	//计算逗号个数
    	$dd=$len-1;
    	//连接分隔符
    	$list[$key]['name']=str_repeat("**|",$dd).$value['name'];
    	}
    	return $list;
    }
    //加载添加模板
    public function add(){
    	$mod=M('Cates');
    	$list=$this->getCate();
    	$this->assign('list',$list);
    	$this->display('Cate/add');
    }

    //执行添加
    public function insert(){
    	//实例化
    	$mod=M('Cates');
    	//1.如果添加的是顶级分类
    	//pid=0
    	//获取pid
    	$pid=$_POST['pid'];
    	if($pid==0){
    		//给顶级分类的path赋值
    		$_POST['path']=0;
    		// var_dump($_POST);
    	}else{
    		//不是顶级分类
    		//获取父类的信息
    		$s=$mod->where("id={$_POST['pid']}")->find();
    		//拼接path
    		$_POST['path']=$s['path'].",".$s['id'];
    		// var_dump($_POST);
    	}

    	//执行插入数据库操作
    	//封装信息
    	$mod->create();
    	// var_dump($mod->create());exit;
        if(empty($_POST['name'])){
            // echo "亲您还没有选择类别哦";
            // die("亲您还没有选择类别哦");
            $this->error("亲,您还没有填写类名哦");
        }
    	if($mod->add()){
    		$this->success("添加成功",U("Cate/index"));
    	}else{
    		$this->error("添加失败");
    	}
    }
    //删除操作
    public function delete(){
    	//判断当前类下有没有子类信息
    	//获取id
    	$id=$_GET['id'];
    	//实例化
    	$mod=M('Cates');
    	$res=$mod->where("pid=$id")->Count();
    	// echo $res;
    	if($res>0){
    		//代表有子类
    		$this->error("请先删除子类",U("Cate/index"));
    		exit;
           
    	}
          //关联商品表查询有无商品 有则不能删除类别 没有即可删除
        // $mod=M('cates');
        $num=$mod->where("typeid=$id")->field("goods.id as cid,cates.id as sid,cates.name as sname,goods.goods as cname")->join('goods on cates.id=goods.typeid','inner')->Count();
        // echo $mod->getLastSql();
        // die();
        if($num>0){
            // echo "该类下仍有商品没删除...请先删除";
            $this->error("该类下仍有商品...不能删除");
            exit;
        }

		//没有子类 可以直接删除
		if($mod->where("id=$id")->delete($_GET['id'])){
			$this->success("删除成功",U("Cate/index"));
		}else{
			$this->error('删除失败');
		}
    	

       

    }

    //修改操作
    public function edit(){
    	//获取id
    	$id=$_GET['id'];
    	//获取需要修改的数据
    	$info=M("Cates")->find($id);
    	//获取所有类别
    	$list=M("Cates")->select();
    	//分配变量
    	$this->assign("info",$info);
    	$this->assign("list",$list);
    	//加载模板
    	$this->display("Cate/edit");
    }

    //执行修改
    public function update(){
    	//实例化model
    	$mod=M('Cates');
    	//封装信息
    	$mod->create();
    	// var_dump($mod->create());exit;
    	if($mod->save()){
    		$this->success("修改成功",U("Cate/index"));
    	}else{
    		$this->error("修改失败");
    	}
    }

    //公共的方法
    // public function getCatesbypid($pid){
    //     //实例化加查询
    //     $s=M('Cates')->where("pid=$pid")->select();
    //     $data=array();
    //     //遍历
    //     foreach ($s as $key => $value) {
    //         $value['shop']=$this->getCatesbypid($value['id']);
    //         $data[]=$value;
    //     }
    //     return $data;
    // }

    // //无限递归分类
    // public function index2(){
    //     $list=$this->getCatesbypid(0);
    //     // var_dump($list);
    //     // echo "<pre>";
    //     // print_r($list);
    //     // echo "</pre>";
    //     // 分配数据
    //     $this->assign("list",$list);
    //     //加载模板
    //     $this->display("Cate/index2");
    // }


}