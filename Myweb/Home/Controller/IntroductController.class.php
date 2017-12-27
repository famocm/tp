<?php
namespace Home\Controller;
use Think\Controller;
class IntroductController extends AllController{
	public function index(){ 
		// echo $_GET['id'];
		// 获取商品的id
		$id=I('get.id');
		// echo $pid;exit;
		//实例化
		$mod=M('Goods');

		$rev=rand(0,1)*5;
		$list=$mod->where("id=$id")->select();
		foreach ($list as $key => $value) {
		
		}
		// var_dump($value);exit;
		if(!empty($_SESSION['typeid'])){
			$typeid=$_SESSION['typeid'];
		}
		$typeid=$value['typeid'];
		// echo $typeid;exit;
		$data=$mod->where("typeid=$typeid")->limit($rev,5)->select();
		// var_dump($data);exit;
		$datas=$mod->where("typeid=$typeid")->select();

		// 实例化评价表
		$mod1=M('Articles');
        $list1=$mod1->where("goods_id=$id")->select();
        // var_dump($list1);die;
        $data1=null;
        foreach($list1 as $value0){
            // var_dump($value0);
            // $data1[]=$value0['user_id'];
           
        }
         $data1[]=M('Articles')->query("select goods.*,articles.* from articles,goods where goods.id={$value0['goods_id']} and goods.id=articles.goods_id");
        // $data1=array_unique($data1);
        // var_dump($data1);
        // die;
        // $ping=null;
        // foreach($data1 as $key1){
        	// $ping[]=M("Articles")->query("select users.pic,users.username,users.id,articles.*,goods.size,goods.color,goods.id from users,articles,goods where users.id=articles.user_id and goods_id=$id and goods.id=articles.goods_id");
        // }

        // var_dump($ping);
        // die;
        $data2=array();
        foreach($data1 as $value1){
            foreach($value1 as $value2){
                // var_dump($value2);
                $data2[]=$value2;

            }

            // return $data1;
        }
        // var_dump($data2);
        // die;
        

		// var_dump($data1);die;
		// echo $mod1->getLastSql();die;
		// $this->assign("list1",$list1);

		// var_dump($datas);
		// var_dump($list);exit;
		$count=M('Articles')->where("goods_id=$id")->select();
		$count1=count($count);
		// var_dump($count1);die;
		$this->assign('count',$count1);
		$this->assign('list',$list);
		$this->assign('data',$data);
		$this->assign('datas',$datas);
		$this->assign("shopsss",$data2);
		$this->display("Introduct/introduct");

	}

	// 检测数量
	public function checknum(){
		$id=I('post.id');
		$num=I('post.num');
		$mod=M('Goods');
		$list=$mod->where("id=$id")->select();
		if($num>$list[0]['store']){
			echo 1;
		}else{
			echo 0;
		}
	}


}
?>