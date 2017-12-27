<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends AllController {
	// 无限分类递归 -- 二级菜单
	public function catePid($pid){
		// 实例化
    	$mod=M('Cates');
    	$s=$mod->where("pid=$pid")->select();
    	$a=array();
    	foreach($s as $key=>$value){
    		$value['shop']=$this->catePid($value['id']);
    		$a[]=$value;
    	}
    	// die;
    	return $a;
	} 
    public function index(){
    	// 二级菜单 无限分类递归
    	$list=$this->catePid(0);
    	// var_dump($list);die;
    	
        // 今日推荐
    	
    	$mod=M('Goods');
    	$info=$mod->where("status!='3'")->limit('0,3')->select();
        $this->assign('info',$info);
        // var_dump($info);die;
        // 秒杀专场
        $action=$mod->query("select * from goods where status!='3' order by id desc limit 0,4");
        $this->assign('action',$action);
        // var_dump($list);die;
        // 商品遍历
        $good=array();
        foreach($list as $key=>$value){
            $goods=$mod->query("select * from goods where typeid={$value['id']} and status!='3' limit 0,7");
            // foreach($goods as $a){
            //     $good[]=$a;
            // }
            $value['goods']=$goods;
            // var_dump($value);
            // echo "<pre>";
            // print_r($list);
            $good[]=$value;
        }
       // var_dump($good);
       // echo "<pre>";
       //  print_r($good);
       // die;
        //轮播图
        //实例化
        $mod=M("Lunbos");
        //状态为1代表显示0位不显示
        $arr=[];
        $arr['status']=1;

        $list4=$mod->where($arr)->select();
        // foreach($list4 as $v){
        //     var_dump($v);
        // }
        // var_dump($list4);exit;
        //分配数据
        $this->assign("list4",$list4);


        //查询广告
        //实例化
        $mod=M("Adverts");
        $list2=$mod->limit('0,7')->select();
        // var_dump($list2);exit;
        $this->assign("list2",$list2);

        //友情链接
        $mod=M("Friends");
        $list3=$mod->limit('0,20')->select();
        $_SESSION['friend']=$list3;
        // var_dump($_SESSION);die;
        // var_dump($list3);exit;
        //分配数据
        $this->assign("list",$good);
        $this->display('Index/index');
    }
}

?>