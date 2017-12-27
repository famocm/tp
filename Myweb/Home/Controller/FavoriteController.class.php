<?php
namespace Home\Controller;
use Think\Controller;
class FavoriteController extends AllowController{
	public function index(){ 
		// echo "添加收藏操作";
		// 拿取用户id
		// $id=$_SESSION['id2'];
		// $gid=$_GET['id'];
		// $price=$_GET['price'];
		// $picname=$_GET['picname'];
		$data['uid']=$_SESSION['id2'];
		$data['price']=$_GET['price'];
		$data['picname']=$_GET['picname'];
		$data['goods']=$_GET['goods'];
		// var_dump($data);exit;
		// echo $id;
		// var_dump($gid);exit;
		//实例化
		$mod=M('Favorites');
		if($mod->add($data)){
			$this->success("添加收藏成功",U("Personal/collection"));
		}else{
			$this->error("添加失败,请重新添加");
		}
		// $list=$mod->where("id=$gid")->select();
		// var_dump($list);exit;
		// var_dump($id);
	}

	public function off(){
		// echo "不喜欢了我要删除他";
	  // 获取id
      $id=I("get.id");
      // var_dump($id);exit;
      //实例化
      $mod=M('Favorites');
      if($mod->delete($id)){
        $this->success("取消收藏成功",U("Personal/collection"));
      }else{
        $this->error("删除失败");
      }
	}

	
}
?>