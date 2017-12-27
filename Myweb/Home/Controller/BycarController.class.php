<?php
namespace Home\Controller;
use Think\Controller;
class BycarController extends AllowController {


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
        $this->success("加入购物车成功",U("Bycar/index"));
     }

     //加载购物车首页
     public function index(){
        //把session数据分配到购物车
        // $arr=array();
         $all=null;
          foreach($_SESSION['s'] as $key=>$value){
            // var_dump($value);
             $all+=$value['zongjia'];
          }
        // die;
        // var_dump($all);
        
        $this->assign('all',$all);
        $this->assign("shop",$_SESSION['s']);
         $shopnum=count($_SESSION['s']);
        $_SESSION['shopnum']=$shopnum;
        // var_dump($_SESSION);
        //加载模板
        $this->display('Bycar/index');
    }
    
     //数量减
     public function updatee(){
       //获取id
          $id=$_GET['id'];
          // echo $id;
          if($_SESSION['s'][$id]['num']<=1){
               $_SESSION['s'][$id]['num']=1;
          }else{
               //获取当前商品的数量,并且减一
               $_SESSION['s'][$id]['num']-=1;
          }
          
          $num=$_SESSION['s'][$id]['num'];
          $tot=$_SESSION['s'][$id]['num']*$_SESSION['s'][$id]['cprice'];
          $_SESSION['s'][$id]['zongjia']=$tot;
          $arr=array();
          $arr['num']=$num;
          $arr['tot']=$tot;
          $all=null;
          foreach($_SESSION['s'] as $key=>$value){
            // var_dump($value);
             $all+=$value['zongjia'];
          }
          $arr['all']=$all;
          // echo $num;
          echo json_encode($arr);
        // $_SESSION['s']['zongjia']+=$zongjia;
        // $this->redirect("Bycar/index");

     }

      //数量加
     public function update(){
        //获取id
          $id=$_GET['id'];
          //获取当前商品数据库的数据
          $info=M("Goods")->where("id=$id")->select();
          // var_dump($info);die;
          if($_SESSION['s'][$id]['num']>=$info[0]['store']){
               $_SESSION['s'][$id]['num']=$info[0]['store'];
          }else{
               $_SESSION['s'][$id]['num']+=1;
          }
          

          $num=$_SESSION['s'][$id]['num'];
          $tot=$_SESSION['s'][$id]['num']*$_SESSION['s'][$id]['cprice'];
          $_SESSION['s'][$id]['zongjia']=$tot;
          $arr=array();
          $arr['num']=$num;
          $arr['tot']=$tot;
          $all=null;
          foreach($_SESSION['s'] as $key=>$value){
            // var_dump($value);
             $all+=$value['zongjia'];
          }
          $arr['all']=$all;
          // echo $num;
          //将数组转换为json格式
          echo json_encode($arr);
     }
   
    //删除
      //删除
     public function delete(){
        //获取id
        $id=$_GET['id'];
        // echo $id;exit;
        unset($_SESSION['s'][$id]);
        $this->redirect("Bycar/index");
     }

     // ajax批量删除
     public function del(){
        // echo "Ajax";
        //获取a参数 数组
        $id=isset($_GET['id'])?$_GET['id']:"";

        if($id==""){
            echo "至少选中一条数据";
            exit;
        }

        // //遍历
        foreach($id as $key=>$value){
            unset($_SESSION['s'][$value]);
        }

        echo 1;

     }


    //支付成功
    //创建订单
     public function dopayes(){
        // var_dump($_SESSION);die;
        $id=I('get.id');
        // 实例化
        $mod1=M('Address');
        $list=$mod1->where("id=$id")->select();
        foreach($list as $row){

        }
        // var_dump($value);
        $a=null;
        foreach($_SESSION['s'] as $value1){
          $a+=$value1['zongjia'];
        }
        $_SESSION['total']=$a;
        //实例化
        $mod=M("Orders");
        // echo $a;die;
        //封装数据
        $data['order_code']=$this->Ordernum();//订单号
        $_SESSION['order']=$data['order_code'];
        $data['uid']=$_SESSION['id2'];//用户id
        $data['address_id']=$id;//地址id
        $_SESSION['address_id']=$id;
        $data['total']=$a;//总金额
        $data['phone']=$row['phone'];
        $data['sname']=$row['name'];
        $data['addtime']=time();
        $data['status']=1;

        // // var_dump($data);
        //生成订单
        if($id1=$mod->add($data)){
          // echo "订单生成";
          //插入商品详情信息
          //遍历session数据
          foreach($_SESSION['s'] as $key=>$value){
            //封装数据
            $temp['goods_id']=$value['id'];//商品id
            $temp['order_id']=$id1;//订单id
            $temp['num']=$value['num'];//商品数量
            $temp['picname']=$value['picname'];//商品图片
            $temp['size']=$value['size'];//商品大小
            $temp['color']=$value['color'];//商品颜色
            $temp['name']=$value['goods'];//商品名字
            $temp['price']=$value['cprice'];//商品价格
            // $temp['status']=1;

            //插入订单详情表
            M("Order_goods")->add($temp);
            
            // 查询商品表
            $gg=M("Goods")->where("id={$value['id']}")->select();
            $gg[0]['num']+=$value['num'];
            $gg[0]['store']-=$value['num'];
            $tt['num']=$gg[0]['num'];
            $tt['store']=$gg[0]['store'];
            // 插入更新商品数量和库存
            M("Goods")->where("id={$value['id']}")->save($tt);

          }
          // var_dump($_SESSION);die;
          
          $uid=$_SESSION['id2'];
          $vip=M('Orders')->where("uid=$uid")->select();
          $tto=null;
          foreach($vip as $value){
            $tto+=$value['total'];
          }
          $ttoo=round($tto/100);
          if($ttoo>=10){
            $sta=2;
          }else{
            $sta=1;
          }
          $user['integral']=$ttoo;
          $user['status']=$sta;
          M('Users')->where("id=$uid")->save($user);
          // echo M("Users")->getLastSql();die;
          // var_dump($user);die;
          unset($_SESSION['s']);
          unset($_SESSION['shopnum']);
          $this->success("订单生成成功,请去支付",U('Bycar/payes'));

        }else{
          $this->error("订单生成失败");
        }

       
     }

     //加载支付页面
     public function payes(){
      $this->display('Bycar/payes');
     }

     //生成随机订单号
     public function Ordernum(){
      return time()+rand(1000,10000);
     }

     // 结算成功
     public function dosuccess(){
      // var_dump($_SESSION);die;
        $id=$_SESSION['address_id'];
        // echo $id;die;
        $mod=M('Address');
        $address=$mod->where("id=$id")->select();
        // var_dump($address);die;
        $this->assign("address",$address);
        $this->display("Bycar/dosuccess");
     }
}

?>