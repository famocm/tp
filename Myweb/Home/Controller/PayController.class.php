<?php 
// 购物车结算页面
namespace Home\Controller;
use Think\Controller;
class PayController extends AllowController {
     public function add(){
        // echo "这是加入购物车操作";
        //获取id
        $id=I('get.id');
        $num=I('get.num');
        // echo $id.":".$num;
        // 获取商品信息
        $row=M("Goods")->where("id=$id")->select();
        // $row[0]['num']=1;
        // var_dump($row);exit;
        //判断购物车数据
        if(isset($_SESSION['s'][$id])){
            // echo "111";exit;
            if($_SESSION['s'][$id]['num']<$row[0]['store']){
                $_SESSION['s'][$id]['num']+=$num;
            }else{
                $_SESSION['s'][$id]['num']=$row[0]['store'];
            }
            
        }else{
            // echo "222";
        //初始化商品数量
        $row[0]['num']=$num;
        // var_dump($row);
        //把初始化之后的商品数据存储在session里
        $_SESSION['s'][$id]=$row[0];

        }
        $tot=$_SESSION['s'][$id]['num']*$_SESSION['s'][$id]['cprice'];
        $_SESSION['s'][$id]['zongjia']=$tot;
        $this->redirect("Pay/index");
     }

	//获取当前用户所有的收货地址信息
	public function allgetaddress($id){
		return M("Address")->where("users_id=$id")->select();
	}
	public function index(){
		$all=null;
          foreach($_SESSION['s'] as $key=>$value){
            // var_dump($value);
             $all+=$value['zongjia'];
          }
        // die;
        // var_dump($all);
        
        $this->assign('all',$all);
        $this->assign("row",$_SESSION['s']);
        $address=$this->allgetaddress($_SESSION['id2']);
     	// var_dump($address);
     	// $str=explode(",",$address[1]['address']);
     	// var_dump($str);die;
     	//分配到模板
     	$this->assign("address",$address);
		$this->display("Bycar/pay");
	}

	// 获取地址  城市级联
	public function address(){
		//获取参数
     	$upid=$_GET['upid'];
     	//实例化
     	$mod=M("District");
     	//查询数据
     	$list=$mod->where("upid=$upid")->select();
     	//将php数据转换为json格式
     	echo json_encode($list);
	}

	//执行地址插入
     public function insert(){
     	//实例化
     	$mod=M("Address");
     	$a=$_POST['address'];
     	$str=explode(",",$a);
     	$address1=implode(" ",$str);
     	//封装数据
     	$data['street']=$_POST['street'];
     	$data['name']=$_POST['name'];
     	$data['phone']=$_POST['phone'];
     	$data['address']=$address1;
     	$data['users_id']=$_SESSION['id2'];
        $data['code']=$_POST['code'];
     	//执行插入
     	if($mod->add($data)){
			$this->redirect("Pay/index");
     		
     	}



     }

     // 选中提交地址
     public function checkpay(){
     	$id=I('post.id');
     	// echo $id;
     	$mod=M('Address');
     	$list=$mod->where("id=$id")->select();
     	$arr['name']=$list[0]['name'];
     	$arr['phone']=$list[0]['phone'];
     	$arr['address']=$list[0]['address'];
     	$arr['street']=$list[0]['street'];
     	echo json_encode($arr);
     }

     // ajax删除
     public function del(){
        // echo "Ajax";
        //获取a参数 数组
        $id=isset($_POST['id'])?$_POST['id']:"";

        $mod=M('Address');
        if($mod->where("id=$id")->delete()){
        	echo 1;
        }else{
        	echo "删除失败";
        }

     }
}
 ?>