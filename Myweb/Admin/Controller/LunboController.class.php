<?php
namespace Admin\Controller;
use Think\Controller;
class LunboController extends AllowController {
    public function index(){
        //搜索
        //获取搜索条件
        $where=array();
        if(!empty($_GET['name'])){
            $where['name']=array('like',"%{$_GET['name']}%");
        }
        // var_dump($where);eixt;
    	//实例化查询数据
    	$mod=M('Lunbos');
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
    	$this->display("Lunbo/index");
    }

    //添加图片
    public function add(){
    	// echo "222";
    	// 加载模板
    	$this->display("Lunbo/add");
    }

    //执行上传
    public function insert(){
    	// echo "shancghuan ";
        if(empty($_POST['name'])){
            $this->error("亲,您还没有填写类型哦");
        }
    	// 上传图片
    	//实例化upload类
        $upload=new \Think\Upload();
        //初始化信息
        $upload->maxSize=0;//文件大小
        $upload->autoSub=false;//关闭日期目录;
        $upload->exts=array('jpg','jpeg','gif','png');//文件后缀
        $upload->rootPath="./Public/Uploads/";//路径
        //执行上传
        $info=$upload->upload();
        // var_dump($info);exit;
        if(!$info){
            // var_dump($info)
            $this->error($upload->getError());
        }else{
            foreach ($info as $file) {
                 // $url=__ROOT__."/Public/Uploads/".$file['savename'];
                // echo $url;
                // echo "<img src='{$url}'>";
            // //实现缩放
            $img=new \Think\Image();
            //打开需要处理的照片
            $img->open("./Public/Uploads/".$file['savename']);
            //缩放
            $img->thumb(480,300)->save("./Public/Uploads/".$file['savename']);
            //剪切
            $img->thumb(100,100)->save("./Public/Uploads/"."t_".$file['savename']);
            }
        }

        //获取数据
        //实例化
        $mod=M('Lunbos');
        //封装数组
        $data['name']=$_POST['name'];
        $data['img']=$file['savename'];
        $data['status']=1;
        $data['addtime']=time();
        // var_dump($data);exit;
        
        if($mod->add($data)){
        	$this->success("添加成功",U("Lunbo/index"));
        }else{
        	$this->error("添加失败");
        }
    }

    //删除
    public function delete(){
    	// echo "这是删除操作";
    	// 拿到要删除的id
        $id=I("get.id");
    	// echo $id;
    	// 实例化model类
    	$mod=M('lunbos');
    	$ff=$mod->find($id);
    	// var_dump($ff);exit;
    	//执行删除
    	//在删除数据库的同时把上传文件夹里的文件也删除
    	if($mod->delete($id)){
    		$this->success("删除成功",U('Lunbo/index'));
    		unlink("./Public/Uploads/".$ff['img']);
    		unlink("./Public/Uploads/t_".$ff['img']);
    	}else{
    		$this->error("删除失败");
    	}
    }

    //修改
   public function edit(){
        // echo "xiugai ";
        $id=I("get.id");
        $info=M("Lunbos")->find($id);
        // var_dump($info);exit;
        $this->assign("info",$info);
        $this->display("Lunbo/edit");
        
    }

    //执行修改
    public function update(){
    	// echo "修改";
    	// 上传图片
    	//实例化upload类
        $upload=new \Think\Upload();
        //初始化信息
        $upload->maxSize=0;//文件大小
        $upload->autoSub=false;//关闭日期目录;
        $upload->exts=array('jpg','jpeg','gif','png');//文件后缀
        $upload->rootPath="./Public/Uploads/";//路径
        //执行上传
        $info=$upload->upload();
        // var_dump($info);exit;
        if(!$info){
            // var_dump($info)
            $this->error($upload->getError());
        }else{
            foreach ($info as $file) {
                 $url=__ROOT__."/Public/Uploads/".$file['savename'];
                // echo $url;
                // echo "<img src='{$url}'>";
            // //实现缩放
            $img=new \Think\Image();
            //打开需要处理的照片
            $img->open("./Public/Uploads/".$file['savename']);
            //缩放
            $img->thumb(480,300)->save("./Public/Uploads/".$file['savename']);
            //剪切
            $img->thumb(80,80)->save("./Public/Uploads/"."s_".$file['savename']);
            }
        }
        $id=I("post.id");
        $oldimg=$_POST['oldimg'];
        // echo $oldimg;exit;
        // echo $id;
        //实例化
        $mod=M('Lunbos');
        $ss=$mod->find($id);
        // var_dump($ss);exit;
        $data['name']=$_POST['name'];
        $data['status']=$_POST['status'];
        $data['img']=$file['savename'];
        // var_dump($data);exit;
        if($mod->where("id=$id")->save($data)){
        	$this->success("修改成功",U("Lunbo/index"));
            // unlink('./Public/Adverts/'.$_POST['oldname']);

        	unlink('./Public/Uploads/'.$_POST['oldimg']);
        	unlink('./Public/Uploads/s_'.$_POST['oldimg']);
        }else{
        	$this->error("修改失败");
        }
    }


}