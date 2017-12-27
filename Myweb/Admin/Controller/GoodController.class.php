<?php
///商品模块
namespace Admin\Controller;
use Think\Controller;
class GoodController extends AllowController{
	//商品列表页
	public function index(){
		if(!empty($_GET['goods'])){
            $where['goods']=array('like',"%{$_GET['goods']}%");
        }
        // var_dump($where);exit;
        //实例化
        $mod=M('Goods');
        //获取总数据条数
        $tot=$mod->where($where)->Count();
        //实例化page
        $page=new \Think\Page($tot,10);
        $page->setConfig("prev",'上一页');
        $page->setConfig("next",'下一页');
        $page->setConfig("first",'首页');
        $page->setConfig("last",'末页');
        $page->setConfig("theme","%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%");
        $list=$mod->where($where)->limit($page->firstRow,$page->listRows)->field("cates.name as cname,goods.goods,goods.id as gid,goods.descr,goods.price,goods.cprice,goods.color,goods.size,goods.picname,goods.status,goods.store,goods.addtime")->join("cates on goods.typeid=cates.id")->select();
        // echo $mod->getLastSql();
        // var_dump($list);
        $this->assign('list',$list);
        $this->assign('pageinfo',$page->show());
        $this->display('Good/index');
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

	//加载添加添加
	public function add(){
        $mod=M("Cates");
		$cate=$this->getCate();
    	$this->assign("cate",$cate);
    	$this->display("Good/add");
	}

	// 执行的多文件上传
    public function insert(){
         //实例化Upload
        $upload=new \Think\Upload();
        // var_dump($upload);
        //初始化信息
        $upload->maxSize=0;//文件大小
        // $upload->autoSub=false;//关闭子目录
        $upload->exts=array('jpg','jpeg','gif','png');//文件后缀
        $upload->rootPath="./Public/Goods/";//路径
        //执行上传
        $info=$upload->upload();
        // var_dump($info);
        if(!$info){
            //上传失败 显示的错误信息
            $this->error($upload->getError());
        }else{
        	$arr=array();
            // var_dump($info);
            //遍历
            foreach($info as $key=>$file){
                // echo $file['savepath'].$file['savename'];
                $arr[$key]="/Public/Goods/".$file['savepath'].$file['savename'];
                // var_dump($arr);
       		 	//缩放
    			// 实例化图像处理类  		
    			// $image=new \Think\Image();
    			// //打开需要处理的图片
    			// $image->open(__ROOT__."/Public/Articles/".$file['savepath'].$file['savename']);
    			// //缩放
    			// $image->thumb(100,100)->save(__ROOT__."/Public/Articles/".$file['savepath']."t_".$file['savename']);
    			// // $arr['$key']=__ROOT__."/Public/Articles/".$file['savepath'].$file['savename'];
    			// var_dump($arr);
            }
        }

        //实例化
        $mod=M('Goods');
        $data['goods']=I('post.goods');
        $data['typeid']=I('post.typeid');
        $data['descr']=I('post.descr');
        $data['price']=I('post.price');
        $data['cprice']=I('post.cprice');
        $data['color']=I('post.color');
        $data['size']=I('post.size');
        $data['picname']=$arr['picname'];
        // echo $data['picname']."------".$data['picname1']."------".$data['picname2'];
        $data['status']=1;
        $data['store']=I('post.store');
        $data['addtime']=time();
        // var_dump($data);exit;
        if($mod->add($data)){
        	$this->success("添加成功",U("Good/index"));
    	}else{
    		$this->error("添加失败");
        }
    }
 
    //执行删除
    public function delete(){
    	//获取id值
    	$id=I('get.id');
    	// echo $id;
    	$mod=M('goods');
    	$list=$mod->find($id);
        // var_dump($list);die;
    	if($mod->delete($id)){
    		// var_dump($list);exit;
    		$this->success('删除成功',U('Good/index'));
            unlink(".".$list['picname']);  
    	}else{
    		$this->error("删除失败");
    	}
    }

    //执行修改
     public function edit(){
        // echo "wsss";exit;
        // 获取id值
        $id=I("get.id");
        // echo $id;exit;
    	//获取需要修改
    	$mod=M('goods');
    	// $list=$mod->field("cates.name as cname,goods.typeid,goods.goods,goods.id as gid,goods.descr,goods.price,goods.cprice,goods.color,goods.size,goods.picname,goods.picname1,goods.picname2,goods.status,goods.store,goods.addtime")->join("cates on goods.typeid=cates.id")->select();
        // var_dump($list);exit;
    	$info=$mod->find($id);
        // var_dump($info);exit;
    	$this->assign('info',$info);
    	$this->display("Good/edit");
    }
    
    public function update(){
    	   //实例化Upload
        $upload=new \Think\Upload();
        // var_dump($upload);
        //初始化信息
        $upload->maxSize=0;//文件大小
        // $upload->autoSub=false;//关闭子目录
        $upload->exts=array('jpg','jpeg','gif','png');//文件后缀
        $upload->rootPath="./Public/Goods/";//路径
        //执行上传
        $info=$upload->upload();
        // var_dump($info);
        if(!$info){
            //上传失败 显示的错误信息
            $this->error($upload->getError());
        }else{
        	$arr=array();
            // var_dump($info);
            //遍历
            foreach($info as $key=>$file){
                // echo $file['savepath'].$file['savename'];
                $arr[$key]="/Public/Goods/".$file['savepath'].$file['savename'];
                // var_dump($arr);
            }
        }
        $id=I('post.id');
        // echo $id;
        //实例化
        $mod=M('Goods');
        $id=I('post.id');
        $data['goods']=I('post.goods');
        $data['descr']=I('post.descr');
        $data['price']=I('post.price');
        $data['cprice']=I('post.cprice');
        $data['color']=I('post.color');
        $data['size']=I('post.size');
        $data['store']=I('post.store');
        $data['status']=I('post.status');
        $data['picname']=$arr['picname'];
        $data['addtime']=time();
        // var_dump($data);exit;
        $list=$mod->find($id);
        // var_dump($list['picname']);exit;
        if($mod->where("id=$id")->save($data)){
        	$this->success("修改成功",U("Good/index"));
        	unlink(".".$list['picname']);
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
            $list=M('Goods')->find($value);
            if(M("Goods")->delete($value)){
               unlink(".".$list['picname']);
            }
        }

        echo 1;

    }


}
?>