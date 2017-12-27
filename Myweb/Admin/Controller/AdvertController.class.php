<?php
// 广告模块
namespace Admin\Controller;
use Think\Controller;
class AdvertController extends AllowController {

    //分页加搜索浏览信息
    public function index(){
         //实例化Model
        $where=array();
        //获取搜索条件
        if(!empty($_GET['sponsprname'])){
            $where['sponspr']=array('like',"%{$_GET['sponsprname']}%");
        }

	    $mod=M('Adverts');
        //获取数据的总条数
        $tot=$mod->where($where)->Count();
        // echo $tot;

        //实例化Page类
        $page=new \Think\Page($tot,10);
        //设置分页信息
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        $page->setConfig('first','首页');
        $page->setConfig('last','末页');
        $page->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');
        $list=$mod->where($where)->limit($page->firstRow,$page->listRows)->select();
        // var_dump($list);
        //分配变量
        $this->assign('list',$list);
        $this->assign('pageinfo',$page->show());
        //加载模板
        $this->display('Advert/index');
    }

    public function delete(){
        $id=I("get.id");
        $mod=M('Adverts');
        $list=$mod->find($id);
        // var_dump('./Public/Adverts/t_'.$list['picname']);die;
        // echo "./Public/Adverts/".$list['picname'];die;

        //实例化Model类
        if($mod->delete($id)){
            //跳转
            $this->success('删除成功',U('Advert/index'));
            unlink('./Public/Adverts/'.$list['picname']);
            unlink('./Public/Adverts/t_'.$list['picname']);
        }else{
            $this->error('删除失败');
        }
    }

    public function add(){
        //加载模板
        $this->display('Advert/add');
    }

    //执行添加
    public function insert(){
    	//实例化Upload
        $upload=new \Think\Upload();
        //初始化信息
        $upload->maxSize=0;//文件大小
        $upload->autoSub=false;//关闭子目录
        $upload->exts=array('jpg','jpeg','gif','png');//文件后缀
        $upload->rootPath="./Public/Adverts/";//路径
        //执行上传
        $info=$upload->upload();
        // var_dump($info);
        if(!$info){
            //上传失败 显示的错误信息
            $this->error($upload->getError());
        }else{
            // var_dump($info);
            //遍历
            foreach($info as $file){
                //图片的缩放
                //实例化Image类
                $img=new \Think\Image();
                //打开需要处理的图片
                $img->open("./Public/Adverts/".$file['savepath'].$file['savename']);
                //缩放
                $img->thumb(80,80)->save("./Public/Adverts/".$file['savepath']."t_".$file['savename']);
            }
        }
        //实例化Model类
        $mod=M('Adverts');
        //把添加的信息封装在数据对象里，并没有添加到数据库里
        // var_dump($mod->create());
        $data['picname']=$file['savename'];
        $data['describe']=I("post.describe");
        $data['sponspr']=I("post.sponspr");
        $data['status']=1;
        $data['addtime']=time();
        // var_dump($data);exit;
        if($mod->add($data)){
            $this->success('添加成功',U('Advert/index'));
        }else{
            $this->error('添加失败');
        }
    }
        

    public function edit(){
        //获取id
        $id=I("get.id");
        //获取到需要修改的数据
        $Advert=M('Adverts')->find($id);
        //分配数据
        $this->assign('info',$Advert);
        //加载模板
        $this->display('Advert/edit');
    }

    //执行修改
    public function update(){
    	 $upload=new \Think\Upload();
        //初始化信息
        $upload->maxSize=0;//文件大小
        $upload->autoSub=false;//关闭子目录
        $upload->exts=array('jpg','jpeg','gif','png');//文件后缀
        $upload->rootPath="./Public/Adverts/";//路径
        //执行上传
        $info=$upload->upload();
        // var_dump($info);
        if(!$info){
            //上传失败 显示的错误信息
            $this->error($upload->getError());
        }else{
            // var_dump($info);
            //遍历
            foreach($info as $file){
                //图片的缩放
                //实例化Image类
                $img=new \Think\Image();
                //打开需要处理的图片
                $img->open("./Public/Adverts/".$file['savepath'].$file['savename']);
                //缩放
                $img->thumb(80,80)->save("./Public/Adverts/".$file['savepath']."t_".$file['savename']);
            }
        }
        
        $id=I("post.id");
        // echo $id;die;
        //实例化MOdel
        $mod=M('Adverts');
        //封装信息
        $data['status']=$_POST["status"];
        $data['picname']=$file['savename'];
        $data['describe']=I("post.describe");
        // var_dump($data);exit;
        if($mod->where("id=$id")->save($data)){
            $this->success('修改成功',U('Advert/index'));
            unlink('./Public/Adverts/'.I("post.oldname"));
        	unlink('./Public/Adverts/t_'.I("post.oldname"));
        }else{
            $this->error('修改失败');
        }
    }
 
}
?>